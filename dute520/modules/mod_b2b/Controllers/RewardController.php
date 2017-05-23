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
class RewardController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "reward" );
				}

				public function Home( )
				{
			
												$this->view( );
			
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"aid" => intval( request( "aid" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IReward_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "pname" => "商品名称", "pid" => "商品编号", "listprice" => "商品面值" );
								$this->Assign( "sarray", $R00be52aa45 );
					
												$this->view( );
					
				}

				public function ByPidSet( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R8e8b5578f7 = intval( request( "aid" ) );
								$Rb3f07f8c36 = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $Rb3f07f8c36['forykt'] ) || $Rb3f07f8c36['forykt'] == 0 )
								{
												$this->Alert( "您好,该商品未对一卡通出售,无法设置返点" );
												$this->HistoryGo( );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"pid" => $R8e8b5578f7
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IReward_AgentPage( $data, "*" );
								$data['aid'] = $R8e8b5578f7;
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "aname" => "代理商", "company" => "公司", "aid" => "代理商ID" );
								$R63bede6b19 = $Rfff462d8f8 == 1 ? "aid > 0" : "aid < 1";
								$this->Recycle( "products", $R63bede6b19 );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "pid", $R8e8b5578f7 );
						
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
								$R2a51483b14 = intval( request( "aid" ) );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								if ( !isset( $agent['forykt'] ) || $agent['forykt'] == 0 )
								{
												$this->Alert( "您好,该用户并非一卡通代理商,无法设置返点" );
												$this->HistoryGo( );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", "" ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IReward_ProductPage( $data, "*" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "pname" => "商品名称", "pid" => "商品编号" );
								$R63bede6b19 = $Rfff462d8f8 == 1 ? "aid > 0" : "aid < 1";
								$this->Recycle( "products", $R63bede6b19 );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
						
												$this->view( );
						
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
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(outcome) as outcome,sum(reward) as reward,sum(realreward) as realreward" );
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
												echo "参数错误！";
												exit( );
								}
								$Rcc5c6e696c = explode( ":", $param );
								if ( count( $Rcc5c6e696c ) < 3 || intval( $Rcc5c6e696c[1] ) == 0 || intval( $Rcc5c6e696c[2] ) == 0 )
								{
												echo "参数错误！";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$R3db8f5c8bc = $this->hander->IReward_GetByStr( "aid=".intval( $Rcc5c6e696c[1] )." and pid=".intval( $Rcc5c6e696c[2] )." and rtype=3" );
								if ( !isset( $R3db8f5c8bc[0]['id'] ) )
								{
												$data = array(
																"aid" => intval( $Rcc5c6e696c[1] ),
																"pid" => intval( $Rcc5c6e696c[2] ),
																"reward" => $R244f38266c,
																"rtype" => 3
												);
												$R808b89ba0e = $this->hander->IReward_Create( $data );
								}
								else
								{
												$R3584859062 = intval( $R3db8f5c8bc[0]['id'] );
												$data = array(
																"reward" => $R244f38266c
												);
												$R808b89ba0e = $this->hander->IReward_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->hander->IReward_DestroyByStr( $Rb7492a73f7, $data );
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
								$R808b89ba0e = $this->hander->IReward_DestroyByStr( $Rb7492a73f7, $data );
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

				public function Check( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByStr( " frozen=0 and forykt=1 ", array( ), "aid,company" );
								$this->Assign( "agent", $R3db8f5c8bc );
						
												$this->View( );
						
				}

				public function Compute( )
				{
								echo $this->Compute1( );
				}

				public function Compute1( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								if ( $agent['forykt'] == 0 )
								{
												return 0;
								}
								if ( $R2a51483b14 == 0 )
								{
												return 0;
								}
								$R696350cab3 = getvar( "startdate" );
								$R1c8e0f6795 = getvar( "enddate" );
								$data = array(
												"startdate" => $R696350cab3,
												"enddate" => $R1c8e0f6795,
												"bindaid" => $R2a51483b14,
												"checkout" => 0,
												"tradetype" => 100,
												"state" => 5
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$R3db8f5c8bc = $Race6ab87b1->ITrade_GetByLimit( $data, "sum(reward) as reward" );
								return doubleval( $R3db8f5c8bc['reward'] );
				}

				public function CheckOut( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R696350cab3 = getvar( "startdate" );
								$R1c8e0f6795 = getvar( "enddate" );
								$R8aa41e9b03 = doubleval( request( "ap" ) );
								$Rcdf47c89e1 = doubleval( request( "ar" ) );
								if ( $Rcdf47c89e1 == 0 || $R8aa41e9b03 == 0 )
								{
												$this->Alert( "返点为0, 无需返点" );
												$this->HistoryGo( );
								}
								if ( $Rcdf47c89e1 < $R8aa41e9b03 )
								{
												$this->Alert( "实际返点金额不应该大于系统计算出的返点金额" );
												$this->HistoryGo( );
								}
								$Rbd2ea88d3a = $this->Compute1( );
								if ( $Rbd2ea88d3a != $Rcdf47c89e1 )
								{
												$this->Alert( "参数错误,请重新提交" );
												$this->HistoryGo( );
								}
								$R63bede6b19 = "checkoutdate='".date( "Y-m-d H-i-s" )."',realreward=reward,checkout=1";
								$R42f28414d6 = "bindaid=".$R2a51483b14." and checkout=0 and state=5 and createdate > '".$R696350cab3."' and createdate < '".$R1c8e0f6795."' and tradetype=100";
								$Race6ab87b1 = factory::getinstance( "trades" );
								$R808b89ba0e = $Race6ab87b1->ITrade_UpdateStrByStr( $R63bede6b19, $R42f28414d6 );
								if ( $R808b89ba0e )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$R3db8f5c8bc = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,aname" );
												$R3ab1f9eb35 = $R3db8f5c8bc['aremain'];
												$Rc0c42883ee = $R3db8f5c8bc['aremain'] + $R8aa41e9b03;
												$R98bc1630cd = round( $Rc0c42883ee, 2 );
												$data = array( );
												$data['aremain'] = $R98bc1630cd;
												$Ra236db885f = getvar( "remarks" );
												$R5d899a20a5 = $R3db8f5c8bc['aname'];
												$R3db8f5c8bc = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R3db8f5c8bc )
												{
																$Re82ee9b121 = $R696350cab3."至".$R1c8e0f6795;
																$this->TradeCreate( $R2a51483b14, $R8aa41e9b03, $Rc0c42883ee, $R3ab1f9eb35, 61, $Re82ee9b121, $Ra236db885f, $Rcdf47c89e1 );
																$this->Alert( "返点成功" );
												}
												else
												{
																$this->Alert( "返点失败" );
												}
								}
								else
								{
												$this->Alert( "返点失败" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Reward&a=CheckOutTrade" );
				}

				public function TradeCreate( $R2a51483b14, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Rb60574d852, $Re82ee9b121, $R9f5575e717, $R7ae75a8126 )
				{
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$sess = factory::getinstance( "session" );
								$admin = $sess->admin;
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => 61,
												"ordno" => $Rdcd9105806,
												"income" => $R9b252bf0a7,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => 0,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 0,
												"admname" => $admin,
												"listprice" => $R7ae75a8126,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function CheckOutTrade( )
				{
								$this->hander = factory::getinstance( "trades" );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Ra8b176bf4f = getvar( "tradetype", "61" );
								$data = array(
												"ykt" => getvar( "ykt" ),
												"tradetype" => 61,
												"admname" => getvar( "admname" ),
												"noykt" => 1,
												"state" => 5
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(listprice) as listprice" );
								$this->Assign( "record", $R0d2025d631 );
								$R00be52aa45 = array( "aid" => "代理商编号", "content" => "相关说明", "admname" => "管理员操作者" );
								$R8dc7d3eb73 = array( "0" => "所有平台" );
								$R4fa9c48c92 = array( "61" => "一卡通返点" );
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								$this->Assign( "tradetype", getvar( "tradetype" ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
						
												$this->view( );
						
				}

}

?>
