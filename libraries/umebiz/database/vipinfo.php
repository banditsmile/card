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
class vipinfo extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IVipInfo_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "vipinfo", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "vip", "vgo", "vref", "vname", "vreq" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								global $masterid;
								$R026f0167b4[] = " aid=".$masterid;
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IVipInfo_Create( $data )
				{
								if ( $data['vip'] == "" )
								{
												$R6009ea84c3 = "1.1.1.1";
								}
								else
								{
												$R6009ea84c3 = $data['vip'];
								}
								$this->reset( );
								$this->add( "vip", $data['vip'] );
								global $masterid;
								$this->add( "aid", $masterid );
								$R3db8f5c8bc = $this->SelectRecord( "vipinfo" );
								if ( !isset( $R3db8f5c8bc[0]['vip'] ) )
								{
												$this->reset( );
												$data['vdate'] = date( "Y-m-d H-i-s" );
												$data['vldate'] = date( "Y-m-d H-i-s" );
												$data['aid'] = $masterid;
												foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
												{
																$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
												}
												return $this->InsertRecord( "vipinfo" );
								}
								else
								{
												$this->reset( );
												$this->add( "vdate", date( "Y-m-d H-i-s" ) );
												$this->add( "vldate", $R3db8f5c8bc[0]['vdate'] );
												return $this->UpdateRecord( "vipinfo", "vip='".$data['vip']."'" );
								}
				}

				public function IVipInfo_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								return $this->UpdateRecord( "vipinfo", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function IVipInfo_Del( $R3584859062 )
				{
								$this->reset( );
								global $masterid;
								return $this->DeleteRecord( "vipinfo", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function IVipInfo_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "vipinfo", $R63bede6b19 );
				}

				public function IVipInfo_Destroy( $R3584859062 )
				{
								global $masterid;
								return $this->DeleteRecord( "vipinfo", "id in (".$R3584859062.") and aid=".$masterid );
				}

				public function IVipInfo_DestroyByStr( $R63bede6b19, $data )
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
								return $this->DeleteRecord( "vipinfo", $R172196908b );
				}

}

?>
