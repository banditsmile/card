<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class yeepay
{

				public $instance = NULL;
				public $url = NULL;

				public function __construct( )
				{
								$this->instance = $this->service = factory::getinstance( "payment" );
				}

				public function get_code( $R56ea904d53, $Rb60574d852 )
				{
								$Rdcd9105806 = $R56ea904d53['ubzordno'];
								$R1a054c65c7 = $R56ea904d53['ubzdollars'];
								$Re42bde3c42 = $R56ea904d53['ubzpname'];
								$Re74add2192 = $Rb60574d852['returnurl'];
								$R6d243f540c = $Rb60574d852['mechant'];
								$R1288ba3d36 = $Rb60574d852['returnurl'];
								$R07e1b7ba62 = $Rb60574d852['fee'];
								$R97c1115009 = $Rb60574d852['other'];
								$R20fd65e9c7 = array( "paycode" => "yeepay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $R20fd65e9c7 );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Rf0a500d42b = $Rb60574d852['payMerchant'];
								$R9d0d677acd = $Rb60574d852['payKey'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 3 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$R16b83ea435 = $R68eaf33c4e;
								$R82e3436f8e = "";
								$Rff68bc88dc = $Rdcd9105806;
								$R4854d0b826 = $R68eaf33c4e;
								$R9c5854a9db = "CNY";
								$R94caa68fc0 = $Re42bde3c42;
								$R178e7ed078 = $Re42bde3c42;
								$R8aa50d8bcf = $Re42bde3c42;
								$Rb38f64ad8d = $Re74add2192;
								$Rc18530e669 = $Rdcd9105806;
								$Ref40cab171 = $R97c1115009;
								$Rf6880ff34d = 0;
								$R2f33bdef32 = "Buy";
								$R22c746f676 = "0";
								$R26ce881b03 = "";
								$R26ce881b03 .= $R2f33bdef32;
								$R26ce881b03 .= $Rf0a500d42b;
								$R26ce881b03 .= $Rff68bc88dc;
								$R26ce881b03 .= $R4854d0b826;
								$R26ce881b03 .= $R9c5854a9db;
								$R26ce881b03 .= $R94caa68fc0;
								$R26ce881b03 .= $R178e7ed078;
								$R26ce881b03 .= $R8aa50d8bcf;
								$R26ce881b03 .= $Rb38f64ad8d;
								$R26ce881b03 .= $R22c746f676;
								$R26ce881b03 .= $Rc18530e669;
								$R26ce881b03 .= $Ref40cab171;
								$R26ce881b03 .= $Rf6880ff34d;
								$Rf2985c73f8 = $this->HmacMd5( $R26ce881b03, $R9d0d677acd );
								switch ( $Ref40cab171 )
								{
								case "QQCARD-NET" :
												$R3995fedcc3 = "Q币卡支付";
												break;
								case "JUNNET-NET" :
												$R3995fedcc3 = "骏网一卡通支付";
												break;
								case "SNDACARD-NET" :
												$R3995fedcc3 = "盛大卡支付";
												break;
								case "SZX-NET" :
												$R3995fedcc3 = "神州行支付";
												break;
								case "ZHENGTU-NET" :
												$R3995fedcc3 = "征途卡支付";
												break;
								case "UNICOM-NET" :
												$R3995fedcc3 = "联通卡支付";
												break;
								case "LIANHUAOKCARD-NET" :
												$R3995fedcc3 = "联华OK卡支付";
												break;
								case "YPCARD-NET" :
												$R3995fedcc3 = "易宝一卡通支付";
												break;
								default :
												$R3995fedcc3 = "其它游戏卡支付";
												break;
								}
								$R3f243e1344 = "本网关是使用<font color=\"#ff0000\">".$R3995fedcc3."</font>，点击付款按钮后您将进入支付页面，您只需要填写好需要支付的卡号密码即可完成购买";
								if ( $Ref40cab171 == "" )
								{
												$R3995fedcc3 = "易宝支付";
												$R3f243e1344 = "点击付款后，您将进入网上银行/游戏卡/电话卡支付页面，选择对应银行/游戏卡/电话卡即可完成付费。<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a>";
								}
								$R59d4ca4468 = "<input type='radio' name='ebank' value='yeepay".$Ref40cab171."form' onclick='EBankCheck(this)' />".$R3995fedcc3."<span class='textgray'>(<span class='dollars' id='yeepay".$Ref40cab171."formfee'>".$R8c167f6e77."%</span>手续费)</span>"."<input type='hidden' id='yeepay".$Ref40cab171."formamount' value='".$R16b83ea435."' />"."<form  action='https://www.yeepay.com/app-merchant-proxy/node' method='post' id='yeepayform' target='_blank'>"."<input type='hidden' name='p0_Cmd'\t\t\t\t\tvalue='{$R2f33bdef32}'/>"."<input type='hidden' name='p1_MerId'\t\t\t\tvalue='{$Rf0a500d42b}'/>"."<input type='hidden' name='p2_Order'\t\t\t\tvalue='{$Rff68bc88dc}'/>"."<input type='hidden' name='p3_Amt'\t\t\t\t\tvalue='{$R4854d0b826}'/>"."<input type='hidden' name='p4_Cur'\t\t\t\t\tvalue='{$R9c5854a9db}'/>"."<input type='hidden' name='p5_Pid'\t\t\t\t\tvalue='{$R94caa68fc0}'/>"."<input type='hidden' name='p6_Pcat'\t\t\t\tvalue='{$R178e7ed078}'/>"."<input type='hidden' name='p7_Pdesc'\t\t\t\tvalue='{$R8aa50d8bcf}'/>"."<input type='hidden' name='p8_Url'\t\t\t\t\tvalue='{$Rb38f64ad8d}'/>"."<input type='hidden' name='p9_SAF'\t\t\t\t\tvalue='{$R22c746f676}'/>"."<input type='hidden' name='pa_MP'\t\t\t\t\tvalue='{$Rc18530e669}'/>"."<input type='hidden' name='pd_FrpId'\t\t\t\tvalue='{$Ref40cab171}'/>"."<input type='hidden' name='pr_NeedResponse' value='{$Rf6880ff34d}'/>"."<input type='hidden' name='hmac'\t\t\t\t\t\tvalue='{$Rf2985c73f8}'/>"."<span id='yeepay".$Ref40cab171."formtip' style='display:none'>".$R3f243e1344."</span>"."</form><p></p>";
								return $R59d4ca4468;
				}

				public function result( )
				{
								$data = array( "paycode" => "yeepay" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Rf0a500d42b = $Rb60574d852['payMerchant'];
								$R9d0d677acd = $Rb60574d852['payKey'];
								$R2820143230 = $_REQUEST['r0_Cmd'];
								$Rb8b2652a24 = $_REQUEST['r1_Code'];
								$R5a678edf8c = $_REQUEST['r2_TrxId'];
								$R98b3461ea5 = $_REQUEST['r3_Amt'];
								$R32e27c753b = $_REQUEST['r4_Cur'];
								$R54fc9c5142 = $_REQUEST['r5_Pid'];
								$Rbf3ee42425 = $_REQUEST['r6_Order'];
								$Rf56651940f = $_REQUEST['r7_Uid'];
								$R4c0274a7f5 = $_REQUEST['r8_MP'];
								$Ra07252efd8 = $_REQUEST['r9_BType'];
								$Rf2985c73f8 = $_REQUEST['hmac'];
								$Rdcd9105806 = $Rbf3ee42425;
								$R26ce881b03 = "";
								$R26ce881b03 .= $Rf0a500d42b;
								$R26ce881b03 .= $R2820143230;
								$R26ce881b03 .= $Rb8b2652a24;
								$R26ce881b03 .= $R5a678edf8c;
								$R26ce881b03 .= $R98b3461ea5;
								$R26ce881b03 .= $R32e27c753b;
								$R26ce881b03 .= $R54fc9c5142;
								$R26ce881b03 .= $Rbf3ee42425;
								$R26ce881b03 .= $Rf56651940f;
								$R26ce881b03 .= $R4c0274a7f5;
								$R26ce881b03 .= $Ra07252efd8;
								if ( $Rf2985c73f8 == $this->HmacMd5( $R26ce881b03, $R9d0d677acd ) )
								{
												$Rcad9a4e9d8 = true;
								}
								else
								{
												$Rcad9a4e9d8 = false;
								}
								if ( $Rcad9a4e9d8 )
								{
												if ( $Rb8b2652a24 == "1" )
												{
																if ( $Ra07252efd8 == "1" )
																{
																				$R4ee66cfcee = "Y";
																				$R564cc578e1 = $Rbf3ee42425;
																				$R1a054c65c7 = $R98b3461ea5;
																				$R7bf6de464c = factory::getinstance( "sysnet" );
																				$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																				$R92e69bb035 = $Rb60574d852['payKey'];
																				$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
																				$this->url = array(
																								"BillNo" => $R564cc578e1,
																								"Amount" => $R1a054c65c7,
																								"Succ" => $R4ee66cfcee,
																								"Signature" => $Rb90d24d63c,
																								"PayWay" => "yeepay",
																								"BuyerIP" => $_SERVER['REMOTE_ADDR']
																				);
																				return true;
																}
																else
																{
																				return true;
																}
												}
								}
								else
								{
												return false;
								}
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "yeepay" );
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

				public function HmacMd5( $data, $Rf413f06aeb )
				{
								$Rf413f06aeb = iconv( "GB2312", "UTF-8", $Rf413f06aeb );
								$data = iconv( "GB2312", "UTF-8", $data );
								$Rda3e61414e = 64;
								if ( $Rda3e61414e < strlen( $Rf413f06aeb ) )
								{
												$Rf413f06aeb = pack( "H*", md5( $Rf413f06aeb ) );
								}
								$Rf413f06aeb = str_pad( $Rf413f06aeb, $Rda3e61414e, chr( 0 ) );
								$R18f06d9e15 = str_pad( "", $Rda3e61414e, chr( 54 ) );
								$Rcdefc34c17 = str_pad( "", $Rda3e61414e, chr( 92 ) );
								$R4aaa0107f7 = $Rf413f06aeb ^ $R18f06d9e15;
								$R248501294a = $Rf413f06aeb ^ $Rcdefc34c17;
								return md5( $R248501294a.pack( "H*", md5( $R4aaa0107f7.$data ) ) );
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
