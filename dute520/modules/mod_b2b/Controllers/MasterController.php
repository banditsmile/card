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
class MasterController extends Controller
{

				public $minfo = NULL;

				public function __construct( )
				{
								$this->InitLoginMaster( );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function InitLoginMaster( )
				{
								$Rff0cc71a1d = factory::getinstance( "session" );
								$Re8bade8a5f = $Rff0cc71a1d->admin;
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								$data = array( );
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$Ra77eb9059e = 1;
								}
								else
								{
												$Ra77eb9059e = 0;
								}
								$R63bede6b19 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 255;	$Ra16d228039++	)
								{
												$R63bede6b19 .= ",0";
								}
								$Rcc5c6e696c = explode( ",", $R3db8f5c8bc['rights'].$R63bede6b19 );
								if ( $Rcc5c6e696c[38] == 1 )
								{
												$R1ac6703a9f = 1;
								}
								else
								{
												$R1ac6703a9f = 0;
								}
								$adminrank = $R3db8f5c8bc['adminRank'];
								if ( 2 < $adminrank )
								{
												$this->Alert( "��ϵͳ����Ա��Ȩ������" );
												$this->HistoryGo( );
								}
								$this->minfo = array(
												"issuper" => $Ra77eb9059e,
												"caneditother" => $R1ac6703a9f,
												"adminname" => $Re8bade8a5f,
												"adminrank" => $R3db8f5c8bc['adminRank'],
												"id" => $R3db8f5c8bc['id']
								);
				}

				public function Index( )
				{
								$R355ef3fa24 = $this->minfo;
								if ( 2 < $R355ef3fa24['adminrank'] )
								{
												echo "<script type=\"text/javascript\">alert(\"Ȩ�޲��㣡ֻ��ϵͳ����Ա���ϲ���Ȩ�����\");window.location=\"index.php?c=home&a=home\";</script>";
												exit( );
								}
								if ( $R355ef3fa24['adminrank'] == 2 && $R355ef3fa24['caneditother'] == 0 )
								{
												echo "<script type=\"text/javascript\">alert(\"Ȩ�޲��㣡\");window.location=\"index.php?c=home&a=home\";</script>";
												exit( );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $Rfc5c48c798->IMaster_Page( $data );
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								if ( $Ra77eb9059e == 0 )
								{
												$R026f0167b4 = array( );
												foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
												{
																if ( $R355ef3fa24['adminrank'] == 2 )
																{
																				if ( 1 < $R0f8134fb60['id'] && $R0f8134fb60['adminRank'] != 2 )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																				else if ( $R0f8134fb60['adminRank'] == 2 && $R0f8134fb60['adminName'] == $R355ef3fa24['adminname'] )
																				{
																								$R026f0167b4[] = $R0f8134fb60;
																				}
																}
												}
												$R4e420efcc3['item'] = $R026f0167b4;
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "reddt" ) ) ) );
				}

				public function Update( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3584859062 = intval( request( "id" ) );
								$adminrank = intval( request( "adminrank" ) );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 && $adminrank != 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R9742fd5d68 = getvar( "oldname" );
								$Re8bade8a5f = getvar( "adminname" );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3584859062 == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "���ã�����Ȩ�༭��������ͬ����Ĺ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "Ȩ�޲���" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $adminrank == 2 )
												{
																$this->Alert( "���ã�����Ȩ����Ϊϵͳ����Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "����Ա���ֲ���Ϊ�գ�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( $R9742fd5d68 != $Re8bade8a5f && $Rfc5c48c798->IMaster_IsExist( $Re8bade8a5f ) )
								{
												$this->Alert( "����Ա�Ѿ����ڣ���ѡ���������֣��ٽ����޸�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rf52ba22baf = array(
												"adminName" => $Re8bade8a5f,
												"adminRank" => intval( request( "adminrank" ) )
								);
								$R992179c341 = getvar( "adminpass" );
								if ( $R992179c341 != "" )
								{
												$Rf52ba22baf['adminPass'] = md5( $R992179c341 );
								}
								$Rfc5c48c798->IMaster_Update( $Rf52ba22baf, $R3584859062 );
								if ( $R9742fd5d68 != $Re8bade8a5f )
								{
												$Rff0cc71a1d = factory::getinstance( "session" );
												$Rff0cc71a1d->set( "adminname", $Re8bade8a5f );
								}
								$this->Alert( "���³ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Create( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								$adminrank = intval( request( "adminrank" ) );
								$R355ef3fa24 = $this->minfo;
								if ( $adminrank == 1 )
								{
												$this->Alert( "���ã��벻Ҫ���������������Ա��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$R355ef3fa24['issuper'] )
								{
												if ( $adminrank <= 2 )
												{
																$this->Alert( "���ã�����Ȩ���ϵͳ����Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "���ã�Ȩ�޲��㣬�޷���ӹ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "����Ա���ֲ���Ϊ�գ�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								if ( $Rfc5c48c798->IMaster_IsExist( $Re8bade8a5f ) )
								{
												$this->Alert( "����Ա�Ѿ����ڣ���ѡ����������" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								global $masterid;
								$R026f0167b4 = array( );
								$R2a5119e7b1 = $this->GetItemLen( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R2a5119e7b1;	$Ra16d228039++	)
								{
												$R026f0167b4[] = 0;
								}
								$R643f497694 = 0;
								$R9ea16bd2fa = 0;
								switch ( $adminrank )
								{
								case 2 :
												$R643f497694 = 0;
												$R9ea16bd2fa = 35;
												break;
								case 3 :
												$R643f497694 = 26;
												$R9ea16bd2fa = 29;
												break;
								case 4 :
												$R643f497694 = 34;
												$R9ea16bd2fa = 35;
												break;
								case 5 :
												$R643f497694 = 16;
												$R9ea16bd2fa = 25;
												$R026f0167b4[12] = 1;
												break;
								case 6 :
												$R643f497694 = 30;
												$R9ea16bd2fa = 33;
												break;
								default :
												$R643f497694 = 0;
												$R9ea16bd2fa = -1;
												break;
								}
								$R9ea16bd2fa += 1;
								
								for ( $Ra16d228039 = $R643f497694;	$Ra16d228039 < $R9ea16bd2fa;	$Ra16d228039++	)
								{
												$R026f0167b4[$Ra16d228039] = 1;
								}
								$Ra0c8454e75 = implode( ",", $R026f0167b4 );
								$R2a039ed8fd = array(
												"adminName" => $Re8bade8a5f,
												"adminPass" => md5( getvar( "adminpass" ) ),
												"adminRank" => $adminrank,
												"aid" => $masterid,
												"rights" => $Ra0c8454e75
								);
								$Rfc5c48c798->IMaster_Create( $R2a039ed8fd );
								$this->Alert( "��ӳɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R355ef3fa24 = $this->minfo;
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['adminName'] ) )
								{
												$this->Alert( "�Ƿ�������" );
												$this->HistoryGo( );
								}
								if ( $R3584859062 == $R355ef3fa24['id'] )
								{
												$this->Alert( "���ã�����Ȩɾ���Լ���" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã���Ϊƽ̨��������Ա��������ɾ��" );
												$this->HistoryGo( );
								}
								$R355ef3fa24 = $this->minfo;
								if ( !$R355ef3fa24['issuper'] )
								{
												$adminrank = $R3db8f5c8bc['adminRank'];
												if ( $adminrank <= 2 )
												{
																$this->Alert( "���ã�����Ȩɾ��ϵͳ����Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "���ã�Ȩ�޲��㣬�޷�ɾ������Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$Rfc5c48c798->IMaster_Delete( $R3584859062 );
								$this->Alert( "ɾ���ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=Master" );
				}

				public function Bind( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$Re8bade8a5f = getvar( "adminname" );
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "���ã�����Ȩ�༭��������ͬ����Ĺ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "Ȩ�޲���" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$this->Assign( "ip", $this->GetIp( ) );
								$R3db8f5c8bc['ip'] = explode( ",", $R3db8f5c8bc['ip'].",,,,," );
								$R3db8f5c8bc['mac'] = explode( ",", $R3db8f5c8bc['mac'].",,,,," );
								$R3db8f5c8bc['hde'] = explode( ",", $R3db8f5c8bc['hde'].",,,,," );
								$R3db8f5c8bc['cpu'] = explode( ",", $R3db8f5c8bc['cpu'].",,,,," );
								$this->Assign( "item", $R3db8f5c8bc );
						
												$this->View( );
						
				}

				public function BindSave( )
				{
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$Re8bade8a5f = getvar( "adminname" );
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "���ã�����Ȩ�༭��������ͬ����Ĺ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "Ȩ�޲���" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$Rfc5c48c798 = factory::getinstance( "master" );
								global $masterid;
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !isset( $R3db8f5c8bc['aid'] ) )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( 0 < $masterid && $R3db8f5c8bc['aid'] != $masterid )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$data = array(
												"ipcheck" => $this->GetCheck( "ip" ),
												"ip" => $this->GetItem( "ip" ),
												"maccheck" => $this->GetCheck( "mac" ),
												"mac" => $this->GetItem( "mac" ),
												"hdecheck" => $this->GetCheck( "hde" ),
												"hde" => $this->GetItem( "hde" ),
												"cpucheck" => $this->GetCheck( "cpu" ),
												"cpu" => $this->GetItem( "cpu" ),
												"mobile" => getvar( "mobile" ),
												"mobilecheck" => intval( request( "mobilecheck" ) ),
												"mibaoka" => getvar( "mibaoka" ),
												"mibaokacheck" => intval( request( "mibaokacheck" ) )
								);
								$Rfc5c48c798->IMaster_UpdateByName( $data, $Re8bade8a5f );
								$this->Alert( "�󶨳ɹ�" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=master&a=bind&adminname=".$Re8bade8a5f );
				}

				public function GetItem( $R0f8134fb60 )
				{
								$R9cfb7c6d6b = getvar( $R0f8134fb60 );
								$Rcd8b55d5dc = getvar( $R0f8134fb60."check" );
								$R63bede6b19 = "";
								if ( is_array( $Rcd8b55d5dc ) )
								{
												foreach ( $Rcd8b55d5dc as $R0f8134fb60 )
												{
																if ( trim( $R9cfb7c6d6b[$R0f8134fb60] ) != "" && $R9cfb7c6d6b[$R0f8134fb60] != "undefined" )
																{
																				$R63bede6b19 .= $R9cfb7c6d6b[$R0f8134fb60].",";
																}
												}
								}
								return $R63bede6b19;
				}

				public function GetCheck( $R0f8134fb60 )
				{
								$R602baa0728 = getvar( $R0f8134fb60."check" );
								if ( is_array( $R602baa0728 ) && 0 < count( $R602baa0728 ) )
								{
												return 1;
								}
								else
								{
												return 0;
								}
				}

				public function Rights( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
																$this->Alert( "���ã�����Ȩ�޸��Լ���Ȩ�ޣ�" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "���ã�����Ȩ�༭��������ͬ����Ĺ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "Ȩ�޲���" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$this->Assign( "ip", $this->GetIp( ) );
								if ( !isset( $R3db8f5c8bc['adminRank'] ) )
								{
												$this->Alert( "��������" );
												$this->HistoryGo( );
								}
								if ( $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "��������Ա���Թ������й��ܣ�Ϊ��ֹ���⣬�����޸ģ�" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R63bede6b19 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 255;	$Ra16d228039++	)
								{
												$R63bede6b19 .= ",0";
								}
								$R3db8f5c8bc['rights'] = explode( ",", $R3db8f5c8bc['rights'].$R63bede6b19 );
								$this->Assign( "item", $R3db8f5c8bc );
								$R770c421daf = array(
												array(
																"name" => "ϵͳ��Ȩ��",
																"val" => array(
																				array( "id" => 0, "name" => "ϵͳ��������" ),
																				array( "id" => 38, "name" => "������������Ա" ),
																				array( "id" => 1, "name" => "LOGO����" ),
																				array( "id" => 2, "name" => "�ܱ�������" ),
																				array( "id" => 3, "name" => "ϵͳ���ع���" ),
																				array( "id" => 4, "name" => "֧�����ع���" ),
																				array( "id" => 5, "name" => "�û�������ϵ����" ),
																				array( "id" => 6, "name" => "ҳ���������" ),
																				array( "id" => 7, "name" => "��վ����" ),
																				array( "id" => 8, "name" => "���л���˺Ź���" ),
																				array( "id" => 9, "name" => "��ǩ����" ),
																				array( "id" => 10, "name" => "ͶƱ����" ),
																				array( "id" => 11, "name" => "����������(����)" ),
																				array( "id" => 12, "name" => "���ɾ�̬ҳ��" ),
																				array( "id" => 13, "name" => "���ݵ�ǰģ��" ),
																				array( "id" => 14, "name" => "ѡ����վģ��" ),
																				array( "id" => 15, "name" => "Ӧ������" ),
																				array( "id" => 43, "name" => "��ѡ�����" ),
																				array( "id" => 44, "name" => "�ͻ�Ͷ��/վ�ڶ�/���" ),
																				array( "id" => 45, "name" => "����ϵͳ" ),
																				array( "id" => 46, "name" => "����ͳ��" ),
																				array( "id" => 49, "name" => "һ��ͨ�������" ),
																				array( "id" => 54, "name" => "һ��ͨ״̬��ѯ" ),
																				array( "id" => 55, "name" => "һ��ͨת��Ȩ��" ),
																				array( "id" => 50, "name" => "����������Ϣ" ),
																				array( "id" => 51, "name" => "������������" ),
																				array( "id" => 59, "name" => "ѡ������" ),
																				array( "id" => 60, "name" => "�������" ),
																				array( "id" => 64, "name" => "ϵͳ��½��־" )
																)
												),
												array(
																"name" => "��Ʒ��Ȩ��",
																"val" => array(
																				array( "id" => 16, "name" => "��Ʒ���/�༭/�б�/���" ),
																				array( "id" => 17, "name" => "��Ʒ�������" ),
																				array( "id" => 18, "name" => "��Ʒ����Ȩ��" ),
																				array( "id" => 19, "name" => "��Ʒ�۸����" ),
																				array( "id" => 20, "name" => "��������" ),
																				array( "id" => 21, "name" => "����/����ϵͳ" ),
																				array( "id" => 22, "name" => "��Ʒ��ֵģ�����" ),
																				array( "id" => 23, "name" => "��Ʒ���۹���" ),
																				array( "id" => 24, "name" => "�������/�༭/�б�" ),
																				array( "id" => 25, "name" => "һ��ͨ����" )
																)
												),
												array(
																"name" => "�û���Ȩ��",
																"val" => array(
																				array( "id" => 26, "name" => "�û�����" ),
																				array( "id" => 27, "name" => "�û���ֵ��¼" ),
																				array( "id" => 28, "name" => "�û�������ͳ��" ),
																				array( "id" => 29, "name" => "�û���Ա���б�" ),
																				array( "id" => 47, "name" => "�û��ۿ�/�ӿ�" ),
																				array( "id" => 57, "name" => "�����̵�ַ����" ),
																				array( "id" => 57, "name" => "�û���վ����" ),
																				array( "id" => 58, "name" => "�û��ʽ����" )
																)
												),
												array(
																"name" => "������Ϣ��Ȩ��",
																"val" => array(
																				array( "id" => 30, "name" => "���Ź������" ),
																				array( "id" => 31, "name" => "���ŷ������" ),
																				array( "id" => 32, "name" => "վ���Ź���" ),
																				array( "id" => 33, "name" => "ӱ�ȿ�������Ϣ����" )
																)
												),
												array(
																"name" => "������Ȩ��",
																"val" => array(
																				array( "id" => 34, "name" => "��������" ),
																				array( "id" => 35, "name" => "�����������" ),
																				array( "id" => 39, "name" => "���ܶ�������" ),
																				array( "id" => 40, "name" => "�Զ���������" ),
																				array( "id" => 41, "name" => "�ֶ���������" ),
																				array( "id" => 42, "name" => "ɾ������" ),
																				array( "id" => 48, "name" => "�鿴��������" ),
																				array( "id" => 53, "name" => "���ѳɹ������˿�" ),
																				array( "id" => 61, "name" => "�����˿��Ҫ����" ),
																				array( "id" => 52, "name" => "�ͻ�������Ʒͳ��" ),
																				array( "id" => 62, "name" => "��������" ),
																				array( "id" => 63, "name" => "����ϵͳ����" )
																)
												)
								);
								if ( 1 < $R355ef3fa24['adminrank'] )
								{
												$R770c421daf[0]['val'] = array(
																array( "id" => 0, "name" => "ϵͳ��������" ),
																array( "id" => 1, "name" => "LOGO����" ),
																array( "id" => 2, "name" => "�ܱ�������" ),
																array( "id" => 3, "name" => "ϵͳ���ع���" ),
																array( "id" => 4, "name" => "֧�����ع���" ),
																array( "id" => 5, "name" => "�û�������ϵ����" ),
																array( "id" => 6, "name" => "ҳ���������" ),
																array( "id" => 7, "name" => "��վ����" ),
																array( "id" => 8, "name" => "���л���˺Ź���" ),
																array( "id" => 9, "name" => "��ǩ����" ),
																array( "id" => 10, "name" => "ͶƱ����" ),
																array( "id" => 11, "name" => "����������(����)" ),
																array( "id" => 12, "name" => "���ɾ�̬ҳ��" ),
																array( "id" => 13, "name" => "���ݵ�ǰģ��" ),
																array( "id" => 14, "name" => "ѡ����վģ��" ),
																array( "id" => 15, "name" => "Ӧ������" )
												);
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "yests" ) ) ) );
				}

				public function GetItemLen( )
				{
								return 65;
				}

				public function RightsSave( )
				{
								$Re8bade8a5f = getvar( "adminname" );
								if ( trim( $Re8bade8a5f ) == "" )
								{
												$this->Alert( "�Ƿ�����" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								$R355ef3fa24 = $this->minfo;
								$Ra77eb9059e = $R355ef3fa24['issuper'];
								$R3db8f5c8bc = array( );
								$Rfc5c48c798 = factory::getinstance( "master" );
								$R3db8f5c8bc = $Rfc5c48c798->IMaster_GetByName( $Re8bade8a5f );
								if ( !$Ra77eb9059e && $R3db8f5c8bc['adminRank'] == 1 )
								{
												$this->Alert( "���ã�����Ȩ�޸ĳ�������Ա�����Ϣ��" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
								}
								if ( !$Ra77eb9059e && 1 < $R3db8f5c8bc['adminRank'] )
								{
												if ( $R3db8f5c8bc['id'] == $R355ef3fa24['id'] )
												{
																$this->Alert( "���ã�����Ȩ�޸��Լ���Ȩ�ޣ�" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R3db8f5c8bc['adminRank'] <= 2 )
												{
																$this->Alert( "���ã�����Ȩ�༭��������ͬ����Ĺ���Ա��" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
												else if ( $R355ef3fa24['caneditother'] == 0 )
												{
																$this->Alert( "Ȩ�޲���" );
																$this->ScriptRedirect( "index.php?m=mod_b2b&c=master" );
												}
								}
								$R026f0167b4 = array( );
								$R2a5119e7b1 = $this->GetItemLen( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R2a5119e7b1;	$Ra16d228039++	)
								{
												$R244f38266c = intval( request( "rights_".$Ra16d228039 ) );
												if ( 1 < $R355ef3fa24['adminrank'] && $Ra16d228039 == 38 )
												{
																$R244f38266c = 0;
												}
												$R026f0167b4[] = $R244f38266c;
								}
								$Ra0c8454e75 = implode( ",", $R026f0167b4 );
								$data = array(
												"rights" => $Ra0c8454e75
								);
								$R808b89ba0e = $Rfc5c48c798->IMaster_UpdateByName( $data, $Re8bade8a5f );
								if ( $R808b89ba0e )
								{
												$this->Alert( "����ɹ�" );
								}
								else
								{
												$this->Alert( "����ʧ��" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=master&a=Rights&adminname=".$Re8bade8a5f );
				}

}

?>
