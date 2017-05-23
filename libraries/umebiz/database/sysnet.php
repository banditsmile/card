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
class sysnet extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ISysnet_Get( )
				{
								$this->reset( );
								$R3db8f5c8bc = $this->SelectRecord( "sysnet" );
								return $R3db8f5c8bc[0];
				}

				public function ISysnet_Save( $R25791b03ad = array( ) )
				{
								$this->reset( );
								foreach ( $R25791b03ad as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysnet", "1 = 1" );
				}

}

?>
