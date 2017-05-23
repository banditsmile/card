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
class ComplaintController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "msg" );
				}

				public function Index( )
				{
								$Rd41ed45824 = array( "<font color=\"#cccccc\">全部</font>", "未处理", "<font color=\"#ff00ff\">处理中</font>", "<font color=\"#ff0000\">已处理</font>" );
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R21784dec6e = intval( request( "msgtype" ) );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R64bdee66ef = intval( request( "mstate", 0 ) );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 3,
												"msgstate" => $R64bdee66ef,
												"parentid" => 0,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "caint" ) ) ) );
								$R00be52aa45 = array( "other" => "类型或问题", "msgfrom" => "投诉人", "msgto" => "被投诉人" );
								$R8dc7d3eb73 = array( "0" => "所有平台", "1" => "批发", "2" => "零售", "3" => "一卡通" );
								$R2a754db770 = array( "", "<font color=\"#ff0000\">未处理</font>", "<font color=\"#ff00ff\">处理中</font>", "<font color=\"#0000ff\">已处理</font>" );
								$this->Assign( "mstate", $R2a754db770 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( request( "comefrom", 0 ) ) );
								$this->Recycle( "msg", " msgtype=3 " );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "tarray", $Rd41ed45824 );
								$this->Assign( "msgtype", $R21784dec6e );
								$this->Assign( "tmstate", $R64bdee66ef );
					
												$this->view( );
					
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
								$R808b89ba0e = $this->hander->IMsg_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->hander->IMsg_UpdateByStr( $data, $Rb7492a73f7 );
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
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 3,
												"parentid" => 0,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IMsg_DestroyByStr( $Rb7492a73f7, $data );
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
								return $Rb7492a73f7." and msgtype=3 ";
				}

				public function DelItems( )
				{
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 3,
												"parentid" => 0,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IMsg_DeleteByStr( $Rb7492a73f7, $data );
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
