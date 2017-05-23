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
class AreaController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "gamearea" );
				}

				public function Index( )
				{
								$R49bbbc2f6a = intval( request( "id" ) );
								$R69f05bd302 = getvar( "game", "" );
								if ( $R49bbbc2f6a == 0 )
								{
												$this->Alert( "����û����������ģ�壡�������úú���ѡ��" );
												$this->HistoryGo( );
								}
								if ( $R69f05bd302 == "" )
								{
												$Rff7f66b1b3 = factory::getinstance( "game" );
												$R8720f964bc = $Rff7f66b1b3->IGame_GetById( $R49bbbc2f6a );
												$R69f05bd302 = $R8720f964bc['name'];
								}
								$table = 0;
								$R4fec707bc7 = intval( request( "istable" ) );
								if ( $R4fec707bc7 == 1 )
								{
												header( "Content-type: text/html;charset=utf-8" );
												$table = 1;
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "vewee" ) ) ) );
								$R511b772072 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['parentid'] == 0 )
												{
																$R511b772072[] = $R0f8134fb60;
												}
								}
								$this->Assign( "gameid", $R49bbbc2f6a );
								$this->Assign( "game", $R69f05bd302 );
								$this->Assign( "area", $R511b772072 );
								$this->Assign( "items", $R3db8f5c8bc );
								$this->Assign( "table", $table );
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$R69f05bd302 = getvar( "game", "" );
								$R3584859062 = intval( request( "id" ) );
								$R0f8134fb60 = $this->instance->IGameArea_GetById( $R3584859062 );
								$data = array(
												"parentid" => 0,
												"gameid" => $R0f8134fb60['gameid']
								);
								$R511b772072 = $this->instance->IGameArea_Get( $data );
								if ( trim( $R69f05bd302 ) == "" )
								{
												$Rff7f66b1b3 = factory::getinstance( "game" );
												$R8720f964bc = $Rff7f66b1b3->IGame_GetById( $R0f8134fb60['gameid'] );
												$R69f05bd302 = $R8720f964bc['name'];
								}
							
												$this->Assign( "item", $R0f8134fb60 );
												$this->Assign( "area", $R511b772072 );
												$this->Assign( "game", $R69f05bd302 );
												$this->View( );
							
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
								$R808b89ba0e = $this->instance->IGameArea_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IGameArea_UpdateByStr( $data, $Rb7492a73f7 );
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
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"gameid" => intval( request( "gameid" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IGameArea_DestroyByStr( $Rb7492a73f7, $data );
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
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"gameid" => intval( request( "gameid" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IGameArea_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												echo "";
								}
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R49bbbc2f6a = intval( request( "gameid" ) );
								$R69f05bd302 = request( "game" );
								$name = getvar( "name", "" );
								$R124c4e44f6 = intval( request( "oldparentid" ) );
								if ( trim( $name ) == "" )
								{
												$this->Alert( "���Ʋ���Ϊ�գ�" );
												$this->HistoryGo( );
								}
								if ( 0 < $R3584859062 && $R124c4e44f6 == 0 && 0 < $Rac9b8532b8 )
								{
												$data = array(
																"parentid" => $R3584859062
												);
												$Re95f9154b7 = $this->instance->IGameArea_Get( $data );
												if ( 0 < count( $Re95f9154b7 ) )
												{
																$this->Alert( "Ŀǰ���õ�����з�����������ɾ�������µķ������ٰ���ת������һ�������£�" );
																$this->HistoryGo( );
												}
								}
								$data = array(
												"name" => $name,
												"parentid" => $Rac9b8532b8,
												"gameid" => $R49bbbc2f6a
								);
								if ( $R3584859062 == 0 )
								{
												$R808b89ba0e = $this->instance->IGameArea_Create( $data );
												$R63bede6b19 = "���";
								}
								else
								{
												$R808b89ba0e = $this->instance->IGameArea_Update( $data, $R3584859062 );
												$R63bede6b19 = "�༭";
								}
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ���", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=area&id=".$R49bbbc2f6a."&game=".$R69f05bd302 );
				}

}

?>
