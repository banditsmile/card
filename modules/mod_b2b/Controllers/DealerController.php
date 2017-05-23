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
class DealerController extends Controller
{

				public function __construct( )
				{
								$this->session = factory::getinstance( "session" );
								$R8e3748b5c9 = ucfirst( request( "a" ) );
								if ( $this->session->agent == "" && $R8e3748b5c9 != "Msg" && $R8e3748b5c9 != "Remain" )
								{
												$this->Alert( "系统已经退出！请重新登陆！" );
												$this->GoHome( "b2b" );
								}
								if ( $this->session->agent == "" && $R8e3748b5c9 == "Msg" )
								{
												echo "0";
								}
								if ( $this->session->agent == "" && $R8e3748b5c9 == "Remain" )
								{
												echo "-1";
								}
				}

				public function Index( )
				{
								$R30b2ab8dc1 = $this->GetWebCache( );
								$this->Assign( "webname", $R30b2ab8dc1['webname'] );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$R87aee22884 = $this->GetRank( $agent['alv'] );
								if ( $R87aee22884['gid'] < 2 )
								{
												$this->Alert( "您好，您不是经销商级别用户，无法进入此系统" );
												$this->HistoryGo( );
								}
							
												$this->View( );
								
				}

				public function Left( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "custom", $agent['custom'] );
								global $masterid;
								if ( $agent['vipshop'] == 1 && $masterid != $R2a51483b14 )
								{
												$agent['vipshop'] = 0;
								}
								$this->Assign( "ainfo", $agent );
							
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->View( );
								
				}

				public function Hide( )
				{
							
												$this->View( );
								
				}

				public function Top( )
				{
								$Ra27af44414 = factory::getinstance( "sys" );
								global $masterid;
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( $masterid, "qq,hibaidu,wangwang,tel,email,webname" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,selffrozenfunds,tradefrozenfunds,sysfrozenfunds,bossfrozenfunds" );
								if ( isset( $agent['aremain'] ) )
								{
												$R89cd0a3912 = $agent['selffrozenfunds'] + $agent['tradefrozenfunds'] + $agent['sysfrozenfunds'] + $agent['bossfrozenfunds'];
												$R89cd0a3912 = round( $R89cd0a3912, 3 );
								}
								else
								{
												$R89cd0a3912 = 0;
								}
						
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->Assign( "web", $R30b2ab8dc1 );
												$this->Assign( "frozen", $R89cd0a3912 );
												$this->View( );
								
				}

				public function Msg( )
				{
								$R9e0664486a = factory::getinstance( "msg" );
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$data = array(
												"msgto" => $R2a51483b14,
												"bossid" => $R5334b17ba8
								);
								$num = $R9e0664486a->IMsg_NotReaded( $data );
								echo $num;
				}

				public function Remain( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,income,funds" );
								if ( isset( $agent['aremain'] ) )
								{
												echo round( $agent['aremain'], 3 ).",".round( $agent['income'], 3 ).",".round( $agent['funds'], 3 );
								}
								else
								{
												echo -1;
								}
				}

				public function Home( )
				{
								$this->SetHomeData( );
								$this->SetArticle( 3 );
								$this->Assign( "agent", $this->session->agent );
								$this->B2bInit( "首页" );
							
												$this->View( );
								
				}

				public function SetArticle( $R5cc00cfbe4 )
				{
								require_once( SITECACHE."a.php" );
								require_once( UPATH_BASE.DS."libraries".DS."user".DS."homeconfig.b2b.php" );
								foreach ( $art as $R0f8134fb60 )
								{
												$this->Assign( $R0f8134fb60['vdname'], $$R0f8134fb60['vdname'] );
								}
				}

				public function SetHomeData( )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3db8f5c8bc = $R2097a8fddf->IAgent_Info( $R2a51483b14 );
								$this->Assign( "rs", $R3db8f5c8bc );
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "custom", $agent['custom'] );
								$this->Assign( "agent", $Rcc5c6e696c );
				}

}

?>