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
class ssup extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &ISup_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 0, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &ISup_ItemDeal( $data = array( ) )
				{
								$this->IUmebiz_Event( 13, $data );
								return $this->buffer;
				}

				public function &ISup_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 25, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								$R3db8f5c8bc['pname'] = $this->IUmebiz_GetData( $this->buffer, "ubzpname", 1 );
								$R3db8f5c8bc['spnum'] = $this->IUmebiz_GetData( $this->buffer, "ubzspnum", 1 );
								$R3db8f5c8bc['noack'] = $this->IUmebiz_GetData( $this->buffer, "noack", 1 );
								return $R3db8f5c8bc;
				}

				public function ISup_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 25, $data );
				}

				public function ISup_GetProduct( $data = array( ) )
				{
								$this->IUmebiz_Event( 34, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function ISup_GetSupplier( $data = array( ) )
				{
								$this->IUmebiz_Event( 31, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

}

?>
