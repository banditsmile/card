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
class sversion extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &IVer_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 43, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IVer_GetFile( $data = array( ) )
				{
								$this->IUmebiz_Event( 44, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IVer_GetTheme( $data = array( ) )
				{
								$this->IUmebiz_Event( 49, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IVer_TplFile( $data = array( ) )
				{
								$this->IUmebiz_Event( 48, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IVer_AppFile( $data = array( ) )
				{
								$this->IUmebiz_Event( 50, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IVer_GetApp( $data = array( ) )
				{
								$this->IUmebiz_Event( 51, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IVer_GetVip( $data = array( ) )
				{
								$this->IUmebiz_Event( 53, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IVer_GetCz( $data = array( ) )
				{
								$this->IUmebiz_Event( 54, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function IVer_CheckServer( $data = array( ) )
				{
								$this->IUmebiz_Event( 55, $data );
								$Re9b5f92229 = $this->IUmebiz_GetData( $this->buffer, "ack", 1 );
								return $Re9b5f92229 == "ok" ? true : false;
				}

}

?>
