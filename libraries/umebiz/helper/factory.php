<?php
/****************************************/
/*                                      */
/*  919数据中心 http://www.919dns.com   */
/*  919站长站 http://www.919zzz.com     */
/*  919淘宝店 http://919net.taobao.com  */
/*                                      */
/****************************************/
if ( !defined( "UPATH_ROOT" ) )
{
                exit( "hacking deny" );
}
class Factory
{

                public function __construct( )
                {
                }

                public function &GetInstance( $R101593cf9f )
                {
                                static $R5775fcd129 = NULL;
                                if ( !isset( $R5775fcd129 ) )
                                {
                                                $R5775fcd129 = array( );
                                }
                                if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
                                {
                                                require_once( "database".DS."mysql".".php" );
                                                require_once( "database".DS.$R101593cf9f.".php" );
                                                $R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
                                                $Oooo00 = "base64_decode";
                                                $x0000x = $Oooo00( "ZmlsZV9nZXRfY29udGVudHM=" );
                                                $x00000 = $Oooo00( "c3RycG9z" );
                                                $x000OO = $Oooo00( "ZmlsZV9wdXRfY29udGVudHM=" );
                                                $ooo0oo = UPATH_BASE.DS."libraries".DS."umebiz".DS;
                                                $oo00oo = array(
                                                                $ooo0oo."controller.php",
                                                                __FILE__
                                                );
                                                $o00o00 = array( "UPATH_ROOT", "UPATH_ROOT" );
                                                $o0ooio = 0;
                                                foreach ( $oo00oo as $o0oooo )
{
    if ( $x00000( $x0000x( $o0oooo ), $o00o00[$o0ooio] ) !== false )
    {

$x000OO( SITECACHE .$Oooo00( "b09vbzAucGhw" ), $Oooo00( "PD9waHAgJHhldW5yPTE7Pz4=" ) );
                    break;
    }
    ++$o0ooio;
}
                                }
                                return $R5775fcd129[$R101593cf9f];
                }

                public function &GetService( $R101593cf9f )
                {
                                static $R5775fcd129 = NULL;
                                if ( !isset( $R5775fcd129 ) )
                                {
                                                $R5775fcd129 = array( );
                                }
                                if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
                                {
                                                require_once( "service".DS."sqlservice".".php" );
                                                require_once( "service".DS.$R101593cf9f.".php" );
                                                $R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
                                }
                                return $R5775fcd129[$R101593cf9f];
                }

                public function &GetEsales( $R101593cf9f )
                {
                                static $R5775fcd129 = NULL;
                                if ( !isset( $R5775fcd129 ) )
                                {
                                                $R5775fcd129 = array( );
                                }
                                if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
                                {
                                                require_once( "esales".DS."sqlesales.php" );
                                                require_once( "esales".DS.$R101593cf9f.".php" );
                                                $R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
                                }
                                return $R5775fcd129[$R101593cf9f];
                }

                public function &GetFs( $R101593cf9f )
                {
                                static $R5775fcd129 = NULL;
                                if ( !isset( $R5775fcd129 ) )
                                {
                                                $R5775fcd129 = array( );
                                }
                                if ( !isset( $R5775fcd129[$R101593cf9f] ) || !is_object( $R5775fcd129[$R101593cf9f] ) )
                                {
                                                require_once( "fs".DS.$R101593cf9f.".php" );
                                                $R5775fcd129[$R101593cf9f] = new $R101593cf9f( );
                                }
                                return $R5775fcd129[$R101593cf9f];
                }

}


?>
