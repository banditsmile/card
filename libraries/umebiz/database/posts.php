<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class posts extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IPost_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$R130d64a4ad = "select ".$Re6be5a6973." from posts where ".$Rbf2169e849;
								$R679e9b9234 = $this->query( $R130d64a4ad );
								$Rd2db2fb0a6 = array( );
								do
								{
												if ( $Rd2db2fb0a6[] = $this->fetch_array( $R679e9b9234 ) )
												{
																break;
												}
								} while ( 1 );
								$this->free_result( $R679e9b9234 );
								return $Rd2db2fb0a6;
				}

				public function &IPost_Create( )
				{
								$R130d64a4ad = "INSERT INTO posts(title,body,created,modified) VALUES ('yse you\\'r good','yes iam',now(),now())";
								$db->query( $R130d64a4ad );
				}

}

?>
