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
class CreditController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "credit" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "tierc" ) ) ) );
								$R00be52aa45 = array( "aid" => "用户编号" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "ercdi" ) ) ) );
				
												$this->View( );
				
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$data = array(
												"aid" => intval( request( "aid" ) ),
												"bossid" => 0,
												"credit" => intval( request( "credit" ) ),
												"isvalid" => intval( request( "isvalid" ) )
								);
								if ( $R3584859062 == 0 )
								{
												$R3db8f5c8bc = $this->instance->ICredit_Get( array(
																"aid" => intval( request( "aid" ) ),
																"bossid" => 0
												) );
												if ( isset( $R3db8f5c8bc[0]['id'] ) )
												{
																$this->Alert( "用户对应的记录已经存在，请不要重复添加" );
																$this->HistoryGo( );
												}
												$R63bede6b19 = "添加";
												$R808b89ba0e = $this->instance->ICredit_Create( $data );
								}
								else
								{
												$R63bede6b19 = "更新";
												$R808b89ba0e = $this->instance->ICredit_Update( $data, $R3584859062 );
								}
								$this->go( $R808b89ba0e, $R63bede6b19."成功", $R63bede6b19."失败", "index.php?m=mod_b2b&c=Credit" );
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ItemDeal( )
				{
								$R3584859062 = intval( request( "id" ) );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" || $R3584859062 == 0 )
								{
												echo "参数错误！";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->instance->ICredit_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "修改失败！".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->instance->ICredit_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "记录还原失败！";
								}
				}

				public function DestroyItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICredit_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
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
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
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
								$Rb7492a73f7 = "";
								if ( $R09dfa65bd9 == 1 )
								{
												if ( $R3456919727 != "" )
												{
																$Rb7492a73f7 = "id not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "请先选择行";
																exit( );
												}
												$Rb7492a73f7 = "id in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

				public function DelItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICredit_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "删除失败!";
								}
								else
								{
												echo "";
								}
				}

}

?>
