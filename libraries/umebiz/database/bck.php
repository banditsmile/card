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
class bck extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function ICache_Update( $data = array( ) )
				{
								if ( $data['hander'] != "pricemy" && $data['hander'] != "list" && $data['hander'] != "pinyin" && $data['hander'] != "vip" )
								{
												$this->hander = factory::getinstance( $data['hander'] );
								}
								$this->data = $data;
								$Rfee6fd8a6d = $data['hander']."cache";
								return $this->$Rfee6fd8a6d( );
				}

				public function orderlistcache( )
				{
								$R130d64a4ad = "select from ".$this->dbprefix."orders where aid < 1 order by id desc limit 0,15";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R63bede6b19 = "\$Rc54455beb0=".var_export( $R679e9b9234, true );
								$this->writefile( $R63bede6b19, "orderlistcache" );
				}

				public function writefile( $Re82ee9b121, $Re1ad31a93f )
				{
								$R3d9a15f4b8 = BCKCACHE.$Re1ad31a93f.".php";
								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
								file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
				}

				public function delfile( $Re1ad31a93f )
				{
								$R3d9a15f4b8 = BCKCACHE.$Re1ad31a93f.".php";
								if ( file_exists( $R3d9a15f4b8 ) )
								{
												unlink( $R3d9a15f4b8 );
								}
				}

}

?>
