<?php
/****************************************/
/*                                      */
/*  美易互联 http://www.meiis.com   */
/*  新云数卡 http://www.xybss.com.cn    */
/*  52源码淘宝店 http://52yma.taobao.com*/
/*                                      */
/****************************************/

$R3584859062 = intval( $_SERVER['QUERY_STRING'] );
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
$url = $R8607b50296.$Rd4e4624cdb."/index.php?m=mod_ykt&c=Product&a=Detail&pid=".$R3584859062;
echo file_get_contents( $url );
?>
