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
class ReviewController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "reviews" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IReview_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "pid" => "��Ʒ���", "reviewer" => "������", "subject" => "����", "content" => "��������" );
								$this->Assign( "sarray", $R00be52aa45 );
					
												$this->view( );
					
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
						
												$this->Assign( "item", $this->instance->IReview_GetById( $R3584859062 ) );
												$this->View( );
						
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 == 0 )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$data = array(
												"content" => htmlspecialchars( getvar( "content" ) ),
												"subject" => getvar( "subject" ),
												"checked" => intval( request( "checked" ) )
								);
								$R63bede6b19 = "����";
								$R808b89ba0e = $this->instance->IReview_Update( $data, $R3584859062 );
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=Review&a=Detail&id=".$R3584859062 );
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
								$R808b89ba0e = $this->instance->IReview_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IReview_UpdateByStr( $data, $Rb7492a73f7 );
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
								$R808b89ba0e = $this->instance->IReview_DestroyByStr( $Rb7492a73f7, $data );
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
								$R808b89ba0e = $this->instance->IReview_DeleteByStr( $Rb7492a73f7, $data );
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
