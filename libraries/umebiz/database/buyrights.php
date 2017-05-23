<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class buyrights extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IBuyRights_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "buyrights", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", true );
				}

				public function IBuyRights_Get( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R63bede6b19 = $this->GetPageLimit( $data, "" );
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = " where ".$R63bede6b19;
								}
								$R130d64a4ad = "select pids from ".$this->dbprefix."buyrights".$R63bede6b19;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['pids'] ) )
								{
												$R3359c04a1b = "-1".$R679e9b9234[0]['pids']."-1";
												$R130d64a4ad = "select pid,pname from ".$this->dbprefix."products where pid in (".$R3359c04a1b.")";
												$R026f0167b4 = $this->QuerySelect( $R130d64a4ad );
								}
								return $R026f0167b4;
				}

				public function IBuyRights_GetByStr( $R63bede6b19, $Rb0d5d47f3d = "*" )
				{
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = " where ".$R63bede6b19;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."buyrights ".$R63bede6b19;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "idx", "param", "pids" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "isok" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function IBuyRight_AgentCheck( $R8e8b5578f7, $R2a51483b14 )
				{
								$this->reset( );
								if ( 0 < $R2a51483b14 )
								{
												$this->add( "aid", $R2a51483b14 );
												$R679e9b9234 = $this->SelectRecord( "agents", "aid, alv" );
												if ( !isset( $R679e9b9234[0]['aid'] ) )
												{
																return -1;
												}
												$R0f8134fb60 = $R679e9b9234[0];
								}
								else
								{
												$R0f8134fb60 = array( "alv" => 1 );
								}
								$R043923fe11 = $R0f8134fb60['alv'];
								$R3359c04a1b = ",".$R8e8b5578f7.",";
								$R808b89ba0e = $this->CheckRight( 0, $R3359c04a1b, "aid", $R2a51483b14, -2, -3 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								$R808b89ba0e = $this->CheckRight( 0, $R3359c04a1b, "alv", $R043923fe11, -4, -5 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								$this->reset( );
								$this->add( "id", $R043923fe11 );
								$R679e9b9234 = $this->SelectRecord( "ranks", "gid" );
								if ( !isset( $R679e9b9234[0]['gid'] ) )
								{
												return -1;
								}
								$R351ac57007 = $R679e9b9234[0];
								$Re9231b441d = $R351ac57007['gid'];
								$R808b89ba0e = $this->CheckRight( 0, $R3359c04a1b, "gid", $Re9231b441d, -2, -3 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								return 0;
				}

				public function IBuyRight_Check( $R8e8b5578f7, $R8fa0c11785 )
				{
								$this->reset( );
								foreach ( $R8fa0c11785 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "cards" );
								if ( !isset( $R679e9b9234[0]['id'] ) )
								{
												return -1;
								}
								if ( $R679e9b9234[0]['inrecycle'] == 1 )
								{
												return -1;
								}
								$R0f8134fb60 = $R679e9b9234[0];
								$Re9231b441d = $R0f8134fb60['cardgroup'];
								$R3359c04a1b = ",".$R8e8b5578f7.",";
								$Re559dc39a1 = $R0f8134fb60['cardnumber'];
								$R72852f08e6 = $R0f8134fb60['money'];
								$Red2b3403a5 = $R0f8134fb60['price'];
								$R3584859062 = $R0f8134fb60['id'];
								if ( $R72852f08e6 == 0 )
								{
												return 0;
								}
								$R808b89ba0e = $this->CheckRight( $R72852f08e6, $R3359c04a1b, "yktgroup", $Re9231b441d, -2, -3 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								$R808b89ba0e = $this->CheckCode( $R72852f08e6, $R8e8b5578f7, $Re559dc39a1 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								$R808b89ba0e = $this->CheckRight( $R72852f08e6, $R3359c04a1b, "yktprice", $Red2b3403a5, -7, -8 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								$R808b89ba0e = $this->CheckRight( $R72852f08e6, $R3359c04a1b, "yktid", $R3584859062, -9, -10 );
								if ( $R808b89ba0e != 0 )
								{
												return $R808b89ba0e;
								}
								return $R72852f08e6;
				}

				public function CheckCode( $R72852f08e6, $R8e8b5578f7, $Re559dc39a1 )
				{
								$R130d64a4ad = "select yktcard from ".$this->dbprefix."products where pid=".$R8e8b5578f7;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['yktcard'] ) && trim( $R679e9b9234[0]['yktcard'] ) != "" )
								{
												$R980c6a9bfd = strpos( $Re559dc39a1, $R679e9b9234[0]['yktcard'] );
												if ( $R980c6a9bfd === false )
												{
																return -5;
												}
												else
												{
																return $R72852f08e6;
												}
								}
								$R130d64a4ad = "select * from ".$this->dbprefix."buyrights where param = 'yktcode' and isok=1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['pids'] ) )
								{
												foreach ( $R679e9b9234 as $R351ac57007 )
												{
																$R980c6a9bfd = strpos( $Re559dc39a1, $R351ac57007['idx'] );
																if ( $R980c6a9bfd === false )
																{
																}
																else
																{
																				$R980c6a9bfd = strpos( $R679e9b9234[0]['pids'], $R3359c04a1b );
																				if ( $R980c6a9bfd === false )
																				{
																								if ( $R679e9b9234[0]['pids'] != "," )
																								{
																												return -4;
																								}
																				}
																				else
																				{
																								return $R72852f08e6;
																				}
																}
												}
								}
								$R130d64a4ad = "select pids from ".$this->dbprefix."buyrights where param = 'yktcode' and isok=-1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['pids'] ) )
								{
												foreach ( $R679e9b9234 as $R351ac57007 )
												{
																$R980c6a9bfd = strpos( $Re559dc39a1, $R351ac57007['idx'] );
																if ( $R980c6a9bfd === false )
																{
																}
																else
																{
																				$R980c6a9bfd = strpos( $R679e9b9234[0]['pids'], $R3359c04a1b );
																				if ( $R980c6a9bfd === false )
																				{
																				}
																				else
																				{
																								return -6;
																				}
																}
												}
								}
								return 0;
				}

				public function CheckRight( $R72852f08e6, $R3359c04a1b, $param, $R5b92e56774, $R3c5ddc3a99 = -2, $Rfc45732ae8 = -3 )
				{
								$R130d64a4ad = "select pids from ".$this->dbprefix."buyrights where param = '".$param."' and idx='".$R5b92e56774."' and isok=1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['pids'] ) )
								{
												$R980c6a9bfd = strpos( $R679e9b9234[0]['pids'], $R3359c04a1b );
												if ( $R980c6a9bfd === false )
												{
																if ( $R679e9b9234[0]['pids'] != "," )
																{
																				return $R3c5ddc3a99;
																}
												}
												else
												{
																return $R72852f08e6;
												}
								}
								$R130d64a4ad = "select id from ".$this->dbprefix."buyrights where pids like '%".$R3359c04a1b."%' and param = '".$param."' and idx='".$R5b92e56774."' and isok=-1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												return $Rfc45732ae8;
								}
								return 0;
				}

				public function IBuyRights_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "buyrights" );
				}

				public function IBuyRights_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "buyrights", "id = ".$R3584859062 );
				}

				public function IBuyRights_UpdateByStr( $data, $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "buyrights", $R63bede6b19 );
				}

				public function IBuyRights_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "buyrights", "id = ".$R3584859062 );
				}

				public function IBuyRights_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "buyrights", "id in (".$R3584859062.")" );
				}

				public function IBuyRights_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "buyrights", $R172196908b );
				}

}

?>
