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
class sessiondb extends mysql
{

				public function __construct( )
				{
								ini_set( "session.save_handler", "user" );
								//$Tmp_-2147483643( );
				}

				public function open( $Rddda4b8749, $R8cf1e5cb1b )
				{
								return true;
				}

				public function close( )
				{
								return true;
				}

				public function read( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "session", "*" );
								return isset( $R679e9b9234[0]['sess'] ) && $R679e9b9234[0]['sess'] != "" ? gzinflate( base64_decode( $R679e9b9234[0]['sess'] ) ) : "";
				}

				public function write( $R3584859062, $R4503e03eb4 )
				{
								if ( $R4503e03eb4 != "" )
								{
												$R4503e03eb4 = base64_encode( gzdeflate( $R4503e03eb4 ) );
								}
								$R130d64a4ad = "replace into ".$this->dbprefix."session (id,sess_expires,sess) values ('".$R3584859062."',".time( ).",'".$R4503e03eb4."')";
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function destroy( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "session", "id = '".$R3584859062."'" );
				}

				public function gc( $Ra126c68a4a )
				{
								$this->reset( );
								return $this->DeleteRecord( "session", "sess_expires < ".time( ) );
				}

}

?>
