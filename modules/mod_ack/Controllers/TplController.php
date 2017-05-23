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
class TplController extends Controller
{

				public function __construct( )
				{
								set_time_limit( 0 );
				}

				public function Index( )
				{
								$R770dcaf6d0 = UPATH_BASE.DS.UPATH_SHARECONTENT."skins".DS."systpl".DS."info.php";
								if ( file_exists( $R770dcaf6d0 ) )
								{
												include( $R770dcaf6d0 );
								}
								$Rcabbe21a4f = factory::getservice( "stpl" );
								$Rf5bf03585a = $Rcabbe21a4f->ISTpl_Ids( array( ) );
								$R43297dc3ba = intval( request( "all" ) );
								$Rdad803ddf9 = explode( "|", $Rf5bf03585a );
								$R026f0167b4 = array( );
								foreach ( $Rdad803ddf9 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60 == "" )
												{
																continue;
												}
												$Rbd22abda1d = explode( ",", $R0f8134fb60 );
												if ( $R43297dc3ba == 1 || !isset( $R770dcaf6d0[$Rbd22abda1d[0]] ) || $R770dcaf6d0[$Rbd22abda1d[0]] < $Rbd22abda1d[1] )
												{
																$R026f0167b4[] = intval( $Rbd22abda1d[0] );
												}
								}
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$Rcabbe21a4f->ISTpl_Get( array(
																"tplid" => $R63bede6b19
												) );
								}
								echo "Finish";
				}

}

?>
