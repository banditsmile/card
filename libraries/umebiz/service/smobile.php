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
class smobile extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function IMobile_Get( $data )
				{
								$this->IUmebiz_Event2( 59, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								if ( isset( $R3db8f5c8bc[0]['mobile'] ) )
								{
												if ( strpos( $R3db8f5c8bc[0]['mobile'], "http:" ) !== false )
												{
																return "0|0";
												}
												return $R3db8f5c8bc[0]['mobile'];
								}
								return "0|0";
				}

				public function IMobile_List( $data = array( ) )
				{
								$this->IUmebiz_Event( 61, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc;
				}

				public function IMobile_Link( $data = array( ) )
				{
								$this->IUmebiz_Event( 62, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc;
				}

}

?>
