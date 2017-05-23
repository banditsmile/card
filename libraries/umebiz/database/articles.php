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
class articles extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IArticle_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "articles", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", true, "id" );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "title" )
												),
												array(
																"op" => "intequal",
																"var" => array( "inrecycle" )
												),
												array(
																"op" => "intequal",
																"var" => array( "boardid", "aid" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['boardid'] ) && $data['boardid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."boardid=".intval( $data['boardid'] );
								}
								global $masterid;
								$R026f0167b4[] = " ".$R1de95f080d."aid=".$masterid;
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IArticle_GetById( $R3584859062, $R9afaabccd6 = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "articles", $R9afaabccd6 );
								return $R3db8f5c8bc[0];
				}

				public function &IArticle_GetId( )
				{
								global $masterid;
								$this->add( "aid", $masterid );
								$R130d64a4ad = "select id from ".$this->dbprefix."articles where aid=".$masterid." or aid=0";
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IArticle_Get( $num = 8, $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								global $masterid;
								$this->add( "aid", $masterid );
								return $this->SelectRecord( "articles" );
				}

				public function &IArticle_GetByName( $name, $Ra1d44c0654 = 8, $Rb0d5d47f3d = "*" )
				{
								$R32a7e0675a = $this->IArticle_GetBoardIdByName( $name );
								global $masterid;
								$R5cc00cfbe4 = $name == "批发系统常见问题" || $name == "游戏官方地址" || $name == "银行网址导航" || $name == "官方卡查询地址" ? 1 : 0;
								if ( 0 < $masterid && $R5cc00cfbe4 == 1 )
								{
												if ( $name == "批发系统常见问题" )
												{
																$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."articles where inrecycle<1 and boardid=".$R32a7e0675a." and aid=".$masterid." order by stick desc,id desc limit 0,".$Ra1d44c0654;
												}
												else
												{
																$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."articles where inrecycle<1 and boardid=".$R32a7e0675a." order by stick desc,id desc limit 0,".$Ra1d44c0654;
												}
								}
								else
								{
												$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."articles where inrecycle<1 and boardid=".$R32a7e0675a." and aid=".$masterid." order by stick desc,id desc limit 0,".$Ra1d44c0654;
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IArticle_GetAllStick( $Ra1d44c0654 = 8, $Rb0d5d47f3d = "*" )
				{
								global $masterid;
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."articles where aid=".$masterid." and stick=1 order by stick desc,id desc limit 0,".$Ra1d44c0654;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IArticle_GetAnns( $num = 8, $R9afaabccd6 = "*", $Rbf2169e849 = "" )
				{
								$R32a7e0675a = $this->IArticle_GetBoardIdByName( "新闻公告" );
								$this->reset( );
								$this->add( "boardid", $R32a7e0675a );
								return $this->SelectRecord( "articles", $R9afaabccd6, " order by stick desc,id desc" );
				}

				public function &IArticle_GetHelps( $num = 8, $R9afaabccd6 = "*", $Rbf2169e849 = "" )
				{
								$R32a7e0675a = $this->IArticle_GetBoardIdByName( "新手帮助" );
								$this->reset( );
								$this->add( "boardid", $R32a7e0675a );
								return $this->SelectRecord( "articles", $R9afaabccd6 );
				}

				public function &IArticle_GetFaqs( $num = 8, $R9afaabccd6 = "*", $Rbf2169e849 = "" )
				{
								$R32a7e0675a = $this->IArticle_GetBoardIdByName( "常见问题" );
								$this->reset( );
								$this->add( "boardid", $R32a7e0675a );
								return $this->SelectRecord( "articles", $R9afaabccd6 );
				}

				public function IArticle_GetBoardIdByName( $name )
				{
								$this->reset( );
								$this->add( "name", $name );
								$R679e9b9234 = $this->SelectRecord( "boards" );
								if ( 0 < count( $R679e9b9234 ) )
								{
												return $R679e9b9234[0]['id'];
								}
								else
								{
												return 0;
								}
				}

				public function IArticle_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R808b89ba0e = $this->InsertRecord( "articles" );
								if ( $R808b89ba0e )
								{
												$R3db8f5c8bc = $this->SelectRecord( "articles", "id" );
												return $R3db8f5c8bc[0]['id'];
								}
								else
								{
												return 0;
								}
				}

				public function IArticle_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "articles", "id = ".$R3584859062 );
				}

				public function IArticle_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "articles", "id in (".$R3584859062.")" );
				}

				public function IArticle_DeleteByStr( $R63bede6b19, $data = array( ) )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "articles", $R172196908b );
				}

				public function IArticle_UpdateByStr( $R0efad35c72 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R0efad35c72 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "articles", $R63bede6b19 );
				}

				public function IArticle_Destroy( $R3584859062 )
				{
								global $masterid;
								return $this->DeleteRecord( "articles", " aid=".$masterid." and id in (".$R3584859062.")" );
				}

				public function IArticle_DestroyByStr( $R63bede6b19, $data = array( ) )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								global $masterid;
								$R172196908b = $R172196908b." and aid=".$masterid;
								return $this->DeleteRecord( "articles", $R172196908b );
				}

}

?>
