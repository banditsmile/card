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

				public $table = NULL;
				public $vardata = NULL;

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPage( $data = array( ), $Rb0d5d47f3d = "*", $Rbae26e5418 = false, $Re2bcf953af = "id" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( $this->table, $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, $Rbae26e5418, $Re2bcf953af );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R026f0167b4 = $this->BuildStr( $data, $this->vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IGet( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( $this->table, $Rb0d5d47f3d );
				}

				public function ICreate( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( $this->table );
				}

				public function IUpdate( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( $this->table, "id = ".$R3584859062 );
				}

				public function IUpdateByStr( $Rd8f09d36cc = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8f09d36cc as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( $this->table, $R63bede6b19 );
				}

				public function IDel( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( $this->table, "id = ".$R3584859062 );
				}

				public function IDestroy( $R3584859062 )
				{
								return $this->DeleteRecord( $this->table, "id in (".$R3584859062.")" );
				}

				public function IDestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( $this->table, $R172196908b );
				}

}

?>
