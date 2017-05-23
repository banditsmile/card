<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Factory
{

				public function __construct( )
				{
				}

				public function &GetInstance( $R101593cf9f )
				{
								static $R5775fcd129 = NULL;
								if ( !isset( $R5775fcd129 ) )
								{
												$R5775fcd129 = array( );
								}
								if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
								{
												require_once( "database".DS."mysql".".php" );
												require_once( "database".DS.$R101593cf9f.".php" );
												$R5775fcd129[$R101593cf9f] = new $R101593cf9f( );									
								}
								return $R5775fcd129[$R101593cf9f];
				}

				public function &GetService( $R101593cf9f )
				{
								static $R5775fcd129 = NULL;
								if ( !isset( $R5775fcd129 ) )
								{
												$R5775fcd129 = array( );
								}
								if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
								{
												require_once( "service".DS."sqlservice".".php" );
												require_once( "service".DS.$R101593cf9f.".php" );
												$R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
								}
								return $R5775fcd129[$R101593cf9f];
				}

				public function &GetEsales( $R101593cf9f )
				{
								static $R5775fcd129 = NULL;
								if ( !isset( $R5775fcd129 ) )
								{
												$R5775fcd129 = array( );
								}
								if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
								{
												require_once( "esales".DS."sqlesales.php" );
												require_once( "esales".DS.$R101593cf9f.".php" );
												$R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
								}
								return $R5775fcd129[$R101593cf9f];
				}

				public function &GetFs( $R101593cf9f )
				{
								static $R5775fcd129 = NULL;
								if ( !isset( $R5775fcd129 ) )
								{
												$R5775fcd129 = array( );
								}
								if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
								{
												require_once( "fs".DS.$R101593cf9f.".php" );
												$R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
								}
								return $R5775fcd129[$R101593cf9f];
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
