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
class AskController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "ask" );
				}

				public function Index( )
				{
								$data = array( );
								$R71a6fd054f = intval( request( "page" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "iuuti" ) ) ) );
							
												$this->FillPage( $data, $R4e420efcc3 );
												$this->view( );
							
				}

				public function Add( )
				{
							
												$this->View( );
							
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "kjjds" ) ) ) );
							
												$this->View( );
							
				}

				public function Del( )
				{
								$R3584859062 = intval( request( "id" ) );
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "lkdxd" ) ) ) );
								$this->View( "index" );
								$this->Alert( "删除成功！" );
				}

				public function Save( )
				{
								$R3584859062 = intval( request( "id" ) );
								$data = array(
												"reply" => getvar( "reply", "" )
								);
								$Oooo00 = "base64_decode";
								$ooOO00o = $Oooo00( "YmFzZTY0X2RlY29kZQ==" );
								$o00OO = $Oooo00( "Z3ppbmZsYXRl" );
								$cphp0 = __FILE__;
								eval( $o00OO( $ooOO00o( $this->comget( "oiess" ) ) ) );
								$this->Alert( "更新成功！" );
								$this->View( "Index" );
				}

}

?>
