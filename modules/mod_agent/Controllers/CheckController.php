<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
class CheckController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "check" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = 0;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"aid" => $R2a51483b14
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->ICheck_Page( $data );
								$Re9e4225a22 = $this->hander->ICheck_GetData( $data );
								$this->Assign( "checkdata", $Re9e4225a22 );
								$data = array_merge( $R58bca74885, $R1e3bc50f23[1] );
								$this->FillPage( $data, $R4e420efcc3 );
								$Rda3ac1bf9a = 0;
								$this->Assign( "remain", $Rda3ac1bf9a );
								$R4fa9c48c92 = array( "staffid" => "交班员工", "otherid" => "接班员工" );
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								$this->Assign( "tradetype", getvar( "tradetype" ) );
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "*", $R2a51483b14 );
								$this->Assign( "staff", $Raac42e4217 );
							
												$this->View( );
								
				}

				public function Add( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2fa4b8c965 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "*", $R2a51483b14 );
								$this->Assign( "staff", $Raac42e4217 );
							
												$this->View( );
								
				}

				public function Compute( )
				{
								$R696350cab3 = getvar( "startdate" );
								$R1c8e0f6795 = getvar( "enddate" );
								$R94e0136c8a = intval( request( "staffid" ) );
								if ( 0 < $R94e0136c8a )
								{
												$this->CheckStaff( $R94e0136c8a );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R0dc0347d49 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $R94e0136c8a )
								{
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												$R0dc0347d49 = $Raac42e4217['staffname'];
								}
								$Rac47a75688 = factory::getinstance( "orders" );
								$R4f6dd3397f = $Rac47a75688->IOrder_MoneyByStaffName( $R2a51483b14, $R0dc0347d49, $R696350cab3, $R1c8e0f6795 );
								echo $R4f6dd3397f;
				}

				public function CheckStaff( $R94e0136c8a )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R5f84c47438 = factory::getinstance( "staffs" );
								$R3db8f5c8bc = $R5f84c47438->IStaff_Get( $R94e0136c8a );
								if ( !isset( $R3db8f5c8bc['staffpwd'] ) )
								{
												$this->Alert( "交接对象不存在，请重新选择！" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['bossid'] != $R2a51483b14 )
								{
												$this->Alert( "非法参数！不能对其他用户的员工进行操作" );
												$this->HistoryGo( );
								}
								return $R3db8f5c8bc;
				}

				public function Save( )
				{
								$R8ffdf16aad = getvar( "otherpwd" );
								$Rc2ca423b2f = getvar( "otherstaff" );
								$Rcc5c6e696c = explode( "||", $Rc2ca423b2f );
								$R7601828ef0 = intval( $Rcc5c6e696c[0] );
								$Rc2ca423b2f = $Rcc5c6e696c[1];
								$Raac42e4217 = getvar( "staff" );
								$Rcc5c6e696c = explode( "||", $Raac42e4217 );
								$R94e0136c8a = $Rcc5c6e696c[0];
								$R0dc0347d49 = $Rcc5c6e696c[1];
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rdbc5c05ff5 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,tradepwd" );
								if ( 0 < $R94e0136c8a )
								{
												$this->CheckStaff( $R94e0136c8a );
								}
								if ( 0 < $R7601828ef0 )
								{
												$R3db8f5c8bc = $this->CheckStaff( $R7601828ef0 );
												if ( $R3db8f5c8bc['tradepwd'] != $R8ffdf16aad )
												{
																$this->Alert( "交易密码输入错误，请重新输入！" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R3db8f5c8bc = $Rdbc5c05ff5;
												if ( !isset( $R3db8f5c8bc['tradepwd'] ) )
												{
																$this->Alert( "总账号不存在啦，请重新选择！" );
																$this->HistoryGo( );
												}
												if ( $R3db8f5c8bc['tradepwd'] != $R8ffdf16aad )
												{
																$this->Alert( "交易密码输入错误，请重新输入！" );
																$this->HistoryGo( );
												}
								}
								$data = array(
												"staffname" => $R0dc0347d49,
												"staffid" => $R94e0136c8a,
												"otherstaff" => $Rc2ca423b2f,
												"otherid" => $R7601828ef0,
												"ar" => doubleval( request( "ar" ) ),
												"ap" => doubleval( request( "ap" ) ),
												"createdate" => date( "Y-m-d H:i:s" ),
												"startdate" => getvar( "startdate" ),
												"enddate" => getvar( "enddate" ),
												"remarks" => htmlspecialchars( getvar( "remarks" ) ),
												"state" => 5,
												"remain" => $Rdbc5c05ff5['aremain'],
												"aid" => $R2a51483b14
								);
								$R808b89ba0e = $this->hander->ICheck_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "结帐记录登记成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=check" );
								}
								else
								{
												$this->Alert( "结帐记录登记失败！请重新填写" );
												$this->HistoryGo( );
								}
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$this->Alert( "您好，员工不允许删除结帐记录" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=check" );
								}
								if ( $R3584859062 == 0 )
								{
												$this->Alert( "非法参数！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=check" );
								}
								$R808b89ba0e = $this->hander->ICheck_DelStr( " id=".$R3584859062." and aid=".$R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "结帐记录删除成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=check" );
								}
								else
								{
												$this->Alert( "结帐记录删除失败！请重新操作 " );
												$this->HistoryGo( );
								}
				}

}

?>
