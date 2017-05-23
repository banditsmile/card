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
class reward extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IReward_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select t1.*,t2.pname,t2.listprice,t2.price,t2.ptype,t2.sell from ".$this->dbprefix."reward t1 "."left join  ".$this->dbprefix."products t2 on (t1.pid=t2.pid)"."%s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t1.", "t2." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."reward t1 "."left join  ".$this->dbprefix."products t2 on (t1.pid=t2.pid)"."%s order by t1.id desc";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function &IReward_ProductPage( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R2a51483b14 = intval( $data['aid'] );
								if ( isset( $data['rewardtpl'] ) )
								{
												$R29a6818ba2 = intval( $data['rewardtpl'] );
								}
								else
								{
												$R29a6818ba2 = 0;
								}
								if ( $R29a6818ba2 == 0 )
								{
												$R130d64a4ad = "select t1.id,t1.aid,t1.reward,0 as rewardfromtpl, t2.pname,t2.listprice,t2.price,t2.ptype,t2.pid from ".$this->dbprefix."products t2 "."left join  ".$this->dbprefix."reward t1 on (t1.pid=t2.pid and t1.aid=".$R2a51483b14.")"."%s order by t2.pid desc";
								}
								else
								{
												$R130d64a4ad = "select t1.id,t1.aid,t1.reward,t3.reward as rewardfromtpl, t2.pname,t2.listprice,t2.price,t2.ptype,t2.pid from ".$this->dbprefix."products t2 "."left join  ".$this->dbprefix."reward t1 on (t1.pid=t2.pid and t1.aid=".$R2a51483b14.")"."left join  ".$this->dbprefix."rewardtpl t3 on (t3.pid=t2.pid and t3.rewardtpl=".$R29a6818ba2.")"."%s order by t2.pid desc";
								}
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "none", "t2." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where t2.ptype < 99 and t2.forykt = 1 and t2.inrecycle=0 and ".$R42f28414d6;
								}
								else
								{
												$R026f0167b4 .= " where t2.ptype < 99 and t2.forykt = 1 and t2.inrecycle=0 ";
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."products t2 "."%s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function &IReward_AgentPage( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R8e8b5578f7 = intval( $data['pid'] );
								$R130d64a4ad = "select t1.id,t1.pid,t1.reward,t2.aname,t2.company,t2.aid from ".$this->dbprefix."agents t2 "."left join  ".$this->dbprefix."reward t1 on (t1.aid=t2.aid and t1.pid=".$R8e8b5578f7.")"."%s order by t2.aid desc";
								$R026f0167b4 = "";
								$R42f28414d6 = array( );
								$R42f28414d6[] = " t2.forykt = 1 ";
								if ( isset( $data['aname'] ) )
								{
												$R7965cb3798 = urldecode( $data['aname'] );
												$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
												foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
												{
																$R42f28414d6[] = " t2.aname like '%".$R0f8134fb60."%' ";
												}
								}
								if ( isset( $data['company'] ) )
								{
												$R7965cb3798 = urldecode( $data['company'] );
												$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
												foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
												{
																$R42f28414d6[] = " t2.company like '%".$R0f8134fb60."%' ";
												}
								}
								if ( isset( $data['aid'] ) && $data['aid'] != "" )
								{
												$R42f28414d6[] = " t2.aid = ".intval( $data['aid'] )." ";
								}
								$R42f28414d6[] = " t2.inrecycle < 1 ";
								$R63bede6b19 = implode( " and ", $R42f28414d6 );
								if ( $R63bede6b19 != null )
								{
												$R026f0167b4 = " where ".$R63bede6b19;
								}
								else
								{
												$R026f0167b4 .= " ";
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."agents t2 "."left join  ".$this->dbprefix."reward t1 on (t1.aid=t2.aid and t1.pid=".$R8e8b5578f7.")"."%s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function DetailList( $data )
				{
								$R2a51483b14 = intval( $data['aid'] );
								$R130d64a4ad = "select t1.id,t1.aid,t1.reward,t2.pname,t2.listprice,t2.price,t2.ptype,t2.pid from ".$this->dbprefix."trades t2 "."left join  ".$this->dbprefix."reward t1 on (t1.pid=t2.pid and t1.aid=".$R2a51483b14.")"."%s order by t2.pid desc";
								$R026f0167b4 = array( );
								$R026f0167b4[] = " t2.ptype = 100";
								if ( isset( $data['cardnumberstart'] ) && $data['cardnumberstart'] != "" )
								{
												$R026f0167b4[] = " (t2.yktnumber > '".$data['cardnumberstart']."' or t2.yktnumber = '".$data['cardnumberstart']."' )";
								}
								if ( isset( $data['cardnumberend'] ) && $data['cardnumberend'] != "" )
								{
												$R026f0167b4[] = " (t2.yktnumber < '".$data['cardnumberend']."' or t2.yktnumber = '".$data['cardnumberend']."' )";
								}
								if ( isset( $data['pname'] ) )
								{
												$R7965cb3798 = urldecode( $data['pname'] );
												$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
												foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
												{
																$R026f0167b4[] = " t2.pname like '%".$R0f8134fb60."%' ";
												}
								}
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " t2.createdate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " t2.createdate < '".urldecode( $data['enddate'] )."'";
								}
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where t2.ptype < 99 and ".$R42f28414d6;
								}
								else
								{
												$R026f0167b4 .= " where t2.ptype < 99 ";
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."products t2 "."left join  ".$this->dbprefix."reward t1 on (t1.pid=t2.pid)"."%s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "", $R9a8375dd49 = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "intequal",
																"var" => array( "aid" )
												)
								);
								$Rb1f7f920fa = array(
												array(
																"op" => "like",
																"var" => array( "pname" )
												),
												array(
																"op" => "doublequal",
																"var" => array( "listprice" )
												),
												array(
																"op" => "intequal",
																"var" => array( "pid" )
												)
								);
								$R026f0167b4 = array( );
								if ( $R1de95f080d != "none" )
								{
												$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								}
								if ( $R9a8375dd49 != "" )
								{
												$R737e3dec04 = $this->BuildStr( $data, $Rb1f7f920fa, $R9a8375dd49 );
												$R026f0167b4 = array_merge( $R026f0167b4, $R737e3dec04 );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IReward_GetByStr( $R63bede6b19, $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."reward where ".$R63bede6b19;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IReward_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "reward" );
				}

				public function IReward_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "reward", "id in (".$R3584859062.")" );
				}

				public function IReward_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "reward", "id in (".$R3584859062.")" );
				}

				public function IReward_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "reward", $R63bede6b19 );
				}

				public function IReward_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "reward", "id in (".$R3584859062.")" );
				}

				public function IReward_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "reward", $R172196908b );
				}

}

?>
