<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ptype extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPtype_Get( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "goods_type", "*" );
				}

				public function &IPtype_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "goods_type", "*", "order by id" );
								return $R679e9b9234[0];
				}

				public function &IPtype_GetByName( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R679e9b9234 = $this->SelectRecord( "goods_type", "*", "order by id" );
								return $R679e9b9234[0];
				}

				public function IPtype_Update( $data = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "goods_type", "id = ".$R3584859062 );
				}

				public function IPtype_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "goods_type" );
				}

				public function IPtype_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "goods_type", "id = ".$R3584859062 );
				}

}

?>
