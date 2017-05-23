<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class sqlesales
{

				public $param = NULL;
				public $tpl = NULL;
				public $ext = NULL;
				public $serv = NULL;
				public $url = NULL;
				public $host = NULL;
				public $buffer = NULL;

				public function __construct( )
				{
								$this->init( );
				}

				public function init( )
				{
								$this->host = $this->GetHost( );
				}

				public function IEsales_Read( $param )
				{
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
								{
												$data = $this->LinkData( $param );
												if ( $data )
												{
																break;
												}
								}
								$this->buffer =& $data;
				}

				public function IEsales_GetData( $data )
				{
								$R3db8f5c8bc = array( );
								$R8eeb1221ae = explode( "&", $data );
								foreach ( $R8eeb1221ae as $R0f8134fb60 )
								{
												$Rcc5c6e696c = explode( "=", $R0f8134fb60 );
												$R3db8f5c8bc[$Rcc5c6e696c[0]] = isset( $Rcc5c6e696c[1] ) ? $Rcc5c6e696c[1] : "";
								}
								return $R3db8f5c8bc;
				}

				public function &LinkData( $Rc2d2567438 )
				{
								$R7b751b7406 = strlen( $Rc2d2567438 );
								$R63bede6b19 = file_get_contents( $this->url."?".$Rc2d2567438 );
								return $R63bede6b19;
				}

				public function PMA_getenv( $Ra6ac55afc0 )
				{
								if ( isset( $_SERVER[$Ra6ac55afc0] ) )
								{
												return $_SERVER[$Ra6ac55afc0];
								}
								else if ( isset( $_ENV[$Ra6ac55afc0] ) )
								{
												return $_ENV[$Ra6ac55afc0];
								}
								else if ( getenv( $Ra6ac55afc0 ) )
								{
												return getenv( $Ra6ac55afc0 );
								}
								else if ( function_exists( "apache_getenv" ) && apache_getenv( $Ra6ac55afc0, true ) )
								{
												return apache_getenv( $Ra6ac55afc0, true );
								}
								return "";
				}

				public function GetHost( )
				{
								if ( empty( $Rcb523a8670 ) )
								{
												if ( $this->PMA_getenv( "HTTP_HOST" ) )
												{
																$Rcb523a8670 = $this->PMA_getenv( "HTTP_HOST" );
												}
												else
												{
																$Rcb523a8670 = "";
												}
								}
								return htmlspecialchars( $Rcb523a8670 );
				}

				public function GetIp( )
				{
								return $_SERVER['REMOTE_ADDR'];
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
