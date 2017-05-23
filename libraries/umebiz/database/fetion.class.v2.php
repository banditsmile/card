<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class vs_fetion
{

				protected $_mobile = NULL;
				protected $_password = NULL;
				protected $_cookie = "";

				public function __construct( $mobile, $password )
				{
								if ( $mobile === "" || $password === "" )
								{
												return false;
								}
								$this->_mobile = $mobile;
								$this->_password = $password;
								$this->_login( );
				}

				public function __destruct( )
				{
								$this->_logout( );
				}

				protected function _login( )
				{
								$uri = "/im/login/inputpasssubmit1.action";
								$data = "m=".$this->_mobile."&pass=".urlencode( $this->_password )."&loginstatus=1";
								$result = $this->_postWithCookie( $uri, $data );
								preg_match_all( "/.*?\\r\\nSet-Cookie: (.*?);.*?/si", $result, $matches );
								if ( isset( $matches[1] ) )
								{
												$this->_cookie = implode( "; ", $matches[1] );
								}
								return $result;
				}

				public function send( $mobile, $message )
				{
								if ( $message === "" )
								{
												return "";
								}
								if ( $mobile == $this->_mobile )
								{
												return $this->_toMyself( $message );
								}
								else
								{
												$uid = $this->_getUid( $mobile );
												return $uid === "" ? "" : $this->_toUid( $uid, $message );
								}
				}

				protected function _getUid( $mobile )
				{
								$uri = "/im/index/searchOtherInfoList.action";
								$data = "searchText=".$mobile;
								$result = $this->_postWithCookie( $uri, $data );
								preg_match( "/toinputMsg\\.action\\?touserid=(\\d+)/si", $result, $matches );
								return isset( $matches[1] ) ? $matches[1] : "";
				}

				protected function _toUid( $uid, $message )
				{
								$uri = "/im/chat/sendMsg.action?touserid=".$uid;
								$data = "msg=".urlencode( $message );
								$result = $this->_postWithCookie( $uri, $data );
								return $result;
				}

				protected function _toMyself( $message )
				{
								$uri = "/im/user/sendMsgToMyselfs.action";
								$result = $this->_postWithCookie( $uri, "msg=".urlencode( $message ) );
								return $result;
				}

				protected function _logout( )
				{
								$uri = "/im/index/logoutsubmit.action";
								$result = $this->_postWithCookie( $uri, "" );
								return $result;
				}

				protected function _postWithCookie( $uri, $data )
				{
								$fp = fsockopen( "f.10086.cn", 80 );
								fputs( $fp, "POST {$uri} HTTP/1.1\r\n" );
								fputs( $fp, "Host: f.10086.cn\r\n" );
								fputs( $fp, "Cookie: {$this->_cookie}\r\n" );
								fputs( $fp, "Content-Type: application/x-www-form-urlencoded\r\n" );
								fputs( $fp, "Content-Length: ".strlen( $data )."\r\n" );
								fputs( $fp, "Connection: close\r\n\r\n" );
								fputs( $fp, $data );
								$result = "";
								while ( !feof( $fp ) )
								{
												$result .= fgets( $fp );
								}
								fclose( $fp );
								return $result;
				}

}

?>
