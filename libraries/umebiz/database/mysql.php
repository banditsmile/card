<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class mysql
{

				public $db = NULL;
				public $name = NULL;
				public $value = NULL;
				public $op = NULL;
				public $num = NULL;
				public $version = "";
				public $link = NULL;
				public $dbprefix = "";
				public $table = NULL;

				public function __construct( )
				{
								global $host;
								global $user;
								global $password;
								global $dbname;
								global $dbcharset;
								global $dbprefix;
								$this->connect( $host, $user, $password, $dbname, "", true, $dbcharset );
								$this->db = $dbname;
								$this->dbprefix = $dbprefix;
				}

				public function __destruct( )
				{
								$this->close( );
				}

				public function connect( $R0fcaeb0efa, $R7a97df2bc5, $R2baff9b436, $dbname = "", $R69dfe14886 = 0, $R1caa16fceb = TRUE, $dbcharset = "" )
				{
								if ( !( $this->link = mysql_connect( $R0fcaeb0efa, $R7a97df2bc5, $R2baff9b436 ) ) )
								{
												echo "Can not connect to MySQL server";
												exit( );
								}
								else if ( @mysql_select_db( $dbname, $this->link ) )
								{
												mysql_query( "SET NAMES '{$dbcharset}';", $this->link );
								}
								else
								{
												echo "Can not connect to MySQL server";
												exit( );
								}
				}

				public function close( )
				{
								return mysql_close( $this->link );
				}

				public function fetch_array( $Re91192a00f, $Rae317daa4a = MYSQL_ASSOC )
				{
								return mysql_fetch_array( $Re91192a00f, $Rae317daa4a );
				}

				public function version( )
				{ return '5.0.0';
								if ( empty( $this->version ) )
								{
												$this->version = mysql_get_server_info( $this->link );
								}
								return $this->version;
				}

				public function reset( )
				{
								$this->num = 0;
								$this->name = array( );
								$this->value = array( );
								$this->op = array( );
				}

				public function add( $name, $R3882a427af, $op = "=" )
				{
								$this->name[$this->num] = $name;
								$this->value[$this->num] = $R3882a427af;
								$this->op[$this->num] = $op;
								$this->num++;
				}

				public function &BuildStr( $data = array( ), $vardata = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								foreach ( $vardata as $Rd45e507c4c )
								{
												foreach ( $Rd45e507c4c['var'] as $R0f8134fb60 )
												{
																if ( !isset($data[$R0f8134fb60]) )
																{
																				if ( isset( $Rd45e507c4c['range'], $data[$R0f8134fb60."range"] ) )
																				{
																								if ( isset( $Rd45e507c4c['null'] ) && $data[$R0f8134fb60."range"] == "" )
																								{
																												continue;
																								}
																								$R7965cb3798 = urldecode( $data[$R0f8134fb60."range"] );
																								$Ra76b34e7e3 = explode( ":", $R7965cb3798 );
																								switch ( $Rd45e507c4c['op'] )
																								{
																								case "doublerange" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." > ".doubleval( $Ra76b34e7e3[0] - 0.001 );
																												if ( !isset( $Ra76b34e7e3[1] ) )
																												{
																																break;
																												}
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." < ".doubleval( $Ra76b34e7e3[1] + 0.001 );
																												break;
																								default :
																												break;
																								}
																				}
																}
																else if ( isset( $data[$R0f8134fb60] ) )
																{
																				if ( isset( $Rd45e507c4c['null'] ) && $data[$R0f8134fb60] == "" )
																				{
																								continue;
																				}
																				$R7965cb3798 = urldecode( $data[$R0f8134fb60] );
																				$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
																				foreach ( $Ra76b34e7e3 as $R6c844a990b )
																				{
																								switch ( $Rd45e507c4c['op'] )
																								{
																								case "like" :
																												if ( !( $R6c844a990b !== "" ) )
																												{
																																break;
																												}
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." like '%".$R6c844a990b."%'";
																												break;
																								case "intequal" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." = ".intval( $R6c844a990b );
																												break;
																								case "intlt" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." < ".intval( $R6c844a990b );
																												break;
																								case "intgt" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." > ".intval( $R6c844a990b );
																												break;
																								case "doubleequal" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." = ".doubleval( $R6c844a990b );
																												break;
																								case "doublelt" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." < ".doubleval( $R6c844a990b );
																												break;
																								case "doublegt" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." > ".doubleval( $R6c844a990b );
																												break;
																								case "charequal" :
																												$R026f0167b4[] = " ".$R1de95f080d.$R0f8134fb60." = '".$R6c844a990b."'";
																												break;
																								default :
																												break;
																								}
																				}
																}
												}
								}
								return $R026f0167b4;
				}

				public function unadd( $name )
				{
								$Ra7b9a38368 = 0;
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
								{
												if ( $this->name[$Ra16d228039] != $name )
												{
																$R23cbcc9eeb[$Ra7b9a38368] = $this->name[$Ra16d228039];
																$R6e30374973[$Ra7b9a38368] = $this->value[$Ra16d228039];
																$R7b9479e432[$Ra7b9a38368] = $this->op[$Ra16d228039];
																$Ra7b9a38368++;
												}
								}
								$this->name = $R23cbcc9eeb;
								$this->value = $R6e30374973;
								$this->op = $R7b9479e432;
								$this->num = $Ra7b9a38368;
				}

				public function InsertRecord( $table, $R8926a8b7b8 = false, $database = null )
				{
								if ( $this->num == 0 )
								{
												exit( "没有定义变量！" );
								}
								$R4454e360ff = implode( ",", $this->name );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
								{
												if ( is_string( $this->value[$Ra16d228039] ) )
												{
																$R026f0167b4[$Ra16d228039] = "'".$this->value[$Ra16d228039]."'";
												}
												else
												{
																$R026f0167b4[$Ra16d228039] = $this->value[$Ra16d228039];
												}
								}
								$value = implode( ",", $R026f0167b4 );
								$R130d64a4ad = sprintf( "insert into %s(%s) values(%s)", $this->dbprefix.$table, $R4454e360ff, $value );
								$R679e9b9234 = mysql_query( $R130d64a4ad, $this->link );
								$this->CacheTable( $R130d64a4ad );
								if ( $R8926a8b7b8 )
								{
												return mysql_insert_id( $this->link );
								}
								else
								{
												return $R679e9b9234;
								}
				}

				public function &SelectRecord( $table, $Rb0d5d47f3d = "*", $R56ea904d53 = "" )
				{
								if ( $this->num == 0 )
								{
												$R130d64a4ad = sprintf( "select %s from %s %s", $Rb0d5d47f3d, $this->dbprefix.$table, $R56ea904d53 );
								}
								else
								{
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
												{
																if ( is_string( $this->value[$Ra16d228039] ) )
																{
																				$R026f0167b4[$Ra16d228039] = "'".$this->value[$Ra16d228039]."'";
																}
																else
																{
																				$R026f0167b4[$Ra16d228039] = $this->value[$Ra16d228039];
																}
																$R63bede6b19[$Ra16d228039] = sprintf( "%s%s%s", $this->name[$Ra16d228039], $this->op[$Ra16d228039], $R026f0167b4[$Ra16d228039] );
												}
												$R8409eaa6ec = implode( " and ", $R63bede6b19 );
												$R130d64a4ad = sprintf( "select %s from %s where %s %s", $Rb0d5d47f3d, $this->dbprefix.$table, $R8409eaa6ec, $R56ea904d53 );
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &QuerySelect( $R130d64a4ad )
				{
								if ( ( $R679e9b9234 = mysql_query( $R130d64a4ad, $this->link ) ) == false )
								{
												echo "查询数据库时出错";
												exit( );
								}
								$R43297dc3ba = array( );
								while($q = $this->fetch_array( $R679e9b9234 )) {
								$R43297dc3ba[] = $q;
								}
								//array_pop( $R43297dc3ba );
								mysql_free_result( $R679e9b9234 );
								return $R43297dc3ba;
				}

				public function queryrows( $R130d64a4ad )
				{
								if ( ( $R679e9b9234 = mysql_query( $R130d64a4ad, $this->link ) ) == false )
								{
												echo "查询数据库时出错";
												exit( );
								}
								$Rd640339160 = mysql_num_rows( $R679e9b9234 );
								return $Rd640339160;
				}

				public function queryrows1( $R130d64a4ad )
				{
								$R679e9b9234 = mysql_query( $R130d64a4ad, $this->link );
								$R43297dc3ba = $this->fetch_array( $R679e9b9234 );
								$R056735882a = $R43297dc3ba['count'];
								return $R056735882a;
				}

				public function num_rows( $table )
				{
								if ( $this->num == 0 )
								{
												$R130d64a4ad = sprintf( "select count(0) as count from %s", $this->dbprefix.$table );
								}
								else
								{
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
												{
																if ( is_string( $this->value[$Ra16d228039] ) )
																{
																				$R026f0167b4[$Ra16d228039] = "'".$this->value[$Ra16d228039]."'";
																}
																else
																{
																				$R026f0167b4[$Ra16d228039] = $this->value[$Ra16d228039];
																}
																$R63bede6b19[$Ra16d228039] = sprintf( "%s%s%s", $this->name[$Ra16d228039], $this->op[$Ra16d228039], $R026f0167b4[$Ra16d228039] );
												}
												$R8409eaa6ec = implode( " and ", $R63bede6b19 );
												$R130d64a4ad = sprintf( "select count(0) as count from %s where %s", $this->dbprefix.$table, $R8409eaa6ec );
								}
								return $this->queryrows1( $R130d64a4ad );
				}

				public function &PageRecord( $table, $R71a6fd054f, $R42c553e7de, $R42f28414d6 = null, $Rb0d5d47f3d = "*", $Rbae26e5418 = false, $Re2bcf953af = "id" )
				{
								$R3fb77212fc = 0;
								$R056735882a = 0;
								$Rc63ba38f89 = $R71a6fd054f;
								$R50303c31b7 = 0;
								$R8c79fb08ee = 0;
								$Re674894104 = "";
								$Rc1a248fb3c = "";
								$R71a664ef8c = array(
												"info" => array( ),
												"items" => array( )
								);
								$dbprefix = $this->dbprefix;
								$R21d2ff6532 = 0;
								$Rf1b648d617 = "";
								if ( $R42f28414d6 == null )
								{
												$R130d64a4ad = sprintf( "select count(0) as count from %s", $this->dbprefix.$table );
								}
								else
								{
												$R130d64a4ad = sprintf( "select count(0) as count from %s where %s", $this->dbprefix.$table, $R42f28414d6 );
								};
								$R679e9b9234 = mysql_query( $R130d64a4ad, $this->link );
								$R43297dc3ba = $this->fetch_array( $R679e9b9234 );
								$R056735882a = $R43297dc3ba['count'];
								$R3fb77212fc = intval( ( $R056735882a + $R42c553e7de - 1 ) / $R42c553e7de );
								if ( $R42f28414d6 == null )
								{
												$R130d64a4ad = sprintf( "select * from %s", $this->dbprefix.$table );
								}
								else
								{
												$R130d64a4ad = sprintf( "select * from %s where %s", $this->dbprefix.$table, $R42f28414d6 );
								}
								if ( $Rc63ba38f89 < 1 )
								{
												$Rc63ba38f89 = 1;
								}
								if ( $R3fb77212fc < $Rc63ba38f89 && 0 < $R3fb77212fc )
								{
												$Rc63ba38f89 = $R3fb77212fc;
								}
								if ( $Rc63ba38f89 == 1 )
								{
												$Rc1a248fb3c = "disabled";
								}
								if ( $Rc63ba38f89 == $R3fb77212fc || $R3fb77212fc < 2 )
								{
												$Re674894104 = "disabled";
								}
								$R21d2ff6532 = ( $Rc63ba38f89 - 1 ) * $R42c553e7de;
								$R8c79fb08ee = $Rc63ba38f89 - 1;
								$R50303c31b7 = $Rc63ba38f89 + 1;
								if ( 0 < $R056735882a )
								{
												$Rf1b648d617 = sprintf( " limit %s, %s", $R21d2ff6532, $R42c553e7de );
												if ( $Rbae26e5418 )
												{
																$R130d64a4ad = sprintf( "%s order by %s desc %s", $R130d64a4ad, $Re2bcf953af, $Rf1b648d617 );
												}
												else
												{
																$R130d64a4ad = sprintf( "%s %s", $R130d64a4ad, $Rf1b648d617 );
												}
												if ( ( $R679e9b9234 = mysql_query( $R130d64a4ad, $this->link ) ) == false )
												{
																echo "查询数据库时出错";
																exit( );
												}						

												while($q = $this->fetch_array( $R679e9b9234 )){
												$R71a664ef8c['item'][] = $q;
												}
												
												mysql_free_result( $R679e9b9234 );
								}
								else
								{
												$R71a664ef8c['item'] = array( );
								}
								$R71a664ef8c['info']['totlepage'] = $R3fb77212fc;
								$R71a664ef8c['info']['totlerow'] = $R056735882a;
								$R71a664ef8c['info']['thispage'] = $Rc63ba38f89;
								$R71a664ef8c['info']['nextpage'] = $R50303c31b7;
								$R71a664ef8c['info']['prepage'] = $R8c79fb08ee;
								$R71a664ef8c['info']['nextstate'] = $Re674894104;
								$R71a664ef8c['info']['prestate'] = $Rc1a248fb3c;
								$R71a664ef8c['info']['nrows'] = $R42c553e7de;
								return $R71a664ef8c;
				}

				public function &PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf = "" )
				{
								$R3fb77212fc = 0;
								$R056735882a = 0;
								$Rc63ba38f89 = $R71a6fd054f;
								$R50303c31b7 = 0;
								$R8c79fb08ee = 0;
								$Re674894104 = "";
								$Rc1a248fb3c = "";
								$R71a664ef8c = array(
												"info" => array( ),
												"items" => array( )
								);
								$dbprefix = $this->dbprefix;
								$R21d2ff6532 = 0;
								$Rf1b648d617 = "";
								if ( $R9a84c58fcf == "" )
								{
												$R679e9b9234 = mysql_query( $R130d64a4ad, $this->link );
												$R056735882a = mysql_num_rows( $R679e9b9234 );
								}
								else
								{
												$R679e9b9234 = mysql_query( $R9a84c58fcf, $this->link );
												$R43297dc3ba = $this->fetch_array( $R679e9b9234 );
												$R056735882a = $R43297dc3ba['count'];
								}
								$R3fb77212fc = intval( ( $R056735882a + $R42c553e7de - 1 ) / $R42c553e7de );
								if ( $Rc63ba38f89 < 1 )
								{
												$Rc63ba38f89 = 1;
								}
								if ( $R3fb77212fc < $Rc63ba38f89 && 0 < $R3fb77212fc )
								{
												$Rc63ba38f89 = $R3fb77212fc;
								}
								if ( $Rc63ba38f89 == 1 )
								{
												$Rc1a248fb3c = "disabled";
								}
								if ( $Rc63ba38f89 == $R3fb77212fc || $R3fb77212fc < 2 )
								{
												$Re674894104 = "disabled";
								}
								$R21d2ff6532 = ( $Rc63ba38f89 - 1 ) * $R42c553e7de;
								$R8c79fb08ee = $Rc63ba38f89 - 1;
								$R50303c31b7 = $Rc63ba38f89 + 1;
								if ( 0 < $R056735882a )
								{
												$Rf1b648d617 = sprintf( " limit %s, %s", $R21d2ff6532, $R42c553e7de );
												$R130d64a4ad = sprintf( "%s %s", $R130d64a4ad, $Rf1b648d617 );
												if ( ( $R679e9b9234 = mysql_query( $R130d64a4ad, $this->link ) ) == false )
												{
																echo "查询数据库时出错";
																exit( );
												}
												while($q=$this->fetch_array( $R679e9b9234 )){
												$R71a664ef8c['item'][] = $q;
												}
												mysql_free_result( $R679e9b9234 );
								}
								else
								{
												$R71a664ef8c['item'] = array( );
								}
								$R71a664ef8c['info']['totlepage'] = $R3fb77212fc;
								$R71a664ef8c['info']['totlerow'] = $R056735882a;
								$R71a664ef8c['info']['thispage'] = $Rc63ba38f89;
								$R71a664ef8c['info']['nextpage'] = $R50303c31b7;
								$R71a664ef8c['info']['prepage'] = $R8c79fb08ee;
								$R71a664ef8c['info']['nextstate'] = $Re674894104;
								$R71a664ef8c['info']['prestate'] = $Rc1a248fb3c;
								$R71a664ef8c['info']['nrows'] = $R42c553e7de;
								return $R71a664ef8c;
				}

				public function UpdateRecord( $table, $R42f28414d6 )
				{
								if ( $this->num == 0 )
								{
												exit( "没有定义变量！" );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
								{
												if ( is_string( $this->value[$Ra16d228039] ) )
												{
																$R026f0167b4[$Ra16d228039] = "'".$this->value[$Ra16d228039]."'";
												}
												else
												{
																$R026f0167b4[$Ra16d228039] = $this->value[$Ra16d228039];
												}
												$Ra32d62584b[$Ra16d228039] = $this->name[$Ra16d228039]."=".$R026f0167b4[$Ra16d228039];
								}
								$R63bede6b19 = implode( ",", $Ra32d62584b );
								$R130d64a4ad = sprintf( "update %s set %s where %s", $this->dbprefix.$table, $R63bede6b19, $R42f28414d6 );
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function QueryUpdate( $R130d64a4ad, $Re9b5f92229 = 1 )
				{
								if ( mysql_query( $R130d64a4ad, $this->link ) == false )
								{
												if ( $Re9b5f92229 == 1 )
												{
																echo "修改数据时出错";
												}
												return false;
								}
								else
								{
												$this->CacheTable( $R130d64a4ad );
												return true;
								}
				}

				public function CacheTable( $R130d64a4ad )
				{
								if ( UPATH_ROOT == "isfs" )
								{
												return;
								}
								$Rcc32da8337 = 1;
								$R09a3346376 = DATACACHE."admlogin.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												$Re6bee88e8a = time( );
												if ( 30 < $Re6bee88e8a - $R590433f7d3 )
												{
																$Rcc32da8337 = 0;
												}
								}
								if ( $Rcc32da8337 == 1 )
								{
												$R63bede6b19 = "";
												if ( strpos( $R130d64a4ad, $this->dbprefix."agent" ) !== false )
												{
																$R63bede6b19 = "agent";
												}
												else if ( strpos( $R130d64a4ad, $this->dbprefix."product" ) !== false )
												{
																$R63bede6b19 = "product";
												}
												else if ( strpos( $R130d64a4ad, $this->dbprefix."order" ) !== false )
												{
																$R63bede6b19 = "order";
												}
												else if ( strpos( $R130d64a4ad, $this->dbprefix."article" ) !== false )
												{
																$R63bede6b19 = "article";
												}
												else if ( strpos( $R130d64a4ad, $this->dbprefix."bd" ) !== false )
												{
																$R63bede6b19 = "bd";
												}
												else if ( strpos( $R130d64a4ad, $this->dbprefix."msg" ) !== false )
												{
																$R63bede6b19 = "msg";
												}
								}
								else
								{
												$R63bede6b19 = "";
												if ( strpos( $R130d64a4ad, $this->dbprefix."msg" ) !== false )
												{
																$R63bede6b19 = "msg";
												}
								}
								if ( $R63bede6b19 != "" )
								{
												$R09a3346376 = DATACACHE.$R63bede6b19.".php";
												$R63bede6b19 = "\$R4c6d6471cd=".time( );
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
				}

				public function DeleteRecord( $table, $R42f28414d6 )
				{
								$R130d64a4ad = sprintf( "delete from %s where %s", $this->dbprefix.$table, $R42f28414d6 );
								if ( mysql_query( $R130d64a4ad, $this->link ) == false )
								{
												echo "删除数据时出错";
												return false;
								}
								else
								{
												$this->CacheTable( $R130d64a4ad );
												return true;
								}
				}

				public function DeleteItem( $table, $R43297dc3ba = 1 )
				{
								if ( $this->num == 0 )
								{
												exit( "没有定义变量！" );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $this->num;	$Ra16d228039++	)
								{
												if ( is_string( $this->value[$Ra16d228039] ) )
												{
																$R026f0167b4[$Ra16d228039] = "'".$this->value[$Ra16d228039]."'";
												}
												else
												{
																$R026f0167b4[$Ra16d228039] = $this->value[$Ra16d228039];
												}
												$R63bede6b19[$Ra16d228039] = sprintf( "%s%s%s", $this->name[$Ra16d228039], $this->op[$Ra16d228039], $R026f0167b4[$Ra16d228039] );
								}
								$R63bede6b19 = implode( " and ", $R63bede6b19 );
								if ( 0 < count( $R63bede6b19 ) )
								{
												$R130d64a4ad = sprintf( "delete from %s where %s", $this->dbprefix.$table, $R63bede6b19 );
								}
								else
								{
												$R130d64a4ad = sprintf( "delete from %s", $this->dbprefix.$table );
								}
								return $this->QueryUpdate( $R130d64a4ad );
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
