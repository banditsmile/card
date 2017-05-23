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
class ad extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IAd_Get( $R980c6a9bfd = 0, $R2a51483b14 = 0 )
				{
								$this->reset( );
								$this->add( "pos", $R980c6a9bfd );
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->SelectRecord( "ad" );
				}

				public function &IAd_GetByRange( $R2a3028e871 = 0, $R689663f962 = 2, $R574faef835 = 0 )
				{
								global $masterid;
								if ( $R574faef835 = -1 )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."ad where pos>".$R2a3028e871." and pos<".$R689663f962." and aid=".$masterid." order by pos,id";
								}
								else
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."ad where hidden=".$R574faef835." and pos>".$R2a3028e871." and pos<".$R689663f962." and aid=".$masterid."  order by pos,id";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IAd_GetById( $R3584859062 = 0 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "ad" );
								return $R679e9b9234[0];
				}

				public function &IAd_FriendPage( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "ad", $R71a6fd054f, 15, $this->GetPageLimit( $data ) );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['pos'] ) && $data['pos'] != "" )
								{
												$R026f0167b4[] = " pos in (".$data['pos'].")";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IAd_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ad", " id = ".$R3584859062 );
				}

				public function IAd_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->InsertRecord( "ad" );
				}

				public function IAd_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "ad", "id = ".$R3584859062 );
				}

}

?>
