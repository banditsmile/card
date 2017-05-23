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
				}

				public function Index( $R3584859062 = 0, $R9906335164 = false, $R511aa10c02 = "list/tmp.html" )
				{
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rb515119e8d = getvar( "typesearch" );
								if ( $R9906335164 )
								{
												$Rd2e691562d = $R3584859062;
								}
								if ( !$R9906335164 && $Rd2e691562d == 0 && getvar( "pinyin" ) == "" )
								{
												$R7965cb3798 = getvar( "keywords" );
												if ( trim( $R7965cb3798 ) == "" )
												{
																$this->Alert( "关键词不能为空" );
																$this->HistoryGo( );
												}
								}
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$R71a664ef8c = $this->PageInfo( );
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$Rb62a6519ba = getvar( "pinyin" );
								if ( 0 < $Rd2e691562d )
								{
												$R4e420efcc3 = $this->GetListCache( $Rd2e691562d );
								}
								else if ( $Rb62a6519ba != "" )
								{
												if ( 1 < strlen( $Rb62a6519ba ) && $Rb62a6519ba != "09" )
												{
																$this->Alert( "参数错误" );
																$this->HistoryGo( );
												}
												$R4e420efcc3 = $this->GetPinYinCache( $Rb62a6519ba );
								}
								else
								{
												$data = array(
																"ptype" => getvar( "ptype", -1 ),
																"catid" => $Rd2e691562d,
																"pinyin" => $Rb62a6519ba,
																"forb2b" => 1,
																"sell" => 1,
																"checked" => 1,
																"parentid" => $Rac9b8532b8,
																"typesearch" => $Rb515119e8d,
																"bossids" => implode( ",", $R7fb26bbe56 )
												);
												$data = array_merge( $data, $R71a664ef8c );
												$data['nrows'] = 500;
												$this->hander = factory::getinstance( "products" );
												$R4e420efcc3 = $this->hander->IProduct_PageForB( $data, $Re2a6348a52, $R2a51483b14, $Rac9b8532b8, true );
								}
								if ( $Rb515119e8d != "category" )
								{
												$R4e420efcc3 = $this->FilterPi( $R4e420efcc3, $R7fb26bbe56 );
												$R4e420efcc3 = $this->RetPi( $R4e420efcc3 );
												$R4e420efcc3 = array(
																"item" => $R4e420efcc3
												);
												$R026f0167b4 = array( );
												$R300c46f603 = "";
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['pid'];
												}
												$this->Assign( "pids", implode( ",", $R026f0167b4 ) );
												if ( !$R9906335164 )
												{
																$R4e420efcc3 = $this->SetSNP( $R4e420efcc3, $R9aa102385f );
												}
												$this->Assign( "items", $R4e420efcc3['item'] );
								}
								else
								{
												$this->Assign( "items", $R4e420efcc3 );
								}
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->Assign( "html", $R9906335164 ? "1" : "0" );
								if ( $Rb515119e8d == "category" )
								{
												global $masterid;
												if ( 0 < $masterid )
												{
																$Rdc7dc55174 = $this->GetVipCategoryShowCache( );
																$R18ba711cb5 = array( );
																foreach ( $Rdc7dc55174 as $R0f8134fb60 )
																{
																				if ( $R0f8134fb60 != "" )
																				{
																								$R18ba711cb5[$R0f8134fb60] = 1;
																				}
																}
																$R28d7a3ac9c = array( );
																foreach ( $R4e420efcc3 as $R0f8134fb60 )
																{
																				$R28d7a3ac9c[$R0f8134fb60['id']] = 1;
																}
																$R026f0167b4 = array( );
																$R27752f5168 = $this->GetSubCatCache( );
																foreach ( $R27752f5168 as $R0f8134fb60 )
																{
																				if ( isset( $R18ba711cb5[$R0f8134fb60['id']], $R28d7a3ac9c[$R0f8134fb60['id']] ) )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																}
																$R4e420efcc3['item'] = $R026f0167b4;
																$this->Assign( "items", $R4e420efcc3['item'] );
												}
												$this->view( "category" );
								}
								else
								{
										
																$this->view( null, null, $R9906335164, $R511aa10c02 );
										
								}
				}

				public function Ykt( )
				{
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rb515119e8d = getvar( "typesearch" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$R71a664ef8c = $this->PageInfo( );
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$Rb62a6519ba = getvar( "pinyin" );
								$data = array(
												"ptype" => 100,
												"catid" => $Rd2e691562d,
												"pinyin" => $Rb62a6519ba,
												"forb2b" => 1,
												"sell" => 1,
												"checked" => 1,
												"parentid" => $Rac9b8532b8,
												"typesearch" => $Rb515119e8d,
												"bossids" => implode( ",", $R7fb26bbe56 )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$data['nrows'] = 200;
								$this->hander = factory::getinstance( "products" );
								$R4e420efcc3 = $this->hander->IProduct_PageForB( $data, $Re2a6348a52, $R2a51483b14, $Rac9b8532b8, true );
								$R4e420efcc3 = $this->FilterPi( $R4e420efcc3, $R7fb26bbe56 );
								$R4e420efcc3 = $this->RetPi( $R4e420efcc3 );
								$R4e420efcc3 = array(
												"item" => $R4e420efcc3
								);
								if ( $Rb515119e8d != "category" )
								{
												$R026f0167b4 = array( );
												$R300c46f603 = "";
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['pid'];
												}
												$this->Assign( "pids", implode( ",", $R026f0167b4 ) );
												$R4e420efcc3 = $this->SetSNP( $R4e420efcc3, $R9aa102385f );
								}
								$this->Assign( "items", $R4e420efcc3['item'] );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->Assign( "html", "0" );
								$this->view( );
				}

				public function SetSNP( $R4e420efcc3, $R9aa102385f )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								if ( $R198d213635 )
								{
												$R3a8b307327 = $this->GetDec( );
								}
								$R026f0167b4 = array( );
								$Rd451e8a5f2 = array( );
								$Rf34a38f798 = array( );
								$R47cfdbac82 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												if ( $R198d213635 )
												{
												}
												else
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = "---";
												}
												$R1b69c92460 = $R4e420efcc3['item'][$Ra16d228039]['ptype'];
												$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
												if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 )
												{
																$Rf34a38f798[] = $R8e8b5578f7;
												}
												else if ( 99 < $R1b69c92460 )
												{
																$Rd451e8a5f2[] = $R8e8b5578f7;
												}
												if ( $this->NeedSup( $R4e420efcc3['item'][$Ra16d228039] ) )
												{
																$R47cfdbac82[] = $R8e8b5578f7;
												}
												$R026f0167b4[] = $R8e8b5578f7;
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( 0 < count( $R026f0167b4 ) )
								{
												if ( $R198d213635 )
												{
																$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $R9aa102385f, $R3a8b307327, $R3359c04a1b );
												}
												include_once( UPATH_HELPER."ProductHelper.php" );
												$R8d364004b1 = count( $Rf34a38f798 );
												$R4fecab2dce = count( $Rd451e8a5f2 );
												$Raaa87f4365 = count( $R47cfdbac82 );
												if ( 0 < $R8d364004b1 || 0 < $R4fecab2dce )
												{
																$this->hander = factory::getinstance( "products" );
												}
												if ( 0 < $R8d364004b1 )
												{
																$R8ba1287668 = $this->hander->IProduct_GetCardStock( $Rf34a38f798 );
												}
												else
												{
																$R8ba1287668 = array( );
												}
												if ( 0 < $R4fecab2dce )
												{
																$R9eefe63324 = $this->hander->IProduct_GetYktStock( $Rd451e8a5f2 );
												}
												else
												{
																$R9eefe63324 = array( );
												}
												if ( 0 < $Raaa87f4365 )
												{
																$R74497ab307 = implode( ",", $R47cfdbac82 );
																$R778bf3b683 = $this->GetStocksCollection( $R74497ab307."," );
												}
												else
												{
																$R778bf3b683 = array( );
												}
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'] );	$Ra16d228039++	)
												{
																$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
																$R54951dfde9 = 0 < $R8d364004b1 && isset( $R8ba1287668[$R8e8b5578f7] ) ? $R8ba1287668[$R8e8b5578f7] : 0;
																$Ref7be6595c = 0 < $R4fecab2dce && isset( $R9eefe63324[$R8e8b5578f7] ) ? $R9eefe63324[$R8e8b5578f7] : 0;
																$Rcdcb991232 = isset( $R778bf3b683[$R8e8b5578f7] ) ? $R778bf3b683[$R8e8b5578f7] : 0;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = $R54951dfde9 + $Rcdcb991232;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = stockstate( $R4e420efcc3['item'][$Ra16d228039]['stocks'], $R4e420efcc3['item'][$Ra16d228039]['ptype'], $Ref7be6595c, $R4e420efcc3['item'][$Ra16d228039]['mystocks'], 1 );
												}
												unset( $R54951dfde9 );
												unset( $Ref7be6595c );
												unset( $R778bf3b683 );
								}
								unset( $R026f0167b4 );
								unset( $Rd451e8a5f2 );
								unset( $Rf34a38f798 );
								unset( $R47cfdbac82 );
								return $R4e420efcc3;
				}

				public function Category( )
				{
								
												$this->View( );
								
				}

				public function RankTplPrice( )
				{
								$this->AgentPrice( );
				}

				public function AgentPrice( )
				{
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rb515119e8d = getvar( "typesearch" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								global $masterid;
								if ( 0 < $masterid )
								{
												$R8bce2d676e = $this->ShowMainProduct( );
												if ( $R8bce2d676e == 0 )
												{
																$GLOBALS['_REQUEST']['nrows'] = 3000;
												}
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"catid" => $Rd2e691562d,
												"pinyin" => getvar( "pinyin" ),
												"forb2b" => 1,
												"sell" => 1,
												"checked" => 1,
												"parentid" => $Rac9b8532b8,
												"typesearch" => $Rb515119e8d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$data['nrows'] = 25;
								$this->hander = factory::getinstance( "products" );
								$R4e420efcc3 = $this->hander->IProduct_PageForB( $data, $Re2a6348a52, $R2a51483b14, $Rac9b8532b8 );
								$R4e420efcc3['item'] = $this->FilterPi( $R4e420efcc3['item'], $R7fb26bbe56 );
								$R4e420efcc3['item'] = $this->RetPi( $R4e420efcc3['item'] );
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								if ( $R198d213635 )
								{
												$R3a8b307327 = $this->GetDec( );
								}
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												if ( $R198d213635 )
												{
												}
												else
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = "---";
												}
												$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039]['pid'];
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( $R3359c04a1b != "" && $R198d213635 )
								{
												$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $R9aa102385f, $R3a8b307327, $R3359c04a1b );
								}
								if ( getvar( "a" ) == "RankTplPrice" )
								{
												$R014535cc1a = intval( request( "pricetpl" ) );
												if ( 0 < $R014535cc1a )
												{
																$Rf00621a200 = factory::getinstance( "priceagent" );
																$Raa4d6c9903 = $Rf00621a200->IPriceAgent_GetByLimit( "pricetpl = ".$R014535cc1a." and pid in (".$R3359c04a1b.")" );
																$R888e816784 = array( );
																foreach ( $Raa4d6c9903 as $R0f8134fb60 )
																{
																				$R888e816784[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
																}
																$this->Assign( "parray", $R888e816784 );
												}
												$name = getvar( "name" );
												$this->Assign( "name", $name );
												$this->Assign( "pricetpl", $R014535cc1a );
								}
								if ( getvar( "a" ) == "PriceMy" )
								{
												$R0018526148 = factory::getinstance( "pricemy" );
												$R812b5fc549 = $R0018526148->IPriceMy_GetByLimit( "aid = ".$R2a51483b14." and pid in (".$R3359c04a1b.")" );
												$R888e816784 = array( );
												foreach ( $R812b5fc549 as $R0f8134fb60 )
												{
																$R888e816784[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
												}
												$this->Assign( "parray", $R888e816784 );
								}
								$this->Assign( "aid", $R2a51483b14 );
								$this->FillPage( $data, $R4e420efcc3 );
								include( UPATH_HELPER."ProductHelper.php" );
								
												$this->View( );
								
				}

				public function PriceMy( )
				{
								$this->AgentPrice( );
				}

				public function PrivatePriceProduct( )
				{
								$this->AgentPrice( );
				}

				public function PrivatePriceProductSet( )
				{
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rb515119e8d = getvar( "typesearch" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$R4c4e792da9 = intval( request( "aid" ) );
								$R2f07e1d8b8 = $this->GetAgentCache( $R4c4e792da9 );
								if ( !isset( $R2f07e1d8b8['parentid'] ) || $R2f07e1d8b8['parentid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								global $masterid;
								if ( 0 < $masterid )
								{
												$R8bce2d676e = $this->ShowMainProduct( );
												if ( $R8bce2d676e == 0 )
												{
																$GLOBALS['_REQUEST']['nrows'] = 3000;
												}
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"catid" => $Rd2e691562d,
												"pinyin" => getvar( "pinyin" ),
												"forb2b" => 1,
												"sell" => 1,
												"checked" => 1,
												"parentid" => $Rac9b8532b8,
												"typesearch" => $Rb515119e8d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$data['nrows'] = 25;
								$this->hander = factory::getinstance( "products" );
								$R4e420efcc3 = $this->hander->IProduct_PageForB( $data, $Re2a6348a52, $R2a51483b14, $Rac9b8532b8 );
								$R4e420efcc3['item'] = $this->FilterPi( $R4e420efcc3['item'], $R7fb26bbe56 );
								$R4e420efcc3['item'] = $this->RetPi( $R4e420efcc3['item'] );
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								if ( $R198d213635 )
								{
												$R3a8b307327 = $this->GetDec( );
								}
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												if ( $R198d213635 )
												{
												}
												else
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = "---";
												}
												$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039]['pid'];
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( $R3359c04a1b != "" )
								{
												if ( $R198d213635 )
												{
																$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $R9aa102385f, $R3a8b307327, $R3359c04a1b );
												}
												$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $R2f07e1d8b8, $R3a8b307327, $R3359c04a1b, "underlingprice" );
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
								$R046b4585a2 = $this->GetRCache( );
								$this->Assign( "rank", $R046b4585a2 );
								include_once( UPATH_HELPER."ProductHelper.php" );
								
												$this->Assign( "aid", $R4c4e792da9 );
												$this->Assign( "underling", $R2f07e1d8b8 );
												$this->view( );
								
				}

				public function ViewAgentPrice( $R3584859062 = 0 )
				{
								$Rcc5c6e696c = $this->session->agent;
								if ( $Rcc5c6e696c != "" )
								{
												list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
												$agent = $this->GetAgentCache( $R2a51483b14 );
												$Rac9b8532b8 = $agent['parentid'];
								}
								else
								{
												$R2a51483b14 = 0;
												$Re2a6348a52 = 0;
												$Rac9b8532b8 = 0;
								}
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$R8e8b5578f7 = $R3584859062;
								}
								$this->hander = factory::getinstance( "products" );
								$R63d0786ecc = $this->hander->IProduct_GetPriceById( $R8e8b5578f7, $R2a51483b14 );
								$R929dd26268 = 0;
								if ( count( $R63d0786ecc ) == 0 )
								{
												$R929dd26268 = 1;
												$R63d0786ecc = $this->hander->IProduct_GetPriceById( $R8e8b5578f7, 0 );
												$R399677c4c7 = 0;
								}
								else
								{
												$R399677c4c7 = $R63d0786ecc['id'];
								}
								$Ref41d9513d = $this->GetProductCache( $R8e8b5578f7 );
								$R6fda891d52 = false;
								if ( $Ref41d9513d['tosys'] == 1 && $Ref41d9513d['aid'] == $R2a51483b14 )
								{
												$R6fda891d52 = true;
								}
								$R046b4585a2 = $this->GetRCache( );
								$R6c57ecdc8f = $this->GetRank( $Re2a6348a52 );
								$R1cc5d7155d = $R6c57ecdc8f['gid'];
								$R4906cf6137 = $this->GetRank( $Rcc5c6e696c[5] );
								if ( $R6fda891d52 )
								{
												$R1cc5d7155d = 10;
								}
								$R4420266e85 = $this->GetRankType( );
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( $R6fda891d52 )
												{
																if ( 0 < $R0f8134fb60['gid'] )
																{
																				$R026f0167b4[] = array(
																								"id" => $R0f8134fb60['id'],
																								"name" => $R0f8134fb60['name'],
																								"price" => $R4c97fa9810
																				);
																}
												}
												else if ( $R4420266e85 )
												{
																if ( $R0f8134fb60['gid'] < $R4906cf6137['gid'] && $R0f8134fb60['money'] < $R4906cf6137['money'] && 0 < $R0f8134fb60['gid'] )
																{
																				$R4c97fa9810 = isset( $R63d0786ecc["price_".$R0f8134fb60['id']] ) ? $R63d0786ecc["price_".$R0f8134fb60['id']] : $Ref41d9513d['listprice'];
																				$R026f0167b4[] = array(
																								"id" => $R0f8134fb60['id'],
																								"name" => $R0f8134fb60['name'],
																								"price" => $R4c97fa9810
																				);
																}
												}
												else if ( $R0f8134fb60['money'] < $R4906cf6137['money'] && 0 < $R0f8134fb60['gid'] )
												{
																$R4c97fa9810 = isset( $R63d0786ecc["price_".$R0f8134fb60['id']] ) ? $R63d0786ecc["price_".$R0f8134fb60['id']] : $Ref41d9513d['listprice'];
																$R026f0167b4[] = array(
																				"id" => $R0f8134fb60['id'],
																				"name" => $R0f8134fb60['name'],
																				"price" => $R4c97fa9810
																);
												}
								}
								$R082c14652c = $this->GetPriceById( $Ref41d9513d, $agent, $this->GetDec( ) );
								$this->Assign( "myprice", $R082c14652c );
							
												$this->Assign( "items", $R026f0167b4 );
												$this->Assign( "product", $Ref41d9513d );
												$this->Assign( "priceid", $R399677c4c7 );
												$this->View( );
								
				}

				public function SaveAgentPrice( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$Rac9b8532b8 = $Rcc5c6e696c[4];
								$Re2a6348a52 = $Rcc5c6e696c[5];
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = getvar( "id" );
								$R399677c4c7 = intval( request( "priceid" ) );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array( );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$R55c494bb27 = $this->GetProductCache( $R8e8b5578f7 );
								$R4f39743f74 = $this->GetPriceById( $R55c494bb27, $agent, $this->GetDec( ) );
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$R4c97fa9810 = doubleval( request( "price_".$R0f8134fb60 ) );
												if ( $R4c97fa9810 < $R4f39743f74 )
												{
																$this->Alert( "价格不允许低于您的进货价，重新设置吧！" );
																$this->HistoryGo( );
												}
												$data["price_".$R0f8134fb60] = doubleval( request( "price_".$R0f8134fb60 ) );
								}
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								$R37beb71e37 = $R5ff3ab27b8->IPrice_IsExist( $R8e8b5578f7, $R2a51483b14 );
								if ( 0 < $R399677c4c7 )
								{
												if ( $R37beb71e37 )
												{
																$R5ff3ab27b8->IPrice_Update( $data, $R399677c4c7 );
												}
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['pid'] = $R8e8b5578f7;
												if ( !$R37beb71e37 )
												{
																$R5ff3ab27b8->IPrice_Create( $data );
												}
								}
								$this->Alert( "更新成功！" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=product&a=ViewAgentPrice&pid=".$R8e8b5578f7 );
				}

				public function Html( )
				{
								global $g_action;
								$g_action = "Detail";
								$R8e8b5578f7 = intval( request( "pid" ) );
								$this->Detail( $R8e8b5578f7, true, "b2b".DS."p".$R8e8b5578f7.".html" );
				}

				public function CheckCanBuyTime( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$R5b08d4f823 = $agent['regdate'];
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$R52690cedc4 = 0;
								$Ra7875614d8 = explode( "|", $R30b2ab8dc1['config'] );
								if ( isset( $Ra7875614d8[32] ) )
								{
												$R52690cedc4 = $Ra7875614d8[32];
								}
								if ( $R52690cedc4 <= 0 )
								{
												return 0;
								}
								$R768ed9c2d9 = "30分钟";
								switch ( $R52690cedc4 )
								{
								case 1800 :
												$R768ed9c2d9 = "30分钟";
												break;
								case 3600 :
												$R768ed9c2d9 = "1小时";
												break;
								case 10800 :
												$R768ed9c2d9 = "3小时";
												break;
								case 21600 :
												$R768ed9c2d9 = "6小时";
												break;
								case 43200 :
												$R768ed9c2d9 = "12小时";
												break;
								case 172800 :
												$R768ed9c2d9 = "48小时";
												break;
								case 259200 :
												$R768ed9c2d9 = "3天";
												break;
								case 432000 :
												$R768ed9c2d9 = "5天";
												break;
								case 604800 :
												$R768ed9c2d9 = "7天";
												break;
								default :
												break;
								}
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								if ( $R35a9abe007 < $R52690cedc4 )
								{
												$this->Alert( "您好，系统设置新注册用户".$R768ed9c2d9."后才能购卡！" );
												$this->CloseWin( );
								}
				}

				public function Detail( $R3584859062 = 0, $R9906335164 = false, $R511aa10c02 = "product/tmp.html" )
				{
								$this->CheckCanBuyTime( );
								include( UPATH_HELPER."ArticleHelper.php" );
								include( UPATH_HELPER."ProductHelper.php" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$R8e8b5578f7 = $R3584859062;
								}
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "参数错误" );
												$this->CloseWin( );
								}
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc['sell'] ) || intval( $R3db8f5c8bc['sell'] ) == 0 || $R3db8f5c8bc['forb2b'] == 0 )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->CloseWin( );
								}
								$Rf05cb9bec5 = intval( $R3db8f5c8bc['sale'] );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								if ( 0 < $R3db8f5c8bc['aid'] )
								{
												$R3db8f5c8bc['owner'] = $R3db8f5c8bc['aid'];
												$R4e420efcc3 = $this->FilterPi( array(
																$R3db8f5c8bc
												), $R7fb26bbe56 );
												if ( !isset( $R4e420efcc3[0]['pid'] ) )
												{
																$this->Alert( "商品不存在！" );
																$this->HistoryGo( );
												}
								}
								$R45a48605c5 = 0;
								if ( $R3db8f5c8bc['sup'] == 1 || $R3db8f5c8bc['onsup'] == 1 || $R3db8f5c8bc['hassup'] == 1 )
								{
												$R355ef3fa24 = $this->GetCzInfo( $R8e8b5578f7, $R3db8f5c8bc['cztpl'] );
												if ( isset( $R355ef3fa24['v'] ) )
												{
																$R7894b33158 = false;
																$data = array( );
																$Rc28d922133 = intval( $R355ef3fa24['cztpl'] );
																$R558acfa73f = 0;
																$Rb321ab3f5e = $this->GetFxCache( );
																$R96e20b4752 = $Rb321ab3f5e['curfx'];
																$R3a8b307327 = $this->GetDec( );
																$Rf64b3b1325 = $R96e20b4752 * $R355ef3fa24['supprice'];
																$Rf64b3b1325 = round( $Rf64b3b1325, $R3a8b307327 );
																if ( $R3db8f5c8bc['price'] < $Rf64b3b1325 && $Rf05cb9bec5 == 0 )
																{
																				$R7894b33158 = true;
																				$data['price'] = $Rf64b3b1325;
																				$this->Alert( "系统对商品价格进行了调整，您可以查看进货价后再下单！" );
																}
																if ( $R3db8f5c8bc['cztpl'] != $Rc28d922133 && $R3db8f5c8bc['ptype'] == 1 && 0 < $Rc28d922133 )
																{
																				$R7894b33158 = true;
																				$data['cztpl'] = $Rc28d922133;
																}
																if ( $R7894b33158 )
																{
																				$R558acfa73f = $this->AutoAdjustPrice( );
																				if ( $R558acfa73f == 1 )
																				{
																								$R422f9a4efb = factory::getinstance( "products" );
																								$R808b89ba0e = $R422f9a4efb->IProduct_Update( $data, $R8e8b5578f7 );
																								if ( $R808b89ba0e == false )
																								{
																												$R2145464ecd = false;
																								}
																								else
																								{
																												$this->UpdateCache( "products", array(
																																"arg1" => $R8e8b5578f7
																												) );
																												$this->UpdateCache( "list", array(
																																"arg1" => $R3db8f5c8bc['catid']
																												) );
																												$Rb62a6519ba = $R3db8f5c8bc['pinyin'];
																												if ( $Rb62a6519ba != "" )
																												{
																																if ( "0" < $Rb62a6519ba && $Rb62a6519ba < "9" )
																																{
																																				$Rb62a6519ba = "09";
																																}
																																$this->UpdateCache( "pinyin", array(
																																				"arg1" => $Rb62a6519ba
																																) );
																												}
																								}
																								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&a=Detail&pid=".$R8e8b5578f7 );
																				}
																}
																if ( $R3db8f5c8bc['price'] < $Rf64b3b1325 && $Rf05cb9bec5 == 0 )
																{
																				$this->Alert( "商品价格设置错误，请联系管理员修改！" );
																				$this->CloseWin( );
																}
																if ( $R3db8f5c8bc['ptype'] == 1 && 0 < $R3db8f5c8bc['cztpl'] )
																{
																				$R47d14bb6ff = $this->GetTplVer( $R3db8f5c8bc['cztpl'] );
																				$R7a83769a63 = intval( $R355ef3fa24['ver'] );
																				if ( $R47d14bb6ff < $R7a83769a63 )
																				{
																								$R45a48605c5 = 1;
																				}
																}
																if ( isset( $R355ef3fa24['ptype'] ) && $R355ef3fa24['ptype'] != 9999 )
																{
																				$R1b69c92460 = $R3db8f5c8bc['ptype'];
																				if ( $R3db8f5c8bc['ptype'] == 3 )
																				{
																								$R1b69c92460 = 0;
																				}
																				if ( $R1b69c92460 != $R355ef3fa24['ptype'] )
																				{
																								$this->Alert( "商品类型设置错误，请联系管理员修改！" );
																								$this->CloseWin( );
																				}
																}
																$R355ef3fa24['v'] = explode( ",", $R355ef3fa24['v'] );
																$R355ef3fa24['txt'] = explode( ",", $R355ef3fa24['txt'] );
																$this->Assign( "info", $R355ef3fa24 );
												}
												else
												{
																$this->Alert( "网络通信错误，请稍后购买！" );
																$this->CloseWin( );
												}
								}
								global $masterid;
								if ( 0 < $masterid )
								{
												$R8bce2d676e = $this->ShowMainProduct( );
												if ( $R8bce2d676e == 0 )
												{
																$R4e420efcc3 = $this->RetPi( array(
																				"0" => $R3db8f5c8bc
																) );
																if ( !isset( $R4e420efcc3[0]['ptype'] ) )
																{
																				$this->Alert( "商品不存在！" );
																				$this->HistoryGo( );
																}
												}
												if ( $R3db8f5c8bc['ptype'] == 100 && UB_YKT )
												{
																global $baseurl;
																$R25791b03ad = $this->GetWebCache( );
																$R04c573beda = $R3db8f5c8bc['czweb'];
																if ( $R04c573beda != "" )
																{
																				$Re9e1ab487e = explode( "/", $R04c573beda );
																				$Rf5f11a8d38 = count( $Re9e1ab487e );
																				$R24d59cd0b7 = $Rf5f11a8d38 - 1;
																				if ( 0 < $R24d59cd0b7 )
																				{
																								$Ra3d52e52a4 = $Re9e1ab487e[$Rf5f11a8d38 - 1];
																								$Ra3d52e52a4 = str_replace( "p", "", $Ra3d52e52a4 );
																								$Ra3d52e52a4 = intval( $Ra3d52e52a4 );
																								$R04c573beda = $R25791b03ad['website'].$baseurl."/ykt/i.php?".$Ra3d52e52a4;
																								$R3db3f34c53 = $R04c573beda;
																								$R3db8f5c8bc['czweb'] = $R3db3f34c53;
																								$R3db8f5c8bc['web'] = $R3db3f34c53;
																				}
																}
												}
								}
								if ( $R3db8f5c8bc['ptype'] == 3 && $R3db8f5c8bc['disparea'] == "1" )
								{
												$data = array(
																"cardok" => 1,
																"pid" => $R8e8b5578f7,
																"ptype" => 3
												);
												$R0e3550aa62 = factory::getinstance( "cards" );
												$R80769e79f5 = $R0e3550aa62->ICard_GetAllByLimit( $data, "cardnumber" );
												$R026f0167b4 = array( );
												foreach ( $R80769e79f5 as $Rf0362d164b )
												{
																$R026f0167b4[] = $Rf0362d164b['cardnumber'];
												}
												$this->Assign( "cardrs", $R026f0167b4 );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$this->ViewData['web']['title'] = $R3db8f5c8bc['pname'];
								$Re0b6343833 = intval( request( "scoredpid" ) );
								if ( 0 < $Re0b6343833 )
								{
												$Rc4bb6673c7 = $this->GetScoredProductCache( $Re0b6343833 );
												$this->Assign( "cp", $Rc4bb6673c7 );
								}
								$this->Assign( "scoredpid", $Re0b6343833 );
								
												$this->GetTplCache( $R3db8f5c8bc, $R45a48605c5 );
												$this->view( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function Zone( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								header( "Content-type: text/html;charset=GB2312" );
								$R7d2c561fef = intval( request( "nostock" ) );
								$R3a8b307327 = $this->GetDec( );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								if ( isset( $R3db8f5c8bc['ptype'] ) )
								{
												$R0f8134fb60 = $R3db8f5c8bc;
												echo "读取中..";
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R198d213635 = 1;
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
																if ( !isset( $Re9aea161f5['canseeprice'] ) )
																{
																				$R198d213635 = 0;
																}
																else
																{
																				$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
																}
												}
												echo "|";
												if ( $R198d213635 )
												{
																$agent = $this->GetAgentCache( intval( $R2a51483b14 ) );
																echo $this->GetPriceById( $R0f8134fb60, $agent, $R3a8b307327 );
												}
												else
												{
																echo "---";
												}
												echo "|-1";
												echo "|";
												echo $R0f8134fb60['click'];
												echo "|";
												$R1ed7ad9990 = PCACHE."pricemy.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																$this->UpdateCache( "pricemy" );
												}
												include( $R1ed7ad9990 );
												if ( strpos( ",".$Rbe7d360c2b.",", ",".$R2a51483b14."," ) === false )
												{
																echo $R0f8134fb60['listprice'];
												}
												else
												{
																$R0018526148 = factory::getinstance( "pricemy" );
																$R494af0fa28 = $R0018526148->IPriceMy_GetByLimit( " pid=".$R8e8b5578f7." and aid=".$R2a51483b14 );
																if ( isset( $R494af0fa28[0]['price'] ) )
																{
																				echo $R494af0fa28[0]['price'];
																}
																else
																{
																				echo $R0f8134fb60['listprice'];
																}
												}
												echo "|";
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$R832cdf573a = $_COOKIE['umebiz_com_4'];
																$R52ca5ec345 = $_COOKIE['umebiz_com_ini_0'];
																$Rf45964fbba = $R832cdf573a && $R52ca5ec345;
																echo intval( $Rf45964fbba );
												}
												else
												{
																$Rf45964fbba = isset( $_COOKIE['umebiz_com_11'] ) ? $_COOKIE['umebiz_com_11'] : 0;
																echo intval( $Rf45964fbba );
												}
								}
								else
								{
												echo "<font color=\"#cccccc\">商品已经不存在</font>";
								}
								exit( );
				}

				public function Most( )
				{
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Rcc5c6e696c = $this->session->agent;
								$R2fa4b8c965 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$R1b69c92460 = getvar( "ptype" );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								if ( $Rbdf46d6e43 == 0 )
								{
												$R36130a8639 = $R1b69c92460;
								}
								else if ( $Rbdf46d6e43 == 2 )
								{
												$R36130a8639 = $R1b69c92460."|s";
								}
								else if ( $Rbdf46d6e43 == 1 )
								{
												$R36130a8639 = $R1b69c92460."|w";
								}
								else if ( $Rbdf46d6e43 == -1 )
								{
												$R36130a8639 = $R1b69c92460."|u";
								}
								else
								{
												$R36130a8639 = $R1b69c92460;
								}
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R0dc0347d49 = $Rcc5c6e696c[10];
								}
								else
								{
												$R0dc0347d49 = getvar( "staffname" );
								}
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"ordstate" => $Rbdf46d6e43,
												"optype" => $R36130a8639,
												"cname" => $R0dc0347d49,
												"aname" => $R2fa4b8c965,
												"payment" => getvar( "payment" )
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c );
								$data['nrows'] = 2000;
								$R4e420efcc3 = $Rdeabc7f106->IOrder_Sample( $data );
								$R4e420efcc3 = $this->FilterPi( $R4e420efcc3, $R7fb26bbe56 );
								$R4e420efcc3 = $this->RetPi( $R4e420efcc3 );
								$R026f0167b4 = array( );
								foreach ( $R4e420efcc3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$Re2a6348a52 = $Rcc5c6e696c[5];
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$R4e420efcc3 = $this->SetSNP( array(
												"item" => $R4e420efcc3
								), $R9aa102385f );
								$this->Assign( "pids", implode( ",", $R026f0167b4 ) );
							
												$this->Assign( "items", $R4e420efcc3['item'] );
												$this->View( );
								
				}

				public function PInfo( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								include_once( UPATH_HELPER."ArticleHelper.php" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								global $masterid;
								if ( 0 < $masterid && $R3db8f5c8bc['ptype'] == 100 && UB_YKT )
								{
												global $baseurl;
												$R25791b03ad = $this->GetWebCache( );
												$R04c573beda = $R3db8f5c8bc['czweb'];
												if ( $R04c573beda != "" )
												{
																$Re9e1ab487e = explode( "/", $R04c573beda );
																$Rf5f11a8d38 = count( $Re9e1ab487e );
																$R24d59cd0b7 = $Rf5f11a8d38 - 1;
																if ( 0 < $R24d59cd0b7 )
																{
																				$Ra3d52e52a4 = $Re9e1ab487e[$Rf5f11a8d38 - 1];
																				$Ra3d52e52a4 = str_replace( "p", "", $Ra3d52e52a4 );
																				$Ra3d52e52a4 = intval( $Ra3d52e52a4 );
																				$R04c573beda = $R25791b03ad['website'].$baseurl."/ykt/i.php?".$Ra3d52e52a4;
																				$R3db8f5c8bc['czweb'] = $R04c573beda;
																				$R3db8f5c8bc['web'] = $R04c573beda;
																}
												}
								}
							
								
												$this->Assign( "item", $R3db8f5c8bc );
												$this->View( );
								
				}

				public function PSupInfo( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								$R2a51483b14 = 0;
								$Rb32f694545 = 1;
								if ( isset( $R3db8f5c8bc['aid'] ) )
								{
												$R2a51483b14 = $R3db8f5c8bc['aid'];
												if ( 0 < $R2a51483b14 )
												{
																$R3db8f5c8bc = $this->GetAgentCache( $R2a51483b14 );
																$R0fecfc282a = array( );
																if ( $R3db8f5c8bc['mobile'] == "" )
																{
																				$R0fecfc282a = explode( ",", $R3db8f5c8bc['atel'] );
																}
																$R9b33737e82 = explode( ",", $R3db8f5c8bc['aqq'] );
																$R3db8f5c8bc = array(
																				"pid" => $R8e8b5578f7,
																				"company" => $R3db8f5c8bc['company'],
																				"aqq" => $R9b33737e82,
																				"atel" => $R0fecfc282a
																);
																$Rb32f694545 = $this->GetSysById( 16, 0 );
												}
								}
								if ( $R2a51483b14 <= 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
												$R9b33737e82 = array( );
												$R10e8c980e1 = explode( "|", $R30b2ab8dc1['qq'] );
												if ( isset( $R10e8c980e1['0'] ) )
												{
																$R9b33737e82 = explode( ",", $R10e8c980e1['0'] );
												}
												$R0fecfc282a = array( );
												$R6e0f7e0b0d = explode( "|", $R30b2ab8dc1['tel'] );
												if ( isset( $R6e0f7e0b0d['0'] ) )
												{
																$R0fecfc282a = explode( ",", $R6e0f7e0b0d['0'] );
												}
												$R3db8f5c8bc = array(
																"pid" => $R8e8b5578f7,
																"company" => "系统",
																"aqq" => $R9b33737e82,
																"atel" => $R0fecfc282a
												);
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "cansee", $Rb32f694545 );
								
												$this->View( );
								
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
