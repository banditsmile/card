<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class paypal
{

				public $instance = NULL;
				public $url = NULL;

				public function __construct( )
				{
								$this->instance = $this->service = factory::getinstance( "payment" );
				}

				public function get_code( $R56ea904d53, $Rb60574d852 )
				{
								$R7349bb5a5e = $R56ea904d53['ubzordno'];
								$R1a054c65c7 = $R56ea904d53['ubzdollars'];
								$Re42bde3c42 = $R56ea904d53['ubzpname'];
								$Re74add2192 = $Rb60574d852['returnurl'];
								$R6d243f540c = $Rb60574d852['mechant'];
								$R1288ba3d36 = $Rb60574d852['returnurl'];
								$R07e1b7ba62 = $Rb60574d852['fee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$R16b83ea435 = $R68eaf33c4e;
								$R82e3436f8e = "";
								$R59d4ca4468 = "<input type='radio' name='ebank' value='paypalform' onclick='EBankCheck(this)' /><img alt='' src='".UPATH_CONTENT."images/paypal.gif' align='absMiddle'/><span class='textgray'>(<span class='dollars' id='paypalformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<input type='hidden' id='paypalformamount' value='".$R16b83ea435."' />"."<form  action='https://www.paypal.com/cgi-bin/webscr' method='post' name='paypalform' id='paypalform' target='_blank'>"."<input type='hidden' name='cmd' value='_xclick'>"."<input type='hidden' name='business' value='{$R6d243f540c}'>"."<input type='hidden' name='item_name' value='{$Re42bde3c42}'>"."<input type='hidden' name='return' value='{$Re74add2192}'>"."<input type='hidden' name='amount' value='{$R68eaf33c4e}'>"."<input type='hidden' name='invoice' value='{$R7349bb5a5e}'>"."<input type='hidden' name='charset' value='gb2312'>"."<input type='hidden' name='no_shipping' value='1'>"."<input type='hidden' name='no_note' value='0'>"."<input type='hidden' name='currency_code' value='USD'>"."<input type='hidden' name='notify_url' value='{$R1288ba3d36}'>"."<input type='hidden' name='rm' value='2'>"."<input type='hidden' name='cancel_return' value='{$R82e3436f8e}'>"."<span id='paypalformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费，同时支持paypal余额付款。本接口支持外汇支付</span>"."</form><br />";
								return $R59d4ca4468;
				}

				public function result_pdt( )
				{
								$data = array( "paycode" => "paypal" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Ref30f35ec9 = $Rb60574d852['payMerchant'];
								$Rc6e3397d63 = "cmd=_notify-synch";
								$Rbacd3c3723 = $_GET['tx'];
								$Rd0b35de0bf = $Rb60574d852['payKey'];
								$Rc6e3397d63 .= "&tx={$Rbacd3c3723}&at={$Rd0b35de0bf}";
								$R972a1d6d7f = "POST /cgi-bin/webscr HTTP/1.0\r\n";
								$R972a1d6d7f .= "Content-Type: application/x-www-form-urlencoded\r\n";
								$R972a1d6d7f .= "Content-Length: ".strlen( $Rc6e3397d63 )."\r\n\r\n";
								$Rf500f4a848 = fsockopen( "www.paypal.com", 80, $R32d00070d4, $R5f525f5b39, 30 );
								if ( !$Rf500f4a848 )
								{
												fclose( $Rf500f4a848 );
												return false;
								}
								else
								{
												fputs( $Rf500f4a848, $R972a1d6d7f.$Rc6e3397d63 );
												$R4002603e45 = "";
												$R7286d35d3b = false;
												while ( !feof( $Rf500f4a848 ) )
												{
																$R9061c9fef1 = fgets( $Rf500f4a848, 1024 );
																if ( strcmp( $R9061c9fef1, "\r\n" ) == 0 )
																{
																				$R7286d35d3b = true;
																}
																else if ( $R7286d35d3b )
																{
																				$R4002603e45 .= $R9061c9fef1;
																}
												}
												$R3870a31671 = explode( "\n", $R4002603e45 );
												$R1f10b0b348 = array( );
												if ( strcmp( $R3870a31671[0], "SUCCESS" ) == 0 )
												{
																
																for ( $Ra16d228039 = 1;	$Ra16d228039 < count( $R3870a31671 );	$Ra16d228039++	)
																{
																				$Rcc5c6e696c = explode( "=", $R3870a31671[$Ra16d228039] );
																				$Rf413f06aeb = $Rcc5c6e696c[0];
																				$R244f38266c = isset( $Rcc5c6e696c[1] ) ? $Rcc5c6e696c[1] : "";
																				$R1f10b0b348[urldecode( $Rf413f06aeb )] = urldecode( $R244f38266c );
																}
																$R746cc4eb7d = $R1f10b0b348['first_name'];
																$R215d3ff6e5 = $R1f10b0b348['last_name'];
																$Rfc8892a0fe = $R1f10b0b348['item_name'];
																$R1af2f1519b = $R1f10b0b348['mc_gross'];
																$Rdcd9105806 = $R1f10b0b348['invoice'];
																$Rbd82866b17 = $R1f10b0b348['receiver_email'];
																$R17ba55a537 = $R1f10b0b348['payment_status'];
																$Rc494d84a88 = $R1f10b0b348['mc_currency'];
																if ( $R17ba55a537 != "Completed" )
																{
																				fclose( $Rf500f4a848 );
																				return false;
																}
																if ( $Rbd82866b17 != $Ref30f35ec9 )
																{
																				fclose( $Rf500f4a848 );
																				return false;
																}
																if ( $R1af2f1519b <= 0 )
																{
																				fclose( $Rf500f4a848 );
																				return false;
																}
																if ( $Rc494d84a88 != "USD" )
																{
																				fclose( $Rf500f4a848 );
																				return false;
																}
																fclose( $Rf500f4a848 );
																$R4ee66cfcee = "Y";
																$R564cc578e1 = $Rdcd9105806;
																$R1a054c65c7 = $R1af2f1519b;
																$R7bf6de464c = factory::getinstance( "sysnet" );
																$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																$R92e69bb035 = $Rb60574d852['payKey'];
																$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
																$this->url = array(
																				"BillNo" => $R564cc578e1,
																				"Amount" => $R1a054c65c7,
																				"Succ" => $R4ee66cfcee,
																				"Signature" => $Rb90d24d63c,
																				"PayWay" => "paypal",
																				"BuyerIP" => $_SERVER['REMOTE_ADDR']
																);
																return true;
												}
												else if ( strcmp( $R3870a31671[0], "FAIL" ) == 0 )
												{
																fclose( $Rf500f4a848 );
																return false;
												}
								}
								return false;
				}

				public function result( )
				{
								return $this->result_pdt( );
								exit( );
								$data = array( "paycode" => "paypal" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Ref30f35ec9 = $Rb60574d852['payMerchant'];
								$Rc6e3397d63 = "cmd=_notify-validate";
								foreach ( $GLOBALS['_POST'] as $Rf413f06aeb => $value )
								{
												$value = urlencode( stripslashes( $value ) );
												$Rc6e3397d63 .= "&{$Rf413f06aeb}={$value}";
								}
								$R972a1d6d7f = "POST /cgi-bin/webscr HTTP/1.0\r\n";
								$R972a1d6d7f .= "Content-Type: application/x-www-form-urlencoded\r\n";
								$R972a1d6d7f .= "Content-Length: ".strlen( $Rc6e3397d63 )."\r\n\r\n";
								$Rf500f4a848 = fsockopen( "www.paypal.com", 80, $R32d00070d4, $R5f525f5b39, 30 );
								$R8467d76cab = $_POST['item_name'];
								$R99bf90fde8 = $_POST['item_number'];
								$R17ba55a537 = $_POST['payment_status'];
								$R1af2f1519b = $_POST['mc_gross'];
								$Rc494d84a88 = $_POST['mc_currency'];
								$R53e32b8e29 = $_POST['txn_id'];
								$Rbd82866b17 = $_POST['receiver_email'];
								$R8394fc9580 = $_POST['payer_email'];
								$Rdcd9105806 = $_POST['invoice'];
								$R336ce7ed1e = !empty( $_POST['memo'] ) ? $_POST['memo'] : "";
								if ( !$Rf500f4a848 )
								{
												fclose( $Rf500f4a848 );
												return false;
								}
								else
								{
												fputs( $Rf500f4a848, $R972a1d6d7f.$Rc6e3397d63 );
												while ( !feof( $Rf500f4a848 ) )
												{
																$R4002603e45 = fgets( $Rf500f4a848, 1024 );
																if ( strcmp( $R4002603e45, "VERIFIED" ) == 0 )
																{
																				if ( $R17ba55a537 != "Completed" )
																				{
																								fclose( $Rf500f4a848 );
																								return false;
																				}
																				if ( $Rbd82866b17 != $Ref30f35ec9 )
																				{
																								fclose( $Rf500f4a848 );
																								return false;
																				}
																				if ( $R1af2f1519b <= 0 )
																				{
																								fclose( $Rf500f4a848 );
																								return false;
																				}
																				if ( $Rc494d84a88 != "USD" )
																				{
																								fclose( $Rf500f4a848 );
																								return false;
																				}
																				fclose( $Rf500f4a848 );
																				$R4ee66cfcee = "Y";
																				$R564cc578e1 = $Rdcd9105806;
																				$R1a054c65c7 = $R1af2f1519b;
																				$R7bf6de464c = factory::getinstance( "sysnet" );
																				$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																				$R92e69bb035 = $Rb60574d852['payKey'];
																				$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
																				$this->url = array(
																								"BillNo" => $R564cc578e1,
																								"Amount" => $R1a054c65c7,
																								"Succ" => $R4ee66cfcee,
																								"Signature" => $Rb90d24d63c,
																								"PayWay" => "paypal",
																								"BuyerIP" => $_SERVER['REMOTE_ADDR']
																				);
																				return true;
																}
																else if ( strcmp( $R4002603e45, "INVALID" ) == 0 )
																{
																				fclose( $Rf500f4a848 );
																				return false;
																}
												}
								}
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "paypal" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R92e69bb035 = $Rb60574d852['payKey'];
								$R1a054c65c7 = getvar( "Amount" );
								$R564cc578e1 = getvar( "BillNo" );
								$R4ee66cfcee = getvar( "Succ" );
								$Rb90d24d63c = getvar( "Signature" );
								if ( $R4ee66cfcee == "N" )
								{
												return false;
								}
								if ( $Rb90d24d63c != md5( $ubzuid.$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 ) )
								{
												return false;
								}
								if ( doubleval( $R1a054c65c7 ) <= 0 )
								{
												return false;
								}
								return true;
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
