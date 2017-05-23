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
class StaffController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "staffs" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$data = array(
												"page" => intval( request( "page" ) ),
												"keywords" => getvar( "keywords" ),
												"aid" => $R2a51483b14,
												"id" => getvar( "id" ),
												"nrows" => intval( request( "nrows" ) )
								);
								$R4e420efcc3 = $this->hander->IStaff_SecPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
						
												$this->view( );
						
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$data['bossid'] = $R2a51483b14;
								$R901a6b96db = array( "解冻", "冻结" );
								$R94e0136c8a = intval( request( "staffid" ) );
								$this->Assign( "state", $R901a6b96db );
								$R0f8134fb60 = $this->GetStaffCache( $R94e0136c8a );
								if ( !isset( $R0f8134fb60['staffid'] ) )
								{
												$this->Alert( "您好！员工不存在！" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['bossid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$this->Assign( "item", $R0f8134fb60 );
								$Ra231c07bf2 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$this->Assign( "secitem", $Ra231c07bf2 );
								$this->Assign( "ip", $this->GetIp( ) );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$Raa584985c1 = explode( ",", $agent['leftrights'] );
								$Rf5f11a8d38 = count( $Raa584985c1 );
								if ( $Rf5f11a8d38 < 80 )
								{
												
												for ( $Ra16d228039 = $Rf5f11a8d38;	$Ra16d228039 < 81;	$Ra16d228039++	)
												{
																$agent['leftrights'] .= ",";
												}
								}
								$Raa584985c1 = explode( ",", $agent['leftrights'] );
								$this->Assign( "leftrights", $Raa584985c1 );
						
												$this->View( );
						
				}

				public function Add( )
				{
								$R901a6b96db = array( "解冻", "冻结" );
								$this->Assign( "state", $R901a6b96db );
								$this->Assign( "ip", $this->GetIp( ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$Raa584985c1 = explode( ",", $agent['leftrights'] );
								$Rf5f11a8d38 = count( $Raa584985c1 );
								if ( $Rf5f11a8d38 < 80 )
								{
												
												for ( $Ra16d228039 = $Rf5f11a8d38;	$Ra16d228039 < 81;	$Ra16d228039++	)
												{
																$agent['leftrights'] .= ",";
												}
								}
								$Raa584985c1 = explode( ",", $agent['leftrights'] );
								$this->Assign( "leftrights", $Raa584985c1 );
							
												$this->View( );
							
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R00bb5d9597 = $Rcc5c6e696c[8];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
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
								$R35a383eb60 = intval( $_COOKIE['umebiz_com_3'] );
								if ( $R35a383eb60 == 0 )
								{
												$this->Alert( "您无权建立/修改员工账号，您可以通过 帐户资料修改 -> 个性化默认设置 修改自己的权限！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=home" );
												$this->HistoryGo( );
								}
								$R026f0167b4 = array( );
								$Rf035a26cc6 = 80;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf035a26cc6;	$Ra16d228039++	)
								{
												$R026f0167b4[] = intval( request( "rights_".$Ra16d228039 ) );
								}
								$R94e0136c8a = intval( request( "staffid" ) );
								$data = array(
												"frozen" => intval( request( "frozen" ) ),
												"realname" => getvar( "realname" ),
												"email" => getvar( "email" ),
												"mobile" => getvar( "mobile" ),
												"tel" => getvar( "tel" ),
												"addr" => getvar( "addr" ),
												"other" => getvar( "other" ),
												"canseeprice" => intval( request( "canseeprice" ) ),
												"dayconsum" => doubleval( request( "dayconsum" ) ),
												"rights" => implode( ",", $R026f0167b4 ),
												"checktradepwd" => intval( request( "checktradepwd" ) ),
												"ini" => intval( request( "caneditbuyerprice" ) )."|".intval( request( "canseeothers" ) )
								);
								$Rc509b4f207 = getvar( "staffpwd" );
								$Rab99ce1727 = getvar( "restaffpwd" );
								if ( $Rc509b4f207 != "" )
								{
												if ( $Rc509b4f207 == $Rab99ce1727 )
												{
																$data['staffpwd'] = trim( $Rc509b4f207 );
												}
												else
												{
																$this->Alert( "两次登陆密码输入不一致！请重新输入" );
																$this->HistoryGo( );
												}
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								$Rf958605ae8 = getvar( "retradepwd" );
								if ( $R48aa85bc4e != "" )
								{
												if ( $R48aa85bc4e == $Rf958605ae8 )
												{
																$data['tradepwd'] = trim( $R48aa85bc4e );
												}
												else
												{
																$this->Alert( "两次交易密码输入不一致！请重新输入" );
																$this->HistoryGo( );
												}
								}
								if ( $R94e0136c8a == 0 )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
												$data['bossid'] = $R2a51483b14;
												$data['staffname'] = trim( getvar( "staffname" ) );
												$R7f6d66dc0d = $this->hander->IStaff_IsExist( $data['staffname'] );
												if ( $data['staffname'] == "" )
												{
																$this->Alert( "员工账号不能为空，请选择其他名字!" );
																$this->HistoryGo( );
												}
												if ( $R7f6d66dc0d == 0 )
												{
																$this->Alert( "员工账号已经存在，请选择其他名字!" );
																$this->HistoryGo( );
												}
												$Re27a887095 = date( "Y-m-d H-i-s" );
												$Rc53f22ad31 = $this->GetIp( );
												$data['createdate'] = $Re27a887095;
												$data['createip'] = $Rc53f22ad31;
												$data['thisdate'] = $Re27a887095;
												$data['thisip'] = $Rc53f22ad31;
												$data['lastdate'] = $Re27a887095;
												$data['lastip'] = $Rc53f22ad31;
												$R808b89ba0e = $this->hander->IStaff_Create( $data );
												if ( $R808b89ba0e )
												{
																$this->SecSave( $R808b89ba0e );
																$this->Alert( "添加成功" );
																$this->ScriptRedirect( "index.php?m=mod_agent&c=staff&nrows=500" );
												}
												else
												{
																$this->Alert( "添加失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$R0f8134fb60 = $this->hander->IStaff_Get( $R94e0136c8a );
												if ( $R0f8134fb60['bossid'] != $R2a51483b14 )
												{
																$this->Alert( "非法操作" );
																$this->HistoryGo( );
												}
												$R808b89ba0e = $this->hander->IStaff_Update( $data, $R94e0136c8a );
												if ( $R808b89ba0e )
												{
																$this->SecSave( $R94e0136c8a );
																$this->Alert( "更新成功" );
																$this->ScriptRedirect( "index.php?m=mod_agent&c=staff&a=detail&staffid=".$R94e0136c8a );
												}
												else
												{
																$this->Alert( "更新失败" );
																$this->HistoryGo( );
												}
								}
				}

				public function SecSave( $R94e0136c8a )
				{
								if ( intval( $R94e0136c8a ) <= 0 )
								{
												$this->Alert( "非法" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								$data = array(
												"ipcheck" => $this->GetCheck( "ipcheck" ),
												"ip" => $this->GetItem( "ip" ),
												"cpucheck" => $this->GetCheck( "cpucheck" ),
												"cpu" => $this->GetItem( "cpu" ),
												"maccheck" => $this->GetCheck( "maccheck" ),
												"mac" => $this->GetItem( "mac" ),
												"hdecheck" => $this->GetCheck( "hdecheck" ),
												"hde" => $this->GetItem( "hde" )
								);
								$R022cf23e8d = factory::getinstance( "security" );
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
								$this->UpdateCache( "staffs", array(
												"arg1" => $R94e0136c8a
								) );
								$this->UpdateCache( "security", array(
												"arg1" => $R2a51483b14,
												"arg2" => $R94e0136c8a
								) );
								return $R808b89ba0e;
				}

				public function GetItem( $R0f8134fb60 )
				{
								$R9cfb7c6d6b = getvar( $R0f8134fb60 );
								return implode( ",", $R9cfb7c6d6b );
				}

				public function GetCheck( $R0f8134fb60 )
				{
								return intval( request( $R0f8134fb60 ) );
				}

				public function Frozen( )
				{
								$R94e0136c8a = intval( request( "staffid" ) );
								$R89cd0a3912 = intval( request( "frozen" ) );
								$data = array(
												"frozen" => $R89cd0a3912
								);
								$R808b89ba0e = $this->hander->IStaff_Update( $data, $R94e0136c8a );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "staffs", array(
																"arg1" => $R94e0136c8a
												) );
												if ( $R89cd0a3912 == 0 )
												{
																$this->AddLog( "冻结编号".$R94e0136c8a."的员工" );
												}
												else
												{
																$this->AddLog( "解冻编号".$R94e0136c8a."的员工" );
												}
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=staff" );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								if ( 0 < $R94e0136c8a )
								{
												$this->Alert( "员工不允许操作！" );
												$this->HistoryGo( );
								}
								$R96995df8c6 = getvar( "staffid" );
								$R026f0167b4 = array( );
								if ( is_array( $R96995df8c6 ) )
								{
												foreach ( $R96995df8c6 as $R0f8134fb60 )
												{
																$R026f0167b4[] = intval( $R0f8134fb60 );
												}
								}
								$Rb68f239ef2 = implode( ",", $R026f0167b4 );
								if ( $Rb68f239ef2 == "" )
								{
												$this->Alert( "参数错误" );
												$this->HistoryGo( );
								}
								$this->CheckSuperPass( );
								$R808b89ba0e = $this->hander->IStaff_DeleteByIds( $Rb68f239ef2, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R022cf23e8d = factory::getinstance( "security" );
												$R022cf23e8d->ISecurity_DeleteStaffByAid( $R2a51483b14, $Rb68f239ef2 );
												foreach ( $R96995df8c6 as $R0f8134fb60 )
												{
																$R94e0136c8a = $R0f8134fb60;
																$this->UpdateCache( "staffs", array(
																				"arg1" => $R94e0136c8a
																) );
																$this->UpdateCache( "security", array(
																				"arg1" => $R2a51483b14,
																				"arg2" => $R94e0136c8a
																) );
												}
												$this->Alert( "删除成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=staff" );
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function CheckSuperPass( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
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
				}

				public function NoBind( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								if ( 0 < $R94e0136c8a )
								{
												$this->Alert( "员工不允许操作！" );
												$this->HistoryGo( );
								}
								$R96995df8c6 = getvar( "staffid" );
								$R026f0167b4 = array( );
								if ( is_array( $R96995df8c6 ) )
								{
												foreach ( $R96995df8c6 as $R0f8134fb60 )
												{
																$R026f0167b4[] = intval( $R0f8134fb60 );
												}
								}
								$Rb68f239ef2 = implode( ",", $R026f0167b4 );
								if ( $Rb68f239ef2 == 0 )
								{
												$this->Alert( "参数错误" );
												$this->HistoryGo( );
								}
								$this->CheckSuperPass( );
								$R808b89ba0e = $this->SetBind( $R2a51483b14, $Rb68f239ef2 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "解绑成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=staff" );
								}
								else
								{
												$this->Alert( "解绑失败" );
												$this->HistoryGo( );
								}
				}

				public function SetBind( $R2a51483b14, $R94e0136c8a )
				{
								$data = array( "ipcheck" => 0, "maccheck" => 0, "hdecheck" => 0, "cpucheck" => 0, "mibaokacheck" => 0, "randcheck" => 0, "mobile" => 0 );
								$R022cf23e8d = factory::getinstance( "security" );
								$R808b89ba0e = $R022cf23e8d->ISecurity_UpdateStaffByAId( $data, $R2a51483b14, $R94e0136c8a );
								$this->UpdateCache( "security", array(
												"arg1" => $R2a51483b14,
												"arg2" => $R94e0136c8a
								) );
								return $R808b89ba0e;
				}

}

?>
