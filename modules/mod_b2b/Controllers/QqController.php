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
class QqController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								$this->Assign( "css", "ub-red-20080119" );
								$R30b2ab8dc1 = $this->GetWebCache( );
								$this->B2BInit( $R30b2ab8dc1['webname']."补单系统" );
								global $masterid;
								if ( $masterid == 0 )
								{
												$R09a3346376 = DATACACHE."site".DS."bd.php";
								}
								else
								{
												global $cache;
												$R09a3346376 = "./content/".$cache."/site/bd.php";
								}
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												$Rdad651832c = base64_decode( $Rdad651832c );
								}
								else
								{
												$Ra3f6846255 = "";
												$Rdad651832c = "";
								}
								$R0f8134fb60 = $Ra3f6846255;
								$R0f8134fb60 = preg_replace( "/\r\n/", "||", $R0f8134fb60 );
								$R3db8f5c8bc = explode( "||", $R0f8134fb60 );
								$this->Assign( "bd", $R3db8f5c8bc );
								$this->Assign( "bdtip", $Rdad651832c );
								include( UPATH_HELPER."ArticleHelper.php" );
							
												$this->View( );
								
				}

				public function BdState( )
				{
								$this->Assign( "css", "ub-red-20080119" );
								$R30b2ab8dc1 = $this->GetWebCache( );
								$this->B2BInit( $R30b2ab8dc1['webname']."补单结果" );
								$R7da43659df = trim( getvar( "qq" ) );
								$Rb2c0dc00fa = trim( getvar( "cztype" ) );
								if ( $R7da43659df == "" )
								{
												$this->Alert( "QQ号不能为空！" );
												$this->HistoryGo( );
								}
								if ( $Rb2c0dc00fa == "" )
								{
												$this->Alert( "请先选择业务类型！" );
												$this->HistoryGo( );
								}
								if ( preg_match( "/^[0-9]*\$/", $R7da43659df ) )
								{
								}
								else
								{
												$this->Alert( "请填入正确的QQ号！" );
												$this->HistoryGo( );
								}
								$Rcae7958c9b = factory::getinstance( "bd" );
								$R3db8f5c8bc = $Rcae7958c9b->IBD_GetByStr( " czaccount = '".$R7da43659df."' and cztype='".$Rb2c0dc00fa."' ", "*" );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$this->Assign( "items", $R3db8f5c8bc );
								$this->View( );
				}

				public function BdSave( )
				{
								$R7da43659df = trim( getvar( "qq", "", "POST" ) );
								$Rac31c94941 = trim( getvar( "qqpwd", "", "POST" ) );
								$Rb2c0dc00fa = trim( getvar( "cztype", "", "POST" ) );
								$R9f5575e717 = htmlspecialchars( trim( getvar( "remark", "", "POST" ) ) );
								$Raa5230d35d = intval( request( "islight" ) );
								if ( $R7da43659df == "" )
								{
												$this->Alert( "QQ号不能为空！" );
												$this->HistoryGo( );
								}
								if ( $Rb2c0dc00fa == "" )
								{
												$this->Alert( "请先选择业务类型！" );
												$this->HistoryGo( );
								}
								if ( preg_match( "/^[0-9]*\$/", $R7da43659df ) )
								{
								}
								else
								{
												$this->Alert( "请填入正确的QQ号！" );
												$this->HistoryGo( );
								}
								$Rdeabc7f106 = factory::getinstance( "orders" );
								$R3db8f5c8bc = $Rdeabc7f106->IOrder_GetByStr( " czaccount = '".$R7da43659df."' and ordstate = 2 and inrecycle = 0 ", "ordno" );
								if ( count( $R3db8f5c8bc ) == 0 )
								{
												$R51c50d437c = $this->HistoryTime( );
												if ( 0 < $R51c50d437c )
												{
																$Rdeabc7f106 = factory::getinstance( "ordershistory" );
																$R3db8f5c8bc = $Rdeabc7f106->IOrder_GetByStr( " czaccount = '".$R7da43659df."' and ordstate = 2 and inrecycle = 0 ", "ordno" );
												}
								}
								if ( count( $R3db8f5c8bc ) == 0 )
								{
												$this->Alert( "您好，您未在我们平台成功下单，无法提交！" );
												$this->HistoryGo( );
								}
								$Rcae7958c9b = factory::getinstance( "bd" );
								$R3db8f5c8bc = $Rcae7958c9b->IBD_GetByStr( " czaccount = '".$R7da43659df."' and ordstate in (0,1,3) and cztype='".$Rb2c0dc00fa."' ", "id" );
								if ( 0 < count( $R3db8f5c8bc ) )
								{
												$this->Alert( "您好，您已经提交过，请勿重复提交！" );
												$this->HistoryGo( );
								}
								global $masterid;
								$data = array(
												"czaccount" => $R7da43659df,
												"accpwd" => $Rac31c94941,
												"cztype" => $Rb2c0dc00fa,
												"remark" => $R9f5575e717,
												"islight" => $Raa5230d35d,
												"aid" => $masterid,
												"createdate" => date( "Y-m-d H-i-s" ),
												"ordstate" => 1,
												"cip" => $this->GetIp( )
								);
								$R808b89ba0e = $Rcae7958c9b->IBD_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "提交成功" );
												$this->ScriptRedirect( "index.php?qq=".$R7da43659df."&cztype=".urlencode( $Rb2c0dc00fa )."&m=mod_b2b&c=Bd&a=BdState" );
								}
								else
								{
												$this->Alert( "提交失败" );
												$this->HistoryGo( );
								}
				}

				public function IsMy( )
				{
								$R7da43659df = trim( getvar( "qq", "", "POST" ) );
								if ( $R7da43659df != "" )
								{
												if ( preg_match( "/^[0-9]*\$/", $R7da43659df ) )
												{
												}
												else
												{
																echo "请填入正确的QQ号！";
																exit( );
												}
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R3db8f5c8bc = $Rdeabc7f106->IOrder_GetByStr( " czaccount = '".$R7da43659df."' and ordstate = 2 ", "ordno" );
												if ( count( $R3db8f5c8bc ) == 0 )
												{
																echo "未在本平台成功下单";
																exit( );
												}
								}
				}

}

?>
