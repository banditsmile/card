<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class coupon extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ICoupon_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R71a6fd054f = $data['page'];
								$R42c553e7de = $data['nrows'];
								return $this->PageRecord( "coupon", $R71a6fd054f, $R42c553e7de, $this->GetPageLimit( $data ), $Rb0d5d47f3d, true, "hot desc,pinyin,ordering,id" );
				}

				public function GetPageLimit( $data = array( ) )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "like",
																"var" => array( "name", "pinyin" )
												),
												array(
																"op" => "intequal",
																"var" => array( "parentid", "ordering", "hot" )
												),
												array(
																"op" => "intequal",
																"var" => array( "aid" ),
																"null" => "no"
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function &ICoupon_Get( $Rac9b8532b8 = -1, $R2a51483b14 = 0 )
				{
								$this->reset( );
								if ( -1 < $Rac9b8532b8 )
								{
												$this->add( "parentid", $Rac9b8532b8 );
								}
								if ( $R2a51483b14 != 0 )
								{
												$this->add( "aid", $R2a51483b14 );
								}
								return $this->SelectRecord( "coupon", "*", "order by ordering" );
				}

				public function &ICoupon_GetById( $R3584859062 = 0 )
				{
								$this->reset( );
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "coupon" );
								return $R679e9b9234[0];
				}

				public function ICoupon_GetParent( $R3584859062 = 0 )
				{
								$this->reset( );
								if ( $R3584859062 == 0 )
								{
												return 0;
								}
								$this->add( "id", $R3584859062 );
								$R679e9b9234 = $this->SelectRecord( "coupon" );
								return $R679e9b9234[0]['parentid'];
				}

				public function ICoupon_Update( $R36b9ff2e13 = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $R36b9ff2e13 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "coupon", "id = ".$R3584859062 );
				}

				public function ICoupon_Create( $R36b9ff2e13 = array( ) )
				{
								$this->reset( );
								foreach ( $R36b9ff2e13 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "coupon" );
				}

				public function ICoupon_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "coupon", "id = ".$R3584859062 );
				}

				public function ICoupon_UpdateByStr( $R36b9ff2e13 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R36b9ff2e13 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "coupon", $R63bede6b19 );
				}

				public function ICoupon_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "coupon", "id in (".$R3584859062.")" );
				}

				public function ICoupon_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "coupon", $R172196908b );
				}

}

?>
