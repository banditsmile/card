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
class LoanController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$R136f072284 = intval( request( "isselect", "" ) );
								$data = array(
												"aid" => 0,
												"thisaction" => getvar( "thisaction", "21,22" )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$R4e420efcc3 = $R9bee740ff2->ILoan_Page( $data );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "ordno" => "���", "otherside" => "�Է����" );
								$this->Assign( "sarray", $R00be52aa45 );
							
												$this->View( );
							
				}

				public function UpdateState( )
				{
								$this->CheckTradePwd( );
								$R901a6b96db = intval( request( "state" ) );
								$Rdcd9105806 = getvar( "ordno" );
								$R697a03ac8c = doubleval( request( "payback" ) );
								if ( $R697a03ac8c < 0 )
								{
												$this->Alert( "������Ӧ�ô��ڵ���0��" );
												$this->HistoryGo( );
								}
								$R20a3b99573 = getvar( "paybackdate" );
								if ( trim( $R20a3b99573 ) == "" )
								{
												$this->Alert( "�������ڲ���Ϊ�գ�" );
												$this->HistoryGo( );
								}
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"ordno" => $Rdcd9105806,
												"thisaction" => 21
								);
								$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "��¼�Ѿ������ڣ�" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['dollars'] < doubleval( $R697a03ac8c + $R3db8f5c8bc['payback'] ) )
								{
												$this->Alert( "���������������룡" );
												$this->HistoryGo( );
								}
								$Rc57f84679f = $R3db8f5c8bc['otherside'];
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
								$R7f79278d03 = $Rf51ac45ee9['arrears'] - $R697a03ac8c;
								$R7f79278d03 = round( $R7f79278d03, 3 );
								$data = array(
												"arrears" => $R7f79278d03
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $Rc57f84679f );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
								$R697a03ac8c += $R3db8f5c8bc['payback'];
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"state" => $R901a6b96db,
												"payback" => $R697a03ac8c,
												"paybackdate" => $R20a3b99573
								);
								$R808b89ba0e = $R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "��ɲ���" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
				}

				public function SetState( )
				{
								$this->CheckTradePwd( );
								$R901a6b96db = intval( request( "state" ) );
								$Rdcd9105806 = getvar( "ordno" );
								if ( $R901a6b96db == 5 )
								{
												$R9bee740ff2 = factory::getinstance( "loan" );
												$data = array(
																"ordno" => $Rdcd9105806,
																"thisaction" => 21
												);
												$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
												if ( !isset( $R3db8f5c8bc['ordno'] ) )
												{
																$this->Alert( "��¼�Ѿ������ڣ�" );
																$this->HistoryGo( );
												}
												$R9b252bf0a7 = $R3db8f5c8bc['dollars'];
												$R2a51483b14 = $R3db8f5c8bc['aid'];
												$Rc57f84679f = $R3db8f5c8bc['otherside'];
												if ( $R3db8f5c8bc['state'] == 0 )
												{
																$this->Alert( "�������󣬻�δ������û����Ч" );
																$this->HistoryGo( );
												}
												if ( 0 < $Rc57f84679f && $R3db8f5c8bc['state'] == 1 )
												{
																$R2097a8fddf = factory::getinstance( "agents" );
																$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
																$R7f79278d03 = $Rf51ac45ee9['arrears'] - $R9b252bf0a7;
																$R7f79278d03 = round( $R7f79278d03, 3 );
																$data = array(
																				"arrears" => $R7f79278d03
																);
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $Rc57f84679f );
																if ( $R808b89ba0e )
																{
																				$R9bee740ff2 = factory::getinstance( "loan" );
																				$data = array(
																								"state" => $R901a6b96db
																				);
																				$R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
																}
												}
								}
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
				}

				public function Refuse( )
				{
								$this->CheckTradePwd( );
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rdcd9105806 = getvar( "ordno" );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"ordno" => $Rdcd9105806,
												"thisaction" => 21
								);
								$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "��¼�Ѿ������ڣ�" );
												$this->HistoryGo( );
								}
								$data = array( "state" => -1 );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
				}

				public function CheckTradePwd( )
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
				}

				public function CheckIn( )
				{
								$this->CheckTradePwd( );
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rdcd9105806 = getvar( "ordno" );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"ordno" => $Rdcd9105806,
												"thisaction" => 21
								);
								$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "��¼�Ѿ������ڣ�" );
												$this->HistoryGo( );
								}
								$R9b252bf0a7 = $R3db8f5c8bc['dollars'];
								$R2a51483b14 = $R3db8f5c8bc['aid'];
								$Rc57f84679f = $R3db8f5c8bc['otherside'];
								if ( $R3db8f5c8bc['thisaction'] != 21 || $R3db8f5c8bc['state'] != 0 || $R2a51483b14 != 0 )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$Rfb0c285961 = "ͬ����,���".$Rdcd9105806;
								if ( 0 < $Rc57f84679f )
								{
												$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
												$R7f79278d03 = $Rf51ac45ee9['arrears'] + $R9b252bf0a7;
												$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
												$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
												$Rf377ce9dba = $Rda3ac1bf9a;
												$R7f79278d03 = round( $R7f79278d03, 3 );
												$Rda3ac1bf9a = round( $Rda3ac1bf9a, 3 );
												$Rf377ce9dba = round( $Rf377ce9dba, 3 );
												$R9b63d9cfa6 = round( $R9b63d9cfa6, 3 );
												$data = array(
																"aremain" => $Rda3ac1bf9a,
																"arrears" => $R7f79278d03
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $Rc57f84679f );
												if ( $R808b89ba0e )
												{
																$data = array(
																				"aid" => $Rc57f84679f,
																				"tradetype" => 32,
																				"ordno" => $Rdcd9105806,
																				"content" => $Rfb0c285961,
																				"operator" => $R2a51483b14,
																				"otherside" => $R2a51483b14,
																				"income" => $R9b252bf0a7,
																				"fat" => $Rf377ce9dba,
																				"fbt" => $R9b63d9cfa6,
																				"state" => 5,
																				"createdate" => date( "Y-m-d H-i-s" )
																);
																$Race6ab87b1 = factory::getinstance( "trades" );
																$Race6ab87b1->ITrade_Create( $data );
												}
												else
												{
																$this->Alert( "����������ϣ�����ʧ��" );
												}
								}
								$data = array( "state" => 1 );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
				}

				public function Urge( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"ordno" => $Rdcd9105806,
												"thisaction" => 21
								);
								$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "��¼�Ѿ������ڣ�" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = 0;
								if ( $R3db8f5c8bc['thisaction'] != 21 || $R3db8f5c8bc['state'] == 0 )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['state'] == 5 )
								{
												$this->Alert( "ծ�Ѿ������������ٷ��ͣ�" );
												$this->HistoryGo( );
								}
								$R51c716b966 = $this->SetLang( 1 );
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgto" => $R3db8f5c8bc['otherside'],
												"msgcc" => "",
												"title" => "��".$R3db8f5c8bc['createdate']."��ϵͳ����".$R3db8f5c8bc['dollars'].$R51c716b966['moneyunit']."�����ʲôʱ���أ�",
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => "��������".$R3db8f5c8bc['dollars'].$R51c716b966['moneyunit']."�����ʲôʱ���أ����".$Rdcd9105806,
												"parentid" => 0,
												"msgtype" => 1
								);
								$R9e0664486a = factory::getinstance( "msg" );
								$R808b89ba0e = $R9e0664486a->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "׷ծ����Ϣ�����ɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
								}
								else
								{
												$this->Alert( "׷ծ����Ϣ����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
				}

				public function CreateSave( )
				{
								$this->CheckTradePwd( );
								$R901a6b96db = intval( request( "state" ) );
								$R678c687e4b = getvar( "deadline" );
								if ( trim( $R678c687e4b ) == "" )
								{
												$this->Alert( "Լ���������ڲ���Ϊ�գ�" );
												$this->HistoryGo( );
								}
								$R589311635a = getvar( "createdate" );
								if ( trim( $R589311635a ) == "" )
								{
												$this->Alert( "������ڲ���Ϊ�գ�" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 <= 0 )
								{
												$this->Alert( "����д����û�" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R3db8f5c8bc = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid" );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "���ã�����������û���" );
												$this->HistoryGo( );
								}
								$R9b252bf0a7 = doubleval( request( "dollars" ) );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "�����Ӧ�ô��� 0��" );
												$this->HistoryGo( );
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Ra982e1d90b = createloanordno( );
								$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
								$Rdcd9105806 = $Ra982e1d90b;
								$R2097a8fddf = factory::getinstance( "agents" );
								if ( $R901a6b96db == 1 )
								{
												$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,arrears,funds_loan" );
												$R7f79278d03 = $Rf51ac45ee9['arrears'] + $R9b252bf0a7;
												$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
												$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
												$Rf377ce9dba = $Rda3ac1bf9a;
												$R7f79278d03 = round( $R7f79278d03, 3 );
												$Rda3ac1bf9a = round( $Rda3ac1bf9a, 3 );
												$Rf377ce9dba = round( $Rf377ce9dba, 3 );
												$R9b63d9cfa6 = round( $R9b63d9cfa6, 3 );
												$data = array(
																"aremain" => $Rda3ac1bf9a,
																"arrears" => $R7f79278d03
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												$sess = factory::getinstance( "session" );
												$admin = $sess->admin;
												if ( $R808b89ba0e )
												{
																$data = array(
																				"aid" => $R2a51483b14,
																				"tradetype" => 32,
																				"ordno" => $Rdcd9105806,
																				"content" => $Rfb0c285961,
																				"operator" => 0,
																				"otherside" => 0,
																				"income" => $R9b252bf0a7,
																				"fat" => $Rf377ce9dba,
																				"fbt" => $R9b63d9cfa6,
																				"state" => 5,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"admname" => $admin
																);
																$Race6ab87b1 = factory::getinstance( "trades" );
																$Race6ab87b1->ITrade_Create( $data );
												}
												else
												{
																$this->Alert( "����������ϣ�����ʧ��" );
												}
								}
								else if ( $R901a6b96db == 5 )
								{
												$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,arrears,funds_loan" );
												$R7f79278d03 = $Rf51ac45ee9['arrears'] - $R9b252bf0a7;
												$R7f79278d03 = round( $R7f79278d03, 3 );
												$data = array(
																"arrears" => $R7f79278d03
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								}
								$data = array(
												"aid" => $R2a51483b14,
												"ordno" => $Ra982e1d90b,
												"dollars" => $R9b252bf0a7,
												"reason" => $Rfb0c285961,
												"thisaction" => 22,
												"state" => $R901a6b96db,
												"operator" => 0,
												"otherside" => 0,
												"createdate" => $R589311635a,
												"deadline" => $R678c687e4b,
												"payback" => 0
								);
								$Race6ab87b1 = factory::getinstance( "loan" );
								$R808b89ba0e = $Race6ab87b1->ILoan_Create( $data );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
								$data = array(
												"aid" => 0,
												"ordno" => $Ra982e1d90b,
												"dollars" => $R9b252bf0a7,
												"reason" => $Rfb0c285961,
												"thisaction" => 21,
												"state" => $R901a6b96db,
												"operator" => $R2a51483b14,
												"otherside" => $R2a51483b14,
												"createdate" => $R589311635a,
												"deadline" => $R678c687e4b,
												"payback" => 0
								);
								$R808b89ba0e = $Race6ab87b1->ILoan_Create( $data );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Loan" );
				}

				public function Add( )
				{
								$R1d47c61d5b = 1;
								if ( $R1d47c61d5b == 0 )
								{
												$this->Alert( "���ã�����Ȩ�޲��㣬�޷��ӿ����ϵ��������Ա��" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$R2097a8fddf = factory::getinstance( "agents" );
								$this->Assign( "item", $R2097a8fddf->IAgent_Get( $R2a51483b14 ) );
							
												$this->View( );
							
				}

}

?>
