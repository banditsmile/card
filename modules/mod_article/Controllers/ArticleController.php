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
class HomeController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "articles" );
				}

				public function Home( )
				{
								$R52e179a46d = factory::getinstance( "board" );
								$R32a7e0675a = intval( getvar( "boardid" ) );
								$name = "";
								if ( $R32a7e0675a == 0 )
								{
												$name = getvar( "name" );
												$R0e100b085b = $R52e179a46d->IBoard_GetByName( $name );
												$R32a7e0675a = isset( $R0e100b085b['id'] ) ? $R0e100b085b['id'] : 0;
								}
								$data = array(
												"page" => intval( getvar( "page" ) ),
												"boardid" => $R32a7e0675a
								);
								$R4e420efcc3 = $this->instance->IArticle_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->SetArticle( );
								if ( $name == "" )
								{
												$R0e100b085b = $R52e179a46d->IBoard_GetById( $R32a7e0675a );
								}
								if ( !isset( $R0e100b085b['name'] ) )
								{
												$Rc907011f93 = "";
								}
								else
								{
												$Rc907011f93 = $R0e100b085b['name'];
								}
								$this->Assign( "board", $R0e100b085b );
								$this->ArticleInit( $Rc907011f93."文章列表" );
								$this->Assign( "stick", $this->instance->IArticle_GetAllStick( ) );
						
												$this->view( );
								
				}

				public function Index( )
				{
								$data = array(
												"page" => intval( getvar( "page" ) )
								);
								$R4e420efcc3 = $this->instance->IArticle_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->ArticleInit( "文章列表" );
							
								
												$this->view( );
								
				}

				public function Detail( $R755ba04a49 = 0, $R9906335164 = false, $R511aa10c02 = "article/tmp.html" )
				{
								$R3584859062 = intval( getvar( "id" ) );
								if ( $R3584859062 == 0 )
								{
												$R3584859062 = $R755ba04a49;
								}
								$R52e179a46d = factory::getinstance( "board" );
								include_once( UPATH_HELPER."ArticleHelper.php" );
								$R0f8134fb60 = $this->instance->IArticle_GetById( $R3584859062 );
								$this->Assign( "boards", $R52e179a46d->IBoard_GetAll( ) );
								$R0e100b085b = $R52e179a46d->IBoard_GetById( $R0f8134fb60['boardid'] );
								$this->Assign( "board", $R0e100b085b );
								$this->Assign( "boardarticle", $this->instance->IArticle_GetByName( $R0e100b085b['name'] ) );
								$this->Assign( "item", $R0f8134fb60 );
								if ( $R0f8134fb60['webtitle'] == "" )
								{
												$R06c518f70e = $R0f8134fb60['title'];
								}
								else
								{
												$R06c518f70e = $R0f8134fb60['webtitle'];
								}
								$this->ArticleInit( $R06c518f70e, $R0f8134fb60['meta_keywords'], $R0f8134fb60['meta_description'] );
							
												$this->SetArticle( );
												$this->View( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function SetArticle( )
				{
								$Rf6c76f0f72 = factory::getinstance( "articles" );
								$this->Assign( "ann", $Rf6c76f0f72->IArticle_GetByName( "批发系统公告" ) );
								$this->Assign( "goods", $Rf6c76f0f72->IArticle_GetByName( "看看别人都买了什么" ) );
								$this->Assign( "help", $Rf6c76f0f72->IArticle_GetByName( "批发系统帮助信息", 20 ) );
								$this->Assign( "faq", $Rf6c76f0f72->IArticle_GetByName( "批发系统常见问题", 20 ) );
								$this->Assign( "agent", $Rf6c76f0f72->IArticle_GetByName( "批发系统代理商信息" ) );
								$this->Assign( "game", $Rf6c76f0f72->IArticle_GetByName( "批发系统行业信息" ) );
								$this->Assign( "activity", $Rf6c76f0f72->IArticle_GetByName( "批发系统活动信息" ) );
								$this->Assign( "cooperation", $Rf6c76f0f72->IArticle_GetByName( "批发系统商务合作信息" ) );
				}

				public function Init( $R06c518f70e = "", $R6f1ea44ace = "", $Rabdaa08a2d = "" )
				{
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( );
								if ( $R06c518f70e != "" )
								{
												$R30b2ab8dc1['title'] = $R06c518f70e;
								}
								if ( $R6f1ea44ace != "" )
								{
												$R30b2ab8dc1['keywords'] = $R6f1ea44ace;
								}
								if ( $Rabdaa08a2d != "" )
								{
												$R30b2ab8dc1['description'] = $Rabdaa08a2d;
								}
								$this->Assign( "root", UPATH_WEBROOT );
								$this->Assign( "content", UPATH_CONTENT );
								$this->Assign( "web", $R30b2ab8dc1 );
								$R58765afcb5 = factory::getinstance( "ad" );
								$this->Assign( "banner", $R58765afcb5->IAd_Get( 6 ) );
				}

}

?>
