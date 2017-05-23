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

				public $session = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
				}

				public function Index( $R9906335164 = false, $R511aa10c02 = "category.html" )
				{
								$Rd2e691562d = $this->GetCatCache( );
								$R27752f5168 = $this->GetSubCatCache( );
								global $masterid;
								if ( 0 < $masterid )
								{
												$Rdc7dc55174 = $this->GetVipCategoryShowCache( );
												$R18ba711cb5 = array( );
												foreach ( $Rdc7dc55174 as $R0f8134fb60 )
												{
																if ( $R0f8134fb60 != "" )
																{
																				$R18ba711cb5[$R0f8134fb60] = 1;
																}
												}
												$R026f0167b4 = array( );
												foreach ( $Rd2e691562d as $R0f8134fb60 )
												{
																if ( isset( $R18ba711cb5[$R0f8134fb60['id']] ) )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												$Rd2e691562d = $R026f0167b4;
												$R026f0167b4 = array( );
												foreach ( $R27752f5168 as $R0f8134fb60 )
												{
																if ( isset( $R18ba711cb5[$R0f8134fb60['id']] ) )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												$R27752f5168 = $R026f0167b4;
								}
								$this->Assign( "cat", $Rd2e691562d );
								$this->Assign( "subcat", $R27752f5168 );
								$this->SetShowType( );
								$this->Assign( "html", $R9906335164 ? "1" : "0" );
					
												$this->view( null, null, $R9906335164, $R511aa10c02 );
								
				}

				public function PinYin( )
				{
								$R27752f5168 = $this->GetSubCatCache( );
								global $masterid;
								if ( 0 < $masterid )
								{
												$Rdc7dc55174 = $this->GetVipCategoryShowCache( );
												$R18ba711cb5 = array( );
												foreach ( $Rdc7dc55174 as $R0f8134fb60 )
												{
																if ( $R0f8134fb60 != "" )
																{
																				$R18ba711cb5[$R0f8134fb60] = 1;
																}
												}
												$R026f0167b4 = array( );
												foreach ( $R27752f5168 as $R0f8134fb60 )
												{
																if ( isset( $R18ba711cb5[$R0f8134fb60['id']] ) )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												$R27752f5168 = $R026f0167b4;
								}
								$this->SetShowType( );
								$this->Assign( "subcat", $R27752f5168 );
								$this->view( );
				}

				public function SetShowType( )
				{
								$R30b2ab8dc1 = $this->GetMainWebCache( );
								$Rcc5c6e696c = explode( "|", $R30b2ab8dc1['config'] );
								$R30aa8c1852 = count( $Rcc5c6e696c );
								if ( 33 < $R30aa8c1852 )
								{
												$R22647b49c5 = intval( $Rcc5c6e696c[33] );
								}
								else
								{
												$R22647b49c5 = 0;
								}
								$this->Assign( "showtype", $R22647b49c5 );
				}

}

?>
