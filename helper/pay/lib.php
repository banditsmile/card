<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function getsite( )
{
				if ( empty( $_SERVER['HTTP_HOST'] ) )
				{
								$R8607b50296 = "http://".$_SERVER['HTTP_HOST'];
				}
				else
				{
								$R8607b50296 = "http://".$_SERVER['SERVER_NAME'];
				}
				if ( !empty( $_SERVER['REQUEST_URI'] ) )
				{
								$Rd4e4624cdb = $_SERVER['REQUEST_URI'];
				}
				else
				{
								$Rd4e4624cdb = $_SERVER['PHP_SELF'];
				}
				$Rcc5c6e696c = explode( "/", $Rd4e4624cdb );
				array_pop( $Rcc5c6e696c );
				array_pop( $Rcc5c6e696c );
				array_pop( $Rcc5c6e696c );
				$Rd4e4624cdb = implode( "/", $Rcc5c6e696c );
				return $R8607b50296.$Rd4e4624cdb;
}

function geturl( $Rb1e236a47d, $Rf70e923790, $R79a4f27218 )
{
				$R8467cfacb0 = getsite( );
				$url = $R8467cfacb0."/index.php?m=".$Rb1e236a47d."&c=order&mean=1&paycode=".$Rf70e923790."&".$R79a4f27218;
				return $url;
}

function getval( )
{
				$R026f0167b4 = array( );
				foreach ( $GLOBALS['_GET'] as $Ra09fe38af3 => $Ra3d52e52a4 )
				{
								$R026f0167b4[] = $Ra09fe38af3."=".urlencode( $Ra3d52e52a4 );
				}
				foreach ( $GLOBALS['_POST'] as $Ra09fe38af3 => $Ra3d52e52a4 )
				{
								$R026f0167b4[] = $Ra09fe38af3."=".urlencode( $Ra3d52e52a4 );
				}
				return implode( "&", $R026f0167b4 );
}

?>
