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
class SalesController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "sales" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$data = array(
												"aid" => $R2a51483b14
								);
								$R4e420efcc3 = $this->hander->ISales_Get( $data );
								$this->Assign( "items", $R4e420efcc3 );
							
												$this->view( );
							
				}

				public function Add( )
				{
						
												$this->View( );
						
				}

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->ISales_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['id'] ) )
								{
												$this->Alert( "此业务员已经被删除!" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "您不能删除其他用户的业务员！" );
												$this->HistoryGo( );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$R808b89ba0e = $this->hander->ISales_Destroy( $R3584859062 );
								if ( $R808b89ba0e )
								{
												$data = array( "saleid" => 0 );
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R808b89ba0e = $Rdeabc7f106->IOrder_UpdateByStr( $data, " saleid = ".$R3584859062 );
												$this->Alert( "删除成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Sales" );
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->ISales_GetById( $R3584859062 );
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "您不能查看其他用户的业务员业绩！" );
												$this->HistoryGo( );
								}
								$this->Assign( "item", $R3db8f5c8bc );
						
												$this->View( );
						
				}

				public function Achievement( )
				{
								$R9f763f8e3d = intval( request( "saleid" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $R9f763f8e3d )
								{
												$R3db8f5c8bc = $this->hander->ISales_GetById( $R9f763f8e3d );
												if ( !isset( $R3db8f5c8bc['id'] ) )
												{
																$this->Alert( "此业务员已经被删除!" );
																$this->HistoryGo( );
												}
												if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
												{
																$this->Alert( "您不能查看其他用户的业务员业绩！" );
																$this->HistoryGo( );
												}
								}
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								$data = array(
												"aid" => $R2a51483b14
								);
								$R3db8f5c8bc = $this->hander->ISales_Get( $data );
								$this->Assign( "sales", $R3db8f5c8bc );
								$R94beb152c7 = $R9f763f8e3d;
								if ( $R9f763f8e3d == 0 )
								{
												$R026f0167b4 = array( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['id'];
												}
												$R9f763f8e3d = implode( ",", $R026f0167b4 );
												if ( $R9f763f8e3d == "" )
												{
																$R9f763f8e3d = "-1";
												}
												$R94beb152c7 = 0;
								}
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"saleid" => $R9f763f8e3d
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R4e420efcc3 = $Rdeabc7f106->IOrder_Page( $data );
								$Rbf6c8991d9 = $Rdeabc7f106->IOrder_GetTradeData( $data );
								$this->Assign( "tradedata", $Rbf6c8991d9 );
								$data['saleid'] = $R94beb152c7;
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->Assign( "canseeprice", $R198d213635 );
												$this->Assign( "saleid", $R94beb152c7 );
												$this->View( );
						
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$name = getvar( "name" );
								if ( trim( $name ) == "" )
								{
												$this->Alert( "用户名不能为空" );
												$this->HistoryGo( );
								}
								$R9d8898d32a = getvar( "realname" );
								$R8a39b457bb = intval( request( "underlingid" ) );
								$R3db8f5c8bc = $this->hander->ISales_Get( array(
												"underlingid" => $R8a39b457bb
								) );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R8a39b457bb, "parentid" );
								if ( !isset( $agent['parentid'] ) )
								{
												$this->Alert( "您没有这个下级" );
												$this->HistoryGo( );
								}
								if ( $agent['parentid'] != $R2a51483b14 )
								{
												$this->Alert( "您没有这个下级" );
												$this->HistoryGo( );
								}
								$Ra2f7b8a91c = doubleval( request( "sellscale" ) );
								$Ra2f7b8a91c /= 100;
								$R7da43659df = getvar( "qq" );
								$Recb2521bef = getvar( "addr" );
								$R7e43ed30df = getvar( "mobile" );
								$R3584859062 = intval( request( "id" ) );
								$data = array(
												"aid" => $R2a51483b14,
												"underlingid" => $R8a39b457bb,
												"sellscale" => $Ra2f7b8a91c,
												"name" => $name,
												"realname" => $R9d8898d32a,
												"qq" => $R7da43659df,
												"mobile" => $R7e43ed30df,
												"addr" => $Recb2521bef
								);
								if ( 0 < $R3584859062 )
								{
												if ( isset( $R3db8f5c8bc[0]['id'] ) && $R3db8f5c8bc[0]['id'] != $R3584859062 )
												{
																$this->Alert( "此下级已经被其他业务员绑定，请选择其他业务员" );
																$this->HistoryGo( );
												}
												$R808b89ba0e = $this->hander->ISales_Update( $data, $R3584859062 );
								}
								else
								{
												if ( isset( $R3db8f5c8bc[0]['id'] ) )
												{
																$this->Alert( "此下级已经被其他业务员绑定，请选择其他业务员" );
																$this->HistoryGo( );
												}
												$R7bdac4bb2e = $this->hander->ISales_IsExist( $name );
												if ( $R7bdac4bb2e == 0 )
												{
																$this->Alert( "用户名已经存在" );
																$this->HistoryGo( );
												}
												$data['createdate'] = date( "Y-m-d H-i-s" );
												$R808b89ba0e = $this->hander->ISales_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "提交成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Sales" );
								}
								else
								{
												$this->Alert( "提交失败" );
												$this->HistoryGo( );
								}
				}

}

?>
