<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class PaymentController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "payment" );
				}

				public function Index( $Rc5dcb9f365 = array( ) )
				{
								$data = array( "payOpen" => 1 );
								if ( isset( $Rc5dcb9f365['ubzpaycode'] ) )
								{
												$data['paycode'] = $Rc5dcb9f365['ubzpaycode'];
												if ( $Rc5dcb9f365['ubzpaycode'] == "yeepay" )
												{
																$data['other'] = $Rc5dcb9f365['defaultbank'];
												}
												$R93c5cf68df = 1;
												$R25e798d548 = $Rc5dcb9f365['ubzpaycode'];
								}
								else
								{
												$R93c5cf68df = 0;
												$R25e798d548 = "";
								}
								$R3db8f5c8bc = $this->instance->IPayment_Get( $data );
								$R808b89ba0e = "";
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$Rf70e923790 = $R0f8134fb60['paycode'];
												include_once( UPATH_PAY.$Rf70e923790.".php" );
												$Ra570b05d86 = new $Rf70e923790( );
												$Rb60574d852 = array(
																"mechant" => $R0f8134fb60['payMerchant'],
																"sign" => $R0f8134fb60['payKey'],
																"fee" => $R0f8134fb60['payfee'],
																"other" => $R0f8134fb60['other'],
																"returnurl" => $this->ReturnUrl( $Rf70e923790 ),
																"notifyurl" => $this->NotifyUrl( $Rf70e923790 )
												);
												if ( isset( $Rc5dcb9f365['defaultbank'] ) )
												{
																$Rb60574d852['defaultbank'] = $Rc5dcb9f365['defaultbank'];
																$Rb60574d852['quick'] = 1;
												}
												else
												{
																$Rb60574d852['quick'] = 0;
												}
												$R808b89ba0e .= $Ra570b05d86->get_code( $Rc5dcb9f365, $Rb60574d852 );
								}
								$R2b1ad1258b = 1;
								$user = factory::getinstance( "session" );
								$R07cdd73907 = "";
								if ( isset( $Rc5dcb9f365['ubzcname'] ) )
								{
												$R07cdd73907 = $Rc5dcb9f365['ubzcname'];
								}
								if ( $user->user == "" || $R07cdd73907 != "" )
								{
												$R2b1ad1258b = 0;
								}
								$this->Assign( "islogin", $R2b1ad1258b );
								$this->Assign( "retv", $R808b89ba0e );
								$this->Assign( "ordno", $Rc5dcb9f365['ubzordno'] );
								$this->Assign( "dollars", $Rc5dcb9f365['ubzdollars'] );
								$this->Assign( "quick", $R93c5cf68df );
								$this->Assign( "pname", $Rc5dcb9f365['ubzpname'] );
								$this->Assign( "thispaycode", $R25e798d548 );
								$this->Assign( "isautopay", isset( $Rc5dcb9f365['autopay'] ) && $Rc5dcb9f365['autopay'] == 1 ? 1 : 0 );
								header( "Content-type: text/html;charset=utf-8" );
								$this->View( );
				}

				public function ReturnUrl( $Rf70e923790 )
				{
								global $R9036dcfc79;
								if ( $R9036dcfc79 == "mod_b2b" || $R9036dcfc79 == "mod_agent" )
								{
												return "http://".$this->GetHost( ).UPATH_WEBROOT."index.php?m=mod_b2b&c=order&paycode=".$Rf70e923790;
								}
								else if ( $R9036dcfc79 == "mod_user" )
								{
												$Rb79d40053e = "mod_ykt";
												if ( UB_B2C )
												{
																$Rb79d40053e = "mod_b2c";
												}
												return "http://".$this->GetHost( ).UPATH_WEBROOT."index.php?m=".$Rb79d40053e."&c=order&paycode=".$Rf70e923790;
								}
								else
								{
												return "http://".$this->GetHost( ).UPATH_WEBROOT."index.php?m=".$R9036dcfc79."&c=order&paycode=".$Rf70e923790;
								}
				}

				public function NotifyUrl( $Rf70e923790 )
				{
								global $R9036dcfc79;
								if ( $R9036dcfc79 == "mod_b2b" || $R9036dcfc79 == "mod_agent" )
								{
												return "http://".$this->GetHost( ).UPATH_WEBROOT."helper/pay/".$Rf70e923790."_b2b.php";
								}
								else if ( $R9036dcfc79 == "mod_user" )
								{
												$Rb79d40053e = "ykt";
												if ( UB_B2C )
												{
																$Rb79d40053e = "b2c";
												}
												return "http://".$this->GetHost( ).UPATH_WEBROOT."helper/pay/".$Rf70e923790."_".$Rb79d40053e.".php";
								}
								else
								{
												return "http://".$this->GetHost( ).UPATH_WEBROOT."helper/pay/".$Rf70e923790."_b2c.php";
								}
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

}

?>
