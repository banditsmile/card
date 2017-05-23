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
class ProfitController extends Controller
{

				public $hander = NULL;
				public $ordertable = NULL;

				public function __construct( )
				{
								$this->ishistory = intval( request( "ishistory" ) ) == 1 ? "history" : "";
								$this->ordertable = "orders".$this->ishistory;
								$this->hander = factory::getinstance( $this->ordertable );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R58bca74885 = array(
												"comefrom" => intval( getvar( "comefrom", 0 ) ),
												"optype" => "s",
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$Reb5e85c827 = $data;
								$Reb5e85c827['optype'] = "s|cz";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$Rcbc0488598 = isset( $R8c025eb78a[0]['profit'] ) ? $R8c025eb78a[0]['profit'] : 0;
								$Rcbc0488598 -= isset( $R8c025eb78a[0]['agentprofit'] ) ? $R8c025eb78a[0]['agentprofit'] : 0;
								$Reb5e85c827['optype'] = "s|km";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$R2c0a32894d = isset( $R8c025eb78a[0]['profit'] ) ? $R8c025eb78a[0]['profit'] : 0;
								$R2c0a32894d -= isset( $R8c025eb78a[0]['agentprofit'] ) ? $R8c025eb78a[0]['agentprofit'] : 0;
								$Reb5e85c827['optype'] = "s";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$R9236a6cf37 = $R8c025eb78a[0];
								$Race8252ffc = round( doubleval( $Rcbc0488598 ) + doubleval( $R2c0a32894d ), 3 );
								$this->Assign( "profit", $Race8252ffc );
								$this->Assign( "czprofit", $Rcbc0488598 );
								$this->Assign( "kmprofit", $R2c0a32894d );
								$this->Assign( "allprofit", $R9236a6cf37 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
								$this->Assign( "s", intval( request( "s" ) ) );
								$R00be52aa45 = array( "ordno" => "订单号", "aid" => "所属用户编号", "aname" => "下单者", "cname" => "操作者", "pname" => "商品名", "cqq" => "QQ号", "ctel" => "电话", "cmail" => "邮箱", "czaccount" => "充值号", "cip" => "IP" );
								$R8dc7d3eb73 = array( "0" => "所有平台", "1" => "批发", "2" => "零售", "3" => "一卡通" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( getvar( "comefrom", 0 ) ) );
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
				}

}

?>
