<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ykt extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IYkt_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "ykt", $R71a6fd054f, 15, $this->GetPageLimit( $data ) );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R7965cb3798 = $data['keywords'];
								$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
								foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = " cardnumber like '%".$R0f8134fb60."%'";
								}
								if ( $data['cardok'] != "" )
								{
												$R026f0167b4[] = " cardok = ".intval( $data['cardok'] );
								}
								if ( isset( $data['ykt'] ) )
								{
												if ( $data['ykt'] == 0 )
												{
																$R026f0167b4[] = " ptype > 99 ";
												}
												else
												{
																$R026f0167b4[] = " ptype = ".intval( $data['ptype'] );
												}
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IYkt_Get( )
				{
								$this->reset( );
								return $this->SelectRecord( "ykt" );
				}

				public function IYkt_Create( $R915d6ca5a5 = array( ) )
				{
								$this->reset( );
								foreach ( $R915d6ca5a5 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ykt" );
				}

				public function IYkt_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "ykt", "id = ".$R3584859062 );
				}

}

?>
