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
require_once( "class.phpmailer.php" );
include_once( UPATH_HELPER."ArticleHelper.php" );
class phpmail extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IMail_CReg( $data = array( ) )
				{
								$this->reset( );
								global $masterid;
								$this->add( "aid", $masterid );
								$result = $this->SelectRecord( "sysinfo", "postsetting,website,webname,mailserver,mailuser,mailpass,aregmailtitle,aregmailbody" );
								$rs = $result[0];
								if ( !isset( $rs['mailuser'] ) )
								{
												return;
								}
								$tmp = explode( "|", $rs['postsetting'] );
								if ( $tmp[0] == 0 )
								{
												return;
								}
								$mail = new PHPMailer( );
								$body = decodeubb( $rs['aregmailbody'] );
								$body = eregi_replace( "{username}", $data['cname'], $body );
								$body = eregi_replace( "{userpass}", $data['cpwd'], $body );
								$body = eregi_replace( "{website}", $rs['website'], $body );
								$body = eregi_replace( "{date}", date( "Y-m-d H-i-s" ), $body );
								$mail->CharSet = "GB2312";
								$mail->IsSMTP( );
								$mail->Host = $rs['mailserver'];
								$mail->SMTPDebug = 0;
								$mail->SMTPAuth = true;
								$mail->Host = $rs['mailserver'];
								$mail->Port = 25;
								$mail->Username = $rs['mailuser'];
								$mail->Password = $rs['mailpass'];
								$mail->SetFrom( $rs['mailuser'], $rs['webname'] );
								$mail->AddReplyTo( $rs['mailuser'], $rs['webname'] );
								$mail->Subject = $rs['cregmailtitle'];
								$mail->MsgHTML( $body );
								$address = $data['cmail'];
								$mail->AddAddress( $address, $rs['webname']."会员" );
								if ( !$mail->Send( ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function IMail_CBuy( $data = array( ) )
				{
								$this->reset( );
								global $masterid;
								$this->add( "aid", $masterid );
								$result = $this->SelectRecord( "sysinfo", "postsetting,website,webname,mailserver,mailuser,mailpass,mailtitle,mailcontent" );
								$rs = $result[0];
								if ( !isset( $rs['mailuser'] ) )
								{
												return;
								}
								$tmp = explode( "|", $rs['postsetting'] );
								if ( $tmp[1] == 0 )
								{
												return;
								}
								$this->reset( );
								$this->add( "ordno", $data['ordno'] );
								$orderrs = $this->SelectRecord( "orders", "pname,qty,ptype,pid,ordstate" );
								$orderrs = $orderrs[0];
								if ( !isset( $orderrs['pid'] ) )
								{
												return;
								}
								if ( $orderrs['ordstate'] != 2 )
								{
												return;
								}
								$result = "";
								if ( $orderrs['ptype'] == 0 || $orderrs['ptype'] == 3 || $orderrs['ptype'] == 100 || $orderrs['ptype'] == 101 )
								{
												$this->reset( );
												$this->add( "ordno", $data['ordno'] );
												$cardrs = $this->SelectRecord( "cards" );
												foreach ( $cardrs as $item )
												{
																$result .= "卡号：".$item['cardnumber']."   密码：".base64_decode( $item['cardpwd'] )."<br/>";
												}
								}
								else
								{
												$result = "交易完成";
								}
								$ptype = $orderrs['ptype'] == 0 || $orderrs['ptype'] == 3 || $orderrs['ptype'] == 100 || $orderrs['ptype'] == 101 ? "卡密类" : "非卡密类";
								$mail = new PHPMailer( );
								$body = decodeubb( $rs['mailcontent'] );
								$body = eregi_replace( "{ordno}", $data['ordno'], $body );
								$body = eregi_replace( "{username}", $data['username'], $body );
								$body = eregi_replace( "{webname}", $rs['webname'], $body );
								$body = eregi_replace( "{pname}", $orderrs['pname'], $body );
								$body = eregi_replace( "{ptype}", $ptype, $body );
								$body = eregi_replace( "{result}", $result, $body );
								$body = eregi_replace( "{website}", $rs['website'], $body );
								$body = eregi_replace( "{date}", date( "Y-m-d H-i-s" ), $body );
								$mail->CharSet = "GB2312";
								$mail->IsSMTP( );
								$mail->Host = $rs['mailserver'];
								$mail->SMTPDebug = 0;
								$mail->SMTPAuth = true;
								$mail->Host = $rs['mailserver'];
								$mail->Port = 25;
								$mail->Username = $rs['mailuser'];
								$mail->Password = $rs['mailpass'];
								$mail->SetFrom( $rs['mailuser'], $rs['webname'] );
								$mail->AddReplyTo( $rs['mailuser'], $rs['webname'] );
								$mail->Subject = $rs['mailtitle'];
								$mail->MsgHTML( $body );
								$address = $data['cmail'];
								$mail->AddAddress( $address, $rs['webname']."客户" );
								if ( !$mail->Send( ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function IMail_AReg( $data = array( ) )
				{
								$this->reset( );
								global $masterid;
								$this->add( "aid", $masterid );
								$result = $this->SelectRecord( "sysinfo", "postsetting,website,webname,mailserver,mailuser,mailpass,aregmailtitle,aregmailbody" );
								$rs = $result[0];
								if ( !isset( $rs['mailuser'] ) )
								{
												return;
								}
								$tmp = explode( "|", $rs['postsetting'] );
								if ( $tmp[2] == 0 )
								{
												return;
								}
								$mail = new PHPMailer( );
								$body = decodeubb( $rs['aregmailbody'] );
								$body = eregi_replace( "{username}", $data['aname'], $body );
								$body = eregi_replace( "{userpass}", $data['apwd'], $body );
								$body = eregi_replace( "{website}", $rs['website'], $body );
								$body = eregi_replace( "{date}", date( "Y-m-d H-i-s" ), $body );
								$mail->CharSet = "GB2312";
								$mail->IsSMTP( );
								$mail->Host = $rs['mailserver'];
								$mail->SMTPDebug = 0;
								$mail->SMTPAuth = true;
								$mail->Host = $rs['mailserver'];
								$mail->Port = 25;
								$mail->Username = $rs['mailuser'];
								$mail->Password = $rs['mailpass'];
								$mail->SetFrom( $rs['mailuser'], $rs['webname'] );
								$mail->AddReplyTo( $rs['mailuser'], $rs['webname'] );
								$mail->Subject = $rs['aregmailtitle'];
								$mail->MsgHTML( $body );
								$address = $data['amail'];
								$mail->AddAddress( $address, $rs['webname']."经销商" );
								if ( !$mail->Send( ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

}

?>
