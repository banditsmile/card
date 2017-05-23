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

				public function __construct( )
				{
								$this->Checkb2bSession( );
				}

				public function Check( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$R1855197459 = "";
								$Rb025988d11 = 0;
								if ( isset( $R679e9b9234['id'] ) )
								{
												if ( $R679e9b9234['ipcheck'] )
												{
																$Rb025988d11 += 1;
												}
												if ( $R679e9b9234['maccheck'] )
												{
																$Rb025988d11 += 2;
												}
												if ( $R679e9b9234['hdecheck'] )
												{
																$Rb025988d11 += 3;
												}
												if ( $R679e9b9234['cpucheck'] )
												{
																$Rb025988d11 += 4;
												}
												if ( $R679e9b9234['mibaokacheck'] )
												{
																$Rb025988d11 += 5;
												}
												if ( $R679e9b9234['mobilecheck'] )
												{
																$Rb025988d11 += 6;
												}
								}
								else
								{
												$Rb025988d11 = 0;
								}
								if ( $Rb025988d11 == 0 )
								{
												$R1855197459 = "您的安全级别很差！";
								}
								else if ( $Rb025988d11 == 1 )
								{
												$R1855197459 = "您的安全级别一般！";
								}
								else if ( $Rb025988d11 == 2 )
								{
												$R1855197459 = "您的安全级别马马虎虎！";
								}
								else if ( $Rb025988d11 == 3 )
								{
												$R1855197459 = "您的安全级别过得去！";
								}
								else if ( 3 < $Rb025988d11 )
								{
												$R1855197459 = "您的安全级别还可以！";
								}
								else if ( 5 < $Rb025988d11 )
								{
												$R1855197459 = "您的安全级别是中级！";
								}
								else if ( 11 < $Rb025988d11 )
								{
												$R1855197459 = "您的安全级别是中高级！";
								}
								else if ( 17 < $Rb025988d11 )
								{
												$R1855197459 = "您的安全级别不错！";
								}
								$this->Assign( "ip", $this->GetIp( ) );
								$this->Assign( "lv", $R1855197459 );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$Rc8c0af4ceb = $agent['websetting'];
								$R97800871bc = explode( "|", $Rc8c0af4ceb );
								if ( isset( $R97800871bc[8] ) && $R97800871bc[8] == 1 )
								{
												$R5f825020fb = 1;
								}
								else
								{
												$R5f825020fb = 0;
								}
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
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14,
																"randcheck" => $R679e9b9234['randcheck'],
																"tradecheck" => $R5f825020fb
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
																"staffid" => $R94e0136c8a,
																"bossid" => $R2a51483b14,
																"randcheck" => 0,
																"tradecheck" => $R5f825020fb
												);
								}
								$this->Assign( "security", $R026f0167b4 );
						
												$this->Assign( "staffid", $R94e0136c8a );
												$this->Assign( "aid", $R2a51483b14 );
												$this->View( );
						
				}

}

?>
