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
class ArticleController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "articles" );
				}

				public function Index( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R32a7e0675a = intval( request( "boardid" ) );
								$data = array(
												"boardid" => $R32a7e0675a
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								
    $R36923cf626 = request('keywords');
    
  	$R929cf63f35 = DATACACHE.'article.php';
  		
  	if(file_exists($R929cf63f35)) 
  	{
  		include($R929cf63f35);
  	}
  	else
  	{
  		$R4c6d6471cd = 0;
  	}
  		
  	$R8cbf2f60f5 = intval(request('inrecycle'));	
  	if($R36923cf626 == '' && $R8cbf2f60f5 == 0 && $R32a7e0675a == 0)
  	{
  		$R71a6fd054f = intval(request('page'));
  		if($R71a6fd054f == 0) 
  		{
  			$R71a6fd054f = 1;
  		}
  		
  		$R09a3346376 = BCKCACHE.DS.'article'.DS.'art_'.$R71a6fd054f.'.php';
  		
  		if(!file_exists($R09a3346376) || $R4c6d6471cd > filemtime($R09a3346376))
  		{
  			$R4e420efcc3 = $this->instance->IArticle_Page($data);
  			$Rf5f11a8d38 = count($R4e420efcc3['item']);
  			
  			for($Ra16d228039 = 0; $Ra16d228039 < $Rf5f11a8d38; $Ra16d228039++)
  			{
  				$R4e420efcc3['item'][$Ra16d228039]['content'] = '';
  			}
  			$R63bede6b19 = '$R4e420efcc3=unserialize(gzinflate(base64_decode(\''.base64_encode(gzdeflate(serialize($R4e420efcc3))).'\')))';
  			$Re82ee9b121 = '<?php '.chr(10).$R63bede6b19.';'.chr(10).'?>';
  	    file_put_contents($R09a3346376, $Re82ee9b121);
  		}

  		include($R09a3346376);
  	}
  	else
  	{
      $R4e420efcc3 = $this->instance->IArticle_Page($data);
    }
    $this->FillPage($data, $R4e420efcc3);
    
    $R09a3346376 = BCKCACHE.DS.'article'.DS.'r.php';
    if(!file_exists($R09a3346376) || $R4c6d6471cd > filemtime($R09a3346376))
  	{
  		$Rd1e9e1cb5b = factory::GetInstance('recycle');
  		$Rb749275e94   = $Rd1e9e1cb5b->IRecycle('articles', '');
  		$R63bede6b19 = '$Rb749275e94='.$Rb749275e94;
  		$Re82ee9b121 = '<?php '.chr(10).$R63bede6b19.';'.chr(10).'?>';
  	  file_put_contents($R09a3346376, $Re82ee9b121);
  	}
  	
  	include($R09a3346376);
  	
    $this->Assign('recycle_num', $Rb749275e94);
    
    
								$R00be52aa45 = array( "title" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
						
												$this->view( );
						
				}

				public function Add( )
				{
								$this->SetWebInfo( );
								$R52e179a46d = factory::getinstance( "board" );
								 $this->Assign('boards',  $R52e179a46d->IBoard_GetAll());
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$this->SetWebInfo( );
								$R3584859062 = intval( request( "id" ) );
								
    $R52e179a46d = factory::GetInstance('board');
    $this->Assign('boards', $R52e179a46d->IBoard_GetAll());
							
												$this->Assign( "item", $this->instance->IArticle_GetById( $R3584859062 ) );
												$this->View( );
							
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R63bede6b19 = $_REQUEST['nr'];
								$R63bede6b19 = str_replace( "'", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "*", "��", $R63bede6b19 );
								$R63bede6b19 = str_replace( "<", "&lt;", $R63bede6b19 );
								$R63bede6b19 = str_replace( ">", "&gt;", $R63bede6b19 );
								$GLOBALS['_REQUEST']['nr'] = str_replace( "\"", "��", $R63bede6b19 );
								$data = array(
												"title" => getvar( "title", "" ),
												"pid" => intval( request( "pid" ) ),
												"content" => getvar( "nr" ),
												"boardid" => intval( request( "boardid" ) ),
												"stick" => intval( request( "stick" ) ),
												"hidden" => intval( request( "hidden" ) ),
												"titlecolor" => getvar( "titlecolor", "" ),
												"titlelink" => getvar( "titlelink", "" ),
												"webtitle" => getvar( "webtitle", "" ),
												"meta_keywords" => getvar( "meta_keywords", "" ),
												"meta_description" => getvar( "meta_description", "" ),
												"ndate" => date( "Y-m-d H:i:s" )
								);
								if ( $R3584859062 == 0 )
								{
												$data['tick'] = 0;
												$R3584859062 = $this->instance->IArticle_Create( $data );
												$this->Alert( "��ӳɹ���" );
								}
								else
								{
												$this->instance->IArticle_Update( $data, $R3584859062 );
												$this->Alert( "���³ɹ���" );
								}
								    $this->UpdateCache('articles');
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Article&a=Html&id=".$R3584859062 );
				}

				public function Del( )
				{
								$R3584859062 = $this->GetId( "id" );
								$this->instance->IArticle_Delete( $R3584859062 );
								$this->View( "index" );
								$this->Alert( "ɾ���ɹ���" );
				}

				public function Html( )
				{
							
												$R3584859062 = intval( request( "id" ) );
												$this->Assign( "id", $R3584859062 );
												$this->View( );
							
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
								$R808b89ba0e = $this->instance->IArticle_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "articles" );
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
								$R808b89ba0e = $this->instance->IArticle_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "articles" );
												echo "";
								}
								else
								{
												echo "��¼��ԭʧ�ܣ�";
								}
				}

				public function DestroyItems( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"boardid" => intval( request( "boardid" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IArticle_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "articles" );
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
												$Rb7492a73f7 = " id > 161 ";
								}
								else
								{
												$Rb7492a73f7 .= " and id > 161 ";
								}
								return $Rb7492a73f7;
				}

				public function DelItems( )
				{
								$R15a0359c8c = getvar( "stype", "cname" );
								$R8cbf2f60f5 = intval( request( "inrecycle" ) );
								$R7965cb3798 = getvar( "keywords" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"boardid" => intval( getvar( "boardid" ) )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IArticle_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												$this->UpdateCache( "articles" );
												echo "";
								}
				}

}

?>
