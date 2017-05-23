<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class cncard
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
								$R20fd65e9c7 = array( "paycode" => "cncard" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $R20fd65e9c7 );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R4a9bd13f03 = $Rb60574d852['payMerchant'];
								$R9d0d677acd = $Rb60574d852['payKey'];
								$R8c167f6e77 = doubleval( $R07e1b7ba62 * 100 );
								$R68eaf33c4e = round( $R1a054c65c7 + $R1a054c65c7 * $R07e1b7ba62, 3 );
								$R0aedfdb7e0 = doubleval( $R68eaf33c4e );
								$R16b83ea435 = $R68eaf33c4e;
								$R82e3436f8e = "";
								global $R9036dcfc79;
								$R50dffd24ac = $Rdcd9105806;
								$Rcbb1112b5d = "";
								$R4c8324edd5 = "";
								$R32eb206fe9 = "";
								$R2b11fe66a1 = "";
								$Rbd88edef35 = "";
								$Rb85a824c63 = $R68eaf33c4e;
								$Rf6ad6698c9 = date( "Ymd" );
								$R63cd28eedf = "0";
								$R4ad6240ac0 = "1";
								$R63172a3caf = "";
								$R14f46c969b = "http://".$this->GetHost( ).UPATH_WEBROOT."index.php?m=com_payment";
								$R573c0bdb7c = $Rdcd9105806;
								$R00a95f4101 = $R9036dcfc79;
								$R7e67e2342b = $R9d0d677acd;
								$R78e99b01a9 = "1";
								$R9fd76a4bea = "0";
								$R06e69d4f16 = $R4a9bd13f03.$R50dffd24ac.$Rb85a824c63.$Rf6ad6698c9.$R63cd28eedf.$R4ad6240ac0.$R14f46c969b.$R63172a3caf.$R573c0bdb7c.$R00a95f4101.$R78e99b01a9.$R9fd76a4bea.$R7e67e2342b;
								$Rfdd5c48415 = md5( $R06e69d4f16 );
								$R59d4ca4468 = "<input type='radio' name='ebank' value='cncardform' onclick='EBankCheck(this)' /><img alt='' src='".UPATH_CONTENT."images/cncard.gif' align='absMiddle'/><span class='textgray'>(<span class='dollars' id='cncardformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<input type='hidden' id='cncardformamount' value='".$R16b83ea435."' />"."<form  action='https://www.cncard.net/purchase/getorder.asp' method='post' name='cncardform' id='cncardform' target='_blank'>"."<input type='hidden' name='c_mid' value='{$R4a9bd13f03}'/>"."<input type='hidden' name='c_order' value='{$R50dffd24ac}'/>"."<input type='hidden' name='c_name' value='{$Rcbb1112b5d}'/>"."<input type='hidden' name='c_address' value='{$R4c8324edd5}'/>"."<input type='hidden' name='c_tel' value='{$R32eb206fe9}'/>"."<input type='hidden' name='c_post' value='{$R2b11fe66a1}'/>"."<input type='hidden' name='c_email' value='{$Rbd88edef35}'/>"."<input type='hidden' name='c_orderamount' value='{$Rb85a824c63}'/>"."<input type='hidden' name='c_ymd' value='{$Rf6ad6698c9}'/>"."<input type='hidden' name='c_moneytype' value='{$R63cd28eedf}'/>"."<input type='hidden' name='c_retflag' value='{$R4ad6240ac0}'/>"."<input type='hidden' name='c_paygate' value='{$R63172a3caf}'/>"."<input type='hidden' name='c_returl' value='{$R14f46c969b}'/>"."<input type='hidden' name='c_memo1' value='{$R573c0bdb7c}'/>"."<input type='hidden' name='c_memo2' value='{$R00a95f4101}'/>"."<input type='hidden' name='c_language' value='{$R9fd76a4bea}'/>"."<input type='hidden' name='notifytype' value='{$R78e99b01a9}'/>"."<input type='hidden' name='c_signstr' value='{$Rfdd5c48415}'/>"."<span id='cncardformtip' style='display:none'>点击付款后，您将进入网上银行支付页面，选择对应银行即可完成付费。<a href='".UPATH_ROOT."article/1.html'>如何开通网上银行业务?</a></span>"."</form><br />";
								return $R59d4ca4468;
				}

				public function GetHost( )
				{
								if ( empty( $Rcb523a8670 ) )
								{
												if ( $this->PMA_getenv( "HTTP_HOST" ) )
												{
																$Rcb523a8670 = $this->PMA_getenv( "HTTP_HOST" );
												}
												else
												{
																$Rcb523a8670 = "";
												}
								}
								return htmlspecialchars( $Rcb523a8670 );
				}

				public function PMA_getenv( $Ra6ac55afc0 )
				{
								if ( isset( $_SERVER[$Ra6ac55afc0] ) )
								{
												return $_SERVER[$Ra6ac55afc0];
								}
								else if ( isset( $_ENV[$Ra6ac55afc0] ) )
								{
												return $_ENV[$Ra6ac55afc0];
								}
								else if ( getenv( $Ra6ac55afc0 ) )
								{
												return getenv( $Ra6ac55afc0 );
								}
								else if ( function_exists( "apache_getenv" ) && apache_getenv( $Ra6ac55afc0, true ) )
								{
												return apache_getenv( $Ra6ac55afc0, true );
								}
								return "";
				}

				public function result( )
				{
								$data = array( "paycode" => "cncard" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$Rc192f3175e = $Rb60574d852['payMerchant'];
								$R9d0d677acd = $Rb60574d852['payKey'];
								$R4a9bd13f03 = $_REQUEST['c_mid'];
								$R50dffd24ac = $_REQUEST['c_order'];
								$Rb85a824c63 = $_REQUEST['c_orderamount'];
								$Rf6ad6698c9 = $_REQUEST['c_ymd'];
								$R6cb29fd18b = $_REQUEST['c_transnum'];
								$Ra930ba0dc2 = $_REQUEST['c_succmark'];
								$R63cd28eedf = $_REQUEST['c_moneytype'];
								$Rde2d1a84ed = $_REQUEST['c_cause'];
								$R573c0bdb7c = $_REQUEST['c_memo1'];
								$R00a95f4101 = $_REQUEST['c_memo2'];
								$Rfdd5c48415 = $_REQUEST['c_signstr'];
								if ( $R4a9bd13f03 == "" || $R50dffd24ac == "" || $Rb85a824c63 == "" || $Rf6ad6698c9 == "" || $R63cd28eedf == "" || $R6cb29fd18b == "" || $Ra930ba0dc2 == "" || $Rfdd5c48415 == "" )
								{
												return false;
								}
								$R7e67e2342b = $R9d0d677acd;
								$R06e69d4f16 = $R4a9bd13f03.$R50dffd24ac.$Rb85a824c63.$Rf6ad6698c9.$R6cb29fd18b.$Ra930ba0dc2.$R63cd28eedf.$R573c0bdb7c.$R00a95f4101.$R7e67e2342b;
								$R3540cb7926 = md5( $R06e69d4f16 );
								if ( $R3540cb7926 != $Rfdd5c48415 )
								{
												return false;
								}
								$R3adb9e7529 = $Rc192f3175e;
								if ( $R3adb9e7529 != $R4a9bd13f03 )
								{
												return false;
								}
								if ( $Ra930ba0dc2 != "Y" && $Ra930ba0dc2 != "N" )
								{
												return false;
								}
								if ( $Ra930ba0dc2 = "Y" )
								{
												$R4ee66cfcee = "Y";
												$R564cc578e1 = $R50dffd24ac;
												$R1a054c65c7 = $Rb85a824c63;
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R92e69bb035 = $Rb60574d852['payKey'];
												$Rb90d24d63c = md5( $R9a1c862f32['uid'].$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R92e69bb035 );
												$this->url = array(
																"BillNo" => $R564cc578e1,
																"Amount" => $R1a054c65c7,
																"Succ" => $R4ee66cfcee,
																"Signature" => $Rb90d24d63c,
																"PayWay" => "cncard",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
								return false;
				}

				public function respond( $ubzuid )
				{
								$data = array( "paycode" => "cncard" );
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
