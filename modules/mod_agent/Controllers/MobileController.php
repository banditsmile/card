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
class MobileController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "security" );
				}

				public function Index( )
				{
						
												$this->View( );
						
				}

				public function Mobile( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
						
												$this->Assign( "item", $R679e9b9234 );
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->View( );
						
				}

				public function Apply( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
							
												$this->Assign( "item", $R679e9b9234 );
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->View( );
							
				}

				public function CheckAgentValid( $R2a51483b14 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,tradepwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "���ã�����ǰʹ�õ��ǲ��Ժţ����Ժ����޷��޸������Ϣ�ģ�" );
												$this->HistoryGo( );
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( $R48aa85bc4e != $agent['tradepwd'] )
								{
												$this->Alert( "������Ľ��������д�����������" );
												$this->HistoryGo( );
								}
				}

				public function MobileSave( )
				{
								$this->NormalSave( "mobile", "Mobile" );
				}

				public function NormalSave( $R6c6f2ffa34, $action )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$this->CheckAgentValid( $R2a51483b14 );
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( intval( request( $R6c6f2ffa34."config2" ) ) == 2 )
								{
												$R30b2ab8dc1 = intval( request( $R6c6f2ffa34."config3" ) );
								}
								else
								{
												$R30b2ab8dc1 = intval( request( $R6c6f2ffa34."config31" ) );
								}
								$data = array(
												$R6c6f2ffa34."config" => intval( request( $R6c6f2ffa34."config1" ) ).",".intval( request( $R6c6f2ffa34."config2" ) ).",".$R30b2ab8dc1
								);
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R679e9b9234['id'] );
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $this->hander->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "security", array(
																"arg1" => $R2a51483b14,
																"arg2" => $R94e0136c8a
												) );
												$this->Alert( "���óɹ�" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Mobile&a=".$action );
				}

				public function Fetion( )
				{
								$Rd19ae93b31 = "";
								$R63bede6b19 = "abcdefghijkmnpqrstuvwxyz23456789";
								$R24d59cd0b7 = strlen( $R63bede6b19 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 6;	$Ra16d228039++	)
								{
												$num = rand( 0, $R24d59cd0b7 - 1 );
												$Rd19ae93b31 .= $R63bede6b19[$num];
								}
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$_SESSION['mobilecode'] = $Rd19ae93b31;
								$Rbb3e87fa4e = "��֤��Ϊ:".$Rd19ae93b31." ������ύ���ɰ��ֻ�����";
								$Rbb3e87fa4e = iconv( "utf-8", "UTF-8", $Rbb3e87fa4e );
								$R244f38266c = intval( request( "val" ) );
								if ( $R244f38266c )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
												$R3db8f5c8bc = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
												if ( isset( $R3db8f5c8bc['mobile'] ) )
												{
																$R7e43ed30df = $R3db8f5c8bc['mobile'];
												}
												else
												{
																echo -1;
																exit( );
												}
								}
								else
								{
												$R7e43ed30df = request( "mobile" );
								}
								$R67250bac47 = factory::getinstance( "fetion" );
								$R7adfab20b6 = array(
												"sms" => $Rbb3e87fa4e,
												"nor" => 1,
												"sendto" => $R7e43ed30df
								);
								echo $R67250bac47->IFetion_Send( $R7adfab20b6 );
				}

				public function BindMobile( )
				{
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['mobilecode'] ) )
								{
												$Rb7da52a305 = $_SESSION['mobilecode'];
								}
								$Rd19ae93b31 = getvar( "verifycode", "", "POST" );
								if ( $Rd19ae93b31 == "" || $Rb7da52a305 != $Rd19ae93b31 )
								{
												$this->Alert( "��֤�����" );
												$this->HistoryGo( );
												exit( );
								}
								$R244f38266c = intval( request( "v" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "���ã�����ǰʹ�õ��ǲ��Ժţ����Ժ����޷�������������ֻ����Ƶģ�" );
												$this->HistoryGo( );
								}
								if ( $R244f38266c )
								{
												$R679e9b9234 = $this->hander->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
												if ( isset( $R679e9b9234['id'] ) )
												{
																$R3584859062 = $R679e9b9234['id'];
																$data = array( "mobilecheck" => 0 );
																$R63bede6b19 = "�����";
																$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R3584859062 );
												}
												else
												{
																$this->Alert( "��֮ǰû���ֻ����ư󶨼�¼��������" );
																$this->ScriptRedirect( "index.php?m=mod_agent&c=Mobile&a=Apply" );
												}
								}
								else
								{
												$data = array(
																"mobile" => getvar( "mobile" ),
																"mobilecheck" => 1,
																"aid" => $R2a51483b14,
																"staffid" => $R94e0136c8a
												);
												$R63bede6b19 = "�����";
												$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
												if ( isset( $R679e9b9234['id'] ) )
												{
																$R3584859062 = $R679e9b9234['id'];
																$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R3584859062 );
												}
												else
												{
																$R808b89ba0e = $this->hander->ISecurity_Create( $data );
												}
								}
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_agent&c=Mobile&a=Apply" );
				}

}

?>
