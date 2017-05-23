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
class SecurityController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "security" );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Bind( )
				{
								$R94e0136c8a = intval( request( "staffid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R679e9b9234 = $this->hander->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R026f0167b4 = array(
																"ip" => explode( ",", $R679e9b9234['ip'].",,,,," ),
																"ipcheck" => $R679e9b9234['ipcheck'],
																"mac" => explode( ",", $R679e9b9234['mac'].",,,,," ),
																"maccheck" => $R679e9b9234['maccheck'],
																"hde" => explode( ",", $R679e9b9234['hde'].",,,,," ),
																"hdecheck" => $R679e9b9234['hdecheck'],
																"cpu" => explode( ",", $R679e9b9234['cpu'].",,,,," ),
																"cpucheck" => $R679e9b9234['cpucheck'],
																"mobile" => $R679e9b9234['mobile'],
																"mobilecheck" => $R679e9b9234['mobilecheck'],
																"mibaoka" => $R679e9b9234['mibaoka'],
																"mibaokacheck" => $R679e9b9234['mibaokacheck'],
																"randcheck" => $R679e9b9234['randcheck'],
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14
												);
								}
								else
								{
												$R026f0167b4 = array(
																"ip" => array( "", "", "", "", "" ),
																"ipcheck" => 0,
																"mac" => array( "", "", "", "", "" ),
																"maccheck" => 0,
																"hde" => array( "", "", "", "", "" ),
																"hdecheck" => 0,
																"cpu" => array( "", "", "", "", "" ),
																"cpucheck" => 0,
																"mobile" => "",
																"mobilecheck" => 0,
																"mibaoka" => "",
																"mibaokacheck" => 0,
																"randcheck" => 0,
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14
												);
								}
								$this->Assign( "security", $R026f0167b4 );
								$this->Assign( "staffid", $R94e0136c8a );
								$this->Assign( "aid", $R2a51483b14 );
						
												$this->View( );
						
				}

				public function BindSave( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R94e0136c8a = intval( request( "staffid" ) );
								$R022cf23e8d = factory::getinstance( "security" );
								$R679e9b9234 = $this->hander->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
								$data = array(
												"ipcheck" => $this->GetCheck( "ip" ),
												"ip" => $this->GetItem( "ip" ),
												"maccheck" => $this->GetCheck( "mac" ),
												"mac" => $this->GetItem( "mac" ),
												"hdecheck" => $this->GetCheck( "hde" ),
												"hde" => $this->GetItem( "hde" ),
												"cpucheck" => $this->GetCheck( "cpu" ),
												"cpu" => $this->GetItem( "cpu" ),
												"mobile" => getvar( "mobile" ),
												"mobilecheck" => intval( request( "mobilecheck" ) ),
												"mibaoka" => getvar( "mibaoka" ),
												"mibaokacheck" => intval( request( "mibaokacheck" ) ),
												"randcheck" => intval( request( "randcheck" ) )
								);
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R679e9b9234['id'] );
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $this->hander->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "设置成功" );
								}
								else
								{
												$this->Alert( "设置失败" );
								}
								$this->UpdateCache( "security", array(
												"arg1" => $R2a51483b14,
												"arg2" => $R94e0136c8a
								) );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Security&a=Bind&aid=".$R2a51483b14."&staffid=".$R94e0136c8a );
				}

				public function GetItem( $R0f8134fb60 )
				{
								$R9cfb7c6d6b = getvar( $R0f8134fb60 );
								$Rcd8b55d5dc = getvar( $R0f8134fb60."check" );
								$R63bede6b19 = "";
								if ( is_array( $Rcd8b55d5dc ) )
								{
												foreach ( $Rcd8b55d5dc as $R0f8134fb60 )
												{
																if ( trim( $R9cfb7c6d6b[$R0f8134fb60] ) != "" && $R9cfb7c6d6b[$R0f8134fb60] != "undefined" )
																{
																				$R63bede6b19 .= $R9cfb7c6d6b[$R0f8134fb60].",";
																}
												}
								}
								return $R63bede6b19;
				}

				public function GetCheck( $R0f8134fb60 )
				{
								$R602baa0728 = getvar( $R0f8134fb60."check" );
								if ( is_array( $R602baa0728 ) && 0 < count( $R602baa0728 ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

}

?>
