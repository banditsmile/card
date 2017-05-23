<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

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
																echo "<script type=\"text/javascript\">alert(\"提交的参数含有非法字符！系统将返回桌面，请把英文半角符号转成全角后，再重新提交\");window.location=\"index.php?c=home&a=home\";</script>";
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
												echo "<script type=\"text/javascript\">alert(\"提交的参数含有非法字符！系统将返回桌面，请把英文半角符号转成全角后，再重新提交\");window.location=\"index.php?c=home&a=home\";</script>";
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

$pagestartime = getmicrotime( );
define( "UB_DEBUG", 0 );
define( "UB_B2B", 1 );
define( "UB_B2C", 0 );
define( "UB_YKT", 1 );
if ( UB_DEBUG == 1 )
{
				error_reporting( E_ALL & ~E_NOTICE);
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
define( "DS", DIRECTORY_SEPARATOR );
$R2167df2f4b = explode( DS, UPATH_ROOT );
array_pop( $R2167df2f4b );
define( "UPATH_BASE", implode( DS, $R2167df2f4b ) );
require_once( "..".DS."config.php" );
require_once( "..".DS."libraries".DS."umebiz".DS."controller".".php" );
require_once( "..".DS."libraries".DS."umebiz".DS."factory.php" );


$g_mod = request( "m", "mod_home" );
$R8eeb1221ae = explode( "_", $g_mod );
if ( $R8eeb1221ae[0] == "mod" )
{
				$Rd3c3fd7322 = $moddir;
}
else
{
				$Rd3c3fd7322 = $comdir;
}
$g_controller = ucfirst( request( "c", "Home" ) );
$g_action = ucfirst( request( "a", "Index" ) );
$Rff0cc71a1d = factory::getinstance( "session" );
if ( $Rff0cc71a1d->admin == "" || $Rff0cc71a1d->adminrank == "" )
{
				$g_mod = "mod_home";
				$Rd3c3fd7322 = $moddir;
				$g_controller = "Home";
				if ( $g_action != "Save" && $g_action != "CheckMobile" )
				{
								$g_action = "Login";
				}
}
else
{
				if ( $Rff0cc71a1d->mid != $masterid )
				{
								echo "<script type=\"text/javascript\">alert(\"权限不足，非法入侵\");window.location=\"../\";</script>";
								exit( );
				}
				$adminrank = $Rff0cc71a1d->adminrank;
				$Rcf66b36408 = array( "2" => "Home,Agent,Funds,Master,", "3" => "Home,Order,Master,", "4" => "Home,Product,PS,Ykt,Master,", "5" => "Home,Ad,Article,Master," );
				if ( 1 < $Rff0cc71a1d->adminrank && $g_mod != "mod_home" && $g_mod != "com_fs" )
				{
								include( "authority.php" );
								$Rda6c3c043e = $g_mod."_".ucfirst( $g_controller )."_".ucfirst( $g_action );
								$R7c45063a24 = $g_mod."_".ucfirst( $g_controller );
								$Ra0c8454e75 = $Rff0cc71a1d->adminrights;
								$R4c8e7226c5 = isset( $R5383a87c60[$Rda6c3c043e] ) ? $R5383a87c60[$Rda6c3c043e] : -1;
								if ( $R4c8e7226c5 == -1 )
								{
												$R4c8e7226c5 = isset( $R5383a87c60[$R7c45063a24] ) ? $R5383a87c60[$R7c45063a24] : -1;
								}
								if ( $R4c8e7226c5 == -1 || !isset( $Ra0c8454e75[$R4c8e7226c5] ) || $Ra0c8454e75[$R4c8e7226c5] == 0 )
								{
												echo "<script type=\"text/javascript\">alert(\"权限不足，系统将返回桌面\");window.location=\"index.php?c=home&a=home\";</script>";
												exit( );
								}
				}
}
$Rfd821ceebb = UPATH_ROOT.DS.$Rd3c3fd7322.DS.$g_mod.DS."Controllers".DS.$g_controller."Controller".".php";
$R0652a93b4e = UPATH_ROOT.DS.$Rd3c3fd7322.DS.$g_mod.DS."Views";
if ( !file_exists( $Rfd821ceebb ) )
{
				echo "<script type=\"text/javascript\">alert(\"访问网址不存在，系统将返回桌面\");window.location=\"index.php?c=home&a=home\";</script>";
				exit( );
}
$path_cache = UPATH_ROOT.DS."content".DS.$cache.DS."template";
$Rd53116dafe = UPATH_ROOT.DS."content".DS.$cache.DS."site";
define( "BCKCACHE", $Rd53116dafe );
$R0f8fc17896 = "..".DS."content".DS.$cache.DS;
$R6a7824e5bd = $R0f8fc17896."site".DS;
$R2f2157ac24 = $R0f8fc17896."agent".DS;
$R892a70c08a = $R0f8fc17896."product".DS;
define( "DATACACHE", $R0f8fc17896 );
define( "SITECACHE", $R6a7824e5bd );
define( "ACACHE", $R2f2157ac24 );
define( "PCACHE", $R892a70c08a );
$path_content = "content/".$g_mod."/";
if ( $baseurl == "" || $baseurl == "/" )
{
				$Ra1b993256f = "/";
}
else
{
				$Ra1b993256f = $baseurl."/";
}
require_once( $Rfd821ceebb );
define( "UPATH_WEBROOT", $Ra1b993256f );
define( "DBPREFIX", $dbprefix );
define( "UPATH_CONTENT", $path_content );
define( "UPATH_SHARECONTENT", "content/mod_shared/" );
define( "UPATH_HELPER", UPATH_ROOT.DS."..".DS."libraries".DS."umebiz".DS."helper".DS );
define( "UPATH_PICTURE", "../content/mod_shared/skins/picture/" );
include_once( UPATH_HELPER."HtmlHelper.php" );
$R3e33e017cd = $g_controller."Controller";
$Rbbd82f1834 = new $R3e33e017cd( );
if ( !method_exists( $Rbbd82f1834, $g_action ) )
{
				echo "<script type=\"text/javascript\">alert(\"访问网址不存在，系统将返回桌面\");window.location=\"index.php?c=home&a=home\";</script>";
				exit( );
}
$Rbbd82f1834->CheckSomething( );
$Rbbd82f1834->$g_action( );
?>
