<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class scoredorder extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IScoredOrder_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "scoredorder", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "ordno", "pname", "tel", "addr", "zip", "realname" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "staffid", "pid", "aid", "ordstate" ),
																"null" => 0
												),
												array(
																"op" => "charequal",
																"var" => array( "aname" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
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

				public function IScoredOrder_GetByArr( $data = array( ), $R4454e360ff = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "scoredorder", $R4454e360ff );
				}

				public function IScoredOrder_GetByStr( $Rb7492a73f7 = array( ), $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select ".$R4454e360ff."  from ".$this->dbprefix."scoredorder where ".$Rb7492a73f7;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function IScoredOrder_Get( $Rdcd9105806, $R4454e360ff = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "scoredorder", $R4454e360ff );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								else
								{
												return $R679e9b9234[0];
								}
				}

				public function IScoredOrder_Update( $R61a8cd51a4 = array( ), $Rdcd9105806 )
				{
								$this->reset( );
								foreach ( $R61a8cd51a4 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "scoredorder", "ordno = '".$Rdcd9105806."'" );
				}

				public function IScoredOrder_UpdateByStr( $R61a8cd51a4 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R61a8cd51a4 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "scoredorder", $R63bede6b19 );
				}

				public function IScoredOrder_Create( $R61a8cd51a4 = array( ) )
				{
								$this->reset( );
								foreach ( $R61a8cd51a4 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "scoredorder" );
				}

				public function IScoredOrder_DeleteByOrdno( $Rdcd9105806 )
				{
								return $this->DeleteRecord( "scoredorder", "ordno = '".$Rdcd9105806."'" );
				}

				public function IScoredOrder_DeleteByLimit( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->DeleteItem( "scoredorder" );
				}

				public function IScoredOrder_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "scoredorder", "id in (".$R3584859062.")" );
				}

				public function IScoredOrder_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "scoredorder", $R172196908b );
				}

				public function IScoredOrder_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "scoredorder", "id in (".$R3584859062.")" );
				}

				public function IScoredOrder_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "scoredorder", $R172196908b );
				}

				public function IScoredOrder_IsExist( $Rdcd9105806 )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->num_rows( "scoredorder" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IScoredOrder_Rows( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->num_rows( "scoredorder" );
				}

				public function &IScoredOrder_RowsByDate( $data = array( ) )
				{
								$R026f0167b4 = array( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->reset( );
												$this->add( "orddate", $Ra3d52e52a4, ">" );
												$this->add( "orddate", $Ra3d52e52a4." 23:59:59", "<" );
												$R026f0167b4[$Ra09fe38af3] = $this->num_rows( "scoredorder" );
								}
								return $R026f0167b4;
				}

}

?>
