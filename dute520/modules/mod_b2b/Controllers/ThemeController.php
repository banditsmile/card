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
class ThemeController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								$R6b6e98cde8 = getvar( "f", "mod_b2b" );
								$Rb51511500c = array( );
								if ( UB_B2C )
								{
												$Rb51511500c[] = array(
																"name" => "零售系统",
																"m" => "mod_b2c",
																"bgname" => "bg.jpg",
																"f" => "mod_b2c",
																"canedit" => $this->CanEdit( "mod_b2c" ),
																"bgnamef" => "footbg.jpg",
																"caneditf" => $this->CanEdit( "mod_b2c", "footstart" )
												);
								}
								if ( UB_B2B )
								{
												$Rb51511500c[] = array(
																"name" => "批发系统外页",
																"m" => "mod_b2b",
																"bgname" => "bg.jpg",
																"f" => "mod_b2b",
																"canedit" => $this->CanEdit( "mod_b2b" ),
																"bgnamef" => "footbg.jpg",
																"caneditf" => $this->CanEdit( "mod_b2b", "footstart" )
												);
												$Rb51511500c[] = array(
																"name" => "批发系统内页",
																"m" => "mod_b2b",
																"bgname" => "ibg.jpg",
																"f" => "mod_agent",
																"canedit" => $this->CanEdit( "mod_agent" ),
																"bgnamef" => "ifootbg.jpg",
																"caneditf" => $this->CanEdit( "mod_agent", "footstart" )
												);
								}
								if ( UB_YKT )
								{
												$Rb51511500c[] = array(
																"name" => "一卡通",
																"m" => "mod_ykt",
																"bgname" => "bg.jpg",
																"f" => "mod_ykt",
																"canedit" => $this->CanEdit( "mod_ykt" ),
																"bgnamef" => "footbg.jpg",
																"caneditf" => $this->CanEdit( "mod_ykt", "footstart" )
												);
								}
								if ( 1 < UB_B2C + UB_B2B + UB_YKT )
								{
												$Rb51511500c[] = array(
																"name" => "引导页",
																"m" => "mod_index",
																"bgname" => "bg.jpg",
																"f" => "mod_index",
																"canedit" => $this->CanEdit( "mod_index" ),
																"bgnamef" => "footbg.jpg",
																"caneditf" => $this->CanEdit( "mod_index", "footstart" )
												);
								}
								$this->Assign( "f", $R6b6e98cde8 );
								$this->Assign( "logo", $Rb51511500c );
						
												$this->View( );
						
				}

				public function CanEdit( $Rb1e236a47d, $R5cc00cfbe4 = "bodystart" )
				{
								$R9fe924ce58 = "ub-list-20080119.css";
								if ( $Rb1e236a47d == "mod_b2b" )
								{
												$R9fe924ce58 = "ub-red-20080119.css";
								}
								if ( $Rb1e236a47d == "mod_agent" )
								{
												$Rb1e236a47d = "mod_b2b";
								}
								$R66bb5269cc = "../content/".$Rb1e236a47d."/css/".$R9fe924ce58;
								$Re79b6f997d = $this->GetFileContent( $R66bb5269cc );
								if ( strpos( $Re79b6f997d, "/*".$R5cc00cfbe4."*/" ) !== false )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function GetFileContent( $R3d9a15f4b8 )
				{
								if ( file_exists( $R3d9a15f4b8 ) )
								{
												if ( !( $Rf500f4a848 = @fopen( $R3d9a15f4b8, "r" ) ) )
												{
																return "";
												}
												$Re82ee9b121 = @fread( $Rf500f4a848, @filesize( $R3d9a15f4b8 ) );
												fclose( $Rf500f4a848 );
												return $Re82ee9b121;
								}
								return "";
				}

				public function Save( )
				{
								$Rd08b90c152 = getvar( "ubztextcolor" );
								$R980c6a9bfd = intval( request( "pos" ) );
								$R6b6e98cde8 = getvar( "f" );
								$R7f13fed9d1 = array( "bg.jpg", "footbg.jpg" );
								$Re145829e19 = array( "body", "foot" );
								$R8732920ec6 = $R7f13fed9d1[$R980c6a9bfd];
								$Rf52ba22baf = $R6b6e98cde8;
								if ( $R6b6e98cde8 == "mod_agent" )
								{
												$Rf52ba22baf = "mod_b2b";
												$R8732920ec6 = "i".$R8732920ec6;
								}
								$R9fe924ce58 = "ub-list-20080119.css";
								if ( $R6b6e98cde8 == "mod_b2b" )
								{
												$R9fe924ce58 = "ub-red-20080119.css";
								}
								$R66bb5269cc = "../content/".$Rf52ba22baf."/css/".$R9fe924ce58;
								if ( file_exists( $R66bb5269cc ) )
								{
												if ( !( $Rf500f4a848 = @fopen( $R66bb5269cc, "r" ) ) )
												{
																$this->Alert( "Current css file '{$R66bb5269cc}' not found or have no access!" );
																$this->HistoryGo( );
												}
												$Ra7de0344d2 = @fread( $Rf500f4a848, @filesize( $R66bb5269cc ) );
												fclose( $Rf500f4a848 );
												$Rdc7d6bdfa7 = $Re145829e19[$R980c6a9bfd];
												$R864799803c = "background:".$Rd08b90c152." url(../images/".$R8732920ec6.") repeat-x;";
												$R864799803c = "/*".$Rdc7d6bdfa7."start*/\n".$R864799803c."\n/*".$Rdc7d6bdfa7."end*/";
												$Ra7de0344d2 = preg_replace( "/\\/\\*".$Rdc7d6bdfa7."start\\*\\/(.+?)\\/\\*".$Rdc7d6bdfa7."end\\*\\//s", $R864799803c, $Ra7de0344d2 );
												if ( !( $Rf500f4a848 = @fopen( $R66bb5269cc, "w" ) ) )
												{
																echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
												}
												flock( $Rf500f4a848, 2 );
												fwrite( $Rf500f4a848, $Ra7de0344d2 );
												fclose( $Rf500f4a848 );
								}
								$this->Alert( "完成操作！" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Theme" );
				}

}

?>
