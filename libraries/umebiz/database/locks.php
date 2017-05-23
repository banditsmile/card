<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class locks extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ILock_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "locks", $R71a6fd054f, 15, $this->GetPageLimit( $data ), "*", true );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R7965cb3798 = $data['keywords'];
								$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
								foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = " reason like '%".$R0f8134fb60."%'";
								}
								if ( $data['thisaction'] != "" )
								{
												$R026f0167b4[] = " thisaction = ".intval( $data['thisaction'] );
								}
								if ( $data['aid'] != "" )
								{
												$R026f0167b4[] = " aid = ".$data['aid'];
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ILock_Get( $Rdcd9105806, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "locks", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ILock_Update( $R05ca77fff2 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R05ca77fff2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "locks", "id = ".$R3584859062 );
				}

				public function ILock_Create( $R05ca77fff2 = array( ) )
				{
								$this->reset( );
								foreach ( $R05ca77fff2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "locks" );
				}

				public function ILock_Del( $R755ba04a49 )
				{
								return $this->DeleteRecord( "locks", "id = ".$R755ba04a49 );
				}

}

?>
