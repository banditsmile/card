<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class funds extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IFunds_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "funds", $R71a6fd054f, 15, $this->GetPageLimit( $data ), "*", true, "id" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "ordno", "cname", "cip", "remarks" )
												),
												array(
																"op" => "charequal",
																"var" => array( "admname" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R026f0167b4[] = $this->GetOptype( $data['optype'] );
								}
								if ( isset( $data['comefrom'] ) && 0 < $data['comefrom'] )
								{
												$R026f0167b4[] = " ".$R1de95f080d."comefrom = ".intval( $data['comefrom'] );
								}
								if ( isset( $data['payment'] ) && $data['payment'] != 0 )
								{
												$R026f0167b4[] = " payment = ".intval( $data['payment'] );
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " inrecycle = 0";
								}
								$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function YearNowSub( $R5b08d4f823 )
				{
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								if ( $R35a9abe007 < 0 )
								{
												$R35a9abe007 = 0;
								}
								$R7f49613fdd = intval( $R35a9abe007 / 86400 / 365 );
								$R63bede6b19 = $R7f49613fdd;
								return $R63bede6b19;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R497a2c671f = $this->YearNowSub( urldecode( $data['startdate'] ) );
												if ( 9 < $R497a2c671f )
												{
																return "";
												}
												$R026f0167b4[] = " ".$R1de95f080d."orddate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."orddate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function GetOptype( $R36130a8639 )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												switch ( $R0f8134fb60 )
												{
												case "s" :
																$R026f0167b4[] = " ordstate = 2";
																break;
												case "f" :
																$R026f0167b4[] = " ordstate = 0";
																break;
												case "dayorder" :
																$R026f0167b4[] = " orddate > '".date( "Y-n-d" )."'";
																break;
												default :
																break;
												}
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function &IFunds_Get( $Rdcd9105806, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "funds", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IFunds_GetByArr( $data = array( ), $R4454e360ff = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "orders", $R4454e360ff );
				}

				public function IFunds_IsExist( $Rdcd9105806 )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->num_rows( "funds" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IFunds_Update( $Rd8fb5ae7df = array( ), $Rdcd9105806 )
				{
								$this->reset( );
								foreach ( $Rd8fb5ae7df as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "funds", "ordno = '".$Rdcd9105806."'" );
				}

				public function IFunds_Create( $Rd8fb5ae7df = array( ) )
				{
								$this->reset( );
								foreach ( $Rd8fb5ae7df as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "funds" );
				}

				public function IFunds_DeleteByLimit( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->DeleteItem( "funds" );
				}

				public function IFunds_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "funds", "id in (".$R3584859062.")" );
				}

				public function IFunds_DeleteByStr( $R63bede6b19, $data = array( ) )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "funds", $R172196908b );
				}

				public function IFunds_UpdateByStr( $Rd8fb5ae7df = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rd8fb5ae7df as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "funds", $R63bede6b19 );
				}

				public function IFunds_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "funds", "id in (".$R3584859062.")" );
				}

				public function IFunds_DestroyByStr( $R63bede6b19, $data = array( ) )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "funds", $R172196908b );
				}

}

?>
