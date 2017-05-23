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
class qq extends sqlesales
{

				public $url = NULL;

				public function __construct( )
				{
								parent::__construct();
								$this->serv = "esales.qq.com";
								$this->url = "http://esales.qq.com/cgi-bin/esales_sell_dir.cgi";
				}

				public function IQQ_Get( $Rc2d2567438 )
				{
								$this->IEsales_Read( $Rc2d2567438 );
								$R679e9b9234 = $this->IEsales_GetData( $this->buffer );
								return $R679e9b9234;
				}

}

?>
