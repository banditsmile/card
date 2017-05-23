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
class AjaxController extends Controller
{

				public $instance = NULL;

				public function __construct( )
				{
								$this->instance = factory::getinstance( "articles" );
				}

				public function Rank( )
				{
								$R3584859062 = intval( getvar( "id" ) );
								$R52d5b5e885 = intval( getvar( "action" ) );
								if ( $R52d5b5e885 == 100 )
								{
												$this->RankDetail( $R3584859062, false, $R52d5b5e885 );
												exit( );
								}
								$R9e96d1f0e7 = $_SERVER['REMOTE_ADDR'];
								if ( $R52d5b5e885 == 20 )
								{
												if ( getvar( "article_ding_".$R3584859062, "", "COOKIE" ) == $R9e96d1f0e7 )
												{
																echo -1;
																exit( );
												}
												setcookie( "article_ding_".$R3584859062, $R9e96d1f0e7, time( ) + 3600 );
												$R0f8134fb60 = $this->instance->IArticle_GetById( $R3584859062 );
												$data = array(
																"rank" => $R0f8134fb60['rank'] + 1
												);
												$this->instance->IArticle_Update( $data, $R3584859062 );
												echo $R0f8134fb60['rank'] + 1;
												exit( );
								}
								if ( getvar( "article_rank_".$R3584859062, "", "COOKIE" ) == $R9e96d1f0e7 )
								{
												echo -1;
												exit( );
								}
								setcookie( "article_rank_".$R3584859062, $R9e96d1f0e7, time( ) + 3600 );
								$this->RankDetail( $R3584859062, true, $R52d5b5e885 );
				}

				public function RankDetail( $R3584859062, $Rcc32da8337 = false, $R52d5b5e885 = 0 )
				{
								$R0f8134fb60 = $this->instance->IArticle_GetById( $R3584859062 );
								if ( $Rcc32da8337 )
								{
												$data = array(
																"rank".$R52d5b5e885 => $R0f8134fb60["rank".$R52d5b5e885] + 1
												);
												$R0f8134fb60["rank".$R52d5b5e885] = $R0f8134fb60["rank".$R52d5b5e885] + 1;
												$this->instance->IArticle_Update( $data, $R3584859062 );
								}
								if ( $R52d5b5e885 == 100 )
								{
												$data = array(
																"tick" => $R0f8134fb60['tick'] + 1
												);
												$this->instance->IArticle_Update( $data, $R3584859062 );
								}
								$Ra87523470b = $this->GetMaxRank( $R0f8134fb60 );
								$Rf351f6e099 = array( );
								$R737e3dec04 = array( );
								$R0058204dce = 0;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 7;	$Ra16d228039++	)
								{
												$Rf351f6e099[] = $R0f8134fb60["rank".$Ra16d228039];
												$R0058204dce += $R0f8134fb60["rank".$Ra16d228039];
												$R737e3dec04[] = intval( $R0f8134fb60["rank".$Ra16d228039] * 75 / $Ra87523470b );
								}
								echo implode( "|", $Rf351f6e099 )."|".implode( "|", $R737e3dec04 )."|".$R0f8134fb60['rank']."|".$R0058204dce."|".$R0f8134fb60['tick'];
				}

				public function GetMaxRank( $data = array( ) )
				{
								$Ra87523470b = 1;
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 7;	$Ra16d228039++	)
								{
												if ( $Ra87523470b < $data["rank".$Ra16d228039] )
												{
																$Ra87523470b = $data["rank".$Ra16d228039];
												}
								}
								return $Ra87523470b;
				}

}

?>
