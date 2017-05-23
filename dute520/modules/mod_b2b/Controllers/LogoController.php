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
class LogoController extends Controller
{

				public function __construct( )
				{
				}

				public function Index( )
				{
								$Rb51511500c = array( );
								if ( UB_B2C )
								{
												$Rb51511500c[] = array( "name" => "零售系统", "m" => "mod_b2c" );
								}
								if ( UB_B2B )
								{
												$Rb51511500c[] = array( "name" => "批发系统", "m" => "mod_b2b" );
								}
								if ( UB_YKT )
								{
												$Rb51511500c[] = array( "name" => "一卡通", "m" => "mod_ykt" );
								}
								if ( 1 < UB_B2C + UB_B2B + UB_YKT )
								{
												$Rb51511500c[] = array( "name" => "引导页", "m" => "mod_index" );
								}
								$this->Assign('logo', $Rb51511500c); 
								$this->View(); 
				}

}

?>
