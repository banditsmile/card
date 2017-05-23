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
								$R00be52aa45 = array( "aname" => "用户名", "aid" => "用户编号", "rankname" => "级别名称", "alv" => "级别编号", "company" => "公司名称", "parentid" => "上级编号", "arealname" => "真实姓名", "aqq" => "QQ", "amail" => "邮箱", "atel" => "电话", "mobile" => "手机", "aaddr" => "住址", "aremain" => "最低余额", "acsmp" => "最低消费", "income" => "最低代理利润", "aremainrange" => "余额范围", "acsmprange" => "消费范围", "incomerange" => "代理利润范围", "prv" => "省", "city" => "市", "zip" => "邮编", "remarks" => "备注", "eshop" => "网店地址" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Recycle( "agents" );
						
												$this->view( );
						
				}

}

?>
