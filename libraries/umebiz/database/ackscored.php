<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ackscored
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
				}

				public function iack( $R56ea904d53 = array( ) )
				{
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R66b0d9d6f1 = $R56ea904d53['qty'];
								$R8e8b5578f7 = $R56ea904d53['pid'];
								$R1b69c92460 = $R56ea904d53['ptype'];
								if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 || 99 < $R1b69c92460 )
								{
												$Re643016992 = 1;
												$Rf541845af3 = factory::getinstance( "cards" );
												$R775f79f010 = $Rf541845af3->ICard_Buy( $R66b0d9d6f1, $R8e8b5578f7, false, $Rdcd9105806, $R56ea904d53['czaccount'] );
												if ( 0 < count( $R775f79f010 ) )
												{
																$Re643016992 = -1;
												}
												$R007e8e6d5c = count( $R775f79f010 );
												if ( $R007e8e6d5c < $R66b0d9d6f1 )
												{
																if ( $this->CanRollBack( $Rdcd9105806 ) )
																{
																				$this->RollBackScored( $R56ea904d53 );
																}
																return -1;
												}
												$R026f0167b4 = array( );
												foreach ( $R775f79f010 as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['id'];
												}
												$R3584859062 = implode( ",", $R026f0167b4 );
												$R1b69c92460 = $R56ea904d53['ptype'];
												$data = array(
																"ordno" => $Rdcd9105806,
																"orddate" => date( "Y-m-d H-i-s" )
												);
												if ( $R1b69c92460 < 100 )
												{
																$data['cardok'] = 0;
												}
												$Rf541845af3->ICard_UpdateMany( $data, $R3584859062 );
												$data = array(
																"ordstate" => 2,
																"qtyleft" => 0,
																"sup" => $Re643016992,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
								}
								else
								{
												return 1;
								}
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$Rf3d646c485->IScoredOrder_Update( array( "ordstate" => 2 ), $Rdcd9105806 );
								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								return 2;
				}

				public function RollBackScored( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R61a8cd51a4 = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( !isset( $R61a8cd51a4['scored'] ) )
								{
												return;
								}
								$R2a51483b14 = $R61a8cd51a4['aid'];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
								$R114f28ca48 = $R61a8cd51a4['scored'];
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R114f28ca48;
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"ordstate" => -1,
																"failreason" => "订单失败积分点已经返还用户",
																"factoryreturn" => $R56ea904d53['failreason'],
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $Rdcd9105806 );
												$data = array( "ordstate" => -1 );
												$Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
												$R645c69ff15 = factory::getinstance( "scored" );
												$data = array(
																"ordno" => $Rdcd9105806,
																"pname" => "[订单退款]".$R61a8cd51a4['pname'],
																"qty" => $R61a8cd51a4['qty'],
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R61a8cd51a4['staffid'],
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => -1,
																"method" => $R61a8cd51a4['method']
												);
												$R645c69ff15->IScored_Create( $data );
												$data = array( "state" => -1 );
												$R645c69ff15->IScored_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

				public function AddCard( $Rf2a1bd6527, $R56ea904d53 )
				{
								$R51b4178493 = 0;
								$Rf541845af3 = factory::getinstance( "cards" );
								foreach ( $Rf2a1bd6527['item'] as $R0f8134fb60 )
								{
												$Re559dc39a1 = $R0f8134fb60['cardno'];
												$R37db13e189 = base64_encode( $R0f8134fb60['cardpass'] );
												$data = array(
																"cardnumber" => $Re559dc39a1,
																"cardpwd" => $R37db13e189
												);
												if ( !$Rf541845af3->ICard_IsExist( $data ) )
												{
																$data = array(
																				"cardnumber" => $Re559dc39a1,
																				"cardpwd" => $R37db13e189,
																				"cardok" => 1,
																				"pid" => $R56ea904d53['pid'],
																				"pname" => $R56ea904d53['pname'],
																				"addeddate" => date( "Y-m-d H-i-s" )
																);
																if ( $Rf541845af3->ICard_Create( $data ) )
																{
																				$R51b4178493++;
																}
												}
								}
								return $R51b4178493;
				}

				public function CanRollBack( $Rdcd9105806 )
				{
								$Rf5713aa2cd = factory::getinstance( "scored" );
								$data = array(
												"state" => -1,
												"ordno" => $Rdcd9105806
								);
								$R3db8f5c8bc = $Rf5713aa2cd->IScored_GetByLimit( $data, "id" );
								if ( isset( $R3db8f5c8bc['id'] ) )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
