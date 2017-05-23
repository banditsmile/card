<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$R3584859062 = intval( $_SERVER['QUERY_STRING'] );
if ( $R3584859062 == 0 )
{
				exit( );
}
$url = "p".$R3584859062.".html";
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
$Rd4e4624cdb = implode( "/", $Rcc5c6e696c );
if ( $R3584859062 == 0 )
{
				$url = $R8607b50296.$Rd4e4624cdb."/index.php?m=mod_ykt";
}
else
{
				$url = $R8607b50296.$Rd4e4624cdb."/index.php?m=mod_b2b&c=article&a=detail&id=".$R3584859062;
}
echo file_get_contents( $url );
?>
