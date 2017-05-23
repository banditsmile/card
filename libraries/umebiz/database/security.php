<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class security extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ISecurity_GetById( $R2a51483b14, $R94e0136c8a )
				{
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								$this->add( "staffid", $R94e0136c8a );
								$R679e9b9234 = $this->SelectRecord( "security" );
								return $R679e9b9234[0];
				}

				public function ISecurity_Update( $R3aba65936f = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "security", "id = ".$R3584859062 );
				}

				public function ISecurity_UpdateByAId( $R3aba65936f = array( ), $R2a51483b14 )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "security", "aid = ".$R2a51483b14 );
				}

				public function ISecurity_UpdateStaffByAId( $R3aba65936f = array( ), $R2a51483b14, $R94e0136c8a )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "security", "aid = ".$R2a51483b14." and staffid in (".$R94e0136c8a.")" );
				}

				public function ISecurity_Create( $R3aba65936f = array( ) )
				{
								$this->reset( );
								foreach ( $R3aba65936f as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "security", true );
				}

				public function ISecurity_DeleteStaffByAid( $R2a51483b14, $R94e0136c8a )
				{
								return $this->DeleteRecord( "security", "aid = ".$R2a51483b14." and staffid in (".$R94e0136c8a.")" );
				}

				public function ISecurity_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "security", "id = ".$R3584859062 );
				}

}

?>
