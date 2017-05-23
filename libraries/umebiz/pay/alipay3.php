<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class alipay
{

				public $instance = NULL;
				public $url = NULL;

				public function __construct( )
				{
								$this->instance = $this->service = factory::getinstance( "payment" );
				}

				public function get_url( $R56ea904d53, $data )
				{
								$R564cc578e1 = $R56ea904d53['ordno'];
								$Re42bde3c42 = $R56ea904d53['pname'];
								$R1a054c65c7 = $R56ea904d53['dollars'];
								$R20fd65e9c7 = array( "paycode" => "alipay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $R20fd65e9c7 );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Re5e14af5c9 = $data['returnurl'];
								$Rcedd5374cb = $data['notifyurl'];
								$R8194d44aff = $Rb60574d852['payMerchant'];
								$R8dfc9f8ecb = $Rb60574d852['payKey'];
								$R07e1b7ba62 = $Rb60574d852['payfee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$service = "create_direct_pay_by_user";
								$R23b313f8bb = array(
												"service" => $service,
												"partner" => $Rb60574d852['other'],
												"return_url" => $Re5e14af5c9,
												"notify_url" => $Rcedd5374cb,
												"_input_charset" => "utf-8",
												"subject" => $Re42bde3c42,
												"body" => $Re42bde3c42,
												"out_trade_no" => $R564cc578e1,
												"total_fee" => $R0aedfdb7e0,
												"payment_type" => 1,
												"seller_email" => $R8194d44aff
								);
								ksort( $R23b313f8bb );
								reset( $R23b313f8bb );
								$param = "";
								$R4b19c1abc4 = "";
								foreach ( $R23b313f8bb as $Rf413f06aeb => $R244f38266c )
								{
												$Refa2684793 = $this->charset_encode( $R244f38266c, "utf-8" );
												$param .= "{$Rf413f06aeb}=".urlencode( $Refa2684793 )."&";
												$R4b19c1abc4 .= "{$Rf413f06aeb}={$Refa2684793}&";
								}
								$param = substr( $param, 0, count( $param ) - 2 );
								$R4b19c1abc4 = substr( $R4b19c1abc4, 0, count( $R4b19c1abc4 ) - 2 ).$R8dfc9f8ecb;
								$Reab8db14b7 = "https://www.alipay.com/cooperate/gateway.do?".$param."&sign=".md5( $R4b19c1abc4 )."&sign_type=MD5";
								$Rffcbbad19d = "<form id='alipayform' method='post' action='".$Reab8db14b7."'>"."<span id='alipayformtip' style='display:none'>请确保您已经在银行网站上开通了网上支付功能，否则将无法支付成功。<a href=''>如何开通?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function get_code( $R56ea904d53, $Rb60574d852 )
				{
								$R564cc578e1 = $R56ea904d53['ubzordno'];
								$Re42bde3c42 = $R56ea904d53['ubzpname'];
								$R1a054c65c7 = $R56ea904d53['ubzdollars'];
								$Re5e14af5c9 = $Rb60574d852['returnurl'];
								$Rcedd5374cb = $Rb60574d852['notifyurl'];
								$R8194d44aff = $Rb60574d852['mechant'];
								$R8dfc9f8ecb = $Rb60574d852['sign'];
								$R07e1b7ba62 = $Rb60574d852['fee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$data = array( "paycode" => "alipay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$service = "create_direct_pay_by_user";
								$R23b313f8bb = array(
												"service" => $service,
												"partner" => $Rb60574d852['other'],
												"return_url" => $Re5e14af5c9,
												"notify_url" => $Rcedd5374cb,
												"_input_charset" => "utf-8",
												"subject" => $Re42bde3c42,
												"body" => $Re42bde3c42,
												"out_trade_no" => $R564cc578e1,
												"total_fee" => $R0aedfdb7e0,
												"payment_type" => 1,
												"seller_email" => $R8194d44aff
								);
								ksort( $R23b313f8bb );
								reset( $R23b313f8bb );
								$param = "";
								$R4b19c1abc4 = "";
								foreach ( $R23b313f8bb as $Rf413f06aeb => $R244f38266c )
								{
												$Refa2684793 = $this->charset_encode( $R244f38266c, "utf-8" );
												$param .= "{$Rf413f06aeb}=".urlencode( $Refa2684793 )."&";
												$R4b19c1abc4 .= "{$Rf413f06aeb}={$Refa2684793}&";
								}
								$param = substr( $param, 0, count( $param ) - 2 );
								$R4b19c1abc4 = substr( $R4b19c1abc4, 0, count( $R4b19c1abc4 ) - 2 ).$R8dfc9f8ecb;
								$Reab8db14b7 = "https://www.alipay.com/cooperate/gateway.do?".$param."&sign=".md5( $R4b19c1abc4 )."&sign_type=MD5";
								$Rffcbbad19d = "<input type='radio' name='ebank' value='alipayform' onclick='EBankCheck(this)'/><input type='hidden' id='alipayformamount' value='".$R68eaf33c4e."' />"."<img alt='' src='".UPATH_CONTENT."images/alipay.gif' align='absMiddle' /><span class='textgray'>(<span class='dollars' id='alipayformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<form id='alipayform' method='post' action='".$Reab8db14b7."' target='_blank'>"."<span id='alipayformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费，同时支持支付宝余额付款。<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function result( )
				{
								$R224ed324f2 = rawurldecode( $_GET['seller_email'] );
								$R564cc578e1 = str_replace( $R224ed324f2."_", "", $_GET['out_trade_no'] );
								$R564cc578e1 = trim( $R564cc578e1 );
								$R1a054c65c7 = $_GET['total_fee'];
								$R1a054c65c7 = round( $R1a054c65c7, 2 );
								$data = array( "paycode" => "alipay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								ksort( $_GET );
								reset( $_GET );
								$R4b19c1abc4 = "";
								foreach ( $GLOBALS['_GET'] as $Rf413f06aeb => $R244f38266c )
								{
												if ( $Rf413f06aeb != "sign" && $Rf413f06aeb != "sign_type" && $Rf413f06aeb != "m" && $Rf413f06aeb != "c" && $Rf413f06aeb != "paycode" && $Rf413f06aeb != "mean" && $R244f38266c != "" )
												{
																$R4b19c1abc4 .= "{$Rf413f06aeb}={$R244f38266c}&";
												}
								}
								$R4b19c1abc4 = substr( $R4b19c1abc4, 0, -1 ).$Rb60574d852['payKey'];
								if ( md5( $R4b19c1abc4 ) != $_GET['sign'] )
								{
												return false;
								}
								if ( $_GET['trade_status'] == "WAIT_SELLER_SEND_GOODS" )
								{
												$R4ee66cfcee = "Y";
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R92e69bb035 = $Rb60574d852['payKey'];
												$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
												$this->url = array(
																"BillNo" => $R564cc578e1,
																"Amount" => $R1a054c65c7,
																"Succ" => $R4ee66cfcee,
																"Signature" => $Rb90d24d63c,
																"PayWay" => "alipay",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
								else if ( $_GET['trade_status'] == "TRADE_FINISHED" || $_GET['trade_status'] == "TRADE_SUCCESS" )
								{
												$R4ee66cfcee = "Y";
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R92e69bb035 = $Rb60574d852['payKey'];
												$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
												$this->url = array(
																"BillNo" => $R564cc578e1,
																"Amount" => $R1a054c65c7,
																"Succ" => $R4ee66cfcee,
																"Signature" => $Rb90d24d63c,
																"PayWay" => "alipay",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
								else
								{
												return false;
								}
				}

				public function charset_encode( $R6c6f2ffa34, $R70c75c7652, $Rf49ccd90ab = "GBK" )
				{
								$Re96e6957e6 = "";
								if ( !isset( $R70c75c7652 ) )
								{
												$R70c75c7652 = "utf-8";
								}
								if ( $Rf49ccd90ab == $R70c75c7652 || $R6c6f2ffa34 == null )
								{
												$Re96e6957e6 = $R6c6f2ffa34;
								}
								else if ( function_exists( "mb_convert_encoding" ) )
								{
												$Re96e6957e6 = mb_convert_encoding( $R6c6f2ffa34, $R70c75c7652, $Rf49ccd90ab );
								}
								else if ( function_exists( "iconv" ) )
								{
												$Re96e6957e6 = iconv( $Rf49ccd90ab, $R70c75c7652, $R6c6f2ffa34 );
								}
								else
								{
												exit( "sorry, you have no libs support for charset change." );
								}
								return $Re96e6957e6;
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "alipay" );
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
