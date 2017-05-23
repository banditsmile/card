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
class sproducts extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &IProduct_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 0, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IProduct_ItemDeal( $data = array( ) )
				{
								$this->IUmebiz_Event( 13, $data );
								return $this->buffer;
				}

				public function &IProduct_Get( $data = array( ) )
				{
								if ( isset( $data['foruser'] ) )
								{
												$this->IUmebiz_Event( 7, $data );
								}
								else
								{
												$this->IUmebiz_Event( 14, $data );
								}
								$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								if ( isset( $data['foruser'] ) && $data['foruser'] == 0 )
								{
												$R3db8f5c8bc = array( );
												$R3db8f5c8bc['other'] = $this->IUmebiz_GetData( $this->buffer, "other", 0 );
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
												return $R3db8f5c8bc;
								}
								else
								{
												return $R0f8134fb60[0];
								}
				}

				public function &IProduct_GetByLocalPid( $data = array( ) )
				{
								$this->IUmebiz_Event( 40, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc[0];
				}

				public function &IProduct_GetForUser( $data = array( ) )
				{
								$this->IUmebiz_Event( 0, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc;
				}

				public function &IProduct_GetPid( $data = array( ) )
				{
								$this->IUmebiz_Event( 30, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								return $R3db8f5c8bc;
				}

				public function IProduct_GetStocks( $data = array( ) )
				{
								$R3db8f5c8bc = array( );
								$this->IUmebiz_Event( 37, $data );
								$R3db8f5c8bc[0] = $this->IUmebiz_GetData( $this->buffer, "item", 1 );
								$R3db8f5c8bc[1] = $this->IUmebiz_GetData( $this->buffer, "ownitem", 1 );
								return $R3db8f5c8bc;
				}

				public function IProduct_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 15, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								if ( !isset( $R3db8f5c8bc[0]['ubzpid'] ) )
								{
												return 0;
								}
								return $R3db8f5c8bc[0]['ubzpid'];
				}

				public function IProduct_GetC2AutoState( $data = array( ) )
				{
								$this->IUmebiz_Event( 42, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "state", 1 );
								return $R3db8f5c8bc;
				}

				public function IProduct_Del( $data = array( ) )
				{
								$this->IUmebiz_Event( 16, $data );
				}

				public function IProduct_GetSupPrice( $data = array( ) )
				{
								$this->IUmebiz_Event( 45, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( !isset( $R026f0167b4[$R0f8134fb60['pid']] ) || isset( $R026f0167b4[$R0f8134fb60['pid']] ) && $R026f0167b4[$R0f8134fb60['pid']] < $R0f8134fb60['supprice'] )
												{
																$R026f0167b4[$R0f8134fb60['pid']] = $R0f8134fb60['supprice'];
												}
								}
								return $R026f0167b4;
				}

				public function IProduct_GetTpl( $data = array( ) )
				{
								$this->IUmebiz_Event( 47, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( !isset( $R026f0167b4[$R0f8134fb60['pid']] ) )
												{
																$R026f0167b4[$R0f8134fb60['pid']] = $R0f8134fb60;
												}
								}
								return $R026f0167b4;
				}

}

?>
