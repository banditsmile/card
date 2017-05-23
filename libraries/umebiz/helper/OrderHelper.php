<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function OrderState( $R901a6b96db, $R1b69c92460, $Rb60574d852 = 0 )
{
				if ( $R1b69c92460 == 0 || $R1b69c92460 == 100 || $R1b69c92460 == 101 || $R1b69c92460 == 3 )
				{
								switch ( $R901a6b96db )
								{
								case 0 :
												if ( 99 < $Rb60574d852 )
												{
																echo "<font color=\"#0000ff\">等待处理</font>";
												}
												else
												{
																echo "<font color=\"#6c6c6c\">未付款</font>";
												}
												break;
								case 1 :
												echo "<font color=\"#ff00ff\">已付款未发卡</font>";
												break;
								case 2 :
												echo "<font color=\"#008800\">交易完成</font>";
												break;
								case -1 :
												echo "<font color=\"#ff0000\">交易失败</font>";
												break;
								default :
												echo "未知";
												break;
								}
				}
				if ( 0 < $R1b69c92460 && $R1b69c92460 != 100 && $R1b69c92460 != 101 && $R1b69c92460 != 4 && $R1b69c92460 != 5 && $R1b69c92460 != 6 && $R1b69c92460 != 3 )
				{
								switch ( $R901a6b96db )
								{
								case 0 :
												if ( 99 < $Rb60574d852 )
												{
																echo "<font color=\"#0000ff\">等待处理</font>";
												}
												else
												{
																echo "<font color=\"#6c6c6c\">未付款</font>";
												}
												break;
								case 3 :
												echo "<font color=\"#ff00ff\">已提交充值</font>";
												break;
								case 1 :
												echo "<font color=\"#0000ff\">正在充值中</font>";
												break;
								case 2 :
												echo "<font color=\"#008800\">交易完成</font>";
												break;
								case -1 :
												echo "<font color=\"#ff0000\">交易失败</font>";
												break;
								default :
												echo "未知";
												break;
								}
				}
				if ( $R1b69c92460 == 4 || $R1b69c92460 == 5 )
				{
								switch ( $R901a6b96db )
								{
								case 0 :
												echo "<font color=\"#6c6c6c\">未付款</font>";
												break;
								case 1 :
												echo "<font color=\"#0000ff\">已付款处理中..</font>";
												break;
								case 2 :
												echo "<font color=\"#008800\">交易完成</font>";
												break;
								case -1 :
												echo "<font color=\"#ff0000\">交易失败</font>";
												break;
								default :
												echo "未知";
												break;
								}
				}
				if ( $R1b69c92460 == 6 )
				{
								switch ( $R901a6b96db )
								{
								case 0 :
												echo "<font color=\"#6c6c6c\">未付款</font>";
												break;
								case 1 :
												echo "<font color=\"#0000ff\">已付款代练中</font>";
												break;
								case 2 :
												echo "<font color=\"#008800\">代练完成</font>";
												break;
								case -1 :
												echo "<font color=\"#ff0000\">代练失败</font>";
												break;
								default :
												echo "未知";
												break;
								}
				}
}

function OrderStateBd( $R901a6b96db, $R1b69c92460 = 2, $Rb60574d852 = 0 )
{
				switch ( $R901a6b96db )
				{
				case 0 :
								echo "<font color=\"#0000ff\">等待补单</font>";
								break;
				case 3 :
								echo "<font color=\"#ff00ff\">已提交补单</font>";
								break;
				case 1 :
								echo "<font color=\"#0000ff\">等待补单</font>";
								break;
				case 2 :
								echo "<font color=\"#008800\">补单完成</font>";
								break;
				case -1 :
								echo "<font color=\"#ff0000\">补单失败</font>";
								break;
				default :
								echo "未知";
								break;
				}
}

function GetPayment( $R0a97c5bdc4, $Rdcd9105806 = "", $R4c792762b2 = 1 )
{
				switch ( $R0a97c5bdc4 )
				{
				case 0 :
								echo "未知";
								break;
				case 1 :
								echo "支付宝";
								break;
				case 2 :
								echo "ips";
								break;
				case 3 :
								echo "财付通";
								break;
				case 4 :
								echo "网银中国";
								break;
				case 6 :
								echo "paypal";
								break;
				case 7 :
								echo "易宝";
								break;
				case 8 :
								echo "云网";
								break;
				case 9 :
								echo "paydollar";
								break;
				case 100 :
								if ( $R4c792762b2 )
								{
												echo "<font color=\"#0000ff\">一卡通</font>";
								}
								else
								{
												echo "一卡通";
								}
								break;
				case 101 :
								if ( $R4c792762b2 )
								{
												echo "<font color=\"#0000ff\">一卡通</font>";
								}
								else
								{
												echo "一卡通";
								}
								break;
				case 102 :
								if ( $R4c792762b2 )
								{
												echo "[<a href=\"index.php?m=mod_b2b&c=trade&tpl=ykt&stype=ordno&keywords=".$Rdcd9105806."\"><font color=\"#0000ff\">游戏卡</font></a>]";
								}
								else
								{
												echo "一卡通";
								}
								break;
				case 99 :
								echo "管理员支付";
								break;
				case 97 :
								echo "账户结算支出";
								break;
				case 98 :
								echo "账户支付";
								break;
				case 96 :
								echo "积分兑换";
								break;
				default :
								echo "未知";
								break;
				}
}

function PaymentCode( $Rb60574d852 )
{
				$data = array( "alipay" => 1, "ips" => 2, "tenpay" => 3, "chinabank" => 4, "allbuy" => 5, "paypal" => 6, "yeepay" => 7, "cncard" => 8, "paydollar" => 9, "acount" => 98, "adpay" => 99, "ykt" => 100 );
				return $data[$Rb60574d852];
}

function seed( )
{
				list( $R2e237bd2ac, $R39ad040863 ) = explode( " ", microtime( ) );
				return ( double )$R39ad040863;
}

function CreateFundsOrdno_1( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
				$R30642e01fd = factory::getinstance( "funds" );
				$R679e9b9234 = $R30642e01fd->IFunds_IsExist( $Rdcd9105806 );
				while ( $R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
								$R679e9b9234 = $R30642e01fd->IFunds_IsExist( $Rdcd9105806 );
				}
				return $Rdcd9105806;
}

function CreateFundsOrdno( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
				$hander = factory::getinstance( "ordno" );
				$R679e9b9234 = $hander->IOrdno_Create( array(
								"ordno" => $Rdcd9105806
				) );
				$Ra16d228039 = 0;
				while ( !$R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
								$R679e9b9234 = $hander->IOrdno_Create( array(
												"ordno" => $Rdcd9105806
								) );
								$Ra16d228039++;
								if ( 20 < $Ra16d228039 )
								{
												return "1";
								}
				}
				return $Rdcd9105806;
}

function CreateOrdno( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 1000, 9999 );
				$hander = factory::getinstance( "ordno" );
				$R679e9b9234 = $hander->IOrdno_Create( array(
								"ordno" => $Rdcd9105806
				) );
				$Ra16d228039 = 0;
				while ( !$R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 1000, 9999 );
								$R679e9b9234 = $hander->IOrdno_Create( array(
												"ordno" => $Rdcd9105806
								) );
								$Ra16d228039++;
								if ( 20 < $Ra16d228039 )
								{
												return "1";
								}
				}
				return $Rdcd9105806;
}

function CreateOrdno_1( )
{
				global $cache;
				$R0b3e61d3f3 = UPATH_ROOT.DS."content".DS.$cache.DS."tmporder.php";
				if ( !file_exists( $R0b3e61d3f3 ) )
				{
								$R63bede6b19 = "";
				}
				else if ( date( "Y-m-d H:i:s", filemtime( $R0b3e61d3f3 ) ) < date( "Y-m-d H:i:s", strtotime( "-5 minutes" ) ) )
				{
								$R63bede6b19 = "";
				}
				else
				{
								include( $R0b3e61d3f3 );
				}
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 1000, 9999 );
				$R30642e01fd = factory::getinstance( "orders" );
				$R679e9b9234 = $R30642e01fd->IOrder_IsExist( $Rdcd9105806 );
				while ( $R679e9b9234 || strpos( $R63bede6b19, $Rdcd9105806 ) !== false )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 1000, 9999 );
								$R679e9b9234 = $R30642e01fd->IOrder_IsExist( $Rdcd9105806 );
				}
				file_put_contents( $R0b3e61d3f3, "<?php \$R63bede6b19='".$R63bede6b19.",".$Rdcd9105806."'; ?>" );
				return $Rdcd9105806;
}

function CreateLoanOrdno_1( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
				$R30642e01fd = factory::getinstance( "loan" );
				$R679e9b9234 = $R30642e01fd->ILoan_IsExist( $Rdcd9105806 );
				while ( $R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
								$R679e9b9234 = $R30642e01fd->ILoan_IsExist( $Rdcd9105806 );
				}
				return $Rdcd9105806;
}

function CreateLoanOrdno( )
{
				srand( seed( ) );
				$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
				$hander = factory::getinstance( "ordno" );
				$R679e9b9234 = $hander->IOrdno_Create( array(
								"ordno" => $Rdcd9105806
				) );
				$Ra16d228039 = 0;
				while ( !$R679e9b9234 )
				{
								$Rdcd9105806 = date( "YmdHis" ).rand( 10, 99 );
								$R679e9b9234 = $hander->IOrdno_Create( array(
												"ordno" => $Rdcd9105806
								) );
								$Ra16d228039++;
								if ( 20 < $Ra16d228039 )
								{
												return "1";
								}
				}
				return $Rdcd9105806;
}

function Operator( $Rd356d13156, $R45074ab3da, $Re1cd79b42a = 1, $Rc57f84679f = 0, $R927f6c79b3 = 0, $R034ae2ab94 = 0 )
{
				$R63bede6b19 = "";
				if ( is_numeric( $R45074ab3da ) )
				{
								if ( $R45074ab3da == "0" )
								{
												if ( $R034ae2ab94 == 0 )
												{
																echo "系统";
												}
												else
												{
																return "系统";
												}
												return;
								}
								if ( $Rd356d13156 == $R45074ab3da )
								{
												$R63bede6b19 = "总账号";
								}
								else
								{
												$R63bede6b19 = "商户号";
								}
				}
				else if ( $Rd356d13156 == $R45074ab3da )
				{
								$R63bede6b19 = "总账号";
				}
				else
				{
								$R63bede6b19 = "员工号";
				}
				if ( $R45074ab3da == "0" )
				{
								if ( $R034ae2ab94 == 0 )
								{
												echo "系统";
								}
								else
								{
												return "系统";
								}
								return;
				}
				if ( $R927f6c79b3 == 1 || $Re1cd79b42a == 0 && $Rd356d13156 != $R45074ab3da )
				{
								$R63bede6b19 = $R63bede6b19."(".$R45074ab3da.")";
				}
				if ( $R034ae2ab94 == 0 )
				{
								echo $R63bede6b19;
				}
				else
				{
								return $R63bede6b19;
				}
}

function UnderlingOperator( $Rd356d13156, $R45074ab3da, $Re1cd79b42a = 1, $R927f6c79b3 = 0 )
{
				$R63bede6b19 = "";
				if ( $Rd356d13156 == $R45074ab3da )
				{
								$R63bede6b19 = "总账号";
				}
				else
				{
								$R63bede6b19 = "下家号";
				}
				if ( $R45074ab3da == "0" )
				{
								echo "系统";
								return;
				}
				if ( $R927f6c79b3 == 1 || $Re1cd79b42a == 0 && $Rd356d13156 != $R45074ab3da )
				{
								$R63bede6b19 = $R63bede6b19."(".$R45074ab3da.")";
				}
				echo $R63bede6b19;
}

function TradeType( $Rdaad5a3ed7, $R034ae2ab94 = 0 )
{
				switch ( $Rdaad5a3ed7 )
				{
				case 0 :
								$R63bede6b19 = "未知";
								break;
				case 1 :
								$R63bede6b19 = "普通点卡交易";
								break;
				case 2 :
								$R63bede6b19 = "用户网银充值";
								break;
				case 11 :
								$R63bede6b19 = "点卡交易产生的经销商利润";
								break;
				case 12 :
								$R63bede6b19 = "供货所得";
								break;
				case 21 :
								$R63bede6b19 = "贷款给别人";
								break;
				case 22 :
								$R63bede6b19 = "向别人借款";
								break;
				case 31 :
								$R63bede6b19 = "转款给别人";
								break;
				case 32 :
								$R63bede6b19 = "别人转款给我";
								break;
				case 50 :
								$R63bede6b19 = "积分累积";
								break;
				case 60 :
								$R63bede6b19 = "生效一卡通";
								break;
				case 61 :
								$R63bede6b19 = "一卡通返点";
								break;
				case 97 :
								$R63bede6b19 = "账户结算";
								break;
				case 96 :
								$R63bede6b19 = "积分兑换";
								break;
				case 98 :
								$R63bede6b19 = "资金操作产生的交易记录";
								break;
				case 99 :
								$R63bede6b19 = "管理员充值";
								break;
				case 100 :
								$R63bede6b19 = "一卡通兑换点卡交易";
								break;
				case 101 :
								$R63bede6b19 = "一卡通充值卡充值";
								break;
				default :
								$R63bede6b19 = "未知";
								break;
				}
				if ( $R034ae2ab94 == 0 )
				{
								echo $R63bede6b19;
				}
				else
				{
								return $R63bede6b19;
				}
}

function TradeMoney( $R72852f08e6, $R63bede6b19 )
{
				if ( $R72852f08e6 == "" )
				{
								echo "";
				}
				else
				{
								echo $R63bede6b19." ".round( $R72852f08e6, 3 );
				}
}

function UrlByTradeType( $Ra8b176bf4f, $Rdcd9105806 )
{
				switch ( $Ra8b176bf4f )
				{
				case 1 :
				case 12 :
								echo "index.php?m=mod_agent&c=order&a=netail&ordno=".$Rdcd9105806;
								break;
				default :
								echo "#";
								break;
				}
}

function CzText( $R244f38266c, $R034ae2ab94 = 0 )
{
				$Rcc5c6e696c = explode( "||", $R244f38266c );
				if ( count( $Rcc5c6e696c ) == 2 )
				{
								$R63bede6b19 = $Rcc5c6e696c[1];
				}
				else
				{
								$R63bede6b19 = $R244f38266c;
				}
				if ( $R034ae2ab94 == 0 )
				{
								echo $R63bede6b19;
				}
				else
				{
								return $R63bede6b19;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
