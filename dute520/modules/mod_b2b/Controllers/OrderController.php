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
class OrderController extends Controller
{

				public $hander = NULL;
				public $action = NULL;
				public $service = NULL;
				public $rollbackcan = NULL;
				public $ishistory = NULL;
				public $ordertable = NULL;
				public $tradetable = NULL;

				public function __construct( )
				{
								$this->ishistory = intval( request( "ishistory" ) ) == 1 ? "history" : "";
								$this->ordertable = "orders".$this->ishistory;
								$this->tradetable = "trades".$this->ishistory;
								$this->service = factory::getservice( "sorders" );
								$this->hander = factory::getinstance( $this->ordertable );
								$this->action = array( "ordlist", "orddel", "orddetail", "profit", "ordcheck" );
								$this->rollbackcan = false;
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$Ra0c8454e75 = $Rff0cc71a1d->adminrights;
								$R1d47c61d5b = array( );
								if ( $Rff0cc71a1d->adminrank == 1 )
								{
												$R1d47c61d5b[] = -1;
								}
								else
								{
												if ( $Ra0c8454e75[39] == 1 )
												{
																$R1d47c61d5b[] = 0;
												}
												if ( $Ra0c8454e75[40] == 1 )
												{
																$R1d47c61d5b[] = 1;
												}
												if ( $Ra0c8454e75[41] == 1 )
												{
																$R1d47c61d5b[] = 2;
												}
								}
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( UPATH_HELPER."ProductHelper.php" );
								$R15a0359c8c = getvar( "stype" );
								if ( $R15a0359c8c == "cardnumber" )
								{
												$Ra09fe38af3 = trim( getvar( "keywords" ) );
												$GLOBALS['_REQUEST']['stype'] = "pname";
												$GLOBALS['_REQUEST']['keywords'] = "";
												if ( $Ra09fe38af3 != "" )
												{
																$Rf541845af3 = factory::getinstance( "cards" );
																$Rcc5c6e696c = explode( "|", $Ra09fe38af3 );
																$Rf5f11a8d38 = count( $Rcc5c6e696c );
																if ( $Rf5f11a8d38 == 1 )
																{
																				if ( trim( $Rcc5c6e696c[0] ) != "" )
																				{
																								$data['cardnumber'] = $Rcc5c6e696c[0];
																				}
																}
																else if ( 1 < $Rf5f11a8d38 )
																{
																				if ( trim( $Rcc5c6e696c[0] ) != "" )
																				{
																								$data['cardnumber'] = trim( $Rcc5c6e696c[0] );
																				}
																				if ( trim( $Rcc5c6e696c[1] ) != "" )
																				{
																								$data['cardpwd'] = base64_encode( trim( $Rcc5c6e696c[1] ) );
																				}
																}
																if ( isset( $data['cardnumber'] ) || isset( $data['cardpwd'] ) )
																{
																				$R0f8134fb60 = $Rf541845af3->ICard_GetByLimit( $data, "ordno,otherordno,ptype" );
																				if ( isset( $R0f8134fb60['ordno'] ) )
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								if ( $R0f8134fb60['ptype'] < 99 )
																								{
																												$GLOBALS['_REQUEST']['keywords'] = $R0f8134fb60['ordno'];
																								}
																								else
																								{
																												$GLOBALS['_REQUEST']['keywords'] = $R0f8134fb60['otherordno'];
																								}
																				}
																				else
																				{
																								$GLOBALS['_REQUEST']['stype'] = "ordno";
																								$GLOBALS['_REQUEST']['keywords'] = "nokey";
																				}
																}
												}
								}
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R1e3bc50f23 = $this->DateSet( "order" );
								$R71a664ef8c = $this->PageInfo( );
								$R696350cab3 = request( "startdate" );
								$R36130a8639 = getvar( "optype" );
								$Rae1b02c731 = getvar( "czaccount", "" );
								if ( $Rae1b02c731 != "" && $R36130a8639 == "" )
								{
												$R36130a8639 = "cz";
								}
								$R58bca74885 = array(
												"optype" => $R36130a8639,
												"cname" => getvar( "ubzcname" ),
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"aname" => getvar( "aname" ),
												"pname" => urlencode( getvar( "pname" ) ),
												"aid" => $R2a51483b14,
												"cqq" => getvar( "cqq" ),
												"ctel" => getvar( "ctel" ),
												"cmail" => getvar( "cmail" ),
												"czaccount" => $Rae1b02c731,
												"cip" => getvar( "cip" ),
												"payment" => getvar( "payment" ),
												"allaid" => $Rfff462d8f8,
												"right" => $R1d47c61d5b
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$R657cac7ff2 = intval( request( "export" ) );
								if ( 0 < $R657cac7ff2 )
								{
												$this->export( $data, $R657cac7ff2 );
								}
								if ( request( "nrows", "" ) == "" )
								{
												if ( isset( $_COOKIE['onrow'] ) && 0 < intval( $_COOKIE['onrow'] ) )
												{
																$data['nrows'] = intval( $_COOKIE['onrow'] );
												}
								}
								else
								{
												$R42c553e7de = isset( $_COOKIE['onrow'] ) ? intval( $_COOKIE['onrow'] ) : 15;
												if ( $R42c553e7de != $data['nrows'] )
												{
																setcookie( "onrow", "", time( ) - 3600 );
																setcookie( "onrow", $data['nrows'], time( ) + 31536000 );
												}
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "adiis" ) ) ) );
								$R00be52aa45 = array( "ordno" => "������", "cid" => "�û����", "pid" => "��Ʒ���", "remarks" => "������ע", "aname" => "�û���", "cname" => "������", "pname" => "��Ʒ��", "cqq" => "QQ��", "ctel" => "�绰", "cmail" => "����", "czaccount" => "��ֵ�ʺ�", "cip" => "IP", "cardnumber" => "����", "admname" => "�������Ա" );
								$R8dc7d3eb73 = array( "0" => "����ƽ̨", "1" => "����", "2" => "����", "3" => "һ��ͨ" );
								$R4d5c62f7b3 = array( "" => "ȫ������", "w|cz" => "����ֵ����", "s|cz" => "�ɹ�����", "u|cz" => "ʧ�ܶ���", "sd|w" => "δ�����ֹ�", "sd|d" => "δ��ֵ�ֹ�", "sd" => "�ֹ���¼" );
								$this->Assign( "tradedata", $Rbf6c8991d9 );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "oarray", $R4d5c62f7b3 );
								$this->Assign( "otype", request( "optype" ) );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "comefrom", intval( request( "comefrom", 0 ) ) );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
						
												$this->View( );
						
				}

				public function export( $data, $R657cac7ff2 = 1 )
				{
								$R3db8f5c8bc = $this->hander->IOrder_GetByPageLimit( $data, "ordno,pid,pname" );
								$R3d36631c17 = $R657cac7ff2 == 1 ? "excel" : "csv";
								$R7ca55aed77 = factory::getfs( $R3d36631c17 );
								$R7ca55aed77->output( $R3db8f5c8bc, "order-data" );
								exit( );
				}

				public function getmicrotime( )
				{
								list( $R1a6803c2a5, $R39ad040863 ) = explode( " ", microtime( ) );
								return ( double )$R1a6803c2a5 + ( double )$R39ad040863;
				}

				public function CzList( )
				{
								$this->Index( );
				}

				public function Chart( )
				{
								$data = array( );
								$R7fda5ccb82 = intval( request( "range", 7 ) ) - 1;
								$Ra16d228039 = $R7fda5ccb82;
								for ( ;	0 <= $Ra16d228039;	--$Ra16d228039	)
								{
												$data[date( "m/d", strtotime( "-".$Ra16d228039." days" ) )] = date( "Y-m-d", strtotime( "-".$Ra16d228039." days" ) );
								}
								$R3db8f5c8bc = $this->hander->IOrder_RowsByDate( $data );
								$this->Assign( "items", $R3db8f5c8bc );
								$this->Assign( "range", $R7fda5ccb82 + 1 );
						
												$this->View( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function HiddenNum( $R63bede6b19 )
				{
								$Rf5f11a8d38 = strlen( $R63bede6b19 );
								if ( 6 < $Rf5f11a8d38 )
								{
												$R63bede6b19 = substr_replace( $R63bede6b19, "**********", 3, $Rf5f11a8d38 - 6 );
								}
								else if ( $Rf5f11a8d38 < 7 && 2 < $Rf5f11a8d38 )
								{
												$R63bede6b19 = substr_replace( $R63bede6b19, "**********", 1, $Rf5f11a8d38 - 2 );
								}
								else if ( 1 < $Rf5f11a8d38 )
								{
												$R63bede6b19 = "**********";
								}
								return $R63bede6b19;
				}

				public function Cetail( )
				{
								$Rdcd9105806 = getvar( "ubzordno" );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "*", 1 );
								$data = array(
												"ordstate" => 3,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								if ( $R0f8134fb60['item']['ordstate'] == 3 )
								{
												$this->Alert( "�Ѿ����˴���˶����������ظ�����" );
												$this->HistoryGo( );
								}
								if ( $R0f8134fb60['item']['ordstate'] == 1 )
								{
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								}
								$this->Assign( "order", $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( "..".DS."libraries".DS."user".DS."ordererrcontent.php" );
								if ( !isset( $ect ) )
								{
												$ect = array( "����ϵͳ�����ά�����޷���ֵ�����Ժ����¹���", "��ֵ�ʻ��������޷���ֵ���������µ�����", "��ֵ���򲻷����޷���ֵ���������µ�����", "��Ʒ��治�㣬������ǲ�������ٹ���", "���ڳ��̻���һЩ���ɿ����أ��޷���ֵ���������ύ����" );
								}
							
												$this->Assign( "ect", $ect );
												$this->View( );
							
				}

				public function Detail( )
				{
								$Rdcd9105806 = getvar( "ubzordno" );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "*", 1 );
								if ( $R0f8134fb60['item']['ptype'] == 0 || 99 < $R0f8134fb60['item']['ptype'] || $R0f8134fb60['item']['ptype'] == 3 )
								{
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['carditem'] = $R83a253518c->ICard_Get( $Rdcd9105806 );
												$R1d47c61d5b = $this->GetAdmRight( 48 );
												if ( $R1d47c61d5b == 0 && 0 < count( $R0f8134fb60['carditem'] ) )
												{
																$R026f0167b4 = array( );
																foreach ( $R0f8134fb60['carditem'] as $Rd45e507c4c )
																{
																				if ( $Rd45e507c4c['cardnumber'] != "" )
																				{
																								$Rd45e507c4c['cardnumber'] = $this->HiddenNum( $Rd45e507c4c['cardnumber'] );
																				}
																				if ( $Rd45e507c4c['cardpwd'] != "" )
																				{
																								$Rd45e507c4c['cardpwd'] = $this->HiddenNum( $Rd45e507c4c['cardpwd'] );
																				}
																				$R026f0167b4[] = $Rd45e507c4c;
																}
																$R0f8134fb60['carditem'] = $R026f0167b4;
												}
								}
								if ( $R0f8134fb60['item']['ptype'] == 6 )
								{
												$Raa3f91d2a5 = factory::getinstance( "powerlv" );
												$data = array(
																"ordno" => $Rdcd9105806
												);
												$R0f8134fb60['powerlv'] = $Raa3f91d2a5->IPowerLv_Get( $data );
								}
								if ( 99 < $R0f8134fb60['item']['payment'] )
								{
												$R3a68f04cc2 = factory::getinstance( $this->tradetable );
												$R0f8134fb60['yktcard'] = $R3a68f04cc2->ITrade_GetAll( $Rdcd9105806 );
												$R83a253518c = factory::getinstance( "cards" );
												$R0f8134fb60['yktitem'] = $R83a253518c->ICard_GetByTrade( $Rdcd9105806 );
												if ( 0 < count( $R0f8134fb60['yktitem'] ) )
												{
																include_once( UPATH_HELPER."CardHelper.php" );
												}
								}
								if ( $R0f8134fb60['item']['ordstate'] != 2 && $R0f8134fb60['item']['sup'] != -1 )
								{
												$data = array(
																"ubzordno" => $Rdcd9105806,
																"action" => $this->action[2]
												);
												$this->Assign( "suporder", $this->service->IOrder_Get( $data ) );
								}
								if ( $R0f8134fb60['item']['comefrom'] == 4 )
								{
												$R9f08ef06d5 = factory::getinstance( "tborders" );
												$R404012f0e9 = $R9f08ef06d5->ITBOrder_GetByOrdno( $Rdcd9105806 );
												$this->Assign( "tborder", $R404012f0e9 );
								}
								$this->Assign( "order", $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								include_once( "..".DS."libraries".DS."user".DS."ordererrcontent.php" );
								if ( !isset( $ect ) )
								{
												$ect = array( "����ϵͳ�����ά�����޷���ֵ�����Ժ����¹���", "��ֵ�ʻ��������޷���ֵ���������µ�����", "��ֵ���򲻷����޷���ֵ���������µ�����", "��Ʒ��治�㣬������ǲ�������ٹ���", "���ڳ��̻���һЩ���ɿ����أ��޷���ֵ���������ύ����" );
								}
								$R90a95441bd = $this->GetAdmRight( 53 );
								$R9e79160ed8 = $this->GetAdmRight( 61 );
								$this->Assign( "myadm", $R90a95441bd );
								$this->Assign( "mypwd", $R9e79160ed8 );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "vvcsd" ) ) ) );
				}

				public function Update( )
				{
								$data = array(
												"ordno" => getvar( "ubzordno" )
								);
								$this->hander->IOrder_Update( $data );
								$this->Alert( "���³ɹ�" );
								$this->View( "Index" );
				}

				public function QuickCheck( $Rdcd9105806 )
				{
								$data = array(
												"ordstate" => 3,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "payment,rollback,ordstate,ptype,aname,pid,qty,pname,aid" );
								if ( $Rebd5a5dade['ordstate'] == 3 )
								{
												echo "�Ѿ����˴���˶�����";
												exit( );
								}
								if ( $Rebd5a5dade['ordstate'] == 1 )
								{
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
								}
								return $R808b89ba0e;
				}

				public function QuickCheck3( $Rdcd9105806 )
				{
								$data = array(
												"ordstate" => 2,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "payment,rollback,ordstate,ptype,aname,pid,qty,pname,aid,comefrom" );
								$R808b89ba0e = true;
								if ( $Rebd5a5dade['ordstate'] == 3 || $Rebd5a5dade['ordstate'] == 1 )
								{
												if ( trim( $Rebd5a5dade['aname'] ) == "" )
												{
																$R60144b28c1 = 0;
												}
												else if ( $Rebd5a5dade['payment'] == 98 )
												{
																$R60144b28c1 = $this->AgentProfit( $Rebd5a5dade['aname'], $Rebd5a5dade['pid'], $Rebd5a5dade['qty'], $Rdcd9105806, $Rebd5a5dade['pname'] );
												}
												else
												{
																$R60144b28c1 = 0;
												}
												$data['agentprofit'] = $R60144b28c1;
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
												if ( $Rebd5a5dade['payment'] == 96 )
												{
																$data = array(
																				"ordstate" => 2,
																				"dealdate" => date( "Y-m-d H-i-s" ),
																				"admname" => $sess->admin
																);
																$Rf3d646c485 = factory::getinstance( "scoredorder" );
																$R808b89ba0e = $Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
												}
												if ( $Rebd5a5dade['comefrom'] == 4 )
												{
																$this->TbCheck( $Rdcd9105806 );
												}
								}
								return $R808b89ba0e;
				}

				public function Check( )
				{
								$R63bede6b19 = "";
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$R4ef2186fef = getvar( "failreason" );
								$Rb988dfa93e = htmlspecialchars( getvar( "factoryreturn", "" ) );
								$R922c035b87 = intval( request( "rollback" ) );
								$Rdcd9105806 = getvar( "ubzordno" );
								$data = array(
												"ordstate" => $Rbdf46d6e43,
												"failreason" => $R4ef2186fef,
												"factoryreturn" => $Rb988dfa93e,
												"rollback" => $R922c035b87,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "ordno,payment,rollback,ordstate,ptype,aname,pid,qty,pname,aid,cname,scored,aid,cid,fee,cprice,dollars,price,comefrom,profit,comefrom" );
								if ( !isset( $Rebd5a5dade['payment'] ) )
								{
												$this->Alert( "�����Ѿ�ɾ�����߲����ڣ�����ֹͣ��" );
												$this->HistoryGo( );
								}
								if ( $Rebd5a5dade['ordstate'] == 2 )
								{
												$Rff0cc71a1d = factory::getinstance( "session" );
												if ( 1 < $Rff0cc71a1d->adminrank && $this->GetAdmRight( 53 ) == 0 )
												{
																$this->Alert( "��û�д���˶�����Ȩ�ޣ�����ϵ��������Ա" );
																$this->HistoryGo( );
												}
								}
								$Rb60574d852 = $Rebd5a5dade['payment'];
								$R0b14cc7367 = $Rebd5a5dade['rollback'];
								$R4bef9862f8 = $Rebd5a5dade['ordstate'];
								$R1b69c92460 = $Rebd5a5dade['ptype'];
								$R2a51483b14 = $Rebd5a5dade['aid'];
								if ( $R0b14cc7367 == 1 )
								{
												$data['rollback'] = 1;
								}
								$R105a79440a = factory::getinstance( "ack" );
								$this->rollbackcan = $R105a79440a->CanRollBack( $Rdcd9105806 );
								if ( $Rb60574d852 == 100 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$this->CheckTradePwd( );
																if ( $this->rollbackcan )
																{
																				$this->RollBack( $Rdcd9105806 );
																}
																$R63bede6b19 = "�����˿�ɹ���";
												}
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 1 && $this->rollbackcan == false )
												{
																$R63bede6b19 = "�˶���֮ǰ�Ѿ��˿���β��������ظ��˿�";
												}
								}
								if ( $Rb60574d852 == 98 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$this->CheckTradePwd( );
																if ( $this->rollbackcan )
																{
																				$R808b89ba0e = $this->RollBackAgentMoney( $Rdcd9105806 );
																				if ( !$R808b89ba0e )
																				{
																								$this->HistoryGo( );
																				}
																}
																else
																{
																				$R63bede6b19 = "�˶���֮ǰ�Ѿ��˿���β��������ظ��˿�";
																}
												}
												if ( $Rbdf46d6e43 == 2 && ( $R4bef9862f8 = $UN_1 || $R4bef9862f8 == 3 ) )
												{
																if ( $this->rollbackcan )
																{
																				$R60144b28c1 = $this->AgentProfit( $Rebd5a5dade['aname'], $Rebd5a5dade['pid'], $Rebd5a5dade['qty'], $Rdcd9105806, $Rebd5a5dade['pname'] );
																				$data['agentprofit'] = $R60144b28c1;
																				if ( $Rebd5a5dade['profit'] < $R60144b28c1 )
																				{
																								$this->Alert( "��Ʒ�۸������⵼�´�������������ֶ��鿴���󱨱����п۳���" );
																				}
																				if ( 0 < $R2a51483b14 )
																				{
																								$Rebd5a5dade['agentprofit'] = $R60144b28c1;
																								$R105a79440a = factory::getinstance( "ack" );
																								$R2903714d94 = $R105a79440a->UpdateSup( $Rebd5a5dade );
																								$data = array_merge( $data, $R2903714d94 );
																				}
																}
																if ( $Rebd5a5dade['comefrom'] == 4 )
																{
																				$this->TbCheck( $Rdcd9105806 );
																}
												}
								}
								if ( $Rbdf46d6e43 == 2 && ( $R4bef9862f8 = $UN_1 || $R4bef9862f8 == 3 ) && $Rebd5a5dade['cname'] != "" && $Rb60574d852 != 96 && $this->rollbackcan )
								{
												$this->AgentScored( $Rebd5a5dade );
								}
								if ( $R4bef9862f8 = 1 )
								{
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
								}
								if ( $Rb60574d852 == 96 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$this->CheckTradePwd( );
																if ( $this->rollbackcan )
																{
																				$R808b89ba0e = $this->RollBackAgentScored( $Rdcd9105806 );
																				if ( !$R808b89ba0e )
																				{
																								$this->HistoryGo( );
																				}
																}
																else
																{
																				$R63bede6b19 = "�˶���֮ǰ�Ѿ��˿���β��������ظ��˿�";
																}
												}
												$Rf3d646c485 = factory::getinstance( "scoredorder" );
												$R85af19fea1 = array(
																"ordstate" => $Rbdf46d6e43
												);
												$Rf3d646c485->IScoredOrder_Update( $R85af19fea1, $Rdcd9105806 );
								}
								$this->hander->IOrder_Update( $data, getvar( "ubzordno" ) );
								$this->Alert( "���³ɹ�".$R63bede6b19 );
								$Rf134fa1665 = request( "ref" );
								if ( $Rf134fa1665 == "czlist" )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Order&a=CzList&optype=sd|w&by=1&aid=-2" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=order&a=detail&ubzordno=".$Rdcd9105806 );
								}
				}

				public function CheckTradePwd( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "pwdconfig,tradepwd" );
								$R8eeb1221ae = explode( "|", $R25791b03ad['pwdconfig'] );
								$Rff0cc71a1d = factory::getinstance( "session" );
								if ( 1 < $Rff0cc71a1d->adminrank && $this->GetAdmRight( 61 ) == 1 )
								{
												return;
								}
								if ( $R8eeb1221ae[0] == 1 )
								{
												$R48aa85bc4e = getvar( "tradepwd" );
												if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
												{
																$this->Alert( "����ĺ�̨��ֵ���벻��ȷ�����������룡" );
																$this->HistoryGo( );
												}
								}
				}

				public function RollBack( $Rdcd9105806 )
				{
								$R808b89ba0e = true;
								if ( $R808b89ba0e )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$R21ef3485d7 = $Rf541845af3->ICard_GetByTrade( $Rdcd9105806 );
												foreach ( $R21ef3485d7 as $R0f8134fb60 )
												{
																$R72852f08e6 = $R0f8134fb60['money'] + $R0f8134fb60['outcome'];
																$data = array(
																				"money" => $R72852f08e6,
																				"cardok" => 1
																);
																$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
												}
												$Rae8a26f24a = factory::getinstance( $this->tradetable );
												$data = array( "state" => -1 );
												$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

				public function RollBackAgentScored( $Rdcd9105806 )
				{
								$Rf3d646c485 = factory::getinstance( "scoredorder" );
								$R61a8cd51a4 = $Rf3d646c485->IScoredOrder_Get( $Rdcd9105806 );
								if ( !isset( $R61a8cd51a4['scored'] ) )
								{
												$this->Alert( "�˿�ʧ�ܣ��������˿�" );
												return false;
								}
								$R2a51483b14 = $R61a8cd51a4['aid'];
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14 );
								$R114f28ca48 = $R61a8cd51a4['scored'];
								$R3ab1f9eb35 = $agent['scored'];
								$Rc0c42883ee = $R3ab1f9eb35 + $R114f28ca48;
								$data = array(
												"scored" => $Rc0c42883ee
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$data = array(
																"ordstate" => -1,
																"failreason" => "����ʧ�ܻ��ֵ��Ѿ������û�",
																"factoryreturn" => "",
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $Rdcd9105806 );
												$data = array( "ordstate" => -1 );
												$Rf3d646c485->IScoredOrder_Update( $data, $Rdcd9105806 );
												$R645c69ff15 = factory::getinstance( "scored" );
												$data = array(
																"ordno" => $Rdcd9105806,
																"pname" => "[�����˿�]".$R61a8cd51a4['pname'],
																"qty" => $R61a8cd51a4['qty'],
																"scored" => $R114f28ca48,
																"fat" => $Rc0c42883ee,
																"fbt" => $R3ab1f9eb35,
																"aid" => $R2a51483b14,
																"staffid" => $R61a8cd51a4['staffid'],
																"createdate" => date( "Y-m-d H-i-s" ),
																"state" => -1,
																"method" => $R61a8cd51a4['method']
												);
												$R645c69ff15->IScored_Create( $data );
												$data = array( "state" => -1 );
												$R645c69ff15->IScored_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

				public function RollBackAgentMoney( $Rdcd9105806 )
				{
								$R56ea904d53 = $this->hander->IOrder_Get( $Rdcd9105806 );
								$R3a8b307327 = $this->GetDec( );
								$R808b89ba0e = true;
								if ( 0 < $R56ea904d53['aid'] )
								{
												$R808b89ba0e = $this->RollBackFunds( $R56ea904d53['aid'], $R56ea904d53['ownermoney'], $Rdcd9105806, $R56ea904d53 );
								}
								if ( $R808b89ba0e )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_GetByName( $R56ea904d53['aname'] );
												$R55c494bb27 = $this->GetProductCache( $R56ea904d53['pid'] );
												$R4f39743f74 = $R56ea904d53['cprice'];
												$R2a51483b14 = $agent['aid'];
												$R9b252bf0a7 = $R56ea904d53['dollars'];
												if ( $R56ea904d53['dollars'] < 0 )
												{
																return true;
												}
												$R98bc1630cd = $agent['aremain'] + $R9b252bf0a7;
												$Re90242a509 = $agent['acsmp'] - $R9b252bf0a7;
												$data = array(
																"aremain" => $R98bc1630cd,
																"acsmp" => $Re90242a509
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																$this->UpdateRank( $R56ea904d53['aname'], "-".$R56ea904d53['dollars'] );
																$data = array(
																				"ordstate" => -1,
																				"failreason" => "����ʧ��[�Ѿ��˿�]",
																				"factoryreturn" => "",
																				"rollback" => 1,
																				"dealdate" => date( "Y-m-d H-i-s" )
																);
																$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
																$R3ab1f9eb35 = $agent['aremain'];
																$Rc0c42883ee = $R98bc1630cd;
																$this->UpdateTrade( $R2a51483b14, 1, $R56ea904d53['ordno'], 0, "(����ʧ���˿�)".$R56ea904d53['pname'], $R4f39743f74, $R56ea904d53['qty'], $R9b252bf0a7, 0, $Rc0c42883ee, $R3ab1f9eb35, $R9b252bf0a7, 0 );
																$Rae8a26f24a = factory::getinstance( $this->tradetable );
																$data = array( "state" => -1 );
																$Rae8a26f24a->ITrade_UpdateByOrdno( $data, $Rdcd9105806 );
																return true;
												}
												else
												{
																$this->Alert( "�˿�ʧ�ܣ��������˿�" );
																return false;
												}
								}
								else
								{
												return false;
								}
				}

				public function RollBackFunds( $R2a51483b14, $R9b252bf0a7, $Rdcd9105806, $R56ea904d53 )
				{
								$R0dc0347d49 = 0;
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "funds,aid,aremain" );
								$Rd8fb5ae7df = $agent['funds'] - $R9b252bf0a7;
								if ( $Rd8fb5ae7df < 0 )
								{
												$this->Alert( "���Ĺ������ý��̫�٣����β����޷����У���Ѷ�Ӧ�����̵����ת�����Ĺ������ã��ٽ����˿������" );
												return false;
								}
								$data = array(
												"funds" => $Rd8fb5ae7df
								);
								$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
								if ( $R808b89ba0e )
								{
												$R65edce27dd = $R56ea904d53['pname'];
												$R66b0d9d6f1 = $R56ea904d53['qty'];
												$R63d0786ecc = round( $R9b252bf0a7 / $R66b0d9d6f1, 3 );
												$this->UpdateTrade( $agent['aid'], 12, $Rdcd9105806, $agent['aid'], "[����ȡ��]".$R65edce27dd, $R63d0786ecc, $R66b0d9d6f1, 0, $agent['aid'], $Rd8fb5ae7df, $agent['funds'], $R9b252bf0a7, $R9b252bf0a7 );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function AgentScored( $R56ea904d53 )
				{
								$R88f9731c8f = $R56ea904d53['scored'];
								if ( 0 < $R88f9731c8f && $R56ea904d53['aid'] != $R56ea904d53['cid'] && 0 < $R56ea904d53['cid'] )
								{
												$R2a51483b14 = $R56ea904d53['cid'];
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "scored,aname" );
												$Re6dea2fc8d = $agent['scored'];
												$R386bfdf511 = $Re6dea2fc8d + $R56ea904d53['scored'];
												$data = array(
																"scored" => $R386bfdf511
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $R2a51483b14 );
												if ( $R808b89ba0e )
												{
																if ( $agent['aname'] == $R56ea904d53['cname'] )
																{
																				$R94e0136c8a = 0;
																}
																else
																{
																				$R5f84c47438 = factory::getinstance( "staffs" );
																				$Raac42e4217 = $R5f84c47438->IStaff_GetByName( $R56ea904d53['cname'], "staffid" );
																				if ( !isset( $Raac42e4217['staffid'] ) )
																				{
																								$R94e0136c8a = 0;
																				}
																				else
																				{
																								$R94e0136c8a = $Raac42e4217['staffid'];
																				}
																}
																$data = array(
																				"ordno" => $R56ea904d53['ordno'],
																				"pname" => $R56ea904d53['pname'],
																				"qty" => $R56ea904d53['qty'],
																				"scored" => $R56ea904d53['scored'],
																				"fat" => $R386bfdf511,
																				"fbt" => $Re6dea2fc8d,
																				"aid" => $R2a51483b14,
																				"staffid" => $R94e0136c8a,
																				"createdate" => date( "Y-m-d H-i-s" ),
																				"state" => 5,
																				"method" => 3
																);
																$R645c69ff15 = factory::getinstance( "scored" );
																$R808b89ba0e = $R645c69ff15->IScored_Create( $data );
												}
								}
				}

				public function RollBackCMoney( $Rdcd9105806 )
				{
								$R56ea904d53 = $this->hander->IOrder_Get( $Rdcd9105806 );
								$Rfd16c2c8b2 = factory::getinstance( "customers" );
								$R4117bd9c2f = $Rfd16c2c8b2->ICustomer_GetByName( $R56ea904d53['cname'] );
								$R6cd996866e = $R4117bd9c2f['cid'];
								$R9b252bf0a7 = $R56ea904d53['dollars'];
								$R98bc1630cd = $R4117bd9c2f['cremain'] + $R9b252bf0a7;
								$R26d1a303ed = $R4117bd9c2f['ccsmp'] - $R9b252bf0a7;
								$data = array(
												"cremain" => $R98bc1630cd,
												"ccsmp" => $R26d1a303ed
								);
								$R808b89ba0e = $Rfd16c2c8b2->ICustomer_Update( $data, $R6cd996866e );
								if ( $R808b89ba0e )
								{
												$this->UpdateCRank( $R56ea904d53['cname'], "-".$R56ea904d53['dollars'] );
												$data = array(
																"ordstate" => -1,
																"failreason" => "����ʧ���Ѿ��˿��Ա�˻�",
																"factoryreturn" => "",
																"rollback" => 1,
																"dealdate" => date( "Y-m-d H-i-s" )
												);
												$this->hander->IOrder_Update( $data, $R56ea904d53['ordno'] );
												return true;
								}
								else
								{
												return false;
								}
				}

				public function UpdateCRank( $R45074ab3da, $R72852f08e6 )
				{
								$R24b7331256 = factory::getinstance( "customers" );
								$Ra0111259fe = $R24b7331256->ICustomer_GetByName( $R45074ab3da, "ccsmp, clv, cid" );
								$R26d1a303ed = $R72852f08e6 + $Ra0111259fe['ccsmp'];
								$R046b4585a2 = $this->GetRank1( $R26d1a303ed );
								if ( !isset( $R046b4585a2['id'] ) )
								{
												return 2;
								}
								if ( $Ra0111259fe['clv'] == $R046b4585a2 )
								{
												return 2;
								}
								else
								{
												$data = array(
																"clv" => $R046b4585a2['id']
												);
												$R808b89ba0e = $R24b7331256->ICustomer_Update( $data, $Ra0111259fe['cid'] );
												if ( $R808b89ba0e )
												{
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function UpdateRank( $R45074ab3da, $R72852f08e6 )
				{
								$R2097a8fddf = factory::getinstance( "agents" );
								$agent = $R2097a8fddf->IAgent_GetByName( $R45074ab3da, "acsmp, alv, aid, parentid" );
								$Re90242a509 = $agent['acsmp'] + $R72852f08e6;
								$R046b4585a2 = $this->GetRank1( $Re90242a509, "name,id" );
								if ( !isset( $R046b4585a2['id'] ) )
								{
												return 2;
								}
								if ( 0 < $agent['parentid'] )
								{
												$R9aa102385f = $R2097a8fddf->IAgent_GetByName( $agent['parentid'], "alv" );
												$Rbe5b8dea24 = $R9aa102385f['alv'];
												if ( $R046b4585a2['id'] == $Rbe5b8dea24 )
												{
																return 2;
												}
								}
								if ( $agent['alv'] == $R046b4585a2['id'] )
								{
												return 2;
								}
								else
								{
												$data = array(
																"alv" => $R046b4585a2['id']
												);
												$R808b89ba0e = $R2097a8fddf->IAgent_Update( $data, $agent['aid'] );
												if ( $R808b89ba0e )
												{
																return 0;
												}
												else
												{
																return 1;
												}
								}
				}

				public function GetRank1( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R19e774d7fe = factory::getinstance( "ranks" );
								$R046b4585a2 = $R19e774d7fe->IRank_GetByMoney( $R72852f08e6 );
								return $R046b4585a2;
				}

				public function UpdateYkt( $Rdcd9105806 )
				{
								$Rf541845af3 = factory::getinstance( "cards" );
								$Rdeabc7f106 = factory::getinstance( $this->ordertable );
								$R83b9f73ace = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "pname,price,qty" );
								$R21ef3485d7 = $Rf541845af3->ICard_GetByTrade( $Rdcd9105806 );
								foreach ( $R21ef3485d7 as $R0f8134fb60 )
								{
												$data = array( "money" => 0 );
												$Rf541845af3->ICard_Update( $data, $R0f8134fb60['id'] );
												$this->UpdateTradeForYkt( $R0f8134fb60['cardnumber'], $Rdcd9105806, 0, $R0f8134fb60['money'], $R0f8134fb60['money'] );
												$data = array( "cardok" => 1 );
												$Rf541845af3->ICard_UpdateByOrdno( $data, $Rdcd9105806 );
								}
				}

				public function UpdateTradeForYkt( $R1df8368da5, $Rdcd9105806, $Rc0c42883ee, $R3ab1f9eb35, $Rd541ac7c24 )
				{
								$data = array(
												"outcome" => $Rd541ac7c24,
												"fat" => $Rc0c42883ee,
												"fbt" => $R3ab1f9eb35
								);
								$Race6ab87b1 = factory::getinstance( $this->tradetable );
								$Race6ab87b1->ITrade_UpdateByYkt( $data, $Rdcd9105806, $R1df8368da5 );
				}

				public function Del( )
				{
								if ( $this->GetAdmRight( 42 ) == 0 )
								{
												$this->Alert( "��û��ɾ��Ȩ��" );
												$this->HistoryGo( );
								}
								$this->hander->IOrder_DeleteByOrdno( getvar( "ubzordno" ) );
								$this->Alert( "ɾ���ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Order&aid=-1&by=1" );
				}

				public function Dels( )
				{
								if ( $this->GetAdmRight( 42 ) == 0 )
								{
												$this->Alert( "��û��ɾ��Ȩ��" );
												$this->HistoryGo( );
								}
								$this->hander->IOrder_Delete( $this->GetId( "id" ) );
								$this->Alert( "ɾ���ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=order" );
				}

				public function Profit( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R58bca74885 = array(
												"page" => intval( request( "page", 1 ) ),
												"optype" => "succorder"
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->IOrder_Page( $data );
								$data = array_merge( $R58bca74885, $R1e3bc50f23[1] );
								$this->FillPage( $data, $R4e420efcc3 );
								$Reb5e85c827 = $R1e3bc50f23[0];
								$Reb5e85c827['optype'] = "succorder|czorder";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$Rcbc0488598 = isset( $R8c025eb78a[0]['profit'] ) ? $R8c025eb78a[0]['profit'] : 0;
								$Rcbc0488598 -= isset( $R8c025eb78a[0]['agentprofit'] ) ? $R8c025eb78a[0]['agentprofit'] : 0;
								$Reb5e85c827['optype'] = "succorder|kamiorder";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$R2c0a32894d = isset( $R8c025eb78a[0]['profit'] ) ? $R8c025eb78a[0]['profit'] : 0;
								$R2c0a32894d -= isset( $R8c025eb78a[0]['agentprofit'] ) ? $R8c025eb78a[0]['agentprofit'] : 0;
								$Reb5e85c827['optype'] = "succorder";
								$R8c025eb78a = $this->hander->IOrder_Profit( $Reb5e85c827 );
								$R9236a6cf37 = $R8c025eb78a[0];
								$Race8252ffc = round( doubleval( $Rcbc0488598 ) + doubleval( $R2c0a32894d ), 3 );
								$this->Assign( "profit", $Race8252ffc );
								$this->Assign( "czprofit", $Rcbc0488598 );
								$this->Assign( "kmprofit", $R2c0a32894d );
								$this->Assign( "allprofit", $R9236a6cf37 );
							
												$this->view( );
							
				}

				public function Agent( )
				{
								$data = array(
												"page" => intval( request( "page" ) ),
												"keywords" => getvar( "keywords" ),
												"optype" => getvar( "optype" ),
												"cname" => getvar( "ubzcname" ),
												"startyear" => getvar( "startyear" ),
												"startmonth" => intval( request( "startmonth" ) ),
												"startday" => intval( request( "startday" ) ),
												"aid" => intval( request( "aid" ) )
								);
								$R4e420efcc3 = $this->hander->IOrder_PageAgent( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
						
												$this->view( );
						
				}

				public function HasNew( )
				{
								$R3db8f5c8bc = $this->hander->IOrder_GetTop( );
								if ( 0 < $R3db8f5c8bc[0]['count'] )
								{
												echo 1;
								}
				}

				public function DateDiff( $R5b08d4f823, $R5a38c81ec2 = "" )
				{
								switch ( $R5a38c81ec2 )
								{
								case "s" :
												$R2f5c02bbdc = 1;
												break;
								case "i" :
												$R2f5c02bbdc = 60;
												break;
								case "h" :
												$R2f5c02bbdc = 3600;
												break;
								case "d" :
												$R2f5c02bbdc = 86400;
												break;
								default :
												$R2f5c02bbdc = 86400;
								}
								$R5d6b0116e4 = strtotime( "now" );
								$Rd94164fb8c = strtotime( $R5b08d4f823 );
								if ( $R5d6b0116e4 && $Rd94164fb8c )
								{
												return ( double )( $R5d6b0116e4 - $Rd94164fb8c ) / $R2f5c02bbdc;
								}
								return 10000;
				}

				public function CancelOrder( )
				{
								$R63bede6b19 = "";
								$Rbdf46d6e43 = -1;
								$R4ef2186fef = getvar( "failreason" );
								$Rb988dfa93e = "";
								$R922c035b87 = 1;
								$Rdcd9105806 = getvar( "ubzordno" );
								$data = array(
												"ordstate" => $Rbdf46d6e43,
												"failreason" => $R4ef2186fef,
												"factoryreturn" => $Rb988dfa93e,
												"rollback" => $R922c035b87,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "ordno,payment,rollback,ordstate,ptype,aname,pid,qty,pname,aid,cname,scored,aid,cid,fee,cprice,dollars,price,comefrom" );
								$Rb60574d852 = $Rebd5a5dade['payment'];
								$R0b14cc7367 = $Rebd5a5dade['rollback'];
								$R4bef9862f8 = $Rebd5a5dade['ordstate'];
								$R1b69c92460 = $Rebd5a5dade['ptype'];
								$R2a51483b14 = $Rebd5a5dade['aid'];
								$R105a79440a = factory::getinstance( "ack" );
								$this->rollbackcan = $R105a79440a->CanRollBack( $Rdcd9105806 );
								if ( $Rb60574d852 == 100 )
								{
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
												{
																$this->CheckTradePwd( );
																if ( $this->rollbackcan )
																{
																				$this->RollBack( $Rdcd9105806 );
																}
																$R63bede6b19 = "�����˿�ɹ���";
												}
												if ( $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 1 && $this->rollbackcan == false )
												{
																$R63bede6b19 = "�˶���֮ǰ�Ѿ��˿���β��������ظ��˿�";
												}
								}
								if ( $Rb60574d852 == 98 && $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
								{
												$this->CheckTradePwd( );
												if ( $this->rollbackcan )
												{
																$R808b89ba0e = $this->RollBackAgentMoney( $Rdcd9105806 );
																if ( !$R808b89ba0e )
																{
																				$this->HistoryGo( );
																}
												}
												else
												{
																$R63bede6b19 = "�˶���֮ǰ�Ѿ��˿���β��������ظ��˿�";
												}
								}
								$sess = factory::getinstance( "session" );
								$data['admname'] = $sess->admin;
								if ( $Rb60574d852 == 96 && $Rbdf46d6e43 == -1 && $R922c035b87 == 1 && $R0b14cc7367 == 0 )
								{
												$this->CheckTradePwd( );
												if ( $this->rollbackcan )
												{
																$this->RollBackAgentScored( $Rdcd9105806 );
												}
								}
								$this->hander->IOrder_Update( $data, $Rdcd9105806 );
								$this->Alert( "���³ɹ�".$R63bede6b19 );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=order&a=detail&ubzordno=".$Rdcd9105806 );
				}

				public function ReOrder( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806 );
								if ( !$R3db8f5c8bc['ordstate'] )
								{
												echo -1;
												exit( );
								}
								if ( $R3db8f5c8bc['ordstate'] == -1 || $R3db8f5c8bc['ordstate'] == 2 )
								{
												echo 2;
												exit( );
								}
								else if ( $R3db8f5c8bc['ordstate'] == 0 || $R3db8f5c8bc['ordstate'] == 1 )
								{
												$R422f9a4efb = factory::getinstance( "products" );
												$Rb3f07f8c36 = $R422f9a4efb->IProduct_Get( $R3db8f5c8bc['pid'], 1 );
												$R808b89ba0e = $this->CheckQty( $R3db8f5c8bc['qty'], $Rb3f07f8c36, 1 );
												if ( $R808b89ba0e == -1 )
												{
																echo -4;
																exit( );
												}
												$data = array( "ordstate" => 1 );
												if ( $R3db8f5c8bc['sup'] != 1 && $this->IsSup( $R3db8f5c8bc['qty'], $Rb3f07f8c36 ) )
												{
																$data['sup'] = 1;
												}
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $Rdcd9105806 );
												if ( $R808b89ba0e )
												{
																$R920143e856->IOrder_SaveForYkt( $this->GetParam( $R3db8f5c8bc, $Rb3f07f8c36 ) );
																echo 0;
												}
												else
												{
																echo -2;
												}
												exit( );
								}
								else
								{
												echo -3;
												exit( );
								}
				}

				public function GetParam( $R56ea904d53, $Rb3f07f8c36 = array( ) )
				{
								$R0f571378e3 = $Rb3f07f8c36['cztpl'];
								$R61daf1a18c = intval( $Rb3f07f8c36['sale'] );
								if ( $R61daf1a18c == 0 )
								{
												$R0d9f8f778c = $R56ea904d53['cprice'];
												$R63bede6b19 = "";
								}
								else
								{
												$R0d9f8f778c = $Rb3f07f8c36['listprice'];
												$R63bede6b19 = "����-";
								}
								$data = array(
												"ubzordno" => urlencode( $R56ea904d53['ordno'] ),
												"ubzdollars" => $R56ea904d53['dollars'],
												"ubzprice" => $R56ea904d53['price'],
												"ubzcprice" => $R0d9f8f778c,
												"ubzpid" => intval( $R56ea904d53['pid'] ),
												"ubzpname" => urlencode( $R63bede6b19.$R56ea904d53['pname'] ),
												"ubzptype" => urlencode( $R56ea904d53['ptype'] ),
												"ubzcname" => urlencode( $R56ea904d53['cname'] ),
												"ubzcrealname" => urlencode( $R56ea904d53['crealname'] ),
												"ubzctel" => urlencode( $R56ea904d53['ctel'] ),
												"ubzcmail" => urlencode( $R56ea904d53['cmail'] ),
												"ubzcqq" => urlencode( $R56ea904d53['cqq'] ),
												"ubzczacount" => urlencode( $R56ea904d53['czaccount'] ),
												"ubzczarea1" => urlencode( $R56ea904d53['czarea1'] ),
												"ubzczarea2" => urlencode( $R56ea904d53['czarea2'] ),
												"ubzcztype" => urlencode( $R56ea904d53['cztype'] ),
												"ubzczother" => urlencode( $R56ea904d53['czother'] ),
												"ubzca1" => urlencode( $R56ea904d53['ca1'] ),
												"ubzca2" => urlencode( $R56ea904d53['ca2'] ),
												"ubzct" => urlencode( $R56ea904d53['ct'] ),
												"ubzco" => urlencode( $R56ea904d53['co'] ),
												"ubzqty" => intval( $R56ea904d53['qty'] ),
												"ubzcip" => urlencode( $R56ea904d53['cip'] ),
												"ubzurl" => $this->service->GetHost( ).UPATH_WEBROOT,
												"ubzcztpl" => $R0f571378e3
								);
								return $data;
				}

				public function IsSup( $R66b0d9d6f1, $Rb3f07f8c36 = array( ) )
				{
								$R8e8b5578f7 = $Rb3f07f8c36['pid'];
								$R98aa12da5c = $this->GetUmebizPid( $R8e8b5578f7 );
								if ( 0 < $R98aa12da5c )
								{
												if ( $Rb3f07f8c36['hassup'] == 0 && $Rb3f07f8c36['ptype'] != 0 && $Rb3f07f8c36['ptype'] != 3 )
												{
																return 0;
												}
												return 1;
								}
								$Rdc3f776eb3 = $Rb3f07f8c36['stocks'];
								$Rade6d1cee2 = $Rb3f07f8c36['supfirst'];
								if ( UB_SUP == 0 || $Rb3f07f8c36['hassup'] == -1 )
								{
												return 0;
								}
								if ( $Rade6d1cee2 == 0 && $Rdc3f776eb3 < $R66b0d9d6f1 )
								{
												return 1;
								}
								if ( $Rade6d1cee2 == 1 )
								{
												return 1;
								}
								return 0;
				}

				public function GetState( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								$R3db8f5c8bc = $this->hander->IOrder_Get( $Rdcd9105806, "", "", "*" );
								if ( !isset( $R3db8f5c8bc['ordstate'] ) )
								{
												echo -2;
								}
								else
								{
												$Rbdf46d6e43 = $R3db8f5c8bc['ordstate'];
												if ( $Rbdf46d6e43 == 1 )
												{
																$Raba57bd7d6 = $R3db8f5c8bc['sup'];
																if ( $Raba57bd7d6 == 1 )
																{
																				$Re9b5f92229 = factory::getservice( "ack" );
																				$R4b19c1abc4 = $this->GetSign( $Rdcd9105806 );
																				$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc, $R4b19c1abc4 );
																}
																else
																{
																				$Re9b5f92229 = factory::getinstance( "ack" );
																				$Rbdf46d6e43 = $Re9b5f92229->iack( $R3db8f5c8bc );
																}
												}
												echo $Rbdf46d6e43;
								}
				}

				public function GetSign( $Rdcd9105806 )
				{
								$R7bf6de464c = factory::getinstance( "sysnet" );
								$R9a1c862f32 = $R7bf6de464c->ISysnet_Get( );
								$R6afe761ae0 = $this->GetBizKey( );
								$R4b19c1abc4 = md5( $Rdcd9105806.$R9a1c862f32['usign'].$R6afe761ae0 );
								return $R4b19c1abc4;
				}

				public function Err( $data = array( ) )
				{
						
												$this->Assign( "err", $data );
												$this->View( );
						
				}

				public function Respond( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$Rdcd9105806 = getvar( "ordno" );
								$R3db8f5c8bc = $this->Deal( $Rdcd9105806 );
								switch ( $R3db8f5c8bc['err']['errcode'] )
								{
								case "18" :
												echo "18";
												break;
								case "0" :
											
																$this->Assign( "rs", $R3db8f5c8bc );
																$this->View( );
																break;
											
								default :
												$this->View( "err", $R3db8f5c8bc['err'] );
												break;
								}
				}

				public function PowerLvSave( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rdcd9105806 = getvar( "ordno" );
								$R3fdff9ac40 = factory::getinstance( "powerlv" );
								$R22e989667c = getvar( "schedule", "" );
								$R0bd4c030b3 = getvar( "inputer", "" );
								if ( $R22e989667c == "" )
								{
												$this->alert( "���Ȳ���Ϊ�գ�" );
												$this->HistoryGo( );
								}
								$data = array(
												"ordno" => $Rdcd9105806,
												"schedule" => htmlspecialchars( $R22e989667c ),
												"inputer" => $R0bd4c030b3,
												"createdate" => date( "Y-m-d H-i-s" )
								);
								if ( $R3584859062 == 0 )
								{
												$R63bede6b19 = "���";
												$R808b89ba0e = $R3fdff9ac40->IPowerLv_Create( $data );
								}
								else
								{
												$R63bede6b19 = "����";
												$R808b89ba0e = $R3fdff9ac40->IPowerLv_Update( $data, $R3584859062 );
								}
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=order&a=detail&ubzordno=".$Rdcd9105806 );
				}

				public function Deal( )
				{
								$sess = factory::getinstance( "session" );
								$this->Assign( "admname", $sess->admin );
								$this->Index( );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$tpl = getvar( "tpl" );
								$this->View( $tpl );
				}

				public function ItemDeal( )
				{
								$R3584859062 = getvar( "id" );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" || $R3584859062 == 0 )
								{
												echo "��������";
												exit( );
								}
								if ( $param == "ordstate" )
								{
												$R808b89ba0e = $this->QuickCheck( $R3584859062 );
								}
								else if ( $param == "ordstate3" )
								{
												$R808b89ba0e = $this->QuickCheck3( $R3584859062 );
								}
								else
								{
												$R244f38266c = iconv( "UTF-8", "utf-8//IGNORE", $R244f38266c );
												$data = array(
																$param => $R244f38266c
												);
												$R808b89ba0e = $this->hander->IOrder_Update( $data, $R3584859062 );
								}
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�";
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->hander->IOrder_UpdateByStr( $data, $Rb7492a73f7 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "��¼��ԭʧ�ܣ�";
								}
				}

				public function DestroyItems( )
				{
								if ( $this->GetAdmRight( 42 ) == 0 )
								{
												echo "��û��ɾ��������Ȩ�ޣ�����ϵ��������Ա";
												exit( );
								}
								$R15a0359c8c = getvar( "stype", "ordno" );
								$R8cbf2f60f5 = intval( request( "inrecycle" ) );
								$R7965cb3798 = getvar( "keywords" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"optype" => getvar( "optype" ),
												"cname" => getvar( "ubzcname" ),
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"aname" => getvar( "aname" ),
												"pname" => urlencode( getvar( "pname" ) ),
												"aid" => getvar( "aid" ),
												"payment" => getvar( "payment" )
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IOrder_DestroyByStr( $Rb7492a73f7, $data );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "ɾ��ʧ�ܣ�";
								}
				}

				public function GetLit( )
				{
								$R09dfa65bd9 = intval( request( "tablecheckall" ) );
								if ( $R09dfa65bd9 == 1 )
								{
												$Rc0d62c5404 = getvar( "chkexclude" );
												$Rcc5c6e696c = explode( ",", $Rc0d62c5404 );
								}
								else
								{
												$R83e17604b1 = getvar( "chkinclude" );
												$Rcc5c6e696c = explode( ",", $R83e17604b1 );
								}
								$R3db8f5c8bc = array( );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												$R8eeb1221ae = intval( $R0f8134fb60 );
												if ( 0 < $R8eeb1221ae )
												{
																$R3db8f5c8bc[] = $R8eeb1221ae;
												}
								}
								$R3456919727 = implode( ",", $R3db8f5c8bc );
								$Rb7492a73f7 = "";
								if ( $R09dfa65bd9 == 1 )
								{
												if ( $R3456919727 != "" )
												{
																$Rb7492a73f7 = "id not in (".$R3456919727.")";
												}
								}
								else
								{
												if ( $R3456919727 == "" )
												{
																echo "����ѡ����";
																exit( );
												}
												$Rb7492a73f7 = "id in (".$R3456919727.")";
								}
								if ( $Rb7492a73f7 == "" )
								{
												$Rb7492a73f7 = " 1=1 ";
								}
								return $Rb7492a73f7;
				}

				public function DelItems( )
				{
								if ( $this->GetAdmRight( 42 ) == 0 )
								{
												echo "��û��ɾ��������Ȩ�ޣ�����ϵ��������Ա";
												exit( );
								}
								$R15a0359c8c = getvar( "stype", "cname" );
								$R8cbf2f60f5 = intval( request( "inrecycle" ) );
								$R7965cb3798 = getvar( "keywords" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"optype" => getvar( "optype" ),
												"cname" => getvar( "ubzcname" ),
												"comefrom" => intval( request( "comefrom", 0 ) ),
												"aname" => getvar( "aname" ),
												"pname" => urlencode( getvar( "pname" ) ),
												"aid" => getvar( "aid" ),
												"payment" => getvar( "payment" )
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->hander->IOrder_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												echo "";
								}
				}

				public function EctSave( )
				{
								$Rdcd9105806 = getvar( "ordno" );
								if ( $Rdcd9105806 == "" )
								{
												$this->Alert( "�����쳣" );
												$this->HistoryGo( );
								}
								$R63bede6b19 = "<?php \$ect = array(";
								$R47789bd25b = getvar( "ordererrcontent" );
								$R47789bd25b = preg_replace( "/\r\n/", "||", $R47789bd25b );
								$Rcc5c6e696c = explode( "||", $R47789bd25b );
								$R026f0167b4 = array( );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												if ( $R0f8134fb60 != "" )
												{
																$R0f8134fb60 = preg_replace( "/\n\r/", "", $R0f8134fb60 );
																$R026f0167b4[] = "'".$R0f8134fb60."'";
												}
								}
								$R63bede6b19 .= implode( ",", $R026f0167b4 );
								$R63bede6b19 .= "); ?>";
								$R770dcaf6d0 = "..".DS."libraries".DS."user".DS."ordererrcontent.php";
								if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "w" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R63bede6b19 );
								fclose( $Rf500f4a848 );
								$this->Alert( "�������" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=order&a=detail&ubzordno=".$Rdcd9105806 );
				}

				public function Often( )
				{
								$R2fa4b8c965 = getvar( "aname" );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$R58bca74885 = array(
												"ordstate" => 2,
												"optype" => getvar( "state" ),
												"aname" => getvar( "aname" ),
												"pname" => getvar( "pname" ),
												"payment" => getvar( "payment" )
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$data['nrows'] = 2200;
								$R4e420efcc3 = $this->hander->IOrder_Sample( $data );
								$R4e420efcc3 = $this->SetS( array(
												"item" => $R4e420efcc3
								) );
								$R00be52aa45 = array( "cid" => "�û����", "pid" => "��Ʒ���", "aid" => "��Ʒ������", "cname" => "������", "cqq" => "QQ��", "ctel" => "�绰", "cmail" => "����", "czaccount" => "��ֵ�ʺ�", "cip" => "IP", "cardnumber" => "����", "admname" => "�������Ա" );
								$R4d5c62f7b3 = array( "" => "ȫ������", "s" => "�ɹ�����", "u" => "ʧ�ܶ���", "w" => "δ���䶩��", "d" => "δ��ֵ����" );
								$this->Assign( "oarray", $R4d5c62f7b3 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "otype", request( "state" ) );
								$this->Assign( "items", $R4e420efcc3['item'] );
								$this->Assign( "aname", $R2fa4b8c965 );
							
												$this->View( );
							
				}

				public function SetS( $R4e420efcc3 )
				{
								$R026f0167b4 = array( );
								$Rd451e8a5f2 = array( );
								$Rf34a38f798 = array( );
								$R47cfdbac82 = array( );
								$Rf5f11a8d38 = count( $R4e420efcc3['item'] );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R1b69c92460 = $R4e420efcc3['item'][$Ra16d228039]['ptype'];
												$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
												if ( $R1b69c92460 == 0 )
												{
																$Rf34a38f798[] = $R8e8b5578f7;
												}
												else if ( 99 < $R1b69c92460 )
												{
																$Rd451e8a5f2[] = $R8e8b5578f7;
												}
												if ( $this->NeedSup( $R4e420efcc3['item'][$Ra16d228039] ) )
												{
																$R47cfdbac82[] = $R8e8b5578f7;
												}
												$R026f0167b4[] = $R8e8b5578f7;
								}
								$R3359c04a1b = implode( ",", $R026f0167b4 );
								if ( 0 < count( $R026f0167b4 ) )
								{
												include_once( UPATH_HELPER."ProductHelper.php" );
												$R8d364004b1 = count( $Rf34a38f798 );
												$R4fecab2dce = count( $Rd451e8a5f2 );
												$Raaa87f4365 = count( $R47cfdbac82 );
												if ( 0 < $R8d364004b1 || 0 < $R4fecab2dce )
												{
																$R422f9a4efb = factory::getinstance( "products" );
												}
												if ( 0 < $R8d364004b1 )
												{
																$R8ba1287668 = $R422f9a4efb->IProduct_GetCardStock( $Rf34a38f798 );
												}
												else
												{
																$R8ba1287668 = array( );
												}
												if ( 0 < $R4fecab2dce )
												{
																$R9eefe63324 = $R422f9a4efb->IProduct_GetYktStock( $Rd451e8a5f2 );
												}
												else
												{
																$R9eefe63324 = array( );
												}
												if ( 0 < $Raaa87f4365 )
												{
																$R74497ab307 = implode( ",", $R47cfdbac82 );
																$R778bf3b683 = $this->GetStocksCollection( $R74497ab307."," );
												}
												else
												{
																$R778bf3b683 = array( );
												}
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'] );	$Ra16d228039++	)
												{
																$R8e8b5578f7 = $R4e420efcc3['item'][$Ra16d228039]['pid'];
																$R54951dfde9 = 0 < $R8d364004b1 && isset( $R8ba1287668[$R8e8b5578f7] ) ? $R8ba1287668[$R8e8b5578f7] : 0;
																$Ref7be6595c = 0 < $R4fecab2dce && isset( $R9eefe63324[$R8e8b5578f7] ) ? $R9eefe63324[$R8e8b5578f7] : 0;
																$Rcdcb991232 = isset( $R778bf3b683[$R8e8b5578f7] ) ? $R778bf3b683[$R8e8b5578f7] : 0;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = $R54951dfde9 + $Rcdcb991232;
																$R4e420efcc3['item'][$Ra16d228039]['stocks'] = stockstate( $R4e420efcc3['item'][$Ra16d228039]['stocks'], $R4e420efcc3['item'][$Ra16d228039]['ptype'], $Ref7be6595c, $R4e420efcc3['item'][$Ra16d228039]['mystocks'], 1 );
												}
												unset( $R54951dfde9 );
												unset( $Ref7be6595c );
												unset( $R778bf3b683 );
								}
								unset( $R026f0167b4 );
								unset( $Rd451e8a5f2 );
								unset( $Rf34a38f798 );
								unset( $R47cfdbac82 );
								return $R4e420efcc3;
				}

				public function CheckPwd( )
				{
								$R25791b03ad = factory::getinstance( "sys" );
								$R25791b03ad = $R25791b03ad->ISys_Get( 0, "tradepwd" );
								$R48aa85bc4e = getvar( "tradepwd" );
								if ( md5( $R48aa85bc4e ) != $R25791b03ad['tradepwd'] )
								{
												echo "-1";
								}
								else
								{
												echo "1";
								}
				}

				public function TbCheck( $Rdcd9105806 )
				{
								$R9f08ef06d5 = factory::getinstance( "tborders" );
								$data = array( "ordstate" => 2 );
								$Rfdef969d45 = DATACACHE."site".DS."tb.php";
								if ( !file_exists( $Rfdef969d45 ) )
								{
												$Rdbd96123f3 = 0;
								}
								else
								{
												include( $Rfdef969d45 );
								}
								if ( $Rdbd96123f3 == 0 )
								{
												$R404012f0e9 = $R9f08ef06d5->ITBOrder_GetByOrdno( $Rdcd9105806 );
												$R9a6aac0d57 = $R404012f0e9['tbnick'];
												$Rdd8ed15302 = $R404012f0e9['tbordno'];
												if ( $R9a6aac0d57 != "" )
												{
																$R9a6aac0d57 = $this->MyDC( $R9a6aac0d57 );
																$sess = factory::getinstance( "session" );
																$R63bede6b19 = md5( $sess->admin.$R9a6aac0d57 );
																$R09a3346376 = DATACACHE."tb".DS."sess_".$R63bede6b19.".php";
																if ( file_exists( $R09a3346376 ) )
																{
																				include( $R09a3346376 );
																				$R9231737cbc = unserialize( gzinflate( base64_decode( $sess ) ) );
																}
																else
																{
																				$R1a39e11fbf = factory::getinstance( "tbsess" );
																				$R9231737cbc = $R1a39e11fbf->ITBSess_GetByNick( $R404012f0e9['tbnick'] );
																				$R0810acd91a = factory::getservice( "stbsess" );
																				$Ra3d52e52a4 = $R0810acd91a->ISTBSess_Get( array(
																								"tbnick" => urlencode( $R9a6aac0d57 ),
																								"aid" => intval( $R9231737cbc['aid'] )
																				) );
																				if ( !isset( $Ra3d52e52a4[0]['v'] ) )
																				{
																								return false;
																				}
																				$R9231737cbc['tbpwd'] = $Ra3d52e52a4[0]['w'];
																}
																$R9a6aac0d57 = $R9231737cbc['tbnick'];
																$R5422816e4d = $R9231737cbc['tbpwd'];
																if ( $R9a6aac0d57 != "" && $R5422816e4d != "" )
																{
																				$R9a6aac0d57 = $this->MyDC( $R9a6aac0d57 );
																				$R5422816e4d = $this->MyDC( $R5422816e4d );
																				$R68b6af8d60 = factory::getinstance( "tb" );
																				if ( !isset( $R9231737cbc['tbsess'] ) || $R9231737cbc['tbsess'] == "" || $R9231737cbc['tbsess'] == "MULL" )
																				{
																								$R679e9b9234 = "nocode";
																				}
																				else
																				{
																								$R68b6af8d60->_cookie = gzinflate( base64_decode( $R9231737cbc['tbsess'] ) );
																								$R679e9b9234 = $R68b6af8d60->IsLogin( );
																				}
																				if ( strpos( $R679e9b9234, $R9a6aac0d57 ) === false )
																				{
																								$R68b6af8d60->init( $R9a6aac0d57, $R5422816e4d );
																								$R9231737cbc['tbsess'] = base64_encode( gzdeflate( $R68b6af8d60->_cookie ) );
																								$Re82ee9b121 = "\$sess='".base64_encode( gzdeflate( serialize( $R9231737cbc ) ) )."'";
																								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
																								file_put_contents( $R09a3346376, $Re82ee9b121 );
																				}
																				$Re82ee9b121 = $R68b6af8d60->wuliu( $Rdd8ed15302 );
																				$R68b6af8d60->fahuo( $Re82ee9b121, $Rdd8ed15302 );
																				$data = array( "ordstate" => 2, "tbordstate" => 2 );
																}
												}
								}
								$R9f08ef06d5->ITBOrder_UpdateByStr( $data, " ordno='".$Rdcd9105806."' " );
				}

}

?>
