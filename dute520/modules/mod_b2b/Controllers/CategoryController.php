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
class CategoryController extends Controller
{

				public $instance = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "category" );
								$this->action = array( "catlist", "catdelete", "catedit", "catadd" );
				}

				public function Index( )
				{
								$R3330820ede = intval( request( "grandfatherid" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "jqwew" ) ) ) );
								$R71a664ef8c = $this->PageInfo( );
								$R2a51483b14 = intval( request( "aid" ) );
								$Ra7e7c7ba21 = intval( request( "custom" ) );
								if ( getvar( "stype" ) == "name" )
								{
												$data = array(
																"custom" => $Ra7e7c7ba21
												);
								}
								else
								{
												$data = array(
																"parentid" => $Rac9b8532b8,
																"aid" => $R2a51483b14,
																"custom" => $Ra7e7c7ba21
												);
								}
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->ICategory_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "Ãû³Æ", "pinyin" => "Ê××ÖÄ¸", "ordering" => "ÅÅÐò" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "parent", $R3db8f5c8bc );
								$this->Assign( "grandfatherid", $R3330820ede );
								$this->Assign( "cat", $this->instance->ICategory_Get( $R3330820ede, -1, 0, $Ra7e7c7ba21 ) );
					
												$this->view( );
					
				}

				public function Coupon( )
				{
								$R030cbb891f = $this->instance->ICategory_GetByName( "Ö§¸¶Àà" );
								if ( !isset( $R030cbb891f['name'] ) )
								{
												$this->AddCoupon( );
								}
								$R3db8f5c8bc = $this->instance->ICategory_GetById( $R030cbb891f['id'] );
								$Rac9b8532b8 = $R030cbb891f['id'];
								$R3330820ede = 0;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->ICategory_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "Ãû³Æ", "pinyin" => "Ê××ÖÄ¸", "ordering" => "ÅÅÐò" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "parent", $R3db8f5c8bc );
								$this->Assign( "grandfatherid", $R3330820ede );
								$this->Assign( "cat", $this->instance->ICategory_Get( $R3330820ede ) );
						
												$this->view( );
						
				}

				public function Cat( $Re7795ce713 = 0 )
				{
								$R3330820ede = intval( getvar( "grandfatherid" ) );
								$Rac9b8532b8 = intval( getvar( "parentid" ) );
								if ( $Rac9b8532b8 == 0 )
								{
												$Rac9b8532b8 = intval( $Re7795ce713 );
								}
								$this->Assign( "cat", $this->instance->ICategory_Get( $R3330820ede ) );
								$this->Assign( "items", $this->instance->ICategory_Get( $Rac9b8532b8 ) );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "grandfatherid", $R3330820ede );
						
												$this->view( );
						
				}

				public function Ordering( )
				{
								$Rac9b8532b8 = intval( request( "parentid", -1 ) );
								$R60169cd1c4 = factory::getinstance( "category" );
								$R3db8f5c8bc = $R60169cd1c4->ICategory_Get( $Rac9b8532b8 );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( 0 < $R0f8134fb60['parentid'] )
												{
																$R60169cd1c4->ICategory_Update( array(
																				"ordering" => strlen( $R0f8134fb60['name'] )
																), $R0f8134fb60['id'] );
												}
								}
								if ( 0 < $Rac9b8532b8 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=category&grandfatherid=0&aid=-1&parentid=".$Rac9b8532b8."&custom=0" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Category" );
								}
				}

				public function Del( )
				{
								$R36130a8639 = intval( getvar( "optype", 1 ) );
								$data = array(
												"optype" => $R36130a8639,
												"ubzdid" => intval( getvar( "ubzdid" ) ),
												"action" => $this->action[1]
								);
								$Rcd0c741934 = intval( getvar( "catid" ) );
								$this->instance->ICategory_Delete( $Rcd0c741934 );
								if ( $R36130a8639 == 2 )
								{
												$this->view( "subcat" );
								}
								else
								{
												$this->view( "cat" );
								}
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "uwbva" ) ) ) );
					
												$this->Assign( "item", $R3db8f5c8bc );
												$this->Assign( "parent", $R494af0fa28 );
												$this->View( );
					
				}

				public function AddCoupon( )
				{
								$data = array( "parentid" => 0, "color" => "#000000", "ordering" => 0, "name" => "Ö§¸¶Àà", "pinyin" => "", "abst" => "", "hot" => 0, "shared" => 0, "forb2b" => 0, "forb2c" => 0, "forykt" => 0, "fork2k" => 1, "fee" => 0, "code" => 0 );
								$R808b89ba0e = $this->instance->ICategory_Create( $data );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "¶ÁÈ¡Ê§°Ü£¡" );
												$this->HistoryGo( );
								}
				}

				public function Save( )
				{
								$R2a51483b14 = intval( request( "aid", -1 ) );
								$R3584859062 = intval( request( "id" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R3330820ede = intval( request( "grandfatherid" ) );
								$data = array(
												"parentid" => $Rac9b8532b8,
												"color" => getvar( "color", "#000000" ),
												"ordering" => intval( request( "ordering" ) ),
												"name" => getvar( "name" ),
												"pinyin" => getvar( "pinyin" ),
												"abst" => getvar( "abst" ),
												"hot" => intval( request( "hot", 0 ) ),
												"shared" => intval( request( "shared", 0 ) ),
												"forb2b" => intval( request( "forb2b", 0 ) ),
												"forb2c" => intval( request( "forb2c", 0 ) ),
												"forykt" => intval( request( "forykt", 0 ) ),
												"fork2k" => intval( request( "fork2k", 0 ) ),
												"fee" => doubleval( request( "fee", 0 ) ),
												"code" => getvar( "code", "" ),
												"pics" => getvar( "pics", "catnopic.gif" ),
												"gateway" => intval( request( "gateway", 1 ) ),
												"czaccount" => getvar( "czaccount", "" ),
												"cdesc" => htmlspecialchars( getvar( "cdesc" ) ),
												"czweb" => getvar( "czweb" ),
												"cost" => getvar( "cost" ),
												"contact" => getvar( "contact" ),
												"aid" => $R2a51483b14
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $this->instance->ICategory_Update( $data, $R3584859062 );
								}
								else
								{
												$R808b89ba0e = $this->instance->ICategory_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
												$this->Alert( "²Ù×÷³É¹¦£¡" );
								}
								$R36b9ff2e13 = intval( request( "coupon" ) );
								if ( 0 < $Rac9b8532b8 )
								{
												$R9906335164 = array(
																"id" => $R3584859062
												);
												if ( $R36b9ff2e13 == 0 )
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=category&grandfatherid=".$R3330820ede."&parentid=".$Rac9b8532b8 );
												}
												else
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=category&a=coupon&grandfatherid=".$R3330820ede."&parentid=".$Rac9b8532b8 );
												}
								}
								else if ( $R36b9ff2e13 == 0 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=category" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=category&a=coupon" );
								}
				}

				public function Html( $data = array( ) )
				{
							
												$this->Assign( "catid", $data['catid'] );
												$this->View( );
							
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
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
												echo "²ÎÊý´íÎó£¡";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->instance->ICategory_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
												echo "";
								}
								else
								{
												echo "ÐÞ¸ÄÊ§°Ü£¡".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->instance->ICategory_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
												echo "";
								}
								else
								{
												echo "¼ÇÂ¼»¹Ô­Ê§°Ü£¡";
								}
				}

				public function DestroyItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$Ra7e7c7ba21 = intval( request( "custom" ) );
								if ( getvar( "stype" ) == "name" )
								{
												$data = array(
																"custom" => $Ra7e7c7ba21
												);
								}
								else
								{
												$data = array(
																"parentid" => $Rac9b8532b8,
																"aid" => $R2a51483b14,
																"custom" => $Ra7e7c7ba21
												);
								}
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICategory_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
												echo "";
								}
								else
								{
												echo "É¾³ýÊ§°Ü£¡";
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
																echo "ÇëÏÈÑ¡ÔñÐÐ";
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

				public function DelItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$Ra7e7c7ba21 = intval( request( "custom" ) );
								if ( getvar( "stype" ) == "name" )
								{
												$data = array(
																"custom" => $Ra7e7c7ba21
												);
								}
								else
								{
												$data = array(
																"parentid" => $Rac9b8532b8,
																"aid" => $R2a51483b14,
																"custom" => $Ra7e7c7ba21
												);
								}
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICategory_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "É¾³ýÊ§°Ü!";
								}
								else
								{
												$this->UpdateCache( "category" );
												echo "";
								}
				}

}

?>
