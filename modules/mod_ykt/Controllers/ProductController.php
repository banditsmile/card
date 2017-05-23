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
								$this->hander = factory::getinstance( "products" );
				}

				public function Index( $R3584859062 = 0, $R9906335164 = false, $R511aa10c02 = "list/tmp.html" )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								if ( $R9906335164 )
								{
												$Rd2e691562d = $R3584859062;
								}
								$value = doubleval( request( "value", 0 ) );
								$R71a664ef8c = $this->PageInfo( );
								global $masterid;
								$R7fb26bbe56 = array( );
								$R7fb26bbe56[] = $masterid;
								$R7fb26bbe56[] = -1;
								$R7fb26bbe56[] = 0;
								$data = array(
												"ptype" => intval( request( "ptype", -1 ) ),
												"catid" => $Rd2e691562d,
												"forykt" => 1,
												"sell" => 1,
												"inrecycle" => 0,
												"value" => doubleval( request( "value", 0 ) ),
												"checked" => 1,
												"parentid" => 0,
												"bossids" => implode( ",", $R7fb26bbe56 )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$data['nrows'] = 2000;
								$R4e420efcc3 = $this->hander->IProduct_PageForYkt( $data );
								$R4e420efcc3 = $this->RetPi1( $R4e420efcc3 );
								$R4e420efcc3 = array(
												"item" => $R4e420efcc3
								);
								$this->Assign( "items", $R4e420efcc3['item'] );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->YktInit( "商品列表" );
								$this->Assign( "keywords", getvar( "keywords", "" ) );
							
												$this->view( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function lists( )
				{
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" ),
												"ptype" => getvar( "ptype", "" ),
												"catid" => $Rd2e691562d,
												"value" => doubleval( getvar( "value", 0 ) ),
												"allitems" => 1
								);
								$R4e420efcc3 = $this->hander->IProduct_PageForYkt( $data );
							
												$this->Assign( "items", $R4e420efcc3 );
												$this->View( );
								
				}

				public function Html( )
				{
								global $g_action;
								$g_action = "Detail";
								$R8e8b5578f7 = intval( request( "pid" ) );
								$this->Detail( $R8e8b5578f7, true, "ykt".DS."p".$R8e8b5578f7.".html" );
				}

				public function Detail( $R3584859062 = 0, $R9906335164 = false, $R511aa10c02 = "product/tmp.html" )
				{
								include( UPATH_HELPER."ArticleHelper.php" );
								include( UPATH_HELPER."ProductHelper.php" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$R8e8b5578f7 = $R3584859062;
								}
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc['pid'] ) || intval( $R3db8f5c8bc['sell'] ) == 0 || intval( $R3db8f5c8bc['forykt'] ) == 0 )
								{
												$R3656889a44 = UPATH_BASE.DS."ykt/p".$R8e8b5578f7.".html";
												$R0d48a0d7da = UPATH_BASE.DS."ykt/gotoerr.html";
												if ( file_exists( $R3656889a44 ) )
												{
																unlink( $R3656889a44 );
												}
												if ( file_exists( $R0d48a0d7da ) )
												{
																copy( $R0d48a0d7da, $R3656889a44 );
												}
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$Rcd0c741934 = $R3db8f5c8bc['catid'];
								if ( 0 < $Rcd0c741934 )
								{
												$R7492b0a14f = $this->GetListCache( $Rcd0c741934 );
								}
								$Rd2e748639f = array( );
								$R9a49bd5a37 = "";
								foreach ( $R7492b0a14f as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['forykt'] != 1 || $R0f8134fb60['sell'] != 1 || $R0f8134fb60['inrecycle'] == 1 )
												{
																continue;
												}
												if ( $R8e8b5578f7 == 0 )
												{
																$R8e8b5578f7 = $R0f8134fb60['pid'];
												}
												if ( $R0f8134fb60['yktpoints'] == "" || $R0f8134fb60['yktpoints'] == 0 )
												{
																$R0f8134fb60['yktpoints'] = $R0f8134fb60['listprice'] * 100;
												}
												if ( $R8e8b5578f7 == $R0f8134fb60['pid'] )
												{
																$R9a49bd5a37 = $R0f8134fb60['yktpoints']."|".$R0f8134fb60['pid'];
												}
												$Rd2e748639f[] = array(
																"value" => $R0f8134fb60['yktpoints']."|".$R0f8134fb60['pid'],
																"text" => $R0f8134fb60['ykttag'] == "" ? $R0f8134fb60['pname'] : $R0f8134fb60['ykttag']
												);
								}
								$this->Assign( "relateitem", $Rd2e748639f );
								if ( $R3db8f5c8bc['ptype'] == 3 || $R3db8f5c8bc['disparea'] == "1" )
								{
												$data = array(
																"cardok" => 1,
																"pid" => $R8e8b5578f7,
																"ptype" => 3
												);
												$R0e3550aa62 = factory::getinstance( "cards" );
												$R80769e79f5 = $R0e3550aa62->ICard_GetAllByLimit( $data, "cardnumber" );
												$this->Assign( "cards_rs", $R80769e79f5 );
								}
								$Rf6442d3e46 = $this->GetSysById( 28, 0 );
								if ( $Rf6442d3e46 == 1 )
								{
												$R2be63c99bf = factory::getinstance( "ad" );
												$Rdf791338e5 = $R8e8b5578f7 + 5000;
												$Rc7d9220699 = $R2be63c99bf->IAd_Get( $Rdf791338e5 );
												$Rb6a03871fd = array( );
												$Red8b28c232 = array( );
												$Ra2b9793c25 = array( );
												foreach ( $Rc7d9220699 as $R0f8134fb60 )
												{
																$Rb6a03871fd[] = $R0f8134fb60['url'];
																$Red8b28c232[] = $R0f8134fb60['text'];
																$Ra2b9793c25[] = UB_IMGURL.UPATH_WEBROOT.UPATH_SHARECONTENT."skins/upload/".$R0f8134fb60['pic'];
												}
												if ( count( $Ra2b9793c25 ) == 0 )
												{
																$Rdf791338e5 = 51;
																$Rc7d9220699 = $R2be63c99bf->IAd_Get( $Rdf791338e5 );
																foreach ( $Rc7d9220699 as $R0f8134fb60 )
																{
																				$Rb6a03871fd[] = $R0f8134fb60['url'];
																				$Red8b28c232[] = $R0f8134fb60['text'];
																				$Ra2b9793c25[] = UB_IMGURL.UPATH_WEBROOT.UPATH_SHARECONTENT."skins/upload/".$R0f8134fb60['pic'];
																}
												}
												$R06bb1cfac9 = "pics=".implode( "|", $Ra2b9793c25 )."&links=".implode( "|", $Rb6a03871fd )."&texts=".implode( "|", $Red8b28c232 );
								}
								else
								{
												$R06bb1cfac9 = "";
								}
								$R1c2c3ea2f7 = $this->GetSysById( 29, 0 );
								$name = $R3db8f5c8bc['ykttag'] == "" ? $R3db8f5c8bc['pname'] : $R3db8f5c8bc['ykttag'];
								$this->YktInit( $name, $R3db8f5c8bc['meta_keywords'], $R3db8f5c8bc['meta_description'] );
								$this->Assign( "defaultval", $R9a49bd5a37 );
								$this->Assign( "adstr", $R06bb1cfac9 );
								$R4c61569e4d = $this->GetSysById( 12, 0 );
								$this->Assign( "dispkf", $R4c61569e4d );
								$this->Assign( "dispbuyer", $R1c2c3ea2f7 );
							
												$this->GetTplCache( $R3db8f5c8bc, 0 );
												$this->view( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function Zone( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								header( "Content-type: text/html;charset=GB2312" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								if ( isset( $R3db8f5c8bc['ptype'] ) && $R3db8f5c8bc['sell'] == 1 && $R3db8f5c8bc['forykt'] == 1 )
								{
												$R0f8134fb60 = $this->hander->IProduct_GetCardStock( array(
																$R8e8b5578f7
												) );
												if ( $R3db8f5c8bc['onsup'] == 1 || $R3db8f5c8bc['sup'] == 1 || $R3db8f5c8bc['hassup'] == 1 )
												{
																$R0f8134fb60[$R8e8b5578f7] = $this->GetStocks( $R8e8b5578f7 ) + $R0f8134fb60[$R8e8b5578f7];
												}
												stockstate( $R0f8134fb60[$R8e8b5578f7], $R3db8f5c8bc['ptype'], 0, $R3db8f5c8bc['stocks'] );
												echo "|";
												if ( $R3db8f5c8bc['ptype'] == 3 && $R3db8f5c8bc['disparea'] == "1" )
												{
																echo "1|";
																$data = array(
																				"cardok" => 1,
																				"pid" => $R8e8b5578f7,
																				"ptype" => 3
																);
																$R0e3550aa62 = factory::getinstance( "cards" );
																$R80769e79f5 = $R0e3550aa62->ICard_GetAllByLimit( $data, "cardnumber" );
																$R026f0167b4 = array( );
																foreach ( $R80769e79f5 as $R0f8134fb60 )
																{
																				$R026f0167b4[] = $R0f8134fb60['cardnumber'];
																}
																echo implode( ",", $R026f0167b4 );
												}
								}
								else
								{
												echo -1;
								}
								exit( );
				}

				public function CheckTpl( )
				{
								$R0f571378e3 = intval( request( "cztpl" ) );
								$R808b89ba0e = 0;
								if ( 0 < $R0f571378e3 )
								{
										
																$R808b89ba0e = $this->UpdateTpl( $R0f571378e3 );
										
								}
								echo $R808b89ba0e;
				}

}

?>
