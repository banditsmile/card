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
class MiBaoKaController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
				}

				public function MiBaoKa( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
					
												$this->Assign( "item", $R679e9b9234 );
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->View( );
					
				}

				public function Apply( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
						
												$this->Assign( "item", $R679e9b9234 );
												$this->Assign( "agent", $Rcc5c6e696c );
												$this->View( );
						
				}

				public function CheckAgentValid( $R2a51483b14 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "istest,tradepwd", 0 );
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "���ã�����ǰʹ�õ��ǲ��Ժţ����Ժ����޷��޸������Ϣ�ģ�" );
												$this->HistoryGo( );
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( $R48aa85bc4e != $agent['tradepwd'] )
								{
												$this->Alert( "������Ľ��������д�����������" );
												$this->HistoryGo( );
								}
				}

				public function MiBaoKaSave( )
				{
								$this->NormalSave( "mibaoka", "MiBaoKa" );
				}

				public function NormalSave( $R6c6f2ffa34, $action )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$this->CheckAgentValid( $R2a51483b14 );
								$R94e0136c8a = isset( $Rcc5c6e696c[9] ) ? $Rcc5c6e696c[9] : 0;
								$R679e9b9234 = $this->GetSecCache( $R2a51483b14, $R94e0136c8a );
								if ( intval( request( $R6c6f2ffa34."config2" ) ) == 2 )
								{
												$R30b2ab8dc1 = intval( request( $R6c6f2ffa34."config3" ) );
								}
								else
								{
												$R30b2ab8dc1 = intval( request( $R6c6f2ffa34."config31" ) );
								}
								$data = array(
												$R6c6f2ffa34."config" => intval( request( $R6c6f2ffa34."config1" ) ).",".intval( request( $R6c6f2ffa34."config2" ) ).",".$R30b2ab8dc1
								);
								$this->hander = factory::getinstance( "security" );
								if ( isset( $R679e9b9234['aid'] ) )
								{
												$R808b89ba0e = $this->hander->ISecurity_Update( $data, $R679e9b9234['id'] );
								}
								else
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $this->hander->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "security", array(
																"arg1" => $R2a51483b14,
																"arg2" => $R94e0136c8a
												) );
												$this->Alert( "���óɹ�" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_agent&c=MiBaoKa&a=".$action );
				}

}

?>
