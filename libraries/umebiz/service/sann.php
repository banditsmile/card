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
class sann extends sqlservice
{

				public function IAnn_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 38, $data );
								return $this->buffer;
				}

}

?>
