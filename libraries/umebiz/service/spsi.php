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
class spsi extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &IPsi_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 29, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function IPsi_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 28, $data );
				}

}

?>
