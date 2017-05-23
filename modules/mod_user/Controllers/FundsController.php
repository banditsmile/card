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
class FundsController extends Controller
{

				public $hander = NULL;
				public $action = NULL;
				public $session = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "funds" );
								$this->session = factory::getinstance( "session" );
								$this->SetUser( );
								$this->Init( );
				}

				public function GoHome( )
				{
								$this->ScriptRedirect( "index.php" );
				}

				public function SetUser( )
				{
								$agent = $this->session->user;
								if ( $agent == "" )
								{
												$this->Alert( "您还未登录系统，请先登陆！" );
												$this->GoHome( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByName( $agent[0] );
								if ( !isset( $R3db8f5c8bc['aname'] ) )
								{
												$this->Alert( "您还未登录系统，请先登陆！" );
												$this->GoHome( );
								}
								if ( $R3db8f5c8bc['frozen'] == 1 )
								{
												$this->Alert( "您还未登录系统，请先登陆！" );
												$this->GoHome( );
								}
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R6009e84434 = $R063e6693e5->IRank_GetNameById( $R3db8f5c8bc['alv'] );
								$R3db8f5c8bc['rankname'] = $R6009e84434;
								$this->Assign( "data", $R3db8f5c8bc );
				}

				public function Init( )
				{
								$this->ShopInit( "用户管理中心" );
				}

				public function Index( )
				{
								$agent = $this->session->user;
								$R07cdd73907 = $agent[0];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cname" => $R07cdd73907,
												"ordstate" => getvar( "ordstate", 2 )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IFunds_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Init( );
								include_once( UPATH_HELPER."OrderHelper.php" );
							
												$this->view( );
							
				}

				public function Balance( )
				{
								$this->Index( );
				}

				public function AddFunds( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "rights" );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$this->Assign( "rights", $Ra0c8454e75 );
								if ( $Ra0c8454e75[0] == 1 )
								{
												$R581012b834 = 1;
								}
								else
								{
												$R581012b834 = 0;
								}
								$R222ff303f4 = factory::getinstance( "banks" );
								$R2c90a0c76d = $R222ff303f4->IBank_Get( array( "remit" => 1 ) );
								$this->Assign( "checked", $R581012b834 );
								$this->Assign( "bank", $R2c90a0c76d );
						
												$this->SetPayment( );
												$this->Init( );
												$this->View( );
						
				}

				public function SetPayment( )
				{
								$Ree5509027f = factory::getinstance( "payment" );
								$data = array( "payOpen" => 1 );
								$Rbf14a97cca = $Ree5509027f->IPayment_Get( $data );
								$R29122b2eb8 = array( );
								$R3a266c387f = array( );
								$R1ac71b2fae = "";
								foreach ( $Rbf14a97cca as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['isdefault'] )
												{
																$R1ac71b2fae = $R0f8134fb60['paycode'];
												}
												if ( $R0f8134fb60['paycode'] == "yeepay" && $R0f8134fb60['other'] != "" )
												{
																switch ( $R0f8134fb60['other'] )
																{
																case "QQCARD-NET" :
																				$R3995fedcc3 = "Q币卡支付";
																				break;
																case "JUNNET-NET" :
																				$R3995fedcc3 = "骏网一卡通支付";
																				break;
																case "SNDACARD-NET" :
																				$R3995fedcc3 = "盛大卡支付";
																				break;
																case "SZX-NET" :
																				$R3995fedcc3 = "神州行支付";
																				break;
																case "ZHENGTU-NET" :
																				$R3995fedcc3 = "征途卡支付";
																				break;
																case "UNICOM-NET" :
																				$R3995fedcc3 = "联通卡支付";
																				break;
																case "LIANHUAOKCARD-NET" :
																				$R3995fedcc3 = "联华OK卡支付";
																				break;
																case "YPCARD-NET" :
																				$R3995fedcc3 = "易宝一卡通支付";
																				break;
																default :
																				$R3995fedcc3 = "其它游戏卡支付";
																				break;
																}
																$R0f8134fb60['payType'] = $R3995fedcc3;
																$R3a266c387f[] = $R0f8134fb60;
												}
												else
												{
																$R29122b2eb8[] = $R0f8134fb60;
												}
								}
								if ( $R1ac71b2fae == "" )
								{
												$R1ac71b2fae = "-1";
								}
								$this->Assign( "mainpay", $R1ac71b2fae );
								$Rf70e923790 = $R1ac71b2fae == "alipay" ? "alipay_ICBCB2C" : "tenpay_1002";
								$this->Assign( "paycode", $Rf70e923790 );
								$this->Assign( "otherpay", $R29122b2eb8 );
								$this->Assign( "cardpay", $R3a266c387f );
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$Rc873c0bdca = isset( $R30b2ab8dc1['bankalert'] ) ? $R30b2ab8dc1['bankalert'] : "请付款成功后，不要关闭页面，系统会自动跳转回本平台，您看到成功充值后才算完成付款，如果没有跳转，请查看浏览器是否做了限制，可以试行恢复浏览器默认配置看看";
								$this->Assign( "bankalert", $Rc873c0bdca );
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,company,aremain,funds,income,selffrozenfunds,tradefrozenfunds,sysfrozenfunds,bossfrozenfunds" );
							
							
												$this->Assign( "item", $R9a5ea0f101 );
												$this->View( );
							
				}

				public function Pay( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R45074ab3da = $Rcc5c6e696c[0];
								$Rf70e923790 = getvar( "paycode", 0 );
								$R8eeb1221ae = explode( "_", $Rf70e923790 );
								if ( $Rcc5c6e696c == "" && $R8eeb1221ae[0] == "acount" )
								{
												$this->Alert( ",下单失败！请您重新下订单！" );
												$this->HistoryGo( );
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R9b252bf0a7 = doubleval( request( "ubzdollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "充值金额不能小于或者等于0" );
												$this->HistoryGo( );
								}
								$data = array(
												"ordno" => createfundsordno( ),
												"dollars" => $R9b252bf0a7,
												"cip" => $_SERVER['REMOTE_ADDR'],
												"cname" => $R45074ab3da,
												"comefrom" => 2,
												"ordstate" => 0,
												"orddate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IFunds_Create( $data );
								if ( $R808b89ba0e )
								{
												$R3db8f5c8bc = array(
																"ubzordno" => $data['ordno'],
																"ubzdollars" => $data['dollars'],
																"ubzcname" => $R45074ab3da,
																"ubzpname" => $R45074ab3da."账户充值",
																"ubzpaycode" => $R8eeb1221ae[0],
																"defaultbank" => isset( $R8eeb1221ae[1] ) ? $R8eeb1221ae[1] : "",
																"autopay" => 1
												);
											
																$this->Assign( "item", $R3db8f5c8bc );
																$this->View( );
											
								}
								else
								{
												$this->Alert( "充值下单失败！请您重新下单" );
												$this->HistoryGo( );
								}
				}

				public function AddFundsByYkt( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "rights" );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$this->Assign( "rights", $Ra0c8454e75 );
								if ( $Ra0c8454e75[0] == 1 )
								{
												$R581012b834 = 1;
								}
								else
								{
												$R581012b834 = 0;
								}
								if ( $R581012b834 == 0 )
								{
												$this->Alert( "您的帐号不允许使用一卡通充值！请和管理员联系" );
												$this->HistoryGo( );
								}
								if ( !$this->CheckCode( ) )
								{
												$this->Alert( "验证码输入有误！" );
												$this->HistoryGo( );
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$R72852f08e6 = $this->CheckYkt( $Rdcd9105806 );
								if ( $R72852f08e6 == 0 )
								{
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->user;
								list( $R5d899a20a5, , , , , , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
								$R3ab1f9eb35 = $R9a5ea0f101['aremain'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R72852f08e6;
								$Rc0c42883ee = round( $Rc0c42883ee, 2 );
								$data = array(
												"aremain" => $Rc0c42883ee
								);
								$R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								$data = array(
												"ordno" => $Rdcd9105806,
												"dollars" => $R72852f08e6,
												"cip" => $_SERVER['REMOTE_ADDR'],
												"cname" => $R5d899a20a5,
												"isagent" => 1,
												"ordstate" => 2,
												"payment" => 101,
												"orddate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IFunds_Create( $data );
								$Rcc5c6e696c = $this->session->user;
								$Rcc5c6e696c[6] = $Rc0c42883ee;
								$this->session->set( "userinfo", implode( "|", $Rcc5c6e696c ) );
								$this->CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $R72852f08e6 );
								$R51c716b966 = $this->SetLang( 1 );
								$this->Alert( "充值成功！".$R72852f08e6.$R51c716b966['moneyunit']."已经充入您的账号！" );
								$this->ScriptRedirect( "index.php?m=mod_user&c=funds&a=addFunds" );
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
								$Rd19ae93b31 = getvar( "randcode", "", "POST" );
								if ( $Rd19ae93b31 != "" && $Rb7da52a305 == $Rd19ae93b31 )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7 )
				{
								$R51c716b966 = $this->SetLang( 1 );
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $R2a51483b14;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								$Rbf6c8991d9 = array(
												"aid" => $R2a51483b14,
												"tradetype" => 101,
												"ordno" => $Rdcd9105806,
												"income" => $R9b252bf0a7,
												"outcome" => 0,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => "使用一卡通充值".$R9b252bf0a7.$R51c716b966['moneyunit'],
												"operator" => $R94e0136c8a,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 1,
												"yktnumber" => "0",
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $Rbf6c8991d9 );
				}

				public function CheckYkt( $Rdcd9105806 )
				{
								$R026f0167b4 = array( );
								$R72852f08e6 = 0;
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rd07030be9f = getvar( "yktcard" );
								$R754594c79e = getvar( "yktpwd" );
								$Rcc5c6e696c = $this->session->user;
								list( $R5d899a20a5, $R5d899a20a5, , , , , , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $R2a51483b14;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								$R51c716b966 = $this->SetLang( 1 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $Rd07030be9f );	$Ra16d228039++	)
								{
												if ( $Rd07030be9f[$Ra16d228039] != "" || $R754594c79e[$Ra16d228039] != "" )
												{
																$data = array(
																				"cardnumber" => $Rd07030be9f[$Ra16d228039],
																				"cardpwd" => base64_encode( $R754594c79e[$Ra16d228039] ),
																				"ptype" => 101
																);
																$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "ordno,otherordno" );
																$Ra1f7245bd9 = $R3db8f5c8bc['otherordno'] != "" && $R3db8f5c8bc['otherordno'] != null ? $R3db8f5c8bc['otherordno'] : $R3db8f5c8bc['ordno'] == null ? "" : $R3db8f5c8bc['ordno'];
																$R3db8f5c8bc = $Rf541845af3->ICard_YktCheck( $data );
																if ( 0 < $R3db8f5c8bc )
																{
																				$Rfbe2aea88e = array(
																								"otherordno" => $Ra1f7245bd9,
																								"ordno" => $Rdcd9105806,
																								"money" => 0,
																								"cardok" => 0,
																								"orddate" => date( "Y-m-d H-i-s" ),
																								"operator" => $R94e0136c8a,
																								"cid" => $R2a51483b14
																				);
																				$Rf541845af3->ICard_UpdateCardPwd( $Rfbe2aea88e, $data );
																				$Rbf6c8991d9 = array(
																								"aid" => 0,
																								"tradetype" => 101,
																								"ordno" => $Rdcd9105806,
																								"income" => 0,
																								"outcome" => $R3db8f5c8bc,
																								"fat" => 0,
																								"fbt" => $R3db8f5c8bc,
																								"content" => $R3db8f5c8bc.$R51c716b966['moneyunit']."一卡通充值",
																								"operator" => $R94e0136c8a,
																								"otherside" => $R2a51483b14,
																								"state" => 5,
																								"ykt" => 1,
																								"yktnumber" => $Rd07030be9f[$Ra16d228039],
																								"createdate" => date( "Y-m-d H-i-s" )
																				);
																				$Race6ab87b1 = factory::getinstance( "trades" );
																				$Race6ab87b1->ITrade_Create( $Rbf6c8991d9 );
																				$R72852f08e6 += $R3db8f5c8bc;
																}
																else if ( $R3db8f5c8bc == -1 )
																{
																				$this->Alert( ( "第 ".( $Ra16d228039 + 1 ) )." 张一卡通不允许充值或者无效！" );
																}
																else
																{
																				$this->Alert( ( "第 ".( $Ra16d228039 + 1 ) )." 张一卡通填写有误或者余额为零！" );
																}
												}
								}
								return $R72852f08e6;
				}

}

?>
