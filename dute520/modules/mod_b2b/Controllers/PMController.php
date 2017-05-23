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
class PMController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "msg" );
				}

				public function Index( )
				{
								$Rd41ed45824 = array( "<font color=\"#cccccc\">全部</font>", "普通短信", "<font color=\"#ff00ff\">汇款短信</font>", "<font color=\"#ff0000\">投诉短信</font>" );
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R21784dec6e = intval( request( "msgtype" ) );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 1,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "title" => "标题", "msgfrom" => "发信人", "msgto" => "收信人" );
								$R8dc7d3eb73 = array( "0" => "所有平台", "1" => "批发", "2" => "零售", "3" => "一卡通" );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( getvar( "comefrom", 0 ) ) );
								$this->Recycle( "msg", " msgtype=1 " );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "tarray", $Rd41ed45824 );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "pmust" ) ) ) );
				}

				public function RemittanceIndex( )
				{
							
												$this->View( );
							
				}

				public function add( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "addos" ) ) ) );
				}

				public function Save( )
				{
								$R2a51483b14 = 0;
								$Ra3d21a857b = $R2a51483b14;
								$R26238b353c = "";
								$R21784dec6e = intval( request( "msgtype", 1 ) );
								$R180beb7e65 = intval( request( "msgto" ) );
								$Rb9d4add894 = intval( request( "comefrom" ) );
								if ( $Rb9d4add894 == 1 && 3 < $R180beb7e65 || 1 < $Rb9d4add894 && $R180beb7e65 < 4 )
								{
												$this->Alert( "平台选择和参数不匹配，请重新选择" );
												$this->HistoryGo( );
								}
								switch ( $R180beb7e65 )
								{
								case 0 :
												$R180beb7e65 = 999999;
												$R26238b353c = "all";
												break;
								case 1 :
												$R180beb7e65 = intval( request( "specialunderling" ) );
												break;
								case 2 :
												$R180beb7e65 = 999999;
												$R26238b353c = "allunderling";
												break;
								case 3 :
												$R180beb7e65 = intval( request( "underlingid" ) );
												break;
								case 4 :
												$R180beb7e65 = 999999;
												$R26238b353c = "all";
												break;
								case 5 :
												$R180beb7e65 = intval( request( "cid" ) );
												break;
								default :
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
												break;
								}
								if ( $R180beb7e65 == 0 )
								{
												$this->Alert( "您好！不能自己给自己发短信" );
												$this->HistoryGo( );
								}
								$R06c518f70e = getvar( "title" );
								$Re82ee9b121 = htmlspecialchars( getvar( "content" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R869f4397d0 = intval( request( "msgstate" ) );
								if ( 0 < $Rac9b8532b8 && $R869f4397d0 < 4 )
								{
												$data = array(
																"msgstate" => $R869f4397d0
												);
												$this->hander->IMsg_Update( $data, $Rac9b8532b8 );
								}
								if ( 0 < $Rac9b8532b8 && $R21784dec6e == 2 )
								{
												$R21784dec6e = 1;
								}
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"comefrom" => $Rb9d4add894,
												"msgto" => $R180beb7e65,
												"msgcc" => $R26238b353c,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => $Re82ee9b121,
												"parentid" => $Rac9b8532b8,
												"msgtype" => $R21784dec6e
								);
								$sess = factory::getinstance( "session" );
								$data['admname'] = $sess->admin;
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "短消息发布成功！" );
												if ( $R21784dec6e == 1 )
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=PM&msgfrom=".$R2a51483b14 );
												}
												else if ( $R21784dec6e == 2 )
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=Remit&by=1" );
												}
												else
												{
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=complaint&by=" );
												}
								}
								else
								{
												$this->Alert( "短消息发布失败！" );
												$this->HistoryGo( );
								}
				}

				public function Detail( )
				{
								$R2a51483b14 = 0;
								$R3584859062 = intval( getvar( "id" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								if ( isset( $R3db8f5c8bc['msgto'] ) && $R3db8f5c8bc['msgto'] == 0 )
								{
												$data = array( "isreaded" => 1 );
												$this->hander->IMsg_Update( $data, $R3584859062 );
												$R63bede6b19 = " parentid=".$R3db8f5c8bc['id']." and msgto=0 ";
												$this->hander->IMsg_UpdateByStr( $data, $R63bede6b19 );
												if ( 0 < $R3db8f5c8bc['parentid'] )
												{
																$R63bede6b19 = " id=".$R3db8f5c8bc['parentid']." and msgto=0 ";
																$this->hander->IMsg_UpdateByStr( $data, $R63bede6b19 );
												}
								}
								$Rac9b8532b8 = $R3db8f5c8bc['parentid'];
								if ( 0 < $Rac9b8532b8 )
								{
												$R3584859062 = $Rac9b8532b8;
												$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								}
								if ( $R3db8f5c8bc['msgtype'] == 3 )
								{
												$R63bede6b19 = "投诉";
								}
								else if ( $R3db8f5c8bc['msgtype'] == 2 )
								{
												$R63bede6b19 = "汇款";
								}
								else
								{
												$R63bede6b19 = "短信";
								}
								$this->Assign( "str", $R63bede6b19 );
								$this->Assign( "msg", $R3db8f5c8bc );
								$data = array(
												"page" => intval( getvar( "page" ) ),
												"parentid" => $R3584859062,
												"nrows" => 100
								);
								$R4e420efcc3 = $this->hander->IMsg_Page( $data, true, "id,pop" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R180beb7e65 = "";
								if ( $R3db8f5c8bc['msgfrom'] == $R2a51483b14 )
								{
												$R180beb7e65 = $R3db8f5c8bc['msgto'];
								}
								else
								{
												$R180beb7e65 = $R3db8f5c8bc['msgfrom'];
								}
								$this->Assign( "msgto", $R180beb7e65 );
						
												$this->View( );
						
				}

				public function RemittanceDetail( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								$this->Assign( "item", $R3db8f5c8bc );
							
												$this->View( );
							
				}

				public function Remittance( )
				{
								$R36a4dc9ccf = array( );
								
								for ( $Ra16d228039 = 2000;	$Ra16d228039 < 2051;	$Ra16d228039++	)
								{
												$R36a4dc9ccf[$Ra16d228039] = $Ra16d228039;
								}
								$Rf52ba22baf = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 13;	$Ra16d228039++	)
								{
												$Rf52ba22baf[$Ra16d228039] = $Ra16d228039;
								}
								$R20fd65e9c7 = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 32;	$Ra16d228039++	)
								{
												$R20fd65e9c7[$Ra16d228039] = $Ra16d228039;
								}
								$R60169cd1c4 = array( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 24;	$Ra16d228039++	)
								{
												$R60169cd1c4[$Ra16d228039] = $Ra16d228039.":00";
								}
								$this->Assign( "y", $R36a4dc9ccf );
								$this->Assign( "m", $Rf52ba22baf );
								$this->Assign( "d", $R20fd65e9c7 );
								$this->Assign( "h", $R60169cd1c4 );
								$R222ff303f4 = factory::getinstance( "banks" );
								$this->Assign( "banks", $R222ff303f4->IBank_Get( ) );
						
												$this->view( );
						
				}

				public function Del( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								if ( $R3584859062 == 0 )
								{
												$this->Alert( "参数错误！请重新操作" );
												$this->HistoryGo( );
								}
								$this->hander->IMsg_Delete( $R3584859062 );
								$this->Alert( "删除成功！" );
								$R7130865f2e = $_SERVER['HTTP_REFERER'];
								$this->ScriptRedirect( $R7130865f2e );
				}

				public function RemittanceSave( )
				{
								$R180beb7e65 = intval( getvar( "msgto" ) );
								$Re5576d8e05 = getvar( "year" )."-".getvar( "month" )."-".getvar( "day" )." ".getvar( "hour" ).":00";
								$R2ade2b5cf6 = getvar( "dollars1" );
								$R2e081715dc = getvar( "dollars2" );
								echo $R2ade2b5cf6.".".$R2e081715dc;
								$R9b252bf0a7 = doubleval( $R2ade2b5cf6.".".$R2e081715dc );
								$R51c716b966 = $this->SetLang( 1 );
								$R06c518f70e = "(".$Re5576d8e05.")编号".$R2a51483b14."汇款".$R9b252bf0a7.$R51c716b966['moneyunit'];
								$R2c90a0c76d = getvar( "bank" );
								$R5204d30600 = htmlspecialchars( getvar( "others" ) );
								$Re82ee9b121 = $R2c90a0c76d."\\n\\n汇款备注\\n".$R5204d30600."\\n\\n汇款金额：".$R51c716b966['moneysymbol'].$R9b252bf0a7.$R51c716b966['moneyunit']."\\n\\n汇款时间：".$Re5576d8e05;
								$data = array(
												"msgfrom" => 0,
												"msgto" => $R180beb7e65,
												"msgcc" => 0,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => $Re82ee9b121,
												"msgtype" => 1
								);
								$sess = factory::getinstance( "session" );
								$data['admname'] = $sess->admin;
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "汇款通知书发送成功！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=PM&msgtype=1&tpl=RemittanceIndex&msgfrom=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( "汇款通知书发送失败！" );
												$this->HistoryGo( );
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
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 1,
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
								return $Rb7492a73f7." and msgtype=1 ";
				}

				public function DelItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 1,
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
