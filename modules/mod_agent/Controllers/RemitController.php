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
class RemitController extends Controller
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
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"msgtype" => 2,
												"marks" => getvar( "marks" ),
												"msgto" => $R2a51483b14,
												"msgstate" => intval( request( "msgstate" ) )
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->IMsg_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->View( );
						
				}

				public function Mon( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R58bca74885 = array(
												"msgtype" => 2,
												"marks" => getvar( "marks" ),
												"msgfrom" => $R2a51483b14,
												"msgstate" => intval( request( "msgstate" ) )
								);
								$data = array_merge( $R58bca74885, $R71a664ef8c, $R1e3bc50f23[0] );
								$R4e420efcc3 = $this->hander->IMsg_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
						
												$this->View( );
						
				}

				public function Add( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R180beb7e65 = intval( request( "msgto" ) );
								$R36a4dc9ccf = array( );
								
								for ( $Ra16d228039 = 2000;	$Ra16d228039 < 2051;	$Ra16d228039++	)
								{
												$R36a4dc9ccf[$Ra16d228039] = $Ra16d228039;
								}
								$Rf52ba22baf = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 13;	$Ra16d228039++	)
								{
												$Rf52ba22baf[$Ra16d228039] = $Ra16d228039;
								}
								$R20fd65e9c7 = array( );
								
								for ( $Ra16d228039 = 1;	$Ra16d228039 < 32;	$Ra16d228039++	)
								{
												$R20fd65e9c7[$Ra16d228039] = $Ra16d228039;
								}
								$R60169cd1c4 = array( );
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < 24;	$Ra16d228039++	)
								{
												$R60169cd1c4[$Ra16d228039] = $Ra16d228039.":00";
								}
								$this->Assign( "y", $R36a4dc9ccf );
								$this->Assign( "m", $Rf52ba22baf );
								$this->Assign( "d", $R20fd65e9c7 );
								$this->Assign( "h", $R60169cd1c4 );
								global $masterid;
								if ( $R180beb7e65 == 0 )
								{
												$R180beb7e65 = $masterid;
								}
								if ( $R180beb7e65 == $R2a51483b14 )
								{
												$R180beb7e65 = 0;
								}
								$R220583696c = $masterid;
								$masterid = $R180beb7e65;
								$R222ff303f4 = factory::getinstance( "banks" );
								$this->Assign( "banks", $R222ff303f4->IBank_Get( ) );
								$masterid = $R220583696c;
								$this->Assign( "id", intval( request( "id" ) ) );
								$Rcc5c6e696c = $this->session->agent;
								$this->Assign( "parentid", $Rcc5c6e696c[4] );
								$this->Assign( "masterid", $masterid );
							
												$this->view( );
								
				}

				public function RemittanceSave( )
				{
								$Rcc5c6e696c = $this->session->agent;
								$R2a51483b14 = $Rcc5c6e696c[7];
								$R180beb7e65 = intval( request( "msgto" ) );
								$Re5576d8e05 = getvar( "year" )."-".getvar( "month" )."-".getvar( "day" )." ".getvar( "hour" ).":00";
								$R2ade2b5cf6 = getvar( "dollars1" );
								$R2e081715dc = getvar( "dollars2" );
								$R9b252bf0a7 = doubleval( $R2ade2b5cf6.".".$R2e081715dc );
								if ( $R9b252bf0a7 <= 0 )
								{
												$this->Alert( "汇款金额要大于等于0" );
												$this->HistoryGo( );
								}
								$R51c716b966 = $this->SetLang( 1 );
								$R06c518f70e = "(".$Re5576d8e05.")编号".$R2a51483b14."汇款".$R9b252bf0a7.$R51c716b966['moneyunit'];
								$R2c90a0c76d = getvar( "bank" );
								if ( $R2c90a0c76d == "" )
								{
												$this->Alert( "请先选择汇款银行" );
												$this->HistoryGo( );
								}
								$R5204d30600 = htmlspecialchars( getvar( "others" ) );
								$Rca1d851200 = getvar( "account" );
								$Rc836d1d272 = getvar( "accountname" );
								$R97c1115009 = $R2c90a0c76d."|".$Rca1d851200."|".$Rc836d1d272;
								$Re82ee9b121 = "开户行：<b>".$R2c90a0c76d."</b>，账户：<b>".$Rca1d851200."</b>，户名：<b>".$Rc836d1d272."</b>\\n\\n汇款备注\\n".$R5204d30600."\\n\\n汇款金额：".$R51c716b966['moneysymbol'].$R9b252bf0a7.$R51c716b966['moneyunit']."\\n\\n汇款时间：".$Re5576d8e05;
								$data = array(
												"msgfrom" => $R2a51483b14,
												"msgto" => $R180beb7e65,
												"msgcc" => 0,
												"title" => $R06c518f70e,
												"createdate" => date( "Y-m-d H-i-s" ),
												"createip" => $this->GetIp( ),
												"content" => $Re82ee9b121,
												"msgtype" => 2,
												"other" => $R97c1115009,
												"hope" => $Rcc5c6e696c[1],
												"otherdate" => $Re5576d8e05,
												"ordno" => $R9b252bf0a7,
												"msgstate" => 1
								);
								$R808b89ba0e = $this->hander->IMsg_Create( $data );
								if ( $R808b89ba0e )
								{
												$this->Alert( "汇款通知书发送成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Remit&a=Add" );
								}
								else
								{
												$this->Alert( "汇款通知书发送失败！" );
												$this->HistoryGo( );
								}
				}

				public function Deal( )
				{
								$R3584859062 = intval( request( "id" ) );
								$data = array( "msgstate" => 3 );
								$R808b89ba0e = $this->hander->IMsg_Update( $data, $R3584859062 );
								if ( $R808b89ba0e )
								{
												$this->Alert( "处理成功！" );
												$this->ScriptRedirect( "index.php?m=mod_agent&c=Remit" );
								}
								else
								{
												$this->Alert( "处理失败！" );
												$this->HistoryGo( );
								}
				}

				public function RemittanceDetail( )
				{
								$R3584859062 = intval( request( "id" ) );
								$R3db8f5c8bc = $this->hander->IMsg_GetById( $R3584859062 );
								$this->Assign( "item", $R3db8f5c8bc );
						
												$this->View( );
						
				}

}

?>
