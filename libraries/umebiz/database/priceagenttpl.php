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
class priceagenttpl extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPriceAgentTpl_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "priceagenttpl", "*" );
				}

				public function &IPriceAgentTpl_GetByStr( $R63bede6b19 )
				{
								if ( $R63bede6b19 != "" )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."priceagenttpl where ".$R63bede6b19;
								}
								else
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."priceagenttpl ";
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IPriceAgentTpl_GetAllBy( $Rd71fe2585f = "pinyin" )
				{
								$this->reset( );
								return $this->SelectRecord( "priceagenttpl", "*" );
				}

				public function &IPriceAgentTpl_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "priceagenttpl", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IPriceAgentTpl_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "priceagenttpl", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d );
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

				public function IPriceAgentTpl_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "priceagenttpl", true );
				}

				public function IPriceAgentTpl_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceagenttpl", "id = ".$R3584859062 );
				}

				public function IPriceAgentTpl_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceagenttpl", "id = ".$R3584859062 );
				}

				public function IPriceAgentTpl_DelByStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "priceagenttpl", $R63bede6b19 );
				}

				public function IPriceAgentTpl_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "priceagenttpl", $R63bede6b19 );
				}

				public function IPriceAgentTpl_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "priceagenttpl", "id in (".$R3584859062.")" );
				}

				public function IPriceAgentTpl_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "priceagenttpl", $R172196908b );
				}

}

?>
