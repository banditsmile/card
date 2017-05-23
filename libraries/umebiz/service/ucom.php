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
class ucom extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function IUCom_Get( $data )
				{
								$this->IUmebiz_Event2( 57, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								if ( isset( $R3db8f5c8bc[0]['c'] ) )
								{
												return $R3db8f5c8bc[0]['c'];
								}
								return "";
				}

}

?>
