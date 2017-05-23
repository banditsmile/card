<?php


if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
class BasicController extends Controller
{

				public function __construct( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$adminrank = $Rff0cc71a1d->adminrank;
								$this->Assign( "adminrank", $adminrank );
				}

				public function Home( )
				{
								$this->Assign( "admin", "umebiz" );
						
												$this->View( );
						
				}

				public function Index( )
				{
								global $masterid;
								$R86b4133bc7 = file_exists( "../vip.php" ) ? 1 : 0;
								$R69b3453045 = file_exists( "../modules/mod_taobao/Controllers/MainController.php" ) ? 1 : 0;
								$this->Assign( "vipshop", $R86b4133bc7 );
								$this->Assign( "tbcz", $R69b3453045 );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "yssis" ) ) ) );
				}

				public function Close( )
				{
								global $masterid;
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( $masterid, "b2ccloseinfo, b2bcloseinfo, yktcloseinfo" ) );
								$this->SetWebInfo( );
						
												$this->View( );
						
				}

				public function CloseSave( )
				{
								global $masterid;
								$R3cb9cdaed2 = array(
												"b2ccloseinfo" => htmlspecialchars( getvar( "b2ccloseinfo" ) ),
												"b2bcloseinfo" => htmlspecialchars( getvar( "b2bcloseinfo" ) ),
												"yktcloseinfo" => htmlspecialchars( getvar( "yktcloseinfo" ) )
								);
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad->ISys_UpdateByMID( $R3cb9cdaed2, $masterid );
								$this->UpdateCache( "sys" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=Close" );
				}

				public function EMail( )
				{
								global $masterid;
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( ) );
								$this->SetWebInfo( );
					
												$this->View( );
					
				}

				public function Config( )
				{
								global $masterid;
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( ) );
								$this->SetWebInfo( );
							
												$this->View( );
							
				}

				public function IpLock( )
				{
								$this->Assign( "sys", $this->GetWebCache( ) );
								$this->SetWebInfo( );
							
												$this->View( );
							
				}

				public function IpLockSave( )
				{
								global $masterid;
								$R3cb9cdaed2 = array(
												"iplock" => getvar( "iplock" )
								);
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad->ISys_UpdateByStr( $R3cb9cdaed2, " 1 = 1 " );
								$this->UpdateCache( "sys" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=IpLock" );
				}

				public function Jc( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$adminrank = $Rff0cc71a1d->adminrank;
								if ( 1 < $adminrank )
								{
												$this->Alert( "此项只允许超级管理员设置！" );
												$this->HistoryGo( );
								}
								$R09a3346376 = "../modules/mod_b2b/Views/Shared/jc.html";
								$Re82ee9b121 = "";
								if ( file_exists( $R09a3346376 ) )
								{
												$Re82ee9b121 = file_get_contents( $R09a3346376 );
												$Re82ee9b121 = htmlspecialchars( $Re82ee9b121 );
								}
								$this->Assign( "b2bjc", $Re82ee9b121 );
								$this->Assign( "addtipstart", htmlspecialchars( "<!--if(\$g_action == 'Index' && \$g_controller == 'Home'){-->" ) );
								$this->Assign( "addtipend", htmlspecialchars( "<!--}-->" ) );
								$this->Assign( "example", htmlspecialchars( "<script>document.write(\"umebiz\")</script>" ) );
								$this->SetWebInfo( );
						
												$this->View( );
						
				}

				public function CheckCodeForpit( $Re2a6348a52 )
				{
								$Re2a6348a52 = str_replace( "<!--if(\$g_action == 'Index' && \$g_controller == 'Home'){-->", "", $Re2a6348a52 );
								$Re2a6348a52 = str_replace( "<!--}-->", "", $Re2a6348a52 );
								if ( strpos( $Re2a6348a52, "<!--" ) !== false || strpos( $Re2a6348a52, "<?" ) !== false || strpos( $Re2a6348a52, "<?php" ) !== false || strpos( $Re2a6348a52, "{load" ) !== false )
								{
												$this->Alert( "含有非法代码，请删除后重新提交！" );
												$this->HistoryGo( );
								}
				}

				public function JcSave( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$adminrank = $Rff0cc71a1d->adminrank;
								if ( 1 < $adminrank )
								{
												$this->Alert( "此项只允许超级管理员设置！" );
												$this->HistoryGo( );
								}
								$R09a3346376 = "../modules/mod_b2b/Views/Shared/jc.html";
								$R762df0f9ab = "../modules/mod_b2b/Views/Shared/foot.html";
								$R76ab27be8b = request( "b2bjc" );
								if ( get_magic_quotes_gpc( ) == 1 )
								{
												$R76ab27be8b = str_replace( "\\'", "'", $R76ab27be8b );
												$R76ab27be8b = str_replace( "\\\"", "\"", $R76ab27be8b );
								}
								$this->CheckCodeForpit( $R76ab27be8b );
								file_put_contents( $R09a3346376, $R76ab27be8b );
								if ( file_exists( $R762df0f9ab ) )
								{
												$R4180b2d55d = file_get_contents( $R762df0f9ab );
												$R76ab27be8b = "<!--//newhtmlfoot-->\n".$R76ab27be8b."\n<!--//endhtmlfoot-->";
												if ( strpos( $R4180b2d55d, "newhtmlfoot" ) === false )
												{
																$R4180b2d55d = $R4180b2d55d."\n".$R76ab27be8b;
												}
												else
												{
																$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/newhtmlfoot\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endhtmlfoot\\-\\-\\>/s", $R76ab27be8b, $R4180b2d55d );
												}
												if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
												{
																echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
												}
												flock( $Rf500f4a848, 2 );
												fwrite( $Rf500f4a848, $R4180b2d55d );
												fclose( $Rf500f4a848 );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=Jc" );
				}

				public function AgentStartIdSave( $Refd9dca97b = 0 )
				{
								$R2a428a15d1 = $this->GetSysById( 36, 0 );
								if ( $Refd9dca97b == $R2a428a15d1 )
								{
												return $R2a428a15d1;
								}
								if ( $Refd9dca97b == 0 )
								{
												return $R2a428a15d1;
								}
								if ( $Refd9dca97b < 0 )
								{
												return $R2a428a15d1;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R7aafbaa7b3 = $R2097a8fddf->IAgent_GetByMaxId( );
								if ( $R7aafbaa7b3 == 0 )
								{
												return $R2a428a15d1;
								}
								if ( $Refd9dca97b <= $R7aafbaa7b3 )
								{
												$this->Alert( "设置的用户注册起始编号(".$Refd9dca97b.")不应小于当前用户的最大编号(".$R7aafbaa7b3.")！" );
												return $R2a428a15d1;
								}
								$R808b89ba0e = $R2097a8fddf->IAgent_Startid( $Refd9dca97b );
								if ( $R808b89ba0e )
								{
												return $Refd9dca97b;
								}
								else
								{
												return $R2a428a15d1;
								}
				}

				public function ConfigSave( )
				{
								global $masterid;
								$R3b19ef285d = str_replace( "\\%", "%", getvar( "b2cmenu" ) );
								$R2fd57a2d0b = str_replace( "\\%", "%", getvar( "b2bmenu" ) );
								$R9cd9a39671 = str_replace( "\\%", "%", getvar( "yktnav" ) );
								$Rc873c0bdca = str_replace( "\\%", "%", getvar( "bankalert" ) );
								$Refd9dca97b = intval( request( "agentstartid", 0 ) );
								$Refd9dca97b = $this->AgentStartIdSave( $Refd9dca97b );
								$R269b99de8c = intval( request( "b2btime", 1200 ) );
								if ( $R269b99de8c <= 0 )
								{
												$this->Alert( "前台退出时间不允许小于或者等于0" );
								}
								$R3cb9cdaed2 = array(
												"config" => intval( request( "pop" ) )."|".intval( request( "turntopm" ) )."|".intval( request( "remainalert" ) )."|".intval( request( "reviewchecked" ) )."|".intval( request( "yktcharge" ) )."|".intval( request( "b2cneedlogin" ) )."|".intval( request( "dec", 3 ) )."|".intval( request( "styleb2c", 2 ) )."|".intval( request( "styleb2b", 2 ) )."|".intval( request( "styleykt", 2 ) )."|".intval( request( "b2crandcode", 0 ) )."|".intval( request( "cancel", 0 ) )."|".intval( request( "dispkf", 0 ) )."|".intval( request( "orderalert", 0 ) )."|".intval( request( "orderalerttime", 0 ) )."|".intval( request( "yktorderdispkf", 0 ) )."|".intval( request( "showagentproductkf", 0 ) )."|1|".intval( request( "msgalert", 0 ) )."|".intval( request( "msgalerttime", 0 ) )."|".intval( request( "ranktype", 0 ) )."|".intval( request( "autoprice", 0 ) )."|".intval( request( "ordertimeadjust", 0 ) )."|".intval( request( "yktcantran", 0 ) )."|".intval( request( "yktonlysanmeproduct", 0 ) )."|".intval( request( "yktdailishowkm", 0 ) )."|".intval( request( "yktdailiautoreward", 0 ) )."|".intval( request( "yktnoshowfail", 0 ) )."|".intval( request( "dispad", 0 ) )."|".intval( request( "dispbuyer", 0 ) )."|".intval( request( "rankgetprofit", -1 ) )."|".intval( request( "rankprofit", 100 ) )."|".intval( request( "canbuyafter", 0 ) )."|".intval( request( "catshowpic", 0 ) )."|".intval( request( "ownermoney", 0 ) )."|".intval( request( "yktcustomcanuse", 0 ) )."|".$Refd9dca97b."|".intval( request( "forpitcomplaint2", 0 ) )."|".intval( request( "b2btime", 1200 ) )."|".intval( request( "autocheckfrozen", 0 ) ),
												"popcontent" => htmlspecialchars( getvar( "popcontent" ) ),
												"alertremain" => doubleval( request( "alertremain" ) ),
												"hotkey" => htmlspecialchars( getvar( "hotkey" ) ),
												"b2cmenu" => htmlspecialchars( $R3b19ef285d ),
												"b2bmenu" => htmlspecialchars( $R2fd57a2d0b ),
												"fetion_send" => intval( request( "fetion_send" ) ),
												"fetion_mobile" => getvar( "fetion_mobile" ),
												"fetion_pass" => getvar( "fetion_pass" ),
												"fyktarray" => getvar( "fyktarray" ),
												"yktarray" => getvar( "yktarray" ),
												"yktnav" => htmlspecialchars( $R9cd9a39671 ),
												"fee" => doubleval( request( "fee" ) ),
												"moneysymbol" => getvar( "moneysymbol" ),
												"moneyunit" => getvar( "moneyunit" ),
												"bankalert" => htmlspecialchars( $Rc873c0bdca ),
												"loginurl" => getvar( "agentloginurl" )
								);
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad->ISys_UpdateByMID( $R3cb9cdaed2, $masterid );
								$R3cb9cdaed2 = array(
												"moneysymbol" => getvar( "moneysymbol" ),
												"moneyunit" => getvar( "moneyunit" )
								);
								$R25791b03ad->ISys_UpdateByStr( $R3cb9cdaed2, " aid > 0 " );
								if ( UB_B2C )
								{
												$this->SaveHotKey( );
												$this->SaveB2cMenu( );
								}
								if ( UB_YKT )
								{
												$this->SaveYktMenu( );
												$this->SaveYktNav( );
								}
								if ( UB_B2B )
								{
												$this->SaveB2BMenu( );
								}
								$this->UpdateCache( "sys" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=Config" );
				}

				public function SaveYktMenu( )
				{
								$R6bfb70cc05 = 1;
								if ( UB_YKT && $R6bfb70cc05 )
								{
												$R2552e540b9 = UPATH_ROOT;
												$Rcc5c6e696c = explode( DS, UPATH_ROOT );
												array_pop( $Rcc5c6e696c );
												$R2552e540b9 = implode( DS, $Rcc5c6e696c );
												$R762df0f9ab = $R2552e540b9.DS."modules".DS."mod_ykt".DS."Views".DS."Shared".DS."head.html";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R0f8134fb60 = getvar( "fyktarray" );
																$Rcc5c6e696c = explode( ",", $R0f8134fb60 );
																$R51c716b966 = $this->SetLang( 1 );
																$R7cc6651305 = "";
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				if ( trim( $R0f8134fb60 ) == "" )
																				{
																								continue;
																				}
																				$R7cc6651305 .= "<li><a href=\"{\$vd['root']}index.php?m=mod_ykt&c=product&value=".$R0f8134fb60."\"><span>".$R0f8134fb60.$R51c716b966['moneyunit']."区</span></a></li>";
																}
																$R7cc6651305 = "<!--//mhead-->\n".$R7cc6651305."<!--//endmhead-->";
																$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R7cc6651305, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
								}
				}

				public function SaveB2cMenu( )
				{
								$R6bfb70cc05 = intval( request( "b2cmenuchange" ) );
								if ( UB_B2C && $R6bfb70cc05 )
								{
												$R2552e540b9 = UPATH_ROOT;
												$Rcc5c6e696c = explode( DS, UPATH_ROOT );
												array_pop( $Rcc5c6e696c );
												$R2552e540b9 = implode( DS, $Rcc5c6e696c );
												$R762df0f9ab = $R2552e540b9.DS."modules".DS."mod_b2c".DS."Views".DS."Shared".DS."head.html";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R0f8134fb60 = getvar( "b2cmenu" );
																$R0f8134fb60 = str_replace( "\\%", "%", $R0f8134fb60 );
																$R0f8134fb60 = preg_replace( "/\r\n/", "||", $R0f8134fb60 );
																$Rcc5c6e696c = explode( "||", $R0f8134fb60 );
																$R1f10b0b348 = array( );
																$R570d9742e6 = array( );
																$R7cc6651305 = "";
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				if ( trim( $R0f8134fb60 ) == "" )
																				{
																								continue;
																				}
																				$R8eeb1221ae = explode( "|", $R0f8134fb60 );
																				$Ra09fe38af3 = $R8eeb1221ae[0];
																				$Re4a3f5f7a1 = "0";
																				$Ra3d52e52a4 = "#";
																				if ( count( $R8eeb1221ae ) == 3 )
																				{
																								$Re4a3f5f7a1 = $R8eeb1221ae[1];
																								$Ra3d52e52a4 = $R8eeb1221ae[2];
																				}
																				$R4baa43b567 = "";
																				if ( $Re4a3f5f7a1 == "1" )
																				{
																								$R4baa43b567 = " target=\"_blank\"";
																				}
																				if ( 0 < strpos( $Ra3d52e52a4, "ttp://" ) || $Ra3d52e52a4 == "#" )
																				{
																				}
																				else
																				{
																								$Ra3d52e52a4 = "{\$vd['root']}".$Ra3d52e52a4;
																				}
																				$R7cc6651305 .= "<li><a href=\"".$Ra3d52e52a4."\"".$R4baa43b567.">".$Ra09fe38af3."</a></li>";
																}
																$R7cc6651305 = "<!--//mhead-->\n".$R7cc6651305."<!--//endmhead-->";
																$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R7cc6651305, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
								}
				}

				public function SaveHotKey( )
				{
								$R60ef3f9459 = intval( request( "hkchange" ) );
								if ( UB_B2C && $R60ef3f9459 )
								{
												$R2552e540b9 = UPATH_ROOT;
												$Rcc5c6e696c = explode( DS, UPATH_ROOT );
												array_pop( $Rcc5c6e696c );
												$R2552e540b9 = implode( DS, $Rcc5c6e696c );
												$R762df0f9ab = $R2552e540b9.DS."content".DS."mod_b2c".DS."js".DS."k.js";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R0f8134fb60 = getvar( "hotkey" );
																$R0f8134fb60 = preg_replace( "/\r\n/", "||", $R0f8134fb60 );
																$Rcc5c6e696c = explode( "||", $R0f8134fb60 );
																$R1f10b0b348 = array( );
																$R570d9742e6 = array( );
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				if ( trim( $R0f8134fb60 ) == "" )
																				{
																								continue;
																				}
																				$R8eeb1221ae = explode( "|", $R0f8134fb60 );
																				list( $Ra3d52e52a4, $Ra09fe38af3 ) = $R8eeb1221ae;
																				if ( count( $R8eeb1221ae ) == 2 )
																				{
																								$Ra3d52e52a4 = $R8eeb1221ae[1];
																				}
																				$R1f10b0b348[] = "'".$Ra09fe38af3."'";
																				$R570d9742e6[] = "'".urlencode( $Ra3d52e52a4 )."'";
																}
																$Rd72ea1e41a = "//kbegin\nkw = Array(".implode( ",", $R1f10b0b348 ).");\nkv = Array(".implode( ",", $R570d9742e6 ).");\n//kend";
																$R4180b2d55d = preg_replace( "/\\/\\/kbegin(.+?)\\/\\/kend/s", $Rd72ea1e41a, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
								}
				}

				public function SaveB2bMenu( )
				{
								$Rf847015742 = "../libraries/user/vid.php";
								if ( file_exists( $Rf847015742 ) )
								{
												include( $Rf847015742 );
								}
								else
								{
												$frame = 0;
								}
								$R60ef3f9459 = 1;
								if ( UB_B2B && $R60ef3f9459 )
								{
												$R2552e540b9 = UPATH_ROOT;
												$Rcc5c6e696c = explode( DS, UPATH_ROOT );
												array_pop( $Rcc5c6e696c );
												$R2552e540b9 = implode( DS, $Rcc5c6e696c );
												$R762df0f9ab = $R2552e540b9.DS."modules".DS."mod_b2b".DS."Views".DS."Shared".DS."head.html";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R0f8134fb60 = getvar( "b2bmenu" );
																$R0f8134fb60 = str_replace( "\\%", "%", $R0f8134fb60 );
																$R0f8134fb60 = preg_replace( "/\r\n/", "||", $R0f8134fb60 );
																$Rcc5c6e696c = explode( "||", $R0f8134fb60 );
																$R1f10b0b348 = array( );
																$R570d9742e6 = array( );
																$R7cc6651305 = "";
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				if ( trim( $R0f8134fb60 ) == "" )
																				{
																								continue;
																				}
																				$R8eeb1221ae = explode( "|", $R0f8134fb60 );
																				$Ra09fe38af3 = $R8eeb1221ae[0];
																				$Re4a3f5f7a1 = "0";
																				$Ra3d52e52a4 = "#";
																				if ( count( $R8eeb1221ae ) == 3 )
																				{
																								$Re4a3f5f7a1 = $R8eeb1221ae[1];
																								$Ra3d52e52a4 = $R8eeb1221ae[2];
																				}
																				$R4baa43b567 = "";
																				if ( $Re4a3f5f7a1 == "1" )
																				{
																								$R4baa43b567 = " target=\"_blank\"";
																				}
																				if ( 0 < strpos( $Ra3d52e52a4, "ttp://" ) || $Ra3d52e52a4 == "#" )
																				{
																				}
																				else
																				{
																								$Ra3d52e52a4 = "{\$vd['root']}".$Ra3d52e52a4;
																				}
																				if ( isset( $frame ) && $frame == 1 )
																				{
																								$Ra09fe38af3 = "<span>".$Ra09fe38af3."</span>";
																				}
																				$R7cc6651305 .= "<li class=\"bian\"><a href=\"".$Ra3d52e52a4."\"".$R4baa43b567.">".$Ra09fe38af3."</a></li>";
																}
																$R7cc6651305 = "<!--//mhead-->\n".$R7cc6651305."<!--//endmhead-->";
																$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R7cc6651305, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
												$R762df0f9ab = $R2552e540b9.DS."modules".DS."mod_agent".DS."Views".DS."Shared".DS."head.html";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R7cc6651305, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
								}
				}

				public function SaveYktNav( )
				{
								$R60ef3f9459 = request( "oldyktnav" ) != request( "yktnav" ) ? 1 : 0;
								if ( UB_YKT && $R60ef3f9459 )
								{
												$R2552e540b9 = UPATH_ROOT;
												$Rcc5c6e696c = explode( DS, UPATH_ROOT );
												array_pop( $Rcc5c6e696c );
												$R2552e540b9 = implode( DS, $Rcc5c6e696c );
												$R762df0f9ab = $R2552e540b9.DS."content".DS."mod_ykt".DS."js".DS."cust.js";
												if ( file_exists( $R762df0f9ab ) )
												{
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
																fclose( $Rf500f4a848 );
																$R0f8134fb60 = getvar( "yktnav" );
																$R0f8134fb60 = str_replace( "\\%", "%", $R0f8134fb60 );
																$R0f8134fb60 = preg_replace( "/\r\n/", "||", $R0f8134fb60 );
																$Rcc5c6e696c = explode( "||", $R0f8134fb60 );
																$R1f10b0b348 = array( );
																$R570d9742e6 = array( );
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				if ( trim( $R0f8134fb60 ) == "" )
																				{
																								continue;
																				}
																				$R8eeb1221ae = explode( "|", $R0f8134fb60 );
																				list( $Ra3d52e52a4, $Ra09fe38af3 ) = $R8eeb1221ae;
																				if ( count( $R8eeb1221ae ) == 2 )
																				{
																								$Ra3d52e52a4 = $R8eeb1221ae[1];
																				}
																				$R1f10b0b348[] = "'".$Ra09fe38af3."'";
																				$R570d9742e6[] = "'".$Ra3d52e52a4."'";
																}
																$Rd72ea1e41a = "//kbegin\nkw = Array(".implode( ",", $R1f10b0b348 ).");\nkv = Array(".implode( ",", $R570d9742e6 ).");\n//kend";
																$R4180b2d55d = preg_replace( "/\\/\\/kbegin(.+?)\\/\\/kend/s", $Rd72ea1e41a, $R4180b2d55d );
																if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
																{
																				echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
																}
																flock( $Rf500f4a848, 2 );
																fwrite( $Rf500f4a848, $R4180b2d55d );
																fclose( $Rf500f4a848 );
												}
								}
				}

				public function Pwd( )
				{
								global $masterid;
								$R25791b03ad = factory::getinstance( "sys" );
								$this->Assign( "sys", $R25791b03ad->ISys_Get( 0, "pwdconfig" ) );
						
												$this->SetWebInfo( );
												$this->View( );
						
				}

				public function PwdSave( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								global $masterid;
								$R355ef3fa24 = $R25791b03ad->ISys_Get( );
								$R385485368e = getvar( "oldtradepwd" );
								if ( md5( $R385485368e ) != $R355ef3fa24['tradepwd'] )
								{
												$this->Alert( "您输入的旧密码不正确，无法修改" );
												$this->HistoryGo( );
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								$Rf958605ae8 = getvar( "retradepwd" );
								if ( $R48aa85bc4e != $Rf958605ae8 )
								{
												$this->Alert( "您两次输入的密码不正确，请重新输入" );
												$this->HistoryGo( );
								}
								$R3cb9cdaed2 = array(
												"pwdconfig" => intval( request( "tradepwdconfig" ) )
								);
								if ( trim( $R48aa85bc4e ) != "" )
								{
												$R3cb9cdaed2['tradepwd'] = md5( $R48aa85bc4e );
								}
								$R808b89ba0e = $R25791b03ad->ISys_UpdateByMID( $R3cb9cdaed2, $masterid );
								if ( $R808b89ba0e )
								{
												$this->Alert( "修改成功！" );
								}
								else
								{
												$this->Alert( "修改失败！" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=Pwd" );
				}

				public function EMailSave( )
				{
								global $masterid;
								$R3cb9cdaed2 = array(
												"mailserver" => getvar( "mailserver" ),
												"mailuser" => getvar( "mailuser" ),
												"mailpass" => getvar( "mailpass" ),
												"mailtitle" => getvar( "mailtitle" ),
												"mailcontent" => getvar( "mailcontent" ),
												"cregmailtitle" => getvar( "cregmailtitle" ),
												"cregmailbody" => getvar( "cregmailbody" ),
												"aregmailtitle" => getvar( "aregmailtitle" ),
												"aregmailbody" => getvar( "aregmailbody" ),
												"postsetting" => intval( request( "postaftercreg" ) )."|".intval( request( "postaftercbuy" ) )."|".intval( request( "postafterareg" ) )
								);
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad->ISys_UpdateByMID( $R3cb9cdaed2, $masterid );
								$this->UpdateCache( "sys" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=EMail" );
				}

				public function Update( )
				{
								global $masterid;
								$R026f0167b4 = array( );
								$Rf035a26cc6 = 80;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf035a26cc6;	$Ra16d228039++	)
								{
												$R026f0167b4[] = intval( request( "rights_".$Ra16d228039 ) );
								}
								$R8607b50296 = getvar( "website" );
								if ( $R8607b50296 != "" && strpos( $R8607b50296, "http://" ) === false )
								{
												$R8607b50296 = "http://".trim( $R8607b50296 );
								}
								$R3cb9cdaed2 = array(
												"title" => trim( getvar( "title" ) ),
												"keywords" => getvar( "keywords" ),
												"description" => getvar( "description" ),
												"webname" => trim( getvar( "webname" ) ),
												"b2cname" => trim( getvar( "b2cname" ) ),
												"yktname" => trim( getvar( "yktname" ) ),
												"website" => $R8607b50296,
												"b2csite" => getvar( "b2csite" ),
												"b2ctitle" => trim( getvar( "b2ctitle" ) ),
												"b2ckeywords" => getvar( "b2ckeywords" ),
												"b2cdescription" => getvar( "b2cdescription" ),
												"ykttitle" => trim( getvar( "ykttitle" ) ),
												"yktkeywords" => getvar( "yktkeywords" ),
												"yktdescription" => getvar( "yktdescription" ),
												"yktsite" => getvar( "yktsite" ),
												"webdesc" => getvar( "webdesc" ),
												"useragreement" => htmlspecialchars( getvar( "useragreement" ) ),
												"webbank" => getvar( "webbank" ),
												"beian" => getvar( "beian" ),
												"b2cbeian" => getvar( "b2cbeian" ),
												"yktbeian" => getvar( "yktbeian" ),
												"worktime" => getvar( "worktime" ),
												"qq" => getvar( "qq" ),
												"msn" => getvar( "msn" ),
												"hibaidu" => getvar( "hibaidu" ),
												"wangwang" => getvar( "wangwang" ),
												"email" => getvar( "email" ),
												"fax" => getvar( "fax" ),
												"tel" => getvar( "tel" ),
												"zip" => intval( request( "zip" ) ),
												"address" => getvar( "address" ),
												"cnnicno" => getvar( "cnnicno" ),
												"ptmember" => intval( request( "ptmember" ) ),
												"vip" => intval( request( "vip" ) ),
												"tpmember" => intval( request( "tpmember" ) ),
												"ypmember" => intval( request( "ypmember" ) ),
												"jpmember" => intval( request( "jpmember" ) ),
												"ptname" => getvar( "ptname" ),
												"vipname" => getvar( "vipname" ),
												"tpname" => getvar( "tpname" ),
												"ypname" => getvar( "ypname" ),
												"jpname" => getvar( "jpname" ),
												"visit" => intval( request( "visit" ) ),
												"webopen" => intval( request( "shopwebopen" ) )."|".intval( request( "b2bwebopen" ) )."|".intval( request( "yktwebopen" ) ),
												"defaultmenu" => implode( ",", $R026f0167b4 )
								);
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad->ISys_UpdateByMID( $R3cb9cdaed2, $masterid );
								$data = array(
												"defaultmenu" => implode( ",", $R026f0167b4 )
								);
								$R25791b03ad->ISys_UpdateByStr( $data, " aid > 0 " );
								$this->UpdateCache( "sys" );
								$this->UpdateDefaultIndex( );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Sys&a=Index" );
				}

				public function UpdateDefaultIndex( )
				{
								$Rfb00971820 = getvar( "defaultindex", "index" );
								$Rb986115318 = UPATH_BASE.DS."config.php";
								if ( !file_exists( $Rb986115318 ) )
								{
												$this->Alert( "您的代码文件不全！" );
								}
								if ( !( $Rf500f4a848 = @fopen( $Rb986115318, "r" ) ) )
								{
												echo "Current template file '{$Rb986115318}' not found or have no access!";
								}
								$Re82ee9b121 = @fread( $Rf500f4a848, @filesize( $Rb986115318 ) );
								fclose( $Rf500f4a848 );
								$Re82ee9b121 = preg_replace( "/define\\( \\'UB_DEFAULT\\', .*? \\);/is", "define( 'UB_DEFAULT', '{$Rfb00971820}' );", $Re82ee9b121 );
								if ( !( $Rf500f4a848 = @fopen( $Rb986115318, "w" ) ) )
								{
												echo "Current template file '{$R511aa10c02}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $Re82ee9b121 );
								fclose( $Rf500f4a848 );
				}

}

?>
