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
class fav extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IFav_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "fav", "*", " order by id" );
				}

				public function &IFav_GetByData( $data, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "fav", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function &IFav_GetAllBy( $Rd71fe2585f = "id" )
				{
								$this->reset( );
								return $this->SelectRecord( "fav", "*", " order by ".$Rd71fe2585f );
				}

				public function &IFav_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "fav", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IFav_Page( $data = array( ), $Rb0d5d47f3d = "*", $R8be85a0bc2 = false )
				{
								$R130d64a4ad = "select t0.*,t1.aid as owner,t1.pname,t1.listprice,t1.price,t1.ptype,t1.forb2b,t1.sell,t1.hassup,t1.onsup,t1.namecolor,t1.isbold,t1.pricetpl,t1.canmakeprice,t1.inrecycle,t1.tosys,t1.checked,t1.stocks as mystocks from ".$this->dbprefix."fav t0 "."left join ".$this->dbprefix."products t1 on(t0.pid=t1.pid and t1.sell=1 and t1.forb2b=1 and t1.inrecycle=0) "."%s order by t0.pid desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 40;
								if ( $R8be85a0bc2 )
								{
												return $this->QuerySelect( $R130d64a4ad );
								}
								else
								{
												return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
								}
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "intequal",
																"var" => array( "pid", "aid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IFav_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "fav" );
				}

				public function IFav_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "fav", "id = ".$R3584859062 );
				}

				public function IFav_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "fav", "id = ".$R3584859062 );
				}

				public function IFav_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "fav", $R63bede6b19 );
				}

				public function IFav_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "fav", "id in (".$R3584859062.")" );
				}

				public function IFav_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "fav", $R172196908b );
				}

}

?>
