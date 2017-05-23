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
class pcipid extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPciPid_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "pcipid", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "intequal",
																"var" => array( "aid", "pid" )
												),
												array(
																"op" => "charequal",
																"var" => array( "thirdpid", "thirdplat" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IPciPid_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "pcipid", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IPciPid_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "pcipid", $Rb0d5d47f3d );
				}

				public function IPciPid_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "pcipid" );
				}

				public function IPciPid_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "pcipid", "id = ".$R3584859062 );
				}

				public function IPciPid_UpdateByStr( $R4d1ce3e7d0 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R4d1ce3e7d0 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "pcipid", $R63bede6b19 );
				}

				public function IPciPid_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "pcipid", "id = ".$R3584859062 );
				}

				public function IPciPid_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "pcipid", "id in (".$R3584859062.")" );
				}

				public function IPciPid_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "pcipid", $R172196908b );
				}

}

?>
