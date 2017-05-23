<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !isset( $_SERVER ) )
{
				$GLOBALS['_SERVER'] = $HTTP_SERVER_VARS;
}
if ( !isset( $_GET ) )
{
				$GLOBALS['_GET'] = $HTTP_GET_VARS;
}
if ( !isset( $_FILES ) )
{
				$GLOBALS['_FILES'] = $HTTP_POST_FILES;
}
if ( !defined( "DIRECTORY_SEPARATOR" ) )
{
				define( "DIRECTORY_SEPARATOR", strtoupper( substr( PHP_OS, 0, 3 ) == "WIN" ) ? "\\" : "/" );
}
?>
