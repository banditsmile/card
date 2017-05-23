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
				public $session = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "trades" );
								$this->session = factory::getinstance( "session" );
								$this->SetUser( );
								$this->action = array( "czlist", "paysure" );
								$this->Init( );
				}

				public function SetUser( )
				{
								$agent = $this->session->user;
								if ( $agent == "" )
								{
												$this->Alert( "用户没有登录！" );
												$this->GoHome( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByName( $agent[0] );
								if ( !isset( $R3db8f5c8bc['aname'] ) )
								{
												$this->Alert( "用户没有登录！" );
												$this->GoHome( );
								}
								if ( $R3db8f5c8bc['frozen'] == 1 )
								{
												$this->Alert( "用户没有开通！" );
												$this->GoHome( );
								}
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R6009e84434 = $R063e6693e5->IRank_GetNameById( $R3db8f5c8bc['alv'] );
								$R3db8f5c8bc['rankname'] = $R6009e84434;
								$this->Assign( "data", $R3db8f5c8bc );
								$this->Assign( "agent", $R3db8f5c8bc );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = 0;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Ra8b176bf4f = getvar( "tradetype", "1,2,21,22,31,32,98,99,101" );
								$R901a6b96db = getvar( "state", 5 );
								if ( $Ra8b176bf4f == "x" )
								{
												$Ra8b176bf4f = "1,2,21,22,31,32,98,99,101";
												$R901a6b96db = "";
								}
								$R58bca74885 = array(
												"ordno" => getvar( "ordno" ),
												"yktnumber" => getvar( "yktnumber" ),
												"ykt" => getvar( "ykt" ),
												"aid" => $R2a51483b14,
												"operator" => $R94e0136c8a,
												"tradetype" => $Ra8b176bf4f,
												"state" => $R901a6b96db,
												"action" => $this->action[0]
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
								$data = array_merge( $R58bca74885, $R1e3bc50f23[1] );
								$this->FillPage( $data, $R4e420efcc3 );
								$Rda3ac1bf9a = 0;
								$R2a51483b14 = intval( getvar( "aid" ) );
								if ( 0 < $R2a51483b14 )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
												$Rda3ac1bf9a = $agent['aremain'];
								}
								$this->Assign( "remain", $Rda3ac1bf9a );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
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
												$R4fa9c48c92 = array( "1,2,21,22,31,32,98,99,101" => "所有类型(有效记录)", "x" => "所有类型(含自动退款记录)", "1" => "普通点卡交易", "2" => "用户网银充值", "98" => "资金操作产生的交易记录", "99" => "系统给我充值", "101" => "一卡通充值记录" );
								}
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								$this->Assign( "tradetype", getvar( "tradetype" ) );
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

				public function Init( )
				{
								$this->ShopInit( "用户管理中心" );
				}

}

?>
