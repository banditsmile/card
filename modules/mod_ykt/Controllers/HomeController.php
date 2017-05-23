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

				public function __construct( )
				{
				}

				public function Home( )
				{
								$this->Assign( "myhome", "home" );
							
												$this->View( );
								
				}

				public function Web( )
				{
								$R5b92e56774 = 2;
								$R8938de56a6 = 0;
								$Ra27af44414 = factory::getinstance( "sys" );
								global $masterid;
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "webopen" );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['webopen'] );
								$R8938de56a6 = $Rcc5c6e696c[$R5b92e56774];
								if ( $Rcc5c6e696c[$R5b92e56774] == 1 && 0 < $masterid )
								{
												$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "webopen" );
												$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['webopen'] );
												$R8938de56a6 = $Rcc5c6e696c[$R5b92e56774];
								}
								echo $R8938de56a6;
				}

				public function Close( )
				{
								global $masterid;
								include_once( UPATH_HELPER."ArticleHelper.php" );
								$R0f8134fb60 = "yktcloseinfo";
								$Ra27af44414 = factory::getinstance( "sys" );
								$R2d66faee5c = $Ra27af44414->ISys_Get( $masterid, $R0f8134fb60 );
							
												$this->Assign( "closeinfo", $R2d66faee5c[$R0f8134fb60] );
												$this->View( );
								
				}

				public function Html( )
				{
								global $g_action;
								$g_action = "Index";
								$this->Index( true, "ykt".DS."index.html" );
				}

				public function Index( $R9906335164 = false, $R511aa10c02 = "index.html" )
				{
								$this->SetArticle( );
								$this->SetAd( );
								$this->SetTurnAd( 1 );
							
												$this->YktInit( );
												$this->view( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function Reg( )
				{
								$this->YktInit( );
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R3db8f5c8bc = $Rf3579f5c8c->ISys_Get( "useragreement" );
							
												$this->Assign( "useragreement", $R3db8f5c8bc['useragreement'] );
												$this->View( );
								
				}

				public function Service( )
				{
								include_once( UPATH_HELPER."HomeHelper.php" );
								$Ra27af44414 = factory::getinstance( "sys" );
								global $masterid;
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( $masterid );
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
							
												$this->SetQQ( $R30b2ab8dc1 );
												$this->SetTel( $R30b2ab8dc1 );
												$this->SetEmail( $R30b2ab8dc1 );
												$this->SetMsn( $R30b2ab8dc1 );
												$this->SetHi( $R30b2ab8dc1 );
												$this->SetWangWang( $R30b2ab8dc1 );
												$this->View( );
								
				}

				public function Hourkf( )
				{
								$this->YktInit( "���߿ͷ�����" );
							
												$this->View( );
								
				}

				public function UserZone( )
				{
								$session = factory::getinstance( "session" );
								$agent = $session->user;
								if ( $agent != "" )
								{
												$this->Assign( "islogin", 1 );
												$R2097a8fddf = factory::getinstance( "agents" );
												$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByName( $agent[0] );
												$R063e6693e5 = factory::getinstance( "ranks" );
												$R6009e84434 = $R063e6693e5->IRank_GetNameById( $R3db8f5c8bc['alv'] );
												$R3db8f5c8bc['rankname'] = $R6009e84434;
												$this->Assign( "data", $R3db8f5c8bc );
								}
								else
								{
												$this->Assign( "islogin", 0 );
								}
								header( "Content-type: text/html;charset=utf-8" );
							
												$this->View( );
								
				}

				public function CheckUser( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								echo $R2097a8fddf->IAgent_IsExist( getvar( "ubzaname" ) );
				}

				public function Save( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$sess = factory::getinstance( "session" );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R0e49cc133a = $this->GetRankDefault( 0 );
								if ( !isset( $R0e49cc133a['id'] ) )
								{
												echo 2;
												exit( );
								}
								$R07cdd73907 = getvar( "ubzcname", "", "POST" );
								if ( trim( $R07cdd73907 ) == "" )
								{
												echo 0;
												exit( );
								}
								if ( strpos( $R07cdd73907, "|" ) !== false )
								{
												echo 0;
												exit( );
								}
								$R3ff93324b3 = getvar( "ubzcrealname", "", "POST" );
								$Rfddc2155d8 = getvar( "ubzcaddr", "", "POST" );
								$R6ae960df43 = getvar( "ubzcompany", "", "POST" );
								$R72f6fd380c = getvar( "ubzprv", "", "POST" );
								$Rcd67889baf = getvar( "ubzcity", "", "POST" );
								$R7cf2762c01 = getvar( "ubzeshop", "", "POST" );
								$R49904173b4 = getvar( "ubzidcard", "", "POST" );
								$R07cdd73907 = iconv( "UTF-8", "utf-8//IGNORE", $R07cdd73907 );
								$R3ff93324b3 = iconv( "UTF-8", "utf-8//IGNORE", $R3ff93324b3 );
								$Rfddc2155d8 = iconv( "UTF-8", "utf-8//IGNORE", $Rfddc2155d8 );
								$R6ae960df43 = iconv( "UTF-8", "utf-8//IGNORE", $R6ae960df43 );
								$R72f6fd380c = iconv( "UTF-8", "utf-8//IGNORE", $R72f6fd380c );
								$Rcd67889baf = iconv( "UTF-8", "utf-8//IGNORE", $Rcd67889baf );
								$R7cf2762c01 = iconv( "UTF-8", "utf-8//IGNORE", $R7cf2762c01 );
								$R6ae960df43 = str_replace( "|", "", $R6ae960df43 );
								$R72f6fd380c = str_replace( "|", "", $R72f6fd380c );
								$Rcd67889baf = str_replace( "|", "", $Rcd67889baf );
								$R4ecc66c386 = $R2097a8fddf->IAgent_IsExist( $R07cdd73907 );
								if ( $R4ecc66c386 == 0 )
								{
												echo 0;
												exit( );
								}
								$R0d6b33394f = getvar( "ubzcpwd", "", "POST" );
								if ( trim( $R0d6b33394f ) == "" )
								{
												echo 0;
												exit( );
								}
								$R289ea98f26 = getvar( "ubzcqq", "", "POST" );
								$R8b01c83d35 = getvar( "ubzcmail", "", "POST" );
								$Rb4f95547a5 = getvar( "ubzcmobile", "", "POST" );
								$R64dad0e3a8 = getvar( "ubzctel", "", "POST" );
								$R14b8c5658f = intval( getvar( "ubzparentid", "", "POST" ) );
								$Rf1f86e2396 = getvar( "ubzwebsetting", "", "POST" );
								$R381017b23a = $R2097a8fddf->IAgent_Get( $R14b8c5658f );
								if ( 0 < $R14b8c5658f && !isset( $R381017b23a['aid'] ) )
								{
												echo 3;
												exit( );
								}
								if ( 0 < $R14b8c5658f && isset( $R381017b23a['alv'] ) )
								{
												$R87aee22884 = $R063e6693e5->IRank_GetById( $R381017b23a['alv'], "gid" );
												if ( $R87aee22884['gid'] < 2 )
												{
																echo 4;
																exit( );
												}
								}
								$data = array(
												"aname" => trim( $R07cdd73907 ),
												"apwd" => trim( $R0d6b33394f ),
												"tradepwd" => trim( $R0d6b33394f ),
												"superpwd" => trim( $R0d6b33394f ),
												"arealname" => $R3ff93324b3,
												"aqq" => $R289ea98f26,
												"amail" => $R8b01c83d35,
												"atel" => $R64dad0e3a8,
												"aaddr" => $Rfddc2155d8,
												"company" => $R6ae960df43,
												"eshop" => $R7cf2762c01,
												"idcard" => $R49904173b4,
												"prv" => $R72f6fd380c,
												"city" => $Rcd67889baf,
												"websetting" => $Rf1f86e2396,
												"parentid" => $R14b8c5658f,
												"aqq" => getvar( "ubzcqq", "", "POST" ),
												"regdate" => date( "Y-m-d H-i-s" ),
												"regip" => $this->GetIp( ),
												"lastdate" => date( "Y-m-d H-i-s" ),
												"lastip" => $this->GetIp( ),
												"lastlogintype" => 0,
												"lastloginaccount" => 0,
												"thisdate" => date( "Y-m-d H-i-s" ),
												"thislogintype" => 0,
												"thisloginaccount" => 0,
												"thisip" => $this->GetIp( ),
												"alv" => $R0e49cc133a['id'],
												"aremain" => 0,
												"acsmp" => 0,
												"funds" => 0,
												"selffrozenfunds" => 0,
												"tradefrozenfunds" => 0,
												"sysfrozenfunds" => 0,
												"bossfrozenfunds" => 0,
												"arrears" => 0,
												"checktradepwd" => 0,
												"frozen" => 0
								);
								$R4e420efcc3 = $R2097a8fddf->IAgent_Create( $data );
								if ( 0 < $R4e420efcc3 )
								{
												$R6009e84434 = $R0e49cc133a['name'];
												$data = $R07cdd73907."|".$R6ae960df43."|".$R6009e84434."|".$R72f6fd380c.$Rcd67889baf."|".$R14b8c5658f."|".$R0e49cc133a['id']."|"."0|".$R4e420efcc3."|".$R0d6b33394f."|0";
												$sess->set( "userinfo", $data );
												echo 1;
								}
								else
								{
												echo 0;
								}
				}

				public function CheckCode( )
				{
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = getvar( "regcode", "", "POST" );
								if ( $Rd19ae93b31 != "" && $Rb7da52a305 == $Rd19ae93b31 )
								{
												echo 1;
								}
								else
								{
												echo 0;
								}
				}

				public function MiBaoKa( )
				{
								header( "Content-type:image/png" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = "";
								$R4eb1184b40 = array( "1", "2", "3", "4", "5", "6", "7" );
								$Rf1b6a0db06 = array( "A", "B", "C", "D", "E", "F", "G" );
								$R026f0167b4 = array( );
								$Rc7a586d84a = count( $R4eb1184b40 );
								$R2ad06a1dd9 = count( $Rf1b6a0db06 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 3;	$Ra16d228039++	)
								{
												$R1ca14e06c6 = rand( 0, $Rc7a586d84a - 1 );
												$Rf9f40445f6 = rand( 0, $R2ad06a1dd9 - 1 );
												$R026f0167b4[] = $Rf1b6a0db06[$Rf9f40445f6].$R4eb1184b40[$R1ca14e06c6];
								}
								$Rd19ae93b31 = implode( " ", $R026f0167b4 );
								$_SESSION['mibaorandcode'] = $Rd19ae93b31;
								if ( intval( request( "mt" ) ) )
								{
												setcookie( "mttsn", "", time( ) - 3600 );
												setcookie( "mttsn", $Rd19ae93b31, time( ) + 86400 );
								}
								srand( ( double )microtime( ) * 1000000 );
								$Rcd58a37536 = imagecreate( 80, 18 );
								$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
								$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
								imagefill( $Rcd58a37536, 68, 30, $R4ad640cfaf );
								$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 220, 220, 220 );
								
								for ($Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
								{
												imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 20, 40 ), rand( 0, 21 ), $R320bdc1f1b );
								}
								imagestring( $Rcd58a37536, 10, 5, 2, $Rd19ae93b31, $R862279c0e8 );
								$Ra16d228039 = 0;
							
								imagepng( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function RandCode( )
				{
								header( "Content-type:image/png" );
								factory::getinstance( "session" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = "";
								$R63bede6b19 = "abcdefhkmnpqrstuvwxyz2345678";
								$R24d59cd0b7 = strlen( $R63bede6b19 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 4;	$Ra16d228039++	)
								{
												$num = rand( 0, $R24d59cd0b7 - 1 );
												$Rd19ae93b31 .= $R63bede6b19[$num];
								}
								$_SESSION['randcode'] = $Rd19ae93b31;
								srand( ( double )microtime( ) * 1000000 );
								$Rcd58a37536 = imagecreate( 120, 38 );
								$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
								if ( intval( request( "t" ) ) )
								{
												$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
								}
								imagefill( $Rcd58a37536, 250, 30, $R4ad640cfaf );
								$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
								
								for ($Ra16d228039 = 0;	$Ra16d228039 < 2;	$Ra16d228039++	)
								{
												imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 100, 120 ), rand( 0, 35 ), $R320bdc1f1b );
								}
								$R62a1a9fbd8 = UPATH_SHARECONTENT."skins".DS."font".DS."Sansation_Regular.ttf";
								imagettftext( $Rcd58a37536, 20, rand( 0, 10 ), 10, 30, $R862279c0e8, $R62a1a9fbd8, $Rd19ae93b31 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 90;	$Ra16d228039++	)
								{
												imagesetpixel( $Rcd58a37536, rand( ) % 70, rand( ) % 30, $R4ad640cfaf );
								}
								imagepng( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function Init( $R06c518f70e = "" )
				{
				}

				public function SetArticle( )
				{
								$Rf6c76f0f72 = factory::getinstance( "articles" );
								$this->Assign( "ann", $Rf6c76f0f72->IArticle_GetByName( "һ��ͨϵͳ���Ź���", 6 ) );
				}

				public function SetAd( )
				{
								$R58765afcb5 = factory::getinstance( "ad" );
								$this->Assign( "ad", $R58765afcb5->IAd_GetByRange( 0, 100 ) );
				}

				public function SetProduct( )
				{
								$data = array( "optype" => "0|1|2|3|4|5" );
								$R0003a33381 = factory::getinstance( "yktproducts" );
								$R3db8f5c8bc = $R0003a33381->IYktProduct_Get( $data, "pid,ptype,ykttag,yktpoints" );
								$R2ec53fa882 = array( );
								$Rb3ebd06ab8 = array( );
								$R52b99c8a30 = array( );
								$Red14f9be83 = array( );
								$R46ec94a5dd = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['ykttag'] != "" )
												{
																if ( $R0f8134fb60['new'] == "1" )
																{
																				$R2ec53fa882[] = $R0f8134fb60;
																}
																if ( $R0f8134fb60['tag'] == "1" )
																{
																				$R52b99c8a30[] = $R0f8134fb60;
																}
																if ( $R0f8134fb60['hot'] == "1" )
																{
																				$Rb3ebd06ab8[] = $R0f8134fb60;
																}
																if ( $R0f8134fb60['sale'] == "1" )
																{
																				$Red14f9be83[] = $R0f8134fb60;
																}
																if ( $R0f8134fb60['recommand'] == "1" )
																{
																				$R46ec94a5dd[] = $R0f8134fb60;
																}
												}
								}
								$this->Assign( "products", array(
												"new" => $R2ec53fa882,
												"hot" => $Rb3ebd06ab8,
												"tag" => $R52b99c8a30,
												"sale" => $Red14f9be83,
												"recommand" => $R46ec94a5dd
								) );
				}

				public function SetCatalog( )
				{
								$R7b01879625 = factory::getinstance( "catalog" );
								$Rcc5c6e696c = $R7b01879625->ICatalog_Get( );
								$Rb39532d380 = array(
												"A - F" => array( ),
												"H - J" => array( ),
												"K - P" => array( ),
												"Q - U" => array( ),
												"W - Z" => array( )
								);
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R56ea904d53 = $R0f8134fb60['ordering'];
												if ( 0 < $R56ea904d53 && $R56ea904d53 < 6 )
												{
																$Rb39532d380['A - F'][] = $R0f8134fb60;
												}
												else if ( 5 < $R56ea904d53 && $R56ea904d53 < 10 )
												{
																$Rb39532d380['H - J'][] = $R0f8134fb60;
												}
												else if ( 9 < $R56ea904d53 && $R56ea904d53 < 14 )
												{
																$Rb39532d380['K - P'][] = $R0f8134fb60;
												}
												else if ( 13 < $R56ea904d53 && $R56ea904d53 < 18 )
												{
																$Rb39532d380['Q - U'][] = $R0f8134fb60;
												}
												else
												{
																$Rb39532d380['W - Z'][] = $R0f8134fb60;
												}
								}
								$this->Assign( "catalog", $Rb39532d380 );
				}

				public function Aggrement( )
				{
								$Rf3579f5c8c = factory::getinstance( "sys" );
								$R3db8f5c8bc = $Rf3579f5c8c->ISys_Get( "useragreement" );
							
												$this->Assign( "useragreement", $R3db8f5c8bc['useragreement'] );
												$this->YktInit( );
												$this->View( );
								
				}

}

?>
