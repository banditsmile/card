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
class vinfo extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IVinfo_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$t1 = returntime( );
								global $masterid;
								$R130d64a4ad = "select t1.*, 0 as vcount,0 as vsncount  from ".$this->dbprefix."vinfo t1 "."%s order by t1.id desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t1." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."vinfo t1 "."%s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								$R71a664ef8c = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R71a664ef8c['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R0f8134fb60 = $R71a664ef8c['item'][$Ra16d228039];
												$R71a664ef8c['item'][$Ra16d228039]['vcount'] = 0;
												$R71a664ef8c['item'][$Ra16d228039]['vsncount'] = 0;
												$R130d64a4ad = "select count(0) as count from  ".$this->dbprefix."vinfo where vip='".$R0f8134fb60['vip']."' and aid=".$masterid;
												$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
												$R71a664ef8c['item'][$Ra16d228039]['vcount'] = $R3db8f5c8bc[0]['count'];
												$R130d64a4ad = "select count(0) as count from  ".$this->dbprefix."vinfo where vsn = '".$R0f8134fb60['vsn']."' and aid=".$masterid;
												$R494af0fa28 = $this->QuerySelect( $R130d64a4ad );
												$R71a664ef8c['item'][$Ra16d228039]['vsncount'] = $R3db8f5c8bc[0]['count'];
								}
								$Re33ba329c4 = returntime( );
								return $R71a664ef8c;
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "vip", "vgo", "vref", "vname", "vreq", "vsn" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								global $masterid;
								$R026f0167b4[] = " aid=".$masterid;
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."vdate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."vdate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function &IVinfo_GetData( $data )
				{
								global $masterid;
								$R130d64a4ad = "select count(0) as vcount from ".$this->dbprefix."vipinfo where aid=".$masterid;
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$R915183dc35 = $R3db8f5c8bc[0]['vcount'];
								$R130d64a4ad = "select count(0) as vcount from ".$this->dbprefix."vipinfo where vdate>'".date( "Y-m-d" )."' and aid=".$masterid;
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$R9d21f5525a = $R3db8f5c8bc[0]['vcount'];
								$R130d64a4ad = "select count(0) as vcount from ".$this->dbprefix."sn where aid=".$masterid;
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$R30bef76ce8 = $R3db8f5c8bc[0]['vcount'];
								$R130d64a4ad = "select count(0) as vcount from ".$this->dbprefix."sn where vdate>'".date( "Y-m-d" )."' and aid=".$masterid;
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$R01706ed6a1 = $R3db8f5c8bc[0]['vcount'];
								$R026f0167b4 = array(
												"totleip" => $R915183dc35,
												"dayip" => $R9d21f5525a,
												"totlevsn" => $R30bef76ce8,
												"dayvsn" => $R01706ed6a1
								);
								return $R026f0167b4;
				}

				public function IVinfo_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->InsertRecord( "vinfo" );
				}

				public function IVinfo_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "vinfo", "id in (".$R3584859062.")" );
				}

				public function IVinfo_Del( $R3584859062 )
				{
								global $masterid;
								$this->reset( );
								return $this->DeleteRecord( "vinfo", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function IVinfo_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "vinfo", $R63bede6b19 );
				}

				public function IVinfo_Destroy( $R3584859062 )
				{
								global $masterid;
								return $this->DeleteRecord( "vinfo", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function IVinfo_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								global $masterid;
								if ( $R172196908b != "" )
								{
												$R172196908b = $R172196908b." and aid=".$masterid;
								}
								return $this->DeleteRecord( "vinfo", $R172196908b );
				}

}

?>
