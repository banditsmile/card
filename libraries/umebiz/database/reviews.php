<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class reviews extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IReview_Page( $data = array( ) )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$Re484ed591e = isset( $data['rows'] ) ? $data['rows'] : 20;
								return $this->PageRecord( "reviews", $R71a6fd054f, $Re484ed591e, $this->GetPageLimit( $data ), "*", true );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "content", "reviewer", "subject" )
												),
												array(
																"op" => "intequal",
																"var" => array( "pid" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								if ( isset( $data['checked'] ) && $data['checked'] != "-1" )
								{
												$R026f0167b4[] = " checked = ".intval( $data['checked'] );
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
												$R026f0167b4[] = " alv = ".intval( $R0f8134fb60 );
								}
								if ( 0 < count( $R026f0167b4 ) )
								{
												return sprintf( "( %s )", implode( " or ", $R026f0167b4 ) );
								}
								else
								{
												return "";
								}
				}

				public function &IReview_GetById( $R3584859062, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "reviews", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IReview_Get( $R8e8b5578f7, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "pid", $R8e8b5578f7 );
								$R679e9b9234 = $this->SelectRecord( "reviews", $Rb0d5d47f3d );
								return $R679e9b9234[0];
				}

				public function &IReview_GetRows( $R8e8b5578f7, $Rb0d5d47f3d = "*", $R75a67fe446 = 3 )
				{
								$R130d64a4ad = "select ".$Rb0d5d47f3d." from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 order by id desc limit 3";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234;
				}

				public function &IReview_GetData( $R8e8b5578f7 )
				{
								$R130d64a4ad = "select count(id) as rows, sum(marks) as marks,(select count(id) from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 and marks<5.1 and marks>4) as mark5,"."(select count(id) from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 and marks<4.1 and marks>3) as mark4,"."(select count(id) from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 and marks<3.1 and marks>2) as mark3,"."(select count(id) from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 and marks<2.1 and marks>1) as mark2,"."(select count(id) from ".$this->dbprefix."reviews where pid=".$R8e8b5578f7." and checked=1 and marks<1.1 and marks>0) as mark1"." from ".$this->dbprefix."reviews where checked=1 and pid=".$R8e8b5578f7;
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								return $R679e9b9234[0];
				}

				public function IReview_Update( $R756e0eec3c = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R756e0eec3c as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "reviews", "id = ".$R3584859062 );
				}

				public function IReview_Create( $R756e0eec3c = array( ) )
				{
								$this->reset( );
								foreach ( $R756e0eec3c as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "reviews", true );
				}

				public function IReview_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "reviews", "id = ".$R3584859062 );
				}

				public function IReview_UpdateByStr( $data = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "reviews", $R63bede6b19 );
				}

				public function IReview_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "reviews", "id in (".$R3584859062.")" );
				}

				public function IReview_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "reviews", $R172196908b );
				}

}

?>
