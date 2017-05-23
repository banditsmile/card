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
class CategoryController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "category" );
								$this->Checkb2bSession( );
				}

				public function Child( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$R3584859062 = intval( request( "id" ) );
								if ( $R3584859062 == 0 )
								{
												echo "";
												exit( );
								}
								$agent = $this->session->agent;
								$R2a51483b14 = $agent[7];
								$R3db8f5c8bc = $this->instance->ICategory_Get( $R3584859062, $R2a51483b14, 1 );
								$R026f0167b4 = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R026f0167b4[] = $R0f8134fb60['id'].",".$R0f8134fb60['name'];
								}
								echo implode( "@#$", $R026f0167b4 );
								exit( );
				}

}

?>
