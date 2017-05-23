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
class LoginController extends Controller
{

				public $session = NULL;

				public function __construct( )
				{
								$this->session = factory::getinstance( "session" );
				}

				public function CheckCode( )
				{
								$Rb7da52a305 = "";
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = trim( getvar( "verifycode", "", "POST" ) );
								if ( $Rd19ae93b31 == "" || strtolower( $Rb7da52a305 ) != strtolower( $Rd19ae93b31 ) )
								{
												$this->Alert( "验证码出错" );
												$this->HistoryGo( );
												exit( );
								}
				}

				public function Login( )
				{
								$R581012b834 = $this->GetSysById( 10, 1 );
								if ( $R581012b834 )
								{
												$this->CheckCode( );
								}
								$R5d899a20a5 = getvar( "aname" );
								if ( trim( $R5d899a20a5 ) == "" )
								{
												$this->Alert( "请输入您的用户名" );
												$this->HistoryGo( );
								}
								$R0dc0347d49 = getvar( "staffname", "" );
								$R00bb5d9597 = md5( getvar( "pwd" ) );
								$Rdb9dec9d1c = 0;
								$Rad3482f4ca = getvar( "mac" );
								$R03a88a8ff8 = getvar( "cpu" );
								$R9665b7d660 = getvar( "hde" );
								$R9cfb7c6d6b = $_SERVER['REMOTE_ADDR'];
								$Re5584ed794 = array(
												"isbindhard" => $Rdb9dec9d1c,
												"mac" => $Rad3482f4ca,
												"cpu" => $R03a88a8ff8,
												"hde" => $R9665b7d660,
												"ip" => $R9cfb7c6d6b
								);
								if ( $R5d899a20a5 != "" && $R0dc0347d49 == "" )
								{
												$this->AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 );
								}
								else if ( $R5d899a20a5 == "" && $R0dc0347d49 != "" )
								{
												$this->StaffLogin( $R0dc0347d49, $R00bb5d9597, $Re5584ed794 );
								}
				}

				public function AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Login( $R5d899a20a5, $R00bb5d9597, 1, $Re5584ed794 );
								$this->Assign( "islogin", 0 );
								if ( $R4e420efcc3 == 0 )
								{
												$this->Alert( "商家不存在" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 2 )
								{
												$this->Alert( "您的帐户系统还没有开通或者已经被动结！请联系系统解冻" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 1 )
								{
												$this->Alert( "密码输入有误" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 7 )
								{
												$this->Alert( "您还没有设置绑定任何硬件，请使用不绑定硬件登陆！" );
												$this->HistoryGo( );
								}
								else if ( $R4e420efcc3 == 3 || $R4e420efcc3 == 4 || $R4e420efcc3 == 5 || $R4e420efcc3 == 6 )
								{
												$this->Alert( "您设置硬件绑定登录，请找到您设置绑定的电脑登录！" );
												$this->HistoryGo( );
								}
								else
								{
												list( $R3db8f5c8bc, $R3db8f5c8bc ) = $R4e420efcc3;
												$R046b4585a2 = $R2097a8fddf->IAgent_GetRankById( $R3db8f5c8bc['alv'] );
												if ( !isset( $R046b4585a2['name'] ) )
												{
																$this->Alert( "您的级别有问题，请和管理员联系！" );
																$this->HistoryGo( );
												}
												if ( 0 < $R046b4585a2['gid'] )
												{
																$this->Alert( "经销商用户无法登陆批发以外的系统！" );
																$this->HistoryGo( );
												}
												$R6009e84434 = $R046b4585a2['name'];
												$data = $R3db8f5c8bc['aname']."|".$R3db8f5c8bc['company']."|".$R6009e84434."|".$R3db8f5c8bc['prv'].$R3db8f5c8bc['city']."|".$R3db8f5c8bc['parentid']."|".$R3db8f5c8bc['alv']."|".$R3db8f5c8bc['aremain']."|".$R3db8f5c8bc['aid']."|".$R00bb5d9597."|0";
												$this->session->set( "userinfo", $data );
												$R7130865f2e = $_SERVER['HTTP_REFERER'];
												$Re8edbc5f92 = intval( request( "vfromsite" ) );
												if ( $Re8edbc5f92 == 3 && strpos( $R7130865f2e, "?" ) === false )
												{
																$this->ScriptRedirect( "./ykt" );
												}
												else
												{
																$this->ScriptRedirect( $R7130865f2e );
												}
								}
				}

				public function Logout( )
				{
								$R034ae2ab94 = getvar( "ret" );
								$this->session->userlogout( );
								if ( $R034ae2ab94 == "" )
								{
												$R7130865f2e = $_SERVER['HTTP_REFERER'];
								}
								else
								{
												$R7130865f2e = $R034ae2ab94;
								}
								$Re8edbc5f92 = intval( request( "vfromsite" ) );
								if ( $Re8edbc5f92 == 3 && strpos( $R7130865f2e, "?" ) === false )
								{
												$this->ScriptRedirect( "./ykt" );
								}
								else
								{
												$this->ScriptRedirect( $R7130865f2e );
								}
				}

}

?>
