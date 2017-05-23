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
class HtmlController extends Controller
{

				public $sess = NULL;

				public function __construct( )
				{
								set_time_limit( 0 );
								$this->sess = factory::getinstance( "session" );
								include_once( UPATH_HELPER."HomeHelper.php" );
				}

				public function Home( )
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
								$this->Assign( "pid", $R4e420efcc3 );
								$R929cf63f35 = DATACACHE."article.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								$R09a3346376 = BCKCACHE.DS."article".DS."ids.php";
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$R912e539cf6 = factory::getinstance( "articles" );
												$R4e420efcc3 = $R912e539cf6->IArticle_GetId( );
												$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								include( $R09a3346376 );
								$this->Assign( "article", $R4e420efcc3 );
								$this->Assign( "tmp", $this->GetCatCache( ) );
								$this->Assign( "cat", $this->GetSubCatCache( ) );
												$this->View( );

				}

				public function GetSite( $R4f4c775ba2 )
				{
								$R3db8f5c8bc = $this->GetWebCache( );
								return $R3db8f5c8bc['website'] == $R3db8f5c8bc[$R4f4c775ba2."site"] || $R3db8f5c8bc[$R4f4c775ba2."site"] == "" ? "" : $R3db8f5c8bc[$R4f4c775ba2."site"];
				}

				public function Index( )
				{
								$R4f4c775ba2 = getvar( "thismod", UB_DEFAULT );
								if ( $R4f4c775ba2 == "b2c" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_b2c&c=Home&a=html";
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								if ( $R4f4c775ba2 == "ykt" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_ykt&c=Home&a=html";
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								$this->reset( "mod_".$R4f4c775ba2, "Home", "Index" );
								$R3e33e017cd = new HomeController( );
								$R714ca9eb87 = $R4f4c775ba2.DS;
								$R3e33e017cd->Index( true, $R714ca9eb87."index.html" );
								echo $R4f4c775ba2."系统首页生成完毕！";
				}

				public function SetB2BLogin( $R4f4c775ba2 )
				{
								if ( $R4f4c775ba2 == "b2b" && $this->sess->agent == "" )
								{
												$data = "html|html|html|html|0|html|0|0|html|0";
												$this->sess->set( "agentinfo", $data );
								}
				}

				public function UnsetB2BLogin( $R4f4c775ba2 )
				{
								if ( $R4f4c775ba2 == "b2b" && $this->sess->agent != "" )
								{
												$this->sess->agentlogout( );
								}
				}

				public function Cat( $R4f4c775ba2 = "" )
				{
								if ( $R4f4c775ba2 == "" )
								{
												$R4f4c775ba2 = getvar( "thismod", UB_DEFAULT );
								}
								if ( $R4f4c775ba2 == "b2c" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_b2c&c=html&a=cat&thismod=b2c";
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								$this->SetB2BLogin( $R4f4c775ba2 );
								$this->reset( "mod_".$R4f4c775ba2, "Category", "Index" );
								$R3e33e017cd = new CategoryController( );
								if ( $R4f4c775ba2 == "b2c" )
								{
												$Rfe63c06206 = factory::getinstance( "category" );
												$R97bf831f41 = $Rfe63c06206->ICategory_Get( 0 );
												foreach ( $R97bf831f41 as $Re7322744cb )
												{
																$R3e33e017cd->Index( $Re7322744cb['id'], true, $R4f4c775ba2.DS."cat".$Re7322744cb['id'].".html" );
												}
												$R3e33e017cd->Index( 0, true, $R4f4c775ba2.DS."cat.html" );
												echo "yes";
								}
								else
								{
												$R3e33e017cd->Index( true, $R4f4c775ba2.DS."cat.html" );
								}
								$this->UnsetB2BLogin( $R4f4c775ba2 );
								echo "商品总类目生成完毕！";
				}

				public function Product( $R3584859062 = 0, $R4f4c775ba2 = "" )
				{
								if ( $R4f4c775ba2 == "" )
								{
												$R4f4c775ba2 = getvar( "thismod", UB_DEFAULT );
								}
								$R755ba04a49 = intval( request( "id" ) );
								if ( $R755ba04a49 == 0 )
								{
												$R755ba04a49 = $R3584859062;
								}
								if ( $R4f4c775ba2 == "b2c" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_b2c&c=Product&a=Html&pid=".$R755ba04a49;
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								if ( $R4f4c775ba2 == "ykt" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_ykt&c=Product&a=Html&pid=".$R755ba04a49;
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								$this->SetB2BLogin( $R4f4c775ba2 );
								$this->reset( "mod_".$R4f4c775ba2, "Product", "Detail" );
								$R3e33e017cd = new ProductController( );
								$this->UnsetB2BLogin( $R4f4c775ba2 );
								$R3e33e017cd->Detail( $R755ba04a49, true, $R4f4c775ba2.DS."p".$R755ba04a49.".html" );
				}

				public function PinYin( $R40dbef1338 = "", $R4f4c775ba2 = "" )
				{
								$R4f4c775ba2 = getvar( "thismod", "b2c" );
								$Rb62a6519ba = getvar( "id" );
								if ( $Rb62a6519ba == "" )
								{
												$Rb62a6519ba = $R40dbef1338;
								}
								if ( $Rb62a6519ba == "" )
								{
												return;
								}
								$this->SetB2BLogin( $R4f4c775ba2 );
								$this->reset( "mod_".$R4f4c775ba2, "Product", "Index" );
								$R3e33e017cd = new ProductController( );
								$R3e33e017cd->Index( 0, true, $R4f4c775ba2.DS."list-".$Rb62a6519ba.".html" );
								$this->UnsetB2BLogin( $R4f4c775ba2 );
				}

				public function Plist( $R3584859062 = 0 )
				{
								$R4f4c775ba2 = getvar( "thismod", "b2c" );
								$R755ba04a49 = intval( getvar( "id" ) );
								if ( $R755ba04a49 == 0 )
								{
												$R755ba04a49 = $R3584859062;
								}
								if ( $R4f4c775ba2 == "b2c" )
								{
												$R0c82745ced = $this->GetSite( $R4f4c775ba2 );
												if ( $R0c82745ced != "" )
												{
																$url = $R0c82745ced."/index.php?m=mod_article&c=html&a=plist&thismod=b2c&id=".$R755ba04a49;
																if ( !( $Rfecd234f96 = file_get_contents( $url ) ) )
																{
																				exit( "远程通信错误！" );
																}
																exit( );
												}
								}
								$this->SetB2BLogin( $R4f4c775ba2 );
								$this->reset( "mod_".$R4f4c775ba2, "Product", "Index" );
								$R3e33e017cd = new ProductController( );
								$R3e33e017cd->Index( $R755ba04a49, true, $R4f4c775ba2.DS."list-".$R755ba04a49.".html" );
								$this->UnsetB2BLogin( $R4f4c775ba2 );
				}

				public function Article( $R3584859062 = 0 )
				{
								$R755ba04a49 = intval( getvar( "id" ) );
								if ( $R755ba04a49 == 0 )
								{
												$R755ba04a49 = $R3584859062;
								}
								$R0c82745ced = $this->GetSite( "b2c" );
								if ( $R0c82745ced != "" )
								{
												$url = $R0c82745ced."/index.php?m=mod_article&c=html&a=Article&id=".$R755ba04a49;
												$Rfecd234f96 = file_get_contents( $url );
								}
								$R0c82745ced = $this->GetSite( "ykt" );
								if ( $R0c82745ced != "" )
								{
												$url = $R0c82745ced."/index.php?m=mod_article&c=html&a=Article&id=".$R755ba04a49;
												$Rfecd234f96 = file_get_contents( $url );
								}
								$Rb6e523da3b = factory::getinstance( "articles" );
								$R0f8134fb60 = $Rb6e523da3b->IArticle_GetById( $R755ba04a49, "boardid" );
								if ( isset( $R0f8134fb60['boardid'] ) )
								{
												$Ref0a726ec9 = factory::getinstance( "board" );
												$R0e100b085b = $Ref0a726ec9->IBoard_GetById( $R0f8134fb60['boardid'] );
												if ( UB_B2B && strpos( $R0e100b085b['name'], "批发" ) !== false )
												{
																$this->reset( "mod_b2b", "Article", "Detail" );
																$R3e33e017cd = new ArticleController( );
												}
												else if ( UB_B2C && strpos( $R0e100b085b['name'], "零售" ) !== false )
												{
																$this->reset( "mod_b2c", "Article", "Detail" );
																$R3e33e017cd = new ArticleController( );
												}
												else if ( UB_YKT && strpos( $R0e100b085b['name'], "一卡通" ) !== false )
												{
																$this->reset( "mod_ykt", "Article", "Detail" );
																$R3e33e017cd = new ArticleController( );
												}
												else
												{
																$this->reset( "mod_article", "Home", "Detail" );
																$R3e33e017cd = new HomeController( );
												}
								}
								else
								{
												$this->reset( "mod_article", "Home", "Detail" );
												$R3e33e017cd = new HomeController( );
								}
								$R3e33e017cd->Detail( $R755ba04a49, true, "article".DS.$R755ba04a49.".html" );
				}

				public function reset( $Ra3dc35f1df, $Rae112ac1ad, $R0199aa3d2b )
				{
								global $moddir;
								global $comdir;
								global $cache;
								global $baseurl;
								global $path_cache;
								global $g_mod;
								global $g_controller;
								global $g_action;
								global $Rfd821ceebb;
								global $R0652a93b4e;
								global $path_content;
								$g_mod = $Ra3dc35f1df;
								$R8eeb1221ae = explode( "_", $g_mod );
								if ( $R8eeb1221ae[0] == "mod" )
								{
												$Rd3c3fd7322 = $moddir;
								}
								else
								{
												$Rd3c3fd7322 = $comdir;
								}
								$g_controller = $Rae112ac1ad;
								$g_action = ucfirst( $R0199aa3d2b );
								$Rfd821ceebb = UPATH_BASE.DS.$Rd3c3fd7322.DS.$g_mod.DS."Controllers".DS.ucfirst( $g_controller )."Controller".".php";
								$R0652a93b4e = UPATH_BASE.DS.$Rd3c3fd7322.DS.$g_mod.DS."Views";
								$path_cache = UPATH_BASE.DS."content".DS.$cache.DS."template";
								if ( $baseurl == "" || $baseurl == "/" )
								{
												$Ra1b993256f = "/";
								}
								else
								{
												$Ra1b993256f = $baseurl."/";
								}
								$path_content = $Ra1b993256f."content/".$Ra3dc35f1df."/";
								require_once( $Rfd821ceebb );
								include_once( UPATH_HELPER."HtmlHelper.php" );
				}

}

?>
