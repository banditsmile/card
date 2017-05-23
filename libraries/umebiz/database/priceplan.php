<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class priceplan extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IPricePlan_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "priceplan" );
				}

				public function IPricePlan_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceplan", "id in (".$R3584859062.")" );
				}

				public function IPricePlan_UpdateByArray( $data, $Rb7492a73f7 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceplan", $Rb7492a73f7 );
				}

				public function IPricePlan_IsExist( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->num_rows( "priceplan" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IPricePlan_LimitUpdate( $R00f8f0165d, $R42f28414d6 )
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

				public function IPricePlan_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceplan", "id = ".$R3584859062 );
				}

				public function IPricePlan_DelByStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceplan", $R63bede6b19 );
				}

				public function IPricePlan_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "priceplan", $Rb0d5d47f3d );
				}

}

?>
