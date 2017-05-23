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
class AckController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "orders" );
				}

				public function Index( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( $R0f8134fb60['item'] == 0 )
								{
												$this->Alert( "您要查找的订单不存在！请重新输入" );
												$this->HistoryGo( );
								}
								if ( !$R0f8134fb60['item']['comefrom'] || $R0f8134fb60['item']['comefrom'] != 3 )
								{
												$this->Alert( "您要查找的订单不存在！请重新输入" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['inrecycle'] == 1 )
								{
												$this->Alert( "非法操作！订单已经不存在" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ordstate'] == 2 && ( $R0f8134fb60['item']['ptype'] == 0 || $R0f8134fb60['item']['ptype'] == 3 || 99 < $R0f8134fb60['item']['ptype'] ) )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806, 99 );
								}
								else
								{
												$R0f8134fb60['carditem'] = array( );
								}
								if ( 99 < $R0f8134fb60['item']['payment'] )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['cpitem'] = $R83a253518c->ICard_GetByTrade( $Rdcd9105806 );
												$R30aa8c1852 = 0;
												foreach ( $R0f8134fb60['cpitem'] as $R351ac57007 )
												{
																if ( $R351ac57007['cardok'] == 2 )
																{
																				$R30aa8c1852++;
																}
												}
												$this->Assign( "cout", $R30aa8c1852 );
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
								$Rb41f4f8da0 = $R422f9a4efb->IProduct_Get( $R0f8134fb60['item']['pid'], -1, "czweb,orderalert" );
								$R0f8134fb60['item']['czweb'] = $Rb41f4f8da0['czweb'];
								$R0f8134fb60['item']['orderalert'] = $Rb41f4f8da0['orderalert'];
								if ( $R0f8134fb60['item']['ordstate'] == 1 && $R0f8134fb60['item']['sup'] == 1 )
								{
												$R7bf6de464c = factory::getinstance( "sysnet" );
												$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
												$R920143e856 = factory::getservice( "sorders" );
												$R9b252bf0a7 = $R0f8134fb60['item']['dollars'];
												$R6afe761ae0 = $this->GetBizKey( );
												$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
												$this->Assign( "sign", $R4b19c1abc4 );
								}
								if ( $R0f8134fb60['item']['sup'] == 1 && $R0f8134fb60['item']['ordstate'] == -1 )
								{
												$data = array(
																"ubzordno" => $Rdcd9105806,
																"action" => "orddetail"
												);
												$R920143e856 = factory::getservice( "sorders" );
												$Rdd476c61c4 = $R920143e856->IOrder_Get( $data );
												$R0f8134fb60['item']['factoryreturn'] = $Rdd476c61c4['item']['ubzerrcontent'];
								}
								$this->Assign( "order", $R0f8134fb60 );
								include( UPATH_HELPER."ArticleHelper.php" );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$sess = factory::getinstance( "session" );
								$Rcc5c6e696c = $sess->user;
								if ( $Rcc5c6e696c != "" )
								{
												$this->Assign( "islogin", 1 );
								}
								else
								{
												$this->Assign( "islogin", 0 );
								}
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( 0, "config" );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 15 < $R30aa8c1852 )
								{
												$R581012b834 = $Rcc5c6e696c[15];
								}
								else
								{
												$R581012b834 = 1;
								}
								$this->Assign( "dispkf", $R581012b834 );
								$R36dce48c31 = $this->GetSysById( 37, 0 );
								$this->Assign( "forpitts", $R36dce48c31 );
							
												$this->YktInit( );
												$this->View( );
								
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
												$Rbdf46d6e43 = $R3db8f5c8bc['ordstate'];
												if ( $Rbdf46d6e43 == 1 )
												{
																$Raba57bd7d6 = $R3db8f5c8bc['sup'];
																if ( $Raba57bd7d6 == 1 )
																{
																				$Re9b5f92229 = factory::getservice( "ack" );
																				$R4b19c1abc4 = getvar( "sign" );
																				if ( $R4b19c1abc4 == "" )
																				{
																								$R4b19c1abc4 = $this->GetSign( $Rdcd9105806 );
																				}
																				$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, $R4b19c1abc4 );
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

				public function GetSign( $Rdcd9105806 )
				{
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$R6afe761ae0 = $this->GetBizKey( );
								$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
								return $R4b19c1abc4;
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

}

?>
