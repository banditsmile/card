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
class rewardtpl extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IRewardTpl_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select t1.*,t2.pname,t2.listprice,t2.price from ".$this->dbprefix."rewardtpl t1 "."left join  ".$this->dbprefix."products t2 on (t1.pid=t2.pid)"."%s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t1.", "t2." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."rewardtpl t1 "."left join  ".$this->dbprefix."products t2 on (t1.pid=t2.pid)"."%s order by t1.id desc";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function &IRewardTpl_ProductPage( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R29a6818ba2 = intval( $data['rewardtpl'] );
								$R130d64a4ad = "select t1.id,t1.reward,t1.rewardtpl,t2.pname,t2.listprice,t2.price,t2.ptype,t2.pid from ".$this->dbprefix."products t2 "."left join  ".$this->dbprefix."rewardtpl t1 on (t1.pid=t2.pid and t1.rewardtpl=".$R29a6818ba2.")"."%s order by t2.pid desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "none", "t2." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where t2.ptype < 99 and t2.inrecycle=0 and ".$R42f28414d6;
								}
								else
								{
												$R026f0167b4 .= " where t2.ptype < 99 and t2.inrecycle=0 ";
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."products t2 "."%s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								return $R71a664ef8c;
				}

				public function DetailList( $data )
				{
								$R29a6818ba2 = intval( $data['rewardtpl'] );
								$R130d64a4ad = "select t1.id,t1.rewardtpl,t1.rewardtpl,t2.pname,t2.listprice,t2.price,t2.ptype,t2.pid from ".$this->dbprefix."trades t2 "."left join  ".$this->dbprefix."rewardtpl t1 on (t1.pid=t2.pid and t1.rewardtpl=".$R29a6818ba2.")"."%s order by t2.pid desc";
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
																$R026f0167b4[] = " t2pname like '%".$R0f8134fb60."%' ";
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
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."products t2 "."left join  ".$this->dbprefix."rewardtpl t1 on (t1.pid=t2.pid)"."%s";
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
																"var" => array( "rewardtpl" )
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
																"var" => array( "pid", "forykt" )
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
												$R026f0167b4 += $R737e3dec04;
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IRewardTpl_GetByStr( $R63bede6b19, $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."rewardtpl where ".$R63bede6b19;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IRewardTpl_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "rewardtpl" );
				}

				public function IRewardTpl_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "rewardtpl", "id in (".$R3584859062.")" );
				}

				public function IRewardTpl_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "rewardtpl", "id in (".$R3584859062.")" );
				}

				public function IRewardTpl_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "rewardtpl", $R63bede6b19 );
				}

				public function IRewardTpl_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "rewardtpl", "id in (".$R3584859062.")" );
				}

				public function IRewardTpl_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "rewardtpl", $R172196908b );
				}

}

?>
