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
class VipAdController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "ad" );
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
								$R980c6a9bfd = intval( getvar( "pos" ) );
								$Rd713b8aa04 = array( "0" => "请选择广告类型" );
								if ( UB_YKT )
								{
												$R802fdf7753 = array( "6" => "一卡通系统首页头部Banner图片", "1" => "一卡通系统首页中部交替广告", "9" => "一卡通系统友情链接", "50" => "一卡通系统首页今日推荐", "51" => "一卡通商品页面默认广告", "52" => "一卡通文章类右侧上方广告", "53" => "一卡通样卡图片" );
								}
								else
								{
												$R802fdf7753 = array( );
								}
								if ( UB_B2B )
								{
												$Rd10b358ca6 = array( "106" => "批发系统头部Banner图片", "101" => "批发系统首页中部交替广告", "102" => "批发系统首页中部广告一", "103" => "批发系统首页活动专区广告图片", "104" => "批发系统首页尾部广告一", "108" => "批发系统小广播", "109" => "批发系统友情链接", "110" => "批发系统对联广告", "199" => "批发系统合作伙伴", "152" => "批发系统文章类右侧上方广告" );
								}
								else
								{
												$Rd10b358ca6 = array( );
								}
								$R186cff8e3f = array( );
								$Rd713b8aa04 = $Rd713b8aa04 + $Rd10b358ca6 + $R186cff8e3f + $R802fdf7753;
								$this->Assign( "adtype", $Rd713b8aa04 );
								$this->Assign( "pos", $R980c6a9bfd );
								global $masterid;
								$this->Assign( "items", $this->hander->IAd_Get( $R980c6a9bfd, $masterid ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "istest", $agent['istest'] );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$_SESSION['istest'] = $agent['istest'];
							
												$this->view( );
							
				}

				public function IsMyAd( $R3584859062 = 0 )
				{
								if ( $R3584859062 == 0 )
								{
												$this->Alert( "非法参数" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3db8f5c8bc = $this->hander->IAd_GetById( $R3584859062 );
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "您无权操作" );
												$this->HistoryGo( );
								}
				}

				public function Detail( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R3db8f5c8bc = $this->hander->IAd_GetById( $R3584859062 );
						
												$this->Assign( "item", $R3db8f5c8bc );
												$this->View( );
						
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3584859062 = intval( getvar( "id" ) );
								$R980c6a9bfd = intval( getvar( "pos" ) );
								$data = array(
												"pic" => getvar( "ubzpic" ),
												"url" => getvar( "ubzurl" ),
												"ispic" => intval( getvar( "ispic" ) ),
												"textcolor" => getvar( "ubztextcolor" ),
												"text" => getvar( "ubztext" ),
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => $R980c6a9bfd
								);
								if ( $R3584859062 == 0 )
								{
												$data['createdate'] = date( "Y-m-d H-i-s" );
												$R63bede6b19 = "添加";
												$R808b89ba0e = $this->hander->IAd_Create( $data );
								}
								else
								{
												$R63bede6b19 = "更新";
												$this->IsMyAd( $R3584859062 );
												$R808b89ba0e = $this->hander->IAd_Update( $data, $R3584859062 );
								}
								$this->UpdateCache( "ad" );
								$this->go( $R808b89ba0e, $R63bede6b19."成功", $R63bede6b19."失败", "index.php?m=mod_agent&c=VipAd&pos=".$R980c6a9bfd );
				}

				public function Del( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R980c6a9bfd = intval( getvar( "pos" ) );
								if ( $R3584859062 == 0 )
								{
												$R808b89ba0e = false;
								}
								else
								{
												$this->IsMyAd( $R3584859062 );
												$R808b89ba0e = $this->hander->IAd_Delete( $R3584859062 );
								}
								$this->UpdateCache( "ad" );
								$this->go( $R808b89ba0e, "删除成功", "删除失败", "index.php?m=mod_agent&c=VipAd&pos=".$R980c6a9bfd );
				}

}

?>
