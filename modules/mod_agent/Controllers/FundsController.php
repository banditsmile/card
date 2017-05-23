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

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "funds" );
				}

				public function AddFunds( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								global $masterid;
								$R220583696c = $masterid;
								if ( $R2a51483b14 == $masterid )
								{
												$masterid = 0;
								}
								$R222ff303f4 = factory::getinstance( "banks" );
								$R2c90a0c76d = $R222ff303f4->IBank_Get( );
								$this->Assign( "bank", $R2c90a0c76d );
								$masterid = $R220583696c;
								$R9a5ea0f101 = $this->GetAgentCache( $R2a51483b14 );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$this->Assign( "rights", $Ra0c8454e75 );
								$this->SetPayment( );
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$Rc873c0bdca = isset( $R30b2ab8dc1['bankalert'] ) ? $R30b2ab8dc1['bankalert'] : "�븶��ɹ��󣬲�Ҫ�ر�ҳ�棬ϵͳ���Զ���ת�ر�ƽ̨���������ɹ���ֵ�������ɸ�����û����ת����鿴������Ƿ��������ƣ��������лָ������Ĭ�����ÿ���";
								$this->Assign( "bankalert", $Rc873c0bdca );
							
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
																				$R3995fedcc3 = "Q�ҿ�֧��";
																				break;
																case "JUNNET-NET" :
																				$R3995fedcc3 = "����һ��֧ͨ��";
																				break;
																case "SNDACARD-NET" :
																				$R3995fedcc3 = "ʢ��֧��";
																				break;
																case "SZX-NET" :
																				$R3995fedcc3 = "������֧��";
																				break;
																case "ZHENGTU-NET" :
																				$R3995fedcc3 = "��;��֧��";
																				break;
																case "UNICOM-NET" :
																				$R3995fedcc3 = "��ͨ��֧��";
																				break;
																case "LIANHUAOKCARD-NET" :
																				$R3995fedcc3 = "����OK��֧��";
																				break;
																case "YPCARD-NET" :
																				$R3995fedcc3 = "�ױ�һ��֧ͨ��";
																				break;
																default :
																				$R3995fedcc3 = "������Ϸ��֧��";
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
				}

				public function BankFunds( )
				{
								$this->AddFunds( );
				}

				public function YktFunds( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R9a5ea0f101 = $this->GetAgentCache( $R2a51483b14 );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								if ( $Ra0c8454e75[0] == 0 )
								{
												$this->Alert( "���ã�����δ��ͨһ��ͨ��ֵ���ܣ���͹���Ա���룡" );
												$this->HistoryGo( );
								}
								$this->Assign( "rights", $Ra0c8454e75 );
						
												$this->View( );
								
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,company,aremain,funds,income,selffrozenfunds,tradefrozenfunds,sysfrozenfunds,bossfrozenfunds,rights" );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$this->Assign( "rights", $Ra0c8454e75 );
								$this->Assign( "item", $R9a5ea0f101 );
								$Rd8fb5ae7df = array( "income" => "������������", "funds" => "������������" );
								$this->Assign( "funds", $Rd8fb5ae7df );
							
												$this->View( );
								
				}

				public function Pay( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R45074ab3da = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rf70e923790 = getvar( "paycode", 0 );
								$R8eeb1221ae = explode( "_", $Rf70e923790 );
								if ( $Rcc5c6e696c == "" && $R8eeb1221ae[0] == "acount" )
								{
												$this->Alert( ",�µ�ʧ�ܣ����������¶�����" );
												$this->WinClose( );
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R9b252bf0a7 = doubleval( request( "ubzdollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "��ֵ����С�ڻ��ߵ���0" );
												$this->WinClose( );
								}
								$R9a5ea0f101 = $this->GetAgentCache( $R2a51483b14 );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$R255d48be36 = $Ra0c8454e75[3];
								if ( $R9b252bf0a7 < $R255d48be36 )
								{
												$this->Alert( "���ã�����ͱ���� ".$R255d48be36 );
												$this->WinClose( );
								}
								$data = array(
												"ordno" => createfundsordno( ),
												"dollars" => $R9b252bf0a7,
												"cip" => $this->GetIp( ),
												"cname" => $R45074ab3da,
												"ordstate" => 0,
												"comefrom" => 1,
												"orddate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IFunds_Create( $data );
								if ( $R808b89ba0e )
								{
												$R0f8134fb60 = array(
																"ubzordno" => $data['ordno'],
																"ubzdollars" => $data['dollars'],
																"ubzcname" => $R45074ab3da,
																"ubzpname" => $R45074ab3da."�˻���ֵ",
																"ubzpaycode" => $R8eeb1221ae[0],
																"defaultbank" => isset( $R8eeb1221ae[1] ) ? $R8eeb1221ae[1] : "",
																"autopay" => 1
												);
												$this->Assign( "item", $R0f8134fb60 );
									
																$this->View( );
												
								}
								else
								{
												$this->Alert( "��ֵ�µ�ʧ�ܣ����������µ�" );
												$this->WinClose( );
								}
				}

				public function WinClose( )
				{
								echo "<script type=\"text/javascript\">window.close()</script>";
								exit( );
				}

				public function AddFundsByYkt( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "rights" );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								if ( $Ra0c8454e75[0] == 0 )
								{
												$this->Alert( "���ã�����δ��ͨһ��ͨ��ֵ���ܣ���͹���Ա���룡" );
												$this->HistoryGo( );
								}
								if ( !$this->CheckCode( ) )
								{
												$this->Alert( "��֤����������" );
												$this->HistoryGo( );
								}
								$R3a8b307327 = $this->GetDec( );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$R255d48be36 = $Ra0c8454e75[3];
								$R72852f08e6 = $this->CheckYkt( $Rdcd9105806, $R255d48be36 );
								if ( $R72852f08e6 == 0 )
								{
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								list( $R5d899a20a5, , , , , , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
								$R3ab1f9eb35 = $R9a5ea0f101['aremain'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R72852f08e6;
								$Rc0c42883ee = round( $Rc0c42883ee, $R3a8b307327 );
								$data = array(
												"aremain" => $Rc0c42883ee
								);
								$R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								$data = array(
												"ordno" => $Rdcd9105806,
												"dollars" => $R72852f08e6,
												"cip" => $this->GetIp( ),
												"cname" => $R5d899a20a5,
												"comefrom" => 1,
												"ordstate" => 2,
												"payment" => 101,
												"orddate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IFunds_Create( $data );
								$Rcc5c6e696c = $this->session->agent;
								$Rcc5c6e696c[6] = $Rc0c42883ee;
								$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
								$Rd07030be9f = getvar( "yktcard" );
								$Rb5de37227c = implode( ",", $Rd07030be9f );
								$this->CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $R72852f08e6, $Rb5de37227c );
								$R51c716b966 = $this->SetLang( 1 );
								$this->Alert( "��ֵ�ɹ���".$R72852f08e6.$R51c716b966['moneyunit']."�Ѿ����������˺ţ�" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=funds&a=AddFunds&a=YktFunds" );
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

				public function CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, $Rb5de37227c )
				{
								$R51c716b966 = $this->SetLang( 1 );
								$Rcc5c6e696c = $this->session->agent;
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
												"content" => "ʹ��һ��ͨ".$Rb5de37227c."��ֵ".$R9b252bf0a7.$R51c716b966['moneyunit'],
												"operator" => $R94e0136c8a,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 1,
												"yktnumber" => $Rb5de37227c,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $Rbf6c8991d9 );
				}

				public function CheckYkt( $Rdcd9105806, $R255d48be36 = 0 )
				{
								$R026f0167b4 = array( );
								$R72852f08e6 = 0;
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rd07030be9f = getvar( "yktcard" );
								$R754594c79e = getvar( "yktpwd" );
								$Rcc5c6e696c = $this->session->agent;
								$R5d899a20a5 = $Rcc5c6e696c[0];
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
																$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "ordno,otherordno,price,money" );
																if ( !isset( $R3db8f5c8bc['money'] ) )
																{
																				$this->Alert( ( "�� ".( $Ra16d228039 + 1 ) )." ��һ��ͨ��д����" );
																				return 0;
																}
																if ( $R3db8f5c8bc['price'] < $R3db8f5c8bc['money'] )
																{
																				$Rbf3674dd3e = array( "cardok" => 3 );
																				$Rf541845af3->ICard_UpdateCardPwd( $Rbf3674dd3e, $data );
																				$this->Alert( ( "�� ".( $Ra16d228039 + 1 ) )." ��һ��ͨ�Ƿ���" );
																				return 0;
																}
																if ( $R3db8f5c8bc['money'] < $R255d48be36 )
																{
																				$this->Alert( "���ã�����ͱ���� ".$R255d48be36.", ��ʹ����ֵ���� ".$R255d48be36." �ļӿ��ֵ" );
																				return 0;
																}
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
																								"content" => $R5d899a20a5."(".$R2a51483b14.")"." ".$R3db8f5c8bc.$R51c716b966['moneyunit']."һ��ͨ��ֵ",
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
																				$this->Alert( ( "�� ".( $Ra16d228039 + 1 ) )." ��һ��ͨ�������ֵ������Ч��" );
																}
																else
																{
																				$this->Alert( ( "�� ".( $Ra16d228039 + 1 ) )." ��һ��ͨ��д����������Ϊ�㣡" );
																}
												}
								}
								return $R72852f08e6;
				}

				public function Lock( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,company,aremain,selffrozenfunds" );
						
												$this->Assign( "item", $R9a5ea0f101 );
												$this->View( );
								
				}

				public function LockSave( )
				{
								$R3a8b307327 = $this->GetDec( );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R63384ccc42 = $Rcc5c6e696c[9];
								}
								else
								{
												$R63384ccc42 = $Rcc5c6e696c[7];
								}
								$R9b252bf0a7 = doubleval( request( "dollars" ) );
								if ( 0 < $R9b252bf0a7 )
								{
												$R71dfa8a4fc = getvar( "superpwd" );
												$R2097a8fddf = factory::getinstance( "agents" );
												$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
												if ( 0 < $R679e9b9234 )
												{
																$this->Alert( "��������������������������" );
																$this->HistoryGo( );
												}
												$R9fe57edfd7 = intval( request( "thisaction" ) );
												$Rc1221db860 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain, selffrozenfunds" );
												$R3ab1f9eb35 = $Rc1221db860['aremain'];
												if ( $R9fe57edfd7 == 2 )
												{
																$Re3b87f80da = $Rc1221db860['selffrozenfunds'] + $R9b252bf0a7;
																$Rda3ac1bf9a = $Rc1221db860['aremain'] - $R9b252bf0a7;
																if ( $Rda3ac1bf9a < 0 )
																{
																				$this->Alert( "�����Զ���������������������" );
																				$this->HistoryGo( );
																}
																$R63bede6b19 = "����";
												}
												else
												{
																$Re3b87f80da = $Rc1221db860['selffrozenfunds'] - $R9b252bf0a7;
																$Rda3ac1bf9a = $Rc1221db860['aremain'] + $R9b252bf0a7;
																if ( $Re3b87f80da < 0 )
																{
																				$this->Alert( "�Լ������ʽ�С�ڱ��β�����������������" );
																				$this->HistoryGo( );
																}
																$R63bede6b19 = "�ⶳ";
												}
												$Re3b87f80da = round( $Re3b87f80da, $R3a8b307327 );
												$Rda3ac1bf9a = round( $Rda3ac1bf9a, $R3a8b307327 );
												$Rc0c42883ee = $Rda3ac1bf9a;
												$data = array(
																"aremain" => $Rda3ac1bf9a,
																"selffrozenfunds" => $Re3b87f80da
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$Rcc5c6e696c[6] = $Rda3ac1bf9a;
																$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
												}
												$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
												$data = array(
																"aid" => $R2a51483b14,
																"dollars" => $R9b252bf0a7,
																"reason" => $Rfb0c285961,
																"thisaction" => $R9fe57edfd7,
																"createdate" => date( "Y-m-d H-i-s" )
												);
												$R5db5e87ef9 = factory::getinstance( "locks" );
												$R5db5e87ef9->ILock_Create( $data );
												$R51c716b966 = $this->SetLang( 1 );
												$Rfb0c285961 = $Rfb0c285961 == "" ? "" : "ԭ��:".$Rfb0c285961;
												$Re82ee9b121 = "�Լ�".$R63bede6b19.$R9b252bf0a7.$R51c716b966['moneyunit']."��".$Rfb0c285961;
												include_once( UPATH_HELPER."OrderHelper.php" );
												$Ra982e1d90b = createloanordno( );
												$data = array(
																"aid" => $R2a51483b14,
																"tradetype" => 98,
																"ordno" => $Ra982e1d90b,
																"content" => $Re82ee9b121,
																"operator" => $R63384ccc42,
																"otherside" => $R2a51483b14,
																"outcome" => $R9fe57edfd7 == 2 ? $R9b252bf0a7 : 0,
																"income" => $R9fe57edfd7 == 2 ? 0 : $R9b252bf0a7,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"state" => 5,
																"createdate" => date( "Y-m-d H-i-s" )
												);
												$Race6ab87b1 = factory::getinstance( "trades" );
												$Race6ab87b1->ITrade_Create( $data );
												$this->AddLog( $Re82ee9b121, $R2a51483b14, $R63384ccc42 );
												$this->Alert( "���Ѿ��ɹ�".$R63bede6b19.$R9b252bf0a7.$R51c716b966['moneyunit'] );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=funds&a=LockHistory" );
								}
								else
								{
												$this->Alert( "�������Ӧ�ô���0������������" );
												$this->HistoryGo( );
								}
				}

				public function LockHistory( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R0dc0347d49 = $Rcc5c6e696c[10];
								}
								else
								{
												$R0dc0347d49 = "";
								}
								$data = array(
												"page" => intval( request( "page" ) ),
												"keywords" => getvar( "keywords" ),
												"aid" => $R2a51483b14,
												"thisaction" => getvar( "thisaction" )
								);
								$Race6ab87b1 = factory::getinstance( "locks" );
								$R4e420efcc3 = $Race6ab87b1->ILock_Page( $data );
							
												$this->FillPage( $data, $R4e420efcc3 );
												$this->view( );
								
				}

				public function Tran( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "parentid,aid,aname,company,aremain,arrears" );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R1f6f93f8bb = $R2097a8fddf->IAgent_GetUnderling( $R2a51483b14 );
								$this->Assign( "agents", $R1f6f93f8bb );
							
												$this->Assign( "item", $R9a5ea0f101 );
												$this->View( );
								
				}

				public function TranSave( )
				{
								$R3a8b307327 = $this->GetDec( );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R63384ccc42 = $Rcc5c6e696c[9];
								}
								else
								{
												$R63384ccc42 = $Rcc5c6e696c[7];
								}
								$R9b252bf0a7 = doubleval( request( "dollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "�����Ҫ����0" );
												$this->HistoryGo( );
								}
								$Rc1580153de = intval( request( "fundsto" ) );
								if ( $Rcc5c6e696c[4] == 0 && $Rc1580153de == 0 )
								{
												$this->Alert( "����ʧ�ܣ������ϼ���ϵͳ����Ա���������Ҫת���ϵͳ�����ù���Ա��̨�ۿ�ɣ�" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								switch ( $Rc1580153de )
								{
								case 0 :
												$Rc1580153de = $Rcc5c6e696c[4];
												break;
								case 1 :
												$Rc1580153de = intval( request( "underlingid" ) );
												$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc1580153de, "aremain,parentid" );
												if ( !isset( $Rf51ac45ee9 ) )
												{
																$this->Alert( "�Ƿ�����A��" );
																$this->HistoryGo( );
												}
												if ( !( $Rf51ac45ee9['parentid'] != $R2a51483b14 ) )
												{
																break;
												}
												$this->Alert( "�Ƿ�����B��" );
												$this->HistoryGo( );
												break;
								default :
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
												break;
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
								if ( 0 < $R679e9b9234 )
								{
												$this->Alert( "��������������������������" );
												$this->HistoryGo( );
								}
								$Rc1221db860 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
								$Rda3ac1bf9a = $Rc1221db860['aremain'] - $R9b252bf0a7;
								if ( $Rda3ac1bf9a < 0 )
								{
												$this->Alert( "�ʽ����Դ˴�����Ŀ�������������" );
												$this->HistoryGo( );
								}
								$Rda3ac1bf9a = round( $Rda3ac1bf9a, $R3a8b307327 );
								$R3ab1f9eb35 = $Rc1221db860['aremain'];
								$Rc0c42883ee = $Rda3ac1bf9a;
								$data = array(
												"aremain" => $Rda3ac1bf9a
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$Rcc5c6e696c[6] = $Rda3ac1bf9a;
												$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
												if ( 0 < $Rc1580153de )
												{
																$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc1580153de, "aremain,aid" );
																$R90b73b0c04 = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
																$R90b73b0c04 = round( $R90b73b0c04, $R3a8b307327 );
																$R962f3c5799 = $Rf51ac45ee9['aremain'];
																$R1702b10f81 = $R90b73b0c04;
																$data = array(
																				"aremain" => $R90b73b0c04
																);
																$R2097a8fddf->IAgent_Update( $data, $Rc1580153de );
												}
								}
								include( UPATH_HELPER."OrderHelper.php" );
								$Ra982e1d90b = createloanordno( );
								$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => 31,
												"ordno" => $Ra982e1d90b,
												"content" => $Rfb0c285961,
												"operator" => $R63384ccc42,
												"otherside" => $Rc1580153de,
												"outcome" => $R9b252bf0a7,
												"income" => 0,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"state" => 5,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
								$data = array(
												"aid" => $Rc1580153de,
												"tradetype" => 32,
												"ordno" => $Ra982e1d90b,
												"content" => $Rfb0c285961,
												"operator" => $R2a51483b14,
												"otherside" => $R2a51483b14,
												"outcome" => 0,
												"income" => $R9b252bf0a7,
												"fat" => $R1702b10f81,
												"fbt" => $R962f3c5799,
												"state" => 5,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1->ITrade_Create( $data );
								$R51c716b966 = $this->SetLang( 1 );
								$Re82ee9b121 = "�� ".$Rc1580153de." ת�� ".$R9b252bf0a7." ".$R51c716b966['moneyunit'];
								$this->AddLog( $Re82ee9b121, $R2a51483b14, $R63384ccc42 );
								$this->Alert( "���ɹ��� ".$Rc1580153de." ת�� ".$R9b252bf0a7." ".$R51c716b966['moneyunit'] );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=trade&tpl=history&tradetype=31,32" );
				}

				public function SelfCz( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R63384ccc42 = $Rcc5c6e696c[9];
								}
								else
								{
												$R63384ccc42 = $Rcc5c6e696c[7];
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "rights,tradepwd,income,aname,funds,aremain" );
								$Ra0c8454e75 = explode( ",", $R9a5ea0f101['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								if ( $Ra0c8454e75[1] == 0 )
								{
												$this->Alert( "���ã�����δ��ͨ����ת�����ܣ���͹���Ա���룡" );
												$this->HistoryGo( );
								}
								$this->Assign( "rights", $Ra0c8454e75 );
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( $R48aa85bc4e != $R9a5ea0f101['tradepwd'] )
								{
												$this->Alert( "������Ľ��������д�����������" );
												$this->HistoryGo( );
								}
								$Rd8fb5ae7df = array( "aremain" => "�ʻ��������", "selffrozenfunds" => "�Լ������ʽ�", "tradefrozenfunds" => "���׶����ʽ�", "sysfrozenfunds" => "ϵͳ�����ʽ�", "bossfrozenfunds" => "�ϼ������ʽ�", "income" => "������������", "funds" => "������������" );
								$R9b252bf0a7 = doubleval( request( "dollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "�������Ӧ�ô����㣡����������" );
												$this->HistoryGo( );
								}
								$Rd4d7350af1 = getvar( "fromobject" );
								$R6c0fcd4a5d = "aremain";
								if ( $Rd4d7350af1 != "income" && $Rd4d7350af1 != "funds" )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$R5a2591f9d4 = $R9a5ea0f101[$Rd4d7350af1] - $R9b252bf0a7;
								if ( $R5a2591f9d4 < 0 )
								{
												$this->Alert( "��������������������" );
												$this->HistoryGo( );
								}
								$Rbf00159d3b = $R9a5ea0f101[$R6c0fcd4a5d] + $R9b252bf0a7;
								$R3ab1f9eb35 = $R9a5ea0f101['aremain'];
								$data = array(
												$Rd4d7350af1 => $R5a2591f9d4,
												$R6c0fcd4a5d => $Rbf00159d3b
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
												$Re82ee9b121 = sprintf( "�̻�(".$R2a51483b14.")����ת����%s ת��Ϊ %s��ת����%s ԭ��".$Rfb0c285961, $Rd8fb5ae7df[$Rd4d7350af1], $Rd8fb5ae7df[$R6c0fcd4a5d], $R9b252bf0a7 );
												if ( $Rd4d7350af1 == "aremain" || $R6c0fcd4a5d == "aremain" )
												{
																$Rd541ac7c24 = 0;
																$Rd7a133b20f = $R9b252bf0a7;
																$Rc0c42883ee = $R3ab1f9eb35 + $R9b252bf0a7;
																$R9fe57edfd7 = 1;
																$R63bede6b19 = "ת��";
																$R3ab1f9eb35 = round( $R3ab1f9eb35, 2 );
																include_once( UPATH_HELPER."OrderHelper.php" );
																$Ra982e1d90b = createloanordno( );
																$data = array(
																				"aid" => $R2a51483b14,
																				"tradetype" => 98,
																				"ordno" => $Ra982e1d90b,
																				"content" => $Re82ee9b121,
																				"operator" => $R63384ccc42,
																				"otherside" => $R2a51483b14,
																				"outcome" => $Rd541ac7c24,
																				"income" => $Rd7a133b20f,
																				"fat" => $Rc0c42883ee,
																				"fbt" => $R3ab1f9eb35,
																				"state" => 5,
																				"admname" => "",
																				"createdate" => date( "Y-m-d H-i-s" )
																);
																$Race6ab87b1 = factory::getinstance( "trades" );
																$Race6ab87b1->ITrade_Create( $data );
																if ( $Rd4d7350af1 == "income" )
																{
																				$data['tradetype'] = 11;
																}
																else if ( $Rd4d7350af1 == "funds" )
																{
																				$data['tradetype'] = 12;
																}
																$data['fat'] = $R5a2591f9d4;
																$data['fbt'] = $R9a5ea0f101[$Rd4d7350af1];
																$data['outcome'] = $R9b252bf0a7;
																$data['income'] = 0;
																$Race6ab87b1->ITrade_Create( $data );
												}
								}
								$this->go( $R808b89ba0e, "�����ɹ�", "����ʧ��", "index.php?m=mod_agent&c=Funds&a=Detail" );
				}

				public function GetLockType( $Rd4d7350af1, $R6c0fcd4a5d )
				{
								$R62388bedf2 = 0;
								$Rbb9c55123b = "";
								if ( $R6c0fcd4a5d == "aremain" )
								{
												$Rbb9c55123b = $R6c0fcd4a5d;
								}
								else
								{
												$Rbb9c55123b = $Rd4d7350af1;
								}
								switch ( $Rbb9c55123b )
								{
								case "selffrozenfunds" :
												return 0;
								case "tradefrozenfunds" :
												return 1;
								case "sysfrozenfunds" :
												return 2;
								case "bossfrozenfunds" :
												return 3;
								default :
												return 0;
								}
				}

}

?>
