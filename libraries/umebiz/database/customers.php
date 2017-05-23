<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class customers extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICustomer_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "customers", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", true, "cid" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "cname", "crealname", "cqq", "ctel", "cmail", "caddr", "prv", "city", "zip", "remarks" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['ccsmp'] ) )
								{
												$R026f0167b4[] = " ccsmp > ".( doubleval( $data['ccsmp'] ) - 0.001 );
								}
								if ( isset( $data['cremain'] ) )
								{
												$R026f0167b4[] = " cremain > ".( doubleval( $data['cremain'] ) - 0.001 );
								}
								if ( $data['optype'] != "" )
								{
												$R026f0167b4[] = $this->GetOptype( $data['optype'] );
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " inrecycle = 0";
								}
								if ( isset( $data['cid'] ) && 0 < $data['cid'] )
								{
												$R026f0167b4[] = " cid = ".intval( $data['cid'] );
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
												$R026f0167b4[] = " clv = ".intval( $R0f8134fb60 );
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

				public function &ICustomer_Get( $R6cd996866e, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "cid", $R6cd996866e );
								$R679e9b9234 = $this->SelectRecord( "customers", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ICustomer_GetByStr( $R63bede6b19, $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R679e9b9234 = array( );
								$R172196908b = $this->GetPageLimit( $data );
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								if ( $R172196908b != "" )
								{
												$R172196908b = "where ".$R172196908b;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."customers ".$R172196908b;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function ICustomer_GetRemain( $R6cd996866e )
				{
								$R679e9b9234 = $this->ICustomer_Get( $R6cd996866e, "cremain" );
								return doubleval( $R679e9b9234['cremain'] );
				}

				public function ICustomer_IsExist( $R45074ab3da )
				{
								$this->reset( );
								$this->add( "cname", $R45074ab3da );
								$R679e9b9234 = $this->num_rows( "customers" );
								if ( $R679e9b9234 == 0 )
								{
												$this->reset( );
												$this->add( "aname", $R45074ab3da );
												$R679e9b9234 = $this->num_rows( "agents" );
												if ( $R679e9b9234 == 0 )
												{
																return 1;
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 0;
								}
				}

				public function &ICustomer_GetByName( $R45074ab3da, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "cname", $R45074ab3da );
								$R679e9b9234 = $this->SelectRecord( "customers", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ICustomer_Update( $R6b119f7848 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R6b119f7848 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "customers", "cid = ".$R3584859062 );
				}

				public function ICustomer_UpdateByStr( $R6b119f7848 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R6b119f7848 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "customers", $R63bede6b19 );
				}

				public function ICustomer_Create( $Rbb0eb0cede = array( ) )
				{
								$this->reset( );
								foreach ( $Rbb0eb0cede as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "customers", true );
				}

				public function ICustomer_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "customers", "cid in (".$R3584859062.")" );
				}

				public function ICustomer_Recycle( )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->num_rows( "customers" );
				}

				public function ICustomer_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "customers", $R172196908b );
				}

				public function ICustomer_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "customers", "cid in (".$R3584859062.")" );
				}

				public function ICustomer_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "customers", $R172196908b );
				}

				public function ICustomer_Login( $username, $Rfe52e0da2c )
				{
								$this->reset( );
								$this->add( "cname", $username );
								$this->add( "inrecycle", 0 );
								$R679e9b9234 = $this->SelectRecord( "customers" );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								if ( $Rfe52e0da2c != md5( $R679e9b9234[0]['cpwd'] ) )
								{
												return 1;
								}
								else
								{
												$data = array(
																"lastdate" => empty( $R679e9b9234[0]['thisdate'] ) ? date( "Y-m-d H-i-s" ) : $R679e9b9234[0]['thisdate'],
																"lastip" => empty( $R679e9b9234[0]['thisip'] ) ? $_SERVER['REMOTE_ADDR'] : $R679e9b9234[0]['thisip'],
																"thisdate" => date( "Y-m-d H-i-s" ),
																"thisip" => $_SERVER['REMOTE_ADDR']
												);
												$this->ICustomer_Update( $data, $R679e9b9234[0]['cid'] );
												return $R679e9b9234;
								}
				}

}

?>
