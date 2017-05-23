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
class ToolController extends Controller
{

				public function __construct( )
				{
								$this->session = factory::getinstance( "session" );
				}

				public function Index( )
				{
								$Rb7da52a305 = "";
								$Rb7da52a305 = getvar( "v1", "", "POST" );
								$Rd19ae93b31 = getvar( "verifycode", "", "POST" );
								if ( $Rb7da52a305 != "" )
								{
												$Rb7da52a305 = $this->Mncrypt( $Rb7da52a305 );
								}
								if ( $Rd19ae93b31 == "" || $Rb7da52a305 != $Rd19ae93b31 )
								{
												$this->Alert( "验证码出错" );
												$this->CloseWin( );
												exit( );
								}
								$R5d899a20a5 = getvar( "aname", "", "POST" );
								$R0dc0347d49 = getvar( "staffname", "", "POST" );
								$R00bb5d9597 = getvar( "pwd", "", "POST" );
								$Rdb9dec9d1c = 1;
								$R3cb9cdaed2 = getvar( "s" );
								$Rcc5c6e696c = explode( "|", $R3cb9cdaed2 );
								if ( count( $Rcc5c6e696c ) == 2 )
								{
												$Rad3482f4ca = $Rcc5c6e696c[0];
												$R03a88a8ff8 = $Rcc5c6e696c[1];
								}
								else
								{
												$Rad3482f4ca = "";
												$R03a88a8ff8 = "";
								}
								$R9665b7d660 = "";
								$R9cfb7c6d6b = $this->GetIp( );
								$Re5584ed794 = array(
												"isbindhard" => $Rdb9dec9d1c,
												"mac" => $Rad3482f4ca,
												"cpu" => $R03a88a8ff8,
												"hde" => $R9665b7d660,
												"ip" => $R9cfb7c6d6b,
												"randcode" => $Rb7da52a305
								);
								if ( $R5d899a20a5 != "" && $R0dc0347d49 == "" )
								{
												$this->AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 );
								}
								else if ( $R5d899a20a5 == "" && $R0dc0347d49 != "" )
								{
												$this->StaffLogin( $R0dc0347d49, $R00bb5d9597, $Re5584ed794 );
								}
								$this->Alert( "操作有误！\\n\\n1.请重新打开登陆器登陆" );
								$this->CloseWin( );
				}

				public function AgentLogin( $R5d899a20a5, $R00bb5d9597, $Re5584ed794 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Login( $R5d899a20a5, $R00bb5d9597, 1, $Re5584ed794 );
								if ( $R4e420efcc3 == 0 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "用户名不存在，登陆失败", 0 );
												$this->Alert( "商家不存在，请确认是否输入错误或者登陆类型选择错误" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 2 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "客户未开通，登陆失败", 0 );
												$this->Alert( "您的帐户系统还没有开通或者已经被冻结！请联系您的上级代理商" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 1 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "密码错误，登陆失败", 0 );
												$this->Alert( "密码输入有误".$R00bb5d9597 );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 7 )
								{
												$this->Alert( "您还没有设置绑定任何硬件，请使用不绑定硬件登陆！" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 3 || $R4e420efcc3 == 4 || $R4e420efcc3 == 6 )
								{
												$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "设置了硬件绑定，非本机登陆，登陆失败", 0 );
												$this->Alert( "您好，进货器绑定了电脑，请找对应的电脑登录系统，如需改绑，请联系客服！" );
												$this->CloseWin( );
								}
								else
								{
												if ( $R4e420efcc3 == 5 )
												{
																$this->Alert( "您好，登陆器不支持绑定硬盘，请使用网页登陆！" );
																$this->GoHome( "b2b" );
																exit( );
												}
												else
												{
																if ( !isset( $R4e420efcc3[0]['aid'] ) )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "异常错误，登陆失败", 0 );
																				$this->Alert( "异常错误" );
																				$this->CloseWin( );
																}
																$this->CheckHardBind( $R4e420efcc3[0]['aid'], 0 );
																$R3db8f5c8bc = $R4e420efcc3[0];
																$this->IsFrozenTime( $R3db8f5c8bc, 1 );
																if ( $this->CheckMiBaoKa( $R3db8f5c8bc['aid'], 0 ) == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "密保输入错误，登陆失败", 0 );
																				$this->Alert( "密保输入错误，请重新输入" );
																				$this->CloseWin( );
																}
																if ( $this->VerifyMobile( $R3db8f5c8bc['aid'], 0 ) == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "令牌输入错误，登陆失败", 0 );
																				$this->Alert( "令牌输入错误，请重新输入" );
																				$this->GoHome( "b2b" );
																}
																$R046b4585a2 = $this->GetRank( $R3db8f5c8bc['alv'] );
																if ( !isset( $R046b4585a2['name'] ) )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "客户级别有问题，可能是系统设置有问题，登陆失败", 0 );
																				$this->Alert( "您的级别有问题，请和客服联系！" );
																				$this->CloseWin( );
																}
																if ( $R046b4585a2['gid'] == 0 )
																{
																				$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "会员用户无法登陆经销商系统，登陆失败", 0 );
																				$this->Alert( "会员用户无法登陆经销商系统！" );
																				$this->CloseWin( );
																}
																if ( 0 < $R3db8f5c8bc['parentid'] )
																{
																				$R9aa102385f = $this->GetAgentCache( $R3db8f5c8bc['parentid'] );
																				if ( !isset( $R9aa102385f['frozen'] ) )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "上家不存在，登陆失败", 0 );
																								$this->Alert( "您的上家已经不存在，请联系平台客服咨询！" );
																								$this->CloseWin( );
																				}
																				else if ( $R9aa102385f['frozen'] == 1 )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "上家被冻结，登陆失败", 0 );
																								$this->Alert( "您的上家已经被冻结，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																				$R4906cf6137 = $this->GetRank( $R9aa102385f['alv'] );
																				if ( !isset( $R4906cf6137['name'] ) )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "上家级别有问题，登陆失败", 0 );
																								$this->Alert( "您的上家级别有问题，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																				$R4420266e85 = $this->GetRankType( );
																				if ( $R4420266e85 )
																				{
																								if ( $R4906cf6137['gid'] <= $R046b4585a2['gid'] )
																								{
																												$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "上家或被降级，登陆失败", 0 );
																												$this->Alert( "您的上家或被降级，导致您的级别出现问题，无法登陆，请联系您的上家！" );
																												$this->CloseWin( );
																								}
																				}
																				else if ( $R4906cf6137['money'] <= $R046b4585a2['money'] )
																				{
																								$this->AddLogin( 0, 0, $R5d899a20a5, 1, 1, "上家或被降级，登陆失败", 0 );
																								$this->Alert( "您的上家或被降级，导致您的级别出现问题，无法登陆，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																}
																setcookie( "umebiz_com_gid", "", time( ) - 3600 );
																setcookie( "umebiz_com_gid", $R046b4585a2['gid'], time( ) + 86400 );
																$this->SetWebCookie( $R3db8f5c8bc['aid'], 1 );
																$R6009e84434 = $R046b4585a2['name'];
																$data = $R3db8f5c8bc['aname']."|".$R3db8f5c8bc['company']."|".$R6009e84434."|".$R3db8f5c8bc['prv'].$R3db8f5c8bc['city']."|".$R3db8f5c8bc['parentid']."|".$R3db8f5c8bc['alv']."|".$R3db8f5c8bc['aremain']."|".$R3db8f5c8bc['aid']."|".$R00bb5d9597."|0|0|".$R3db8f5c8bc['leftrights'];
																$this->AddLogin( $R3db8f5c8bc['aid'], 0, $R3db8f5c8bc['aname'], 1, 1, "成功登陆", 1 );
																$this->session->set( "agentinfo", $data );
																$this->SetConfig( );
																$this->LoginGo( );
												}
								}
				}

				public function CheckHardBind( $R2a51483b14, $R94e0136c8a )
				{
								$R87e0e24ae0 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$R3cb9cdaed2 = getvar( "s" );
								$Rcc5c6e696c = explode( "|", $R3cb9cdaed2 );
								if ( count( $Rcc5c6e696c ) == 2 )
								{
												$Rad3482f4ca = $Rcc5c6e696c[0];
												$R03a88a8ff8 = $Rcc5c6e696c[1];
								}
								else
								{
												$Rad3482f4ca = "";
												$R03a88a8ff8 = "";
								}
								if ( !isset( $R87e0e24ae0['maccheck'] ) && $R03a88a8ff8 != "" )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"staffid" => $R94e0136c8a,
																"maccheck" => 1,
																"mac" => $Rad3482f4ca,
																"cpucheck" => 1,
																"cpu" => $R03a88a8ff8
												);
												$R022cf23e8d = factory::getinstance( "security" );
												$R022cf23e8d->ISecurity_Create( $data );
								}
								else if ( $R87e0e24ae0['maccheck'] == 1 && ( trim( $Rad3482f4ca ) == "" || strpos( ",".$R87e0e24ae0['mac'].",", ",".$Rad3482f4ca."," ) === false ) )
								{
												$this->Alert( "您好，进货器绑定了电脑，请找对应的电脑登录系统，如需改绑，请联系客服" );
												$this->CloseWin( );
								}
								else if ( $R87e0e24ae0['cpucheck'] == 1 && ( trim( $R03a88a8ff8 ) == "" || strpos( ",".$R87e0e24ae0['cpu'].",", ",".$R03a88a8ff8."," ) === false ) )
								{
												$this->Alert( "您好，进货器绑定了电脑，请找对应的电脑登录系统，如需改绑，请联系客服" );
												$this->CloseWin( );
								}
				}

				public function CheckMiBaoKa( $R2a51483b14, $R94e0136c8a )
				{
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$R60125139d3 = getvar( "v2", "", "POST" );
								if ( isset( $R679e9b9234['mibaokacheck'] ) && $R679e9b9234['mibaokacheck'] == 1 )
								{
												if ( $R60125139d3 != "" )
												{
																$R60125139d3 = $this->Mncrypt( $R60125139d3 );
																$Rcc5c6e696c = explode( " ", $R60125139d3 );
																$Rd919497634 = factory::getinstance( "mibaoka" );
																$R3db8f5c8bc = $Rd919497634->IMiBaoKa_GetBySn( $R679e9b9234['mibaoka'] );
																if ( isset( $R3db8f5c8bc['xy'] ) )
																{
																				$R16182d95f4 = unserialize( $R3db8f5c8bc['xy'] );
																				$R63bede6b19 = "";
																				foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																				{
																								$R63bede6b19 .= $R16182d95f4[$R0f8134fb60];
																				}
																				$R2b9fd8dfe3 = getvar( "mibaocode" );
																				if ( $R63bede6b19 != $R2b9fd8dfe3 )
																				{
																								return 0;
																				}
																				else
																				{
																								return 1;
																				}
																}
																else
																{
																				$this->Alert( "您的密保卡已经被管理员删除，请联系管理员" );
																				$this->CloseWin( );
																}
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function SetWebCookie( $R2a51483b14, $R70e13706d8 = 0, $R94e0136c8a = 0 )
				{
								$R3db8f5c8bc = $this->GetAgentCache( $R2a51483b14 );
								$R8eeb1221ae = explode( "|", $R3db8f5c8bc['websetting'] );
								$Rf5f11a8d38 = count( $R8eeb1221ae );
								if ( $R70e13706d8 == 1 && isset( $R8eeb1221ae[6] ) && $R8eeb1221ae[6] == 0 )
								{
												$this->Alert( "您好，您已经设置不允许通过登录器方式登录！" );
												$this->CloseWin( );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												setcookie( "umebiz_com_".$Ra16d228039, "", time( ) - 3600 );
												setcookie( "umebiz_com_".$Ra16d228039, $R8eeb1221ae[$Ra16d228039], time( ) + 86400 );
								}
								if ( 0 < $R94e0136c8a )
								{
												setcookie( "umebiz_com_staff", "", time( ) - 3600 );
												setcookie( "umebiz_com_staff", 1, time( ) + 86400 );
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												if ( !isset( $Raac42e4217['checktradepwd'] ) )
												{
																$this->Alert( "非法登陆" );
																$this->CloseWin( );
												}
												else
												{
																setcookie( "umebiz_com_8", "", time( ) - 3600 );
																setcookie( "umebiz_com_8", $Raac42e4217['checktradepwd'], time( ) + 86400 );
																$R61ccd04e96 = $Raac42e4217['ini'];
																$R8eeb1221ae = explode( "|", $R61ccd04e96 );
																$Rf5f11a8d38 = count( $R8eeb1221ae );
																
																for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
																{
																				setcookie( "umebiz_com_ini_".$Ra16d228039, "", time( ) - 3600 );
																				setcookie( "umebiz_com_ini_".$Ra16d228039, $R8eeb1221ae[$Ra16d228039], time( ) + 86400 );
																}
												}
								}
								else
								{
												setcookie( "umebiz_com_staff", "", time( ) - 3600 );
												setcookie( "umebiz_com_staff", 0, time( ) + 86400 );
								}
				}

				public function StaffHistoryGo( )
				{
								$this->ScriptRedirect( UPATH_WEBROOT."b2b/" );
				}

				public function StaffLogin( $R0dc0347d49, $Rc509b4f207, $Re5584ed794 )
				{
								$R2097a8fddf = factory::getinstance( "staffs" );
								$R4e420efcc3 = $R2097a8fddf->IStaff_Login( $R0dc0347d49, $Rc509b4f207, 1, $Re5584ed794 );
								if ( $R4e420efcc3 == 0 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "员工账号不存在，登陆失败", 0 );
												$this->Alert( "员工不存在，请确认是否输入错误或者登陆类型选择错误" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 2 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "账号被冻结，登陆失败", 0 );
												$this->Alert( "老板还没有开通您的员工帐号！或者您的老板已经被冻结！请联系您的老板" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 1 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "密码输入有误，登陆失败", 0 );
												$this->Alert( "密码输入有误" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 7 )
								{
												$this->Alert( "您还没有设置绑定任何硬件，请使用不绑定硬件登陆！" );
												$this->CloseWin( );
								}
								else if ( $R4e420efcc3 == 3 || $R4e420efcc3 == 4 || $R4e420efcc3 == 6 )
								{
												$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "设置了硬件绑定，非本机登陆，登陆失败", 0 );
												$this->Alert( "您好，进货器绑定了电脑，请找对应的电脑登录系统，如需改绑，请联系客服！" );
												$this->CloseWin( );
								}
								else
								{
												if ( $R4e420efcc3 == 5 )
												{
																$this->Alert( "您好，进货器不支持绑定硬盘，请使用网页登陆！" );
																$this->GoHome( "b2b" );
																exit( );
												}
												else
												{
																if ( !isset( $R4e420efcc3['agent']['aid'] ) || !isset( $R4e420efcc3['staff']['staffid'] ) )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "异常错误，登陆失败", 0 );
																				$this->Alert( "异常错误" );
																				$this->CloseWin( );
																}
																$this->CheckHardBind( $R4e420efcc3['agent']['aid'], $R4e420efcc3['staff']['staffid'] );
																$R3db8f5c8bc = $R4e420efcc3['agent'];
																$this->IsFrozenTime( $R3db8f5c8bc, 1 );
																$Raac42e4217 = $R4e420efcc3['staff'];
																if ( $this->CheckMiBaoKa( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'] ) == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "密保输入错误，登陆失败", 0 );
																				$this->Alert( "密保输入错误，请重新输入" );
																				$this->CloseWin( );
																}
																if ( $this->VerifyMobile( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'] ) == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "令牌输入错误，登陆失败", 0 );
																				$this->Alert( "令牌输入错误，请重新输入" );
																				$this->GoHome( "b2b" );
																}
																$R2097a8fddf = factory::getinstance( "agents" );
																$R046b4585a2 = $R2097a8fddf->IAgent_GetRankById( $R3db8f5c8bc['alv'] );
																if ( !isset( $R046b4585a2['name'] ) )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "客户级别有问题，可能是系统设置有问题，登陆失败", 0 );
																				$this->Alert( "您的级别有问题，请和客服联系！" );
																				$this->CloseWin( );
																}
																if ( $R046b4585a2['gid'] == 0 )
																{
																				$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "会员用户无法登陆经销商系统，登陆失败", 0 );
																				$this->Alert( "会员用户无法登陆经销商系统！" );
																				$this->CloseWin( );
																}
																setcookie( "umebiz_com_gid", "", time( ) - 3600 );
																setcookie( "umebiz_com_gid", $R046b4585a2['gid'], time( ) + 86400 );
																if ( 0 < $R3db8f5c8bc['parentid'] )
																{
																				$R9aa102385f = $this->GetAgentCache( $R3db8f5c8bc['parentid'] );
																				if ( !isset( $R9aa102385f['frozen'] ) )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "上家不存在，登陆失败", 0 );
																								$this->Alert( "您的上家已经不存在，请联系平台客服咨询！" );
																								$this->CloseWin( );
																				}
																				else if ( $R9aa102385f['frozen'] == 1 )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "上家被冻结，登陆失败", 0 );
																								$this->Alert( "您的上家已经被冻结，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																				$R4906cf6137 = $this->GetRank( $R9aa102385f['alv'] );
																				if ( !isset( $R4906cf6137['name'] ) )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "上家级别有问题，登陆失败", 0 );
																								$this->Alert( "您的上家级别有问题，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																				$R4420266e85 = $this->GetRankType( );
																				if ( $R4420266e85 )
																				{
																								if ( $R4906cf6137['gid'] <= $R046b4585a2['gid'] )
																								{
																												$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "上家或被降级，登陆失败", 0 );
																												$this->Alert( "您的上家或被降级，导致您的级别出现问题，无法登陆，请联系您的上家！" );
																												$this->CloseWin( );
																								}
																				}
																				else if ( $R4906cf6137['money'] <= $R046b4585a2['money'] )
																				{
																								$this->AddLogin( 0, 1, $R0dc0347d49, 1, 1, "上家或被降级，登陆失败", 0 );
																								$this->Alert( "您的上家或被降级，导致您的级别出现问题，无法登陆，请联系您的上家！" );
																								$this->CloseWin( );
																				}
																}
																$this->SetWebCookie( $R3db8f5c8bc['aid'], 1, $Raac42e4217['staffid'] );
																$R6009e84434 = $R046b4585a2['name'];
																$R0a2fcddd4b = $R3db8f5c8bc['leftrights'];
																$R1929afdbab = $Raac42e4217['rights'];
																$R1d2e625383 = explode( ",", $R0a2fcddd4b );
																$R3cfdf8e16a = explode( ",", $R1929afdbab );
																$R026f0167b4 = array( );
																$Ra16d228039 = 0;
																foreach ( $R3cfdf8e16a as $R0f8134fb60 )
																{
																				$R026f0167b4[] = isset( $R1d2e625383[$Ra16d228039] ) && intval( $R1d2e625383[$Ra16d228039] ) == 1 ? $R0f8134fb60 : 0;
																				$Ra16d228039++;
																}
																$Ra0c8454e75 = implode( ",", $R026f0167b4 );
																$user = $R3db8f5c8bc['aname']."|".$R3db8f5c8bc['company']."|".$R6009e84434."|".$R3db8f5c8bc['prv'].$R3db8f5c8bc['city']."|".$R3db8f5c8bc['parentid']."|".$R3db8f5c8bc['alv']."|".$R3db8f5c8bc['aremain']."|".$R3db8f5c8bc['aid']."|".$Rc509b4f207."|".$Raac42e4217['staffid']."|".$Raac42e4217['staffname']."|".$Ra0c8454e75;
																$this->AddLogin( $R3db8f5c8bc['aid'], $Raac42e4217['staffid'], $Raac42e4217['staffname'], 1, 1, "成功登陆", 1 );
																$this->session->set( "agentinfo", $user );
																$this->SetConfig( );
																$this->LoginGo( );
												}
								}
				}

				public function Logout( )
				{
								$this->session->agentlogout( );
								$this->GoHome( "b2b" );
				}

				public function DelOldMsg( $R2a51483b14, $R5334b17ba8 )
				{
								$R9e0664486a = factory::getinstance( "msg" );
								$data = array(
												"msgto" => $R2a51483b14,
												"bossid" => $R5334b17ba8
								);
								$R3db8f5c8bc = $R9e0664486a->IMsg_NotReaded( $data, 1 );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"msgid" => $R0f8134fb60['id']
												);
												if ( $R9e0664486a->IMsg_RowsExt( $data ) == 0 )
												{
																$data['hidden'] = 1;
																$R9e0664486a->IMsg_CreateExt( $data );
												}
												else
												{
																$R794010fd36 = array( "hidden" => 1 );
																$R9e0664486a->IMsg_UpdateExtByLimit( $R794010fd36, $data );
												}
								}
				}

				public function CheckCode( )
				{
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rb7da52a305 = "";
								if ( isset( $_SESSION['randcode'] ) )
								{
												$Rb7da52a305 = $_SESSION['randcode'];
								}
								$Rd19ae93b31 = request( "regcode", "", "POST" );
								if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
								{
												echo 1;
								}
								else
								{
												echo 0;
								}
				}

				public function MiBaoKa( )
				{
								header( "Content-type:image/png" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rd19ae93b31 = "";
								$R4eb1184b40 = array( "1", "2", "3", "4", "5", "6", "7" );
								$Rf1b6a0db06 = array( "A", "B", "C", "D", "E", "F", "G" );
								$R026f0167b4 = array( );
								$Rc7a586d84a = count( $R4eb1184b40 );
								$R2ad06a1dd9 = count( $Rf1b6a0db06 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 3;	$Ra16d228039++	)
								{
												$R1ca14e06c6 = rand( 0, $Rc7a586d84a - 1 );
												$Rf9f40445f6 = rand( 0, $R2ad06a1dd9 - 1 );
												$R026f0167b4[] = $Rf1b6a0db06[$Rf9f40445f6].$R4eb1184b40[$R1ca14e06c6];
								}
								$Rd19ae93b31 = implode( " ", $R026f0167b4 );
								$_SESSION['mibaorandcode'] = $Rd19ae93b31;
								if ( intval( request( "mt" ) ) )
								{
												setcookie( "mttsn", "", time( ) - 3600 );
												setcookie( "mttsn", $Rd19ae93b31, time( ) + 86400 );
								}
								srand( ( double )microtime( ) * 1000000 );
								$Rcd58a37536 = imagecreate( 80, 18 );
								$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
								$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
								imagefill( $Rcd58a37536, 68, 30, $R4ad640cfaf );
								$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 220, 220, 220 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
								{
												imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 20, 40 ), rand( 0, 21 ), $R320bdc1f1b );
								}
								imagestring( $Rcd58a37536, 10, 5, 2, $Rd19ae93b31, $R862279c0e8 );
							
								imagegif( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function RandCode( )
				{
								header( "Content-type:image/png" );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$Rc4a5b5e310 = request( "u", "" );
								$Rd19ae93b31 = "";
								if ( $Rc4a5b5e310 == "" )
								{
												$R63bede6b19 = "abcdefhkmnpqrstuvwxyz2345678";
								}
								else
								{
												$R63bede6b19 = "012345678";
								}
								$R24d59cd0b7 = strlen( $R63bede6b19 );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 <= 4;	$Ra16d228039++	)
								{
												$num = rand( 0, $R24d59cd0b7 - 1 );
												$Rd19ae93b31 .= $R63bede6b19[$num];
								}
								$_SESSION['randcode'] = $Rd19ae93b31;
								srand( ( double )microtime( ) * 1000000 );
								$Re4a3f5f7a1 = request( "n", "" );
								if ( $Re4a3f5f7a1 == "" )
								{
												$Rcd58a37536 = imagecreate( 120, 38 );
												$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
												$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
												$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												if ( intval( request( "t" ) ) )
												{
																$R17a9d2fb07 = imagecolortransparent( $Rcd58a37536, $Rb1f1502856 );
												}
												imagefill( $Rcd58a37536, 250, 30, $R4ad640cfaf );
												$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < 2;	$Ra16d228039++	)
												{
																imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 100, 120 ), rand( 0, 35 ), $R320bdc1f1b );
												}
												$R62a1a9fbd8 = UPATH_SHARECONTENT."skins".DS."font".DS."Sansation_Regular.ttf";
												imagettftext( $Rcd58a37536, 20, rand( 0, 10 ), 10, 30, $R862279c0e8, $R62a1a9fbd8, $Rd19ae93b31 );
								}
								else
								{
												$Rcd58a37536 = imagecreate( 45, 18 );
												$Rb1f1502856 = imagecolorallocate( $Rcd58a37536, 255, 255, 255 );
												$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
												$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 0, 0, 0 );
												imagefill( $Rcd58a37536, 68, 30, $R4ad640cfaf );
												$R320bdc1f1b = imagecolorallocate( $Rcd58a37536, 220, 220, 220 );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < 3;	$Ra16d228039++	)
												{
																imageline( $Rcd58a37536, rand( 0, 30 ), rand( 0, 21 ), rand( 20, 40 ), rand( 0, 21 ), $R320bdc1f1b );
												}
												imagestring( $Rcd58a37536, 10, 5, 2, $Rd19ae93b31, $R862279c0e8 );
								}
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 90;	$Ra16d228039++	)
								{
												imagesetpixel( $Rcd58a37536, rand( ) % 70, rand( ) % 30, $R4ad640cfaf );
								}
								imagegif( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function CloseWin( )
				{
								echo "<script type=\"text/javascript\">window.close();</script>";
								exit( );
				}

				public function VerifyMobile( $R2a51483b14, $R94e0136c8a )
				{
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['mobilecheck'] ) && $R679e9b9234['mobilecheck'] == 1 )
								{
												if ( !isset( $_SESSION ) )
												{
																session_start( );
												}
												$Rb7da52a305 = "";
												if ( isset( $_SESSION['mobilecode'] ) )
												{
																$Rb7da52a305 = $_SESSION['mobilecode'];
												}
												$Rd19ae93b31 = request( "mobile", "", "POST" );
												if ( $Rd19ae93b31 != "" && strtolower( $Rb7da52a305 ) == strtolower( $Rd19ae93b31 ) )
												{
																return 1;
												}
												else
												{
																return 0;
												}
								}
								else
								{
												return 1;
								}
				}

				public function SetConfig( )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 0 < $R30aa8c1852 && $Rcc5c6e696c[0] == 1 && $R30b2ab8dc1['popcontent'] != "" )
								{
												$R0f8134fb60 = $R30b2ab8dc1['popcontent'];
												$R0f8134fb60 = preg_replace( "/\r\n/", "\\n", $R0f8134fb60 );
												$this->Alert( $R0f8134fb60 );
								}
								if ( 2 < $R30aa8c1852 && $Rcc5c6e696c[2] == 1 )
								{
												$R675fc348c9 = $this->session->agent;
												$R98bc1630cd = $R675fc348c9[6];
												if ( $R98bc1630cd < $R30b2ab8dc1['alertremain'] )
												{
																$this->Alert( "您的余额不足 ".$R30b2ab8dc1['alertremain']." 请及时补充您的余额！" );
												}
								}
								if ( 1 < $R30aa8c1852 && $Rcc5c6e696c[1] == 1 )
								{
												$R9e0664486a = factory::getinstance( "msg" );
												$Rcc5c6e696c = $this->session->agent;
												list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
												$data = array(
																"msgtype" => 1,
																"msgto" => $R2a51483b14,
																"bossid" => $R5334b17ba8
												);
												$num = $R9e0664486a->IMsg_NotReaded( $data );
												if ( 0 < $num )
												{
																$this->LoginMsgGo( );
												}
								}
				}

				public function Ko( )
				{
								$Rd19ae93b31 = getvar( "v1" );
								$R908109654a = getvar( "v2" );
								setcookie( "mstr", "", time( ) - 3600 );
								setcookie( "mstr", $Rd19ae93b31, time( ) + 600 );
								setcookie( "mstmb", "", time( ) - 3600 );
								setcookie( "mstmb", $R908109654a, time( ) + 600 );
								echo "0";
				}

				public function Mncrypt( $Rbac6806bcb = "" )
				{
								$R149a03b376 = "It's kond of you to visit me!!";
								$Rb3afac90b0 = "";
								$R81603a608a = strlen( $Rbac6806bcb );
								$R7ae15ffdf2 = strlen( $R149a03b376 );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R81603a608a && $Ra16d228039 < $R7ae15ffdf2;	$Ra16d228039++	)
								{
												$R30b2ab8dc1 = substr( $Rbac6806bcb, $Ra16d228039, 1 );
												$Ra09fe38af3 = substr( $R149a03b376, $Ra16d228039, 1 );
												$R30b2ab8dc1 ^= $Ra09fe38af3;
												$Rb3afac90b0 .= $R30b2ab8dc1;
								}
								return $Rb3afac90b0;
				}

}

?>
