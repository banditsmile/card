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
class banks extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IBank_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "banks", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "AccountBranch", "AccountNO", "AccountName", "Address", "other" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								global $masterid;
								$R026f0167b4[] = " aid=".$masterid;
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IBank_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "banks", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IBank_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->SelectRecord( "banks", $Rb0d5d47f3d );
				}

				public function IBank_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->InsertRecord( "banks" );
				}

				public function IBank_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "banks", "id = ".$R3584859062 );
				}

				public function IBank_UpdateByStr( $Rd8f09d36cc = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8f09d36cc as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "banks", $R63bede6b19 );
				}

				public function IBank_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "banks", "id = ".$R3584859062 );
				}

				public function IBank_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "banks", "id in (".$R3584859062.")" );
				}

				public function IBank_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "banks", $R172196908b );
				}

}

?>
