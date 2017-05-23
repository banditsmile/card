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

				public function Detail( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806, "", $R5d899a20a5 );
								if ( $R0f8134fb60['item'] == 0 )
								{
												$this->Alert( "您要查找的订单不存在！请重新输入" );
												$this->HistoryGo( );
								}
								if ( !$R0f8134fb60['item']['comefrom'] || $R0f8134fb60['item']['comefrom'] != 3 )
								{
												$this->Alert( "您要查找的订单不存在！请重新输入" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['inrecycle'] == 1 )
								{
												$this->Alert( "非法操作！订单已经不存在" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ptype'] == 0 || $R0f8134fb60['item']['ptype'] == 3 || 99 < $R0f8134fb60['item']['ptype'] )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806 );
								}
								if ( $R0f8134fb60['item']['ptype'] == 6 )
								{
												$Raa3f91d2a5 = factory::getinstance( "powerlv" );
												$data = array(
																"ordno" => $Rdcd9105806
												);
												$R0f8134fb60['powerlv'] = $Raa3f91d2a5->IPowerLv_Get( $data );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$Rb41f4f8da0 = $R422f9a4efb->IProduct_Get( $R0f8134fb60['item']['pid'], -1, "czweb" );
								$R0f8134fb60['item']['czweb'] = $Rb41f4f8da0['czweb'];
								if ( $R0f8134fb60['item']['ordstate'] == 1 && $R0f8134fb60['item']['sup'] == 1 )
								{
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R920143e856 = factory::getservice( "sorders" );
												$R9b252bf0a7 = $R0f8134fb60['item']['dollars'];
												$R6afe761ae0 = $this->GetBizKey( );
												$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
												$this->Assign( "sign", $R4b19c1abc4 );
								}
								$this->Assign( "order", $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
							
												$this->B2BInit( );
												$this->View( );
								
				}

				public function Index( )
				{
								$Rf70e923790 = getvar( "paycode", "" );
								include_once( UPATH_PAY.$Rf70e923790.".php" );
								$Ra570b05d86 = new $Rf70e923790( );
								if ( $Ra570b05d86->result( ) )
								{
												$this->Assign( "url", $Ra570b05d86->url );
								}
								else
								{
												echo "付款失败";
								}
								$Rdcd9105806 = getvar( "billno" );
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								include_once( UPATH_HELPER."ProductHelper.php" );
								include_once( UPATH_HELPER."OrderHelper.php" );
							
												$this->Assign( "item", $R3db8f5c8bc );
												$this->view( );
								
				}

				public function Respond( )
				{
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$Rf70e923790 = getvar( "PayWay" );
								$R564cc578e1 = getvar( "BillNo" );
								include_once( UPATH_PAY.$Rf70e923790.".php" );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Ra570b05d86 = new $Rf70e923790( );
								header( "Content-type: text/html;charset=GB2312" );
								if ( $Ra570b05d86->respond( $R9a1c862f32['uid'] ) )
								{
												$R96753b8637 = "";
												$data = array(
																"ubzdollars" => doubleval( getvar( "Amount" ) ),
																"ubzordno" => $R564cc578e1,
																"ubzcip" => $_SERVER['REMOTE_ADDR'],
																"ubzpaytype" => $Rf70e923790
												);
												$R3db8f5c8bc = $this->Deal( $data );
												switch ( $R3db8f5c8bc['err']['errcode'] )
												{
												case "18" :
																echo "18";
																break;
												case "0" :
																$this->Assign( "rs", $R3db8f5c8bc );
																$this->View( );
																break;
												default :
																$this->View( "err", $R3db8f5c8bc['err'] );
																break;
												}
								}
								else
								{
												echo "取卡失败！";
								}
				}

				public function Deal( $data = array( ) )
				{
								$Rdcd9105806 = $data['ubzordno'];
								$R9b252bf0a7 = $data['ubzdollars'];
								$R1b33f70f78 = $this->OrderRefresh( $data );
								if ( $R1b33f70f78['err']['errcode'] != 9 )
								{
												return $R1b33f70f78;
								}
								$R3db8f5c8bc = $this->OrderDeal( $data );
								$R1b33f70f78 = $R3db8f5c8bc['err']['errcode'];
								if ( $R1b33f70f78 != 0 && $R1b33f70f78 != 18 && $this->RollBackMoney( $Rdcd9105806 ) )
								{
												$R3db8f5c8bc['err']['content'] = $R3db8f5c8bc['err']['content']."[订单失败，请保存好您的一卡通以备下次重新购买]";
								}
								return $R3db8f5c8bc;
				}

				public function OrderDeal( $R56ea904d53 = array( ) )
				{
								$R679e9b9234 = array( );
								$R679e9b9234['err'] = array( );
								$Rdcd9105806 = $R56ea904d53['ubzordno'];
								$R9b252bf0a7 = $R56ea904d53['ubzdollars'];
								$Rf70e923790 = $R56ea904d53['ubzpaytype'];
								$R679e9b9234['err']['isCz'] = 0;
								$R679e9b9234['err']['ordno'] = $Rdcd9105806;
								$R679e9b9234['err']['paytype'] = 9;
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( count( $R3db8f5c8bc ) == 0 )
								{
												$R679e9b9234['err']['errcode'] = 1;
												$R679e9b9234['err']['content'] = "没有此支付订单！";
												return $R679e9b9234;
								}
								$R679e9b9234['err']['ptype'] = $R3db8f5c8bc['ptype'];
								$R679e9b9234['err']['pname'] = $R3db8f5c8bc['pname'];
								$R679e9b9234['err']['dollars'] = $R3db8f5c8bc['dollars'];
								$R422f9a4efb = factory::getinstance( "products" );
								$R6afe761ae0 = $this->GetBizKey( );
								if ( $R3db8f5c8bc['ptype'] == 0 || $R3db8f5c8bc['ptype'] == 100 || $R3db8f5c8bc['ptype'] == 101 || $R3db8f5c8bc['ptype'] == 3 )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												if ( $this->IsSup( $R3db8f5c8bc['pid'], $R3db8f5c8bc['qty'] ) )
												{
																$R920143e856 = factory::getservice( "sorders" );
																$Rbdf46d6e43 = $R3db8f5c8bc['ordstate'];
																if ( $Rbdf46d6e43 == 0 )
																{
																				$R186d054bda = $R920143e856->IOrder_SaveForYkt( $this->GetParam( $R3db8f5c8bc ) );
																				$data = array( "ordstate" => 1 );
																				$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
																				$R679e9b9234['err']['errcode'] = 18;
																				return $R679e9b9234;
																}
																if ( $Rbdf46d6e43 == 1 || $Rbdf46d6e43 == 0 )
																{
																				$R7bf6de464c = factory::getinstance( "sysnet" );
																				$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																				$data = array(
																								"ubzusign" => md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 ),
																								"ubzdollars" => doubleval( $R9b252bf0a7 ),
																								"ubzordno" => $Rdcd9105806,
																								"ubzcip" => $_SERVER['REMOTE_ADDR'],
																								"ubzpaytype" => "ykt"
																				);
																				$Rbf14a97cca = $R920143e856->IOrder_DealForYkt( $data );
																				if ( $Rbf14a97cca['err']['errcode'] == 0 )
																				{
																								$this->AddCard( $Rbf14a97cca, $R3db8f5c8bc );
																								$R775f79f010 = $Rf541845af3->ICard_Buy( $R3db8f5c8bc['qty'], $R3db8f5c8bc['pid'], true, $Rdcd9105806 );
																								$data = array( "sup" => 1 );
																								$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
																				}
																				else if ( $Rbf14a97cca['err']['errcode'] == 18 )
																				{
																								$Rbf14a97cca['err']['ordno'] = $Rbf14a97cca['err']['ubzordno'];
																								return $Rbf14a97cca;
																				}
																				else
																				{
																								$R775f79f010 = $Rf541845af3->ICard_Buy( $R3db8f5c8bc['qty'], $R3db8f5c8bc['pid'], false, $Rdcd9105806 );
																				}
																}
												}
												else
												{
																$R775f79f010 = $Rf541845af3->ICard_Buy( $R3db8f5c8bc['qty'], $R3db8f5c8bc['pid'], false, $Rdcd9105806 );
												}
												if ( count( $R775f79f010 ) < $R3db8f5c8bc['qty'] )
												{
																$R679e9b9234['err']['errcode'] = 1;
																$R679e9b9234['err']['content'] = "库存不足！";
												}
												else
												{
																$R026f0167b4 = array( );
																foreach ( $R775f79f010 as $R0f8134fb60 )
																{
																				$R026f0167b4[] = $R0f8134fb60['id'];
																}
																$R3584859062 = implode( ",", $R026f0167b4 );
																$data = array(
																				"ordno" => $Rdcd9105806,
																				"cardok" => 0,
																				"orddate" => date( "Y-m-d H-i-s" )
																);
																$Rf541845af3->ICard_UpdateMany( $data, $R3584859062 );
																$data = array(
																				"ordstate" => 2,
																				"qtyleft" => 0,
																				"dealdate" => date( "Y-m-d H-i-s" )
																);
																$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
																$this->UpdateYkt( $Rdcd9105806 );
																if ( $R3db8f5c8bc['cname'] != "" )
																{
																				$this->UpdateRank( $R3db8f5c8bc['cname'], $R3db8f5c8bc['dollars'] );
																}
																$R679e9b9234['err']['errcode'] = 0;
																$R679e9b9234['err']['content'] = "交易完毕！";
																$R679e9b9234['item'] = $R775f79f010;
												}
								}
								else
								{
												if ( $this->IsSup( $R3db8f5c8bc['pid'], $R3db8f5c8bc['qty'] ) )
												{
																$R920143e856 = factory::getservice( "sorders" );
																$Rbdf46d6e43 = $R3db8f5c8bc['ordstate'];
																if ( $Rbdf46d6e43 == 0 )
																{
																				$data = array( );
																				$R186d054bda = $R920143e856->IOrder_SaveForYkt( $this->GetParam( $R3db8f5c8bc ) );
																				$data = array( "ordstate" => 1 );
																				$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
																				if ( $R3db8f5c8bc['ptype'] == 1 )
																				{
																								$R679e9b9234['err']['errcode'] = 18;
																								return $R679e9b9234;
																				}
																}
																if ( $Rbdf46d6e43 == 1 && $R3db8f5c8bc['ptype'] == 1 )
																{
																				$R7bf6de464c = factory::getinstance( "sysnet" );
																				$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
																				$data = array(
																								"ubzusign" => md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 ),
																								"ubzdollars" => doubleval( $R9b252bf0a7 ),
																								"ubzordno" => $Rdcd9105806,
																								"ubzcip" => $_SERVER['REMOTE_ADDR'],
																								"ubzpaytype" => "ykt"
																				);
																				$Rbf14a97cca = $R920143e856->IOrder_DealForYkt( $data );
																				if ( $Rbf14a97cca['err']['errcode'] == 0 )
																				{
																								$R679e9b9234['err']['errcode'] = 0;
																								$R679e9b9234['err']['content'] = "交易完毕！";
																								$data = array(
																												"ordstate" => 2,
																												"sup" => 1,
																												"dealdate" => date( "Y-m-d H-i-s" ),
																												"factoryreturn" => "自动充值完成充值"
																								);
																				}
																				else if ( $Rbf14a97cca['err']['errcode'] == 18 )
																				{
																								return $Rbf14a97cca;
																				}
																				else
																				{
																								$data = array( "ordstate" => -1, "sup" => 1 );
																								$R679e9b9234['err']['errcode'] = $Rbf14a97cca['err']['errcode'];
																								$R679e9b9234['err']['content'] = $Rbf14a97cca['err']['content'];
																				}
																}
												}
												else
												{
																$R679e9b9234['err']['errcode'] = 0;
																$R679e9b9234['err']['content'] = "交易完毕！";
																$data = array( "payment" => 100, "ordstate" => 1 );
												}
												$this->hander->IOrder_Update( $data, $Rdcd9105806 );
												if ( $R3db8f5c8bc['ptype'] == 2 && $R3db8f5c8bc['ordstate'] == 0 || $Rbf14a97cca['err']['errcode'] == 0 && $R3db8f5c8bc['ptype'] == 1 )
												{
																$this->UpdateYkt( $Rdcd9105806 );
																if ( $R3db8f5c8bc['cname'] != "" )
																{
																				$this->UpdateRank( $R3db8f5c8bc['cname'], $R3db8f5c8bc['dollars'] );
																}
												}
								}
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								$R679e9b9234['order'] = $R3db8f5c8bc;
								$Rb41f4f8da0 = $R422f9a4efb->IProduct_Get( $R3db8f5c8bc['pid'], -1, "czweb,idlable" );
								$R679e9b9234['order']['czweb'] = $Rb41f4f8da0['czweb'];
								$R679e9b9234['err']['idlable'] = $R3db8f5c8bc['ptype'] == 3 ? $Rb41f4f8da0['idlable'] : "卡号";
								return $R679e9b9234;
				}

				public function IsSup( $R8e8b5578f7, $R66b0d9d6f1 )
				{
								$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								if ( 0 < $R98aa12da5c )
								{
												return 1;
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$Rb3f07f8c36 = $R422f9a4efb->IProduct_Get( $R8e8b5578f7, 1, "hassup,supfirst" );
								$Rdc3f776eb3 = $Rb3f07f8c36['stocks'];
								if ( UB_SUP == 0 || $Rb3f07f8c36['hassup'] == 0 )
								{
												return 0;
								}
								if ( $Rb3f07f8c36['supfirst'] == 0 && $Rdc3f776eb3 < $R66b0d9d6f1 )
								{
												return 1;
								}
								if ( $Rb3f07f8c36['supfirst'] == 1 )
								{
												return 1;
								}
								return 0;
				}

				public function GetParam( $R56ea904d53 )
				{
								$Rd34e1a47d8 = factory::getservice( "sorders" );
								$data = array(
												"ubzordno" => urlencode( $R56ea904d53['ordno'] ),
												"ubzdollars" => $R56ea904d53['dollars'],
												"ubzprice" => $R56ea904d53['price'],
												"ubzcprice" => $R56ea904d53['cprice'],
												"ubzpid" => intval( $R56ea904d53['pid'] ),
												"ubzpname" => urlencode( $R56ea904d53['pname'] ),
												"ubzptype" => urlencode( $R56ea904d53['ptype'] ),
												"ubzcname" => urlencode( $R56ea904d53['cname'] ),
												"ubzcrealname" => urlencode( $R56ea904d53['crealname'] ),
												"ubzctel" => urlencode( $R56ea904d53['ctel'] ),
												"ubzcmail" => urlencode( $R56ea904d53['cmail'] ),
												"ubzcqq" => urlencode( $R56ea904d53['cqq'] ),
												"ubzczacount" => urlencode( $R56ea904d53['czaccount'] ),
												"ubzczarea1" => urlencode( $R56ea904d53['czarea1'] ),
												"ubzczarea2" => urlencode( $R56ea904d53['czarea2'] ),
												"ubzcztype" => urlencode( $R56ea904d53['cztype'] ),
												"ubzczother" => urlencode( $R56ea904d53['czother'] ),
												"ubzca1" => urlencode( $R56ea904d53['ca1'] ),
												"ubzca2" => urlencode( $R56ea904d53['ca2'] ),
												"ubzct" => urlencode( $R56ea904d53['ct'] ),
												"ubzco" => urlencode( $R56ea904d53['co'] ),
												"ubzqty" => intval( $R56ea904d53['qty'] ),
												"ubzcip" => urlencode( $R56ea904d53['cip'] ),
												"ubzurl" => $Rd34e1a47d8->GetHost( ).UPATH_WEBROOT
								);
								return $data;
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

				public function UpdateYkt( $Rdcd9105806 )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R83b9f73ace = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "pname,price,qty,ptype" );
								$R21ef3485d7 = $Rf541845af3->ICard_Get( $Rdcd9105806, 100 );
								foreach ( $R21ef3485d7 as $R0f8134fb60 )
								{
												if ( $R83b9f73ace['ptype'] == 2 )
												{
																$this->UpdateTrade( 0, 100, $Rdcd9105806, 0, $R83b9f73ace['pname'], $R83b9f73ace['price'], $R83b9f73ace['qty'], 0, 0, $R0f8134fb60['money'], $R0f8134fb60['money'], "", 1, $R0f8134fb60['cardnumber'], 0 );
												}
												else
												{
																$data = array( "money" => 0, "cardok" => 1 );
																$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
																$this->UpdateTrade( 0, 100, $Rdcd9105806, 0, $R83b9f73ace['pname'], $R83b9f73ace['price'], $R83b9f73ace['qty'], 0, 0, 0, $R0f8134fb60['money'], "", 1, $R0f8134fb60['cardnumber'], $R0f8134fb60['money'] );
												}
								}
				}

				public function RollBackMoney( $Rdcd9105806 )
				{
								$Rcc8a91d7c7 = factory::getinstance( "cards" );
								$data = array( "cardok" => 1 );
								$Rcc8a91d7c7->ICard_UpdateByOrdno( $data, $Rdcd9105806 );
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

				public function GetRank( $R72852f08e6 )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function UpdateRank( $R45074ab3da, $R72852f08e6 )
				{
								return;
								$R24b7331256 = factory::getinstance( "agents" );
								$agent = $R24b7331256->IAgent_GetByName( $R45074ab3da, "acsmp, alv, aid" );
								$Re90242a509 = $R72852f08e6 + $agent['acsmp'];
								$R046b4585a2 = $this->GetRank( $Re90242a509 );
								if ( $agent['alv'] == $R046b4585a2 )
								{
												return 2;
								}
								else
								{
												$data = array(
																"alv" => $R046b4585a2,
																"acsmp" => $Re90242a509
												);
												$R808b89ba0e = $R24b7331256->IAgent_Update( $data, $agent['aid'] );
												if ( $R808b89ba0e )
												{
																$sess = factory::getinstance( "session" );
																$Rcc5c6e696c = $sess->user;
																$Rcc5c6e696c[5] = $R046b4585a2;
																$sess->set( "userinfo", implode( "|", $Rcc5c6e696c ) );
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function OrderRefresh( $R56ea904d53 = array( ) )
				{
								$R679e9b9234 = array( );
								$R679e9b9234['err'] = array( );
								$Rdcd9105806 = $R56ea904d53['ubzordno'];
								$R679e9b9234['err']['ordno'] = $Rdcd9105806;
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$Rcbddb47f1c = factory::getinstance( "funds" );
												$R3db8f5c8bc = $Rcbddb47f1c->IFunds_Get( $Rdcd9105806, "cname,ordstate" );
												$R679e9b9234['err']['isCz'] = 1;
												if ( $R3db8f5c8bc['ordstate'] == 2 )
												{
																$R679e9b9234['err']['errcode'] = 1;
																$R679e9b9234['err']['content'] = "充值订单已经处理，请不要重复刷新！";
																return $R679e9b9234;
												}
								}
								else
								{
												$R679e9b9234['order'] = $R3db8f5c8bc;
												$R422f9a4efb = factory::getinstance( "products" );
												$Rb41f4f8da0 = $R422f9a4efb->IProduct_Get( $R3db8f5c8bc['pid'], -1, "czweb,idlable" );
												$R679e9b9234['order']['czweb'] = $Rb41f4f8da0['czweb'];
												$R679e9b9234['err']['isCz'] = 0;
												if ( 1 < $R3db8f5c8bc['ordstate'] && $R3db8f5c8bc['cname'] != "" )
												{
																$R24b7331256 = factory::getinstance( "agents" );
																$agent = $R24b7331256->IAgent_GetByName( $R3db8f5c8bc['cname'], "acsmp, aremain" );
																$R679e9b9234['err']['acsmp'] = $agent['acsmp'];
																$R679e9b9234['err']['aremain'] = $agent['aremain'];
																$R679e9b9234['err']['paytype'] = 0;
												}
												$R3b326299a9 = $R3db8f5c8bc['qty'] * $R3db8f5c8bc['cprice'];
												$R679e9b9234['err']['ptype'] = $R3db8f5c8bc['ptype'];
												$R679e9b9234['err']['idlable'] = $R3db8f5c8bc['ptype'] == 3 ? $Rb41f4f8da0['idlable'] : "卡号";
												$R679e9b9234['err']['pname'] = $R3db8f5c8bc['pname'];
												$R679e9b9234['err']['dollars'] = $R3b326299a9;
												if ( ( 1 < $R3db8f5c8bc['ordstate'] || $R3db8f5c8bc['ordstate'] == -1 ) && ( 0 < $R3db8f5c8bc['ptype'] && $R3db8f5c8bc['ptype'] < 99 && $R3db8f5c8bc['ptype'] != 3 ) )
												{
																$R679e9b9234['err']['errcode'] = 0;
																$R679e9b9234['err']['content'] = "订单已经处理，请不要重复刷新1！";
																return $R679e9b9234;
												}
												else if ( ( $R3db8f5c8bc['ordstate'] == 2 || $R3db8f5c8bc['ordstate'] == -1 ) && ( $R3db8f5c8bc['ptype'] == 0 || $R3db8f5c8bc['ptype'] == 3 || 99 < $R3db8f5c8bc['ptype'] ) )
												{
																$R679e9b9234['err']['errcode'] = 0;
																$R679e9b9234['err']['content'] = "交易完成！";
																$Rf541845af3 = factory::getinstance( "cards" );
																$R337d380380 = $Rf541845af3->ICard_Get( $Rdcd9105806, 99 );
																$R679e9b9234['item'] = $R337d380380;
																return $R679e9b9234;
												}
								}
								$R679e9b9234['err']['errcode'] = 9;
								return $R679e9b9234;
				}

				public function Err( $data = array( ) )
				{
						
												$this->Assign( "err", $data );
												$this->View( );
								
				}

				public function Init( $R06c518f70e = "" )
				{
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( );
								if ( $R06c518f70e != "" )
								{
												$R30b2ab8dc1['title'] = $R06c518f70e;
								}
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
				}

				public function UpdateTrade( $R2a51483b14, $Ra8b176bf4f, $Rdcd9105806, $R63384ccc42, $R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $Race8252ffc, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Re82ee9b121 = "", $R28e6bfe150 = 0, $R1df8368da5 = "", $Rd541ac7c24 = "" )
				{
								$R70e1e32798 = $Re82ee9b121 == "" ? $R65edce27dd." x ".$R63d0786ecc."(".$R66b0d9d6f1.")" : $Re82ee9b121;
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"ordno" => $Rdcd9105806,
												"income" => $Race8252ffc,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $R70e1e32798,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"ykt" => $R28e6bfe150,
												"yktnumber" => $R1df8368da5,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function Complaint( )
				{
								$sess = factory::getinstance( "session" );
								$Rcc5c6e696c = $sess->user;
								$R353a0fb914 = getvar( "lianxi", "" );
								if ( $Rcc5c6e696c != "" )
								{
												$R2a51483b14 = $Rcc5c6e696c[7];
												$Ra3d21a857b = $R2a51483b14;
												$R26238b353c = "";
								}
								else
								{
												$R2a51483b14 = 0;
												$Ra3d21a857b = $R2a51483b14;
												$R26238b353c = "";
												if ( trim( $R353a0fb914 ) == "" )
												{
																$this->Alert( "联系方式不能为空，请填写您的联系方式方便我们和您联系" );
																$this->CloseWin( );
												}
								}
								$R180beb7e65 = 0;
								$Rdcd9105806 = getvar( "ordno", "" );
								if ( $Rdcd9105806 != "" )
								{
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R3db8f5c8bc = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "tsid" );
												if ( 0 < intval( $R3db8f5c8bc['tsid'] ) )
												{
																$this->Alert( "此订单已经投诉过，如果您需要补充，请使用您的账号登陆系统在后边回复即可或者直接联系管理员！" );
																$this->CloseWin( );
												}
								}
								$R06c518f70e = getvar( "title", "" );
								$Re82ee9b121 = getvar( "content" );
								if ( $R353a0fb914 != "" )
								{
												$Re82ee9b121 = $Re82ee9b121."\\n\\n联系方式：\\n".$R353a0fb914;
								}
								$Re82ee9b121 = htmlspecialchars( $Re82ee9b121 );
								$R76e9854dc9 = getvar( "hope", "" );
								$R97c1115009 = getvar( "other" );
								$R06c518f70e = getvar( "title" );
								if ( $R97c1115009 == "" )
								{
												$R97c1115009 = $R06c518f70e;
								}
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgcc" => $R26238b353c,
												"title" => $R97c1115009,
												"other" => $R97c1115009,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => $Re82ee9b121,
												"parentid" => 0,
												"msgtype" => 3,
												"comefrom" => 3,
												"msgstate" => 1,
												"hope" => $R76e9854dc9,
												"ordno" => $Rdcd9105806
								);
								$R9e0664486a = factory::getinstance( "msg" );
								$R808b89ba0e = $R9e0664486a->IMsg_Create( $data );
								if ( 0 < $R808b89ba0e )
								{
												if ( $Rdcd9105806 != "" )
												{
																$data = array(
																				"tsid" => $R808b89ba0e
																);
																$Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
												}
												$this->Alert( "投诉短消息发布成功！" );
												$this->CloseWin( );
								}
								else
								{
												$this->Alert( "投诉短消息发布失败！" );
												$this->CloseWin( );
								}
				}

				public function CloseWin( )
				{
								echo "<script type=\"text/javascript\">window.close();</script>";
								exit( );
				}

}

?>
