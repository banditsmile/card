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
class ScoredProductController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "scoredproduct" );
				}

				public function Index( )
				{
								$R6d10b7ab80 = array( "", "ʵ��һ�", "�һ���Ǯ", "�һ���Ʒ" );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IScoredProduct_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "method", $R6d10b7ab80 );
					
												$this->View( );
					
				}

				public function Create( )
				{
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3db8f5c8bc = $this->hander->IScoredProduct_Get( $R8e8b5578f7 );
								$this->Assign( "item", $R3db8f5c8bc );
								$this->SetWebInfo( );
							
												$this->View( );
							
				}

				public function Save( )
				{
								$R65edce27dd = getvar( "pname" );
								$R88f9731c8f = intval( request( "scored" ) );
								$R1d06ae92a6 = intval( request( "scoredb2c" ) );
								$Rff50ed0063 = intval( request( "scoredykt" ) );
								$R63bede6b19 = $_REQUEST['pdesc'];
								$R63bede6b19 = str_replace( "'", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "*", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "<", "&lt", $R63bede6b19 );
								$R63bede6b19 = str_replace( ">", "&gt", $R63bede6b19 );
								$GLOBALS['_REQUEST']['pdesc'] = str_replace( "\"", "��", $R63bede6b19 );
								$R24ef1b765a = htmlspecialchars( getvar( "pdesc" ) );
								$R6ef86fd07c = intval( request( "stocks" ) );
								$R5a38c81ec2 = getvar( "unit" );
								$R6a39af2a2b = getvar( "ubzimage" );
								$R0f99e0d6c7 = intval( request( "method" ) );
								$R5b13dab0c4 = intval( request( "forb2b" ) );
								$R91cba7f84a = intval( request( "forb2c" ) );
								$R82983beece = intval( request( "forykt" ) );
								$param = intval( request( "param" ) );
								if ( $R0f99e0d6c7 == 3 && $param == 0 )
								{
												$this->Alert( "����������Ҫ�һ�����Ʒ�ı��\\n\\n��ſ���ͨ����̨-����Ʒ �����в�ѯ" );
												$this->HistoryGo( );
								}
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array(
												"pname" => $R65edce27dd,
												"scored" => $R88f9731c8f,
												"scoredb2c" => $R1d06ae92a6,
												"scoredykt" => $Rff50ed0063,
												"pdesc" => $R24ef1b765a,
												"stocks" => $R6ef86fd07c,
												"unit" => $R5a38c81ec2,
												"thumb" => $R6a39af2a2b,
												"method" => $R0f99e0d6c7,
												"forb2b" => $R5b13dab0c4,
												"forb2c" => $R91cba7f84a,
												"forykt" => $R82983beece,
												"editdate" => date( "Y-m-d H-i-s" ),
												"editby" => $_SESSION['adminname'],
												"editip" => $this->GetIp( ),
												"param" => $param
								);
								if ( $R8e8b5578f7 == 0 )
								{
												$R2a039ed8fd['createdate'] = date( "Y-m-d H-i-s" );
												$R2a039ed8fd['createby'] = $_SESSION['adminname'];
												$R2a039ed8fd['createip'] = $this->GetIp( );
												$R808b89ba0e = $this->hander->IScoredProduct_Create( $data );
												$R8e8b5578f7 = $R808b89ba0e;
								}
								else
								{
												$R808b89ba0e = $this->hander->IScoredProduct_Update( $data, $R8e8b5578f7 );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "�����ɹ�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=ScoredProduct" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
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
								$R808b89ba0e = $this->hander->IScoredProduct_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�";
								}
				}

				public function DestroyItems( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$Ra7e7c7ba21 = intval( request( "custom" ) );
								if ( getvar( "stype" ) == "name" )
								{
												$data = array(
																"custom" => $Ra7e7c7ba21
												);
								}
								else
								{
												$data = array(
																"parentid" => $Rac9b8532b8,
																"aid" => $R2a51483b14,
																"custom" => $Ra7e7c7ba21
												);
								}
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IScoredProduct_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "category" );
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
																$Rb7492a73f7 = "pid not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "����ѡ����";
																exit( );
												}
												$Rb7492a73f7 = "pid in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

}

?>
