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
class ComplaintController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->Checkb2bSession( );
								$this->hander = factory::getinstance( "msg" );
				}

				public function Index( )
				{
								$Rcc5c6e696c = $this->session->agent;
								list( , , , , $R5334b17ba8, , , $R2a51483b14 ) = $Rcc5c6e696c;
								$R07d615ecc0 = intval( request( "msgdirect" ) );
								$R71a664ef8c = $this->PageInfo( );
								$data = array(
												"msgtype" => 3,
												"msgstate" => intval( request( "msgstate" ) )
								);
								if ( $R07d615ecc0 )
								{
												$data['msgto'] = $R2a51483b14;
												$data['bossid'] = $R5334b17ba8;
												$data['parentid'] = 0;
								}
								else
								{
												$data['msgfrom'] = $R2a51483b14;
												$data['parentid'] = 0;
								}
								$data = array_merge( $data, $R71a664ef8c );
								$R4e420efcc3 = $this->hander->IMsg_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "msgdirect", $R07d615ecc0 );
							
												$this->view( );
								
				}

				public function Add( )
				{
								$R1b69c92460 = intval( request( "ptype" ) );
								$Rdcd9105806 = getvar( "ordno" );
								$R2a51483b14 = intval( request( "aid" ) );
								$this->Assign( "ordno", $Rdcd9105806 );
								$this->Assign( "aid", $R2a51483b14 );
								$this->Assign( "ptype", $R1b69c92460 );
							
												$this->View( );
								
				}

				public function ComplaintSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$Ra3d21a857b = $R2a51483b14;
								$R26238b353c = "";
								list( , $R45df0fe00d, , , , , , , , $R94e0136c8a ) = $Rcc5c6e696c;
								if ( 0 < $R94e0136c8a )
								{
												$Raac42e4217 = $this->GetStaffCache( $R94e0136c8a );
												$R45df0fe00d = $Raac42e4217['realname'];
								}
								$R21784dec6e = intval( request( "msgtype", 1 ) );
								$R180beb7e65 = intval( request( "msgto", 0 ) );
								$R869f4397d0 = intval( request( "msgstate", 1 ) );
								$R07d615ecc0 = intval( request( "msgdirect" ) );
								$Rdcd9105806 = getvar( "ordno", "" );
								if ( $Rdcd9105806 != "" )
								{
												$Rdeabc7f106 = factory::getinstance( "orders" );
												$R3db8f5c8bc = $Rdeabc7f106->IOrder_Get( $Rdcd9105806, "", "", "tsid" );
												if ( 0 < intval( $R3db8f5c8bc['tsid'] ) )
												{
																$this->Alert( "此订单已经投诉过，如果您需要补充，请点击原投诉，在后边回复即可！" );
																echo "<script type=\"text/javascript\">window.close()</script>";
																exit( );
												}
								}
								$R97c1115009 = getvar( "other" );
								$R06c518f70e = getvar( "title" );
								if ( $R97c1115009 == "" )
								{
												$R97c1115009 = $R06c518f70e;
								}
								$Re82ee9b121 = htmlspecialchars( getvar( "content" ) );
								$Rac9b8532b8 = intval( request( "parentid" ) );
								if ( 0 < $Rac9b8532b8 && $R869f4397d0 < 4 )
								{
												$data = array(
																"msgstate" => $R869f4397d0
												);
												$this->hander->IMsg_Update( $data, $Rac9b8532b8 );
								}
								$R76e9854dc9 = getvar( "hope" );
								$data = array(
												"msgfrom" => $Ra3d21a857b,
												"msgto" => $R180beb7e65,
												"msgcc" => "",
												"title" => $R97c1115009,
												"other" => $R97c1115009,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => $Re82ee9b121,
												"parentid" => $Rac9b8532b8,
												"msgtype" => 3,
												"msgstate" => 1,
												"hope" => $R76e9854dc9,
												"ordno" => $Rdcd9105806,
												"admnick" => $R45df0fe00d,
												"aid" => $R2a51483b14,
												"staffid" => $R94e0136c8a
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( 0 < $R808b89ba0e )
								{
												if ( $Rdcd9105806 != "" )
												{
																$data = array(
																				"tsid" => $R808b89ba0e
																);
																$Rdeabc7f106->IOrder_Update( $data, $Rdcd9105806 );
												}
												$this->Alert( "发送成功！" );
												if ( 0 < $Rac9b8532b8 )
												{
																$this->ScriptRedirect( "index.php?m=mod_agent&c=Messenger&msgdirect=".$R07d615ecc0."&a=detail&id=".$Rac9b8532b8 );
												}
												else
												{
																echo "<script type=\"text/javascript\">window.close()</script>";
																exit( );
												}
								}
								else
								{
												$this->Alert( "发送失败！" );
												$this->HistoryGo( );
								}
				}

}

?>
