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
class sfunds extends sqlservice
{

				public function &IFunds_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 20, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IFunds_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 9, $data );
								$R3db8f5c8bc = array( );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['err'] = $R1b33f70f78[0]['errCode'];
								if ( $R3db8f5c8bc['err'] == 0 )
								{
												$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "buyerinfo", 0 );
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
								}
								return $R3db8f5c8bc;
				}

				public function IFunds_Del( $data = array( ) )
				{
								$this->IUmebiz_Event( 21, $data );
				}

}

?>
