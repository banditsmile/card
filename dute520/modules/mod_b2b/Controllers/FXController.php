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
class FXController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
								$this->hander = factory::getinstance( "fx" );
				}

				public function Index( )
				{
								$R3db8f5c8bc = $this->hander->IFX_Get( );
								$this->Assign( "item", $R3db8f5c8bc );
								$this->Assign( "dec", $this->GetDec( ) );
						
												$this->view( );
						
				}

				public function Save( )
				{
								$R3a8b307327 = intval( request( "dec", 0 ) );
								$R96e20b4752 = doubleval( request( "curfx", 1 ) );
								$R59ea05b6f1 = doubleval( request( "newfx", 1 ) );
								$R42f28414d6 = "1 = 1";
								$R422f9a4efb = factory::getinstance( "products" );
								$data = array(
												"curfx" => $R59ea05b6f1,
												"oldfx" => $R96e20b4752
								);
								$R808b89ba0e = $this->hander->IFX_Update( $data );
								$this->UpdateCache( "fx" );
								$R026f0167b4 = array( );
								$R026f0167b4[] = "price=round( price * ".$R59ea05b6f1." / ".$R96e20b4752.",".$R3a8b307327.")";
								$R026f0167b4[] = "listprice=round( listprice * ".$R59ea05b6f1." / ".$R96e20b4752.",".$R3a8b307327.")";
								$R00f8f0165d = implode( ",", $R026f0167b4 );
								$R808b89ba0e = $R422f9a4efb->IProduct_LimitUpdate( $R00f8f0165d, "1 = 1" );
								if ( $R808b89ba0e )
								{
												$this->Alert( "价格更新成功！" );
								}
								else
								{
												$this->Alert( "价格更新失败！" );
								}
								$this->Scriptredirect( "index.php?m=mod_b2b&c=FX" );
				}

}

?>
