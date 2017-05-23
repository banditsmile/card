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
				public $R92d31dee73 = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
								$this->canroll = 0;
				}

				public function iack( $R56ea904d53 = array( ), $R4b19c1abc4 )
				{
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$R66b0d9d6f1 = $R56ea904d53['qty'];
								$R8e8b5578f7 = $R56ea904d53['pid'];
								$data = array(
												"ubzusign" => $R4b19c1abc4,
												"ubzdollars" => doubleval( $R9b252bf0a7 ),
												"ubzordno" => $Rdcd9105806,
												"ubzcip" => $_SERVER['REMOTE_ADDR'],
												"ubzpaytype" => "ykt"
								);
								$R920143e856 = factory::getservice( "sorders" );
								$Rbf14a97cca = $R920143e856->IOrder_DealForYkt( $data );
								if ( !isset( $Rbf14a97cca['err']['errcode'] ) )
								{
												return 1;
								}
								$R1b69c92460 = $R56ea904d53['ptype'];
								$R1b33f70f78 = $Rbf14a97cca['err']['errcode'];
								if ( 5 < strlen( $R1b33f70f78 ) || $R1b33f70f78 === "" )
								{
												return 1;
								}
								$R1b33f70f78 = intval( $R1b33f70f78 );
								if ( $R1b33f70f78 == 44 )
								{
												$this->canroll = 1;
								}
								if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 || 99 < $R1b69c92460 )
								{
												$Re643016992 = 1;
												$Rf541845af3 = factory::getinstance( "cards" );
												if ( $R1b33f70f78 == 0 )
												{
																$this->AddCard( $Rbf14a97cca, $R56ea904d53 );
																$R775f79f010 = $Rf541845af3->ICard_Buy( $R66b0d9d6f1, $R8e8b5578f7, true, $Rdcd9105806, $R56ea904d53['czaccount'] );
																$Re643016992 = 1;
																$R007e8e6d5c = count( $R775f79f010 );
																if ( 0 < $R007e8e6d5c && $R007e8e6d5c < $R66b0d9d6f1 )
																{
																				return 1;
																}
												}
												else if ( $R1b33f70f78 == 18 )
												{
																return 1;
												}
												else
												{
																$R56ea904d53['failreason'] = $Rbf14a97cca['err']['content'];
																$R56ea904d53['factoryreturn'] = $Rbf14a97cca['err']['content'];
																$R775f79f010 = $Rf541845af3->ICard_Buy( $R66b0d9d6f1, $R8e8b5578f7, false, $Rdcd9105806 );
																if ( 0 < count( $R775f79f010 ) )
																{
																				$Re643016992 = -1;
																}
												}
												$R007e8e6d5c = count( $R775f79f010 );
												if ( $R007e8e6d5c < $R66b0d9d6f1 )
												{
																if ( $this->CanRollBack( $Rdcd9105806 ) && $this->canroll == 1 )
																{
																				$Rd82a3b54a7 = "RollBackMoney_".$R56ea904d53['comefrom'];
																				$this->$Rd82a3b54a7( $R56ea904d53 );
																}
																if ( $this->canroll == 1 )
																{
																				return -1;
																}
																else
																{
																				return 0;
																}
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
								else if ( $R1b33f70f78 == 0 )
								{
												$data = array(
																"ordstate" => 2,
																"sup" => 1,
																"dealdate" => date( "Y-m-d H-i-s" ),
																"factoryreturn" => "自动充值完成充值"
												);
								}
								else if ( $R1b33f70f78 == 18 )
								{
												return 1;
								}
								else
								{
												$R56ea904d53['failreason'] = $Rbf14a97cca['err']['content'];
												$R56ea904d53['factoryreturn'] = $Rbf14a97cca['err']['content'];
												if ( $this->CanRollBack( $Rdcd9105806 ) && $this->canroll == 1 )
												{
																$Rd82a3b54a7 = "RollBackMoney_".$R56ea904d53['comefrom'];
																$this->$Rd82a3b54a7( $R56ea904d53 );
												}
												if ( $this->canroll == 1 )
												{
																return -1;
												}
												else
												{
																return 0;
												}
								}
								if ( $R56ea904d53['aname'] != "" )
								{
												$this->UpdateRank_1( $R56ea904d53['aname'], $R56ea904d53['dollars'] );
								}
								if ( $R56ea904d53['comefrom'] == 1 )
								{
												$R60144b28c1 = $this->AgentProfit( $R56ea904d53['aname'], $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R56ea904d53['pname'] );
												$data['agentprofit'] = $R60144b28c1;
								}
								if ( $R56ea904d53['comefrom'] == 1 || $R56ea904d53['comefrom'] == 2 )
								{
												$this->AgentScored( $R56ea904d53 );
								}
								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								if ( $R56ea904d53['comefrom'] == 4 )
								{
												$this->UpdateCP( $Rdcd9105806 );
								}
								return 2;
				}

				public function AgentScored( $R56ea904d53 )
				{
								$R88f9731c8f = $R56ea904d53['scored'];
								if ( 0 < $R88f9731c8f && $R56ea904d53['aid'] != $R56ea904d53['cid'] && 0 < $R56ea904d53['cid'] )
								{
												$R2a51483b14 = $R56ea904d53['cid'];
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored,aname" );
												$Re6dea2fc8d = $agent['scored'];
												$R386bfdf511 = $Re6dea2fc8d + $R56ea904d53['scored'];
												$data = array(
																"scored" => $R386bfdf511
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																if ( $agent['aname'] == $R56ea904d53['cname'] )
																{
																				$R94e0136c8a = 0;
																}
																else
																{
																				$R5f84c47438 = factory::getinstance( "staffs" );
																				$Raac42e4217 = $Rd618f5da92->IStaff_GetByName( $R56ea904d53['cname'], "staffid" );
																				if ( !isset( $Raac42e4217['staffid'] ) )
																				{
																								$R94e0136c8a = 0;
																				}
																				else
																				{
																								$R94e0136c8a = $Raac42e4217['staffid'];
																				}
																}
																$data = array(
																				"ordno" => $R56ea904d53['ordno'],
																				"pname" => $R56ea904d53['pname'],
																				"qty" => $R56ea904d53['qty'],
																				"scored" => $R56ea904d53['scored'],
																				"fat" => $R386bfdf511,
																				"fbt" => $Re6dea2fc8d,
																				"aid" => $R2a51483b14,
																				"staffid" => $R94e0136c8a,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"state" => 5,
																				"method" => 3
																);
																$R645c69ff15 = factory::getinstance( "scored" );
																$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												}
								}
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
												$R422f9a4efb = factory::getinstance( "products" );
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
																$R808b89ba0e = $this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
																if ( !$R808b89ba0e )
																{
																				$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
																}
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

				public function RollBackMoney_4( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$Rf541845af3 = factory::getinstance( "cards" );
								$data = array(
												"ordstate" => -1,
												"failreason" => "订单失败[所有卡密失效]",
												"rollback" => 0,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								if ( !$R808b89ba0e )
								{
												$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
								}
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806, "others" );
								if ( isset( $R3db8f5c8bc['others'] ) && $R3db8f5c8bc['others'] != "" && $R3db8f5c8bc['others'] != null )
								{
												$data = array( "money" => 0, "cardok" => 4 );
												$Rf541845af3->ICard_UpdateByStr( $data, "ordno='".$R3db8f5c8bc['others']."'" );
								}
				}

				public function RollBackMoney_3( $R56ea904d53 )
				{
								$Rdcd9105806 = $R56ea904d53['ordno'];
								$Rcc8a91d7c7 = factory::getinstance( "cards" );
								$this->RollYktMoney( $Rdcd9105806 );
								$data = array(
												"ordstate" => -1,
												"failreason" => "订单失败[一卡通未扣款，可以重新使用] ",
												"factoryreturn" => $R56ea904d53['failreason'],
												"rollback" => 1,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								if ( !$R808b89ba0e )
								{
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								}
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
												if ( $R72852f08e6 <= $R0f8134fb60['price'] )
												{
																$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
												}
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
								$R422f9a4efb = factory::getinstance( "products" );
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
																"failreason" => "订单失败[已经退款]",
																"factoryreturn" => $R56ea904d53['failreason'],
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
												if ( !$R808b89ba0e )
												{
																$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
												}
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

				public function AgentProfit( $R5d899a20a5, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd = "" )
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
																				++$R51b4178493;
																}
												}
								}
								return $R51b4178493;
				}

				public function UpdateCP( $Rdcd9105806 )
				{
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
