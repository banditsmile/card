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
class ProductController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "products" );
				}

				public function Index( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R71a664ef8c = $this->PageInfo( );
								$R1b69c92460 = getvar( "ptype", "" );
								$data = array(
												"ptype" => $R1b69c92460,
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8
								);
								$data = array_merge( $data, $R71a664ef8c );
								if ( isset( $data['pids'] ) )
								{
												$data['pids'] = urldecode( $data['pids'] );
								}
								    $R36923cf626 = request('keywords');
    
  	$R929cf63f35 = DATACACHE.'product.php';
  		
  	if(file_exists($R929cf63f35)) 
  	{
  		include($R929cf63f35);
  	}
  	else
  	{
  		$R4c6d6471cd = 0;
  	}
  	
  	$R8cbf2f60f5 = intval(request('inrecycle'));	
  	/*
	if($R36923cf626 == '' && intval($Rd2e691562d) == 0 && $R8cbf2f60f5 == 0 && ($R1b69c92460 == '' || $R1b69c92460 == -1))
  	{
  		$R71a6fd054f = intval(request('page'));
  		if($R71a6fd054f == 0) 
  		{
  			$R71a6fd054f = 1;
  		}
 
  		//看看缓存是否存在
  		$R09a3346376 = BCKCACHE.DS.'product'.DS.'p_'.$Rfff462d8f8.'_'.$R71a6fd054f.'.php';
  		
  		if(!file_exists($R09a3346376) || $R4c6d6471cd > filemtime($R09a3346376))
  		{
  			$R4e420efcc3   = $this->hander->IProduct_Page($data, '*', 'pid');
  			
  			$Rf5f11a8d38 = count($R4e420efcc3['item']);
  			
  			for($Ra16d228039 = 0; $Ra16d228039 < $Rf5f11a8d38; $Ra16d228039++)
  			{
  				$R4e420efcc3['item'][$Ra16d228039]['pdesc'] = '';
  			}
  			
  			//写入文件
  			$R63bede6b19 = '$R4e420efcc3=unserialize(gzinflate(base64_decode(\''.base64_encode(gzdeflate(serialize($R4e420efcc3))).'\')))';
  			$Re82ee9b121 = '<?php '.chr(10).$R63bede6b19.';'.chr(10).'?>';
  	    file_put_contents($R09a3346376, $Re82ee9b121);
  		}
 
  		include($R09a3346376);
  	}
  	else
  	{*/
      $R4e420efcc3   = $this->hander->IProduct_Page($data, '*', 'pid');
    //}
    
    $R63bede6b19 = $Rfff462d8f8 == 1 ? 1 : 0;
    
    $R09a3346376 = BCKCACHE.DS.'product'.DS.'r_'.$R63bede6b19.'.php';
    if(!file_exists($R09a3346376) || $R4c6d6471cd > filemtime($R09a3346376))
  	{
  		$R63bede6b19 = $Rfff462d8f8 == 1 ? 'aid > 0' : 'aid < 1';
  		$Rd1e9e1cb5b = factory::GetInstance('recycle');
  		$Rb749275e94   = $Rd1e9e1cb5b->IRecycle('products', $R63bede6b19);
  		//写入文件
  		$R63bede6b19 = '$Rb749275e94='.$Rb749275e94;
  		$Re82ee9b121 = '<?php '.chr(10).$R63bede6b19.';'.chr(10).'?>';
  	  file_put_contents($R09a3346376, $Re82ee9b121);
  	}
  	
  	include($R09a3346376);
  	
    $this->Assign('recycle_num', $Rb749275e94);

								$this->FillPage( $data, $R4e420efcc3 );
								$R60d44bd111 = array( "pname" => "商品名称", "pids" => "商品编号" );
								if ( $Rfff462d8f8 == 1 )
								{
												$R60d44bd111['aid'] = "所属经销商";
								}
								$this->Assign( "carray", $R60d44bd111 );
								$this->Assign( "stype", request( "stype", "pname" ) );
								$R00be52aa45 = array( "0" => "卡密商品", "1" => "自动充值", "2" => "代充商品", "3" => "号码类" );
								if ( UB_YKT )
								{
												$R00be52aa45[] = "兑换类一卡通";
								}
								if ( UB_B2C || UB_B2B )
								{
												$R00be52aa45[] = "充值类一卡通";
								}
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
								
												$this->view( );
								
				}

				public function Price( $R3584859062 = 15 )
				{
								$R2a51483b14 = 0;
								$Rac9b8532b8 = 0;
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$R8e8b5578f7 = $R3584859062;
								}
								$R63d0786ecc = $this->hander->IProduct_GetPriceById( $R8e8b5578f7, $R2a51483b14 );
								$Ref41d9513d = $this->hander->IProduct_Get( $R8e8b5578f7, -1 );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$R026f0167b4 = array( );
								foreach ( $R046b4585a2 as $R0f8134fb60 )
								{
												$R082c14652c = isset( $R63d0786ecc["price_".$R0f8134fb60['id']] ) ? $R63d0786ecc["price_".$R0f8134fb60['id']] : $Ref41d9513d['listprice'];
												$R026f0167b4[] = array(
																"id" => $R0f8134fb60['id'],
																"name" => $R0f8134fb60['name'],
																"price" => $R082c14652c
												);
								}
								$this->Assign( "items", $R026f0167b4 );
								$this->Assign( "product", $Ref41d9513d );
								$this->Assign( "priceid", isset( $R63d0786ecc['id'] ) ? $R63d0786ecc['id'] : 0 );
					
												$this->View( );
					
				}

				public function PriceSave( )
				{
								$R3584859062 = getvar( "id" );
								$R399677c4c7 = intval( request( "priceid" ) );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array( );
								$R422f9a4efb = factory::getinstance( "products" );
								$Rb3f07f8c36 = $R422f9a4efb->IProduct_Get( $R8e8b5578f7, -1, "price,listprice,ptype" );
								$R63d0786ecc = $Rb3f07f8c36['price'];
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$Re484ed591e = $Rdeabc7f106->IOrder_QueryRows( " ordstate =1 and pid=".$R8e8b5578f7 );
								if ( 0 < $Re484ed591e )
								{
												$this->Alert( "您好，请先处理好订单再进行价格修改以免出错！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=orders" );
								}
								if ( count( $R3584859062 ) == 0 )
								{
												$this->Alert( "您还没有添加级别体系，请添加后再定制价格！" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=rank" );
								}
								foreach ( $R3584859062 as $R0f8134fb60 )
								{
												$R4c97fa9810 = doubleval( getvar( "price_".$R0f8134fb60 ) );
												if ( $R4c97fa9810 < $R63d0786ecc )
												{
																$this->Alert( "亏本了啊，销售价比进货价还低，重新设置吧！" );
																$this->HistoryGo( );
												}
												$data["price_".$R0f8134fb60] = $R4c97fa9810;
								}
								$data['price'] = $Rb3f07f8c36['price'];
								$data['listprice'] = $Rb3f07f8c36['listprice'];
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								if ( $R399677c4c7 == 0 )
								{
												$data['aid'] = 0;
												$data['pid'] = $R8e8b5578f7;
												$R808b89ba0e = $R5ff3ab27b8->IPrice_Create( $data );
								}
								else
								{
												$R808b89ba0e = $R5ff3ab27b8->IPrice_Update( $data, $R399677c4c7 );
								}
								$this->go( $R808b89ba0e, "操作成功！", "操作失败！", "index.php?m=mod_b2b&c=product&a=price&pid=".$R8e8b5578f7 );
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$this->Index( );
				}

				public function PP( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								if ( $R8e8b5578f7 == 0 )
								{
												$this->Alert( "非法操作" );
												$this->HistoryGo( );
								}
								$R65edce27dd = getvar( "pname" );
								$R2a51483b14 = 0;
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $R2a51483b14,
												"optype" => ""
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R2097a8fddf = factory::getinstance( "agents" );
								$R4e420efcc3 = $R2097a8fddf->IAgent_Page( $data );
								$R422f9a4efb = factory::getinstance( "products" );
								$R55c494bb27 = $R422f9a4efb->IProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R55c494bb27['sell'] ) )
								{
												$this->Alert( "商品已经不存在" );
												$this->HistoryGo( );
								}
								$R3a8b307327 = $this->GetDec( );
								$R082c14652c = $R55c494bb27['price'];
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$Rac70c4890d = $R4e420efcc3['item'][$Ra16d228039]['aid'];
												$R9aa102385f = $R2097a8fddf->IAgent_Get( $Rac70c4890d, "parentid,alv,aid,pricetpl" );
												$R4e420efcc3['item'][$Ra16d228039]['cprice'] = $this->GetPriceById( $R55c494bb27, $R9aa102385f, $R3a8b307327 );
												$R026f0167b4[] = $Rac70c4890d;
								}
								$this->FillPage( $data, $R4e420efcc3 );
								$R063e6693e5 = factory::getinstance( "ranks" );
								$R046b4585a2 = $R063e6693e5->IRank_Get( );
								$this->Assign( "rank", $R046b4585a2 );
								$R7f50336ca5 = implode( ",", $R026f0167b4 );
								$R00655fd902 = factory::getinstance( "privateprices" );
								$Rc81d709a1d = $R00655fd902->IPrivatePrice_GetByLimit( "pid = ".$R8e8b5578f7." and aid in (".$R7f50336ca5.")" );
								$R888e816784 = array( );
								foreach ( $Rc81d709a1d as $R0f8134fb60 )
								{
												$R888e816784[$R0f8134fb60['aid']] = $R0f8134fb60['price'];
								}
								$this->Assign( "parray", $R888e816784 );
								$R00be52aa45 = array( "aname" => "用户名", "arealname" => "真实姓名", "cqq" => "QQ", "cmail" => "邮箱", "ctel" => "电话", "caddr" => "住址", "cremain" => "最低余额", "ccsmp" => "最低消费", "prv" => "省", "city" => "市", "zip" => "邮编", "remarks" => "备注" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "pid", $R8e8b5578f7 );
								$this->Assign( "pname", $R65edce27dd );
								$this->Assign( "myprice", $R082c14652c );
						
												$this->Assign( "productrs", $R55c494bb27 );
												$this->View( );
						
				}

				public function Rights( )
				{
								$R2a51483b14 = intval( request( "aid", 1 ) );
								$Re9231b441d = intval( request( "gid" ) );
								$R401d4a2648 = intval( request( "zoneid" ) );
								$data = array(
												"aid" => $R2a51483b14,
												"gid" => $Re9231b441d,
												"zoneid" => $R401d4a2648
								);
								$agent = array( );
								if ( 0 < $R2a51483b14 )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname" );
								}
								$R79583fa24b = factory::getinstance( "buyrights" );
								$R679e9b9234 = $R79583fa24b->IBuyRights_Get( $data );
								$R3db8f5c8bc = $this->hander->IProduct_GetAll( );
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$R5b92e56774 = implode( ",", $R026f0167b4 );
								$data['agent'] = $agent;
								$this->Assign( "idx", $R5b92e56774 );
								$this->Assign( "products", $R3db8f5c8bc );
								$this->Assign( "rights", $R679e9b9234 );
								$this->Assign( "data", $data );
					
												$this->View( );
					
				}

				public function TRightSave( $param, $R244f38266c )
				{
								$R3584859062 = getvar( "id" );
								$R3584859062 = eregi_replace( "-1,", "", $R3584859062 );
								$data = array(
												"pids" => $R3584859062
								);
								$R79583fa24b = factory::getinstance( "buyrights" );
								$R63bede6b19 = " ".$param." in (".$R244f38266c.")";
								$R3db8f5c8bc = $R79583fa24b->IBuyRights_GetByStr( $R63bede6b19, $param );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60[$param];
								}
								$Rcc5c6e696c = explode( ",", $R244f38266c );
								if ( 0 < count( $R026f0167b4 ) )
								{
												$Rcc5c6e696c = array_diff( $Rcc5c6e696c, $R026f0167b4 );
												$R63bede6b19 = " ".$param." in (".implode( ",", $R026f0167b4 ).")";
								}
								$R808b89ba0e = $R79583fa24b->IBuyRights_UpdateByStr( $data, $R63bede6b19 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$data[$param] = $R0f8134fb60;
												$R808b89ba0e = $R79583fa24b->IBuyRights_Create( $data );
								}
								return $R808b89ba0e;
				}

				public function RightSave( )
				{
								$R2a51483b14 = getvar( "aid" );
								$Re9231b441d = getvar( "gid" );
								$R401d4a2648 = getvar( "zoneid" );
								$R808b89ba0e = false;
								if ( $R2a51483b14 != "" || $Re9231b441d != "" || $R401d4a2648 != "" )
								{
												$R63bede6b19 = "";
												if ( $R2a51483b14 != "" )
												{
																$R808b89ba0e = $this->TRightSave( "aid", $R2a51483b14 );
												}
												else if ( 0 < $Re9231b441d )
												{
																$R808b89ba0e = $this->TRightSave( "gid", $Re9231b441d );
												}
												else if ( 0 < $R401d4a2648 )
												{
																$R808b89ba0e = $this->TRightSave( "zoneid", $R401d4a2648 );
												}
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=product&a=Rights&aid=".$R2a51483b14."&gid=".$Re9231b441d."&zoneid=".$R401d4a2648 );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

				public function PrivatePriceSave( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R3584859062 = getvar( "id" );
								$R2a51483b14 = getvar( "aid" );
								$R63d0786ecc = getvar( "price" );
								$R00655fd902 = factory::getinstance( "privateprices" );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R63d0786ecc );	$Ra16d228039++	)
								{
												$Re2bcf953af = intval( $R3584859062[$Ra16d228039] );
												if ( $R63d0786ecc[$Ra16d228039] != 0 || 0 < $Re2bcf953af )
												{
																$data = array(
																				"price" => doubleval( $R63d0786ecc[$Ra16d228039] )
																);
																if ( $Re2bcf953af == 0 )
																{
																				$data['aid'] = $R2a51483b14[$Ra16d228039];
																				$data['pid'] = $R8e8b5578f7;
																				$data['operator'] = 0;
																				$R00655fd902->IPrivatePrice_Create( $data );
																}
																else
																{
																				$R00655fd902->IPrivatePrice_Update( $data, $Re2bcf953af );
																}
												}
								}
								$this->Alert( "更新完毕" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&a=PP&pid=".$R8e8b5578f7 );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ClearPP( )
				{
								echo "暂不支持此操作！";
								exit( );
								$R8e8b5578f7 = intval( request( "pid" ) );
								$data = array(
												"pid" => $R8e8b5578f7
								);
								$Rb7492a73f7 = $this->GetLit( );
								$R763ed871ef = factory::getinstance( "privateprices" );
								$R808b89ba0e = $R763ed871ef->IPrivatePrice_DeleteByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "清除失败！";
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
																$Rb7492a73f7 = "aid not in (".$R3456919727.")";
																$R71a664ef8c = $this->PageInfo( );
																$data = array(
																				"optype" => getvar( "optype" ),
																				"parentid" => 0
																);
																$data = array_merge( $data, $R71a664ef8c );
																$R2097a8fddf = factory::getinstance( "agents" );
																$R3db8f5c8bc = $R2097a8fddf->IAgent_GetByStr( $Rb7492a73f7, $data, "aid" );
																$R7e9136b890 = "";
																$Rb7492a73f7 = "";
																if ( 0 < count( $R3db8f5c8bc ) )
																{
																				$R026f0167b4 = array( );
																				foreach ( $R3db8f5c8bc as $R0f8134fb60 )
																				{
																								$R026f0167b4[] = $R0f8134fb60['aid'];
																				}
																				$R7e9136b890 = implode( ",", $R026f0167b4 );
																				$Rb7492a73f7 = "aid in (".$R3456919727.")";
																}
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "请先选择行";
																exit( );
												}
												$Rb7492a73f7 = "aid in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

}

?>
