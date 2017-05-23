<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class loan extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ILoan_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								if ( isset( $data['nrows'] ) )
								{
												$R42c553e7de = intval( $data['nrows'] );
								}
								else
								{
												$R42c553e7de = 15;
								}
								$R42c553e7de = $R42c553e7de == 0 ? 15 : $R42c553e7de;
								return $this->PageRecord( "loan", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "reason", "ordno" )
												),
												array(
																"op" => "intequal",
																"var" => array( "otherside" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['thisaction'] ) && $data['thisaction'] != "" )
								{
												$Ra6c3750fb1 = array( );
												$Rcc5c6e696c = explode( ",", $data['thisaction'] );
												foreach ( $Rcc5c6e696c as $R0f8134fb60 )
												{
																$Ra6c3750fb1[] = " thisaction = ".intval( $R0f8134fb60 );
												}
												$R026f0167b4[] = " (".implode( " or ", $Ra6c3750fb1 ).") ";
								}
								if ( $data['aid'] !== "" )
								{
												$R026f0167b4[] = " aid = ".$data['aid'];
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ILoan_Get( $Rdcd9105806, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "loan", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &ILoan_GetByArr( $data, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "loan", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ILoan_IsExist( $Rdcd9105806 )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->num_rows( "loan" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function ILoan_Update( $Rf34309d132 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rf34309d132 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "loan", "ordno = ".$R3584859062 );
				}

				public function ILoan_Create( $Rf34309d132 = array( ) )
				{
								$this->reset( );
								foreach ( $Rf34309d132 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "loan" );
				}

				public function ILoan_Del( $R755ba04a49 )
				{
								return $this->DeleteRecord( "loan", "id = ".$R755ba04a49 );
				}

}

?>
