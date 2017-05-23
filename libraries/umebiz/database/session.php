<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class session
{

				public $user = NULL;
				public $admin = NULL;
				public $adminrank = NULL;
				public $agent = NULL;
				public $mid = NULL;
				public $adminrights = NULL;
				public $syscredit = NULL;
				public $umebizinfo = NULL;
				public $agenttime = NULL;

				public function __construct( )
				{
								if ( !isset( $_SESSION ) )
								{
												global $Rc9d58fc03b;
												if ( isset( $Rc9d58fc03b ) && $Rc9d58fc03b == 1 )
												{
																include( "session.db.php" );
																ini_set( "session.save_handler", "user" );
																$R80701332f5 = new sessiondb( );
																session_set_save_handler( array(
																				$R80701332f5,
																				"open"
																), array(
																				$R80701332f5,
																				"close"
																), array(
																				$R80701332f5,
																				"read"
																), array(
																				$R80701332f5,
																				"write"
																), array(
																				$R80701332f5,
																				"destroy"
																), array(
																				$R80701332f5,
																				"gc"
																) );
												}
												session_start( );
								}
								if ( isset( $_SESSION['userinfo'] ) )
								{
												$this->user = explode( "|", $_SESSION['userinfo'] );
								}
								else
								{
												$this->user = "";
								}
								if ( isset( $_SESSION['agentinfo'] ) )
								{
												$this->agent = explode( "|", $_SESSION['agentinfo'] );
								}
								else
								{
												$this->agent = "";
								}
								if ( isset( $_SESSION['umebizinfo'] ) )
								{
												$this->umebizinfo = $_SESSION['umebizinfo'];
								}
								else
								{
												$this->umebizinfo = "";
								}
								if ( isset( $_SESSION['adminname'] ) )
								{
												$this->admin = $_SESSION['adminname'];
								}
								else
								{
												$this->admin = "";
								}
								if ( isset( $_SESSION['adminrank'] ) )
								{
												$this->adminrank = $_SESSION['adminrank'];
								}
								else
								{
												$this->adminrank = "";
								}
								if ( isset( $_SESSION['mid'] ) )
								{
												$this->mid = $_SESSION['mid'];
								}
								else
								{
												$this->mid = "";
								}
								if ( isset( $_SESSION['adminrights'] ) )
								{
												$this->adminrights = explode( ",", $_SESSION['adminrights'] );
								}
								else
								{
												$this->adminrights = "";
								}
								if ( isset( $_SESSION['syscredit'] ) )
								{
												$this->syscredit = $_SESSION['syscredit'];
								}
								else
								{
												$this->syscredit = "";
								}
								if ( isset( $_SESSION['agenttime'] ) )
								{
												$this->agenttime = $_SESSION['agenttime'];
								}
								else
								{
												$this->agenttime = 0;
								}
				}

				public function _SetSessDir( )
				{
								$R99632d682c = UPATH_BASE.DS."content".DS."Cache".DS;
								$R09a3346376 = $R99632d682c."session".DS."f.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												if ( $R6b6e98cde8 == 1 )
												{
																session_save_path( $R99632d682c."session" );
																ini_set( "session.gc_probability", 1 );
																ini_set( "session.gc_divisor", 1 );
												}
								}
				}

				public function ISession_GetUserName( )
				{
								$Rc4a5b5e310 = $this->user;
								if ( $Rc4a5b5e310 != "" )
								{
												return $Rc4a5b5e310[0];
								}
								else
								{
												return "";
								}
				}

				public function getadmin( )
				{
								return $this->admin;
				}

				public function set( $Rf413f06aeb, $R244f38266c )
				{
								$_SESSION[$Rf413f06aeb] = $R244f38266c;
								if ( isset( $_SESSION['userinfo'] ) )
								{
												$this->user = explode( "|", $_SESSION['userinfo'] );
								}
								else
								{
												$this->user = "";
								}
								if ( isset( $_SESSION['agentinfo'] ) )
								{
												$this->agent = explode( "|", $_SESSION['agentinfo'] );
												$Rb5342a620f = time( );
												$_SESSION['agenttime'] = $Rb5342a620f;
												$this->agenttime = $Rb5342a620f;
								}
								else
								{
												$this->agent = "";
								}
								if ( isset( $_SESSION['umebizinfo'] ) )
								{
												$this->umebizinfo = $_SESSION['umebizinfo'];
								}
								else
								{
												$this->umebizinfo = "";
								}
								if ( isset( $_SESSION['adminname'] ) )
								{
												$this->admin = $_SESSION['adminname'];
								}
								else
								{
												$this->admin = "";
								}
								if ( isset( $_SESSION['syscredit'] ) )
								{
												$this->syscredit = $_SESSION['syscredit'];
								}
								else
								{
												$this->syscredit = "";
								}
								if ( isset( $_SESSION['adminrank'] ) )
								{
												$this->adminrank = $_SESSION['adminrank'];
								}
								else
								{
												$this->adminrank = "";
								}
								if ( isset( $_SESSION['mid'] ) )
								{
												$this->mid = $_SESSION['mid'];
								}
								else
								{
												$this->mid = "";
								}
								if ( isset( $_SESSION['adminrights'] ) )
								{
												$this->adminrights = explode( ",", $_SESSION['adminrights'] );
								}
								else
								{
												$this->adminrights = "";
								}
								if ( isset( $_SESSION['agenttime'] ) )
								{
												$this->agenttime = $_SESSION['agenttime'];
								}
								else
								{
												$this->agenttime = 0;
								}
				}

				public function userlogout( )
				{
								unset( $_SESSION['userinfo'] );
								$this->user = "";
								$this->unsetother( );
				}

				public function adminlogout( )
				{
								unset( $_SESSION['adminname'] );
								$this->admin = "";
								unset( $_SESSION['adminrank'] );
								$this->adminrank = "";
								unset( $_SESSION['mid'] );
								$this->mid = "";
								unset( $_SESSION['adminrights'] );
								$this->adminrights = "";
								unset( $_SESSION['umebizinfo'] );
								$this->umebizinfo = "";
								$this->unsetother( );
				}

				public function agentlogout( )
				{
								unset( $_SESSION['agentinfo'] );
								$this->agent = "";
								unset( $_SESSION['syscredit'] );
								$this->syscredit = "";
								$this->unsetother( );
								session_destroy( );
				}

				public function unsetother( )
				{
								if ( isset( $_SESSION['viproot'] ) )
								{
												unset( $_SESSION['viproot'] );
								}
								if ( isset( $_SESSION['vipshop'] ) )
								{
												unset( $_SESSION['vipshop'] );
								}
								if ( isset( $_SESSION['istest'] ) )
								{
												unset( $_SESSION['istest'] );
								}
								if ( isset( $_SESSION['agenttime'] ) )
								{
												unset( $_SESSION['agenttime'] );
								}
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
