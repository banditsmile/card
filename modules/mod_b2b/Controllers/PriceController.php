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
								$this->hander = factory::getinstance( "products" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R046b4585a2 = $this->GetRCache( );
								$R6c57ecdc8f = $this->GetRank( $Re2a6348a52 );
								$R1cc5d7155d = $R6c57ecdc8f['gid'];
								$Rb575d6110a = $R6c57ecdc8f['money'];
								$R6c59ba72d5 = $this->GetRankCache( $R2a51483b14 );
								$Rf9481e4151 = array( );
								foreach ( $R6c59ba72d5 as $R0f8134fb60 )
								{
												$Rf9481e4151[$R0f8134fb60['rankid']] = $R0f8134fb60;
								}
								$this->Assign( "isset", count( $R6c59ba72d5 ) );
								$R52ff3245e9 = $this->GetRankCache( 0 );
								$R76f1563994 = array( );
								foreach ( $R52ff3245e9 as $R0f8134fb60 )
								{
												$R76f1563994[$R0f8134fb60['rankid']] = $R0f8134fb60;
								}
								$R4420266e85 = $this->GetRankType( );
								$R51c716b966 = $this->SetLang( 1 );
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												$Rdfcbb27a86 = false;
												if ( $R4420266e85 )
												{
																if ( $R0f8134fb60['gid'] < $R1cc5d7155d && 0 < $R0f8134fb60['gid'] )
																{
																				$Rdfcbb27a86 = true;
																}
												}
												else if ( $R0f8134fb60['money'] < $Rb575d6110a && 0 < $R0f8134fb60['gid'] )
												{
																$Rdfcbb27a86 = true;
												}
												if ( $Rdfcbb27a86 )
												{
																if ( isset( $Rf9481e4151[$R0f8134fb60['id']] ) )
																{
																				$R33403e391b = $Rf9481e4151[$R0f8134fb60['id']]['discout'];
																				$R0acfedc1db = $Rf9481e4151[$R0f8134fb60['id']]['priceplan'];
																}
																else
																{
																				$R33403e391b = 1;
																				$R0acfedc1db = 1;
																}
																switch ( $R0acfedc1db )
																{
																case 1 :
																case 3 :
																				$R33403e391b *= 100;
																				$Rf5687f6bbe = "%";
																				break;
																default :
																				$Rf5687f6bbe = $R51c716b966['moneyunit'];
																				break;
																}
																$R026f0167b4[] = array(
																				"id" => $R0f8134fb60['id'],
																				"name" => $R0f8134fb60['name'],
																				"discout" => $R33403e391b,
																				"priceplan" => $R0acfedc1db,
																				"char" => $Rf5687f6bbe
																);
												}
								}
						
												$this->Assign( "items", $R026f0167b4 );
												$this->View( );
						
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3456919727 = getvar( "id" );
								$Rb112a06dad = factory::getinstance( "priceplan" );
								foreach ( $R3456919727 as $R3584859062 )
								{
												$data = array(
																"rankid" => $R3584859062,
																"pricetpl" => 0,
																"aid" => $R2a51483b14
												);
												$R33403e391b = doubleval( request( "discout_".$R3584859062 ) );
												$R0acfedc1db = intval( request( "priceplan_".$R3584859062 ) );
												switch ( $R0acfedc1db )
												{
												case 1 :
												case 3 :
																$R33403e391b /= 100;
																break;
												default :
																break;
												}
												if ( $Rb112a06dad->IPricePlan_IsExist( $data ) )
												{
																$Rb7492a73f7 = " rankid = ".$R3584859062." and pricetpl=0 and aid=".$R2a51483b14;
																$data = array(
																				"discout" => $R33403e391b,
																				"priceplan" => $R0acfedc1db
																);
																$R808b89ba0e = $Rb112a06dad->IPricePlan_UpdateByArray( $data, $Rb7492a73f7 );
																if ( !$R808b89ba0e )
																{
																				$this->Alert( "操作失败" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																$data = array(
																				"discout" => $R33403e391b,
																				"priceplan" => $R0acfedc1db,
																				"rankid" => $R3584859062,
																				"aid" => $R2a51483b14
																);
																$R808b89ba0e = $Rb112a06dad->IPricePlan_Create( $data );
																if ( !$R808b89ba0e )
																{
																				$this->Alert( "操作失败" );
																				$this->HistoryGo( );
																}
												}
								}
								$this->UpdateCache( "priceplan", array(
												"arg1" => $R2a51483b14
								) );
								$this->Alert( "保存完成" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price" );
				}

				public function DetailRankTpl( )
				{
								$this->AddRankTpl( );
				}

				public function AddRankTpl( )
				{
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R3584859062 = intval( request( "id" ) );
								if ( 0 < $R3584859062 )
								{
												$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
												$R3db8f5c8bc = $Rb7abd0cdc3->IPriceAgentTpl_GetById( $R3584859062 );
												$this->Assign( "rs", $R3db8f5c8bc );
								}
								$R71a664ef8c = $this->PageInfo( );
								$agent = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $agent;
								$data = array(
												"aid" => $R2a51483b14,
												"nrows" => 2000
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $Rb7abd0cdc3->IPriceAgentTpl_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "名称", "pinyin" => "首字母", "ordering" => "排序" );
								$R046b4585a2 = $this->GetRCache( );
								$R6c57ecdc8f = $this->GetRank( $Re2a6348a52 );
								$R1cc5d7155d = $R6c57ecdc8f['gid'];
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( 0 < $R0f8134fb60['gid'] && $R0f8134fb60['gid'] < $R1cc5d7155d )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
							
												$this->Assign( "sarray", $R00be52aa45 );
												$this->Assign( "rank", $R026f0167b4 );
												$this->view( );
							
				}

				public function RankTpl( )
				{
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R71a664ef8c = $this->PageInfo( );
								$agent = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $agent;
								$data = array(
												"aid" => $R2a51483b14,
												"nrows" => 2000
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $Rb7abd0cdc3->IPriceAgentTpl_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "名称", "pinyin" => "首字母", "ordering" => "排序" );
								$R046b4585a2 = $this->GetRCache( );
								$R6c57ecdc8f = $this->GetRank( $Re2a6348a52 );
								$R1cc5d7155d = $R6c57ecdc8f['gid'];
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												if ( 0 < $R0f8134fb60['gid'] && $R0f8134fb60['gid'] < $R1cc5d7155d )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
							
												$this->Assign( "sarray", $R00be52aa45 );
												$this->Assign( "rank", $R026f0167b4 );
												$this->view( );
							
				}

				public function TplSave( )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R3584859062 = intval( request( "id" ) );
								$R6412910652 = intval( request( "parentid" ) );
								$data = array(
												"name" => getvar( "name" ),
												"parentid" => $R6412910652,
												"rankid" => intval( request( "rankid" ) ),
												"aid" => $R2a51483b14
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $Rb7abd0cdc3->IPriceAgentTpl_Update( $data, $R3584859062 );
												if ( 0 < $R6412910652 && $R6412910652 != request( "oldparentid" ) )
												{
																$this->UpdatePrice( $R6412910652, $R3584859062 );
												}
								}
								else
								{
												$R3584859062 = $Rb7abd0cdc3->IPriceAgentTpl_Create( $data );
												if ( 0 < $R3584859062 )
												{
																if ( 0 < $R6412910652 )
																{
																				$this->UpdatePrice( $R6412910652, $R3584859062 );
																}
																$R808b89ba0e = true;
												}
												else
												{
																$R808b89ba0e = false;
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=RankTpl" );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

				public function TplDel( )
				{
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R3584859062 = intval( request( "id" ) );
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R35ee3e47cf = $Rb7abd0cdc3->IPriceAgentTpl_GetById( $R3584859062 );
								if ( $R35ee3e47cf['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R808b89ba0e = $Rf00621a200->IPriceAgent_DelByStr( "pricetpl = ".$R3584859062 );
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $Rb7abd0cdc3->IPriceAgentTpl_Del( $R3584859062 );
												if ( $R808b89ba0e )
												{
																$R2097a8fddf = factory::getinstance( "agents" );
																$data = array( "pricetpl" => 0 );
																$R2097a8fddf->IAgent_UpdateByStr( $data, " pricetpl = ".$R3584859062 );
																$this->Alert( "删除成功" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=Price&a=RankTpl" );
												}
												else
												{
																$this->Alert( "删除失败" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "删除失败" );
												$this->HistoryGo( );
								}
				}

				public function UpdatePrice( $Rb025359786, $R9e14437acd )
				{
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$Raa4d6c9903 = $Rf00621a200->IPriceAgent_Get( array(
												"pricetpl" => $Rb025359786
								) );
								foreach ( $Raa4d6c9903 as $R0f8134fb60 )
								{
												$Rcc5c6e696c = array(
																"pricetpl" => $R9e14437acd,
																"pid" => $R0f8134fb60['pid'],
																"price" => $R0f8134fb60['price']
												);
												if ( $Rf00621a200->IPriceAgent_IsExist( $Rcc5c6e696c ) )
												{
																$Rf00621a200->IPriceAgent_Update( $Rcc5c6e696c, $R0f8134fb60['id'] );
												}
												else
												{
																$Rf00621a200->IPriceAgent_Create( $Rcc5c6e696c );
												}
								}
				}

				public function TplPriceSave( )
				{
								$R014535cc1a = intval( request( "pricetpl" ) );
								if ( $R014535cc1a == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R3359c04a1b = getvar( "pid" );
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R8e8b5578f7 = intval( $R8e8b5578f7 );
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												$R0d9f8f778c = request( "cprice_".$R8e8b5578f7, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"pricetpl" => $R014535cc1a
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$R0d9f8f778c = doubleval( $R0d9f8f778c );
																if ( $R63d0786ecc < $R0d9f8f778c )
																{
																				$R63d0786ecc = $R0d9f8f778c;
																				$R8c989dcf9c++;
																}
																if ( $Rf00621a200->IPriceAgent_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and pricetpl=".$R014535cc1a;
																				$Rf00621a200->IPriceAgent_UpdateByArray( $data, $Rb7492a73f7 );
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$Rf00621a200->IPriceAgent_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=product&a=RankTplPrice&pricetpl=".$R014535cc1a."&name=".urlencode( getvar( "name" ) ) );
				}

				public function Agent( )
				{
								$R014535cc1a = intval( request( "pricetpl" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								if ( 0 < $R014535cc1a )
								{
												$data['pricetpl'] = $R014535cc1a;
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_CustomPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R35ee3e47cf = $Rb7abd0cdc3->IPriceAgentTpl_GetByStr( "aid = ".$R2a51483b14 );
								$this->Assign( "tpls", $R35ee3e47cf );
								$R046b4585a2 = $this->GetRCache( );
								$this->Assign( "rank", $R046b4585a2 );
						
												$this->View( );
						
				}

				public function AgentTplSave( )
				{
								$R7f50336ca5 = getvar( "aid" );
								$R2097a8fddf = factory::getinstance( "agents" );
								foreach ( $R7f50336ca5 as $R2a51483b14 )
								{
												$R014535cc1a = intval( request( "pricetpl_".$R2a51483b14 ) );
												$Rcfe942dd00 = intval( request( "oldpricetpl_".$R2a51483b14 ) );
												if ( $R014535cc1a != $Rcfe942dd00 )
												{
																$data = array(
																				"pricetpl" => $R014535cc1a
																);
																$R2a51483b14 = intval( $R2a51483b14 );
																$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																$this->UpdateCache( "agents", array(
																				"arg1" => $R2a51483b14
																) );
												}
								}
								$this->Alert( "完成操作" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price&a=Agent" );
				}

				public function PrivatePriceAgentSet( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R65edce27dd = getvar( "pname" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								if ( count( $R4e420efcc3['item'] ) == 0 )
								{
												$this->Alert( "没有您要的下家" );
												$this->HistoryGo( );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$R55c494bb27 = $R422f9a4efb->IProduct_Get( $R8e8b5578f7 );
								if ( intval( $R55c494bb27['sell'] ) == 0 )
								{
												$this->Alert( "商品已经下架！请选择其它商品或者联系管理员" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , , $Re2a6348a52, , $R2a51483b14 ) = $Rcc5c6e696c;
								$R9aa102385f = $this->GetAgentCache( $R2a51483b14 );
								$R198d213635 = 1;
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
								$R082c14652c = $this->GetPriceById( $R55c494bb27, $R9aa102385f, $R3a8b307327 );
								$R026f0167b4 = array( );
								$Rc1cb817715 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												if ( $R198d213635 )
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = $this->GetPriceById( $R55c494bb27, $R4e420efcc3['item'][$Ra16d228039], $R3a8b307327 );
												}
												else
												{
																$R4e420efcc3['item'][$Ra16d228039]['cprice'] = "---";
												}
												$Rc1cb817715[] = $R4e420efcc3['item'][$Ra16d228039]['aid'];
								}
								unset( $R026f0167b4 );
								$this->FillPage( $data, $R4e420efcc3 );
								$R046b4585a2 = $this->GetRCache( );
								$this->Assign( "rank", $R046b4585a2 );
								$R7f50336ca5 = implode( ",", $Rc1cb817715 );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$Rc81d709a1d = $R00655fd902->IPrivatePrice_GetByLimit( "pid = ".$R8e8b5578f7." and aid in (".$R7f50336ca5.")" );
								unset( $Rc1cb817715 );
								$R888e816784 = array( );
								foreach ( $Rc81d709a1d as $R0f8134fb60 )
								{
												$R888e816784[$R0f8134fb60['aid']] = $R0f8134fb60['price'];
								}
								$this->Assign( "parray", $R888e816784 );
								$this->Assign( "pid", $R8e8b5578f7 );
								$this->Assign( "pname", $R65edce27dd );
								$this->Assign( "myprice", $R082c14652c );
							
												$this->Assign( "productrs", $R55c494bb27 );
												$this->View( );
								
				}

				public function PrivatePriceAgent( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								if ( count( $R4e420efcc3['item'] ) == 0 )
								{
												$this->Alert( "没有您要的下家" );
												$this->HistoryGo( );
								}
								$this->FillPage( $data, $R4e420efcc3 );
								$R046b4585a2 = $this->GetRCache( );
								$this->Assign( "rank", $R046b4585a2 );
								
												$this->view( );
								
				}

				public function PrivatePriceProductSave( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								if ( $R2a51483b14 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4c4e792da9 = $R2a51483b14;
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R4c4e792da9, "parentid,alv,aid,pricetpl" );
								if ( !isset( $R2f07e1d8b8['parentid'] ) || $R2f07e1d8b8['parentid'] != $Rcc5c6e696c[7] )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R3359c04a1b = getvar( "pid" );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R8e8b5578f7 = intval( $R8e8b5578f7 );
												$R082c14652c = doubleval( request( "myprice" ) );
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												$Rff28faf2ca = request( "oldprice_".$R8e8b5578f7, "" );
												$R082c14652c = request( "myprice_".$R8e8b5578f7, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"aid" => $R2a51483b14
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$Rff28faf2ca = doubleval( $Rff28faf2ca );
																if ( $R63d0786ecc < $R082c14652c )
																{
																				$R63d0786ecc = $R082c14652c;
																				$R8c989dcf9c++;
																}
																if ( $R00655fd902->IPrivatePrice_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and aid=".$R2a51483b14;
																				if ( $Rff28faf2ca != $R63d0786ecc )
																				{
																								$R00655fd902->IPrivatePrice_UpdateByArray( $data, $Rb7492a73f7 );
																				}
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$R00655fd902->IPrivatePrice_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&a=PrivatePriceProductSet&aid=".$R2a51483b14 );
				}

				public function PrivatePriceAgentSave( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R7f50336ca5 = getvar( "aid" );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R7f50336ca5 as $R2a51483b14 )
								{
												$R2a51483b14 = intval( $R2a51483b14 );
												$R082c14652c = doubleval( request( "myprice" ) );
												$R63d0786ecc = request( "price_".$R2a51483b14, "" );
												$Rff28faf2ca = request( "oldprice_".$R2a51483b14, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"aid" => $R2a51483b14
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$Rff28faf2ca = doubleval( $Rff28faf2ca );
																if ( $R63d0786ecc < $R082c14652c )
																{
																				$R63d0786ecc = $R082c14652c;
																				$R8c989dcf9c++;
																}
																if ( $R00655fd902->IPrivatePrice_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and aid=".$R2a51483b14;
																				if ( $Rff28faf2ca != $R63d0786ecc )
																				{
																								$R00655fd902->IPrivatePrice_UpdateByArray( $data, $Rb7492a73f7 );
																				}
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$R00655fd902->IPrivatePrice_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=price&a=PrivatePriceAgentSet&pid=".$R8e8b5578f7 );
				}

				public function PrivatePriceAgentDel( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$Rcc5c6e696c = $this->session->agent;
								$R35f1026418 = $Rcc5c6e696c[7];
								if ( isset( $agent['parentid'] ) && $R35f1026418 == $agent['parentid'] )
								{
												$R00655fd902 = factory::getinstance( "privateprices" );
												$data = array(
																"aid" => $R2a51483b14,
																"pid" => $R8e8b5578f7
												);
												$R808b89ba0e = $R00655fd902->IPrivatePrice_DeleteByStr( "", $data );
												$this->Alert( "完成操作 " );
												$this->HistoryGo( );
								}
								else
								{
												$this->Alert( "您无权操作此用户！" );
												$this->HistoryGo( );
								}
				}

				public function PriceMyDel( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( 0 < $R2a51483b14 )
								{
												$R0018526148 = factory::getinstance( "pricemy" );
												$data = array(
																"aid" => $R2a51483b14,
																"pid" => $R8e8b5578f7
												);
												$R808b89ba0e = $R0018526148->IPriceMy_DeleteByStr( "", $data );
												if ( $R808b89ba0e )
												{
																$this->Alert( "完成操作 " );
												}
												else
												{
																$this->Alert( "操作失败" );
												}
												$this->HistoryGo( );
								}
				}

				public function PriceMySave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R2a51483b14, "parentid,alv,aid,pricetpl" );
								$R3359c04a1b = getvar( "pid" );
								$R0018526148 = factory::getinstance( "pricemy" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R8e8b5578f7 = intval( $R8e8b5578f7 );
												$R63d0786ecc = request( "price_".$R8e8b5578f7, "" );
												$Rff28faf2ca = request( "oldprice_".$R8e8b5578f7, "" );
												$R082c14652c = request( "myprice_".$R8e8b5578f7, "" );
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"aid" => $R2a51483b14
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$Rff28faf2ca = doubleval( $Rff28faf2ca );
																if ( $R63d0786ecc < $R082c14652c )
																{
																				$R63d0786ecc = $R082c14652c;
																				$R8c989dcf9c++;
																}
																if ( $R0018526148->IPriceMy_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and aid=".$R2a51483b14;
																				if ( $Rff28faf2ca != $R63d0786ecc )
																				{
																								$R0018526148->IPriceMy_UpdateByArray( $data, $Rb7492a73f7 );
																				}
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$R0018526148->IPriceMy_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->UpdateCache( "pricemy", array(
												"arg1" => $R2a51483b14
								) );
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&a=PriceMy" );
				}

				public function TplPriceQuickSave( )
				{
								set_time_limit( 0 );
								$R014535cc1a = intval( request( "pricetpl" ) );
								if ( $R014535cc1a == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rb7abd0cdc3 = factory::getinstance( "priceagenttpl" );
								$R35ee3e47cf = $Rb7abd0cdc3->IPriceAgentTpl_GetByStr( "id= ".$R014535cc1a );
								if ( !isset( $R35ee3e47cf[0]['aid'] ) )
								{
												$this->Alert( "模板已经不存在！" );
												$this->HistoryGo( );
								}
								if ( $R35ee3e47cf[0]['aid'] != $R2a51483b14 )
								{
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
								}
								$R422f9a4efb = factory::getinstance( "products" );
								$R55c494bb27 = $R422f9a4efb->IProduct_GetAll( "pid,price,listprice,pname,pricetpl,canmakeprice" );
								$R33403e391b = doubleval( request( "discout" ) );
								$R0acfedc1db = intval( request( "priceplan" ) );
								$R3359c04a1b = getvar( "pid" );
								$Rf00621a200 = factory::getinstance( "priceagent" );
								$R776affd38c = 0;
								$Rd0620688a2 = 0;
								$R9f02410eed = 0;
								$R8c989dcf9c = 0;
								$R3a8b307327 = $this->GetDec( );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								foreach ( $R55c494bb27 as $R0f8134fb60 )
								{
												$R8e8b5578f7 = $R0f8134fb60['pid'];
												$R082c14652c = $this->GetPriceById( $R0f8134fb60, $agent, $R3a8b307327 );
												switch ( $R0acfedc1db )
												{
												case 1 :
																$R63d0786ecc = $R082c14652c + ( $R0f8134fb60['listprice'] - $R082c14652c ) * $R33403e391b / 100;
																break;
												case 2 :
																$R63d0786ecc = $R082c14652c + $R33403e391b;
																break;
												case 3 :
																$R63d0786ecc = $R082c14652c + $R0f8134fb60['listprice'] * $R33403e391b / 100;
																break;
												case 4 :
																$R63d0786ecc = $Red2b3403a5 * $R33403e391b;
																break;
												default :
																$R63d0786ecc = $R0f8134fb60['listprice'];
																break;
												}
												$R63d0786ecc = round( $R63d0786ecc, $R3a8b307327 );
												$R0d9f8f778c = $R0f8134fb60['price'];
												if ( $R63d0786ecc != "" )
												{
																$data = array(
																				"pid" => $R8e8b5578f7,
																				"pricetpl" => $R014535cc1a
																);
																$R63d0786ecc = doubleval( $R63d0786ecc );
																$R0d9f8f778c = $R082c14652c;
																if ( $R63d0786ecc < $R0d9f8f778c )
																{
																				$R63d0786ecc = $R0d9f8f778c;
																				$R8c989dcf9c++;
																}
																if ( $Rf00621a200->IPriceAgent_IsExist( $data ) )
																{
																				$data['price'] = $R63d0786ecc;
																				$Rb7492a73f7 = " pid = ".$R8e8b5578f7." and pricetpl=".$R014535cc1a;
																				$Rf00621a200->IPriceAgent_UpdateByArray( $data, $Rb7492a73f7 );
																}
																else
																{
																				$data['price'] = $R63d0786ecc;
																				$Rf00621a200->IPriceAgent_Create( $data );
																}
																$Rd0620688a2++;
												}
								}
								$this->Alert( "完成操作，共保存了".$Rd0620688a2."个，\\n其中".$R8c989dcf9c."个商品由于价格低于进货价系统做了自动调整" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=product&a=RankTplPrice&pricetpl=".$R014535cc1a."&name=".urlencode( getvar( "name" ) ) );
				}

}

?>
