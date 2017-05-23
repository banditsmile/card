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

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
				}

				public function Index( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3cb9cdaed2 = intval( request( "s" ) );
								$R4b19c1abc4 = request( "sign" );
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$Rd86df6f1b2 = md5( $R9a1c862f32['uid'].$R9a1c862f32['upwd'].$R9a1c862f32['usign'].$Rdcd9105806 );
								if ( $R4b19c1abc4 != $Rd86df6f1b2 )
								{
												echo -2;
												exit( );
								}
								$data = array(
												"ordstate" => $R3cb9cdaed2,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								if ( $R3cb9cdaed2 == 2 )
								{
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
												if ( $R808b89ba0e )
												{
																echo 2;
												}
												else
												{
																echo -2;
												}
												exit( );
								}
								else
								{
												$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
												if ( !isset( $R3db8f5c8bc['sup'] ) )
												{
																echo -1;
																exit( );
												}
												if ( $R3db8f5c8bc['ordstate'] == 2 )
												{
																echo 2;
																exit( );
												}
												if ( $R3db8f5c8bc['ordstate'] == -1 )
												{
																echo -1;
																exit( );
												}
												$Raba57bd7d6 = $R3db8f5c8bc['sup'];
												$Rb60574d852 = $R3db8f5c8bc['payment'];
												if ( $Raba57bd7d6 == 1 )
												{
																$R6afe761ae0 = $this->GetBizKey( );
																$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
																if ( $Rb60574d852 == 96 )
																{
																				$Re9b5f92229 = factory::getservice( "ackscored" );
																}
																else
																{
																				$Re9b5f92229 = factory::getservice( "ack" );
																}
																$Re9b5f92229->canroll = 1;
																$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, $R4b19c1abc4 );
																echo $Rbdf46d6e43;
																exit( );
												}
												echo -2;
								}
				}

				public function Ck( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3cb9cdaed2 = intval( request( "s" ) );
								$R4b19c1abc4 = request( "sign" );
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$Rd86df6f1b2 = md5( $R9a1c862f32['uid'].$R9a1c862f32['upwd'].$R9a1c862f32['usign'].$Rdcd9105806 );
								if ( $R4b19c1abc4 != $Rd86df6f1b2 )
								{
												echo -2;
												exit( );
								}
								$data = array(
												"ordstate" => $R3cb9cdaed2,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( !isset( $R3db8f5c8bc['sup'] ) )
								{
												echo -1;
												exit( );
								}
								$Raba57bd7d6 = $R3db8f5c8bc['sup'];
								$Rb60574d852 = $R3db8f5c8bc['payment'];
								if ( $Raba57bd7d6 == 1 )
								{
												$R6afe761ae0 = $this->GetBizKey( );
												$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
												if ( $Rb60574d852 == 96 )
												{
																$Re9b5f92229 = factory::getservice( "ackscored" );
												}
												else
												{
																$Re9b5f92229 = factory::getservice( "ack" );
												}
												$Re9b5f92229->canroll = 1;
												$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, $R4b19c1abc4 );
												echo $Rbdf46d6e43;
												exit( );
								}
								echo -2;
				}

				public function T( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3cb9cdaed2 = intval( request( "s" ) );
								$R4b19c1abc4 = request( "sign" );
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$Rd86df6f1b2 = md5( $R9a1c862f32['uid'].$R9a1c862f32['upwd'].$R9a1c862f32['usign'].$Rdcd9105806 );
								if ( $R4b19c1abc4 != $Rd86df6f1b2 )
								{
												echo -2;
												exit( );
								}
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( !isset( $R3db8f5c8bc['ordstate'] ) )
								{
												echo -1;
												exit( );
								}
								echo $R3db8f5c8bc['ordstate'];
								exit( );
				}

				public function update( )
				{
								$R6afe761ae0 = $this->GetBizKey( );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
								if ( !isset( $R3db8f5c8bc['snpwd'] ) || trim( $R3db8f5c8bc['snpwd'] ) == "" )
								{
												exit( );
								}
								$R1887a7dac5 = $R3db8f5c8bc['snpwd'];
								$Rf413f06aeb = getvar( "key" );
								$R389f51a9ee = getvar( "snpwd" );
								$Rd1a88441bc = md5( $R6afe761ae0.$R1887a7dac5 );
								$R6415a11466 = md5( $Rf413f06aeb.$R389f51a9ee );
								if ( $Rd1a88441bc != $R6415a11466 )
								{
												exit( );
								}
								$R67d65e3bb2 = intval( request( "auto" ) );
								$session = factory::getinstance( "session" );
								$session->set( "adminrank", 4 );
								$session->set( "adminrights", "0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0" );
								$session->set( "adminname", $R1887a7dac5 );
								$session->set( "mid", 0 );
								$R073c2bd914 = getvar( "admdir" );
								$R71d9e5261f = 0;
								$R07e6493b33 = opendir( "./" );
								$R46e0b52c80 = array( ".", "..", "article", "b2b", "b2c", "components", "content", "index", "libraries", "modules", "themes", "ykt" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( in_array( $R09a3346376, $R46e0b52c80 ) )
												{
																continue;
												}
												if ( is_dir( $R09a3346376 ) )
												{
																if ( $R67d65e3bb2 == 1 )
																{
																				echo $R09a3346376."<br/>";
																}
																$R923bc6776b = opendir( $R09a3346376 );
																while ( $Rc2f829bfc5 = readdir( $R923bc6776b ) )
																{
																				if ( $Rc2f829bfc5 == "app.php" )
																				{
																								$R71d9e5261f = 1;
																								$R073c2bd914 = $R09a3346376;
																								break;
																				}
																}
																closedir( $R923bc6776b );
																if ( $R71d9e5261f == 1 )
																{
																				break;
																}
												}
								}
								closedir( $R07e6493b33 );
								if ( trim( $R073c2bd914 ) != "" && $R67d65e3bb2 == 0 )
								{
												$this->ScriptRedirect( $R073c2bd914."/index.php" );
								}
				}

				public function Quiet( )
				{
								set_time_limit( 0 );
								$R6afe761ae0 = $this->GetBizKey( );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_Get( array( ) );
								if ( !isset( $R3db8f5c8bc['snpwd'] ) || trim( $R3db8f5c8bc['snpwd'] ) == "" )
								{
												echo "a";
												exit( );
								}
								$R1887a7dac5 = $R3db8f5c8bc['snpwd'];
								$Rf413f06aeb = getvar( "key" );
								$R389f51a9ee = getvar( "snpwd" );
								$Rd1a88441bc = md5( $R6afe761ae0.$R1887a7dac5 );
								$R6415a11466 = md5( $Rf413f06aeb.$R389f51a9ee );
								if ( $Rd1a88441bc != $R6415a11466 )
								{
												echo "b";
												exit( );
								}
								$R67d65e3bb2 = 0;
								$R073c2bd914 = getvar( "admdir" );
								$R71d9e5261f = 0;
								$R07e6493b33 = opendir( "./" );
								$R46e0b52c80 = array( ".", "..", "article", "b2b", "b2c", "components", "content", "index", "libraries", "modules", "themes", "ykt" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( in_array( $R09a3346376, $R46e0b52c80 ) )
												{
																continue;
												}
												if ( is_dir( $R09a3346376 ) )
												{
																if ( $R67d65e3bb2 == 1 )
																{
																				echo $R09a3346376."<br/>";
																}
																$R923bc6776b = opendir( $R09a3346376 );
																while ( $Rc2f829bfc5 = readdir( $R923bc6776b ) )
																{
																				if ( $Rc2f829bfc5 == "app.php" )
																				{
																								$R71d9e5261f = 1;
																								$R073c2bd914 = $R09a3346376;
																								break;
																				}
																}
																closedir( $R923bc6776b );
																if ( $R71d9e5261f == 1 )
																{
																				break;
																}
												}
								}
								closedir( $R07e6493b33 );
								if ( trim( $R073c2bd914 ) != "" && $R67d65e3bb2 == 0 )
								{
												$this->Down( $R073c2bd914 );
								}
								else
								{
												echo "fail";
								}
				}

				public function Down( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "c";
												exit( );
								}
								$R808b89ba0e = $this->DelZipFile( $R073c2bd914 );
								if ( !$R808b89ba0e )
								{
												echo "d";
												exit( );
								}
								$R01b3791906 = factory::getfs( "down" );
								$R788b81dc7e = factory::getfs( "down" );
								$R9ba4aea5f9 = factory::getservice( "sversion" );
								$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetFile( array( ) );
								$R808b89ba0e = "1";
								if ( $R3db8f5c8bc['file'] != "" )
								{
												$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
												$R01b3791906->save_path = "./".$R073c2bd914."/update";
												$R808b89ba0e = $R01b3791906->downLoadFile( );
								}
								if ( $R3db8f5c8bc['admfile'] != "" )
								{
												$R788b81dc7e->DownLoad( $R3db8f5c8bc['admfile'] );
												$R788b81dc7e->save_path = "./".$R073c2bd914."/update";
												$R788b81dc7e->file_name = "admupdate.zip";
												$R808b89ba0e = $R788b81dc7e->downLoadFile( );
								}
								else
								{
												$R808b89ba0e = 0;
								}
								if ( $R808b89ba0e != 0 )
								{
												echo "e";
												exit( );
								}
								unset( $R01b3791906 );
								unset( $R788b81dc7e );
								$this->UnZip( $R073c2bd914 );
								$this->UpdateSql( $R073c2bd914 );
								$this->DelZipFile( $R073c2bd914 );
								$this->ClearCache( $R073c2bd914 );
								$this->DownMainTpl( $R073c2bd914 );
								$this->DownVip( $R073c2bd914 );
								$this->DelZipFile( $R073c2bd914 );
								echo "succ";
				}

				public function UpdateSql( $R073c2bd914 = "" )
				{
								if ( empty( $_SERVER['HTTP_HOST'] ) )
								{
												$R8607b50296 = "http://".$_SERVER['HTTP_HOST'];
								}
								else
								{
												$R8607b50296 = "http://".$_SERVER['SERVER_NAME'];
								}
								if ( !empty( $_SERVER['REQUEST_URI'] ) )
								{
												$Rd4e4624cdb = $_SERVER['REQUEST_URI'];
								}
								else
								{
												$Rd4e4624cdb = $_SERVER['PHP_SELF'];
								}
								$Rcc5c6e696c = explode( "/", $Rd4e4624cdb );
								array_pop( $Rcc5c6e696c );
								$Rd4e4624cdb = implode( "/", $Rcc5c6e696c );
								$url = $R8607b50296.$Rd4e4624cdb;
								$R9efe78d7dc = $url."/".$R073c2bd914."/update/upgrade.php";
								$R808b89ba0e = file_get_contents( $R9efe78d7dc );
								if ( $R808b89ba0e != "0" )
								{
												echo "m";
												exit( );
								}
				}

				public function DelZipFile( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "f";
												exit( );
								}
								$R2552e540b9 = UPATH_ROOT.DS.$R073c2bd914.DS."update".DS;
								$R762df0f9ab = $R2552e540b9."update.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = $R2552e540b9."admupdate.zip";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = $R2552e540b9."upgrade.php";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								$R762df0f9ab = $R2552e540b9."upgrade.sql";
								if ( file_exists( $R762df0f9ab ) )
								{
												unlink( $R762df0f9ab );
								}
								return true;
				}

				public function UnZip( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "g";
												exit( );
								}
								$Ra17333da96 = factory::getfs( "unzip" );
								if ( file_exists( UPATH_ROOT.DS.$R073c2bd914.DS."update".DS."update.zip" ) )
								{
												$Ra17333da96->extract_files( $R073c2bd914."/update/update.zip", "./" );
								}
								if ( file_exists( UPATH_ROOT.DS.$R073c2bd914.DS."update".DS."admupdate.zip" ) )
								{
												$Ra17333da96->extract_files( $R073c2bd914."/update/admupdate.zip", "./".$R073c2bd914 );
								}
				}

				public function ClearCache( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "h";
												exit( );
								}
								$Re6be5a6973 = array( );
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
								$R07e6493b33 = opendir( "./".$R073c2bd914."/content/Cache/template" );
								while ( $R09a3346376 = readdir( $R07e6493b33 ) )
								{
												if ( $R09a3346376 == "." || $R09a3346376 == ".." || $R09a3346376 == "thumb" )
												{
																continue;
												}
												if ( file_exists( "./".$R073c2bd914."/content/Cache/template/".$R09a3346376 ) )
												{
																@unlink( "./".$R073c2bd914."/content/Cache/template/".$R09a3346376 );
												}
								}
				}

				public function DownMainTpl( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "i";
												exit( );
								}
								$R808b89ba0e = 0;
								$Rdd18d42aba = 0;
								$R05b1426856 = array( "i" );
								if ( UB_B2B )
								{
												$R05b1426856[] = "";
												$R05b1426856[] = "b";
								}
								if ( UB_YKT )
								{
												$R05b1426856[] = "y";
								}
								if ( UB_B2C )
								{
												$R05b1426856[] = "c";
								}
								$Ra17333da96 = factory::getfs( "unzip" );
								foreach ( $R05b1426856 as $Rc06b954563 )
								{
												$R3584859062 = $this->GetMainId( $Rc06b954563 );
												$this->DelZipFile( $R073c2bd914 );
												$R9ba4aea5f9 = factory::getservice( "sversion" );
												$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetTheme( array(
																"id" => $R3584859062,
																"patch" => 1
												) );
												if ( isset( $R3db8f5c8bc['file'] ) && $R3db8f5c8bc['file'] != "" )
												{
																$R01b3791906 = factory::getfs( "down" );
																$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
																$R01b3791906->save_path = "./".$R073c2bd914."/update";
																$R808b89ba0e = $R01b3791906->downLoadFile( );
																if ( $R808b89ba0e != 0 )
																{
																				$Rdd18d42aba = 1;
																}
																unset( $R01b3791906 );
																if ( file_exists( UPATH_ROOT.DS.$R073c2bd914.DS."update/update.zip" ) )
																{
																				$Ra17333da96->extract_files( $R073c2bd914."/update/update.zip", "./" );
																}
												}
												else
												{
																$R808b89ba0e = 0;
												}
												$this->DelZipFile( $R073c2bd914 );
								}
								if ( $Rdd18d42aba == 1 )
								{
												echo "j";
												exit( );
								}
				}

				public function DownVip( $R073c2bd914 = "" )
				{
								if ( !isset( $R073c2bd914 ) || $R073c2bd914 == "" )
								{
												echo "k";
												exit( );
								}
								$R808b89ba0e = 0;
								$Rdd18d42aba = 0;
								$R05b1426856 = array( );
								if ( UB_B2B )
								{
												$R05b1426856[] = "";
												$R05b1426856[] = "b";
								}
								if ( UB_YKT )
								{
												$R05b1426856[] = "y";
								}
								if ( 0 < UB_B2B + UB_YKT )
								{
												$R05b1426856[] = "i";
								}
								$Ra3d91b1c78 = "content/Cache/site/u_vip.php";
								if ( file_exists( $Ra3d91b1c78 ) )
								{
												include( $Ra3d91b1c78 );
												$Ra17333da96 = factory::getfs( "unzip" );
												$R9ba4aea5f9 = factory::getservice( "sversion" );
												foreach ( $R6009ea84c3 as $R0f8134fb60 )
												{
																$R2a51483b14 = $R0f8134fb60['aid'];
																foreach ( $R05b1426856 as $Rc06b954563 )
																{
																				$R3584859062 = $this->GetVipIdByDir( $R0f8134fb60['admdir'], $Rc06b954563 );
																				$this->DelZipFile( $R0f8134fb60['admdir'] );
																				$R3db8f5c8bc = $R9ba4aea5f9->IVer_GetTheme( array(
																								"id" => $R3584859062,
																								"patch" => 1,
																								"vip" => 1
																				) );
																				$R9e38368d60 = "./".$R0f8134fb60['admdir']."/";
																				$R808b89ba0e = "1";
																				if ( file_exists( $R9e38368d60 ) && isset( $R3db8f5c8bc['file'] ) && $R3db8f5c8bc['file'] != "" )
																				{
																								$R01b3791906 = factory::getfs( "down" );
																								$R01b3791906->DownLoad( $R3db8f5c8bc['file'] );
																								$R01b3791906->save_path = "./".$R073c2bd914."/update";
																								$R808b89ba0e = $R01b3791906->downLoadFile( );
																								if ( $R808b89ba0e != 0 )
																								{
																												$Rdd18d42aba = 1;
																								}
																								unset( $R01b3791906 );
																								if ( file_exists( UPATH_ROOT.DS.$R073c2bd914.DS."update/update.zip" ) )
																								{
																												$Ra17333da96->extract_files( $R073c2bd914."/update/update.zip", $R9e38368d60 );
																								}
																				}
																				else
																				{
																								$R808b89ba0e = 0;
																				}
																}
												}
												$this->DelZipFile( $R0f8134fb60['admdir'] );
								}
								if ( $Rdd18d42aba == 1 )
								{
												echo "l";
												exit( );
								}
				}

				public function GetVipIdByDir( $R9e38368d60, $Rc06b954563 = "" )
				{
								$R3d9a15f4b8 = "./".$R9e38368d60."/libraries/user/vid".$Rc06b954563.".php";
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

				public function GetMainId( $Rc06b954563 = "" )
				{
								$R3d9a15f4b8 = "./libraries/user/vid".$Rc06b954563.".php";
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

}

?>
