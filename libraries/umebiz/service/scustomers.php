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
class scustomers extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &ICustomer_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 24, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &ICustomer_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 19, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &ICustomer_Save( $data = array( ) )
				{
								$action = $data['action'];
								if ( $action == "regsave" )
								{
												$this->IUmebiz_Event( 1, $data );
								}
								else if ( isset( $data['foruser'] ) )
								{
												$this->IUmebiz_Event( 2, $data );
								}
								else
								{
												$this->IUmebiz_Event( 19, $data );
								}
								$R3db8f5c8bc = array( );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['error'] = $R1b33f70f78[0];
								$R3db8f5c8bc['error']['errcode'] = isset( $R3db8f5c8bc['error']['errcode'] ) ? $R3db8f5c8bc['error']['errcode'] : $R3db8f5c8bc['error']['errCode'];
								if ( $R3db8f5c8bc['error']['errcode'] == 0 || ( $action = "regsave" ) )
								{
												$R3db8f5c8bc['item'] = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								}
								return $R3db8f5c8bc;
				}

				public function &ICustomer_Login( $data = array( ) )
				{
								$this->IUmebiz_Event( 3, $data );
								$R3db8f5c8bc = array( );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['error'] = isset( $R1b33f70f78[0]['errcode'] ) ? $R1b33f70f78[0]['errcode'] : $R1b33f70f78[0]['errCode'];
								if ( $R3db8f5c8bc['error'] == "0" )
								{
												$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
								}
								return $R3db8f5c8bc;
				}

				public function ICustomer_CheckUser( $data = array( ) )
				{
								$this->IUmebiz_Event( 8, $data );
								return $this->buffer;
				}

}

?>
