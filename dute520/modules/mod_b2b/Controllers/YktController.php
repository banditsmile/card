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
class YktController extends Controller
{

				public $hander = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "cards" );
								$this->action = array( "stocklist", "stockdel", "stockedit", "stocksave" );
				}

				public function Home( )
				{
								$this->View( );
				}

				public function BindIndex( )
				{
								include_once( UPATH_HELPER."CardHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"cardnumber" => getvar( "cardnumber", "" ),
												"pid" => getvar( "ubzpid" ),
												"optype" => getvar( "optype", "" ),
												"ykt" => 0,
												"ptype" => 100,
												"cardnumberstart" => getvar( "cardnumberstart", "" ),
												"cardnumberend" => getvar( "cardnumberend", "" ),
												"bindindex" => 1
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								if ( request( "stype" ) == "cardpwd" )
								{
												$data['keywords'] = base64_encode( $data['keywords'] );
												$data['cardpwd'] = $data['keywords'];
								}
								$R4e420efcc3 = $this->hander->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "cardnumber" => "����", "cardpwd" => "������", "bindaid" => "�����̱��", "cardgroup" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R793c7fe26b = array( "-1" => "����", "0" => "����Ч", "1" => "����Ч", "2" => "δ��Ч", "3" => "ʹ����" );
								$this->Assign( "scardstate", $R793c7fe26b );
								$this->Assign( "cardstate", getvar( "cardok", "-1" ) );
								$R5026051cf5 = array( "-1" => "����", "f" => "���۳�", "s" => "δ�۳�" );
								$this->Assign( "ssellstate", $R5026051cf5 );
								$this->Assign( "sellstate", getvar( "optype", "-1" ) );
								$R209524ad64 = array( "-1" => "����", "100" => "�һ���", "101" => "��ֵ��" );
								$this->Assign( "sptype", $R209524ad64 );
								$this->Assign( "ptype", getvar( "ptype", "-1" ) );
						
												$this->view( );
						
				}

				public function Product( )
				{
								$Rb47e0fcf5c = factory::getinstance( "yktproducts" );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" )
								);
								$R4e420efcc3 = $Rb47e0fcf5c->IYktProduct_PageQuery( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->view( );
						
				}

				public function ProductDel( )
				{
								$Rb47e0fcf5c = factory::getinstance( "yktproducts" );
								$Rb47e0fcf5c->IYktProduct_Del( intval( getvar( "id" ) ) );
								$this->Alert( "ɾ���ɹ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=ykt&a=product" );
				}

				public function Childs( )
				{
								$R4939d208ed = intval( getvar( "id" ) );
								if ( $R4939d208ed == 0 )
								{
												$this->Alert( "��Ʒ����������ѡ��" );
												$this->HistoryGo( );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$R679e9b9234 = $R422f9a4efb->IProduct_GetAllByYktPid( $R4939d208ed, "pid,yktpoints,ykttag,ptype,pname,yktcard" );
								$this->Assign( "items", $R679e9b9234 );
								$this->Assign( "yktpid", $R4939d208ed );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->view( );
						
				}

				public function ChildAdd( )
				{
								$R4939d208ed = intval( getvar( "id" ) );
								if ( $R4939d208ed == 0 )
								{
												$this->Alert( "��Ʒ����������ѡ��" );
												$this->HistoryGo( );
								}
								$Rb47e0fcf5c = factory::getinstance( "yktproducts" );
								$Rd017e8e06f = $Rb47e0fcf5c->IYktProduct_GetById( $R4939d208ed, "yktpname" );
								if ( !isset( $Rd017e8e06f['yktpname'] ) )
								{
												$this->Alert( "��Ʒ����������ѡ��" );
												$this->HistoryGo( );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$R679e9b9234 = $R422f9a4efb->IProduct_GetAll( "pname,pid,ptype,listprice,yktpid" );
								$this->Assign( "yktpid", $R4939d208ed );
								$this->Assign( "yktpname", $Rd017e8e06f['yktpname'] );
								$this->Assign( "items", $R679e9b9234 );
						
												$this->View( );
						
				}

				public function ChildSave( )
				{
								$R4939d208ed = intval( getvar( "yktpid" ) );
								$R8e8b5578f7 = intval( getvar( "pid" ) );
								$data = array(
												"ykttag" => getvar( "ykttag", "" ),
												"yktpoints" => doubleval( getvar( "yktpoints" ) ),
												"yktpid" => $R4939d208ed,
												"yktcard" => getvar( "yktcard", "" )
								);
								$R422f9a4efb = factory::getinstance( "products" );
								$R808b89ba0e = $R422f9a4efb->IProduct_Update( $data, $R8e8b5578f7 );
								$Rc6f67e578e = intval( getvar( "oldyktpid" ) );
								if ( $R4939d208ed == 0 )
								{
												$R4939d208ed = $Rc6f67e578e;
								}
								$this->go( $R808b89ba0e, "�����ɹ�", "����ʧ��", "index.php?m=mod_b2b&c=ykt&a=childs&id=".$R4939d208ed );
				}

				public function ProductSave( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$data = array(
												"yktpname" => getvar( "yktpname" ),
												"color" => getvar( "color" ),
												"new" => intval( getvar( "new" ) ),
												"hot" => intval( getvar( "hot" ) ),
												"sell" => intval( getvar( "sell" ) ),
												"tag" => intval( getvar( "tag" ) ),
												"recommand" => intval( getvar( "recommand" ) ),
												"sale" => intval( getvar( "sale" ) ),
												"letter" => getvar( "letter" ),
												"ordering" => intval( getvar( "ordering" ) )
								);
								$Rb47e0fcf5c = factory::getinstance( "yktproducts" );
								if ( $R3584859062 == 0 )
								{
												$R63bede6b19 = "���";
												$R808b89ba0e = $Rb47e0fcf5c->IYktProduct_Create( $data );
								}
								else
								{
												$R63bede6b19 = "����";
												$R808b89ba0e = $Rb47e0fcf5c->IYktProduct_Update( $data, $R3584859062 );
								}
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=ykt&a=product" );
				}

				public function SetYktCreateCache( )
				{
								$R929cf63f35 = DATACACHE."product.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								$R09a3346376 = BCKCACHE.DS."product".DS."yktsell.php";
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$R0003a33381 = factory::getinstance( "products" );
												$data = array( "forykt" => 1 );
												$R4e420efcc3 = $R0003a33381->IProduct_GetByData( $data, "pname,pid" );
												$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								include( $R09a3346376 );
								$this->Assign( "items", $R4e420efcc3 );
								$R09a3346376 = BCKCACHE.DS."product".DS."yktids.php";
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$R0003a33381 = factory::getinstance( "products" );
												$data = array( );
												$R4e420efcc3 = $R0003a33381->IProduct_GetByStr( "ptype > 99", $data, "pname,pid" );
												$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								include( $R09a3346376 );
								$this->Assign( "yktitems", $R4e420efcc3 );
				}

				public function Create( )
				{
								$this->SetYktCreateCache( );
								$Rd2e691562d = $this->GetCatCache( );
								if ( !isset( $Rd2e691562d[0]['id'] ) )
								{
												$R27752f5168 = array( );
								}
								else
								{
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
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "kktyt" ) ) ) );
				}

				public function Save( )
				{
								set_time_limit( 0 );
								$this->CheckTradePwd( );
								$R51b4178493 = 0;
								$R94927a2851 = 0;
								$R1b69c92460 = intval( request( "ptype" ) );
								$R55f933c773 = doubleval( request( "yktprice" ) );
								$R0d9f8f778c = doubleval( request( "cprice" ) );
								$R1357c9440c = intval( request( "yktqty" ) );
								$R30c230ef2f = intval( request( "bindaid" ) );
								$Rd74ca97c05 = intval( request( "okbyaid" ) );
								$Raafd1aa98c = intval( request( "cardlength" ) );
								$R2de558026f = intval( request( "pwdlength" ) );
								$R0ff5a673fc = intval( request( "pwdtype" ) );
								$Rc918c9e179 = intval( request( "iswrite" ) );
								$R9165cb97fd = intval( request( "bindpid" ) );
								$R670974c812 = intval( request( "topid" ) );
								$R460313ab13 = intval( request( "ckcardok" ) );
								if ( $R55f933c773 <= 0 )
								{
												$this->Alert( "����,һ��ͨ��ֵ�������0" );
												$this->HistoryGo( );
								}
								if ( 0 < $R30c230ef2f )
								{
												$agent = $this->GetAgentCache( $R30c230ef2f );
												if ( !isset( $agent['forykt'] ) || $agent['forykt'] == 0 )
												{
																$this->Alert( "����,���û�����һ��ͨ������,�޷���" );
																$this->HistoryGo( );
												}
								}
								if ( $R460313ab13 == 1 && $R30c230ef2f == 0 )
								{
												$this->Alert( "����,����ѡ�˰󶨴�����,����������̵ı��" );
												$this->HistoryGo( );
								}
								include_once( UPATH_HELPER."YktHelper.php" );
								include_once( UPATH_HELPER."HtmlHelper.php" );
								$R51c716b966 = $this->SetLang( 1 );
								$R4fe6545da8 = $_SESSION['adminname'];
								$R30c230ef2f = $R1b69c92460 == 100 ? $R30c230ef2f : 0;
								$R65edce27dd = $R1b69c92460 == 100 ? "һ��ͨ�һ�ר�ÿ�" : "һ��ͨ��ֵר�ÿ�";
								$R65edce27dd = $R65edce27dd."_".$R55f933c773.$R51c716b966['moneyunit'];
								$Rea7da29f55 = 0;
								if ( 0 < $Rc918c9e179 )
								{
												$R422f9a4efb = factory::getinstance( "products" );
												if ( 0 < $R670974c812 )
												{
																$R3db8f5c8bc = $R422f9a4efb->IProduct_Get( $R670974c812, -1, "pname,ptype,listprice" );
																if ( !isset( $R3db8f5c8bc['pname'] ) )
																{
																				$this->Alert( "Ҫ�������Ʒ�����ڣ�������ѡ��" );
																				$this->HistoryGo( );
																}
																if ( $R3db8f5c8bc['listprice'] != $R55f933c773 )
																{
																				$this->Alert( "Ҫ�������Ʒ����Ŀǰ�������ֵ��һ�£�����������" );
																				$this->HistoryGo( );
																}
																if ( $R3db8f5c8bc['ptype'] != $R1b69c92460 )
																{
																				$this->Alert( "Ҫ�������Ʒ����Ŀǰѡ���һ��ͨ���Ͳ�һ�£�����������" );
																				$this->HistoryGo( );
																}
																$R65edce27dd = $R3db8f5c8bc['pname'];
																$R1b69c92460 = $R3db8f5c8bc['ptype'];
																$R8e8b5578f7 = $R670974c812;
												}
												else
												{
																$R80b75db762 = getvar( "yktnickname", "" );
																$R65edce27dd = $R80b75db762 == "" ? $R65edce27dd : $R80b75db762;
																$data = array(
																				"listprice" => $R55f933c773,
																				"ptype" => $R1b69c92460,
																				"pname" => $R65edce27dd
																);
																$R8e8b5578f7 = $R422f9a4efb->IProduct_GetId( $data );
																$R5b13dab0c4 = intval( request( "selladdr" ) );
																$R04c573beda = "";
																$R3db3f34c53 = "";
																if ( $R5b13dab0c4 )
																{
																				$R377ddf4370 = intval( request( "tcatid" ) );
																				$R953278272a = 0;
																				if ( $R377ddf4370 )
																				{
																								if ( $R9165cb97fd == 0 )
																								{
																												$this->Alert( "����ǰû�а��κ���Ʒ���޷��ҵ�Ĭ���������ѡ��һ��" );
																												$this->HistoryGo( );
																								}
																								else
																								{
																												$R33d1990974 = $this->GetProductCache( $R9165cb97fd );
																												$Rcd0c741934 = $R33d1990974['catid'];
																												$Rea7da29f55 = $R33d1990974['aid'];
																												$R953278272a = 1;
																								}
																				}
																				else
																				{
																								$Rcd0c741934 = intval( request( "catid" ) );
																				}
																				if ( 0 < $R9165cb97fd )
																				{
																								global $baseurl;
																								$R25791b03ad = $this->GetWebCache( );
																								$R04c573beda = $R25791b03ad['website'].$baseurl."/ykt/p".$R9165cb97fd.".html";
																								$R3db3f34c53 = $R04c573beda;
																								if ( $R953278272a == 0 )
																								{
																												$R33d1990974 = $this->GetProductCache( $R9165cb97fd );
																												$Rea7da29f55 = $R33d1990974['aid'];
																								}
																				}
																}
																else
																{
																				$Rcd0c741934 = 0;
																}
																$R63d0786ecc = doubleval( request( "price" ) );
																$R63d0786ecc = $R63d0786ecc == 0 ? $R55f933c773 : $R63d0786ecc;
																if ( $R8e8b5578f7 == 0 )
																{
																				$R2a039ed8fd = array(
																								"pname" => $R65edce27dd,
																								"ptagname" => $R65edce27dd,
																								"ptype" => $R1b69c92460,
																								"pdesc" => $R65edce27dd,
																								"price" => $R63d0786ecc,
																								"listprice" => $R55f933c773,
																								"czweb" => $R04c573beda,
																								"web" => $R3db3f34c53,
																								"catid" => $Rcd0c741934,
																								"imagefull" => "nopic.gif",
																								"imagesmall" => "nopic.gif",
																								"tag" => 0,
																								"sell" => 1,
																								"new" => 0,
																								"remd" => 0,
																								"hot" => 0,
																								"sale" => 0,
																								"disparea" => 0,
																								"dispserv" => 0,
																								"forb2b" => $R5b13dab0c4,
																								"forshop" => 0,
																								"forykt" => 0,
																								"qtymin" => 1,
																								"qtymax" => 10,
																								"qtylist" => "",
																								"cztpl" => 0,
																								"idlable" => ""
																				);
																				if ( 0 < $Rea7da29f55 )
																				{
																								$R2a039ed8fd['aid'] = $Rea7da29f55;
																				}
																				$R2a039ed8fd['addedby'] = $_SESSION['adminname'];
																				$R2a039ed8fd['addedip'] = $_SERVER['REMOTE_ADDR'];
																				$R8e8b5578f7 = $R422f9a4efb->IProduct_Create( $R2a039ed8fd );
																				if ( 0 < $R8e8b5578f7 )
																				{
																								$this->UpdateCache( "products", array(
																												"arg1" => $R8e8b5578f7
																								) );
																				}
																				if ( 0 < $Rcd0c741934 )
																				{
																								$this->UpdateCache( "list", array(
																												"arg1" => $Rcd0c741934
																								) );
																				}
																}
												}
												$R7661e907a4 = $this->hander->ICard_GetMaxGroup( ) + 1;
								}
								$R4b14a7191a = "";
								$R09a73f4b6e = getrand( $Raafd1aa98c );
								$R7afcde8999 = "";
								if ( 0 < $R9165cb97fd && $Rea7da29f55 == 0 )
								{
												$R33d1990974 = $this->GetProductCache( $R9165cb97fd );
												$Rea7da29f55 = $R33d1990974['aid'];
								}
								$R1de95f080d = getvar( "prefix" );
								$R9165cb97fd = 0 < $R9165cb97fd ? $R9165cb97fd."," : "";
								$R29fdeb9060 = intval( request( "cardok" ) );
								$R29fdeb9060 = $Rd74ca97c05 == 1 && 0 < $R30c230ef2f ? 0 : $R29fdeb9060;
								$R29fdeb9060 = $R29fdeb9060 == 1 ? 1 : 2;
								$Rd74ca97c05 = $Rd74ca97c05 == 0 && $R460313ab13 == 1 && $R1b69c92460 == 100 ? 1 : 0;
								if ( 12 < $Raafd1aa98c )
								{
												$Ra2df6a0927 = $R09a73f4b6e;
												$R09a73f4b6e = substr( $Ra2df6a0927, -12 );
												$R4b14a7191a = substr( $Ra2df6a0927, 0, $Raafd1aa98c - 12 );
								}
								$R0038357f50 = array( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R1357c9440c;	$Ra16d228039++	)
								{
												$Re559dc39a1 = $R09a73f4b6e + $Ra16d228039;
												$Re559dc39a1 = $R1de95f080d.$R4b14a7191a.$Re559dc39a1;
												$R37db13e189 = getrand( $R2de558026f, $R0ff5a673fc );
												$R0038357f50[] = array(
																$Re559dc39a1,
																$R37db13e189
												);
								}
								if ( 0 < $Rc918c9e179 && 0 < $R1357c9440c )
								{
												$R75e58a4b8c = $R0038357f50[0][0];
												$Rafa119e3bd = $R0038357f50[$R1357c9440c - 1][0];
												$R06dc35f427 = " ( (cardnumber+0) > '".$R75e58a4b8c."' and (cardnumber+0) < '".$Rafa119e3bd."' ) or (cardnumber+0) = '".$R75e58a4b8c."' or (cardnumber+0) = '".$Rafa119e3bd."' ";
												$R337d380380 = $this->hander->ICard_GetByStr( $R06dc35f427, "cardnumber" );
												$R94927a2851 = count( $R337d380380 );
												$Reee47029d7 = array( );
												if ( 0 < $R94927a2851 )
												{
																foreach ( $R337d380380 as $R0f8134fb60 )
																{
																				$Reee47029d7[$R0f8134fb60['cardnumber']] = 0;
																}
												}
												$R39f193f044 = array( );
												$R4072f8bd60 = array( "cardnumber", "cardpwd", "cardok", "pid", "ptype", "pname", "cprice", "price", "money", "cardgroup", "bindpid", "addeddate", "operator", "bindaid", "okbyaid", "ispay", "admname", "aid" );
												$Raacee77f23 = 0;
												foreach ( $R0038357f50 as $R0f8134fb60 )
												{
																if ( !isset( $Reee47029d7[$R0f8134fb60[0]] ) )
																{
																				$R37db13e189 = base64_encode( $R0f8134fb60[1] );
																				$Re559dc39a1 = $R0f8134fb60[0];
																				$data = array(
																								"cardnumber" => $Re559dc39a1,
																								"cardpwd" => $R37db13e189,
																								"cardok" => $R29fdeb9060,
																								"pid" => $R8e8b5578f7,
																								"ptype" => $R1b69c92460,
																								"pname" => $R65edce27dd,
																								"cprice" => 0 < $R0d9f8f778c ? $R0d9f8f778c : $R55f933c773,
																								"price" => $R55f933c773,
																								"money" => $R55f933c773,
																								"cardgroup" => $R7661e907a4,
																								"bindpid" => 0 < $R9165cb97fd ? $R9165cb97fd : 0,
																								"addeddate" => date( "Y-m-d H-i-s" ),
																								"operator" => 0,
																								"bindaid" => $R30c230ef2f,
																								"okbyaid" => $Rd74ca97c05,
																								"ispay" => 0 < $R30c230ef2f && $R29fdeb9060 == 1 ? 1 : 0,
																								"admname" => $R4fe6545da8
																				);
																				if ( 0 < $Rea7da29f55 )
																				{
																								$data['aid'] = $Rea7da29f55;
																				}
																				else
																				{
																								$data['aid'] = -1;
																				}
																				$R637197da81 = array( );
																				foreach ( $data as $R0f8134fb60 )
																				{
																								$R637197da81[] = "'".$R0f8134fb60."'";
																				}
																				$R39f193f044[] = "(".implode( ",", $R637197da81 ).")";
																				$Raacee77f23++;
																				if ( $Raacee77f23 == 500 )
																				{
																								$R130d64a4ad = "insert into ".$this->hander->dbprefix."cards(".implode( ",", $R4072f8bd60 ).") values".implode( ",", $R39f193f044 );
																								$this->hander->QueryUpdate( $R130d64a4ad );
																								$Raacee77f23 = 0;
																								$R39f193f044 = array( );
																				}
																}
												}
												if ( 0 < count( $R39f193f044 ) )
												{
																$R130d64a4ad = "insert into ".$this->hander->dbprefix."cards(".implode( ",", $R4072f8bd60 ).") values".implode( ",", $R39f193f044 );
																$R808b89ba0e = $this->hander->QueryUpdate( $R130d64a4ad );
												}
												$R3db8f5c8bc = $this->hander->ICard_GetByStr( " cardgroup=".$R7661e907a4." ", "cardnumber,cardpwd" );
												$R51b4178493 = count( $R3db8f5c8bc );
												$R94927a2851 = $R1357c9440c - $R51b4178493;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$Re559dc39a1 = $R0f8134fb60['cardnumber'];
																$R37db13e189 = base64_decode( $R0f8134fb60['cardpwd'] );
																$R7afcde8999 = $R7afcde8999.$Re559dc39a1." ".$R37db13e189."\r\n";
												}
								}
								else
								{
												foreach ( $R0038357f50 as $R0f8134fb60 )
												{
																$Re559dc39a1 = $R0f8134fb60[0];
																$R37db13e189 = $R0f8134fb60[1];
																$R7afcde8999 = $R7afcde8999.$Re559dc39a1." ".$R37db13e189."\r\n";
												}
												$R51b4178493 = $R1357c9440c;
								}
								if ( 0 < $Rc918c9e179 && 0 < $R51b4178493 && 0 < $R9165cb97fd )
								{
												$R79583fa24b = factory::getinstance( "buyrights" );
												$data = array(
																"idx" => $R7661e907a4,
																"param" => "yktgroup",
																"isok" => 1,
																"pids" => ",".$R9165cb97fd
												);
												$R808b89ba0e = $R79583fa24b->IBuyRights_Create( $data );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "��ʧ�ܣ������ һ��ͨ����Ʒ�һ���ϵ�� ���а󶨣����ö���ѡ��һ��ͨ���Σ�������Ϊ".$R7661e907a4 );
												}
								}
								if ( $Rc918c9e179 < 3 )
								{
												global $path_cache;
												global $cache;
												$R3656889a44 = date( "m" )."��".date( "d" )."��һ��ͨ����_".$R55f933c773.$R51c716b966['moneyunit'];
												$R762df0f9ab = $path_cache.DS.$R3656889a44.".txt";
												$this->WriteFile( $R762df0f9ab, $R7afcde8999 );
												$this->Assign( "filename", "content".DS.$cache.DS."template".DS.$R3656889a44 );
												$this->Assign( "href", "content".DS.$cache.DS."template".DS.urlencode( $R3656889a44 ) );
								}
								$this->Alert( "��ɲ�����" );
								$this->Assign( "iswrite", $Rc918c9e179 );
								$this->Assign( "yktprice", $R55f933c773 );
								$this->Assign( "succ", $R51b4178493 );
								$this->Assign( "fail", $R94927a2851 );
								$this->Assign( "ptype", $R1b69c92460 );
					
												$this->View( );
					
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
								$R808b89ba0e = $R5ff3ab27b8->IPrice_Create( $data );
								return $R808b89ba0e;
				}

				public function DeleteFile( )
				{
								$R3656889a44 = getvar( "filename" );
								$R762df0f9ab = UPATH_ROOT.DS.$R3656889a44.".txt";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
												$this->Alert( "�ļ��Ѿ��ɹ�ɾ��" );
								}
								else
								{
												$this->Alert( "�ļ������ڣ�ɾ��ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=ykt&a=create" );
				}

				public function WriteFile( $R3656889a44, $buffer )
				{
								if ( !( $Rf500f4a848 = @fopen( $R3656889a44, "w" ) ) )
								{
												echo "Current template file '{$R511aa10c02}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $buffer );
								fclose( $Rf500f4a848 );
				}

				public function Card( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->Data( );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."CardHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"cardnumber" => getvar( "cardnumber", "" ),
												"pid" => getvar( "ubzpid" ),
												"optype" => getvar( "optype", "" ),
												"ykt" => 0,
												"ptype" => getvar( "ptype", "" )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								if ( request( "stype" ) == "cardpwd" )
								{
												$data['keywords'] = base64_encode( $data['keywords'] );
												$data['cardpwd'] = $data['keywords'];
								}
								$R4e420efcc3 = $this->hander->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "cardnumber" => "����", "cardpwd" => "������", "ordno" => "������", "pname" => "��Ʒ����", "pid" => "��Ʒ���", "cardgroup" => "����" );
								$this->Recycle( "cards", "ptype>99" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R793c7fe26b = array( "-1" => "����", "0" => "����Ч", "1" => "����Ч", "2" => "δ��Ч", "3" => "ʹ����" );
								$this->Assign( "scardstate", $R793c7fe26b );
								$this->Assign( "cardstate", getvar( "cardok", "-1" ) );
								$R5026051cf5 = array( "-1" => "����", "f" => "���۳�", "s" => "δ�۳�" );
								$this->Assign( "ssellstate", $R5026051cf5 );
								$this->Assign( "sellstate", getvar( "optype", "-1" ) );
								$R209524ad64 = array( "-1" => "����", "100" => "�һ���", "101" => "��ֵ��" );
								$this->Assign( "sptype", $R209524ad64 );
								$this->Assign( "ptype", getvar( "ptype", "-1" ) );
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function Group( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"ykt" => 0
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ICard_GroupPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."YktHelper.php" );
								$R00be52aa45 = array( "pname" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function Detail( )
				{
								$R3584859062 = intval( getvar( "ubzid" ) );
								$R3db8f5c8bc = $this->hander->ICard_GetById( $R3584859062 );
								$this->Assign( "item", $R3db8f5c8bc );
					
												$this->View( );
					
				}

				public function Add( )
				{
								$this->SetYktCreateCache( );
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$this->Assign( "pid", $R8e8b5578f7 );
						
												$this->View( );
						
				}

				public function Update( )
				{
								$data = array(
												"ubzcardnumber" => urlencode( getvar( "ubzcardnumber" ) ),
												"ubzcardpwd" => urlencode( getvar( "ubzcardpwd" ) ),
												"ubzid" => intval( getvar( "ubzid" ) ),
												"ubzpid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[2]
								);
								$R3db8f5c8bc = $this->hander->ICard_Save( $data );
								$this->Alert( "�����ɹ���" );
								$this->View( "index" );
				}

				public function sSave( )
				{
								$R51b4178493 = 0;
								$R94927a2851 = 0;
								$R8e8b5578f7 = intval( getvar( "ubzpid" ) );
								$R0003a33381 = factory::getinstance( "products" );
								$R3db8f5c8bc = $R0003a33381->IProduct_Get( $R8e8b5578f7, 0, "pname" );
								$R65edce27dd = $R3db8f5c8bc['pname'];
								$R0f8134fb60 = getvar( "ubzcards" );
								$R0f8134fb60 = preg_replace( "/\r\n/", "|", $R0f8134fb60 );
								$Rcc5c6e696c = explode( "|", $R0f8134fb60 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												if ( trim( $R0f8134fb60 ) == "" )
												{
																continue;
												}
												$R63bede6b19 = $R0f8134fb60." ";
												preg_match( "/(\\s*)([^\\s]+)\\s+([^\\s]*)\\s*/i", $R63bede6b19, $R2bc3a0f355 );
												if ( $R2bc3a0f355[1] != null )
												{
																$Re559dc39a1 = " ";
																$R37db13e189 = base64_encode( trim( $R2bc3a0f355[2] ) );
												}
												else
												{
																$Re559dc39a1 = trim( $R2bc3a0f355[2] );
																if ( count( $R2bc3a0f355 ) == 4 )
																{
																				$R37db13e189 = base64_encode( trim( $R2bc3a0f355[3] ) );
																}
												}
												$data = array(
																"cardnumber" => $Re559dc39a1,
																"cardpwd" => $R37db13e189
												);
												if ( !$this->hander->ICard_IsExist( $data ) )
												{
																$data = array(
																				"cardnumber" => $Re559dc39a1,
																				"cardpwd" => $R37db13e189,
																				"cardok" => 1,
																				"pid" => $R8e8b5578f7,
																				"pname" => $R65edce27dd,
																				"addeddate" => date( "Y-m-d H-i-s" )
																);
																if ( $this->hander->ICard_Create( $data ) )
																{
																				$R51b4178493++;
																}
																else
																{
																				$R94927a2851++;
																}
												}
												else
												{
																$R94927a2851++;
												}
								}
								$this->Assign( "succ", $R51b4178493 );
								$this->Assign( "fail", $R94927a2851 );
								$this->Assign( "pname", $R65edce27dd );
								$this->Alert( "�����ɹ���" );
						
												$this->View( );
						
				}

				public function Del( )
				{
								$data = array(
												"ubzid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[1]
								);
								$this->hander->ICard_Save( $data );
								$this->Alert( "ɾ���ɹ���" );
								$this->View( "Index" );
				}

				public function MakeOkByGroup( )
				{
								$R7661e907a4 = intval( getvar( "group" ) );
								$data = array(
												"cardok" => intval( getvar( "cardok" ) )
								);
								$this->hander->ICard_UpdateByGroup( $data, $R7661e907a4 );
								$this->Alert( "�����ɹ���" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=ykt&a=group" );
				}

				public function EditPrice( )
				{
								$R7661e907a4 = intval( getvar( "group" ) );
								$data = array(
												"cprice" => doubleval( request( "newcprice" ) )
								);
								$R808b89ba0e = $this->hander->ICard_UpdateByGroup( $data, $R7661e907a4 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "�޸ĳɹ���" );
								}
								else
								{
												$this->Alert( "�޸�ʧ�ܣ�" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=ykt&by=1" );
				}

				public function Rights( )
				{
								$R51c716b966 = $this->SetLang( 1 );
								$Re9a51739d6 = factory::getinstance( "ykt" );
								$R3db8f5c8bc = $Re9a51739d6->IYkt_Get( );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R0f8134fb60['content'] = $R51c716b966['moneysymbol'].$R0f8134fb60['price'].".00".$R51c716b966['moneyunit'];
												$R026f0167b4[] = $R0f8134fb60;
								}
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" ),
												"ptype" => getvar( "ptype", "" ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"isykt" => 0,
												"catid" => $Rd2e691562d
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R422f9a4efb = factory::getinstance( "products" );
								$R4e420efcc3 = $R422f9a4efb->IProduct_Page( $data );
								$R31b5ab4330 = intval( getvar( "exchange" ) );
								$R31b5ab4330 = $R31b5ab4330 ? $R31b5ab4330 : 1;
								$this->Assign( "exchange", $R31b5ab4330 );
								$this->Assign( "ykt", $R026f0167b4 );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R00be52aa45 = array( "listprice" => "��ֵ", "pname" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function RightsSave( )
				{
								$R8e8b5578f7 = getvar( "pid" );
								$R3584859062 = getvar( "id" );
								$R34884d8d03 = getvar( "islimit" );
								$R422f9a4efb = factory::getinstance( "products" );
								$R31b5ab4330 = intval( getvar( "exchange" ) );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R8e8b5578f7 );	$Ra16d228039++	)
								{
												if ( $R34884d8d03[$Ra16d228039] == 1 )
												{
																$data = array(
																				"exchange" => $R31b5ab4330
																);
												}
												else
												{
																if ( $R34884d8d03[$Ra16d228039] == 0 )
																{
																				$data = array( "exchange" => "" );
																}
												}
												$R422f9a4efb->IProduct_Update( $data, $R8e8b5578f7[$Ra16d228039] );
								}
								$this->Alert( "�������" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=ykt&a=rights&exchange=".$R31b5ab4330 );
				}

				public function data( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array_merge( $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ICard_PageByPrice( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."YktHelper.php" );
								$R00be52aa45 = array( "pname" => "����", "pid" => "���", "listprice" => "��ֵ" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function ExchangeData( )
				{
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" ),
												"cardok" => "0",
												"ykt" => 0
								);
								$R4e420efcc3 = $this->hander->ICard_ExchangePage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."YktHelper.php" );
						
												$this->view( );
						
				}

				public function Trades( )
				{
								$Race6ab87b1 = factory::getinstance( "trades" );
								$data = array(
												"page" => intval( getvar( "page" ) ),
												"keywords" => getvar( "keywords" ),
												"aid" => "",
												"operator" => "",
												"tradetype" => getvar( "tradetype" ),
												"ykt" => "1"
								);
								$R4e420efcc3 = $Race6ab87b1->ITrade_YktPage( $data );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->view( );
						
				}

				public function Bind( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" ),
												"cardok" => getvar( "cardok", "" ),
												"ykt" => 0
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R2a51483b14 = getvar( "aid" );
								$this->Assign( "aid", $R2a51483b14 );
								include_once( UPATH_HELPER."CardHelper.php" );
								$R00be52aa45 = array( "listprice" => "��ֵ", "pname" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function BindSave( )
				{
								$R3584859062 = getvar( "id" );
								$R2a51483b14 = intval( getvar( "aid" ) );
								$data = array(
												"bind" => $R2a51483b14
								);
								$R808b89ba0e = $this->hander->ICard_UpdateMany( $data, implode( ",", $R3584859062 ) );
								$this->go( $R808b89ba0e, "�󶨳ɹ���", "��ʧ�ܣ�", "index.php?m=mod_b2b&c=ykt&a=bind&aid=".$R2a51483b14 );
				}

				public function Trans( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"keywords" => getvar( "keywords", "" ),
												"cardok" => getvar( "cardok", "" ),
												"ykt" => 0
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4aa7d6198d = factory::getinstance( "ykttrans" );
								$R4e420efcc3 = $R4aa7d6198d->IYktTrans_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "listprice" => "��ֵ", "pname" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function TranSave( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$data = array(
												"inprice" => doubleval( getvar( "inprice" ) ),
												"infeature" => getvar( "infeature", "" ),
												"outprice" => doubleval( getvar( "outprice" ) ),
												"outfeature" => getvar( "outfeature", "" ),
												"permit" => intval( getvar( "permit" ) )
								);
								$R4aa7d6198d = factory::getinstance( "ykttrans" );
								if ( $R3584859062 == 0 )
								{
												$R63bede6b19 = "���";
												$R808b89ba0e = $R4aa7d6198d->IYktTrans_Create( $data );
								}
								else
								{
												$R63bede6b19 = "����";
												$R808b89ba0e = $R4aa7d6198d->IYktTrans_Update( $data, $R3584859062 );
								}
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=ykt&a=trans" );
				}

				public function TranDel( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R4aa7d6198d = factory::getinstance( "ykttrans" );
								$R808b89ba0e = $R4aa7d6198d->IYktTrans_Del( $R3584859062 );
								$this->go( $R808b89ba0e, "ɾ���ɹ�", "ɾ��ʧ��", "index.php?m=mod_b2b&c=ykt&a=trans" );
				}

				public function AddFunds( )
				{
								$R3584859062 = intval( getvar( "ubzid" ) );
								$R3db8f5c8bc = $this->hander->ICard_GetById( $R3584859062 );
								$this->Assign( "item", $R3db8f5c8bc );
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( 0, "pwdconfig" ) );
					
												$this->View( );
					
				}

				public function FundsSave( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R8eeb1221ae = explode( "|", $R25791b03ad['pwdconfig'] );
								if ( $R8eeb1221ae[0] == 1 )
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												$Rf958605ae8 = getvar( "retradepwd" );
												if ( $R48aa85bc4e != $Rf958605ae8 )
												{
																$this->Alert( "��������ĺ�̨��ֵ���벻һ�£����������룡" );
																$this->HistoryGo( );
												}
												if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
												{
																$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
																$this->HistoryGo( );
												}
								}
								$data = array( );
								$Re0f5b440e2 = doubleval( request( "ubzczvalue" ) );
								if ( $Re0f5b440e2 == 0 )
								{
												$this->Alert( "����ܲ�Ϊ 0" );
												$this->HistoryGo( );
								}
								$R3db8f5c8bc = $this->hander->ICard_GetById( $R3584859062 );
								$R3ab1f9eb35 = $R3db8f5c8bc['money'];
								$Rc0c42883ee = $R3db8f5c8bc['money'] + $Re0f5b440e2;
								if ( $Rc0c42883ee < 0 )
								{
												$this->Alert( "һ��ͨ�����С��������Ľ��ۿ�ʧ�ܣ�" );
												$this->HistoryGo( );
								}
								$R72852f08e6 = round( $Rc0c42883ee, 2 );
								$data['money'] = $R72852f08e6;
								$Ra236db885f = getvar( "remarks" );
								if ( $Ra236db885f == "custom" )
								{
												$Ra236db885f = getvar( "remarks_custom" );
								}
								$R5d899a20a5 = $R3db8f5c8bc['cardnumber'];
								$R3db8f5c8bc = $this->hander->ICard_Update( $data, $R3584859062 );
								if ( $R3db8f5c8bc )
								{
												$this->OrderCreate( 0, $Re0f5b440e2, $Rc0c42883ee, $R3ab1f9eb35, 99, $R5d899a20a5, "����Աһ��ͨ�����", $Ra236db885f );
												if ( 0 < $Re0f5b440e2 )
												{
																$this->Alert( "��ֵ�ɹ�" );
												}
												else
												{
																$this->Alert( "�ۿ�ɹ�" );
												}
								}
								else if ( 0 < $Re0f5b440e2 )
								{
												$this->Alert( "��ֵʧ��" );
								}
								else
								{
												$this->Alert( "�ۿ�ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Ykt&a=AddFunds&ubzid=".$R3584859062 );
				}

				public function OrderCreate( $R2a51483b14, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Rb60574d852 = 99, $R45074ab3da = "", $Re82ee9b121 = "����Աһ��ͨ�����", $Ra236db885f = "" )
				{
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createfundsordno( );
								$sess = factory::getinstance( "session" );
								$admin = $sess->admin;
								$data = array(
												"ordno" => $Rdcd9105806,
												"dollars" => $R9b252bf0a7,
												"cip" => $_SERVER['REMOTE_ADDR'],
												"cname" => $R45074ab3da == "" ? getvar( "ubzaname" ) : $R45074ab3da,
												"ordstate" => 2,
												"orddate" => date( "Y-m-d H-i-s" ),
												"payment" => $Rb60574d852,
												"remarks" => $Ra236db885f,
												"admname" => $admin,
												"comefrom" => 98
								);
								$R808b89ba0e = true;
								if ( $R808b89ba0e )
								{
												if ( $Ra236db885f == "" )
												{
																$Ra236db885f = $Re82ee9b121;
												}
												$this->TradeCreate( $R2a51483b14, $Rdcd9105806, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Ra236db885f, $Rb60574d852, $admin, $R45074ab3da );
								}
								return $R808b89ba0e;
				}

				public function TradeCreate( $R2a51483b14, $Rdcd9105806, $R9b252bf0a7, $Rc0c42883ee, $R3ab1f9eb35, $Re82ee9b121, $Rb60574d852, $R4fe6545da8 = "", $R1df8368da5 )
				{
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Rb60574d852,
												"ordno" => $Rdcd9105806,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => 0,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 1,
												"yktnumber" => $R1df8368da5,
												"admname" => $R4fe6545da8,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								if ( 0 < $R9b252bf0a7 )
								{
												$data['income'] = $R9b252bf0a7;
								}
								else
								{
												$data['outcome'] = 0 - $R9b252bf0a7;
								}
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function CheckTradePwd( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R48aa85bc4e = getvar( "mytradepwd" );
								if ( trim( $R48aa85bc4e ) == "" || md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
								{
												$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
												$this->HistoryGo( );
								}
				}

}

?>
