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
class VipController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "sys" );
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
								$R0f8134fb60 = $this->hander->ISys_Get( $R2a51483b14 );
								if ( !isset( $R0f8134fb60['webname'] ) )
								{
												$this->Alert( "平台管理员暂未初始化您的vip平台，无法进行此操作！" );
												$this->HistoryGo( );
								}

                                $this->assign('item',$R0f8134fb60);
								$this->view();								
				}

				public function Save( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,websetting,superpwd", 0 );
								$R30b2ab8dc1 = $this->GetWebCache( );
								$R2e6e92499a = $R30b2ab8dc1['config'];
								$R026f0167b4 = explode( "|", $R2e6e92499a );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "您好！您当前使用的是测试号，测试号是无法修改VIP站点操作的！" );
												$this->HistoryGo( );
								}
								$R71dfa8a4fc = getvar( "superpwd" );
								if ( $R71dfa8a4fc != $agent['superpwd'] )
								{
												$this->Alert( "您输入的超级密码输入有错！请重新输入" );
												$this->HistoryGo( );
								}
								$R3cb9cdaed2 = array(
												"title" => getvar( "webname" ),
												"keywords" => getvar( "webname" ),
												"description" => getvar( "webname" ),
												"webname" => getvar( "webname" ),
												"yktname" => getvar( "webname" ),
												"ykttitle" => getvar( "webname" ),
												"b2cname" => getvar( "webname" ),
												"useragreement" => htmlspecialchars( getvar( "useragreement" ) ),
												"popcontent" => htmlspecialchars( getvar( "popcontent" ) ),
												"webbank" => getvar( "webbank" ),
												"beian" => getvar( "beian" ),
												"worktime" => getvar( "worktime" ),
												"qq" => getvar( "qq" ),
												"msn" => getvar( "msn" ),
												"hibaidu" => getvar( "hibaidu" ),
												"wangwang" => getvar( "wangwang" ),
												"email" => getvar( "email" ),
												"fax" => getvar( "fax" ),
												"tel" => getvar( "tel" ),
												"zip" => intval( request( "zip" ) ),
												"address" => getvar( "address" ),
												"alertremain" => doubleval( request( "alertremain" ) ),
												"config" => intval( request( "pop" ) )."|".intval( request( "turntopm" ) )."|".intval( request( "remainalert" ) )."|".intval( $R026f0167b4[3] )."|".intval( $R026f0167b4[4] )."|".intval( $R026f0167b4[5] )."|".intval( $R026f0167b4[6] )."|".intval( $R026f0167b4[7] )."|".intval( $R026f0167b4[8] )."|".intval( $R026f0167b4[9] )."|".intval( $R026f0167b4[10] )."|".intval( $R026f0167b4[11] )."|".intval( $R026f0167b4[12] )."|".intval( $R026f0167b4[13] )."|".intval( $R026f0167b4[14] )."|".intval( $R026f0167b4[15] )."|".intval( $R026f0167b4[16] )."|".intval( request( "showmainprocut" ) )
								);
								$R808b89ba0e = $this->hander->ISys_UpdateByMID( $R3cb9cdaed2, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$this->alert( "修改成功！" );
								}
								else
								{
												$this->alert( "修改失败！请重新提交！" );
								}
								$this->UpdateCache( "sys" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=vip" );
				}

}

?>
