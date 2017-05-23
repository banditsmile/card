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
class VOrderController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "orders" );
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
								$this->Assign( "kw", getvar( "keywords" ) );
								$R15a0359c8c = getvar( "stype" );
								if ( $R15a0359c8c == "cardnumber" )
								{
												$Ra09fe38af3 = trim( getvar( "keywords" ) );
												$GLOBALS['_REQUEST']['stype'] = "pname";
												$GLOBALS['_REQUEST']['keywords'] = "";
												if ( $Ra09fe38af3 != "" )
												{
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
																				$R0f8134fb60 = $Rf541845af3->ICard_GetByLimit( $data, "ordno,otherordno,ptype" );
																				if ( isset( $R0f8134fb60['ordno'] ) )
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								if ( $R0f8134fb60['ptype'] < 99 )
																								{
																												$GLOBALS['_REQUEST']['keywords'] = $R0f8134fb60['ordno'];
																								}
																								else
																								{
																												$GLOBALS['_REQUEST']['keywords'] = $R0f8134fb60['otherordno'];
																								}
																				}
																				else
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								$GLOBALS['_REQUEST']['keywords'] = "nokey";
																				}
																}
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
												$R3db8f5c8bc = $this->hander->IOrder_GetByPageLimit( $data, "ordno,pname,qty,cprice,buyerprice,dollars as totle,staffprofit,ordstate,orddate" );
												$R06c518f70e = array( "ordno" => "订单号", "pname" => "购买商品", "qty" => "数量", "cprice" => "进价", "buyerprice" => "售价", "totle" => "收取现金", "staffprofit" => "利润", "ordstate" => "订单状态", "orddate" => "日期" );
												$Re8872481ab = array( "-1" => "交易失败", "0" => "未付款", "1" => "正在处理中", "2" => "已提交处理", "2" => "交易完成" );
												$R026f0167b4 = array( );
												$R026f0167b4[] = $R06c518f70e;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R0f8134fb60['ordno'] = "订单：".$R0f8134fb60['ordno'];
																if ( $R198d213635 == 0 )
																{
																				$R0f8134fb60['cprice'] = "-";
																				$R0f8134fb60['totle'] = "-";
																}
																else
																{
																				$R0f8134fb60['totle'] = $R0f8134fb60['buyerprice'] * $R0f8134fb60['qty'];
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
												$R7ca55aed77->output( $R026f0167b4, "销售记录_".$R696350cab3."_".$R1c8e0f6795 );
												exit( );
								}
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$Rbf6c8991d9 = $this->hander->IOrder_GetTradeData( $data );
								$this->Assign( "tradedata", $Rbf6c8991d9 );
								$data['ptype'] = $R1b69c92460;
								$data['ishistory'] = $ishistory;
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "staffname,staffid,realname", $R2a51483b14 );
								$R026f0167b4 = array( );
								$this->Assign( "staff", $Raac42e4217 );
								$this->Assign( "staffname", getvar( "staffname" ) );
							
												$this->Assign( "canseeprice", $R198d213635 );
												$this->Assign( "canseeother", $Rbd83edab70 );
												$this->view( );
								
				}

}

?>
