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
class ScoredPayController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "products" );
								$this->session = factory::getinstance( "session" );
								if ( $this->session->agent == "" )
								{
												$this->Alert( "系统已经退出！请重新登陆！" );
												$this->ScriptRedirect( "index.html" );
								}
				}

				public function CheckBuyLit( $Rb3f07f8c36 )
				{
								if ( !isset( $Rb3f07f8c36['pid'] ) )
								{
												$this->Alert( "您好，本商品已经被下架或者删除！" );
												$this->HistoryGo( );
								}
								if ( $Rb3f07f8c36['buylit'] == 1 )
								{
												$Rfe55c18c2f = intval( date( "H" ) );
												$R0030d40a26 = intval( date( "i" ) );
												$Rffc90c84dd = $Rb3f07f8c36['buylitstardate'];
												$R5fca54d15d = $Rb3f07f8c36['buylitenddate'];
												$Rcc5c6e696c = explode( ":", $Rffc90c84dd );
												if ( isset( $Rcc5c6e696c[1] ) )
												{
																$t1 = intval( $Rcc5c6e696c[0] );
																$Re33ba329c4 = intval( $Rcc5c6e696c[1] );
												}
												else
												{
																$t1 = intval( $Rcc5c6e696c[0] );
																$Re33ba329c4 = 0;
												}
												$Rf9156758db = 0;
												if ( $Rfe55c18c2f < $t1 )
												{
																$Rf9156758db = 1;
												}
												else if ( $t1 == $Rfe55c18c2f && $R0030d40a26 <= $Re33ba329c4 )
												{
																$Rf9156758db = 1;
												}
												else
												{
																$Rf9156758db = 0;
												}
												$Rcc5c6e696c = explode( ":", $R5fca54d15d );
												if ( isset( $Rcc5c6e696c[1] ) )
												{
																$t1 = intval( $Rcc5c6e696c[0] );
																$Re33ba329c4 = intval( $Rcc5c6e696c[1] );
												}
												else
												{
																$t1 = intval( $Rcc5c6e696c[0] );
																$Re33ba329c4 = 0;
												}
												$R83ff9c7f53 = 0;
												if ( $t1 < $Rfe55c18c2f )
												{
																$R83ff9c7f53 = 1;
												}
												else if ( $t1 == $Rfe55c18c2f && $Re33ba329c4 <= $R0030d40a26 )
												{
																$R83ff9c7f53 = 1;
												}
												else
												{
																$R83ff9c7f53 = 0;
												}
												if ( $Rf9156758db == 1 && $R83ff9c7f53 == 1 )
												{
																$this->Alert( "您好，本商品销售时间段为每天".$Rffc90c84dd."时至".$R5fca54d15d."时" );
																$this->HistoryGo( );
												}
								}
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R1929afdbab = $Rcc5c6e696c[11];
								$Rdad803ddf9 = explode( ",", $R1929afdbab );
								$Rf5f11a8d38 = count( $Rdad803ddf9 );
								if ( $Rf5f11a8d38 < 20 )
								{
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < 80;	$Ra16d228039++	)
												{
																$Rdad803ddf9[$Ra16d228039] = "0";
												}
								}
								if ( $Rdad803ddf9[52] == 0 )
								{
												$this->Alert( "您好，您没有权限管理积分！" );
												$this->HostoryGo( );
								}
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R66b0d9d6f1 = intval( request( "ubzqty" ) );
								if ( $R8e8b5578f7 <= 0 || $R66b0d9d6f1 <= 0 )
								{
												$this->Alert( "参数有错！" );
												$this->HostoryGo( );
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$this->CheckAgentBuyRight( $R8e8b5578f7, $R2a51483b14 );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,aremain,parentid,alv,company,istest,websetting,tradepwd,pricetpl", 0 );
								if ( !isset( $agent['aremain'] ) )
								{
												$this->Alert( "您好！请确认您的账号是否被管理员冻结或者删除！" );
												$this->HistoryGo( );
								}
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法购买商品的！" );
												$this->HistoryGo( );
								}
								if ( $Rcc5c6e696c[9] == 0 )
								{
												$Rc8c0af4ceb = $agent['websetting'];
												$R97800871bc = explode( "|", $Rc8c0af4ceb );
												if ( isset( $R97800871bc[8] ) && $R97800871bc[8] == 1 )
												{
																$R48aa85bc4e = getvar( "tradepwd" );
																if ( $R48aa85bc4e != $agent['tradepwd'] )
																{
																				$this->Alert( "您输入的交易密码有错！请重新输入" );
																				$this->HistoryGo( );
																}
												}
								}
								else
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
												$R5f84c47438 = factory::getinstance( "staffs", "checktradepwd,tradepwd" );
												$Raac42e4217 = $R5f84c47438->IStaff_Get( $R94e0136c8a );
												if ( !isset( $Raac42e4217['checktradepwd'] ) )
												{
																$this->Alert( "非法登陆" );
																$this->HistoryGo( );
												}
												if ( $Raac42e4217['checktradepwd'] == 1 )
												{
																$R48aa85bc4e = getvar( "tradepwd" );
																if ( $R48aa85bc4e != $Raac42e4217['tradepwd'] )
																{
																				$this->Alert( "您输入的交易密码有错！请重新输入" );
																				$this->HistoryGo( );
																}
												}
								}
								$R5d899a20a5 = $agent['aname'];
								$Rac9b8532b8 = $agent['parentid'];
								$Re2a6348a52 = $agent['alv'];
								$R98bc1630cd = $agent['aremain'];
								$R6cd996866e = $R2a51483b14;
								$Ra36ac3d772 = $agent['company'];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R0dc0347d49 = $Rcc5c6e696c[10];
								}
								else
								{
												$R0dc0347d49 = $R5d899a20a5;
								}
								$Rb3f07f8c36 = $this->hander->IProduct_Get( $R8e8b5578f7, $Re2a6348a52, "*", $R2a51483b14, $Rac9b8532b8 );
								$this->CheckBuyLit( $Rb3f07f8c36 );
								$this->CheckQty( $R66b0d9d6f1, $Rb3f07f8c36 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R3a8b307327 = $this->GetDec( );
								$R0d9f8f778c = 0;
								$R9b252bf0a7 = $R66b0d9d6f1 * $R0d9f8f778c;
								$Race8252ffc = $R0d9f8f778c - $Rb3f07f8c36['price'];
								$Race8252ffc *= $R66b0d9d6f1;
								$Rdbdc604d5a = request( "priceforplayer" );
								$Rdbdc604d5a = doubleval( $Rdbdc604d5a );
								$R7bbd18ce7d = $Rdbdc604d5a - $R0d9f8f778c;
								$R7bbd18ce7d *= $R66b0d9d6f1;
								$Rac210b62cd = getvar( "ubzcrealname", "" );
								$Rae1b02c731 = getvar( "ubzczacount", "" );
								$R8e90cfaacf = getvar( "ubzreczacount", "" );
								$R88f9731c8f = 0;
								$Re6f1bd94c5 = 0;
								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
								$R9f763f8e3d = 0;
								$Ra2f7b8a91c = 0;
								$R56a0725886 = 0;
								if ( $Rb3f07f8c36['ptype'] == 1 || $Rb3f07f8c36['ptype'] == 2 )
								{
												if ( $Rae1b02c731 == "" )
												{
																$this->Alert( "充值账号不能为空" );
																$this->HistoryGo( );
												}
												if ( $Rae1b02c731 != $R8e90cfaacf )
												{
																$this->Alert( "充值账号不一致！请重新输入".$Rae1b02c731.$R8e90cfaacf );
																$this->HistoryGo( );
												}
								}
								$Rbcba4a42af = getvar( "ubzczarea1", "" );
								$Rb46c9cba3c = getvar( "ubzczarea2", "" );
								$Rb2c0dc00fa = getvar( "ubzcztype", "" );
								$R0604d43614 = getvar( "ubzczother", "" );
								$R9a73b823de = getvar( "ubzca1", "" );
								$R45a74f4e85 = getvar( "ubzca2", "" );
								$R06f34ab9da = getvar( "ubzct", "" );
								$R3bb64a369e = getvar( "ubzco", "" );
								$R5204d30600 = getvar( "others", "" );
								$Rdcd9105806 = createordno( );
								global $masterid;
								$R2a51483b14 = intval( $Rb3f07f8c36['aid'] );
								$R07e1b7ba62 = 0;
								$data = array(
												"ordno" => $Rdcd9105806,
												"pid" => $R8e8b5578f7,
												"ptype" => $Rb3f07f8c36['ptype'],
												"pname" => $Rb3f07f8c36['pname'],
												"dollars" => $R9b252bf0a7,
												"cprice" => $R0d9f8f778c,
												"price" => $Rb3f07f8c36['price'],
												"profit" => $Race8252ffc,
												"staffprofit" => $R7bbd18ce7d,
												"buyerprice" => $Rdbdc604d5a,
												"aname" => $R5d899a20a5,
												"aid" => $R2a51483b14,
												"cid" => $R6cd996866e,
												"company" => $Ra36ac3d772,
												"fee" => $R07e1b7ba62,
												"cname" => $R0dc0347d49,
												"crealname" => $Rac210b62cd,
												"ctel" => "",
												"cmail" => "",
												"cqq" => "",
												"czaccount" => $Rae1b02c731,
												"czarea1" => $Rbcba4a42af,
												"czarea2" => $Rb46c9cba3c,
												"cztype" => $Rb2c0dc00fa,
												"czother" => $R0604d43614,
												"ca1" => $R9a73b823de,
												"ca2" => $R45a74f4e85,
												"ct" => $R06f34ab9da,
												"co" => $R3bb64a369e,
												"namehide" => getvar( "namehide", "" ),
												"qty" => $R66b0d9d6f1,
												"qtyleft" => $R66b0d9d6f1,
												"cip" => $this->GetIp( ),
												"ordstate" => 0,
												"orddate" => date( "Y-m-d H-i-s" ),
												"payment" => 96,
												"others" => htmlspecialchars( $R5204d30600 ),
												"tradeterm" => $Rb3f07f8c36['tradeterm'] == null ? "" : $Rb3f07f8c36['tradeterm'],
												"acountpwd" => getvar( "ubzacountpwd", "" ),
												"rolename" => getvar( "ubzrolename", "" ),
												"comefrom" => 1,
												"listprice" => $Red2b3403a5,
												"scored" => $R88f9731c8f,
												"reward" => $Re6f1bd94c5,
												"saleid" => $R9f763f8e3d,
												"selldollars" => $R56a0725886,
												"sellscale" => $Ra2f7b8a91c,
												"sellcheck" => 0,
												"bossprice" => $Rb3f07f8c36['price']
								);
								$R808b89ba0e = true;
								if ( $this->IsSup( $R66b0d9d6f1, $Rb3f07f8c36 ) )
								{
												$R808b89ba0e = $this->ScoredMoney( $data );
												if ( $R808b89ba0e )
												{
																$data['sup'] = 1;
																$data['ordstate'] = 1;
																$R808b89ba0e = $Rdeabc7f106->IOrder_Create( $data );
																if ( $R808b89ba0e )
																{
																				$R920143e856 = factory::getservice( "sorders" );
																				$R8df6e173c6 = $R920143e856->GetHost( ).UPATH_WEBROOT;
																				$R920143e856->IOrder_SaveForYkt( $this->GetParam( $data, $R8df6e173c6, $Rb3f07f8c36['cztpl'] ) );
																}
																else
																{
																				$this->Alert( ",下单失败！请您重新下订单！" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																$this->Alert( "付款失败！请重新下订单！" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->GetCard( $data );
								}
							
												$this->Assign( "ordno", $Rdcd9105806 );
												$this->View( );
								
				}

				public function IsSup( $R66b0d9d6f1, $Rb3f07f8c36 = array( ) )
				{
								$R8e8b5578f7 = $Rb3f07f8c36['pid'];
								$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								if ( 0 < $R98aa12da5c )
								{
												if ( $Rb3f07f8c36['hassup'] == 0 && $Rb3f07f8c36['ptype'] != 0 && $Rb3f07f8c36['ptype'] != 3 )
												{
																return 0;
												}
												return 1;
								}
								$Rdc3f776eb3 = $Rb3f07f8c36['stocks'];
								$Rade6d1cee2 = $Rb3f07f8c36['supfirst'];
								if ( UB_SUP == 0 || $Rb3f07f8c36['hassup'] == -1 )
								{
												return 0;
								}
								if ( $Rade6d1cee2 == 0 && $Rdc3f776eb3 < $R66b0d9d6f1 )
								{
												return 1;
								}
								if ( $Rade6d1cee2 == 1 )
								{
												return 1;
								}
								return 0;
				}

				public function GetCard( $R56ea904d53 = array( ) )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R1b69c92460 = $R56ea904d53['ptype'];
								if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 || 99 < $R1b69c92460 )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$R775f79f010 = $Rf541845af3->ICard_Buy( $R56ea904d53['qty'], $R56ea904d53['pid'], false, $Rdcd9105806, $R56ea904d53['czaccount'] );
												if ( count( $R775f79f010 ) < $R56ea904d53['qty'] )
												{
																$this->Alert( "库存不足！" );
																$this->HistoryGo( );
												}
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R808b89ba0e = $Rdeabc7f106->IOrder_Create( $R56ea904d53 );
								if ( !$R808b89ba0e )
								{
												$this->Alert( ",下单失败！请您重新下订单！" );
												$this->HistoryGo( );
								}
								$R808b89ba0e = $this->ScoredMoney( $R56ea904d53 );
								if ( !$R808b89ba0e )
								{
												$this->HistoryGo( );
								}
								if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 || 99 < $R1b69c92460 )
								{
												$R026f0167b4 = array( );
												foreach ( $R775f79f010 as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['id'];
												}
												$R3584859062 = implode( ",", $R026f0167b4 );
												$R1b69c92460 = $R56ea904d53['ptype'];
												$data = array(
																"ordno" => $Rdcd9105806,
																"orddate" => date( "Y-m-d H-i-s" )
												);
												if ( $R1b69c92460 < 100 )
												{
																$data['cardok'] = 0;
												}
												$Rf541845af3->ICard_UpdateMany( $data, $R3584859062 );
												$data = array(
																"payment" => 96,
																"ordstate" => 2,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$data['agentprofit'] = 0;
								}
								else
								{
												$data = array(
																"payment" => 96,
																"ordstate" => 1,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R808b89ba0e = $Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
				}

				public function CheckScoredBuy( $R8e8b5578f7 )
				{
								$Re0b6343833 = intval( request( "scoredpid" ) );
								if ( $Re0b6343833 <= 0 )
								{
												return false;
								}
								$R37ad834577 = $this->GetScoredProductCache( $Re0b6343833 );
								if ( !isset( $R37ad834577['pid'] ) || $R37ad834577['method'] != 3 || $R37ad834577['param'] != $R8e8b5578f7 )
								{
												return false;
								}
								if ( $R37ad834577['scored'] < 0 )
								{
												return false;
								}
								return true;
				}

				public function ScoredMoney( $R56ea904d53 = array( ) )
				{
								$Re0b6343833 = intval( request( "scoredpid" ) );
								if ( $Re0b6343833 <= 0 )
								{
												$this->alert( "非法参数！" );
												return false;
								}
								$R66b0d9d6f1 = $R56ea904d53['qty'];
								$R14f21eedf1 = factory::getinstance( "scoredproduct" );
								$R37ad834577 = $R14f21eedf1->IScoredProduct_Get( $Re0b6343833 );
								if ( !isset( $R37ad834577['pid'] ) || $R37ad834577['method'] != 3 || $R37ad834577['param'] != $R56ea904d53['pid'] )
								{
												$this->alert( "此商品不允许使用积分进行兑换！" );
												return false;
								}
								if ( $R37ad834577['stocks'] < $R56ea904d53['qty'] )
								{
												$this->alert( "您好，系统已经没有充足的数量供您兑换，请等待系统补充再进行兑换！" );
												$this->HistoryGo( );
								}
								$R114f28ca48 = $R56ea904d53['qty'] * $R37ad834577['scored'];
								$R114f28ca48 = intval( $R114f28ca48 );
								if ( $R114f28ca48 < 0 )
								{
												$this->alert( "非法参数！" );
												return false;
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R0dc0347d49 = 0 < $R94e0136c8a ? $R94e0136c8a : $R2a51483b14;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored" );
								if ( !isset( $agent['scored'] ) )
								{
												$this->alert( "用户不存在！" );
												return false;
								}
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 - $R114f28ca48;
								if ( $Rc0c42883ee < 0 )
								{
												$this->alert( "您的积分不足以兑换这么多数量的商品" );
												return false;
								}
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"stocks" => $R37ad834577['stocks'] - $R66b0d9d6f1
												);
												$R14f21eedf1->IScoredProduct_Update( $data, $Re0b6343833 );
												$R645c69ff15 = factory::getinstance( "scored" );
												$data = array(
																"ordno" => $R56ea904d53['ordno'],
																"pname" => $R37ad834577['pname'],
																"qty" => $R56ea904d53['qty'],
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R94e0136c8a,
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => 5,
																"method" => $R37ad834577['method']
												);
												$R645c69ff15->IScored_Create( $data );
												$data = array(
																"ordno" => $R56ea904d53['ordno'],
																"pname" => $R37ad834577['pname'],
																"pid" => $R37ad834577['pid'],
																"method" => $R37ad834577['method'],
																"param" => $R37ad834577['param'],
																"qty" => $R56ea904d53['qty'],
																"scored" => $R114f28ca48,
																"aid" => $R2a51483b14,
																"staffid" => $R94e0136c8a,
																"createdate" => date( "Y-m-d H-i-s" ),
																"ordstate" => 1,
																"cip" => $this->GetIp( ),
																"comefrom" => 1
												);
												$Rf3d646c485 = factory::getinstance( "scoredorder" );
												$Rf3d646c485->IScoredOrder_Create( $data );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function GetParam( $R56ea904d53, $R8df6e173c6, $R0f571378e3 = 0 )
				{
								$data = array(
												"ubzordno" => urlencode( $R56ea904d53['ordno'] ),
												"ubzdollars" => $R56ea904d53['dollars'],
												"ubzprice" => $R56ea904d53['price'],
												"ubzcprice" => $R56ea904d53['cprice'],
												"ubzpid" => intval( $R56ea904d53['pid'] ),
												"ubzpname" => urlencode( $R56ea904d53['pname'] ),
												"ubzptype" => urlencode( $R56ea904d53['ptype'] ),
												"ubzcname" => urlencode( $R56ea904d53['cname'] ),
												"ubzcrealname" => urlencode( $R56ea904d53['crealname'] ),
												"ubzctel" => urlencode( $R56ea904d53['ctel'] ),
												"ubzcmail" => urlencode( $R56ea904d53['cmail'] ),
												"ubzcqq" => urlencode( $R56ea904d53['cqq'] ),
												"ubzczacount" => urlencode( $R56ea904d53['czaccount'] ),
												"ubzczarea1" => urlencode( $R56ea904d53['czarea1'] ),
												"ubzczarea2" => urlencode( $R56ea904d53['czarea2'] ),
												"ubzcztype" => urlencode( $R56ea904d53['cztype'] ),
												"ubzczother" => urlencode( $R56ea904d53['czother'] ),
												"ubzca1" => urlencode( $R56ea904d53['ca1'] ),
												"ubzca2" => urlencode( $R56ea904d53['ca2'] ),
												"ubzct" => urlencode( $R56ea904d53['ct'] ),
												"ubzco" => urlencode( $R56ea904d53['co'] ),
												"ubzqty" => intval( $R56ea904d53['qty'] ),
												"ubzcip" => urlencode( $R56ea904d53['cip'] ),
												"ubzurl" => $R8df6e173c6,
												"ubzcztpl" => $R0f571378e3
								);
								return $data;
				}

}

?>
