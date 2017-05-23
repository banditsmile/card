<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class excel
{

				public function __construct( )
				{
				}

				public function output( $data, $filename )
				{
								header( "Content-Type: application/vnd.ms-excel; charset=UTF-8" );
								header( "Pragma: public" );
								header( "Expires: 0" );
								header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
								header( "Content-Type: application/force-download" );
								header( "Content-Type: application/octet-stream" );
								header( "Content-Type: application/download" );
								header( "Content-Disposition: attachment;filename=".$filename.".xls " );
								header( "Content-Transfer-Encoding: binary " );
								foreach ( $data as $item )
								{
												$str = implode( "\t ", $item )."\n";
												echo $str;
								}
				}

}

?>
