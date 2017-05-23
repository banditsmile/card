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
class merge extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IMerge_OrderHistoryTableCreate( $data )
				{
								$R130d64a4ad = "create table ".$this->dbprefix."ordershistory like ".$this->dbprefix."orders ";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad, 0 );
								$R130d64a4ad = "insert into ".$this->dbprefix."ordershistory select * from ".$this->dbprefix."orders where orddate < '".$data['enddate']."'";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
								$R130d64a4ad = "delete from ".$this->dbprefix."orders where orddate < '".$data['enddate']."'";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
								return $R808b89ba0e;
				}

				public function IMerge_TradeHistoryTableCreate( $data )
				{
								$R130d64a4ad = "create table ".$this->dbprefix."tradeshistory like ".$this->dbprefix."trades ";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad, 0 );
								$R130d64a4ad = "insert into ".$this->dbprefix."tradeshistory select * from ".$this->dbprefix."trades where createdate < '".$data['enddate']."'";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
								$R130d64a4ad = "delete from ".$this->dbprefix."trades where createdate < '".$data['enddate']."'";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
								return $R808b89ba0e;
				}

				public function IMerge_OrderTableCreate( $data )
				{
								$R130d64a4ad = "create table ".$this->dbprefix."orders_".$data['newname']." like ".$this->dbprefix."orders ";
								$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
								if ( $R808b89ba0e )
								{
												$R130d64a4ad = "insert into ".$this->dbprefix."orders_".$data['newname']." select * from ".$this->dbprefix."orders where orddate > '".$data['startdate']."' and orddate < '".$data['enddate']."'";
												$R808b89ba0e = $this->QueryUpdate( $R130d64a4ad );
												if ( !$R808b89ba0e )
												{
																$R130d64a4ad = "drop table if exists ".$this->dbprefix."orders_".$data['newname'];
																$this->QueryUpdate( $R130d64a4ad );
												}
												else
												{
																$R130d64a4ad = "drop table if exists ".$this->dbprefix."orders_merge";
																$R59ce971875 = $this->QueryUpdate( $R130d64a4ad );
																if ( $R59ce971875 )
																{
																				$R130d64a4ad = "create table ".$this->dbprefix."orders_merge like ".$this->dbprefix."orders ";
																				$R59ce971875 = $this->QueryUpdate( $R130d64a4ad );
																				if ( $R59ce971875 )
																				{
																								$R026f0167b4 = array( );
																								$R026f0167b4[] = $this->dbprefix."orders";
																								$R026f0167b4[] = $this->dbprefix."orders_".$data['newname'];
																								$R1ed7ad9990 = DATACACHE."site".DS."ordermerge.php";
																								if ( file_exists( $R1ed7ad9990 ) )
																								{
																												include( $R1ed7ad9990 );
																												$Re65ac3a893 = unserialize( gzinflate( base64_decode( $Re65ac3a893 ) ) );
																												$R268b8aa72e = $Re65ac3a893['mergedate'];
																												foreach ( $R268b8aa72e as $R0f8134fb60 )
																												{
																																$R0f8134fb60[1] = $R0f8134fb60[1] < 10 ? "0".$R0f8134fb60[1] : $R0f8134fb60[1];
																																$R0f8134fb60[3] = $R0f8134fb60[3] < 10 ? "0".$R0f8134fb60[3] : $R0f8134fb60[3];
																																$R026f0167b4[] = $this->dbprefix."orders_".$R0f8134fb60[0].$R0f8134fb60[1].$R0f8134fb60[2].$R0f8134fb60[3];
																												}
																								}
																								$Rf351f6e099 = array( );
																								foreach ( $R026f0167b4 as $R0f8134fb60 )
																								{
																												$Rf351f6e099[$R0f8134fb60] = 1;
																								}
																								$R026f0167b4 = array( );
																								foreach ( $Rf351f6e099 as $Ra09fe38af3 => $Ra3d52e52a4 )
																								{
																												$R026f0167b4[] = $Ra09fe38af3;
																								}
																								$R63bede6b19 = implode( ",", $R026f0167b4 );
																								$R130d64a4ad = "alter table ub_orders_merge ENGINE=MERGE  UNION=(".$R63bede6b19.") INSERT_METHOD=LAST";
																								$this->QueryUpdate( $R130d64a4ad );
																				}
																}
												}
								}
								return $R808b89ba0e;
				}

				public function IMerge_Get( $table, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "mtable", $table );
								$R679e9b9234 = $this->SelectRecord( "merge", $Rb0d5d47f3d );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return array( );
								}
								else
								{
												return $R679e9b9234[0];
								}
				}

				public function IMerge_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "merge" );
				}

				public function IMerge_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "merge", "id = ".$R3584859062 );
				}

}

?>
