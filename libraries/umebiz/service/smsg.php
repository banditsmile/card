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
class smsg extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &IMsg_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 33, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IMsg_Get( $data = array( ) )
				{
								$R3db8f5c8bc = array( );
								$this->IUmebiz_Event( 32, $data );
								$R494af0fa28 = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								$R1807c1171a = $this->IUmebiz_GetData( $this->buffer, "parent", 0 );
								$Rbd93eed0fd = $this->IUmebiz_GetData( $this->buffer, "child", 0 );
								if ( isset( $R1807c1171a[0]['ubzid'] ) )
								{
												$R3db8f5c8bc['parent'] = $R1807c1171a[0];
								}
								else
								{
												$R3db8f5c8bc['parent'] = $R494af0fa28[0];
								}
								$R3db8f5c8bc['child'] = $Rbd93eed0fd;
								$R3db8f5c8bc['item'] = $R494af0fa28[0];
								return $R3db8f5c8bc;
				}

				public function IMsg_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 32, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								return $R3db8f5c8bc[0];
				}

				public function IMsg_Rows( $data = array( ) )
				{
								$this->IUmebiz_Event( 32, $data );
								$R8fba2824a0 = $this->IUmebiz_GetData( $this->buffer, "msgcount", 1 );
								return $R8fba2824a0;
				}

				public function IMsg_Alert( $data = array( ) )
				{
								$this->IUmebiz_Event2( 58, $data );
				}

}

?>
