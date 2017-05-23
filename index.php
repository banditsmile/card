<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function getmicrotime( )
{
				list( $R1a6803c2a5, $R39ad040863 ) = explode( " ", microtime( ) );
				return ( double )$R1a6803c2a5 + ( double )$R39ad040863;
}

function echotime( )
{
				global $pagestartime;
				$R7585d9cf9f = getmicrotime( );
				$R30b2ab8dc1 = $R7585d9cf9f - $pagestartime;
				echo "<div style=\"position:absolute;top:30px;left:20px;\">".$R30b2ab8dc1."</div>";
}

function returntime( )
{
				global $pagestartime;
				$R7585d9cf9f = getmicrotime( );
				$R30b2ab8dc1 = $R7585d9cf9f - $pagestartime;
				return $R30b2ab8dc1;
}

function request( $name, $R273ac57c7c = null, $Rca989102df = "default" )
{
				switch ( $Rca989102df )
				{
				case "GET" :
								$R6c6f2ffa34 =& $GLOBALS['_GET'];
								break;
				case "POST" :
								$R6c6f2ffa34 =& $GLOBALS['_POST'];
								break;
				case "FILES" :
								$R6c6f2ffa34 =& $GLOBALS['_FILES'];
								break;
				case "COOKIE" :
								$R6c6f2ffa34 =& $GLOBALS['_COOKIE'];
								break;
				case "ENV" :
								$R6c6f2ffa34 =& $GLOBALS['_ENV'];
								break;
				case "SERVER" :
								$R6c6f2ffa34 =& $GLOBALS['_SERVER'];
								break;
				default :
								$R6c6f2ffa34 =& $GLOBALS['_REQUEST'];
								$Rca989102df = "REQUEST";
								break;
				}
				$Redd5482a7c = isset( $R6c6f2ffa34[$name] ) && $R6c6f2ffa34[$name] !== null ? $R6c6f2ffa34[$name] : $R273ac57c7c;
				return $Redd5482a7c;
}

function getVar( $name, $R273ac57c7c = null, $Rca989102df = "default", $R65dfacb399 = "none", $R159f6b3a96 = 0 )
{
				$Rca989102df = strtoupper( $Rca989102df );
				if ( $Rca989102df === "METHOD" )
				{
								$Rca989102df = strtoupper( $_SERVER['REQUEST_METHOD'] );
				}
				$R65dfacb399 = strtoupper( $R65dfacb399 );
				$R02aa2c19ae = $Rca989102df.$R65dfacb399.$R159f6b3a96;
				switch ( $Rca989102df )
				{
				case "GET" :
								$R6c6f2ffa34 =& $GLOBALS['_GET'];
								break;
				case "POST" :
								$R6c6f2ffa34 =& $GLOBALS['_POST'];
								break;
				case "FILES" :
								$R6c6f2ffa34 =& $GLOBALS['_FILES'];
								break;
				case "COOKIE" :
								$R6c6f2ffa34 =& $GLOBALS['_COOKIE'];
								break;
				case "ENV" :
								$R6c6f2ffa34 =& $GLOBALS['_ENV'];
								break;
				case "SERVER" :
								$R6c6f2ffa34 =& $GLOBALS['_SERVER'];
								break;
				default :
								$R6c6f2ffa34 =& $GLOBALS['_REQUEST'];
								$Rca989102df = "REQUEST";
								break;
				}
				$Redd5482a7c = isset( $R6c6f2ffa34[$name] ) && $R6c6f2ffa34[$name] !== null ? $R6c6f2ffa34[$name] : $R273ac57c7c;
				if ( is_array( $Redd5482a7c ) )
				{
								$R026f0167b4 = array( );
								foreach ( $Redd5482a7c as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( inject_check( strtolower( $Ra3d52e52a4 ) ) )
												{
																header( "location:index.php" );
																exit( );
												}
												else
												{
																$R026f0167b4[$Ra09fe38af3] = str_check( $Ra3d52e52a4 );
												}
								}
								return $R026f0167b4;
				}
				else
				{
								if ( inject_check( strtolower( $Redd5482a7c ) ) )
								{
												header( "location:index.php" );
												exit( );
								}
								$Redd5482a7c = str_check( $Redd5482a7c );
				}
				return $Redd5482a7c;
}

function inject_check( $Ref636262e6 )
{
				return eregi( "alter |rename |iframe|script|select |insert |update |delete |delete from|count\\(|drop table|truncate |asc\\(|mid\\(|char\\(|xp_cmdshell|exec master|net localgroup administrators|net user| or |\"|'|\\/\\*|\\*|\\.\\.\\/|\\.\\/|union|into|load_file|outfile", $Ref636262e6 );
}

function str_check( $R63bede6b19 )
{
				if ( !get_magic_quotes_gpc( ) )
				{
								$R63bede6b19 = addslashes( $R63bede6b19 );
				}
				$R63bede6b19 = str_replace( "%", "\\%", $R63bede6b19 );
				return $R63bede6b19;
}

define( "UB_DEBUG", 0 );
define( "UB_B2B", 1 );
define( "UB_B2C", 0 );
define( "UB_YKT", 1 );
$pagestartime = getmicrotime( );
$Rffcc8f33f2 = $_SERVER['QUERY_STRING'];
require_once( "config.php" );
$vipdir1 = "";
$vipdir2 = "";
$vdir = "";
if ( file_exists( "vip.php" ) )
{
				include( "vip.php" );
}
if ( $vdir != "" )
{
				$Rd1a261e6b6 = "./".$vdir."/libraries/user/vsn.php";
				if ( !file_exists( $Rd1a261e6b6 ) )
				{
								echo "子站配置错误:A，请联系管理员";
								exit( );
				}
				else
				{
								include( $Rd1a261e6b6 );
								$Rd02f0bbb20 = gzinflate( gzinflate( base64_decode( $R9ee4eacd68 ) ) );
								if ( $masterid != $Rd02f0bbb20 )
								{

								}
				}
}
if ( trim( $Rffcc8f33f2 ) == "" && count( $_POST ) == 0 && $vipdir2 == "" )
{
				echo file_get_contents( UB_DEFAULT."/index.html" );
				exit( );
}
if ( UB_DEBUG == 1 )
{
				error_reporting( E_ERROR|E_WARNING );
				ini_set( "display_errors", "true" );
}
else
{
				ini_set( "display_errors", "false" );
}
set_magic_quotes_runtime( 0 );
if ( date_default_timezone_get( ) != "1Asia/Shanghai" )
{
				date_default_timezone_set( "Asia/Shanghai" );
}
define( "UPATH_ROOT", dirname( __FILE__ ) );
define( "UPATH_BASE", UPATH_ROOT );
define( "DS", DIRECTORY_SEPARATOR );

//-------------------
/*

								$ooo0oo = UPATH_BASE.DS."libraries".DS."umebiz".DS;
								$oo00oo = array(
												$ooo0oo."controller.php",
												"index.php",
												$ooo0oo."service".DS."scv.php",
												$ooo0oo."service".DS."sqlservice.php"
								);
								$o00o00 = array( "UPATH_ROOT", "UB_B2B", "UPATH_ROOT", "UPATH_ROOT" );
								$vv0000 = filesize( $oo00oo[0] );
								$v0000v = filesize( $oo00oo[1] );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
												$_SESSION['cb'] = 1;
												$_SESSION['f1'] = $vv0000;
												$_SESSION['f2'] = $v0000v;
								}
								if ( !isset( $_SESSION['cb'] ) )
								{
												$_SESSION['cb'] = 1;
												$_SESSION['f1'] = $vv0000;
												$_SESSION['f2'] = $v0000v;
								}



*/
//-------------------
if ( $vipdir2 == "" )
{
				$R3c53a5814a = UB_DEFAULT;
}
else
{
				$Rb65fab5c79 = ".".$vipdir2."/config.php";
				if ( !file_exists( $Rd1a261e6b6 ) )
				{
								echo "子站配置错误:C，请联系管理员";
								exit( );
				}
				else
				{
								$R9c9816e024 = file_get_contents( $Rb65fab5c79 );
								if ( strpos( $R9c9816e024, "VIP_DEFAULT" ) !== false )
								{
												include( $Rb65fab5c79 );
												$R3c53a5814a = VIP_DEFAULT;
								}
								else
								{
												$R3c53a5814a = UB_DEFAULT;
								}
				}
}
$g_mod = request( "m", "mod_".$R3c53a5814a );
$R9036dcfc79 = $g_mod;
$R8eeb1221ae = explode( "_", $g_mod );
if ( $R8eeb1221ae[0] == "mod" )
{
				$Rd3c3fd7322 = $moddir;
}
else
{
				$Rd3c3fd7322 = $comdir;
}
$g_controller = ucfirst( request( "c", "home" ) );
$g_action = ucfirst( request( "a", "index" ) );
$Rfd821ceebb = UPATH_ROOT.DS.$Rd3c3fd7322.DS.$g_mod.DS."Controllers".DS.ucfirst( $g_controller )."Controller".".php";
if ( $Rd3c3fd7322 == $moddir )
{
				$R0652a93b4e = UPATH_ROOT.$vipdir1.DS.$Rd3c3fd7322.DS.$g_mod.DS."Views";
}
else
{
				$R0652a93b4e = UPATH_ROOT.DS.$Rd3c3fd7322.DS.$g_mod.DS."Views";
}
if ( !file_exists( $Rfd821ceebb ) )
{
				header( "location:index.php" );
				exit( );
}
$path_cache = UPATH_ROOT.$vipdir1.DS."content".DS.$cache.DS."template";
$R0f8fc17896 = UPATH_ROOT.DS."content".DS.$cache.DS;
$R6a7824e5bd = UPATH_ROOT.$vipdir1.DS."content".DS.$cache.DS."site".DS;
$R2f2157ac24 = $R0f8fc17896."agent".DS;
$R892a70c08a = $R0f8fc17896."product".DS;
define( "DATACACHE", $R0f8fc17896 );
define( "SITECACHE", $R6a7824e5bd );
define( "ACACHE", $R2f2157ac24 );
define( "PCACHE", $R892a70c08a );
if ( $baseurl == "" || $baseurl == "/" )
{
				$Ra1b993256f = "/";
}
else
{
				$Ra1b993256f = $baseurl."/";
}
$R881aa6e00a = $g_mod;
if ( $g_mod == "mod_agent" )
{
				$R881aa6e00a = "mod_b2b";
}
$path_content = $baseurl.$vipdir2."/content/".$R881aa6e00a."/";
require_once( "libraries".DS."umebiz".DS."controller".".php" );
require_once( "libraries".DS."umebiz".DS."factory.php" );
require_once( $Rfd821ceebb );
define( "UPATH_WEBROOT", $Ra1b993256f );
define( "DBPREFIX", $dbprefix );
define( "VROOT", $vdir );
define( "UPATH_CONTENT", $path_content );
$Rb91e88361d = $vdir != "" ? $vdir."/" : "";
define( "UPATH_SHARECONTENT", $Rb91e88361d."content/mod_shared/" );
define( "UPATH_HELPER", "libraries".DS."umebiz".DS."helper".DS );
define( "UPATH_PAY", "libraries".DS."umebiz".DS."pay".DS );
define( "UPATH_PICTURE", "content/mod_shared/skins/picture/" );
require_once( UPATH_HELPER."HtmlHelper.php" );
require_once( UPATH_HELPER."HomeHelper.php" );
$R3e33e017cd = ucfirst( $g_controller )."Controller";
$Rbbd82f1834 = new $R3e33e017cd( );
if ( !method_exists( $Rbbd82f1834, $g_action ) )
{
				header( "location:index.php" );
				exit( );
}
if ( $g_mod == "mod_agent" || $g_mod == "mod_b2b" )
{
				include( "authority.php" );
				$R7135610620 = $g_mod."_".ucfirst( $g_controller )."_".ucfirst( $g_action );
				$R4c8e7226c5 = isset( $R5383a87c60[$R7135610620] ) ? $R5383a87c60[$R7135610620] : -1;
				$Rbbd82f1834->Authority( $R4c8e7226c5 );
}
$Rbbd82f1834->CheckSomething( );
$Rbbd82f1834->$g_action( );
?>
