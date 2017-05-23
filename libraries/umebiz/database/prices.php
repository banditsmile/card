<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class prices extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IPrice_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "prices" );
				}

				public function IPrice_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "prices", "id in (".$R3584859062.")" );
				}

				public function IPrice_UpdateByAidAndPid( $data, $R2a51483b14, $R8e8b5578f7 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "prices", "aid = ".$R2a51483b14." and pid = ".$R8e8b5578f7 );
				}

				public function IPrice_LimitUpdate( $R00f8f0165d, $R42f28414d6 )
				{
								if ( $R00f8f0165d == "" )
								{
												return false;
								}
								if ( $R42f28414d6 != "" )
								{
												$R130d64a4ad = "update ".$this->dbprefix."prices set ".$R00f8f0165d." where ".$R42f28414d6;
								}
								else
								{
												$R130d64a4ad = "update ".$this->dbprefix."prices set ".$R00f8f0165d;
								}
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function IPrice_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "prices", "id = ".$R3584859062 );
				}

				public function IPrice_DelByStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "prices", $R63bede6b19 );
				}

				public function IPrice_IsExist( $R8e8b5578f7, $R2a51483b14 )
				{
								$this->reset( );
								$this->add( "pid", $R8e8b5578f7 );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->num_rows( "prices" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IPrice_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "prices", $Rb0d5d47f3d );
				}

				public function IPrice_GetByLimit( $R42f28414d6 = "", $Rb0d5d47f3d = "*" )
				{
								if ( $R42f28414d6 != "" )
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."prices where ".$R42f28414d6;
								}
								else
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."prices";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

}

?>
