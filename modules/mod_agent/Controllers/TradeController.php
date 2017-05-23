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
class TradeController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "trades" );
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
												$this->hander = factory::getinstance( "tradeshistory" );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = 0;
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Ra8b176bf4f = getvar( "tradetype", "x" );
								$R901a6b96db = getvar( "state", 5 );
								if ( $Ra8b176bf4f == "x" )
								{
												$Ra8b176bf4f = "1,2,21,22,31,32,60,61,96,98,99,101";
												$R901a6b96db = "";
								}
								$R58bca74885 = array(
												"ordno" => getvar( "ordno" ),
												"yktnumber" => getvar( "yktnumber" ),
												"ykt" => getvar( "ykt" ),
												"aid" => $R2a51483b14,
												"tradetype" => $Ra8b176bf4f,
												"state" => $R901a6b96db
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R657cac7ff2 = intval( request( "export" ) );
								if ( 0 < $R657cac7ff2 )
								{
												$R3db8f5c8bc = $this->hander->ITrade_GetByLimit( $data, "ordno,tradetype,content,income,outcome,fat,operator,otherside,createdate", 1 );
												$R06c518f70e = array( "ordno" => "订单号", "tradetype" => "交易类型", "content" => "相关内容", "income" => "收入(元)", "outcome" => "支出(元)", "fat" => "变化后(元)", "operator" => "操作员", "otherside" => "交易方", "createdate" => "交易日期" );
												$R026f0167b4 = array( );
												$R026f0167b4[] = $R06c518f70e;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R0f8134fb60['ordno'] = "订单：".$R0f8134fb60['ordno'];
																$R0f8134fb60['tradetype'] = tradetype( $R0f8134fb60['tradetype'], 1 );
																$R0f8134fb60['operator'] = operator( $Rcc5c6e696c[7], $R0f8134fb60['operator'], $Rcc5c6e696c[9], $R0f8134fb60['otherside'], 0, 1 );
																$R0f8134fb60['otherside'] = $R0f8134fb60['otherside'] < 1 || $R0f8134fb60['otherside'] == "" ? "系统" : $R0f8134fb60['otherside'];
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
												$R7ca55aed77->output( $R026f0167b4, "帐务记录_".$R696350cab3."_".$R1c8e0f6795 );
												exit( );
								}
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0] );
								$this->FillPage( $data, $R4e420efcc3 );
								if ( $Ra8b176bf4f == 11 )
								{
												$R4fa9c48c92 = array( "11" => "点卡交易产生的代理利润" );
								}
								else if ( $Ra8b176bf4f == 12 )
								{
												$R4fa9c48c92 = array( "12" => "供货所得" );
								}
								else
								{
												$R4fa9c48c92 = array( "x" => "所有类型(含自动退款记录)", "1,2,21,22,31,32,60,61,96,98,99,101" => "所有类型(有效记录)", "1" => "普通点卡交易", "2" => "用户网银充值", "31" => "转款给别人", "32" => "别人转款给我", "60" => "生效一卡通", "98" => "资金操作产生的交易记录", "99" => "系统给我充值", "96" => "积分兑换余额记录", "101" => "一卡通充值记录", "31,32" => "所有转款记录" );
								}
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								if ( $Ra8b176bf4f == "1,2,21,22,31,32,60,61,96,98,99,101" )
								{
												if ( $R901a6b96db == "" )
												{
																$Ra8b176bf4f = "x";
												}
												else
												{
																$Ra8b176bf4f = "";
												}
								}
								else
								{
												$Ra8b176bf4f = getvar( "tradetype" );
								}
								$this->Assign( "tradetype", $Ra8b176bf4f );
								$tpl = getvar( "tpl" );
					
												$this->view( $tpl );
					
				}

				public function History( )
				{
							
												$this->View( );
							
				}

				public function Profit( )
				{
						
												$this->View( );
						
				}

				public function Sup( )
				{
						
												$this->View( );
						
				}

}

?>
