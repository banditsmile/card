<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class logs extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ILog_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "logs", $R71a6fd054f, 15, $this->GetPageLimit( $data ), "*", true, "id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R7965cb3798 = $data['keywords'];
								$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
								foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = " content like '%".$R0f8134fb60."%'";
								}
								if ( $data['aid'] != "" )
								{
												$R026f0167b4[] = " aid = ".intval( $data['aid'] );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetOptype( $R36130a8639 )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R026f0167b4[] = " alv = ".intval( $R0f8134fb60 );
								}
								if ( 0 < count( $R026f0167b4 ) )
								{
												return sprintf( "( %s )", implode( " or ", $R026f0167b4 ) );
								}
								else
								{
												return "";
								}
				}

				public function &ILog_Get( $R94e0136c8a, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "staffid", $R94e0136c8a );
								$R679e9b9234 = $this->SelectRecord( "logs", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ILog_Update( $Rda64c1108b = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rda64c1108b as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "logs", "staffid = ".$R3584859062 );
				}

				public function ILog_Create( $Rda64c1108b = array( ) )
				{
								$this->reset( );
								foreach ( $Rda64c1108b as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "logs", true );
				}

				public function ILog_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "logs", "staffid = ".$R3584859062 );
				}

}

?>
