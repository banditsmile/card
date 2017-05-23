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
class SetupController extends Controller
{

				public $hander = NULL;
				public $action = NULL;

				public function __construct( )
				{

				}

				public function index( )
				{
						require UPATH_ROOT."/setup.php";
						$this->Assign("config",$setup);
						$this->view( );
				}


				public function Save( )
				{
						$config = array("MerchantID"=>$_POST['MerchantID'],"key"=>$_POST['key']);
						$txt = "<?php\n\r";
						$txt.="\$setup = ".var_export($config,true).";\n\r";
						$txt.="?>";
						file_put_contents(UPATH_ROOT."/setup.php",$txt);
						$this->alert("ÐÞ¸Ä³É¹¦£¡");
						$this->ScriptRedirect("index.php?m=mod_b2b&c=Setup");
				}


}

?>
