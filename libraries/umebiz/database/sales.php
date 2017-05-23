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
class sales extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ISales_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "sales", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name" )
												),
												array(
																"op" => "intequal",
																"var" => array( "aid", "id", "underlingid" )
												),
												array(
																"op" => "doubleequal",
																"var" => array( "sellscale" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ISales_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "sales", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ISales_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "sales", $Rb0d5d47f3d );
				}

				public function ISales_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "sales" );
				}

				public function ISales_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sales", "id = ".$R3584859062 );
				}

				public function ISales_UpdateByStr( $R8f0b1fb900 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R8f0b1fb900 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sales", $R63bede6b19 );
				}

				public function ISales_IsExist( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R679e9b9234 = $this->num_rows( "sales" );
								if ( $R679e9b9234 == 0 )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function ISales_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "sales", "id = ".$R3584859062 );
				}

				public function ISales_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "sales", "id in (".$R3584859062.")" );
				}

				public function ISales_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "sales", $R172196908b );
				}

}

?>
