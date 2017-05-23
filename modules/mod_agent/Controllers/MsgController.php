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
class MsgController extends Controller
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
								$Ra3d21a857b = intval( request( "msgfrom" ) );
								$R180beb7e65 = intval( request( "msgto" ) );
								if ( 0 < $Ra3d21a857b )
								{
												$Ra3d21a857b = $R2a51483b14;
								}
								if ( 0 < $R180beb7e65 )
								{
												$R180beb7e65 = $R2a51483b14;
								}
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => intval( request( "msgtype" ) ),
												"msgcat" => intval( request( "msgcat" ) ),
												"bossid" => $R5334b17ba8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_QueryPage( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R21784dec6e = $Ra3d21a857b == "" ? "receive" : "send";
								$this->Assign( "msgtype", $R21784dec6e );
								$tpl = getvar( "tpl" );
							
												$this->view( $tpl );
							
				}

				public function RemittanceIndex( )
				{
							
												$this->View( );
							
				}

				public function add( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R180beb7e65 = getvar( "msgto" );
								$R8f21e475c6 = getvar( "msgtitle" );
								$R21784dec6e = getvar( "msgtype", 1 );
								$this->Assign( "msgto", $R180beb7e65 );
								$this->Assign( "msgtitle", $R8f21e475c6 );
								$this->Assign( "msgtype", $R21784dec6e );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R1f6f93f8bb = $R2097a8fddf->IAgent_GetUnderling( $R2a51483b14 );
								$this->Assign( "agents", $R1f6f93f8bb );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$R3aba65936f = $R5f84c47438->IStaff_GetAll( "*", $R2a51483b14 );
								$this->Assign( "staffs", $R3aba65936f );
							
												$this->View( );
							
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Ra3d21a857b = $R2a51483b14;
								$R26238b353c = "";
								$R21784dec6e = intval( request( "msgtype", 1 ) );
								if ( $R21784dec6e == 3 )
								{
												$Rdcd9105806 = getvar( "ordno", "" );
												if ( $Rdcd9105806 != "" )
												{
																$Rdeabc7f106 = factory::getinstance( "orders" );
																$R3db8f5c8bc = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "tsid" );
																if ( 0 < intval( $R3db8f5c8bc['tsid'] ) )
																{
																				$this->Alert( "此订单已经投诉过，如果您需要补充，请点击原投诉，在后边回复即可！" );
																				$this->ScriptRedirect( "index.php?m=mod_agent&c=msg&msgfrom=".$R2a51483b14 );
																}
												}
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
								$Re82ee9b121 = htmlspecialchars( getvar( "content" ) );
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
												"msgtype" => $R21784dec6e
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( 0 < $R808b89ba0e )
								{
												if ( $R21784dec6e == 3 && $Rdcd9105806 != "" )
												{
																$data = array(
																				"tsid" => $R808b89ba0e
																);
																$Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
												}
												$this->Alert( "短消息发布成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=msg&msgfrom=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( "短消息发布失败！" );
												$this->HistoryGo( );
								}
				}

				public function ReplayDetail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								$this->Assign( "item", $R3db8f5c8bc );
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
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
								$Rac9b8532b8 = $R3db8f5c8bc['id'];
								if ( $R43491e0424 == 1 )
								{
												$Rac9b8532b8 = 0;
								}
								$this->Assign( "parentid", $Rac9b8532b8 );
								$this->Assign( "msg", $R3db8f5c8bc );
								$data = array(
												"page" => intval( request( "page" ) ),
												"parentid" => $R3584859062
								);
								$R4e420efcc3 = $this->hander->IMsg_Page( $data, false );
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

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
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
								$this->Alert( "删除成功！" );
								$this->HistoryGo( );
				}

				public function RemittanceDetail( )
				{
								$R3584859062 = intval( request( "id" ) );
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
								
								for ($Ra16d228039 = 0;	$Ra16d228039 < 24;	$Ra16d228039++	)
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

				public function RemittanceSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Re5576d8e05 = getvar( "year" )."-".getvar( "month" )."-".getvar( "day" )." ".getvar( "hour" ).":00";
								$R2ade2b5cf6 = getvar( "dollars1" );
								$R2e081715dc = getvar( "dollars2" );
								$R9b252bf0a7 = doubleval( $R2ade2b5cf6.".".$R2e081715dc );
								$R51c716b966 = $this->SetLang( 1 );
								$R06c518f70e = "(".$Re5576d8e05.")编号".$R2a51483b14."汇款".$R9b252bf0a7.$R51c716b966['moneyunit'];
								$R2c90a0c76d = getvar( "bank" );
								$R5204d30600 = htmlspecialchars( getvar( "others" ) );
								$R51c716b966 = $this->SetLang( 1 );
								$Re82ee9b121 = $R2c90a0c76d."\\n\\n汇款备注\\n".$R5204d30600."\\n\\n汇款金额：".$R51c716b966['moneysymbol'].$R9b252bf0a7.$R51c716b966['moneyunit']."\\n\\n汇款时间：".$Re5576d8e05;
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgto" => 0,
												"msgcc" => 0,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => $Re82ee9b121,
												"msgtype" => 2
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "汇款通知书发送成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=msg&msgtype=2&msgfrom=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( "汇款通知书发送失败！" );
												$this->HistoryGo( );
								}
				}

				public function Init( )
				{
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( );
								$R30b2ab8dc1['title'] = "用户管理中心";
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
				}

}

?>
