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
class balance extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IBalance_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "balance", "*", " order by ordering" );
				}

				public function &IBalance_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "balance", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IBalance_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "balance", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "ordering,id" );
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
																"var" => array( "ordering" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IBalance_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "balance" );
				}

				public function IBalance_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "balance", "id = ".$R3584859062 );
				}

				public function IBalance_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "balance", "id = ".$R3584859062 );
				}

				public function IBalance_UpdateByStr( $Rcc10f697b1 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rcc10f697b1 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "balance", $R63bede6b19 );
				}

				public function IBalance_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "balance", "id in (".$R3584859062.")" );
				}

				public function IBalance_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "balance", $R172196908b );
				}

}

?>
