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
class payment extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPayment_Get( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "payment" );
				}

				public function IPayment_Update( $Rb60574d852 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rb60574d852 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "payment", "id = ".$R3584859062 );
				}

				public function IPayment_Create( $Rb60574d852 = array( ) )
				{
								$this->reset( );
								foreach ( $Rb60574d852 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "payment" );
				}

				public function IPayment_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "payment", "id = ".$R3584859062 );
				}

}

?>
