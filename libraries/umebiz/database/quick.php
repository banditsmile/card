<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class quick extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IQuick_Get( )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."quick";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IQuick_Update( $Raef5b6cb6f = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Raef5b6cb6f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "quick", "id = ".$R3584859062 );
				}

				public function IQuick_Create( $Raef5b6cb6f = array( ) )
				{
								$this->reset( );
								foreach ( $Raef5b6cb6f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "quick" );
				}

				public function IQuick_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "quick", "id = ".$R3584859062 );
				}

}

?>
