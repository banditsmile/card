<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Category extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICategory_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "category", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "ordering,hot" );
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
								if ( isset( $data['custom'] ) && $data['custom'] == 1 )
								{
												$R026f0167b4[] = " aid > 0 ";
								}
								else if ( isset( $data['aid'] ) && 0 < $data['aid'] )
								{
												$R026f0167b4[] = " aid = ".intval( $data['aid'] );
								}
								else
								{
												$R026f0167b4[] = " aid = -1";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ICategory_Get( $Rac9b8532b8 = -1, $R2a51483b14 = -1, $Ra2f8b4ecdd = 0, $Ra7e7c7ba21 = 0, $Rd71fe2585f = "pinyin,ordering", $Rb0d5d47f3d = "*" )
				{
								$R026f0167b4 = array( );
								if ( -1 < $Rac9b8532b8 )
								{
												$R026f0167b4[] = " parentid = ".$Rac9b8532b8;
								}
								if ( $R2a51483b14 != 0 && $Ra7e7c7ba21 == 0 )
								{
												if ( $Ra2f8b4ecdd == 1 )
												{
																$R026f0167b4[] = " (aid = ".$R2a51483b14." or shared=1) ";
												}
												else
												{
																$R026f0167b4[] = " aid = ".$R2a51483b14;
												}
								}
								else if ( $Ra7e7c7ba21 == 1 )
								{
												$R026f0167b4[] = " aid > 0";
								}
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = "where ".$R63bede6b19;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."category ".$R63bede6b19." order by ".$Rd71fe2585f;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &ICategory_GetByParentId( $R3584859062 = 0 )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."category where parentid in (select id from ".$this->dbprefix."category where parentid in (".$R3584859062.")) order by pinyin,ordering";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function ICategory_GetById( $R3584859062 = 0 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "category" );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												return $R679e9b9234[0];
								}
								else
								{
												return array( );
								}
				}

				public function ICategory_GetByName( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R679e9b9234 = $this->SelectRecord( "category" );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												return $R679e9b9234[0];
								}
								else
								{
												return array( );
								}
				}

				public function ICategory_GetParent( $R3584859062 = 0 )
				{
								$this->reset( );
								if ( $R3584859062 == 0 )
								{
												return 0;
								}
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "category" );
								return isset( $R679e9b9234[0]['parentid'] ) ? $R679e9b9234[0]['parentid'] : 0;
				}

				public function ICategory_Update( $Rcb6cf74d12 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rcb6cf74d12 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "category", "id = ".$R3584859062 );
				}

				public function ICategory_Create( $Rcb6cf74d12 = array( ) )
				{
								$this->reset( );
								foreach ( $Rcb6cf74d12 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "category" );
				}

				public function ICategory_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "category", "id = ".$R3584859062 );
				}

				public function ICategory_UpdateByStr( $Rcb6cf74d12 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rcb6cf74d12 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "category", $R63bede6b19 );
				}

				public function ICategory_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "category", "id in (".$R3584859062.")" );
				}

				public function ICategory_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "category", $R172196908b );
				}

}

?>
