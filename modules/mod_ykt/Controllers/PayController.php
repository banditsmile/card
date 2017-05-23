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
				public $session = NULL;
				public $card = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "products" );
								$this->session = factory::getinstance( "session" );
								$this->card = factory::getinstance( "cards" );
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

				public function CheckBuyLit( $Rb3f07f8c36 )
				{
								if ( !isset( $Rb3f07f8c36['pid'] ) || $Rb3f07f8c36['sell'] < 1 || $Rb3f07f8c36['forykt'] < 1 )
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
				}

				public function CheckBuyLit1( $Rb3f07f8c36, $R28e6bfe150 )
				{
								$Rffc87a6d6d = array( );
								if ( isset( $Rb3f07f8c36['prop'] ) && $Rb3f07f8c36['prop'] != "" )
								{
												$Rffc87a6d6d = unserialize( $Rb3f07f8c36['prop'] );
								}
								$R052f5dc4d4 = $Rb3f07f8c36['yktipchecktime'];
								$R23fa91262b = $Rb3f07f8c36['yktipchecknum'];
								if ( 0 < $R052f5dc4d4 && 0 < $R23fa91262b )
								{
												$R291be03162 = $this->GetIp( );
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R63bede6b19 = "-".$R052f5dc4d4." minutes";
												$R20fd65e9c7 = date( "Y-m-d H:i:s", strtotime( $R63bede6b19 ) );
												$Rb7492a73f7 = "pid=".$Rb3f07f8c36['pid']." and orddate > '".$R20fd65e9c7."' and cip='".$R291be03162."'";
												$R355ef3fa24 = $Rdeabc7f106->IOrder_GetByStr( $Rb7492a73f7, "aid" );
												if ( $R23fa91262b <= count( $R355ef3fa24 ) )
												{
																$R63bede6b19 = "";
																if ( isset( $Rffc87a6d6d['yktipmore'] ) && $Rffc87a6d6d['yktipmore'] == 1 )
																{
																				$this->SetYktNotOk( $R28e6bfe150 );
																				$R63bede6b19 = "\\n\\n本次卡密全部冻结，目前卡状态为无效，请您联系管理员";
																}
																$this->Alert( "您好，本商品一个IP每".$R052f5dc4d4."分钟只允许购买".$R23fa91262b."次".$R63bede6b19 );
																$this->HistoryGo( );
												}
								}
								$R96fe5ef068 = $Rffc87a6d6d['yktsamechecktime'];
								$Re75b2a490f = $Rffc87a6d6d['yktsamechecknum'];
								if ( 0 < $R96fe5ef068 && 0 < $Re75b2a490f )
								{
												$Race6ab87b1 = factory::getinstance( "trades" );
												$R63bede6b19 = "-".$R96fe5ef068." minutes";
												$R20fd65e9c7 = date( "Y-m-d H:i:s", strtotime( $R63bede6b19 ) );
												$R1df8368da5 = "";
												if ( isset( $R28e6bfe150[0]['cardnumber'] ) )
												{
																$R1df8368da5 = $R28e6bfe150[0]['cardnumber'];
												}
												$Rb7492a73f7 = "yktnumber='".$R1df8368da5."' and createdate > '".$R20fd65e9c7."' and tradetype=100";
												$R355ef3fa24 = $Race6ab87b1->ITrade_GetByStr( $Rb7492a73f7, "yktnumber" );
												if ( $Re75b2a490f <= count( $R355ef3fa24 ) )
												{
																$R63bede6b19 = "";
																if ( isset( $Rffc87a6d6d['yktsamemore'] ) && $Rffc87a6d6d['yktsamemore'] == 1 )
																{
																				$this->SetYktNotOk( $R28e6bfe150 );
																				$R63bede6b19 = "\\n\\n本次卡密全部冻结，目前卡状态为无效，请您联系管理员";
																}
																$this->Alert( "您好，本商品单张一卡通每".$R96fe5ef068."分钟只允许购买".$Re75b2a490f."次".$R63bede6b19 );
																$this->HistoryGo( );
												}
								}
								if ( isset( $Rffc87a6d6d['yktmaxnum'] ) && 0 < $Rffc87a6d6d['yktmaxnum'] && $Rffc87a6d6d['yktmaxnum'] < count( $R28e6bfe150 ) - 1 )
								{
												$this->Alert( "非法输入一卡通！" );
												$this->HistoryGo( );
								}
				}

				public function CheckBuyLit2( $Rb3f07f8c36, $R28e6bfe150, $Rae1b02c731 )
				{
								$Rffc87a6d6d = array( );
								if ( isset( $Rb3f07f8c36['prop'] ) && $Rb3f07f8c36['prop'] != "" )
								{
												$Rffc87a6d6d = unserialize( $Rb3f07f8c36['prop'] );
								}
								$Re54ab69543 = $Rffc87a6d6d['playerchecktime'];
								$Rd700388e76 = $Rffc87a6d6d['playerchecknum'];
								if ( 0 < $Re54ab69543 && 0 < $Rd700388e76 )
								{
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R63bede6b19 = "-".$Re54ab69543." minutes";
												$R20fd65e9c7 = date( "Y-m-d H:i:s", strtotime( $R63bede6b19 ) );
												$Rb7492a73f7 = "pid=".$Rb3f07f8c36['pid']." and orddate > '".$R20fd65e9c7."' and czaccount='".$Rae1b02c731."'";
												$R355ef3fa24 = $Rdeabc7f106->IOrder_GetByStr( $Rb7492a73f7, "aid" );
												if ( $Rd700388e76 <= count( $R355ef3fa24 ) )
												{
																$R63bede6b19 = "";
																if ( isset( $Rffc87a6d6d['playmore'] ) && $Rffc87a6d6d['playmore'] == 1 )
																{
																				$this->SetYktNotOk( $R28e6bfe150 );
																				$R63bede6b19 = "\\n\\n本次卡密全部冻结，目前卡状态为无效，请您联系管理员";
																}
																$this->Alert( "您好，本商品同一个玩家帐号每".$Re54ab69543."分钟只允许购买".$Rd700388e76."次".$R63bede6b19 );
																$this->HistoryGo( );
												}
								}
				}

				public function NotOkSendMsg( )
				{
				}

				public function SetYktNotOk( $R28e6bfe150 )
				{
								$R026f0167b4 = array( );
								foreach ( $R28e6bfe150 as $R0f8134fb60 )
								{
												if ( isset( $R0f8134fb60['cardnumber'] ) && $R0f8134fb60['cardnumber'] != "" )
												{
																$R026f0167b4[] = "'".$R0f8134fb60['cardnumber']."'";
												}
								}
								$data = array( "cardok" => 2 );
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = " cardnumber in (".$R63bede6b19.") ";
												$R808b89ba0e = $this->card->ICard_UpdateByStr( $data, $R63bede6b19 );
												if ( !$R808b89ba0e )
												{
																return false;
												}
												else
												{
																return true;
												}
								}
								else
								{
												return false;
								}
				}

				public function Index( )
				{
								if ( !$this->CheckCode( ) )
								{
												$this->Alert( "验证码输入有误A！" );
												$this->HistoryGo( );
								}
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R66b0d9d6f1 = intval( request( "ubzqty" ) );
								if ( $R8e8b5578f7 <= 0 || $R66b0d9d6f1 <= 0 )
								{
												$this->Alert( "参数有错！" );
												$this->HostoryGo( );
								}
								$session = factory::getinstance( "session" );
								$Rcc5c6e696c = $session->user;
								if ( $Rcc5c6e696c == "" )
								{
												$R5d899a20a5 = "";
												$Rac9b8532b8 = 0;
												$Re2a6348a52 = 1;
												$R2a51483b14 = 0;
												$R6cd996866e = 0;
												$Ra36ac3d772 = "未登录用户";
												$R98bc1630cd = 0;
												$R0dc0347d49 = "";
								}
								else
								{
												$R5d899a20a5 = $Rcc5c6e696c[0];
												$Rac9b8532b8 = $Rcc5c6e696c[4];
												$Re2a6348a52 = $Rcc5c6e696c[5];
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R6cd996866e = $R2a51483b14;
												$Ra36ac3d772 = $Rcc5c6e696c[1];
												$R98bc1630cd = $Rcc5c6e696c[6];
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$R0dc0347d49 = $Rcc5c6e696c[10];
												}
												else
												{
																$R0dc0347d49 = $R5d899a20a5;
												}
								}
								$this->CheckAgentBuyRight( $R8e8b5578f7, $R2a51483b14 );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Rb3f07f8c36 = $this->hander->IProduct_Get( $R8e8b5578f7, 1 );
								if ( !isset( $Rb3f07f8c36['pid'] ) )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$this->CheckBuyLit( $Rb3f07f8c36 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createordno( );
								$R0d9f8f778c = $Rb3f07f8c36['listprice'];
								$R9b252bf0a7 = $R66b0d9d6f1 * $R0d9f8f778c;
								$R9b252bf0a7 = round( $R9b252bf0a7, 3 );
								$R88f9731c8f = $Rb3f07f8c36['scored'] * $R66b0d9d6f1;
								$Re6f1bd94c5 = $Rb3f07f8c36['reward'] * $R66b0d9d6f1;
								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
								$R28e6bfe150 = $this->CheckYkt( $R8e8b5578f7 );
								$this->CheckBuyLit1( $Rb3f07f8c36, $R28e6bfe150 );
								$this->CheckQty( $R66b0d9d6f1, $Rb3f07f8c36 );
								$R49a2bf05e5 = $R28e6bfe150[count( $R28e6bfe150 ) - 1];
								if ( $R49a2bf05e5['money'] <= 0 )
								{
												if ( $R49a2bf05e5['num'] == 0 )
												{
																$this->Alert( "请检查您是否填入有效的一卡通卡号和密码！" );
												}
												else
												{
																$this->Alert( "一卡通卡号和密码余额为零，无法兑换！" );
												}
												$this->HistoryGo( );
								}
								else if ( $R49a2bf05e5['money'] < $R9b252bf0a7 )
								{
												$this->Alert( "一卡通点数不足以购买".$R66b0d9d6f1."个商品" );
												$this->HistoryGo( );
								}
								$Rb34591dc03 = $R49a2bf05e5['cprice_sum'];
								$R0fdfd3f1cc = $R66b0d9d6f1 * $Rb3f07f8c36['price'];
								$R0fdfd3f1cc = round( $R0fdfd3f1cc, 3 );
								if ( $Rb34591dc03 < $R0fdfd3f1cc )
								{
												$Rf9de40ae3b = array(
																"msgfrom" => 0,
																"msgto" => 0,
																"msgcc" => "",
																"title" => "[一卡通]".$Rb3f07f8c36['pname']."价格制定错误，销售价格低于进货价",
																"createdate" => date( "Y-m-d H-i-s" ),
																"createip" => $_SERVER['REMOTE_ADDR'],
																"content" => "[一卡通]".$Rb3f07f8c36['pname']."价格制定错误，销售价格低于进货价",
																"parentid" => 0,
																"msgtype" => 1,
																"comefrom" => 3
												);
												$R9e0664486a = factory::getinstance( "msg" );
												$R9e0664486a->IMsg_Create( $Rf9de40ae3b );
												$this->Alert( "商品的价格制定错误，请联系管理员修改" );
												$this->HistoryGo( );
								}
								$R85ce4fd0b2 = $R0d9f8f778c * $R49a2bf05e5['tax'];
								$R85ce4fd0b2 = round( $R85ce4fd0b2, 3 );
								$Race8252ffc = $R85ce4fd0b2 - $Rb3f07f8c36['price'];
								$Race8252ffc *= $R66b0d9d6f1;
								$Race8252ffc = round( $Race8252ffc, 3 );
								$Rac210b62cd = getvar( "ubzcrealname", "" );
								$Rae1b02c731 = trim( getvar( "ubzczacount", "" ) );
								$R8e90cfaacf = trim( getvar( "ubzreczacount", "" ) );
								if ( $Rb3f07f8c36['ptype'] == 1 || $Rb3f07f8c36['ptype'] == 2 )
								{
												if ( trim( $Rae1b02c731 ) == "" )
												{
																$this->Alert( "充值账号不能为空" );
																$this->HistoryGo( );
												}
												if ( $Rae1b02c731 != $R8e90cfaacf )
												{
																$this->Alert( "充值账号不一致！请重新输入".$Rae1b02c731.$R8e90cfaacf );
																$this->HistoryGo( );
												}
												$this->CheckBuyLit2( $Rb3f07f8c36, $R28e6bfe150, $Rae1b02c731 );
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
												"staffprofit" => $Race8252ffc,
												"buyerprice" => $Rb3f07f8c36['listprice'],
												"aname" => $R5d899a20a5,
												"aid" => $R2a51483b14,
												"cid" => $R6cd996866e,
												"company" => $Ra36ac3d772,
												"fee" => $R07e1b7ba62,
												"cname" => $R0dc0347d49,
												"crealname" => $Rac210b62cd,
												"ctel" => getvar( "ubzctel", "" ),
												"cmail" => getvar( "ubzcmail", "" ),
												"cqq" => getvar( "ubzcqq", "" ),
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
												"payment" => 100,
												"others" => htmlspecialchars( $R5204d30600 ),
												"tradeterm" => $Rb3f07f8c36['tradeterm'] == null ? "" : $Rb3f07f8c36['tradeterm'],
												"acountpwd" => $R2ccbab2bc4.getvar( "accountpwd", "" ),
												"rolename" => getvar( "ubzrolename", "" ),
												"comefrom" => 3,
												"listprice" => $Red2b3403a5,
												"scored" => $R88f9731c8f,
												"reward" => $Re6f1bd94c5,
												"saleid" => 0,
												"selldollars" => 0,
												"sellscale" => 0,
												"sellcheck" => 0,
												"bossprice" => $Rb3f07f8c36['price']
								);
								$R808b89ba0e = true;
								if ( $this->IsSup( $R66b0d9d6f1, $Rb3f07f8c36 ) )
								{
												$this->CheckCzInfo( $data, $Rb3f07f8c36['cztpl'] );
												$R808b89ba0e = $this->ConsumpYkt( $R28e6bfe150, $data );
												if ( $R808b89ba0e )
												{
																$data['sup'] = 1;
																$data['ordstate'] = 1;
																$R808b89ba0e = $Rdeabc7f106->IOrder_Create( $data );
																if ( $R808b89ba0e )
																{
																				$R920143e856 = factory::getservice( "sorders" );
																				$R8df6e173c6 = $R920143e856->GetHost( ).UPATH_WEBROOT;
																				$R920143e856->IOrder_SaveForYkt( $this->GetParam( $data, $R8df6e173c6, $Rb3f07f8c36 ) );
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
												$R808b89ba0e = $this->GetCard( $R28e6bfe150, $data );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "由于某种以外未知原因(也许是网络或者其他因素)！导致购卡失败！" );
																$this->HistoryGo( );
												}
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

				public function CheckYkt( $R8e8b5578f7 )
				{
								$R026f0167b4 = array( );
								$R72852f08e6 = 0;
								$Rec6873219d = factory::getinstance( "buyrights" );
								$Rd07030be9f = getvar( "yktcard" );
								$R754594c79e = getvar( "yktpwd" );
								$Rb34591dc03 = 0;
								$R7d5be3bcc4 = 0;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $Rd07030be9f );	$Ra16d228039++	)
								{
												if ( trim( $Rd07030be9f[$Ra16d228039] ) != "" || trim( $R754594c79e[$Ra16d228039] ) != "" )
												{
																$data = array(
																				"cardnumber" => $Rd07030be9f[$Ra16d228039],
																				"cardpwd" => base64_encode( $R754594c79e[$Ra16d228039] ),
																				"cardok" => 1,
																				"ptype" => 100
																);
																$R3db8f5c8bc = $Rec6873219d->IBuyRight_Check( $R8e8b5578f7, $data );
																if ( 0 < $R3db8f5c8bc )
																{
																				$R337d380380 = $this->card->ICard_GetByLimit( $data, "cprice, price, money" );
																				if ( $R337d380380['price'] < $R337d380380['money'] )
																				{
																								$this->Alert( ( "第 ".( $Ra16d228039 + 1 ) )." 张一卡通非法！" );
																								$this->HistoryGo( );
																				}
																				$Rb34591dc03 += $R337d380380['cprice'];
																				$R7d5be3bcc4 += $R337d380380['price'];
																				$data['money'] = $R3db8f5c8bc;
																				$R026f0167b4[] = $data;
																				$R72852f08e6 += $R3db8f5c8bc;
																}
																else if ( $R3db8f5c8bc == 0 )
																{
																				$this->Alert( ( "第 ".( $Ra16d228039 + 1 ) )." 张一卡通填写有误或者余额为零！" );
																				$this->HistoryGo( );
																}
																else
																{
																				$this->Alert( ( "第 ".( $Ra16d228039 + 1 ) )." 张一卡通无效！无法兑换此商品！" );
																				$this->HistoryGo( );
																}
												}
								}
								if ( 0 < $R7d5be3bcc4 )
								{
												$Rf9cd8ab3e4 = $Rb34591dc03 / $R7d5be3bcc4;
								}
								else
								{
												$Rf9cd8ab3e4 = 0;
								}
								$data = array(
												"money" => $R72852f08e6,
												"num" => count( $R026f0167b4 ),
												"tax" => $Rf9cd8ab3e4,
												"cprice_sum" => $Rb34591dc03
								);
								$R026f0167b4[] = $data;
								return $R026f0167b4;
				}

				public function ConsumpYkt( $R28e6bfe150, $R56ea904d53 )
				{
								$R1ee1065559 = $R56ea904d53['dollars'];
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R05aea12b5a = 0;
								$R06549c19d3 = $this->GetSysById( 26 );
								foreach ( $R28e6bfe150 as $R0f8134fb60 )
								{
												if ( $R1ee1065559 <= 0 )
												{
																return true;
												}
												$data = array(
																"cardnumber" => $R0f8134fb60['cardnumber'],
																"cardpwd" => $R0f8134fb60['cardpwd'],
																"cardok" => 1
												);
												$R0f8134fb60 = $this->card->ICard_GetByLimit( $data, "id,money,ordno,otherordno,cardnumber,bindaid" );
												if ( !isset( $R0f8134fb60['money'] ) )
												{
																continue;
												}
												$Ra1f7245bd9 = $R0f8134fb60['otherordno'] != "" && $R0f8134fb60['otherordno'] != null ? $R0f8134fb60['otherordno'] : $R0f8134fb60['ordno'] == null ? "" : $R0f8134fb60['ordno'];
												$R1ee1065559 -= $R0f8134fb60['money'];
												$R72852f08e6 = 0;
												$Rd541ac7c24 = $R0f8134fb60['money'];
												if ( $R1ee1065559 < 0 )
												{
																$R72852f08e6 = 0 - $R1ee1065559;
																$Rd541ac7c24 = $R0f8134fb60['money'] - $R72852f08e6;
												}
												$data = array(
																"money" => $R72852f08e6,
																"cardok" => 1,
																"otherordno" => $Ra1f7245bd9,
																"ordno" => $Rdcd9105806,
																"ispay" => 1
												);
												$R808b89ba0e = $this->card->ICard_Update( $data, $R0f8134fb60['id'] );
												if ( !$R808b89ba0e )
												{
																return false;
												}
												$Re6f1bd94c5 = $this->GetReward( intval( $R0f8134fb60['bindaid'] ), $R56ea904d53['pid'] );
												if ( 0 < $Re6f1bd94c5 )
												{
																$Re6f1bd94c5 = $R56ea904d53['listprice'] * $R56ea904d53['qty'] * $Re6f1bd94c5 / 100;
																$Re6f1bd94c5 = round( $Re6f1bd94c5, 3 );
																$R05aea12b5a += $Re6f1bd94c5;
												}
												$this->YktUpdateTrade( 0, 100, $Rdcd9105806, 0, $R56ea904d53['pname'], $R56ea904d53['cprice'], $R56ea904d53['qty'], 0, 0, $R72852f08e6, $R0f8134fb60['money'], "", 1, $R0f8134fb60['cardnumber'], $Rd541ac7c24, intval( $R0f8134fb60['bindaid'] ), $Re6f1bd94c5 );
								}
								return true;
				}

				public function GetReward( $R30c230ef2f, $R8e8b5578f7 )
				{
								if ( $R30c230ef2f == 0 || $R8e8b5578f7 == 0 )
								{
												return 0;
								}
								$agent = $this->GetAgentCache( $R30c230ef2f );
								if ( isset( $agent['rewardtpl'] ) )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R30c230ef2f
												) );
												$agent = $this->GetAgentCache( $R30c230ef2f );
								}
								$R737fcbc5ed = factory::getinstance( "reward" );
								$R3db8f5c8bc = $R737fcbc5ed->IReward_GetByStr( "aid =".$R30c230ef2f." and pid=".$R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc[0]['id'] ) && isset( $agent['rewardtpl'] ) && 0 < intval( $agent['rewardtpl'] ) )
								{
												$R29a6818ba2 = intval( $agent['rewardtpl'] );
												$Rc2f1fd7d2e = factory::getinstance( "rewardtpl" );
												$R3db8f5c8bc = $Rc2f1fd7d2e->IRewardTpl_GetByStr( "rewardtpl =".$R29a6818ba2." and pid=".$R8e8b5578f7 );
								}
								if ( isset( $R3db8f5c8bc[0]['id'] ) )
								{
												return doubleval( $R3db8f5c8bc[0]['reward'] );
								}
								else
								{
												return 0;
								}
				}

				public function CheckAgentCreateYkt( $R2a51483b14 )
				{
								$R9a5ea0f101 = $this->GetAgentCache( $R2a51483b14 );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								if ( $Ra0c8454e75[2] == 0 )
								{
												$this->Alert( "卖家账号问题导致卡密无效，请联系您的卖家！" );
												$this->HistoryGo( );
								}
				}

				public function Money( $R56ea904d53 = array( ), $R2a51483b14 = 0 )
				{
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$R4f39743f74 = $R56ea904d53['cprice'];
								$R2a51483b14 = $R2a51483b14;
								$R94e0136c8a = $R2a51483b14;
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,acsmp" );
								$R98bc1630cd = $agent['aremain'] - $R9b252bf0a7;
								if ( $R98bc1630cd < 0 )
								{
												$this->Alert( "您好, 卖家余额不足导致卡密无效，请联系您的卖家！" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c[6] = $R98bc1630cd;
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
												$this->UpdateTrade( $R2a51483b14, 60, $R56ea904d53['ordno'], $R0dc0347d49, $R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], 0, 0, $Rc0c42883ee, $R3ab1f9eb35, $R4f39743f74, $R9b252bf0a7 );
												return true;
								}
								else
								{
												$this->Alert( "您好, 扣款失败，请重新下单！" );
												$this->HistoryGo( );
								}
				}

				public function CheckOut( $R30c230ef2f, $R3456919727, $Rdcd9105806, $R05aea12b5a = 0 )
				{
								if ( $R30c230ef2f == 0 || $R05aea12b5a == 0 )
								{
												return;
								}
								$R63bede6b19 = "checkoutdate='".date( "Y-m-d H-i-s" )."',realreward=reward,checkout=1";
								$R42f28414d6 = "bindaid=".$R30c230ef2f." and tid in (".$R3456919727.") and tradetype=100";
								$Race6ab87b1 = factory::getinstance( "trades" );
								$R808b89ba0e = $Race6ab87b1->ITrade_UpdateStrByStr( $R63bede6b19, $R42f28414d6 );
								if ( $R808b89ba0e )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$R3db8f5c8bc = $R2097a8fddf->IAgent_Get( $R30c230ef2f, "aremain,aname" );
												$R3ab1f9eb35 = $R3db8f5c8bc['aremain'];
												$Rc0c42883ee = $R3db8f5c8bc['aremain'] + $R05aea12b5a;
												$R98bc1630cd = round( $Rc0c42883ee, 2 );
												$data = array( );
												$data['aremain'] = $R98bc1630cd;
												$Ra236db885f = "自动返点";
												$R5d899a20a5 = $R3db8f5c8bc['aname'];
												$R3db8f5c8bc = $R2097a8fddf->IAgent_Update( $data, $R30c230ef2f );
												if ( $R3db8f5c8bc )
												{
																$Re82ee9b121 = "自动返点".$Rdcd9105806;
																$this->TradeCreate( $Rdcd9105806, $R30c230ef2f, $R05aea12b5a, $Rc0c42883ee, $R3ab1f9eb35, 61, $Re82ee9b121, $Ra236db885f, $R05aea12b5a );
												}
								}
				}

				public function TradeCreate( $Rdcd9105806, $R2a51483b14, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Rb60574d852, $Re82ee9b121, $R9f5575e717, $R7ae75a8126 )
				{
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
												"listprice" => $R7ae75a8126,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function CheckCode( )
				{
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = trim( getvar( "randcode", "", "POST" ) );
								if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function GetCard( $R28e6bfe150 = array( ), $R56ea904d53 = array( ) )
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
								$R808b89ba0e = $this->ConsumpYkt( $R28e6bfe150, $R56ea904d53 );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "扣款失败！请您重新下订单！请查看一卡通是否被扣除，如被扣除，请联系管理员退款" );
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
																"payment" => 100,
																"ordstate" => 2,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												if ( 0 < $R56ea904d53['aid'] )
												{
																$R56ea904d53['agentprofit'] = 0;
																$R105a79440a = factory::getinstance( "ack" );
																$R2903714d94 = $R105a79440a->UpdateSup( $R56ea904d53 );
																$data = array_merge( $data, $R2903714d94 );
												}
								}
								else
								{
												$data = array(
																"payment" => 100,
																"ordstate" => 1,
																"qtyleft" => 0,
																"sup" => -1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
								}
								$this->UpdateRank( $R56ea904d53['aname'], $R56ea904d53['dollars'] );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R808b89ba0e = $Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
								return $R808b89ba0e;
				}

				public function GetRank1( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function UpdateRank( $R45074ab3da, $R72852f08e6 )
				{
								if ( $R45074ab3da == "" )
								{
												return 3;
								}
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
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function YktUpdateTrade( $R2a51483b14, $Ra8b176bf4f, $Rdcd9105806, $R63384ccc42, $R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $Race8252ffc, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Re82ee9b121 = "", $R28e6bfe150 = 0, $R1df8368da5 = "", $Rd541ac7c24 = "", $R30c230ef2f = 0, $Re6f1bd94c5 = 0 )
				{
								$R70e1e32798 = $Re82ee9b121 == "" ? $R65edce27dd." x ".$R63d0786ecc."(".$R66b0d9d6f1.")" : $Re82ee9b121;
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"ordno" => $Rdcd9105806,
												"income" => $Race8252ffc,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $R70e1e32798,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"ykt" => $R28e6bfe150,
												"yktnumber" => $R1df8368da5,
												"createdate" => date( "Y-m-d H-i-s" ),
												"bindaid" => $R30c230ef2f,
												"reward" => $Re6f1bd94c5
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
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
