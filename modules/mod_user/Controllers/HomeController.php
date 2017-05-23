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
class HomeController extends Controller
{

				public $hander = NULL;
				public $session = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "agents" );
								$this->session = factory::getinstance( "session" );
								$this->SetUser( );
								$this->Init( );
				}

				public function GoHome( )
				{
								$this->ScriptRedirect( "index.php?m=mod_b2c" );
				}

				public function SetUser( )
				{
								$agent = $this->session->user;
								if ( $agent == "" )
								{
												$this->Alert( "����δ��¼ϵͳ�����ȵ�½��" );
												$this->GoHome( );
								}
								$R3db8f5c8bc = $this->hander->IAgent_GetByName( $agent[0] );
								if ( !isset( $R3db8f5c8bc['aname'] ) )
								{
												$this->Alert( "����δ��¼ϵͳ�����ȵ�½��" );
												$this->GoHome( );
								}
								if ( $R3db8f5c8bc['frozen'] == 1 )
								{
												$this->Alert( "����δ��¼ϵͳ�����ȵ�½��" );
												$this->GoHome( );
								}
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R6009e84434 = $R063e6693e5->IRank_GetNameById( $R3db8f5c8bc['alv'] );
								$R3db8f5c8bc['rankname'] = $R6009e84434;
								$this->Assign( "data", $R3db8f5c8bc );
				}

				public function Init( )
				{
								$this->ShopInit( "�û���������" );
				}

				public function Index( )
				{
								
												$this->View( );
								
				}

				public function Save( )
				{
								if ( $this->session->user != "" )
								{
												$Rcc5c6e696c = $this->session->user;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R00bb5d9597 = $Rcc5c6e696c[8];
								}
								else
								{
												$this->GoHome( );
								}
								$R6ae960df43 = getvar( "ubzcompany", "", "POST" );
								$R72f6fd380c = getvar( "ubzprv", "", "POST" );
								$Rcd67889baf = getvar( "ubzcity", "", "POST" );
								$R6ae960df43 = str_replace( "|", "", $R6ae960df43 );
								$R72f6fd380c = str_replace( "|", "", $R72f6fd380c );
								$Rcd67889baf = str_replace( "|", "", $Rcd67889baf );
								$data = array(
												"prv" => $R72f6fd380c,
												"city" => $Rcd67889baf,
												"company" => $R6ae960df43,
												"eshop" => getvar( "ubzeshop", "" ),
												"arealname" => getvar( "ubzcrealname" ),
												"aqq" => getvar( "ubzcqq" ),
												"amail" => getvar( "ubzcmail" ),
												"atel" => getvar( "ubzctel" ),
												"aaddr" => getvar( "ubzcaddr" )
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "�������ϸ��ĳɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_user&c=home" );
								}
								else
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
				}

				public function ModifyPass( )
				{
								$agent = $this->session->user;
								if ( $agent == "" )
								{
												$this->Alert( "����δ��¼ϵͳ�����ȵ�½��" );
												$this->GoHome( );
								}
						
												$this->Init( );
												$this->View( );
						
				}

				public function SavePassWord( )
				{
								$Rcc5c6e696c = $this->session->user;
								if ( $Rcc5c6e696c == "" )
								{
												$this->Alert( "����δ��¼ϵͳ�����ȵ�½��" );
												$this->GoHome( );
								}
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rd5f59c5c64 = $Rcc5c6e696c[8];
								$R06c91c0071 = getvar( "oldpass" );
								$Rda66745260 = getvar( "newpass" );
								if ( md5( $R06c91c0071 ) != $Rd5f59c5c64 )
								{
												$this->Alert( "���ľ������������" );
												$this->HistoryGo( );
								}
								else
								{
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$data = array(
																				"staffpwd" => $Rda66745260
																);
																$R808b89ba0e = $this->hander->IStaff_Update( $data, $R2a51483b14 );
												}
												else
												{
																$data = array(
																				"apwd" => $Rda66745260
																);
																$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
												}
												if ( $R808b89ba0e )
												{
																$this->Alert( "�����޸ĳɹ���" );
																$Rcc5c6e696c[8] = md5( $Rda66745260 );
																$this->session->set( "userinfo", implode( "|", $Rcc5c6e696c ) );
												}
												else
												{
																$this->Alert( "�����޸�ʧ�ܣ�" );
												}
												$this->ScriptRedirect( "index.php?m=mod_user&c=home&a=modifyPass" );
								}
				}

				public function Bank( )
				{
								$Rac75d95443 = factory::getinstance( "balance" );
								$vd = $this->ViewData;
								$Rcc10f697b1 = $Rac75d95443->IBalance_GetById( intval( $vd['data']['BalanceID'] ) );
							
												$this->Assign( "balance", $Rcc10f697b1 );
												$this->View( );
							
				}

				public function Hourkf( )
				{
								include_once( UPATH_HELPER."HomeHelper.php" );
								$Ra27af44414 = factory::getinstance( "sys" );
								global $masterid;
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( $masterid );
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
							
												$this->SetQQ( $R30b2ab8dc1 );
												$this->SetTel( $R30b2ab8dc1 );
												$this->SetEmail( $R30b2ab8dc1 );
												$this->View( );
							
				}

}

?>
