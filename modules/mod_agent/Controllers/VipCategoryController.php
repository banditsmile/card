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
class VipCategoryController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "products" );
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
								if ( $masterid != $R2a51483b14 )
								{
												$this->Alert( "请登陆自己的vip站点再进行操作！" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Rd2e691562d = $this->GetCatCache( );
								$R27752f5168 = $this->GetSubCatCache( );
								$this->Assign( "cat", $Rd2e691562d );
								$this->Assign( "subcat", $R27752f5168 );
								$Rdc7dc55174 = $this->GetVipCategoryShowCache( );
								$R026f0167b4 = array( );
								foreach ( $Rdc7dc55174 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60 != "" )
												{
																$R026f0167b4[$R0f8134fb60] = 1;
												}
								}
						
												$this->Assign( "showrs", $R026f0167b4 );
												$this->View( );
						
				}

				public function Save( )
				{
								$R124c633429 = getvar( "idstr" );
								$R026f0167b4 = explode( ",", $R124c633429 );
								if ( count( $R026f0167b4 ) == 0 )
								{
												$this->Alert( "没有需要设置的类别！" );
												$this->HistoryGo( );
								}
								$R3584859062 = getvar( "id" );
								$Rdc7dc55174 = $this->GetVipCategoryShowCache( );
								$R722a0f7ffe = array( );
								foreach ( $R026f0167b4 as $R0f8134fb60 )
								{
												$R722a0f7ffe[$R0f8134fb60] = 1;
								}
								$Rca8b3b5079 = array( );
								foreach ( $Rdc7dc55174 as $R0f8134fb60 )
								{
												if ( !isset( $R722a0f7ffe[$R0f8134fb60] ) )
												{
																$Rca8b3b5079[] = $R0f8134fb60;
												}
								}
								if ( is_array( $R3584859062 ) )
								{
												foreach ( $R3584859062 as $R0f8134fb60 )
												{
																$Rca8b3b5079[] = $R0f8134fb60;
												}
								}
								$R63bede6b19 = implode( ",", $Rca8b3b5079 );
								$Re82ee9b121 = "\$Recf8a496d8='".$R63bede6b19."'";
								$R3d9a15f4b8 = SITECACHE."categoryshow.php";
								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
								file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
								$this->Alert( "完成操作！" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=VipCategory" );
				}

}

?>
