<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ykttrans extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IYktTrans_Get( $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "ykttrans", $Rb0d5d47f3d );
				}

				public function &IYktTrans_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "ykttrans", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "infeature", "outfeature" )
												),
												array(
																"op" => "doubleequal",
																"var" => array( "inprice", "outprice" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['permit'] ) && $data['permit'] != -1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."permit = ".intval( $data['permit'] );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IYktTrans_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ykttrans" );
				}

				public function IYktTrans_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ykttrans", "id = ".$R3584859062 );
				}

				public function IYktTrans_UpdateByStr( $Rcc06b0764e = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rcc06b0764e as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ykttrans", $R63bede6b19 );
				}

				public function IYktTrans_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "ykttrans", "id = ".$R3584859062 );
				}

				public function IYktTrans_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "ykttrans", "id in (".$R3584859062.")" );
				}

				public function IYktTrans_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "ykttrans", $R172196908b );
				}

}

?>
