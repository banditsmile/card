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
class CardController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "cards" );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."CardHelper.php" );
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"aid" => $R2a51483b14,
												"cardok" => getvar( "cardok", "" ),
												"pid" => intval( request( "ubzpid" ) ),
												"optype" => getvar( "optype", "" ),
												"ykt" => 2
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "cardnumber" => "订单号", "pname" => "商品名称", "pid" => "商品编号" );
						
												$this->Assign( "sarray", $R00be52aa45 );
												$this->view( );
								
				}

				public function Add( )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R8e8b5578f7 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
							
												$this->Assign( "item", array(
																$R3db8f5c8bc
												) );
												$this->Assign( "pid", $R8e8b5578f7 );
												$this->View( );
								
				}

				public function Save( )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R8e8b5578f7 = intval( request( "ubzpid" ) );
								$R51b4178493 = 0;
								$R94927a2851 = 0;
								$R0003a33381 = factory::getinstance( "products" );
								$R3db8f5c8bc = $R0003a33381->IProduct_Get( $R8e8b5578f7, -1, "pname,listprice,ptype,aid" );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "商品已经不存在！" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$R65edce27dd = $R3db8f5c8bc['pname'];
								$R63d0786ecc = $R3db8f5c8bc['listprice'];
								$R1b69c92460 = $R3db8f5c8bc['ptype'];
								$R7661e907a4 = $this->hander->ICard_GetMaxGroup( ) + 1;
								$R0f8134fb60 = getvar( "ubzcards" );
								$R0f8134fb60 = preg_replace( "/\r\n/", "|", $R0f8134fb60 );
								$Rcc5c6e696c = explode( "|", $R0f8134fb60 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												if ( trim( $R0f8134fb60 ) == "" )
												{
																continue;
												}
												$R63bede6b19 = $R0f8134fb60." ";
												preg_match( "/(\\s*)([^\\s]+)\\s+([^\\s]*)\\s*/i", $R63bede6b19, $R2bc3a0f355 );
												if ( $R2bc3a0f355[1] != null )
												{
																$Re559dc39a1 = " ";
																$R37db13e189 = base64_encode( trim( $R2bc3a0f355[2] ) );
												}
												else
												{
																$Re559dc39a1 = trim( $R2bc3a0f355[2] );
																if ( count( $R2bc3a0f355 ) == 4 )
																{
																				$R37db13e189 = base64_encode( trim( $R2bc3a0f355[3] ) );
																}
												}
												$data = array(
																"cardnumber" => $Re559dc39a1,
																"cardpwd" => $R37db13e189
												);
												if ( !$this->hander->ICard_IsExist( $data ) )
												{
																$data = array(
																				"aid" => $R2a51483b14,
																				"cardnumber" => $Re559dc39a1,
																				"cardpwd" => $R37db13e189,
																				"cardok" => $R1b69c92460 == 100 || $R1b69c92460 == 101 ? 2 : 1,
																				"pid" => $R8e8b5578f7,
																				"ptype" => $R1b69c92460,
																				"pname" => $R65edce27dd,
																				"cprice" => $R63d0786ecc,
																				"price" => $R63d0786ecc,
																				"money" => $R63d0786ecc,
																				"cardgroup" => $R7661e907a4,
																				"bindpid" => "",
																				"addeddate" => date( "Y-m-d H-i-s" ),
																				"operator" => 0
																);
																if ( $this->hander->ICard_Create( $data ) )
																{
																				$R51b4178493++;
																}
																else
																{
																				$R94927a2851++;
																}
												}
												else
												{
																$R94927a2851++;
												}
								}
								$this->Alert( "完成操作了！\\n商品名称：".$R65edce27dd."\\n成功添加：".$R51b4178493." 张\\n添加失败：".$R94927a2851." 张" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=card" );
				}

				public function result( )
				{
								$R51b4178493 = intval( request( "succ" ) );
								$R94927a2851 = intval( request( "fail" ) );
								$R65edce27dd = getvar( "pname" );
								$this->Assign( "succ", $R51b4178493 );
								$this->Assign( "fail", $R94927a2851 );
								$this->Assign( "pname", $R65edce27dd );
						
												$this->View( );
								
				}

				public function DestroyItems( )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->ICard_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['pid'] ) )
								{
												$this->Alert( "卡密已经不存在！" );
												$this->HistoryGo( );
								}
								$R8e8b5578f7 = $R3db8f5c8bc['pid'];
								$R0003a33381 = factory::getinstance( "products" );
								$R3db8f5c8bc = $R0003a33381->IProduct_Get( $R8e8b5578f7, -1, "aid" );
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "您无权操作！" );
												$this->HistoryGo( );
								}
								$Rb7492a73f7 = " id = ".$R3584859062." and aid=".$R2a51483b14." and ptype < 99 ";
								$R808b89ba0e = $this->hander->ICard_DestroyByStr( $Rb7492a73f7, array( ) );
								if ( $R808b89ba0e )
								{
												$this->Alert( "删除成功！" );
								}
								else
								{
												$this->Alert( "删除失败了！" );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Card&by=1" );
				}

}

?>
