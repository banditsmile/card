<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class yktproducts extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IYktProduct_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R42f28414d6 = $this->GetPageLimit( $data );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageRecord( "yktproducts", $R71a6fd054f, 15, $R42f28414d6, $Rb0d5d47f3d );
				}

				public function &IYktProduct_PageQuery( $data = array( ) )
				{
								$R130d64a4ad = "select t0.*,(select count(0) from ".$this->dbprefix."products t1 where t1.yktpid=t0.yktpid) as childs "."from ".$this->dbprefix."yktproducts t0 "."%s order by t0.ordering";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R71a6fd054f = intval( $data['page'] );
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function &IYktProduct_GetAll( )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."yktproducts order by letter";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IYktProduct_GetHot( )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."yktproducts where hot=1 order by ordering";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IYktProduct_Get( $data, $R4454e360ff = "*" )
				{
								$Rcc5c6e696c = explode( ",", $R4454e360ff );
								$R026f0167b4 = array( );
								foreach ( $Rcc5c6e696c as $Re6be5a6973 )
								{
												$R026f0167b4[] = "t1.".$Re6be5a6973;
								}
								$R130d64a4ad = "select t0.*,(select count(0) from ".$this->dbprefix."products t2 where t2.yktpid = t0.yktpid and ptype=0) as km,"."(select count(0) from ".$this->dbprefix."products t3 where t3.yktpid = t0.yktpid and ptype>0) as cz,".implode( ",", $R026f0167b4 )." from ".$this->dbprefix."yktproducts t0 "."left join ".$this->dbprefix."products t1 on t1.yktpid = t0.yktpid "."%s group by t0.yktpid order by t1.yktpoints";
								$R026f0167b4 = "";
								$R42f28414d6 = $this->GetPageLimit( $data, "t0." );
								if ( $R42f28414d6 != null )
								{
												$R026f0167b4 = " where ".$R42f28414d6;
								}
								$R130d64a4ad = sprintf( $R130d64a4ad, $R026f0167b4 );
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$R7965cb3798 = isset( $data['keywords'] ) ? $data['keywords'] : "";
								$Ra76b34e7e3 = explode( " ", $R7965cb3798 );
								foreach ( $Ra76b34e7e3 as $R0f8134fb60 )
								{
												$R026f0167b4[] = " ".$R1de95f080d."yktpname like '%".$R0f8134fb60."%'";
								}
								if ( isset( $data['yktpid'] ) && $data['yktpid'] != "" )
								{
												$R026f0167b4[] = " ".$R1de95f080d."yktpid = ".intval( $data['yktpid'] );
								}
								if ( isset( $data['optype'] ) && $data['optype'] != "" )
								{
												$R026f0167b4[] = $this->GetLimit( $data['optype'], $R1de95f080d );
								}
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
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
																$R026f0167b4[] = " ".$R1de95f080d."recommand=1 ";
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

				public function &IYktProduct_GetById( $R3584859062, $R9afaabccd6 = "*" )
				{
								$this->reset( );
								$this->add( "yktpid", $R3584859062 );
								$R3db8f5c8bc = $this->SelectRecord( "yktproducts", $R9afaabccd6 );
								return $R3db8f5c8bc[0];
				}

				public function IYktProduct_Create( $Rb3f07f8c36 = array( ) )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "yktproducts", true );
				}

				public function IYktProduct_Update( $Rb3f07f8c36 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "yktproducts", " yktpid in (".$R3584859062.") " );
				}

				public function IYktProduct_ItemUpdate( $Rb3f07f8c36 = array( ), $R42f28414d6 )
				{
								$this->reset( );
								foreach ( $Rb3f07f8c36 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "yktproducts", $R42f28414d6 );
				}

				public function IYktProduct_Del( $R8e8b5578f7 )
				{
								$this->reset( );
								return $this->DeleteRecord( "yktproducts", " yktpid in (".$R8e8b5578f7.") " );
				}

}

?>
