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
class strade extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &ITrade_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 27, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								$R3db8f5c8bc['remain'] = $this->IUmebiz_GetData( $this->buffer, "remain", 1 );
								return $R3db8f5c8bc;
				}

				public function &ITrade_SPage( $data = array( ) )
				{
								$this->IUmebiz_Event( 27, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								$R3db8f5c8bc['remain'] = $this->IUmebiz_GetData( $this->buffer, "remain", 1 );
								return $R3db8f5c8bc;
				}

}

?>
