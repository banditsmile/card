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
class gametpl extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IGameTpl_GetById( $R3584859062, $R9afaabccd6 = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "gametpl", $R9afaabccd6 );
								return $R679e9b9234[0];
				}

				public function &IGameTpl_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "gametpl", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ) );
				}

				public function &IGameTpl_GetAll( $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R679e9b9234 = $this->SelectRecord( "gametpl", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IGameTpl_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "gametpl" );
				}

				public function IGameTpl_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "gametpl", "id = ".$R3584859062 );
				}

				public function IGameTpl_UpdateByStr( $R69f05bd302 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R69f05bd302 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "gametpl", $R63bede6b19 );
				}

				public function IGameTpl_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "gametpl", "id = ".$R3584859062 );
				}

				public function IGameTpl_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "gametpl", "id in (".$R3584859062.")" );
				}

				public function IGameTpl_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "gametpl", $R172196908b );
				}

}

?>
