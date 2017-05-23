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
class FavController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "fav" );
								$this->Checkb2bSession( );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R7fb26bbe56 = $this->GetAgentBoss( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"aid" => $R2a51483b14
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IFav_Page( $data, "*", true );
								$R4e420efcc3 = $this->FilterPi( $R4e420efcc3, $R7fb26bbe56 );
								$R4e420efcc3 = $this->RetPi( $R4e420efcc3 );
								$R4e420efcc3 = array(
												"item" => $R4e420efcc3
								);
								$R026f0167b4 = array( );
								$R300c46f603 = "";
								foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$R4e420efcc3 = $this->SetSNP( $R4e420efcc3 );
								$this->Assign( "pids", implode( ",", $R026f0167b4 ) );
								$this->Assign( "items", $R4e420efcc3['item'] );
								$this->View( );
				}

				public function SetSNP( $R4e420efcc3 )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$Rac9b8532b8 = $R9aa102385f['parentid'];
								$Re2a6348a52 = $R9aa102385f['alv'];
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
								if ( $R198d213635 )
								{
												$R30b2ab8dc1 = $this->GetWebCache( );
												$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
												$R30aa8c1852 = count( $Rcc5c6e696c );
												if ( 6 < $R30aa8c1852 )
												{
																$R3a8b307327 = $Rcc5c6e696c[6];
												}
												else
												{
																$R3a8b307327 = 3;
												}
								}
								$R026f0167b4 = array( );
								$Rd451e8a5f2 = array( );
								$Rf34a38f798 = array( );
								$R47cfdbac82 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												if ( $R198d213635 )
												{
												}
												else
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = "---";
												}
												$R1b69c92460 = $R4e420efcc3['item'][$Ra16d228039]['ptype'];
												$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
												if ( $R1b69c92460 == 0 || $R1b69c92460 == 3 )
												{
																$Rf34a38f798[] = $R8e8b5578f7;
												}
												else if ( 99 < $R1b69c92460 )
												{
																$Rd451e8a5f2[] = $R8e8b5578f7;
												}
												if ( $this->NeedSup( $R4e420efcc3['item'][$Ra16d228039] ) )
												{
																$R47cfdbac82[] = $R8e8b5578f7;
												}
												$R026f0167b4[] = $R8e8b5578f7;
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( $R3359c04a1b != "" )
								{
												if ( $R198d213635 )
												{
																$R4e420efcc3 = $this->GetPriceByIds( $R4e420efcc3, $R9aa102385f, $R3a8b307327, $R3359c04a1b );
												}
												include_once( UPATH_HELPER."ProductHelper.php" );
												$R8d364004b1 = count( $Rf34a38f798 );
												$R4fecab2dce = count( $Rd451e8a5f2 );
												$Raaa87f4365 = count( $R47cfdbac82 );
												if ( 0 < $R8d364004b1 || 0 < $R4fecab2dce )
												{
																$R422f9a4efb = factory::getinstance( "products" );
												}
												if ( 0 < $R8d364004b1 )
												{
																$R8ba1287668 = $R422f9a4efb->IProduct_GetCardStock( $Rf34a38f798 );
												}
												else
												{
																$R8ba1287668 = array( );
												}
												if ( 0 < $R4fecab2dce )
												{
																$R9eefe63324 = $R422f9a4efb->IProduct_GetYktStock( $Rd451e8a5f2 );
												}
												else
												{
																$R9eefe63324 = array( );
												}
												if ( 0 < $Raaa87f4365 )
												{
																$R74497ab307 = implode( ",", $R47cfdbac82 );
																$R778bf3b683 = $this->GetStocksCollection( $R74497ab307."," );
												}
												else
												{
																$R778bf3b683 = array( );
												}
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'] );	$Ra16d228039++	)
												{
																$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
																$R54951dfde9 = 0 < $R8d364004b1 && isset( $R8ba1287668[$R8e8b5578f7] ) ? $R8ba1287668[$R8e8b5578f7] : 0;
																$Ref7be6595c = 0 < $R4fecab2dce && isset( $R9eefe63324[$R8e8b5578f7] ) ? $R9eefe63324[$R8e8b5578f7] : 0;
																$Rcdcb991232 = isset( $R778bf3b683[$R8e8b5578f7] ) ? $R778bf3b683[$R8e8b5578f7] : 0;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = $R54951dfde9 + $Rcdcb991232;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = stockstate( $R4e420efcc3['item'][$Ra16d228039]['stocks'], $R4e420efcc3['item'][$Ra16d228039]['ptype'], $Ref7be6595c, $R4e420efcc3['item'][$Ra16d228039]['mystocks'], 1 );
												}
												unset( $R54951dfde9 );
												unset( $Ref7be6595c );
												unset( $R778bf3b683 );
								}
								unset( $R026f0167b4 );
								unset( $Rd451e8a5f2 );
								unset( $Rf34a38f798 );
								unset( $R47cfdbac82 );
								return $R4e420efcc3;
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "参数错误！请重新选择商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$R3db8f5c8bc = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $R3db8f5c8bc['sell'] ) )
								{
												$this->Alert( "商品不存在！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								if ( intval( $R3db8f5c8bc['sell'] ) == 0 )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$R3db8f5c8bc = $this->hander->IFav_GetByData( array(
												"aid" => $R2a51483b14,
												"pid" => $R8e8b5578f7
								) );
								if ( isset( $R3db8f5c8bc[0]['id'] ) )
								{
												$this->Alert( "已存在，商品添加收藏成功！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Fav" );
								}
								$data = array(
												"aid" => $R2a51483b14,
												"pid" => $R8e8b5578f7
								);
								$R808b89ba0e = $this->hander->IFav_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "商品添加收藏成功！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Fav" );
								}
								else
								{
												$this->Alert( "商品添加收藏失败，请重新点击收藏！" );
												$this->HistoryGo( );
								}
				}

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = getvar( "id" );
								if ( !is_array( $R3584859062 ) )
								{
												$this->Alert( "请先选择要删除的项" );
												$this->HistoryGo( );
								}
								$R026f0167b4 = array( );
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$R026f0167b4[] = intval( $R0f8134fb60 );
								}
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 == "" )
								{
												$this->Alert( "请先选择要删除的项" );
												$this->HistoryGo( );
								}
								$R172196908b = " aid = ".$R2a51483b14." and id in (".$R63bede6b19.")";
								$R808b89ba0e = $this->hander->IFav_DestroyByStr( $R172196908b, array( ) );
								if ( $R808b89ba0e )
								{
												$this->Alert( "删除成功！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Fav" );
								}
								else
								{
												$this->Alert( "删除失败！" );
												$this->HistoryGo( );
								}
				}

}

?>
