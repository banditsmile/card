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
class VipProductController extends Controller
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
								$R026f0167b4 = array( );
								$R65edce27dd = getvar( "pname" );
								if ( $R65edce27dd != "" )
								{
												$R026f0167b4[] = " pname like '%".$R65edce27dd."%' ";
								}
								$Rcd0c741934 = intval( request( "catid" ) );
								if ( 0 < $Rcd0c741934 )
								{
												$R026f0167b4[] = " catid =".$Rcd0c741934." ";
								}
								$R026f0167b4[] = " forb2b = 1 ";
								$R026f0167b4[] = " sell = 1 ";
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								$R3db8f5c8bc = $this->hander->IProduct_GetByStr( $R63bede6b19, array( ), "pname,pid,listprice,aid,tosys,checked,aid" );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['aid'] == $R2a51483b14 || $R0f8134fb60['aid'] == 0 || $R0f8134fb60['aid'] == -1 || 0 < $R0f8134fb60['aid'] && $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
												{
																$R026f0167b4[] = $R0f8134fb60;
												}
												else if ( 0 < $R0f8134fb60['aid'] && $R0f8134fb60['tosys'] != 1 )
												{
																$R2195dadd9d = $this->GetAgentCache( $R0f8134fb60['aid'] );
																$Rac9b8532b8 = $R2195dadd9d['parentid'];
																if ( 0 < $Rac9b8532b8 && $Rac9b8532b8 == $R2a51483b14 )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
																else
																{
																				do
																				{
																								if ( 0 < $Rac9b8532b8 )
																								{
																												$R2195dadd9d = $this->GetAgentCache( $Rac9b8532b8 );
																												$Rac9b8532b8 = $R2195dadd9d['parentid'];
																												if ( $Rac9b8532b8 == $R2a51483b14 )
																												{
																																$R026f0167b4[] = $R0f8134fb60;
																																continue;
																												}
																								}
																				} while ( 1 );
																}
												}
								}
								$R3db8f5c8bc = $R026f0167b4;
								$Rdc7dc55174 = $this->GetVipProductShowCache( );
								$R026f0167b4 = array( );
								foreach ( $Rdc7dc55174 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60 != "" )
												{
																$R026f0167b4[$R0f8134fb60] = 1;
												}
								}
					
												$this->Assign( "items", $R3db8f5c8bc );
												$this->Assign( "showrs", $R026f0167b4 );
												$this->View( );
					
				}

				public function Save( )
				{
								$R124c633429 = getvar( "pidstr" );
								$R026f0167b4 = explode( ",", $R124c633429 );
								if ( count( $R026f0167b4 ) == 0 )
								{
												$this->Alert( "没有需要设置的商品！" );
												$this->HistoryGo( );
								}
								$R3584859062 = getvar( "id" );
								$Rdc7dc55174 = $this->GetVipProductShowCache( );
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
								$Re82ee9b121 = "\$Rbfa3d20675='".$R63bede6b19."'";
								$R3d9a15f4b8 = SITECACHE."productshow.php";
								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
								file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
								$this->Alert( "完成操作！" );
								$this->ScriptRedirect( "index.php?m=mod_agent&c=VipProduct" );
				}

}

?>
