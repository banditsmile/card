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
												$this->Alert( "��δ��ͨvipƽ̨���޷����д˲�����" );
												$this->HistoryGo( );
								}
								global $masterid;
								if ( $masterid == 0 )
								{
												$this->Alert( "���½������վ�ٴ˲�����" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
				{
								$R980c6a9bfd = intval( getvar( "pos" ) );
								$Rd713b8aa04 = array( "0" => "��ѡ��������" );
								if ( UB_YKT )
								{
												$R802fdf7753 = array( "6" => "һ��ͨϵͳ��ҳͷ��BannerͼƬ", "1" => "һ��ͨϵͳ��ҳ�в�������", "9" => "һ��ͨϵͳ��������", "50" => "һ��ͨϵͳ��ҳ�����Ƽ�", "51" => "һ��ͨ��Ʒҳ��Ĭ�Ϲ��", "52" => "һ��ͨ�������Ҳ��Ϸ����", "53" => "һ��ͨ����ͼƬ" );
								}
								else
								{
												$R802fdf7753 = array( );
								}
								if ( UB_B2B )
								{
												$Rd10b358ca6 = array( "106" => "����ϵͳͷ��BannerͼƬ", "101" => "����ϵͳ��ҳ�в�������", "102" => "����ϵͳ��ҳ�в����һ", "103" => "����ϵͳ��ҳ�ר�����ͼƬ", "104" => "����ϵͳ��ҳβ�����һ", "108" => "����ϵͳС�㲥", "109" => "����ϵͳ��������", "110" => "����ϵͳ�������", "199" => "����ϵͳ�������", "152" => "����ϵͳ�������Ҳ��Ϸ����" );
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
												$this->Alert( "�Ƿ�����" );
												$this->HistoryGo( );
								}
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3db8f5c8bc = $this->hander->IAd_GetById( $R3584859062 );
								if ( $R3db8f5c8bc['aid'] != $R2a51483b14 )
								{
												$this->Alert( "����Ȩ����" );
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
												$R63bede6b19 = "���";
												$R808b89ba0e = $this->hander->IAd_Create( $data );
								}
								else
								{
												$R63bede6b19 = "����";
												$this->IsMyAd( $R3584859062 );
												$R808b89ba0e = $this->hander->IAd_Update( $data, $R3584859062 );
								}
								$this->UpdateCache( "ad" );
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_agent&c=VipAd&pos=".$R980c6a9bfd );
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
								$this->go( $R808b89ba0e, "ɾ���ɹ�", "ɾ��ʧ��", "index.php?m=mod_agent&c=VipAd&pos=".$R980c6a9bfd );
				}

}

?>
