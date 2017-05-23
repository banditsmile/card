<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class sysinfo extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IWebInfo_Get( $Rb0d5d47f3d = "*" )
				{
								$R679e9b9234 = $this->SelectRecord( "sysinfo", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IWebInfo_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."sysinfo where aid > 0 ";
								$R71a6fd054f = intval( $data['page'] ) == 0 ? 15 : $data['page'];
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function IWebInfo_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "sysinfo" );
				}

				public function IWebInfo_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysinfo", "id = ".$R3584859062 );
				}

				public function IWebInfo_UpdateByStr( $Rb45d972ba1 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rb45d972ba1 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysinfo", $R63bede6b19 );
				}

				public function IWebInfo_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "sysinfo", "id = ".$R3584859062 );
				}

				public function IWebInfo_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "sysinfo", "id in (".$R3584859062.")" );
				}

				public function IWebInfo_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = "";
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "sysinfo", $R172196908b );
				}

}

?>
