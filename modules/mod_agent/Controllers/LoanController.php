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

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
				}

				public function Create( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,company,aremain,arrears,funds_loan" );
								$R7e345b4dca = factory::getinstance( "credit" );
								$R653b3f3623 = $R7e345b4dca->ICredit_Get( array(
												"aid" => $R2a51483b14,
												"bossid" => 0
								) );
								if ( !isset( $R653b3f3623[0]['id'] ) || $R653b3f3623[0]['isvalid'] == 0 )
								{
												$Re902658b46 = 0;
								}
								else
								{
												$Re902658b46 = $R653b3f3623[0]['credit'];
								}
								$R9a5ea0f101['credit'] = $Re902658b46;
								$this->Assign( "item", $R9a5ea0f101 );
						
												$this->View( );
						
				}

				public function Save( )
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
								$R9b252bf0a7 = doubleval( request( "dollars" ) );
								if ( 0 < $R9b252bf0a7 )
								{
												include_once( UPATH_HELPER."OrderHelper.php" );
												$Ra982e1d90b = createloanordno( );
												$Rfb0c285961 = htmlspecialchars( getvar( "reason" ) );
												$R9fe57edfd7 = intval( request( "thisaction" ) );
												$R2097a8fddf = factory::getinstance( "agents" );
												$Rc1221db860 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,arrears,funds_loan" );
												$R0fa2a0a69e = intval( request( "issys" ) );
												if ( $R9fe57edfd7 == 21 && $R9fe57edfd7 == 22 )
												{
																$this->Alert( "�Ƿ�������" );
																$this->HistoryGo( );
												}
												if ( $R9fe57edfd7 == 21 && $R0fa2a0a69e == 1 )
												{
																$this->Alert( "�����Ҫ����ϵͳ������ϵ����Ա�Ӻ�̨�۳����ɣ�" );
																$this->HistoryGo( );
												}
												if ( $R0fa2a0a69e == 1 )
												{
																$Rc57f84679f = 0;
												}
												else
												{
																$Rc57f84679f = getvar( "otherside", "" );
																if ( $Rc57f84679f == "" || !is_numeric( $Rc57f84679f ) )
																{
																				$this->Alert( "���׶Է��ı�ű��������֣�" );
																				$this->HistoryGo( );
																}
																else
																{
																				$Rc57f84679f = intval( $Rc57f84679f );
																}
												}
												if ( $Rc57f84679f < 0 )
												{
																$this->Alert( "�Ƿ�������" );
																$this->HistoryGo( );
												}
												if ( $R9fe57edfd7 == 21 && $Rc57f84679f == 0 )
												{
																$this->Alert( "�����Ҫ����ϵͳ������ϵ����Ա�Ӻ�̨�۳����ɣ�" );
																$this->HistoryGo( );
												}
												if ( $Rc57f84679f == $R2a51483b14 )
												{
																$this->Alert( "���׶Է��������Լ���" );
																$this->HistoryGo( );
												}
												if ( $R9fe57edfd7 == 22 )
												{
																$R901a6b96db = 0;
												}
												else
												{
																$R901a6b96db = 1;
												}
												$R678c687e4b = getvar( "deadline" );
												if ( trim( $R678c687e4b ) == "" )
												{
																$this->Alert( "Լ���������ڲ���Ϊ�գ�" );
																$this->HistoryGo( );
												}
												$R0eb31849cf = array(
																"aid" => $R2a51483b14,
																"ordno" => $Ra982e1d90b,
																"dollars" => $R9b252bf0a7,
																"reason" => $Rfb0c285961,
																"thisaction" => $R9fe57edfd7,
																"state" => $R901a6b96db,
																"operator" => $R63384ccc42,
																"otherside" => $Rc57f84679f,
																"createdate" => date( "Y-m-d H-i-s" ),
																"deadline" => $R678c687e4b,
																"payback" => 0
												);
												$R563528d352 = array(
																"aid" => $Rc57f84679f,
																"ordno" => $Ra982e1d90b,
																"dollars" => $R9b252bf0a7,
																"reason" => $Rfb0c285961,
																"thisaction" => $R9fe57edfd7 == 22 ? 21 : 22,
																"state" => $R901a6b96db,
																"operator" => $R2a51483b14,
																"otherside" => $R2a51483b14,
																"createdate" => date( "Y-m-d H-i-s" ),
																"deadline" => $R678c687e4b,
																"payback" => 0
												);
												$R71dfa8a4fc = getvar( "superpwd" );
												$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
												if ( 0 < $R679e9b9234 )
												{
																$this->Alert( "��������������������������" );
																$this->HistoryGo( );
												}
												$R51c716b966 = $this->SetLang( 1 );
												if ( $R9fe57edfd7 == 22 )
												{
																$Rd7a133b20f = $R9b252bf0a7;
																if ( $Rc57f84679f == 0 )
																{
																				$R63bede6b19 = "���Ѿ���ϵͳ�ύ���".$R9b252bf0a7.$R51c716b966['moneyunit']."������,���Ϊ��";
																				$R034ae2ab94 = $this->AutoLoan( $R563528d352 );
																				if ( $R034ae2ab94 == 0 )
																				{
																								$R63bede6b19 = "���Ѿ���ϵͳ���".$R9b252bf0a7.$R51c716b966['moneyunit']."(�Զ�����),���Ϊ��";
																								$R0eb31849cf['state'] = 1;
																								$R563528d352['state'] = 1;
																				}
																}
																else
																{
																				if ( !$R2097a8fddf->IAgent_IsExistById( $Rc57f84679f ) )
																				{
																								$this->Alert( "�����д��������������" );
																								$this->HistoryGo( );
																				}
																				$R63bede6b19 = "���Ѿ�����Ϊ".$Rc57f84679f."���̼��ύ���".$R9b252bf0a7.$R51c716b966['moneyunit']."������,���Ϊ��";
																}
																$R901a6b96db = 0;
												}
												else
												{
																$Rd541ac7c24 = $R9b252bf0a7;
																if ( $Rc57f84679f == 0 )
																{
																				$R63bede6b19 = "���Ѿ���ϵͳ����".$R9b252bf0a7.$R51c716b966['moneyunit'].",���Ϊ��";
																}
																else
																{
																				if ( !$R2097a8fddf->IAgent_IsExistById( $Rc57f84679f ) )
																				{
																								$this->Alert( "����д��������������" );
																								$this->HistoryGo( );
																				}
																				$R63bede6b19 = "���Ѿ�����Ϊ".$Rc57f84679f."���̼Ҵ���".$R9b252bf0a7.$R51c716b966['moneyunit'].",���Ϊ��";
																}
																$R44c183f331 = doubleval( $Rc1221db860['funds_loan'] ) + $R9b252bf0a7;
																$Rda3ac1bf9a = $Rc1221db860['aremain'] - $R9b252bf0a7;
																if ( $Rda3ac1bf9a < 0 )
																{
																				$this->Alert( "�ʽ����Դ˴�����Ŀ�������������" );
																				$this->HistoryGo( );
																}
																$R44c183f331 = round( $R44c183f331, 2 );
																$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
																$R3ab1f9eb35 = $Rc1221db860['aremain'];
																$Rc0c42883ee = $Rda3ac1bf9a;
																$data = array(
																				"aremain" => $Rda3ac1bf9a,
																				"funds_loan" => $R44c183f331
																);
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																if ( $R808b89ba0e )
																{
																				$data = array(
																								"aid" => $R2a51483b14,
																								"tradetype" => 21,
																								"ordno" => $Ra982e1d90b,
																								"content" => $Rfb0c285961,
																								"operator" => $R63384ccc42,
																								"otherside" => $Rc57f84679f,
																								"outcome" => $R9b252bf0a7,
																								"fat" => $Rc0c42883ee,
																								"fbt" => $R3ab1f9eb35,
																								"state" => 5,
																								"createdate" => date( "Y-m-d H-i-s" )
																				);
																				$Race6ab87b1 = factory::getinstance( "trades" );
																				$Race6ab87b1->ITrade_Create( $data );
																				$Rcc5c6e696c[6] = $Rda3ac1bf9a;
																				$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
																				if ( 0 < $Rc57f84679f )
																				{
																								$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
																								$R7f79278d03 = $Rf51ac45ee9['arrears'] + $R9b252bf0a7;
																								$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
																								$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
																								$Rf377ce9dba = $Rda3ac1bf9a;
																								$R7f79278d03 = round( $R7f79278d03, 2 );
																								$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
																								$data = array(
																												"aremain" => $Rda3ac1bf9a,
																												"arrears" => $R7f79278d03
																								);
																								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $Rc57f84679f );
																								if ( $R808b89ba0e )
																								{
																												$data = array(
																																"aid" => $Rc57f84679f,
																																"tradetype" => 22,
																																"ordno" => $Ra982e1d90b,
																																"content" => $Rfb0c285961,
																																"operator" => $R2a51483b14,
																																"otherside" => $R2a51483b14,
																																"income" => $R9b252bf0a7,
																																"fat" => $Rf377ce9dba,
																																"fbt" => $R9b63d9cfa6,
																																"state" => 5,
																																"createdate" => date( "Y-m-d H-i-s" )
																												);
																												$Race6ab87b1->ITrade_Create( $data );
																								}
																								else
																								{
																												$this->Alert( "����������ϣ�����ʧ��" );
																								}
																				}
																}
																else
																{
																				$this->Alert( "����������ϣ�����ʧ��" );
																}
																$R901a6b96db = 5;
												}
												$Race6ab87b1 = factory::getinstance( "loan" );
												$R808b89ba0e = $Race6ab87b1->ILoan_Create( $R0eb31849cf );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "����ʧ�ܣ�" );
																$this->HistoryGo( );
												}
												$Race6ab87b1->ILoan_Create( $R563528d352 );
												$Re82ee9b121 = $R63bede6b19.$Ra982e1d90b;
												$this->AddLog( $Re82ee9b121, $R2a51483b14, $R63384ccc42 );
												$this->Alert( $Re82ee9b121 );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Loan" );
								}
								else
								{
												$this->Alert( "���Ӧ�ô���0������������" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
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
												"thisaction" => getvar( "thisaction", "21,22" )
								);
								$Race6ab87b1 = factory::getinstance( "loan" );
								$R4e420efcc3 = $Race6ab87b1->ILoan_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
						
												$this->view( );
				
				}

				public function Refuse( )
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
								$R71dfa8a4fc = getvar( "superpwd" );
								$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
								if ( 0 < $R679e9b9234 )
								{
												$this->Alert( "��������������������������" );
												$this->HistoryGo( );
								}
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
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "����Ȩ������" );
												$this->HistoryGo( );
								}
								$data = array( "state" => -1 );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Loan" );
				}

				public function Repayment( )
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
								$R71dfa8a4fc = getvar( "superpwd" );
								$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
								if ( 0 < $R679e9b9234 )
								{
												$this->Alert( "��������������������������" );
												$this->HistoryGo( );
								}
								$Rdcd9105806 = getvar( "ordno" );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$data = array(
												"ordno" => $Rdcd9105806,
												"thisaction" => 22
								);
								$R3db8f5c8bc = $R9bee740ff2->ILoan_GetByArr( $data );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "��¼�Ѿ������ڣ�" );
												$this->HistoryGo( );
								}
								$R697a03ac8c = intval( $R3db8f5c8bc['payback'] );
								if ( $R697a03ac8c < 0 )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$R9b252bf0a7 = $R3db8f5c8bc['dollars'];
								$R9b252bf0a7 -= $R697a03ac8c;
								if ( $R3db8f5c8bc['thisaction'] != 22 || $R3db8f5c8bc['state'] != 1 || $R2a51483b14 != $R3db8f5c8bc['aid'] )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rc1221db860 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,arrears,funds_loan" );
								$Rc57f84679f = $R3db8f5c8bc['otherside'];
								$R7f79278d03 = doubleval( $Rc1221db860['arrears'] ) - $R9b252bf0a7;
								$Rda3ac1bf9a = $Rc1221db860['aremain'] - $R9b252bf0a7;
								if ( $Rda3ac1bf9a < 0 )
								{
												$this->Alert( "�ʽ��㣡" );
												$this->HistoryGo( );
								}
								$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
								$R3ab1f9eb35 = $Rc1221db860['aremain'];
								$Rc0c42883ee = $Rda3ac1bf9a;
								$Rfb0c285961 = "����".$Rdcd9105806;
								$data = array(
												"aremain" => $Rda3ac1bf9a,
												"arrears" => $R7f79278d03
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"tradetype" => 31,
																"ordno" => $Rdcd9105806,
																"content" => $Rfb0c285961,
																"operator" => $R63384ccc42,
																"otherside" => $Rc57f84679f,
																"outcome" => $R9b252bf0a7,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"state" => 5,
																"createdate" => date( "Y-m-d H-i-s" )
												);
												$Race6ab87b1 = factory::getinstance( "trades" );
												$Race6ab87b1->ITrade_Create( $data );
												$Rcc5c6e696c[6] = $Rda3ac1bf9a;
												$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
												if ( 0 < $Rc57f84679f )
												{
																$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
																$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
																$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
																$Rf377ce9dba = $Rda3ac1bf9a;
																$R7f79278d03 = round( $R7f79278d03, 2 );
																$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
																$data = array(
																				"aremain" => $Rda3ac1bf9a
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
																				$Race6ab87b1->ITrade_Create( $data );
																}
																else
																{
																				$this->Alert( "����������ϣ�����ʧ��" );
																}
												}
												$data = array(
																"state" => 5,
																"paybackdate" => date( "Y-m-d H:i:s" ),
																"payback" => $R3db8f5c8bc['dollars']
												);
												$R9bee740ff2 = factory::getinstance( "loan" );
												$R9bee740ff2->ILoan_Update( $data, $Rdcd9105806 );
								}
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Loan" );
				}

				public function AutoLoan( $R3db8f5c8bc )
				{
								$R9b252bf0a7 = $R3db8f5c8bc['dollars'];
								$R2a51483b14 = $R3db8f5c8bc['aid'];
								$Rc57f84679f = $R3db8f5c8bc['otherside'];
								$R7e345b4dca = factory::getinstance( "credit" );
								$R653b3f3623 = $R7e345b4dca->ICredit_Get( array(
												"aid" => $Rc57f84679f,
												"bossid" => 0
								) );
								if ( !isset( $R653b3f3623[0]['id'] ) || $R653b3f3623[0]['isvalid'] == 0 )
								{
												return -1;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9bee740ff2 = factory::getinstance( "loan" );
								$Rdcd9105806 = $R3db8f5c8bc['ordno'];
								$Rfb0c285961 = "ͬ����(�Զ�����),���".$Rdcd9105806;
								if ( 0 < $Rc57f84679f )
								{
												$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
												$R7f79278d03 = $Rf51ac45ee9['arrears'] + $R9b252bf0a7;
												$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
												$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
												$Rf377ce9dba = $Rda3ac1bf9a;
												$R7f79278d03 = round( $R7f79278d03, 2 );
												$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
												$data = array(
																"aremain" => $Rda3ac1bf9a,
																"arrears" => $R7f79278d03
												);
												if ( $R653b3f3623[0]['credit'] < $R7f79278d03 )
												{
																return -1;
												}
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
																return 0;
												}
												else
												{
																return -1;
												}
								}
								return -1;
				}

				public function CheckIn( )
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
								$R71dfa8a4fc = getvar( "superpwd" );
								$R679e9b9234 = $R2097a8fddf->IAgent_CheckSuperPwd( $R2a51483b14, $R71dfa8a4fc );
								if ( 0 < $R679e9b9234 )
								{
												$this->Alert( "��������������������������" );
												$this->HistoryGo( );
								}
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
								if ( $R3db8f5c8bc['thisaction'] != 21 || $R3db8f5c8bc['state'] != 0 || $R2a51483b14 != $R3db8f5c8bc['aid'] )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rc1221db860 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,arrears,funds_loan" );
								$Rc57f84679f = $R3db8f5c8bc['otherside'];
								$R44c183f331 = doubleval( $Rc1221db860['funds_loan'] ) + $R9b252bf0a7;
								$Rda3ac1bf9a = $Rc1221db860['aremain'] - $R9b252bf0a7;
								if ( $Rda3ac1bf9a < 0 )
								{
												$this->Alert( "�ʽ��㣡" );
												$this->HistoryGo( );
								}
								$R44c183f331 = round( $R44c183f331, 2 );
								$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
								$R3ab1f9eb35 = $Rc1221db860['aremain'];
								$Rc0c42883ee = $Rda3ac1bf9a;
								$Rfb0c285961 = "ͬ����,���".$Rdcd9105806;
								$data = array(
												"aremain" => $Rda3ac1bf9a
								);
								if ( $Rc57f84679f == 0 )
								{
												$data['funds_loan'] = $R44c183f331;
								}
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"tradetype" => 31,
																"ordno" => $Rdcd9105806,
																"content" => $Rfb0c285961,
																"operator" => $R63384ccc42,
																"otherside" => $Rc57f84679f,
																"outcome" => $R9b252bf0a7,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"state" => 5,
																"createdate" => date( "Y-m-d H-i-s" )
												);
												$Race6ab87b1 = factory::getinstance( "trades" );
												$Race6ab87b1->ITrade_Create( $data );
												$Rcc5c6e696c[6] = $Rda3ac1bf9a;
												$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
												if ( 0 < $Rc57f84679f )
												{
																$Rf51ac45ee9 = $R2097a8fddf->IAgent_Get( $Rc57f84679f, "aremain,arrears,funds_loan" );
																$R7f79278d03 = $Rf51ac45ee9['arrears'] + $R9b252bf0a7;
																$Rda3ac1bf9a = $Rf51ac45ee9['aremain'] + $R9b252bf0a7;
																$R9b63d9cfa6 = $Rf51ac45ee9['aremain'];
																$Rf377ce9dba = $Rda3ac1bf9a;
																$R7f79278d03 = round( $R7f79278d03, 2 );
																$Rda3ac1bf9a = round( $Rda3ac1bf9a, 2 );
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
								}
								$this->Alert( "��ɲ���" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Loan" );
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
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
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
												"title" => "��������".$R3db8f5c8bc['dollars'].$R51c716b966['moneyunit']."�����ʲôʱ���أ�",
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
												$this->ScriptRedirect( "index.php?m=mod_agent&c=loan" );
								}
								else
								{
												$this->Alert( "׷ծ����Ϣ����ʧ�ܣ�" );
												$this->HistoryGo( );
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
												"content" => "ʹ��һ��ͨ��ֵ".$R9b252bf0a7.$R51c716b966['moneyunit'],
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

}

?>
