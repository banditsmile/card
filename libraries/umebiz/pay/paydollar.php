<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class paydollar
{

				public $instance = NULL;
				public $url = NULL;

				public function __construct( )
				{
								$this->instance = $this->service = factory::getinstance( "payment" );
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
								$R7eee3c7802 = $R8194d44aff;
								$R9f36279810 = $R564cc578e1;
								$Re5d4546412 = "344";
								$R68eaf33c4e = $R0aedfdb7e0;
								$R4f5729c165 = "N";
								$Rde4b1e384b = "NIL";
								$R5b19bdd61f = "ALL";
								$R51c716b966 = "E";
								$Rc851599142 = "";
								$Rb8c4d23715 = "";
								$Rb38dcce5b6 = "";
								$R9f5575e717 = $Re42bde3c42;
								$Rc91035fd85 = "";
								$R905d7430da = "";
								$R2340fc06ed = "";
								$R33ec617656 = $R8dfc9f8ecb;
								$R9f36878d5c = new SHAPaydollarSecure( );
								$R1bbdd1e529 = $R9f36878d5c->generatePaymentSecureHash( $R7eee3c7802, $R9f36279810, $Re5d4546412, $R68eaf33c4e, $R4f5729c165, $R33ec617656 );
								$Rffcbbad19d = "<input type='radio' name='ebank' value='paydollarform' onclick='EBankCheck(this)' /><img alt='' src='".UPATH_CONTENT."images/paydollar.gif' align='absMiddle'/><span class='textgray'>(<span class='dollars' id='paydollarformfee'>".$R8c167f6e77."%</span>手续费)</span>"."<input type='hidden' id='paydollarformamount' value='".$R68eaf33c4e."' />"."<form name='paydollarform' method='post' id='paydollarform' action='https://www.paydollar.com/b2c2/eng/payment/payForm.jsp' target='_blank'>"."<input type='hidden' name='merchantId' value='".$R7eee3c7802."'/>"."<input type='hidden' name='amount' value='".$R68eaf33c4e."' />"."<input type='hidden' name='orderRef' value='".$R9f36279810."'/>"."<input type='hidden' name='currCode' value='".$Re5d4546412."' />"."<input type='hidden' name='successUrl' value='".$Rc851599142."'/>"."<input type='hidden' name='failUrl' value='".$Rb8c4d23715."'/>"."<input type='hidden' name='cancelUrl' value='".$Rb38dcce5b6."'/>"."<input type='hidden' name='payType' value='".$R4f5729c165."'/>"."<input type='hidden' name='lang' value='".$R51c716b966."'/>"."<input type='hidden' name='mpsMode' value='".$Rde4b1e384b."'/>"."<input type='hidden' name='payMethod' value='".$R5b19bdd61f."'/>"."<input type='hidden' name='secureHash' value='".$R1bbdd1e529."'/>"."<input type='hidden' name='remark' value='".$R9f5575e717."'/>"."<input type='hidden' name='redirect' value='".$Rc91035fd85."'/>"."<input type='hidden' name='oriCountry' value='".$R905d7430da."'/>"."<input type='hidden' name='destCountry' value='".$R2340fc06ed."'/>"."<span id='paydollarformtip' style='display:none'>点击付款后，您将进入网上银行支付页面</span>"."</form>"."<p></p>";
								return $Rffcbbad19d;
				}

				public function result( )
				{
								$data = array( "paycode" => "paydollar" );
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$Rb60574d852 = $R3db8f5c8bc[0];
								$R8518fd4bc0 = getvar( "src" );
								$R92c6d7fb7f = getvar( "prc" );
								$R0edb56838d = getvar( "successcode" );
								$Rf134fa1665 = getvar( "Ref" );
								$Rf60abc1fe0 = getvar( "PayRef" );
								$R62556b419d = getvar( "Amt" );
								$R6be6bf153c = getvar( "Cur" );
								$R090027c525 = getvar( "payerAuth" );
								$Rf9e0eaad34 = getvar( "Ord" );
								$Rc0d75ea82f = getvar( "Holder" );
								$R9f5575e717 = getvar( "remark" );
								$Rd973bb339a = getvar( "AuthId" );
								$R0c9e0d0986 = getvar( "eci" );
								$Rc2b9793ef0 = getvar( "sourceIp" );
								$Re11444a14d = getvar( "ipCountry" );
								$Rebf990ccbb = getvar( "mpsAmt" );
								$R8375068258 = getvar( "mpsCur" );
								$Ra02645f8dc = getvar( "mpsForeignAmt" );
								$Re9adf031db = getvar( "mpsForeignCur" );
								$R2f1087df56 = getvar( "mpsRate" );
								$R2d7f65f9fc = getvar( "cardlssuingCountry" );
								$R5b19bdd61f = getvar( "payMethod" );
								$R1bbdd1e529 = getvar( "secureHash" );
								$R33ec617656 = $Rb60574d852['payKey'];
								$R935ab4397a = false;
								if ( $R935ab4397a )
								{
												$R1195a8f62e = explode( ",", $R1bbdd1e529 );
												$R9f36878d5c = new SHAPaydollarSecure( );
												$Rf7450c24df = false;
												while ( list( $Rf413f06aeb, $value ) = each( $R1195a8f62e ) )
												{
																$Rf7450c24df = $R9f36878d5c->verifyPaymentDatafeed( $R8518fd4bc0, $R92c6d7fb7f, $R0edb56838d, $Rf134fa1665, $Rf60abc1fe0, $R6be6bf153c, $R62556b419d, $R090027c525, $R33ec617656, $value );
																if ( $Rf7450c24df )
																{
																				break;
																}
												}
												if ( !$Rf7450c24df )
												{
																return false;
												}
								}
								else
								{
												$Ra2b5d97c77 = "203.98.136.";
												$R9cfb7c6d6b = $this->GetIp( );
												$R71d9e5261f = false;
												
												for ( $Ra16d228039 = 1;$Ra16d228039 < 31;	$Ra16d228039++	)
												{
																$R98b899cd2e = $Ra2b5d97c77.$Ra16d228039;
																if ( $R9cfb7c6d6b == $R98b899cd2e )
																{
																				$R71d9e5261f = true;
																				break;
																}
												}
												if ( !$R71d9e5261f )
												{
																echo "ip err";
																exit( );
												}
								}
								if ( "0" == $R0edb56838d )
								{
												$R1a054c65c7 = doubleval( $R62556b419d );
												$R4ee66cfcee = "Y";
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R4b19c1abc4 = $Rb60574d852['payKey'];
												$Rdcd9105806 = getvar( "Ref" );
												$Rb90d24d63c = md5( $R9a1c862f32['uid'].$Rdcd9105806.$R1a054c65c7.$R4ee66cfcee.$R4b19c1abc4 );
												$this->url = array(
																"BillNo" => $Rdcd9105806,
																"Amount" => $R1a054c65c7,
																"Succ" => $R4ee66cfcee,
																"Signature" => $Rb90d24d63c,
																"PayWay" => "paydollar",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
								else
								{
												return false;
								}
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

}

class SHAPaydollarSecure
{

				public function generatePaymentSecureHash( $R7eee3c7802, $Rf31097265d, $Rfe8bbb7dcb, $R68eaf33c4e, $R4f5729c165, $R33ec617656 )
				{
								$buffer = $R7eee3c7802."|".$Rf31097265d."|".$Rfe8bbb7dcb."|".$R68eaf33c4e."|".$R4f5729c165."|".$R33ec617656;
								return sha1( $buffer );
				}

				public function verifyPaymentDatafeed( $R8518fd4bc0, $R92c6d7fb7f, $R204f9798a3, $Rf31097265d, $Rf21834d1bb, $Rfe8bbb7dcb, $R68eaf33c4e, $R692b1b4909, $R33ec617656, $R1bbdd1e529 )
				{
								$buffer = $R8518fd4bc0."|".$R92c6d7fb7f."|".$R204f9798a3."|".$Rf31097265d."|".$Rf21834d1bb."|".$Rfe8bbb7dcb."|".$R68eaf33c4e."|".$R692b1b4909."|".$R33ec617656;
								$R38d34ecabb = sha1( $buffer );
								if ( $R1bbdd1e529 == $R38d34ecabb )
								{
												return true;
								}
								return false;
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
