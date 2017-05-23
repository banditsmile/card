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
class msg extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IMsg_Page( $data = array( ), $Rbae26e5418 = true, $Re2bcf953af = "id" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageRecord( "msg", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), "*", $Rbae26e5418, $Re2bcf953af );
				}

				public function IMsg_NotReaded( $data = array( ), $R362661de72 = 0 )
				{
								$R09a3346376 = ACACHE."m".$R362661de72."_".$data['msgto'].".php";
								$R929cf63f35 = DATACACHE."msg.php";
								if ( file_exists( $R929cf63f35 ) )
								{
												include( $R929cf63f35 );
								}
								else
								{
												$R4c6d6471cd = 0;
								}
								if ( !file_exists( $R09a3346376 ) || filemtime( $R09a3346376 ) < $R4c6d6471cd )
								{
												$Raf6dee234f = "(msgto=".$data['msgto']." and hidden=-1 and isreaded = -1 and msgtype=1 and inrecycle=0)";
												$R651f1bfe78 = "(msgto=999999 and msgcc='all')";
												$R9d156b6318 = "(msgfrom=".$data['bossid']." and msgto=999999 and msgcc='allunderling')";
												$Rbf5e092a93 = ",".$data['msgto'].",";
												$R5402977ddf = "(hiddenaid is null or hiddenaid = '' or hiddenaid not like '%".$Rbf5e092a93."%') and (isreadedaid is null or isreadedaid = '' or isreadedaid not like '%".$Rbf5e092a93."%')";
												$R853e6673d8 = "((".$R651f1bfe78." or ".$R9d156b6318.") and msgtype=1 and inrecycle=0 and ".$R5402977ddf.")";
												$R63bede6b19 = $Raf6dee234f." or ".$R853e6673d8;
												if ( $R362661de72 == 0 )
												{
																$R130d64a4ad = "select count(0) as num from ".$this->dbprefix."msg t0 where ".$R63bede6b19;
																$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
																$num = isset( $R679e9b9234[0]['num'] ) ? $R679e9b9234[0]['num'] : 0;
																$R4e420efcc3 = $num;
																$R63bede6b19 = "\$R4e420efcc3=".$num;
												}
												else
												{
																$R4454e360ff = "id,msgfrom,msgto,msgcc,title,content,reply,createdate,createip,pop,msgtype,isreaded,parentid,hidden,inrecycle,comefrom,ordno,marks,other,hope,msgstate,otherdate,admname,aid,staffid,admnick";
																$R130d64a4ad = "select ".$R4454e360ff." from ".$this->dbprefix."msg t0 where ".$R63bede6b19." order by id desc";
																$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
																$R4e420efcc3 = $R679e9b9234;
																$R63bede6b19 = "\$R4e420efcc3=unserialize(gzinflate(base64_decode('".base64_encode( gzdeflate( serialize( $R679e9b9234 ) ) )."')))";
												}
												$Re82ee9b121 = "<?php ".chr( 10 ).$R63bede6b19.";".chr( 10 )."?>";
												file_put_contents( $R09a3346376, $Re82ee9b121 );
								}
								else
								{
												include( $R09a3346376 );
								}
								return $R4e420efcc3;
				}

				public function &IMsg_QueryPage( $data = array( ) )
				{
								$R63bede6b19 = "";
								if ( isset( $data['msgtype'] ) && $data['msgtype'] != "" )
								{
												$R63bede6b19 = " inrecycle=0 and msgtype = ".intval( $data['msgtype'] )." and  ";
								}
								if ( isset( $data['msgto'] ) && $data['msgto'] != "" )
								{
												$R130d64a4ad = "select t0.*,0 as myreaded from ".$this->dbprefix."msg t0 where ".$R63bede6b19." ( (msgto=".$data['msgto']." or (msgto=999999 and msgcc='all') or (msgfrom=".$data['bossid']." and msgto=999999 and msgcc='allunderling')) and (( msgto=".$data['msgto']." and hidden=-1) or (msgto=999999 and (hiddenaid is null or hiddenaid = '' or hiddenaid not like '%,".$data['msgto'].",%') )) ) order by id desc";
								}
								else
								{
												$R130d64a4ad = "select * from ".$this->dbprefix."msg t0 where ".$R63bede6b19."  msgfrom=".$data['msgfrom']." and (hiddenaid is null or hiddenaid = '' or hiddenaid not like '%,".$data['msgfrom'].",%') order by id desc";
								}
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = $data['nrows'] == 0 ? 15 : $data['nrows'];
								$R3db8f5c8bc = $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
								if ( isset( $data['msgto'] ) && $data['msgto'] != "" )
								{
												$Rf5f11a8d38 = count( $R3db8f5c8bc['item'] );
												
												for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
												{
																$R0f8134fb60 = $R3db8f5c8bc['item'][$Ra16d228039];
																$R41f1287481 = $R0f8134fb60['isreadedaid'];
																$Rbf5e092a93 = ",".$data['msgto'].",";
																if ( strpos( $R41f1287481, $Rbf5e092a93 ) === false )
																{
																				$R3db8f5c8bc['item'][$Ra16d228039]['myreaded'] = 0;
																}
																else
																{
																				$R3db8f5c8bc['item'][$Ra16d228039]['myreaded'] = 1;
																}
												}
								}
								return $R3db8f5c8bc;
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['title'] ) )
								{
												$R7965cb3798 = $data['title'];
												$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
												foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
												{
																$R026f0167b4[] = " title like '%".$R0f8134fb60."%'";
												}
								}
								if ( isset( $data['msgfrom'] ) && $data['msgfrom'] !== "" )
								{
												if ( $data['msgfrom'] == 0 )
												{
																$R026f0167b4[] = " msgfrom < 1 ";
												}
												else
												{
																$R026f0167b4[] = " msgfrom = ".intval( $data['msgfrom'] );
												}
								}
								if ( isset( $data['hope'] ) && $data['hope'] != "" )
								{
												$R026f0167b4[] = " hope like '%".urldecode( $data['hope'] )."%'";
								}
								if ( isset( $data['other'] ) && $data['other'] != "" )
								{
												$R026f0167b4[] = " other='".urldecode( $data['other'] )."'";
								}
								if ( isset( $data['ordno'] ) && $data['ordno'] != "" )
								{
												$R026f0167b4[] = " ordno = '".$data['ordno']."'";
								}
								if ( isset( $data['msgto'] ) && $data['msgto'] !== "" )
								{
												if ( $data['msgto'] == 0 )
												{
																$R026f0167b4[] = " msgto < 1 ";
												}
												else
												{
																$R026f0167b4[] = " msgto = ".intval( $data['msgto'] );
												}
								}
								if ( isset( $data['msgtype'] ) && $data['msgtype'] != "" )
								{
												$R026f0167b4[] = " msgtype = ".intval( $data['msgtype'] );
								}
								if ( isset( $data['isreaded'] ) && $data['isreaded'] != 0 )
								{
												$R026f0167b4[] = " isreaded = ".intval( $data['isreaded'] );
								}
								if ( isset( $data['parentid'] ) )
								{
												$R026f0167b4[] = " parentid = ".intval( $data['parentid'] );
								}
								if ( isset( $data['comefrom'] ) && 0 < $data['comefrom'] )
								{
												$R026f0167b4[] = " ".$R1de95f080d."comefrom = ".intval( $data['comefrom'] );
								}
								if ( isset( $data['msgstate'] ) && 0 < $data['msgstate'] )
								{
												$R026f0167b4[] = " ".$R1de95f080d."msgstate = ".intval( $data['msgstate'] );
								}
								$R31f1c1341b = $this->GetDateLimit( $data, $R1de95f080d );
								if ( $R31f1c1341b != "" )
								{
												$R026f0167b4[] = $R31f1c1341b;
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " inrecycle = 0";
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
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
												$R026f0167b4[] = " ".$R1de95f080d."createdate > '".$data['startdate']."'";
								}
								if ( isset( $data['createdate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."orddate < '".$data['enddate']."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function &IMsg_GetById( $R3584859062 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "msg" );
								return $R3db8f5c8bc[0];
				}

				public function &IMsg_Get( $num = 8, $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$this->reset( );
								return $this->SelectRecord( "msg" );
				}

				public function IMsg_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "msg", true );
				}

				public function IMsg_CreateExt( $data )
				{
								$R3584859062 = $data['msgid'];
								$R3db8f5c8bc = $this->IMsg_GetById( $R3584859062 );
								if ( !isset( $R3db8f5c8bc['id'] ) )
								{
												return;
								}
								$R41f1287481 = "";
								$Rd3fbf54c55 = "";
								if ( $R3db8f5c8bc['isreadedaid'] != "" )
								{
												$R41f1287481 = $R3db8f5c8bc['isreadedaid'];
								}
								if ( $R3db8f5c8bc['isreadedaid'] != "" )
								{
												$Rd3fbf54c55 = $R3db8f5c8bc['hiddenaid'];
								}
								$R574faef835 = "";
								if ( isset( $data['hidden'], $data['aid'] ) )
								{
												if ( $Rd3fbf54c55 == "" )
												{
																$Rd3fbf54c55 = ",";
												}
												$Rd3fbf54c55 = $Rd3fbf54c55.$data['aid'].",";
								}
								$R8eb4ac4050 = "";
								if ( $R41f1287481 == "" )
								{
												$R41f1287481 = ",";
								}
								$Rbf5e092a93 = ",".$data['aid'].",";
								if ( strpos( $R41f1287481, $Rbf5e092a93 ) === false )
								{
												$R41f1287481 = $R41f1287481.$data['aid'].",";
								}
								$data = array( );
								if ( $Rd3fbf54c55 != "" )
								{
												$data['hiddenaid'] = $Rd3fbf54c55;
								}
								if ( $R41f1287481 != "" )
								{
												$data['isreadedaid'] = $R41f1287481;
								}
								if ( 0 < count( $data ) )
								{
												$this->IMsg_Update( $data, $R3584859062 );
								}
				}

				public function IMsg_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "msg", "id = ".$R3584859062 );
				}

				public function IMsg_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "msg", "id in (".$R3584859062.")" );
				}

				public function IMsg_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "msg", $R172196908b );
				}

				public function IMsg_UpdateByStr( $data, $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "msg", $R63bede6b19 );
				}

				public function IMsg_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "msg", "id in (".$R3584859062.")" );
				}

				public function IMsg_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "msg", $R172196908b );
				}

				public function IMsg_Rows( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 == "msgto" && $data['msgto'] == 0 )
												{
																$this->add( $Ra09fe38af3, 1, "<" );
												}
												else
												{
																$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
												}
								}
								return $this->num_rows( "msg" );
				}

				public function IMsg_RowsExt( $data )
				{
								return 0;
				}

				public function IMsg_UpdateExtByLimit( $data, $R5ac47c05a9 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R026f0167b4 = array( );
								foreach ( $R5ac47c05a9 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 == "msgto" && isset( $R5ac47c05a9['msgto'] ) && $R5ac47c05a9['msgto'] == 0 )
												{
																$R026f0167b4[] = $Ra09fe38af3."<1";
												}
												else
												{
																$R026f0167b4[] = $Ra09fe38af3."=".$Ra3d52e52a4;
												}
								}
								return $this->UpdateRecord( "msg_ext", implode( " and ", $R026f0167b4 ) );
				}

}

?>
