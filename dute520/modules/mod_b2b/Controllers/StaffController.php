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
class StaffController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "staffs" );
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
								$data = array( );
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IStaff_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "isselect", $R136f072284 );
								$R00be52aa45 = array( "aid" => "老板编号", "staffname" => "员工名" );
								$this->Assign( "sarray", $R00be52aa45 );
								$this->Recycle( "agents" );
						
												$this->view( );
						
				}

}

?>
