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
class HomeController extends Controller
{

				public $session = NULL;

				public function __construct( )
				{
								global $g_action;
								if ( strtolower( $g_action ) != "timecache" )
								{
												$this->session = factory::getinstance( "session" );
								}
				}

				public function Home( )
				{
								$R63bede6b19 = $this->getorderstr( );
								include( "..".DS."libraries".DS."user".DS."version.php" );
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$Rb45d972ba1 = $Rf3579f5c8c->ISys_Info( 0, $R63bede6b19 );
								$R13d6df50e3 = request( "showver" );
								global $path_cache;
								$R3d9a15f4b8 = $path_cache.DS."u.php";
								if ( file_exists( $R3d9a15f4b8 ) )
								{
												include( $R3d9a15f4b8 );
												$R3db8f5c8bc = unserialize( base64_decode( $Re09ff0582b ) );
								}
								else
								{
												$R9ba4aea5f9 = factory::getservice( "sversion" );
												$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
												$Re82ee9b121 = "\$Re09ff0582b='".base64_encode( serialize( $R3db8f5c8bc ) )."'";
												$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
												file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
								}
								$Rcadc43082c = $vernum < $R3db8f5c8bc['vernum'] ? 1 : 0;
								if ( $R13d6df50e3 == 0 )
								{
												$Rcadc43082c = 0;
								}
								$this->Assign( "showver", intval( $R13d6df50e3 ) );
								$this->Assign( "need", $Rcadc43082c );
								$this->Assign( "newversion", $R3db8f5c8bc['version'] );
								$this->Assign( "version", $version );
								$this->Assign( "sysinfo", $Rb45d972ba1 );
								$R3db8f5c8bc['rundays'] = $this->DateNowSub( $R3db8f5c8bc['spcdate'] );
								$R3db8f5c8bc['spedate1'] = date( "Y-m-d", strtotime( $R3db8f5c8bc['spedate'] ) );
								$R3db8f5c8bc['elapsedays'] = $this->DateNowSub( $R3db8f5c8bc['spedate'], 0 );
								$this->Assign( "sys", $R3db8f5c8bc );
								$this->Assign( "admin", $this->session->admin );
								$this->View( );
				}

				public function DateNowSub( $R5b08d4f823, $R5cc00cfbe4 = 1 )
				{
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								if ( $R5cc00cfbe4 )
								{
												$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								}
								else
								{
												$R35a9abe007 = $R5d6b0116e4 - $Rd94164fb8c;
								}
								if ( $R35a9abe007 < 0 )
								{
												$R35a9abe007 = 0;
								}
								$R7f49613fdd = intval( $R35a9abe007 / 86400 );
								$R63bede6b19 = $R7f49613fdd;
								return $R63bede6b19;
				}

				public function Help( )
				{
								$R30b2ab8dc1 = getvar( "t" );
								$R2436d353f1 = "";
								$Ra09fe38af3 = "";
								$this->ScriptRedirect( "http://www.yingxkg.tk/ubhelp/?t=".$R30b2ab8dc1."&uid=".$R2436d353f1."&k=".$Ra09fe38af3 );
				}

				public function Index( )
				{
								$this->Assign( "admin", $this->session->admin );
								$this->view( );
				}

				public function Left( )
				{
								$this->Assign( "version", "ubphp 1.0.1" );
								$leftinfo = array(
												array(
																"name" => "系统桌面",
																"cls" => "jh",
																"id" => array( 0, 0, 0 ),
																"val" => array(
																				array( "id" => 99999, "txt" => "系统桌面", "url" => "?c=Home&a=Home", "nobr" => 1 ),
																				array( "id" => 0, "txt" => "平台基本设置", "url" => "?m=mod_b2b&c=Sys" ),
																				array( "id" => 30, "txt" => "添加新闻", "url" => "?m=mod_b2b&c=Article&a=Add" ),
																				array( "id" => 34, "txt" => "最新订单", "url" => "?m=mod_b2b&c=Order&aid=-2" ),
																				array( "id" => 16, "txt" => "商品列表", "url" => "?m=mod_b2b&c=Product&ptype=-1&aid=-1" ),
																				array( "id" => 16, "txt" => "添加商品", "url" => "?m=mod_b2b&c=PS&a=create" ),
																				array( "id" => 24, "txt" => "批量加卡", "url" => "?m=mod_b2b&c=Card&a=Add" ),
																				array( "id" => 26, "txt" => "最新用户", "url" => "?m=mod_b2b&c=Agent" ),
																				array( "id" => 35, "txt" => "用户充值记录", "url" => "?m=mod_b2b&c=Funds" ),
																				array( "id" => 32, "txt" => "未读站内信", "url" => "?m=mod_b2b&c=PM&msgto=0&isreaded=-1&msgtype=1&by=1" ),
																				array( "id" => 33, "txt" => "凤翔未读短信息", "url" => "?m=mod_b2b&c=Msg&optype=r&ubzisreaded=0" ),
																				array( "id" => 35, "txt" => "平台利润报表", "url" => "?m=mod_b2b&c=Profit&aid=-1&s=1" ),
																				array( "id" => 99999, "txt" => "退出", "url" => "?c=Home&a=Logout" )
																)
												)
								);
								$R026f0167b4 = array( );
								$R8a2e825e62 = 0;
								$Ra0c8454e75 = $this->session->adminrights;
								foreach ( $leftinfo as $R0f8134fb60 )
								{
												$Ra16d228039 = 0;
												foreach ( $R0f8134fb60['val'] as $Rd45e507c4c )
												{
																if ( isset( $Rd45e507c4c['b2c'] ) && $Rd45e507c4c['b2c'] == 1 && UB_B2C == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['isvip'] ) && $Rd45e507c4c['isvip'] == 1 && $R86b4133bc7 == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['ykt'] ) && $Rd45e507c4c['ykt'] == 1 && UB_YKT == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['b2b'] ) && $Rd45e507c4c['b2b'] == 1 && UB_B2B == 0 )
																{
																				continue;
																}
																$Rb32f694545 = 1;
																if ( 1 < $this->session->adminrank )
																{
																				if ( $Rd45e507c4c['id'] == 99999 || isset( $Ra0c8454e75[$Rd45e507c4c['id']] ) && $Ra0c8454e75[$Rd45e507c4c['id']] == 1 )
																				{
																								$Rb32f694545 = 1;
																				}
																				else
																				{
																								$Rb32f694545 = 0;
																				}
																}
																if ( $Rb32f694545 == 1 )
																{
																				$R026f0167b4[] = $Rd45e507c4c;
																}
												}
								}
								$this->Assign( "left", $R026f0167b4 );
								$this->view( );
				}

				public function GetMenu( $R86b4133bc7 = 0, $R69b3453045 = 0, $R51c50d437c = 0 )
				{
								include( "menu.php" );
								$R026f0167b4 = array( );
								$R8a2e825e62 = 0;
								$Ra0c8454e75 = $this->session->adminrights;
								foreach ( $leftinfo as $R0f8134fb60 )
								{
												$Ra16d228039 = 0;
												foreach ( $R0f8134fb60['val'] as $Rd45e507c4c )
												{
																if ( isset( $Rd45e507c4c['b2c'] ) && $Rd45e507c4c['b2c'] == 1 && UB_B2C == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['isvip'] ) && $Rd45e507c4c['isvip'] == 1 && $R86b4133bc7 == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['ishistory'] ) && $Rd45e507c4c['ishistory'] == 1 && $R51c50d437c == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['istb'] ) && $Rd45e507c4c['istb'] == 1 && $R69b3453045 == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['ykt'] ) && $Rd45e507c4c['ykt'] == 1 && UB_YKT == 0 )
																{
																				continue;
																}
																if ( isset( $Rd45e507c4c['b2b'] ) && $Rd45e507c4c['b2b'] == 1 && UB_B2B == 0 )
																{
																				continue;
																}
																$Rb32f694545 = 1;
																if ( 1 < $this->session->adminrank )
																{
																				if ( $Rd45e507c4c['id'] == 99999 || isset( $Ra0c8454e75[$Rd45e507c4c['id']] ) && $Ra0c8454e75[$Rd45e507c4c['id']] == 1 )
																				{
																								$Rb32f694545 = 1;
																				}
																				else
																				{
																								$Rb32f694545 = 0;
																				}
																}
																if ( $Rb32f694545 == 1 )
																{
																				if ( $Ra16d228039 == 0 )
																				{
																								if ( $R8a2e825e62 == 0 )
																								{
																												$Rbef053222f = "";
																								}
																								else
																								{
																												$Rbef053222f = "||";
																								}
																								$R8a2e825e62 = 1;
																								$Ra16d228039 = 1;
																								$Rcc187a276b = $R0f8134fb60['name'];
																								if ( $Rcc187a276b != $Rd45e507c4c['txt'] )
																								{
																												$R026f0167b4[] = $Rbef053222f."<a href=\"".$Rd45e507c4c['url']."\" target=\"frmright\" onFocus=\"this.blur()\">".$Rcc187a276b."</a>";
																												$Rbef053222f = "@@";
																								}
																				}
																				else
																				{
																								$Rbef053222f = "@@";
																								$Rcc187a276b = $Rd45e507c4c['txt'];
																				}
																				$R026f0167b4[] = $Rbef053222f."<a href=\"".$Rd45e507c4c['url']."\" target=\"frmright\" onFocus=\"this.blur()\">".$Rd45e507c4c['txt']."</a>";
																}
												}
								}
								$R63bede6b19 = implode( "", $R026f0167b4 );
								return $R63bede6b19;
				}

				public function top( )
				{
								global $masterid;
								$R25791b03ad = factory::getinstance( "sys" );
								$R20fd65e9c7 = $R25791b03ad->ISys_Get( $masterid, "webname,website,yktsite,b2csite,config" );
								$Rad9e4fa228 = "";
								if ( $R20fd65e9c7['yktsite'] != "" && $R20fd65e9c7['yktsite'] != $R20fd65e9c7['website'] )
								{
												$Rad9e4fa228 = $R20fd65e9c7['yktsite'];
								}
								$R5469e7e7a5 = "";
								if ( $R20fd65e9c7['b2csite'] != "" && $R20fd65e9c7['b2csite'] != $R20fd65e9c7['website'] )
								{
												$R5469e7e7a5 = $R20fd65e9c7['b2csite'];
								}
								$this->Assign( "yktsite", $R20fd65e9c7['yktsite'] );
								$this->Assign( "b2csite", $R20fd65e9c7['b2csite'] );
								$this->Assign( "webname", $R20fd65e9c7['webname'] );
								$this->Assign( "admin", $this->session->admin );
								$this->Assign( "sys", $R20fd65e9c7 );
								$R86b4133bc7 = file_exists( "../vip.php" );
								$R69b3453045 = file_exists( "../modules/mod_taobao/Controllers/MainController.php" );
								$R51c50d437c = $this->HistoryTime( );
								$R51c50d437c = 0 < $R51c50d437c ? 1 : 0;
								$R71093ef866 = $this->GetMenu( $R86b4133bc7, $R69b3453045, $R51c50d437c );
								$this->Assign( "tempstr", $R71093ef866 );
								$this->view( );
				}

				public function Login( )
				{
								$this->View( );
				}

				public function Save( )
				{
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = trim( request( "VerifyCode", "", "POST" ) );
								if ( $Rd19ae93b31 == "" || strtolower( $Rb7da52a305 ) != strtolower( $Rd19ae93b31 ) )
								{
												$this->Alert( "验证码出错" );
												$this->View( "Login" );
												exit( );
								}
								$Re8bade8a5f = getvar( "adminname" );
								$R992179c341 = getvar( "adminpass" );
								$adminrank = intval( request( "adminrank" ) );
								global $masterid;
								$data = array(
												"adminName" => $Re8bade8a5f,
												"adminPass" => md5( $R992179c341 ),
												"adminrank" => $adminrank,
												"aid" => $masterid
								);
								$Re9e4225a22 = array(
												"ip" => $this->GetIp( ),
												"hde" => getvar( "hde" ),
												"mac" => getvar( "mac" ),
												"cpu" => getvar( "cpu" )
								);
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R808b89ba0e = $Rfc5c48c798->IMaster_Login( $data, $Re9e4225a22 );		
								if ( $this->CheckMiBaoKa( $Re8bade8a5f ) == 0 )
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "密保输入错误，登陆失败", 0 );
												$this->Alert( "密保输入错误，请重新输入！" );
												$this->HistoryGo( );
								}
								if ( $this->VerifyMobile( $Re8bade8a5f ) == 0 )
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "令牌输入错误，登陆失败", 0 );
												$this->Alert( "令牌输入错误，请重新输入！" );
												$this->HistoryGo( );
								}
								if ( !$R808b89ba0e )
								{
												global $masterid;
												$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
												$adminrank = $R3db8f5c8bc['adminRank'];
												$Rcc5c6e696c = explode( ",", $R3db8f5c8bc['rights'] );
												if ( count( $Rcc5c6e696c ) < 35 )
												{
																$R63bede6b19 = "";
																
																for ( $Ra16d228039 = 0;	$Ra16d228039 < 255;	$Ra16d228039++	)
																{
																				$R63bede6b19 .= ",0";
																}
																$R3db8f5c8bc['rights'] = $R3db8f5c8bc['rights'].$R63bede6b19;
												}
												$this->AddLogin( $R3db8f5c8bc['id'], 0, $Re8bade8a5f, 0, 0, "成功登陆", 1 );
												$this->session->set( "adminrank", $adminrank );
												$this->session->set( "adminrights", $R3db8f5c8bc['rights'] );
												$this->session->set( "adminname", $Re8bade8a5f );
												$this->session->set( "mid", $masterid );
												$this->Clear( );
												header( "location:index.php" );
								}
								else if ( 1 < $R808b89ba0e )
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "非本机登录，登陆失败", 0 );
												$this->Alert( "非本机登录！" );
												$this->View( "Login" );
								}
								else if ( $R808b89ba0e == -1 )
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "密码输入错误，登陆失败", 0 );
												$this->Alert( "密码输入错误" );
												$this->View( "Login" );
								}
								else if ( $R808b89ba0e == -2 )
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "级别输入错误，登陆失败", 0 );
												$this->Alert( "级别输入错误" );
												$this->View( "Login" );
								}
								else
								{
												$this->AddLogin( 0, 0, $Re8bade8a5f, 0, 0, "账号输入错误，登陆失败", 0 );
												$this->Alert( "管理员不存在" );
												$this->View( "Login" );
								}
				}

				public function Clear( )
				{
								$R63bede6b19 = "\$R590433f7d3=".time( );
								$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
								file_put_contents( DATACACHE."admlogin.php", $Re82ee9b121 );
								$this->dir_clear( BCKCACHE.DS."article".DS );
								$this->dir_clear( BCKCACHE.DS."agent".DS );
								$this->dir_clear( BCKCACHE.DS."order".DS );
								$this->dir_clear( BCKCACHE.DS."product".DS );
				}

				public function dir_clear( $R714ca9eb87 )
				{
								$R9c25b10d53 = dir( $R714ca9eb87 );
								while ( $R3244a15a51 = $R9c25b10d53->read( ) )
								{
												$R3656889a44 = $R714ca9eb87."/".$R3244a15a51;
												if ( is_file( $R3656889a44 ) )
												{
																@unlink( $R3656889a44 );
												}
								}
								$R9c25b10d53->close( );
				}

				public function CheckMiBaoKa( $Re8bade8a5f )
				{
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R679e9b9234 = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( isset( $R679e9b9234['mibaokacheck'] ) && $R679e9b9234['mibaokacheck'] == 1 )
								{
												if ( isset( $_SESSION['mibaorandcode'] ) )
												{
																$R60125139d3 = $_SESSION['mibaorandcode'];
																$Rcc5c6e696c = explode( " ", $R60125139d3 );
																$Rd919497634 = factory::getinstance( "mibaoka" );
																$R3db8f5c8bc = $Rd919497634->IMiBaoKa_GetBySn( $R679e9b9234['mibaoka'] );
																if ( isset( $R3db8f5c8bc['xy'] ) )
																{
																				$R16182d95f4 = unserialize( $R3db8f5c8bc['xy'] );
																				$R63bede6b19 = "";
																				foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																				{
																								$R63bede6b19 .= $R16182d95f4[$R0f8134fb60];
																				}
																				$R2b9fd8dfe3 = getvar( "mibaocode" );
																				if ( $R63bede6b19 != $R2b9fd8dfe3 )
																				{
																								return 0;
																				}
																				else
																				{
																								return 1;
																				}
																}
																else
																{
																				$this->Alert( "您的密保卡已经删除" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function VerifyMobile( $Re8bade8a5f )
				{
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R679e9b9234 = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( isset( $R679e9b9234['mobilecheck'] ) && $R679e9b9234['mobilecheck'] == 1 )
								{
												if ( !isset( $_SESSION ) )
												{
																session_start( );
												}
												$Rb7da52a305 = "";
												if ( isset( $_SESSION['mobilecode'] ) )
												{
																$Rb7da52a305 = $_SESSION['mobilecode'];
												}
												$Rd19ae93b31 = request( "mobile", "", "POST" );
												if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
												{
																return 1;
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function GetText( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$R63bede6b19 = "<a href=\"index.php?m=mod_b2b&c=PM&msgto=0&isreaded=-1&msgtype=1&by=1\" target=\"frmright\">信息<font color=\"#ff0000\"><span id=\"newpm\">".$this->newpm( 1 )."</span></font>条</a>"." <a href=\"index.php?m=mod_b2b&c=Remit&msgto=0&mstate=1&by=1\" target=\"frmright\">汇款<font color=\"#ff0000\"><span id=\"newhk\">".$this->newpm( 2 )."</span></font>条</a>"." <a href=\"index.php?m=mod_b2b&c=Complaint&msgto=0&mstate=1&by=1\" target=\"frmright\">投诉<font color=\"#ff0000\"><span id=\"newts\">".$this->newpm( 3 )."</span></font>条</a>"." <a href=\"index.php?m=mod_b2b&c=Order&a=CzList&optype=sd|w&by=1&aid=-2\" target=\"frmright\">手动<font color=\"#ff0000\"><span id=\"notdealorder\">".$this->getnotdealorderbystr( " ptype=2 and aid < 1 and inrecycle = 0 and ordstate=1 " )."</span></font>个</a>"." <a href=\"index.php?m=mod_b2b&c=Order&optype=zd|w&by=1&aid=-2\" target=\"frmright\">自动<font color=\"#ff0000\"><span id=\"notdealorder1\">".$this->getnotdealorderbystr( " ptype=1 and aid < 1 and inrecycle = 0 and ordstate=1 " )."</span></font>个</a>"." <a href=\"index.php?m=mod_b2b&c=Order&optype=km|w&by=1&aid=-2\" target=\"frmright\">卡类<font color=\"#ff0000\"><span id=\"notdealorder2\">".$this->getnotdealorderbystr( " (ptype=0 or ptype=3 or ptype>99) and aid < 1 and inrecycle = 0 and ordstate=1 " )."</span></font>个</a>";
								echo $R63bede6b19;
				}

				public function GetSysMsg( )
				{
								echo $this->newmsg( )."|".$this->newpm( 1 )."|".$this->newpm( 2 )."|".$this->newpm( 3 )."|".$this->getnotdealorderbystr( " ptype=2 and aid < 1 and inrecycle=0 and ordstate=1 " )."|".$this->getnotdealorderbystr( " ptype=1 and aid < 1 and inrecycle=0 and ordstate=1 " )."|".$this->getnotdealorderbystr( " (ptype=0 or ptype=3 or ptype>99) and aid < 1 and inrecycle = 0 and ordstate=1 " );
				}

				public function newmsg( )
				{return '';
								$data = array( "action" => "msgnewrows" );
								$R36a3672f77 = factory::getservice( "smsg" );
								$R8fba2824a0 = $R36a3672f77->IMsg_Rows( $data );
								return $R8fba2824a0;
				}

				public function newpm( $R21784dec6e )
				{
								$R0df6d3e299 = factory::getinstance( "msg" );
								if ( $R21784dec6e == 1 )
								{
												$data = array(
																"msgto" => 0,
																"isreaded" => -1,
																"msgtype" => $R21784dec6e,
																"inrecycle" => 0
												);
								}
								else if ( $R21784dec6e == 2 )
								{
												$data = array(
																"msgto" => 0,
																"msgtype" => $R21784dec6e,
																"inrecycle" => 0,
																"msgstate" => 1,
																"parentid" => 0
												);
								}
								else if ( $R21784dec6e == 3 )
								{
												$data = array(
																"msgto" => 0,
																"msgtype" => $R21784dec6e,
																"inrecycle" => 0,
																"msgstate" => 1,
																"parentid" => 0
												);
								}
								return $R0df6d3e299->IMsg_Rows( $data );
				}

				public function getorderstr( )
				{
								$Ra0c8454e75 = $this->session->adminrights;
								$R1d47c61d5b = array( );
								$Rd8bc39b09c = 0;
								$Rae4e28e772 = 0;
								$Raae6940545 = 0;
								$R026f0167b4 = array( );
								if ( 1 < $this->session->adminrank )
								{
												if ( $Ra0c8454e75[39] == 1 )
												{
																$R026f0167b4[] = " ptype = 0 or ptype = 3 or ptype > 99 ";
												}
												if ( $Ra0c8454e75[40] == 1 )
												{
																$R026f0167b4[] = " ptype = 1 ";
												}
												if ( $Ra0c8454e75[41] == 1 )
												{
																$R026f0167b4[] = " ptype = 2 ";
												}
								}
								$R63bede6b19 = implode( " or ", $R026f0167b4 );
								return $R63bede6b19;
				}

				public function getnotdealorder( )
				{
								$R63bede6b19 = $this->getorderstr( );
								$R026f0167b4 = array( );
								if ( $R63bede6b19 != "" )
								{
												$R026f0167b4[] = " (".$R63bede6b19.") ";
								}
								$R026f0167b4[] = " ordstate = 1 ";
								$R026f0167b4[] = " inrecycle = 0 ";
								$R026f0167b4[] = " aid < 1 ";
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								$R0d54236da2 = intval( request( "e" ) );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Re484ed591e = $Rdeabc7f106->IOrder_QueryRows( $R63bede6b19 );
								unset( $R026f0167b4 );
								if ( $R0d54236da2 == 0 )
								{
												return $Re484ed591e;
								}
								else
								{
												echo $Re484ed591e;
								}
				}

				public function getnotdealorderbystr( $R63bede6b19 )
				{
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Re484ed591e = $Rdeabc7f106->IOrder_QueryRows( $R63bede6b19 );
								return $Re484ed591e;
				}

				public function AnnGet( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$Re50b8c3cbe = factory::getservice( "sann" );
								echo $Re50b8c3cbe->IAnn_Get( );
				}

				public function Logout( )
				{
								$this->session->adminlogout( );
								echo "<script type=\"text/javascript\">window.top.location=(\"index.php?m=mod_home&a=login\")</script>";
								exit( );
				}

				public function CheckMobile( )
				{
								$Re8bade8a5f = getvar( "aname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												return;
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = array( );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( isset( $R3db8f5c8bc['mobilecheck'] ) && $R3db8f5c8bc['mobilecheck'] == 1 && $R3db8f5c8bc['mobile'] != "" )
								{
												if ( !isset( $_SESSION ) )
												{
																session_start( );
												}
												$R7e43ed30df = $R3db8f5c8bc['mobile'];
												$Rd19ae93b31 = rand( 100000, 999999 );
												$R20916143ed = factory::getinstance( "fetion" );
												$Rbb3e87fa4e = "您的令牌为".$Rd19ae93b31;
												$Rbb3e87fa4e = iconv( "gb2312", "UTF-8", $Rbb3e87fa4e );
												$R7adfab20b6 = array(
																"sendto" => $R7e43ed30df,
																"nor" => 1,
																"sms" => $Rbb3e87fa4e
												);
												$_SESSION['mobilecode'] = $Rd19ae93b31;
												$R20916143ed->IFetion_Send( $R7adfab20b6 );
								}
								if ( $this->session->umebizinfo == "" )
								{
												$R9ba4aea5f9 = factory::getservice( "sversion" );
												$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
												$this->session->set( "umebizinfo", serialize( $R3db8f5c8bc ) );
								}
				}

				public function GetBiz( )
				{
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
								global $path_cache;
								$R3d9a15f4b8 = $path_cache.DS."u.php";
								if ( isset( $R3db8f5c8bc['vernum'] ) )
								{
												$Re82ee9b121 = "\$Re09ff0582b='".base64_encode( serialize( $R3db8f5c8bc ) )."'";
												$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
												file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
												include( "..".DS."libraries".DS."user".DS."version.php" );
												$Rcadc43082c = $vernum < $R3db8f5c8bc['vernum'] ? 1 : 0;
												echo $Rcadc43082c;
								}
								else
								{
												echo 0;
								}
				}

				public function TimeCache( )
				{
								$R63bede6b19 = "\$R590433f7d3=".time( );
								$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
								file_put_contents( DATACACHE."admlogin.php", $Re82ee9b121 );
								exit( );
								$R550ca511c2 = array( "order", "product", "agent", "article", "bd" );
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R422f9a4efb = factory::getinstance( "products" );
								$R6c6391b1a5 = factory::getinstance( "articles" );
								$Rcae7958c9b = factory::getinstance( "bd" );
								$Rd1e9e1cb5b = factory::getinstance( "recycle" );
								$R2852235951 = array( "parentid" => -1, "page" => 1, "inrecycle" => 0, "nrows" => 15, "by" => 0 );
								$R8e6cb4c60b = array( "optype" => "", "aid" => -2, "allaid" => 0, "page" => 1, "inrecycle" => 0, "nrows" => 15, "by" => 1 );
								$Re619be4964 = array( "ptype" => -1, "begprice" => "", "endprice" => "", "hassup" => "", "sup" => 0, "aid" => -1, "allaid" => 0, "page" => 1, "inrecycle" => 0, "nrows" => 15, "by" => 0 );
								$R4bb38011dd = array( "page" => 1, "inrecycle" => 0, "nrows" => 15, "by" => 0 );
								$R4f6c1065f9 = array( "page" => 1, "aid" => -2, "nrows" => 15, "ordstate" => 1, "by" => 0 );
								foreach ( $R550ca511c2 as $R0f8134fb60 )
								{
												$R929cf63f35 = DATACACHE.$R0f8134fb60.".php";
												if ( file_exists( $R929cf63f35 ) )
												{
																include( $R929cf63f35 );
												}
												else
												{
																$R4c6d6471cd = 0;
												}
												if ( $R0f8134fb60 == "order" )
												{
																$Ra279e72759 = array(
																				BCKCACHE.DS."order".DS."o__1.php",
																				BCKCACHE.DS."order".DS."o_sd_1.php",
																				BCKCACHE.DS."order".DS."o_sdd_1.php",
																				BCKCACHE.DS."order".DS."o_sdw_1.php"
																);
																$Raf59f827a3 = array( "", "sd", "sd|d", "sd|w" );
												}
												else if ( $R0f8134fb60 == "agent" )
												{
																$Ra279e72759 = array(
																				BCKCACHE.DS."agent".DS."a_1.php"
																);
												}
												else if ( $R0f8134fb60 == "product" )
												{
																$Ra279e72759 = array(
																				BCKCACHE.DS."product".DS."p_0_1.php",
																				BCKCACHE.DS."product".DS."p_1_1.php",
																				BCKCACHE.DS."product".DS."ids.php",
																				BCKCACHE.DS."product".DS."yktids.php",
																				BCKCACHE.DS."product".DS."yktsell.php"
																);
																$Raf59f827a3 = array( 0, 1, 2, 3, 4 );
												}
												else if ( $R0f8134fb60 == "article" )
												{
																$Ra279e72759 = array(
																				BCKCACHE.DS."article".DS."art_1.php",
																				BCKCACHE.DS."article".DS."ids.php"
																);
																$Raf59f827a3 = array( 0, 2 );
												}
												else if ( $R0f8134fb60 == "bd" )
												{
																$Ra279e72759 = array(
																				BCKCACHE.DS."bd".DS."b_1.php"
																);
												}
												$Re4a3f5f7a1 = 0;
												foreach ( $Ra279e72759 as $R09a3346376 )
												{
																if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
																{
																				if ( $R0f8134fb60 == "order" )
																				{
																								$R8e6cb4c60b['optype'] = $Raf59f827a3[$Re4a3f5f7a1];
																								$R4e420efcc3 = $Rdeabc7f106->IOrder_Page( $R8e6cb4c60b );
																				}
																				else if ( $R0f8134fb60 == "agent" )
																				{
																								$R4e420efcc3 = $R2097a8fddf->IAgent_CustomPage( $R2852235951 );
																				}
																				else if ( $R0f8134fb60 == "product" )
																				{
																								if ( $Raf59f827a3[$Re4a3f5f7a1] == 2 )
																								{
																												$R4e420efcc3 = $R422f9a4efb->IProduct_GetAll( );
																								}
																								else if ( $Raf59f827a3[$Re4a3f5f7a1] == 3 )
																								{
																												$R172196908b = "ptype > 99";
																												$R4e420efcc3 = $R422f9a4efb->IProduct_GetByStr( $R172196908b, array( ), "pname,pid" );
																								}
																								else if ( $Raf59f827a3[$Re4a3f5f7a1] == 4 )
																								{
																												$R5aee22e642 = array( "forykt" => 1 );
																												$R4e420efcc3 = $R422f9a4efb->IProduct_GetByData( $R5aee22e642, "pname,pid" );
																								}
																								else
																								{
																												$Re619be4964['allaid'] = $Raf59f827a3[$Re4a3f5f7a1];
																												$R4e420efcc3 = $R422f9a4efb->IProduct_Page( $Re619be4964, "*", "pid" );
																								}
																				}
																				else if ( $R0f8134fb60 == "article" )
																				{
																								if ( $Raf59f827a3[$Re4a3f5f7a1] == 2 )
																								{
																												$R4e420efcc3 = $R6c6391b1a5->IArticle_GetId( );
																								}
																								else
																								{
																												$R4e420efcc3 = $R6c6391b1a5->IArticle_Page( $R4bb38011dd );
																								}
																				}
																				else if ( $R0f8134fb60 == "bd" )
																				{
																								$R4e420efcc3 = $Rcae7958c9b->IBD_Page( $R4f6c1065f9 );
																				}
																				$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
																				
																				for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
																				{
																								if ( $R0f8134fb60 == "agent" )
																								{
																												$R4e420efcc3['item'][$Ra16d228039]['apwd'] = "*";
																												$R4e420efcc3['item'][$Ra16d228039]['superpwd'] = "*";
																												$R4e420efcc3['item'][$Ra16d228039]['tradepwd'] = "*";
																												$R4e420efcc3['item'][$Ra16d228039]['leftrights'] = "*";
																								}
																								else if ( $R0f8134fb60 == "product" )
																								{
																												$R4e420efcc3['item'][$Ra16d228039]['pdesc'] = "";
																								}
																								else if ( $R0f8134fb60 == "article" )
																								{
																												$R4e420efcc3['item'][$Ra16d228039]['content'] = "";
																								}
																				}
																				$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
																				$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																				file_put_contents( $R09a3346376, $Re82ee9b121 );
																}
																$Re4a3f5f7a1++;
												}
												if ( $R0f8134fb60 == "order" )
												{
																$R09a3346376 = BCKCACHE.DS."order".DS."ot_.php";
																if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
																{
																				$R8e6cb4c60b['optype'] = "";
																				$Rbf6c8991d9 = $Rdeabc7f106->IOrder_GetTradeData( $R8e6cb4c60b );
																				$R63bede6b19 = "\$Rbf6c8991d9=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $Rbf6c8991d9 ) ) )."')))";
																				$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																				file_put_contents( $R09a3346376, $Re82ee9b121 );
																}
												}
												if ( $R0f8134fb60 == "product" )
												{
																$R09a3346376 = BCKCACHE.DS.$R0f8134fb60.DS."r_0.php";
																if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
																{
																				$Rb749275e94 = $Rd1e9e1cb5b->IRecycle( $R0f8134fb60."s", "aid < 1" );
																				$R63bede6b19 = "\$Rb749275e94=".$Rb749275e94;
																				$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																				file_put_contents( $R09a3346376, $Re82ee9b121 );
																}
																$R09a3346376 = BCKCACHE.DS.$R0f8134fb60.DS."r_1.php";
																if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
																{
																				$Rb749275e94 = $Rd1e9e1cb5b->IRecycle( $R0f8134fb60."s", "aid > 0" );
																				$R63bede6b19 = "\$Rb749275e94=".$Rb749275e94;
																				$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																				file_put_contents( $R09a3346376, $Re82ee9b121 );
																}
												}
												else if ( $R0f8134fb60 != "bd" )
												{
																$R09a3346376 = BCKCACHE.DS.$R0f8134fb60.DS."r.php";
																if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
																{
																				$Rb749275e94 = $Rd1e9e1cb5b->IRecycle( $R0f8134fb60."s", "" );
																				$R63bede6b19 = "\$Rb749275e94=".$Rb749275e94;
																				$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																				file_put_contents( $R09a3346376, $Re82ee9b121 );
																}
												}
								}
				}

				public function InitWeb( )
				{
				}

}

?>
