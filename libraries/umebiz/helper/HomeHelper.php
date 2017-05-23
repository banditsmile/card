<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function GetQQ( $R7da43659df, $Ra16d228039 = 0 )
{
				$R8eeb1221ae = explode( "|", $R7da43659df );
				$Rcc5c6e696c = explode( ",", $R8eeb1221ae[0] );
				if ( $Ra16d228039 <= count( $Rcc5c6e696c ) )
				{
								echo $Rcc5c6e696c[$Ra16d228039];
				}
				else
				{
								echo $Rcc5c6e696c[count( $Rcc5c6e696c )];
				}
}

function GetPic( $Rd4021241fa, $Ra16d228039 = 0 )
{
				$R0762544884 = "defaultpic.gif";
				$R8eeb1221ae = explode( ",", $Rd4021241fa );
				if ( $Ra16d228039 <= count( $R8eeb1221ae ) )
				{
								if ( $R8eeb1221ae[$Ra16d228039] == "" )
								{
												$R8eeb1221ae[$Ra16d228039] = $R0762544884;
								}
								echo $R8eeb1221ae[$Ra16d228039];
				}
				else
				{
								if ( count( $R8eeb1221ae ) == 0 )
								{
												if ( $Rd4021241fa == "" )
												{
																$Rd4021241fa = $R0762544884;
												}
												echo $Rd4021241fa;
								}
								else
								{
												if ( $R8eeb1221ae[0] == "" )
												{
																$R8eeb1221ae[0] = $R0762544884;
												}
												echo $R8eeb1221ae[0];
								}
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
