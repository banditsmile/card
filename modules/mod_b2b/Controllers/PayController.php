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
class PayController extends Controller
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

				public function EchoTime( )
				{
								global $pagestartime;
								$R7585d9cf9f = microtime( );
								$R42293ef400 = explode( " ", $pagestartime );
								$R45b8aef82a = explode( " ", $R7585d9cf9f );
								$R6dd222762e = $R45b8aef82a[0] - $R42293ef400[0] + $R45b8aef82a[1] - $R42293ef400[1];
								$Rac2188aa52 = sprintf( "%s", $R6dd222762e );
								echo "页面运行时间: {$Rac2188aa52} 秒<br/>";
				}

				public function CheckBuyLit( $Rb3f07f8c36, $R66b0d9d6f1 = 0 )
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
												if ( $t1 < $Rfe55c18c2f )
												{
																$Rf9156758db = 1;
												}
												else if ( $t1 == $Rfe55c18c2f && $Re33ba329c4 <= $R0030d40a26 )
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
												if ( $Rfe55c18c2f < $t1 )
												{
																$R83ff9c7f53 = 1;
												}
												else if ( $t1 == $Rfe55c18c2f && $R0030d40a26 <= $Re33ba329c4 )
												{
																$R83ff9c7f53 = 1;
												}
												else
												{
																$R83ff9c7f53 = 0;
												}
												$Rffc87a6d6d = array( );
												if ( isset( $Rb3f07f8c36['prop'] ) && $Rb3f07f8c36['prop'] != "" )
												{
																$Rffc87a6d6d = unserialize( $Rb3f07f8c36['prop'] );
												}
												if ( isset( $Rffc87a6d6d['buylitobject'] ) && $Rffc87a6d6d['buylitobject'] == 0 )
												{
																$R66607d1259 = 0;
												}
												else
												{
																$R66607d1259 = 1;
												}
												if ( $R66607d1259 == 1 )
												{
																if ( $Rf9156758db == 0 || $R83ff9c7f53 == 0 )
																{
																				$this->Alert( "您好，本商品销售时间段为每天".$Rffc90c84dd."时至".$R5fca54d15d."时" );
																				$this->HistoryGo( );
																}
												}
												else if ( $Rf9156758db == 1 && $R83ff9c7f53 == 1 )
												{
																$this->Alert( "您好，本商品在每天".$Rffc90c84dd."时至".$R5fca54d15d."时是禁止销售的" );
																$this->HistoryGo( );
												}
								}
								if ( isset( $Rb3f07f8c36['buyaday'] ) && 0 < $Rb3f07f8c36['buyaday'] )
								{
												$Rc884512fa5 = $Rb3f07f8c36['buyaday'];
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R20fd65e9c7 = date( "Y-m-d" );
												$Rb7492a73f7 = " pid=".$Rb3f07f8c36['pid']." and orddate > '".$R20fd65e9c7."' and cid=".$R2a51483b14." ";
												$R355ef3fa24 = $Rdeabc7f106->IOrder_GetByStr( $Rb7492a73f7, "aid,qty" );
												$Rf7e1d95573 = 0;
												foreach ( $R355ef3fa24 as $R0f8134fb60 )
												{
																$Rf7e1d95573 += $R0f8134fb60['qty'];
												}
												$Rf7e1d95573 += $R66b0d9d6f1;
												if ( $Rc884512fa5 < $Rf7e1d95573 )
												{
																$this->Alert( "您好，本商品一个客户一天只允许购买 ".$Rc884512fa5." 张卡" );
																$this->HistoryGo( );
												}
								}
								global $masterid;
								if ( 0 < $masterid )
								{
												$R8bce2d676e = $this->ShowMainProduct( );
												if ( $R8bce2d676e == 0 )
												{
																$R4e420efcc3 = $this->RetPi( array(
																				"0" => $Rb3f07f8c36
																) );
																if ( !isset( $R4e420efcc3[0]['ptype'] ) )
																{
																				$this->Alert( "商品不存在！" );
																				$this->HistoryGo( );
																}
												}
								}
				}

				public function CheckCanBuyTime( $R5b08d4f823 )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$R52690cedc4 = 0;
								$Ra7875614d8 = explode( "|", $R30b2ab8dc1['config'] );
								if ( isset( $Ra7875614d8[32] ) )
								{
												$R52690cedc4 = $Ra7875614d8[32];
								}
								if ( $R52690cedc4 <= 0 )
								{
												return 0;
								}
								$R768ed9c2d9 = "30分钟";
								switch ( $R52690cedc4 )
								{
								case 1800 :
												$R768ed9c2d9 = "30分钟";
												break;
								case 3600 :
												$R768ed9c2d9 = "1小时";
												break;
								case 10800 :
												$R768ed9c2d9 = "3小时";
												break;
								case 21600 :
												$R768ed9c2d9 = "6小时";
												break;
								case 43200 :
												$R768ed9c2d9 = "12小时";
												break;
								case 172800 :
												$R768ed9c2d9 = "48小时";
												break;
								case 259200 :
												$R768ed9c2d9 = "3天";
												break;
								case 432000 :
												$R768ed9c2d9 = "5天";
												break;
								case 604800 :
												$R768ed9c2d9 = "7天";
												break;
								default :
												break;
								}
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								if ( $R35a9abe007 < $R52690cedc4 )
								{
												$this->Alert( "您好，系统设置新注册用户".$R768ed9c2d9."后才能购卡！" );
												$this->CloseWin( );
								}
				}

				public function Index( )
				{
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R66b0d9d6f1 = intval( request( "ubzqty" ) );
								if ( $R8e8b5578f7 <= 0 || $R66b0d9d6f1 <= 0 )
								{
												$this->Alert( "参数有错！" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$this->CheckAgentBuyRight( $R8e8b5578f7, $R2a51483b14 );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,aremain,parentid,alv,company,istest,websetting,tradepwd,pricetpl,regdate", 0 );
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
								$this->CheckCanBuyTime( $agent['regdate'] );
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
								if ( !isset( $Rb3f07f8c36['pid'] ) )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								if ( $Rb3f07f8c36['sell'] == 0 || $Rb3f07f8c36['forb2b'] == 0 )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$this->CheckBuyLit( $Rb3f07f8c36, $R66b0d9d6f1 );
								$this->CheckQty( $R66b0d9d6f1, $Rb3f07f8c36 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R3a8b307327 = $this->GetDec( );
								$R0d9f8f778c = $this->GetPriceById( $Rb3f07f8c36, $agent, $R3a8b307327 );
								if ( $R0d9f8f778c < 0 )
								{
												$this->Alert( "价格非法，请联系客服！" );
												$this->HistoryGo( );
								}
								$R9b252bf0a7 = $R66b0d9d6f1 * $R0d9f8f778c;
								if ( $R9b252bf0a7 < 0 )
								{
												$this->Alert( "价格非法，请联系客服！" );
												$this->HistoryGo( );
								}
								if ( $R98bc1630cd < $R9b252bf0a7 )
								{
												$this->Alert( "商户余额不足，请补充余额后再购买！" );
												$this->HistoryGo( );
								}
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R0dc0347d49 = $Rcc5c6e696c[10];
												$R5f84c47438 = factory::getinstance( "staffs" );
												$Re9aea161f5 = $R5f84c47438->IStaff_GetByName( $R0dc0347d49, "dayconsum" );
												if ( !isset( $Re9aea161f5['dayconsum'] ) )
												{
																$this->Alert( "您的账号不在了啊！马上联系老板先" );
																$this->HistoryGo( );
												}
												if ( 0 < $Re9aea161f5['dayconsum'] )
												{
																$R4f6dd3397f = $Rdeabc7f106->IOrder_SumByStaffName( $R0dc0347d49 );
																$Rf8d1670132 = $R4f6dd3397f + $R9b252bf0a7;
																if ( $Re9aea161f5['dayconsum'] < $Rf8d1670132 )
																{
																				$this->Alert( "您好，您每日只允许消费".$Re9aea161f5['dayconsum'].", 此次购买将会超出限额！" );
																				$this->HistoryGo( );
																}
												}
								}
								$Race8252ffc = $R0d9f8f778c - $Rb3f07f8c36['price'];
								$Race8252ffc *= $R66b0d9d6f1;
								$Rdbdc604d5a = request( "priceforplayer" );
								$Rdbdc604d5a = doubleval( $Rdbdc604d5a );
								$R7bbd18ce7d = $Rdbdc604d5a - $R0d9f8f778c;
								$R7bbd18ce7d *= $R66b0d9d6f1;
								$Rac210b62cd = getvar( "ubzcrealname", "" );
								$Rae1b02c731 = trim( getvar( "ubzczacount", "" ) );
								$R8e90cfaacf = trim( getvar( "ubzreczacount", "" ) );
								$R88f9731c8f = $Rb3f07f8c36['scored'] * $R66b0d9d6f1;
								$Re6f1bd94c5 = $Rb3f07f8c36['reward'] * $R66b0d9d6f1;
								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
								$R8a39b457bb = $R2a51483b14;
								$R03d60ef27f = factory::getinstance( "sales" );
								$data = array(
												"underlingid" => $R8a39b457bb
								);
								$R46ec61e433 = $R03d60ef27f->ISales_Get( $data );
								$R55ee8b3585 = $Rb3f07f8c36['price'];
								if ( isset( $R46ec61e433[0]['id'] ) )
								{
												$R9f763f8e3d = $R46ec61e433[0]['id'];
												$Ra2f7b8a91c = $R46ec61e433[0]['sellscale'];
												$R56a0725886 = $Ra2f7b8a91c * $R9b252bf0a7;
												$R56a0725886 = round( $R56a0725886, 3 );
												if ( 0 < $Rac9b8532b8 )
												{
																$R1456e39f42 = $R2097a8fddf->IAgent_Get( $Rac9b8532b8, "aid,aname,aremain,parentid,alv,company,istest,pricetpl", 0 );
																$R55ee8b3585 = $this->GetPriceById( $Rb3f07f8c36, $R1456e39f42, $R3a8b307327 );
												}
								}
								else
								{
												$R9f763f8e3d = 0;
												$Ra2f7b8a91c = 0;
												$R56a0725886 = 0;
								}
								if ( $Rb3f07f8c36['ptype'] == 1 || $Rb3f07f8c36['ptype'] == 2 )
								{
												if ( trim( $Rae1b02c731 ) == "" )
												{
																$this->Alert( "充值账号不能为空" );
																$this->HistoryGo( );
												}
												if ( $Rae1b02c731 != $R8e90cfaacf )
												{
																$this->Alert( "充值账号不一致！请重新输入" );
																$this->HistoryGo( );
												}
								}
								$Rbcba4a42af = getvar( "ubzczarea1", "" );
								$Rb46c9cba3c = getvar( "ubzczarea2", "" );
								$Rb2c0dc00fa = getvar( "ubzcztype", "" );
								$R0604d43614 = getvar( "ubzczother", "" );
								$Re40d4e4e13 = getvar( "ubzthisgame", "" );
								$R9a73b823de = getvar( "ubzca1", "" );
								$R45a74f4e85 = getvar( "ubzca2", "" );
								$R06f34ab9da = getvar( "ubzct", "" );
								$R3bb64a369e = getvar( "ubzco", "" );
								$R5204d30600 = getvar( "others", "" );
								$R44a02c0282 = getvar( "ubzcztypetxt", "" );
								$R984bfcb382 = getvar( "ubzczothertxt", "" );
								$R2ccbab2bc4 = getvar( "accountpwdtxt", "" );
								if ( $R44a02c0282 != "" )
								{
												$R44a02c0282 .= "::";
												$Rb2c0dc00fa = $R44a02c0282.$Rb2c0dc00fa;
								}
								if ( $R984bfcb382 != "" )
								{
												$R984bfcb382 .= "::";
												$R0604d43614 = $R984bfcb382.$R0604d43614;
								}
								if ( $R2ccbab2bc4 != "" )
								{
												$R2ccbab2bc4 .= "::";
								}
								$Rdcd9105806 = createordno( );
								if ( $Rdcd9105806 == "0" )
								{
												$this->Alert( "下单异常，未扣款，请重新提交" );
												$this->HistoryGo( );
								}
								global $masterid;
								$R2a51483b14 = intval( $Rb3f07f8c36['aid'] );
								$R07e1b7ba62 = doubleval( $Rb3f07f8c36['pfee'] );
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
												"thisgame" => $Re40d4e4e13,
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
												"payment" => 98,
												"others" => htmlspecialchars( $R5204d30600 ),
												"tradeterm" => $Rb3f07f8c36['tradeterm'] == null ? "" : $Rb3f07f8c36['tradeterm'],
												"acountpwd" => $R2ccbab2bc4.getvar( "accountpwd", "" ),
												"rolename" => getvar( "ubzrolename", "" ),
												"comefrom" => 1,
												"listprice" => $Red2b3403a5,
												"scored" => $R88f9731c8f,
												"reward" => $Re6f1bd94c5,
												"saleid" => $R9f763f8e3d,
												"selldollars" => $R56a0725886,
												"sellscale" => $Ra2f7b8a91c,
												"sellcheck" => 0,
												"bossprice" => $R55ee8b3585
								);
								$R808b89ba0e = true;
								if ( $this->IsSup( $R66b0d9d6f1, $Rb3f07f8c36 ) )
								{
												$this->CheckServer( );
												$R7d15bbfaac = intval( request( "ubzmaxqty" ) );
												if ( $R7d15bbfaac == 0 )
												{
																$this->CheckCzInfo( $data, $Rb3f07f8c36['cztpl'], 2 );
												}
												$R808b89ba0e = $this->Money( $data );
												if ( $R808b89ba0e )
												{
																$data['sup'] = 1;
																$data['ordstate'] = 1;
																$R808b89ba0e = $Rdeabc7f106->IOrder_Create( $data );
																if ( $R808b89ba0e )
																{
																				$R920143e856 = factory::getservice( "sorders" );
																				$R8df6e173c6 = $R920143e856->GetHost( ).UPATH_WEBROOT;
																				$Re4e4d12350 = $R920143e856->IOrder_SaveForYkt( $this->GetParam( $data, $R8df6e173c6, $Rb3f07f8c36 ) );
																				if ( isset( $Re4e4d12350['errcode'] ) )
																				{
																								if ( 1 < $Re4e4d12350['errcode'] )
																								{
																												$R2b3149b837 = array(
																																"co" => $Re4e4d12350['errcode'].":".$Re4e4d12350['content']
																												);
																												$Rdeabc7f106->IOrder_Update( $R2b3149b837, $Rdcd9105806 );
																								}
																								else
																								{
																												$this->QAck( $data );
																								}
																				}
																				else
																				{
																								$R2b3149b837 = array( "co" => "与进货系统无法通信" );
																								$Rdeabc7f106->IOrder_Update( $R2b3149b837, $Rdcd9105806 );
																				}
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
												$this->GetCard( $data, $Rb3f07f8c36 );
								}
							
												$this->Assign( "ordno", $Rdcd9105806 );
												$this->View( );
								
				}

				public function QAck( $data )
				{
								$Rdcd9105806 = $data['ordno'];
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$R6afe761ae0 = $this->GetBizKey( );
								$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
								$Re9b5f92229 = factory::getservice( "ack" );
								$Re9b5f92229->iack( $data, $R4b19c1abc4 );
				}

				public function IsSup( $R66b0d9d6f1, $Rb3f07f8c36 = array( ) )
				{
								$R8e8b5578f7 = $Rb3f07f8c36['pid'];
								$R98aa12da5c = $Rb3f07f8c36['onsup'];
								if ( 0 < $R98aa12da5c )
								{
												$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								}
								if ( 0 < $R98aa12da5c )
								{
												if ( $Rb3f07f8c36['hassup'] == 0 && $Rb3f07f8c36['ptype'] != 0 && $Rb3f07f8c36['ptype'] != 3 )
												{
																return 0;
												}
												if ( $Rb3f07f8c36['ptype'] == 2 )
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

				public function GetCard( $R56ea904d53 = array( ), $Rb3f07f8c36 = array( ) )
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
								$R808b89ba0e = $this->Money( $R56ea904d53 );
								if ( !$R808b89ba0e )
								{
												$this->HistoryGo( );
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R808b89ba0e = $Rdeabc7f106->IOrder_Create( $R56ea904d53 );
								if ( !$R808b89ba0e )
								{
												$this->Alert( ",下单失败！请您重新下订单！" );
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
												if ( $R1b69c92460 == 100 )
												{
																$Rcc5c6e696c = $this->session->agent;
																$R2a51483b14 = $Rcc5c6e696c[7];
																$data['bindaid'] = $R2a51483b14;
																$data['okbyaid'] = 1;
																if ( intval( $Rb3f07f8c36['sale'] ) == 0 )
																{
																				$data['cprice'] = $R56ea904d53['cprice'];
																}
																$data['ispay'] = 1;
												}
												$Rf541845af3->ICard_UpdateMany( $data, $R3584859062 );
												$data = array(
																"payment" => 98,
																"ordstate" => 2,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->UpdateRank( $R56ea904d53['aname'], $R56ea904d53['dollars'] );
												$R60144b28c1 = $this->AgentProfit( $R56ea904d53['aname'], $R56ea904d53['pid'], $R56ea904d53['qty'], $Rdcd9105806, $R56ea904d53['pname'], $R56ea904d53['aid'] );
												$data['agentprofit'] = $R60144b28c1;
												if ( 0 < $R56ea904d53['aid'] && 0 <= $R60144b28c1 )
												{
																$R56ea904d53['agentprofit'] = $R60144b28c1;
																$R105a79440a = factory::getinstance( "ack" );
																$R2903714d94 = $R105a79440a->UpdateSup( $R56ea904d53 );
																$data = array_merge( $data, $R2903714d94 );
												}
												$this->AgentScored( $R56ea904d53 );
								}
								else
								{
												$data = array(
																"payment" => 98,
																"ordstate" => 1,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R808b89ba0e = $Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
				}

				public function AgentScored( $R56ea904d53 )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R88f9731c8f = $R56ea904d53['scored'];
								if ( 0 < $R88f9731c8f && $R56ea904d53['aid'] != $Rcc5c6e696c[7] )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored" );
												$Re6dea2fc8d = $agent['scored'];
												$R386bfdf511 = $Re6dea2fc8d + $R56ea904d53['scored'];
												$data = array(
																"scored" => $R386bfdf511
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$data = array(
																				"ordno" => $R56ea904d53['ordno'],
																				"pname" => $R56ea904d53['pname'],
																				"qty" => $R56ea904d53['qty'],
																				"scored" => $R56ea904d53['scored'],
																				"fat" => $R386bfdf511,
																				"fbt" => $Re6dea2fc8d,
																				"aid" => $R2a51483b14,
																				"staffid" => $Rcc5c6e696c[9],
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"state" => 5,
																				"method" => 3
																);
																$R645c69ff15 = factory::getinstance( "scored" );
																$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												}
								}
				}

				public function AddFunds( $R2a51483b14, $R9b252bf0a7, $Rdcd9105806 )
				{
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "funds,aid" );
								$Rd8fb5ae7df = $agent['funds'] + $R9b252bf0a7;
								$data = array(
												"funds" => $Rd8fb5ae7df
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												return true;
								}
								else
								{
												return false;
								}
				}

				public function GetRank1( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function UpdateRank( $R45074ab3da, $R72852f08e6 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R45074ab3da, "acsmp, alv, aid, parentid" );
								$Re90242a509 = $agent['acsmp'];
								$R046b4585a2 = $this->GetRank1( $Re90242a509, "name,id" );
								if ( !isset( $R046b4585a2['id'] ) )
								{
												return 2;
								}
								if ( 0 < $agent['parentid'] )
								{
												$R9aa102385f = $R2097a8fddf->IAgent_GetByName( $agent['parentid'], "alv" );
												$Rbe5b8dea24 = $R9aa102385f['alv'];
												if ( $R046b4585a2['id'] == $Rbe5b8dea24 )
												{
																return 2;
												}
								}
								if ( $agent['alv'] == $R046b4585a2['id'] )
								{
												return 2;
								}
								else
								{
												$data = array(
																"alv" => $R046b4585a2['id']
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $agent['aid'] );
												if ( $R808b89ba0e )
												{
																$Rcc5c6e696c = $this->session->agent;
																$Rcc5c6e696c[5] = $R046b4585a2['id'];
																$Rcc5c6e696c[2] = $R046b4585a2['name'];
																$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function Money( $R56ea904d53 = array( ) )
				{
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$R4f39743f74 = $R56ea904d53['cprice'];
								$R6fcb478b0b = $R56ea904d53['buyerprice'];
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R0dc0347d49 = 0 < $R94e0136c8a ? $R94e0136c8a : $R2a51483b14;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,acsmp" );
								if ( $R9b252bf0a7 < 0 )
								{
												$this->alert( "价格有问题，请联系客服" );
												return false;
								}
								$R98bc1630cd = $agent['aremain'] - $R9b252bf0a7;
								if ( $R98bc1630cd < 0 )
								{
												$this->alert( "经销商余额不足！请补满余额后再购买" );
												return false;
								}
								$Rcc5c6e696c[6] = $R98bc1630cd;
								$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
								$Re90242a509 = $agent['acsmp'] + $R9b252bf0a7;
								$data = array(
												"aremain" => $R98bc1630cd,
												"acsmp" => $Re90242a509
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R3ab1f9eb35 = $agent['aremain'];
												$Rc0c42883ee = $R98bc1630cd;
												$this->UpdateTrade( $R2a51483b14, 1, $R56ea904d53['ordno'], $R0dc0347d49, $R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], 0, 0, $Rc0c42883ee, $R3ab1f9eb35, $R6fcb478b0b, $R9b252bf0a7 );
												return true;
								}
								else
								{
												$this->alert( "扣款失败，请重新下单！" );
												return false;
								}
				}

				public function UpdateTrade( $R2a51483b14, $Ra8b176bf4f, $Rdcd9105806, $R63384ccc42, $R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $Race8252ffc, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Red2b3403a5, $Rd541ac7c24 = 0 )
				{
								$Re82ee9b121 = $R65edce27dd." x ".$R63d0786ecc."(".$R66b0d9d6f1.")";
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"ordno" => $Rdcd9105806,
												"income" => $Race8252ffc,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"qty" => $R66b0d9d6f1,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function CheckPrice( $R5d899a20a5, $R8e8b5578f7 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R5d899a20a5 );
								if ( $agent['parentid'] == 0 )
								{
												return true;
								}
								$R4f39743f74 = $this->hander->IProduct_GetPrice( $agent['alv'], $R8e8b5578f7, $agent['parentid'], $agent['aid'] );
								$R9aa102385f = $R2097a8fddf->IAgent_Get( $agent['parentid'], "aname,alv,income,aid,parentid" );
								$R55ee8b3585 = $this->hander->IProduct_GetPrice( $R9aa102385f['alv'], $R8e8b5578f7, $R9aa102385f['parentid'], $R9aa102385f['aid'] );
								if ( $R4f39743f74 < $R55ee8b3585 )
								{
												return false;
								}
								else
								{
												return $this->CheckPrice( $R9aa102385f['aname'], $R8e8b5578f7 );
								}
				}

				public function GetParam( $R56ea904d53, $R8df6e173c6, $Rb3f07f8c36 = array( ) )
				{
								$R0f571378e3 = $Rb3f07f8c36['cztpl'];
								$R61daf1a18c = intval( $Rb3f07f8c36['sale'] );
								if ( $R61daf1a18c == 0 )
								{
												$R0d9f8f778c = $R56ea904d53['cprice'];
												$R63bede6b19 = "";
								}
								else
								{
												$R0d9f8f778c = $Rb3f07f8c36['listprice'];
												$R63bede6b19 = "促销-";
								}
								$data = array(
												"ubzordno" => urlencode( $R56ea904d53['ordno'] ),
												"ubzdollars" => $R56ea904d53['dollars'],
												"ubzprice" => $R56ea904d53['price'],
												"ubzcprice" => $R0d9f8f778c,
												"ubzpid" => intval( $R56ea904d53['pid'] ),
												"ubzpname" => urlencode( $R63bede6b19.$R56ea904d53['pname'] ),
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
												"ubzthisgame" => urlencode( $R56ea904d53['thisgame'] ),
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
