<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class ordno extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IOrdno_Create( $R459cf7ef38 = array( ) )
				{
								$this->reset( );
								foreach ( $R459cf7ef38 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												$this->add( $Ra09fe38af3, $Ra3d52e52a4 );
								}
								return $this->InsertRecord( "ordno" );
				}

}

?>
