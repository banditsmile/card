<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Prop extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IProp_Get( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "goods_prop_tpl", "*", "order by groupid,ordering" );
				}

				public function &IProp_GetGroup( $data = array( ) )
				{
								if ( isset( $data['catid'] ) )
								{
												$R026f0167b4 = array( );
												foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
												{
																$R026f0167b4[] = $Ra09fe38af3."=".$Ra3d52e52a4;
												}
												$R130d64a4ad = "select * from ".$this->dbprefix."goods_prop_groups where id in (select groupid from ".$this->dbprefix."goods_prop_tpl where ".implode( " and ", $R026f0167b4 )." ) order by ordering";
												return $this->QuerySelect( $R130d64a4ad );
								}
								$this->reset( );
								return $this->SelectRecord( "goods_prop_groups" );
				}

				public function IProp_Update( $data = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "goods_prop_tpl", "id = ".$R3584859062 );
				}

				public function IProp_Create( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "goods_prop_tpl" );
				}

				public function IProp_Delete( $R3584859062 )
				{
								return $this->DeleteRecord( "goods_prop_tpl", "id = ".$R3584859062 );
				}

				public function IProp_GroupUpdate( $data = array( ), $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "goods_prop_groups", "id = ".$R3584859062 );
				}

				public function IProp_GroupCreate( $data = array( ) )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "goods_prop_groups" );
				}

				public function IProp_GroupDelete( $R3584859062 )
				{
								return $this->DeleteRecord( "goods_prop_groups", "id = ".$R3584859062 );
				}

				public function IProp_GroupGetMaxId( )
				{
								$R130d64a4ad = "select * from ".$this->dbprefix."goods_prop_groups order by id desc limit 1";
								$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
								if ( isset( $R679e9b9234[0]['id'] ) )
								{
												return $R679e9b9234[0]['id'];
								}
								else
								{
												return 0;
								}
				}

}

?>
