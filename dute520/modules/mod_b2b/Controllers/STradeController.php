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
class STradeController extends Controller
{

				public $action = NULL;

				public function __construct( )
				{
								$this->action = array( "trdlist", "strdlist" );
				}

				public function Index( )
				{
								$R902f80a2a7 = factory::getservice( "strade" );
								$R1e3bc50f23 = $this->DateSet( );
								$R71a664ef8c = $this->PageInfo( );
								$R49a1413844 = strtotime( $R1e3bc50f23[0]['startdate'] );
								$R1c8e0f6795 = strtotime( $R1e3bc50f23[0]['enddate'] );
								$R9cde461b70 = ucfirst( request( "a", "Index" ) ) == "Index" ? 0 : 1;
								$data = array(
												"yearfrom" => getvar( "yearfrom", date( "Y", $R49a1413844 ) ),
												"monthfrom" => getvar( "monthfrom", date( "m", $R49a1413844 ) ),
												"dayfrom" => getvar( "dayfrom", date( "d", $R49a1413844 ) ),
												"yearto" => getvar( "yearto", date( "Y", $R1c8e0f6795 ) ),
												"monthto" => getvar( "monthto", date( "m", $R1c8e0f6795 ) ),
												"dayto" => getvar( "dayto", date( "d", $R1c8e0f6795 ) ),
												"action" => $this->action[$R9cde461b70]
								);
								$data = array_merge( $data, $R1e3bc50f23[0], $R71a664ef8c );
								$R4e420efcc3 = $R902f80a2a7->ITrade_Page( $data );
								$this->FillPage( $data, $R4e420efcc3 );
								$this->Assign( "remain", $R4e420efcc3['remain'] );
								$R00be52aa45 = array( "ordno" => "������" );
								$this->Assign( "sarray", $R00be52aa45 );
					
												$this->view( );
					
				}

				public function Table( )
				{
								header( "Content-type: text/html;charset=utf-8" );
								$this->Index( );
				}

				public function SIndex( )
				{
								$this->Index( );
				}

}

?>
