<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class adpay
{

				public $url = NULL;

				public function __construct( )
				{
				}

				public function result( )
				{
								if ( !isset( $_SESSION ) )
								{
												factory::getinstance( "session" );
								}
								if ( !isset( $_SESSION['adminname'] ) )
								{
												return false;
								}
								else
								{
												$R452623c02b = getvar( "SelfAmount" );
												$R3be8867a15 = getvar( "SelfBillNo" );
												$R4ee66cfcee = "Y";
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R3db8f5c8bc = $R7bf6de464c->ISysnet_Get( );
												$this->url = array(
																"BillNo" => $R3be8867a15,
																"Amount" => $R452623c02b,
																"Succ" => $R4ee66cfcee,
																"Signature" => md5( $R3db8f5c8bc['uid'].$R3be8867a15.$R452623c02b.$R4ee66cfcee.$R3db8f5c8bc['usign'] ),
																"PayWay" => "adpay",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
				}

				public function respond( $ubzuid )
				{
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								if ( !isset( $_SESSION['adminname'] ) )
								{
												return false;
								}
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R3db8f5c8bc = $R7bf6de464c->ISysnet_Get( );
								$R1a054c65c7 = getvar( "Amount" );
								$R564cc578e1 = getvar( "BillNo" );
								$R4ee66cfcee = getvar( "Succ" );
								$Rb90d24d63c = getvar( "Signature" );
								$Rb419cff4b4 = "adpay";
								if ( $R4ee66cfcee == "N" )
								{
												return false;
								}
								if ( $Rb90d24d63c != md5( $ubzuid.$R564cc578e1.$R1a054c65c7.$R4ee66cfcee.$R3db8f5c8bc['usign'] ) )
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
