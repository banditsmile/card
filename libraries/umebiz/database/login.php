<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class login extends mysql
{
				public function &ILogin_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "login", $R71a6fd054f, 15, $this->GetPageLimit( $data ), "*", true, "id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								if ( $data['operator'] != "" )
								{
												$R026f0167b4[] = " operator = '".$data['operator']."'";
								}
								if ( $data['isfront'] == "" || $data['isfront'] == 0 )
								{
												$R026f0167b4[] = " isfront = 0 ";
								}
								else
								{
												$R026f0167b4[] = " isfront = ".intval( $data['isfront'] );
								}
								$R31f1c1341b = $this->GetDateLimit( $data, "" );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."createdate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."createdate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function ILogin_Create( $Rda64c1108b = array( ) )
				{
								$this->reset( );
								foreach ( $Rda64c1108b as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "login", true );
				}

}

?>
