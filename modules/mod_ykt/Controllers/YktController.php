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
class YktController extends Controller
{

				public function __construct( )
				{
				}

				public function Check( )
				{
								$this->YktInit( "һ��ͨ״̬��ѯ" );
							
												$this->View( );
								
				}

				public function Tran( )
				{
								$this->YktInit( "һ��ͨ����ת" );
								
												$this->View( );
								
				}

				public function Valid( )
				{
								if ( !$this->CheckCode( ) )
								{
												$this->Alert( "��֤����������" );
												$this->HistoryGo( );
								}
								$R1df8368da5 = getvar( "yktnumber", "", "POST" );
								$R754594c79e = getvar( "yktpwd", "", "POST" );
								if ( $R1df8368da5 == "" && $R754594c79e == "" )
								{
												$this->Alert( "û�д�һ��ͨ������������" );
												$this->HistoryGo( );
								}
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"cardnumber" => $R1df8368da5,
												"cardpwd" => base64_encode( $R754594c79e )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data );
								if ( isset( $R3db8f5c8bc['money'] ) && $R3db8f5c8bc['ptype'] == 100 && $R3db8f5c8bc['cardok'] < 4 && $R3db8f5c8bc['cardok'] != 2 )
								{
												$Rac9624ef40 = $R3db8f5c8bc['money'] * 100;
												$this->Assign( "points", $R3db8f5c8bc['money'] );
								}
								else if ( isset( $R3db8f5c8bc['ptype'] ) && $R3db8f5c8bc['ptype'] == 101 )
								{
												$this->Alert( "�ӿ��һ��ͨ�������ѯ" );
												$this->HistoryGo( );
								}
								else if ( isset( $R3db8f5c8bc['cardok'] ) && $R3db8f5c8bc['cardok'] == 2 )
								{
												$this->Alert( "һ��ͨ���ڶ���״̬������ϵ����Ա" );
												$this->HistoryGo( );
								}
								else
								{
												$this->Alert( "û�д�һ��ͨ������������" );
												$this->HistoryGo( );
								}
								$this->YktInit( $R1df8368da5."һ��ͨ״̬��ѯ" );
								$this->Assign( "cardnumber", $R1df8368da5 );
								$Race6ab87b1 = factory::getinstance( "trades" );
								$R75f41a11b0 = $this->GetSysById( 27, 0 );
								$R90ddbed49d = $R3218f9342a == 1 ? false : true;
								$R4e420efcc3 = $Race6ab87b1->ITrade_GetByYktNumber( $R1df8368da5, "*", $R90ddbed49d );
								if ( count( $R4e420efcc3 ) == 1 )
								{
												$Rdcd9105806 = $R4e420efcc3[0]['ordno'];
								}
								$this->Assign( "items", $R4e420efcc3 );
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "config" );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 11 < $R30aa8c1852 )
								{
												$R581012b834 = $Rcc5c6e696c[11];
								}
								else
								{
												$R581012b834 = 0;
								}
							
												$this->Assign( "cancancel", $R581012b834 );
												$this->View( );
								
				}

				public function TranSave( )
				{
								if ( !$this->CheckCode( ) )
								{
												$this->Alert( "��֤����������" );
												$this->HistoryGo( );
								}
								if ( $this->GetCanTran( ) == false )
								{
												$this->Alert( "ϵͳ�Ѿ�������ת�����ܣ�" );
												$this->HistoryGo( );
								}
								$R3d1177543a = getvar( "outyktnumber", "", "POST" );
								$Rb5f4b190f0 = getvar( "outyktpwd", "", "POST" );
								$Ra7928eba22 = getvar( "inyktnumber", "", "POST" );
								$R8d8bf6e439 = getvar( "inyktpwd", "", "POST" );
								$R230edc3dff = intval( getvar( "tranpoints", "", "POST" ) );
								if ( $R230edc3dff <= 0 )
								{
												$this->Alert( "ת�������Ч������������" );
												$this->HistoryGo( );
								}
								else
								{
												$R230edc3dff /= 100;
								}
								if ( $R3d1177543a == "" && $Rb5f4b190f0 == "" )
								{
												$this->Alert( "ת����һ��ͨ������Ϊ�գ�����������" );
												$this->HistoryGo( );
								}
								if ( $Ra7928eba22 == "" && $R8d8bf6e439 == "" )
								{
												$this->Alert( "ת���һ��ͨ������Ϊ�գ�����������" );
												$this->HistoryGo( );
								}
								$Re1f1f7bd63 = $this->CanTran( $R3d1177543a, $Rb5f4b190f0, $Ra7928eba22, $R8d8bf6e439 );
								if ( !$Re1f1f7bd63 )
								{
												$this->Alert( "�����ſ�������ת����" );
												$this->HistoryGo( );
								}
								$R1dde15ad0f = $this->CheckYkt( $R3d1177543a, $Rb5f4b190f0 );
								if ( $R1dde15ad0f == 0 )
								{
												$this->Alert( "ת��һ��ͨ���� ".$Rac9624ef40." �㣡����������������һ��ͨ" );
												$this->HistoryGo( );
								}
								if ( $R1dde15ad0f < $R230edc3dff )
								{
												$this->Alert( "ת���ĵ���(".$R230edc3dff."��)����һ��ͨ���е����(".$R1dde15ad0f."��)������������" );
												$this->HistoryGo( );
								}
								$R0014f9225d = $this->CheckYkt( $Ra7928eba22, $R8d8bf6e439 );
								$Ree85fbffc2 = $R1dde15ad0f;
								$Rcd9027b4c6 = $R1dde15ad0f - $R230edc3dff;
								$Race7e2e038 = $R0014f9225d;
								$R9e6732849d = $R0014f9225d + $R230edc3dff;
								$R0f8134fb60 = array(
												"cardnumber" => $R3d1177543a,
												"cardpwd" => base64_encode( $Rb5f4b190f0 )
								);
								$data = array(
												"money" => $Rcd9027b4c6
								);
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rf541845af3->ICard_UpdateCardPwd( $data, $R0f8134fb60 );
								$R0f8134fb60 = array(
												"cardnumber" => $Ra7928eba22,
												"cardpwd" => base64_encode( $R8d8bf6e439 )
								);
								$data = array(
												"money" => $R9e6732849d
								);
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rf541845af3->ICard_UpdateCardPwd( $data, $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$R51c716b966 = $this->SetLang( 1 );
								$Re82ee9b121 = "�ӿ���".$R3d1177543a."ת��".$R230edc3dff.$R51c716b966['moneyunit']."������".$Ra7928eba22;
								$this->UpdateTrade( $Rdcd9105806, $R3d1177543a, 0, $R230edc3dff, $Ra7928eba22, $Rcd9027b4c6, $Ree85fbffc2, $Re82ee9b121, $R3d1177543a );
								$this->UpdateTrade( $Rdcd9105806, $Ra7928eba22, $R230edc3dff, 0, $R3d1177543a, $R9e6732849d, $Race7e2e038, $Re82ee9b121, $Ra7928eba22 );
								$R230edc3dff *= 100;
								$Rcd9027b4c6 *= 100;
								$R9e6732849d *= 100;
								$Re82ee9b121 = "�ɹ��ӿ���".$R3d1177543a."(Ŀǰ��".$Rcd9027b4c6."��)ת��".$R230edc3dff."�㵽����".$Ra7928eba22."(Ŀǰ��".$R9e6732849d."��)";
								$this->Alert( $Re82ee9b121 );
								$this->HistoryGo( );
				}

				public function UpdateTrade( $Rdcd9105806, $R63384ccc42, $Rd7a133b20f, $Rd541ac7c24, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Re82ee9b121, $R1df8368da5 )
				{
								$data = array(
												"aid" => 0,
												"tradetype" => 103,
												"ordno" => $Rdcd9105806,
												"income" => $Rd7a133b20f,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"ykt" => 1,
												"yktnumber" => $R1df8368da5,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function GetOnlyProductCanTran( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "../content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return true;
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 24 < $R30aa8c1852 )
								{
												$R808b89ba0e = $Rcc5c6e696c[24];
								}
								else
								{
												$R808b89ba0e = 0;
								}
								return $R808b89ba0e == 0 ? false : true;
				}

				public function CanTran( $R3d1177543a, $Rb5f4b190f0, $Ra7928eba22, $R8d8bf6e439 )
				{
								if ( $R3d1177543a == $Ra7928eba22 && $Rb5f4b190f0 == $R8d8bf6e439 )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"cardnumber" => $R3d1177543a,
												"cardpwd" => base64_encode( $Rb5f4b190f0 )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "price,ptype,cardgroup,cardok,inrecycle" );
								if ( !isset( $R3db8f5c8bc['price'] ) )
								{
												$this->Alert( "ת����һ��ͨ����������������" );
												$this->HistoryGo( );
								}
								else
								{
												$R6fa58a7922 = $R3db8f5c8bc['price'];
												$Rbf81d4c91b = $R3db8f5c8bc['ptype'];
												$R73973de46b = $R3db8f5c8bc['cardgroup'];
								}
								if ( $R3db8f5c8bc['cardok'] != 1 || $R3db8f5c8bc['inrecycle'] )
								{
												$this->Alert( "ת����һ��ͨ��Ч��" );
												$this->HistoryGo( );
								}
								$data = array(
												"cardnumber" => $Ra7928eba22,
												"cardpwd" => base64_encode( $R8d8bf6e439 )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "price,ptype,cardgroup,cardok,inrecycle" );
								if ( !isset( $R3db8f5c8bc['price'] ) )
								{
												$this->Alert( "ת���һ��ͨ����������������" );
												$this->HistoryGo( );
								}
								else
								{
												$Ref4e26f722 = $R3db8f5c8bc['price'];
												$R97f489e019 = $R3db8f5c8bc['ptype'];
												$Red251eb0a8 = $R3db8f5c8bc['cardgroup'];
								}
								if ( $R3db8f5c8bc['cardok'] != 1 || $R3db8f5c8bc['inrecycle'] )
								{
												$this->Alert( "ת���һ��ͨ��Ч��" );
												$this->HistoryGo( );
								}
								if ( $Rbf81d4c91b != $R97f489e019 )
								{
												return false;
								}
								if ( $this->GetOnlyProductCanTran( ) == true )
								{
												if ( $Red251eb0a8 != $R73973de46b )
												{
																$Rec6873219d = factory::getinstance( "buyrights" );
																$R1e4b3930bd = $Rec6873219d->IBuyRights_GetByStr( " param='yktgroup' and idx='".$R73973de46b."'", "idx,pids,isok" );
																$Rf9b26dc98b = 1;
																$R32941c1d14 = "out";
																if ( isset( $R1e4b3930bd[0]['idx'] ) )
																{
																				$R80937cf8db = $R1e4b3930bd[0]['isok'];
																				$Rf9b26dc98b = 0;
																				$R32941c1d14 = $R1e4b3930bd[0]['pids'];
																}
																$R48ecc5139c = $Rec6873219d->IBuyRights_GetByStr( " param='yktgroup' and idx='".$Red251eb0a8."'", "idx,pids,isok" );
																$Rd0d9af904f = 1;
																$R9be433914f = "in";
																if ( isset( $R48ecc5139c[0]['idx'] ) )
																{
																				$R102b5af0d0 = $R48ecc5139c[0]['isok'];
																				$Rd0d9af904f = 0;
																				$R9be433914f = $R48ecc5139c[0]['pids'];
																}
																if ( $Rf9b26dc98b == 1 && $Rf9b26dc98b == $Rd0d9af904f )
																{
																				return true;
																}
																else if ( $R9be433914f == $R32941c1d14 && $R102b5af0d0 == $R80937cf8db )
																{
																				return true;
																}
																else
																{
																				return false;
																}
												}
												else
												{
																return true;
												}
								}
								$R349616552c = factory::getinstance( "ykttrans" );
								$R3db8f5c8bc = $R349616552c->IYktTrans_Get( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['permit'] == 1 )
												{
																if ( intval( $R0f8134fb60['outprice'] ) == 0 || intval( $R0f8134fb60['inprice'] ) == 0 )
																{
																				if ( strstr( $R3d1177543a, $R0f8134fb60['outfeature'] ) != false && strstr( $Ra7928eba22, $R0f8134fb60['infeature'] ) != false )
																				{
																								return true;
																				}
																}
																else if ( $R0f8134fb60['outfeature'] == "" || $R0f8134fb60['infeature'] == "" )
																{
																				if ( $R6fa58a7922 == $R0f8134fb60['outprice'] && $Ref4e26f722 == $R0f8134fb60['inprice'] )
																				{
																								return true;
																				}
																}
																else if ( intval( $R0f8134fb60['outprice'] ) == 0 && intval( $R0f8134fb60['inprice'] ) == 0 && strstr( $R3d1177543a, $R0f8134fb60['outfeature'] ) != false && strstr( $Ra7928eba22, $R0f8134fb60['infeature'] ) != false )
																{
																				return true;
																}
												}
								}
								return false;
				}

				public function GetYktPrice( $R1df8368da5, $R754594c79e )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"cardnumber" => $R1df8368da5,
												"cardpwd" => base64_encode( $R754594c79e )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "price" );
								if ( !isset( $R3db8f5c8bc['price'] ) )
								{
												$this->Alert( "һ��ͨ�����ڻ��߿���������������" );
												$this->HistoryGo( );
								}
								else
								{
												return $R3db8f5c8bc['price'];
								}
								return 0;
				}

				public function GetYktType( $R1df8368da5, $R754594c79e )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"cardnumber" => $R1df8368da5,
												"cardpwd" => base64_encode( $R754594c79e )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data, "ptype" );
								if ( !isset( $R3db8f5c8bc['price'] ) )
								{
												$this->Alert( "һ��ͨ�����ڣ�" );
												$this->HistoryGo( );
								}
								else
								{
												return $R3db8f5c8bc['ptype'];
								}
				}

				public function CheckYkt( $R1df8368da5, $R754594c79e )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"cardnumber" => $R1df8368da5,
												"cardpwd" => base64_encode( $R754594c79e )
								);
								$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data );
								if ( isset( $R3db8f5c8bc['money'] ) && $R3db8f5c8bc['ptype'] == 100 && $R3db8f5c8bc['cardok'] < 4 && $R3db8f5c8bc['cardok'] != 2 )
								{
												$Rac9624ef40 = $R3db8f5c8bc['money'];
												return $Rac9624ef40;
								}
								else
								{
												$this->Alert( "ת��һ��ͨ�����������������" );
												$this->HistoryGo( );
								}
								return 0;
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

				public function Cancel( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								if ( trim( $Rdcd9105806 ) == "" )
								{
												$this->Alert( "�����Ų���Ϊ��" );
												$this->WinClose( );
								}
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "config" );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 11 < $R30aa8c1852 )
								{
												$R581012b834 = $Rcc5c6e696c[11];
								}
								else
								{
												$R581012b834 = 0;
								}
								if ( $R581012b834 == 0 )
								{
												$this->Alert( "ϵͳ��δ��ͨ�Զ�����Ȩ�ޣ�" );
												$this->WinClose( );
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R3db8f5c8bc = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "*" );
								if ( !isset( $R3db8f5c8bc['ordstate'] ) )
								{
												$this->Alert( "�����Ѿ�������" );
												$this->WinClose( );
								}
								if ( $R3db8f5c8bc['ordstate'] != 1 )
								{
												$this->Alert( "�����Ѿ������޷�����" );
												$this->WinClose( );
								}
								if ( $R3db8f5c8bc['ptype'] != 2 )
								{
												$this->Alert( "���ֹ������Ʒ����������" );
												$this->WinClose( );
								}
								$Rc42296c681 = date( "Y-m-d H:i:s" );
								$Rb432fbb490 = $this->DateDiff( $R3db8f5c8bc['orddate'], $Rc42296c681 );
								if ( $Rb432fbb490 < 30 )
								{
												$this->Alert( "�µ���30���Ӳſ��Գ������ӣ�" );
												$this->WinClose( );
								}
								$this->RollBackMoney_3( $R3db8f5c8bc );
								$this->SendMsg( );
								$this->Alert( "�����ɹ���" );
								$this->WinClose( );
				}

				public function DateDiff( $R8e24d13548, $Rc42296c681 )
				{
								if ( is_string( $R8e24d13548 ) )
								{
												$R8e24d13548 = strtotime( $R8e24d13548 );
								}
								if ( is_string( $Rc42296c681 ) )
								{
												$Rc42296c681 = strtotime( $Rc42296c681 );
								}
								return ( $Rc42296c681 - $R8e24d13548 ) / 60;
				}

				public function WinClose( )
				{
								echo "<script>window.close();</script>";
								exit( );
				}

				public function RollBackMoney_3( $R56ea904d53 )
				{
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$Rcc8a91d7c7 = factory::getinstance( "cards" );
								$this->RollYktMoney( $Rdcd9105806 );
								$Rfb0c285961 = getvar( "reason" );
								$data = array(
												"ordstate" => -1,
												"failreason" => "�û����г�����ԭ��".$Rfb0c285961,
												"factoryreturn" => "�û����г�����ԭ��".$Rfb0c285961,
												"rollback" => 1,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
								$Rae8a26f24a = factory::getinstance( "trades" );
								$data = array( "state" => -1 );
								$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
				}

				public function RollYktMoney( $Rdcd9105806 )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$R21ef3485d7 = $Rf541845af3->ICard_GetByTrade( $Rdcd9105806 );
								foreach ( $R21ef3485d7 as $R0f8134fb60 )
								{
												$R72852f08e6 = $R0f8134fb60['money'] + $R0f8134fb60['outcome'];
												$data = array(
																"money" => $R72852f08e6,
																"cardok" => 1
												);
												$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
								}
								$Rae8a26f24a = factory::getinstance( "trades" );
								$data = array( "state" => -1 );
								$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
				}

				public function SendMsg( )
				{
								$data = array(
												"msgfrom" => "����",
												"msgto" => 0,
												"msgcc" => "",
												"title" => "[ǰ̨��������]�����ţ�".getvar( "ordno" ),
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => "[��������]ԭ��".getvar( "reason" ),
												"parentid" => 0,
												"msgtype" => 1,
												"comefrom" => 3
								);
								$R9e0664486a = factory::getinstance( "msg" );
								$R9e0664486a->IMsg_Create( $data );
				}

}

?>
