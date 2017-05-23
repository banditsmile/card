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
class poll extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPoll_GetByParentId( $Rac9b8532b8, $R9afaabccd6 = "*" )
				{
								$this->reset( );
								$this->add( "parentid", $Rac9b8532b8 );
								$R679e9b9234 = $this->SelectRecord( "polls", $R9afaabccd6 );
								return $R679e9b9234;
				}

				public function &IPoll_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "polls", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IPoll_Get( $data, $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."polls %s order by ordering,id";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "" );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IPoll_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "polls", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "ordering,id,hits" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "title" )
												),
												array(
																"op" => "intequal",
																"var" => array( "pubulished", "parentid", "forb2c", "forb2b", "forykt" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IPoll_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "polls" );
				}

				public function IPoll_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "polls", "id = ".$R3584859062 );
				}

				public function IPoll_UpdateVote( $R3456919727 )
				{
								$R130d64a4ad = "update ".$this->dbprefix."polls set hits=hits+1 where id in (".$R3456919727.")";
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function IPoll_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "polls", "id = ".$R3584859062 );
				}

				public function IPoll_DelByParentid( $Rac9b8532b8 )
				{
								$this->reset( );
								return $this->DeleteRecord( "polls", "parentid = ".$Rac9b8532b8 );
				}

				public function IPoll_UpdateByStr( $Rb5f0e86a24 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rb5f0e86a24 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "polls", $R63bede6b19 );
				}

				public function IPoll_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "polls", "id in (".$R3584859062.")" );
				}

				public function IPoll_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "polls", $R172196908b );
				}

}

?>
