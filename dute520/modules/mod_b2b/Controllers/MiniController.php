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
class MiniController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "mini" );
				}

				public function Home( )
				{
							
												$this->View( );
							
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IMini_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "name" => "�ı�" );
						
												$this->Assign( "sarray", $R00be52aa45 );
												$this->view( );
						
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
						
												$this->Assign( "item", $this->instance->IMini_GetById( $R3584859062 ) );
												$this->View( );
						
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$data = array(
												"name" => getvar( "name", "" ),
												"clstype" => intval( request( "clstype", 0 ) ),
												"cls" => getvar( "cls", "" ),
												"urltype" => intval( request( "urltype", 0 ) ),
												"url" => getvar( "urltxt", "" ),
												"isdefault" => intval( request( "isdefault", 0 ) ),
												"ordering" => intval( request( "ordering", 0 ) )
								);
								if ( $R3584859062 == 0 )
								{
												$this->instance->IMini_Create( $data );
												$this->Alert( "��ӳɹ���" );
								}
								else
								{
												$this->instance->IMini_Update( $data, $R3584859062 );
												$this->Alert( "���³ɹ���" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Mini" );
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
								$R808b89ba0e = $this->instance->IMini_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IMini_UpdateByStr( $data, $Rb7492a73f7 );
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
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IMini_DestroyByStr( $Rb7492a73f7, $data );
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
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IMini_DeleteByStr( $Rb7492a73f7, $data );
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
