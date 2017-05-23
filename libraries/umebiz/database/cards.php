<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class cards extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICard_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "cards", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", true );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "pname", "cardnumber", "AccountName", "Address", "other", "ordno" ),
																"null" => 0
												),
												array(
																"op" => "charequal",
																"var" => array( "cardpwd" )
												),
												array(
																"op" => "intequal",
																"var" => array( "aid", "bindaid", "cardgroup", "ispay" ),
																"null" => 0
												),
												array(
																"op" => "doubleequal",
																"var" => array( "price" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['cardok'] ) && $data['cardok'] != "" && $data['cardok'] != -1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."cardok = ".intval( $data['cardok'] );
								}
								if ( isset( $data['cardnumberstart'] ) && $data['cardnumberstart'] != "" )
								{
												$R026f0167b4[] = " (".$R1de95f080d."cardnumber > '".$data['cardnumberstart']."' or ".$R1de95f080d."cardnumber = '".$data['cardnumberstart']."' )";
								}
								if ( isset( $data['cardnumberend'] ) && $data['cardnumberend'] != "" )
								{
												$R026f0167b4[] = " (".$R1de95f080d."cardnumber < '".$data['cardnumberend']."' or ".$R1de95f080d."cardnumber = '".$data['cardnumberend']."' )";
								}
								if ( isset( $data['pid'] ) && $data['pid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."pid = ".intval( $data['pid'] );
								}
								else if ( " ".$R1de95f080d."pid = ".intval( $data['pid'] ) )
								{
												if ( $data['ykt'] == 0 )
												{
																if ( 99 < $data['ptype'] )
																{
																				$R026f0167b4[] = " ".$R1de95f080d."ptype = ".intval( $data['ptype'] );
																}
																else
																{
																				$R026f0167b4[] = " ".$R1de95f080d."ptype > 99 ";
																}
												}
												else if ( $data['ykt'] == 2 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."ptype < 100 ";
												}
												else
												{
																$R026f0167b4[] = " ".$R1de95f080d."ptype = ".intval( $data['ptype'] );
												}
								}
								if ( isset( $data['nodate'] ) && $data['nodate'] == 1 )
								{
								}
								else
								{
												$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
												if ( $R31f1c1341b != "" )
												{
																$R026f0167b4[] = $R31f1c1341b;
												}
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " ".$R1de95f080d."inrecycle = 0";
								}
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R63bede6b19 = $this->GetOptype( $data['optype'] );
												if ( $R63bede6b19 != "" )
												{
																$R026f0167b4[] = $R63bede6b19;
												}
								}
								if ( isset( $data['bindindex'] ) && $data['bindindex'] == 1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."bindaid > 0 ";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetOptype( $R36130a8639 )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												switch ( $R0f8134fb60 )
												{
												case "s" :
																$R026f0167b4[] = " (ordno is null or ordno = '') ";
																break;
												case "f" :
																$R026f0167b4[] = " (ordno is not null and ordno <> '') ";
																break;
												default :
																break;
												}
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function YearNowSub( $R5b08d4f823 )
				{
								$Rd94164fb8c = strtotime( "now" );
								$R5d6b0116e4 = strtotime( $R5b08d4f823 );
								$R35a9abe007 = $Rd94164fb8c - $R5d6b0116e4;
								if ( $R35a9abe007 < 0 )
								{
												$R35a9abe007 = 0;
								}
								$R7f49613fdd = intval( $R35a9abe007 / 86400 / 365 );
								$R63bede6b19 = $R7f49613fdd;
								return $R63bede6b19;
				}

				public function GetDateLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R497a2c671f = $this->YearNowSub( urldecode( $data['startdate'] ) );
												if ( 9 < $R497a2c671f )
												{
																return "";
												}
												$R026f0167b4[] = " ".$R1de95f080d."addeddate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."addeddate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function &ICard_GetStock( $R3359c04a1b, $R29fdeb9060 = 0 )
				{
								$R130d64a4ad = "select pid,count(0) as mystock from ".$this->dbprefix."cards where cardok=".intval( $R29fdeb9060 )." and pid in (".$R3359c04a1b.") group by pid";
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								return $R3db8f5c8bc;
				}

				public function ICard_GetByTrade( $Rdcd9105806 )
				{
								$R130d64a4ad = "select t1.*,t0.outcome from ".$this->dbprefix."trades t0 left join ".$this->dbprefix."cards t1 on t1.cardnumber=t0.yktnumber where t0.yktnumber is not null and t0.ordno='".$Rdcd9105806."'";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R0f8134fb60['cardpwd'] = base64_decode( $R0f8134fb60['cardpwd'] );
												$R3db8f5c8bc[] = $R0f8134fb60;
								}
								return $R3db8f5c8bc;
				}

				public function &ICard_Get( $Rdcd9105806, $R28e6bfe150 = 0 )
				{
								if ( $R28e6bfe150 == 99 )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."cards where (otherordno='".$Rdcd9105806."' or ordno='".$Rdcd9105806."') and ptype < 99 and inrecycle=0";
								}
								else if ( $R28e6bfe150 == 100 )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."cards where (otherordno='".$Rdcd9105806."' or ordno='".$Rdcd9105806."') and ptype > 99 and inrecycle=0";
								}
								else
								{
												$this->reset( );
												$this->add( "ordno", $Rdcd9105806 );
												$R1b69c92460 = 0;
												$R679e9b9234 = $this->SelectRecord( "orders", "ptype" );
												$R1b69c92460 = isset( $R679e9b9234[0]['ptype'] ) ? $R679e9b9234[0]['ptype'] : 0;
												if ( $R1b69c92460 < 99 )
												{
																$R130d64a4ad = "select * from ".$this->dbprefix."cards where (otherordno='".$Rdcd9105806."' or ordno='".$Rdcd9105806."') and ptype < 99 and inrecycle=0";
												}
												else
												{
																$R130d64a4ad = "select * from ".$this->dbprefix."cards where (otherordno='".$Rdcd9105806."' or ordno='".$Rdcd9105806."') and ptype > 99 and inrecycle=0";
												}
								}
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R0f8134fb60['cardpwd'] = base64_decode( $R0f8134fb60['cardpwd'] );
												$R3db8f5c8bc[] = $R0f8134fb60;
								}
								return $R3db8f5c8bc;
				}

				public function &ICard_Buy( $R66b0d9d6f1, $R8e8b5578f7, $Rbae26e5418 = false, $Rdcd9105806 = "", $Rae1b02c731 = "" )
				{
								$this->reset( );
								$this->add( "pid", $R8e8b5578f7 );
								$R1b69c92460 = 0;
								$Rd2a74effd2 = 0;
								$R679e9b9234 = $this->SelectRecord( "products", "ptype,disparea" );
								if ( isset( $R679e9b9234[0]['ptype'] ) )
								{
												$R1b69c92460 = intval( $R679e9b9234[0]['ptype'] );
												$Rd2a74effd2 = intval( $R679e9b9234[0]['disparea'] );
								}
								$R8a02505cd0 = "";
								if ( $Rdcd9105806 != "" )
								{
												$R8a02505cd0 = " or ordno = '".$Rdcd9105806."' ";
								}
								if ( $R1b69c92460 < 100 )
								{
												$R63bede6b19 = "";
												if ( $R1b69c92460 == 3 && $Rd2a74effd2 == 1 && $Rdcd9105806 != "" && $Rae1b02c731 != "" )
												{
																$R63bede6b19 = " and cardnumber='".$Rae1b02c731."' ";
												}
												if ( $Rbae26e5418 )
												{
																$R130d64a4ad = "select * from ".$this->dbprefix."cards where ((cardok = 1 and inrecycle=0 and pid = ".$R8e8b5578f7.$R63bede6b19.") ".$R8a02505cd0.") and ptype < 99 order by id desc limit 0,".$R66b0d9d6f1;
												}
												else
												{
																$R130d64a4ad = "select * from ".$this->dbprefix."cards where ((cardok = 1 and inrecycle=0 and pid = ".$R8e8b5578f7.$R63bede6b19.") ".$R8a02505cd0.") and ptype < 99 order by id limit 0,".$R66b0d9d6f1;
												}
								}
								else if ( $Rbae26e5418 )
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."cards where cardok = 1 and inrecycle=0 and pid = ".$R8e8b5578f7." and bindaid=0 and (ordno is null or ordno='') order by id desc limit 0,".$R66b0d9d6f1;
								}
								else
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."cards where cardok = 1 and inrecycle=0 and pid = ".$R8e8b5578f7." and bindaid=0 and (ordno is null or ordno='') order by id limit 0,".$R66b0d9d6f1;
								}
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R3db8f5c8bc = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R0f8134fb60['cardpwd'] = base64_decode( $R0f8134fb60['cardpwd'] );
												$R3db8f5c8bc[] = $R0f8134fb60;
								}
								return $R3db8f5c8bc;
				}

				public function &ICard_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "cards" );
								return $R679e9b9234[0];
				}

				public function &ICard_GetByLimit( $data = array( ), $R4454e360ff = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "cards", $R4454e360ff );
								return $R679e9b9234[0];
				}

				public function &ICard_GetAllByLimit( $data = array( ), $R4454e360ff = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "cards", $R4454e360ff );
								return $R679e9b9234;
				}

				public function ICard_GetByStr( $R63bede6b19, $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select ".$R4454e360ff." from ".$this->dbprefix."cards where ".$R63bede6b19;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function ICard_Update( $Re28f0628d6 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "cards", "id = ".$R3584859062 );
				}

				public function ICard_UpdateByStr( $Re28f0628d6 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "cards", $R63bede6b19 );
				}

				public function ICard_UpdateByOrdno( $Re28f0628d6 = array( ), $Rdcd9105806 )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "cards", "ordno = '".$Rdcd9105806."'" );
				}

				public function ICard_UpdateByGroup( $Re28f0628d6 = array( ), $R7661e907a4 )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "cards", "cardgroup = ".$R7661e907a4 );
				}

				public function ICard_UpdateCardPwd( $Re28f0628d6 = array( ), $R0f8134fb60 = array( ) )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R42f28414d6 = sprintf( "cardnumber ='%s' and cardpwd ='%s'", $R0f8134fb60['cardnumber'], $R0f8134fb60['cardpwd'] );
								return $this->UpdateRecord( "cards", $R42f28414d6 );
				}

				public function ICard_UpdateMany( $Re28f0628d6 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "cards", "id in (".$R3584859062.")" );
				}

				public function ICard_IsExist( $Re28f0628d6 = array( ) )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->num_rows( "cards" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function ICard_YktCheck( $Re28f0628d6 = array( ) )
				{
								$this->reset( );
								foreach ( $Re28f0628d6 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "cards", "money,cardok" );
								if ( isset( $R679e9b9234[0]['money'] ) )
								{
												if ( $R679e9b9234[0]['cardok'] == 1 )
												{
																return $R679e9b9234[0]['money'];
												}
												else
												{
																return -1;
												}
								}
								else
								{
												return 0;
								}
				}

				public function ICard_Create( $R915d6ca5a5 = array( ) )
				{
								$this->reset( );
								foreach ( $R915d6ca5a5 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "cards" );
				}

				public function ICard_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "cards", "id in (".$R3584859062.")" );
				}

				public function ICard_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								if ( $R172196908b == "" )
								{
												$R172196908b = " 1 = 1 ";
								}
								return $this->UpdateRecord( "cards", $R172196908b );
				}

				public function ICard_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "cards", "id in (".$R3584859062.")" );
				}

				public function ICard_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								if ( $R172196908b == "" )
								{
												$R172196908b = " 1 = 1 ";
								}
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "cards", $R172196908b );
				}

				public function ICard_GetMaxGroup( )
				{
								$R130d64a4ad = "select max(cardgroup) as cardgroup from ".$this->dbprefix."cards";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$Rfddc72fb63 = isset( $R679e9b9234[0]['cardgroup'] ) ? intval( $R679e9b9234[0]['cardgroup'] ) : 0;
								$R130d64a4ad = "select max(idx+0) as cardgroup from ".$this->dbprefix."buyrights where param='yktgroup'";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R95f997c93d = isset( $R679e9b9234[0]['cardgroup'] ) ? intval( $R679e9b9234[0]['cardgroup'] ) : 0;
								$Rb9373258e7 = max( $Rfddc72fb63, $R95f997c93d );
								return $Rb9373258e7;
				}

				public function &ICard_GroupPage( $data = array( ) )
				{
								$R130d64a4ad = "select c.*, 0 as stocks from ".$this->dbprefix."cards c "."%s group by cardgroup order by cardgroup desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "c." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function &ICard_PageByPrice( $data = array( ) )
				{
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "pname" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "pid" ),
																"null" => 0
												),
												array(
																"op" => "doubleequal",
																"var" => array( "listprice" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$Rfed47d1571 = implode( " and ", $R026f0167b4 );
								if ( $Rfed47d1571 != "" )
								{
												$Rfed47d1571 = " and ".$Rfed47d1571;
								}
								$R130d64a4ad = "select pname,ptype,pid,listprice as price from ".$this->dbprefix."products where ptype>99 ".$Rfed47d1571." group by pid order by listprice";
								$R71a6fd054f = intval( $data['page'] );
								$R679e9b9234 = $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
								$R026f0167b4 = array( );
								if ( isset( $data['startdate'] ) && $data['startdate'] != "" )
								{
												$R026f0167b4[] = " orddate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " orddate < '".urldecode( $data['enddate'] )."'";
								}
								$R31f1c1341b = implode( " and ", $R026f0167b4 );
								if ( $R31f1c1341b != "" )
								{
												$R31f1c1341b = " and ".$R31f1c1341b;
								}
								$Ra16d228039 = 0;
								foreach ( $R679e9b9234['item'] as $R0f8134fb60 )
								{
												$R130d64a4ad = "select count(0) as cout from ".$this->dbprefix."cards where pid = ".$R0f8134fb60['pid']." and money = price ";
												$R40bc7f0754 = $this->Rows( $R130d64a4ad );
												$R130d64a4ad = "select count(0) as cout from ".$this->dbprefix."cards where pid = ".$R0f8134fb60['pid']." and money < price ";
												$R2187aad500 = $this->Rows( $R130d64a4ad );
												$R130d64a4ad = "select count(0) as cout from ".$this->dbprefix."cards where pid = ".$R0f8134fb60['pid']." and money < price ".$R31f1c1341b;
												$Rd3b708f32b = $this->Rows( $R130d64a4ad );
												$R679e9b9234['item'][$Ra16d228039]['okstocks'] = $R40bc7f0754;
												$R679e9b9234['item'][$Ra16d228039]['notokinrange'] = $Rd3b708f32b;
												$R679e9b9234['item'][$Ra16d228039]['stocks'] = $R40bc7f0754 + $R2187aad500;
												$Ra16d228039++;
								}
								return $R679e9b9234;
				}

				public function Rows( $R130d64a4ad )
				{
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0]['cout'];
				}

				public function &ICard_ExchangePage( $data = array( ) )
				{
								$R130d64a4ad = "select c.price,c.pname as cardname, t0.pname,t0.ptype,t0.pid,t0.qty,t0.dollars from ".$this->dbprefix."cards c "."left join ".$this->dbprefix."cards t0 on t0.ordno=c.ordno "."%s group by c.ordno order by id";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "c." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

}

?>
