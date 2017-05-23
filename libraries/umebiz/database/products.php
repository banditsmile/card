<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class products extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IProduct_PageQuery( $data = array( ) )
				{
								$R130d64a4ad = "select p.onsup,p.aid,p.pid,p.pname,p.ptype,p.price,p.listprice,p.sell,p.new,p.hot,p.sale,p.remd,p.tag,p.hassup,p.forshop,p.forykt,p.forb2b,p.sup, count(c.id) as stocks, (count(c.id) * p.price) as stockscash, count(o.pid) as sellyd from ".$this->dbprefix."products p "."left join ".$this->dbprefix."cards c on(c.pid=p.pid and c.cardok=1) "."left join ".$this->dbprefix."products o on(o.pid=p.pid and o.pid<c.pid) "."%s group by p.pid order by p.ptype,p.price,p.pid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R9a84c58fcf = "select count(0) as count from ".$this->dbprefix."products p %s";
								$R9a84c58fcf = sprintf( $R9a84c58fcf, $R026f0167b4 );
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 15;
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad, $R9a84c58fcf );
				}

				public function &IProduct_PageAgent( $data = array( ) )
				{
								$R130d64a4ad = "select (select company from ".$this->dbprefix."agents a where a.aid=p.aid) as company, p.aid,p.pfee,p.pcheck,p.pid,p.pname,p.ptype,p.price,p.listprice,p.sell,p.new,p.hot,p.sale,p.remd,p.tag, count(c.id) as stocks, (count(c.id) * p.price) as stockscash, count(o.pid) as sellyd "."from ".$this->dbprefix."products p "."left join ".$this->dbprefix."cards c on(c.pid=p.pid and c.cardok=1) "."left join ".$this->dbprefix."products o on(o.pid=p.pid and o.pid<c.pid) "."%s group by p.pid order by p.ptype,p.price,p.pid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function StockSql( )
				{
								return " (select count(id) from ".$this->dbprefix."cards c where c.pid=p.pid and c.cardok=1 and c.ptype < 99 and c.inrecycle = 0) as stocks, p.stocks as mystocks, (select count(id) from ".$this->dbprefix."cards c where c.pid=p.pid and c.cardok=1 and c.bindaid=0 and (c.ordno is null or c.ordno='') and c.ptype > 99) as yktstocks ";
				}

				public function AgentPriceSql( $R2a51483b14, $Re2a6348a52 )
				{
								if ( $R2a51483b14 == 0 )
								{
												return " null as agentprice, ";
								}
								else
								{
												return " (select price_".$Re2a6348a52." from ".$this->dbprefix."prices t1 where t1.pid=p.pid and t1.aid=".$R2a51483b14.")  as agentprice, ";
								}
				}

				public function PrivatePriceSql( $R2a51483b14, $Rac9b8532b8 )
				{
								if ( $R2a51483b14 == 0 )
								{
												return " null as privateprice, ";
								}
								else
								{
												return " (select price from ".$this->dbprefix."privateprices t2 where t2.operator=".$Rac9b8532b8." and t2.pid=p.pid and t2.aid=".$R2a51483b14.")  as privateprice, ";
								}
				}

				public function IProduct_B2CPage( $data = array( ), $Re2a6348a52 = 1 )
				{
								$R130d64a4ad = "select pid,price,listprice,pname,ptype,namecolor,hassup,imagesmall,imagefull,pricetpl, listprice as cprice from ".$this->dbprefix."products "."%s order by catid,ordering,ptype,price,pid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "" );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) == 0 || $data['nrows'] == 15 ? 25 : $data['nrows'];
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function &IProduct_PageForB( $data = array( ), $Re2a6348a52, $R2a51483b14 = 0, $Rac9b8532b8 = 0, $R8be85a0bc2 = false )
				{
								if ( isset( $data['typesearch'] ) && $data['typesearch'] == "category" )
								{
												$R130d64a4ad = "select catid from ".$this->dbprefix."products p %s";
								}
								else
								{
												$R130d64a4ad = "select p.aid as owner,p.pid,p.pname,p.namecolor,p.isbold,p.listprice,p.price,p.ptype,p.hassup,p.pricetpl,p.forb2b,p.sell,p.inrecycle,p.tosys,p.checked,p.canmakeprice,onsup,p.stocks as mystocks, 100000 as cprice,  0 as stocks, 0 as yktstocks from ".$this->dbprefix."products p %s order by p.ordering,p.aid,p.catid,p.ptype,p.price,p.pid";
								}
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = isset( $data['nrows'] ) ? $data['nrows'] : 40;
								if ( isset( $data['typesearch'] ) && $data['typesearch'] == "category" )
								{
												$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
												$R026f0167b4 = array( );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['catid'];
												}
												$R3456919727 = implode( ",", $R026f0167b4 );
												if ( $R3456919727 == "" )
												{
																$R3456919727 = "-1";
												}
												$R130d64a4ad = "select * from ".$this->dbprefix."category where id in (".$R3456919727.")";
								}
								if ( $R8be85a0bc2 )
								{
												return $this->QuerySelect( $R130d64a4ad );
								}
								else
								{
												return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
								}
				}

				public function &IProduct_PageForYkt( $data = array( ) )
				{
								$R130d64a4ad = "select t0.aid as owner,t0.pid,t0.listprice,t0.ykttag,t0.yktpid,t0.pname,t0.yktpoints,t0.ptype,t0.namecolor,t1.name from ".$this->dbprefix."products t0 "."left join ".$this->dbprefix."category t1 on t0.catid=t1.id "."%s order by t0.catid,t0.ordering,t0.ptype,t0.listprice";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = $data['nrows'];
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IProduct_PageForYktStocks( $data = array( ) )
				{
								$R130d64a4ad = "select t0.pid,t0.listprice,t0.ptype,t0.pname,(select count(0) from ".$this->dbprefix."cards t1 where t1.price=t0.listprice and t1.pid=t0.pid) as stocks, "."(select count(0) from ".$this->dbprefix."cards t2 where t2.price=t0.listprice and t2.pid=t0.pid and (t2.cardok=0 or t2.money=0)) as notok, "."(select count(0) from ".$this->dbprefix."cards t3 where t3.price=t0.listprice and t3.pid=t0.pid and t3.cardok=2) as noteffect "." from ".$this->dbprefix."products t0 "."%s order by t0.listprice";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function &IProduct_PageForAgentPrice( $data = array( ), $R2a51483b14 )
				{
								$R130d64a4ad = "select p.pid,p.pname,p.listprice,p.price,p.ptype,t0.* from ".$this->dbprefix."products p "."left join ".$this->dbprefix."prices t0 on t0.pid = p.pid and t0.aid = ".$R2a51483b14."%s group by p.pid order by p.ptype,p.price,p.pid";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function &IProduct_PageForPrice( $data = array( ) )
				{
								$R130d64a4ad = "select p.sell,p.pid,p.pname,p.listprice,p.price,p.ptype,p.sup, t0.pid as priceset, t1.pid as privatepriceset from ".$this->dbprefix."products p "."left join ".$this->dbprefix."prices t0 on t0.pid=p.pid and t0.aid=0 "."left join ".$this->dbprefix."privateprices t1 on t1.pid=p.pid and t1.operator=0 "."%s group by p.pid order by p.pid desc";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageQuery( $R71a6fd054f, $R42c553e7de, $R130d64a4ad );
				}

				public function &IProduct_PageForRight( $data = array( ) )
				{
								$R026f0167b4 = array( );
								if ( $data['aid'] != "" )
								{
												$R026f0167b4[] = "t0.aid=".intval( $data['aid'] );
								}
								if ( $data['gid'] != "" )
								{
												$R026f0167b4[] = "t0.gid=".intval( $data['gid'] );
								}
								if ( $data['zoneid'] != "" )
								{
												$R026f0167b4[] = "t0.zoneid=".intval( $data['zoneid'] );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								$R42f28414d6 = $R42f28414d6 ? " and ".$R42f28414d6 : "";
								if ( isset( $data['agentid'] ) )
								{
												$R130d64a4ad = "select p.sell,p.pid,p.pname,p.listprice,p.price,p.ptype,t0.id,t0.aid,t0.gid,t0.zoneid, (select company from ".$this->dbprefix."agents a where p.aid=a.aid) as company "."from ".$this->dbprefix."products p "."left join ".$this->dbprefix."buyrights t0 on t0.pid=p.pid ".$R42f28414d6."%s group by p.pid";
								}
								else
								{
												$R130d64a4ad = "select p.sell,p.pid,p.pname,p.listprice,p.price,p.ptype,t0.id,t0.aid,t0.gid,t0.zoneid from ".$this->dbprefix."products p "."left join ".$this->dbprefix."buyrights t0 on t0.pid=p.pid ".$R42f28414d6."%s group by p.pid";
								}
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function &IProduct_Page( $data = array( ), $Rb0d5d47f3d = "*", $Rd71fe2585f = "ptype,pid" )
				{
								$this->reset( );//print_r($data);
								$R42f28414d6 = $this->GetPageLimit( $data );//print_r($R42f28414d6);
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageRecord( "products", $R71a6fd054f, $R42c553e7de, $R42f28414d6, $Rb0d5d47f3d, true, $Rd71fe2585f );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								if ( isset( $data['pname'] ) )
								{
												$R7965cb3798 = urldecode( $data['pname'] );
												$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
												foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."pname like '%".$R0f8134fb60."%' ";
												}
								}
								if ( isset( $data['ptype'] ) && $data['ptype'] != -1 )
								{
												$R5c04831f87 = array( );
												$Rcc5c6e696c = explode( ",", $data['ptype'] );
												foreach ( $Rcc5c6e696c as $R0f8134fb60 )
												{
																$R5c04831f87[] = " ".$R1de95f080d."ptype = ".intval( $data['ptype'] );
												}
												$Rb467962b76 = implode( " or ", $R5c04831f87 );
												if ( $Rb467962b76 != "" )
												{
																$R026f0167b4[] = " ( ".$Rb467962b76." ) ";
												}
								}
								if ( isset( $data['catid'] ) && $data['catid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."catid = ".intval( $data['catid'] );
								}
								if ( isset( $data['pinyin'] ) && $data['pinyin'] != "" )
								{
												if ( $data['pinyin'] == "09" )
												{
																$R026f0167b4[] = " ".$R1de95f080d."pinyin > '0' and pinyin < '9' ";
												}
												else
												{
																$R026f0167b4[] = " ".$R1de95f080d."pinyin like '%".$data['pinyin']."%'";
												}
								}
								if ( isset( $data['begprice'] ) && $data['begprice'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."listprice > ".( doubleval( $data['begprice'] ) - 0.01 );
								}
								if ( isset( $data['begprice'] ) && $data['endprice'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."listprice < ".( doubleval( $data['endprice'] ) + 0.01 );
								}
								if ( isset( $data['listprice'] ) && $data['listprice'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."listprice =".doubleval( $data['listprice'] );
								}
								if ( isset( $data['exchange'] ) && $data['exchange'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."exchange = ".intval( $data['exchange'] );
								}
								if ( isset( $data['sell'] ) && $data['sell'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."sell = ".intval( $data['sell'] );
								}
								if ( isset( $data['value'] ) && $data['value'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."yktpoints = ".doubleval( $data['value'] ) * 100;
								}
								if ( isset( $data['pids'] ) && $data['pids'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."pid in (".$data['pids'].") ";
								}
								if ( isset( $data['agentid'] ) )
								{
												if ( $data['agentid'] == 0 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid > 0 ";
												}
												else
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid = ".intval( $data['agentid'] );
												}
								}
								if ( isset( $data['isykt'] ) )
								{
												if ( $data['isykt'] == 1 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."ptype > 99";
												}
												else if ( $data['isykt'] == 0 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."ptype < 100";
												}
								}
								if ( isset( $data['forykt'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."forykt = ".intval( $data['forykt'] );
								}
								if ( isset( $data['aid'] ) && $data['aid'] != -1 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."aid = ".intval( $data['aid'] );
								}
								if ( isset( $data['allaid'] ) )
								{
												if ( $data['allaid'] == 1 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid > 0";
												}
												else
												{
																$R026f0167b4[] = " ".$R1de95f080d."aid < 1";
												}
								}
								if ( isset( $data['forb2b'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."forb2b = ".intval( $data['forb2b'] );
								}
								if ( isset( $data['forshop'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."forshop = ".intval( $data['forshop'] );
								}
								if ( isset( $data['sup'] ) && $data['sup'] != 0 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."sup = ".intval( $data['sup'] );
								}
								if ( isset( $data['hassup'] ) )
								{
												if ( $data['hassup'] == 1 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."hassup = 1";
												}
												else if ( $data['hassup'] == 2 )
												{
																$R026f0167b4[] = " ".$R1de95f080d."hassup = 0";
												}
								}
								if ( isset( $data['sup'] ) && $data['sup'] != 0 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."sup = ".intval( $data['sup'] );
								}
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R026f0167b4[] = $this->GetLimit( $data['optype'], $R1de95f080d );
								}
								if ( isset( $data['inrecycle'] ) )
								{
												$R026f0167b4[] = " ".$R1de95f080d."inrecycle = ".intval( $data['inrecycle'] );
								}
								else
								{
												$R026f0167b4[] = " ".$R1de95f080d."inrecycle = 0";
								}
								//if ( " ".$R1de95f080d."inrecycle = 0" )
								//{
												if ( $data['bossids'] != "" )
												{
																$R026f0167b4[] = " ((".$R1de95f080d."checked = 1 and ".$R1de95f080d."tosys = 1) or ".$R1de95f080d."aid in (".$data['bossids']."))";
												}
												else
												{
																//$R026f0167b4[] = " ".$R1de95f080d."checked = 1";
												}
								//}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &IProduct_GetStock( $R8e8b5578f7, $R4454e360ff = "*" )
				{
								if ( $R4454e360ff != "*" && strpos( $R4454e360ff, "pid" ) === false )
								{
												$R4454e360ff = "pid,".$R4454e360ff;
								}
								$R130d64a4ad = "select ".$R4454e360ff.",0 as stocks,stocks as mystocks,0 as yktstocks from ".$this->dbprefix."products where pid in (".$R8e8b5578f7.")";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['ptype'] == 0 || $R0f8134fb60['ptype'] == 3 )
												{
																$R130d64a4ad = "select count(id) as stocks from ".$this->dbprefix."cards where pid=".$R0f8134fb60['pid']." and cardok=1 and ptype < 99 and inrecycle = 0";
																$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
																$R0f8134fb60['stocks'] = $R3db8f5c8bc[0]['stocks'];
												}
												else
												{
																$R0f8134fb60['stocks'] = 0;
												}
												if ( 99 < $R0f8134fb60['ptype'] )
												{
																$R130d64a4ad = "select count(id) as stocks  from ".$this->dbprefix."cards where pid=".$R0f8134fb60['pid']." and cardok=1 and bindaid=0 and (ordno is null or ordno='') and ptype > 99)";
																$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
																$R0f8134fb60['yktstocks'] = $R3db8f5c8bc[0]['stocks'];
												}
												$R026f0167b4[] = $R0f8134fb60;
								}
								return $R026f0167b4;
				}

				public function &IProduct_GetYktStock( $R3359c04a1b )
				{
								$R026f0167b4 = array( );
								$R026f0167b4 = array( );
								$Rf5f11a8d38 = count( $R3359c04a1b );
								if ( 2 < $Rf5f11a8d38 )
								{
												$R4aff26380a = implode( ",", $R3359c04a1b );
												$R130d64a4ad = "select count(0) as stocks, pid from ".$this->dbprefix."cards where cardok=1 and bindaid=0 and (ordno is null or ordno='') and ptype > 99 and pid in (".$R4aff26380a.") group by pid";
												$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
												foreach ( $R3db8f5c8bc as $R0f8134fb60 )
												{
																$R026f0167b4[$R0f8134fb60['pid']] = $R0f8134fb60['stocks'];
												}
								}
								else
								{
												foreach ( $R3359c04a1b as $R8e8b5578f7 )
												{
																$R130d64a4ad = "select count(id) as stocks from ".$this->dbprefix."cards where cardok=1 and bindaid=0 and (ordno is null or ordno='') and ptype > 99 and pid =".$R8e8b5578f7;
																$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
																$R026f0167b4[$R8e8b5578f7] = $R3db8f5c8bc[0]['stocks'];
												}
								}
								return $R026f0167b4;
				}

				public function &IProduct_GetCardStock( $R3359c04a1b )
				{
								$R026f0167b4 = array( );
								foreach ( $R3359c04a1b as $R8e8b5578f7 )
								{
												$R130d64a4ad = "select count(id) as stocks from ".$this->dbprefix."cards where cardok=1 and ptype < 99 and inrecycle = 0 and pid =".$R8e8b5578f7;
												$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
												$R026f0167b4[$R8e8b5578f7] = $R3db8f5c8bc[0]['stocks'];
								}
								return $R026f0167b4;
				}

				public function &IProduct_Get( $R8e8b5578f7, $Re2a6348a52 = -1, $R4454e360ff = "*", $R2a51483b14 = 0, $Rac9b8532b8 = 0, $R42bdd707cb = 0 )
				{
								$this->reset( );
								$this->add( "pid", $R8e8b5578f7 );
								if ( -1 < $Re2a6348a52 )
								{
												$R24a35b49f3 = $R4454e360ff;
												if ( $R4454e360ff != "*" && strpos( $R4454e360ff, "ptype" ) === false )
												{
																$R24a35b49f3 = $R4454e360ff + ",ptype";
												}
												$R130d64a4ad = "select ".$R24a35b49f3.",listprice as cprice, listprice as agentprice, listprice as privateprice,  stocks as mystocks, 0 as yktstocks "."from ".$this->dbprefix."products where pid=".$R8e8b5578f7;
												$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
												if ( isset( $R679e9b9234[0] ) )
												{
																$R679e9b9234[0]['stocks'] = 0;
																if ( isset( $R679e9b9234[0]['ptype'] ) && ( $R679e9b9234[0]['ptype'] == 0 || $R679e9b9234[0]['ptype'] == 3 ) )
																{
																				$R130d64a4ad = "select count(0) as stocks from ".$this->dbprefix."cards where pid=".$R8e8b5578f7." and cardok=1 and ptype < 99 and inrecycle = 0";
																				$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
																				$R679e9b9234[0]['stocks'] = $R3db8f5c8bc[0]['stocks'];
																}
																if ( isset( $R679e9b9234[0]['ptype'] ) && 99 < $R679e9b9234[0]['ptype'] )
																{
																				$R130d64a4ad = "select count(id) as yktstocks from ".$this->dbprefix."cards where pid=".$R8e8b5578f7." and cardok=1 and bindaid=0 and (ordno is null or ordno='') and ptype > 99";
																				$R3db8f5c8bc = $this->QuerySelect( $R130d64a4ad );
																				$R679e9b9234[0]['yktstocks'] = $R3db8f5c8bc[0]['yktstocks'];
																}
												}
								}
								else
								{
												$R679e9b9234 = $this->SelectRecord( "products", $R4454e360ff );
								}
								return $R679e9b9234[0];
				}

				public function &IProduct_Get_C2C( $R8e8b5578f7 )
				{
								$R130d64a4ad = "select t0.*,t1.tradetype,t1.tradetime,t1.deadline,t1.moneyto,t1.toad from ".$this->dbprefix."products t0 left join ".$this->dbprefix."goods_c2c t1 on t1.pid=t0.pid where t0.pid = ".$R8e8b5578f7;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0];
				}

				public function &IProduct_GetForUser( $data = array( ) )
				{
								$R130d64a4ad = "select pid,ptagname,imagesmall,imagefull,new,hot,tag,remd,sale,listprice,price from ".$this->dbprefix."products where ".$this->GetPageLimit( $data );
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function &IProduct_GetForUserWithPrice( $data = array( ) )
				{
								$R130d64a4ad = "select p.pid,p.ptagname,p.imagesmall,p.imagefull,p.new,p.hot,p.tag,p.remd,p.sale,p.listprice,p.price,p.*,p.listprice as cprice from ".$this->dbprefix."products  p where ".$this->GetPageLimit( $data, "p." );
								return $this->GetPrice( $this->QuerySelect( $R130d64a4ad ) );
				}

				public function IProduct_GetPrice( $Re2a6348a52, $R8e8b5578f7, $Rac9b8532b8 = 0, $R2a51483b14 = 0 )
				{
								$Rb3f07f8c36 = $this->IProduct_Get( $R8e8b5578f7, $Re2a6348a52, $R4454e360ff = "listprice", $R2a51483b14, $Rac9b8532b8 );
								$R70d903936c = $Rb3f07f8c36['privateprice'];
								$R4f39743f74 = $Rb3f07f8c36['agentprice'];
								$R0d9f8f778c = $Rb3f07f8c36['cprice'];
								$Red2b3403a5 = $Rb3f07f8c36['listprice'];
								$R63d0786ecc = $R70d903936c ? $R70d903936c : $R4f39743f74 ? $R4f39743f74 : $R0d9f8f778c ? $R0d9f8f778c : $Red2b3403a5;
								return $R63d0786ecc;
				}

				public function IProduct_GetPriceById( $R8e8b5578f7, $R2a51483b14 )
				{
								$this->reset( );
								$this->add( "pid", $R8e8b5578f7 );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->SelectRecord( "prices" );
								if ( count( $R679e9b9234 ) == 1 )
								{
												return $R679e9b9234[0];
								}
								$R026f0167b4 = array( );
								return $R026f0167b4;
				}

				public function &IProduct_GetAll( $R9afaabccd6 = "pname, pid, ptype, sup", $R28e6bfe150 = 0 )
				{
								if ( $R28e6bfe150 )
								{
												return $this->SelectRecord( "products", $R9afaabccd6, " where ptype>99 order by pid" );
								}
								else
								{
												return $this->SelectRecord( "products", $R9afaabccd6, " order by catid,ptype,ordering,price" );
								}
				}

				public function GetLimit( $R36130a8639, $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$Rcc5c6e696c = explode( "|", $R36130a8639 );
								foreach ( $Rcc5c6e696c as $Ra16d228039 )
								{
												switch ( $Ra16d228039 )
												{
												case 1 :
																$R026f0167b4[] = " ".$R1de95f080d."new=1 ";
																break;
												case 2 :
																$R026f0167b4[] = " ".$R1de95f080d."hot=1 ";
																break;
												case 3 :
																$R026f0167b4[] = " ".$R1de95f080d."tag=1 ";
																break;
												case 4 :
																$R026f0167b4[] = " ".$R1de95f080d."remd=1 ";
																break;
												case 5 :
																$R026f0167b4[] = " ".$R1de95f080d."sale=1 ";
																break;
												default :
																break;
												}
								}
								return sprintf( "( %s )", implode( " or ", $R026f0167b4 ) );
				}

				public function &IProduct_GetAllByCat( $Rcd0c741934, $R9afaabccd6 = "pid, pname", $R0f13e36357 = "" )
				{
								$this->reset( );
								if ( $R0f13e36357 != "" )
								{
												$this->add( $R0f13e36357, 1 );
								}
								$this->add( "catid", $Rcd0c741934 );
								return $this->SelectRecord( "products", $R9afaabccd6 );
				}

				public function &IProduct_GetAllByYktPid( $R4939d208ed, $R9afaabccd6 = "pid, pname" )
				{
								$this->reset( );
								$this->add( "yktpid", intval( $R4939d208ed ) );
								return $this->SelectRecord( "products", $R9afaabccd6, "order by yktpoints" );
				}

				public function IProduct_Create( $Rb3f07f8c36 = array( ) )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "products", true );
				}

				public function IProduct_Update( $Rb3f07f8c36 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "products", " pid in (".$R3584859062.") " );
				}

				public function IProduct_Num( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->num_rows( "products" );
								return $R679e9b9234;
				}

				public function IProduct_UpdateByStr( $Rb3f07f8c36 = array( ), $R63bede6b19, $R5aee22e642 = array( ) )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								if ( 0 < count( $R5aee22e642 ) )
								{
												$R172196908b = $this->GetPageLimit( $R5aee22e642 );
												$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
												if ( $R63bede6b19 != "" )
												{
																$R63bede6b19 = $R172196908b." and ".$R63bede6b19;
												}
								}
								return $this->UpdateRecord( "products", $R63bede6b19 );
				}

				public function IProduct_LimitUpdate( $R00f8f0165d, $R42f28414d6 )
				{
								if ( $R00f8f0165d == "" )
								{
												return false;
								}
								if ( $R42f28414d6 != "" )
								{
												$R130d64a4ad = "update ".$this->dbprefix."products set ".$R00f8f0165d." where ".$R42f28414d6;
								}
								else
								{
												$R130d64a4ad = "update ".$this->dbprefix."products set ".$R00f8f0165d;
								}
								return $this->QueryUpdate( $R130d64a4ad );
				}

				public function IProduct_Del( $R8e8b5578f7 )
				{
								$this->reset( );
								return $this->DeleteRecord( "products", " pid in (".$R8e8b5578f7.") " );
				}

				public function IProduct_Delete( $R3584859062 )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								return $this->UpdateRecord( "products", "pid in (".$R3584859062.")" );
				}

				public function IProduct_DeleteByStr( $R63bede6b19, $data )
				{
								$this->reset( );
								$this->add( "inrecycle", 1 );
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->UpdateRecord( "products", $R172196908b );
				}

				public function IProduct_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "products", "pid in (".$R3584859062.")" );
				}

				public function IProduct_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "products", $R172196908b );
				}

				public function IProduct_GetByStr( $R63bede6b19, $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."products where ".$R172196908b;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IProduct_GetByData( $data, $Rb0d5d47f3d )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "products", $Rb0d5d47f3d );
								return $R679e9b9234;
				}

				public function IProduct_GetId( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								$R679e9b9234 = $this->SelectRecord( "products", "pid" );
								$R8e8b5578f7 = isset( $R679e9b9234[0]['pid'] ) ? $R679e9b9234[0]['pid'] : 0;
								return $R8e8b5578f7;
				}

				public function &IProduct_GetByIds( $R3456919727, $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."products where pid in (".$R3456919727.")";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function IProduct_Update_C2C( $Rb3f07f8c36 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "goods_c2c", " pid in (".$R3584859062.") " );
				}

				public function IProduct_Create_C2C( $Rb3f07f8c36 = array( ) )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "goods_c2c" );
				}

				public function &IProduct_GetByCatParentName( $name, $data )
				{
								$R130d64a4ad = "select p.*,p.listprice as cprice from ".$this->dbprefix."products p where p.catid in (select id from ".$this->dbprefix."category where parentid in (select id from ".$this->dbprefix."category where name in (".$name."))) %s order by p.catid,p.ptype,p.ordering,p.listprice";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " and ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $this->GetPrice( $R679e9b9234 );
				}

				public function &IProduct_GetByCatParentId( $R3584859062, $Ree3cb24a96, $R56ea904d53 )
				{
								$R130d64a4ad = "select p.*,p.listprice as cprice from ".$this->dbprefix."products  p  where p.catid in (select id from ".$this->dbprefix."category where parentid in (".$R3584859062.")) %s order by p.catid,p.ptype,p.ordering,p.listprice";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "p." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " and ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $this->GetPrice( $R679e9b9234 );
				}

				public function GetPrice( $R679e9b9234 )
				{
								$R034cd0ea47 = array( "rankid" => 1, "aid" => 0, "pricetpl" => 0 );
								$Rb112a06dad = factory::getinstance( "priceplan" );
								$R6c59ba72d5 = $Rb112a06dad->IPricePlan_Get( $R034cd0ea47 );
								if ( isset( $R6c59ba72d5[0]['discout'] ) )
								{
												$R33403e391b = $R6c59ba72d5[0]['discout'];
												$R0acfedc1db = $R6c59ba72d5[0]['priceplan'];
								}
								else
								{
												$R33403e391b = 1;
												$R0acfedc1db = 1;
								}
								$Rcee3c6ef0c = $R33403e391b;
								$R9122324626 = $R0acfedc1db;
								$Rf5f11a8d38 = count( $R679e9b9234 );
								$R3a8b307327 = 3;
								$R5ff3ab27b8 = factory::getinstance( "prices" );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $Rf5f11a8d38;	$Ra16d228039++	)
								{
												$R63d0786ecc = $R679e9b9234[$Ra16d228039]['price'];
												$Red2b3403a5 = $R679e9b9234[$Ra16d228039]['listprice'];
												$R8d644413f4 = array(
																"aid" => 0,
																"pid" => $R679e9b9234[$Ra16d228039]['pid']
												);
												$R15a42434e1 = $R5ff3ab27b8->IPrice_Get( $R8d644413f4 );
												if ( isset( $R15a42434e1[0]['price_1'] ) )
												{
																$R0d9f8f778c = $R15a42434e1[0]['price_1'];
												}
												else
												{
																$R014535cc1a = $R679e9b9234[$Ra16d228039]['pricetpl'];
																if ( 0 < $R014535cc1a )
																{
																				$R034cd0ea47 = array(
																								"rankid" => 1,
																								"aid" => 0,
																								"pricetpl" => $R014535cc1a
																				);
																				$R6c59ba72d5 = $Rb112a06dad->IPricePlan_Get( $R034cd0ea47 );
																				if ( isset( $R6c59ba72d5[0]['discout'] ) )
																				{
																								$R33403e391b = $R6c59ba72d5[0]['discout'];
																								$R0acfedc1db = $R6c59ba72d5[0]['priceplan'];
																				}
																				else
																				{
																								$R33403e391b = 1;
																								$R63d0786ecc = 1;
																				}
																}
																switch ( $R0acfedc1db )
																{
																case 1 :
																				$R0d9f8f778c = $R63d0786ecc + ( $Red2b3403a5 - $R63d0786ecc ) * $R33403e391b;
																				break;
																case 2 :
																				$R0d9f8f778c = $R63d0786ecc + $R33403e391b;
																				break;
																case 3 :
																				$R0d9f8f778c = $R63d0786ecc + $Red2b3403a5 * $R33403e391b;
																				break;
																case 4 :
																				$R0d9f8f778c = $Red2b3403a5 * $R33403e391b;
																				break;
																default :
																				$R0d9f8f778c = $Red2b3403a5;
																				break;
																}
												}
												if ( $R0d9f8f778c < $R63d0786ecc || $Red2b3403a5 < $R0d9f8f778c )
												{
																$R0d9f8f778c = $Red2b3403a5;
												}
												$R0d9f8f778c = round( $R0d9f8f778c, $R3a8b307327 );
												$R679e9b9234[$Ra16d228039]['cprice'] = $R0d9f8f778c;
												$R33403e391b = $Rcee3c6ef0c;
												$R0acfedc1db = $R9122324626;
								}
								return $R679e9b9234;
				}

}

?>
