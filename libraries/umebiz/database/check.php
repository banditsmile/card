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
class check extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICheck_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "check", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function &ICheck_GetData( $data = array( ), $Rb0d5d47f3d = "sum(ar) as ar, sum(ap) as ap" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."check %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0];
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "staffname", "otherstaff", "remarks" )
												),
												array(
																"op" => "doubleequal",
																"var" => array( "ar", "ap" )
												),
												array(
																"op" => "intequal",
																"var" => array( "staffid", "otherid", "aid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R31f1c1341b = $this->GetDateLimit( $data );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."createdate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."createdate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function ICheck_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "check" );
				}

				public function ICheck_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "check", "id = ".$R3584859062 );
				}

				public function ICheck_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "check", "id = ".$R3584859062 );
				}

				public function ICheck_DelStr( $R63bede6b19 )
				{
								$this->reset( );
								return $this->DeleteRecord( "check", $R63bede6b19 );
				}

				public function ICheck_UpdateByStr( $R37c014dae5 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R37c014dae5 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "check", $R63bede6b19 );
				}

				public function ICheck_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "check", "id in (".$R3584859062.")" );
				}

				public function ICheck_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "check", $R172196908b );
				}

}

?>
