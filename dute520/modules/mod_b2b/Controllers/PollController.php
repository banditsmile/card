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
class PollController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "poll" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( "parentid" => 0 );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IPoll_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "title" => "主题" );
							
												$this->Assign( "sarray", $R00be52aa45 );
												$this->view( );
							
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
						
												$this->Assign( "item", $this->instance->IPoll_GetById( $R3584859062 ) );
												$this->View( );
						
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$Rb294963c49 = getvar( "expiration" );
								if ( $Rb294963c49 == "" )
								{
												$Rb294963c49 = date( "Y-m-d H:i:s", strtotime( "+365 days" ) );
								}
								$data = array(
												"parentid" => $Rac9b8532b8,
												"title" => getvar( "title", "主题为空" ),
												"ordering" => intval( request( "ordering" ) ),
												"createdate" => date( "Y-m-d H-i-s" ),
												"expiration" => $Rb294963c49,
												"hits" => intval( request( "hits" ) ),
												"forb2b" => intval( request( "forb2b" ) ),
												"forb2c" => intval( request( "forb2c" ) ),
												"forykt" => intval( request( "forykt" ) ),
												"isradio" => intval( request( "isradio" ) ),
												"pubulished" => intval( request( "pubulished" ) )
								);
								if ( 0 < $R3584859062 )
								{
												$R808b89ba0e = $this->instance->IPoll_Update( $data, $R3584859062 );
								}
								else
								{
												$R808b89ba0e = $this->instance->IPoll_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功！" );
								}
								else
								{
												$this->Alert( "操作失败！" );
								}
								if ( 0 < $Rac9b8532b8 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=PMenu&parentid=".$Rac9b8532b8 );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Poll" );
								}
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
								$R808b89ba0e = $this->instance->IPoll_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IPoll_UpdateByStr( $data, $Rb7492a73f7 );
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
								$data = array(
												"parentid" => intval( request( "parentid" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IPoll_DestroyByStr( $Rb7492a73f7, $data );
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
								$R808b89ba0e = $this->instance->IPoll_DeleteByStr( $Rb7492a73f7, $data );
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
