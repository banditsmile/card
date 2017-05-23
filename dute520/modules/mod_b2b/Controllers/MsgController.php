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

				public $service = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "smsg" );
								$this->action = array( "msglist", "msgdel", "msgdetail", "msgadd", "msgnewrows" );
				}

				public function Create( )
				{
								$Raccfd28028 = getvar( "ubzmfrom", "������Է��̻��ı��" );
								$Rdcd9105806 = getvar( "ordno" );
								$Rcfe474ce78 = intval( request( "mtype" ) );
								if ( $Rdcd9105806 != "" )
								{
												$data = array(
																"ubzordno" => $Rdcd9105806
												);
												$Rbf38ef6cc6 = factory::getservice( "sorders" );
												$R3db8f5c8bc = $Rbf38ef6cc6->IOrder_Get( $data );
												if ( isset( $R3db8f5c8bc['errcode'] ) && $R3db8f5c8bc['errcode'] == "2" )
												{
																$this->Alert( "���ã���������ϵͳ�ϱ���δ���ִ˶������޷��򹩻���Ͷ��\\n\\n���ܴ˶�����δ����������Ϊ������������в�֤" );
																$this->HistoryGo( );
												}
												if ( isset( $R3db8f5c8bc['errcode'] ) && $R3db8f5c8bc['errcode'] == "1" )
												{
																$this->Alert( $R3db8f5c8bc['errcontent'] );
												}
												if ( $R3db8f5c8bc['item']['uid'] == $R3db8f5c8bc['item']['ubzuid'] )
												{
																$this->Alert( "�����Լ����Լ������ţ�" );
																$this->HistoryGo( );
												}
												$Raccfd28028 = $R3db8f5c8bc['item']['uid'];
								}
								$R5f1f0bee3a = getvar( "ubzmtitle" );
								$Rd41ed45824 = array( "1" => "��ͨ����", "3" => "Ͷ�߶���" );
								$R60d44bd111 = array( "��������", "�Ῠǰ����ֵ", "���Ż��������", "��ֵ�ɹ�δ����", "�Ῠ�󱻳�ֵ", "���ἴ�þ���", "ʵ�ʳ�ֵ����Ʒ˵������" );
								$R76e9854dc9 = array( "����", "����", "����", "��Ǯ" );
								$this->Assign( "tarray", $Rd41ed45824 );
								$this->Assign( "carray", $R60d44bd111 );
								$this->Assign( "hope", $R76e9854dc9 );
								$this->Assign( "mtype", $Rd41ed45824 );
								$this->Assign( "msgtype", $Rcfe474ce78 );
								$this->Assign( "ordno", $Rdcd9105806 );
								$this->Assign( "ubzmto", $Raccfd28028 );
								$this->Assign( "ubzmtitle", $R5f1f0bee3a );
								$this->Assign( "frm", intval( request( "frm" ) ) );
							
												$this->View( );
							
				}

				public function Index( )
				{
								$R42c553e7de = intval( request( "nrows", 15 ) );
								if ( 100 < $R42c553e7de )
								{
												$R42c553e7de = 100;
								}
								$R36130a8639 = getvar( "optype", "r" );
								$R7965cb3798 = getvar( "keywords", "" );
								if ( $R7965cb3798 == "����" )
								{
												$R7965cb3798 = "";
								}
								$data = array(
												"page" => intval( request( "page", 1 ) ),
												"nrows" => $R42c553e7de,
												"itemcount" => $R42c553e7de,
												"keywords" => urlencode( $R7965cb3798 ),
												"optype" => getvar( "optype", "r" ),
												"msgfrom" => intval( request( "msgfrom" ) ),
												"mtype" => intval( request( "mtype" ) ),
												"msgto" => intval( request( "msgto" ) ),
												"ubzisreaded" => intval( request( "ubzisreaded", 1 ) ),
												"action" => $this->action[0]
								);
								$this->FillPage( $data, $this->service->IMsg_Page( $data ) );
								$this->Assign( "optype", $R36130a8639 );
								$Rd41ed45824 = array( "<font color=\"#cccccc\">ȫ��</font>", "��ͨ����", "<font color=\"#ff00ff\">ϵͳ����</font>", "<font color=\"#ff0000\">Ͷ�߶���</font>", "<font color=\"#ff0000\">���۶���</font>", "<font color=\"#ff0000\">������</font>" );
								$this->Assign( "tarray", $Rd41ed45824 );
							
												$this->view( );
							
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function Del( )
				{
								$data = array(
												"ubzmid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[1]
								);
								$this->service->IMsg_Save( $data );
								$this->Alert( "ɾ���ɹ���" );
								$this->view( "Index" );
				}

				public function Detail( )
				{
								$Rd41ed45824 = array( "<font color=\"#cccccc\">ȫ��</font>", "��ͨ����", "<font color=\"#ff00ff\">ϵͳ����</font>", "<font color=\"#ff0000\">Ͷ�߶���</font>", "<font color=\"#ff0000\">���۶���</font>", "<font color=\"#ff0000\">������</font>" );
								$this->Assign( "tarray", $Rd41ed45824 );
								$data = array(
												"ubzmid" => intval( getvar( "ubzid" ) ),
												"action" => $this->action[2]
								);
								$R0f8134fb60 = $this->service->IMsg_Get( $data );
								$R36130a8639 = getvar( "optype", "r" );
								$Rb88351029f = 0;
								if ( $R36130a8639 == "s" )
								{
												$Rb88351029f = $R0f8134fb60['item']['ubzmto'];
								}
								else
								{
												$Rb88351029f = $R0f8134fb60['item']['ubzmfrom'];
								}
								$this->Assign( "item", $R0f8134fb60 );
								$this->Assign( "optype", $R36130a8639 );
								$this->Assign( "mto", $Rb88351029f );
						
												$this->view( );
						
				}

				public function Save( )
				{
								$data = array(
												"ubzmtitle" => urlencode( getvar( "ubzmtitle", "" ) ),
												"ubzmto" => urlencode( getvar( "ubzmto", "" ) ),
												"ubzmcontent" => urlencode( getvar( "ubzmcontent", "" ) ),
												"other" => urlencode( getvar( "other", "" ) ),
												"parentid" => intval( request( "parentid" ) ),
												"mtype" => intval( request( "mtype", "1" ) ),
												"hope" => getvar( "hope" ),
												"ordno" => getvar( "ordno" ),
												"action" => $this->action[3]
								);
								$R3db8f5c8bc = $this->service->IMsg_Save( $data );
								if ( !isset( $R3db8f5c8bc['errcode'] ) )
								{
												$this->Alert( "����ʧ�ܣ���ϵͳͨ��ʧ�ܣ������·���" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['errcode'] == "0" )
								{
												$this->Alert( "���ͳɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Msg&optype=s&ubzisreaded=2" );
								}
								else
								{
												$this->Alert( "����ʧ�ܣ�".$R3db8f5c8bc['content'] );
												$this->HistoryGo( );
								}
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=utf-8" );
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
												echo "��������";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "utf-8//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->instance->ICatalog_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->instance->ICatalog_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "��¼��ԭʧ�ܣ�";
								}
				}

				public function DestroyItems( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array(
												"action" => $this->action[1]
								);
								$data += $Rb7492a73f7;
								$R808b89ba0e = $this->service->IMsg_Save( $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "ɾ��ʧ�ܣ�";
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
												"ubzmid" => $R3456919727
								);
								return $R026f0167b4;
				}

				public function DelItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->ICatalog_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												echo "";
								}
				}

}

?>
