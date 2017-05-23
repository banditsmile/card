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
class PMenuController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "poll" );
				}

				public function Index( )
				{
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$this->Assign( "parent", $this->instance->IPoll_GetById( $Rac9b8532b8 ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->instance->IPoll_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$R00be52aa45 = array( "title" => "����" );
								$this->Assign( "sarray", $R00be52aa45 );
							
												$this->view( );
							
				}

				public function Detail( )
				{
								$R3584859062 = intval( request( "id" ) );
						
												$this->Assign( "item", $this->instance->IPoll_GetById( $R3584859062 ) );
												$this->View( );
						
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

}

?>
