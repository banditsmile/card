<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
class OrderController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
				}

				public function GoHome( )
				{
								$this->CloseWin( );
				}

				public function CloseWin( )
				{
								echo "<script type=\"text/javascript\">window.close();</script>";
								exit( );
				}

				public function Index( )
				{
								$Rf70e923790 = getvar( "paycode", "" );
								if ( $Rf70e923790 == "acount" || $Rf70e923790 == "account" )
								{
												$this->Alert( "付款失败！" );
												$this->GoHome( );
								}
								$R3c6281b1da = intval( request( "mean" ) );
								include_once( UPATH_PAY.$Rf70e923790.".php" );
								$Ra570b05d86 = new $Rf70e923790( );
								if ( !$Ra570b05d86->result( ) )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "Pay Failed";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "fail";
																exit( );
												}
												else
												{
																$this->Alert( "付款失败！" );
																$this->GoHome( );
												}
								}
								$url = $Ra570b05d86->url;
								$Rdcd9105806 = $url['BillNo'];
								$this->FundsOrderDeal( $Rdcd9105806, $url );
				}

				public function FundsOrderDeal( $Rdcd9105806, $url = array( ) )
				{
								$R679e9b9234 = array( );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R3c6281b1da = intval( request( "mean" ) );
								$R9b252bf0a7 = $url['Amount'];
								$Rf70e923790 = $url['PayWay'];
								$Rb60574d852 = paymentcode( $Rf70e923790 );
								$Rcbddb47f1c = factory::getinstance( "funds" );
								$data = $Rcbddb47f1c->IFunds_Get( $Rdcd9105806 );
								if ( !isset( $data['ordno'] ) )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "not exist";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "fail";
																exit( );
												}
												else
												{
																$this->Alert( "订单不存在！" );
																$this->GoHome( );
												}
								}
								if ( $data['comefrom'] != 1 )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "not exist";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "fail";
																exit( );
												}
												else
												{
																$this->Alert( "订单不存在！" );
																$this->GoHome( );
												}
								}
								if ( $R9b252bf0a7 < $data['dollars'] )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "money wrong";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "fail";
																exit( );
												}
												else
												{
																$this->Alert( "支付金额不符合！" );
																$this->GoHome( );
												}
								}
								if ( $data['ordstate'] != 0 )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "dealed";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "success";
																exit( );
												}
												else
												{
																$this->Alert( "订单已经处理，请刷新平台查看到帐情况" );
																$this->GoHome( );
												}
								}
								$R9b252bf0a7 = $data['dollars'];
								$R51c716b966 = $this->SetLang( 1 );
								if ( $R3c6281b1da == 0 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
								{
												$R63bede6b19 = "充值成功！本次充值金额为 ".$R9b252bf0a7." ".$R51c716b966['moneyunit'];
												$this->Alert( $R63bede6b19 );
												$this->GoHome( );
								}
								$this->AddFunds( $data['cname'], $data['dollars'], $Rdcd9105806 );
								$R9b252bf0a7 = $data['dollars'];
								$data = array(
												"ordstate" => 2,
												"payment" => $Rb60574d852
								);
								$R808b89ba0e = $Rcbddb47f1c->IFunds_Update( $data, $Rdcd9105806 );
								if ( $R808b89ba0e )
								{
												if ( $Rf70e923790 == "paydollar" )
												{
																echo "OK";
																exit( );
												}
												else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
												{
																echo "success";
																exit( );
												}
												else
												{
																$R63bede6b19 = "充值成功！本次充值金额为 ".$R9b252bf0a7." ".$R51c716b966['moneyunit'];
																$this->Alert( $R63bede6b19 );
																$this->GoHome( );
												}
								}
								else if ( $Rf70e923790 == "paydollar" )
								{
												echo "Failed";
												exit( );
								}
								else if ( $R3c6281b1da == 1 && ( $Rf70e923790 == "alipay" || $Rf70e923790 == "tenpay" ) )
								{
												echo "fail";
												exit( );
								}
								else
								{
												$this->Alert( "订单处理失败，请联系管理员！" );
												$this->GoHome( );
								}
				}

				public function AddFunds( $R45074ab3da, $R9b252bf0a7, $Rdcd9105806 )
				{
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R45074ab3da, "aremain,acsmp,aid" );
								$R2a51483b14 = $agent['aid'];
								$R98bc1630cd = $agent['aremain'] + $R9b252bf0a7;
								$data = array(
												"aremain" => $R98bc1630cd
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $agent['aid'] );
								if ( $R808b89ba0e )
								{
												$R3ab1f9eb35 = $agent['aremain'];
												$Rc0c42883ee = $R98bc1630cd;
												$R808b89ba0e = $this->UpdateTrade( $R2a51483b14, 2, $Rdcd9105806, $R0dc0347d49, $R45074ab3da."账户充值", $R9b252bf0a7, 1, $R9b252bf0a7, 0, $Rc0c42883ee, $R3ab1f9eb35, 0, 0 );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function UpdateTrade( $R2a51483b14, $Ra8b176bf4f, $Rdcd9105806, $R63384ccc42, $R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $Race8252ffc, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Red2b3403a5, $Rd541ac7c24 = 0 )
				{
								$Re82ee9b121 = $R65edce27dd." x ".$R63d0786ecc."(".$R66b0d9d6f1.")";
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"ordno" => $Rdcd9105806,
												"income" => $Race8252ffc,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"qty" => $R66b0d9d6f1,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

}

?>
