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
class rewardtplname extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IRewardTplName_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "rewardtplname", "*" );
				}

				public function &IRewardTplName_GetByStr( $R63bede6b19 )
				{
								if ( $R63bede6b19 != "" )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."rewardtplname where ".$R63bede6b19;
								}
								else
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."rewardtplname ";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IRewardTplName_GetAllBy( $Rd71fe2585f = "pinyin" )
				{
								$this->reset( );
								return $this->SelectRecord( "rewardtplname", "*" );
				}

				public function &IRewardTplName_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "rewardtplname", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IRewardTplName_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "rewardtplname", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
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
																"var" => array( "aid", "rankid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IRewardTplName_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "rewardtplname", true );
				}

				public function IRewardTplName_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "rewardtplname", "id = ".$R3584859062 );
				}

				public function IRewardTplName_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "rewardtplname", "id = ".$R3584859062 );
				}

				public function IRewardTplName_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "rewardtplname", $R63bede6b19 );
				}

				public function IRewardTplName_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "rewardtplname", "id in (".$R3584859062.")" );
				}

				public function IRewardTplName_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "rewardtplname", $R172196908b );
				}

}

?>
