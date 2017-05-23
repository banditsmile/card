<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class yktnp extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IYktNP_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								return $this->PageRecord( "ykt", $R71a6fd054f, 15, $this->GetPageLimit( $data ) );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$R7965cb3798 = $data['keywords'];
								$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
								foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = " cardnumber like '%".$R0f8134fb60."%'";
								}
								if ( $data['cardok'] != "" )
								{
												$R026f0167b4[] = " cardok = ".intval( $data['cardok'] );
								}
								if ( isset( $data['ykt'] ) )
								{
												if ( $data['ykt'] == 0 )
												{
																$R026f0167b4[] = " ptype > 99 ";
												}
												else
												{
																$R026f0167b4[] = " ptype = ".intval( $data['ptype'] );
												}
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IYktNP_Get( )
				{
								$this->reset( );
								return $this->SelectRecord( "ykt" );
				}

				public function IYktNP_Create( $R915d6ca5a5 = array( ) )
				{
								$this->reset( );
								foreach ( $R915d6ca5a5 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ykt" );
				}

				public function IYktNP_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "ykt", "id = ".$R3584859062 );
				}

				public function IYktNP_Check( $R8e8b5578f7, $data )
				{
								$R026f0167b4 = array( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$R026f0167b4[] = "t0.".$Ra09fe38af3."='".$Ra3d52e52a4."'";
								}
								$R026f0167b4[] = "t0.cardok=1";
								$R130d64a4ad = "select t0.money,t0.bindpid,t0.cardnumber,(select yktcard from ".$this->dbprefix."products t7 where t7.pid=".$R8e8b5578f7.") as yktcard,"."(select count(0) from ".$this->dbprefix."yktnp t6 where t6.pid=".$R8e8b5578f7.") as count_ykt,"."(select count(0) from ".$this->dbprefix."yktnp t1 where t1.pid=".$R8e8b5578f7." and t1.yktid=t0.id) as count_yktid,"."(select count(0) from ".$this->dbprefix."yktnp t2 where t2.pid=".$R8e8b5578f7." and t2.yktprice=t0.price) as count_yktprice,"."(select count(0) from ".$this->dbprefix."yktnp t3 where t3.pid=".$R8e8b5578f7." and t3.yktgroup=t0.cardgroup) as count_yktgroup,"."(select count(0) from ".$this->dbprefix."yktnp t4 where t4.pid=".$R8e8b5578f7." and t4.ykttype=t0.ptype) as count_ykttype,"."(select count(0) from ".$this->dbprefix."yktnp t5 where t5.pid=".$R8e8b5578f7." and t5.notyktid=t0.id) as count_notyktid"." from ".$this->dbprefix."cards t0 where ".implode( " and ", $R026f0167b4 );
								$R1b33f70f78 = array( );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['money'] ) )
								{
												$R3db8f5c8bc = $R679e9b9234[0];
												$R72852f08e6 = $R679e9b9234[0]['money'];
												$Rd07030be9f = $R3db8f5c8bc['yktcard'];
												$Re559dc39a1 = $R3db8f5c8bc['cardnumber'];
												if ( $Rd07030be9f != "" )
												{
																$Rcc5c6e696c = explode( ",", $Rd07030be9f );
																$Ra16d228039 = 0;
																foreach ( $Rcc5c6e696c as $R0f8134fb60 )
																{
																				$Ra16d228039++;
																				if ( !( strstr( $Re559dc39a1, $R0f8134fb60 ) == false ) )
																				{
																								break;
																				}
																				continue;
																				break;
																}
																if ( $Ra16d228039 == count( $Rcc5c6e696c ) )
																{
																				echo "no";
																				return -1;
																}
												}
												if ( $R3db8f5c8bc['bindpid'] != "" )
												{
																$R9165cb97fd = $R8e8b5578f7.",";
																if ( strstr( $R3db8f5c8bc['bindpid'], $R9165cb97fd ) == false )
																{
																				echo "no2";
																				return -1;
																}
												}
												if ( 0 < $R3db8f5c8bc['count_notyktid'] )
												{
																echo "no4";
																return -1;
												}
												if ( 0 < $R3db8f5c8bc['count_ykt'] && $R3db8f5c8bc['count_yktid'] == 0 && $R3db8f5c8bc['count_yktprice'] == 0 && $R3db8f5c8bc['count_yktgroup'] == 0 )
												{
																echo "no3";
																return -1;
												}
												return $R72852f08e6;
								}
								else
								{
												return 0;
								}
				}

}

?>
