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
class DataController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "agents" );
				}

				public function Index( )
				{
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R6cd996866e = $Rcc5c6e696c[7];
								}
								else
								{
												$this->Alert( "您还没有登陆！" );
												header( "index.php" );
												exit( );
								}
								$R679e9b9234 = $this->hander->IAgent_Get( $R6cd996866e );
								$this->Assign( "data", $R679e9b9234 );
								$Rac9b8532b8 = $R679e9b9234['parentid'];
								if ( 0 < $Rac9b8532b8 )
								{
												$R1456e39f42 = $this->GetAgentCache( $Rac9b8532b8 );
												$this->Assign( "bosscompany", $R1456e39f42['company'] );
								}
							
												$this->View( );
								
				}

				public function Self( )
				{
								
												$this->Index( );
								
				}

				public function SelfSave( )
				{
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R00bb5d9597 = $Rcc5c6e696c[8];
								}
								else
								{
												header( "location:index.php?m=mod_b2b" );
												exit( );
								}
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								if ( $R71dfa8a4fc != $agent['superpwd'] )
								{
												$this->Alert( "您输入的超级密码输入有错！请重新输入" );
												$this->HistoryGo( );
								}
								$data = array(
												"websetting" => getvar( "websetting" )
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
												$this->SetWebCookie( $R2a51483b14 );
												$this->Alert( "您的资料更改成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=Self" );
								}
								else
								{
												$this->Alert( "操作失败！" );
												$this->HistoryGo( );
								}
				}

				public function Bank( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								global $masterid;
								$R220583696c = $masterid;
								$masterid = $R2a51483b14;
								$R222ff303f4 = factory::getinstance( "banks" );
								$R3db8f5c8bc = $R222ff303f4->IBank_Get( );
								$masterid = $R220583696c;
							
												$this->Assign( "items", $R3db8f5c8bc );
												$this->View( );
								
				}

				public function BankSave( )
				{
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R00bb5d9597 = $Rcc5c6e696c[8];
								}
								else
								{
												header( "location:index.php?m=mod_b2b" );
												exit( );
								}
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								if ( $R71dfa8a4fc != $agent['superpwd'] )
								{
												$this->Alert( "您输入的超级密码输入有错！请重新输入" );
												$this->HistoryGo( );
								}
								global $masterid;
								$masterid = $R2a51483b14;
								$R3456919727 = getvar( "id" );
								$Re5afe1555d = getvar( "AccountBranch" );
								$R182fcefe63 = getvar( "Address" );
								$R89739294e3 = getvar( "AccountNO" );
								$Rfa5da7ac69 = getvar( "AccountName" );
								$R222ff303f4 = factory::getinstance( "banks" );
								$Rcfc6f3a1a4 = array(
												array( "农业银行", "nh" ),
												array( "工商银行", "gh" ),
												array( "建设银行", "js" ),
												array( "邮政储蓄", "yz" ),
												array( "招商银行", "zh" ),
												array( "交通银行", "jh" ),
												array( "中国银行", "zg" ),
												array( "广发银行", "gf" ),
												array( "浦发银行", "pf" ),
												array( "深发银行", "sf" ),
												array( "民生银行", "ms" ),
												array( "中信银行", "zx" ),
												array( "兴业银行", "xy" ),
												array( "光大银行", "gd" ),
												array( "华夏银行", "hx" ),
												array( "支付宝", "alipay" ),
												array( "财付通", "tenpay" )
								);
								if ( is_array( $R3456919727 ) )
								{
												$Ra16d228039 = 0;
												foreach ( $R3456919727 as $R0f8134fb60 )
												{
																$R0c41102e4a = "bank_no.gif";
																$R591802257a = $Re5afe1555d[$Ra16d228039];
																foreach ( $Rcfc6f3a1a4 as $Rcb34e8a45d )
																{
																				if ( $R591802257a == $Rcb34e8a45d[0] )
																				{
																								$R0c41102e4a = "bank_".$Rcb34e8a45d[1].".gif";
																								break;
																				}
																}
																$data = array(
																				"AccountBranch" => $Re5afe1555d[$Ra16d228039],
																				"Address" => $R182fcefe63[$Ra16d228039],
																				"AccountNO" => $R89739294e3[$Ra16d228039],
																				"AccountName" => $Rfa5da7ac69[$Ra16d228039],
																				"bankicon" => $R0c41102e4a
																);
																$R3584859062 = intval( $R0f8134fb60 );
																if ( $R3584859062 == 0 )
																{
																				if ( $R182fcefe63[$Ra16d228039] != "" || $R89739294e3[$Ra16d228039] != "" || $Rfa5da7ac69[$Ra16d228039] != "" )
																				{
																								$R808b89ba0e = $R222ff303f4->IBank_Create( $data );
																				}
																}
																else
																{
																				$R808b89ba0e = $R222ff303f4->IBank_Update( $data, $R3584859062 );
																}
																$Ra16d228039++;
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "您的银行更改成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=Bank" );
								}
								else
								{
												$this->Alert( "操作失败！" );
												$this->HistoryGo( );
								}
				}

				public function Save( )
				{
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$R00bb5d9597 = $Rcc5c6e696c[8];
								}
								else
								{
												$this->GoHome( "b2b" );
												exit( );
								}
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								if ( $R71dfa8a4fc != $agent['superpwd'] )
								{
												$this->Alert( "您输入的超级密码输入有错！请重新输入" );
												$this->HistoryGo( );
								}
								$data = array(
												"prv" => getvar( "prv", "" ),
												"city" => getvar( "city", "" ),
												"company" => getvar( "ubzcompany", "" ),
												"eshop" => getvar( "ubzeshop", "" ),
												"arealname" => getvar( "ubzcrealname" ),
												"aqq" => getvar( "ubzcqq" ),
												"amail" => getvar( "ubzcmail" ),
												"atel" => getvar( "ubzctel" ),
												"aaddr" => getvar( "ubzcaddr" )
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R4b01979e8a = false;
												$Rcc5c6e696c = $this->session->agent;
												$Ra36ac3d772 = getvar( "ubzcompany", "" );
												$Recb2521bef = getvar( "prv", "" ).getvar( "city", "" );
												if ( $Ra36ac3d772 != $Rcc5c6e696c[1] )
												{
																$Rcc5c6e696c[1] = $Ra36ac3d772;
																$R4b01979e8a = true;
												}
												if ( $Recb2521bef != $Rcc5c6e696c[3] )
												{
																$Rcc5c6e696c[3] = $Recb2521bef;
																$R4b01979e8a = true;
												}
												if ( $R4b01979e8a )
												{
																$R675fc348c9 = implode( "|", $Rcc5c6e696c );
																$this->session->set( "agentinfo", $R675fc348c9 );
																$this->Assign( "agent", $this->session->agent );
												}
												$this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
												$this->SetWebCookie( $R2a51483b14 );
												$this->Alert( "您的资料更改成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home" );
								}
								else
								{
												$this->Alert( "操作失败！" );
												$this->HistoryGo( );
								}
				}

				public function SetWebCookie( $R2a51483b14 )
				{
								$R3db8f5c8bc = $this->GetAgentCache( $R2a51483b14 );
								$R8eeb1221ae = explode( "|", $R3db8f5c8bc['websetting'] );
								$Rf5f11a8d38 = count( $R8eeb1221ae );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												setcookie( "umebiz_com_".$Ra16d228039, "", time( ) - 3600 );
												setcookie( "umebiz_com_".$Ra16d228039, $R8eeb1221ae[$Ra16d228039], time( ) + 86400 );
								}
				}

				public function ModifyPass( )
				{
							
												$this->View( );
								
				}

				public function SuperPass( )
				{
							
												$this->View( );
								
				}

				public function TradePass( )
				{
							
												$this->View( );
								
				}

				public function RandPass( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
							
												$this->Assign( "rs", $R679e9b9234 );
												$this->View( );
								
				}

				public function SavePassWord( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rd5f59c5c64 = $Rcc5c6e696c[8];
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,apwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$this->StaffSavePassWord( );
												return;
								}
								$Rd5f59c5c64 = $agent['apwd'];
								$R06c91c0071 = getvar( "oldpass" );
								$Rda66745260 = getvar( "newpass" );
								$R5a5be04f8d = getvar( "renewpass" );
								if ( $R5a5be04f8d != $Rda66745260 )
								{
												$this->Alert( "新密码两次输入不一致！" );
												$this->HistoryGo( );
								}
								if ( $R06c91c0071 != $Rd5f59c5c64 )
								{
												$this->Alert( "您的旧密码输入错误！" );
												$this->HistoryGo( );
								}
								else
								{
												if ( 0 < $Rcc5c6e696c[9] )
												{
																$data = array(
																				"staffpwd" => $Rda66745260
																);
																$R5f84c47438 = factory::getinstance( "staffs" );
																$R808b89ba0e = $R5f84c47438->IStaff_Update( $data, $Rcc5c6e696c[9] );
												}
												else
												{
																$data = array(
																				"apwd" => $Rda66745260
																);
																$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
												}
												if ( $R808b89ba0e )
												{
																$this->Alert( "密码修改成功！" );
																$Rcc5c6e696c[8] = md5( $Rda66745260 );
																$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
												}
												else
												{
																$this->Alert( "密码修改失败！" );
												}
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=modifyPass" );
								}
				}

				public function StaffSavePassWord( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_Get( $R94e0136c8a, "staffpwd" );
								$Rd5f59c5c64 = $Raac42e4217['staffpwd'];
								$R06c91c0071 = getvar( "oldpass" );
								$Rda66745260 = getvar( "newpass" );
								$R5a5be04f8d = getvar( "renewpass" );
								if ( $R5a5be04f8d != $Rda66745260 )
								{
												$this->Alert( "新密码两次输入不一致！" );
												$this->HistoryGo( );
								}
								if ( $R06c91c0071 != $Rd5f59c5c64 )
								{
												$this->Alert( "您的旧密码输入错误！" );
												$this->HistoryGo( );
								}
								else
								{
												$data = array(
																"staffpwd" => $Rda66745260
												);
												$R808b89ba0e = $R5f84c47438->IStaff_Update( $data, $R94e0136c8a );
												if ( $R808b89ba0e )
												{
																$this->Alert( "密码修改成功！" );
												}
												else
												{
																$this->Alert( "密码修改失败！" );
												}
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=modifyPass" );
								}
				}

				public function SaveSuperPwd( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$Rd5f59c5c64 = $agent['superpwd'];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$this->Alert( "您是员工，没有权限修改！" );
												$this->HistoryGo( );
								}
								$Rf5439c3907 = getvar( "apwd" );
								$R71dfa8a4fc = getvar( "superpwd" );
								$R966604a6ca = getvar( "resuperpwd" );
								if ( $R966604a6ca != $R71dfa8a4fc )
								{
												$this->Alert( "新密码两次输入不一致！" );
												$this->HistoryGo( );
								}
								if ( $Rf5439c3907 != $Rd5f59c5c64 )
								{
												$this->Alert( "您的原超级密码输入错误！" );
												$this->HistoryGo( );
								}
								else
								{
												$data = array(
																"superpwd" => $R71dfa8a4fc
												);
												$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$this->Alert( "超级密码修改成功！" );
												}
												else
												{
																$this->Alert( "超级密码修改失败！" );
												}
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=SuperPass" );
								}
				}

				public function SaveTradePwd( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,tradepwd,websetting", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$Rd5f59c5c64 = $agent['tradepwd'];
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$this->StaffSaveTradePwd( );
												return;
								}
								$Rf5439c3907 = getvar( "apwd" );
								$R48aa85bc4e = getvar( "tradepwd" );
								$Rf958605ae8 = getvar( "retradepwd" );
								if ( $Rf958605ae8 != $R48aa85bc4e )
								{
												$this->Alert( "新密码两次输入不一致！" );
												$this->HistoryGo( );
								}
								if ( $Rf5439c3907 != $Rd5f59c5c64 )
								{
												$this->Alert( "您的原交易密码输入错误！" );
												$this->HistoryGo( );
								}
								else
								{
												$data = array(
																"tradepwd" => $R48aa85bc4e
												);
												$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$this->Alert( "交易密码修改成功！" );
												}
												else
												{
																$this->Alert( "交易密码修改失败！" );
												}
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=TradePass" );
								}
				}

				public function StaffSaveTradePwd( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_Get( $R94e0136c8a, "tradepwd" );
								$Rd5f59c5c64 = $Raac42e4217['tradepwd'];
								$Rf5439c3907 = getvar( "apwd" );
								$R48aa85bc4e = getvar( "tradepwd" );
								$Rf958605ae8 = getvar( "retradepwd" );
								if ( $Rf958605ae8 != $R48aa85bc4e )
								{
												$this->Alert( "新密码两次输入不一致！" );
												$this->HistoryGo( );
								}
								if ( $Rf5439c3907 != $Rd5f59c5c64 )
								{
												$this->Alert( "您的原交易密码输入错误！" );
												$this->HistoryGo( );
								}
								else
								{
												$data = array(
																"tradepwd" => $R48aa85bc4e
												);
												$R808b89ba0e = $R5f84c47438->IStaff_Update( $data, $R94e0136c8a );
												if ( $R808b89ba0e )
												{
																$this->Alert( "交易密码修改成功！" );
												}
												else
												{
																$this->Alert( "交易密码修改失败！" );
												}
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home&a=TradePass" );
								}
				}

				public function RandSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->hander->IAgent_Get( $R2a51483b14, "istest,tradepwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( $R48aa85bc4e != $agent['tradepwd'] )
								{
												$this->Alert( "您输入的交易密码有错！请重新输入" );
												$this->HistoryGo( );
								}
								$R8cb9f4d29e = intval( request( "randpos" ) );
								if ( $R8cb9f4d29e == 2 )
								{
												$R8cb9f4d29e = intval( request( "txtrandpos" ) );
								}
								if ( $R8cb9f4d29e < 0 )
								{
												$R8cb9f4d29e = 0;
								}
								$data = array(
												"randcheck" => intval( request( "randcheck" ) ),
												"randpos" => $R8cb9f4d29e,
												"randtype" => intval( request( "randtype" ) )
								);
								$R022cf23e8d = factory::getinstance( "security" );
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $R022cf23e8d->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R808b89ba0e = $R022cf23e8d->ISecurity_Update( $data, $R679e9b9234['id'] );
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $R022cf23e8d->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "security", array(
																"arg1" => $R2a51483b14,
																"arg2" => $R94e0136c8a
												) );
												$this->Alert( "设置成功" );
								}
								else
								{
												$this->Alert( "设置失败" );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Home&a=RandPass" );
				}

}

?>
