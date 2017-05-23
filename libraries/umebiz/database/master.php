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
class master extends mysql
{
/*
				public function __construct( )
				{
								
				}
*/
				public function &IMaster_Get( )
				{
								$this->reset( );
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->SelectRecord( "admin" );
				}

				public function &IMaster_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								global $masterid;
								return $this->PageRecord( "admin", $R71a6fd054f, $R42c553e7de, " aid=".$masterid, $Rb0d5d47f3d );
				}

				public function IMaster_IsExist( $name )
				{
								$this->reset( );
								$this->add( "adminName", $name );
								$R679e9b9234 = $this->num_rows( "admin" );
								if ( $R679e9b9234 == 0 )
								{
												return 0;
								}
								else
								{
												return 1;
								}
				}

				public function &IMaster_GetByName( $name )
				{
								$this->reset( );
								$this->add( "adminName", $name );
								global $masterid;
								$this->add( "aid", $masterid );
								$R679e9b9234 = $this->SelectRecord( "admin" );
								return $R679e9b9234[0];
				}

				public function &IMaster_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								global $masterid;
								$this->add( "aid", $masterid );
								$R679e9b9234 = $this->SelectRecord( "admin" );
								return $R679e9b9234[0];
				}

				public function IMaster_Update( $admin = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $admin as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								if ( 0 < $masterid )
								{
												return $this->UpdateRecord( "admin", "aid= ".$masterid." and id = ".$R3584859062 );
								}
								else
								{
												return $this->UpdateRecord( "admin", "id = ".$R3584859062 );
								}
				}

				public function IMaster_UpdateByName( $admin = array( ), $name )
				{
								$this->reset( );
								foreach ( $admin as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								global $masterid;
								if ( 0 < $masterid )
								{
												return $this->UpdateRecord( "admin", "adminName = '".$name."' and aid=".$masterid );
								}
								else
								{
												return $this->UpdateRecord( "admin", "adminName = '".$name."'" );
								}
				}

				public function IMaster_Create( $admin = array( ) )
				{
								$this->reset( );
								foreach ( $admin as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "admin" );
				}

				public function IMaster_Delete( $R3584859062 )
				{
								global $masterid;
								if ( 0 < $masterid )
								{
												return $this->DeleteRecord( "admin", "id = ".$R3584859062." and aid=".$masterid );
								}
								else
								{
												return $this->DeleteRecord( "admin", "id = ".$R3584859062 );
								}
				}

				public function IMaster_VipDelete( $R3456919727 )
				{
								return $this->DeleteRecord( "admin", "aid in (".$R3456919727.")" );
				}

				public function IMaster_Login( $data = array( ), $Re9e4225a22 = array( ) )
				{
								$this->reset( );
								$this->add( "adminName", $data['adminName'] );
								$this->add( "aid", isset( $data['aid'] ) ? $data['aid'] : 0 );
								$R3db8f5c8bc = $this->SelectRecord( "admin" );
								if ( count( $R3db8f5c8bc ) == 0 )
								{
												return 1;
								}
								else
								{
												$R0f8134fb60 = $R3db8f5c8bc[0];
												if ( $R0f8134fb60['adminPass'] != $data['adminPass'] )
												{
																return -1;
												}
												if ( $R0f8134fb60['ipcheck'] == "1" && strpos( ",".$R0f8134fb60['ip'], ",".$Re9e4225a22['ip']."," ) === false )
												{
																return 2;
												}
												if ( $R0f8134fb60['maccheck'] == "1" && strpos( ",".$R0f8134fb60['mac'], ",".$Re9e4225a22['mac']."," ) === false )
												{
																return 3;
												}
												if ( $R0f8134fb60['hdecheck'] == "1" && strpos( ",".$R0f8134fb60['hde'], ",".$Re9e4225a22['hde']."," ) === false )
												{
																return 4;
												}
												if ( $R0f8134fb60['cpucheck'] == "1" && strpos( ",".$R0f8134fb60['cpu'], ",".$Re9e4225a22['cpu']."," ) === false )
												{
																return 5;
												}
												return 0;
								}
				}

}

?>
