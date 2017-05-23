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
class PriceController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "prices" );
				}

				public function Home( )
				{
							
												$this->View( );
							
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "picic" ) ) ) );
								$this->FillPage( $data, $R4e420efcc3 );
								$R60d44bd111 = array( "pname" => "商品名称", "pids" => "商品编号", "aid" => "所属经销商" );
								$this->Assign( "carray", $R60d44bd111 );
								$this->Assign( "stype", request( "stype", "pname" ) );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "100" => "兑换类一卡通", "101" => "充值类一卡通" );
								$this->Recycle( "products" );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function PriceSaveByTpl( )
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
								$R3584859062 = getvar( "id" );
								$R42f28414d6 = "";
								if ( $R3584859062 == -1 )
								{
												$R42f28414d6 = "aid = 0";
								}
								else
								{
												$R8e8b5578f7 = implode( ",", $R3584859062 );
												$R42f28414d6 = "aid=0 and pid in (".$R8e8b5578f7.")";
								}
								$Rbbab0bbd0d = intval( getvar( "rankid" ) );
								$R063e6693e5 = factory::getinstance( "ranks" );
								if ( -1 < $Rbbab0bbd0d )
								{
												$R3db8f5c8bc = $R063e6693e5->IRank_GetById( $Rbbab0bbd0d, "discount" );
												if ( !isset( $R3db8f5c8bc['discount'] ) )
												{
																$this->Alert( "这个级别不存在了，请您重新选择" );
																$this->HistoryGo( );
												}
												$R00f8f0165d = "price_".$Rbbab0bbd0d."=round( (price+(listprice-price)*".$R3db8f5c8bc['discount']."),".$R3a8b307327.")";
								}
								else
								{
												$R026f0167b4 = array( );
												$R00f8f0165d = "";
												$R3db8f5c8bc = $R063e6693e5->IRank_Get( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[] = "price_".$R0f8134fb60['id']."=round( (price+(listprice-price)*".$R0f8134fb60['discount']."),".$R3a8b307327.")";
												}
												$R00f8f0165d = implode( ",", $R026f0167b4 );
												if ( $R00f8f0165d == "" )
												{
																$this->Alert( "您还没有设定任何级别，请先设置好级别，再制定价格" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=Rank" );
												}
								}
								$R808b89ba0e = $this->hander->IPrice_LimitUpdate( $R00f8f0165d, $R42f28414d6 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "价格更新成功！" );
								}
								else
								{
												$this->Alert( "价格更新失败！" );
								}
								$this->HistoryGo( );
				}

				public function PriceSaveBySup( )
				{
								set_time_limit( 0 );
								$R6272ce809a = factory::getinstance( "fx" );
								$Rb321ab3f5e = $R6272ce809a->IFX_Get( );
								$R96e20b4752 = $Rb321ab3f5e['curfx'];
								$Re29e2583ef = factory::getservice( "sproducts" );
								$R2642d9146c = $Re29e2583ef->IProduct_GetSupPrice( array( ) );
								$R422f9a4efb = factory::getinstance( "products" );
								$R3db8f5c8bc = $R422f9a4efb->IProduct_GetAll( "pid,price,pname,catid" );
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
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$R367b4b756c = "";
								$Ra16d228039 = 0;
								$R2145464ecd = true;
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( !isset( $R2642d9146c[$R0f8134fb60['pid']] ) )
												{
																continue;
												}
												$Rf64b3b1325 = $R2642d9146c[$R0f8134fb60['pid']];
												$Rf64b3b1325 *= $R96e20b4752;
												$Rf64b3b1325 = round( $Rf64b3b1325, $R3a8b307327 );
												if ( $R0f8134fb60['price'] != $Rf64b3b1325 )
												{
																$Ra16d228039++;
																$R367b4b756c .= "<tr><td width=\"10%\">".$Ra16d228039."</td><td width=\"10%\">".$R0f8134fb60['pid']."</td><td width=\"60%\" style=\"text-align:left\">".$R0f8134fb60['pname']."</td><td width=\"10%\">".$R0f8134fb60['price']."</td><td width=\"10%\">".$Rf64b3b1325."</td></tr>";
																$data = array(
																				"price" => $Rf64b3b1325
																);
																$R808b89ba0e = $R422f9a4efb->IProduct_Update( $data, $R0f8134fb60['pid'] );
																if ( $R808b89ba0e == false )
																{
																				$R2145464ecd = false;
																}
																else
																{
																				$this->UpdateCache( "products", array(
																								"arg1" => $R0f8134fb60['pid']
																				) );
																				$this->UpdateCache( "list", array(
																								"arg1" => $R0f8134fb60['catid']
																				) );
																}
												}
								}
								if ( $R2145464ecd == false )
								{
												$this->Assign( "err", "本次更新有失败，请您<a href=\"index.php?m=mod_b2b&c=Price&a=PriceSaveBySup\"><u>重新更新</u></a>！" );
								}
								else
								{
												$this->Assign( "err", "完成更新！本次有 <font color=\"#0000ff\">".$Ra16d228039."</font> 个商品进货价格做了修改" );
								}
						
												$this->Assign( "str", $R367b4b756c );
												$this->View( );
						
				}

				public function Result( )
				{
								$R63bede6b19 = request( "r" );
								$this->Assign( "str", $R63bede6b19 );
							
												$this->View( );
							
				}

				public function PriceTpl( )
				{
								$R014535cc1a = intval( request( "pricetpl" ) );
								$R2a51483b14 = 0;
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$Rb112a06dad = factory::getinstance( "priceplan" );
								$data = array(
												"pricetpl" => $R014535cc1a,
												"aid" => $R2a51483b14
								);
								$R6c59ba72d5 = $Rb112a06dad->IPricePlan_Get( $data );
								$Rf9481e4151 = array( );
								foreach ( $R6c59ba72d5 as $R0f8134fb60 )
								{
												$Rf9481e4151[$R0f8134fb60['rankid']] = $R0f8134fb60;
								}
								$R51c716b966 = $this->SetLang( 1 );
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( isset( $Rf9481e4151[$R0f8134fb60['id']]['discout'] ) )
												{
																$R33403e391b = $Rf9481e4151[$R0f8134fb60['id']]['discout'];
																$R0acfedc1db = $Rf9481e4151[$R0f8134fb60['id']]['priceplan'];
												}
												else
												{
																$R33403e391b = 0.01;
																$R0acfedc1db = 1;
												}
												switch ( $R0acfedc1db )
												{
												case 1 :
												case 3 :
																$R33403e391b *= 100;
																$Rf5687f6bbe = "%";
																break;
												default :
																$Rf5687f6bbe = $R51c716b966['moneyunit'];
																break;
												}
												$R026f0167b4[] = array(
																"id" => $R0f8134fb60['id'],
																"name" => $R0f8134fb60['name'],
																"discout" => $R33403e391b,
																"priceplan" => $R0acfedc1db,
																"char" => $Rf5687f6bbe
												);
								}
						
												$this->Assign( "items", $R026f0167b4 );
												$this->Assign( "pricetpl", $R014535cc1a );
												$this->View( );
						
				}

				public function PriceTplSave( )
				{
								$R2a51483b14 = 0;
								$R3456919727 = getvar( "id" );
								$Rb112a06dad = factory::getinstance( "priceplan" );
								foreach ( $R3456919727 as $R3584859062 )
								{
												$data = array(
																"rankid" => $R3584859062,
																"pricetpl" => 0,
																"aid" => $R2a51483b14
												);
												$R33403e391b = doubleval( request( "discout_".$R3584859062 ) );
												$R0acfedc1db = intval( request( "priceplan_".$R3584859062 ) );
												switch ( $R0acfedc1db )
												{
												case 1 :
												case 3 :
																$R33403e391b /= 100;
																break;
												default :
																break;
												}
												if ( $Rb112a06dad->IPricePlan_IsExist( $data ) )
												{
																$Rb7492a73f7 = " rankid = ".$R3584859062." and pricetpl=0 and aid=".$R2a51483b14;
																$data = array(
																				"discout" => $R33403e391b,
																				"priceplan" => $R0acfedc1db
																);
																$R808b89ba0e = $Rb112a06dad->IPricePlan_UpdateByArray( $data, $Rb7492a73f7 );
																if ( !$R808b89ba0e )
																{
																				$this->Alert( "操作失败" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																$data = array(
																				"discout" => $R33403e391b,
																				"priceplan" => $R0acfedc1db,
																				"rankid" => $R3584859062,
																				"aid" => $R2a51483b14
																);
																$R808b89ba0e = $Rb112a06dad->IPricePlan_Create( $data );
																if ( !$R808b89ba0e )
																{
																				$this->Alert( "操作失败" );
																				$this->HistoryGo( );
																}
												}
								}
								$this->Alert( "保存完成" );
								$this->UpdateCache( "priceplan", array( "arg1" => 0 ) );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price&a=PriceTpl" );
				}

				public function RankTpl( )
				{
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R71a664ef8c = $this->PageInfo( );
								$R2a51483b14 = 0;
								$data = array(
												"aid" => $R2a51483b14
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $Rb7abd0cdc3->IPriceAgentTpl_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "模板名称" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
							
												$this->Assign( "sarray", $R00be52aa45 );
												$this->Assign( "rank", $R046b4585a2 );
												$this->view( );
							
				}

				public function TplSave( )
				{
								$R2a51483b14 = 0;
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R3584859062 = intval( request( "id" ) );
								$R6412910652 = intval( request( "parentid" ) );
								$data = array(
												"name" => getvar( "name" ),
												"parentid" => $R6412910652,
												"rankid" => intval( request( "rankid" ) ),
												"aid" => $R2a51483b14
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $Rb7abd0cdc3->IPriceAgentTpl_Update( $data, $R3584859062 );
												if ( 0 < $R6412910652 && $R6412910652 != request( "oldparentid" ) )
												{
																$this->UpdatePrice( $R6412910652, $R3584859062 );
												}
								}
								else
								{
												$R3584859062 = $Rb7abd0cdc3->IPriceAgentTpl_Create( $data );
												if ( 0 < $R3584859062 )
												{
																if ( 0 < $R6412910652 )
																{
																				$this->UpdatePrice( $R6412910652, $R3584859062 );
																}
																$R808b89ba0e = true;
												}
												else
												{
																$R808b89ba0e = false;
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=RankTpl" );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

				public function TplDel( )
				{
								$R2a51483b14 = 0;
								$R3584859062 = intval( request( "id" ) );
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R35ee3e47cf = $Rb7abd0cdc3->IPriceAgentTpl_GetById( $R3584859062 );
								if ( $R35ee3e47cf['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R808b89ba0e = $Rf00621a200->IPriceAgent_DelByStr( "pricetpl = ".$R3584859062 );
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $Rb7abd0cdc3->IPriceAgentTpl_Del( $R3584859062 );
												if ( $R808b89ba0e )
												{
																$R2097a8fddf = factory::getinstance( "agents" );
																$data = array( "pricetpl" => 0 );
																$R2097a8fddf->IAgent_UpdateByStr( $data, " pricetpl = ".$R3584859062 );
																$this->Alert( "删除成功" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=RankTpl" );
												}
												else
												{
																$this->Alert( "删除失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function UpdatePrice( $Rb025359786, $R9e14437acd )
				{
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$Raa4d6c9903 = $Rf00621a200->IPriceAgent_Get( array(
												"pricetpl" => $Rb025359786
								) );
								foreach ( $Raa4d6c9903 as $R0f8134fb60 )
								{
												$Rcc5c6e696c = array(
																"pricetpl" => $R9e14437acd,
																"pid" => $R0f8134fb60['pid'],
																"price" => $R0f8134fb60['price']
												);
												if ( $Rf00621a200->IPriceAgent_IsExist( $Rcc5c6e696c ) )
												{
																$Rf00621a200->IPriceAgent_Update( $Rcc5c6e696c, $R0f8134fb60['id'] );
												}
												else
												{
																$R808b89ba0e = $Rf00621a200->IPriceAgent_Create( $Rcc5c6e696c );
												}
								}
				}

				public function RankTplPrice( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R422f9a4efb = factory::getinstance( "products" );
								$R4e420efcc3 = $R422f9a4efb->IProduct_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R026f0167b4 = array( );
								foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$R014535cc1a = intval( request( "pricetpl" ) );
								if ( 0 < $R014535cc1a )
								{
												$R3359c04a1b = implode( ",", $R026f0167b4 );
												$R888e816784 = array( );
												if ( $R3359c04a1b != "" )
												{
																$Rf00621a200 = factory::getinstance( "priceagent" );
																$Raa4d6c9903 = $Rf00621a200->IPriceAgent_GetByLimit( "pricetpl = ".$R014535cc1a." and pid in (".$R3359c04a1b.")" );
																foreach ( $Raa4d6c9903 as $R0f8134fb60 )
																{
																				$R888e816784[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
																}
												}
												$this->Assign( "parray", $R888e816784 );
								}
								$name = getvar( "name" );
								$this->Assign( "name", $name );
								$this->Assign( "pricetpl", $R014535cc1a );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "4" => "金币类", "5" => "装备类", "6" => "代练类", "100" => "兑换类一卡通", "101" => "充值类一卡通" );
								$this->Recycle( "products" );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function TplPriceSave( )
				{
								$R014535cc1a = intval( request( "pricetpl" ) );
								if ( $R014535cc1a == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R3359c04a1b = getvar( "pid" );
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R8e8b5578f7 = intval( $R8e8b5578f7 );
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												$R0d9f8f778c = request( "cprice_".$R8e8b5578f7, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"pricetpl" => $R014535cc1a
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$R0d9f8f778c = doubleval( $R0d9f8f778c );
																if ( $R63d0786ecc < $R0d9f8f778c )
																{
																				$R63d0786ecc = $R0d9f8f778c;
																				$R8c989dcf9c++;
																}
																if ( $Rf00621a200->IPriceAgent_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and pricetpl=".$R014535cc1a;
																				$Rf00621a200->IPriceAgent_UpdateByArray( $data, $Rb7492a73f7 );
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$Rf00621a200->IPriceAgent_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price&a=RankTplPrice&pricetpl=".$R014535cc1a."&name=".urlencode( getvar( "name" ) ) );
				}

				public function TplPriceQuickSave( )
				{
								set_time_limit( 0 );
								$R014535cc1a = intval( request( "pricetpl" ) );
								if ( $R014535cc1a == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$R55c494bb27 = $R422f9a4efb->IProduct_GetAll( "pid,price,listprice,pname" );
								$R33403e391b = doubleval( request( "discout" ) );
								$R0acfedc1db = intval( request( "priceplan" ) );
								$R3359c04a1b = getvar( "pid" );
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								$R3a8b307327 = $this->GetDec( );
								foreach ( $R55c494bb27 as $R0f8134fb60 )
								{
												$R8e8b5578f7 = $R0f8134fb60['pid'];
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												switch ( $R0acfedc1db )
												{
												case 1 :
																$R63d0786ecc = $R0f8134fb60['price'] + ( $R0f8134fb60['listprice'] - $R0f8134fb60['price'] ) * $R33403e391b / 100;
																break;
												case 2 :
																$R63d0786ecc = $R0f8134fb60['price'] + $R33403e391b;
																break;
												case 3 :
																$R63d0786ecc = $R0f8134fb60['price'] + $R0f8134fb60['listprice'] * $R33403e391b / 100;
																break;
												default :
																$R63d0786ecc = $R0f8134fb60['listprice'];
																break;
												}
												$R63d0786ecc = round( $R63d0786ecc, $R3a8b307327 );
												$R0d9f8f778c = $R0f8134fb60['price'];
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"pricetpl" => $R014535cc1a
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$R0d9f8f778c = doubleval( $R0d9f8f778c );
																if ( $R63d0786ecc < $R0d9f8f778c )
																{
																				$R63d0786ecc = $R0d9f8f778c;
																				$R8c989dcf9c++;
																}
																if ( $Rf00621a200->IPriceAgent_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and pricetpl=".$R014535cc1a;
																				$Rf00621a200->IPriceAgent_UpdateByArray( $data, $Rb7492a73f7 );
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$Rf00621a200->IPriceAgent_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price&a=RankTplPrice&pricetpl=".$R014535cc1a."&name=".urlencode( getvar( "name" ) ) );
				}

				public function Agent( )
				{
								$R014535cc1a = intval( request( "pricetpl" ) );
								$R2a51483b14 = 0;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								if ( 0 < $R014535cc1a )
								{
												$data['pricetpl'] = $R014535cc1a;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "aname" => "用户名", "aid" => "用户编号", "parentid" => "上级编号", "arealname" => "真实姓名", "aqq" => "QQ", "amail" => "邮箱", "atel" => "电话", "aaddr" => "住址", "aremain" => "最低余额", "acsmp" => "最低消费", "prv" => "省", "city" => "市", "zip" => "邮编", "remarks" => "备注" );
								$this->Assign( "sarray", $R00be52aa45 );
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R35ee3e47cf = $Rb7abd0cdc3->IPriceAgentTpl_GetByStr( "aid = 0" );
								$this->Assign( "tpls", $R35ee3e47cf );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
							
												$this->view( );
							
				}

				public function AgentTplSave( )
				{
								$R7f50336ca5 = getvar( "aid" );
								$R2097a8fddf = factory::getinstance( "agents" );
								foreach ( $R7f50336ca5 as $R2a51483b14 )
								{
												$R014535cc1a = intval( request( "pricetpl_".$R2a51483b14 ) );
												$Rcfe942dd00 = intval( request( "oldpricetpl_".$R2a51483b14 ) );
												if ( $R014535cc1a != $Rcfe942dd00 )
												{
																$data = array(
																				"pricetpl" => $R014535cc1a
																);
																$R2a51483b14 = intval( $R2a51483b14 );
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																$this->UpdateCache( "agents", array(
																				"arg1" => $R2a51483b14
																) );
												}
								}
								$this->Alert( "完成操作" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=Agent" );
				}

				public function PrivatePriceAgent( )
				{
								$R2a51483b14 = 0;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "aname" => "用户名", "aid" => "用户编号", "parentid" => "上级编号", "arealname" => "真实姓名", "aqq" => "QQ", "amail" => "邮箱", "atel" => "电话", "aaddr" => "住址", "aremain" => "最低余额", "acsmp" => "最低消费", "prv" => "省", "city" => "市", "zip" => "邮编", "remarks" => "备注" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
						
												$this->view( );
						
				}

				public function PrivatePriceProductSet( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R422f9a4efb = factory::getinstance( "products" );
								$R4e420efcc3 = $R422f9a4efb->IProduct_Page( $data );
								$R026f0167b4 = array( );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4c4e792da9 = intval( request( "aid" ) );
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R4c4e792da9, "aname,parentid,alv,aid,pricetpl" );
								$R3a8b307327 = $this->GetDec( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R4e420efcc3['item'][$Ra16d228039]['underlingprice'] = $this->GetPriceById( $R4e420efcc3['item'][$Ra16d228039], $R2f07e1d8b8, $R3a8b307327 );
												$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039]['pid'];
								}
								$this->FillPage( $data, $R4e420efcc3 );
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$Rc81d709a1d = $R00655fd902->IPrivatePrice_GetByLimit( "aid = ".$R4c4e792da9." and pid in (".$R3359c04a1b.")" );
								$R888e816784 = array( );
								foreach ( $Rc81d709a1d as $R0f8134fb60 )
								{
												$R888e816784[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
								}
								$this->Assign( "parray", $R888e816784 );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "4" => "金币类", "5" => "装备类", "6" => "代练类", "100" => "兑换类一卡通", "101" => "充值类一卡通" );
								$this->Recycle( "products" );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "aid", $R4c4e792da9 );
								$this->Assign( "underling", $R2f07e1d8b8 );
						
												$this->view( );
						
				}

				public function PrivatePriceProductSave( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4c4e792da9 = $R2a51483b14;
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R4c4e792da9, "parentid,alv,aid,pricetpl" );
								$R3359c04a1b = getvar( "pid" );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R8e8b5578f7 = intval( $R8e8b5578f7 );
												$R082c14652c = doubleval( request( "myprice" ) );
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												$Rff28faf2ca = request( "oldprice_".$R8e8b5578f7, "" );
												$R082c14652c = request( "myprice_".$R8e8b5578f7, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"aid" => $R2a51483b14
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$Rff28faf2ca = doubleval( $Rff28faf2ca );
																if ( $R63d0786ecc < $R082c14652c )
																{
																				$R63d0786ecc = $R082c14652c;
																				$R8c989dcf9c++;
																}
																if ( $R00655fd902->IPrivatePrice_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and aid=".$R2a51483b14;
																				if ( $Rff28faf2ca != $R63d0786ecc )
																				{
																								$R00655fd902->IPrivatePrice_UpdateByArray( $data, $Rb7492a73f7 );
																				}
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$R00655fd902->IPrivatePrice_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=PrivatePriceProductSet&aid=".$R2a51483b14 );
				}

				public function PrivatePriceAgentDel( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$data = array(
												"aid" => $R2a51483b14,
												"pid" => $R8e8b5578f7
								);
								$R808b89ba0e = $R00655fd902->IPrivatePrice_DeleteByStr( "", $data );
								$this->Alert( "完成操作 " );
								$R7130865f2e = $_SERVER['HTTP_REFERER'];
								$this->ScriptRedirect( $R7130865f2e );
				}

				public function PrivatePriceAgentSave( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R7f50336ca5 = getvar( "aid" );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R7f50336ca5 as $R2a51483b14 )
								{
												$R2a51483b14 = intval( $R2a51483b14 );
												$R082c14652c = doubleval( request( "myprice" ) );
												$R63d0786ecc = request( "price_".$R2a51483b14, "" );
												$Rff28faf2ca = request( "oldprice_".$R2a51483b14, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"aid" => $R2a51483b14
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$Rff28faf2ca = doubleval( $Rff28faf2ca );
																if ( $R63d0786ecc < $R082c14652c )
																{
																				$R63d0786ecc = $R082c14652c;
																				$R8c989dcf9c++;
																}
																if ( $R00655fd902->IPrivatePrice_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and aid=".$R2a51483b14;
																				if ( $Rff28faf2ca != $R63d0786ecc )
																				{
																								$R00655fd902->IPrivatePrice_UpdateByArray( $data, $Rb7492a73f7 );
																				}
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$R00655fd902->IPrivatePrice_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=product&a=PP&pid=".$R8e8b5578f7 );
				}

				public function ClearPrice( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 == 0 )
								{
												$this->Alert( "您好，请先选择用户" );
												$this->HistoryGo( );
								}
								$hander = factory::getinstance( "priceagenttpl" );
								$R63bede6b19 = " aid = ".$R2a51483b14;
								$R3db8f5c8bc = $hander->IPriceAgentTpl_GetByStr( $R63bede6b19 );
								if ( 0 < count( $R3db8f5c8bc ) )
								{
												$R026f0167b4 = array( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['id'];
												}
												$Rd0b8bf925d = implode( ",", $R026f0167b4 );
												if ( $Rd0b8bf925d != "" )
												{
																$hander = factory::getinstance( "priceagent" );
																$R63bede6b19 = "pricetpl in (".$Rd0b8bf925d.")";
																$hander->IPriceAgent_DelByStr( $R63bede6b19 );
												}
								}
								$hander = factory::getinstance( "priceplan" );
								$R63bede6b19 = " aid = ".$R2a51483b14;
								$hander->IPricePlan_DelByStr( $R63bede6b19 );
								$this->UpdateCache( "priceplan", array(
												"arg1" => $R2a51483b14
								) );
								$hander = factory::getinstance( "prices" );
								$R63bede6b19 = " aid = ".$R2a51483b14;
								$hander->IPrice_DelByStr( $R63bede6b19 );
								$this->Alert( "清除成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=Home" );
				}

}

?>
