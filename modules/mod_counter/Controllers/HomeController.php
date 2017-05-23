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
								$this->hander = factory::getinstance( "vinfo" );
				}

				public function Index( )
				{
								$R6009ea84c3 = $this->GetIp( );
								$R46abe8ae22 = getvar( "url" );
								$R523ecb0d4f = getvar( "ref" );
								if ( $R523ecb0d4f == "" )
								{
												$R523ecb0d4f = "直接访问";
								}
								$session = factory::getinstance( "session" );
								if ( $session->agent == "" )
								{
												if ( $session->user == "" )
												{
																$R3180a37b0a = "匿名";
												}
												else
												{
																$Rcc5c6e696c = $session->user;
																$R3180a37b0a = $Rcc5c6e696c[0];
												}
								}
								else
								{
												$Rcc5c6e696c = $session->agent;
												$R3180a37b0a = $Rcc5c6e696c[0];
								}
								$Radf21758db = "空";
								$R30b2ab8dc1 = $this->GetWebCache( );
								if ( $R30b2ab8dc1['website'] != "" )
								{
												$R46abe8ae22 = eregi_replace( $R30b2ab8dc1['website'], "", $R46abe8ae22 );
								}
								$R5c2df780ef = factory::getinstance( "sn" );
								$Rd383666215 = getvar( "ubphpsn", "", "COOKIE" );
								if ( $Rd383666215 == "" )
								{
												$Rd383666215 = $R5c2df780ef->ISN_GetMax( );
												$Rd383666215 = intval( $Rd383666215 ) + 1;
												setcookie( "ubphpsn", "", time( ) - 3600 );
												setcookie( "ubphpsn", $Rd383666215, time( ) + 9999999 );
								}
								$Rd383666215 = intval( $Rd383666215 );
								$data = array(
												"vip" => $R6009ea84c3,
												"vgo" => $R46abe8ae22,
												"vref" => $R523ecb0d4f,
												"vname" => $R3180a37b0a,
												"vreq" => $Radf21758db,
												"vsn" => $Rd383666215,
												"vdate" => date( "Y-m-d H-i-s" )
								);
								$this->hander->IVinfo_Create( $data );
								$R01524029ec = factory::getinstance( "vipinfo" );
								$data = array(
												"vip" => $R6009ea84c3
								);
								$R01524029ec->IVipInfo_Create( $data );
								$data = array(
												"vsn" => $Rd383666215
								);
								$R5c2df780ef->ISN_Create( $data );
				}

				public function GetRealIp( )
				{
								return $this->GetIp( );
				}

}

?>
