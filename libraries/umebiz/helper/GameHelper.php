<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function ChargeType( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">无计费方式</font>";
								break;
				case 1 :
								echo "<font color=\"#000\">计点方式</font>";
								break;
				case 2 :
								echo "<font color=\"#000\">包时方式</font>";
								break;
				case 3 :
								echo "<font color=\"#000\">计点和包时</font>";
								break;
				case 4 :
								echo "<font color=\"#3399cc\">自定义</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">无计费方式</font>";
								break;
				}
}

function PwdNeed( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">不输入</font>";
								break;
				case 1 :
								echo "<font color=\"#000\">输入</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">不输入</font>";
								break;
				}
}

function AccountType( $value )
{
				if ( $value != "" )
				{
								echo "<font color=\"#0000ff\">".$value."</font>";
				}
				else
				{
								echo "<font color=\"#cccccc\">无账号类型</font>";
				}
}

function AreaDisp( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">无区域</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">有区域</font>";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">自行输入</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">无区域</font>";
								break;
				}
}

function AreaDispOp( $value, $R3584859062 = 0 )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">[不用定义]</font>";
								break;
				case 1 :
								echo "[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id=".$R3584859062."\">自定义..</a></font>]";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">[不用定义]</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">[不用定义]</font>";
								break;
				}
}

function ServDisp( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">无服务器</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">有服务器</font>";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">自行输入</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">无服务器</font>";
								break;
				}
}

function ServDispOp( $value, $R3584859062 = 0 )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">[不用定义]</font>";
								break;
				case 1 :
								echo "[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id=".$R3584859062."\">自定义..</a></font>]";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">[不用定义]</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">[不用定义]</font>";
								break;
				}
}

function Shared( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">不共享</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">共享</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">不共享</font>";
								break;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
