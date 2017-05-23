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
class MessengerController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "msg" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgto" => $R2a51483b14,
												"msgtype" => 1,
												"msgstate" => intval( request( "msgstate" ) ),
												"bossid" => $R5334b17ba8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_QueryPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "agent", $this->session->agent );
							
												$this->View( );
							
				}

				public function MsgNotRead( )
				{
								$R9e0664486a = factory::getinstance( "msg" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$data = array(
												"msgto" => $R2a51483b14,
												"bossid" => $R5334b17ba8
								);
								$R3db8f5c8bc = $R9e0664486a->IMsg_NotReaded( $data, 1 );
								$this->Assign( "items", $R3db8f5c8bc );
							
												$this->View( );
							
				}

				public function Mon( )
				{
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgtype" => 1,
												"msgstate" => intval( request( "msgstate" ) ),
												"bossid" => $R5334b17ba8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_QueryPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "agent", $this->session->agent );
							
												$this->View( );
							
				}

				public function Add( )
				{
								$this->Assign( "msgtitle", getvar( "msgtitle" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$R1f6f93f8bb = $R2097a8fddf->IAgent_GetUnderling( $R2a51483b14 );
								$this->Assign( "agents", $R1f6f93f8bb );
							
												$this->View( );
							
				}

				public function MessengerSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Ra3d21a857b = $R2a51483b14;
								$R26238b353c = "";
								list( , $R45df0fe00d, , , , , , , , $R94e0136c8a ) = $Rcc5c6e696c;
								if ( 0 < $R94e0136c8a )
								{
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												$R45df0fe00d = $Raac42e4217['realname'];
								}
								$R180beb7e65 = intval( request( "msgto" ) );
								switch ( $R180beb7e65 )
								{
								case 0 :
												$R180beb7e65 = 0;
												break;
								case 1 :
												$R180beb7e65 = $Rcc5c6e696c[4];
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
												$R26238b353c = "allstaffs";
												break;
								case 5 :
												$R180beb7e65 = intval( request( "staffid" ) );
												break;
								default :
												$this->Alert( "非法操作！" );
												$this->HistoryGo( );
												break;
								}
								$R06c518f70e = getvar( "title" );
								if ( $R06c518f70e == "" )
								{
												$this->Alert( "标题不能为空！" );
												$this->HistoryGo( );
								}
								$Re82ee9b121 = htmlspecialchars( getvar( "content" ) );
								if ( strpos( $Re82ee9b121, "回复内容如下" ) !== false )
								{
												$Ra7875614d8 = explode( "回复内容如下==========", $Re82ee9b121 );
												if ( isset( $Ra7875614d8[1] ) )
												{
																$Re82ee9b121 = $Ra7875614d8[1];
												}
								}
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgcc" => $R26238b353c,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => $Re82ee9b121,
												"parentid" => $Rac9b8532b8,
												"msgtype" => 1,
												"admnick" => $R45df0fe00d,
												"aid" => $R2a51483b14,
												"staffid" => $R94e0136c8a
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( 0 < $R808b89ba0e )
								{
												$this->Alert( "短消息发送成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Messenger" );
								}
								else
								{
												$this->Alert( "短消息发送失败！" );
												$this->HistoryGo( );
								}
				}

				public function MessengerDel( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3456919727 = getvar( "id" );
								if ( !is_array( $R3456919727 ) )
								{
												$this->Alert( "请先选择要删除的短信息" );
												$this->HistoryGo( );
								}
								$R026f0167b4 = array( );
								foreach ( $R3456919727 as $R0f8134fb60 )
								{
												$R3584859062 = intval( $R0f8134fb60 );
												$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
												if ( $R3db8f5c8bc['msgto'] == $R2a51483b14 )
												{
																$data = array( "hidden" => 1 );
																$this->hander->IMsg_Update( $data, $R3584859062 );
												}
												else if ( $R3db8f5c8bc['msgto'] == 999999 && $R3db8f5c8bc['msgcc'] == "all" && $R3db8f5c8bc['msgfrom'] == 0 || $R3db8f5c8bc['msgto'] == 999999 && $R3db8f5c8bc['msgcc'] == "allunderling" && $R3db8f5c8bc['msgfrom'] == $Rcc5c6e696c[4] )
												{
																$data = array(
																				"aid" => $R2a51483b14,
																				"msgid" => $R3db8f5c8bc['id']
																);
																if ( $this->hander->IMsg_RowsExt( $data ) == 0 )
																{
																				$data['hidden'] = 1;
																				$this->hander->IMsg_CreateExt( $data );
																}
																else
																{
																				$R794010fd36 = array( "hidden" => 1 );
																				$this->hander->IMsg_UpdateExtByLimit( $R794010fd36, $data );
																}
												}
												else if ( $R3db8f5c8bc['msgfrom'] == $R2a51483b14 )
												{
																$data = array(
																				"aid" => $R2a51483b14,
																				"msgid" => $R3db8f5c8bc['id']
																);
																if ( $this->hander->IMsg_RowsExt( $data ) == 0 )
																{
																				$data['hidden'] = 1;
																				$this->hander->IMsg_CreateExt( $data );
																}
																else
																{
																				$R794010fd36 = array( "hidden" => 1 );
																				$this->hander->IMsg_UpdateExtByLimit( $R794010fd36, $data );
																}
												}
												else
												{
																$this->Alert( "非法操作！" );
																$this->HistoryGo( );
												}
								}
								$this->Alert( "删除成功" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=Messenger" );
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
								$R0e172d815d = intval( request( "isread" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								$R43491e0424 = 0;
								$Rac9b8532b8 = $R3db8f5c8bc['parentid'];
								if ( $R2a51483b14 == $R3db8f5c8bc['msgto'] )
								{
												$data = array( "isreaded" => 1 );
												$this->hander->IMsg_Update( $data, $R3584859062 );
								}
								else if ( $R3db8f5c8bc['msgto'] == 999999 && $R3db8f5c8bc['msgcc'] == "all" && $R3db8f5c8bc['msgfrom'] == 0 || $R3db8f5c8bc['msgto'] == 999999 && $R3db8f5c8bc['msgcc'] == "allunderling" && $R3db8f5c8bc['msgfrom'] == $Rcc5c6e696c[4] )
								{
												$data = array(
																"aid" => $R2a51483b14,
																"msgid" => $R3db8f5c8bc['id']
												);
												if ( $this->hander->IMsg_RowsExt( $data ) == 0 )
												{
																$this->hander->IMsg_CreateExt( $data );
																$data = array( "isreaded" => 1 );
																$this->hander->IMsg_Update( $data, $R3584859062 );
												}
												$R43491e0424 = 1;
								}
								if ( 0 < $Rac9b8532b8 )
								{
												$R3584859062 = $Rac9b8532b8;
												$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								}
								if ( $R0e172d815d == 1 )
								{
												exit( );
								}
								$Rac9b8532b8 = $R3db8f5c8bc['id'];
								if ( $R43491e0424 == 1 )
								{
												$Rac9b8532b8 = 0;
								}
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "aid", $R2a51483b14 );
								if ( $R3db8f5c8bc['msgtype'] == 3 )
								{
												$R63bede6b19 = "投诉";
								}
								else
								{
												$R63bede6b19 = "短信";
								}
								$this->Assign( "str", $R63bede6b19 );
								$this->Assign( "msg", $R3db8f5c8bc );
								$data = array(
												"page" => intval( request( "page" ) ),
												"parentid" => $R3584859062,
												"nrows" => 1000
								);
								$R4e420efcc3 = $this->hander->IMsg_Page( $data, true, "id,pop" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R180beb7e65 = "";
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R180beb7e65 = $R2a51483b14;
								}
								else if ( $R3db8f5c8bc['msgfrom'] == $R2a51483b14 )
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

}

?>
