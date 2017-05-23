<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class suggest extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ISuggest_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "suggest", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "tags", "words" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ISuggest_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "suggest", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ISuggest_GetBySn( $R1638fe16d3, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "sn", $R1638fe16d3 );
								$R679e9b9234 = $this->SelectRecord( "suggest", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ISuggest_Num( )
				{
								$R130d64a4ad = "select id from ".$this->dbprefix."suggest order by id desc limit 0,1";
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								return isset( $R3db8f5c8bc[0]['id'] ) ? $R3db8f5c8bc[0]['id'] : 0;
				}

				public function &ISuggest_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "suggest", $Rb0d5d47f3d );
				}

				public function &ISuggest_GetByArr( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select %s from ".$this->dbprefix."suggest %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "" );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $Rb0d5d47f3d, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function ISuggest_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "suggest" );
				}

				public function ISuggest_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "suggest", "id = ".$R3584859062 );
				}

				public function ISuggest_UpdateByStr( $Rd8f09d36cc = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8f09d36cc as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "suggest", $R63bede6b19 );
				}

				public function ISuggest_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "suggest", "id = ".$R3584859062 );
				}

				public function ISuggest_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "suggest", "id in (".$R3584859062.")" );
				}

				public function ISuggest_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "suggest", $R172196908b );
				}

}

?>
