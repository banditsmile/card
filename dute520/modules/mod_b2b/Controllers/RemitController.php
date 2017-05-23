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
class RemitController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "msg" );
				}

				public function Index( )
				{
								$Rd41ed45824 = array( "<font color=\"#cccccc\">ȫ��</font>", "δ����", "<font color=\"#ff00ff\">������</font>", "<font color=\"#ff0000\">�Ѵ���</font>" );
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R21784dec6e = intval( request( "msgtype" ) );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R64bdee66ef = intval( request( "mstate", 0 ) );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 2,
												"msgstate" => $R64bdee66ef,
												"parentid" => 0,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "title" => "����", "msgfrom" => "����û�", "msgto" => "��������" );
								$R8dc7d3eb73 = array( "0" => "����ƽ̨", "1" => "����", "2" => "����", "3" => "һ��ͨ" );
								$R2a754db770 = array( "", "<font color=\"#ff0000\">δ����</font>", "<font color=\"#ff0000\">������</font>", "<font color=\"#0000ff\">�Ѵ���</font>" );
								$this->Assign( "mstate", $R2a754db770 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( getvar( "comefrom", 0 ) ) );
								$this->Recycle( "msg", " msgtype=2 " );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "tarray", $Rd41ed45824 );
								$this->Assign( "msgtype", $R21784dec6e );
								$this->Assign( "tmstate", $R64bdee66ef );
						
												$this->view( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
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
								$R808b89ba0e = $this->hander->IMsg_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->hander->IMsg_UpdateByStr( $data, $Rb7492a73f7 );
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
								$Ra3d21a857b = getvar( "msgfrom" );
								$R180beb7e65 = getvar( "msgto" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgtype" => 2,
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
												echo "ɾ��ʧ�ܣ�";
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
																echo "����ѡ����";
																exit( );
												}
												$Rb7492a73f7 = "id in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7." and msgtype=2 ";
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
												"msgtype" => 2,
												"parentid" => 0,
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"isreaded" => intval( request( "isreaded" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IMsg_DeleteByStr( $Rb7492a73f7, $data );
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
