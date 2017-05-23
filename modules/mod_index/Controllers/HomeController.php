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

				public function __construct( )
				{
				}

				public function Index( $R9906335164 = false, $R511aa10c02 = "index.html" )
				{					
												$this->Init( );
												$this->view( null, null, $R9906335164, $R511aa10c02 );
				}

				public function Init( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								global $masterid;
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( $masterid );
								if ( $R06c518f70e != "" )
								{
												$R30b2ab8dc1['title'] = $R06c518f70e;
								}
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
								$R58765afcb5 = factory::getinstance( "ad" );
								$this->Assign( "banner", $R58765afcb5->IAd_Get( 6 ) );
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
								factory::getinstance( "session" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = "";
								$R63bede6b19 = "abcdefhkmnpqrstuvwxyz2345678";
								$R24d59cd0b7 = strlen( $R63bede6b19 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 4;	$Ra16d228039++	)
								{
												$num = rand( 0, $R24d59cd0b7 - 1 );
												$Rd19ae93b31 .= $R63bede6b19[$num];
								}
								$_SESSION['randcode'] = $Rd19ae93b31;
								srand( ( double )microtime( ) * 1000000 );
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
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 90;	$Ra16d228039++	)
								{
												imagesetpixel( $Rcd58a37536, rand( ) % 70, rand( ) % 30, $R4ad640cfaf );
								}
								imagepng( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

}

?>
