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
class ProductController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "products" );
				}

				public function Index( )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								include_once( UPATH_HELPER."ProductHelper.php" );
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$Rfff462d8f8 = intval( request( "allaid", 1 ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IProduct_Page( $data );
								$R026f0167b4 = array( );
								foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( $R3359c04a1b != "" )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$R494af0fa28 = $Rf541845af3->ICard_GetStock( $R3359c04a1b, 1 );
												$Rf541845af3 = factory::getinstance( "cards" );
												$R1807c1171a = $Rf541845af3->ICard_GetStock( $R3359c04a1b, 0 );
												$Rf351f6e099 = array( );
												foreach ( $R494af0fa28 as $R0f8134fb60 )
												{
																$Rf351f6e099[$R0f8134fb60['pid']] = $R0f8134fb60['mystock'];
												}
												$R737e3dec04 = array( );
												foreach ( $R1807c1171a as $R0f8134fb60 )
												{
																$R737e3dec04[$R0f8134fb60['pid']] = $R0f8134fb60['mystock'];
												}
												$Ra16d228039 = 0;
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																$R4e420efcc3['item'][$Ra16d228039]['mystock'] = isset( $Rf351f6e099[$R0f8134fb60['pid']] ) ? $Rf351f6e099[$R0f8134fb60['pid']] : 0;
																$R4e420efcc3['item'][$Ra16d228039]['hassold'] = isset( $R737e3dec04[$R0f8134fb60['pid']] ) ? $R737e3dec04[$R0f8134fb60['pid']] : 0;
																$Ra16d228039++;
												}
								}
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->Assign( "aid", $R2a51483b14 );
												$this->view( );
						
				}

				public function Stock( )
				{
								$this->Index( );
				}

				public function CatCol( $R3584859062 )
				{
								if ( $R3584859062 == 0 )
								{
												return "";
								}
								$R026f0167b4 = array( );
								$R27752f5168 = $this->GetSubCatCache( );
								$Rd2e691562d = array( );
								foreach ( $R27752f5168 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['id'] == $R3584859062 )
												{
																$Rd2e691562d = $R0f8134fb60;
																break;
												}
								}
								if ( !isset( $Rd2e691562d['id'] ) )
								{
												return "";
								}
								$R026f0167b4[] = $Rd2e691562d['name'];
								$Rac9b8532b8 = $Rd2e691562d['parentid'];
								$R68317e0d28 = $this->GetCatCache( );
								foreach ( $R68317e0d28 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['id'] == $Rac9b8532b8 )
												{
																$R026f0167b4[] = $R0f8134fb60['name'];
																break;
												}
								}
								$R026f0167b4 = array_reverse( $R026f0167b4 );
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R3e33e017cd = factory::getinstance( "category" );
								$Rd2e691562d = $R3e33e017cd->ICategory_Get( 0, $R2a51483b14, 1 );
								$this->Assign( "cat", $Rd2e691562d );
								return implode( " -> ", $R026f0167b4 );
				}

				public function Detail( )
				{
								$this->CheckProductAdd( 0 );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->hander->IProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "参数错误" );
												$this->Historygo( );
								}
								$this->CheckProduct( $R3db8f5c8bc );
								$this->Assign( "catcol", $this->CatCol( $R3db8f5c8bc['catid'] ) );
								$R2feb922f6a = $this->GetGameTplCache( );
								$data = array(
												"localpid" => $R8e8b5578f7
								);
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "customtpl", $R2feb922f6a );
								$this->GetFee( );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->View( );
						
				}

				public function GetFee( )
				{
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Rf3579f5c8c->ISys_Get( 0, "fee" );
								$this->Assign( "fee", $R30b2ab8dc1['fee'] );
								return $R30b2ab8dc1['fee'];
				}

				public function Create( )
				{
								$this->CheckProductAdd( );
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R3e33e017cd = factory::getinstance( "category" );
								$Rd2e691562d = $R3e33e017cd->ICategory_Get( 0, $R2a51483b14, 1 );
								if ( !isset( $Rd2e691562d[0]['id'] ) )
								{
												$this->Alert( "没有适合您的分类供您添加商品，请联系管理员" );
												$this->HistoryGo( );
								}
								$R2feb922f6a = $this->GetGameTplCache( );
								$this->Assign( "cat", $Rd2e691562d );
								$this->Assign( "customtpl", $R2feb922f6a );
								$this->GetFee( );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->View( );
						
				}

				public function CheckProductAdd( $Re43c1387b0 = 1 )
				{
								$agent = $this->session->agent;
								list( $R5d899a20a5, , , , , , , $R2a51483b14 ) = $agent;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "canadd,custom" );
								$data = array(
												"aid" => $R2a51483b14
								);
								$num = $this->hander->IProduct_Num( $data );
								if ( $agent['custom'] == -1 )
								{
												$this->Alert( "系统管理员还没有给您开通添加/编辑商品权限！" );
												$this->HistoryGo( );
								}
								if ( $Re43c1387b0 && $agent['canadd'] != -1 && $agent['canadd'] <= $num )
								{
												$this->Alert( "系统管理员只允许您添加".$agent['canadd']."个商品，目前".$num."已经达到上限！" );
												$this->HistoryGo( );
								}
				}

				public function Save( )
				{
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->CheckProductAdd( );
								}
								else
								{
												$this->CheckProductAdd( 0 );
												$R3db8f5c8bc = $this->hander->IProduct_Get( $R8e8b5578f7 );
												if ( !isset( $R3db8f5c8bc['aid'] ) )
												{
																$this->Alert( "参数错误" );
																$this->Historygo( );
												}
												$this->CheckProduct( $R3db8f5c8bc );
								}
								$R63d0786ecc = doubleval( request( "ubzprice" ) );
								$Red2b3403a5 = doubleval( request( "ubzlistprice" ) );
								$Rff28faf2ca = doubleval( request( "oldprice" ) );
								$R2c215b20ec = doubleval( request( "oldlistprice" ) );
								$Rcd0c741934 = intval( request( "catid" ) );
								if ( $R63d0786ecc < 0 || $Red2b3403a5 < 0 )
								{
												$this->Alert( "价格非法，请重新修改！" );
												$this->HistoryGo( );
								}
								if ( $Rcd0c741934 == 0 )
								{
												$this->Alert( "请先选择商品分类！" );
												$this->HistoryGo( );
								}
								$agent = $this->session->agent;
								list( $R5d899a20a5, , , , , , , $R2a51483b14 ) = $agent;
								$R07e1b7ba62 = $this->GetFee( );
								$Raa7f608c53 = doubleval( request( "pfee" ) );
								if ( $Raa7f608c53 < 0 )
								{
												$this->Alert( "手续费不能是负值，请重新输入" );
												$this->HistoryGo( );
								}
								if ( $Raa7f608c53 < $R07e1b7ba62 )
								{
												$Raa7f608c53 = $R07e1b7ba62;
								}
								$R1dc5687ca7 = intval( request( "tosys" ) );
								$Rd2376260ad = getvar( "buylitstardate" );
								$R3252b41309 = explode( ":", $Rd2376260ad );
								if ( isset( $R3252b41309[1] ) )
								{
												$R66e9aae12d = intval( $R3252b41309[0] );
												$R01afa8d164 = intval( $R3252b41309[1] );
												$R66e9aae12d = $R66e9aae12d < 10 ? "0".$R66e9aae12d : $R66e9aae12d;
												$R01afa8d164 = $R01afa8d164 < 10 ? "0".$R01afa8d164 : $R01afa8d164;
												$Rd2376260ad = $R66e9aae12d.":".$R01afa8d164;
								}
								else
								{
												$R66e9aae12d = intval( $R3252b41309[0] );
												$R66e9aae12d = $R66e9aae12d < 10 ? "0".$R66e9aae12d : $R66e9aae12d;
												$Rd2376260ad = $R66e9aae12d.":00";
								}
								$R5fca54d15d = getvar( "buylitenddate" );
								$R3252b41309 = explode( ":", $R5fca54d15d );
								if ( isset( $R3252b41309[1] ) )
								{
												$R66e9aae12d = intval( $R3252b41309[0] );
												$R01afa8d164 = intval( $R3252b41309[1] );
												$R66e9aae12d = $R66e9aae12d < 10 ? "0".$R66e9aae12d : $R66e9aae12d;
												$R01afa8d164 = $R01afa8d164 < 10 ? "0".$R01afa8d164 : $R01afa8d164;
												$R5fca54d15d = $R66e9aae12d.":".$R01afa8d164;
								}
								else
								{
												$R66e9aae12d = intval( $R3252b41309[0] );
												$R66e9aae12d = $R66e9aae12d < 10 ? "0".$R66e9aae12d : $R66e9aae12d;
												$R5fca54d15d = $R66e9aae12d.":00";
								}
								$R65edce27dd = getvar( "ubzpname" );
								$R1b69c92460 = intval( request( "ubzptype" ) );
								$R24ef1b765a = htmlspecialchars( getvar( "ubzpdesc" ) );
								$R0cdee13a13 = intval( request( "ubzqtymin" ) ) < 0 ? 1 : intval( request( "ubzqtymin" ) );
								$R7b5951700d = intval( request( "ubzqtymax" ) ) < 0 ? 10 : intval( request( "ubzqtymax" ) );
								$R239f541f81 = getvar( "ubzqtylist", "" );
								if ( $R239f541f81 == "" && 10000 < $R7b5951700d - $R0cdee13a13 )
								{
												$this->Alert( "您好，购买数量间距过大，建议最大值和最小值相差不要超过10000，或者您可以选择方式2列表定义数量" );
												$this->HistoryGo( );
								}
								$R2a039ed8fd = array(
												"pname" => $R65edce27dd,
												"ptagname" => $R65edce27dd,
												"ptype" => $R1b69c92460,
												"pdesc" => $R24ef1b765a,
												"palert" => htmlspecialchars( getvar( "palert" ) ),
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"aid" => $R2a51483b14,
												"czweb" => getvar( "ubzczweb" ),
												"web" => getvar( "ubzweb" ),
												"catid" => $Rcd0c741934,
												"pfee" => $Raa7f608c53,
												"imagefull" => getvar( "ubzimage" ),
												"imagesmall" => getvar( "ubzimagesmall" ),
												"tag" => intval( request( "ubztag" ) ),
												"sell" => intval( request( "ubzsell" ) ),
												"new" => intval( request( "ubznew" ) ),
												"remd" => intval( request( "ubzremd" ) ),
												"hot" => intval( request( "ubzhot" ) ),
												"sale" => intval( request( "ubzsale" ) ),
												"disparea" => intval( request( "ubzdisparea" ) ),
												"dispserv" => intval( request( "ubzdispserv" ) ),
												"qtymin" => $R0cdee13a13,
												"qtymax" => $R7b5951700d,
												"qtylist" => $R239f541f81,
												"cztpl" => intval( request( "ubzcztpl" ) ),
												"syscztpl" => intval( request( "ubzsyscztpl" ) ),
												"idlable" => getvar( "ubzidlable" ),
												"yktcard" => getvar( "yktcard" ),
												"ykttag" => getvar( "ykttag" ),
												"yktpoints" => intval( request( "yktpoints" ) ),
												"supfirst" => intval( request( "supfirst" ) ),
												"forb2b" => intval( request( "forb2b", 1 ) ),
												"mdydate" => date( "Y-m-d H-i-s" ),
												"mdyby" => $R5d899a20a5,
												"mdyip" => $_SERVER['REMOTE_ADDR'],
												"otherweb" => getvar( "ubzotherweb", "" ),
												"tradeterm" => htmlspecialchars( getvar( "ubztradeterm" ) ),
												"disponshow" => intval( request( "ubzdisponshow" ) ),
												"stocks" => getvar( "ubzstocks" ),
												"unit" => getvar( "ubzunit" ),
												"namecolor" => getvar( "namecolor" ),
												"pinyin" => getvar( "pinyin" ),
												"webtitle" => getvar( "webtitle" ),
												"meta_keywords" => htmlspecialchars( getvar( "meta_keywords" ) ),
												"meta_description" => htmlspecialchars( getvar( "meta_description" ) ),
												"sup" => -1,
												"onsup" => -1,
												"hassup" => -1,
												"quickuse" => intval( request( "quickuse" ) ),
												"quickusetime" => doubleval( request( "quickusetime" ) ),
												"canmakeprice" => 0,
												"buylit" => intval( request( "buylit" ) ),
												"buylitstardate" => $Rd2376260ad,
												"buylitenddate" => $R5fca54d15d,
												"buyaday" => intval( request( "buyaday" ) ),
												"isbold" => intval( request( "isbold" ) )
								);
								if ( 0 < $R8e8b5578f7 )
								{
												if ( $R3db8f5c8bc['tosys'] == 1 && ( $R3db8f5c8bc['pname'] != $R65edce27dd || $R3db8f5c8bc['ptype'] != $R1b69c92460 || $R3db8f5c8bc['pdesc'] != $R24ef1b765a || $R3db8f5c8bc['palert'] != $R2a039ed8fd['palert'] || $R3db8f5c8bc['price'] != $R2a039ed8fd['price'] || $R3db8f5c8bc['listprice'] != $R2a039ed8fd['listprice'] ) )
												{
																$R2a039ed8fd['checked'] = 0;
																$this->Alert( "由于部分参数做了修改，系统将重新审核您的商品" );
												}
												$R2a039ed8fd['pid'] = $R8e8b5578f7;
												$R808b89ba0e = $this->hander->IProduct_Update( $R2a039ed8fd, $R8e8b5578f7 );
												if ( $Rff28faf2ca != $R63d0786ecc || $R2c215b20ec != $Red2b3403a5 )
												{
																$R808b89ba0e = $this->DelPrice( $R8e8b5578f7, $R2c215b20ec, $Red2b3403a5 );
												}
												if ( !$R808b89ba0e )
												{
																$this->Alert( "本地参数更新失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R2a039ed8fd['ordering'] = intval( request( "ordering" ) );
												$R2a039ed8fd['forykt'] = intval( request( "forykt", 0 ) );
												$R2a039ed8fd['forshop'] = intval( request( "forshop", 0 ) );
												$R2a039ed8fd['tosys'] = $R1dc5687ca7;
												if ( $R1dc5687ca7 == 1 )
												{
																$R2a039ed8fd['checked'] = 0;
												}
												else
												{
																$R2a039ed8fd['checked'] = 1;
												}
												$R2a039ed8fd['hassup'] = -1;
												$R2a039ed8fd['addeddate'] = date( "Y-m-d H-i-s" );
												$R2a039ed8fd['addedby'] = $R5d899a20a5;
												$R2a039ed8fd['addedip'] = $_SERVER['REMOTE_ADDR'];
												$R8e8b5578f7 = $this->hander->IProduct_Create( $R2a039ed8fd );
												if ( $R8e8b5578f7 <= 0 )
												{
																$this->Alert( "商品添加失败" );
																$this->HistoryGo( );
												}
								}
								if ( 0 < $R8e8b5578f7 )
								{
												$this->UpdateCache( "products", array(
																"arg1" => $R8e8b5578f7
												) );
												$this->UpdateCache( "list", array(
																"arg1" => $Rcd0c741934
												) );
												$this->Alert( "操作成功！" );
								}
								else
								{
												$this->Alert( "操作失败！" );
												$this->HistoryGo( );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Product" );
				}

				public function SetPriceByTpl( $R8e8b5578f7, $R63d0786ecc, $Red2b3403a5 )
				{
								$data = array( );
								$R3db8f5c8bc = $this->GetRCache( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$data["price_".$R0f8134fb60['id']] = round( $R63d0786ecc + ( $Red2b3403a5 - $R63d0786ecc ) * $R0f8134fb60['discount'], 3 );
								}
								$data['price'] = $R63d0786ecc;
								$data['listprice'] = $Red2b3403a5;
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								$data['aid'] = 0;
								$data['pid'] = $R8e8b5578f7;
								if ( !$R5ff3ab27b8->IPrice_IsExist( $R8e8b5578f7, 0 ) )
								{
												$R808b89ba0e = $R5ff3ab27b8->IPrice_Create( $data );
								}
								else
								{
												$R808b89ba0e = $R5ff3ab27b8->IPrice_UpdateByAidAndPid( $data, 0, $R8e8b5578f7 );
								}
								return $R808b89ba0e;
				}

				public function UpdatePrice( $R8e8b5578f7, $R63d0786ecc, $Red2b3403a5 )
				{
								$data = array(
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5
								);
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								$R808b89ba0e = $R5ff3ab27b8->IPrice_UpdateByAidAndPid( $data, 0, $R8e8b5578f7 );
								return $R808b89ba0e;
				}

				public function Price( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "输入错误" );
												$this->Historygo( );
								}
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R63d0786ecc = $this->hander->IProduct_GetPriceById( $R8e8b5578f7, 0 );
								$Ref41d9513d = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $Ref41d9513d['aid'] ) )
								{
												$this->Alert( "参数错误" );
												$this->Historygo( );
								}
								$this->CheckProduct( $Ref41d9513d );
								$R1dc5687ca7 = intval( $Ref41d9513d['tosys'] );
								$R046b4585a2 = $this->GetRCache( );
								$R6c57ecdc8f = $this->GetRank( $Rcc5c6e696c[5] );
								$R1cc5d7155d = $R6c57ecdc8f['gid'];
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( $R1dc5687ca7 == 1 )
												{
																if ( 0 < $R0f8134fb60['gid'] )
																{
																				$R4c97fa9810 = isset( $R63d0786ecc["price_".$R0f8134fb60['id']] ) ? $R63d0786ecc["price_".$R0f8134fb60['id']] : $Ref41d9513d['listprice'];
																				$R026f0167b4[] = array(
																								"id" => $R0f8134fb60['id'],
																								"name" => $R0f8134fb60['name'],
																								"price" => $R4c97fa9810
																				);
																}
												}
												else if ( $R0f8134fb60['gid'] < $R1cc5d7155d && 0 < $R0f8134fb60['gid'] )
												{
																$R4c97fa9810 = isset( $R63d0786ecc["price_".$R0f8134fb60['id']] ) ? $R63d0786ecc["price_".$R0f8134fb60['id']] : $Ref41d9513d['listprice'];
																$R026f0167b4[] = array(
																				"id" => $R0f8134fb60['id'],
																				"name" => $R0f8134fb60['name'],
																				"price" => $R4c97fa9810
																);
												}
								}
							
												$this->Assign( "items", $R026f0167b4 );
												$this->Assign( "product", $Ref41d9513d );
												$this->Assign( "priceid", isset( $R63d0786ecc['id'] ) ? $R63d0786ecc['id'] : 0 );
												$this->View( );
							
				}

				public function CheckProduct( $Rb3f07f8c36 )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								if ( $R2a51483b14 != $Rb3f07f8c36['aid'] )
								{
												$this->Alert( "您没有权限操作这个商品！" );
												$this->HistoryGo( );
								}
				}

				public function PriceSave( )
				{
								$R3584859062 = getvar( "id" );
								$R399677c4c7 = intval( request( "priceid" ) );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array( );
								$R422f9a4efb = factory::getinstance( "products" );
								$Rb3f07f8c36 = $R422f9a4efb->IProduct_Get( $R8e8b5578f7, -1, "aid,price,listprice" );
								if ( !isset( $Rb3f07f8c36['aid'] ) )
								{
												$this->Alert( "参数错误" );
												$this->Historygo( );
								}
								$R63d0786ecc = $Rb3f07f8c36['price'];
								$this->CheckProduct( $Rb3f07f8c36 );
								if ( count( $R3584859062 ) == 0 )
								{
												$this->Alert( "系统还没有添加级别体系，无法定制价格！" );
												$this->HistoryGo( );
								}
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$R4c97fa9810 = doubleval( request( "price_".$R0f8134fb60 ) );
												if ( $R4c97fa9810 < $R63d0786ecc )
												{
																$this->Alert( "销售价格不能低于进价，请重新设置！" );
																$this->HistoryGo( );
												}
												$data["price_".$R0f8134fb60] = $R4c97fa9810;
								}
								$R046b4585a2 = $this->GetRCache( );
								$Ra16d228039 = 0;
								$R9742fd5d68 = "";
								$Rff28faf2ca = $Rb3f07f8c36['listprice'];
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												$R3584859062 = $R0f8134fb60['id'];
												if ( isset( $data["price_".$R3584859062] ) )
												{
																if ( 0 < $Ra16d228039 && $Rff28faf2ca < $data["price_".$R3584859062] )
																{
																				$this->Alert( $R9742fd5d68."设置出错，请重新设置！" );
																				$this->HistoryGo( );
																}
																$R9742fd5d68 = $R0f8134fb60['name'];
																$Rff28faf2ca = $data["price_".$R3584859062];
																$Ra16d228039++;
												}
												else
												{
																$data["price_".$R3584859062] = $Rff28faf2ca;
												}
								}
								$data['price'] = $Rb3f07f8c36['price'];
								$data['listprice'] = $Rb3f07f8c36['listprice'];
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								if ( $R399677c4c7 == 0 )
								{
												$data['aid'] = 0;
												$data['pid'] = $R8e8b5578f7;
												$R808b89ba0e = $R5ff3ab27b8->IPrice_Create( $data );
								}
								else
								{
												$R808b89ba0e = $R5ff3ab27b8->IPrice_Update( $data, $R399677c4c7 );
								}
								$this->go( $R808b89ba0e, "操作成功！", "操作失败！", "index.php?m=mod_agent&c=product&a=price&pid=".$R8e8b5578f7 );
				}

				public function DestroyItems( )
				{
								$R8e8b5578f7 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->IProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "参数错误" );
												$this->Historygo( );
								}
								if ( $R3db8f5c8bc['ptype'] == 100 )
								{
												$this->Alert( "此类一卡通商品请联系主站管理员删除！" );
												$this->Historygo( );
								}
								$Rcd0c741934 = $R3db8f5c8bc['catid'];
								$this->CheckProduct( $R3db8f5c8bc );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R459cf7ef38 = $Rdeabc7f106->IOrder_GetByStr( "(ordstate=1 or ordstate=3 or ordstate=0) and pid = ".$R8e8b5578f7 );
								if ( 0 < count( $R459cf7ef38 ) )
								{
												$this->Alert( "您好，请先处理掉未处理订单再删除商品" );
												$this->Historygo( );
								}
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$data = array(
												"pids" => $R8e8b5578f7,
												"aid" => $R2a51483b14
								);
								$R808b89ba0e = $this->hander->IProduct_DestroyByStr( "", $data );
								if ( $R808b89ba0e )
								{
												$this->DelPrice( $R8e8b5578f7, 1, 0 );
												$this->UpdateCache( "list", array(
																"arg1" => $Rcd0c741934
												) );
												$this->Alert( "删除成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=product" );
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function DelPrice( $R8e8b5578f7, $R2c215b20ec, $Red2b3403a5 )
				{
								$R63bede6b19 = " pid = ".$R8e8b5578f7;
								$hander = factory::getinstance( "priceagent" );
								$hander->IPriceAgent_DelByStr( $R63bede6b19 );
								$hander = factory::getinstance( "prices" );
								$hander->IPrice_DelByStr( $R63bede6b19 );
								$hander = factory::getinstance( "privateprices" );
								$hander->IPrivatePrice_DelByStr( $R63bede6b19 );
								if ( $R2c215b20ec != $Red2b3403a5 )
								{
												$hander = factory::getinstance( "pricemy" );
												$hander->IPriceMy_DelByStr( $R63bede6b19 );
								}
								return true;
				}

}

?>
