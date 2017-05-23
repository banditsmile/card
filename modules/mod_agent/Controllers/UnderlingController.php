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
class UnderlingController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "agents" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IAgent_CustomPage( $data );
								$R00c1510c0e = $this->GetRCache( );
								$R026f0167b4 = array( );
								foreach ( $R00c1510c0e as $R0f8134fb60 )
								{
												$R026f0167b4[$R0f8134fb60['id']] = $R0f8134fb60['name'];
								}
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R4e420efcc3['item'][$Ra16d228039]['rank'] = $R026f0167b4[$R4e420efcc3['item'][$Ra16d228039]['alv']];
								}
								$this->FillPage( $data, $R4e420efcc3 );
							
												$this->view( );
								
				}

				public function Right( )
				{
								$this->Index( );
				}

				public function Consump( )
				{
								$this->Index( );
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R901a6b96db = array( "解冻", "冻结" );
								$R2a51483b14 = intval( request( "aid" ) );
								$this->CheckUnderling( $R2a51483b14 );
								$R4906cf6137 = $this->GetRank( $Rcc5c6e696c[5] );
								$Rd8599efe59 = $this->GetRCache( );
								if ( count( $Rd8599efe59 ) == 0 )
								{
												$this->Alert( "系统级别设定错误" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Dealer&a=home" );
								}
								$R4420266e85 = $this->GetRankType( );
								$R026f0167b4 = array( );
								foreach ( $Rd8599efe59 as $R0f8134fb60 )
								{
												if ( $R4420266e85 )
												{
																if ( $R0f8134fb60['gid'] < $R4906cf6137['gid'] && $R0f8134fb60['money'] < $R4906cf6137['money'] && 0 < $R0f8134fb60['gid'] )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												else if ( $R0f8134fb60['money'] < $R4906cf6137['money'] && 0 < $R0f8134fb60['gid'] )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
							
												$this->Assign( "ranks", $R026f0167b4 );
												$this->Assign( "state", $R901a6b96db );
												$this->Assign( "data", $this->GetAgentCache( $R2a51483b14 ) );
												$this->View( );
							
				}

				public function Add( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R381017b23a = $this->GetAgentCache( $R2a51483b14 );
								if ( !isset( $R381017b23a['aid'] ) || $R381017b23a['frozen'] == 1 )
								{
												$this->Alert( "您的账号已经不存在或者被冻结" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&a=logout" );
								}
								$R87aee22884 = $this->GetRank( $R381017b23a['alv'] );
								if ( $R87aee22884['gid'] < 2 )
								{
												$this->Alert( "直销商级别用户无法招收下级" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Dealer&a=Home" );
								}
								else
								{
										
																$this->View( );
										
								}
				}

				public function CheckUnderling( $R2a51483b14 )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2f07e1d8b8 = $this->GetAgentCache( $R2a51483b14 );
								if ( !isset( $R2f07e1d8b8['parentid'] ) )
								{
												$this->Alert( "您好！下级不存在！" );
												$this->HistoryGo( );
								}
								if ( $R2f07e1d8b8['parentid'] != $Rcc5c6e696c[7] )
								{
												$this->Alert( "您好！您无法操作其他客户的下级！" );
												$this->HistoryGo( );
								}
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法操作下级的！" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$R043923fe11 = intval( request( "alv" ) );
								$this->CheckUnderling( $R2a51483b14 );
								$R4906cf6137 = $this->GetRank( $agent['alv'] );
								$R046b4585a2 = $this->GetRank( $R043923fe11 );
								$R4420266e85 = $this->GetRankType( );
								if ( $R4420266e85 )
								{
												if ( $R4906cf6137['gid'] <= $R046b4585a2['gid'] )
												{
																$this->Alert( "非法操作！" );
																$this->HistoryGo( );
												}
								}
								else if ( $R4906cf6137['money'] <= $R046b4585a2['money'] )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$data = array(
												"frozen" => intval( request( "frozen" ) ),
												"alv" => $R043923fe11
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
												$this->Alert( "更新成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=underling&a=detail&aid=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( "更新失败" );
												$this->HistoryGo( );
								}
				}

				public function RegSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R0e49cc133a = $this->GetRankDefault( 1 );
								if ( !isset( $R0e49cc133a['id'] ) )
								{
												$this->Alert( "系统没有默认级别，请联系管理员设置" );
												$this->HistoryGo( );
								}
								$R07cdd73907 = getvar( "ubzcname", "", "POST" );
								$R3ff93324b3 = getvar( "ubzcrealname", "", "POST" );
								$Rfddc2155d8 = getvar( "ubzcaddr", "", "POST" );
								$R6ae960df43 = getvar( "ubzcompany", "", "POST" );
								$R72f6fd380c = getvar( "ubzprv", "", "POST" );
								$Rcd67889baf = getvar( "ubzcity", "", "POST" );
								$R7cf2762c01 = getvar( "ubzeshop", "", "POST" );
								$R49904173b4 = getvar( "ubzidcard", "", "POST" );
								$R6ae960df43 = str_replace( "|", "", $R6ae960df43 );
								$R72f6fd380c = str_replace( "|", "", $R72f6fd380c );
								$Rcd67889baf = str_replace( "|", "", $Rcd67889baf );
								if ( trim( $R07cdd73907 ) == "" )
								{
												$this->Alert( "您好！用户名不能为空！" );
												$this->HistoryGo( );
								}
								if ( strpos( $R07cdd73907, "|" ) !== false )
								{
												$this->Alert( "用户名不能含有特殊符号，请重新输入" );
												$this->HistoryGo( );
								}
								$R4ecc66c386 = $this->hander->IAgent_IsExist( $R07cdd73907 );
								if ( $R4ecc66c386 == 0 )
								{
												$this->Alert( "用户名已经存在" );
												$this->HistoryGo( );
								}
								$R0d6b33394f = getvar( "ubzcpwd", "", "POST" );
								$R289ea98f26 = getvar( "ubzcqq", "", "POST" );
								$R8b01c83d35 = getvar( "ubzcmail", "", "POST" );
								$Rb4f95547a5 = getvar( "ubzcmobile", "", "POST" );
								$R64dad0e3a8 = getvar( "ubzctel", "", "POST" );
								$R14b8c5658f = intval( request( "ubzparentid", "", "POST" ) );
								$Rf1f86e2396 = getvar( "ubzwebsetting", "1|1|0|1|1|1|1|0|0|0|0|0|0", "POST" );
								$R14b8c5658f = $R2a51483b14;
								$R381017b23a = $this->GetAgentCache( $R14b8c5658f );
								if ( 0 < $R14b8c5658f && !isset( $R381017b23a['aid'] ) )
								{
												$this->Alert( "您的账户已经不存在" );
												$this->HistoryGo( );
								}
								if ( 0 < $R14b8c5658f && isset( $R381017b23a['alv'] ) )
								{
												$R87aee22884 = $this->GetRank( $R381017b23a['alv'] );
												if ( $R87aee22884['gid'] < 2 )
												{
																$this->Alert( "您的级别不能招收下家" );
																$this->HistoryGo( );
												}
												if ( $R87aee22884['gid'] <= $R0e49cc133a['gid'] )
												{
																$Rab95a9b478 = $this->GetIdBelow( $R381017b23a['alv'] );
																if ( $Rab95a9b478 == -1 )
																{
																				$this->Alert( "您的级别不能招收下家" );
																				$this->HistoryGo( );
																}
																else
																{
																				$R0e49cc133a['id'] = $Rab95a9b478;
																}
												}
								}
								$R30b2ab8dc1 = $this->GetWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 4 < $R30aa8c1852 )
								{
												$R581012b834 = $Rcc5c6e696c[4];
								}
								else
								{
												$R581012b834 = 0;
								}
								if ( $R581012b834 == 1 )
								{
												$Ra0c8454e75 = "1,0";
								}
								else
								{
												$Ra0c8454e75 = "0,0";
								}
								$data = array(
												"aname" => trim( $R07cdd73907 ),
												"apwd" => trim( $R0d6b33394f ),
												"tradepwd" => trim( $R0d6b33394f ),
												"superpwd" => trim( $R0d6b33394f ),
												"arealname" => $R3ff93324b3,
												"aqq" => $R289ea98f26,
												"amail" => $R8b01c83d35,
												"mobile" => $Rb4f95547a5,
												"atel" => $R64dad0e3a8,
												"aaddr" => $Rfddc2155d8,
												"company" => $R6ae960df43,
												"eshop" => $R7cf2762c01,
												"idcard" => $R49904173b4,
												"prv" => $R72f6fd380c,
												"city" => $Rcd67889baf,
												"websetting" => $Rf1f86e2396,
												"parentid" => $R14b8c5658f,
												"aqq" => getvar( "ubzcqq", "", "POST" ),
												"regdate" => date( "Y-m-d H-i-s" ),
												"regip" => $this->GetIp( ),
												"lastdate" => date( "Y-m-d H-i-s" ),
												"lastip" => $this->GetIp( ),
												"lastlogintype" => 0,
												"lastloginaccount" => 0,
												"thisdate" => date( "Y-m-d H-i-s" ),
												"thislogintype" => 0,
												"thisloginaccount" => 0,
												"thisip" => $this->GetIp( ),
												"alv" => $R0e49cc133a['id'],
												"aremain" => 0,
												"acsmp" => 0,
												"funds" => 0,
												"selffrozenfunds" => 0,
												"tradefrozenfunds" => 0,
												"sysfrozenfunds" => 0,
												"bossfrozenfunds" => 0,
												"arrears" => 0,
												"checktradepwd" => 0,
												"frozen" => 1,
												"rights" => $Ra0c8454e75,
												"leftrights" => $R30b2ab8dc1['defaultmenu']
								);
								$R4e420efcc3 = $this->hander->IAgent_Create( $data );
								if ( 0 < $R4e420efcc3 )
								{
												$this->Alert( "创建成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=underling" );
								}
								else
								{
												$this->Alert( "创建失败" );
												$this->HistoryGo( );
								}
				}

				public function Frozen( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法操作下级的！" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = intval( request( "aid" ) );
								$this->CheckUnderling( $R2a51483b14 );
								$R89cd0a3912 = intval( request( "frozen" ) );
								$data = array(
												"frozen" => $R89cd0a3912
								);
								$R808b89ba0e = $this->hander->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												if ( $R89cd0a3912 == 0 )
												{
																$this->AddLog( "冻结编号".$R2a51483b14."的下级" );
												}
												else
												{
																$this->AddLog( "解冻编号".$R2a51483b14."的下级" );
												}
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=underling" );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

}

?>
