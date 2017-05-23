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
class RightController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "buyrights" );
				}

				public function Create( )
				{
					
												$this->View( );
					
				}

				public function Right( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R5b92e56774 = getvar( "idx" );
								$param = getvar( "param" );
								$R321f3a96ea = intval( request( "isok" ) );
								if ( $R5b92e56774 == $R2a51483b14 )
								{
												$this->Alert( "不能对自己设置！" );
												$this->HistoryGo( );
								}
								$R2097a8fddf = factory::getinstance( "agents" );
								$R2f07e1d8b8 = $R2097a8fddf->IAgent_Get( $R5b92e56774, "parentid" );
								if ( !isset( $R2f07e1d8b8['parentid'] ) )
								{
												$this->Alert( "下级客户不存在！" );
												$this->HistoryGo( );
								}
								if ( $R2f07e1d8b8['parentid'] != $R2a51483b14 )
								{
												$this->Alert( "不能对别人的下级进行设置！" );
												$this->HistoryGo( );
								}
								if ( trim( $R5b92e56774 ) == "" )
								{
												$this->Alert( "参数有误，重新选择！" );
												$this->HistoryGo( );
								}
								$data = array(
												"idx" => $R5b92e56774,
												"param" => $param,
												"isok" => $R321f3a96ea
								);
								$agent = array( );
								$R679e9b9234 = $this->hander->IBuyRights_Get( $data );
								$R63bede6b19 = " param='".$param."' and idx = '".$R5b92e56774."' and isok=".$R321f3a96ea;
								$R1807c1171a = $this->hander->IBuyRights_GetByStr( $R63bede6b19 );
								$R53dba466ee = array(
												"pids" => ",",
												"id" => 0,
												"isok" => $R321f3a96ea
								);
								if ( isset( $R1807c1171a[0]['pids'] ) )
								{
												$R53dba466ee = array(
																"pids" => $R1807c1171a[0]['pids'],
																"id" => $R1807c1171a[0]['id'],
																"isok" => $R321f3a96ea
												);
								}
								$Rd67d5099b6 = factory::getinstance( "products" );
								$R3db8f5c8bc = $Rd67d5099b6->IProduct_GetAll( "pname, pid, aid, forb2b, sell, checked, tosys, inrecycle" );
								$R7fb26bbe56 = $R2097a8fddf->IAgent_GetBosses( $R2a51483b14 );
								$R7fb26bbe56[] = $R2a51483b14;
								$R7fb26bbe56[] = -1;
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['forb2b'] == 1 && $R0f8134fb60['sell'] == 1 && $R0f8134fb60['inrecycle'] != 1 )
												{
																if ( 0 < $R0f8134fb60['aid'] )
																{
																				if ( in_array( $R0f8134fb60['aid'], $R7fb26bbe56 ) )
																				{
																								if ( $R0f8134fb60['tosys'] <= 0 )
																								{
																												$R026f0167b4[] = $R0f8134fb60;
																								}
																								else if ( $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																								{
																												$R026f0167b4[] = $R0f8134fb60;
																								}
																				}
																				else if ( $R0f8134fb60['tosys'] == 1 && $R0f8134fb60['checked'] == 1 )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																}
																else
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
								}
								$R3db8f5c8bc = $R026f0167b4;
								$R3db8f5c8bc = $this->RetPi( $R3db8f5c8bc );
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['pid'];
								}
								$Rb813fe0dc6 = implode( ",", $R026f0167b4 );
								if ( $Rb813fe0dc6 == "" )
								{
												$data['pids'] = ",";
								}
								else
								{
												$data['pids'] = ",".implode( ",", $R026f0167b4 ).",";
								}
								if ( $param == "aid" && 0 < intval( $R5b92e56774 ) )
								{
												$agent = $this->GetAgentCache( $R5b92e56774 );
												$data['agent'] = $agent;
								}
								else if ( $param == "gid" && 0 < intval( $R5b92e56774 ) )
								{
												$R046b4585a2 = $this->GetRank( $R5b92e56774 );
												$data['rank'] = $R046b4585a2;
								}
								$R53dba466ee['pids'] = $data['pids'];
								$this->Assign( "products", $R3db8f5c8bc );
								$this->Assign( "rights", $R679e9b9234 );
								$this->Assign( "br", $R53dba466ee );
								$this->Assign( "data", $data );
							
												$this->View( );
							
				}

				public function CheckUnderling( $R2a51483b14 )
				{
								$Rcc5c6e696c = $this->session->agent;
								$Rf3821f38da = factory::getinstance( "agents" );
								$R2f07e1d8b8 = $Rf3821f38da->IAgent_Get( $R2a51483b14, "parentid" );
								if ( !isset( $R2f07e1d8b8['parentid'] ) )
								{
												$this->Alert( "您好！下级不存在！" );
												$this->HistoryGo( );
								}
								if ( $R2f07e1d8b8['parentid'] != $Rcc5c6e696c[7] )
								{
												$this->Alert( "您好！您无法操作其他客户的下级！" );
												$this->HistoryGo( );
								}
				}

				public function Save( )
				{
								$R5b92e56774 = getvar( "idx" );
								$this->CheckUnderling( intval( $R5b92e56774 ) );
								$param = getvar( "param" );
								$R321f3a96ea = intval( request( "isok" ) );
								$R3584859062 = intval( request( "id" ) );
								$R3359c04a1b = getvar( "pids" );
								$R3359c04a1b = eregi_replace( "-1,", "", $R3359c04a1b );
								$data = array(
												"pids" => $R3359c04a1b
								);
								if ( $R3584859062 == 0 )
								{
												$data['idx'] = $R5b92e56774;
												$data['param'] = $param;
												$data['isok'] = $R321f3a96ea;
												$R808b89ba0e = $this->hander->IBuyRights_Create( $data );
								}
								else
								{
												$R63bede6b19 = " param='".$param."' and idx = '".$R5b92e56774."' and isok=".$R321f3a96ea;
												$R808b89ba0e = $this->hander->IBuyRights_UpdateByStr( $data, $R63bede6b19 );
								}
								if ( $R808b89ba0e )
								{
												$this->Alert( "操作成功" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Right&a=Right&param=".$param."&idx=".$R5b92e56774."&isok=".$R321f3a96ea );
								}
								else
								{
												$this->Alert( "操作失败" );
												$this->HistoryGo( );
								}
				}

}

?>
