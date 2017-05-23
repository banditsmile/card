<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class mibaoka extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IMiBaoKa_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select t0.sn,t0.id,t0.createdate,t1.aid,t1.staffid,t1.mibaokacheck,t2.mibaokacheck as adminmibaokacheck from ".$this->dbprefix."mibaoka t0 "."left join ".$this->dbprefix."security t1 on(t1.mibaoka=t0.sn) "."left join ".$this->dbprefix."admin t2 on(t2.mibaoka=t0.sn) "."%s";
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
																"op" => "charequal",
																"var" => array( "xy", "sn" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IMiBaoKa_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "mibaoka", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IMiBaoKa_GetBySn( $R1638fe16d3, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "sn", $R1638fe16d3 );
								$R679e9b9234 = $this->SelectRecord( "mibaoka", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function IMiBaoKa_Num( )
				{
								$R130d64a4ad = "select id from ".$this->dbprefix."mibaoka order by id desc limit 0,1";
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								return isset( $R3db8f5c8bc[0]['id'] ) ? $R3db8f5c8bc[0]['id'] : 0;
				}

				public function &IMiBaoKa_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "mibaoka", $Rb0d5d47f3d );
				}

				public function IMiBaoKa_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "mibaoka" );
				}

				public function IMiBaoKa_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "mibaoka", "id = ".$R3584859062 );
				}

				public function IMiBaoKa_UpdateByStr( $Rd8f09d36cc = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8f09d36cc as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "mibaoka", $R63bede6b19 );
				}

				public function IMiBaoKa_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "mibaoka", "id = ".$R3584859062 );
				}

				public function IMiBaoKa_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "mibaoka", "id in (".$R3584859062.")" );
				}

				public function IMiBaoKa_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "mibaoka", $R172196908b );
				}

}

?>
