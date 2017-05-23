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
class AOrderController extends Controller
{

				public $hander = NULL;
				public $rollbackcan = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "orders" );
								$this->rollbackcan = false;
				}

				public function Cetail( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806 );
								$agent = $this->session->agent;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有开通！" );
												$this->GoHome( );
								}
								$R2a51483b14 = $agent[7];
								if ( $R0f8134fb60['item']['inrecycle'] == 1 )
								{
												$this->Alert( "非法操作！订单已经不存在" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ordstate'] != 1 )
								{
												$this->Alert( "此订单已经有人处理，请勿重复提交！" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ordstate'] == 3 )
								{
												$this->Alert( "此订单已经有人处理，请勿重复提交！" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ordstate'] == 1 )
								{
												$data = array( "ordstate" => 3 );
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
												if ( !$R808b89ba0e )
												{
																$this->Alert( "信息提交失败，请重新提交！" );
																$this->HistoryGo( );
												}
								}
								if ( $R0f8134fb60['item']['ptype'] == 0 || 99 < $R0f8134fb60['item']['ptype'] || $R0f8134fb60['item']['ptype'] == 3 )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806 );
								}
								if ( $R0f8134fb60['item']['ptype'] == 6 )
								{
												$Raa3f91d2a5 = factory::getinstance( "powerlv" );
												$data = array(
																"ordno" => $Rdcd9105806
												);
												$R0f8134fb60['powerlv'] = $Raa3f91d2a5->IPowerLv_Get( $data );
								}
								if ( 99 < $R0f8134fb60['item']['payment'] )
								{
												$R3a68f04cc2 = factory::getinstance( "trades" );
												$R0f8134fb60['yktcard'] = $R3a68f04cc2->ITrade_GetAll( $Rdcd9105806 );
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['yktitem'] = $R83a253518c->ICard_GetByTrade( $Rdcd9105806 );
												if ( 0 < count( $R0f8134fb60['yktitem'] ) )
												{
																include_once( UPATH_HELPER."CardHelper.php" );
												}
								}
								$this->Assign( "order", $R0f8134fb60 );
								include( UPATH_HELPER."OrderHelper.php" );
								include( UPATH_HELPER."ProductHelper.php" );
					
												$this->View( );
								
				}

				public function Detail( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								if ( $Rdcd9105806 == "" )
								{
												$this->Alert( "您要查找的订单不存在！请重新输入" );
												$this->HistoryGo( );
								}
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( !isset( $R0f8134fb60['item']['ordno'] ) )
								{
												$R51c50d437c = $this->HistoryTime( );
												if ( 0 < $R51c50d437c )
												{
																$this->hander = factory::getinstance( "ordershistory" );
																$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806 );
												}
												if ( !isset( $R0f8134fb60['item']['ordno'] ) )
												{
																$this->Alert( "您要查找的订单不存在！请重新输入" );
																$this->HistoryGo( );
												}
								}
								$agent = $this->session->agent;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有开通！" );
												$this->GoHome( );
								}
								$R2a51483b14 = $agent[7];
								if ( $R0f8134fb60['item']['inrecycle'] == 1 )
								{
												$this->Alert( "非法操作！订单已经不存在" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ptype'] == 0 || 99 < $R0f8134fb60['item']['ptype'] || $R0f8134fb60['item']['ptype'] == 3 )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806 );
								}
								if ( $R0f8134fb60['item']['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ptype'] == 6 )
								{
												$Raa3f91d2a5 = factory::getinstance( "powerlv" );
												$data = array(
																"ordno" => $Rdcd9105806
												);
												$R0f8134fb60['powerlv'] = $Raa3f91d2a5->IPowerLv_Get( $data );
								}
								if ( 99 < $R0f8134fb60['item']['payment'] )
								{
												$R3a68f04cc2 = factory::getinstance( "trades" );
												$R0f8134fb60['yktcard'] = $R3a68f04cc2->ITrade_GetAll( $Rdcd9105806 );
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['yktitem'] = $R83a253518c->ICard_GetByTrade( $Rdcd9105806 );
												if ( 0 < count( $R0f8134fb60['yktitem'] ) )
												{
																include_once( UPATH_HELPER."CardHelper.php" );
												}
								}
								$this->Assign( "order", $R0f8134fb60 );
								include( UPATH_HELPER."OrderHelper.php" );
								include( UPATH_HELPER."ProductHelper.php" );
						
												$this->View( );
								
				}

				public function Index( )
				{
								global $g_action;
								$ishistory = 0;
								if ( strtolower( $g_action ) != "czorder" )
								{
												$R51c50d437c = $this->HistoryTime( );
												$R51c50d437c = 0 < $R51c50d437c ? 1 : 0;
												$this->Assign( "hashistory", $R51c50d437c );
												$ishistory = intval( request( "ishistory" ) );
												$ishistory = $R51c50d437c == 1 ? $ishistory : 0;
												$this->Assign( "ishistory", $ishistory );
												if ( 0 < $ishistory )
												{
																$this->hander = factory::getinstance( "ordershistory" );
												}
								}
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R1b69c92460 = getvar( "ptype" );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								if ( $Rbdf46d6e43 == 0 )
								{
												$R36130a8639 = $R1b69c92460."|v";
								}
								else if ( $Rbdf46d6e43 == 2 )
								{
												$R36130a8639 = $R1b69c92460."|s";
								}
								else if ( $Rbdf46d6e43 == 1 )
								{
												$R36130a8639 = $R1b69c92460."|w";
								}
								else if ( $Rbdf46d6e43 == 3 )
								{
												$R36130a8639 = $R1b69c92460."|d";
								}
								else if ( $Rbdf46d6e43 == -1 )
								{
												$R36130a8639 = $R1b69c92460."|u";
								}
								else
								{
												$R36130a8639 = $R1b69c92460."|v";
								}
								$this->Assign( "kw", getvar( "keywords" ) );
								$R15a0359c8c = getvar( "stype" );
								if ( $R15a0359c8c == "cardnumber" )
								{
												$Ra09fe38af3 = trim( getvar( "keywords" ) );
												$GLOBALS['_REQUEST']['stype'] = "pname";
												$GLOBALS['_REQUEST']['keywords'] = "";
												if ( $Ra09fe38af3 != "" )
												{
																$data = array( "cardok" => 0 );
																$Rf541845af3 = factory::getinstance( "cards" );
																$Rcc5c6e696c = explode( "|", $Ra09fe38af3 );
																$Rf5f11a8d38 = count( $Rcc5c6e696c );
																if ( $Rf5f11a8d38 == 1 )
																{
																				if ( trim( $Rcc5c6e696c[0] ) != "" )
																				{
																								$data['cardnumber'] = $Rcc5c6e696c[0];
																				}
																}
																else if ( 1 < $Rf5f11a8d38 )
																{
																				if ( trim( $Rcc5c6e696c[0] ) != "" )
																				{
																								$data['cardnumber'] = trim( $Rcc5c6e696c[0] );
																				}
																				if ( trim( $Rcc5c6e696c[1] ) != "" )
																				{
																								$data['cardpwd'] = base64_encode( trim( $Rcc5c6e696c[1] ) );
																				}
																}
																if ( isset( $data['cardnumber'] ) || isset( $data['cardpwd'] ) )
																{
																				$R0f8134fb60 = $Rf541845af3->ICard_GetByLimit( $data, "ordno" );
																				if ( isset( $R0f8134fb60['ordno'] ) )
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								$GLOBALS['_REQUEST']['keywords'] = $R0f8134fb60['ordno'];
																				}
																				else
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								$GLOBALS['_REQUEST']['keywords'] = "nokey";
																				}
																}
												}
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"ordstate" => $Rbdf46d6e43,
												"optype" => $R36130a8639,
												"aid" => $R2a51483b14
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$R657cac7ff2 = intval( request( "export" ) );
								if ( 0 < $R657cac7ff2 )
								{
												$R3db8f5c8bc = $this->hander->IOrder_GetByPageLimit( $data, "ordno,pname,qty,czaccount,czarea1,czarea2,cztype,czother,ordstate,cid,orddate,namehide,company" );
												$R06c518f70e = array( "ordno" => "订单号", "pname" => "购买商品", "qty" => "数量", "czaccount" => "充值账号", "czarea1" => "服务器", "czarea2" => "区域", "cztype" => "计费方式", "czother" => "用户类型", "ordstate" => "订单状态", "cid" => "购买客户", "orddate" => "日期", "namehide" => "其他1", "company" => "其他2" );
												$Re8872481ab = array( "-1" => "交易失败", "0" => "未付款", "1" => "正在处理中", "2" => "交易完成", "3" => "已提交处理" );
												$R026f0167b4 = array( );
												$R026f0167b4[] = $R06c518f70e;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R0f8134fb60['ordno'] = "订单：".$R0f8134fb60['ordno'];
																$R0f8134fb60['czarea1'] = ( $R0f8134fb60['namehide'] == "czarea1" ? "密码：" : "" ).cztext( $R0f8134fb60['czarea1'], 1 );
																$R0f8134fb60['czarea2'] = ( $R0f8134fb60['namehide'] == "czarea2" ? "密码：" : "" ).cztext( $R0f8134fb60['czarea2'], 1 );
																$R0f8134fb60['cztype'] = ( $R0f8134fb60['namehide'] == "cztype" ? "密码：" : "" ).cztext( $R0f8134fb60['cztype'], 1 );
																$R0f8134fb60['czother'] = ( $R0f8134fb60['namehide'] == "czother" ? "密码：" : "" ).cztext( $R0f8134fb60['czother'], 1 );
																$R0f8134fb60['cid'] = $R0f8134fb60['company']."(".$R0f8134fb60['cid'].")";
																$R0f8134fb60['namehide'] = "";
																$R0f8134fb60['company'] = "";
																if ( $R0f8134fb60['ordstate'] != 2 )
																{
																				$R0f8134fb60['ordstate'] = isset( $Re8872481ab[$R0f8134fb60['ordstate']] ) ? $Re8872481ab[$R0f8134fb60['ordstate']] : "未知";
																}
																else
																{
																				$R0f8134fb60['ordstate'] = "交易完成";
																}
																$R026f0167b4[] = $R0f8134fb60;
												}
												$R3d36631c17 = $R657cac7ff2 == 1 ? "excel" : "csv";
												$R7ca55aed77 = factory::getfs( $R3d36631c17 );
												$R696350cab3 = urldecode( $R1e3bc50f23[0]['startdate'] );
												$R696350cab3 = str_replace( "-", "", $R696350cab3 );
												$R696350cab3 = str_replace( " ", "-", $R696350cab3 );
												$R696350cab3 = str_replace( ":", "", $R696350cab3 );
												$R1c8e0f6795 = urldecode( $R1e3bc50f23[0]['enddate'] );
												$R1c8e0f6795 = str_replace( "-", "", $R1c8e0f6795 );
												$R1c8e0f6795 = str_replace( " ", "-", $R1c8e0f6795 );
												$R1c8e0f6795 = str_replace( ":", "", $R1c8e0f6795 );
												$R7ca55aed77->output( $R026f0167b4, "自有商品订单记录_".$R696350cab3."_".$R1c8e0f6795 );
												exit( );
								}
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$R00be52aa45 = array( "ordno" => "订单号", "aid" => "用户编号", "pid" => "商品编号", "aname" => "用户名", "cname" => "操作者", "pname" => "商品名", "cqq" => "QQ号", "ctel" => "电话", "cmail" => "邮箱", "czaccount" => "充值号", "cip" => "IP" );
								$Rbf6c8991d9 = $this->hander->IOrder_GetTradeData( $data );
								$this->Assign( "tradedata", $Rbf6c8991d9 );
								$data['ptype'] = $R1b69c92460;
								$data['ishistory'] = $ishistory;
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Recycle( "orders" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "comefrom", intval( request( "comefrom", 0 ) ) );
								$this->Assign( "aid", $R2a51483b14 );
							
												$this->view( );
								
				}

				public function Simple( )
				{
							
												$this->Index( );
								
				}

				public function CzOrder( )
				{
								$this->Index( );
				}

				public function CzOrderList( )
				{
								$this->Index( );
				}

				public function Check( )
				{
								$agent = $this->session->agent;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有开通！" );
												$this->GoHome( );
								}
								$R2a51483b14 = $agent[7];
								$R94e0136c8a = $agent[9];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								if ( $Rbdf46d6e43 == 1 )
								{
												$this->Alert( "非法提交参数！" );
												$this->HistoryGo( );
								}
								$R4ef2186fef = getvar( "failreason" );
								$Rb988dfa93e = htmlspecialchars( getvar( "factoryreturn", "" ) );
								if ( $Rbdf46d6e43 == -1 )
								{
												$R922c035b87 = 1;
								}
								else
								{
												$R922c035b87 = 0;
								}
								$Rdcd9105806 = getvar( "ubzordno" );
								$data = array(
												"ordstate" => $Rbdf46d6e43,
												"failreason" => $R4ef2186fef,
												"factoryreturn" => $Rb988dfa93e,
												"rollback" => $R922c035b87,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$R56ea904d53 = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "*" );
								$Rb60574d852 = $R56ea904d53['payment'];
								$R0b14cc7367 = $R56ea904d53['rollback'];
								$R4bef9862f8 = $R56ea904d53['ordstate'];
								$R1b69c92460 = $R56ea904d53['ptype'];
								$R2a51483b14 = $R56ea904d53['aid'];
								$Rb9d4add894 = $R56ea904d53['comefrom'];
								if ( $R0b14cc7367 == 1 )
								{
												$data['rollback'] = 1;
								}
								if ( $R1b69c92460 != 1 && $R1b69c92460 != 2 )
								{
												$this->Alert( "非法提交参数！" );
												$this->HistoryGo( );
								}
								$R105a79440a = factory::getinstance( "ack" );
								$this->rollbackcan = $R105a79440a->CanRollBack( $Rdcd9105806 );
								if ( $R2a51483b14 != $R56ea904d53['aid'] )
								{
												$this->Alert( "非法操作！" );
												$this->GoHome( );
								}
								if ( $Rb60574d852 == 100 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$R71dfa8a4fc = getvar( "superpwd" );
																if ( $R71dfa8a4fc != $agent['superpwd'] )
																{
																				$this->Alert( "您输入的超级密码输入有错！请重新输入" );
																				$this->HistoryGo( );
																}
																if ( $this->rollbackcan )
																{
																				$this->RollBack( $Rdcd9105806 );
																}
																$R63bede6b19 = "本次退款成功！";
												}
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 1 && $this->rollbackcan == false )
												{
																$R63bede6b19 = "此订单之前已经退款！本次操作不会重复退款";
												}
								}
								if ( $Rb9d4add894 == 1 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$R71dfa8a4fc = getvar( "superpwd" );
																if ( $R71dfa8a4fc != $agent['superpwd'] )
																{
																				$this->Alert( "您输入的超级密码输入有错！请重新输入" );
																				$this->HistoryGo( );
																}
																if ( $this->rollbackcan )
																{
																				$R808b89ba0e = $this->RollBackAgentMoney( $Rdcd9105806 );
																				if ( !$R808b89ba0e )
																				{
																								$this->HistoryGo( );
																				}
																}
																else
																{
																				$R63bede6b19 = "此订单之前已经退款！本次操作不会重复退款";
																}
												}
												if ( $Rbdf46d6e43 == 2 && ( $R4bef9862f8 == 1 || $R4bef9862f8 == 3 ) && $this->rollbackcan )
												{
																$this->UpdateRank( $R56ea904d53['aname'], $R56ea904d53['dollars'] );
																$R60144b28c1 = $this->AgentProfit( $R56ea904d53['aname'], $R56ea904d53['pid'], $R56ea904d53['qty'], $Rdcd9105806, $R56ea904d53['pname'], $R56ea904d53['aid'] );
																$data['agentprofit'] = $R60144b28c1;
																if ( 0 < $R56ea904d53['aid'] )
																{
																				$R56ea904d53['agentprofit'] = $R60144b28c1;
																				$R105a79440a = factory::getinstance( "ack" );
																				$R2903714d94 = $R105a79440a->UpdateSup( $R56ea904d53 );
																				$data = array_merge( $data, $R2903714d94 );
																}
												}
												if ( $R4bef9862f8 == 1 )
												{
																if ( $R94e0136c8a == 0 )
																{
																				$Reb446f9954 = "总帐号";
																}
																else
																{
																				$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
																				$Reb446f9954 = $Raac42e4217['realname'];
																}
																$data['opname'] = $Reb446f9954;
												}
								}
								if ( $Rbdf46d6e43 == 2 && ( $R4bef9862f8 = $UN_1 || $R4bef9862f8 == 3 ) && $R56ea904d53['cname'] != "" && $Rb60574d852 != 96 && $this->rollbackcan )
								{
												$this->AgentScored( $R56ea904d53 );
								}
								if ( $Rb60574d852 == 96 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																if ( $this->rollbackcan )
																{
																				$R808b89ba0e = $this->RollBackAgentScored( $Rdcd9105806 );
																				if ( !$R808b89ba0e )
																				{
																								$this->HistoryGo( );
																				}
																}
																else
																{
																				$R63bede6b19 = "此订单之前已经退款！本次操作不会重复退款";
																}
												}
												$Rf3d646c485 = factory::getinstance( "scoredorder" );
												$R85af19fea1 = array(
																"ordstate" => $Rbdf46d6e43
												);
												$Rf3d646c485->IScoredOrder_Update( $R85af19fea1, $Rdcd9105806 );
								}
								$this->hander->IOrder_Update( $data, getvar( "ubzordno" ) );
								$this->Alert( "更新成功" );
								$R7c55d765bd = intval( request( "isc" ) );
								if ( $R7c55d765bd == 1 )
								{
												$this->ScriptRedirect( "index.php?m=mod_agent&c=AOrder&a=CzOrder&ptype=sd&ordstate=1&by=1" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_agent&c=AOrder&a=detail&ordno=".$Rdcd9105806 );
								}
				}

				public function CancelOrder( )
				{
								$agent = $this->session->agent;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有开通！" );
												$this->GoHome( );
								}
								$R2a51483b14 = $agent[7];
								$R94e0136c8a = $agent[9];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改相关信息的！" );
												$this->HistoryGo( );
								}
								$R63bede6b19 = "";
								$Rbdf46d6e43 = -1;
								$R4ef2186fef = getvar( "failreason" );
								$Rb988dfa93e = "";
								$R922c035b87 = 1;
								$Rdcd9105806 = getvar( "ubzordno" );
								$data = array(
												"ordstate" => $Rbdf46d6e43,
												"failreason" => $R4ef2186fef,
												"factoryreturn" => $Rb988dfa93e,
												"rollback" => $R922c035b87,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "ordno,payment,rollback,ordstate,ptype,aname,pid,qty,pname,aid,cname,scored,aid,cid,fee,cprice,dollars,price,comefrom" );
								$Rb60574d852 = $Rebd5a5dade['payment'];
								$R0b14cc7367 = $Rebd5a5dade['rollback'];
								$R4bef9862f8 = $Rebd5a5dade['ordstate'];
								$R1b69c92460 = $Rebd5a5dade['ptype'];
								$R2a51483b14 = $Rebd5a5dade['aid'];
								$Rb9d4add894 = $Rebd5a5dade['comefrom'];
								if ( $R1b69c92460 == 1 || $R1b69c92460 == 2 )
								{
												$this->Alert( "非法提交参数！" );
												$this->HistoryGo( );
								}
								$R105a79440a = factory::getinstance( "ack" );
								$this->rollbackcan = $R105a79440a->CanRollBack( $Rdcd9105806 );
								if ( $Rb60574d852 == 100 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$R71dfa8a4fc = getvar( "superpwd" );
																if ( $R71dfa8a4fc != $agent['superpwd'] )
																{
																				$this->Alert( "您输入的超级密码输入有错！请重新输入" );
																				$this->HistoryGo( );
																}
																if ( $this->rollbackcan )
																{
																				$this->RollBack( $Rdcd9105806 );
																				$R63bede6b19 = "！已经取消订单并返还一卡通余额";
																}
												}
												if ( $this->rollbackcan == false )
												{
																$R63bede6b19 = "！此订单之前已经退款！本次操作不会重复退款";
												}
								}
								if ( $Rb9d4add894 == 1 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$R71dfa8a4fc = getvar( "superpwd" );
																if ( $R71dfa8a4fc != $agent['superpwd'] )
																{
																				$this->Alert( "您输入的超级密码输入有错！请重新输入" );
																				$this->HistoryGo( );
																}
																if ( $this->rollbackcan )
																{
																				$R808b89ba0e = $this->RollBackAgentMoney( $Rdcd9105806 );
																				if ( !$R808b89ba0e )
																				{
																								$this->HistoryGo( );
																				}
																				$R63bede6b19 = "！已经取消订单并退款";
																}
																else
																{
																				$R63bede6b19 = "！此订单之前已经退款！本次操作不会重复退款";
																}
												}
												else
												{
																$R63bede6b19 = "！此订单之前已经退款！本次操作不会重复退款";
												}
								}
								if ( $R94e0136c8a == 0 )
								{
												$Reb446f9954 = "总帐号";
								}
								else
								{
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												$Reb446f9954 = $Raac42e4217['realname'];
								}
								$data['opname'] = $Reb446f9954;
								$this->hander->IOrder_Update( $data, $Rdcd9105806 );
								$this->Alert( "更新成功".$R63bede6b19 );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=AOrder&a=detail&ordno=".$Rdcd9105806 );
				}

				public function RollBackFunds( $R2a51483b14, $R9b252bf0a7, $Rdcd9105806, $R56ea904d53 )
				{
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "funds,aid,aremain" );
								$Rd8fb5ae7df = $agent['funds'] - $R9b252bf0a7;
								if ( $Rd8fb5ae7df < 0 )
								{
												$this->Alert( "您的供货所得金额太少，本次操作无法进行，请联系管理员把您的余额转入供货所得，再进行退款操作！" );
												return false;
								}
								$data = array(
												"funds" => $Rd8fb5ae7df
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R65edce27dd = $R56ea904d53['pname'];
												$R66b0d9d6f1 = $R56ea904d53['qty'];
												$R63d0786ecc = round( $R9b252bf0a7 / $R66b0d9d6f1, 3 );
												$this->UpdateTrade( $agent['aid'], 12, $Rdcd9105806, $agent['aid'], "[订单取消]".$R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, 0, $agent['aid'], $Rd8fb5ae7df, $agent['funds'], $R9b252bf0a7, $R9b252bf0a7 );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function RollBack( $Rdcd9105806 )
				{
								$R808b89ba0e = true;
								if ( $R808b89ba0e )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$R21ef3485d7 = $Rf541845af3->ICard_GetByTrade( $Rdcd9105806 );
												foreach ( $R21ef3485d7 as $R0f8134fb60 )
												{
																$R72852f08e6 = $R0f8134fb60['money'] + $R0f8134fb60['outcome'];
																$data = array(
																				"money" => $R72852f08e6,
																				"cardok" => 1
																);
																$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
												}
												$Rae8a26f24a = factory::getinstance( "trades" );
												$data = array( "state" => -1 );
												$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

				public function RollBackAgentMoney( $Rdcd9105806 )
				{
								$R56ea904d53 = $this->hander->IOrder_Get( $Rdcd9105806 );
								$R3a8b307327 = $this->GetDec( );
								$R808b89ba0e = true;
								if ( 0 < $R56ea904d53['aid'] && $R56ea904d53['ordstate'] == 2 )
								{
												$R808b89ba0e = $this->RollBackFunds( $R56ea904d53['aid'], $R56ea904d53['dollars'], $Rdcd9105806, $R56ea904d53 );
								}
								if ( $R808b89ba0e )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_GetByName( $R56ea904d53['aname'] );
												$R55c494bb27 = $this->GetProductCache( $R56ea904d53['pid'] );
												$R4f39743f74 = $this->GetPriceById( $R55c494bb27, $agent, $R3a8b307327 );
												$R2a51483b14 = $agent['aid'];
												$R9b252bf0a7 = $R56ea904d53['dollars'];
												if ( $R56ea904d53['dollars'] < 0 )
												{
																return true;
												}
												$R98bc1630cd = $agent['aremain'] + $R9b252bf0a7;
												$Re90242a509 = $agent['acsmp'] - $R9b252bf0a7;
												$R3ab1f9eb35 = $agent['aremain'];
												$data = array(
																"aremain" => $R98bc1630cd,
																"acsmp" => $Re90242a509
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$this->UpdateRank( $R56ea904d53['aname'], "-".$R56ea904d53['dollars'] );
																$data = array(
																				"ordstate" => -1,
																				"failreason" => "订单失败[已经退款]",
																				"factoryreturn" => "",
																				"rollback" => 1,
																				"dealdate" => date( "Y-m-d H-i-s" )
																);
																$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
																$Rc0c42883ee = $R98bc1630cd;
																$agent = $this->session->agent;
																$R9c92d6cfae = $agent[7];
																$this->UpdateTrade( $R2a51483b14, 1, $R56ea904d53['ordno'], $R9c92d6cfae, "(订单失败退款)".$R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], $R9b252bf0a7, $R2a51483b14, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, 0 );
																$Rae8a26f24a = factory::getinstance( "trades" );
																$data = array( "state" => -1 );
																$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
																return true;
												}
												else
												{
																return false;
												}
								}
								else
								{
												return false;
								}
				}

				public function UpdateRank( $R45074ab3da, $R72852f08e6 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R45074ab3da, "acsmp, alv, aid, parentid" );
								$Re90242a509 = $agent['acsmp'] + $R72852f08e6;
								$R046b4585a2 = $this->GetRank1( $Re90242a509, "name,id" );
								if ( !isset( $R046b4585a2['id'] ) )
								{
												return 2;
								}
								if ( 0 < $agent['parentid'] )
								{
												$R9aa102385f = $this->GetAgentCache( $agent['parentid'] );
												$Rbe5b8dea24 = $R9aa102385f['alv'];
												if ( $R046b4585a2['id'] == $Rbe5b8dea24 )
												{
																return 2;
												}
								}
								if ( $agent['alv'] == $R046b4585a2['id'] )
								{
												return 2;
								}
								else
								{
												$data = array(
																"alv" => $R046b4585a2['id']
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $agent['aid'] );
												if ( $R808b89ba0e )
												{
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function GetRank1( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function Del( )
				{
								return;
								$Rdcd9105806 = getvar( "ordno" );
								$R0f8134fb60 = $this->hander->IOrder_Get( $Rdcd9105806 );
								$agent = $this->session->agent;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有开通！" );
												$this->HistoryGo( );
								}
								$R2a51483b14 = $agent[7];
								if ( $R0f8134fb60['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$R808b89ba0e = $this->hander->IOrder_DeleteByStr( "", array(
												"ordno" => $Rdcd9105806,
												"aid" => $R2a51483b14
								) );
								if ( !$R808b89ba0e )
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
								else
								{
												$this->Alert( "删除成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=AOrder&by=1" );
								}
				}

				public function AgentScored( $R56ea904d53 )
				{
								$R88f9731c8f = $R56ea904d53['scored'];
								if ( 0 < $R88f9731c8f && $R56ea904d53['aid'] != $R56ea904d53['cid'] && 0 < $R56ea904d53['cid'] )
								{
												$R2a51483b14 = $R56ea904d53['cid'];
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored,aname" );
												$Re6dea2fc8d = $agent['scored'];
												$R386bfdf511 = $Re6dea2fc8d + $R56ea904d53['scored'];
												$data = array(
																"scored" => $R386bfdf511
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																if ( $agent['aname'] == $R56ea904d53['cname'] )
																{
																				$R94e0136c8a = 0;
																}
																else
																{
																				$R5f84c47438 = factory::getinstance( "staffs" );
																				$Raac42e4217 = $R5f84c47438->IStaff_GetByName( $R56ea904d53['cname'], "staffid" );
																				if ( !isset( $Raac42e4217['staffid'] ) )
																				{
																								$R94e0136c8a = 0;
																				}
																				else
																				{
																								$R94e0136c8a = $Raac42e4217['staffid'];
																				}
																}
																$data = array(
																				"ordno" => $R56ea904d53['ordno'],
																				"pname" => $R56ea904d53['pname'],
																				"qty" => $R56ea904d53['qty'],
																				"scored" => $R56ea904d53['scored'],
																				"fat" => $R386bfdf511,
																				"fbt" => $Re6dea2fc8d,
																				"aid" => $R2a51483b14,
																				"staffid" => $R94e0136c8a,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"state" => 5,
																				"method" => 3
																);
																$R645c69ff15 = factory::getinstance( "scored" );
																$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												}
								}
				}

				public function RollBackAgentScored( $Rdcd9105806 )
				{
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R61a8cd51a4 = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( !isset( $R61a8cd51a4['scored'] ) )
								{
												$this->Alert( "退款失败！请重新退款" );
												return false;
								}
								$R2a51483b14 = $R61a8cd51a4['aid'];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
								$R114f28ca48 = $R61a8cd51a4['scored'];
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R114f28ca48;
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"ordstate" => -1,
																"failreason" => "订单失败积分点已经返还用户",
																"factoryreturn" => "",
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $Rdcd9105806 );
												$data = array( "ordstate" => -1 );
												$Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
												$R645c69ff15 = factory::getinstance( "scored" );
												$data = array(
																"ordno" => $Rdcd9105806,
																"pname" => "[订单退款]".$R61a8cd51a4['pname'],
																"qty" => $R61a8cd51a4['qty'],
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R61a8cd51a4['staffid'],
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => -1,
																"method" => $R61a8cd51a4['method']
												);
												$R645c69ff15->IScored_Create( $data );
												$data = array( "state" => -1 );
												$R645c69ff15->IScored_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

}

?>
