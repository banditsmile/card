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
class PsiController extends Controller
{

				public $service = NULL;
				public $action = NULL;

				public function __construct( )
				{
								$this->service = factory::getservice( "spsi" );
								$this->action = array( "eplist" );
				}

				public function Index( )
				{
								$this->View( "P" );
				}

				public function P( )
				{
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"optype" => getvar( "optype", "i" ),
												"action" => $this->action[0]
								);
								$R4e420efcc3 = $this->service->IPsi_Page( $data );
								$Redcb7adc79 = array( );
								foreach ( $R4e420efcc3['item'] as $R0f8134fb60 )
								{
												$Redcb7adc79[] = $R0f8134fb60['ubzpid'];
								}
								if ( 0 < count( $Redcb7adc79 ) )
								{
												$R422f9a4efb = factory::getinstance( "products" );
												$R55c494bb27 = $R422f9a4efb->IProduct_GetByIds( implode( ",", $Redcb7adc79 ), "pname, pid" );
												$Rfe801ac096 = array( );
												foreach ( $R55c494bb27 as $R0f8134fb60 )
												{
																$Rfe801ac096[$R0f8134fb60['pid']] = $R0f8134fb60['pname'];
												}
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R4e420efcc3['item'][$Ra16d228039] );	$Ra16d228039++	)
												{
																if ( isset( $Rfe801ac096[$R4e420efcc3['item'][$Ra16d228039]['ubzpid']] ) )
																{
																				$R4e420efcc3['item'][$Ra16d228039]['ubzpname'] = $Rfe801ac096[$R4e420efcc3['item'][$Ra16d228039]['ubzpid']];
																}
																if ( !isset( $R4e420efcc3['item'][$Ra16d228039 + 1] ) )
																{
																}
												}
								}
						
												$this->FillPage( $data, $R4e420efcc3 );
												$this->View( );
						
				}

				public function S( )
				{
								$data = array(
												"page" => intval( getvar( "page", 1 ) ),
												"optype" => getvar( "optype", "o" ),
												"action" => $this->action[0]
								);
								$R4e420efcc3 = $this->service->IPsi_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
					
												$this->View( );
					
				}

				public function Save( )
				{
								$data = array(
												"ubzepid" => intval( getvar( "ubzepid", 1 ) ),
												"action" => getvar( "action" )
								);
								$this->service->IPsi_Save( $data );
								$this->Alert( "²Ù×÷³É¹¦£¡" );
								$this->ScriptRedirect( "index.php?m=mod_b2b&c=psi&a=s" );
				}

}

?>
