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
class OrderController extends Controller
{

				public $hander = NULL;
				public $action = NULL;
				public $session = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
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
												"optype" => getvar( "optype" ),
												"aname" => $R07cdd73907,
												"nrows" => 20
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Init( );
								include_once( UPATH_HELPER."OrderHelper.php" );
							
												$this->view( );
							
				}

}

?>
