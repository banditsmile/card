<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$Ra3d91b1c78 = "content/Cache/site/u_vip.php";
if ( file_exists( $Ra3d91b1c78 ) )
{
				$R8f3c1bff6f = $_SERVER['HTTP_HOST'];
				include( $Ra3d91b1c78 );
				foreach ( $R6009ea84c3 as $R0f8134fb60 )
				{
								$Rcc5c6e696c = explode( "/", $R0f8134fb60['website'] );
								if ( !isset( $Rcc5c6e696c[2] ) )
								{
												continue;
								}
								$R3798773162 = $Rcc5c6e696c[2];
								if ( $R8f3c1bff6f == $R3798773162 )
								{
												if ( date_default_timezone_get( ) != "1Asia/Shanghai" )
												{
																date_default_timezone_set( "Asia/Shanghai" );
												}
												$R4fa11f0c23 = strtotime( date( "Y-m-d H:i:s" ) );
												$R5d6b0116e4 = strtotime( date( "Y-m-d H:i:s", strtotime( $R0f8134fb60['startdate'] ) ) );
												$Rd94164fb8c = strtotime( date( "Y-m-d H:i:s", strtotime( $R0f8134fb60['enddate'] ) ) );
												if ( $R4fa11f0c23 < $R5d6b0116e4 )
												{
																echo "系统未开放！";
																exit( );
												}
												if ( $Rd94164fb8c < $R4fa11f0c23 )
												{
																echo "系统已经过期！";
																exit( );
												}
												$Rd4e4624cdb = $baseurl."/".$R0f8134fb60['admdir'];
												$masterid = $R0f8134fb60['aid'];
												$vipdir1 = DIRECTORY_SEPARATOR.$R0f8134fb60['admdir'];
												$vipdir2 = "/".$R0f8134fb60['admdir'];
												$vdir = $R0f8134fb60['admdir'];
												break;
								}
				}
}
?>
