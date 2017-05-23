<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function CreateOrdno( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
				$R30642e01fd = factory::getinstance( "orders" );
				$R679e9b9234 = $R30642e01fd->IOrder_IsExist( $Rdcd9105806 );
				while ( $R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
								$R679e9b9234 = $R5df8ca3345->IOrder_IsExist( $Rdcd9105806 );
				}
				return $Rdcd9105806;
}

function MkRank( $Re4a3f5f7a1 )
{
				srand( seed( ) );
				$R09a73f4b6e = rand( power( $Re4a3f5f7a1 ), power( $Re4a3f5f7a1 + 1 ) - 1 );
				return $R09a73f4b6e;
}

function Power( $Re4a3f5f7a1 )
{
				$R4f6dd3397f = 1;
				while ( 0 < $Re4a3f5f7a1-- )
				{
								$R4f6dd3397f *= 10;
				}
				return $R4f6dd3397f;
}

function GetRand( $Rf5f11a8d38, $R65dfacb399 = 0 )
{
				switch ( $R65dfacb399 )
				{
				case 0 :
								$R63bede6b19 = "01234567890123456789";
								break;
				case 1 :
								$R63bede6b19 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
								break;
				case 2 :
								$R63bede6b19 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								break;
				default :
								$R63bede6b19 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								break;
				}
				return substr( str_shuffle( $R63bede6b19 ), 0, $Rf5f11a8d38 );
}

function YktType( $R244f38266c )
{
				switch ( $R244f38266c )
				{
				case 100 :
								echo "兑换专用卡";
								break;
				case 101 :
								echo "<font color=\"#ff00ff\">充值专用卡</font>";
								break;
				default :
								break;
				}
}

function YktState( $R244f38266c, $R87aee22884 = 0, $R3584859062 = 0 )
{
}

function YktOkState( $R244f38266c )
{
				switch ( $R244f38266c )
				{
				case 0 :
								echo "<font color=\"#6c6c6c\">已使用</font>";
								break;
				case 1 :
								echo "<font color=\"#008800\">已生效</font>";
								break;
				case 2 :
								echo "<font color=\"#0000ff\">未生效</font>";
								break;
				case 3 :
								echo "<font color=\"#ff0000\">正在换购中</font>";
								break;
				default :
								break;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
