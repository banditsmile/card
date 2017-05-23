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
class sys extends mysql
{

				public function ISys_Get( $masterid = 0, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "aid", $masterid );
								$R679e9b9234 = $this->SelectRecord( "sysinfo", $Rb0d5d47f3d );
								return isset( $R679e9b9234[0] ) ? $R679e9b9234[0] : array( );
				}

				public function &ISys_GetById( $R3584859062 = 0, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "sysinfo", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function ISys_UpdateByMID( $R25791b03ad = array( ), $masterid = 1 )
				{
								$this->reset( );
								foreach ( $R25791b03ad as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysinfo", " aid = ".$masterid );
				}

				public function &ISys_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."sysinfo where aid > 0 ";
								$R71a6fd054f = intval( $data['page'] ) == 0 ? 15 : $data['page'];
								return $this->PageQuery( $R71a6fd054f, 15, $R130d64a4ad );
				}

				public function ISys_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "sysinfo" );
				}

				public function ISys_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysinfo", "id = ".$R3584859062 );
				}

				public function ISys_UpdateByStr( $Rb45d972ba1 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $Rb45d972ba1 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "sysinfo", $R63bede6b19 );
				}

				public function ISys_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "sysinfo", "id = ".$R3584859062 );
				}

				public function ISys_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "sysinfo", "id in (".$R3584859062.")" );
				}

				public function ISys_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = "";
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "sysinfo", $R172196908b );
				}

				public function &ISys_GetByStr( $R63bede6b19, $Rb0d5d47f3d = "*" )
				{
								$R172196908b = "";
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = "where ".$R172196908b." and ".$R63bede6b19;
								}
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."sysinfo ".$R172196908b;
								return $this->QuerySelect( $R130d64a4ad );
				}

				public function ISys_Info( $masterid = 0, $R9f8079355f = "" )
				{
								$R3db8f5c8bc = array( );
								$R026f0167b4 = array( );
								$R026f0167b4[] = " ordstate = 1 ";
								$R026f0167b4[] = " inrecycle = 0 ";
								$R026f0167b4[] = " aid < 1 ";
								if ( $R9f8079355f != "" )
								{
												$R026f0167b4[] = " (".$R9f8079355f.") ";
								}
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								$R130d64a4ad = "select count(0) as count from ".$this->dbprefix."orders where %s";
								$R130d64a4ad = sprintf( $R130d64a4ad, $R63bede6b19 );
								$R679e9b9234 = $this->queryrows1( $R130d64a4ad );
								$R3db8f5c8bc['order_todeal'] = $R679e9b9234;
								$this->reset( );
								$this->add( "msgto", 1, "<" );
								$this->add( "msgstate", 1 );
								$this->add( "inrecycle", 0 );
								$this->add( "msgtype", 3 );
								$this->add( "parentid", 0 );
								$R679e9b9234 = $this->num_rows( "msg" );
								$R3db8f5c8bc['pm_complaint'] = $R679e9b9234;
								$this->reset( );
								$this->add( "msgto", 1, "<" );
								$this->add( "msgstate", 1 );
								$this->add( "msgtype", 2 );
								$this->add( "inrecycle", 0 );
								$this->add( "parentid", 0 );
								$R679e9b9234 = $this->num_rows( "msg" );
								$R3db8f5c8bc['pm_addfunds'] = $R679e9b9234;
								$R026f0167b4 = array( );
								$R026f0167b4[] = " orddate > '".date( "Y-m-d" )."' ";
								$R026f0167b4[] = " inrecycle = 0 ";
								if ( $R9f8079355f != "" )
								{
												$R026f0167b4[] = " (".$R9f8079355f.") ";
								}
								$R026f0167b4[] = " aid < 1 ";
								$R63bede6b19 = implode( " and ", $R026f0167b4 );
								$R130d64a4ad = "select count(0) as count from ".$this->dbprefix."orders where %s";
								$R130d64a4ad = sprintf( $R130d64a4ad, $R63bede6b19 );
								$R679e9b9234 = $this->queryrows1( $R130d64a4ad );
								$R3db8f5c8bc['order_num'] = $R679e9b9234;
								$this->reset( );
								$this->add( "orddate", date( "Y-m-d" ), ">" );
								$this->add( "inrecycle", 0 );
								$this->add( "ordstate", 2 );
								$R679e9b9234 = $this->num_rows( "funds" );
								$R3db8f5c8bc['today_funds'] = $R679e9b9234;
								$this->reset( );
								$this->add( "regdate", date( "Y-m-d" ), ">" );
								$this->add( "inrecycle", 0 );
								$R679e9b9234 = $this->num_rows( "agents" );
								$R3db8f5c8bc['today_agent'] = $R679e9b9234;
								return $R3db8f5c8bc;
				}

}

?>
