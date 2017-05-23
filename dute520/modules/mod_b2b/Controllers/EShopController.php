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
class EShopController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "sys" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->ISys_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "webname" => "店名", "aid" => "店主", "website" => "网站地址" );
								$this->Assign( "sarray", $R00be52aa45 );
							
												$this->view( );
							
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
							
												$this->Assign( "item", $this->instance->ISys_GetById( $R3584859062 ) );
												$this->View( );
							
				}

				public function Save( )
				{
								$R6be6994799 = getvar( "webname" );
								$R8607b50296 = getvar( "website" );
								$R696350cab3 = getvar( "startdate" );
								$R1c8e0f6795 = getvar( "enddate" );
								$R2a51483b14 = intval( request( "aid" ) );
								$R2fd57a2d0b = str_replace( "\\%", "%", getvar( "b2bmenu" ) );
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 == 0 )
								{
												$R3db8f5c8bc = $this->instance->ISys_Get( $R2a51483b14, "aid" );
												$data = $this->instance->ISys_GetById( 1 );
												$data['webname'] = $R6be6994799;
												$data['title'] = $R6be6994799;
												$data['website'] = $R8607b50296;
												$data['startdate'] = $R696350cab3;
												$data['enddate'] = $R1c8e0f6795;
												$data['aid'] = $R2a51483b14;
												$data['b2bmenu'] = htmlspecialchars( $R2fd57a2d0b );
												$data['mailuser'] = "";
												$data['mailserver'] = "";
												$data['mailpass'] = "";
												$data['fetion_pass'] = "";
												$data['fetion_mobile'] = "";
												$data['fetion_send'] = 0;
												$data['admdir'] = getvar( "admdir", "" );
												if ( $data['admdir'] == "" )
												{
																$this->Alert( "请填入子目录" );
																$this->HistoryGo( );
												}
												$R20fd65e9c7 = array( );
												foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
												{
																if ( is_null( $Ra3d52e52a4 ) )
																{
																				$data[$Ra09fe38af3] = "";
																}
																if ( $Ra09fe38af3 != "id" )
																{
																				$R20fd65e9c7[$Ra09fe38af3] = $data[$Ra09fe38af3];
																}
												}
												$R808b89ba0e = $this->instance->ISys_Create( $R20fd65e9c7 );
												$R63bede6b19 = "添加";
												$this->CopyAd( $R2a51483b14 );
								}
								else
								{
												$data['webname'] = $R6be6994799;
												$data['title'] = $R6be6994799;
												$data['startdate'] = $R696350cab3;
												$data['enddate'] = $R1c8e0f6795;
												$data['website'] = $R8607b50296;
												$data['admdir'] = getvar( "admdir", "admin" );
												$data['b2bmenu'] = htmlspecialchars( $R2fd57a2d0b );
												$R63bede6b19 = "更新";
												$R808b89ba0e = $this->instance->ISys_Update( $data, $R3584859062 );
												$this->SaveB2BMenu( );
								}
								$this->UpdateCache( "vip" );
								$this->go( $R808b89ba0e, $R63bede6b19."成功", $R63bede6b19."失败", "index.php?m=mod_b2b&c=EShop" );
				}

				public function SaveB2bMenu( )
				{
								$R073c2bd914 = getvar( "admdir", "" );
								if ( $R073c2bd914 == "" )
								{
												return;
								}
								$Rf847015742 = "../".$R073c2bd914."/libraries/user/vid.php";
								if ( file_exists( $Rf847015742 ) )
								{
												include( $Rf847015742 );
								}
								else
								{
												$frame = 0;
								}
								$R910d5a471e = "<script type=\"text/javascript\" src=\"{\$vd['content']}js/custmenu.js\"></script>";
								$R910d5a471e = $R7cc6651305 = "<!--//mhead-->\n".$R910d5a471e."<!--//endmhead-->";
								$R762df0f9ab = "../".$R073c2bd914."/modules/mod_b2b/Views/Shared/head.html";
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
																				$Ra3d52e52a4 = $Ra3d52e52a4;
																}
																if ( isset( $frame ) && $frame == 1 )
																{
																				$Ra09fe38af3 = "<span>".$Ra09fe38af3."</span>";
																}
																$R7cc6651305 .= "<li class=\"bian\"><a href=\"".$Ra3d52e52a4."\"".$R4baa43b567.">".$Ra09fe38af3."</a></li>";
												}
												$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R910d5a471e, $R4180b2d55d );
												if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
												{
																echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
												}
												flock( $Rf500f4a848, 2 );
												fwrite( $Rf500f4a848, $R4180b2d55d );
												fclose( $Rf500f4a848 );
								}
								$R762df0f9ab = "../".$R073c2bd914."/modules/mod_agent/Views/Shared/head.html";
								if ( file_exists( $R762df0f9ab ) )
								{
												if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "r" ) ) )
												{
																echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
												}
												$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R762df0f9ab ) );
												fclose( $Rf500f4a848 );
												$R4180b2d55d = preg_replace( "/\\<\\!\\-\\-\\/\\/mhead\\-\\-\\>(.+?)\\<\\!\\-\\-\\/\\/endmhead\\-\\-\\>/s", $R910d5a471e, $R4180b2d55d );
												if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
												{
																echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
												}
												flock( $Rf500f4a848, 2 );
												fwrite( $Rf500f4a848, $R4180b2d55d );
												fclose( $Rf500f4a848 );
								}
								$R762df0f9ab = "../".$R073c2bd914."/content/mod_b2b/js/custmenu.js";
								$Re82ee9b121 = "document.write('".$R7cc6651305."')";
								file_put_contents( $R762df0f9ab, $Re82ee9b121 );
				}

				public function CopyAd( $R2a51483b14 )
				{
								global $masterid;
								$R220583696c = $masterid;
								$masterid = $R2a51483b14;
								$R2be63c99bf = factory::getinstance( "ad" );
								$data = array(
												"pic" => "b2bbanner.gif",
												"url" => "#",
												"ispic" => 1,
												"textcolor" => "#6c6c6c",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 106
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "G090116001644110.jpg",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#6c6c6c",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 101
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "t3.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#6c6c6c",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 101
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "top_banner1.jpg",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#6c6c6c",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 104
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "",
												"url" => "index.php",
												"ispic" => 0,
												"textcolor" => "#ff0000",
												"text" => "欢迎光临",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 108
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "G080623001298110.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#ff0000",
												"text" => "网吧活动",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 103
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "ad_act1.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#ff0000",
												"text" => "网吧活动",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 103
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "b2b_ad5.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#ff0000",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 199
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "b2b_ad6.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#ff0000",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 199
								);
								$R2be63c99bf->IAd_Create( $data );
								$data = array(
												"pic" => "b2b_ad7.gif",
												"url" => "index.php",
												"ispic" => 1,
												"textcolor" => "#ff0000",
												"text" => "",
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => 199
								);
								$R2be63c99bf->IAd_Create( $data );
								$masterid = $R220583696c;
				}

				public function CreateMaster( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$Re8bade8a5f = getvar( "adminname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "管理员名字不能为空！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=EShop" );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								if ( $Rfc5c48c798->IMaster_IsExist( $Re8bade8a5f ) )
								{
												$this->Alert( "管理员已经存在，请选择其他名字" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=EShop" );
								}
								global $masterid;
								$R2a039ed8fd = array(
												"adminName" => $Re8bade8a5f,
												"adminPass" => md5( getvar( "adminpass" ) ),
												"adminRank" => 1,
												"aid" => $R2a51483b14
								);
								return $Rfc5c48c798->IMaster_Create( $R2a039ed8fd );
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
												echo "参数错误！";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->instance->ISys_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "vip" );
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
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->instance->ISys_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "vip" );
												echo "";
								}
								else
								{
												echo "记录还原失败！";
								}
				}

				public function DestroyItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R3db8f5c8bc = $this->instance->ISys_GetByStr( $Rb7492a73f7, "id,aid" );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( 1 < intval( $R0f8134fb60['id'] ) )
												{
																$R026f0167b4[] = $R0f8134fb60['aid'];
												}
								}
								$R808b89ba0e = true;
								if ( 0 < count( $R026f0167b4 ) )
								{
												$Rfc5c48c798 = factory::getinstance( "master" );
												$R808b89ba0e = $Rfc5c48c798->IMaster_VipDelete( implode( ",", $R026f0167b4 ) );
								}
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $this->instance->ISys_DestroyByStr( $Rb7492a73f7, $data );
												if ( $R808b89ba0e )
												{
																$this->UpdateCache( "vip" );
																echo "";
												}
												else
												{
																echo "删除失败！";
												}
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

				public function DelItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ISys_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "删除失败!";
								}
								else
								{
												$this->UpdateCache( "vip" );
												echo "";
								}
				}

}

?>
