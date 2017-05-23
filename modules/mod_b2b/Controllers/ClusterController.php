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
class ClusterController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								$R09a3346376 = UPATH_BASE.DS."cluster.php";
								if ( !file_exists( $R09a3346376 ) )
								{
												exit( );
								}
								include( $R09a3346376 );
								$Ra09fe38af3 = $_REQUEST['k'];
								$Rd3fe9c10a8 = intval( $_REQUEST['w'] );
								$Ra3d52e52a4 = intval( $_REQUEST['v'] );
								if ( $Ra09fe38af3 != $Rf676d660ab )
								{
												exit( );
								}
								$Rb1e236a47d = "";
								$R2322221d09 = array( );
								switch ( $Rd3fe9c10a8 )
								{
								case 1 :
												$Rb1e236a47d = "sys";
												break;
								case 2 :
												$Rb1e236a47d = "products";
												$R2322221d09 = array(
																"arg1" => $Ra3d52e52a4
												);
												break;
								case 3 :
												$Rb1e236a47d = "list";
												$R2322221d09 = array(
																"arg1" => $Ra3d52e52a4
												);
												break;
								case 4 :
												$Ra3d52e52a4 = $_REQUEST['v'];
												if ( !( strlen( $Ra3d52e52a4 ) < 3 ) )
												{
																break;
												}
												$Rb1e236a47d = "pinyin";
												$R2322221d09 = array(
																"arg1" => $Ra3d52e52a4
												);
												break;
								case 5 :
												$Rb1e236a47d = "agents";
												$R2322221d09 = array(
																"arg1" => $Ra3d52e52a4
												);
												break;
								case 6 :
												$Rb1e236a47d = "ranks";
												break;
								case 7 :
												$Rb1e236a47d = "ranks";
												$R2322221d09 = array(
																"arg1" => $Ra3d52e52a4
												);
												break;
								case 8 :
												$Ra3d52e52a4 = $_REQUEST['v'];
												$R30b2ab8dc1 = explode( "-", $Ra3d52e52a4 );
												$Rb1e236a47d = "security";
												array(
																"arg1" => intval( $R30b2ab8dc1[0] ),
																"arg2" => intval( $R30b2ab8dc1[1] )
												);
												break;
								case 9 :
												$Rb1e236a47d = "category";
												break;
								case 10 :
												$Rb1e236a47d = "category";
												break;
								case 11 :
												$Rb1e236a47d = "quick";
												break;
								default :
												break;
								}
								if ( $Rb1e236a47d != "" )
								{
												$this->UpdateCache( $Rb1e236a47d, $R2322221d09 );
								}
				}

}

?>
