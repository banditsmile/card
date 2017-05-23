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
class SupController extends Controller
{

				public $service = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "ssup" );
								$this->action = array( "prdlist", "importdel", "importedit", "importadd", "importlist", "suproductview", "supview" );
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

				public function Search( )
				{
							
												$this->View( );
							
				}

				public function SupLink( )
				{
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$R929cf63f35 = DATACACHE."product.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								$R09a3346376 = BCKCACHE.DS."product".DS."ids.php";
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$R0003a33381 = factory::getinstance( "products" );
												$R4e420efcc3 = $R0003a33381->IProduct_GetAll( );
												$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								include( $R09a3346376 );
								$R026f0167b4 = array( );
								foreach ( $R4e420efcc3 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['ptype'] < 99 && $R0f8134fb60['sup'] != 1 )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
								$R4e420efcc3 = $R026f0167b4;
								$this->Assign( "item", $R4e420efcc3 );
								$Re42bde3c42 = getvar( "ubzpname" );
								$Re42bde3c42 = iconv( "UTF-8", "utf-8//IGNORE", $Re42bde3c42 );
								$this->Assign( "suppname", $Re42bde3c42 );
								$this->Assign( "suppid", $Rdc410fe8bb );
						
												$this->View( );
						
				}

				public function FrmSup( $R3584859062 = 0 )
				{
							
												$this->GetSup( $R3584859062 );
												$this->View( );
							
				}

				public function Sup( $R3584859062 = 0 )
				{
						
												$this->GetSup( $R3584859062 );
												$this->View( );
						
				}

				public function GetSup( $R3584859062 = 0 )
				{
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								if ( $Rdc410fe8bb == 0 )
								{
												$Rdc410fe8bb = $R3584859062;
								}
								$data = array(
												"action" => $this->action[4],
												"ubzpid" => $Rdc410fe8bb,
												"page" => intval( request( "page" ) )
								);
								//$R4e420efcc3 = $this->service->ISup_Get( $data );
								$R55c494bb27 = $this->GetProductCache( $Rdc410fe8bb );
								if ( !isset( $R55c494bb27['pname'] ) )
								{
												$this->Alert( "��Ʒ�Ѿ������ڣ���ɾ���ԽӼ���" );
												$this->HistoryGo( );
								}
								$R056735882a = $R4e420efcc3['info']['totlerow'];
								$R808b89ba0e = 0;
								$R422f9a4efb = factory::getinstance( "products" );
								if ( 0 < $R056735882a )
								{
												$data = array(
																"pid" => $Rdc410fe8bb,
																"hassup" => 1
												);
												$R808b89ba0e = $R422f9a4efb->IProduct_Update( $data, $Rdc410fe8bb );
								}
								else if ( $R056735882a == 0 )
								{
												$data = array(
																"pid" => $Rdc410fe8bb,
																"hassup" => -1
												);
												$R808b89ba0e = $R422f9a4efb->IProduct_Update( $data, $Rdc410fe8bb );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "products", array(
																"arg1" => $Rdc410fe8bb
												) );
								}
								$this->UpdateAllProductCache( $Rdc410fe8bb );
								$this->Assign( "ubzpname", $R55c494bb27['pname'] );
								$this->Assign( "spnum", $R4e420efcc3['spnum'] );
								$this->Assign( "noack", intval( $R4e420efcc3['noack'] ) );
								$this->Assign( "ubzpid", $Rdc410fe8bb );
								$this->FillPage( $data, $R4e420efcc3 );
				}

				public function SimplePid( )
				{
								$R7965cb3798 = getvar( "keywords", "" );
								$R7965cb3798 = iconv( "UTF-8", "utf-8//IGNORE", $R7965cb3798 );
								$data = array(
												"keywords" => urlencode( $R7965cb3798 ),
												"page" => intval( request( "page" ) ),
												"ext" => "s",
												"optype" => "pidsearch",
												"action" => $this->action[0]
								);
								$Rd67d5099b6 = factory::getservice( "sproducts" );
								$R4e420efcc3 = $Rd67d5099b6->IProduct_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."ProductHelper.php" );
								header( "Content-type: text/html;charset=utf-8" );
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$data = array(
												"ubzid" => intval( request( "ubzid" ) ),
												"action" => $this->action[2]
								);
								$R3db8f5c8bc = $this->service->ICard_Get( $data );
								$this->Assign( "item", $R3db8f5c8bc );
							
												$this->View( );
							
				}

				public function Add( )
				{
								$Rd67d5099b6 = factory::getservice( "sproducts" );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$data = array(
												"ubzpid" => $Rdc410fe8bb,
												"optype" => "s"
								);
								$R3db8f5c8bc = $Rd67d5099b6->IProduct_Page( $data );
								$this->Assign( "item", $R3db8f5c8bc['item'] );
								$this->Assign( "ubzpid", $Rdc410fe8bb );
						
												$this->View( );
						
				}

				public function UpdateAllProductCache( $R8e8b5578f7 )
				{
								$Rb3f07f8c36 = $this->GetProductCache( $R8e8b5578f7 );
								if ( !isset( $Rb3f07f8c36['catid'] ) )
								{
												return;
								}
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
								$Raa493b9f66 = intval( request( "ubzepid" ) );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$data = array(
												"page" => intval( request( "page" ) ),
												"ubzpid" => $Rdc410fe8bb,
												"ubzspid" => intval( request( "ubzspid" ) ),
												"ubzspri" => intval( request( "ubzspri" ) )
								);
								if ( $Raa493b9f66 == 0 )
								{
												$data['action'] = $this->action[3];
								}
								else
								{
												$data['ubzepid'] = $Raa493b9f66;
												$data['action'] = $this->action[2];
								}
								$this->service->ISup_Save( $data );
								$this->Alert( "��ɲ�����" );
								$R90d20f095b = intval( request( "frm" ) );
								if ( $R90d20f095b == 1 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=sup&a=FrmSup&ubzpid=".$Rdc410fe8bb );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=sup&a=sup&ubzpid=".$Rdc410fe8bb );
								}
				}

				public function Del( )
				{
								$Raa493b9f66 = intval( request( "ubzepid" ) );
								$Rdc410fe8bb = intval( request( "ubzpid" ) );
								$R636bb4567a = intval( request( "nopid" ) );
								$data = array(
												"page" => intval( request( "page" ) ),
												"ubzpid" => $Rdc410fe8bb,
												"ubzepid" => $Raa493b9f66,
												"action" => $this->action[1]
								);
								$this->service->ISup_Save( $data );
								if ( $R636bb4567a != 1 )
								{
												$this->Alert( "���ɾ����" );
								}
								$R90d20f095b = intval( request( "frm" ) );
								if ( $R636bb4567a == 0 )
								{
												if ( $R90d20f095b == 1 )
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=sup&a=FrmSup&ubzpid=".$Rdc410fe8bb );
												}
												else
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=sup&a=sup&ubzpid=".$Rdc410fe8bb );
												}
								}
								else
								{
												$this->HistoryGo( );
								}
				}

				public function GetProduct( )
				{
								$data = array(
												"ubzpid" => intval( request( "ubzpid" ) ),
												"action" => $this->action[5]
								);
								$this->Assign( "item", $this->service->ISup_GetProduct( $data ) );
								include_once( UPATH_HELPER."ProductHelper.php" );
							
												$this->View( );
							
				}

				public function GetSupplier( )
				{
								$data = array(
												"ubzpid" => intval( request( "ubzpid" ) ),
												"ubzuuid" => intval( request( "ubzuuid" ) ),
												"action" => $this->action[6]
								);
								$this->Assign( "item", $this->service->ISup_GetSupplier( $data ) );
								$this->Assign( "ordno", getvar( "ubzordno", "" ) );
					
												$this->View( );
					
				}

}

?>
