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
class CardController extends Controller
{

				public $hander = NULL;
				public $service = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "cards" );
								$this->service = factory::getservice( "scards" );
								$this->action = array( "stocklist", "stockdel", "stockedit", "stocksave" );
				}

				public function Home( )
				{
								$this->Redirect( "Home" );
				}

				public function Index( )
				{
								include( UPATH_HELPER."CardHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"pid" => intval( request( "ubzpid" ) ),
												"optype" => getvar( "optype", "" ),
												"ykt" => 2
								);
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "cdiok" ) ) ) );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "cardnumber" => "卡号", "pname" => "商品名称", "pid" => "商品编号", "ordno" => "订单号" );
								$this->Recycle( "cards", "ptype < 100" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R5026051cf5 = array( "-1" => "所有", "f" => "已售出", "s" => "未售出" );
								$this->Assign( "ssellstate", $R5026051cf5 );
								$this->Assign( "cardstate", getvar( "optype", "" ) );
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
				}

				public function Detail( )
				{
								$R793c7fe26b = array( "0" => "已售出", "1" => "卡有效", "2" => "未生效", "3" => "使用中", "4" => "卡无效" );
								$R3584859062 = intval( request( "ubzid" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "ccdds" ) ) ) );
					
												$this->Assign( "item", $R3db8f5c8bc );
												$this->Assign( "cardstate", $R793c7fe26b );
												$this->View( );
					
				}

				public function Add( )
				{
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R929cf63f35 = DATACACHE."product.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								$R09a3346376 = BCKCACHE.DS."product".DS."ids.php";
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$R0003a33381 = factory::getinstance( "products" );
												$R4e420efcc3 = $R0003a33381->IProduct_GetAll( );
												$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								include( $R09a3346376 );
								$R026f0167b4 = array( );
								foreach ( $R4e420efcc3 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['ptype'] < 99 )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
								$R3db8f5c8bc = $R026f0167b4;
						
												$this->Assign( "item", $R3db8f5c8bc );
												$this->Assign( "pid", $R8e8b5578f7 );
												$this->View( );
						
				}

				public function Update( )
				{
								$this->CheckTradePwd( );
								$R3584859062 = intval( request( "ubzid" ) );
								$data = array(
												"cardnumber" => getvar( "ubzcardnumber" ),
												"cardok" => intval( request( "cardok" ) )
								);
								$R37db13e189 = getvar( "ubzcardpwd" );
								if ( $R37db13e189 != "" )
								{
												$data['cardpwd'] = base64_encode( $R37db13e189 );
								}
								$R3db8f5c8bc = $this->hander->ICard_Update( $data, $R3584859062 );
								$this->Alert( "更新操作成功！" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=card&a=detail&ubzid=".$R3584859062 );
				}

				public function ServiceSave( $R98aa12da5c )
				{
								$data = array(
												"ubzcards" => urlencode( getvar( "ubzcards" ) ),
												"ubzpid" => urlencode( $R98aa12da5c ),
												"ubzkmtype" => intval( request( "kmtype" ) ),
												"action" => $this->action[3]
								);
								$R3db8f5c8bc = $this->service->ICard_Save( $data );
								$this->Alert( "完成操作！" );
								$R65edce27dd = $R3db8f5c8bc['item']['ubzpname'];
								$R51b4178493 = $R3db8f5c8bc['item']['ubzsadd'];
								$R94927a2851 = $R3db8f5c8bc['item']['ubzfadd'];
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=card&a=result&pname=".urlencode( $R65edce27dd )."&succ=".$R51b4178493."&fail".$R94927a2851 );
				}

				public function Save( )
				{
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								if ( 0 < $R98aa12da5c )
								{
												$this->ServiceSave( $R98aa12da5c );
												exit( );
								}
								$R51b4178493 = 0;
								$R94927a2851 = 0;
								$R0003a33381 = factory::getinstance( "products" );
								$R3db8f5c8bc = $R0003a33381->IProduct_Get( $R8e8b5578f7, -1, "pname,price,ptype,listprice" );
								$R65edce27dd = $R3db8f5c8bc['pname'];
								$R63d0786ecc = $R3db8f5c8bc['listprice'];
								$R1b69c92460 = $R3db8f5c8bc['ptype'];
								$R7661e907a4 = $this->hander->ICard_GetMaxGroup( ) + 1;
								$R9165cb97fd = intval( request( "bindpid" ) );
								$R30c230ef2f = intval( request( "bindaid" ) );
								$Rd74ca97c05 = intval( request( "okbyaid" ) );
								$R0d9f8f778c = doubleval( getvar( "cprice" ) );
								$R460313ab13 = intval( request( "ckcardok" ) );
								$R29fdeb9060 = intval( request( "cardok" ) );
								$R29fdeb9060 = $R29fdeb9060 == 1 ? 1 : 2;
								if ( 99 < $R1b69c92460 )
								{
												$this->CheckTradePwd( );
								}
								$R30c230ef2f = $R1b69c92460 == 100 ? $R30c230ef2f : 0;
								if ( 0 < $R30c230ef2f )
								{
												$agent = $this->GetAgentCache( $R30c230ef2f );
												if ( !isset( $agent['forykt'] ) || $agent['forykt'] == 0 )
												{
																$this->Alert( "您好,该用户并非一卡通代理商,无法绑定" );
																$this->HistoryGo( );
												}
								}
								$R4fe6545da8 = $_SESSION['adminname'];
								$R0f8134fb60 = getvar( "ubzcards" );
								if ( trim( $R0f8134fb60 ) == "" )
								{
												$this->Alert( "您好,请输入要导入的卡密" );
												$this->HistoryGo( );
								}
								$R0f8134fb60 = preg_replace( "/\r\n/", "|", $R0f8134fb60 );
								$Rcc5c6e696c = explode( "|", $R0f8134fb60 );
								$Rb28feb7d6c = intval( request( "kmtype" ) );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												if ( trim( $R0f8134fb60 ) == "" )
												{
																continue;
												}
												switch ( $Rb28feb7d6c )
												{
												case 0 :
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
																				if ( !( count( $R2bc3a0f355 ) == 4 ) )
																				{
																								break;
																				}
																				$R37db13e189 = base64_encode( trim( $R2bc3a0f355[3] ) );
																}
																break;
												case 1 :
																$Re559dc39a1 = trim( $R0f8134fb60 );
																$R37db13e189 = " ";
																break;
												case 2 :
																$Re559dc39a1 = " ";
																$R37db13e189 = base64_encode( trim( $R0f8134fb60 ) );
																break;
												default :
																return;
												}
												if ( $R1b69c92460 == 100 )
												{
																$data = array(
																				"cardnumber" => $Re559dc39a1
																);
												}
												else
												{
																$data = array(
																				"cardnumber" => $Re559dc39a1,
																				"cardpwd" => $R37db13e189
																);
												}
												if ( !$this->hander->ICard_IsExist( $data ) )
												{
																$data = array(
																				"cardnumber" => $Re559dc39a1,
																				"cardpwd" => $R37db13e189,
																				"cardok" => $R1b69c92460 == 100 || $R1b69c92460 == 101 ? $R29fdeb9060 : 1,
																				"pid" => $R8e8b5578f7,
																				"ptype" => $R1b69c92460,
																				"pname" => $R65edce27dd,
																				"cprice" => 0 < $R0d9f8f778c ? $R0d9f8f778c : $R63d0786ecc,
																				"price" => $R63d0786ecc,
																				"money" => $R63d0786ecc,
																				"cardgroup" => $R7661e907a4,
																				"bindpid" => 0 < $R9165cb97fd ? $R9165cb97fd."," : "",
																				"addeddate" => date( "Y-m-d H-i-s" ),
																				"operator" => 0,
																				"bindaid" => $R30c230ef2f,
																				"okbyaid" => $R1b69c92460 == 100 ? $Rd74ca97c05 == 1 ? 0 : 1 : 0,
																				"ispay" => 0 < $R30c230ef2f && $R29fdeb9060 == 1 && $R1b69c92460 == 100 ? 1 : 0,
																				"admname" => $R4fe6545da8
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
								if ( 0 < $R51b4178493 && 0 < $R9165cb97fd )
								{
												$R79583fa24b = factory::getinstance( "buyrights" );
												$data = array(
																"idx" => $R7661e907a4,
																"param" => "yktgroup",
																"isok" => 1,
																"pids" => ",".$R9165cb97fd.","
												);
												$R808b89ba0e = $R79583fa24b->IBuyRights_Create( $data );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "绑定失败，请进入 一卡通和商品兑换关系表 进行绑定，设置对象选择一卡通批次，本批次为".$R7661e907a4 );
												}
								}
								$this->Alert( "完成操作了！" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=card&a=result&pname=".urlencode( $R65edce27dd )."&succ=".$R51b4178493."&fail=".$R94927a2851 );
				}

				public function Dels( )
				{
						
												$this->View( );
						
				}

				public function Remove( )
				{
								$R51b4178493 = 0;
								$R94927a2851 = 0;
								$Rfe4c0fdadb = intval( request( "delway" ) );
								$R0f8134fb60 = getvar( "ubzcards" );
								if ( trim( $R0f8134fb60 ) == "" )
								{
												$this->Alert( "您好,请输入要删除的卡号" );
												$this->HistoryGo( );
								}
								$R0f8134fb60 = preg_replace( "/\r\n/", "|", $R0f8134fb60 );
								$Rcc5c6e696c = explode( "|", $R0f8134fb60 );
								$R026f0167b4 = array( );
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
												switch ( $Rfe4c0fdadb )
												{
												case 1 :
																$R026f0167b4[] = "'".$Re559dc39a1."'";
																$R51b4178493++;
																break;
												case 2 :
																$R026f0167b4[] = "'".$R37db13e189."'";
																$R51b4178493++;
																break;
												case 3 :
																$R63bede6b19 = "cardnumber='".$Re559dc39a1."' and cardpwd='".$R37db13e189."'";
																if ( $this->hander->ICard_DestroyByStr( $R63bede6b19, "" ) )
																{
																				$R51b4178493++;
																}
																else
																{
																				$R94927a2851++;
																				break;
																}
												default :
																break;
												}
								}
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												switch ( $Rfe4c0fdadb )
												{
												case 1 :
																$R63bede6b19 = " cardnumber in (".$R63bede6b19.")";
																break;
												case 2 :
																$R63bede6b19 = " cardpwd in (".$R63bede6b19.")";
																break;
												}
												$this->hander->ICard_DestroyByStr( $R63bede6b19, "" );
								}
								$this->Alert( "完成操作！成功删除".$R51b4178493." 张 失败".$R94927a2851." 张" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=card&a=Dels" );
				}

				public function result( )
				{
								$R51b4178493 = intval( request( "succ" ) );
								$R94927a2851 = intval( request( "fail" ) );
								$R65edce27dd = getvar( "pname" );
								$this->Assign( "succ", $R51b4178493 );
								$this->Assign( "fail", $R94927a2851 );
								$this->Assign( "pname", $R65edce27dd );
						
												$this->View( );
						
				}

				public function Del( )
				{
								$this->hander->ICard_Delete( $this->GetId( "id" ) );
								$this->Alert( "删除成功！" );
								$this->ScriptRedirect( "Index.php?m=mod_b2b&c=card" );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
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
												echo "参数错误！";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->hander->ICard_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "修改失败！".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$R28e6bfe150 = intval( request( "ykt" ) );
								if ( $R28e6bfe150 == 2 )
								{
												$Rb7492a73f7 .= " and ptype < 100";
								}
								else
								{
												$Rb7492a73f7 .= " and ptype > 99";
								}
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->hander->ICard_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "记录还原失败！";
								}
				}

				public function DelItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"pid" => intval( request( "ubzpid" ) ),
												"optype" => getvar( "optype", "" ),
												"ykt" => intval( request( "ykt" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->ICard_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "删除失败!";
								}
				}

				public function DestroyItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"pid" => intval( request( "ubzpid" ) ),
												"optype" => getvar( "optype", "" ),
												"ykt" => intval( request( "ykt" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->ICard_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "删除失败！";
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
																$Rb7492a73f7 = "id not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "请先选择行";
																exit( );
												}
												$Rb7492a73f7 = "id in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

				public function CheckTradePwd( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R48aa85bc4e = getvar( "mytradepwd" );
								if ( trim( $R48aa85bc4e ) == "" || md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
								{
												$this->Alert( "输入的后台充值密码不正确！请重新输入！" );
												$this->HistoryGo( );
								}
				}

}

?>
