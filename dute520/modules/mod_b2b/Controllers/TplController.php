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
				}

				public function Index( )
				{
								$tpl = getvar( "tpl" );
								$Ra3d52e52a4 = getvar( "v", "index" );
								global $R0652a93b4e;
								require_once( $R0652a93b4e.DS."Tpl".DS.$tpl.$Ra3d52e52a4.".php" );
								$R770dcaf6d0 = $R0652a93b4e.DS.ucfirst( $tpl ).DS.ucfirst( $Ra3d52e52a4 ).".html";
								if ( !file_exists( $R770dcaf6d0 ) )
								{
												return;
								}
								if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "r" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R770dcaf6d0 ) );
								fclose( $Rf500f4a848 );
								$R3584859062 = getvar( "id" );
								$R7cc6651305 = "";
								$R923e299ea0 = "";
								$R8d246d3daa = array( );
								$Rd72ea1e41a = "";
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$Re20ce5055b = $tabletpl[$R0f8134fb60]['width'];
												$Rb2d9c6c04d = "";
												$R08a613e80b = "";
												if ( isset( $tabletpl[$R0f8134fb60]['str'] ) )
												{
																$Rb2d9c6c04d = "<!--if(".$tabletpl[$R0f8134fb60]['str']."){-->";
																$R08a613e80b = "<!--}-->";
												}
												$R7cc6651305 .= $Rb2d9c6c04d."<td width=\"".$Re20ce5055b."px\">".$tabletpl[$R0f8134fb60]['headHtml']."</td>".$R08a613e80b."\n";
												$R923e299ea0 .= $Rb2d9c6c04d."<td width=\"".$Re20ce5055b."px\">".$tabletpl[$R0f8134fb60]['bodyHtml']."</td>".$R08a613e80b."\n";
												$R8d246d3daa[] = "'".$R0f8134fb60."'";
								}
								$R7cc6651305 = "<!--//thead-->\n".$R7cc6651305."<!--//endthead-->";
								$R923e299ea0 = "<!--//tbody-->\n".$R923e299ea0."<!--//endtbody-->";
								$Rd72ea1e41a = "<!--//tinfo-->\n tInfo = Array(".implode( ",", $R8d246d3daa ).");\n<!--//endtinfo-->";
								$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/thead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endthead\\-\\-\\>/s", $R7cc6651305, $R4180b2d55d );
								$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/tbody\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endtbody\\-\\-\\>/s", $R923e299ea0, $R4180b2d55d );
								$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/tinfo\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endtinfo\\-\\-\\>/s", $Rd72ea1e41a, $R4180b2d55d );
								if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "w" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R4180b2d55d );
								fclose( $Rf500f4a848 );
								$this->ScriptRedirect( $_SERVER['HTTP_REFERER'] );
				}

}

?>
