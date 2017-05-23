<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class chinabank
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
								$R20fd65e9c7 = array( "paycode" => "chinabank" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $R20fd65e9c7 );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Re5e14af5c9 = $data['returnurl'];
								$R8194d44aff = $Rb60574d852['payMerchant'];
								$R8dfc9f8ecb = $Rb60574d852['payKey'];
								$R07e1b7ba62 = $Rb60574d852['payfee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$R123634197c = $R8194d44aff;
								$R2aa253e72c = $Re5e14af5c9;
								$Rf413f06aeb = $R8dfc9f8ecb;
								$R0aee1a2708 = $R564cc578e1;
								$R16b83ea435 = $R68eaf33c4e;
								$R16b83ea435 = str_replace( ",", "", $R16b83ea435 );
								$Rf4bb2490ab = "CNY";
								$R3f243e1344 = $R16b83ea435.$Rf4bb2490ab.$R0aee1a2708.$R123634197c.$R2aa253e72c.$Rf413f06aeb;
								$R804094c80b = strtoupper( trim( md5( $R3f243e1344 ) ) );
								$R026f0167b4 = array( );
								$Rffcbbad19d = "<input type='hidden' id='chinabankformamount' value='".$R16b83ea435."' />"."<form action='https://pay3.chinabank.com.cn/PayGate?encoding=utf-8' method='POST' name='chinabankform' id='chinabankform'>"."<input type='hidden' name='v_md5info'    value='".$R804094c80b."' size='100'>"."<input type='hidden' name='v_mid'        value='".$R123634197c."'>"."<input type='hidden' name='v_oid'        value='".$R0aee1a2708."'>"."<input type='hidden' name='v_amount'     value='".$R16b83ea435."'>"."<input type='hidden' name='v_moneytype'  value='".$Rf4bb2490ab."'>"."<input type='hidden' name='v_url'        value='".$R2aa253e72c."'>"."<span id='chinabankformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费，<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function get_code( $R56ea904d53, $Rb60574d852 )
				{
								$R564cc578e1 = $R56ea904d53['ubzordno'];
								$Re42bde3c42 = $R56ea904d53['ubzpname'];
								$R1a054c65c7 = $R56ea904d53['ubzdollars'];
								$Re5e14af5c9 = $Rb60574d852['returnurl'];
								$R8194d44aff = $Rb60574d852['mechant'];
								$R8dfc9f8ecb = $Rb60574d852['sign'];
								$R07e1b7ba62 = $Rb60574d852['fee'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 2 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$R123634197c = $R8194d44aff;
								$R2aa253e72c = $Re5e14af5c9;
								$Rf413f06aeb = $R8dfc9f8ecb;
								$R0aee1a2708 = $R564cc578e1;
								$R16b83ea435 = $R68eaf33c4e;
								$R16b83ea435 = str_replace( ",", "", $R16b83ea435 );
								$Rf4bb2490ab = "CNY";
								$R3f243e1344 = $R16b83ea435.$Rf4bb2490ab.$R0aee1a2708.$R123634197c.$R2aa253e72c.$Rf413f06aeb;
								$R804094c80b = strtoupper( trim( md5( $R3f243e1344 ) ) );
								$Rffcbbad19d = "<input type='radio' name='ebank' value='chinabankform' onclick='EBankCheck(this)' /><img alt='' src='".UPATH_CONTENT."images/chinabank.gif' align='absMiddle'/><span class='textgray'>(<span class='dollars' id='chinabankformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<input type='hidden' id='chinabankformamount' value='".$R16b83ea435."' />"."<form action='https://pay3.chinabank.com.cn/PayGate?encoding=utf-8' method='POST' name='chinabankform' id='chinabankform' target='_blank'>"."<input type='hidden' name='v_md5info'    value='".$R804094c80b."' size='100'>"."<input type='hidden' name='v_mid'        value='".$R123634197c."'>"."<input type='hidden' name='v_oid'        value='".$R0aee1a2708."'>"."<input type='hidden' name='v_amount'     value='".$R16b83ea435."'>"."<input type='hidden' name='v_moneytype'  value='".$Rf4bb2490ab."'>"."<input type='hidden' name='v_url'        value='".$R2aa253e72c."'>"."<span id='chinabankformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费，<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a></span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function result( )
				{
								$R0aee1a2708 = trim( $_POST['v_oid'] );
								$R250805ceab = trim( $_POST['v_pmode'] );
								$R90c81a578a = trim( $_POST['v_pstatus'] );
								$R6845667cce = trim( $_POST['v_pstring'] );
								$R16b83ea435 = trim( $_POST['v_amount'] );
								$Rf4bb2490ab = trim( $_POST['v_moneytype'] );
								$R2e3d7322cd = trim( $_POST['remark1'] );
								$R253d88a188 = trim( $_POST['remark2'] );
								$Re725642d7f = trim( $_POST['v_md5str'] );
								if ( $Re725642d7f == "" )
								{
												return false;
								}
								$data = array( "paycode" => "chinabank" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Rf413f06aeb = $Rb60574d852['payKey'];
								$R8f3fd23b4c = strtoupper( md5( $R0aee1a2708.$R90c81a578a.$R16b83ea435.$Rf4bb2490ab.$Rf413f06aeb ) );
								if ( $Re725642d7f == $R8f3fd23b4c )
								{
												if ( $R90c81a578a == "20" )
												{
																$R4ee66cfcee = "Y";
																$R564cc578e1 = $R0aee1a2708;
																$R1a054c65c7 = $R16b83ea435;
																$R7bf6de464c = factory::getinstance( "sysnet" );
																$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																$R92e69bb035 = $Rb60574d852['payKey'];
																$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
																$this->url = array(
																				"BillNo" => $R564cc578e1,
																				"Amount" => $R1a054c65c7,
																				"Succ" => $R4ee66cfcee,
																				"Signature" => $Rb90d24d63c,
																				"PayWay" => "chinabank",
																				"BuyerIP" => $_SERVER['REMOTE_ADDR']
																);
																return true;
												}
								}
								else
								{
												return false;
								}
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "chinabank" );
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
