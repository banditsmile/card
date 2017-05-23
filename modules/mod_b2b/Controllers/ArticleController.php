<?php

/****************************************/

/*                                      */

/*  易卡网 http://www.ekakm.com      */

/*  本程序由易卡网络提供技术支持            */

/*  技术QQ：6021936481                  */

/*                                      */

/****************************************/



if ( !defined( "UPATH_ROOT" ) )

{

				exit( "hacking deny" );

}

class ArticleController extends Controller

{



				public $instance = NULL;



				public function __construct( )

				{

								$this->instance = factory::getinstance( "articles" );

								$this->SetAd( 100, 200 );

				}

public function Homext( )

				{

								$R52e179a46d = factory::getinstance( "board" );

								//echo "sdfsdf";

								$R32a7e0675a = intval( request( "boardid" ) );

								$name = "";

								global $masterid;

								$R220583696c = $masterid;

								if ( $R32a7e0675a == 0 )

								{

												$name = getvar( "name" );

												$R5cc00cfbe4 = $name == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

												if ( $R5cc00cfbe4 == 1 )

												{

																$masterid = 0;

												}

												$R0e100b085b = $R52e179a46d->IBoard_GetByName( $name );

												$R32a7e0675a = isset( $R0e100b085b['id'] ) ? $R0e100b085b['id'] : 0;

								}

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

								$R5cc00cfbe4 = $Rc907011f93 == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

								if ( $R5cc00cfbe4 == 1 )

								{

												$masterid = 0;

								}

								$R42c553e7de = intval( request( "nrows" ) );

								if ( $R42c553e7de <= 0 )

								{

												$R42c553e7de = 15;

								}

								$data = array(

												"page" => intval( request( "page" ) ),

												"boardid" => $R32a7e0675a,

												"nrows" => $R42c553e7de,

												"inrecycle" => 0

								);

								

								$R4e420efcc3 = $this->instance->IArticle_Page( $data );

								$this->FillPage( $data, $R4e420efcc3 );

								$this->SetArticle( );

								$this->Assign( "css", "ub-red-20080119" );

								$this->Assign( "board", $R0e100b085b );

								$masterid = $R220583696c;

								$this->B2BInit( $Rc907011f93."文章列表" );

								$this->Assign('stick', $this->instance->IArticle_GetAllStick());

								

								$this->view();

								

				}public function Homecj( )

				{

								$R52e179a46d = factory::getinstance( "board" );

								$R32a7e0675a = intval( request( "boardid" ) );

								$name = "";

								global $masterid;

								$R220583696c = $masterid;

								if ( $R32a7e0675a == 0 )

								{

												$name = getvar( "name" );

												$R5cc00cfbe4 = $name == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

												if ( $R5cc00cfbe4 == 1 )

												{

																$masterid = 0;

												}

												$R0e100b085b = $R52e179a46d->IBoard_GetByName( $name );

												$R32a7e0675a = isset( $R0e100b085b['id'] ) ? $R0e100b085b['id'] : 0;

								}

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

								$R5cc00cfbe4 = $Rc907011f93 == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

								if ( $R5cc00cfbe4 == 1 )

								{

												$masterid = 0;

								}

								$R42c553e7de = intval( request( "nrows" ) );

								if ( $R42c553e7de <= 0 )

								{

												$R42c553e7de = 15;

								}

								$data = array(

												"page" => intval( request( "page" ) ),

												"boardid" => $R32a7e0675a,

												"nrows" => $R42c553e7de,

												"inrecycle" => 0

								);

								$R4e420efcc3 = $this->instance->IArticle_Page( $data );

								$this->FillPage( $data, $R4e420efcc3 );

								$this->SetArticle( );

								$this->Assign( "css", "ub-red-20080119" );

								$this->Assign( "board", $R0e100b085b );

								$masterid = $R220583696c;

								$this->B2BInit( $Rc907011f93."文章列表" );

								$this->Assign('stick', $this->instance->IArticle_GetAllStick());

								$this->view();

				}

				public function Home( )

				{

								$R52e179a46d = factory::getinstance( "board" );

								$R32a7e0675a = intval( request( "boardid" ) );

								$name = "";

								global $masterid;

								$R220583696c = $masterid;

								if ( $R32a7e0675a == 0 )

								{

												$name = getvar( "name" );

												$R5cc00cfbe4 = $name == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

												if ( $R5cc00cfbe4 == 1 )

												{

																$masterid = 0;

												}

												$R0e100b085b = $R52e179a46d->IBoard_GetByName( $name );

												$R32a7e0675a = isset( $R0e100b085b['id'] ) ? $R0e100b085b['id'] : 0;

								}

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

								$R5cc00cfbe4 = $Rc907011f93 == "批发系统常见问题" || $name == "游戏官方地址" ? 1 : 0;

								if ( $R5cc00cfbe4 == 1 )

								{

												$masterid = 0;

								}

								$R42c553e7de = intval( request( "nrows" ) );

								if ( $R42c553e7de <= 0 )

								{

												$R42c553e7de = 15;

								}

								$data = array(

												"page" => intval( request( "page" ) ),

												"boardid" => $R32a7e0675a,

												"nrows" => $R42c553e7de,

												"inrecycle" => 0

								);

								$R4e420efcc3 = $this->instance->IArticle_Page( $data );

								$this->FillPage( $data, $R4e420efcc3 );

								$this->SetArticle( );

								$this->Assign( "css", "ub-red-20080119" );

								$this->Assign( "board", $R0e100b085b );

								$masterid = $R220583696c;

								$this->B2BInit( $Rc907011f93."文章列表" );

								$this->Assign('stick', $this->instance->IArticle_GetAllStick());

								$this->view();

				}



				public function Index( )

				{

								$data = array(

												"page" => intval( request( "page" ) )

								);

								$R4e420efcc3 = $this->instance->IArticle_Page( $data );

								$this->FillPage( $data, $R4e420efcc3 );

								$this->ArticleInit( "文章列表" );

							

												$this->view( );

							

				}



				public function Detail( $R755ba04a49 = 0, $R9906335164 = false, $R511aa10c02 = "article/tmp.html" )

				{

								$R3584859062 = intval( request( "id" ) );

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

								$this->Assign( "css", "ub-red-20080119" );

								$this->B2BInit( $R06c518f70e, $R0f8134fb60['meta_keywords'], $R0f8134fb60['meta_description'] );

								$this->SetArticle( );

							

												$this->View( null, null, $R9906335164, $R511aa10c02 );

							

				}



				public function SetArticle( )

				{

								require_once( SITECACHE."a.php" );

								require_once( UPATH_BASE.DS."libraries".DS."user".DS."homeconfig.b2b.php" );

								foreach ( $art as $R0f8134fb60 )

								{

												if ( $R0f8134fb60['f'] == 1 )

												{

																$this->Assign( $R0f8134fb60['vdname'], $$R0f8134fb60['vdname'] );

												}

								}

				}



				public function More( )

				{

								include( UPATH_BASE.DS."libraries".DS."user".DS."homeconfig.b2b.php" );

								$Rf6c76f0f72 = factory::getinstance( "articles" );

								foreach ( $art2 as $R0f8134fb60 )

								{

												$this->Assign( $R0f8134fb60['vdname'], $Rf6c76f0f72->IArticle_GetByName( $R0f8134fb60['boardname'], $R0f8134fb60['num'], "titlelink,title,id,titlecolor,ndate" ) );

								}

								$Oooo00 = "base64_decode";

								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );

								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );

								$cphp0 = __FILE__;

								eval( $o00OO( $ooOO00o( $this->comget( "oomre" ) ) ) );

								$this->Assign( "css", "ub-red-20080119" );

								$this->B2BInit( "更多链接", "银行链接,支付网关链接,官方链接,官方充值链接", "银行链接,支付网关链接,官方链接,官方充值链接" );

							

												$this->View( );

							

				}



				public function Kf( )

				{

								$this->Assign( "css", "ub-red-20080119" );

								$this->B2BInit( "更多联系方式" );

								$Oooo00 = "base64_decode";

								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );

								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );

								$cphp0 = __FILE__;

								eval( $o00OO( $ooOO00o( $this->comget( "fkkkf" ) ) ) );

				}



}



?>

