<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ack
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
																				$Rd82a3b54a7 = "RollBackMoney_".$R56ea904d53['comefrom'];
																				$this->$Rd82a3b54a7( $R56ea904d53 );
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
								if ( $R56ea904d53['aname'] != "" )
								{
												$this->UpdateRank_1( $R56ea904d53['aname'], $R56ea904d53['dollars'] );
								}
								if ( $R56ea904d53['comefrom'] == 1 )
								{
												$R60144b28c1 = $this->AgentProfit( $R56ea904d53['aname'], $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R56ea904d53['pname'], $R56ea904d53['aid'] );
												$data['agentprofit'] = $R60144b28c1;
												if ( 0 < $R56ea904d53['aid'] )
												{
																$R56ea904d53['agentprofit'] = $R60144b28c1;
																$R2903714d94 = $this->UpdateSup( $R56ea904d53 );
																$data = array_merge( $data, $R2903714d94 );
												}
								}
								else if ( 0 < $R56ea904d53['aid'] )
								{
												$R56ea904d53['agentprofit'] = 0;
												$R2903714d94 = $this->UpdateSup( $R56ea904d53 );
												$data = array_merge( $data, $R2903714d94 );
								}
								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								return 2;
				}

				public function RollBackMoney_2( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R2a51483b14 = $R56ea904d53['cid'];
								$R0dc0347d49 = $R2a51483b14;
								if ( 0 < $R2a51483b14 )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
												$R4f39743f74 = $R56ea904d53['cprice'];
												$R9b252bf0a7 = $R56ea904d53['dollars'];
												$R98bc1630cd = $agent['aremain'] + $R9b252bf0a7;
												$Re90242a509 = $agent['acsmp'] - $R9b252bf0a7;
												$data = array(
																"aremain" => $R98bc1630cd,
																"acsmp" => $Re90242a509
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$this->UpdateRank_1( $agent['aname'], "-".$R9b252bf0a7 );
																$data = array(
																				"ordstate" => -1,
																				"failreason" => "订单失败已经退款至用户账户",
																				"factoryreturn" => $R56ea904d53['failreason'],
																				"rollback" => 1,
																				"dealdate" => date( "Y-m-d H-i-s" )
																);
																$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
																$R3ab1f9eb35 = $agent['aremain'];
																$Rc0c42883ee = $R98bc1630cd;
																$this->UpdateTrade( $R2a51483b14, 1, $R56ea904d53['ordno'], $R0dc0347d49, "(订单失败退款)".$R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], $R9b252bf0a7, 0, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, 0 );
																$R679e9b9234['item'] = array(
																				"acsmp" => $Re90242a509,
																				"aremain" => $R98bc1630cd
																);
																$Rae8a26f24a = factory::getinstance( "trades" );
																$data = array( "state" => -1 );
																$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
																return $R679e9b9234;
												}
												else
												{
																return "账户退款失败";
												}
								}
								else
								{
												$data = array(
																"ordstate" => -1,
																"failreason" => "订单失败，但用户未登录购买，余额无法退回用户帐号，请和系统管理员联系",
																"factoryreturn" => $R56ea904d53['failreason'],
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
								}
				}

				public function RollBackMoney_3( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$Rcc8a91d7c7 = factory::getinstance( "cards" );
								$this->RollYktMoney( $Rdcd9105806 );
								$data = array(
												"ordstate" => -1,
												"failreason" => "订单失败[一卡通未扣款，可以重新使用]",
												"factoryreturn" => "",
												"rollback" => 1,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$this->hander->IOrder_Update( $data, $Rdcd9105806 );
								$Rae8a26f24a = factory::getinstance( "trades" );
								$data = array( "state" => -1 );
								$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
				}

				public function RollYktMoney( $Rdcd9105806 )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$R21ef3485d7 = $Rf541845af3->ICard_GetByTrade( $Rdcd9105806 );
								foreach ( $R21ef3485d7 as $R0f8134fb60 )
								{
												$R72852f08e6 = $R0f8134fb60['money'] + $R0f8134fb60['outcome'];
												$data = array(
																"money" => $R72852f08e6,
																"cardok" => 1
												);
												$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
								}
								$Rae8a26f24a = factory::getinstance( "trades" );
								$data = array( "state" => -1 );
								$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
				}

				public function RollBackMoney_1( $R56ea904d53 )
				{
								$sess = factory::getinstance( "session" );
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R2a51483b14 = $R56ea904d53['cid'];
								if ( $sess->agent != "" )
								{
												$Rcc5c6e696c = $sess->agent;
												$R0dc0347d49 = $Rcc5c6e696c[7];
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$R0dc0347d49 = $Rcc5c6e696c[10];
												}
								}
								else
								{
												$R0dc0347d49 = $R2a51483b14;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
								$R4f39743f74 = $R56ea904d53['cprice'];
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$R98bc1630cd = $agent['aremain'] + $R9b252bf0a7;
								$Re90242a509 = $agent['acsmp'] - $R9b252bf0a7;
								$data = array(
												"aremain" => $R98bc1630cd,
												"acsmp" => $Re90242a509
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->UpdateRank_1( $agent['aname'], "-".$R9b252bf0a7 );
												$data = array(
																"ordstate" => -1,
																"failreason" => "订单失败[已经退款]".$R56ea904d53['failreason'],
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
												$R3ab1f9eb35 = $agent['aremain'];
												$Rc0c42883ee = $R98bc1630cd;
												$this->UpdateTrade( $R2a51483b14, 1, $R56ea904d53['ordno'], $R0dc0347d49, "(订单失败退款)".$R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], $R9b252bf0a7, 0, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, 0 );
												$R679e9b9234['item'] = array(
																"acsmp" => $Re90242a509,
																"aremain" => $R98bc1630cd
												);
												$Rae8a26f24a = factory::getinstance( "trades" );
												$data = array( "state" => -1 );
												$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
												return $R679e9b9234;
								}
								else
								{
												return "账户退款失败";
								}
				}

				public function AgentProfit( $R5d899a20a5, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd = "", $R2e7195340d = 0 )
				{
								$Rbbd82f1834 = new Controller( );
								return $Rbbd82f1834->AgentProfit( $R5d899a20a5, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd );
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
								$this->CreateTrade( $data );
				}

				public function CreateTrade( $data )
				{
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function GetRank1( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function UpdateRank_1( $R5d899a20a5, $R72852f08e6 )
				{
								if ( $R5d899a20a5 == "" )
								{
												return 2;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R5d899a20a5, "acsmp, alv, aid, parentid" );
								$Re90242a509 = $agent['acsmp'];
								$R046b4585a2 = $this->GetRank1( $Re90242a509, "name,id" );
								if ( !isset( $R046b4585a2['id'] ) )
								{
												return 2;
								}
								if ( 0 < $agent['parentid'] )
								{
												$R9aa102385f = $R2097a8fddf->IAgent_GetByName( $agent['parentid'], "alv" );
												$Rbe5b8dea24 = $R9aa102385f['alv'];
												if ( $R046b4585a2['id'] == $Rbe5b8dea24 )
												{
																return 2;
												}
								}
								if ( $agent['alv'] == $R046b4585a2['id'] )
								{
												return 2;
								}
								else
								{
												$data = array(
																"alv" => $R046b4585a2['id']
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $agent['aid'] );
												if ( $R808b89ba0e )
												{
																return 0;
												}
												else
												{
																return 1;
												}
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

				public function UpdateSup( $R56ea904d53 )
				{
								$data = array( );
								if ( 0 < $R56ea904d53['aid'] )
								{
												$R2a51483b14 = $R56ea904d53['aid'];
												$Rdcd9105806 = $R56ea904d53['ordno'];
												$R07e1b7ba62 = $R56ea904d53['fee'];
												$R66b0d9d6f1 = $R56ea904d53['qty'];
												$R0d9f8f778c = $R56ea904d53['cprice'];
												$R9b252bf0a7 = $R56ea904d53['dollars'];
												$R63d0786ecc = $R56ea904d53['price'];
												$Rf7c712f937 = $R9b252bf0a7 * $R07e1b7ba62;
												$Rf7c712f937 = round( $Rf7c712f937, 3 );
												$R60144b28c1 = $R56ea904d53['agentprofit'];
												if ( $R56ea904d53['comefrom'] == 3 )
												{
																$R9b252bf0a7 = $R63d0786ecc + $R56ea904d53['profit'];
												}
												$Rf234dd0e87 = $R9b252bf0a7 - $R60144b28c1 - $Rf7c712f937;
												$Rf234dd0e87 = round( $Rf234dd0e87, 3 );
												$R4c36ab31e8 = $Rf234dd0e87 - $R63d0786ecc * $R66b0d9d6f1;
												$R4c36ab31e8 = round( $R4c36ab31e8, 3 );
												$Race8252ffc = $Rf7c712f937 + $R60144b28c1;
												$R21979e89e0 = $this->GetSupIdea( );
												if ( $R21979e89e0 == 1 )
												{
																$Rf234dd0e87 = $R63d0786ecc * $R66b0d9d6f1;
																$Rf234dd0e87 = round( $Rf234dd0e87, 3 );
																$R4c36ab31e8 = 0;
																$Race8252ffc = $R9b252bf0a7 - $Rf234dd0e87;
												}
												if ( $R9b252bf0a7 < $Rf234dd0e87 || $R60144b28c1 < 0 || $Rf7c712f937 < 0 || $Rf234dd0e87 < 0 || $R63d0786ecc < 0 )
												{
																$Rf234dd0e87 = 0;
																$R07e1b7ba62 = 0;
																$Rf7c712f937 = 0;
																$R4c36ab31e8 = 0;
																$Race8252ffc = 0;
												}
												$data['fee'] = $R07e1b7ba62;
												$data['moneyfee'] = $Rf7c712f937;
												$data['ownermoney'] = $Rf234dd0e87;
												$data['ownerprofit'] = $R4c36ab31e8;
												$data['profit'] = $Race8252ffc;
												$this->AddFunds( $R2a51483b14, $Rf234dd0e87, $Rdcd9105806, $R56ea904d53 );
								}
								return $data;
				}

				public function GetSupIdea( )
				{
								$Rbbd82f1834 = new Controller( );
								$R30b2ab8dc1 = $Rbbd82f1834->GetMainWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 34 < $R30aa8c1852 )
								{
												$R808b89ba0e = intval( $Rcc5c6e696c[34] );
								}
								else
								{
												$R808b89ba0e = 0;
								}
								return $R808b89ba0e;
				}

				public function AddFunds( $R2a51483b14, $R9b252bf0a7, $Rdcd9105806, $R56ea904d53 )
				{
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "funds,aid,aremain" );
								$Rd8fb5ae7df = $agent['funds'] + $R9b252bf0a7;
								$data = array(
												"funds" => $Rd8fb5ae7df
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R65edce27dd = $R56ea904d53['pname'];
												$R66b0d9d6f1 = $R56ea904d53['qty'];
												$R63d0786ecc = round( $R9b252bf0a7 / $R66b0d9d6f1, 3 );
												$this->UpdateTrade( $agent['aid'], 12, $Rdcd9105806, $agent['aid'], "[供货所得]".$R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $R9b252bf0a7, $agent['aid'], $Rd8fb5ae7df, $agent['funds'], 0 );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function CanRollBack( $Rdcd9105806 )
				{
								$Rae8a26f24a = factory::getinstance( "trades" );
								$data = array(
												"state" => -1,
												"ordno" => $Rdcd9105806
								);
								$R3db8f5c8bc = $Rae8a26f24a->ITrade_GetByLimit( $data, "tid" );
								if ( isset( $R3db8f5c8bc['tid'] ) )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function GetPriceById( $Rb3f07f8c36 = array( ), $agent = array( ), $R3a8b307327 = 3 )
				{
								$Rac9b8532b8 = $agent['parentid'];
								$R2a51483b14 = $agent['aid'];
								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
								$R63d0786ecc = $Rb3f07f8c36['price'];
								$R00655fd902 = factory::getinstance( "privateprices" );
								$data = array(
												"aid" => $R2a51483b14,
												"pid" => $Rb3f07f8c36['pid']
								);
								$Rc81d709a1d = $R00655fd902->IPrivatePrice_Get( $data );
								if ( isset( $Rc81d709a1d[0]['price'] ) )
								{
												$R0d9f8f778c = $Rc81d709a1d[0]['price'];
								}
								else
								{
												$R043923fe11 = $agent['alv'];
												$Ra28e508350 = $agent['pricetpl'];
												$Rf00621a200 = factory::getinstance( "priceagent" );
												$data = array(
																"pid" => $Rb3f07f8c36['pid'],
																"pricetpl" => $Ra28e508350
												);
												$Raa4d6c9903 = $Rf00621a200->IPriceAgent_Get( $data );
												if ( isset( $Raa4d6c9903[0]['price'] ) )
												{
																$R0d9f8f778c = $Raa4d6c9903[0]['price'];
												}
												else
												{
																$R5ff3ab27b8 = factory::getinstance( "prices" );
																$data = array(
																				"aid" => $Rac9b8532b8,
																				"pid" => $Rb3f07f8c36['pid']
																);
																$R15a42434e1 = $R5ff3ab27b8->IPrice_Get( $data );
																if ( isset( $R15a42434e1[0]["price_".$R043923fe11] ) )
																{
																				$R0d9f8f778c = $R15a42434e1[0]["price_".$R043923fe11];
																				if ( 0 < $agent['parentid'] )
																				{
																								$R2097a8fddf = factory::getinstance( "agents" );
																								$R39918f251b = $R2097a8fddf->IAgent_Get( $agent['parentid'] );
																								$R63d0786ecc = $this->GetPriceById( $Rb3f07f8c36, $R39918f251b );
																				}
																				else
																				{
																								$R63d0786ecc = $Rb3f07f8c36['price'];
																				}
																				if ( $R0d9f8f778c < $R63d0786ecc || $Red2b3403a5 < $R0d9f8f778c )
																				{
																								$R0d9f8f778c = $Red2b3403a5;
																				}
																				$R0d9f8f778c = round( $R0d9f8f778c, $R3a8b307327 );
																}
																else
																{
																				$R063e6693e5 = factory::getinstance( "ranks" );
																				$R014535cc1a = $Rb3f07f8c36['pricetpl'];
																				$Rfe1d7c1cfa = $R063e6693e5->IRank_GetDiscout( $R043923fe11, 0, $R014535cc1a );
																				$Red2b3403a5 = $Rb3f07f8c36['listprice'];
																				$R63d0786ecc = $Rb3f07f8c36['price'];
																				if ( isset( $Rfe1d7c1cfa['discout'] ) )
																				{
																								$R33403e391b = $Rfe1d7c1cfa['discout'];
																								$R0acfedc1db = $Rfe1d7c1cfa['priceplan'];
																								switch ( $R0acfedc1db )
																								{
																								case 1 :
																												$R0d9f8f778c = $R63d0786ecc + ( $Red2b3403a5 - $R63d0786ecc ) * $R33403e391b;
																												break;
																								case 2 :
																												$R0d9f8f778c = $R63d0786ecc + $R33403e391b;
																												break;
																								case 3 :
																												$R0d9f8f778c = $R63d0786ecc + $Red2b3403a5 * $R33403e391b;
																												break;
																								case 4 :
																												$R0d9f8f778c = $Red2b3403a5 * $R33403e391b;
																												break;
																								default :
																												$R0d9f8f778c = $Red2b3403a5;
																												break;
																								}
																				}
																				else
																				{
																								$R0d9f8f778c = $Red2b3403a5;
																				}
																				if ( 0 < $agent['parentid'] )
																				{
																								$R2097a8fddf = factory::getinstance( "agents" );
																								$R014535cc1a = $Rb3f07f8c36['pricetpl'];
																								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
																								$R39918f251b = $R2097a8fddf->IAgent_Get( $agent['parentid'] );
																								$R63d0786ecc = $this->GetPriceById( $Rb3f07f8c36, $R39918f251b );
																								do
																								{
																												$Rfe1d7c1cfa = $R063e6693e5->IRank_GetDiscout( $R043923fe11, $Rac9b8532b8, $R014535cc1a );
																												if ( isset( $Rfe1d7c1cfa['discout'] ) )
																												{
																																$R33403e391b = $Rfe1d7c1cfa['discout'];
																																$R0acfedc1db = $Rfe1d7c1cfa['priceplan'];
																																switch ( $R0acfedc1db )
																																{
																																case 1 :
																																				$R0d9f8f778c = $R63d0786ecc + ( $Red2b3403a5 - $R63d0786ecc ) * $R33403e391b;
																																				break;
																																case 2 :
																																				$R0d9f8f778c = $R63d0786ecc + $R33403e391b;
																																				break;
																																case 3 :
																																				$R0d9f8f778c = $R63d0786ecc + $Red2b3403a5 * $R33403e391b;
																																				break;
																																case 4 :
																																				$R0d9f8f778c = $Red2b3403a5 * $R33403e391b;
																																				break;
																																default :
																																				$R0d9f8f778c = $Red2b3403a5;
																																				break;
																																}
																																break;
																												}
																												else
																												{
																																if ( $Rac9b8532b8 == 0 )
																																{
																																				break;
																																}
																																$agent = $R2097a8fddf->IAgent_Get( $agent['parentid'] );
																																$R043923fe11 = $agent['alv'];
																																$Rac9b8532b8 = $agent['parentid'];
																												}
																								} while ( 1 );
																								if ( $R0d9f8f778c < $R63d0786ecc || $Red2b3403a5 < $R0d9f8f778c )
																								{
																												$R0d9f8f778c = $Red2b3403a5;
																								}
																				}
																				$R0d9f8f778c = round( $R0d9f8f778c, $R3a8b307327 );
																}
												}
								}
								if ( $R0d9f8f778c < $Rb3f07f8c36['price'] )
								{
												$R0d9f8f778c = $Rb3f07f8c36['listprice'];
								}
								return $R0d9f8f778c;
				}

				public function GetDec( )
				{
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "config" );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 6 < $R30aa8c1852 )
								{
												$R3a8b307327 = $Rcc5c6e696c[6];
								}
								else
								{
												$R3a8b307327 = 3;
								}
								return $R3a8b307327;
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
