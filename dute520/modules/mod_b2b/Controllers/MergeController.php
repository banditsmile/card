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
class MergeController extends Controller
{

				public function __construct( )
				{
								set_time_limit( 0 );
				}

				public function Home( )
				{
								$Rcd8d44733c = $this->HistoryTime( );
								if ( 0 < $Rcd8d44733c )
								{
												$Rcd8d44733c = date( "Y-m-d", strtotime( "-0 day", $Rcd8d44733c ) );
								}
								$this->Assign( "historydate", $Rcd8d44733c );
								$this->View( );
				}

				public function OrderHistory( )
				{
								$R361c58f705 = factory::getinstance( "merge" );
								$R4573c24dde = intval( request( "endyear" ) );
								$R4fddd891f5 = intval( request( "endmon" ) );
								$data = array(
												"enddate" => $R4573c24dde."-".$R4fddd891f5."-01"
								);
								$Rcd8d44733c = $this->HistoryTime( );
								if ( 0 < $Rcd8d44733c && strtotime( $data['enddate'] ) <= $Rcd8d44733c )
								{
												$this->Alert( "新的归档时间应大于最后一次归档时间" );
												$this->HistoryGo( );
								}
								$R808b89ba0e = $R361c58f705->IMerge_OrderHistoryTableCreate( $data );
								if ( $R808b89ba0e )
								{
												$R808b89ba0e = $R361c58f705->IMerge_TradeHistoryTableCreate( $data );
												if ( $R808b89ba0e )
												{
																$R1ed7ad9990 = DATACACHE."site".DS."orderhistory.php";
																$Re82ee9b121 = "<?php \$R672a23912c=".strtotime( $data['enddate'] )."; ?>";
																file_put_contents( $R1ed7ad9990, $Re82ee9b121 );
																$this->Alert( "您好，归档成功" );
																$this->HistoryGo( );
												}
												else
												{
																$this->Alert( "您好，归档失败，请重新归档" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "您好，归档失败，请重新归档" );
												$this->HistoryGo( );
								}
				}

				public function Order( )
				{
								$R361c58f705 = factory::getinstance( "merge" );
								$Rb3262f62a5 = intval( request( "startyear" ) );
								$R4573c24dde = intval( request( "endyear" ) );
								$Raefd0c334f = intval( request( "startmon" ) );
								$R4fddd891f5 = intval( request( "endmon" ) );
								$Raefd0c334f = 12 < $Raefd0c334f ? 12 : $Raefd0c334f;
								$R4fddd891f5 = 12 < $R4fddd891f5 ? 12 : $R4fddd891f5;
								if ( $Rb3262f62a5 < $Raefd0c334f )
								{
												$this->Alert( "结束年份不能小于起始年份" );
								}
								if ( $Rb3262f62a5 == $Raefd0c334f && $R4573c24dde <= $R4fddd891f5 )
								{
												$this->Alert( "结束月份不能小于等于起始月份" );
								}
								$Rb3262f62a5 = $Rb3262f62a5 < 10 ? "0".$Rb3262f62a5 : $Rb3262f62a5;
								$R4573c24dde = $R4573c24dde < 10 ? "0".$R4573c24dde : $R4573c24dde;
								$Raefd0c334f = $Raefd0c334f < 10 ? "0".$Raefd0c334f : $Raefd0c334f;
								$R4fddd891f5 = $R4fddd891f5 < 10 ? "0".$R4fddd891f5 : $R4fddd891f5;
								$data = array(
												"newname" => $Rb3262f62a5.$Raefd0c334f.$R4573c24dde.$R4fddd891f5,
												"startdate" => "20".$Rb3262f62a5."-".$Raefd0c334f."-01",
												"enddate" => "20".$R4573c24dde."-".$R4fddd891f5."-01"
								);
								$R808b89ba0e = $R361c58f705->IMerge_OrderTableCreate( $data );
								if ( $R808b89ba0e )
								{
												$Rb3262f62a5 = intval( $Rb3262f62a5 );
												$R4573c24dde = intval( $R4573c24dde );
												$Raefd0c334f = intval( $Raefd0c334f );
												$R4fddd891f5 = intval( $R4fddd891f5 );
												$R8c90cd903e = intval( $R4fddd891f5 ) + 1;
												$R9d61e88cc2 = 12 < $R8c90cd903e ? intval( $R4573c24dde ) + 1 : $R4573c24dde;
												$R8c90cd903e = 12 < $R8c90cd903e ? 1 : $R8c90cd903e;
												$R3db8f5c8bc = $R361c58f705->IMerge_Get( "orders" );
												if ( isset( $R3db8f5c8bc['id'] ) )
												{
																if ( $R3db8f5c8bc['mdata'] != "" )
																{
																				$Re65ac3a893 = unserialize( gzinflate( base64_decode( $R3db8f5c8bc['mdata'] ) ) );
																				$Re65ac3a893['curdate'] = array(
																								$R9d61e88cc2,
																								$R8c90cd903e
																				);
																				$Re65ac3a893['mergedate'] = array_merge( array(
																								array(
																												$Rb3262f62a5,
																												$Raefd0c334f,
																												$R4573c24dde,
																												$R4fddd891f5
																								)
																				), $Re65ac3a893['mergedate'] );
																}
																else
																{
																				$Re65ac3a893 = array(
																								"curdate" => array(
																												$R9d61e88cc2,
																												$R8c90cd903e
																								),
																								"mergedate" => array(
																												array(
																																$Rb3262f62a5,
																																$Raefd0c334f,
																																$R4573c24dde,
																																$R4fddd891f5
																												)
																								)
																				);
																}
																$R92b5a9eddc = base64_encode( gzdeflate( serialize( $Re65ac3a893 ) ) );
																$data = array(
																				"mtable" => "orders",
																				"mdata" => $R92b5a9eddc
																);
																$R808b89ba0e = $R361c58f705->IMerge_Update( $data, $R3db8f5c8bc['id'] );
												}
												else
												{
																$Re65ac3a893 = array(
																				"curdate" => array(
																								$R9d61e88cc2,
																								$R8c90cd903e
																				),
																				"mergedate" => array(
																								array(
																												$Rb3262f62a5,
																												$Raefd0c334f,
																												$R4573c24dde,
																												$R4fddd891f5
																								)
																				)
																);
																$R92b5a9eddc = base64_encode( gzdeflate( serialize( $Re65ac3a893 ) ) );
																$data = array(
																				"mtable" => "orders",
																				"mdata" => $R92b5a9eddc
																);
																$R808b89ba0e = $R361c58f705->IMerge_Create( $data );
												}
												if ( $R808b89ba0e )
												{
																$R1ed7ad9990 = DATACACHE."site".DS."ordermerge.php";
																$Re82ee9b121 = "<?php \$Re65ac3a893='".$data['mdata']."'; ?>";
																file_put_contents( $R1ed7ad9990, $Re82ee9b121 );
																$this->Alert( "您好，归档成功" );
																$this->HistoryGo( );
												}
												else
												{
																$this->Alert( "您好，归档失败，请重新归档" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "您好，归档失败，请重新归档" );
												$this->HistoryGo( );
								}
				}

}

?>
