<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class trades extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ITrade_Page( $data = array( ), $R9afaabccd6 = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "trades", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $R9afaabccd6, true, "tid" );
				}

				public function &ITrade_GetByYktNumber( $R1df8368da5, $Rb0d5d47f3d = "*", $R5cc00cfbe4 = false )
				{
								$R8eeb1221ae = explode( ",", $Rb0d5d47f3d );
								$R026f0167b4 = array( );
								foreach ( $R8eeb1221ae as $R0f8134fb60 )
								{
												$R026f0167b4[] = "t0.".trim( $R0f8134fb60 );
								}
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R5cc00cfbe4 )
								{
												$R130d64a4ad = "select ".$R63bede6b19.",t1.failreason,t1.factoryreturn from ".$this->dbprefix."trades t0 left join ".$this->dbprefix."orders t1 on (t1.ordno=t0.ordno) where t0.yktnumber='".$R1df8368da5."' and t0.aid=0 order by t0.tid desc";
								}
								else
								{
												$R130d64a4ad = "select ".$R63bede6b19.",t1.failreason,t1.factoryreturn from ".$this->dbprefix."trades t0 left join ".$this->dbprefix."orders t1 on (t1.ordno=t0.ordno) where t0.yktnumber='".$R1df8368da5."' and t0.state>-1 and t0.aid=0 order by t0.tid desc";
								}
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['ordno'] ) && $data['ordno'] != "" )
								{
												$data['ordno'] = trim( urldecode( $data['ordno'] ) );
								}
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "pname", "yktnumber", "content" ),
																"null" => 0
												),
												array(
																"op" => "charequal",
																"var" => array( "ordno", "operator", "yktnumber", "admname" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "state", "aid", "ykt", "otherside", "bindaid" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "checkout" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['tradetype'] ) && $data['tradetype'] != "" )
								{
												$Ra6c3750fb1 = array( );
												$Rcc5c6e696c = explode( ",", $data['tradetype'] );
												foreach ( $Rcc5c6e696c as $R0f8134fb60 )
												{
																$Ra6c3750fb1[] = " ".$R1de95f080d."tradetype = ".intval( $R0f8134fb60 );
												}
												$R026f0167b4[] = " (".implode( " or ", $Ra6c3750fb1 ).") ";
								}
								if ( isset( $data['noykt'] ) && $data['noykt'] == 1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."aid > 0";
								}
								if ( isset( $data['isrewardtrade'] ) && $data['isrewardtrade'] == 1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."bindaid > 0";
								}
								$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								if ( isset( $data['cardnumberstart'] ) && $data['cardnumberstart'] != "" )
								{
												$R026f0167b4[] = " (".$R1de95f080d."yktnumber > '".$data['cardnumberstart']."' or ".$R1de95f080d."yktnumber = '".$data['cardnumberstart']."' )";
								}
								if ( isset( $data['cardnumberend'] ) && $data['cardnumberend'] != "" )
								{
												$R026f0167b4[] = " (".$R1de95f080d."yktnumber < '".$data['cardnumberend']."' or ".$R1de95f080d."yktnumber = '".$data['cardnumberend']."' )";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function YearNowSub( $R5b08d4f823 )
				{
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								if ( $R35a9abe007 < 0 )
								{
												$R35a9abe007 = 0;
								}
								$R7f49613fdd = intval( $R35a9abe007 / 86400 / 365 );
								$R63bede6b19 = $R7f49613fdd;
								return $R63bede6b19;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R497a2c671f = $this->YearNowSub( urldecode( $data['startdate'] ) );
												if ( 9 < $R497a2c671f )
												{
																return "";
												}
												$R026f0167b4[] = " ".$R1de95f080d."createdate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."createdate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function &ITrade_Get( $Rdcd9105806, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "trades", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ITrade_GetAll( $Rdcd9105806, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "trades", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function ITrade_Update( $R3a68f04cc2 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R3a68f04cc2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "trades", "tid = ".$R3584859062 );
				}

				public function ITrade_UpdateByOrdno( $R3a68f04cc2 = array( ), $Rdcd9105806 )
				{
								$this->reset( );
								foreach ( $R3a68f04cc2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "trades", "ordno = '".$Rdcd9105806."'" );
				}

				public function ITrade_UpdateByYkt( $R3a68f04cc2 = array( ), $Rdcd9105806, $R1df8368da5 )
				{
								$this->reset( );
								foreach ( $R3a68f04cc2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "trades", "ordno = '".$Rdcd9105806."' and yktnumber = '".$R1df8368da5."'" );
				}

				public function ITrade_Create( $R3a68f04cc2 = array( ) )
				{
								$this->reset( );
								foreach ( $R3a68f04cc2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "trades" );
				}

				public function ITrade_Del( $R755ba04a49 )
				{
								return $this->DeleteRecord( "trades", "tid = ".$R755ba04a49 );
				}

				public function &ITrade_YktPage( $data = array( ) )
				{
								$R130d64a4ad = "select t.createdate,t.fat,t.fbt,o.pname,o.ptype,o.qty,o.cprice,o.dollars,c.cardnumber,c.price,c.pname as cardname,o.ordno from ".$this->dbprefix."trades t "."left join ".$this->dbprefix."orders o on t.ordno=o.ordno "."left join ".$this->dbprefix."cards c on c.id=t.ykt "."%s group by tid order by tid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function ITrade_GetByLimit( $data = array( ), $Rb0d5d47f3d = "*", $R43297dc3ba = 0 )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."trades %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( $R43297dc3ba == 0 )
								{
												if ( isset( $R679e9b9234[0] ) )
												{
																return $R679e9b9234[0];
												}
												else
												{
																return array( );
												}
								}
								else
								{
												return $R679e9b9234;
								}
				}

				public function ITrade_GetByStr( $Rb7492a73f7 = array( ), $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select ".$R4454e360ff."  from ".$this->dbprefix."trades where ".$Rb7492a73f7;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function ITrade_UpdateByStr( $data = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "trades", $R63bede6b19 );
				}

				public function ITrade_UpdateStrByStr( $R63bede6b19, $R42f28414d6 )
				{
								$R130d64a4ad = sprintf( "update %s set %s where %s", $this->dbprefix."trades", $R63bede6b19, $R42f28414d6 );
								return $this->QueryUpdate( $R130d64a4ad );
				}

}

?>
