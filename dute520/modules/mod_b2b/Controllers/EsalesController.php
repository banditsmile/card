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
class EsalesController extends Controller
{

				public $service = NULL;
				public $action = NULL;
				public $hander = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "sesales" );
								$this->hander = factory::getinstance( "products" );
								$this->action = array( "esaleslist", "esalesdel", "esalesdetail", "esalesedit", "esalesadd" );
				}

				public function Home( )
				{
								$this->Redirect( "Home" );
				}

				public function Index( )
				{
								$data = array(
												"page" => intval( request( "page", 1 ) ),
												"keywords" => urlencode( getvar( "keywords", "" ) ),
												"optype" => getvar( "optype" ),
												"ptype" => getvar( "ptype" ),
												"begsupprice" => getvar( "begsupprice" ),
												"endsupprice" => getvar( "endsupprice" ),
												"supuid" => getvar( "supuid" ),
												"filters" => getvar( "filters" ),
												"ctrl" => getvar( "ctrl" ),
												"supcheck" => getvar( "supcheck" ),
												"action" => $this->action[0]
								);
								$R4e420efcc3 = $this->service->ISup_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."ProductHelper.php" );
						
												$this->view( );
						
				}

				public function Add( )
				{
								$R422f9a4efb = factory::getinstance( "products" );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$Rb3f07f8c36 = $R422f9a4efb->IProduct_Get( $Rdc410fe8bb, -1, "pid,pname,stocks,onsup" );
								$this->Assign( "item", $Rb3f07f8c36 );
								$this->Assign( "js", "<script type=\"text/javascript\" src=\"http://www.yingxkg.tk/cztpl/setcztpl.js\"></script>" );
								if ( $Rb3f07f8c36['onsup'] == 1 )
								{
												$data = array(
																"ubzpid" => $Rdc410fe8bb,
																"action" => $this->action[2]
												);
												$Ra70e07bad6 = $this->service->IEsales_Get( $data );
												if ( isset( $Ra70e07bad6['tpl'] ) )
												{
																$this->Assign( "esales", $Ra70e07bad6 );
																$this->View( "Detail" );
												}
												else if ( $Ra70e07bad6 == -999 )
												{
																$this->Alert( "您好，可能是网络故障，导致您的的商品参数出现异常，您可以待会再试，如果还是出现同样现象，请联系颖先卡购咨询" );
																$this->historyGo( );
												}
												else
												{
																$data = array( "onsup" => 0, "sup" => 0 );
																$R808b89ba0e = $this->hander->IProduct_Update( $data, $Rdc410fe8bb );
																$this->UpdateCache( "products", array(
																				"arg1" => $Rdc410fe8bb
																) );
														
																				$this->View( );
														
												}
								}
								else
								{
										
																$this->View( );
										
								}
				}

				public function Detail( )
				{
								$this->Assign( "js", "<script type=\"text/javascript\" src=\"http://www.yingxkg.tk/cztpl/setcztpl.js\"></script>" );
						
												$this->View( );
						
				}

				public function UpdateAllProductCache( $R8e8b5578f7 )
				{
								$Rb3f07f8c36 = $this->GetProductCache( $R8e8b5578f7 );
								$Rcd0c741934 = $Rb3f07f8c36['catid'];
								$Rb62a6519ba = $Rb3f07f8c36['pinyin'];
								$this->UpdateCache( "products", array(
												"arg1" => $R8e8b5578f7
								) );
								$this->UpdateCache( "list", array(
												"arg1" => $Rcd0c741934
								) );
								if ( $Rb62a6519ba != "" && $Rb62a6519ba != "NULL" )
								{
												if ( "0" < $Rb62a6519ba && $Rb62a6519ba < "9" )
												{
																$Rb62a6519ba = "09";
												}
												$this->UpdateCache( "pinyin", array(
																"arg1" => $Rb62a6519ba
												) );
								}
				}

				public function Save( )
				{
								$Rc401eda180 = intval( request( "ubzid" ) );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$Rb3f07f8c36 = $this->GetProductCache( $Rdc410fe8bb );
								if ( intval( $Rb3f07f8c36['hassup'] ) == 1 )
								{
												$this->Alert( "请先去掉对接后再添加直储帐号" );
												$this->HistoryGo( );
								}
								$data = array(
												"ubzid" => $Rc401eda180,
												"ubzpid" => $Rdc410fe8bb,
												"ubzmechant" => getvar( "ubzmechant" ),
												"ubzpwd" => getvar( "ubzpwd" ),
												"ubzothers" => getvar( "ubzothers" ),
												"ubzstocks" => intval( request( "ubzstocks" ) ),
												"tpl" => intval( request( "tpl" ) ),
												"ubzpname" => getvar( "ubzpname" ),
												"listprice" => $Rb3f07f8c36['listprice']
								);
								if ( 0 < $Rc401eda180 )
								{
												$data['action'] = $this->action[3];
								}
								else
								{
												$data['action'] = $this->action[4];
								}
								$R808b89ba0e = $this->service->IEsales_Save( $data );
								$R98aa12da5c = $this->GetUmebizPid( $Rdc410fe8bb );
								if ( 0 < $R98aa12da5c )
								{
												$data = array(
																"mchid" => getvar( "ubzmechant" ),
																"mchpwd" => getvar( "ubzpwd" ),
																"mchothers" => getvar( "ubzothers" ),
																"stocks" => intval( request( "ubzstocks" ) ),
																"onsup" => 1
												);
												$R808b89ba0e = $this->hander->IProduct_Update( $data, $Rdc410fe8bb );
												if ( $R808b89ba0e )
												{
																$this->Alert( "操作成功！" );
												}
												else
												{
																$R808b89ba0e = $this->hander->IProduct_Update( $data, $Rdc410fe8bb );
																if ( $R808b89ba0e )
																{
																				$this->Alert( "操作成功！" );
																}
																else
																{
																				$this->Alert( "严重错误！请重新操作" );
																				$this->HistoryGo( );
																}
												}
												$this->UpdateAllProductCache( $Rdc410fe8bb );
								}
								else
								{
												$this->Alert( $R808b89ba0e );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&ptype=-1&aid=-1" );
				}

				public function Del( )
				{
								$Rc401eda180 = intval( request( "ubzid" ) );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$data = array(
												"ubzid" => $Rdc410fe8bb,
												"ubzpid" => $Rdc410fe8bb,
												"action" => $this->action[1]
								);
								$this->service->IEsales_Save( $data );
								$this->Alert( "删除成功！" );
								$R90d20f095b = intval( request( "frm" ) );
								if ( $R90d20f095b == 1 )
								{
												$this->View( "frmsup", $Rdc410fe8bb );
								}
								else
								{
												$this->View( "sup", $Rdc410fe8bb );
								}
				}

}

?>
