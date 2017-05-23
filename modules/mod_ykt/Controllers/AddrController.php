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
class AddrController extends Controller
{

				public $hander = NULL;

				public function __construct( )
				{
				}

				public function Index( )
				{
								$R8d392f6832 = getvar( "prv" );
								$Rf286064093 = getvar( "city" );
								$R8d392f6832 = iconv( "UTF-8", "gb2312//IGNORE", $R8d392f6832 );
								$Rf286064093 = iconv( "UTF-8", "gb2312//IGNORE", $Rf286064093 );
								if ( $R8d392f6832 != "" )
								{
												$data = array(
																"prv" => $R8d392f6832,
																"city" => $Rf286064093,
																"forykt" => 1
												);
												$this->hander = factory::getinstance( "agents" );
												$R4e420efcc3 = $this->hander->IAgent_GetByStr( "", $data, "city,arealname,prv,company,aaddr,atel" );
												$this->Assign( "items", $R4e420efcc3 );
								}
								else
								{
												$this->Assign( "items", array( ) );
								}
								$this->YktInit( "经销商名单" );
						
												$this->Assign( "prv", $R8d392f6832 );
												$this->Assign( "city", $Rf286064093 );
												$this->View( );
								
				}

}

?>
