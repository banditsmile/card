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
class HomeController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								if ( isset( $_REQUEST['c_memo2'] ) )
								{
												$this->cncard( );
								}
				}

				public function cncard( )
				{
								$Rf52ba22baf = $_REQUEST['c_memo2'];
								$R4a9bd13f03 = $_REQUEST['c_mid'];
								$R50dffd24ac = $_REQUEST['c_order'];
								$Rb85a824c63 = $_REQUEST['c_orderamount'];
								$Rf6ad6698c9 = $_REQUEST['c_ymd'];
								$R6cb29fd18b = $_REQUEST['c_transnum'];
								$Ra930ba0dc2 = $_REQUEST['c_succmark'];
								$R63cd28eedf = $_REQUEST['c_moneytype'];
								$Rde2d1a84ed = $_REQUEST['c_cause'];
								$R573c0bdb7c = $_REQUEST['c_memo1'];
								$R00a95f4101 = $_REQUEST['c_memo2'];
								$Rfdd5c48415 = $_REQUEST['c_signstr'];
								$R63bede6b19 = "c_mid=".$R4a9bd13f03."&c_order=".$R50dffd24ac."&c_orderamount=".$Rb85a824c63."&c_ymd=".$Rf6ad6698c9."&c_transnum=".$R6cb29fd18b."&c_succmark=".$Ra930ba0dc2."&c_succmark=".$Ra930ba0dc2."&c_moneytype=".$R63cd28eedf."&c_cause=".$Rde2d1a84ed."&c_memo1=".$R573c0bdb7c."&c_memo2=".$R00a95f4101."&c_signstr=".$Rfdd5c48415;
								$url = "";
								if ( $Rf52ba22baf == "mod_b2b" || $Rf52ba22baf == "mod_agent" )
								{
												$url = "index.php?m=mod_b2b&c=order&paycode=cncard";
								}
								else if ( $Rf52ba22baf == "mod_user" )
								{
												$Rb79d40053e = "mod_ykt";
												if ( UB_B2C )
												{
																$Rb79d40053e = "mod_b2c";
												}
												$url = "index.php?m=".$Rb79d40053e."&c=order&paycode=cncard";
								}
								else
								{
												$url = "index.php?m=".$Rf52ba22baf."&c=order&paycode=cncard";
								}
								$this->ScriptRedirect( $url."&".$R63bede6b19 );
				}

}

?>
