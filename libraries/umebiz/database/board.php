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
class board extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IBoard_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "boards", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name" )
												),
												array(
																"op" => "intequal",
																"var" => array( "inrecycle" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IBoard_GetAll( )
				{
								$this->reset( );
								$this->add( "inrecycle", 0 );
								global $masterid;
								if ( 0 < $masterid )
								{
												$this->add( "tovip", 1 );
								}
								$R3db8f5c8bc = $this->SelectRecord( "boards" );
								return $R3db8f5c8bc;
				}

				public function &IBoard_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "boards" );
								return $R3db8f5c8bc[0];
				}

				public function &IBoard_GetByName( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R3db8f5c8bc = $this->SelectRecord( "boards" );
								return $R3db8f5c8bc[0];
				}

				public function IBoard_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "boards" );
				}

				public function IBoard_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "boards", "id = ".$R3584859062 );
				}

				public function IBoard_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "boards", "id in (".$R3584859062.")" );
				}

				public function IBoard_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "boards", $R172196908b );
				}

				public function IBoard_UpdateByStr( $Rae4478fd33 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rae4478fd33 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "boards", $R63bede6b19 );
				}

				public function IBoard_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "boards", "id in (".$R3584859062.")" );
				}

				public function IBoard_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "boards", $R172196908b );
				}

}

?>
