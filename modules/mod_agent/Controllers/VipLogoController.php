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
class VipLogoController extends Controller
{

				public function __construct( )
				{
								$this->Checkb2bSession( );
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
								$Rb51511500c = array( );
								if ( UB_B2B )
								{
												$Rb51511500c[] = array( "name" => "批发系统", "m" => "mod_b2b" );
								}
								if ( UB_YKT )
								{
												$Rb51511500c[] = array( "name" => "一卡通", "m" => "mod_ykt" );
								}
								if ( 1 < UB_B2C + UB_B2B + UB_YKT )
								{
												$Rb51511500c[] = array( "name" => "引导页", "m" => "mod_index" );
								}
								$this->Assign( "logo", $Rb51511500c );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								$this->Assign( "istest", $agent['istest'] );
								if ( !isset( $_SESSION ) )
								{
												session_start( );
								}
								$_SESSION['istest'] = $agent['istest'];
							
												$this->View( );
							
				}

}

?>
