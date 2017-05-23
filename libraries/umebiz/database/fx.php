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
class fx extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IFX_Get( $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."fx";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0];
				}

				public function IFX_Update( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "fx", "1=1" );
				}

}

?>
