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
class MoneyController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "agents" );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R136f072284 = intval( request( "isselect", "" ) );
								$data = array(
												"optype" => getvar( "optype" ),
												"parentid" => getvar( "parentid", -1 ),
												"orderby" => getvar( "orderby", "aid" )
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IAgent_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "isselect", $R136f072284 );
								$R2322221d09 = array( "aremain", "selffrozenfunds", "tradefrozenfunds", "sysfrozenfunds", "bossfrozenfunds", "income", "funds", "arrears", "scored", "acsmp" );
								$R026f0167b4 = array( );
								foreach ( $R2322221d09 as $R0f8134fb60 )
								{
												$R026f0167b4[] = "sum(".$R0f8134fb60.") as ".$R0f8134fb60;
								}
								$Rc73a9301dd = implode( ",", $R026f0167b4 );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "iiisd" ) ) ) );
								$this->Assign( "rs", $R3db8f5c8bc[0] );
								$R00be52aa45 = array( "aname" => "�û���", "aid" => "�û����", "rankname" => "��������", "alv" => "������", "company" => "��˾����", "parentid" => "�ϼ����", "arealname" => "��ʵ����", "aqq" => "QQ", "amail" => "����", "atel" => "�绰", "mobile" => "�ֻ�", "aaddr" => "סַ", "aremain" => "������", "acsmp" => "�������", "income" => "��ʹ�������", "aremainrange" => "��Χ", "acsmprange" => "���ѷ�Χ", "incomerange" => "��������Χ", "prv" => "ʡ", "city" => "��", "zip" => "�ʱ�", "remarks" => "��ע", "eshop" => "�����ַ" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Recycle( "agents" );
						
												$this->view( );
						
				}

}

?>
