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
class AdController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "ad" );
				}

				public function Index( )
				{
								$R980c6a9bfd = intval( request( "pos" ) );
								$Rd713b8aa04 = array( "0" => "��ѡ��������", "506" => "����ϵͳͷ��BannerͼƬ", "552" => "����ϵͳ�Ҳ��Ϸ����" );
								if ( UB_YKT )
								{
												$R802fdf7753 = array( "6" => "һ��ͨϵͳ��ҳͷ��BannerͼƬ", "1" => "һ��ͨϵͳ��ҳ�в�������", "5" => "һ��ͨϵͳ��ҳ�Ҳ����Ź����·����", "8" => "һ��ͨϵͳС�㲥", "9" => "һ��ͨϵͳ��������", "50" => "һ��ͨϵͳ��ҳ�����Ƽ�", "51" => "һ��ͨ��Ʒҳ��Ĭ�Ϲ��", "52" => "һ��ͨ�������Ҳ��Ϸ����", "53" => "һ��ͨ����ͼƬ" );
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
												//$Rd10b358ca6 = array( );
								}
								if ( UB_B2C )
								{
												$R186cff8e3f = array( "201" => "����ϵͳ��ҳ�в�������", "204" => "����ϵͳ��ҳ�в��б��·����", "205" => "����ϵͳ��ҳ�Ҳ����Ź����·����", "208" => "����ϵͳС�㲥", "209" => "����ϵͳ��������", "252" => "����ϵͳ�������Ҳ��Ϸ����" );
								}
								else
								{
												$R186cff8e3f = array( );
								}
								$Rd713b8aa04 = $Rd713b8aa04 + $Rd10b358ca6 + $R186cff8e3f + $R802fdf7753;
								global $masterid;
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "aoiyt" ) ) ) );
								$this->Assign( "items", $R3db8f5c8bc );
							
												$this->Assign( "adtype", $Rd713b8aa04 );
												$this->Assign( "pos", $R980c6a9bfd );
												$this->view( );
							
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->instance->IAd_GetById( $R3584859062 );
							
												$this->Assign( "item", $R3db8f5c8bc );
												$this->View( );
							
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R980c6a9bfd = intval( request( "pos" ) );
								$data = array(
												"pic" => getvar( "ubzpic" ),
												"url" => getvar( "ubzurl" ),
												"ispic" => intval( request( "ispic" ) ),
												"textcolor" => getvar( "ubztextcolor" ),
												"text" => getvar( "ubztext" ),
												"editdate" => date( "Y-m-d H-i-s" ),
												"pos" => $R980c6a9bfd
								);
								if ( $R3584859062 == 0 )
								{
												$data['createdate'] = date( "Y-m-d H-i-s" );
												$R63bede6b19 = "���";
												$Oooo00 = "base64_decode";
												$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
												$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
												$cphp0 = __FILE__;
												eval( $o00OO( $ooOO00o( $this->comget( "xoxoo" ) ) ) );
								}
								else
								{
												$R63bede6b19 = "����";
												$R808b89ba0e = $this->instance->IAd_Update( $data, $R3584859062 );
								}
								if ( $R980c6a9bfd == 53 )
								{
												$this->XmlYkt( );
								}
								$this->UpdateCache( "ad" );
								$this->go( $R808b89ba0e, $R63bede6b19."�ɹ�", $R63bede6b19."ʧ��", "index.php?m=mod_b2b&c=ad&pos=".$R980c6a9bfd );
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R980c6a9bfd = intval( request( "pos" ) );
								if ( $R3584859062 == 0 )
								{
												$R808b89ba0e = false;
								}
								else
								{
												$R808b89ba0e = $this->instance->IAd_Delete( $R3584859062 );
								}
								if ( $R980c6a9bfd == 53 )
								{
												$this->XmlYkt( );
								}
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "xhixt" ) ) ) );
								$this->go( $R808b89ba0e, "ɾ���ɹ�", "ɾ��ʧ��", "index.php?m=mod_b2b&c=ad&pos=".$R980c6a9bfd );
				}

				public function XmlYkt( )
				{
								$R63bede6b19 = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
								$R63bede6b19 .= "<gallery cellDimension=\"800\" columns=\"4\" zoomOutPerc=\"28\" zoomInPerc=\"100\" frameWidth=\"0\" captionColor=\"0xFFFFFF\" enableRightClickOpen=\"true\">";
								$R4e420efcc3 = $this->instance->IAd_Get( 53 );
								global $baseurl;
								foreach ( $R4e420efcc3 as $R0f8134fb60 )
								{
												$R63bede6b19 .= "<image><url>".$baseurl."/content/mod_shared/skins/upload/".$R0f8134fb60['pic']."</url><caption></caption></image>";
								}
								$R63bede6b19 .= "</gallery>";
								$R2552e540b9 = UPATH_ROOT;
								$Rcc5c6e696c = explode( DS, UPATH_ROOT );
								array_pop( $Rcc5c6e696c );
								$R2552e540b9 = implode( DS, $Rcc5c6e696c );
								$R770dcaf6d0 = $R2552e540b9.DS."content".DS."mod_ykt".DS."xml".DS."gallery.xml";
								if ( !( $Rf500f4a848 = @fopen( $R770dcaf6d0, "w" ) ) )
								{
												echo "Current template file '{$R770dcaf6d0}' not found or have no access!";
								}
								flock( $Rf500f4a848, 2 );
								fwrite( $Rf500f4a848, $R63bede6b19 );
								fclose( $Rf500f4a848 );
				}

}

?>
