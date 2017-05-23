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
class GAController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "gametpl" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array( );
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IGameTpl_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								include_once( UPATH_HELPER."GameHelper.php" );
								$Ra3d57d5152 = factory::getinstance( "game" );
								$R69f05bd302 = $Ra3d57d5152->IGame_Get( );
								$Rbdbc624178 = array(
												array( "name" => "������", "value" => "none" ),
												array( "name" => "�ı������", "value" => "text" ),
												array( "name" => "�����", "value" => "password" ),
												array( "name" => "��ѡ��", "value" => "radio" ),
												array( "name" => "�����˵�", "value" => "select" )
								);
								$this->Assign( "chargetype", $Rbdbc624178 );
								$this->Assign( "game", $R69f05bd302 );
						
												$this->view( );
						
				}

				public function Create( )
				{
								$Ra3d57d5152 = factory::getinstance( "game" );
								$R69f05bd302 = $Ra3d57d5152->IGame_Get( );
								$Rbdbc624178 = array(
												array( "name" => "������", "value" => "none" ),
												array( "name" => "�ı������", "value" => "text" ),
												array( "name" => "�����", "value" => "password" ),
												array( "name" => "��ѡ��", "value" => "radio" ),
												array( "name" => "�����˵�", "value" => "select" )
								);
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "hjgat" ) ) ) );
				}

				public function Detail( )
				{
								$R2e3939cda7 = array( "0" => "�޳�ֵ����ѡ��", "1" => "�г�ֵ����ѡ��", "2" => "����ͻ����������ֵ����" );
								$R66af8b6ab1 = array( "0" => "�޳�ֵ������ѡ��", "1" => "�г�ֵ������ѡ��", "2" => "����ͻ����������ֵ������" );
								$R91d25cb1c5 = array( "0" => "�������������Ʒ", "1" => "�����������Ʒ" );
								$Ra3d57d5152 = factory::getinstance( "game" );
								$R69f05bd302 = $Ra3d57d5152->IGame_Get( );
								$Rbdbc624178 = array(
												array( "name" => "������", "value" => "none" ),
												array( "name" => "�ı������", "value" => "text" ),
												array( "name" => "�����", "value" => "password" ),
												array( "name" => "��ѡ��", "value" => "radio" ),
												array( "name" => "�����˵�", "value" => "select" )
								);
								$this->Assign( "chargetype", $Rbdbc624178 );
								$R3584859062 = intval( request( "id" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "aggad" ) ) ) );
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "game", $R69f05bd302 );
								$this->Assign( "shared", $R91d25cb1c5 );
								$this->Assign( "areadisp", $R2e3939cda7 );
								$this->Assign( "servdisp", $R66af8b6ab1 );
						
												$this->View( );
						
				}

				public function Save( )
				{
								$R641ec2a5b8 = array(
												"customname1" => getvar( "customname1" ),
												"customtype1" => getvar( "customtype1" ),
												"customother1" => getvar( "customother1" ),
												"customname2" => getvar( "customname2" ),
												"customtype2" => getvar( "customtype2" ),
												"customother2" => getvar( "customother2" ),
												"customname3" => getvar( "customname3" ),
												"customtype3" => getvar( "customtype3" ),
												"customother3" => getvar( "customother3" )
								);
								$data = array(
												"name" => getvar( "name" ),
												"areadisp" => getvar( "areadisp" ),
												"servdisp" => getvar( "servdisp" ),
												"tpl" => intval( getvar( "tpl" ) ),
												"shared" => getvar( "shared" ),
												"custominput" => serialize( $R641ec2a5b8 )
								);
								$R3584859062 = intval( getvar( "id" ) );
								if ( $R3584859062 == 0 )
								{
												$R808b89ba0e = $this->instance->IGameTpl_Create( $data );
								}
								else
								{
												$R808b89ba0e = $this->instance->IGameTpl_Update( $data, $R3584859062 );
								}
								if ( $R808b89ba0e )
								{
												$this->UpdateCache( "gametpl" );
												$this->Alert( "�����ɹ���" );
												$this->ScriptRedirect( "index.php?m=mod_b2b&c=GA" );
								}
								else
								{
												$this->Alert( "����ʧ�ܣ�" );
												$this->HistoryGo( );
								}
				}

				public function CreateHtml( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Rfda915cb66 = $this->instance->IGameTpl_GetById( $R3584859062 );
								$R64a641d374 = "";
								$R0ea01e6b88 = "";
								$Rd48d0d329d = "";
								$R332caeb6fc = "";
								$R5e11d80105 = "";
								$Rbdee6550e4 = "";
								$Reed85df425 = "";
								$Rd235580370 = "";
								$R10074df755 = array( );
								$Rd10c8605ef = array( );
								$Rdb29ec38cd = array( );
								if ( $Rfda915cb66['custominput'] != "" )
								{
												$R641ec2a5b8 = unserialize( $Rfda915cb66['custominput'] );
												$R5657dc6343 = array( "ubzcztype", "ubzczother", "accountpwd" );
												
												for ( $Ra16d228039 = 1;	$Ra16d228039 < 4;	$Ra16d228039++	)
												{
																$R4878d8074f = $R641ec2a5b8["customtype".$Ra16d228039];
																$R62318950fd = $R641ec2a5b8["customname".$Ra16d228039];
																$R050d05de12 = $R641ec2a5b8["customother".$Ra16d228039];
																$Ra1b5a7e9f5 = $R5657dc6343[$Ra16d228039 - 1];
																if ( $R4878d8074f != "none" )
																{
																				switch ( $R4878d8074f )
																				{
																				case "text" :
																				case "password" :
																								if ( !( $R62318950fd != "" ) )
																								{
																												break;
																								}
																								$R7600bf49ee = $R4878d8074f == "password" ? "<input type='hidden' name='namehide' value='".str_replace( "ubz", "", $Ra1b5a7e9f5 )."' />" : "";
																								$Rd235580370 = "<tr><td class='ltjs'>".$R62318950fd."��</td>"."<td class='rtjs'>".$R7600bf49ee."<input type='hidden' name='".$Ra1b5a7e9f5."txt' id='".$Ra1b5a7e9f5."txt' value='".$R62318950fd."'/><input type='".$R4878d8074f."' class='input' name='".$Ra1b5a7e9f5."' id='".$Ra1b5a7e9f5."' /> * </td></tr>";
																								$R10074df755[] = $Ra1b5a7e9f5;
																								$Rd10c8605ef[] = $R62318950fd;
																								$Rdb29ec38cd[] = $R4878d8074f;
																								break;
																				case "radio" :
																								if ( !( $R050d05de12 != "" && $R62318950fd != "" ) )
																								{
																												break;
																								}
																								$Rb813fe0dc6 = explode( ",", $R050d05de12 );
																								$Rd82f3074a7 = "";
																								$Ra7b9a38368 = 0;
																								foreach ( $Rb813fe0dc6 as $R0f8134fb60 )
																								{
																												$Rd82f3074a7 .= "<input type='".$R4878d8074f."' name='".$Ra1b5a7e9f5."' value='".$R0f8134fb60."' ".( $Ra7b9a38368 == 0 ? "checked" : "" )." style='border:none;width:16px;'/><font color='#ff0000'> ".$R0f8134fb60."</font>";
																												$Ra7b9a38368 = 1;
																								}
																								if ( !( $Rd82f3074a7 != "" ) )
																								{
																												break;
																								}
																								$R10074df755[] = $Ra1b5a7e9f5;
																								$Rd10c8605ef[] = $R62318950fd;
																								$Rdb29ec38cd[] = $R4878d8074f;
																								$Rd235580370 = "<tr><td class='ltjs'>".$R62318950fd."��</td>"."<td class='rtjs'><input type='hidden' name='".$Ra1b5a7e9f5."txt' id='".$Ra1b5a7e9f5."txt' value='".$R62318950fd."'/>".$Rd82f3074a7." * </td></tr>";
																								break;
																				case "select" :
																								if ( $R050d05de12 != "" && $R62318950fd != "" )
																								{
																												break;
																								}
																								$Rb813fe0dc6 = explode( ",", $R050d05de12 );
																								$Rd82f3074a7 = "<option value=''>��ѡ��</option>";
																								foreach ( $Rb813fe0dc6 as $R0f8134fb60 )
																								{
																												$Rd82f3074a7 .= "<option value='".$R0f8134fb60."'>".$R0f8134fb60."</option>";
																												$Ra7b9a38368 = 1;
																								}
																								if ( !( $Rd82f3074a7 != "" ) )
																								{
																												break;
																								}
																								$R10074df755[] = $Ra1b5a7e9f5;
																								$Rd10c8605ef[] = $R62318950fd;
																								$Rdb29ec38cd[] = $R4878d8074f;
																								$Rd235580370 = "<tr><td class='ltjs'>".$R62318950fd."��</td>"."<td class='rtjs'><input type='hidden' name='".$Ra1b5a7e9f5."txt' id='".$Ra1b5a7e9f5."txt' value='".$R62318950fd."'/><select name='".$Ra1b5a7e9f5."' id='".$Ra1b5a7e9f5." \\>".$Rd82f3074a7."</select> * </td></tr>";
																								break;
																				default :
																								break;
																				}
																				if ( $Rd235580370 != "" )
																				{
																								$Reed85df425 .= $Rd235580370;
																				}
																				$Rd235580370 = "";
																}
												}
								}
								$R2e3939cda7 = $Rfda915cb66['areadisp'];
								$R66af8b6ab1 = $Rfda915cb66['servdisp'];
								$tpl = $Rfda915cb66['tpl'];
								$R298845a1bc = factory::getinstance( "gamearea" );
								$R49bbbc2f6a = $tpl;
								if ( 0 < $R49bbbc2f6a )
								{
												$R3db8f5c8bc = $R298845a1bc->IGameArea_GetByGameId( $R49bbbc2f6a );
												$R511b772072 = array( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																if ( $R0f8134fb60['parentid'] == 0 )
																{
																				$R511b772072[] = $R0f8134fb60;
																}
												}
												$R332caeb6fc = "";
												$R1a8a6ef768 = "";
												if ( $R66af8b6ab1 == 1 )
												{
																$R1a8a6ef768 = "onchange='setserv(this)'";
												}
												foreach ( $R511b772072 as $R0f8134fb60 )
												{
																if ( $R66af8b6ab1 == 1 )
																{
																				$R332caeb6fc = $R332caeb6fc."<option value='".$R0f8134fb60['id']."||".$R0f8134fb60['name']."'>".$R0f8134fb60['name']."</option>";
																}
																else
																{
																				$R332caeb6fc = $R332caeb6fc."<option value='".$R0f8134fb60['name']."'>".$R0f8134fb60['name']."</option>";
																}
												}
												if ( 0 < count( $R511b772072 ) )
												{
																$R10074df755[] = "ubzczarea1";
																$Rd10c8605ef[] = "��ֵ����";
																$Rdb29ec38cd[] = "select";
																$R332caeb6fc = "<tr><td class='ltjs'>��ֵ����</td><td class='rtjs'><select id='ubzczarea1' name='ubzczarea1' border='0' style='padding:5px;' ".$R1a8a6ef768.">"."<option value='' selected>��ѡ���ֵ����</option>".$R332caeb6fc."</select></td>";
												}
												$R332caeb6fc .= "</select>";
												$Rbdee6550e4 = "";
												$R5e11d80105 = "";
												$Rbdee6550e4 = "";
												if ( 0 < count( $R511b772072 ) && 0 < count( $R3db8f5c8bc ) - count( $R511b772072 ) )
												{
																$R10074df755[] = "ubzczarea2";
																$Rd10c8605ef[] = "��ֵ������";
																$Rdb29ec38cd[] = "select";
																$Rbdee6550e4 = "var serv = new Array();";
																$Ra16d228039 = 0;
																foreach ( $R3db8f5c8bc as $R0f8134fb60 )
																{
																				if ( 0 < $R0f8134fb60['parentid'] )
																				{
																								$Rbdee6550e4 = $Rbdee6550e4."serv[".$Ra16d228039."] = new Array(\"".$R0f8134fb60['parentid']."\",\"".$R0f8134fb60['name']."\");";
																								$Ra16d228039++;
																				}
																}
																$R5e11d80105 = "<tr><td class='ltjs'>��������</td><td class='rtjs'><select id='ubzczarea2' name='ubzczarea2' border='0' style='padding:5px;'><option value='' selected>��ѡ���ֵ������</option></select></td>";
												}
								}
								else
								{
												if ( $R2e3939cda7 == 2 )
												{
																$R10074df755[] = "ubzczarea1";
																$Rd10c8605ef[] = "��ֵ����";
																$Rdb29ec38cd[] = "text";
																$R332caeb6fc = "<tr><td class='ltjs'>��ֵ����</td><td class='rtjs'><input type='text' id='ubzczarea1' class='input' name='ubzczarea1'> * </td></tr>";
												}
												if ( $R66af8b6ab1 == 2 )
												{
																$R10074df755[] = "ubzczarea2";
																$Rd10c8605ef[] = "��ֵ������";
																$Rdb29ec38cd[] = "text";
																$R5e11d80105 = "<tr><td class='ltjs'>��ֵ��������</td><td class='rtjs'><input type='text' id='ubzczarea2' class='input' name='ubzczarea2'> * </td></tr>";
												}
								}
								$R63bede6b19 = "";
								if ( $Rbdee6550e4 != "" || $R64a641d374 != "" || $Reed85df425 != "" || $Rd48d0d329d != "" || $R332caeb6fc != "" || $R5e11d80105 != "" )
								{
												$Re87f765094 = implode( ",", $R10074df755 );
												$R3fc2e7f821 = $Re87f765094 == "" ? "" : "<input type='hidden' id='needinput' name='needinput' value='".$Re87f765094."' />";
												$Re87f765094 = implode( ",", $Rd10c8605ef );
												$R925e52b930 = $Re87f765094 == "" ? "" : "<input type='hidden' id='needinputlabel' name='needinputlabel' value='".$Re87f765094."' />";
												$Re87f765094 = implode( ",", $Rdb29ec38cd );
												$R28d4cb2fcc = $Re87f765094 == "" ? "" : "<input type='hidden' id='needinputtype' name='needinputtype' value='".$Re87f765094."' />";
												$R63bede6b19 = $Rbdee6550e4." TplHtml=\"<table width='100%'>".$Reed85df425.$R332caeb6fc.$R5e11d80105."</table>".$R3fc2e7f821.$R925e52b930.$R28d4cb2fcc."\";";
								}
								$R63bede6b19 .= "function TplShow(){\$(\"cztpl\").innerHTML = TplHtml;} TplShow();";
								$R63bede6b19 = $R63bede6b19."function setserv(obj){"."var selectval=obj.options[obj.selectedIndex].value;"."tmp=selectval.split(\"||\");"."i=0;"."\$(\"ubzczarea2\").length=0;"."\$(\"ubzczarea2\").options[\$(\"ubzczarea2\").length] = new Option(\"��ѡ�������\", \"\");"."for(i=0;i<serv.length;i++){"."if(serv[i][0]==tmp[0]){"."\$(\"ubzczarea2\").options[\$(\"ubzczarea2\").length] = new Option(serv[i][1], serv[i][1]);"."}"."}"."}";
								$R2552e540b9 = UPATH_ROOT;
								$Rcc5c6e696c = explode( DS, UPATH_ROOT );
								array_pop( $Rcc5c6e696c );
								$R2552e540b9 = implode( DS, $Rcc5c6e696c );
								global $g_mod;
								$R762df0f9ab = $R2552e540b9.DS."content".DS."mod_shared".DS."skins".DS."cztpl".DS.$R3584859062.".js";
								$this->WriteFile( $R762df0f9ab, $R63bede6b19 );
								$this->Alert( "ģ��������ϣ�" );
								$this->HistoryGo( );
				}

				public function WriteFile( $R762df0f9ab, $R63bede6b19 )
				{
								if ( !( $Rf500f4a848 = @fopen( $R762df0f9ab, "w" ) ) )
								{
												echo "Directory {$R511aa10c02} not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R63bede6b19 );
								fclose( $Rf500f4a848 );
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
								$R808b89ba0e = $this->instance->IGameTpl_Update( $data, $R3584859062 );
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
								$R808b89ba0e = $this->instance->IGameTpl_UpdateByStr( $data, $Rb7492a73f7 );
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
								$R808b89ba0e = $this->instance->IGameTpl_DestroyByStr( $Rb7492a73f7, $data );
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
								$R808b89ba0e = $this->instance->IGameTpl_DeleteByStr( $Rb7492a73f7, $data );
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
