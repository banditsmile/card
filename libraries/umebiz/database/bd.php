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
class bd extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IBD_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "bd", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id,ordstate" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "czaccount", "remark", "cztype", "admremark", "admname" )
												),
												array(
																"op" => "intequal",
																"var" => array( "admaid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['ordstate'] ) && $data['ordstate'] != 0 )
								{
												$R026f0167b4[] = " ordstate = ".$data['ordstate'];
								}
								if ( isset( $data['by'] ) && $data['by'] == 1 )
								{
								}
								else
								{
												$R31f1c1341b = $this->GetDateLimit( $data );
												if ( $R31f1c1341b != "" )
												{
																$R026f0167b4[] = $R31f1c1341b;
												}
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

				public function &IBD_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "bd", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IBD_GetByStr( $Rb7492a73f7 = array( ), $R4454e360ff = "*", $Rb81dfc1e44 = "id desc" )
				{
								$R130d64a4ad = "select ".$R4454e360ff."  from ".$this->dbprefix."bd where ".$Rb7492a73f7." order by ".$Rb81dfc1e44;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IBD_Get( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "bd", $Rb0d5d47f3d );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								else
								{
												return $R679e9b9234[0];
								}
				}

				public function IBD_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "bd" );
				}

				public function IBD_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "bd", "id = ".$R3584859062 );
				}

				public function IBD_UpdateByStr( $Rd8f09d36cc = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8f09d36cc as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "bd", $R63bede6b19 );
				}

				public function IBD_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "bd", "id = ".$R3584859062 );
				}

				public function IBD_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "bd", "id in (".$R3584859062.")" );
				}

				public function IBD_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "bd", $R172196908b );
				}

}

?>
