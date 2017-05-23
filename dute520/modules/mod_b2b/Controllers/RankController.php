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
class RankController extends Controller
{

				public $hander = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "ranks" );
								$this->action = array( "custlist", "custdel", "custdetail", "custedit", "custlvup", "regsave", "membermodify", "memberpassedit" );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$Rc869a7c438 = factory::getinstance( "groups" );
								$R3db8f5c8bc = $Rc869a7c438->IGroup_Get( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IRank_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R136f072284 = intval( request( "isselect", "" ) );
								$this->Assign( "isselect", $R136f072284 );
								$Rd667572ef6 = intval( request( "b2c" ) );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $Rd667572ef6 == 1 )
												{
																if ( $R0f8134fb60['gid'] == 0 )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												else if ( 0 < $R0f8134fb60['gid'] )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
								}
								$Ra305322b39 = ( UB_YKT ? "һ��ͨ" : "" ).( UB_B2C + UB_YKT == 2 ? "/" : "" ).( UB_B2C ? "����" : "" );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "nakks" ) ) ) );
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R413a5bdd03 = doubleval( request( "discount" ) );
								if ( 1 < $R413a5bdd03 )
								{
												$this->Alert( "�������ۼ۸������ֵ��!" );
												$this->HistoryGo( );
								}
								$R6009e84434 = getvar( "name" );
								if ( strpos( $R6009e84434, "|" ) !== false )
								{
												$this->Alert( "�������Ʋ�������������ţ�����������" );
												$this->HistoryGo( );
								}
								$R72852f08e6 = doubleval( request( "money" ) );
								if ( 100000000 < $R72852f08e6 )
								{
												$this->Alert( "����������Ҫ����100000000��" );
												$this->HistoryGo( );
								}
								$data = array(
												"name" => $R6009e84434,
												"rank" => intval( request( "rank" ) ),
												"money" => $R72852f08e6,
												"isdefault" => intval( request( "isdefault" ) ),
												"gid" => intval( request( "gid" ) ),
												"discount" => $R413a5bdd03
								);
								if ( 0 < $R3584859062 )
								{
												$R63bede6b19 = "����";
												$R808b89ba0e = $this->hander->IRank_Update( $data, $R3584859062 );
								}
								else
								{
												$R3584859062 = $this->hander->IRank_GetMaxId( );
												if ( $R3584859062 == -1 )
												{
																$R3584859062 = 1;
												}
												else
												{
																$R3584859062 += 1;
												}
												$data['id'] = $R3584859062;
												$R63bede6b19 = "���";
												$R808b89ba0e = $this->hander->IRank_Create( $data );
												$this->hander->IRank_AddTableItem( $R3584859062 );
								}
								$this->UpdateCache( "ranks" );
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=rank" );
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 < 4 )
								{
												$this->Alert( "���ã�����ϵͳ���õĻ�������ɾ���ᵼ�³������ȷ�Ϸ���" );
												$this->HistoryGo( );
								}
								$Rab95a9b478 = $this->hander->IRank_GetIdBelow( $R3584859062 );
								$R808b89ba0e = $this->hander->IRank_Del( $R3584859062 );
								if ( $R808b89ba0e && -1 < $Rab95a9b478 )
								{
												$this->hander->IRank_DecreaseAgentRank( $Rab95a9b478, $R3584859062 );
								}
								$this->UpdateCache( "ranks" );
								$this->go( $R808b89ba0e, "ɾ���ɹ�", "ɾ��ʧ��", "index.php?m=mod_b2b&c=rank" );
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
								if ( strpos( $R244f38266c, "|" ) !== false )
								{
												echo "�޸�ʧ�ܣ���������������ţ�";
												exit( );
								}
								if ( $param == "money" && 100000000 < doubleval( $R244f38266c ) )
								{
												echo "����������Ҫ����100000000��";
												exit( );
								}
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->hander->IRank_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "ranks" );
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�";
								}
				}

				public function DelItems( )
				{
								$R3584859062 = intval( request( "chkinclude" ) );
								if ( $R3584859062 < 4 )
								{
												echo "���ã�����ϵͳ���õĻ�������ɾ���ᵼ�³���";
												exit( );
								}
								$R3db8f5c8bc = $this->hander->IRank_Get( );
								if ( count( $R3db8f5c8bc ) == 1 )
								{
												echo "���ã��������ռ����п��ܻᵼ��һЩδ֪����";
												exit( );
								}
								$Rab95a9b478 = $this->hander->IRank_GetIdBelow( $R3584859062 );
								$R808b89ba0e = $this->hander->IRank_Del( $R3584859062 );
								if ( $R808b89ba0e && -1 < $Rab95a9b478 )
								{
												$this->hander->IRank_DecreaseAgentRank( $Rab95a9b478, $R3584859062 );
												$this->hander->IRank_DecreaseCustomerRank( $Rab95a9b478, $R3584859062 );
								}
								$this->UpdateCache( "ranks" );
								echo "";
				}

}

?>
