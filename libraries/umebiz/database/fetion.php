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
class fetion extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IFetion_Send( $data = array( ) )
				{
								global $masterid;
								require_once( "fetion.class.v2.php" );
								$sys = factory::getinstance( "sys" );
								$rs = $sys->ISys_Get( $masterid, "fetion_mobile, fetion_pass, fetion_send" );
								if ( isset( $data['nor'] ) && $data['nor'] == 1 )
								{
												if ( !isset( $rs['fetion_mobile'] ) || $rs['fetion_mobile'] == "" )
												{
																return -1;
												}
								}
								else if ( !isset( $rs['fetion_mobile'] ) || $rs['fetion_send'] == 0 || $rs['fetion_mobile'] == "" )
								{
												return -1;
								}
								$fetion = new vs_fetion( $rs['fetion_mobile'], $rs['fetion_pass'] );
								if ( !isset( $data['sendto'] ) )
								{
												$sendto = $rs['fetion_mobile'];
								}
								else
								{
												$sendto = $data['sendto'];
								}
								$sms = $fetion->send( $sendto, $data['sms'] );
								if ( $sms )
								{
												return 0;
								}
								else
								{
												return 1;
								}
				}

}

?>
