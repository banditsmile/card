<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class powerlv extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPowerLv_Get( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "powerlv", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function IPowerLv_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "powerlv" );
				}

				public function IPowerLv_Update( $data = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "powerlv", "id = ".$R3584859062 );
				}

}

?>
