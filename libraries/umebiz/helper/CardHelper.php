<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function CardState( $R901a6b96db )
{
				if ( $R901a6b96db == 0 )
				{
								echo "<font color=\"#6c6c6c\">已售出</font>";
				}
				else
				{
								echo "<font color=\"#008800\">未售出</font>";
				}
}

function YktCardState( $R901a6b96db )
{
				switch ( $R901a6b96db )
				{
				case 3 :
								echo "<font color=\"#ff0000\">使用中</font>";
								break;
				case 0 :
								echo "<font color=\"#6c6c6c\">卡无效</font>";
								break;
				case 1 :
								echo "<font color=\"#008800\">卡有效</font>";
								break;
				case 2 :
								echo "<font color=\"#0000ff\">未生效</font>";
								break;
				default :
								echo "未知";
								break;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
