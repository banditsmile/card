<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class sysinfo extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function &IWebInfo_Get( $Rbf2169e849 = "1 = 1", $Re6be5a6973 = "*" )
				{
								$R679e9b9234 = $this->SelectRecord( "sysinfo" );
								return $R679e9b9234[0];
				}

				public function &IWebInfo_Create( )
				{
								$R130d64a4ad = "INSERT INTO posts(title,body,created,modified) VALUES ('yse you\\'r good','yes iam',now(),now())";
								$db->query( $R130d64a4ad );
				}

}

?>
