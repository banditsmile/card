<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ordershistory extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IOrder_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								if ( isset( $data['optype'] ) && ( $data['optype'] == "w" || $data['optype'] == "sd|w" || $data['optype'] == "sd|d" ) )
								{
												$R3456919727 = "id, ordstate";
								}
								else
								{
												$R3456919727 = "id";
								}
								return $this->PageRecord( "ordershistory", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, $R3456919727 );
				}

				public function &IOrder_GetTradeData( $data = array( ) )
				{
								$R130d64a4ad = "select sum(ownermoney) as ownermoney_sum, sum(moneyfee) as moneyfee_sum, sum(ownerprofit) as ownerprofit_sum, sum(agentprofit) as agentprofit_sum, sum(price) as price_sum,  sum(cprice*qty) as cprice_sum, sum(qty) as qty_sum, sum(dollars) as dollars_sum, sum(profit) as profit_sum, sum(staffprofit) as staffprofit_sum, sum(buyerprice*qty) as buyerprice_sum,sum(selldollars) as selldollars_sum from ".$this->dbprefix."ordershistory %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0];
				}

				public function &IOrder_Sample( $data = array( ) )
				{
								$R130d64a4ad = "select o.pid,o.pname,o.ptype,t0.namecolor,t0.isbold,t0.listprice,t0.pid,t0.pricetpl,t0.hassup,t0.onsup,t0.price,t0.canmakeprice, t0.stocks as mystocks,t0.aid as owner,t0.forb2b,t0.inrecycle,t0.checked,t0.sell,t0.tosys from ".$this->dbprefix."ordershistory o "."left join ".$this->dbprefix."products t0 on t0.pid=o.pid "."%s group by o.pid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "o." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = array( );
								$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
								$Ra16d228039 = 0;
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												$R8e8b5578f7 = intval( $R0f8134fb60['pid'] );
												if ( 0 < $R8e8b5578f7 )
												{
																$R130d64a4ad = "select count(0) as count from ".$this->dbprefix."ordershistory o where o.pid=".$R0f8134fb60['pid']." %s";
																$R4945e6b9f8 = "select sum(dollars) as count from ".$this->dbprefix."ordershistory o where o.pid=".$R0f8134fb60['pid']." %s";
																$R3274156ee9 = "select sum(qty) as count from ".$this->dbprefix."ordershistory o where o.pid=".$R0f8134fb60['pid']." %s";
																if ( $R42f28414d6 != null )
																{
																				$R026f0167b4 = " and ".$R42f28414d6;
																				$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
																				$R4945e6b9f8 = sprintf( $R4945e6b9f8, $R026f0167b4 );
																				$R3274156ee9 = sprintf( $R3274156ee9, $R026f0167b4 );
																}
																$R494af0fa28 = $this->QuerySelect( $R130d64a4ad );
																$R1807c1171a = $this->QuerySelect( $R4945e6b9f8 );
																$Rbd93eed0fd = $this->QuerySelect( $R3274156ee9 );
																$R71d9e5261f = false;
																if ( isset( $R0f8134fb60['listprice'] ) )
																{
																				if ( isset( $R494af0fa28[0]['count'] ) )
																				{
																								$R71d9e5261f = true;
																								$R0f8134fb60['count'] = $R494af0fa28[0]['count'];
																				}
																				if ( isset( $R1807c1171a[0]['count'] ) )
																				{
																								$R71d9e5261f = true;
																								$R0f8134fb60['sumdollar'] = $R1807c1171a[0]['count'];
																				}
																				if ( isset( $Rbd93eed0fd[0]['count'] ) )
																				{
																								$R71d9e5261f = true;
																								$R0f8134fb60['sumqty'] = $Rbd93eed0fd[0]['count'];
																				}
																				$Ra16d228039++;
																				if ( $R71d9e5261f )
																				{
																								$R679e9b9234[] = $R0f8134fb60;
																				}
																}
												}
								}
								return $this->sortArrayByField( $R679e9b9234, "count", true );
				}

				public function &sortArrayByField( $R1f77fa81c0, $R4454e360ff, $R585f57a09f = false )
				{
								$R295545a7e3 = array( );
								foreach ( $R1f77fa81c0 as $Rf413f06aeb => $value )
								{
												$R295545a7e3[$Rf413f06aeb] = $value[$R4454e360ff];
								}
								if ( $R585f57a09f )
								{
												arsort( $R295545a7e3 );
								}
								else
								{
												asort( $R295545a7e3 );
								}
								$Rd5393dd9ca = array( );
								foreach ( $R295545a7e3 as $Rf413f06aeb => $value )
								{
												$Rd5393dd9ca[] = $R1f77fa81c0[$Rf413f06aeb];
								}
								return $Rd5393dd9ca;
				}

				public function &IOrder_PageAgent( $data )
				{
								$R130d64a4ad = "select o.*, (select company from ".$this->dbprefix."agents a where a.aid=o.aid) as company "."from ".$this->dbprefix."ordershistory o "."%s order by id desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "o." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['ordno'] ) && $data['ordno'] != "" )
								{
												$data['ordno'] = trim( urldecode( $data['ordno'] ) );
								}
								if ( isset( $data['czaccount'] ) && $data['czaccount'] != "" )
								{
												$data['czaccount'] = trim( urldecode( $data['czaccount'] ) );
								}
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "pname", "cqq", "cmail", "ctel", "cip", "cname", "remarks" ),
																"null" => 0
												),
												array(
																"op" => "intequal",
																"var" => array( "payment", "pid", "comefrom", "cid" ),
																"null" => 0
												),
												array(
																"op" => "charequal",
																"var" => array( "aname", "admname", "opname", "ordno", "czaccount" ),
																"null" => 0
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R63bede6b19 = $this->GetOptype( $data['optype'], $R1de95f080d );
												if ( $R63bede6b19 != "" )
												{
																$R026f0167b4[] = $R63bede6b19;
												}
								}
								if ( isset( $data['allaid'] ) && $data['allaid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."aid > 0";
								}
								if ( isset( $data['aid'] ) && $data['aid'] != -1 && $data['aid'] != "" )
								{
												if ( $data['aid'] == -2 || $data['aid'] == 0 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid < 1";
												}
												else if ( $data['aid'] == -3 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid > 0 ";
												}
												else
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid = ".intval( $data['aid'] );
												}
								}
								if ( isset( $data['saleid'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."saleid in (".$data['saleid'].") ";
								}
								if ( isset( $data['comefrom'] ) && 0 < $data['comefrom'] )
								{
												$R026f0167b4[] = " ".$R1de95f080d."comefrom = ".intval( $data['comefrom'] );
								}
								if ( isset( $data['right'] ) && count( 0 < $data['right'] ) && $data['right'][0] != -1 )
								{
												$Rf351f6e099 = array( );
												foreach ( $data['right'] as $R0f8134fb60 )
												{
																if ( $R0f8134fb60 == 0 )
																{
																				$Rf351f6e099[] = " ".$R1de95f080d."ptype = 0 or ".$R1de95f080d."ptype = 3 or ".$R1de95f080d."ptype > 99 ";
																}
																else if ( $R0f8134fb60 == 1 )
																{
																				$Rf351f6e099[] = " ".$R1de95f080d."ptype = 1 ";
																}
																else if ( $R0f8134fb60 == 2 )
																{
																				$Rf351f6e099[] = " ".$R1de95f080d."ptype = 2 ";
																}
												}
												$R651f1bfe78 = implode( " or ", $Rf351f6e099 );
												if ( $R651f1bfe78 != "" )
												{
																$R026f0167b4[] = " (".$R651f1bfe78.")";
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
								if ( isset( $data['by'] ) && $data['by'] == 1 )
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
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function GetOptype( $R36130a8639, $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $R0f8134fb60 )
								{
												switch ( $R0f8134fb60 )
												{
												case "v" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate <> 0";
																break;
												case "s" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate = 2";
																break;
												case "f" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate = 0";
																break;
												case "u" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate = -1";
																break;
												case "w" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate = 1";
																break;
												case "d" :
																$R026f0167b4[] = " ".$R1de95f080d."ordstate = 3";
																break;
												case "km" :
																$R026f0167b4[] = " (".$R1de95f080d."ptype = 0 or ".$R1de95f080d."ptype = 3 or ".$R1de95f080d."ptype > 99) ";
																break;
												case "cz" :
																$R026f0167b4[] = " (".$R1de95f080d."ptype = 1 or ".$R1de95f080d."ptype = 2)";
																break;
												case "sd" :
																$R026f0167b4[] = " ".$R1de95f080d."ptype = 2";
																break;
												case "zd" :
																$R026f0167b4[] = " ".$R1de95f080d."ptype = 1";
																break;
												case "hm" :
																$R026f0167b4[] = " ".$R1de95f080d."ptype = 3";
																break;
												case "km0" :
																$R026f0167b4[] = " ".$R1de95f080d."ptype = 0";
																break;
												case "ykt" :
																$R026f0167b4[] = " ".$R1de95f080d."ptype > 99";
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
												$R026f0167b4[] = " ".$R1de95f080d."orddate > '".urldecode( $data['startdate'] )."'";
								}
								if ( isset( $data['enddate'] ) && $data['enddate'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."orddate < '".urldecode( $data['enddate'] )."'";
								}
								return implode( " and ", $R026f0167b4 );
				}

				public function IOrder_GetByArr( $data = array( ), $R4454e360ff = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "ordershistory", $R4454e360ff );
				}

				public function IOrder_GetByStr( $Rb7492a73f7 = array( ), $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select ".$R4454e360ff."  from ".$this->dbprefix."ordershistory where ".$Rb7492a73f7;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function IOrder_GetByPageLimit( $data, $R4454e360ff = "*" )
				{
								$R130d64a4ad = "select ".$R4454e360ff."  from ".$this->dbprefix."ordershistory";
								$R172196908b = $this->GetPageLimit( $data );
								if ( $R172196908b != "" )
								{
												$R130d64a4ad = $R130d64a4ad." where ".$R172196908b;
								}
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function IOrder_Get( $Rdcd9105806, $R45074ab3da = "", $R5d899a20a5 = "", $R4454e360ff = "*", $R89c4676b80 = 0 )
				{
								$this->reset( );
								if ( $R45074ab3da != "" )
								{
												$this->add( "cname", $R45074ab3da );
								}
								if ( $R5d899a20a5 != "" )
								{
												$this->add( "aname", $R5d899a20a5 );
								}
								if ( $R89c4676b80 == 0 )
								{
												$this->add( "inrecycle", 0 );
								}
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->SelectRecord( "ordershistory", $R4454e360ff );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								else
								{
												return $R679e9b9234[0];
								}
				}

				public function &IOrder_GetTop( )
				{
								$R130d64a4ad = "select count(0) as count from ".$this->dbprefix."ordershistory where ordstate=1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IOrder_Update( $Ra20cb02aef = array( ), $Rdcd9105806 )
				{
								$this->reset( );
								$Ra20cb02aef = $this->AdjustTime( $Ra20cb02aef );
								foreach ( $Ra20cb02aef as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ordershistory", "ordno = '".$Rdcd9105806."'" );
				}

				public function IOrder_UpdateByStr( $Ra20cb02aef = array( ), $R63bede6b19 )
				{
								$this->reset( );
								$Ra20cb02aef = $this->AdjustTime( $Ra20cb02aef );
								foreach ( $Ra20cb02aef as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "ordershistory", $R63bede6b19 );
				}

				public function IOrder_Create( $Ra20cb02aef = array( ) )
				{
								$this->reset( );
								$Ra20cb02aef = $this->AdjustTime( $Ra20cb02aef );
								foreach ( $Ra20cb02aef as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ordershistory" );
				}

				public function IOrder_DeleteByOrdno( $Rdcd9105806 )
				{
								return $this->DeleteRecord( "ordershistory", "ordno = '".$Rdcd9105806."'" );
				}

				public function IOrder_DeleteByLimit( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->DeleteItem( "ordershistory" );
				}

				public function IOrder_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "ordershistory", "id in (".$R3584859062.")" );
				}

				public function IOrder_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "ordershistory", $R172196908b );
				}

				public function IOrder_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "ordershistory", "id in (".$R3584859062.")" );
				}

				public function IOrder_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "ordershistory", $R172196908b );
				}

				public function IOrder_IsExist( $Rdcd9105806 )
				{
								$this->reset( );
								$this->add( "ordno", $Rdcd9105806 );
								$R679e9b9234 = $this->num_rows( "ordershistory" );
								if ( $R679e9b9234 == 0 )
								{
												return false;
								}
								else
								{
												return true;
								}
				}

				public function IOrder_Rows( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->num_rows( "ordershistory" );
				}

				public function IOrder_QueryRows( $R63bede6b19 )
				{
								if ( $R63bede6b19 != "" )
								{
												$R63bede6b19 = " where ".$R63bede6b19;
								}
								$R130d64a4ad = "select * from ".$this->dbprefix."ordershistory %s";
								$R130d64a4ad = sprintf( $R130d64a4ad, $R63bede6b19 );
								return $this->queryrows( $R130d64a4ad );
				}

				public function &IOrder_RowsByDate( $data = array( ) )
				{
								$R026f0167b4 = array( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->reset( );
												$this->add( "orddate", $Ra3d52e52a4, ">" );
												$this->add( "orddate", $Ra3d52e52a4." 23:59:59", "<" );
												$R026f0167b4[$Ra09fe38af3] = $this->num_rows( "ordershistory" );
								}
								return $R026f0167b4;
				}

				public function IOrder_Profit( $data = array( ), $R434fc2904d = "sum(profit) as profit, sum(agentprofit) as agentprofit, sum(dollars) as dollars, sum(ownermoney) as ownermoney, sum(ownerprofit) as ownerprofit" )
				{
								$R130d64a4ad = "select %s from ".$this->dbprefix."ordershistory %s";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "" );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R434fc2904d, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IOrder_SumByStaffName( $R0dc0347d49 )
				{
								$R130d64a4ad = "select cprice,qty from ".$this->dbprefix."ordershistory where cname='".$R0dc0347d49."' and (ordstate=2 or ordstate=1) and orddate > '".date( "Y-m-d" )."'";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R4f6dd3397f = 0;
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R4f6dd3397f += $R0f8134fb60['cprice'] * $R0f8134fb60['qty'];
								}
								return $R4f6dd3397f;
				}

				public function IOrder_MoneyByStaffName( $R2a51483b14, $R0dc0347d49, $R696350cab3, $R1c8e0f6795 )
				{
								$R130d64a4ad = "select buyerprice,qty from ".$this->dbprefix."ordershistory where cname='".$R0dc0347d49."' and cid=".$R2a51483b14." and (ordstate=2 or ordstate=1) and orddate > '".$R696350cab3."' and orddate < '".$R1c8e0f6795."'";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R4f6dd3397f = 0;
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												$R4f6dd3397f += $R0f8134fb60['buyerprice'] * $R0f8134fb60['qty'];
								}
								return $R4f6dd3397f;
				}

				public function AdjustTime( $data = array( ) )
				{
								$R30b2ab8dc1 = 0;
								$Ra16d228039 = 0;
								$R9c71a8e01b = array( "orddate", "dealdate", "sellcheckdate" );
								foreach ( $R9c71a8e01b as $R0f8134fb60 )
								{
												if ( isset( $data[$R0f8134fb60] ) && $data[$R0f8134fb60] != "" )
												{
																if ( $R30b2ab8dc1 == 0 && $Ra16d228039 == 0 )
																{
																				$Ra16d228039 = 1;
																				$R30b2ab8dc1 = $this->GetAdjustTime( );
																}
																if ( $R30b2ab8dc1 != 0 )
																{
																				$t1 = "";
																				$Re33ba329c4 = "";
																				$Rcc5c6e696c = explode( " ", $data[$R0f8134fb60] );
																				$t1 = $Rcc5c6e696c[0];
																				if ( isset( $Rcc5c6e696c[1] ) )
																				{
																								$Re33ba329c4 = str_replace( "-", ":", $Rcc5c6e696c[1] );
																				}
																				if ( $t1 != "" && $Re33ba329c4 != "" )
																				{
																								$Ra7787f2e00 = $t1." ".$Re33ba329c4;
																								$data[$R0f8134fb60] = date( "Y-m-d H:i:s", strtotime( $Ra7787f2e00." ".$R30b2ab8dc1." seconds" ) );
																				}
																}
												}
								}
								return $data;
				}

				public function GetAdjustTime( )
				{
								global $cache;
								$R1ed7ad9990 = DATACACHE."site".DS."u_base_setting.php";
								if ( !file_exists( $R1ed7ad9990 ) )
								{
												return 0;
								}
								else
								{
												include( $R1ed7ad9990 );
								}
								$R2e6e92499a = $R30b2ab8dc1['config'];
								$R7fd2e8ffde = explode( "|", $R2e6e92499a );
								if ( 22 < count( $R7fd2e8ffde ) )
								{
												$R558acfa73f = $R7fd2e8ffde[22];
								}
								else
								{
												$R558acfa73f = 0;
								}
								return intval( $R558acfa73f );
				}

}

?>
