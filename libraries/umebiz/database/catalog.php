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
class catalog extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICatalog_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "catalog", "*", " order by ordering" );
				}

				public function &ICatalog_GetAllBy( $Rd71fe2585f = "pinyin" )
				{
								$this->reset( );
								return $this->SelectRecord( "catalog", "*", " order by ".$Rd71fe2585f );
				}

				public function &ICatalog_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "catalog", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ICatalog_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "catalog", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "hot desc,pinyin,ordering,id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name", "keyword", "pinyin" )
												),
												array(
																"op" => "intequal",
																"var" => array( "ordering", "hot" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function ICatalog_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "catalog" );
				}

				public function ICatalog_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "catalog", "id = ".$R3584859062 );
				}

				public function ICatalog_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "catalog", "id = ".$R3584859062 );
				}

				public function ICatalog_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "catalog", $R63bede6b19 );
				}

				public function ICatalog_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "catalog", "id in (".$R3584859062.")" );
				}

				public function ICatalog_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "catalog", $R172196908b );
				}

}

?>
