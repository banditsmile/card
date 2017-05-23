<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class priceagent extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IPriceAgent_Create( $data = array( ), $R8926a8b7b8 = false )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "priceagent", $R8926a8b7b8 );
				}

				public function IPriceAgent_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceagent", "id in (".$R3584859062.")" );
				}

				public function IPriceAgent_UpdateByArray( $data, $Rb7492a73f7 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceagent", $Rb7492a73f7 );
				}

				public function IPriceAgent_LimitUpdate( $R00f8f0165d, $R42f28414d6 )
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

				public function IPriceAgent_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceagent", "id = ".$R3584859062 );
				}

				public function IPriceAgent_DelByStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceagent", $R63bede6b19 );
				}

				public function IPriceAgent_IsExist( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->num_rows( "priceagent" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IPriceAgent_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "priceagent", $Rb0d5d47f3d );
				}

				public function IPriceAgent_GetByLimit( $R42f28414d6 = "", $Rb0d5d47f3d = "*" )
				{
								if ( $R42f28414d6 != "" )
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."priceagent where ".$R42f28414d6;
								}
								else
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."priceagent";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

}

?>
