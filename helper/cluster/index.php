<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

include( "../../cluster.php" );
$Ra09fe38af3 = $_REQUEST['k'];
$Rd3fe9c10a8 = intval( $_REQUEST['w'] );
$Ra3d52e52a4 = intval( $_REQUEST['v'] );
if ( $Ra09fe38af3 != $Rf676d660ab )
{
				exit( );
}
$R2c6284061e = "../../content/Cache/";
$R3d9a15f4b8 = "";
switch ( $Rd3fe9c10a8 )
{
case 1 :
				$R3d9a15f4b8 = $R2c6284061e."site/u_base_setting.php";
				break;
case 2 :
				$R3d9a15f4b8 = $R2c6284061e."product/p".$Ra3d52e52a4.".php";
				break;
case 3 :
				$R3d9a15f4b8 = $R2c6284061e."product/list-".$Ra3d52e52a4.".php";
				break;
case 4 :
				$Ra3d52e52a4 = $_REQUEST['v'];
				if ( !( strlen( $Ra3d52e52a4 ) < 3 ) )
				{
								break;
				}
				$R3d9a15f4b8 = $R2c6284061e."product/pinyin-".$Ra3d52e52a4.".php";
				break;
case 5 :
				$R3d9a15f4b8 = $R2c6284061e."agent/aid_".$Ra3d52e52a4.".php";
				break;
case 6 :
				$R3d9a15f4b8 = $R2c6284061e."agent/rank.php";
				break;
case 7 :
				$R3d9a15f4b8 = $R2c6284061e."agent/rank_".$Ra3d52e52a4.".php";
				break;
case 8 :
				$Ra3d52e52a4 = $_REQUEST['v'];
				$R30b2ab8dc1 = explode( "-", $Ra3d52e52a4 );
				$R3d9a15f4b8 = $R2c6284061e."agent/sec_".intval( $R30b2ab8dc1[0] )."_".intval( $R30b2ab8dc1[1] ).".php";
				break;
case 9 :
				$R3d9a15f4b8 = $R2c6284061e."product/cat.php";
				break;
case 10 :
				$R3d9a15f4b8 = $R2c6284061e."product/subcat.php";
				break;
case 11 :
				$R3d9a15f4b8 = $R2c6284061e."product/quick.php";
				break;
default :
				break;
}
if ( $R3d9a15f4b8 == "" )
{
				exit( );
}
else
{
				@unlink( $R2c6284061e.$R3d9a15f4b8 );
}
?>
