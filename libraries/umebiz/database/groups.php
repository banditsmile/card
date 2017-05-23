<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class groups extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IGroup_Get( $Rb0d5d47f3d = "*" )
				{
								if ( UB_B2B )
								{
												if ( UB_YKT == 0 && UB_B2C == 0 )
												{
																$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."groups where gid>0";
												}
												else
												{
																$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."groups";
												}
												$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								}
								else
								{
												$R679e9b9234 = array(
																array( "gid" => 0, "gname" => "»áÔ±" )
												);
								}
								return $R679e9b9234;
				}

				public function &IGroup_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "groups", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function IGroup_GetNameById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "groups", "name" );
								return $R679e9b9234[0]['name'];
				}

				public function IGroup_GetByMoney( $R72852f08e6 )
				{
								$R130d64a4ad = ( "select rank from ".$this->dbprefix."groups where money < ".( $R72852f08e6 + 0.01 ) )." order by money desc limit 0, 1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								else
								{
												return $R679e9b9234[0]['rank'];
								}
				}

				public function &IGroup_Page( $R71a6fd054f = 1, $R8a9b7e2929 = 15 )
				{
								$R130d64a4ad = sprintf( "select * from %s", $this->dbprefix."groups" );
								$R3db8f5c8bc = $this->PageQuery( $R71a6fd054f, $R8a9b7e2929, $R130d64a4ad );
								return $R3db8f5c8bc;
				}

				public function IGroup_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "groups" );
				}

				public function IGroup_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "groups", "id = ".$R3584859062 );
				}

				public function IGroup_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "groups", "id = ".$R3584859062 );
				}

}

?>
