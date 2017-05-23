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
class YktController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->CheckYkt( );
				}

				public function CheckYkt( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$this->Assign( "aid", $R2a51483b14 );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "forykt", 0 );
								if ( !isset( $agent['forykt'] ) || $agent['forykt'] == 0 )
								{
												$this->Alert( "��δ��ͨһ��ͨ����������޷����д˲�����" );
												$this->HistoryGo( );
								}
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( strtolower( request( "stype" ) ) == "bindaid" )
								{
												$this->Alert( "��Ч��" );
												$this->HistoryGo( );
								}
								include_once( UPATH_HELPER."CardHelper.php" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"cardok" => getvar( "cardok", "" ),
												"cardnumber" => getvar( "cardnumber", "" ),
												"pid" => getvar( "ubzpid" ),
												"optype" => getvar( "optype", "" ),
												"ykt" => 0,
												"ptype" => 100,
												"cardnumberstart" => getvar( "cardnumberstart", "" ),
												"cardnumberend" => getvar( "cardnumberend", "" ),
												"bindaid" => $R2a51483b14
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$Rf541845af3 = factory::getinstance( "cards" );
								$R4e420efcc3 = $Rf541845af3->ICard_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "cardnumber" => "����", "cardgroup" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
								$R793c7fe26b = array( "-1" => "����", "0" => "����Ч", "1" => "����Ч", "2" => "δ��Ч", "3" => "ʹ����" );
								$this->Assign( "scardstate", $R793c7fe26b );
								$this->Assign( "cardstate", getvar( "cardok", "-1" ) );
								$R5026051cf5 = array( "-1" => "����", "f" => "���۳�", "s" => "δ�۳�" );
								$this->Assign( "ssellstate", $R5026051cf5 );
								$this->Assign( "sellstate", getvar( "optype", "-1" ) );
								$R209524ad64 = array( "-1" => "����", "100" => "�һ���", "101" => "��ֵ��" );
								$this->Assign( "sptype", $R209524ad64 );
								$this->Assign( "ptype", getvar( "ptype", "-1" ) );
						
												$this->view( );
								
				}

				public function Save( )
				{
								$this->ScriptRedirect( "index.php?m=mod_agent&c=vip" );
				}

				public function MakeOk( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R3456919727 = getvar( "id" );
								if ( !is_array( $R3456919727 ) )
								{
												$this->Alert( "����ѡ��Ҫ�����һ��ͨ" );
												$this->HistoryGo( );
								}
								$R026f0167b4 = array( );
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aid,aname,aremain,parentid,alv,company,istest,websetting,tradepwd,pricetpl", 0 );
								if ( !isset( $agent['aremain'] ) )
								{
												$this->Alert( "���ã���ȷ�������˺��Ƿ񱻹���Ա�������ɾ����" );
												$this->HistoryGo( );
								}
								if ( $agent['istest'] == 1 )
								{
												$this->Alert( "���ã�����ǰʹ�õ��ǲ��Ժţ����Ժ����޷�������Ʒ�ģ�" );
												$this->HistoryGo( );
								}
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( $R48aa85bc4e != $agent['tradepwd'] )
								{
												$this->Alert( "������Ľ��������д�����������" );
												$this->HistoryGo( );
								}
								$R8746128071 = intval( request( "makeok" ) );
								$Rf541845af3 = factory::getinstance( "cards" );
								$R026f0167b4 = array( );
								foreach ( $R3456919727 as $R0f8134fb60 )
								{
												$R026f0167b4[] = intval( $R0f8134fb60 );
								}
								$Rf351f6e099 = array( );
								$Rf351f6e099[] = " okbyaid=1 and bindaid=".$R2a51483b14;
								$R63bede6b19 = implode( ",", $R026f0167b4 );
								if ( $R63bede6b19 != "" )
								{
												$Rf351f6e099[] = " id in (".$R63bede6b19.")";
								}
								$R63bede6b19 = implode( " and ", $Rf351f6e099 );
								$R5c04831f87 = array( );
								if ( $R8746128071 == 1 )
								{
												$Rf34a38f798 = array( );
												$R9b8386ca08 = array( );
												$R72852f08e6 = 0;
												$R3db8f5c8bc = $Rf541845af3->ICard_GetByStr( $R63bede6b19, "id, ispay, cprice, cardnumber" );
												$R66b0d9d6f1 = 0;
												$R0d9f8f778c = 0;
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																if ( $R0f8134fb60['ispay'] == 0 )
																{
																				$R0d9f8f778c = $R0f8134fb60['cprice'];
																				$R72852f08e6 += $R0d9f8f778c;
																				$R66b0d9d6f1++;
																				$Rf34a38f798[] = $R0f8134fb60['cardnumber'];
																				$R9b8386ca08[] = $R0f8134fb60['id'];
																}
												}
												if ( $agent['aremain'] < $R72852f08e6 )
												{
																$this->Alert( "����, ������������Ч������" );
																$this->HistoryGo( );
												}
												if ( 0 < $R66b0d9d6f1 )
												{
																include_once( UPATH_HELPER."OrderHelper.php" );
																$Rdcd9105806 = createordno( );
																$R56ea904d53 = array(
																				"dollars" => $R72852f08e6,
																				"cprice" => $R0d9f8f778c,
																				"ordno" => $Rdcd9105806,
																				"qty" => $R66b0d9d6f1,
																				"pname" => "��Чһ��ͨ:".implode( ",", $Rf34a38f798 )
																);
																$this->Money( $R56ea904d53 );
																$Rf351f6e099 = array( );
																$Rf351f6e099[] = " okbyaid=1 and bindaid=".$R2a51483b14;
																$Raf6dee234f = implode( ",", $R9b8386ca08 );
																if ( $R63bede6b19 != "" )
																{
																				$Rf351f6e099[] = " id in (".$Raf6dee234f.")";
																}
																$Raf6dee234f = implode( " and ", $Rf351f6e099 );
																$data = array( "ispay" => 1 );
																$Rf541845af3->ICard_UpdateByStr( $data, $Raf6dee234f );
																$R599025cc6a = $this->GetSysById( 25 );
																if ( $R599025cc6a )
																{
																				$R3db8f5c8bc = $Rf541845af3->ICard_GetByStr( $Raf6dee234f, "*" );
																				foreach ( $R3db8f5c8bc as $R0f8134fb60 )
																				{
																								$R0f8134fb60['cardpwd'] = base64_decode( $R0f8134fb60['cardpwd'] );
																								$R5c04831f87[] = $R0f8134fb60;
																				}
																}
												}
								}
								$data = array(
												"cardok" => intval( request( "makeok" ) )
								);
								$Rf541845af3->ICard_UpdateByStr( $data, $R63bede6b19 );
								if ( $R8746128071 == 1 && 0 < count( $R5c04831f87 ) )
								{
												$this->Assign( "items", $R5c04831f87 );
											
																$this->View( );
												
												$this->Alert( "�����ɹ���" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_agent&c=ykt&nrows=100" );
								}
				}

				public function Order( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								if ( strtolower( request( "stype" ) ) == "bindaid" )
								{
												$this->Alert( "��Ч��" );
												$this->HistoryGo( );
								}
								$this->hander = factory::getinstance( "trades" );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Ra8b176bf4f = 100;
								$R901a6b96db = intval( request( "state", 5 ) );
								$data = array(
												"ykt" => getvar( "ykt" ),
												"tradetype" => $Ra8b176bf4f,
												"admname" => getvar( "admname" ),
												"noykt" => 0,
												"isrewardtrade" => 1,
												"bindaid" => $R2a51483b14
								);
								if ( -2 < $R901a6b96db )
								{
												$data['state'] = $R901a6b96db;
								}
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(reward) as reward,sum(realreward) as realreward" );
								$this->Assign( "record", $R0d2025d631 );
								$R00be52aa45 = array( "ordno" => "������", "yktnumber" => "һ��ͨ����", "content" => "��Ʒ" );
								$R8dc7d3eb73 = array( "0" => "����ƽ̨", "1" => "����", "2" => "����", "3" => "һ��ͨ" );
								if ( $Ra8b176bf4f == 11 )
								{
												$R4fa9c48c92 = array( "11" => "�㿨���ײ����Ĵ�������" );
								}
								else if ( $Ra8b176bf4f == 12 )
								{
												$R4fa9c48c92 = array( "12" => "��������" );
								}
								else
								{
												$R4fa9c48c92 = array( "1,2,21,22,31,32,98,99,101,100" => "��������", "1" => "��ͨ�㿨����", "2" => "�û�������ֵ", "21" => "���������", "22" => "����˽��", "31" => "ת�������", "32" => "����ת�����", "98" => "�ʽ���������Ľ��׼�¼", "99" => "ϵͳ���ҳ�ֵ", "100" => "һ��ͨ�һ�����¼", "101" => "һ��ͨ��ֵ��¼", "31,32" => "����ת���¼", "21,22" => "���д���/����¼" );
								}
								$this->Assign( "tradetypes", $R4fa9c48c92 );
								$this->Assign( "tradetype", getvar( "tradetype" ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( getvar( "comefrom", 0 ) ) );
							
												$this->view( );
								
				}

				public function RewardTrade( )
				{
								$this->Order( );
				}

				public function Reward( )
				{
								include_once( UPATH_HELPER."ProductHelper.php" );
								$Rd2e691562d = getvar( "catid", "" );
								if ( $Rd2e691562d != "" )
								{
												$Rd2e691562d = intval( $Rd2e691562d );
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$agent = $this->GetAgentCache( $R2a51483b14 );
								if ( isset( $agent['rewardtpl'] ) )
								{
												$this->UpdateCache( "agents", array(
																"arg1" => $R2a51483b14
												) );
												$agent = $this->GetAgentCache( $R2a51483b14 );
								}
								$R29a6818ba2 = intval( $agent['rewardtpl'] );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"ptype" => getvar( "ptype", "" ),
												"begprice" => getvar( "begprice", "" ),
												"endprice" => getvar( "endprice", "" ),
												"hassup" => getvar( "hassup" ),
												"sup" => intval( request( "sup" ) ),
												"catid" => $Rd2e691562d,
												"aid" => $R2a51483b14,
												"allaid" => $Rfff462d8f8,
												"rewardtpl" => $R29a6818ba2
								);
								$data = array_merge( $data, $R71a664ef8c );
								$this->hander = factory::getinstance( "reward" );
								$R4e420efcc3 = $this->hander->IReward_ProductPage( $data, "*" );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "-1" => "ȫ������", "0" => "������Ʒ", "1" => "�Զ���ֵ", "2" => "������Ʒ" );
								$R63bede6b19 = $Rfff462d8f8 == 1 ? "aid > 0" : "aid < 1";
								$this->Recycle( "products", $R63bede6b19 );
								$this->Assign( "ptype", getvar( "ptype", -1 ) );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
						
												$this->view( );
								
				}

				public function Money( $R56ea904d53 = array( ) )
				{
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$R4f39743f74 = $R56ea904d53['cprice'];
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = $Rcc5c6e696c[9];
								$R0dc0347d49 = 0 < $R94e0136c8a ? $R94e0136c8a : $R2a51483b14;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain,acsmp" );
								$R98bc1630cd = $agent['aremain'] - $R9b252bf0a7;
								if ( $R98bc1630cd < 0 )
								{
												$this->alert( "���������㣡�벹�������ٹ���" );
												return false;
								}
								$Rcc5c6e696c[6] = $R98bc1630cd;
								$this->session->set( "agentinfo", implode( "|", $Rcc5c6e696c ) );
								$Re90242a509 = $agent['acsmp'] + $R9b252bf0a7;
								$data = array(
												"aremain" => $R98bc1630cd,
												"acsmp" => $Re90242a509
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R3ab1f9eb35 = $agent['aremain'];
												$Rc0c42883ee = $R98bc1630cd;
												$this->UpdateTrade( $R2a51483b14, 60, $R56ea904d53['ordno'], $R0dc0347d49, $R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], 0, 0, $Rc0c42883ee, $R3ab1f9eb35, $R4f39743f74, $R9b252bf0a7 );
												return true;
								}
								else
								{
												$this->alert( "�ۿ�ʧ�ܣ��������µ���" );
												return false;
								}
				}

				public function PayTrade( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R94e0136c8a = 0;
								include_once( UPATH_HELPER."OrderHelper.php" );
								$this->hander = factory::getinstance( "trades" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"ordno" => getvar( "ordno" ),
												"yktnumber" => getvar( "yktnumber" ),
												"ykt" => getvar( "ykt" ),
												"aid" => $R2a51483b14,
												"tradetype" => "60",
												"state" => 5
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0] );
								$this->FillPage( $data, $R4e420efcc3 );
							
												$this->View( );
								
				}

}

?>
