<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ranks extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IRank_Get( $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R679e9b9234 = $this->SelectRecord( "ranks", $Rb0d5d47f3d, "order by gid,money" );
								$R026f0167b4 = array( );
								if ( !UB_B2B )
								{
												foreach ( $R679e9b9234 as $R0f8134fb60 )
												{
																if ( $R0f8134fb60['gid'] == 0 )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												$R679e9b9234 = $R026f0167b4;
								}
								else if ( UB_B2C == 0 && UB_YKT == 0 )
								{
												foreach ( $R679e9b9234 as $R0f8134fb60 )
												{
																if ( 0 < $R0f8134fb60['gid'] )
																{
																				$R026f0167b4[] = $R0f8134fb60;
																}
												}
												$R679e9b9234 = $R026f0167b4;
								}
								return $R679e9b9234;
				}

				public function &IRank_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "ranks", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IRank_GetDefault( $Rb0d5d47f3d = "*", $Re9231b441d = 0 )
				{
								$this->reset( );
								$this->add( "isdefault", 1 );
								if ( $Re9231b441d == 0 )
								{
												$this->add( "gid", 0 );
								}
								else
								{
												$this->add( "gid", 0, ">" );
								}
								$R679e9b9234 = $this->SelectRecord( "ranks", $Rb0d5d47f3d );
								if ( !isset( $R679e9b9234[0]['id'] ) )
								{
												$R679e9b9234 = $this->IRank_Get( );
								}
								return $R679e9b9234[0];
				}

				public function IRank_GetNameById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "ranks", "name" );
								return $R679e9b9234[0]['name'];
				}

				public function IRank_GetByMoney( $R72852f08e6, $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = ( "select ".$Rb0d5d47f3d." from ".$this->dbprefix."ranks where money < ".( $R72852f08e6 + 0.01 ) )." order by money desc limit 0, 1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234['id'] ) )
								{
												return $R679e9b9234[0];
								}
								else
								{
												$R679e9b9234 = array( );
												return $R679e9b9234;
								}
				}

				public function &IRank_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								if ( !UB_B2B )
								{
												$R42f28414d6 = " gid = 0 ";
								}
								else if ( UB_YKT == 0 && UB_B2C == 0 )
								{
												$R42f28414d6 = " gid > 0 ";
								}
								else
								{
												$R42f28414d6 = "";
								}
								return $this->PageRecord( "ranks", $R71a6fd054f, $R42c553e7de, $R42f28414d6, $Rb0d5d47f3d, true, "gid ,money, id" );
				}

				public function IRank_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ranks" );
				}

				public function IRank_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ranks", "id = ".$R3584859062 );
				}

				public function IRank_Del( $R3584859062 )
				{
								$this->reset( );
								$R808b89ba0e = $this->DeleteRecord( "ranks", "id = ".$R3584859062 );
								if ( $R808b89ba0e )
								{
												$R130d64a4ad = "ALTER TABLE ".$this->dbprefix."prices DROP price_".$R3584859062;
												mysql_query( $R130d64a4ad, $this->link );
								}
								return $R808b89ba0e;
				}

				public function IRank_AddTableItem( $R0f8134fb60 )
				{
								$R130d64a4ad = "ALTER TABLE `".$this->dbprefix."prices` ADD `price_".$R0f8134fb60."` double";
								mysql_query( $R130d64a4ad, $this->link );
				}

				public function IRank_GetMaxId( )
				{
								$R130d64a4ad = "select max(id) as id from ".$this->dbprefix."ranks";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												return $R679e9b9234[0]['id'];
								}
								else
								{
												return -1;
								}
				}

				public function IRank_GetIdBelow( $R3584859062 )
				{
								$R72852f08e6 = 0;
								$R130d64a4ad = "select money,gid from ".$this->dbprefix."ranks where id=".$R3584859062;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['money'] ) )
								{
												$R72852f08e6 = $R679e9b9234[0]['money'];
												$Re9231b441d = $R679e9b9234[0]['gid'];
								}
								else
								{
												return -1;
								}
								$R130d64a4ad = "select id,gid from ".$this->dbprefix."ranks where money < ".$R72852f08e6." order by money desc limit 0, 1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												$R32c3a0a954 = $R679e9b9234[0]['id'];
												if ( 0 < $Re9231b441d && $R32c3a0a954 < 1 )
												{
																return -1;
												}
												return $R679e9b9234[0]['id'];
								}
								else
								{
												return -1;
								}
				}

				public function IRank_DecreaseAgentRank( $Rf876781d99, $R004c52bf3a )
				{
								$R130d64a4ad = "update ".$this->dbprefix."agents set alv=".$Rf876781d99." where alv=".$R004c52bf3a;
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function IRank_DecreaseCustomerRank( $Rf876781d99, $R004c52bf3a )
				{
								$R130d64a4ad = "update ".$this->dbprefix."customers set clv=".$Rf876781d99." where clv=".$R004c52bf3a;
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function &IRank_GetDiscout( $Rbbab0bbd0d, $R2a51483b14, $R014535cc1a )
				{
								$R026f0167b4 = array( );
								$this->reset( );
								$this->add( "rankid", $Rbbab0bbd0d );
								$this->add( "aid", $R2a51483b14 );
								$this->add( "pricetpl", $R014535cc1a );
								$R679e9b9234 = $this->SelectRecord( "priceplan" );
								if ( isset( $R679e9b9234[0] ) )
								{
												$R026f0167b4 = $R679e9b9234[0];
								}
								return $R026f0167b4;
				}

				public function &IRank_GetDiscout2( $Rbbab0bbd0d, $R2a51483b14 )
				{
								$R026f0167b4 = array( );
								$this->reset( );
								$this->add( "rankid", $Rbbab0bbd0d );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->SelectRecord( "priceplan" );
								return $R679e9b9234;
				}

}

?>
