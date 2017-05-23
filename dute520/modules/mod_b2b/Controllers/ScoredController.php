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
class ScoredController extends Controller
{

				public function __construct( )
				{
				}

				public function Home( )
				{
					
												$this->View( );
					
				}

				public function Index( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$R58bca74885 = array( );
								if ( $Rbdf46d6e43 != 0 )
								{
												$R58bca74885['ordstate'] = $Rbdf46d6e43;
								}
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R4e420efcc3 = $Rf3d646c485->IScoredOrder_Page( $data );
								$R00be52aa45 = array( "ordno" => "订单号", "pname" => "商品名称", "aid" => "用户编号" );
								$R8dc7d3eb73 = array( "0" => "所有状态", "2" => "已处理", "1" => "待处理", "-1" => "无效" );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "ordstate", $Rbdf46d6e43 );
					
												$this->View( );
					
				}

				public function Recored( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array( );
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R645c69ff15 = factory::getinstance( "scored" );
								$R4e420efcc3 = $R645c69ff15->IScored_Page( $data );
								$R00be52aa45 = array( "ordno" => "订单号", "pname" => "商品名称", "aid" => "用户编号" );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->View( );
								
				}

				public function AddScored( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$this->Assign( "sys", $this->GetWebCache( 0, "pwdconfig" ) );
								$R046b4585a2 = $this->GetRCache( );
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( UB_B2C == 0 && UB_YKT == 0 && $R0f8134fb60['gid'] < 2 )
												{
																continue;
												}
												$R026f0167b4[] = $R0f8134fb60;
								}
								$this->Assign( "rank", $R046b4585a2 );
						
												$this->View( );
						
				}

				public function ScoredSave( )
				{
								$Rc5d27f0633 = intval( request( "aidmethod" ) );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R88f9731c8f = doubleval( request( "ubzczvalue" ) );
								if ( $R88f9731c8f == 0 )
								{
												$this->Alert( "您好，请输入非0数额" );
												$this->Historygo( );
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createordno( );
								$Rff0cc71a1d = factory::getinstance( "session" );
								$admin = $Rff0cc71a1d->admin;
								$Ra236db885f = getvar( "remarks" );
								if ( $Ra236db885f == "custom" )
								{
												$Ra236db885f = getvar( "remarks_custom" );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								if ( $Rc5d27f0633 == 1 )
								{
												$R2a51483b14 = intval( request( "aid" ) );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored" );
												if ( !isset( $agent['scored'] ) )
												{
																$this->Alert( "您好，此用户不存在，请重新输入" );
																$this->Historygo( );
												}
												$Re6dea2fc8d = $agent['scored'];
												$R386bfdf511 = $Re6dea2fc8d + $R88f9731c8f;
												$data = array(
																"scored" => $R386bfdf511
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$data = array(
																				"ordno" => $Rdcd9105806,
																				"pname" => $Ra236db885f == "" ? "无" : $Ra236db885f,
																				"qty" => 1,
																				"scored" => $R88f9731c8f,
																				"fat" => $R386bfdf511,
																				"fbt" => $Re6dea2fc8d,
																				"aid" => $R2a51483b14,
																				"staffid" => 0,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"state" => 5,
																				"method" => 0,
																				"admname" => $admin
																);
																$R645c69ff15 = factory::getinstance( "scored" );
																$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												}
								}
								else if ( $Rc5d27f0633 == 2 )
								{
												$R046b4585a2 = intval( request( "rank" ) );
												$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByStr( " alv = ".$R046b4585a2, array( ), "aid,scored" );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$agent = $R0f8134fb60;
																$R2a51483b14 = $agent['aid'];
																$Re6dea2fc8d = $agent['scored'];
																$R386bfdf511 = $Re6dea2fc8d + $R88f9731c8f;
																$data = array(
																				"scored" => $R386bfdf511
																);
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																if ( $R808b89ba0e )
																{
																				$data = array(
																								"ordno" => $Rdcd9105806,
																								"pname" => $Ra236db885f == "" ? "无" : $Ra236db885f,
																								"qty" => 1,
																								"scored" => $R88f9731c8f,
																								"fat" => $R386bfdf511,
																								"fbt" => $Re6dea2fc8d,
																								"aid" => $R2a51483b14,
																								"staffid" => 0,
																								"createdate" => date( "Y-m-d H-i-s" ),
																								"state" => 5,
																								"method" => 0,
																								"admname" => $admin
																				);
																				$R645c69ff15 = factory::getinstance( "scored" );
																				$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
																}
												}
								}
								else if ( $Rc5d27f0633 == 3 )
								{
												$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByStr( "", array( ), "aid,scored" );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$agent = $R0f8134fb60;
																$R2a51483b14 = $agent['aid'];
																$Re6dea2fc8d = $agent['scored'];
																$R386bfdf511 = $Re6dea2fc8d + $R88f9731c8f;
																$data = array(
																				"scored" => $R386bfdf511
																);
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																if ( $R808b89ba0e )
																{
																				$data = array(
																								"ordno" => $Rdcd9105806,
																								"pname" => $Ra236db885f == "" ? "无" : $Ra236db885f,
																								"qty" => 1,
																								"scored" => $R88f9731c8f,
																								"fat" => $R386bfdf511,
																								"fbt" => $Re6dea2fc8d,
																								"aid" => $R2a51483b14,
																								"staffid" => 0,
																								"createdate" => date( "Y-m-d H-i-s" ),
																								"state" => 5,
																								"method" => 0,
																								"admname" => $admin
																				);
																				$R645c69ff15 = factory::getinstance( "scored" );
																				$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
																}
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "完成操作" );
								}
								else
								{
												$this->Alert( "操作失败" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Scored&a=Addscored" );
				}

				public function Detail( )
				{
								$Rdcd9105806 = getvar( "ubzordno" );
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R3db8f5c8bc = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "积分订单已经不存在了！" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['method'] == 3 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=order&a=detail&ubzordno=".$R3db8f5c8bc['ordno'] );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$R6d10b7ab80 = array( "", "实物兑换", "兑换金钱", "兑换商品" );
								$this->Assign( "method", $R6d10b7ab80 );
				
												$this->View( );
				
				}

				public function Check( )
				{
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$R4ef2186fef = getvar( "failreason" );
								$R922c035b87 = intval( request( "rollback" ) );
								$Rdcd9105806 = getvar( "ubzordno" );
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R3db8f5c8bc = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( $R3db8f5c8bc['ordstate'] != 1 )
								{
												$this->Alert( "订单已经处理完毕，无需再处理" );
												$this->HistoryGo( );
								}
								if ( $Rbdf46d6e43 == -1 )
								{
												$this->CheckTradePwd( );
								}
								$Rff0cc71a1d = factory::getinstance( "session" );
								$admin = $Rff0cc71a1d->admin;
								$data = array(
												"admname" => $admin,
												"ordstate" => $Rbdf46d6e43,
												"failreason" => $R4ef2186fef,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
								if ( $Rbdf46d6e43 == -1 && $R808b89ba0e )
								{
												$this->RollBackScored( $R3db8f5c8bc );
								}
								$this->Alert( "更新成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Scored&a=detail&ubzordno=".$Rdcd9105806 );
				}

				public function CheckTradePwd( )
				{
								$R25791b03ad = $this->GetWebCache( );
								$R8eeb1221ae = explode( "|", $R25791b03ad['pwdconfig'] );
								if ( $R8eeb1221ae[0] == 1 )
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
												{
																$this->Alert( "输入的后台充值密码不正确！请重新输入！" );
																$this->HistoryGo( );
												}
								}
				}

				public function RollBackScored( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R2a51483b14 = $R56ea904d53['aid'];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
								$R114f28ca48 = $R56ea904d53['scored'];
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R114f28ca48;
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$Rff0cc71a1d = factory::getinstance( "session" );
												$admin = $Rff0cc71a1d->admin;
												$data = array(
																"ordno" => $Rdcd9105806,
																"pname" => "[失败退还]".$R56ea904d53['pname'],
																"qty" => $R56ea904d53['qty'],
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R56ea904d53['staffid'],
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => -1,
																"method" => $R56ea904d53['method'],
																"admname" => $admin
												);
												$R645c69ff15 = factory::getinstance( "scored" );
												$R645c69ff15->IScored_Create( $data );
												$data = array( "state" => -1 );
												$R645c69ff15->IScored_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

}

?>
