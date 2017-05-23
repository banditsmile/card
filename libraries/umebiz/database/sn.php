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
class sn extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ISN_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "sn", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "vsn", "vgo", "vref", "vname", "vreq" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								global $masterid;
								$R026f0167b4[] = " aid=".$masterid;
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function ISN_GetMax( )
				{
								$R130d64a4ad = "select max(vsn) as mvsn from ".$this->dbprefix."sn";
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R3db8f5c8bc[0]['mvsn'] ) )
								{
												return $R3db8f5c8bc[0]['mvsn'];
								}
								else
								{
												return 1;
								}
				}

				public function ISN_Create( $data )
				{
								if ( $data['vsn'] == "" )
								{
												$R6009ea84c3 = "1.1.1.1";
								}
								else
								{
												$R6009ea84c3 = $data['vsn'];
								}
								$this->reset( );
								$this->add( "vsn", $data['vsn'] );
								global $masterid;
								$this->add( "aid", $masterid );
								$R3db8f5c8bc = $this->SelectRecord( "sn" );
								if ( !isset( $R3db8f5c8bc[0]['vsn'] ) )
								{
												$this->reset( );
												$data['vdate'] = date( "Y-m-d H-i-s" );
												$data['vldate'] = date( "Y-m-d H-i-s" );
												$data['aid'] = $masterid;
												foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
												{
																$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
												}
												return $this->InsertRecord( "sn" );
								}
								else
								{
												$this->reset( );
												$this->add( "vdate", date( "Y-m-d H-i-s" ) );
												$this->add( "vldate", $R3db8f5c8bc[0]['vdate'] );
												return $this->UpdateRecord( "sn", "vsn='".$data['vsn']."'" );
								}
				}

				public function ISN_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								return $this->UpdateRecord( "sn", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function ISN_Del( $R3584859062 )
				{
								$this->reset( );
								global $masterid;
								return $this->DeleteRecord( "sn", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function ISN_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sn", $R63bede6b19 );
				}

				public function ISN_Destroy( $R3584859062 )
				{
								global $masterid;
								return $this->DeleteRecord( "sn", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function ISN_DestroyByStr( $R63bede6b19, $data )
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
								return $this->DeleteRecord( "sn", $R172196908b );
				}

}

?>
