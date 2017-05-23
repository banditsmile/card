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
class OrderController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "orders" );
				}

				public function CheckUnderling( $R2a51483b14 )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2097a8fddf = factory::getinstance( "agents" );
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "parentid,aname,aid" );
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
								return $R2f07e1d8b8['aname'];
				}

				public function Index( )
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
								$Rcc5c6e696c = $this->session->agent;
								$R2fa4b8c965 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rac70c4890d = intval( request( "aid" ) );
								$R1b69c92460 = getvar( "ptype" );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								if ( $Rbdf46d6e43 == 0 )
								{
												$R36130a8639 = $R1b69c92460;
								}
								else if ( $Rbdf46d6e43 == 2 )
								{
												$R36130a8639 = $R1b69c92460."|s";
								}
								else if ( $Rbdf46d6e43 == 1 )
								{
												$R36130a8639 = $R1b69c92460."|w";
								}
								else if ( $Rbdf46d6e43 == -1 )
								{
												$R36130a8639 = $R1b69c92460."|u";
								}
								else
								{
												$R36130a8639 = $R1b69c92460;
								}
								if ( isset( $_COOKIE['umebiz_com_ini_1'] ) && 0 < $Rcc5c6e696c[9] )
								{
												$Rbd83edab70 = intval( $_COOKIE['umebiz_com_ini_1'] );
								}
								else
								{
												$Rbd83edab70 = 1;
								}
								if ( 0 < $Rcc5c6e696c[9] && $Rbd83edab70 == 0 )
								{
												$R0dc0347d49 = $Rcc5c6e696c[10];
								}
								else
								{
												$R0dc0347d49 = getvar( "staffname" );
								}
								if ( 0 < $Rac70c4890d && $R2a51483b14 != $Rac70c4890d )
								{
												$R2fa4b8c965 = $this->CheckUnderling( $Rac70c4890d );
												if ( trim( $R2fa4b8c965 ) == "" )
												{
																$this->Alert( "您好！您的用户有问题！" );
																$this->HistoryGo( );
												}
												$R0dc0347d49 = "";
								}
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"ordstate" => $Rbdf46d6e43,
												"optype" => $R36130a8639,
												"cname" => $R0dc0347d49,
												"aname" => $R2fa4b8c965,
												"payment" => getvar( "payment" )
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R657cac7ff2 = intval( request( "export" ) );
								if ( 0 < $R657cac7ff2 )
								{
												$R3db8f5c8bc = $this->hander->IOrder_GetByPageLimit( $data, "ordno,pname,czaccount,qty,cprice,dollars,ordstate,orddate" );
												$R06c518f70e = array( "ordno" => "订单号", "pname" => "购买商品", "czaccount" => "充值账号", "qty" => "数量", "cprice" => "单价", "dollars" => "支出金额", "ordstate" => "订单状态", "orddate" => "日期" );
												$Re8872481ab = array( "-1" => "交易失败", "0" => "未付款", "1" => "正在处理中", "2" => "已提交处理", "2" => "交易完成" );
												$R026f0167b4 = array( );
												$R026f0167b4[] = $R06c518f70e;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R0f8134fb60['ordno'] = "订单：".$R0f8134fb60['ordno'];
																if ( $R198d213635 == 0 )
																{
																				$R0f8134fb60['cprice'] = "-";
																				$R0f8134fb60['dollars'] = "-";
																}
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
												$R7ca55aed77->output( $R026f0167b4, "进货记录_".$R696350cab3."_".$R1c8e0f6795 );
												exit( );
								}
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$Rbf6c8991d9 = $this->hander->IOrder_GetTradeData( $data );
								$this->Assign( "tradedata", $Rbf6c8991d9 );
								$data['ptype'] = $R1b69c92460;
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "staffname,staffid,realname", $R2a51483b14 );
								$this->Assign( "staff", $Raac42e4217 );
								$this->Assign( "staffname", getvar( "staffname" ) );
								$this->Assign( "canseeprice", $R198d213635 );
								$this->Assign( "canseeother", $Rbd83edab70 );
						
												$this->view( );
						
				}

				public function Underling( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R2f07e1d8b8 = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "underling", $R2f07e1d8b8 );
							
												$this->Index( );
							
				}

				public function GetState( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "*" );
								if ( !isset( $R3db8f5c8bc['ordstate'] ) )
								{
												echo -2;
								}
								else
								{
												$R808b89ba0e = $this->CheckRight( $R3db8f5c8bc, 1 );
												if ( $R808b89ba0e )
												{
																echo $R808b89ba0e;
																exit( );
												}
												$Rbdf46d6e43 = $R3db8f5c8bc['ordstate'];
												if ( $Rbdf46d6e43 == 1 )
												{
																$Raba57bd7d6 = $R3db8f5c8bc['sup'];
																$Rb60574d852 = $R3db8f5c8bc['payment'];
																if ( $Rb60574d852 == 96 )
																{
																				if ( $Raba57bd7d6 == 1 )
																				{
																								$Re9b5f92229 = factory::getservice( "ackscored" );
																								$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, getvar( "sign" ) );
																				}
																				else
																				{
																								$Re9b5f92229 = factory::getinstance( "ackscored" );
																								$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc );
																				}
																}
																else if ( $Raba57bd7d6 == 1 )
																{
																				$Re9b5f92229 = factory::getservice( "ack" );
																				$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, getvar( "sign" ) );
																}
																else
																{
																				$Re9b5f92229 = factory::getinstance( "ack" );
																				$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc );
																}
												}
												echo $Rbdf46d6e43;
								}
				}

				public function CheckRight( $R56ea904d53, $R034ae2ab94 = 0 )
				{
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R2a51483b14 = $Rcc5c6e696c[7];
								}
								else if ( $R034ae2ab94 == 0 )
								{
												$this->Alert( "您还没有登陆！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b" );
								}
								else
								{
												return 1;
								}
								if ( $R56ea904d53['cid'] != $R2a51483b14 && $R56ea904d53['aid'] != $R2a51483b14 )
								{
												if ( $R034ae2ab94 == 0 )
												{
																$this->Alert( "您无权查看！请重新输入" );
																$this->HistoryGo( );
												}
												else
												{
																return 1;
												}
								}
								return 0;
				}

				public function StaffProfit( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"aid" => $R2a51483b14
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$R4e420efcc3 = $R5f84c47438->IStaff_ProfitPage( $data, $Rcc5c6e696c[0] );
						
												$this->FillPage( $data, $R4e420efcc3 );
												$this->view( );
						
				}

				public function Netail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R198d213635 = 1;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$Re9aea161f5 = $this->GetStaffCache( intval( $Rcc5c6e696c[9] ) );
												if ( !isset( $Re9aea161f5['canseeprice'] ) )
												{
																$R198d213635 = 0;
												}
												else
												{
																$R198d213635 = intval( $Re9aea161f5['canseeprice'] );
												}
								}
								$this->Assign( "canseeprice", $R198d213635 );
								$this->Detail( );
				}

				public function Detail( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								if ( $this->session->agent != "" )
								{
												$Rcc5c6e696c = $this->session->agent;
												$R5d899a20a5 = $Rcc5c6e696c[0];
												$R2a51483b14 = $Rcc5c6e696c[7];
								}
								else
								{
												$this->Alert( "您还没有登陆！" );
												$this->GoHome( "b2b" );
								}
								$Rdcd9105806 = getvar( "ordno" );
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
								if ( $R0f8134fb60['item']['inrecycle'] == 1 )
								{
												$this->Alert( "非法操作！订单已经不存在" );
												$this->HistoryGo( );
								}
								$this->CheckRight( $R0f8134fb60['item'] );
								if ( $R0f8134fb60['item']['ordstate'] == 2 && ( $R0f8134fb60['item']['ptype'] == 0 || $R0f8134fb60['item']['ptype'] == 3 || 99 < $R0f8134fb60['item']['ptype'] ) )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806 );
								}
								else
								{
												$R0f8134fb60['carditem'] = array( );
								}
								if ( $R0f8134fb60['item']['ptype'] == 6 )
								{
												$Raa3f91d2a5 = factory::getinstance( "powerlv" );
												$data = array(
																"ordno" => $Rdcd9105806
												);
												$R0f8134fb60['powerlv'] = $Raa3f91d2a5->IPowerLv_Get( $data );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$Rb41f4f8da0 = $R422f9a4efb->IProduct_Get( $R0f8134fb60['item']['pid'], -1, "czweb,listprice,orderalert,ptype,pid" );
								$R0f8134fb60['item']['czweb'] = $Rb41f4f8da0['czweb'];
								global $masterid;
								if ( 0 < $masterid && $Rb41f4f8da0['ptype'] == 100 && UB_YKT )
								{
												global $baseurl;
												$R25791b03ad = $this->GetWebCache( );
												$R04c573beda = $R0f8134fb60['item']['czweb'];
												if ( $R04c573beda != "" )
												{
																$Re9e1ab487e = explode( "/", $R04c573beda );
																$Rf5f11a8d38 = count( $Re9e1ab487e );
																$R24d59cd0b7 = $Rf5f11a8d38 - 1;
																if ( 0 < $R24d59cd0b7 )
																{
																				$Ra3d52e52a4 = $Re9e1ab487e[$Rf5f11a8d38 - 1];
																				$Ra3d52e52a4 = str_replace( "p", "", $Ra3d52e52a4 );
																				$Ra3d52e52a4 = intval( $Ra3d52e52a4 );
																				$R04c573beda = $R25791b03ad['website'].$baseurl."/ykt/i.php?".$Ra3d52e52a4;
																				$R0f8134fb60['item']['czweb'] = $R04c573beda;
																				$R0f8134fb60['item']['web'] = $R04c573beda;
																}
												}
								}
								$R0f8134fb60['item']['listprice'] = isset( $R0f8134fb60['item']['listprice'] ) && 0 < $R0f8134fb60['item']['listprice'] ? $R0f8134fb60['item']['listprice'] : $Rb41f4f8da0['listprice'];
								$R0f8134fb60['item']['orderalert'] = $Rb41f4f8da0['orderalert'];
								if ( $R0f8134fb60['item']['ordstate'] == 1 && $R0f8134fb60['item']['sup'] == 1 )
								{
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R9b252bf0a7 = $R0f8134fb60['item']['dollars'];
												$R6afe761ae0 = $this->GetBizKey( );
												$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
												$this->Assign( "sign", $R4b19c1abc4 );
								}
								if ( 0 < $R0f8134fb60['item']['aid'] )
								{
												$Rb32f694545 = $this->GetSysById( 16, 0 );
												if ( $Rb32f694545 == 1 )
												{
																$Rdbc5c05ff5 = $this->GetAgentCache( intval( $R0f8134fb60['item']['aid'] ) );
																$R4ae11f71df = array(
																				"company" => $Rdbc5c05ff5['company'],
																				"aqq" => $Rdbc5c05ff5['aqq'],
																				"atel" => $Rdbc5c05ff5['atel'],
																				"mobile" => $Rdbc5c05ff5['mobile']
																);
																$this->Assign( "supinfo", $R4ae11f71df );
												}
								}
								if ( 0 < $Rcc5c6e696c[9] )
								{
												if ( isset( $_COOKIE['umebiz_com_ini_1'] ) )
												{
																$Rbd83edab70 = intval( $_COOKIE['umebiz_com_ini_1'] );
												}
												else
												{
																$Rbd83edab70 = 1;
												}
												if ( $Rbd83edab70 == 0 && $R0f8134fb60['item']['cname'] != $Rcc5c6e696c[10] )
												{
																$this->Alert( "您好，您没有查看其他员工记录的权限，请联系您的老板开通！" );
																$this->HistoryGo( );
												}
								}
								if ( $R0f8134fb60['item']['payment'] == 96 )
								{
												$Rf3d646c485 = factory::getinstance( "scoredorder" );
												$R61a8cd51a4 = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
												if ( isset( $R61a8cd51a4['scored'] ) )
												{
																$R0f8134fb60['item']['comsumpscored'] = $R61a8cd51a4['scored'];
												}
												else
												{
																$R0f8134fb60['item']['comsumpscored'] = "积分订单已删除";
												}
								}
								$this->Assign( "order", $R0f8134fb60 );
								include( UPATH_HELPER."OrderHelper.php" );
								include( UPATH_HELPER."ArticleHelper.php" );
								$R36dce48c31 = $this->GetSysById( 37, 0 );
								$this->Assign( "forpitts", $R36dce48c31 );
								$this->Assign( "continue", intval( request( "continue" ) ) );
							
												$this->View( );
							
				}

				public function SendFetion( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								if ( $Rdcd9105806 == "" )
								{
												echo 0;
								}
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( isset( $R3db8f5c8bc['isalerted'] ) && $R3db8f5c8bc['isalerted'] == 0 )
								{
												$R67250bac47 = factory::getinstance( "fetion" );
												$Rbb3e87fa4e = "您有新的订单，订单号为:".$Rdcd9105806." 订购商品为：".$R3db8f5c8bc['pname'];
												$Rbb3e87fa4e = iconv( "gb2312", "UTF-8", $Rbb3e87fa4e );
												$R7adfab20b6 = array(
																"sms" => $Rbb3e87fa4e
												);
												$R67250bac47->IFetion_Send( $R7adfab20b6 );
												$data = array( "isalerted" => 1 );
												$this->hander->IOrder_Update( $data, $Rdcd9105806 );
								}
								echo 1;
				}

				public function MyPrint( )
				{
								$this->Assign( "ordno", getvar( "ordno" ) );
							
												$this->View( );
							
				}

				public function PrinterNormal( )
				{
								$this->Detail( );
				}

				public function PrinterRimin( )
				{
								$this->Detail( );
				}

}

?>
