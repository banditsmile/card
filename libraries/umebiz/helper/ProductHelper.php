<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function PCardsPtype( $R1b69c92460, $R8e8b5578f7 )
{
				if ( $R1b69c92460 == 0 || $R1b69c92460 == 100 || $R1b69c92460 == 101 || $R1b69c92460 == 3 )
				{
								if ( $R1b69c92460 == 100 || $R1b69c92460 == 101 )
								{
												echo "<a href='index.php?m=mod_b2b&c=ykt&a=add&ubzpid=".$R8e8b5578f7."'><span class='ltxt'>导入</span></a>".""."<a href='index.php?m=mod_b2b&c=ykt&ubzpid=".$R8e8b5578f7."&by=1'><span class='rtxt'>编辑</span></a>";
								}
								else
								{
												echo "<a href='index.php?m=mod_b2b&c=card&a=add&ubzpid=".$R8e8b5578f7."'><span class='ltxt'>导入</span></a>".""."<a href='index.php?m=mod_b2b&c=card&ubzpid=".$R8e8b5578f7."&by=1'><span class='rtxt'>编辑</span></a>";
								}
				}
				else if ( $R1b69c92460 == 1 )
				{
								echo "<a href=\"index.php?m=mod_b2b&c=esales&a=add&ubzpid=".$R8e8b5578f7."\" title=\"设直储帐号\"><font color=\"#ff00ff\">直储帐号</font></a>";
				}
				else
				{
								echo "<font color=\"#6c6c6c\">无需库存</font>";
				}
}

function ProductType( $R1b69c92460 )
{
				switch ( $R1b69c92460 )
				{
				case 0 :
								echo "<font color='#0000ff'>卡密商品</font>";
								break;
				case 1 :
								echo "<font color='#ff00ff'>自动充值</font>";
								break;
				case 2 :
								echo "<font color='#7200C3'>代充商品</font>";
								break;
				case 3 :
								echo "号码类";
								break;
				case 4 :
								echo "金币类";
								break;
				case 5 :
								echo "装备类";
								break;
				case 6 :
								echo "代练类";
								break;
				case 100 :
				case 101 :
								echo "<font color='#ff6c00'>一卡通</font>";
								break;
				default :
								echo "卡密商品";
								break;
				}
}

function ProductType2( $R1b69c92460 )
{
				switch ( $R1b69c92460 )
				{
				case 0 :
								echo "<font color='#0000ff'>卡密</font>";
								break;
				case 1 :
								echo "<font color='#ff00ff'>自动</font>";
								break;
				case 2 :
								echo "<font color='#7200C3'>代充</font>";
								break;
				case 3 :
								echo "号码";
								break;
				case 4 :
								echo "金币";
								break;
				case 5 :
								echo "装备";
								break;
				case 6 :
								echo "代练";
								break;
				case 100 :
				case 101 :
								echo "<font color='#ff6c00'>平台</font>";
								break;
				default :
								echo "卡密";
								break;
				}
}

function ProductTypeByText( $Rc6ae9fc711 )
{
				switch ( $Rc6ae9fc711 )
				{
				case "卡密商品" :
								echo "<font color='#0000ff'>卡密商品</font>";
								break;
				case "自动充值" :
								echo "<font color='#ff00ff'>自动充值</font>";
								break;
				case "代充商品" :
								echo "<font color='#7200C3'>代充商品</font>";
								break;
				case "号码类" :
								echo "号码类";
								break;
				case "金币类" :
								echo "金币类";
								break;
				case "装备类" :
								echo "装备类";
								break;
				case "代练类" :
								echo "代练类";
								break;
				case "一卡通" :
								echo "<font color='#ff6c00'>一卡通</font>";
								break;
				default :
								echo "卡密商品";
								break;
				}
}

function ProductTypeByStr( $R027a9ba355 )
{
				switch ( $R027a9ba355 )
				{
				case "卡密商品" :
								echo "<font color='#0000ff'>卡密商品</font>";
								break;
				case "自动充值" :
								echo "<font color='#ff00ff'>自动充值</font>";
								break;
				case "代充商品" :
								echo "<font color='#7200C3'>代充商品</font>";
								break;
				case "号码类" :
								echo "号码类";
								break;
				case "金币类" :
								echo "金币类";
								break;
				case "装备类" :
								echo "装备类";
								break;
				case "代练类" :
								echo "代练类";
								break;
				case "一卡通" :
								echo "<font color='#ff6c00'>一卡通</font>";
								break;
				default :
								echo "<font color='#0000ff'>卡密商品</font>";
								break;
				}
}

function &ProductTypeList( )
{
				$data = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "101" => "一卡通充值专用卡" );
				if ( UB_YKT )
				{
								$data['100'] = "一卡通兑换专用卡";
				}
				return $data;
}

function SupCheck( $R37c014dae5 )
{
				if ( $R37c014dae5 == 1 )
				{
								echo "<font color=\"#ff0000\">需要审核</font>";
				}
				else
				{
								echo "<font color=\"#0000ff\">不需审核</font>";
				}
}

function StockState( $Rffcf9b81af, $R1b69c92460, $Rc79ae5b26d = 0, $R6e985b7f49 = 0, $R034ae2ab94 = 0 )
{
				$R63bede6b19 = "";
				if ( 0 < $Rffcf9b81af && ( $R1b69c92460 == 0 || $R1b69c92460 == 3 ) || 99 < $R1b69c92460 && 0 < $Rc79ae5b26d )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">库存充足</font>";
				}
				else if ( 0 < $Rffcf9b81af && $R1b69c92460 == 1 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">库存充足</font>";
				}
				else if ( $R1b69c92460 == 2 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">库存充足</font>";
				}
				else if ( 0 < $R6e985b7f49 && $R1b69c92460 == 6 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">可以代练</font>";
				}
				else if ( 0 < $R6e985b7f49 && ( $R1b69c92460 == 4 || $R1b69c92460 == 5 ) )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">可以购买</font>";
				}
				else
				{
								$R63bede6b19 = "<font color=\"#ff0000\">库存不足</font>";
				}
				if ( $R034ae2ab94 )
				{
								return $R63bede6b19;
				}
				else
				{
								echo $R63bede6b19;
				}
}

function GetMyPrice( $R899b1291e4, $R4f39743f74, $R70d903936c, $Red2b3403a5 = 10000 )
{
				if ( $R899b1291e4 == "" && $R4f39743f74 == "" && $R70d903936c == "" )
				{
								echo $Red2b3403a5;
				}
				else if ( $R70d903936c == "" && $R4f39743f74 == "" )
				{
								echo $R899b1291e4;
				}
				else if ( $R70d903936c == "" && $R4f39743f74 != "" )
				{
								echo $R4f39743f74;
				}
				else if ( $R70d903936c != "" )
				{
								echo $R70d903936c;
				}
}

function ProductStock( $R244f38266c )
{
				$R6ef86fd07c = intval( $R244f38266c );
				if ( $R6ef86fd07c == 0 )
				{
								return "<font color=\"#ff0000\">缺货</font>";
				}
				if ( 0 < $R6ef86fd07c && $R6ef86fd07c < 20 )
				{
								return "还可以";
				}
				if ( 20 <= $R6ef86fd07c && $R6ef86fd07c < 50 )
				{
								return "多";
				}
				if ( 50 <= $R6ef86fd07c && $R6ef86fd07c < 100 )
				{
								return "比较多";
				}
				if ( 100 <= $R6ef86fd07c && $R6ef86fd07c < 500 )
				{
								return "很多";
				}
				if ( 500 <= $R6ef86fd07c )
				{
								return "超级多";
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
