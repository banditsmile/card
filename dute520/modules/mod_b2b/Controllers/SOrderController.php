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
class SOrderController extends Controller
{

				public $service = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "sorders" );
				}

				public function Index( )
				{
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								if ( trim( $Rdcd9105806 ) == "" )
								{
												$this->Alert( "请先输入订单号" );
												$this->CloseWin( );
								}
								$data = array(
												"ubzordno" => $Rdcd9105806
								);
								$R3db8f5c8bc = $this->service->IOrder_Get( $data );
								if ( isset( $R3db8f5c8bc['errcode'] ) && $R3db8f5c8bc['errcode'] == "2" )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Order&a=detail&ordno=".$Rdcd9105806 );
								}
								if ( isset( $R3db8f5c8bc['errcode'] ) && $R3db8f5c8bc['errcode'] == "1" )
								{
												$this->Alert( $R3db8f5c8bc['errcontent'] );
												$this->CloseWin( );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$Ra633c8ad29 = $R7bf6de464c->ISysnet_Get( );
								$ubzuid = $Ra633c8ad29['uid'];
								$this->Assign( "ubzuid", $ubzuid );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->View( );
						
				}

				public function Cancel( )
				{
								$Rdcd9105806 = getvar( "ubzordno" );
								if ( trim( $Rdcd9105806 ) == "" )
								{
												$this->Alert( "非法参数A" );
												$this->HistoryGo( );
								}
								$R52cf9e6929 = intval( request( "ubzqty" ) );
								if ( $R52cf9e6929 <= 0 )
								{
												$this->Alert( "请输入有效的数量" );
												$this->HistoryGo( );
								}
								$R76b1abd324 = intval( request( "cancelqty" ) );
								$Rc8db323135 = intval( request( "oldqty" ) );
								$Rc8db323135 -= $R76b1abd324;
								if ( $Rc8db323135 == 0 )
								{
												$this->Alert( "您已经全额退款过，无需再退款" );
												$this->HistoryGo( );
								}
								if ( $Rc8db323135 < $R52cf9e6929 )
								{
												$this->Alert( "请输入有效的数量" );
												$this->HistoryGo( );
								}
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$Ra633c8ad29 = $R7bf6de464c->ISysnet_Get( );
								$ubzuid = $Ra633c8ad29['uid'];
								$Re8f783a09c = intval( request( "uidb" ) );
								$R9fe1a78a9f = intval( request( "uida" ) );
								if ( $ubzuid <= 0 || $Re8f783a09c <= 0 || $R9fe1a78a9f <= 0 )
								{
												$this->Alert( "非法参数B" );
												$this->HistoryGo( );
								}
								if ( $R9fe1a78a9f == $ubzuid || $R9fe1a78a9f == $Re8f783a09c || $ubzuid != $Re8f783a09c )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$data = array(
												"ubzordno" => $Rdcd9105806,
												"ubzqty" => $R52cf9e6929
								);
								$R3db8f5c8bc = $this->service->IOrder_Cancel( $data );
								if ( isset( $R3db8f5c8bc['errcode'] ) )
								{
												$this->Alert( $R3db8f5c8bc['errcontent'] );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=SOrder&a=detail&ordno=".$Rdcd9105806 );
				}

}

?>
