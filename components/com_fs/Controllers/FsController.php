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
class FsController extends Controller
{

				public function __construct( )
				{
				}

				public function vu( )
				{
								$R843c2ca389 = intval( getvar( "d" ) );
								switch ( $R843c2ca389 )
								{
								case 0 :
												$R86d831173a = "/picture/";
												break;
								case 1 :
												$R86d831173a = "/images/";
												break;
								case 2 :
												$R86d831173a = "/upload/";
												break;
								default :
												$R86d831173a = "/picture/";
												break;
								}
								$R5393f93b4d = getvar( "inputid" );
								$Rcbda03ca4f = getvar( "imgid" );
								$Rd82a3b54a7 = getvar( "fun" );
								$Rb1e236a47d = getvar( "mod", "mod_shared/skins" );
								$this->Assign( "dirname", $Rb1e236a47d.$R86d831173a );
								$this->Assign( "inputid", $R5393f93b4d );
								$this->Assign( "imgid", "'".$Rcbda03ca4f."'" );
								$this->Assign( "fun", $Rd82a3b54a7 );
								$this->Assign( "connecter", UPATH_WEBROOT."libraries/umebiz/fs/connector.php" );
								$this->View( );
				}

				public function Index( )
				{
								$R843c2ca389 = intval( getvar( "d" ) );
								switch ( $R843c2ca389 )
								{
								case 0 :
												$R86d831173a = "/picture/";
												break;
								case 1 :
												$R86d831173a = "/images/";
												break;
								case 2 :
												$R86d831173a = "/upload/";
												break;
								default :
												$R86d831173a = "/picture/";
												break;
								}
								$R5393f93b4d = getvar( "inputid" );
								$Rcbda03ca4f = getvar( "imgid" );
								$Rd82a3b54a7 = getvar( "fun" );
								$Rb1e236a47d = getvar( "mod", "mod_shared/skins" );
								$this->Assign( "dirname", $Rb1e236a47d.$R86d831173a );
								$this->Assign( "inputid", $R5393f93b4d );
								$this->Assign( "imgid", "'".$Rcbda03ca4f."'" );
								$this->Assign( "fun", $Rd82a3b54a7 );
								$this->Assign( "connecter", UPATH_WEBROOT."libraries/umebiz/fs/connector.php" );
								$this->View( );
				}

				public function Editer( )
				{
								$R843c2ca389 = intval( getvar( "d" ) );
								switch ( $R843c2ca389 )
								{
								case 0 :
												$R86d831173a = "/picture/";
												break;
								case 1 :
												$R86d831173a = "/images/";
												break;
								case 2 :
												$R86d831173a = "/upload/";
												break;
								default :
												$R86d831173a = "/upload/";
												break;
								}
								$R5393f93b4d = getvar( "inputid" );
								$Rcbda03ca4f = getvar( "imgid" );
								$Rd82a3b54a7 = getvar( "fun" );
								$Rb1e236a47d = getvar( "mod", "mod_shared/skins" );
								$this->Assign( "dirname", $Rb1e236a47d.$R86d831173a );
								$this->Assign( "inputid", $R5393f93b4d );
								$this->Assign( "imgid", "'".$Rcbda03ca4f."'" );
								$this->Assign( "fun", $Rd82a3b54a7 );
								$this->Assign( "connecter", UPATH_WEBROOT."libraries/umebiz/fs/connector.php" );
								$this->View( );
				}

}

?>
