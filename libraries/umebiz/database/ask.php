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
class ask extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IAsk_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "asks", $R71a6fd054f, 15, $this->GetPageLimit( $data ), "*", true, "id" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['isagent'] ) && $data['isagent'] != "" )
								{
												$R026f0167b4[] = " isagent = '".$data['isagent']."'";
								}
								if ( isset( $data['author'] ) && $data['author'] != "" )
								{
												$R026f0167b4[] = " author = '".$data['author']."'";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IAsk_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "asks" );
								return $R3db8f5c8bc[0];
				}

				public function &IAsk_Get( $num = 8, $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "asks" );
				}

				public function IAsk_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "asks" );
				}

				public function IAsk_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "asks", "id = ".$R3584859062 );
				}

				public function IAsk_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "asks", "id = ".$R3584859062 );
				}

				public function IAsk_DeleteByLimit( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->DeleteItem( "asks" );
				}

				public function IAsk_DeleteByStr( $R63bede6b19 )
				{
								return $this->DeleteRecord( "asks", $R63bede6b19 );
				}

}

?>
