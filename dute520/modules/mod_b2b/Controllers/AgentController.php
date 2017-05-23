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
class AgentController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "agents" );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R136f072284 = intval( request( "isselect", "" ) );
								$Rac9b8532b8 = getvar( "parentid", -1 );
								$data = array(
												"optype" => getvar( "optype" ),
												"parentid" => $Rac9b8532b8
								);
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "exooy" ) ) ) );
								$R00c1510c0e = $this->GetRCache( );
								$R026f0167b4 = array( );
								foreach ( $R00c1510c0e as $R0f8134fb60 )
								{
												$R026f0167b4[$R0f8134fb60['id']] = $R0f8134fb60['name'];
								}
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R4e420efcc3['item'][$Ra16d228039]['rank'] = $R026f0167b4[$R4e420efcc3['item'][$Ra16d228039]['alv']];
								}
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "isselect", $R136f072284 );
								$R00be52aa45 = array( "aname" => "�û���", "aid" => "�û����", "rankname" => "��������", "alv" => "������", "company" => "��˾����", "parentid" => "�ϼ����", "arealname" => "��ʵ����", "aqq" => "QQ", "amail" => "����", "atel" => "�绰", "mobile" => "�ֻ�", "aaddr" => "סַ", "aremain" => "������", "acsmp" => "�������", "income" => "��ʹ�������", "aremainrange" => "��Χ", "acsmprange" => "���ѷ�Χ", "incomerange" => "��������Χ", "prv" => "ʡ", "city" => "��", "zip" => "�ʱ�", "remarks" => "��ע", "eshop" => "�����ַ" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function Del( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R808b89ba0e = $this->hander->IAgent_Delete( $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "ɾ���ɹ�" );
								}
								else
								{
												$this->Alert( "ɾ��ʧ��" );
								}
								$this->View( "Index" );
				}

				public function AddFunds( )
				{
								$R1d47c61d5b = $this->GetAdmRight( 47 );
								if ( $R1d47c61d5b == 0 )
								{
												$this->Alert( "���ã�����Ȩ�޲��㣬�޷��ӿ����ϵ��������Ա��" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( 0, "pwdconfig" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "ooyxt" ) ) ) );
				}

				public function FundsSave( )
				{
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "exkli" ) ) ) );
								if ( $R1d47c61d5b == 0 )
								{
												$this->Alert( "���ã�����Ȩ�޲��㣬�޷��ӿ����ϵ��������Ա��" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R8eeb1221ae = explode( "|", $R25791b03ad['pwdconfig'] );
								if ( $R8eeb1221ae[0] == 1 )
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												$Rf958605ae8 = getvar( "retradepwd" );
												if ( $R48aa85bc4e != $Rf958605ae8 )
												{
																$this->Alert( "��������ĺ�̨��ֵ���벻һ�£����������룡" );
																$this->HistoryGo( );
												}
												if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
												{
																$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
																$this->HistoryGo( );
												}
								}
								$data = array( );
								$Re0f5b440e2 = doubleval( request( "ubzczvalue" ) );
								if ( $Re0f5b440e2 == 0 )
								{
												$this->Alert( "����ܲ�Ϊ 0" );
												$this->HistoryGo( );
								}
								$R3db8f5c8bc = $this->hander->IAgent_Get( $R2a51483b14, "aremain,aname" );
								$R3ab1f9eb35 = $R3db8f5c8bc['aremain'];
								$Rc0c42883ee = $R3db8f5c8bc['aremain'] + $Re0f5b440e2;
								$R98bc1630cd = round( $Rc0c42883ee, 2 );
								$data['aremain'] = $R98bc1630cd;
								$Ra236db885f = getvar( "remarks" );
								if ( $Ra236db885f == "custom" )
								{
												$Ra236db885f = getvar( "remarks_custom" );
								}
								$R5d899a20a5 = $R3db8f5c8bc['aname'];
								$R3db8f5c8bc = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R3db8f5c8bc )
								{
												$this->OrderCreate( $R2a51483b14, $Re0f5b440e2, $Rc0c42883ee, $R3ab1f9eb35, 99, $R5d899a20a5, "����Ա��ֵ", $Ra236db885f );
												if ( 0 < $Re0f5b440e2 )
												{
																$this->Alert( "��ֵ�ɹ�" );
												}
												else
												{
																$this->Alert( "�ۿ�ɹ�" );
												}
								}
								else if ( 0 < $Re0f5b440e2 )
								{
												$this->Alert( "��ֵʧ��" );
								}
								else
								{
												$this->Alert( "�ۿ�ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=agent&a=AddFunds&aid=".$R2a51483b14 );
				}

				public function Detail( $R3584859062 = 0 )
				{
								$R89cd0a3912 = array( "�ѽⶳ", "������" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 == 0 )
								{
												$R2a51483b14 = $R3584859062;
								}
								$R022cf23e8d = factory::getinstance( "security" );
								$R679e9b9234 = $R022cf23e8d->ISecurity_GetById( $R2a51483b14, 0 );
								$this->Assign( "security", $R679e9b9234 );
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( ) );
								$R0f8134fb60 = $this->hander->IAgent_Get( $R2a51483b14 );
								$R86b4133bc7 = file_exists( "../vip.php" ) ? 1 : 0;
								$R69b3453045 = file_exists( "../modules/mod_taobao/Controllers/MainController.php" ) ? 1 : 0;
								$this->Assign( "vipshop", $R86b4133bc7 );
								$this->Assign( "tbcz", $R69b3453045 );
						
												$this->Assign( "item", $R0f8134fb60 );
												$this->Assign( "rank", $R046b4585a2 );
												$this->Assign( "frozen", $R89cd0a3912 );
												$this->View( );
						
				}

				public function CheckTradePwd( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R48aa85bc4e = getvar( "mytradepwd" );
								if ( trim( $R48aa85bc4e ) == "" || md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
								{
												$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
												$this->HistoryGo( );
								}
				}

				public function Update( )
				{
								$this->CheckTradePwd( );
								$R2a51483b14 = intval( request( "aid" ) );
								$Re7f18668b9 = intval( request( "ubzcz" ) );
								$Ra0c8454e75 = intval( request( "yktcz" ) ).",".intval( request( "selfcz" ) ).",".intval( request( "yktcreate" ) ).",".intval( request( "lowczfunds" ) ).",".intval( request( "tbcz" ) );
								$R026f0167b4 = array( );
								$Rf035a26cc6 = 80;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf035a26cc6;	$Ra16d228039++	)
								{
												$R026f0167b4[] = intval( request( "rights_".$Ra16d228039 ) );
								}
								$Rc0090ccd92 = getvar( "fromdate", "" );
								if ( $Rc0090ccd92 == "" )
								{
												$Rc0090ccd92 = "1970-01-01 00:00:00";
								}
								$Rdf7d05c648 = getvar( "todate", "" );
								if ( $Rdf7d05c648 == "" )
								{
												$Rdf7d05c648 = "1970-01-01 00:00:00";
								}
								$data = array(
												"arealname" => getvar( "ubzarealname" ),
												"aaddr" => getvar( "ubzaaddr" ),
												"zip" => getvar( "ubzzip" ),
												"alv" => intval( request( "ubzalv" ) ),
												"amail" => getvar( "ubzamail" ),
												"atel" => getvar( "ubzatel" ),
												"mobile" => getvar( "mobile" ),
												"remarks" => getvar( "remarks" ),
												"aqq" => getvar( "ubzaqq" ),
												"prv" => getvar( "prv" ),
												"city" => getvar( "city" ),
												"parentid" => intval( request( "parentid" ) ),
												"frozen" => intval( request( "frozen" ) ),
												"company" => getvar( "company" ),
												"eshop" => getvar( "eshop" ),
												"idcard" => getvar( "idcard" ),
												"custom" => intval( request( "custom" ) ),
												"canadd" => intval( request( "canadd" ) ),
												"vipshop" => intval( request( "vipshop" ) ),
												"istest" => intval( request( "istest" ) ),
												"AccountBranch" => getvar( "AccountBranch" ),
												"AccountNo" => getvar( "AccountNo" ),
												"AccountName" => getvar( "AccountName" ),
												"BankAddress" => getvar( "BankAddress" ),
												"rights" => $Ra0c8454e75,
												"forykt" => intval( request( "forykt" ) ),
												"forb2b" => intval( request( "forb2b" ) ),
												"forb2c" => intval( request( "forb2c" ) ),
												"leftrights" => implode( ",", $R026f0167b4 ),
												"fromdate" => $Rc0090ccd92,
												"todate" => $Rdf7d05c648,
												"frozereason" => getvar( "frozereason" )
								);
								$Rc509b4f207 = getvar( "staffpwd" );
								$Rab99ce1727 = getvar( "restaffpwd" );
								if ( $Rc509b4f207 != "" )
								{
												if ( $Rc509b4f207 == $Rab99ce1727 )
												{
																$data['apwd'] = $Rc509b4f207;
												}
												else
												{
																$this->Alert( "�����������벻һ�£�����������" );
																$this->HistoryGo( );
												}
								}
								if ( intval( request( "initpersonfile" ) ) == 1 )
								{
												$data['websetting'] = "1|1|0|1|1|1|1|0|0|0|0|0|0|0|0|";
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								$R966604a6ca = getvar( "resuperpwd" );
								if ( $R71dfa8a4fc != "" )
								{
												if ( $R71dfa8a4fc == $R966604a6ca )
												{
																$data['superpwd'] = $R71dfa8a4fc;
												}
												else
												{
																$this->Alert( "����ǿ���������벻һ�£�����������" );
																$this->HistoryGo( );
												}
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								$Rf958605ae8 = getvar( "retradepwd" );
								if ( $R48aa85bc4e != "" )
								{
												if ( $R48aa85bc4e == $Rf958605ae8 )
												{
																$data['tradepwd'] = $R48aa85bc4e;
												}
												else
												{
																$this->Alert( "���ν����������벻һ�£�����������" );
																$this->HistoryGo( );
												}
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "dxood" ) ) ) );
								if ( $R3db8f5c8bc )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
												$this->Acluster( 5, $R2a51483b14 );
												$this->Alert( "���³ɹ�" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=agent&a=detail&aid=".$R2a51483b14 );
				}

				public function Acluster( $Rd3fe9c10a8, $Ra3d52e52a4 )
				{
								$R09a3346376 = "../cluster.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												foreach ( $Ra0a4326ae0 as $R0f8134fb60 )
												{
																file_get_contents( $R0f8134fb60."helper/cluster/index.php?k=".$Rf676d660ab."&w=".$Rd3fe9c10a8."&v=".$Ra3d52e52a4 );
												}
								}
				}

				public function SetBind( $R2a51483b14, $R244f38266c = 0 )
				{
								if ( $R244f38266c == 1 )
								{
												$data = array(
																"ipcheck" => intval( request( "ipcheck" ) ),
																"maccheck" => intval( request( "maccheck" ) ),
																"hdecheck" => intval( request( "hdecheck" ) ),
																"cpucheck" => intval( request( "cpucheck" ) )
												);
												$R022cf23e8d = factory::getinstance( "security" );
												$R022cf23e8d->ISecurity_UpdateByAId( $data, $R2a51483b14 );
								}
				}

				public function Relation( )
				{
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "tsadx" ) ) ) );
				}

				public function RelationSave( )
				{
								$R18441673c4 = intval( request( "trantype" ) );
								if ( $R18441673c4 == 1 )
								{
												$R92cc398ab0 = intval( request( "aid1" ) );
												$R52b34cff4e = intval( request( "aid2" ) );
												$data = array(
																"parentid" => $R52b34cff4e
												);
												$R808b89ba0e = $this->hander->IAgent_Update( $data, $R92cc398ab0 );
								}
								if ( $R18441673c4 == 2 )
								{
												$R92cc398ab0 = intval( request( "aid1" ) );
												$R52b34cff4e = intval( request( "aid2" ) );
												$data = array(
																"parentid" => $R52b34cff4e
												);
												$R808b89ba0e = $this->hander->IAgent_UpdateByLimit( $data, " parentid = ".$R92cc398ab0 );
								}
								if ( $R18441673c4 == 3 )
								{
												$R043923fe11 = intval( request( "alv" ) );
												$R8d392f6832 = getvar( "prv", "" );
												$Rf286064093 = getvar( "city", "" );
												$R52b34cff4e = intval( request( "aid2" ) );
												$data = array(
																"parentid" => $R52b34cff4e
												);
												$R42f28414d6 = array( );
												if ( $R8d392f6832 != "" )
												{
																$R42f28414d6[] = " prv = '".$R8d392f6832."'";
												}
												if ( $Rf286064093 != "" )
												{
																$R42f28414d6[] = " city = '".$Rf286064093."'";
												}
												if ( $R043923fe11 != "" )
												{
																$R42f28414d6[] = " alv = ".$R043923fe11;
												}
												$R63bede6b19 = implode( " and ", $R42f28414d6 );
												$R808b89ba0e = $this->hander->IAgent_UpdateByLimit( $data, $R63bede6b19 );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "ת���ɹ���" );
								}
								else
								{
												$this->Alert( "ת��ʧ�ܣ�" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Agent&a=Relation" );
				}

				public function OrderCreate( $R2a51483b14, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Rb60574d852 = 99, $R45074ab3da = "", $Re82ee9b121 = "����Ա��ֵ", $Ra236db885f = "" )
				{
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$sess = factory::getinstance( "session" );
								$admin = $sess->admin;
								$data = array(
												"ordno" => $Rdcd9105806,
												"dollars" => $R9b252bf0a7,
												"cip" => $_SERVER['REMOTE_ADDR'],
												"cname" => $R45074ab3da == "" ? getvar( "ubzaname" ) : $R45074ab3da,
												"ordstate" => 2,
												"orddate" => date( "Y-m-d H-i-s" ),
												"payment" => $Rb60574d852,
												"remarks" => $Ra236db885f,
												"admname" => $admin,
												"comefrom" => 98
								);
								$Rdff37f8c10 = factory::getinstance( "funds" );
								$R808b89ba0e = $Rdff37f8c10->IFunds_Create( $data );
								if ( $R808b89ba0e )
								{
												if ( $Ra236db885f == "" )
												{
																$Ra236db885f = $Re82ee9b121;
												}
												$this->TradeCreate( $R2a51483b14, $Rdcd9105806, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Ra236db885f, $Rb60574d852, $admin );
								}
								return $R808b89ba0e;
				}

				public function TradeCreate( $R2a51483b14, $Rdcd9105806, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Re82ee9b121, $Rb60574d852, $R4fe6545da8 = "" )
				{
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Rb60574d852,
												"ordno" => $Rdcd9105806,
												"income" => 0,
												"outcome" => 0,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => 0,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 0,
												"admname" => $R4fe6545da8,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								if ( 0 < $R9b252bf0a7 )
								{
												$data['income'] = $R9b252bf0a7;
								}
								else
								{
												$data['outcome'] = 0 - $R9b252bf0a7;
								}
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function Lock( )
				{
								$Rd8fb5ae7df = array( "aremain" => "�ʻ��������", "selffrozenfunds" => "�Լ������ʽ�", "tradefrozenfunds" => "���׶����ʽ�", "sysfrozenfunds" => "ϵͳ�����ʽ�", "bossfrozenfunds" => "�ϼ������ʽ�", "income" => "������������", "funds" => "������������" );
								$R2a51483b14 = intval( request( "aid" ) );
								$R9a5ea0f101 = $this->hander->IAgent_Get( $R2a51483b14, "aid,income,aname,company,aremain,arrears,selffrozenfunds,tradefrozenfunds,sysfrozenfunds,bossfrozenfunds,funds" );
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( 0, "pwdconfig" ) );
								$R3a8b307327 = $this->GetDec( );
								$R7724cb31cf = array( "income", "aremain", "selffrozenfunds", "tradefrozenfunds", "sysfrozenfunds", "bossfrozenfunds", "funds" );
								foreach ( $R7724cb31cf as $R0f8134fb60 )
								{
												if ( $R9a5ea0f101[$R0f8134fb60] )
												{
																$R9a5ea0f101[$R0f8134fb60] = round( $R9a5ea0f101[$R0f8134fb60], $R3a8b307327 );
												}
												else
												{
																$R9a5ea0f101[$R0f8134fb60] = 0;
												}
								}
						
												$this->Assign( "item", $R9a5ea0f101 );
												$this->Assign( "funds", $Rd8fb5ae7df );
												$this->View( );
						
				}

				public function LockSave( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R8eeb1221ae = explode( "|", $R25791b03ad['pwdconfig'] );
								if ( $R8eeb1221ae[0] == 1 )
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
												{
																$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
																$this->HistoryGo( );
												}
								}
								$Rd8fb5ae7df = array( "aremain" => "�ʻ��������", "selffrozenfunds" => "�Լ������ʽ�", "tradefrozenfunds" => "���׶����ʽ�", "sysfrozenfunds" => "ϵͳ�����ʽ�", "bossfrozenfunds" => "�ϼ������ʽ�", "income" => "������������", "funds" => "������������" );
								$R9b252bf0a7 = doubleval( getvar( "dollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "�������Ӧ�ô����㣡����������" );
												$this->HistoryGo( );
								}
								$Rd4d7350af1 = getvar( "fromobject" );
								$R6c0fcd4a5d = getvar( "toobject" );
								if ( $Rd4d7350af1 == $R6c0fcd4a5d )
								{
												$this->Alert( "���������ת��������һ�£�������ѡ��" );
												$this->HistoryGo( );
								}
								if ( $R6c0fcd4a5d == "income" )
								{
												$this->Alert( "���ܰѽ��ת��Ϊ������������������ѡ��" );
												$this->HistoryGo( );
								}
								if ( $R6c0fcd4a5d == "funds" )
								{
												$this->Alert( "���ܰѽ��ת��Ϊ�����������룬������ѡ��" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$R9a5ea0f101 = $this->hander->IAgent_Get( $R2a51483b14, "aid,income,aname,company,aremain,selffrozenfunds,tradefrozenfunds,sysfrozenfunds,bossfrozenfunds,funds" );
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
								$R808b89ba0e = $this->hander->IAgent_Update($data, $R2a51483b14); 
								if ( $R808b89ba0e )
								{
												$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
												$Re82ee9b121 = sprintf( "ϵͳ��%s ת��Ϊ %s��ת����%s ԭ��".$Rfb0c285961, $Rd8fb5ae7df[$Rd4d7350af1], $Rd8fb5ae7df[$R6c0fcd4a5d], $R9b252bf0a7 );
												if ( $Rd4d7350af1 == "aremain" || $R6c0fcd4a5d == "aremain" )
												{
																if ( $Rd4d7350af1 == "aremain" )
																{
																				$Rd541ac7c24 = $R9b252bf0a7;
																				$Rd7a133b20f = 0;
																				$Rc0c42883ee = $R3ab1f9eb35 - $R9b252bf0a7;
																				$R9fe57edfd7 = 2;
																				$R63bede6b19 = "����";
																}
																else
																{
																				$Rd541ac7c24 = 0;
																				$Rd7a133b20f = $R9b252bf0a7;
																				$Rc0c42883ee = $R3ab1f9eb35 + $R9b252bf0a7;
																				$R9fe57edfd7 = 1;
																				$R63bede6b19 = "�ⶳ";
																}
																$R3ab1f9eb35 = round( $R3ab1f9eb35, 2 );
																$R62388bedf2 = $this->GetLockType( $Rd4d7350af1, $R6c0fcd4a5d );
																if ( $R62388bedf2 < 5 )
																{
																				$data = array(
																								"aid" => $R2a51483b14,
																								"dollars" => $R9b252bf0a7,
																								"reason" => $Rfb0c285961 == "" ? $R63bede6b19 : $Rfb0c285961,
																								"thisaction" => $R9fe57edfd7,
																								"operator" => 0,
																								"createdate" => date( "Y-m-d H-i-s" ),
																								"locktype" => $this->GetLockType( $Rd4d7350af1, $R6c0fcd4a5d )
																				);
																				$R5db5e87ef9 = factory::getinstance( "locks" );
																				$R808b89ba0e = $R5db5e87ef9->ILock_Create( $data );
																				if ( !$R808b89ba0e )
																				{
																								$this->Alert( "�����쳣��������¼�޷�����,������1003" );
																				}
																}
																$sess = factory::getinstance( "session" );
																$admin = $sess->admin;
																include_once( UPATH_HELPER."OrderHelper.php" );
																$Ra982e1d90b = createloanordno( );
																$data = array(
																				"aid" => $R2a51483b14,
																				"tradetype" => 98,
																				"ordno" => $Ra982e1d90b,
																				"content" => $Re82ee9b121,
																				"operator" => 0,
																				"otherside" => 0,
																				"outcome" => $Rd541ac7c24,
																				"income" => $Rd7a133b20f,
																				"fat" => $Rc0c42883ee,
																				"fbt" => $R3ab1f9eb35,
																				"state" => 5,
																				"admname" => $admin,
																				"createdate" => date( "Y-m-d H-i-s" )
																);
																$Race6ab87b1 = factory::getinstance( "trades" );
																$R808b89ba0e = $Race6ab87b1->ITrade_Create( $data );
																if ( !$R808b89ba0e )
																{
																				$this->Alert( "�����쳣����ؼ�¼�޷�����,������1001" );
																}
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
																if ( $Rd4d7350af1 == "income" || $Rd4d7350af1 == "funds" )
																{
																				$R808b89ba0e = $Race6ab87b1->ITrade_Create( $data );
																				if ( !$R808b89ba0e )
																				{
																								$this->Alert( "�����쳣����ؼ�¼�޷�����,������1002" );
																				}
																}
												}
								}
								else
								{
												$this->Alert( "�����쳣����ؼ�¼�޷�����,������1004" );
								}
								$this->go( $R808b89ba0e, "�����ɹ�", "����ʧ��", "index.php?m=mod_b2b&c=agent&a=lock&aid=".$R2a51483b14 );
				}

				public function GetLockType( $Rd4d7350af1, $R6c0fcd4a5d )
				{
								$R62388bedf2 = 0;
								$Rbb9c55123b = "";
								if ( $R6c0fcd4a5d == "aremain" )
								{
												$Rbb9c55123b = $Rd4d7350af1;
								}
								else
								{
												$Rbb9c55123b = $R6c0fcd4a5d;
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
												return 5;
								}
				}

				public function Batch( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"optype" => getvar( "optype" )
								);
								$data += $R71a664ef8c;
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 != "page" && $Ra09fe38af3 != "action" )
												{
																$R63bede6b19[] = sprintf( "%s=%s", $Ra09fe38af3, $Ra3d52e52a4 );
												}
								}
								$op = implode( "&", $R63bede6b19 );
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
								$Rc0d62c5404 = getvar( "chkexclude" );
								$R83e17604b1 = getvar( "chkinclude" );
								$R15a0359c8c = getvar( "stype" );
								$R7965cb3798 = getvar( "keywords" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
								$this->Assign( "tablecheckall", $R09dfa65bd9 );
								$this->Assign( "chkexclude", $Rc0d62c5404 );
								$this->Assign( "chkinclude", $R83e17604b1 );
								$this->Assign( "op", $op );
						
												$this->View( );
						
				}

				public function BatchSave( )
				{
								$R3584859062 = getvar( "id" );
								$data = array( );
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$data[$R0f8134fb60] = getvar( $R0f8134fb60 );
								}
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IAgent_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "�����޸ĳɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=agent&a=index" );
								}
								else
								{
												$this->Alert( "�����޸�ʧ�ܣ�" );
												$this->Historygo( );
								}
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ItemDeal( )
				{
								$R3584859062 = intval( request( "id" ) );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" || $R3584859062 == 0 )
								{
												echo "��������";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "utf-8//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R3584859062
												) );
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->hander->IAgent_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "��¼��ԭʧ�ܣ�";
								}
				}

				public function DestroyItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R136f072284 = intval( request( "isselect", "" ) );
								$data = array(
												"optype" => getvar( "optype" ),
												"parentid" => getvar( "parentid", -1 )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IAgent_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "ɾ��ʧ�ܣ�";
								}
				}

				public function GetLit( )
				{
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
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
																$Rb7492a73f7 = "aid not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "����ѡ����";
																exit( );
												}
												$Rb7492a73f7 = "aid in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

				public function DelItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R136f072284 = intval( request( "isselect", "" ) );
								$data = array(
												"optype" => getvar( "optype" ),
												"parentid" => getvar( "parentid", -1 )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IAgent_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												echo "";
								}
				}

}

?>
