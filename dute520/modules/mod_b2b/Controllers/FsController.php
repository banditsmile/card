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
class FsController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								set_time_limit( 0 );
				}

				public function Index( )
				{
								require_once( "..".DS."libraries".DS."user".DS."version.php" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
								$Rcadc43082c = $vernum < $R3db8f5c8bc['vernum'] ? 1 : 0;
								$this->Assign( "need", $Rcadc43082c );
								$this->Assign( "newversion", $R3db8f5c8bc['version'] );
								$this->Assign( "version", $version );
						
												$this->View( );
						
				}

				public function ListTpl( )
				{
								$R65dfacb399 = intval( request( "type" ) );
								$Ra5f961f14f = intval( request( "show" ) );
								if ( $Ra5f961f14f == 1 )
								{
												header( "Content-type: text/html;charset=utf-8" );
								}
								if ( $R65dfacb399 == 0 )
								{
												$Re6be5a6973 = array( );
												$R07e6493b33 = opendir( "../themes" );
												while ( $R09a3346376 = readdir( $R07e6493b33 ) )
												{
																if ( $R09a3346376 == "." || $R09a3346376 == ".." || $R09a3346376 == "thumb" )
																{
																				continue;
																}
																$Rcc5c6e696c = explode( ".", $R09a3346376 );
																array_pop( $Rcc5c6e696c );
																$name = implode( ".", $Rcc5c6e696c );
																$R6a39af2a2b = $name.".gif";
																$R09a3346376 = "../themes/".urlencode( $R09a3346376 );
																if ( !file_exists( "../themes/thumb/".$R6a39af2a2b ) )
																{
																				$R6a39af2a2b = "none.gif";
																}
																$Re6be5a6973[] = array(
																				"name" => $name,
																				"file" => $R09a3346376,
																				"thumb" => $R6a39af2a2b
																);
												}
												$this->Assign( "items", $Re6be5a6973 );
												$this->Assign( "thispage", 1 );
												$this->Assign( "totlepage", 1 );
												$this->Assign( "prepage", 1 );
												$this->Assign( "nextpage", 1 );
												$this->Assign( "nextstate", 1 );
												$this->Assign( "prestate", 1 );
												$this->Assign( "op", "" );
												$this->Assign( "totlerow", count( $Re6be5a6973 ) );
								}
								else
								{
												$data = array(
																"page" => intval( getvar( "page", 1 ) ),
																"type" => $R65dfacb399
												);
												$R9ba4aea5f9 = factory::getservice( "sversion" );
												$R4e420efcc3 = $R9ba4aea5f9->IVer_TplFile( $data );
												$this->FillPage( $data, $R4e420efcc3 );
								}
								$this->Assign( "show", $Ra5f961f14f );
								$this->Assign( "type", $R65dfacb399 );
							
												$this->View( );
							
				}

				public function BakTplHome( )
				{
							
												$this->View( );
							
				}

				public function BakTpl( )
				{
								$R0c2516bdbb = explode( DS, UPATH_ROOT );
								$Rfc16ddb044 = array_pop( $R0c2516bdbb );
								$R714ca9eb87 = implode( DS, $R0c2516bdbb );
								$Rb1e236a47d = request( "mod", "b2b" );
								$Rb1e236a47d = "mod_".$Rb1e236a47d;
								$Rdb6e8731f1 = "..".DS."modules".DS.$Rb1e236a47d.DS."Views";
								$Rf793334ebe = "..".DS."content".DS.$Rb1e236a47d;
								if ( $Rb1e236a47d == "mod_b2b" )
								{
												$R7cda542183 = "..".DS."modules".DS."mod_agent".DS."Views";
												$Re328da2d32 = array(
																$Rdb6e8731f1,
																$Rf793334ebe,
																$R7cda542183
												);
								}
								else
								{
												$Re328da2d32 = array(
																$Rdb6e8731f1,
																$Rf793334ebe
												);
								}
								$R63bede6b19 = getvar( "name", "" );
								$R6c5254d3dd = "../themes";
								$R6a1a21af13 = factory::getfs( "zip" );
								$R6a1a21af13->create_archive( $R6c5254d3dd."/".$R63bede6b19.".zip", $Re328da2d32 );
								echo "ѹ����ɡ������ݵ�Ŀ¼��".$R6c5254d3dd;
				}

				public function Zip( )
				{
								$Re328da2d32 = array( "modules" );
								$R6a1a21af13 = factory::getfs( "zip" );
								$R6a1a21af13->create_archive( "update.zip", $Re328da2d32 );
								echo "0";
				}

				public function ClearCache( )
				{
								$Re6be5a6973 = array( );
								$R07e6493b33 = opendir( "../content/Cache" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( $R09a3346376 == "." || $R09a3346376 == ".." || $R09a3346376 == "thumb" || $R09a3346376 == "site" || $R09a3346376 == "agent" || $R09a3346376 == "product" || $R09a3346376 == "template" )
												{
																continue;
												}
												if ( file_exists( "../content/Cache/".$R09a3346376 ) )
												{
																@unlink( "../content/Cache/".$R09a3346376 );
												}
								}
								$R07e6493b33 = opendir( "content/Cache/template" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( $R09a3346376 == "." || $R09a3346376 == ".." || $R09a3346376 == "thumb" )
												{
																continue;
												}
												if ( file_exists( "content/Cache/template/".$R09a3346376 ) )
												{
																@unlink( "content/Cache/template/".$R09a3346376 );
												}
								}
								$R07e6493b33 = opendir( "../content/Cache/template" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( $R09a3346376 == "." || $R09a3346376 == ".." || $R09a3346376 == "thumb" )
												{
																continue;
												}
												if ( file_exists( "../content/Cache/template/".$R09a3346376 ) )
												{
																@unlink( "../content/Cache/template/".$R09a3346376 );
												}
								}
								$R09a3346376 = "../content/Cache/site/ucom.php";
								if ( file_exists( $R09a3346376 ) )
								{
												@unlink( $R09a3346376 );
								}
								echo "0";
				}

				public function BakWeb( )
				{
								$Re328da2d32 = array( "bak" );
								$R6a1a21af13 = factory::getfs( "zip" );
								$R6a1a21af13->create_archive( "web.zip", $Re328da2d32 );
								echo "0";
				}

				public function Patch( )
				{
								$Re328da2d32 = array( "patch" );
								$R6a1a21af13 = factory::getfs( "zip" );
								$R6a1a21af13->create_archive( "patch.zip", $Re328da2d32 );
								echo "0";
				}

				public function UnZip( )
				{
								$Ra17333da96 = factory::getfs( "unzip" );
								$R0fa2a0a69e = intval( request( "issys", 0 ) );
								if ( $R0fa2a0a69e == 0 )
								{
												$R3d9a15f4b8 = request( "path" );
												$Ra17333da96->extract_files( $R3d9a15f4b8, "../" );
								}
								else
								{
												if ( file_exists( UPATH_ROOT.DS."update/update.zip" ) )
												{
																$Ra17333da96->extract_files( "update/update.zip", "../" );
												}
												if ( file_exists( UPATH_ROOT.DS."update/admupdate.zip" ) )
												{
																$Ra17333da96->extract_files( "update/admupdate.zip", "./" );
												}
								}
								echo "0";
				}

				public function DelZipFile( )
				{
								$R762df0f9ab = UPATH_ROOT.DS."update/update.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = UPATH_ROOT.DS."update/admupdate.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
				}

				public function DelThemeFile( $R3656889a44 = "", $R64d8204061 = "" )
				{
								if ( $R3656889a44 == "" )
								{
												return;
								}
								$R762df0f9ab = "../themes/".$R3656889a44.".zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$Refff33b7aa = "../themes/thumb/".$R64d8204061;
								if ( file_exists( $Refff33b7aa ) )
								{
												unlink( $Refff33b7aa );
								}
				}

				public function DelUpdateFile( )
				{
								$R762df0f9ab = UPATH_ROOT.DS."update/update.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = UPATH_ROOT.DS."update/admupdate.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = UPATH_ROOT.DS."update/upgrade.php";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = UPATH_ROOT.DS."update/upgrade.sql";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$this->ClearCache( );
				}

				public function Update( )
				{
								return "";
				}

				public function Down( )
				{
								$this->DelZipFile( );
								$R01b3791906 = factory::getfs( "down" );
								$R788b81dc7e = factory::getfs( "down" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetFile( array( ) );
								$R808b89ba0e = "1";
								if ( $R3db8f5c8bc['file'] != "" )
								{
												$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
												$R808b89ba0e = $R01b3791906->downLoadFile( );
								}
								if ( $R3db8f5c8bc['admfile'] != "" )
								{
												$R788b81dc7e->DownLoad( $R3db8f5c8bc['admfile'] );
												$R788b81dc7e->file_name = "admupdate.zip";
												$R808b89ba0e = $R788b81dc7e->downLoadFile( );
								}
								echo $R808b89ba0e;
				}

				public function DownTpl( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R01b3791906 = factory::getfs( "down" );
								$R788b81dc7e = factory::getfs( "down" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetTheme( array(
												"id" => $R3584859062
								) );
								$R808b89ba0e = "1";
								if ( $R3db8f5c8bc['file'] != "" )
								{
												$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
												$R808b89ba0e = $R01b3791906->downLoadFile( );
								}
								if ( file_exists( UPATH_ROOT.DS."update/update.zip" ) )
								{
												$Ra17333da96 = factory::getfs( "unzip" );
												$Ra17333da96->extract_files( "update/update.zip", "../" );
								}
								$this->DelUpdateFile( );
								echo $R808b89ba0e;
				}

				public function DownApp( )
				{
								$R3584859062 = intval( request( "id" ) );
								$this->DelZipFile( );
								$R01b3791906 = factory::getfs( "down" );
								$R788b81dc7e = factory::getfs( "down" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetApp( array(
												"id" => $R3584859062
								) );
								$R808b89ba0e = "1";
								if ( $R3db8f5c8bc['file'] != "" )
								{
												$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
												$R808b89ba0e = $R01b3791906->downLoadFile( );
								}
								if ( $R3db8f5c8bc['admfile'] != "" )
								{
												$R788b81dc7e->DownLoad( $R3db8f5c8bc['admfile'] );
												$R788b81dc7e->file_name = "admupdate.zip";
												$R808b89ba0e = $R788b81dc7e->downLoadFile( );
								}
								if ( $R808b89ba0e == "0" )
								{
												$this->SetApp( $R3db8f5c8bc );
								}
								echo $R808b89ba0e;
				}

				public function SetApp( $Re670ea9162 = array( ) )
				{
								include( "app.php" );
								foreach ( $apps as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['sn'] == $Re670ea9162['sn'] )
												{
																return;
												}
								}
								$R3dc9fb6254 = "app.php";
								if ( !( $Rf500f4a848 = @fopen( $R3dc9fb6254, "r" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								$R4180b2d55d = @fread( $Rf500f4a848, @filesize( $R3dc9fb6254 ) );
								fclose( $Rf500f4a848 );
								$Rcc187a276b = "array(\n'name'   => '".$Re670ea9162['name']."',\n"."'author' => '".$Re670ea9162['author']."',\n"."'ver'    => '".$Re670ea9162['ver']."',\n"."'icon'   => '".$Re670ea9162['icon']."',\n"."'main'   => '".$Re670ea9162['main']."',\n"."'sn'     => '".$Re670ea9162['sn']."',\n"."'newwin' => '".$Re670ea9162['newwin']."'\n"."),\n//thead //endthead";
								$R4180b2d55d = preg_replace( "/\\/\\/thead(.+?)\\/\\/endthead/s", $Rcc187a276b, $R4180b2d55d );
								if ( !( $Rf500f4a848 = @fopen( $R3dc9fb6254, "w" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R4180b2d55d );
								fclose( $Rf500f4a848 );
				}

				public function VipSetup( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 <= 0 )
								{
												echo "���û���֧��VIP������";
												exit( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "vipshop" );
								if ( !isset( $agent['vipshop'] ) )
								{
												echo "�û������ڣ��޷���װVIP������";
												exit( );
								}
								if ( $agent['vipshop'] == 0 )
								{
												echo "���û���֧��VIP������";
												exit( );
								}
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R25791b03ad = $Rf3579f5c8c->ISys_Get( $R2a51483b14, "aid, admdir" );
								if ( !isset( $R25791b03ad['aid'] ) )
								{
												echo "�������ú���Ϣ�ٰ�װ";
												exit( );
								}
								$R073c2bd914 = $R25791b03ad['admdir'];
								$R073c2bd914 = "../".$R073c2bd914."/";
								if ( @mkdir( $R073c2bd914, 493 ) )
								{
												@chmod( $R073c2bd914, 493 );
								}
								if ( !file_exists( $R073c2bd914 ) )
								{
												echo "����VIPĿ¼ʧ�ܣ������°�װ";
												exit( );
								}
								if ( file_exists( $R073c2bd914."libraries/user/vsn.php" ) )
								{
												echo "VIPվ���Ѿ���װ���ˣ�";
												exit( );
								}
								return 0;
				}

				public function GetVipIdByAid( $R2a51483b14 )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R25791b03ad = $Rf3579f5c8c->ISys_Get( $R2a51483b14, "aid, admdir" );
								if ( !isset( $R25791b03ad['aid'] ) )
								{
												echo "�������ú���Ϣ�ٰ�װ";
												exit( );
								}
								$R073c2bd914 = $R25791b03ad['admdir'];
								$R3d9a15f4b8 = "../".$R073c2bd914."/libraries/user/vid.php";
								if ( !file_exists( $R3d9a15f4b8 ) )
								{
												return 0;
								}
								else
								{
												include( $R3d9a15f4b8 );
												return $vid;
								}
				}

				public function CheckVipVer( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$R2a51483b14 = intval( request( "aid" ) );
								$R3584859062 = $this->GetVipIdByAid( $R2a51483b14 );
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R25791b03ad = $Rf3579f5c8c->ISys_Get( $R2a51483b14, "aid, admdir" );
								if ( !isset( $R25791b03ad['aid'] ) )
								{
												echo "�������ú���Ϣ�ٰ�װ";
												exit( );
								}
								$R073c2bd914 = $R25791b03ad['admdir'];//testabc							
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetVip( array(
												"id" => $R3584859062
								) );
								if ( !isset( $R3db8f5c8bc['ver'] ) || $R3db8f5c8bc['ver'] == "" )
								{
												echo "��û��Ȩ�޽���VIP";
												exit( );
								}
								include( "../".$R073c2bd914."/libraries/user/version.php" );
								$Rca6e06c0e4 = $vernum;
								$Rd37eb5c3ee = $R3db8f5c8bc['ver'];
								if ( $Rd37eb5c3ee <= $Rca6e06c0e4 )
								{
												echo "���Ѿ������°汾������Ҫ����";
												exit( );
								}
								echo 0;
				}

				public function DownVip( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$R2a51483b14 = intval( request( "aid" ) );
								$R3584859062 = $this->GetVipIdByAid( $R2a51483b14 );
								$this->DelZipFile( );
								$R01b3791906 = factory::getfs( "down" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = array('file'=>'http://umebiz.com/');//$R9ba4aea5f9->IVer_GetVip( array(
												//"id" => $R3584859062
								//) );
								$R808b89ba0e = "1";
								if ( isset( $R3db8f5c8bc['file'] ) && $R3db8f5c8bc['file'] != "" )
								{
												$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
												$R808b89ba0e = $R01b3791906->downLoadFile( );
								}
								echo "0";
								//echo $R808b89ba0e;
				}

				public function UnZipVip( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$R2a51483b14 = intval( request( "aid" ) );
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R25791b03ad = $Rf3579f5c8c->ISys_Get( $R2a51483b14, "aid, admdir" );
								if ( !isset( $R25791b03ad['aid'] ) )
								{
												echo "�������ú���Ϣ�ٰ�װ";
												exit( );
								}
								$R073c2bd914 = $R25791b03ad['admdir'];
								$R073c2bd914 = "../".$R073c2bd914."/";
								if ( !file_exists( $R073c2bd914 ) )
								{
												echo "�������ú���Ϣ�ٰ�װ";
												exit( );
								}
								$Ra17333da96 = factory::getfs( "unzip" );
								if ( file_exists( UPATH_ROOT.DS."update/update.zip" ) )
								{
												$Ra17333da96->extract_files( "update/update.zip", $R073c2bd914 );exit($Ra17333da96);
												$this->UpdateCfg( $R25791b03ad['admdir'], $R2a51483b14 );
								}
								echo "0";
				}

				public function UpdateCfg( $R073c2bd914, $R2a51483b14 )
				{
								$R3d9a15f4b8 = "../".$R073c2bd914."/libraries/user/vsn.php";
								if ( !file_exists( $R3d9a15f4b8 ) )
								{
												echo "���Ĵ����ļ���ȫ��$R3d9a15f4b8";
												exit( );
								}
								$Rd383666215 = base64_encode( gzdeflate( gzdeflate( $R2a51483b14 ) ) );
								$Re82ee9b121 = "\$R9ee4eacd68='".$Rd383666215."'";
								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
								file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
				}

}

?>
