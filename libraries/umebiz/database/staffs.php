<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class staffs extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IStaff_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "staffs", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ) );
				}

				public function &IStaff_ProfitPage( $data = array( ), $R5d899a20a5 )
				{
								$R038630eaa9 = $this->GetDateLimit( $data, "t1." );
								$Rcfead52761 = $this->GetDateLimit( $data, "t2." );
								if ( $R038630eaa9 != "" )
								{
												$R038630eaa9 = " and ".$R038630eaa9;
								}
								if ( $Rcfead52761 != "" )
								{
												$Rcfead52761 = " and ".$Rcfead52761;
								}
								$R130d64a4ad = "select t0.*, (select sum(staffprofit) from ".$this->dbprefix."orders t1 where t1.ptype=0 and t1.ordstate=2 and t1.cname=t0.staffname and t1.aname='".$R5d899a20a5."' ".$R038630eaa9.") as kmprofit,"."(select sum(staffprofit) from ".$this->dbprefix."orders t2 where t2.ptype>0 and t2.ordstate=2 and t2.cname=t0.staffname and t2.aname='".$R5d899a20a5."' ".$Rcfead52761.") as czprofit from ".$this->dbprefix."staffs t0 %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function &IStaff_SecPage( $data = array( ) )
				{
								$R130d64a4ad = "select t0.*, t1.ipcheck,t1.maccheck,t1.hdecheck,t1.cpucheck,t1.randcheck,t1.addrcheck,t1.mobilecheck,t1.mibaokacheck from ".$this->dbprefix."staffs t0 "."left join ".$this->dbprefix."security t1 on(t0.bossid=t1.aid and t0.staffid=t1.staffid) "."%s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "staffname" )
												),
												array(
																"op" => "intequal",
																"var" => array( "bossid" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								if ( isset( $data['aid'] ) && $data['aid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."bossid = ".intval( $data['aid'] );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."orddate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."orddate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function GetOptype( $R36130a8639 )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = " alv = ".intval( $R0f8134fb60 );
								}
								if ( 0 < count( $R026f0167b4 ) )
								{
												return sprintf( "( %s )", implode( " or ", $R026f0167b4 ) );
								}
								else
								{
												return "";
								}
				}

				public function &IStaff_GetAll( $Rb0d5d47f3d = "*", $R5334b17ba8 = 0 )
				{
								$this->reset( );
								if ( 0 < $R5334b17ba8 )
								{
												$this->add( "bossid", $R5334b17ba8 );
								}
								$R679e9b9234 = $this->SelectRecord( "staffs", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function &IStaff_Get( $R94e0136c8a, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "staffid", $R94e0136c8a );
								$R679e9b9234 = $this->SelectRecord( "staffs", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function IStaff_GetRemain( $R6cd996866e )
				{
								$R679e9b9234 = $this->IStaff_Get( $R6cd996866e, "aremain" );
								return doubleval( $R679e9b9234['aremain'] );
				}

				public function IStaff_IsExist( $R0dc0347d49 )
				{
								$this->reset( );
								$this->add( "staffname", $R0dc0347d49 );
								$R679e9b9234 = $this->num_rows( "staffs" );
								if ( $R679e9b9234 == 0 )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function &IStaff_GetByName( $R0dc0347d49, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "staffname", $R0dc0347d49 );
								$R679e9b9234 = $this->SelectRecord( "staffs", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function IStaff_Update( $R3aba65936f = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "staffs", "staffid = ".$R3584859062 );
				}

				public function IStaff_Create( $R3aba65936f = array( ) )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "staffs", true );
				}

				public function IStaff_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "staffs", "staffid = ".$R3584859062 );
				}

				public function IStaff_DeleteByIds( $R3456919727, $R2a51483b14 )
				{
								return $this->DeleteRecord( "staffs", "bossid=".$R2a51483b14." and staffid in (".$R3456919727.")" );
				}

				public function IStaff_Login( $R0dc0347d49, $Rc509b4f207, $R7f18fb346f = 0, $Re5584ed794 = array( ) )
				{
								$R3db8f5c8bc = array( );
								$this->reset( );
								$this->add( "staffname", $R0dc0347d49 );
								$R679e9b9234 = $this->SelectRecord( "staffs" );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								if ( !isset( $R679e9b9234[0]['bossid'] ) )
								{
												return 0;
								}
								$this->reset( );
								$this->add( "aid", $R679e9b9234[0]['bossid'] );
								$agent = $this->SelectRecord( "agents", "frozen" );
								if ( count( $agent ) == 0 )
								{
												return 0;
								}
								if ( 0 < $agent[0]['frozen'] )
								{
												return 2;
								}
								else if ( 0 < $R679e9b9234[0]['frozen'] )
								{
												return 2;
								}
								else
								{
												$Re5584ed794['pwd'] = $R679e9b9234[0]['staffpwd'];
												$Re5584ed794['inputpwd'] = $Rc509b4f207;
												$R50e25075e2 = $this->CheckHard( $R679e9b9234[0]['staffid'], $Re5584ed794, $R679e9b9234[0]['bossid'] );
												if ( 0 < $R50e25075e2 )
												{
																return $R50e25075e2;
												}
												$data = array(
																"lastdate" => empty( $R679e9b9234[0]['thisdate'] ) ? date( "Y-m-d H-i-s" ) : $R679e9b9234[0]['thisdate'],
																"lastip" => empty( $R679e9b9234[0]['thisip'] ) ? $_SERVER['REMOTE_ADDR'] : $R679e9b9234[0]['thisip'],
																"thisdate" => date( "Y-m-d H-i-s" ),
																"thisip" => $_SERVER['REMOTE_ADDR'],
																"thislogintype" => $R7f18fb346f,
																"thisloginaccount" => $R679e9b9234[0]['staffid'],
																"lastlogintype" => $R679e9b9234[0]['thislogintype'],
																"lastloginaccount" => $R679e9b9234[0]['thisloginaccount']
												);
												$this->IStaff_Update( $data, $R679e9b9234[0]['staffid'] );
												$R36260350d0 = factory::getinstance( "cache" );
												$R36260350d0->ICache_Update( array(
																"hander" => "staffs",
																"arg1" => $R679e9b9234[0]['staffid']
												) );
												$R3db8f5c8bc['staff'] = $R679e9b9234[0];
												$this->reset( );
												$this->add( "aid", $R679e9b9234[0]['bossid'] );
												$Rc8083ec742 = $this->SelectRecord( "agents" );
												$R3db8f5c8bc['agent'] = $Rc8083ec742[0];
												$R5f825020fb = $this->CheckTrades( $R679e9b9234[0]['bossid'], $Rc8083ec742[0]['aremain'] );
												if ( $R5f825020fb == -1 )
												{
																return 2;
												}
												$data = array(
																"lastdate" => empty( $Rc8083ec742[0]['thisdate'] ) ? date( "Y-m-d H-i-s" ) : $Rc8083ec742[0]['thisdate'],
																"lastip" => empty( $Rc8083ec742[0]['thisip'] ) ? $this->GetRealIp( ) : $Rc8083ec742[0]['thisip'],
																"thisdate" => date( "Y-m-d H-i-s" ),
																"thisip" => $this->GetRealIp( ),
																"thislogintype" => $R7f18fb346f,
																"thisloginaccount" => $R679e9b9234[0]['staffid'],
																"lastlogintype" => $Rc8083ec742[0]['thislogintype'],
																"lastloginaccount" => $Rc8083ec742[0]['thisloginaccount']
												);
												$this->IAgent_Update( $data, $Rc8083ec742[0]['aid'] );
												$R36260350d0->ICache_Update( array(
																"hander" => "agents",
																"arg1" => $Rc8083ec742[0]['aid']
												) );
												return $R3db8f5c8bc;
								}
				}

				public function CheckTrades( $R2a51483b14 = 0, $R98bc1630cd = 0 )
				{
								if ( $R2a51483b14 <= 0 )
								{
												return -1;
								}
								$R130d64a4ad = "select fat  from ".$this->dbprefix."trades where aid = ".$R2a51483b14." and tradetype not in (11,12,50) order by tid desc limit 0,1";
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$Ra1183b8f9a = 0;
								if ( !isset( $R3db8f5c8bc[0]['fat'] ) )
								{
												$R1ed7ad9990 = DATACACHE."site".DS."orderhistory.php";
												if ( file_exists( $R1ed7ad9990 ) )
												{
																$R130d64a4ad = "select fat  from ".$this->dbprefix."trades where aid = ".$R2a51483b14." and tradetype not in (11,12,50) order by tid desc limit 0,1";
																$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
												}
								}
								if ( !isset( $R3db8f5c8bc[0]['fat'] ) && 0 < $R98bc1630cd )
								{
												return -1;
								}
								if ( !isset( $R3db8f5c8bc[0]['fat'] ) )
								{
												$Ra1183b8f9a = 0;
								}
								else
								{
												$Ra1183b8f9a = $R3db8f5c8bc[0]['fat'];
								}
								if ( $Ra1183b8f9a != $R98bc1630cd )
								{
												$R67be2b4f52 = $Ra1183b8f9a - $R98bc1630cd;
												if ( $R67be2b4f52 < 0 )
												{
																$R67be2b4f52 = 0 - $R67be2b4f52;
												}
												if ( $R67be2b4f52 < 0.1 )
												{
																return 1;
												}
												return -1;
								}
								return 1;
				}

				public function GetRealIp( )
				{
								$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								if ( getenv( "HTTP_CLIENT_IP" ) && strcasecmp( getenv( "HTTP_CLIENT_IP" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_CLIENT_IP" );
								}
								else if ( getenv( "HTTP_X_FORWARDED_FOR" ) && strcasecmp( getenv( "HTTP_X_FORWARDED_FOR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "HTTP_X_FORWARDED_FOR" );
								}
								else if ( getenv( "REMOTE_ADDR" ) && strcasecmp( getenv( "REMOTE_ADDR" ), "unknown" ) )
								{
												$R9cfb7c6d6b = getenv( "REMOTE_ADDR" );
								}
								else if ( isset( $_SERVER['REMOTE_ADDR'] ) && $_SERVER['REMOTE_ADDR'] && strcasecmp( $_SERVER['REMOTE_ADDR'], "unknown" ) )
								{
												$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								}
								return $R9cfb7c6d6b;
				}

				public function IAgent_Update( $Raf5ed8788a = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Raf5ed8788a as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "agents", "aid = ".$R3584859062 );
				}

				public function CheckHard( $R2a51483b14, $Re9e4225a22 = array( ), $R5334b17ba8 )
				{
								if ( $Re9e4225a22['isbindhard'] == 1 )
								{
												$this->reset( );
												$this->add( "aid", $R5334b17ba8 );
												$this->add( "staffid", $R2a51483b14 );
												$R679e9b9234 = $this->SelectRecord( "security" );
												if ( count( $R679e9b9234 ) == 0 )
												{
																if ( $Re9e4225a22['inputpwd'] != md5( $Re9e4225a22['pwd'] ) )
																{
																				return 1;
																}
																return 0;
												}
												$R0f8134fb60 = $R679e9b9234[0];
												if ( !isset( $R0f8134fb60['aid'] ) )
												{
																if ( $Re9e4225a22['inputpwd'] != md5( $Re9e4225a22['pwd'] ) )
																{
																				return 1;
																}
																return 0;
												}
												if ( isset( $Re9e4225a22['randcode'] ) && $R0f8134fb60['randcheck'] == 1 )
												{
																$Rd19ae93b31 = $Re9e4225a22['randcode'];
																$R8cb9f4d29e = intval( $R0f8134fb60['randpos'] );
																$Rc8d5669813 = intval( $R0f8134fb60['randtype'] ) - 1;
																$R6bdfc93d6b = array(
																				array( 1, 2, 0 ),
																				array( 1, 3, 0 ),
																				array( 1, 4, 0 ),
																				array( 2, 3, 0 ),
																				array( 2, 4, 0 ),
																				array( 3, 4, 0 ),
																				array( 1, 2, 1 ),
																				array( 1, 3, 1 ),
																				array( 1, 4, 1 ),
																				array( 2, 3, 1 ),
																				array( 2, 4, 1 ),
																				array( 3, 4, 1 )
																);
																$R026f0167b4 = $R6bdfc93d6b[$Rc8d5669813];
																$R244f38266c = 0;
																if ( $R026f0167b4[2] == 0 )
																{
																				$R244f38266c = intval( $Rd19ae93b31[$R026f0167b4[0] - 1] ) + intval( $Rd19ae93b31[$R026f0167b4[1] - 1] );
																}
																else
																{
																				$R244f38266c = intval( $Rd19ae93b31[$R026f0167b4[0] - 1] ) * intval( $Rd19ae93b31[$R026f0167b4[1] - 1] );
																}
																if ( $R244f38266c < 10 )
																{
																				$R244f38266c = "0".$R244f38266c;
																}
																$Rd5f59c5c64 = $Re9e4225a22['pwd'];
																switch ( $R8cb9f4d29e )
																{
																case 0 :
																				$Rd5f59c5c64 = $R244f38266c.$Rd5f59c5c64;
																				break;
																case 999 :
																				$Rd5f59c5c64 .= $R244f38266c;
																				break;
																default :
																				$Raf6dee234f = substr( $Rd5f59c5c64, 0, $R8cb9f4d29e - 1 );
																				$R651f1bfe78 = substr( $Rd5f59c5c64, $R8cb9f4d29e - 1 );
																				$Rd5f59c5c64 = $Raf6dee234f.$R244f38266c.$R651f1bfe78;
																				break;
																}
																if ( $Re9e4225a22['inputpwd'] != md5( $Rd5f59c5c64 ) )
																{
																				return 1;
																}
																else
																{
																				return 0;
																}
												}
												else if ( $Re9e4225a22['inputpwd'] != md5( $Re9e4225a22['pwd'] ) )
												{
																return 1;
												}
												if ( $R0f8134fb60['ipcheck'] == "1" && ( trim( $Re9e4225a22['ip'] ) == "" || strpos( ",".$R0f8134fb60['ip'].",", ",".$Re9e4225a22['ip']."," ) === false ) )
												{
																return 3;
												}
												if ( $R0f8134fb60['maccheck'] == "1" && ( trim( $Re9e4225a22['mac'] ) == "" || strpos( ",".$R0f8134fb60['mac'].",", ",".$Re9e4225a22['mac']."," ) === false ) )
												{
																return 4;
												}
												if ( $R0f8134fb60['hdecheck'] == "1" && ( trim( $Re9e4225a22['hde'] ) == "" || strpos( ",".$R0f8134fb60['hde'].",", ",".$Re9e4225a22['hde']."," ) === false ) )
												{
																return 5;
												}
												if ( $R0f8134fb60['cpucheck'] == "1" && ( trim( $Re9e4225a22['cpu'] ) == "" || strpos( ",".$R0f8134fb60['cpu'].",", ",".$Re9e4225a22['cpu']."," ) === false ) )
												{
																return 6;
												}
								}
								else
								{
												if ( $Re9e4225a22['inputpwd'] != md5( $Re9e4225a22['pwd'] ) )
												{
																return 1;
												}
												return 0;
								}
				}

}

?>
