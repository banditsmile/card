<?php
/****************************************/
/*                                      */
/*  919数据中心 http://www.919dns.com   */
/*  919站长站 http://www.919zzz.com     */
/*  919淘宝店 http://919net.taobao.com  */
/*                                      */
/****************************************/

function tpl2php( $R86d831173a, $R770dcaf6d0 )
{
				global $R0652a93b4e;
				global $path_cache;
				global $g_mod;
				$ext = ".html";
				$R9b3565d417 = $g_mod."_Shared"."_";
				$R511aa10c02 = $path_cache.DS.$g_mod."_".$R86d831173a."_".$R770dcaf6d0.".php";
				$R770dcaf6d0 = $R0652a93b4e.DS.$R86d831173a.DS.$R770dcaf6d0.$ext;
				if ( !file_exists( $R770dcaf6d0 ) )
				{
								return;
				}
				if ( file_exists( $R511aa10c02 ) && filemtime( $R770dcaf6d0 ) <= @filemtime( $R511aa10c02 ) )
				{
								return;
				}
				if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "r" ) ) )
				{
								echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
				}
				$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R770dcaf6d0 ) );
				fclose( $Rf500f4a848 );
				$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-(.+?)\\-\\-\\>/s", "<?php \\1 ?>", $R4180b2d55d );
				$R4180b2d55d = preg_replace( "/{(\\\$(.+?))}/s", "<?php echo \\1; ?>", $R4180b2d55d );
				$R4180b2d55d = preg_replace( "/{load\\((.+?)\\)}/s", "<?php widget(\"\\1\");include(\$path_cache.DS.\"{$R9b3565d417}\\1.php\"); ?>", $R4180b2d55d );
				$R4180b2d55d = preg_replace( "/{com\\((.+?)\\)}/s", "<?php com(\\1); ?>", $R4180b2d55d );
				$R4180b2d55d = preg_replace( "/{#(.+?)}/s", "<?php (\\1); ?>", $R4180b2d55d );
				if ( !( $Rf500f4a848 = @fopen( $R511aa10c02, "w" ) ) )
				{
								echo "Current template file '{$R511aa10c02}' not found or have no access!";
				}
				flock( $Rf500f4a848, 2 );
				fwrite( $Rf500f4a848, $R4180b2d55d );
				fclose( $Rf500f4a848 );
				return true;
}

function widget( $R770dcaf6d0 )
{
				tpl2php( "Shared", $R770dcaf6d0 );
}

function com( $R8ee1855cb1, $Rbbd82f1834 = null, $action = "index", $R101593cf9f = null )
{
				global $R0652a93b4e;
				global $g_mod;
				global $g_controller;
				global $g_action;
				global $comdir;
				global $masterid;
				$R6a89c2093b = $R0652a93b4e;
				$Ra3dc35f1df = $g_mod;
				$Rae112ac1ad = $g_controller;
				$R0199aa3d2b = $g_action;
				$g_mod = "com_".$R8ee1855cb1;
				if ( $Rbbd82f1834 == null )
				{
								$g_controller = $R8ee1855cb1;
				}
				else
				{
								$g_controller = $Rbbd82f1834;
				}
				$g_controller = ucfirst( $g_controller );
				$g_action = $action;
				if ( 0 <= $masterid )
				{
								require_once( UPATH_ROOT.DS.$comdir.DS.$g_mod.DS."Controllers".DS.ucfirst( $g_controller )."Controller.php" );
								$R0652a93b4e = UPATH_ROOT.DS.$comdir.DS.$g_mod.DS."Views";
				}
				else
				{
								$R2167df2f4b = explode( DS, UPATH_ROOT );
								array_pop( $R2167df2f4b );
								$R2a3484f6a4 = implode( DS, $R2167df2f4b );
								require_once( $R2a3484f6a4.DS.$comdir.DS.$g_mod.DS."Controllers".DS.ucfirst( $g_controller )."Controller.php" );
								$R0652a93b4e = $R2a3484f6a4.DS.$comdir.DS.$g_mod.DS."Views";
				}
				$R3e33e017cd = ucfirst( $g_controller )."Controller";
				$Rbbd82f1834 = new $R3e33e017cd( );
				$Rbbd82f1834->$action( $R101593cf9f );
				$R0652a93b4e = $R6a89c2093b;
				$g_mod = $Ra3dc35f1df;
				$g_controller = $Rae112ac1ad;
				$g_action = $R0199aa3d2b;
}

function ToggleCheck( $R37c014dae5 )
{
				if ( $R37c014dae5 == "1" )
				{
								echo "checked";
				}
				else
				{
								echo "";
				}
}

function ToggleImgSrc( $R901a6b96db )
{
				if ( $R901a6b96db == 0 || $R901a6b96db == -1 )
				{
								echo "images/no.gif";
				}
				else
				{
								echo "images/yes.gif";
				}
}

function ToggleCheckByTwoValue( $R753d38f3d5, $R104593b29e )
{
				if ( $R753d38f3d5 == $R104593b29e )
				{
								echo "checked";
				}
				else
				{
								echo "";
				}
}

function Option( $data = array( ), $R64d86b462c = null, $Rf413f06aeb = null, $R244f38266c = null )
{
				if ( $Rf413f06aeb == null )
				{
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $R64d86b462c == $Ra09fe38af3 )
												{
																echo "<option value=\"".$Ra09fe38af3."\" selected>".$Ra3d52e52a4."</option>";
												}
												else
												{
																echo "<option value=\"".$Ra09fe38af3."\">".$Ra3d52e52a4."</option>";
												}
								}
				}
				else
				{
								foreach ( $data as $R0f8134fb60 )
								{
												if ( $R64d86b462c == $R0f8134fb60[$R244f38266c] )
												{
																echo "<option value=\"".$R0f8134fb60[$R244f38266c]."\" selected>".$R0f8134fb60[$Rf413f06aeb]."</option>";
												}
												else
												{
																echo "<option value=\"".$R0f8134fb60[$R244f38266c]."\">".$R0f8134fb60[$Rf413f06aeb]."</option>";
												}
								}
				}
}

function TxtByOption( $data = array( ), $R64d86b462c = null, $Rf413f06aeb = null, $R244f38266c = null )
{
				if ( $Rf413f06aeb == null )
				{
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $R64d86b462c == $Ra09fe38af3 )
												{
																echo $Ra3d52e52a4;
												}
								}
				}
				else
				{
								foreach ( $data as $R0f8134fb60 )
								{
												if ( $R64d86b462c == $R0f8134fb60[$R244f38266c] )
												{
																echo $R0f8134fb60[$Rf413f06aeb];
												}
								}
				}
}

function DateDiffNow( $R5b08d4f823 )
{
				$Rd94164fb8c = strtotime( "now" );
				$R5d6b0116e4 = strtotime( $R5b08d4f823 );
				$R7f49613fdd = intval( ( $Rd94164fb8c - $R5d6b0116e4 ) / 86400 );
				$R900be0cbe7 = ( $R5d6b0116e4 - $Rd94164fb8c ) % 86400;
				$Re896421354 = $R900be0cbe7 % 3600;
				$R900be0cbe7 = intval( $R900be0cbe7 / 3600 );
				$Re896421354 = intval( $Re896421354 / 60 );
				$R63bede6b19 = ( 0 < $R7f49613fdd ? $R7f49613fdd."天" : "" ).( 0 < $R900be0cbe7 ? $R900be0cbe7."小时" : "" ).( 0 < $Re896421354 ? $Re896421354."分钟" : "" );
				echo $R63bede6b19;
}

function DateDiffWithDeadline( $R5b08d4f823, $R678c687e4b = 4 )
{
				$Rd94164fb8c = strtotime( "now" );
				$R5d6b0116e4 = strtotime( $R5b08d4f823 ) + $R678c687e4b * 86400;
				$R7f49613fdd = intval( ( $R5d6b0116e4 - $Rd94164fb8c ) / 86400 );
				$R900be0cbe7 = ( $R5d6b0116e4 - $Rd94164fb8c ) % 86400;
				$Re896421354 = $R900be0cbe7 % 3600;
				$R900be0cbe7 = intval( $R900be0cbe7 / 3600 );
				$Re896421354 = intval( $Re896421354 / 60 );
				$R63bede6b19 = ( 0 < $R7f49613fdd ? $R7f49613fdd."天" : "" ).( 0 < $R900be0cbe7 ? $R900be0cbe7."小时" : "" ).( 0 < $Re896421354 ? $Re896421354."分钟" : "" );
				echo $R63bede6b19;
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
