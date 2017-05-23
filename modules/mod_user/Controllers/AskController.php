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
class AskController extends Controller
{

				public $instance = NULL;
				public $action = NULL;
				public $session = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "ask" );
								$this->session = factory::getinstance( "session" );
								if ( $this->session->user != "" )
								{
												$Rcc5c6e696c = $this->session->user;
												$this->Assign( "user", $this->session->user );
								}
								else
								{
												$this->Alert( "您还没有登陆！" );
												$this->ScriptRedirect( "index.php?m=mod_b2c" );
								}
								$this->action = array( "czlist", "paysure" );
								$this->Init( );
				}

				public function Index( )
				{
								if ( $this->session->user == "" )
								{
												header( "location:index.php?m=mod_b2c" );
												exit( );
								}
								else
								{
												$Rcc5c6e696c = $this->session->user;
												$R07cdd73907 = $Rcc5c6e696c[0];
								}
								$data = array(
												"author" => $R07cdd73907,
												"isagent" => 0,
												"page" => intval( getvar( "page" ) )
								);
								$R4e420efcc3 = $this->instance->IAsk_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								
												$this->Init( );
												$this->view( );
								
				}

				public function Save( )
				{
								if ( $this->session->user != "" )
								{
												$Rcc5c6e696c = $this->session->user;
												$R07cdd73907 = $Rcc5c6e696c[0];
								}
								else
								{
												$this->Alert( "您还没有登陆！" );
												header( "location:index.php?m=mod_b2c" );
												exit( );
								}
								$data = array(
												"author" => $R07cdd73907,
												"title" => getvar( "title", "" ),
												"content" => getvar( "content" ),
												"cdate" => date( "Y-m-d   H:i:s" )
								);
								$this->instance->IAsk_Create( $data );
								$this->Init( );
								$this->View( "Index" );
								$this->Alert( "您的留言我们已经收到，请随时留意我们的回复信息！" );
				}

				public function Init( )
				{
								$this->ShopInit( "用户管理中心" );
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
