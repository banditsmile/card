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
class RewardTplController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "rewardtpl" );
				}

				public function RankTpl( )
				{
								$R759c567671 = factory::getinstance( "rewardtplname" );
								$R71a664ef8c = $this->PageInfo( );
								$R2a51483b14 = 0;
								$data = array(
												"aid" => $R2a51483b14
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $R759c567671->IRewardTplName_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "模板名称" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "rank", $R046b4585a2 );
				
												$this->view( );
				
				}

				public function TplSave( )
				{
								$R2a51483b14 = 0;
								$R759c567671 = factory::getinstance( "rewardtplname" );
								$R3584859062 = intval( request( "id" ) );
								$R6412910652 = intval( request( "parentid" ) );
								$data = array(
												"name" => getvar( "name" ),
												"parentid" => $R6412910652,
												"rankid" => intval( request( "rankid" ) ),
												"aid" => $R2a51483b14
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $R759c567671->IRewardTplName_Update( $data, $R3584859062 );
												if ( 0 < $R6412910652 && $R6412910652 != request( "oldparentid" ) )
												{
																$this->UpdatePrice( $R6412910652, $R3584859062 );
												}
								}
								else
								{
												$R3584859062 = $R759c567671->IRewardTplName_Create( $data );
												if ( 0 < $R3584859062 )
												{
																if ( 0 < $R6412910652 )
																{
																				$this->UpdatePrice( $R6412910652, $R3584859062 );
																}
																$R808b89ba0e = true;
												}
												else
												{
																$R808b89ba0e = false;
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=RewardTpl&a=RankTpl" );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

				public function TplDel( )
				{
								$R2a51483b14 = 0;
								$R3584859062 = intval( request( "id" ) );
								$R759c567671 = factory::getinstance( "rewardtplname" );
								$Rc41e18a4de = $R759c567671->IRewardTplName_GetById( $R3584859062 );
								if ( $Rc41e18a4de['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$Rc2f1fd7d2e = factory::getinstance( "rewardtpl" );
								$R808b89ba0e = $Rc2f1fd7d2e->IRewardTpl_DestroyByStr( "rewardtpl = ".$R3584859062, array( ) );
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $R759c567671->IRewardTplName_Del( $R3584859062 );
												if ( $R808b89ba0e )
												{
																$R2097a8fddf = factory::getinstance( "agents" );
																$data = array( "rewardtpl" => 0 );
																$R2097a8fddf->IAgent_UpdateByStr( $data, " rewardtpl = ".$R3584859062 );
																$this->Alert( "删除成功" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=RewardTpl&a=RankTpl" );
												}
												else
												{
																$this->Alert( "删除失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function UpdatePrice( $Rb025359786, $R9e14437acd )
				{
								$Rc2f1fd7d2e = factory::getinstance( "rewardtpl" );
								$R2c4347940c = $Rc2f1fd7d2e->IRewardTpl_Get( array(
												"rewardpl" => $Rb025359786
								) );
								foreach ( $R2c4347940c as $R0f8134fb60 )
								{
												$Rcc5c6e696c = array(
																"pricetpl" => $R9e14437acd,
																"pid" => $R0f8134fb60['pid'],
																"price" => $R0f8134fb60['price']
												);
												if ( $Rc2f1fd7d2e->IRewardTpl_IsExist( $Rcc5c6e696c ) )
												{
																$Rc2f1fd7d2e->IRewardTpl_Update( $Rcc5c6e696c, $R0f8134fb60['id'] );
												}
												else
												{
																$R808b89ba0e = $Rc2f1fd7d2e->IRewardTpl_Create( $Rcc5c6e696c );
												}
								}
				}

				public function Home( )
				{
								$this->Redirect( "Home" );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."CardHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"aid" => intval( request( "aid" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IRewardTpl_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "pname" => "商品名称", "pid" => "商品编号", "listprice" => "商品面值" );
								$this->Assign( "sarray", $R00be52aa45 );
					
												$this->view( );
					
				}

				public function ByAidSet( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R29a6818ba2 = intval( request( "rewardtpl" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", "" ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"rewardtpl" => $R29a6818ba2,
												"allaid" => $Rfff462d8f8,
												"forykt" => 1
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IRewardTpl_ProductPage( $data, "*" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "pname" => "商品名称", "pid" => "商品编号", "listprice" => "商品面值" );
								$R63bede6b19 = $Rfff462d8f8 == 1 ? "aid > 0" : "aid < 1";
								$this->Recycle( "products", $R63bede6b19 );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "stype", getvar( "stype", "pname" ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "rewardtpl", $R29a6818ba2 );
						
												$this->view( );
						
				}

				public function Agent( )
				{
								$R29a6818ba2 = intval( request( "rewardtpl" ) );
								$R2a51483b14 = 0;
								$R71a664ef8c = $this->PageInfo( );
								$data = array( "forykt" => 1, "optype" => "" );
								$data = array_merge( $data, $R71a664ef8c );
								if ( 0 < $R29a6818ba2 )
								{
												$data['rewardtpl'] = $R29a6818ba2;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "aname" => "用户名", "aid" => "用户编号", "parentid" => "上级编号", "arealname" => "真实姓名", "aqq" => "QQ", "amail" => "邮箱", "atel" => "电话", "aaddr" => "住址", "aremain" => "最低余额", "acsmp" => "最低消费", "prv" => "省", "city" => "市", "zip" => "邮编", "remarks" => "备注" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R759c567671 = factory::getinstance( "rewardtplname" );
								$R35ee3e47cf = $R759c567671->IRewardTplName_GetByStr( "aid = 0" );
								$this->Assign( "tpls", $R35ee3e47cf );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
						
												$this->view( );
						
				}

				public function AgentTplSave( )
				{
								$R7f50336ca5 = getvar( "aid" );
								$R2097a8fddf = factory::getinstance( "agents" );
								foreach ( $R7f50336ca5 as $R2a51483b14 )
								{
												$R29a6818ba2 = intval( request( "rewardtpl_".$R2a51483b14 ) );
												$R489546c925 = intval( request( "oldrewardtpl_".$R2a51483b14 ) );
												if ( $R29a6818ba2 != $R489546c925 )
												{
																$data = array(
																				"rewardtpl" => $R29a6818ba2
																);
																$R2a51483b14 = intval( $R2a51483b14 );
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																$this->UpdateCache( "agents", array(
																				"arg1" => $R2a51483b14
																) );
												}
								}
								$this->Alert( "完成操作" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=RewardTpl&a=Agent" );
				}

				public function Trade( )
				{
								$this->hander = factory::getinstance( "trades" );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Ra8b176bf4f = 100;
								$R901a6b96db = intval( request( "state", 5 ) );
								$data = array(
												"ykt" => getvar( "ykt" ),
												"tradetype" => $Ra8b176bf4f,
												"admname" => getvar( "admname" ),
												"noykt" => 0,
												"isrewardtrade" => 1
								);
								if ( -2 < $R901a6b96db )
								{
												$data['state'] = $R901a6b96db;
								}
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(reward) as reward,sum(realreward) as realreward" );
								$this->Assign( "record", $R0d2025d631 );
								$R00be52aa45 = array( "ordno" => "订单号", "bindaid" => "经销商编号", "operator" => "操作者", "yktnumber" => "一卡通卡号", "content" => "商品" );
								$R8dc7d3eb73 = array( "0" => "所有平台", "1" => "批发", "2" => "零售", "3" => "一卡通" );
								if ( $Ra8b176bf4f == 11 )
								{
												$R4fa9c48c92 = array( "11" => "点卡交易产生的代理利润" );
								}
								else if ( $Ra8b176bf4f == 12 )
								{
												$R4fa9c48c92 = array( "12" => "供货所得" );
								}
								else
								{
												$R4fa9c48c92 = array( "1,2,21,22,31,32,98,99,101,100" => "所有类型", "1" => "普通点卡交易", "2" => "用户网银充值", "21" => "贷款给别人", "22" => "向别人借款", "31" => "转款给别人", "32" => "别人转款给我", "98" => "资金操作产生的交易记录", "99" => "系统给我充值", "100" => "一卡通兑换卡记录", "101" => "一卡通充值记录", "31,32" => "所有转款记录", "21,22" => "所有贷款/借款记录" );
								}
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								$this->Assign( "tradetype", getvar( "tradetype" ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( getvar( "comefrom", 0 ) ) );
				
												$this->view( );
				
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ItemDeal( )
				{
								$R3584859062 = intval( request( "id" ) );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" )
								{
												echo "参数错误1！";
												exit( );
								}
								$Rcc5c6e696c = explode( ":", $param );
								if ( count( $Rcc5c6e696c ) < 3 || intval( $Rcc5c6e696c[1] ) == 0 || intval( $Rcc5c6e696c[2] ) == 0 )
								{
												echo "参数错误2！";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$R3db8f5c8bc = $this->hander->IRewardTpl_GetByStr( "rewardtpl=".intval( $Rcc5c6e696c[1] )." and pid=".intval( $Rcc5c6e696c[2] )." and rtype=3" );
								if ( !isset( $R3db8f5c8bc[0]['id'] ) )
								{
												$data = array(
																"rewardtpl" => intval( $Rcc5c6e696c[1] ),
																"pid" => intval( $Rcc5c6e696c[2] ),
																"reward" => $R244f38266c,
																"rtype" => 3
												);
												$R808b89ba0e = $this->hander->IRewardTpl_Create( $data );
								}
								else
								{
												$R3584859062 = intval( $R3db8f5c8bc[0]['id'] );
												$data = array(
																"reward" => $R244f38266c
												);
												$R808b89ba0e = $this->hander->IRewardTpl_Update( $data, $R3584859062 );
								}
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "修改失败！";
								}
				}

				public function DelItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IRewardTpl_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "删除失败!";
								}
				}

				public function DestroyItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IRewardTpl_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "删除失败！";
								}
				}

				public function GetLit( )
				{
								$R09dfa65bd9 = intval( getvar( "tablecheckall" ) );
								if ( $R09dfa65bd9 == 1 )
								{
												$Rc0d62c5404 = getvar( "chkexclude" );
												$Rcc5c6e696c = explode( ",", $Rc0d62c5404 );
								}
								else
								{
												$R83e17604b1 = getvar( "chkinclude" );
												$Rcc5c6e696c = explode( ",", $R83e17604b1 );
								}
								$R3db8f5c8bc = array( );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R8eeb1221ae = intval( $R0f8134fb60 );
												if ( 0 < $R8eeb1221ae )
												{
																$R3db8f5c8bc[] = $R8eeb1221ae;
												}
								}
								$R3456919727 = implode( ",", $R3db8f5c8bc );
								$Rb7492a73f7 = "";
								if ( $R09dfa65bd9 == 1 )
								{
												if ( $R3456919727 != "" )
												{
																$Rb7492a73f7 = "id not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "请先选择行";
																exit( );
												}
												$Rb7492a73f7 = "id in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

}

?>
