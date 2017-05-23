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
class scards extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &ICard_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 23, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &ICard_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 23, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &ICard_Save( $data = array( ) )
				{
								$R3db8f5c8bc = array( );
								$this->IUmebiz_Event( 22, $data );
								if ( $data['action'] == "stocksave" )
								{
												$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
								}
								$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['error'] = $R0f8134fb60[0];
								return $R3db8f5c8bc;
				}

				public function &ICard_GetAddedState( $data = array( ) )
				{
								$this->IUmebiz_Event( 41, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "finished", 1 );
								return $R3db8f5c8bc;
				}

}

?>
