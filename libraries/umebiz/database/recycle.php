<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class recycle extends mysql
{

				public function __construct( )
				{
								parent::__construct();
				}

				public function IRecycle( $table, $R63bede6b19 = "" )
				{
								$R130d64a4ad = "select count(0) as count from ".$this->dbprefix.$table." where inrecycle=1";
								if ( $R63bede6b19 != "" )
								{
												$R130d64a4ad .= " and ".$R63bede6b19;
								}
								if ( $table == "articles" )
								{
												global $masterid;
												$R130d64a4ad .= " and aid =".$masterid;
								}
								$R679e9b9234 = mysql_query( $R130d64a4ad, $this->link );
								$R43297dc3ba = $this->fetch_array( $R679e9b9234 );
								$R056735882a = $R43297dc3ba['count'];
								return $R056735882a;
				}

}

?>
