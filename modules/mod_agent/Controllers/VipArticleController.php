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
class VipArticleController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "articles" );
								$this->CheckVip( );
				}

				public function CheckVip( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$this->Assign( "aid", $R2a51483b14 );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "vipshop", 0 );
								if ( !isset( $agent['vipshop'] ) || $agent['vipshop'] == 0 )
								{
												$this->Alert( "您未开通vip平台，无法进行此操作！" );
												$this->HistoryGo( );
								}
								global $masterid;
								if ( $masterid == 0 )
								{
												$this->Alert( "请登陆您的子站再此操作！" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"boardid" => intval( request( "boardid" ) ),
												"aid" => $R2a51483b14
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IArticle_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "title" => "主题" );
								$this->Recycle( "articles" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function Add( )
				{
								$this->SetWebInfo( );
								$R52e179a46d = factory::getinstance( "board" );
								$this->Assign( "boards", $R52e179a46d->IBoard_GetAll( ) );
					
												$this->View( );
					
				}

				public function Detail( )
				{
								$this->SetWebInfo( );
								$R3584859062 = intval( request( "id" ) );
								$R52e179a46d = factory::getinstance( "board" );
						
												$this->Assign( "boards", $R52e179a46d->IBoard_GetAll( ) );
												$this->Assign( "item", $this->hander->IArticle_GetById( $R3584859062 ) );
												$this->View( );
						
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( request( "id" ) );
								$R63bede6b19 = $_REQUEST['nr'];
								$R63bede6b19 = str_replace( "'", "“", $R63bede6b19 );
								$R63bede6b19 = str_replace( "*", "×", $R63bede6b19 );
								$R63bede6b19 = str_replace( "<", "&lt;", $R63bede6b19 );
								$R63bede6b19 = str_replace( ">", "&gt;", $R63bede6b19 );
								$GLOBALS['_REQUEST']['nr'] = str_replace( "\"", "“", $R63bede6b19 );
								$data = array(
												"title" => getvar( "title", "" ),
												"pid" => intval( request( "pid" ) ),
												"content" => htmlspecialchars( getvar( "nr" ) ),
												"boardid" => intval( request( "boardid" ) ),
												"stick" => intval( request( "stick" ) ),
												"hidden" => intval( request( "hidden" ) ),
												"titlecolor" => getvar( "titlecolor", "" ),
												"titlelink" => getvar( "titlelink", "" ),
												"webtitle" => getvar( "title", "" ),
												"meta_keywords" => getvar( "title", "" ),
												"meta_description" => getvar( "title", "" ),
												"aid" => $R2a51483b14
								);
								if ( $R3584859062 == 0 )
								{
												$data['tick'] = 0;
												$data['ndate'] = date( "Y-m-d   H:i:s" );
												$R3584859062 = $this->hander->IArticle_Create( $data );
												$this->Alert( "添加成功！" );
								}
								else
								{
												$R0f8134fb60 = $this->hander->IArticle_GetById( $R3584859062 );
												if ( !isset( $R0f8134fb60['id'] ) )
												{
																$this->Alert( "文章已经被删除！" );
																$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
												}
												if ( $R0f8134fb60['aid'] != $R2a51483b14 )
												{
																$this->Alert( "您无权操作文章！" );
																$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
												}
												$this->hander->IArticle_Update( $data, $R3584859062 );
												$this->Alert( "更新成功！" );
								}
								$this->UpdateCache( "articles" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
				}

				public function Del( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = $this->GetId( "id" );
								$R0f8134fb60 = $this->hander->IArticle_GetById( $R3584859062 );
								if ( !isset( $R0f8134fb60['id'] ) )
								{
												$this->Alert( "文章已经被删除！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
								}
								if ( $R0f8134fb60['aid'] != $R2a51483b14 )
								{
												$this->Alert( "您无权操作文章！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
								}
								$this->hander->IArticle_Destroy( $R3584859062 );
								$this->UpdateCache( "articles" );
								$this->Alert( "删除成功！" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=VipArticle" );
				}

				public function Html( )
				{
								$R3584859062 = intval( request( "id" ) );
								$this->Assign( "id", $R3584859062 );
							
												$this->View( );
							
				}

}

?>
