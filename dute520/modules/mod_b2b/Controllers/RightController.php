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
class RightController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "buyrights" );
				}

				public function Create( )
				{
							
												$this->View( );
							
				}

				public function Right( )
				{
								$R5b92e56774 = getvar( "idx" );
								$param = getvar( "param" );
								$R321f3a96ea = intval( request( "isok" ) );
								if ( trim( $R5b92e56774 ) == "" )
								{
												$this->Alert( "������������ѡ��" );
												$this->HistoryGo( );
								}
								$data = array(
												"idx" => $R5b92e56774,
												"param" => $param,
												"isok" => $R321f3a96ea
								);
								$agent = array( );
								$R679e9b9234 = $this->instance->IBuyRights_Get( $data );
								$R63bede6b19 = " param='".$param."' and idx = '".$R5b92e56774."' and isok=".$R321f3a96ea;
								$R1807c1171a = $this->instance->IBuyRights_GetByStr( $R63bede6b19 );
								$R53dba466ee = array(
												"pids" => ",",
												"id" => 0,
												"isok" => $R321f3a96ea
								);
								if ( isset( $R1807c1171a[0]['pids'] ) )
								{
												$R53dba466ee = array(
																"pids" => $R1807c1171a[0]['pids'],
																"id" => $R1807c1171a[0]['id'],
																"isok" => $R321f3a96ea
												);
								}
								$Rd67d5099b6 = factory::getinstance( "products" );
								$R3db8f5c8bc = $Rd67d5099b6->IProduct_GetAll( );
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$Rb813fe0dc6 = implode( ",", $R026f0167b4 );
								if ( $Rb813fe0dc6 == "" )
								{
												$data['pids'] = ",";
								}
								else
								{
												$data['pids'] = ",".implode( ",", $R026f0167b4 ).",";
								}
								if ( $param == "aid" && 0 < intval( $R5b92e56774 ) )
								{
												$Rf3821f38da = factory::getinstance( "agents" );
												$agent = $Rf3821f38da->IAgent_Get( $R5b92e56774, "aid,aname" );
												$data['agent'] = $agent;
								}
								else if ( $param == "gid" && 0 < intval( $R5b92e56774 ) )
								{
												$Rf3821f38da = factory::getinstance( "ranks" );
												$R046b4585a2 = $Rf3821f38da->IRank_GetById( $R5b92e56774 );
												$data['rank'] = $R046b4585a2;
								}
								$R53dba466ee['pids'] = $data['pids'];
								$this->Assign( "products", $R3db8f5c8bc );
								$this->Assign( "rights", $R679e9b9234 );
								$this->Assign( "br", $R53dba466ee );
								$this->Assign( "data", $data );
							
												$this->View( );
							
				}

				public function Save( )
				{
								$R5b92e56774 = getvar( "idx" );
								$param = getvar( "param" );
								$R321f3a96ea = intval( request( "isok" ) );
								$R3584859062 = intval( request( "id" ) );
								$R3359c04a1b = getvar( "pids" );
								$R3359c04a1b = eregi_replace( "-1,", "", $R3359c04a1b );
								$data = array(
												"pids" => $R3359c04a1b
								);
								if ( $R3584859062 == 0 )
								{
												$data['idx'] = $R5b92e56774;
												$data['param'] = $param;
												$data['isok'] = $R321f3a96ea;
												$R808b89ba0e = $this->instance->IBuyRights_Create( $data );
								}
								else
								{
												$R63bede6b19 = " param='".$param."' and idx = '".$R5b92e56774."' and isok=".$R321f3a96ea;
												$R808b89ba0e = $this->instance->IBuyRights_UpdateByStr( $data, $R63bede6b19 );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "�����ɹ�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Right&a=Right&param=".$param."&idx=".$R5b92e56774."&isok=".$R321f3a96ea );
								}
								else
								{
												$this->Alert( "����ʧ��" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."CardHelper.php" );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IBuyRights_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "idx" => "����ֵ", "pids" => "��Ʒ���" );
								$Rc2d2567438 = array( "aid" => "�û����", "alv" => "�û����ڼ���", "gid" => "�û�������", "yktprice" => "һ��ͨ��ֵ", "yktgroup" => "һ��ͨ����", "yktid" => "һ��ͨ���", "yktcode" => "һ��ͨ������" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "params", $Rc2d2567438 );
						
												$this->view( );
						
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
								$R808b89ba0e = $this->instance->IBuyRights_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IBuyRights_UpdateByStr( $data, $Rb7492a73f7 );
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
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IBuyRights_DestroyByStr( $Rb7492a73f7, $data );
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
								return $Rb7492a73f7;
				}

				public function DelItems( )
				{
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IBuyRights_DeleteByStr( $Rb7492a73f7, $data );
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
