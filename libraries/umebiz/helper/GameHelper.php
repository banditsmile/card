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
								echo "<font color=\"#cccccc\">�޼Ʒѷ�ʽ</font>";
								break;
				case 1 :
								echo "<font color=\"#000\">�Ƶ㷽ʽ</font>";
								break;
				case 2 :
								echo "<font color=\"#000\">��ʱ��ʽ</font>";
								break;
				case 3 :
								echo "<font color=\"#000\">�Ƶ�Ͱ�ʱ</font>";
								break;
				case 4 :
								echo "<font color=\"#3399cc\">�Զ���</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">�޼Ʒѷ�ʽ</font>";
								break;
				}
}

function PwdNeed( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">������</font>";
								break;
				case 1 :
								echo "<font color=\"#000\">����</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">������</font>";
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
								echo "<font color=\"#cccccc\">���˺�����</font>";
				}
}

function AreaDisp( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">������</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">������</font>";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">��������</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">������</font>";
								break;
				}
}

function AreaDispOp( $value, $R3584859062 = 0 )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">[���ö���]</font>";
								break;
				case 1 :
								echo "[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id=".$R3584859062."\">�Զ���..</a></font>]";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">[���ö���]</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">[���ö���]</font>";
								break;
				}
}

function ServDisp( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">�޷�����</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">�з�����</font>";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">��������</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">�޷�����</font>";
								break;
				}
}

function ServDispOp( $value, $R3584859062 = 0 )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">[���ö���]</font>";
								break;
				case 1 :
								echo "[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id=".$R3584859062."\">�Զ���..</a></font>]";
								break;
				case 2 :
								echo "<font color=\"#3399cc\">[���ö���]</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">[���ö���]</font>";
								break;
				}
}

function Shared( $value )
{
				switch ( $value )
				{
				case 0 :
								echo "<font color=\"#cccccc\">������</font>";
								break;
				case 1 :
								echo "<font color=\"#3399cc\">����</font>";
								break;
				default :
								echo "<font color=\"#cccccc\">������</font>";
								break;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
