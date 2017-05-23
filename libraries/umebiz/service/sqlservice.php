<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class sqlservice
{

                public $param = NULL;
                public $ubzuid = "18888";
                public $ubzupwd = "18888";
                public $tpl = NULL;
                public $ext = NULL;
                public $serv = NULL;
                public $url = NULL;
                public $host = NULL;
                public $buffer = NULL;
                public $linkerr = NULL;
                public $fresh = NULL;

                public function __construct( )
                {
                                $this->ubzuid = "";
                                $this->init( );
                }

                public function init( )
                {
                                $this->buffer = "";
                                $this->ext = ".asp";
                                $this->serv = "api.umebiz.com";
                                $this->host = $this->GetHost( );
                }

                public function init2( $R5b92e56774 = 1 )
                {
                                $this->buffer = "";
                                $this->reset( );
                                $this->ext = ".asp";
                                $this->serv = "api".$R5b92e56774.".umebiz.com";
                                $this->host = $this->GetHost( );
                }

                public function add( $name, $R3882a427af )
                {
                                $this->param[] = sprintf( "%s=%s", $name, $R3882a427af );
                }

                public function reset( )
                {
                                if ( $this->ubzuid == "" )
                                {
                                                $R7bf6de464c = factory::getinstance( "sysnet" );
                                                $R3db8f5c8bc = $R7bf6de464c->ISysnet_Get( );
                                                $this->ubzuid = $R3db8f5c8bc['uid'];
                                                $this->ubzupwd = $R3db8f5c8bc['upwd'];
                                }
                                $this->param = array( );
                                $this->add( "ubzuid", $this->ubzuid );
                                $this->add( "ubzupwd", $this->ubzupwd );
                }

                public function buf( )
                {
                                $this->fresh = 1;
                }

                public function IUmebiz_Read( )
                {
                                if ( $this->fresh == 1 )
                                {
                                    $this->buffer = '';
                                }
                }

                public function IUmebiz_GetData( $data, $R9afaabccd6, $R5cc00cfbe4 = 0 )
                {
                                $R3db8f5c8bc = array( );
                                $R1a1fdd68d3 = "|<".$R9afaabccd6.">(.+?)<\\/".$R9afaabccd6.">|s";
                                preg_match_all( $R1a1fdd68d3, $data, $R2bc3a0f355 );
                                if ( $R5cc00cfbe4 == 1 )
                                {
                                                if ( 0 < count( $R2bc3a0f355[1] ) )
                                                {
                                                                return $R2bc3a0f355[1][0];
                                                }
                                                else
                                                {
                                                                return "-9999";
                                                }
                                }
                                
                                for ( $Ra16d228039 = 0; $Ra16d228039 < count( $R2bc3a0f355[1] );    $Ra16d228039++  )
                                {
                                                preg_match_all( "|(<([A-Za-z0-9_]+)>.*</\\2>)|is", $R2bc3a0f355[1][$Ra16d228039], $R19b9fe94a3 );
                                                $R19a6b9dac2 = "";
                                                $Ra7b9a38368 = 0;
                                                for ( ; $Ra7b9a38368 < count( $R19b9fe94a3[1] );    ++$Ra7b9a38368  )
                                                {
                                                                preg_match( "/<(.+)>(.*)<\\/\\1>/is", $R19b9fe94a3[1][$Ra7b9a38368], $Re9fb3ca903 );
                                                                if ( 0 < count( $Re9fb3ca903 ) )
                                                                {
                                                                                $Ra3d52e52a4 = preg_replace( "/\\<!\\[CDATA\\[(.*)\\]\\]\\>/s", "\\1", $Re9fb3ca903[2] );
                                                                                $R19a6b9dac2 .= "'{$Re9fb3ca903['1']}'=>'{$Ra3d52e52a4}'";
                                                                                if ( $Ra7b9a38368 < count( $R19b9fe94a3[1] ) - 1 )
                                                                                {
                                                                                                $R19a6b9dac2 .= ",";
                                                                                }
                                                                }
                                                }
                                                $R19a6b9dac2 = str_replace( "\\", "\\\\", $R19a6b9dac2 );
                                                eval( "\$R3db8f5c8bc[]=array({$R19a6b9dac2});" );
                                }
                                return $R3db8f5c8bc;
                }

                public function &IUmebiz_Page( )
                {
                                $R3db8f5c8bc = array( );
                                $R3db8f5c8bc['item'] = $this->IUmebiz_GetData( $this->buffer, "item", 0 );
                                $Rf94d2d27ec = $this->IUmebiz_GetData( $this->buffer, "globeitem", 0 );
                                $R3db8f5c8bc['info'] = array( );
                                $R3db8f5c8bc['info']['thispage'] = isset( $Rf94d2d27ec[0]['page'] ) ? $Rf94d2d27ec[0]['page'] : 0;
                                $R3db8f5c8bc['info']['totlepage'] = isset( $Rf94d2d27ec[0]['pagecount'] ) ? $Rf94d2d27ec[0]['pagecount'] : 0;
                                $R3db8f5c8bc['info']['prepage'] = isset( $Rf94d2d27ec[0]['prepage'] ) ? $Rf94d2d27ec[0]['prepage'] : 0;
                                $R3db8f5c8bc['info']['nextpage'] = isset( $Rf94d2d27ec[0]['nextpage'] ) ? $Rf94d2d27ec[0]['nextpage'] : 0;
                                if ( $R3db8f5c8bc['info']['thispage'] == $R3db8f5c8bc['info']['totlepage'] )
                                {
                                                $R3db8f5c8bc['info']['nextstate'] = "disabled";
                                }
                                else
                                {
                                                $R3db8f5c8bc['info']['nextstate'] = "";
                                }
                                if ( $R3db8f5c8bc['info']['thispage'] == $R3db8f5c8bc['info']['prepage'] )
                                {
                                                $R3db8f5c8bc['info']['prestate'] = "disabled";
                                }
                                else
                                {
                                                $R3db8f5c8bc['info']['prestate'] = "";
                                }
                                $R3db8f5c8bc['info']['totlerow'] = isset( $Rf94d2d27ec[0]['itemTotle'] ) ? $Rf94d2d27ec[0]['itemTotle'] : isset( $Rf94d2d27ec[0]['itemtotle'] ) ? $Rf94d2d27ec[0]['itemtotle'] : 0;
                                return $R3db8f5c8bc;
                }

                public function IUmebiz_Event( $R50454f0578, $data, $fresh = 1 )
                {
                                $this->reset( );
                                include( dirname( __FILE__ ).DS."config.php" );
                                foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
                                {
                                                $this->add( $Ra09fe38af3, $Ra3d52e52a4 );
                                }
                                $this->fresh = $fresh;
                                $this->url = $R14af1be9ee[$R50454f0578];
                                $this->IUmebiz_Read( );
                }

                public function IUmebiz_Event2( $R50454f0578, $data, $fresh = 1 )
                {
                                $this->IUmebiz_Event( $R50454f0578, $data, $fresh );
                                
                                for ($Ra16d228039 = 1; $Ra16d228039 < 9;    $Ra16d228039++  )
                                {
                                                $Rc8fd32e12e = $this->buffer;
                                                if ( !( $this->linkerr == -999 || strpos( $Rc8fd32e12e, "xml version=" ) === false ) )
                                                {
                                                                break;
                                                }
                                                $this->init2( $Ra16d228039 );
                                                $this->IUmebiz_Event( $R50454f0578, $data, $fresh );
                                                continue;
                                                break;
                                }
                }

                public function &LinkData( )
                {
                    $ret = array();
                    return $ret;
                                $Rc2d2567438 = implode( "&", $this->param );
                                $R7b751b7406 = strlen( $Rc2d2567438 );
                                $Rf500f4a848 = fsockopen( $this->serv, 80, $R32d00070d4, $R5f525f5b39, 10 );
                                $Re82ee9b121 = "";
                                if ( $Rf500f4a848 )
                                {
                                                $R972a1d6d7f = "POST /cs/".$this->url.$this->ext." HTTP/1.1 \r\n";
                                                $R972a1d6d7f .= "Host:".$this->serv." \r\n";
                                                $R972a1d6d7f .= "Referer: ".$this->host." \r\n";
                                                $R972a1d6d7f .= "Content-Type: application/x-www-form-urlencoded\r\n";
                                                $R972a1d6d7f .= "Content-Length: ".$R7b751b7406."\r\n";
                                                $R972a1d6d7f .= "Connection: Close\r\n\r\n";
                                                $R972a1d6d7f .= $Rc2d2567438."\r\n";
                                                fputs( $Rf500f4a848, $R972a1d6d7f );
                                                $R6670b7b1bf = 1;
                                                while ( !feof( $Rf500f4a848 ) )
                                                {
                                                                $R9061c9fef1 = fgets( $Rf500f4a848, 1024 );
                                                                if ( $R6670b7b1bf && ( $R9061c9fef1 == "\n" || $R9061c9fef1 == "\r\n" ) )
                                                                {
                                                                                $R6670b7b1bf = 0;
                                                                }
                                                                if ( $R6670b7b1bf == 0 )
                                                                {
                                                                                $Re82ee9b121 .= $R9061c9fef1;
                                                                }
                                                }
                                                fclose( $Rf500f4a848 );
                                                $this->linkerr = 1;
                                }
                                else
                                {
                                                $this->linkerr = 1;
                                                return file_get_contents( "http://".$this->serv."/cs/".$this->url.$this->ext."?".$Rc2d2567438 );
                                }
                                return $Re82ee9b121;
                }

                public function PMA_getenv( $Ra6ac55afc0 )
                {
                                if ( isset( $_SERVER[$Ra6ac55afc0] ) )
                                {
                                                return $_SERVER[$Ra6ac55afc0];
                                }
                                else if ( isset( $_ENV[$Ra6ac55afc0] ) )
                                {
                                                return $_ENV[$Ra6ac55afc0];
                                }
                                else if ( getenv( $Ra6ac55afc0 ) )
                                {
                                                return getenv( $Ra6ac55afc0 );
                                }
                                else if ( function_exists( "apache_getenv" ) && apache_getenv( $Ra6ac55afc0, true ) )
                                {
                                                return apache_getenv( $Ra6ac55afc0, true );
                                }
                                return "";
                }

                public function GetHost( )
                {
                                if ( empty( $Rcb523a8670 ) )
                                {
                                                if ( $this->PMA_getenv( "HTTP_HOST" ) )
                                                {
                                                                $Rcb523a8670 = $this->PMA_getenv( "HTTP_HOST" );
                                                }
                                                else
                                                {
                                                                $Rcb523a8670 = "";
                                                }
                                }
                                return htmlspecialchars( $Rcb523a8670 );
                }

                public function GetIp( )
                {
                                return $_SERVER['REMOTE_ADDR'];
                }

}

if ( !defined( "UPATH_ROOT" ) )
{
                exit( "hacking deny" );
}
?>
