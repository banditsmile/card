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
class MasterController extends Controller
{

				public $minfo = NULL;

				public function __construct( )
				{
								$this->InitLoginMaster( );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function InitLoginMaster( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$Re8bade8a5f = $Rff0cc71a1d->admin;
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$data = array( );
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$Ra77eb9059e = 1;
								}
								else
								{
												$Ra77eb9059e = 0;
								}
								$R63bede6b19 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 255;	$Ra16d228039++	)
								{
												$R63bede6b19 .= ",0";
								}
								$Rcc5c6e696c = explode( ",", $R3db8f5c8bc['rights'].$R63bede6b19 );
								if ( $Rcc5c6e696c[38] == 1 )
								{
												$R1ac6703a9f = 1;
								}
								else
								{
												$R1ac6703a9f = 0;
								}
								$adminrank = $R3db8f5c8bc['adminRank'];
								if ( 2 < $adminrank )
								{
												$this->Alert( "非系统管理员无权操作！" );
												$this->HistoryGo( );
								}
								$this->minfo = array(
												"issuper" => $Ra77eb9059e,
												"caneditother" => $R1ac6703a9f,
												"adminname" => $Re8bade8a5f,
												"adminrank" => $R3db8f5c8bc['adminRank'],
												"id" => $R3db8f5c8bc['id']
								);
				}

				public function Index( )
				{
								$R355ef3fa24 = $this->minfo;
								if ( 2 < $R355ef3fa24['adminrank'] )
								{
												echo "<script type=\"text/javascript\">alert(\"权限不足！只有系统管理员以上才有权限浏览\");window.location=\"index.php?c=home&a=home\";</script>";
												exit( );
								}
								if ( $R355ef3fa24['adminrank'] == 2 && $R355ef3fa24['caneditother'] == 0 )
								{
												echo "<script type=\"text/javascript\">alert(\"权限不足！\");window.location=\"index.php?c=home&a=home\";</script>";
												exit( );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $Rfc5c48c798->IMaster_Page( $data );
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								if ( $Ra77eb9059e == 0 )
								{
												$R026f0167b4 = array( );
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																if ( $R355ef3fa24['adminrank'] == 2 )
																{
																				if ( 1 < $R0f8134fb60['id'] && $R0f8134fb60['adminRank'] != 2 )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																				else if ( $R0f8134fb60['adminRank'] == 2 && $R0f8134fb60['adminName'] == $R355ef3fa24['adminname'] )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																}
												}
												$R4e420efcc3['item'] = $R026f0167b4;
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "reddt" ) ) ) );
				}

				public function Update( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3584859062 = intval( request( "id" ) );
								$adminrank = intval( request( "adminrank" ) );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 && $adminrank != 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R9742fd5d68 = getvar( "oldname" );
								$Re8bade8a5f = getvar( "adminname" );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3584859062 == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "您好，您无权编辑其他和您同级别的管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "权限不足" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $adminrank == 2 )
												{
																$this->Alert( "您好，您无权设置为系统管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "管理员名字不能为空！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( $R9742fd5d68 != $Re8bade8a5f && $Rfc5c48c798->IMaster_IsExist( $Re8bade8a5f ) )
								{
												$this->Alert( "管理员已经存在，请选择其他名字，再进行修改" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rf52ba22baf = array(
												"adminName" => $Re8bade8a5f,
												"adminRank" => intval( request( "adminrank" ) )
								);
								$R992179c341 = getvar( "adminpass" );
								if ( $R992179c341 != "" )
								{
												$Rf52ba22baf['adminPass'] = md5( $R992179c341 );
								}
								$Rfc5c48c798->IMaster_Update( $Rf52ba22baf, $R3584859062 );
								if ( $R9742fd5d68 != $Re8bade8a5f )
								{
												$Rff0cc71a1d = factory::getinstance( "session" );
												$Rff0cc71a1d->set( "adminname", $Re8bade8a5f );
								}
								$this->Alert( "更新成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Create( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								$adminrank = intval( request( "adminrank" ) );
								$R355ef3fa24 = $this->minfo;
								if ( $adminrank == 1 )
								{
												$this->Alert( "您好，请不要创建多个超级管理员！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$R355ef3fa24['issuper'] )
								{
												if ( $adminrank <= 2 )
												{
																$this->Alert( "您好，您无权添加系统管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "您好，权限不足，无法添加管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "管理员名字不能为空！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								if ( $Rfc5c48c798->IMaster_IsExist( $Re8bade8a5f ) )
								{
												$this->Alert( "管理员已经存在，请选择其他名字" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								global $masterid;
								$R026f0167b4 = array( );
								$R2a5119e7b1 = $this->GetItemLen( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R2a5119e7b1;	$Ra16d228039++	)
								{
												$R026f0167b4[] = 0;
								}
								$R643f497694 = 0;
								$R9ea16bd2fa = 0;
								switch ( $adminrank )
								{
								case 2 :
												$R643f497694 = 0;
												$R9ea16bd2fa = 35;
												break;
								case 3 :
												$R643f497694 = 26;
												$R9ea16bd2fa = 29;
												break;
								case 4 :
												$R643f497694 = 34;
												$R9ea16bd2fa = 35;
												break;
								case 5 :
												$R643f497694 = 16;
												$R9ea16bd2fa = 25;
												$R026f0167b4[12] = 1;
												break;
								case 6 :
												$R643f497694 = 30;
												$R9ea16bd2fa = 33;
												break;
								default :
												$R643f497694 = 0;
												$R9ea16bd2fa = -1;
												break;
								}
								$R9ea16bd2fa += 1;
								
								for ( $Ra16d228039 = $R643f497694;	$Ra16d228039 < $R9ea16bd2fa;	$Ra16d228039++	)
								{
												$R026f0167b4[$Ra16d228039] = 1;
								}
								$Ra0c8454e75 = implode( ",", $R026f0167b4 );
								$R2a039ed8fd = array(
												"adminName" => $Re8bade8a5f,
												"adminPass" => md5( getvar( "adminpass" ) ),
												"adminRank" => $adminrank,
												"aid" => $masterid,
												"rights" => $Ra0c8454e75
								);
								$Rfc5c48c798->IMaster_Create( $R2a039ed8fd );
								$this->Alert( "添加成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R355ef3fa24 = $this->minfo;
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								if ( $R3584859062 == $R355ef3fa24['id'] )
								{
												$this->Alert( "您好，您无权删除自己！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，此为平台超级管理员，不允许删除" );
												$this->HistoryGo( );
								}
								$R355ef3fa24 = $this->minfo;
								if ( !$R355ef3fa24['issuper'] )
								{
												$adminrank = $R3db8f5c8bc['adminRank'];
												if ( $adminrank <= 2 )
												{
																$this->Alert( "您好，您无权删除系统管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "您好，权限不足，无法删除管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$Rfc5c48c798->IMaster_Delete( $R3584859062 );
								$this->Alert( "删除成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Bind( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$Re8bade8a5f = getvar( "adminname" );
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "您好，您无权编辑其他和您同级别的管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "权限不足" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$this->Assign( "ip", $this->GetIp( ) );
								$R3db8f5c8bc['ip'] = explode( ",", $R3db8f5c8bc['ip'].",,,,," );
								$R3db8f5c8bc['mac'] = explode( ",", $R3db8f5c8bc['mac'].",,,,," );
								$R3db8f5c8bc['hde'] = explode( ",", $R3db8f5c8bc['hde'].",,,,," );
								$R3db8f5c8bc['cpu'] = explode( ",", $R3db8f5c8bc['cpu'].",,,,," );
								$this->Assign( "item", $R3db8f5c8bc );
						
												$this->View( );
						
				}

				public function BindSave( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$Re8bade8a5f = getvar( "adminname" );
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "您好，您无权编辑其他和您同级别的管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "权限不足" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								global $masterid;
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( 0 < $masterid && $R3db8f5c8bc['aid'] != $masterid )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$data = array(
												"ipcheck" => $this->GetCheck( "ip" ),
												"ip" => $this->GetItem( "ip" ),
												"maccheck" => $this->GetCheck( "mac" ),
												"mac" => $this->GetItem( "mac" ),
												"hdecheck" => $this->GetCheck( "hde" ),
												"hde" => $this->GetItem( "hde" ),
												"cpucheck" => $this->GetCheck( "cpu" ),
												"cpu" => $this->GetItem( "cpu" ),
												"mobile" => getvar( "mobile" ),
												"mobilecheck" => intval( request( "mobilecheck" ) ),
												"mibaoka" => getvar( "mibaoka" ),
												"mibaokacheck" => intval( request( "mibaokacheck" ) )
								);
								$Rfc5c48c798->IMaster_UpdateByName( $data, $Re8bade8a5f );
								$this->Alert( "绑定成功" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=master&a=bind&adminname=".$Re8bade8a5f );
				}

				public function GetItem( $R0f8134fb60 )
				{
								$R9cfb7c6d6b = getvar( $R0f8134fb60 );
								$Rcd8b55d5dc = getvar( $R0f8134fb60."check" );
								$R63bede6b19 = "";
								if ( is_array( $Rcd8b55d5dc ) )
								{
												foreach ( $Rcd8b55d5dc as $R0f8134fb60 )
												{
																if ( trim( $R9cfb7c6d6b[$R0f8134fb60] ) != "" && $R9cfb7c6d6b[$R0f8134fb60] != "undefined" )
																{
																				$R63bede6b19 .= $R9cfb7c6d6b[$R0f8134fb60].",";
																}
												}
								}
								return $R63bede6b19;
				}

				public function GetCheck( $R0f8134fb60 )
				{
								$R602baa0728 = getvar( $R0f8134fb60."check" );
								if ( is_array( $R602baa0728 ) && 0 < count( $R602baa0728 ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function Rights( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
																$this->Alert( "您好，您无权修改自己的权限！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "您好，您无权编辑其他和您同级别的管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "权限不足" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$this->Assign( "ip", $this->GetIp( ) );
								if ( !isset( $R3db8f5c8bc['adminRank'] ) )
								{
												$this->Alert( "管理不存在" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "超级管理员可以管理所有功能，为防止意外，请勿修改！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R63bede6b19 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 255;	$Ra16d228039++	)
								{
												$R63bede6b19 .= ",0";
								}
								$R3db8f5c8bc['rights'] = explode( ",", $R3db8f5c8bc['rights'].$R63bede6b19 );
								$this->Assign( "item", $R3db8f5c8bc );
								$R770c421daf = array(
												array(
																"name" => "系统类权限",
																"val" => array(
																				array( "id" => 0, "name" => "系统基本设置" ),
																				array( "id" => 38, "name" => "管理其他管理员" ),
																				array( "id" => 1, "name" => "LOGO管理" ),
																				array( "id" => 2, "name" => "密保卡管理" ),
																				array( "id" => 3, "name" => "系统网关管理" ),
																				array( "id" => 4, "name" => "支付网关管理" ),
																				array( "id" => 5, "name" => "用户级别体系管理" ),
																				array( "id" => 6, "name" => "页面广告类管理" ),
																				array( "id" => 7, "name" => "网站升级" ),
																				array( "id" => 8, "name" => "银行汇款账号管理" ),
																				array( "id" => 9, "name" => "标签管理" ),
																				array( "id" => 10, "name" => "投票管理" ),
																				array( "id" => 11, "name" => "外汇汇率设置(单种)" ),
																				array( "id" => 12, "name" => "生成静态页面" ),
																				array( "id" => 13, "name" => "备份当前模板" ),
																				array( "id" => 14, "name" => "选择网站模板" ),
																				array( "id" => 15, "name" => "应用中心" ),
																				array( "id" => 43, "name" => "列选项控制" ),
																				array( "id" => 44, "name" => "客户投诉/站内短/汇款" ),
																				array( "id" => 45, "name" => "积分系统" ),
																				array( "id" => 46, "name" => "来访统计" ),
																				array( "id" => 49, "name" => "一卡通返点管理" ),
																				array( "id" => 54, "name" => "一卡通状态查询" ),
																				array( "id" => 55, "name" => "一卡通转出权限" ),
																				array( "id" => 50, "name" => "渠道财务信息" ),
																				array( "id" => 51, "name" => "渠道订单操作" ),
																				array( "id" => 59, "name" => "选择主题" ),
																				array( "id" => 60, "name" => "清除缓存" ),
																				array( "id" => 64, "name" => "系统登陆日志" )
																)
												),
												array(
																"name" => "商品类权限",
																"val" => array(
																				array( "id" => 16, "name" => "商品添加/编辑/列表/库存" ),
																				array( "id" => 17, "name" => "商品分类管理" ),
																				array( "id" => 18, "name" => "商品购买权限" ),
																				array( "id" => 19, "name" => "商品价格管理" ),
																				array( "id" => 20, "name" => "便民中心" ),
																				array( "id" => 21, "name" => "进货/供货系统" ),
																				array( "id" => 22, "name" => "商品充值模板管理" ),
																				array( "id" => 23, "name" => "商品评论管理" ),
																				array( "id" => 24, "name" => "卡密添加/编辑/列表" ),
																				array( "id" => 25, "name" => "一卡通管理" )
																)
												),
												array(
																"name" => "用户类权限",
																"val" => array(
																				array( "id" => 26, "name" => "用户管理" ),
																				array( "id" => 27, "name" => "用户充值记录" ),
																				array( "id" => 28, "name" => "用户账务类统计" ),
																				array( "id" => 29, "name" => "用户的员工列表" ),
																				array( "id" => 47, "name" => "用户扣款/加款" ),
																				array( "id" => 57, "name" => "经销商地址管理" ),
																				array( "id" => 57, "name" => "用户子站管理" ),
																				array( "id" => 58, "name" => "用户资金管理" )
																)
												),
												array(
																"name" => "新闻信息类权限",
																"val" => array(
																				array( "id" => 30, "name" => "新闻公告管理" ),
																				array( "id" => 31, "name" => "新闻分类管理" ),
																				array( "id" => 32, "name" => "站内信管理" ),
																				array( "id" => 33, "name" => "颖先卡购短信息管理" )
																)
												),
												array(
																"name" => "订单类权限",
																"val" => array(
																				array( "id" => 34, "name" => "订单管理" ),
																				array( "id" => 35, "name" => "各类利润管理" ),
																				array( "id" => 39, "name" => "卡密订单管理" ),
																				array( "id" => 40, "name" => "自动订单管理" ),
																				array( "id" => 41, "name" => "手动订单管理" ),
																				array( "id" => 42, "name" => "删除订单" ),
																				array( "id" => 48, "name" => "查看订单卡密" ),
																				array( "id" => 53, "name" => "给已成功订单退款" ),
																				array( "id" => 61, "name" => "订单退款不需要密码" ),
																				array( "id" => 52, "name" => "客户常购商品统计" ),
																				array( "id" => 62, "name" => "补单处理" ),
																				array( "id" => 63, "name" => "补单系统配置" )
																)
												)
								);
								if ( 1 < $R355ef3fa24['adminrank'] )
								{
												$R770c421daf[0]['val'] = array(
																array( "id" => 0, "name" => "系统基本设置" ),
																array( "id" => 1, "name" => "LOGO管理" ),
																array( "id" => 2, "name" => "密保卡管理" ),
																array( "id" => 3, "name" => "系统网关管理" ),
																array( "id" => 4, "name" => "支付网关管理" ),
																array( "id" => 5, "name" => "用户级别体系管理" ),
																array( "id" => 6, "name" => "页面广告类管理" ),
																array( "id" => 7, "name" => "网站升级" ),
																array( "id" => 8, "name" => "银行汇款账号管理" ),
																array( "id" => 9, "name" => "标签管理" ),
																array( "id" => 10, "name" => "投票管理" ),
																array( "id" => 11, "name" => "外汇汇率设置(单种)" ),
																array( "id" => 12, "name" => "生成静态页面" ),
																array( "id" => 13, "name" => "备份当前模板" ),
																array( "id" => 14, "name" => "选择网站模板" ),
																array( "id" => 15, "name" => "应用中心" )
												);
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "yests" ) ) ) );
				}

				public function GetItemLen( )
				{
								return 65;
				}

				public function RightsSave( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "非法操作" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "您好，您无权修改超级管理员相关信息！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
																$this->Alert( "您好，您无权修改自己的权限！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "您好，您无权编辑其他和您同级别的管理员！" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "权限不足" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$R026f0167b4 = array( );
								$R2a5119e7b1 = $this->GetItemLen( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R2a5119e7b1;	$Ra16d228039++	)
								{
												$R244f38266c = intval( request( "rights_".$Ra16d228039 ) );
												if ( 1 < $R355ef3fa24['adminrank'] && $Ra16d228039 == 38 )
												{
																$R244f38266c = 0;
												}
												$R026f0167b4[] = $R244f38266c;
								}
								$Ra0c8454e75 = implode( ",", $R026f0167b4 );
								$data = array(
												"rights" => $Ra0c8454e75
								);
								$R808b89ba0e = $Rfc5c48c798->IMaster_UpdateByName( $data, $Re8bade8a5f );
								if ( $R808b89ba0e )
								{
												$this->Alert( "保存成功" );
								}
								else
								{
												$this->Alert( "保存失败" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=master&a=Rights&adminname=".$Re8bade8a5f );
				}

}

?>
