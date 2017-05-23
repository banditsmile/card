<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class agents extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IAgent_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$Rb81dfc1e44 = isset( $data['orderby'] ) ? $data['orderby'] : "aid";
								return $this->PageRecord( "agents", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", true, $Rb81dfc1e44 );
				}

				public function &IAgent_GetUnderling( $Rac9b8532b8 )
				{
								$this->reset( );
								$this->add( "parentid", $Rac9b8532b8 );
								$R679e9b9234 = $this->SelectRecord( "agents" );
								return $R679e9b9234;
				}

				public function GetBosses( $R2a51483b14 )
				{
								$R7fb26bbe56 = array( );
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->SelectRecord( "agents", "parentid" );
								if ( isset( $R679e9b9234[0]['parentid'] ) )
								{
												$Rac9b8532b8 = $R679e9b9234[0]['parentid'];
												return $Rac9b8532b8;
								}
								else
								{
												return -1;
								}
				}

				public function &IAgent_GetBosses( $R2a51483b14 )
				{
								$R026f0167b4 = array( );
								$R5334b17ba8 = $this->GetBosses( $R2a51483b14 );
								if ( $R5334b17ba8 == -1 )
								{
												return $R026f0167b4;
								}
								else
								{
												$R026f0167b4[] = $R5334b17ba8;
								}
								while ( 0 < $R5334b17ba8 )
								{
												$R5334b17ba8 = $this->GetBosses( $R5334b17ba8 );
												if ( $R5334b17ba8 == -1 )
												{
																return $R026f0167b4;
												}
												else
												{
																$R026f0167b4[] = $R5334b17ba8;
												}
								}
								return $R026f0167b4;
				}

				public function &IAgent_CustomPage( $data = array( ) )
				{
								$R130d64a4ad = "select *, 0 as underlingcount, 0 as rank from ".$this->dbprefix."agents "."%s order by aid desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."agents %s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								$R3db8f5c8bc = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R3db8f5c8bc['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$Rac9b8532b8 = $R3db8f5c8bc['item'][$Ra16d228039]['aid'];
												$R130d64a4ad = "select count(0) as count from ".$this->dbprefix."agents  where parentid=".$Rac9b8532b8;
												$Rdbc5c05ff5 = $this->QuerySelect( $R130d64a4ad );
												if ( isset( $Rdbc5c05ff5[0]['count'] ) )
												{
																$R3db8f5c8bc['item'][$Ra16d228039]['underlingcount'] = $Rdbc5c05ff5[0]['count'];
												}
								}
								return $R3db8f5c8bc;
				}

				public function &IAgent_PageForPrice( $data = array( ) )
				{
								$R8e8b5578f7 = $data['pid'];
								$R130d64a4ad = "select t0.aid as thisaid,t0.aname,t0.company,t0.aremain,t0.acsmp,t0.prv,t0.city, t0.alv, t3.price as privateprice, t3.id as ppid,(select name from ".$this->dbprefix."ranks t1 where t1.id = t0.alv) as alvtext,  t2.* "."from ".$this->dbprefix."agents t0 "."left join ".$this->dbprefix."prices t2 on t2.pid=".$R8e8b5578f7." and t2.aid=0 "."left join ".$this->dbprefix."privateprices t3 on t3.aid = t0.aid and t3.pid=".$R8e8b5578f7."%s group by t0.aid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "aname", "prv", "city", "company", "eshop", "aaddr", "arealname", "aqq", "amail", "atel", "zip", "remarks", "mobile" )
												),
												array(
																"op" => "intequal",
																"var" => array( "aid", "pricetpl", "alv", "forb2b", "forb2c", "forykt" ),
																"null" => 0
												),
												array(
																"op" => "doublegt",
																"var" => array( "aremain", "acsmp", "income" ),
																"null" => 0
												),
												array(
																"op" => "doublerange",
																"var" => array( "aremain", "acsmp", "income" ),
																"range" => 1,
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R026f0167b4[] = $this->GetOptype( $data['optype'] );
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " inrecycle = 0";
								}
								if ( isset( $data['parentid'] ) && $data['parentid'] != -1 )
								{
												$R026f0167b4[] = " parentid=".intval( $data['parentid'] );
								}
								if ( isset( $data['inparentid'] ) && $data['inparentid'] != -1 )
								{
												$R026f0167b4[] = " parentid in (".$data['inparentid'].")";
								}
								if ( isset( $data['rankname'] ) && $data['rankname'] != "" )
								{
												$this->reset( );
												$this->add( "name", urldecode( $data['rankname'] ) );
												$R679e9b9234 = $this->SelectRecord( "ranks", "id" );
												if ( isset( $R679e9b9234[0]['id'] ) )
												{
																$R026f0167b4[] = " alv = ".$R679e9b9234[0]['id'];
												}
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
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

				public function IAgent_GetByStr( $R63bede6b19, $data, $Rb0d5d47f3d = "*" )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."agents where ".$R172196908b;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IAgent_Get( $R2a51483b14, $Rb0d5d47f3d = "*", $R89cd0a3912 = -1 )
				{
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								if ( -1 < $R89cd0a3912 )
								{
												$this->add( "frozen", $R89cd0a3912 );
								}
								$R679e9b9234 = $this->SelectRecord( "agents", $Rb0d5d47f3d );
								if ( isset( $R679e9b9234[0]['aremain'] ) )
								{
												$R5f825020fb = $this->CheckTrades( $R2a51483b14, $R679e9b9234[0]['aremain'] );
												if ( $R5f825020fb == -1 )
												{
																$R679e9b9234[0]['aremain'] = 0;
												}
								}
								return $R679e9b9234[0];
				}

				public function IAgent_CheckSuperPwd( $R2a51483b14, $Rd5f59c5c64 )
				{
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->SelectRecord( "agents", "superpwd" );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 1;
								}
								if ( $Rd5f59c5c64 == $R679e9b9234[0]['superpwd'] )
								{
												return 0;
								}
								else
								{
												return 2;
								}
				}

				public function IAgent_GetRemain( $R6cd996866e )
				{
								$R679e9b9234 = $this->IAgent_Get( $R6cd996866e, "aremain" );
								return doubleval( $R679e9b9234['aremain'] );
				}

				public function IAgent_IsExist( $R5d899a20a5 )
				{
								if ( trim( $R5d899a20a5 ) == "" || strpos( $R5d899a20a5, "|" ) !== false )
								{
												return 0;
								}
								$this->reset( );
								$this->add( "aname", $R5d899a20a5 );
								$R679e9b9234 = $this->num_rows( "agents" );
								if ( $R679e9b9234 == 0 )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function IAgent_IsExistById( $R2a51483b14 )
				{
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "agents" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function &IAgent_GetByName( $R5d899a20a5, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "aname", $R5d899a20a5 );
								$R679e9b9234 = $this->SelectRecord( "agents", $Rb0d5d47f3d );
								return $R679e9b9234[0];
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

				public function IAgent_UpdateByLimit( $Raf5ed8788a = array( ), $Rfed47d1571 )
				{
								$this->reset( );
								foreach ( $Raf5ed8788a as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "agents", $Rfed47d1571 );
				}

				public function IAgent_Create( $R1f6f93f8bb = array( ) )
				{
								$this->reset( );
								foreach ( $R1f6f93f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "agents", true );
				}

				public function IAgent_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "agents", "aid in (".$R3584859062.")" );
				}

				public function IAgent_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "agents", $R172196908b );
				}

				public function IAgent_UpdateByStr( $R1f6f93f8bb = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R1f6f93f8bb as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "agents", $R63bede6b19 );
				}

				public function IAgent_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "agents", "aid in (".$R3584859062.")" );
				}

				public function IAgent_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "agents", $R172196908b );
				}

				public function IAgent_Login( $username, $Rfe52e0da2c, $R7f18fb346f = 0, $Re5584ed794 = array( ) )
				{
								$this->reset( );
								$this->add( "aname", $username );
								$R679e9b9234 = $this->SelectRecord( "agents" );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								if ( 0 < $R679e9b9234[0]['frozen'] )
								{
												return 2;
								}
								else
								{
												$Re5584ed794['pwd'] = $R679e9b9234[0]['apwd'];
												$Re5584ed794['inputpwd'] = $Rfe52e0da2c;
												$R50e25075e2 = $this->CheckHard( $R679e9b9234[0]['aid'], $Re5584ed794 );
												if ( 0 < $R50e25075e2 )
												{
																return $R50e25075e2;
												}
												$R5f825020fb = $this->CheckTrades( $R679e9b9234[0]['aid'], $R679e9b9234[0]['aremain'] );
												if ( $R5f825020fb == -1 )
												{
																return 2;
												}
												$data = array(
																"lastdate" => empty( $R679e9b9234[0]['thisdate'] ) ? date( "Y-m-d H-i-s" ) : $R679e9b9234[0]['thisdate'],
																"lastip" => empty( $R679e9b9234[0]['thisip'] ) ? $this->GetRealIp( ) : $R679e9b9234[0]['thisip'],
																"thisdate" => date( "Y-m-d H-i-s" ),
																"thisip" => $this->GetRealIp( ),
																"thislogintype" => $R7f18fb346f,
																"thisloginaccount" => 0,
																"lastlogintype" => $R679e9b9234[0]['thislogintype'],
																"lastloginaccount" => $R679e9b9234[0]['thisloginaccount']
												);
												$this->IAgent_Update( $data, $R679e9b9234[0]['aid'] );
												$R36260350d0 = factory::getinstance( "cache" );
												$R36260350d0->ICache_Update( array(
																"hander" => "agents",
																"arg1" => $R679e9b9234[0]['aid']
												) );
												return $R679e9b9234;
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
																$R130d64a4ad = "select fat  from ".$this->dbprefix."tradeshistory where aid = ".$R2a51483b14." and tradetype not in (11,12,50) order by tid desc limit 0,1";
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

				public function IAgent_GetRankById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "ranks" );
								return $R3db8f5c8bc[0];
				}

				public function CheckHard( $R2a51483b14, $Re9e4225a22 = array( ) )
				{
								if ( $Re9e4225a22['isbindhard'] == 1 )
								{
												$this->reset( );
												$this->add( "aid", $R2a51483b14 );
												$this->add( "staffid", 0 );
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

				public function IAgent_Info( $R2a51483b14 = 0 )
				{
								$R3db8f5c8bc = array( );
								$this->reset( );
								$this->add( "parentid", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "agents" );
								$R3db8f5c8bc['underling_sum'] = $R679e9b9234;
								$R130d64a4ad = "select sum(outcome) as dollars from ".$this->dbprefix."trades where tradetype=31 and createdate > '".date( "Y-m-d" )."' and aid=".$R2a51483b14;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc['tran_sum'] = round( doubleval( $R679e9b9234[0]['dollars'] ), 3 );
								$R3db8f5c8bc['tran_sum'] = sprintf( "%.2f", $R3db8f5c8bc['tran_sum'] );
								$R130d64a4ad = "select sum(income) as dollars from ".$this->dbprefix."trades where tradetype=11 and createdate > '".date( "Y-m-d" )."' and aid=".$R2a51483b14;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc['profit_sum'] = round( doubleval( $R679e9b9234[0]['dollars'] ), 3 );
								$R3db8f5c8bc['profit_sum'] = sprintf( "%.3f", $R3db8f5c8bc['profit_sum'] );
								$this->reset( );
								$this->add( "marks", 0 );
								$this->add( "msgtype", 2 );
								$this->add( "createdate", date( "Y-m-d" ), ">" );
								$this->add( "msgto", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "msg" );
								$R3db8f5c8bc['remit_sum'] = $R679e9b9234;
								$this->reset( );
								$this->add( "parentid", 0 );
								$this->add( "msgtype", 3 );
								$this->add( "msgstate", 1 );
								$this->add( "msgto", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "msg" );
								$R3db8f5c8bc['complaint_sum'] = $R679e9b9234;
								$R130d64a4ad = "select sum(dollars) as dollars from ".$this->dbprefix."orders where (ordstate=1 or ordstate=2) and orddate > '".date( "Y-m-d" )."' and aid=".$R2a51483b14;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc['sell_sum'] = round( doubleval( $R679e9b9234[0]['dollars'] ), 3 );
								$R3db8f5c8bc['sell_sum'] = sprintf( "%.3f", $R3db8f5c8bc['sell_sum'] );
								$this->reset( );
								$this->add( "ordstate", 1 );
								$this->add( "ptype", 2 );
								$this->add( "aid", $R2a51483b14 );
								$this->add( "inrecycle", 0 );
								$R679e9b9234 = $this->num_rows( "orders" );
								$R3db8f5c8bc['nodeal_sum'] = $R679e9b9234;
								$this->reset( );
								$this->add( "ordstate", 2 );
								$this->add( "ptype", 0 );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "orders" );
								$R3db8f5c8bc['kmsell_sum'] = $R679e9b9234;
								return $R3db8f5c8bc;
				}

				public function IAgent_GetByMaxId( )
				{
								$R130d64a4ad = "select max(aid) as maxid from ".$this->dbprefix."agents";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['maxid'] ) )
								{
												return intval( $R679e9b9234[0]['maxid'] );
								}
								else
								{
												return 0;
								}
				}

				public function IAgent_Startid( $Ra85b9bcfd4 )
				{
								$R130d64a4ad = "alter table ".$this->dbprefix."agents AUTO_INCREMENT=".$Ra85b9bcfd4;
								return $this->QueryUpdate( $R130d64a4ad );
				}

}

?>
