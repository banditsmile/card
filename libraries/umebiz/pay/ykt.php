<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ykt
{

				public $url = NULL;

				public function __construct( )
				{
				}

				public function result( )
				{
								$this->url = array(
												"BillNo" => getvar( "billno" ),
												"Amount" => getvar( "amount" ),
												"Succ" => "Y",
												"Signature" => "GO",
												"PayWay" => "ykt",
												"BuyerIP" => $_SERVER['REMOTE_ADDR']
								);
								return true;
				}

				public function respond( $ubzuid )
				{
								return true;
				}

}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
