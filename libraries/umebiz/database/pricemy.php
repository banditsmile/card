<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class pricemy extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IPriceMy_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "pricemy" );
				}

				public function IPriceMy_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "pricemy", "id in (".$R3584859062.")" );
				}

				public function IPriceMy_UpdateByArray( $data, $Rb7492a73f7 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "pricemy", $Rb7492a73f7 );
				}

				public function IPriceMy_IsExist( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->num_rows( "pricemy" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "intequal",
																"var" => array( "pid", "aid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IPriceMy_LimitUpdate( $R00f8f0165d, $R42f28414d6 )
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

				public function IPriceMy_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "pricemy", "id = ".$R3584859062 );
				}

				public function IPriceMy_DelByStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "pricemy", $R63bede6b19 );
				}

				public function IPriceMy_DeleteByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "pricemy", $R172196908b );
				}

				public function IPriceMy_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "pricemy", $Rb0d5d47f3d );
				}

				public function IPriceMy_GetByLimit( $R42f28414d6 = "", $Rb0d5d47f3d = "*" )
				{
								if ( $R42f28414d6 != "" )
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."pricemy where ".$R42f28414d6;
								}
								else
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."pricemy";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

}

?>
