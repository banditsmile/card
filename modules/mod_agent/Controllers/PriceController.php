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
class PriceController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "prices" );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"page" => intval( request( "page", 1 ) ),
												"ptype" => getvar( "ptype", -1 ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R422f9a4efb = factory::getinstance( "products" );
								$R4e420efcc3 = $R422f9a4efb->IProduct_PageForPrice( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类", "4" => "金币类", "5" => "装备类", "6" => "代练类", "100" => "兑换类一卡通", "101" => "充值类一卡通" );
								$this->Recycle( "products" );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

}

?>
