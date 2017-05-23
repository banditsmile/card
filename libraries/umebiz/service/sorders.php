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
class sorders extends sqlservice
{

				public function &IOrder_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 18, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function &IOrder_Get( $data = array( ) )
				{
								$this->IUmebiz_Event( 52, $data );
								$R3db8f5c8bc = array( );
								$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								if ( count( $R0f8134fb60 ) )
								{
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
												if ( isset( $R3db8f5c8bc['item']['ubzptype'] ) && $R3db8f5c8bc['item']['ubzptype'] == 0 )
												{
																$R3db8f5c8bc['carditem'] = $this->IUmebiz_GetData( $this->buffer, "carditem", 0 );
												}
												$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "globeitem", 0 );
												if ( count( $R0f8134fb60 ) )
												{
																$R3db8f5c8bc['buyerinfo'] = $R0f8134fb60[0];
												}
								}
								$R3db8f5c8bc['errcode'] = $this->IUmebiz_GetData( $this->buffer, "errcode", 1 );
								$R3db8f5c8bc['errcontent'] = $this->IUmebiz_GetData( $this->buffer, "content", 1 );
								return $R3db8f5c8bc;
				}

				public function &IOrder_Cancel( $data = array( ) )
				{
								$this->IUmebiz_Event( 60, $data );
								$R3db8f5c8bc = array( );
								$R3db8f5c8bc['errcode'] = $this->IUmebiz_GetData( $this->buffer, "errcode", 1 );
								$R3db8f5c8bc['errcontent'] = $this->IUmebiz_GetData( $this->buffer, "content", 1 );
								return $R3db8f5c8bc;
				}

				public function &IOrder_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 6, $data );
								$R3db8f5c8bc = array( );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['err'] = $R1b33f70f78[0]['errcode'];
								if ( $R3db8f5c8bc['err'] == 0 )
								{
												$R0f8134fb60 = $this->IUmebiz_GetData( $this->buffer, "buyerinfo", 0 );
												$R3db8f5c8bc['item'] = $R0f8134fb60[0];
								}
								return $R3db8f5c8bc;
				}

				public function IOrder_SaveForYkt( $data = array( ) )
				{
								$this->IUmebiz_Event( 35, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								if ( isset( $R3db8f5c8bc[0] ) )
								{
												return $R3db8f5c8bc[0];
								}
								else
								{
												return array( );
								}
				}

				public function IOrder_Profit( $data = array( ) )
				{
								$this->IUmebiz_Event( 26, $data );
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								$R3db8f5c8bc['profit'] = $this->IUmebiz_GetData( $this->buffer, "profit", 1 );
								$R3db8f5c8bc['czprofit'] = $this->IUmebiz_GetData( $this->buffer, "czprofit", 1 );
								$R3db8f5c8bc['kmprofit'] = $this->IUmebiz_GetData( $this->buffer, "kmprofit", 1 );
								return $R3db8f5c8bc;
				}

				public function &IOrder_Deal( $data = array( ) )
				{
								$this->IUmebiz_Event( 10, $data );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								$R3db8f5c8bc['err'] = $R1b33f70f78[0];
								if ( $R3db8f5c8bc['err']['errcode'] == "0" )
								{
												$R3db8f5c8bc['item'] = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
								}
								return $R3db8f5c8bc;
				}

				public function &IOrder_DealForYkt( $data = array( ) )
				{
								$this->IUmebiz_Event( 36, $data );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "status", 0 );
								if ( isset( $R1b33f70f78[0]['errcode'] ) )
								{
												$R3db8f5c8bc['err'] = $R1b33f70f78[0];
												if ( $R3db8f5c8bc['err']['errcode'] == "0" )
												{
																$R3db8f5c8bc['item'] = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
												}
												return $R3db8f5c8bc;
								}
								else
								{
												return array( );
								}
				}

				public function IOrder_Update( $data = array( ) )
				{
								$this->IUmebiz_Event( 17, $data );
								$R1b33f70f78 = $this->IUmebiz_GetData( $this->buffer, "errcode", 1 );
								return $R1b33f70f78;
				}

}

?>
