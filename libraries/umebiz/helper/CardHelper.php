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
								echo "<font color=\"#6c6c6c\">���۳�</font>";
				}
				else
				{
								echo "<font color=\"#008800\">δ�۳�</font>";
				}
}

function YktCardState( $R901a6b96db )
{
				switch ( $R901a6b96db )
				{
				case 3 :
								echo "<font color=\"#ff0000\">ʹ����</font>";
								break;
				case 0 :
								echo "<font color=\"#6c6c6c\">����Ч</font>";
								break;
				case 1 :
								echo "<font color=\"#008800\">����Ч</font>";
								break;
				case 2 :
								echo "<font color=\"#0000ff\">δ��Ч</font>";
								break;
				default :
								echo "δ֪";
								break;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
