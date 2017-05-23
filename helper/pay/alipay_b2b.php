<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

include( "lib.php" );
$Rf70e923790 = "alipay";
$Rb1e236a47d = "mod_b2b";
$R79a4f27218 = getval( );
$url = geturl( $Rb1e236a47d, $Rf70e923790, $R79a4f27218 );
echo file_get_contents( $url );
?>
