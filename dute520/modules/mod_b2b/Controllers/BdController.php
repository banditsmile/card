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
class BdController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "bd" );
				}

				public function Set( )
				{
								$R09a3346376 = DATACACHE."site".DS."bd.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
								}
								else
								{
												$Ra3f6846255 = "";
								}
								$this->Assign( "bd", $Ra3f6846255 );
								$this->Assign( "bdtip", base64_decode( $Rdad651832c ) );
								$this->View( );
				}

				public function Save( )
				{
								$Rb2c0dc00fa = htmlspecialchars( trim( getvar( "cztype" ) ) );
								$Rdad651832c = base64_encode( htmlspecialchars( trim( getvar( "bdtip" ) ) ) );
								$R09a3346376 = DATACACHE."site".DS."bd.php";
								$R63bede6b19 = "\$Ra3f6846255='".$Rb2c0dc00fa."';\$Rdad651832c='".$Rdad651832c."';";
								$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
								file_put_contents( $R09a3346376, $Re82ee9b121 );
								$this->Alert( "�������" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Bd&a=Set" );
				}

				public function EctSave( )
				{
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 == 0 )
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
								$R770dcaf6d0 = "..".DS."libraries".DS."user".DS."bderrcontent.php";
								if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "w" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R63bede6b19 );
								fclose( $Rf500f4a848 );
								$this->Alert( "�������" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=bd&a=detail&id=".$R3584859062 );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$Rfff462d8f8 = intval( request( "allaid" ) );
								$R2a51483b14 = intval( request( "aid" ) );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Rbdf46d6e43 = intval( request( "ordstate" ) );
								$Rbdf46d6e43 = $Rbdf46d6e43 == 101 ? -1 : $Rbdf46d6e43;
								$R36130a8639 = getvar( "optype" );
								$R58bca74885 = array(
												"aid" => $R2a51483b14,
												"cztype" => getvar( "cztype" ),
												"ordstate" => $Rbdf46d6e43
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$R36923cf626 = request( "keywords" );
								$R929cf63f35 = DATACACHE."bd.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								if ( $R36923cf626 == "" && $R2a51483b14 == -2 && $Rbdf46d6e43 == 1 )
								{
												$R71a6fd054f = intval( request( "page" ) );
												if ( $R71a6fd054f == 0 )
												{
																$R71a6fd054f = 1;
												}
												$R09a3346376 = BCKCACHE.DS."bd".DS."b_".$R71a6fd054f.".php";
												if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
												{
																$R4e420efcc3 = $this->hander->IBD_Page( $data );
																$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R4e420efcc3 ) ) )."')))";
																$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
																file_put_contents( $R09a3346376, $Re82ee9b121 );
												}
												include( $R09a3346376 );
								}
								else
								{
												$R4e420efcc3 = $this->hander->IBD_Page( $data );
								}
								$R00be52aa45 = array( "czaccount" => "QQ��", "cztype" => "ҵ������", "remark" => "������ע", "admremark" => "����Ա�ظ�", "admname" => "��������Ա" );
								$R4d5c62f7b3 = array( "0" => "ȫ������", "1" => "�ȴ�����", "3" => "���ύ����", "2" => "�������", "101" => "����ʧ��" );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$this->Assign( "oarray", $R4d5c62f7b3 );
								$this->Assign( "otype", $Rbdf46d6e43 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "allaid", $Rfff462d8f8 );
								$this->Assign( "aid", $R2a51483b14 );
					
												$this->View( );
					
				}

				public function Cetail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IBD_Get( $R3584859062 );
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
												$R808b89ba0e = $this->hander->IBD_Update( $data, $R3584859062 );
								}
								$this->Assign( "order", $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R09a3346376 = "..".DS."libraries".DS."user".DS."bderrcontent.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include_once( $R09a3346376 );
								}
								if ( !isset( $ect ) )
								{
												$ect = array( "QQ���ò��㣬�벻Ҫ���ύ���ܣ�ֻ���ùٷ�ֱ�壬��ϵ���ҽ��л�QQ��ֵ", "����QQ ���벻���Դ���������ţ����벻��̫�� ���޸�������ڽ����ύ", "QQ������ҵ��û���ڣ��޷���ͨ����ҵ���ں��ڽ����ύ", "Ѹ��VIP�����������������ύ,��û��д����ط����ˢ�¼��μ���", "Ѹ���ֻ�֧�����ò��㣬���������Ѹ�׺Ž��п�ͨ�������ظ��ύ��Ѹ���˺ţ��ظ��ύ����ʧЧ�Ը�", "��Ա��ʱ�޻�,��ȴ�2���µ�����", "Ѹ�����ò��㣬����ϵ�ͷ������˿�" );
								}
								$Rca5aec42ed = array( "-1" => "����ʧ��", "1" => "�ȴ�����", "3" => "���ύ����", "2" => "�������" );
						
												$this->Assign( "ect", $ect );
												$this->Assign( "bdstate", $Rca5aec42ed );
												$this->View( );
						
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R0f8134fb60 = array( );
								$R0f8134fb60['item'] = $this->hander->IBD_Get( $R3584859062 );
								$data = array(
												"ordstate" => 3,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$this->Assign( "order", $R0f8134fb60 );
								include_once( UPATH_HELPER."OrderHelper.php" );
								$R09a3346376 = "..".DS."libraries".DS."user".DS."bderrcontent.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include_once( $R09a3346376 );
								}
								if ( !isset( $ect ) )
								{
												$ect = array( "QQ���ò��㣬�벻Ҫ���ύ���ܣ�ֻ���ùٷ�ֱ�壬��ϵ���ҽ��л�QQ��ֵ", "����QQ ���벻���Դ���������ţ����벻��̫�� ���޸�������ڽ����ύ", "QQ������ҵ��û���ڣ��޷���ͨ����ҵ���ں��ڽ����ύ", "Ѹ��VIP�����������������ύ,��û��д����ط����ˢ�¼��μ���", "Ѹ���ֻ�֧�����ò��㣬���������Ѹ�׺Ž��п�ͨ�������ظ��ύ��Ѹ���˺ţ��ظ��ύ����ʧЧ�Ը�", "��Ա��ʱ�޻�,��ȴ�2���µ�����", "Ѹ�����ò��㣬����ϵ�ͷ������˿�" );
								}
								$Rca5aec42ed = array( "-1" => "����ʧ��", "1" => "�ȴ�����", "3" => "���ύ����", "2" => "�������" );
							
												$this->Assign( "ect", $ect );
												$this->Assign( "bdstate", $Rca5aec42ed );
												$this->View( );
							
				}

				public function QuickCheck( $Rdcd9105806 )
				{
								$data = array(
												"ordstate" => 3,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IBD_Get( $Rdcd9105806, "ordstate" );
								if ( $Rebd5a5dade['ordstate'] == 3 )
								{
												echo "�Ѿ����˴���˶�����";
												exit( );
								}
								if ( $Rebd5a5dade['ordstate'] == 1 )
								{
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
												$R808b89ba0e = $this->hander->IBD_Update( $data, $Rdcd9105806 );
								}
								return $R808b89ba0e;
				}

				public function QuickCheck3( $Rdcd9105806 )
				{
								$data = array(
												"ordstate" => 2,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$Rebd5a5dade = $this->hander->IBD_Get( $Rdcd9105806, "ordstate" );
								$R808b89ba0e = true;
								if ( $Rebd5a5dade['ordstate'] == 3 || $Rebd5a5dade['ordstate'] == 1 )
								{
												$sess = factory::getinstance( "session" );
												$data['admname'] = $sess->admin;
												$R808b89ba0e = $this->hander->IBD_Update( $data, $Rdcd9105806 );
								}
								return $R808b89ba0e;
				}

				public function Check( )
				{
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 <= 0 )
								{
												$this->Alert( "�����Ƿ���" );
												$this->Historygo( );
								}
								$Rc34dcbf884 = intval( request( "ordstate" ) );
								$R0dfdd037f8 = getvar( "failreason" );
								$data = array(
												"admremark" => $R0dfdd037f8,
												"ordstate" => $Rc34dcbf884,
												"dealdate" => date( "Y-m-d H-i-s" )
								);
								$sess = factory::getinstance( "session" );
								$data['admname'] = $sess->admin;
								$R808b89ba0e = $this->hander->IBD_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "����ɹ���" );
								}
								else
								{
												$this->Alert( "����ʧ�ܣ�" );
								}
								$Rf134fa1665 = request( "ref" );
								if ( $Rf134fa1665 == "czlist" )
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=Bd&aid=-2&ordstate=1" );
								}
								else
								{
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=bd&a=detail&id=".$R3584859062 );
								}
				}

				public function Del( )
				{
								if ( $this->GetAdmRight( 42 ) == 0 )
								{
												$this->Alert( "��û��ɾ��Ȩ��" );
												$this->HistoryGo( );
								}
								$this->hander->IBD_DeleteByOrdno( getvar( "ubzordno" ) );
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
								$this->hander->IBD_Delete( $this->GetId( "id" ) );
								$this->Alert( "ɾ���ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=order" );
				}

				public function Deal( )
				{
								$sess = factory::getinstance( "session" );
								$this->Assign( "admname", $sess->admin );
								$this->Index( );
				}

				public function Deals( )
				{
								header( "Content-type: text/html;charset=GB2312" );
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
												$R244f38266c = iconv( "UTF-8", "gb2312//IGNORE", $R244f38266c );
												$data = array(
																$param => $R244f38266c
												);
												$R808b89ba0e = $this->hander->IBD_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->hander->IBD_UpdateByStr( $data, $Rb7492a73f7 );
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
								$R808b89ba0e = $this->hander->IBD_DestroyByStr( $Rb7492a73f7, $data );
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
								$R808b89ba0e = $this->hander->IBD_DeleteByStr( $Rb7492a73f7, $data );
								if ( !$R808b89ba0e )
								{
												echo "ɾ��ʧ��!";
								}
								else
								{
												echo "";
								}
				}

}

?>
