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
class taobaosession extends mysql
{

				public $url = NULL;
				public $appKey = NULL;
				public $appSecret = NULL;

				public function __construct( )
				{
								parent::__construct();
				}

				public function &ITaoBaoSession_Page( $data = array( ), $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$R42f28414d6 = $this->GetPageLimit( $data );
								$R71a6fd054f = intval( $data['page'] );
								$R42c553e7de = intval( $data['nrows'] );
								return $this->PageRecord( "taobaosession", $R71a6fd054f, $R42c553e7de, $R42f28414d6, $Rb0d5d47f3d, true, $Rd71fe2585f );
				}

				public function ITaoBaoSession_Get( $R2a51483b14, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								$this->add( "aid", $R2a51483b14 );
								$R679e9b9234 = $this->SelectRecord( "taobaosession", $Rb0d5d47f3d );
								return isset( $R679e9b9234[0] ) ? $R679e9b9234[0] : array( );
				}

				public function &ITaoBaoSession_GetByStr( $data, $Rb0d5d47f3d = "*" )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->SelectRecord( "taobaosession", $Rb0d5d47f3d );
				}

				public function GetPageLimit( $data = array( ), $R1de95f080d = "" )
				{
								$R026f0167b4 = array( );
								$vardata = array(
												array(
																"op" => "charequal",
																"var" => array( "taobaosession" )
												),
												array(
																"op" => "int",
																"var" => array( "aid", "isvalid", "id" )
												)
								);
								$R026f0167b4 = $this->BuildStr( $data, $vardata, $R1de95f080d );
								$R42f28414d6 = implode( " and ", $R026f0167b4 );
								return $R42f28414d6;
				}

				public function ITaoBaoSession_Create( $data )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "taobaosession" );
				}

				public function ITaoBaoSession_Update( $data, $R3584859062 )
				{
								$this->reset( );
								foreach ( $data as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "taobaosession", "id in (".$R3584859062.")" );
				}

				public function ITaoBaoSession_Del( $R3584859062 )
				{
								$this->reset( );
								return $this->DeleteRecord( "taobaosession", "id in (".$R3584859062.")" );
				}

				public function ITaoBaoSession_UpdateByStr( $R3ad6aa4da2 = array( ), $R63bede6b19 )
				{
								$this->reset( );
								foreach ( $R3ad6aa4da2 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->UpdateRecord( "taobaosession", $R63bede6b19 );
				}

				public function ITaoBaoSession_Destroy( $R3584859062 )
				{
								return $this->DeleteRecord( "taobaosession", "id in (".$R3584859062.")" );
				}

				public function ITaoBaoSession_DestroyByStr( $R63bede6b19, $data )
				{
								$R172196908b = $this->GetPageLimit( $data );
								$R172196908b = trim( $R172196908b ) == "" ? " 1=1 " : $R172196908b;
								if ( $R63bede6b19 != "" )
								{
												$R172196908b = $R172196908b." and ".$R63bede6b19;
								}
								return $this->DeleteRecord( "taobaosession", $R172196908b );
				}

				public function ITaoBaoSession_Init( $url, $appKey, $appSecret )
				{
								$this->url = $url;
								$this->appKey = $appKey;
								$this->appSecret = $appSecret;
				}

				public function ITaoBaoSession_GetSold( $R2a51483b14 )
				{
								$url = $this->url;
								$appKey = $this->appKey;
								$appSecret = $this->appSecret;
								$R3db8f5c8bc = $this->ITaoBaoSession_Get( $R2a51483b14 );
								if ( isset( $R3db8f5c8bc['sessionkey'] ) )
								{
												$R255d9f4b14 = $R3db8f5c8bc['sessionkey'];
								}
								else
								{
												return array( );
								}
								$Rfb947ba8e5 = array(
												"method" => "taobao.trades.sold.get",
												"session" => $R255d9f4b14,
												"timestamp" => date( "Y-m-d H:i:s" ),
												"format" => "xml",
												"app_key" => $appKey,
												"v" => "2.0",
												"sign_method" => "md5",
												"fields" => "seller_nick,buyer_nick,title,type,refund_status,created,iid,price,pic_path,num,tid,buyer_message,sid,shipping_type,alipay_no,payment,discount_fee,adjust_fee,snapshot_url,status,seller_rate,buyer_rate,buyer_memo,seller_memo,pay_time,end_time,modified,buyer_obtain_point_fee,point_fee,real_point_fee,total_fee,post_fee,buyer_alipay_no,receiver_name,receiver_state,receiver_city,receiver_district,receiver_address,receiver_zip,receiver_mobile,receiver_phone,consign_time,buyer_email,commission_fee,seller_alipay_no,seller_mobile,seller_phone,seller_name,seller_email,available_confirm_fee,has_postFee,received_payment,cod_fee,timeout_action_time,orders,sku_id,sku_properties_name,item_meal_name,outer_iid,outer_sku_id",
												"start_created" => "",
												"end_created" => "",
												"status" => "WAIT_SELLER_SEND_GOODS",
												"buyer_nick" => "",
												"type" => "",
												"rate_status" => "",
												"tag" => "",
												"page_no" => 1,
												"page_size" => 20
								);
								$R4b19c1abc4 = $this->createSign( $Rfb947ba8e5, $appSecret );
								$R31324bc575 = $this->createStrParam( $Rfb947ba8e5 );
								$R31324bc575 .= "sign=".$R4b19c1abc4;
								$R346fd5b98e = $url.$R31324bc575;
								$Rc8fd32e12e = 0;
								while ( $Rc8fd32e12e < 3 && ( $R679e9b9234 = $this->vita_get_url_content( $R346fd5b98e ) ) === FALSE )
								{
												$Rc8fd32e12e++;
								}
								$R679e9b9234 = $this->getXmlData( $R679e9b9234 );
								$this->ITaoBaoSession_UpdateByStr( array( "isvalid" => -1 ), " aid = ".$R2a51483b14 );
								$R56353f585e = $R679e9b9234['trades']['trade'];
								$Rb5ece8d031 = $R679e9b9234['total_results'];
								if ( $Rb5ece8d031 == 1 )
								{
												return array(
																"0" => $R56353f585e
												);
								}
								else
								{
												return $R56353f585e;
								}
				}

				public function ITaoBaoSession_DealSend( $R755ba04a49, $R2a51483b14 )
				{
								$url = $this->url;
								$appKey = $this->appKey;
								$appSecret = $this->appSecret;
								$R3db8f5c8bc = $this->ITaoBaoSession_Get( $R2a51483b14 );
								if ( isset( $R3db8f5c8bc['sessionkey'] ) )
								{
												$R255d9f4b14 = $R3db8f5c8bc['sessionkey'];
								}
								else
								{
												return array( );
								}
								$Rfb947ba8e5 = array(
												"method" => "taobao.delivery.send",
												"session" => $R255d9f4b14,
												"timestamp" => date( "Y-m-d H:i:s" ),
												"format" => "xml",
												"app_key" => $appKey,
												"v" => "2.0",
												"sign_method" => "md5",
												"fields" => "is_success",
												"tid" => $R755ba04a49,
												"order_type" => "virtual_goods"
								);
								$R4b19c1abc4 = $this->createSign( $Rfb947ba8e5, $appSecret );
								$R31324bc575 = $this->createStrParam( $Rfb947ba8e5 );
								$R31324bc575 .= "sign=".$R4b19c1abc4;
								$R346fd5b98e = $url.$R31324bc575;
								$Rc8fd32e12e = 0;
								while ( $Rc8fd32e12e < 3 && ( $R679e9b9234 = $this->vita_get_url_content( $R346fd5b98e ) ) === FALSE )
								{
												$Rc8fd32e12e++;
								}
								$R679e9b9234 = $this->getXmlData( $R679e9b9234 );
								$Rdd95bbec19 = $R679e9b9234['shipping']['is_success'];
								return 0;
				}

				public function vita_get_url_content( $url )
				{
								if ( function_exists( "file_get_contents" ) )
								{
												$Re30c5d914b = file_get_contents( $url );
								}
								else
								{
												$R83a253518c = curl_init( );
												$Rc873d2670d = 5;
												curl_setopt( $R83a253518c, CURLOPT_URL, $url );
												curl_setopt( $R83a253518c, CURLOPT_RETURNTRANSFER, 1 );
												curl_setopt( $R83a253518c, CURLOPT_CONNECTTIMEOUT, $Rc873d2670d );
												$Re30c5d914b = curl_exec( $R83a253518c );
												curl_close( $R83a253518c );
								}
								return $Re30c5d914b;
				}

				public function createSign( $Rfb947ba8e5 )
				{
								$appSecret = $this->appSecret;
								$R4b19c1abc4 = $appSecret;
								ksort( $Rfb947ba8e5 );
								foreach ( $Rfb947ba8e5 as $Rf413f06aeb => $R244f38266c )
								{
												if ( $Rf413f06aeb != "" && $R244f38266c != "" )
												{
																$R4b19c1abc4 .= $Rf413f06aeb.$R244f38266c;
												}
								}
								$R4b19c1abc4 = strtoupper( md5( $R4b19c1abc4.$appSecret ) );
								return $R4b19c1abc4;
				}

				public function createStrParam( $Rfb947ba8e5 )
				{
								$R31324bc575 = "";
								foreach ( $Rfb947ba8e5 as $Rf413f06aeb => $R244f38266c )
								{
												if ( $Rf413f06aeb != "" && $R244f38266c != "" )
												{
																$R31324bc575 .= $Rf413f06aeb."=".urlencode( $R244f38266c )."&";
												}
								}
								return $R31324bc575;
				}

				public function getXmlData( $Rb176717008 )
				{
								$R980c6a9bfd = strpos( $Rb176717008, "xml" );
								if ( $R980c6a9bfd )
								{
												$R7d9770218d = simplexml_load_string( $Rb176717008, "SimpleXMLElement", LIBXML_NOCDATA );
												$Rc4844a5b85 = $this->get_object_vars_final( $R7d9770218d );
												return $Rc4844a5b85;
								}
								else
								{
												return "";
								}
				}

				public function get_object_vars_final( $R602baa0728 )
				{
								if ( is_object( $R602baa0728 ) )
								{
												$R602baa0728 = get_object_vars( $R602baa0728 );
								}
								if ( is_array( $R602baa0728 ) )
								{
												foreach ( $R602baa0728 as $Rf413f06aeb => $value )
												{
																$R602baa0728[$Rf413f06aeb] = $this->get_object_vars_final( $value );
												}
								}
								return $R602baa0728;
				}

}

?>
