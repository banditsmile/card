<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class tenpay
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
								$R20fd65e9c7 = array( "paycode" => "tenpay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $R20fd65e9c7 );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Re5e14af5c9 = $data['returnurl'];
								$Rcedd5374cb = $data['notifyurl'];
								$R8194d44aff = $Rb60574d852['payMerchant'];
								$R8dfc9f8ecb = $Rb60574d852['payKey'];
								$R07e1b7ba62 = $Rb60574d852['payfee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R346a09ab04 = "1";
								$R430eda7501 = date( "Ymd" );
								$R7f55dd78bb = $data['bank_type'];
								if ( $R7f55dd78bb == 0 )
								{
												$R7f55dd78bb = "DEFAULT";
								}
								$Rbae26e5418 = $Re42bde3c42;
								$R3771265cc0 = "";
								$R4e4e36fc7c = $R8194d44aff;
								$R363d503e20 = $R564cc578e1;
								$R6eb401f7b0 = strlen( $R564cc578e1 );
								if ( 10 < $R6eb401f7b0 )
								{
												$R564cc578e1 = substr( $R564cc578e1, $R6eb401f7b0 - 10, 10 );
								}
								if ( $R6eb401f7b0 < 10 )
								{
												$R564cc578e1 .= "0000000000";
												$R564cc578e1 = substr( $R564cc578e1, 0, 10 );
								}
								$R8690a73eaa = $R564cc578e1;
								$R3edcca1211 = $R8194d44aff.$R430eda7501.$R8690a73eaa;
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e ) * 100;
								$R1e98a581b3 = "1";
								$R3e0c3bc711 = $this->GetIp( );
								$R23b313f8bb = array(
												"partner" => $R8194d44aff,
												"out_trade_no" => $R8690a73eaa,
												"transaction_id" => $R3edcca1211,
												"total_fee" => $R0aedfdb7e0,
												"return_url" => $Re5e14af5c9,
												"notify_url" => $Rcedd5374cb,
												"body" => $Re42bde3c42,
												"bank_type" => $R7f55dd78bb,
												"spbill_create_ip" => $R3e0c3bc711,
												"fee_type" => $R1e98a581b3,
												"subject" => $Re42bde3c42,
												"sign_type" => "MD5",
												"service_version" => "1.0",
												"input_charset" => "GBK",
												"sign_key_index" => "1",
												"attach" => $R363d503e20,
												"product_fee" => "",
												"transport_fee" => "0",
												"time_start" => date( "YmdHis" ),
												"time_expire" => "",
												"buyer_id" => "",
												"goods_tag" => "",
												"trade_mode" => "1",
												"transport_desc" => "",
												"trans_type" => "1",
												"agentid" => "",
												"agent_type" => "",
												"seller_id" => ""
								);
								$R87eb16ecf4 = "";
								ksort( $R23b313f8bb );
								foreach ( $R23b313f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( "" != $Ra3d52e52a4 && "sign" != $Ra09fe38af3 )
												{
																$R87eb16ecf4 .= $Ra09fe38af3."=".$Ra3d52e52a4."&";
												}
								}
								$R87eb16ecf4 .= "key=".$R8dfc9f8ecb;
								$R4b19c1abc4 = strtolower( md5( $R87eb16ecf4 ) );
								$R23b313f8bb['sign'] = $R4b19c1abc4;
								$Rfcb2e2ab50 = "";
								ksort( $R23b313f8bb );
								foreach ( $R23b313f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$Rfcb2e2ab50 .= $Ra09fe38af3."=".urlencode( $Ra3d52e52a4 )."&";
								}
								$Rfcb2e2ab50 = substr( $Rfcb2e2ab50, 0, strlen( $Rfcb2e2ab50 ) - 1 );
								$Rce859e0f54 = "https://gw.tenpay.com/gateway/pay.htm?".$Rfcb2e2ab50;
								$Rffcbbad19d = "<form id='tenpayform' method='post' action='".$Rce859e0f54."'>"."<span id='tenpayformtip' style='display:none'>请确保您已经在银行网站上开通了网上支付功能，否则将无法支付成功。<a href=''>如何开通?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function GetIp( )
				{
								$R9cfb7c6d6b = "";
								if ( getenv( "HTTP_CLIENT_IP" ) && strcasecmp( getenv( "HTTP_CLIENT_IP" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_CLIENT_IP" );
								}
								else if ( getenv( "HTTP_X_FORWARDED_FOR" ) && strcasecmp( getenv( "HTTP_X_FORWARDED_FOR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_X_FORWARDED_FOR" );
								}
								else if ( getenv( "REMOTE_ADDR" ) && strcasecmp( getenv( "REMOTE_ADDR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "REMOTE_ADDR" );
								}
								else if ( isset( $_SERVER['REMOTE_ADDR'] ) && $_SERVER['REMOTE_ADDR'] && strcasecmp( $_SERVER['REMOTE_ADDR'], "unknown" ) )
								{
												$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								}
								else
								{
												$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								}
								return $R9cfb7c6d6b;
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
								$R346a09ab04 = "1";
								$R430eda7501 = date( "Ymd" );
								$R7f55dd78bb = isset( $Rb60574d852['defaultbank'] ) ? intval( $Rb60574d852['defaultbank'] ) : "DEFAULT";
								if ( $R7f55dd78bb == 0 )
								{
												$R7f55dd78bb = "DEFAULT";
								}
								$Rbae26e5418 = $Re42bde3c42;
								$R3771265cc0 = "";
								$R4e4e36fc7c = $R8194d44aff;
								$R363d503e20 = $R564cc578e1;
								$R6eb401f7b0 = strlen( $R564cc578e1 );
								if ( 10 < $R6eb401f7b0 )
								{
												$R564cc578e1 = substr( $R564cc578e1, $R6eb401f7b0 - 10, 10 );
								}
								if ( $R6eb401f7b0 < 10 )
								{
												$R564cc578e1 .= "0000000000";
												$R564cc578e1 = substr( $R564cc578e1, 0, 10 );
								}
								$R8690a73eaa = $R564cc578e1;
								$R3edcca1211 = $R8194d44aff.$R430eda7501.$R8690a73eaa;
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e ) * 100;
								$R1e98a581b3 = "1";
								$R337b3b5835 = $Re5e14af5c9;
								$R3e0c3bc711 = $this->GetIp( );
								$R23b313f8bb = array(
												"partner" => $R8194d44aff,
												"out_trade_no" => $R8690a73eaa,
												"transaction_id" => $R3edcca1211,
												"total_fee" => $R0aedfdb7e0,
												"return_url" => $Re5e14af5c9,
												"notify_url" => $Rcedd5374cb,
												"body" => $Re42bde3c42,
												"bank_type" => $R7f55dd78bb,
												"spbill_create_ip" => $R3e0c3bc711,
												"fee_type" => $R1e98a581b3,
												"subject" => $Re42bde3c42,
												"sign_type" => "MD5",
												"service_version" => "1.0",
												"input_charset" => "GBK",
												"sign_key_index" => "1",
												"attach" => $R363d503e20,
												"product_fee" => "",
												"transport_fee" => "0",
												"time_start" => date( "YmdHis" ),
												"time_expire" => "",
												"buyer_id" => "",
												"goods_tag" => "",
												"trade_mode" => "1",
												"transport_desc" => "",
												"trans_type" => "1",
												"agentid" => "",
												"agent_type" => "",
												"seller_id" => ""
								);
								$R87eb16ecf4 = "";
								ksort( $R23b313f8bb );
								foreach ( $R23b313f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( "" != $Ra3d52e52a4 && "sign" != $Ra09fe38af3 )
												{
																$R87eb16ecf4 .= $Ra09fe38af3."=".$Ra3d52e52a4."&";
												}
								}
								$R87eb16ecf4 .= "key=".$R8dfc9f8ecb;
								$R4b19c1abc4 = strtolower( md5( $R87eb16ecf4 ) );
								$R23b313f8bb['sign'] = $R4b19c1abc4;
								$Rfcb2e2ab50 = "";
								ksort( $R23b313f8bb );
								foreach ( $R23b313f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$Rfcb2e2ab50 .= $Ra09fe38af3."=".urlencode( $Ra3d52e52a4 )."&";
								}
								$Rfcb2e2ab50 = substr( $Rfcb2e2ab50, 0, strlen( $Rfcb2e2ab50 ) - 1 );
								$Rce859e0f54 = "https://gw.tenpay.com/gateway/pay.htm?".$Rfcb2e2ab50;
								$Rffcbbad19d = "<input type='radio' name='ebank' value='tenpayform' onclick='EBankCheck(this)'/><input type='hidden' id='tenpayformamount' value='".$R68eaf33c4e."' />"."<img alt='' src='".UPATH_CONTENT."images/tenpay.gif' align='absMiddle' /><span class='textgray'>(<span class='dollars' id='tenpayformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<form id='tenpayform' method='post' action='".$Rce859e0f54."' target='_blank'>"."<span id='tenpayformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费，同时支持支付宝余额付款。<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function result( )
				{
								$data = array( "paycode" => "tenpay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R4eec2887a4 = array( );
								foreach ( $GLOBALS['_GET'] as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( "m" != $Ra09fe38af3 && "c" != $Ra09fe38af3 && "paycode" != $Ra09fe38af3 && "mean" != $Ra09fe38af3 )
												{
																$R4eec2887a4[$Ra09fe38af3] = $Ra3d52e52a4;
												}
								}
								foreach ( $GLOBALS['_POST'] as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( "m" != $Ra09fe38af3 && "c" != $Ra09fe38af3 && "paycode" != $Ra09fe38af3 && "mean" != $Ra09fe38af3 )
												{
																$R4eec2887a4[$Ra09fe38af3] = $Ra3d52e52a4;
												}
								}
								ksort( $R4eec2887a4 );
								foreach ( $R4eec2887a4 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( "sign" != $Ra09fe38af3 && "" != $Ra3d52e52a4 )
												{
																$R87eb16ecf4 .= $Ra09fe38af3."=".$Ra3d52e52a4."&";
												}
								}
								$R87eb16ecf4 .= "key=".$Rb60574d852['payKey'];
								$R4b19c1abc4 = strtolower( md5( $R87eb16ecf4 ) );
								$R4bc0779815 = strtolower( $R4eec2887a4['sign'] );
								$R4b1b887a63 = getvar( "cmdno" );
								$R8fc1484d27 = getvar( "pay_result" );
								$R6ae9d90f19 = getvar( "pay_info" );
								$R430eda7501 = getvar( "date" );
								$R4e4e36fc7c = getvar( "bargainor_id" );
								$R3edcca1211 = getvar( "transaction_id" );
								$R8690a73eaa = getvar( "sp_billno" );
								$R0aedfdb7e0 = getvar( "total_fee" );
								$R1e98a581b3 = getvar( "fee_type" );
								$R363d503e20 = getvar( "attach" );
								$R43092230b2 = getvar( "trade_state" );
								$R58911e9eca = getvar( "trade_mode" );
								if ( 0 < $R8fc1484d27 )
								{
												return false;
								}
								if ( $R4b19c1abc4 != $R4bc0779815 )
								{
												return false;
								}
								else if ( $R58911e9eca == "2" )
								{
												return false;
								}
								else if ( $R43092230b2 == "0" )
								{
												$R1a054c65c7 = round( doubleval( $R0aedfdb7e0 / 100 ), 2 );
												$R4ee66cfcee = "Y";
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R17214bbd46 = $Rb60574d852['payKey'];
												$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R363d503e20.$R1a054c65c7.$R4ee66cfcee.$R17214bbd46 );
												$this->url = array(
																"BillNo" => $R363d503e20,
																"Amount" => $R1a054c65c7,
																"Succ" => $R4ee66cfcee,
																"Signature" => $Rb90d24d63c,
																"PayWay" => "tenpay",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
								else
								{
												return false;
								}
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "tenpay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R17214bbd46 = $Rb60574d852['payKey'];
								$R1a054c65c7 = getvar( "Amount" );
								$R564cc578e1 = getvar( "BillNo" );
								$R4ee66cfcee = getvar( "Succ" );
								$Rb90d24d63c = getvar( "Signature" );
								if ( $R4ee66cfcee == "N" )
								{
												return false;
								}
								if ( $Rb90d24d63c != md5( $ubzuid.$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R17214bbd46 ) )
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
