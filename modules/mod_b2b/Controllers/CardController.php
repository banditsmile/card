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
class CardController extends Controller
{

				public $session = NULL;

				public function __construct( )
				{
								$this->session = factory::getinstance( "session" );
								$R8e3748b5c9 = ucfirst( request( "a" ) );
								if ( $this->session->agent == "" && $R8e3748b5c9 != "Msg" && $R8e3748b5c9 != "Remain" )
								{
												$this->Alert( "系统已经退出！请重新登陆！" );
												$this->GoHome( "b2b" );
								}
								if ( $this->session->agent == "" && $R8e3748b5c9 == "Msg" )
								{
												echo "0";
								}
								if ( $this->session->agent == "" && $R8e3748b5c9 == "Remain" )
								{
												echo "-1";
								}
				}

				public function Index( )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								$this->Assign( "webname", $R30b2ab8dc1['webname'] );
								$R3128e0f17e = getvar( "rethttp" );
								$this->Assign( "rethttp", $R3128e0f17e );
							
												$this->View( );
							
				}

				public function Left( )
				{
								include_once( UPATH_HELPER."HtmlHelper.php" );
								$this->Assign( "agent", $this->session->agent );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9a5ea0f101 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,arrears" );
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
								$this->Assign( "credit", $Re902658b46 );
								$this->Assign( "arrears", $R9a5ea0f101['arrears'] );
							
												$this->View( );
								
				}

				public function Hide( )
				{
								
												$this->View( );
								
				}

				public function Top( )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "alv" );
								$R87aee22884 = $R063e6693e5->IRank_GetById( $agent['alv'], "gid" );
								if ( $R87aee22884['gid'] < 2 )
								{
												$this->Assign( "esales", 0 );
								}
								else
								{
												$this->Assign( "esales", 1 );
								}
							
												$this->Assign( "agent", $this->session->agent );
												$this->Assign( "web", $R30b2ab8dc1 );
												$this->View( );
								
				}

				public function Msg( )
				{
								$R9e0664486a = factory::getinstance( "msg" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$data = array(
												"msgto" => $R2a51483b14,
												"bossid" => $R5334b17ba8
								);
								$num = $R9e0664486a->IMsg_NotReaded( $data );
								echo $num;
				}

				public function Remain( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
								if ( isset( $agent['aremain'] ) )
								{
												$agent['aremain'] = sprintf( "%.3f", $agent['aremain'] );
												echo $agent['aremain'];
								}
								else
								{
												echo -1;
								}
				}

}

?>
