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
class PSController extends Controller
{

				public $hander = NULL;
				public $action = NULL;
				public $service = NULL;

				public function __construct( )
				{
								global $g_action;
								$this->hander = factory::getinstance( "products" );
								$this->service = factory::getservice( "sproducts" );
								$this->action = array( "prdlist", "prddelete", "prdedit", "prdedit", "profit" );
				}

				public function Index( )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$Rfff462d8f8 = intval( request( "allaid", -1 ) );
								$tpl = getvar( "tpl" );
								$R71a664ef8c = $this->PageInfo( );
								$R1b69c92460 = getvar( "ptype", "-1" );
								$data = array(
												"ptype" => $R1b69c92460,
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8,
												"tpl" => $tpl
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IProduct_PageQuery( $data );
								$R300c46f603 = "";
								foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
								{
												if ( UB_SUP == 1 && ( $R0f8134fb60['hassup'] == 1 || $R0f8134fb60['onsup'] == 1 ) )
												{
																$R300c46f603 = $R300c46f603.$R0f8134fb60['pid'].",";
												}
								}
								$R026f0167b4 = array( );
								include_once( UPATH_HELPER."ProductHelper.php" );
								if ( $R300c46f603 != "" )
								{
												$R778bf3b683 = $this->GetStocksCollection( $R300c46f603 );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'] );	$Ra16d228039++	)
												{
																if ( $R4e420efcc3['item'][$Ra16d228039]['hassup'] == 1 || $R4e420efcc3['item'][$Ra16d228039]['onsup'] == 1 )
																{
																				$Rcdcb991232 = isset( $R778bf3b683[$R4e420efcc3['item'][$Ra16d228039]['pid']] ) ? $R778bf3b683[$R4e420efcc3['item'][$Ra16d228039]['pid']] : 0;
																				$Reb22bf3c0f = $R4e420efcc3['item'][$Ra16d228039]['stocks'] + $Rcdcb991232;
																				$R4e420efcc3['item'][$Ra16d228039]['totlestocks'] = productstock( $Reb22bf3c0f );
																				$R4e420efcc3['item'][$Ra16d228039]['supstocks'] = productstock( $Rcdcb991232 );
																				if ( $Reb22bf3c0f <= 0 )
																				{
																								$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039];
																				}
																}
																else
																{
																				$R4e420efcc3['item'][$Ra16d228039]['totlestocks'] = productstock( $R4e420efcc3['item'][$Ra16d228039]['stocks'] );
																				$R4e420efcc3['item'][$Ra16d228039]['supstocks'] = "<font color=\"#6c6c6c\">�޹�����</font>";
																				if ( $R4e420efcc3['item'][$Ra16d228039]['stocks'] <= 0 )
																				{
																								$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039];
																				}
																}
												}
								}
								else
								{
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'] );	$Ra16d228039++	)
												{
																$R4e420efcc3['item'][$Ra16d228039]['totlestocks'] = productstock( $R4e420efcc3['item'][$Ra16d228039]['stocks'] );
																$R4e420efcc3['item'][$Ra16d228039]['supstocks'] = "<font color=\"#6c6c6c\">�޹�����</font>";
																if ( $R4e420efcc3['item'][$Ra16d228039]['stocks'] <= 0 )
																{
																				$R026f0167b4[] = $R4e420efcc3['item'][$Ra16d228039];
																}
												}
								}
								if ( $tpl == "NoStocks" )
								{
												$R4e420efcc3['info']['totlerow'] = count( $R026f0167b4 );
												$R4e420efcc3['item'] = $R026f0167b4;
								}
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "0" => "������Ʒ", "1" => "�Զ���ֵ", "2" => "������Ʒ", "3" => "������" );
								if ( UB_YKT )
								{
												$R00be52aa45[] = "�һ���һ��ͨ";
								}
								if ( UB_B2C || UB_B2B )
								{
												$R00be52aa45[] = "��ֵ��һ��ͨ";
								}
								$R63bede6b19 = $Rfff462d8f8 == 1 ? "aid > 0" : "aid < 1";
								$this->Recycle( "products", $R63bede6b19 );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
								if ( $tpl != "" )
								{
												$this->view( $tpl );
								}
								else
								{
									
																$this->view( );
									
								}
				}

				public function NoStocks( )
				{
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function Stock( )
				{
								if ( intval( request( "ptype" ) == 0 ) )
								{
												$this->Assign( "tabletitle", "����" );
								}
								else
								{
												$this->Assign( "tabletitle", "��ֵ" );
								}
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R7f4279a138 = intval( request( "copy" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								$Rd2e691562d = $this->GetCatCache( );
								$R97bfbe9263 = $this->GetSubCatCache( );
								$Rcd0c741934 = $R3db8f5c8bc['catid'];
								$Rac9b8532b8 = 0;
								foreach ( $R97bfbe9263 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['id'] == $Rcd0c741934 )
												{
																$Rac9b8532b8 = $R0f8134fb60['parentid'];
																break;
												}
								}
								$R27752f5168 = array( );
								foreach ( $R97bfbe9263 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['parentid'] == $Rac9b8532b8 )
												{
																$R27752f5168[] = $R0f8134fb60;
												}
								}
								$R2feb922f6a = $this->GetGAmeTplCache( );
								$data = array(
												"localpid" => $R8e8b5578f7
								);
								if ( UB_SUP == 1 && ( $R3db8f5c8bc['onsup'] == 1 || $R3db8f5c8bc['sup'] == 1 ) )
								{
												$R6e9bef54ac = $this->service->IProduct_GetByLocalPid( $data );
												$R98aa12da5c = $R6e9bef54ac['ubzpid'];
												$R3db8f5c8bc['ubzsupcheck'] = $R6e9bef54ac['ubzsupcheck'];
												$R3db8f5c8bc['ubzsup'] = $R6e9bef54ac['ubzsup'];
												$R3db8f5c8bc['ubzsupprice'] = $R6e9bef54ac['ubzsupprice'];
												$R3db8f5c8bc['ubzctrl'] = $R6e9bef54ac['ubzctrl'];
												$R3db8f5c8bc['ubzctrlprice'] = $R6e9bef54ac['ubzctrlprice'];
												$R3db8f5c8bc['ubzlowqty'] = isset( $R6e9bef54ac['ubzlowqty'] ) ? $R6e9bef54ac['ubzlowqty'] : "1";
												$this->Assign( "umebizpid", $R98aa12da5c );
								}
								else
								{
												$R98aa12da5c = 0;
												$R3db8f5c8bc['ubzsupcheck'] = 0;
												$R3db8f5c8bc['ubzsup'] = 0;
												$R3db8f5c8bc['ubzsupprice'] = 0;
												$R3db8f5c8bc['ubzctrl'] = 0;
												$R3db8f5c8bc['ubzctrlprice'] = 0;
												$R3db8f5c8bc['ubzlowqty'] = 1;
												$this->Assign( "umebizpid", $R98aa12da5c );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "category", $R97bfbe9263 );
								$this->Assign( "cat", $Rd2e691562d );
								$this->Assign( "subcat", $R27752f5168 );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "customtpl", $R2feb922f6a );
								$this->Assign( "copy", $R7f4279a138 );
								include( UPATH_HELPER."ProductHelper.php" );
								$this->Assign( "js", "<script type=\"text/javascript\" src=\"/index/allcztpl.js\"></script>" );
								$this->SetWebInfo(); 
								$this->View(); 
				}

				public function Create( )
				{
								$Rd2e691562d = $this->GetCatCache( );
								if ( !isset( $Rd2e691562d[0]['id'] ) )
								{
												$this->Alert( "��û����ӷ��࣬������ӷ����������Ʒ" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=category" );
								}
								$R97bfbe9263 = $this->GetSubCatCache( );
								$Rac9b8532b8 = $Rd2e691562d[0]['id'];
								$R27752f5168 = array( );
								foreach ( $R97bfbe9263 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['parentid'] == $Rac9b8532b8 )
												{
																$R27752f5168[] = $R0f8134fb60;
												}
								}
								$R2feb922f6a = $this->GetGameTplCache( );
								$this->Assign( "category", $R97bfbe9263 );
								$this->Assign( "cat", $Rd2e691562d );
								$this->Assign( "subcat", $R27752f5168 );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "customtpl", $R2feb922f6a );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->Assign( "js", "<script type=\"text/javascript\" src=\"/index/allcztpl.js\"></script>" );
								$this->SetWebInfo(); $this->View(); 
				}

				public function Save( )
				{
								$R63d0786ecc = doubleval( request( "ubzprice" ) );
								$Red2b3403a5 = doubleval( request( "ubzlistprice" ) );
								$Rff28faf2ca = doubleval( request( "oldprice" ) );
								$R2c215b20ec = doubleval( request( "oldlistprice" ) );
								$Raba57bd7d6 = intval( request( "ubzsup" ) );
								$R98aa12da5c = intval( request( "umebizpid" ) );
								$R63bede6b19 = $_REQUEST['ubzpdesc'];
								$R63bede6b19 = str_replace( "'", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "*", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "<", "&lt", $R63bede6b19 );
								$R63bede6b19 = str_replace( ">", "&gt", $R63bede6b19 );
								$GLOBALS['_REQUEST']['ubzpdesc'] = str_replace( "\"", "��", $R63bede6b19 );
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
								$Rd9cc11edd2 = array(
												"yktsamechecktime" => intval( request( "yktsamechecktime" ) ),
												"yktsamechecknum" => intval( request( "yktsamechecknum" ) ),
												"yktmaxnum" => intval( request( "yktmaxnum" ) ),
												"yktnoothers" => intval( request( "yktnoothers" ) ),
												"yktipmore" => intval( request( "yktipmore" ) ),
												"yktsamemore" => intval( request( "yktsamemore" ) ),
												"playerchecktime" => intval( request( "playerchecktime" ) ),
												"playerchecknum" => intval( request( "playerchecknum" ) ),
												"playermore" => intval( request( "playermore" ) ),
												"buylitobject" => intval( request( "buylitobject" ) )
								);
								$R0cdee13a13 = intval( request( "ubzqtymin" ) ) < 0 ? 1 : intval( request( "ubzqtymin" ) );
								$R7b5951700d = intval( request( "ubzqtymax" ) ) < 0 ? 10 : intval( request( "ubzqtymax" ) );
								$R239f541f81 = getvar( "ubzqtylist", "" );
								if ( $R239f541f81 == "" && 10000 < $R7b5951700d - $R0cdee13a13 )
								{
												$this->Alert( "���ã��������������󣬽������ֵ����Сֵ��Ҫ����10000������������ѡ��ʽ2�б�������" );
												$this->HistoryGo( );
								}
								$R2a039ed8fd = array(
												"pname" => getvar( "ubzpname" ),
												"ptagname" => getvar( "ubzptagname", "" ),
												"ptype" => intval( request( "ubzptype" ) ),
												"pdesc" => htmlspecialchars( getvar( "ubzpdesc" ) ),
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"czweb" => getvar( "ubzczweb" ),
												"web" => getvar( "ubzweb" ),
												"catid" => intval( request( "catid" ) ),
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
												"forshop" => intval( request( "forshop" ) ),
												"forb2b" => intval( request( "forb2b" ) ),
												"forykt" => intval( request( "forykt" ) ),
												"tosys" => intval( request( "tosys" ) ),
												"points" => intval( request( "points" ) ),
												"pfee" => doubleval( request( "pfee" ) ),
												"checked" => intval( request( "schecked" ) ),
												"mdydate" => date( "Y-m-d H-i-s" ),
												"mdyby" => $_SESSION['adminname'],
												"mdyip" => $this->GetIp( ),
												"otherweb" => getvar( "ubzotherweb", "" ),
												"tradeterm" => htmlspecialchars( getvar( "ubztradeterm" ) ),
												"disponshow" => intval( request( "ubzdisponshow" ) ),
												"stocks" => getvar( "ubzstocks" ),
												"unit" => getvar( "ubzunit" ),
												"namecolor" => getvar( "namecolor" ),
												"ordering" => intval( request( "ordering" ) ),
												"pinyin" => getvar( "pinyin" ),
												"webtitle" => getvar( "webtitle" ),
												"meta_keywords" => htmlspecialchars( getvar( "meta_keywords" ) ),
												"meta_description" => htmlspecialchars( getvar( "meta_description" ) ),
												"sup" => $Raba57bd7d6 ? 1 : -1,
												"palert" => htmlspecialchars( getvar( "palert" ) ),
												"orderalert" => htmlspecialchars( getvar( "orderalert" ) ),
												"isbold" => intval( request( "isbold" ) ),
												"scored" => intval( request( "scored" ) ),
												"reward" => doubleval( request( "reward" ) ),
												"quickuse" => intval( request( "quickuse" ) ),
												"quickusetime" => doubleval( request( "quickusetime" ) ),
												"canmakeprice" => intval( request( "canmakeprice" ) ),
												"buylit" => intval( request( "buylit" ) ),
												"buylitstardate" => $Rd2376260ad,
												"buylitenddate" => $R5fca54d15d,
												"yktipchecktime" => intval( request( "yktipchecktime" ) ),
												"yktipchecknum" => intval( request( "yktipchecknum" ) ),
												"buyaday" => intval( request( "buyaday" ) ),
												"prop" => serialize( $Rd9cc11edd2 )
								);
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R55f62596cc = 0;
								if ( 0 < $R98aa12da5c )
								{
												$R2a039ed8fd['onsup'] = 1;
								}
								else
								{
												$R2a039ed8fd['onsup'] = -1;
								}
								if ( 0 < $R8e8b5578f7 )
								{
												$R2a039ed8fd['pid'] = $R8e8b5578f7;
												$R808b89ba0e = $this->hander->IProduct_Update( $R2a039ed8fd, $R8e8b5578f7 );
												if ( $Rff28faf2ca != $R63d0786ecc || $R2c215b20ec != $Red2b3403a5 )
												{
																$R808b89ba0e = $this->DelPrice( $R8e8b5578f7, $R2c215b20ec, $Red2b3403a5 );
												}
												if ( !$R808b89ba0e )
												{
																$this->Alert( "���ز�������ʧ��" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R55f62596cc = 1;
												$R2a039ed8fd['hassup'] = -1;
												if ( $Raba57bd7d6 == 1 )
												{
																$R2a039ed8fd['onsup'] = 1;
												}
												$R2a039ed8fd['addeddate'] = date( "Y-m-d H-i-s" );
												$R2a039ed8fd['addedby'] = $_SESSION['adminname'];
												$R2a039ed8fd['addedip'] = $this->GetIp( );
												$R8e8b5578f7 = $this->hander->IProduct_Create( $R2a039ed8fd );
												if ( $R8e8b5578f7 <= 0 )
												{
																$this->Alert( "������Ʒ���ʧ��" );
																$this->HistoryGo( );
												}
								}
								if ( UB_SUP == 1 && ( $Raba57bd7d6 == 1 && 0 < $R8e8b5578f7 || 0 < $R98aa12da5c ) )
								{
												$Rc8295d6e4b = $this->ServiceSave( $R8e8b5578f7 );
												if ( $Rc8295d6e4b <= 0 )
												{
																if ( $R55f62596cc == 1 )
																{
																				$data = array( "onsup" => -1 );
																				$R808b89ba0e = $this->hander->IProduct_Update( $data, $R8e8b5578f7 );
																				if ( !$R808b89ba0e )
																				{
																								$R808b89ba0e = $this->hander->IProduct_Update( $data, $R8e8b5578f7 );
																								if ( !$R808b89ba0e )
																								{
																												$this->Alert( "���ش�����ɾ����Ʒ��������ӣ�" );
																												$this->HistoryGo( );
																								}
																				}
																}
																$this->Alert( "���������������ԭ�򣡲��ֲ���δ�ɹ��������£����������²������߹����ٲ�����" );
																$this->HistoryGo( );
												}
												else
												{
																$data = array( "onsup" => 1 );
																$R808b89ba0e = $this->hander->IProduct_Update( $data, $R8e8b5578f7 );
																if ( !$R808b89ba0e )
																{
																				$R808b89ba0e = $this->hander->IProduct_Update( $data, $R8e8b5578f7 );
																				if ( !$R808b89ba0e )
																				{
																								$this->Alert( "���ش�����ɾ����Ʒ��������ӣ�" );
																								$this->HistoryGo( );
																				}
																}
												}
								}
								if ( 0 < $R8e8b5578f7 )
								{
												$this->Alert( "�����ɹ���" );
								}
								else
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
								$Rcd0c741934 = intval( request( "catid" ) );
								$R00cf8fb961 = intval( request( "oldcatid" ) );
								$R16ec7c7480 = getvar( "oldpinyin", "" );
								$Rb62a6519ba = getvar( "pinyin", "" );
								if ( "0" < $R16ec7c7480 && $R16ec7c7480 < "9" )
								{
												$R16ec7c7480 = "09";
								}
								if ( "0" < $Rb62a6519ba && $Rb62a6519ba < "9" )
								{
												$Rb62a6519ba = "09";
								}
								if ( 0 < $R8e8b5578f7 )
								{
												$this->PUpdateCache( $R8e8b5578f7, $Rcd0c741934, $R00cf8fb961, $Rb62a6519ba, $R16ec7c7480 );
								}
								if ( $R00cf8fb961 == 0 )
								{
												$R00cf8fb961 = $Rcd0c741934;
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=PS&a=Html&pid=".$R8e8b5578f7."&catid=".$Rcd0c741934."&oldcatid=".$R00cf8fb961."&oldpinyin=".$R16ec7c7480."&pinyin=".$Rb62a6519ba );
				}

				public function ServiceSave( $R39e8277116 )
				{
								$R2a039ed8fd = array(
												"ubzpname" => urlencode( getvar( "ubzpname" ) ),
												"ubzptagname" => urlencode( getvar( "ubzptagname", "" ) ),
												"ubzptype" => intval( request( "ubzptype" ) ),
												"ubzdcrp" => urlencode( htmlspecialchars( getvar( "ubzpdesc" ) ) ),
												"ubzprice" => doubleval( request( "ubzprice" ) ),
												"ubzlistprice" => doubleval( request( "ubzlistprice" ) ),
												"ubzcprice1" => doubleval( request( "ubzcprice1" ) ),
												"ubzcprice2" => doubleval( request( "ubzcprice2" ) ),
												"ubzcprice3" => doubleval( request( "ubzcprice3" ) ),
												"ubzcprice4" => doubleval( request( "ubzcprice4" ) ),
												"ubzcprice5" => doubleval( request( "ubzcprice5" ) ),
												"ubzczweb" => urlencode( getvar( "ubzczweb" ) ),
												"ubzweb" => urlencode( getvar( "ubzweb" ) ),
												"ubzdid1" => intval( request( "ubzdid1" ) ),
												"ubzdid2" => intval( request( "ubzdid2" ) ),
												"ubzimage" => urlencode( getvar( "ubzimage" ) ),
												"ubzimagesmall" => urlencode( getvar( "ubzimagesmall" ) ),
												"ubztag" => intval( request( "ubztag" ) ),
												"ubzsell" => intval( request( "ubzsell" ) ),
												"ubznew" => intval( request( "ubznew" ) ),
												"ubzremd" => intval( request( "ubzremd" ) ),
												"ubzhot" => intval( request( "ubzhot" ) ),
												"ubzsale" => intval( request( "ubzsale" ) ),
												"ubzsup" => intval( request( "ubzsup" ) ),
												"ubzctrl" => intval( request( "ubzctrl" ) ),
												"ubzsupprice" => doubleval( request( "ubzsupprice" ) ),
												"ubzctrlprice" => doubleval( request( "ubzctrlprice" ) ),
												"ubzsupcheck" => intval( request( "ubzctrl" ) ),
												"ubzdisparea" => intval( request( "ubzdisparea" ) ),
												"ubzdispserv" => intval( request( "ubzdispserv" ) ),
												"ubzqtymin" => intval( request( "ubzqtymin" ) ),
												"ubzqtymax" => intval( request( "ubzqtymax" ) ),
												"ubzqtylist" => getvar( "ubzqtylist" ),
												"ubzcztpl" => intval( request( "ubzcztpl" ) ),
												"ubzidlable" => urlencode( getvar( "ubzidlable" ) ),
												"localpid" => intval( $R39e8277116 )
								);
								$R8e8b5578f7 = intval( request( "umebizpid" ) );
								if ( 0 < $R8e8b5578f7 )
								{
												$R2a039ed8fd['ubzpid'] = $R8e8b5578f7;
												$R2a039ed8fd['ubzmdyby'] = $_SESSION['adminname'];
												$R2a039ed8fd['ubzmdyip'] = $_SERVER['REMOTE_ADDR'];
												$R2a039ed8fd['action'] = "prdedit";
								}
								else
								{
												$R2a039ed8fd['ubzaddedby'] = $_SESSION['adminname'];
												$R2a039ed8fd['ubzaddedip'] = $_SERVER['REMOTE_ADDR'];
												$R2a039ed8fd['action'] = "prdadd";
								}
								$R8e8b5578f7 = $this->service->IProduct_Save( $R2a039ed8fd );
								return $R8e8b5578f7;
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

				public function DelPrice( $R8e8b5578f7, $R2c215b20ec, $Red2b3403a5 )
				{
								$R63bede6b19 = " pid = ".$R8e8b5578f7;
								if ( intval( request( "deltpl" ) ) )
								{
												$hander = factory::getinstance( "priceagent" );
												$hander->IPriceAgent_DelByStr( $R63bede6b19 );
								}
								if ( intval( request( "delrank" ) ) )
								{
												$hander = factory::getinstance( "prices" );
												$hander->IPrice_DelByStr( $R63bede6b19 );
								}
								if ( intval( request( "delprivate" ) ) )
								{
												$hander = factory::getinstance( "privateprices" );
												$hander->IPrivatePrice_DelByStr( $R63bede6b19 );
								}
								if ( $R2c215b20ec != $Red2b3403a5 && intval( request( "delpricemy" ) ) )
								{
												$hander = factory::getinstance( "pricemy" );
												$hander->IPriceMy_DelByStr( $R63bede6b19 );
								}
								return true;
				}

				public function Html( )
				{
								if ( UB_YKT + UB_B2C == 0 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&ptype=-1&aid=-1" );
								}
								$this->Assign( "catid", intval( request( "catid" ) ) );
								$this->Assign( "oldcatid", intval( request( "oldcatid" ) ) );
								$this->Assign( "pinyin", getvar( "pinyin" ) );
								$this->Assign( "oldpinyin", getvar( "oldpinyin" ) );
								$this->Assign( "pid", intval( request( "pid" ) ) );
							
												$this->View( );
							
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ItemDeal( )
				{
								$R3584859062 = intval( request( "id" ) );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" || $R3584859062 == 0 )
								{
												echo "��������";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "utf-8//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$Ref41d9513d = $this->GetProductCache( $R3584859062 );
								if ( $Ref41d9513d['onsup'] == 1 && UB_SUP == 1 )
								{
												$R808b89ba0e = $this->SItemDeal( $param, $R244f38266c, $R3584859062 );
								}
								else
								{
												$R808b89ba0e = true;
								}
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $this->hander->IProduct_Update( $data, $R3584859062 );
												if ( $R808b89ba0e )
												{
																$this->PUpdateCache( $R3584859062, $Ref41d9513d['catid'], 0, $Ref41d9513d['pinyin'], "" );
																echo "";
												}
												else
												{
																echo "�޸�ʧ�ܣ�";
												}
								}
								else
								{
												echo "�޸�ʧ�ܣ�������Ʒ���⹩�����п�����ͨ�����⵼�µ�ʧ�ܣ�";
								}
				}

				public function SItemDeal( $param, $R244f38266c, $R3584859062, $Ree20215348 = 0, $Re708be7725 = 0 )
				{
								$R98aa12da5c = 0;
								if ( UB_SUP == 0 )
								{
												return true;
								}
								if ( $Ree20215348 == 0 )
								{
												if ( UB_SUP == 1 )
												{
																$R98aa12da5c = $this->GetUmebizPid( $R3584859062 );
												}
												if ( $R98aa12da5c <= 0 )
												{
																return true;
												}
								}
								$Rdc72801a64 = array( "pname" => "0", "price" => "1", "listprice" => "2", "sell" => "5", "supprice" => "9", "supcheck" => "10", "sup" => "11" );
								$Rfee6fd8a6d = $Rdc72801a64[$param];
								$Rcc187a276b = $R244f38266c;
								$data = array(
												"act" => $Rfee6fd8a6d,
												"txt" => urlencode( $Rcc187a276b ),
												"id" => $R98aa12da5c,
												"local" => $Ree20215348,
												"del" => $Re708be7725,
												"action" => "prditemdeal"
								);
								$R808b89ba0e = $this->service->IProduct_ItemDeal( $data );
								$R3db8f5c8bc = explode( ",", $R808b89ba0e );
								if ( 3 < count( $R3db8f5c8bc ) )
								{
												$R494af0fa28 = explode( ":", $R3db8f5c8bc[3] );
												if ( count( $R494af0fa28 ) < 2 )
												{
																return false;
												}
												if ( $R494af0fa28[1] == 0 )
												{
																return true;
												}
												else
												{
																return false;
												}
								}
								else
								{
												return false;
								}
				}

				public function Restore( )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid", -1 ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", "-1" ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$R5aee22e642 = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R3db8f5c8bc = $this->ReturnPid( $Rb7492a73f7, $R5aee22e642 );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->hander->IProduct_UpdateByStr( $data, $Rb7492a73f7, $R5aee22e642 );
								$this->PUpdateCacheByResult( $R3db8f5c8bc );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "��¼��ԭʧ�ܣ�";
								}
				}

				public function DelItems( )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid", -1 ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R3db8f5c8bc = $this->ReturnPid( $Rb7492a73f7, $data );
								$this->SAction( $Rb7492a73f7, $data, 0 );
								$R808b89ba0e = $this->hander->IProduct_DeleteByStr( $Rb7492a73f7, $data );
								$this->PUpdateCacheByResult( $R3db8f5c8bc );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
				}

				public function DestroyItems( )
				{
								$Rd2e691562d = request( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid", -1 ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", -1 ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R3db8f5c8bc = $this->ReturnPid( $Rb7492a73f7." and inrecycle=1 ", $data );
								$R808b89ba0e = $this->SAction( $Rb7492a73f7, $data, 1 );
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $this->hander->IProduct_DestroyByStr( $Rb7492a73f7, $data );
												if ( $R808b89ba0e )
												{
																$this->ClearReward( $R3db8f5c8bc );
																$this->PUpdateCacheByResult( $R3db8f5c8bc );
																echo "";
												}
												else
												{
																echo "ɾ��ʧ���ˣ�";
												}
								}
								else
								{
												echo "ɾ��ʧ���˰���";
								}
				}

				public function ClearReward( $R3db8f5c8bc )
				{
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$Rb7492a73f7 = " pid in (".$R63bede6b19.") ";
												$R737fcbc5ed = factory::getinstance( "reward" );
												$Rc2f1fd7d2e = factory::getinstance( "rewardtpl" );
												$R737fcbc5ed->IReward_DestroyByStr( $Rb7492a73f7, array( ) );
												$Rc2f1fd7d2e->IRewardTpl_DestroyByStr( $Rb7492a73f7, array( ) );
								}
				}

				public function SAction( $R63bede6b19, $data = array( ), $Re708be7725 = 0 )
				{
								$R863f31a3f5 = $R63bede6b19." and sup=1 ";
								$R3db8f5c8bc = $this->hander->IProduct_GetByStr( $R863f31a3f5, $data, "pid" );
								if ( 0 < count( $R3db8f5c8bc ) )
								{
												$R026f0167b4 = array( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['pid'];
												}
												$R7e9136b890 = implode( ",", $R026f0167b4 );
												$R5ea17e3e92 = array( "sup" => 0 );
												$R808b89ba0e = $this->SItemDeal( "sup", 0, $R63bede6b19, 1, $Re708be7725 );
												if ( $R808b89ba0e )
												{
																return $this->hander->IProduct_Update( $R5ea17e3e92, $R7e9136b890 );
												}
												else
												{
																return false;
												}
								}
								else
								{
												return true;
								}
				}

				public function PPClear( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array(
												"pid" => $R8e8b5578f7
								);
								$Rb7492a73f7 = "";
								$R763ed871ef = factory::getinstance( "privateprices" );
								$R808b89ba0e = $R763ed871ef->IPrivatePrice_DeleteByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "���ʧ�ܣ�";
								}
				}

				public function GetLit( )
				{
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
								if ( $R09dfa65bd9 == 1 )
								{
												$Rc0d62c5404 = getvar( "chkexclude" );
												$Rcc5c6e696c = explode( ",", $Rc0d62c5404 );
								}
								else
								{
												$R83e17604b1 = getvar( "chkinclude" );
												$Rcc5c6e696c = explode( ",", $R83e17604b1 );
								}
								$R3db8f5c8bc = array( );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R8eeb1221ae = intval( $R0f8134fb60 );
												if ( 0 < $R8eeb1221ae )
												{
																$R3db8f5c8bc[] = $R8eeb1221ae;
												}
								}
								$R3456919727 = implode( ",", $R3db8f5c8bc );
								$Rb7492a73f7 = "";
								if ( $R09dfa65bd9 == 1 )
								{
												if ( $R3456919727 != "" )
												{
																$Rb7492a73f7 = "pid not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "����ѡ����";
																exit( );
												}
												$Rb7492a73f7 = "pid in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

				public function UpdateTplBySup( )
				{
								set_time_limit( 0 );
								$Re6be5a6973 = $this->service->IProduct_GetTpl( array( ) );
								$R3db8f5c8bc = $this->hander->IProduct_GetAll( "pid,cztpl,pname,ptype" );
								$R2145464ecd = true;
								$R06e73b906e = "";
								$Rc894c8a8b2 = "";
								$Ra16d228039 = 0;
								$Ra7b9a38368 = 0;
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( !isset( $Re6be5a6973[$R0f8134fb60['pid']] ) )
												{
																continue;
												}
												$R1b69c92460 = intval( $Re6be5a6973[$R0f8134fb60['pid']]['ptype'] );
												$R0f571378e3 = intval( $Re6be5a6973[$R0f8134fb60['pid']]['cztpl'] );
												$data = array( );
												if ( intval( $R0f8134fb60['ptype'] != $R1b69c92460 ) )
												{
																if ( $R1b69c92460 == 1 )
																{
																				$data = array(
																								"ptype" => 1,
																								"cztpl" => $R0f571378e3
																				);
																}
																else if ( $R1b69c92460 == 0 )
																{
																				$data = array( "ptype" => 0 );
																}
																if ( $R1b69c92460 == 1 || $R1b69c92460 == 0 )
																{
																				$Ra7b9a38368++;
																				$R06e73b906e .= "<tr><td width=\"10%\">".$Ra7b9a38368."</td><td width=\"10%\">".$R0f8134fb60['pid']."</td><td width=\"60%\" style=\"text-align:left\">".$R0f8134fb60['pname']."</td></tr>";
																}
												}
												else if ( intval( $R0f8134fb60['ptype'] ) == 1 && intval( $R0f8134fb60['cztpl'] ) != $R0f571378e3 )
												{
																$Ra16d228039++;
																$data = array(
																				"cztpl" => $R0f571378e3
																);
																$Rc894c8a8b2 .= "<tr><td width=\"10%\">".$Ra16d228039."</td><td width=\"10%\">".$R0f8134fb60['pid']."</td><td width=\"60%\" style=\"text-align:left\">".$R0f8134fb60['pname']."</td></tr>";
												}
												if ( 0 < count( $data ) )
												{
																$R808b89ba0e = $this->hander->IProduct_Update( $data, $R0f8134fb60['pid'] );
																if ( $R808b89ba0e == false )
																{
																				$R2145464ecd = false;
																}
																else
																{
																				$this->UpdateCache( "products", array(
																								"arg1" => $R0f8134fb60['pid']
																				) );
																}
												}
								}
								if ( $R2145464ecd == false )
								{
												$this->Assign( "err", "���θ�����ʧ�ܣ�����<a href=\"index.php?m=mod_b2b&c=PS&a=UpdateTplBySup\"><u>���¸���</u></a>��" );
								}
								else
								{
												$this->Assign( "err1", "��ɸ��£������� <font color=\"#0000ff\">".$Ra7b9a38368."</font> ����Ʒ�ԽӷǱ�������Ʒ" );
												$this->Assign( "err2", "��ɸ��£������� <font color=\"#0000ff\">".$Ra16d228039."</font> ���Զ���ֵ��Ʒģ�������޸�" );
								}
								$this->Assign( "str1", $R06e73b906e );
								$this->Assign( "str2", $Rc894c8a8b2 );
						
												$this->View( );
						
				}

				public function PUpdateCache( $R8e8b5578f7, $Rcd0c741934 = 0, $R00cf8fb961 = 0, $Rb62a6519ba = "", $R16ec7c7480 = "" )
				{
								if ( $Rcd0c741934 == $R00cf8fb961 )
								{
												$R00cf8fb961 = 0;
								}
								if ( $Rb62a6519ba == $R16ec7c7480 )
								{
												$R16ec7c7480 = 0;
								}
								$this->UpdateCache( "products", array(
												"arg1" => $R8e8b5578f7
								) );
								if ( 0 < $Rcd0c741934 )
								{
												$this->UpdateCache( "list", array(
																"arg1" => $Rcd0c741934
												) );
								}
								if ( 0 < $R00cf8fb961 )
								{
												$this->UpdateCache( "list", array(
																"arg1" => $R00cf8fb961
												) );
								}
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
								if ( $R16ec7c7480 != "" )
								{
												if ( "0" < $R16ec7c7480 && $R16ec7c7480 < "9" )
												{
																$R16ec7c7480 = "09";
												}
												$this->UpdateCache( "pinyin", array(
																"arg1" => $R16ec7c7480
												) );
								}
				}

				public function ReturnPid( $R63bede6b19, $data )
				{
								return $this->hander->IProduct_GetByStr( $R63bede6b19, $data, "pid,catid,pinyin" );
				}

				public function PUpdateCacheByResult( $R3db8f5c8bc = array( ) )
				{
								set_time_limit( 0 );
								$Rd63cb6d2a8 = array( );
								$Ra4c50889c9 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$Rcd0c741934 = intval( $R0f8134fb60['catid'] );
												if ( 0 < $Rcd0c741934 )
												{
																$Rd63cb6d2a8[$Rcd0c741934] = 1;
												}
												$Rb62a6519ba = $R0f8134fb60['pinyin'];
												if ( $Rb62a6519ba != "" )
												{
																if ( "0" < $Rb62a6519ba && $Rb62a6519ba < "9" )
																{
																				$Rb62a6519ba = "09";
																}
																$Ra4c50889c9[$Rb62a6519ba] = 1;
												}
								}
								foreach ( $Rd63cb6d2a8 as $R0f8134fb60 => $Ra3d52e52a4 )
								{
												$this->UpdateCache( "list", array(
																"arg1" => $R0f8134fb60
												) );
								}
								foreach ( $Ra4c50889c9 as $R0f8134fb60 => $Ra3d52e52a4 )
								{
												$this->UpdateCache( "pinyin", array(
																"arg1" => $R0f8134fb60
												) );
								}
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R8e8b5578f7 = $R0f8134fb60['pid'];
												$this->UpdateCache( "products", array(
																"arg1" => $R8e8b5578f7
												) );
												$this->DeleteHtmlFile( $R8e8b5578f7 );
								}
				}

				public function DeleteHtmlFile( $R8e8b5578f7 )
				{
								global $g_action;
								if ( $g_action != "DelItems" )
								{
												return;
								}
								if ( UB_B2C )
								{
												$R3656889a44 = "../b2c/p".$R8e8b5578f7.".html";
												$R0d48a0d7da = "../b2c/gotoerr.html";
												if ( file_exists( $R3656889a44 ) )
												{
																unlink( $R3656889a44 );
																if ( file_exists( $R0d48a0d7da ) )
																{
																				copy( $R0d48a0d7da, $R3656889a44 );
																}
												}
								}
								if ( UB_YKT )
								{
												$R3656889a44 = "../ykt/p".$R8e8b5578f7.".html";
												$R0d48a0d7da = "../ykt/gotoerr.html";
												if ( file_exists( $R3656889a44 ) )
												{
																unlink( $R3656889a44 );
																if ( file_exists( $R0d48a0d7da ) )
																{
																				copy( $R0d48a0d7da, $R3656889a44 );
																}
												}
								}
				}

}

?>
