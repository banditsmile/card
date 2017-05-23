<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class acount
{

				public $url = NULL;

				public function __construct( )
				{
				}

				public function result( )
				{
								if ( !isset( $_SESSION ) )
								{
												factory::getinstance( "session" );
								}
								if ( !isset( $_SESSION['agentinfo'] ) && !isset( $_SESSION['userinfo'] ) )
								{
												return false;
								}
								else
								{
												$this->url = array(
																"BillNo" => getvar( "billno" ),
																"Amount" => getvar( "amount" ),
																"Succ" => "Y",
																"Signature" => "GO",
																"PayWay" => "acount",
																"BuyerIP" => $_SERVER['REMOTE_ADDR']
												);
												return true;
								}
				}

				public function respond( $ubzuid )
				{
								if ( !isset( $_SESSION ) )
								{
												factory::getinstance( "session" );
								}
								if ( !isset( $_SESSION['agentinfo'] ) && !isset( $_SESSION['userinfo'] ) )
								{
												return false;
								}
								return true;
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
