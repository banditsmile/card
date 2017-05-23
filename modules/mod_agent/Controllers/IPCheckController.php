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
class IPCheckController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "security" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R026f0167b4 = array(
																"ip" => explode( ",", $R679e9b9234['ip'].",,,,," ),
																"ipcheck" => $R679e9b9234['ipcheck'],
																"mac" => explode( ",", $R679e9b9234['mac'].",,,,," ),
																"maccheck" => $R679e9b9234['maccheck'],
																"hde" => explode( ",", $R679e9b9234['hde'].",,,,," ),
																"hdecheck" => $R679e9b9234['hdecheck'],
																"cpu" => explode( ",", $R679e9b9234['cpu'].",,,,," ),
																"cpucheck" => $R679e9b9234['cpucheck'],
																"addr" => explode( ",", $R679e9b9234['addr'].",,,,," ),
																"addrcheck" => $R679e9b9234['addrcheck'],
																"mobile" => $R679e9b9234['mobile'],
																"mobilecheck" => $R679e9b9234['mobilecheck'],
																"mibaoka" => $R679e9b9234['mibaoka'],
																"mibaokacheck" => $R679e9b9234['mibaokacheck'],
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14
												);
								}
								else
								{
												$R026f0167b4 = array(
																"ip" => array( "", "", "", "", "" ),
																"ipcheck" => 0,
																"mac" => array( "", "", "", "", "" ),
																"maccheck" => 0,
																"hde" => array( "", "", "", "", "" ),
																"hdecheck" => 0,
																"cpu" => array( "", "", "", "", "" ),
																"cpucheck" => 0,
																"addr" => array( "", "", "", "", "" ),
																"addrcheck" => 0,
																"mobile" => "",
																"mobilecheck" => 0,
																"mibaoka" => "",
																"mibaokacheck" => 0,
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14
												);
								}
						
												$this->Assign( "security", $R026f0167b4 );
												$this->Assign( "staffid", $R94e0136c8a );
												$this->Assign( "aid", $R2a51483b14 );
												$this->View( );
						
				}

				public function IP( )
				{
								$this->Assign( "ip", $this->GetIp( ) );
								$this->Index( );
				}

				public function CheckAgentValid( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,tradepwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								if ( 0 < $R94e0136c8a )
								{
												$R5f84c47438 = factory::getinstance( "staffs", "checktradepwd,tradepwd" );
												$Raac42e4217 = $R5f84c47438->IStaff_Get( $R94e0136c8a );
												if ( !isset( $Raac42e4217['checktradepwd'] ) )
												{
																$this->Alert( "非法登陆" );
																$this->HistoryGo( );
												}
												$R48aa85bc4e = getvar( "tradepwd" );
												if ( $R48aa85bc4e != $Raac42e4217['tradepwd'] )
												{
																$this->Alert( "您输入的交易密码有错！请重新输入" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												if ( $R48aa85bc4e != $agent['tradepwd'] )
												{
																$this->Alert( "您输入的交易密码有错！请重新输入" );
																$this->HistoryGo( );
												}
								}
				}

				public function IPSave( )
				{
								$this->NormalSave( "ip", "IP" );
				}

				public function Addr( )
				{
								$this->Assign( "addr", $this->GetAddr( ) );
								$this->Index( );
				}

				public function GetAddr( )
				{
								return "未知";
				}

				public function AddrSave( )
				{
								$this->NormalSave( "addr", "Addr" );
				}

				public function NormalSave( $R6c6f2ffa34, $action )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$this->CheckAgentValid( $R2a51483b14 );
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$data = array(
												$R6c6f2ffa34."check" => $this->GetCheck( $R6c6f2ffa34."check" ),
												$R6c6f2ffa34 => $this->GetItem( $R6c6f2ffa34 )
								);
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R679e9b9234['id'] );
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $this->hander->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "security", array(
																"arg1" => $R2a51483b14,
																"arg2" => $R94e0136c8a
												) );
												$this->Alert( "设置成功" );
								}
								else
								{
												$this->Alert( "设置失败" );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=IPCheck&a=".$action );
				}

				public function IPList( )
				{
						
												$this->View( );
						
				}

				public function GetItem( $R0f8134fb60 )
				{
								$R9cfb7c6d6b = getvar( $R0f8134fb60 );
								return implode( ",", $R9cfb7c6d6b );
				}

				public function GetCheck( $R0f8134fb60 )
				{
								return intval( request( $R0f8134fb60 ) );
				}

}

?>
