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
class PollController extends Controller
{

				public function __construct( )
				{
								$this->hander = factory::getinstance( "poll" );
				}

				public function poll( )
				{
								$Rac9b8532b8 = intval( request( "parentid" ) );
								$data = array( "parentid" => 0 );
								$this->Assign( "parent", $this->hander->IPoll_Get( $data ) );
								$data = array(
												"parentid" => $Rac9b8532b8
								);
								$Re6be5a6973 = $this->hander->IPoll_Get( $data );
								$R3ea797fb3e = 0;
								foreach ( $Re6be5a6973 as $R0f8134fb60 )
								{
												$R3ea797fb3e += $R0f8134fb60['hits'];
								}
							
												$this->Assign( "totlehits", $R3ea797fb3e );
												$this->Assign( "items", $this->hander->IPoll_Get( $data ) );
												$this->View( );
							
				}

				public function Save( )
				{
								$R96d15b99c4 = getvar( "menu" );
								if ( is_array( $R96d15b99c4 ) )
								{
												$R96d15b99c4 = implode( ",", $R96d15b99c4 );
								}
								if ( $R96d15b99c4 != "" )
								{
												$this->hander->IPoll_UpdateVote( $R96d15b99c4 );
								}
								$this->View( "poll" );
				}

}

?>
