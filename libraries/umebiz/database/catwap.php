<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class catwap extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICatWap_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "catwap", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "hot desc,pinyin,ordering,id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name", "pinyin" )
												),
												array(
																"op" => "intequal",
																"var" => array( "parentid", "ordering", "hot" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ICatWap_Get( $Rac9b8532b8 = -1 )
				{
								$R026f0167b4 = array( );
								if ( -1 < $Rac9b8532b8 )
								{
												$R026f0167b4[] = " parentid = ".$Rac9b8532b8;
								}
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = "where ".$R63bede6b19;
								}
								$R130d64a4ad = "select * from ".$this->dbprefix."catwap ".$R63bede6b19." order by ordering";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &ICatWap_GetById( $R3584859062 = 0 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "catwap" );
								return $R679e9b9234[0];
				}

				public function &ICatWap_GetByName( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R679e9b9234 = $this->SelectRecord( "catwap" );
								return $R679e9b9234[0];
				}

				public function ICatWap_GetParent( $R3584859062 = 0 )
				{
								$this->reset( );
								if ( $R3584859062 == 0 )
								{
												return 0;
								}
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "catwap" );
								return $R679e9b9234[0]['parentid'];
				}

				public function ICatWap_Update( $Raef5b6cb6f = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Raef5b6cb6f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "catwap", "id = ".$R3584859062 );
				}

				public function ICatWap_Create( $Raef5b6cb6f = array( ) )
				{
								$this->reset( );
								foreach ( $Raef5b6cb6f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "catwap" );
				}

				public function ICatWap_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "catwap", "id = ".$R3584859062 );
				}

				public function ICatWap_UpdateByStr( $Raef5b6cb6f = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Raef5b6cb6f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "catwap", $R63bede6b19 );
				}

				public function ICatWap_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "catwap", "id in (".$R3584859062.")" );
				}

				public function ICatWap_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "catwap", $R172196908b );
				}

}

?>
