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
class LoginController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "login" );
				}

				public function Home( )
				{
								$this->View( "Index" );
				}

				public function Index( )
				{
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$Ra97450e867 = intval( request( "isfront" ) );
								$R58bca74885 = array(
												"isfront" => intval( request( "isfront" ) ),
												"operator" => getvar( "operator" )
								);
								$data = array_merge( $R58bca74885, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->ILogin_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "operator" => "登陆名" );
								$R8dc7d3eb73 = array( "0" => "后台日志", "1" => "前台日志" );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "cfarray", $R8dc7d3eb73 );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Assign( "isfront", $Ra97450e867 );
						
												$this->view( );
						
				}

}

?>
