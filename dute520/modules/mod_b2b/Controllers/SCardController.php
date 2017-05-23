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
class ScardController extends Controller
{

				public $service = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "scards" );
								$this->action = array( "stocklist", "stockdel", "stockedit", "stocksave" );
				}

				public function Home( )
				{
								$this->Redirect( "Home" );
				}

				public function Index( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Rf413f06aeb = getvar( "keywords" );
								if ( getvar( "stype" ) == "ubzpid" )
								{
												$Rf413f06aeb = $this->GetUmebizPid( intval( $Rf413f06aeb ) );
								}
								$data = array(
												getvar( "stype" ) => $Rf413f06aeb,
												"optype" => getvar( "optype" ),
												"action" => $this->action[0]
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->service->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "ubzcardnumber" => "卡号", "ubzordno" => "订单号", "ubzpname" => "商品名称", "ubzpid" => "商品编号" );
								$this->Assign( "sarray", $R00be52aa45 );
								include_once( UPATH_HELPER."CardHelper.php" );
					
												$this->view( );
					
				}

				public function Detail( )
				{
								$data = array(
												"ubzid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[2]
								);
								$R3db8f5c8bc = $this->service->ICard_Get( $data );
								$this->Assign( "item", $R3db8f5c8bc );
					
												$this->View( );
					
				}

				public function Add( )
				{
								$Rd67d5099b6 = factory::getservice( "sproducts" );
								$Rdc410fe8bb = intval( getvar( "ubzpid" ) );
								$data = array(
												"ubzpid" => $Rdc410fe8bb,
												"optype" => "s"
								);
								$R3db8f5c8bc = $Rd67d5099b6->IProduct_Page( $data );
								$this->Assign( "item", $R3db8f5c8bc['item'] );
								$this->Assign( "ubzpid", $Rdc410fe8bb );
						
												$this->View( );
						
				}

				public function Update( )
				{
								$data = array(
												"ubzcardnumber" => urlencode( getvar( "ubzcardnumber" ) ),
												"ubzcardpwd" => urlencode( getvar( "ubzcardpwd" ) ),
												"ubzid" => intval( getvar( "ubzid" ) ),
												"ubzpid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[2]
								);
								$R3db8f5c8bc = $this->service->ICard_Save( $data );
								$this->Alert( "操作成功！" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=SCard" );
				}

				public function Save( )
				{
								$data = array(
												"ubzcards" => urlencode( getvar( "ubzcards" ) ),
												"ubzpid" => urlencode( getvar( "ubzpid" ) ),
												"action" => $this->action[3]
								);
								$R3db8f5c8bc = $this->service->ICard_Save( $data );
								$this->Assign( "succ", $R3db8f5c8bc['item']['ubzsadd'] );
								$this->Assign( "fail", $R3db8f5c8bc['item']['ubzfadd'] );
								$this->Assign( "pname", $R3db8f5c8bc['item']['ubzpname'] );
								$this->Alert( "操作成功！" );
					
												$this->View( );
					
				}

				public function Del( )
				{
								$data = array(
												"ubzid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[1]
								);
								$this->service->ICard_Save( $data );
								$this->Alert( "删除成功！" );
								$this->View( "Index" );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function DelItems( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array(
												"action" => $this->action[1]
								);
								$data += $Rb7492a73f7;
								$this->service->ICard_Save( $data );
								echo "";
				}

				public function DestroyItems( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array(
												"action" => $this->action[1]
								);
								$data += $Rb7492a73f7;
								$R808b89ba0e = $this->service->ICard_Save( $data );
								if ( isset( $R808b89ba0e['error']['errcode'] ) && $R808b89ba0e['error']['errcode'] == 0 )
								{
												echo "";
								}
								else
								{
												echo "删除失败！";
								}
				}

				public function GetLit( )
				{
								$R026f0167b4 = array( );
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
								$Rc0d62c5404 = getvar( "chkexclude" );
								$R83e17604b1 = getvar( "chkinclude" );
								if ( $R09dfa65bd9 == 1 )
								{
												$Rc0d62c5404 = getvar( "chkexclude" );
												$Rcc5c6e696c = explode( ",", $Rc0d62c5404 );
								}
								else
								{
												$R83e17604b1 = getvar( "chkinclude" );
												$Rcc5c6e696c = explode( ",", $R83e17604b1 );
								}
								$R3db8f5c8bc = array( );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R8eeb1221ae = intval( $R0f8134fb60 );
												if ( 0 < $R8eeb1221ae )
												{
																$R3db8f5c8bc[] = $R8eeb1221ae;
												}
								}
								$R3456919727 = implode( ",", $R3db8f5c8bc );
								$R026f0167b4 = array(
												"tablecheckall" => $R09dfa65bd9,
												"ubzid" => urlencode( $R3456919727 )
								);
								return $R026f0167b4;
				}

}

?>
