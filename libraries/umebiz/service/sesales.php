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
class sesales extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &IEsales_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 0, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function IEsales_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 39, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								if ( $this->linkerr == -999 )
								{
												return -999;
								}
								if ( isset( $R3db8f5c8bc[0] ) )
								{
												return $R3db8f5c8bc[0];
								}
								else
								{
												return array( );
								}
				}

				public function IEsales_Save( $data = array( ) )
				{
								$R3db8f5c8bc = $this->IUmebiz_Event( 39, $data );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "content", 1 );
								return $R1b33f70f78;
				}

}

?>
