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
class ScoredController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
				}

				public function Index( )
				{
								$R14f21eedf1 = factory::getinstance( "scoredproduct" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								 
    $R4e420efcc3   = $R14f21eedf1->IScoredProduct_GetByData(array(),'*');
    $this->Assign('items', $R4e420efcc3);
    $this->View();
    

				}

				public function Detail( )
				{
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R14f21eedf1 = factory::getinstance( "scoredproduct" );
								$R0f8134fb60 = $R14f21eedf1->IScoredProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R0f8134fb60['param'] ) )
								{
												$this->Alert( "通信错误，请重新操作" );
												$this->CloseWin( );
								}
								if ( $R0f8134fb60['stocks'] <= 0 )
								{
												$this->Alert( "数量不足" );
												$this->CloseWin( );
								}
								if ( 0 < $R0f8134fb60['param'] && $R0f8134fb60['method'] == 3 )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Product&a=Detail&pid=".$R0f8134fb60['param']."&scoredpid=".$R0f8134fb60['pid'] );
								}
								$this->Assign( "item", $R0f8134fb60 );
								include( UPATH_HELPER."ArticleHelper.php" );
							
												$this->View( );
							
				}

				public function Oetail( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R3db8f5c8bc = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( !isset( $R3db8f5c8bc['ordno'] ) )
								{
												$this->Alert( "积分订单已经不存在了！" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['method'] == 3 )
								{
												$this->ScriptRedirect( "index.php?m=mod_agent&c=order&a=detail&ubzordno=".$R3db8f5c8bc['ordno'] );
								}
								$this->Assign( "item", $R3db8f5c8bc );
								$R6d10b7ab80 = array( "", "实物兑换", "兑换金钱", "兑换商品" );
								$this->Assign( "method", $R6d10b7ab80 );
							
												$this->View( );
							
				}

				public function Pay( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R66b0d9d6f1 = intval( request( "ubzqty" ) );
								if ( $R66b0d9d6f1 <= 0 )
								{
												$this->Alert( "非法参数！" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,aremain,parentid,alv,company,istest,websetting,tradepwd,pricetpl,scored", 0 );
								if ( !isset( $agent['aremain'] ) )
								{
												$this->Alert( "您好！请确认您的账号是否被管理员冻结或者删除！" );
												$this->HistoryGo( );
								}
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法购买商品的！" );
												$this->HistoryGo( );
								}
								if ( $Rcc5c6e696c[9] == 0 )
								{
												$Rc8c0af4ceb = $agent['websetting'];
												$R97800871bc = explode( "|", $Rc8c0af4ceb );
												if ( isset( $R97800871bc[8] ) && $R97800871bc[8] == 1 )
												{
																$R48aa85bc4e = getvar( "tradepwd" );
																if ( $R48aa85bc4e != $agent['tradepwd'] )
																{
																				$this->Alert( "您输入的交易密码有错！请重新输入" );
																				$this->HistoryGo( );
																}
												}
								}
								else
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
												$R5f84c47438 = factory::getinstance( "staffs", "checktradepwd,tradepwd" );
												$Raac42e4217 = $R5f84c47438->IStaff_Get( $R94e0136c8a );
												if ( !isset( $Raac42e4217['checktradepwd'] ) )
												{
																$this->Alert( "非法登陆" );
																$this->HistoryGo( );
												}
												if ( $Raac42e4217['checktradepwd'] == 1 )
												{
																$R48aa85bc4e = getvar( "tradepwd" );
																if ( $R48aa85bc4e != $Raac42e4217['tradepwd'] )
																{
																				$this->Alert( "您输入的交易密码有错！请重新输入" );
																				$this->HistoryGo( );
																}
												}
								}
								$R8e8b5578f7 = intval( request( "pid" ) );
								$R14f21eedf1 = factory::getinstance( "scoredproduct" );
								$R37ad834577 = $R14f21eedf1->IScoredProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R37ad834577['pid'] ) )
								{
												$this->alert( "此商品不存在！" );
												$this->HistoryGo( );
								}
								$R114f28ca48 = $R66b0d9d6f1 * $R37ad834577['scored'];
								if ( $R37ad834577['stocks'] < $R66b0d9d6f1 )
								{
												$this->alert( "您好，系统已经没有充足的数量供您兑换，请等待系统补充再进行兑换！" );
												$this->HistoryGo( );
								}
								if ( $R114f28ca48 <= 0 )
								{
												$this->Alert( "非法参数！" );
												$this->HistoryGo( );
								}
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 - $R114f28ca48;
								if ( $Rc0c42883ee < 0 )
								{
												$this->alert( "您的积分不足" );
												$this->HistoryGo( );
								}
								$R1ee00eef85 = getvar( "tel" );
								$Recb2521bef = getvar( "addr" );
								$R5ae8874ca8 = getvar( "zip" );
								$R9d8898d32a = getvar( "realname" );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = createordno( );
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"ordno" => $Rdcd9105806,
																"pname" => $R37ad834577['pname'],
																"qty" => $R66b0d9d6f1,
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R94e0136c8a,
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => 5,
																"method" => $R37ad834577['method']
												);
												$R645c69ff15 = factory::getinstance( "scored" );
												$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												if ( $R808b89ba0e )
												{
																$data = array(
																				"ordno" => $Rdcd9105806,
																				"pname" => $R37ad834577['pname'],
																				"pid" => $R37ad834577['pid'],
																				"method" => $R37ad834577['method'],
																				"param" => $R37ad834577['param'],
																				"qty" => $R66b0d9d6f1,
																				"scored" => $R114f28ca48,
																				"aid" => $R2a51483b14,
																				"staffid" => $R94e0136c8a,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"ordstate" => 1,
																				"tel" => $R1ee00eef85,
																				"addr" => $Recb2521bef,
																				"zip" => $R5ae8874ca8,
																				"realname" => $R9d8898d32a,
																				"cip" => $this->GetIp( ),
																				"comefrom" => 1
																);
																$Rf3d646c485 = factory::getinstance( "scoredorder" );
																$R808b89ba0e = $Rf3d646c485->IScoredOrder_Create( $data );
																if ( $R808b89ba0e )
																{
																				$data = array(
																								"stocks" => $R37ad834577['stocks'] - $R66b0d9d6f1
																				);
																				$R14f21eedf1->IScoredProduct_Update( $data, $R8e8b5578f7 );
																				$R0f99e0d6c7 = $R37ad834577['method'];
																				if ( $R0f99e0d6c7 == 2 )
																				{
																								$R244f38266c = intval( $R37ad834577['param'] );
																								if ( 0 < $R244f38266c )
																								{
																												$Rdaddcb85cb = $R244f38266c * $R66b0d9d6f1;
																												$R3ab1f9eb35 = $agent['aremain'];
																												$Rc0c42883ee = $R3ab1f9eb35 + $Rdaddcb85cb;
																												$data = array(
																																"aremain" => $Rc0c42883ee
																												);
																												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
																												if ( $R808b89ba0e )
																												{
																																$R808b89ba0e = $this->CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $Rdaddcb85cb, $R114f28ca48, $R37ad834577['pname'], $R66b0d9d6f1, $R37ad834577['scored'] );
																																if ( $R808b89ba0e )
																																{
																																				$data = array( "ordstate" => 2 );
																																				$Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
																																				$this->Alert( "兑换成功，请刷新页面，即可看到余额变化！" );
																																}
																																else
																																{
																																				$this->Alert( "记录生成失败！" );
																																}
																												}
																												else
																												{
																																$this->Alert( "兑换失败！" );
																												}
																								}
																								else
																								{
																												$this->Alert( "总兑换余额为零！" );
																								}
																				}
																				else
																				{
																								$this->Alert( "下单成功！" );
																				}
																				$this->CloseWin( );
																}
																else
																{
																				$this->Alert( "下单失败了！" );
																				$this->HistoryGo( );
																}
												}
												else
												{
																$this->Alert( "下单失败！" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "积分扣除失败！" );
												$this->HistoryGo( );
								}
				}

				public function CreateTrade( $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, $R114f28ca48, $R65edce27dd, $R66b0d9d6f1, $R88f9731c8f )
				{
								$R51c716b966 = $this->SetLang( 1 );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $R2a51483b14;
								if ( 0 < $Rcc5c6e696c[9] )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								$Rbf6c8991d9 = array(
												"aid" => $R2a51483b14,
												"tradetype" => 96,
												"ordno" => $Rdcd9105806,
												"income" => $R9b252bf0a7,
												"outcome" => 0,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35,
												"content" => $R65edce27dd."(".$R88f9731c8f." x ".$R66b0d9d6f1.") 兑换余额".$R9b252bf0a7.$R51c716b966['moneyunit'],
												"operator" => $R94e0136c8a,
												"otherside" => 0,
												"state" => 5,
												"ykt" => 0,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								$Race6ab87b1 = factory::getinstance( "trades" );
								return $Race6ab87b1->ITrade_Create( $Rbf6c8991d9 );
				}

				public function OrderList( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2fa4b8c965 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( isset( $_COOKIE['umebiz_com_ini_1'] ) && 0 < $Rcc5c6e696c[9] )
								{
												$Rbd83edab70 = intval( $_COOKIE['umebiz_com_ini_1'] );
								}
								else
								{
												$Rbd83edab70 = 1;
								}
								if ( 0 < $Rcc5c6e696c[9] && $Rbd83edab70 == 0 )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								else
								{
												$R94e0136c8a = 0;
								}
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$R58bca74885 = array(
												"ordstate" => $Rbdf46d6e43,
												"aid" => $R2a51483b14
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R4e420efcc3 = $Rf3d646c485->IScoredOrder_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "staffname,staffid,realname", $R2a51483b14 );
								$this->Assign( "staff", $Raac42e4217 );
								$this->Assign( "staffname", getvar( "staffname" ) );
								$this->Assign( "canseeother", $Rbd83edab70 );
								
												$this->View( );
								
				}

				public function ScoredList( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2fa4b8c965 = $Rcc5c6e696c[0];
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( isset( $_COOKIE['umebiz_com_ini_1'] ) && 0 < $Rcc5c6e696c[9] )
								{
												$Rbd83edab70 = intval( $_COOKIE['umebiz_com_ini_1'] );
								}
								else
								{
												$Rbd83edab70 = 1;
								}
								if ( 0 < $Rcc5c6e696c[9] && $Rbd83edab70 == 0 )
								{
												$R94e0136c8a = $Rcc5c6e696c[9];
								}
								else
								{
												$R94e0136c8a = 0;
								}
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$R58bca74885 = array(
												"ordstate" => $Rbdf46d6e43,
												"aid" => $R2a51483b14
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R645c69ff15 = factory::getinstance( "scored" );
								$R4e420efcc3 = $R645c69ff15->IScored_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R5f84c47438 = factory::getinstance( "staffs" );
								$Raac42e4217 = $R5f84c47438->IStaff_GetAll( "staffname,staffid,realname", $R2a51483b14 );
								$this->Assign( "staff", $Raac42e4217 );
								$this->Assign( "staffname", getvar( "staffname" ) );
								$this->Assign( "canseeother", $Rbd83edab70 );
								
												$this->View( );
								
				}

}

?>
