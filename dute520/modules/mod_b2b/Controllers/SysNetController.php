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
class SysNetController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "sysnet" );
				}

				public function Index( )
				{
							
												$this->Assign( "item", $this->instance->ISysnet_Get( ) );
												$this->View( );
							
				}

				public function Save( )
				{
								$R8ef13c9f85 = request( "oldupwd" );
								$R668c261c12 = request( "upwd" );
								$data = array(
												"uid" => intval( request( "uid" ) ),
												"uname" => getvar( "uname" ),
												"usign" => getvar( "usign" )
								);
								if ( $R8ef13c9f85 != $R668c261c12 )
								{
												$data['upwd'] = md5( $R668c261c12 );
								}
								$R808b89ba0e = $this->instance->ISysnet_Save( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "更新成功！" );
								}
								else
								{
												$this->Alert( "更新失败！" );
								}
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=SysNet" );
				}

}

?>
