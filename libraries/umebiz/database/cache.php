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
class cache extends mysql
{

				public $hander = NULL;
				public $data = NULL;

				public function __construct( )
				{
								parent::__construct();
				}

				public function ICache_Update( $data = array( ) )
				{
								if ( $data['hander'] != "pricemy" && $data['hander'] != "list" && $data['hander'] != "pinyin" && $data['hander'] != "vip" )
								{
												$this->hander = factory::getinstance( $data['hander'] );
								}
								$this->data = $data;
								$Rfee6fd8a6d = $data['hander']."cache";
								return $this->$Rfee6fd8a6d( );
				}

				public function gametplcache( )
				{
								$R679e9b9234 = $this->hander->IGameTpl_GetAll( );
								$R63bede6b19 = "\$Rfb5a710323=".var_export( $R679e9b9234, true );
								if ( count( $R679e9b9234 ) == 0 )
								{
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$Rfb5a710323=".var_export( $R679e9b9234, true );
												$this->writefile( $R63bede6b19, "gametpl", "product" );
												return 1;
								}
				}

				public function listcache( )
				{
								$data = $this->data;
								$Rcd0c741934 = $data['arg1'];
								$R130d64a4ad = "select aid as owner,tosys,checked,pid,pname,namecolor,isbold,listprice,price,ptype,hassup,pricetpl,canmakeprice,onsup,forb2b,forshop,forykt,yktpoints,ykttag,sell,inrecycle,stocks as mystocks, 100000 as cprice,  0 as stocks, 0 as yktstocks from ".$this->dbprefix."products where catid=".$Rcd0c741934." and inrecycle=0 order by ordering,aid,catid,ptype,price,pid";
								$R2322221d09 = $this->QuerySelect( $R130d64a4ad );
								$R63bede6b19 = "\$R48f7b140a2=".var_export( $R2322221d09, true );
								$this->writefile( $R63bede6b19, "list-".$Rcd0c741934, "product" );
								$this->cluster( 3, $Rcd0c741934 );
								return 1;
				}

				public function pinyincache( )
				{
								$data = $this->data;
								$Rb62a6519ba = $data['arg1'];
								$R63bede6b19 = " pinyin='".$Rb62a6519ba."'";
								if ( $Rb62a6519ba == "09" )
								{
												$R63bede6b19 = " pinyin > '0' and pinyin < '9' ";
								}
								$R130d64a4ad = "select aid as owner,tosys,checked,pid,pname,namecolor,isbold,listprice,price,ptype,hassup,pricetpl,canmakeprice,onsup,forb2b,sell,inrecycle,stocks as mystocks, 100000 as cprice,  0 as stocks, 0 as yktstocks from ".$this->dbprefix."products where ".$R63bede6b19." order by aid,catid,ordering,ptype,price,pid";
								$R2322221d09 = $this->QuerySelect( $R130d64a4ad );
								$R63bede6b19 = "\$Rae720dbbf3=".var_export( $R2322221d09, true );
								$this->writefile( $R63bede6b19, "pinyin-".$Rb62a6519ba, "product" );
								$this->cluster( 4, $Rb62a6519ba );
								return 1;
				}

				public function pricemycache( )
				{
								$data = $this->data;
								$R2a51483b14 = isset( $data['arg1'] ) ? $data['arg1'] : 0;
								$R1ed7ad9990 = DATACACHE."site".DS."pricemy.php";
								if ( file_exists( $R1ed7ad9990 ) && 0 < $R2a51483b14 )
								{
												include( $R1ed7ad9990 );
												if ( strpos( ",".$Rbe7d360c2b.",", ",".$R2a51483b14."," ) === false )
												{
																$R63bede6b19 = "\$Rbe7d360c2b='".$Rbe7d360c2b.",".$R2a51483b14."'";
												}
												else
												{
																return;
												}
								}
								else
								{
												$R130d64a4ad = "select aid from ".$this->dbprefix."pricemy group by aid";
												$R679e9b9234 = $this->QuerySelect( $R130d64a4ad );
												$R026f0167b4 = array( );
												foreach ( $R679e9b9234 as $R0f8134fb60 )
												{
																$R026f0167b4[] = $R0f8134fb60['aid'];
												}
												$R7f50336ca5 = implode( ",", $R026f0167b4 );
												$R63bede6b19 = "\$Rbe7d360c2b='".$R7f50336ca5."'";
								}
								$this->writefile( $R63bede6b19, "pricemy", "product" );
								return 1;
				}

				public function rankscache( )
				{
								$R679e9b9234 = $this->hander->IRank_Get( );
								$R63bede6b19 = "\$R046b4585a2=".var_export( $R679e9b9234, true );
								$this->writefile( $R63bede6b19, "rank", "agent" );
								$this->cluster( 6, 0 );
								return 1;
				}

				public function priceplancache( )
				{
								$data = $this->data;
								$R2a51483b14 = $data['arg1'];
								$R679e9b9234 = $this->hander->IPricePlan_Get( array(
												"aid" => $R2a51483b14
								) );
								if ( count( $R679e9b9234 ) == 0 )
								{
												$this->delfile( "rank_".$R2a51483b14, "agent" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$R0acfedc1db=".var_export( $R679e9b9234, true );
												$this->writefile( $R63bede6b19, "rank_".$R2a51483b14, "agent" );
												$this->cluster( 7, $R2a51483b14 );
												return 1;
								}
				}

				public function securitycache( )
				{
								$data = $this->data;
								$R2a51483b14 = $data['arg1'];
								$R94e0136c8a = $data['arg2'];
								$R679e9b9234 = $this->hander->ISecurity_GetById( $R2a51483b14, $R94e0136c8a );
								if ( count( $R679e9b9234 ) == 0 )
								{
												$this->delfile( "sec_".$R2a51483b14."_".$R94e0136c8a, "agent" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$R39ad040863=".var_export( $R679e9b9234, true );
												$this->writefile( $R63bede6b19, "sec_".$R2a51483b14."_".$R94e0136c8a, "agent" );
												$this->cluster( 8, $R2a51483b14."-".$R94e0136c8a );
												return 1;
								}
				}

				public function categorycache( )
				{
								$R2322221d09 = $this->hander->ICategory_Get( -1, -1, 0, 0, "hot desc,ordering", "id,name,parentid,color,abst,pinyin,shared,forb2b,pics" );
								$Rf351f6e099 = array( );
								$R737e3dec04 = array( );
								foreach ( $R2322221d09 as $R0f8134fb60 )
								{
												if ( $R0f8134fb60['parentid'] == 0 )
												{
																$Rf351f6e099[] = $R0f8134fb60;
												}
												else
												{
																$R737e3dec04[] = $R0f8134fb60;
												}
								}
								$R63bede6b19 = "\$Rd2e691562d=".var_export( $Rf351f6e099, true );
								$this->writefile( $R63bede6b19, "cat", "product" );
								$R63bede6b19 = "\$R27752f5168=".var_export( $R737e3dec04, true );
								$this->writefile( $R63bede6b19, "subcat", "product" );
								$this->cluster( 10, 0 );
								return 1;
				}

				public function staffscache( )
				{
								$data = $this->data;
								$R94e0136c8a = $data['arg1'];
								$R679e9b9234 = $this->hander->IStaff_Get( $R94e0136c8a );
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 == "staffpwd" || $Ra09fe38af3 == "tradepwd" )
												{
																$R026f0167b4[$Ra09fe38af3] = md5( $Ra3d52e52a4 );
												}
												else
												{
																$R026f0167b4[$Ra09fe38af3] = $Ra3d52e52a4;
												}
								}
								if ( !isset( $R679e9b9234['staffpwd'] ) )
								{
												$this->delfile( "staff_".$R94e0136c8a, "agent" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$Raac42e4217=".var_export( $R026f0167b4, true );
												$this->writefile( $R63bede6b19, "staff_".$R94e0136c8a, "agent" );
								}
								return 1;
				}

				public function agentscache( )
				{
								$data = $this->data;
								$R2a51483b14 = $data['arg1'];
								if ( $R2a51483b14 == 0 )
								{
												return 0;
								}
								$R679e9b9234 = $this->hander->IAgent_Get( $R2a51483b14 );
								if ( !isset( $R679e9b9234['aid'] ) )
								{
												return 0;
								}
								$R026f0167b4 = array( );
								foreach ( $R679e9b9234 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 == "apwd" || $Ra09fe38af3 == "superpwd" || $Ra09fe38af3 == "tradepwd" )
												{
																$R026f0167b4[$Ra09fe38af3] = md5( $Ra3d52e52a4 );
												}
												else
												{
																$R026f0167b4[$Ra09fe38af3] = $Ra3d52e52a4;
												}
								}
								if ( !isset( $R679e9b9234['apwd'] ) )
								{
												$this->delfile( "aid_".$R2a51483b14, "agent" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$agent=".var_export( $R026f0167b4, true );
												$this->writefile( $R63bede6b19, "aid_".$R2a51483b14, "agent" );
								}
								return 1;
				}

				public function articlescache( )
				{
								global $masterid;
								include( UPATH_BASE.DS."libraries".DS."user".DS."homeconfig.b2b.php" );
								$R63bede6b19 = "";
								foreach ( $art as $R0f8134fb60 )
								{
												$R2322221d09 = $this->hander->IArticle_GetByName( $R0f8134fb60['boardname'], $R0f8134fb60['num'], "titlelink,title,id,titlecolor,ndate,stick,aid,inrecycle" );
												$R026f0167b4 = array( );
												foreach ( $R2322221d09 as $Rd45e507c4c )
												{
																if ( $Rd45e507c4c['inrecycle'] != 1 )
																{
																				$R026f0167b4[] = $Rd45e507c4c;
																}
												}
												$R63bede6b19 .= chr( 10 )."\$".$R0f8134fb60['vdname']."=".var_export( $R026f0167b4, true ).";".chr( 10 );
								}
								$this->writefile( $R63bede6b19, "a" );
								return 1;
				}

				public function adcache( )
				{
								$R2322221d09 = $this->hander->IAd_GetByRange( 0, 1000, -1 );
								$R63bede6b19 = "\$R58765afcb5=".var_export( $R2322221d09, true );
								$this->writefile( $R63bede6b19, "ad" );
								return 1;
				}

				public function productscache( )
				{
								$data = $this->data;
								$R8e8b5578f7 = $data['arg1'];
								$R2322221d09 = $this->hander->IProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R2322221d09['pid'] ) )
								{
												$this->delfile( "p".$R8e8b5578f7, "product" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$Rb3f07f8c36=".var_export( $R2322221d09, true );
												$this->writefile( $R63bede6b19, "p".$R8e8b5578f7, "product" );
												$this->cluster( 2, $R8e8b5578f7 );
								}
								return 1;
				}

				public function scoredproductcache( )
				{
								$data = $this->data;
								$R8e8b5578f7 = $data['arg1'];
								$R2322221d09 = $this->hander->IScoredProduct_Get( $R8e8b5578f7 );
								if ( !isset( $R2322221d09['pid'] ) )
								{
												$this->delfile( "cp".$R8e8b5578f7, "product" );
												return 0;
								}
								else
								{
												$R63bede6b19 = "\$R37ad834577=".var_export( $R2322221d09, true );
												$this->writefile( $R63bede6b19, "cp".$R8e8b5578f7, "product" );
								}
								return 1;
				}

				public function vipcache( )
				{
								$R130d64a4ad = "select aid,website,admdir,startdate,enddate from ".$this->dbprefix."sysinfo where aid > 0";
								$R2322221d09 = $this->QuerySelect( $R130d64a4ad );
								$R63bede6b19 = "\$R6009ea84c3=".var_export( $R2322221d09, true );
								$this->writefile( $R63bede6b19, "u_vip" );
				}

				public function fxcache( )
				{
								$R679e9b9234 = $this->hander->IFX_Get( );
								$R63bede6b19 = "\$Rb321ab3f5e=".var_export( $R679e9b9234, true );
								$this->writefile( $R63bede6b19, "fx" );
				}

				public function syscache( )
				{
								global $masterid;
								$R2322221d09 = $this->hander->ISys_Get( $masterid );
								$Rf351f6e099 = array( );
								$R737e3dec04 = array( );
								foreach ( $R2322221d09 as $Ra09fe38af3 => $Ra3d52e52a4 )
								{
												if ( $Ra09fe38af3 == "useragreement" )
												{
																$Rf351f6e099[$Ra09fe38af3] = $Ra3d52e52a4;
												}
												else
												{
																$R737e3dec04[$Ra09fe38af3] = $Ra3d52e52a4;
												}
								}
								if ( $masterid == 0 )
								{
												$R63bede6b19 = "\$R30b2ab8dc1=".var_export( $R737e3dec04, true );
												$this->writefile( $R63bede6b19, "u_base_setting" );
												$this->cluster( 1, 0 );
												$R63bede6b19 = "\$Rd8f9040e0f=".var_export( $Rf351f6e099, true );
												$this->writefile( $R63bede6b19, "u_aggrement" );
								}
								else
								{
												$R63bede6b19 = "\$R30b2ab8dc1=".var_export( $R737e3dec04, true );
												$this->writefile( $R63bede6b19, "u_base_setting_".$masterid );
												$R63bede6b19 = "\$Rd8f9040e0f=".var_export( $Rf351f6e099, true );
												$this->writefile( $R63bede6b19, "u_aggrement_".$masterid );
								}
								return 1;
				}

				public function quickcache( )
				{
								$R679e9b9234 = $this->hander->IQuick_Get( );
								$R63bede6b19 = "\$R93c5cf68df=".var_export( $R679e9b9234, true );
								$this->writefile( $R63bede6b19, "quick", "product" );
								$this->cluster( 11, 0 );
				}

				public function writefile( $Re82ee9b121, $Re1ad31a93f, $R714ca9eb87 = "site" )
				{
								if ( $R714ca9eb87 == "site" )
								{
												$R3d9a15f4b8 = SITECACHE.$Re1ad31a93f.".php";
								}
								else
								{
												$R3d9a15f4b8 = DATACACHE.$R714ca9eb87.DS.$Re1ad31a93f.".php";
								}
								$Re82ee9b121 = "<?php ".chr( 10 ).$Re82ee9b121.";".chr( 10 )."?>";
								file_put_contents( $R3d9a15f4b8, $Re82ee9b121 );
				}

				public function delfile( $Re1ad31a93f, $R714ca9eb87 = "site" )
				{
								if ( $R714ca9eb87 == "site" )
								{
												$R3d9a15f4b8 = SITECACHE.$Re1ad31a93f.".php";
								}
								else
								{
												$R3d9a15f4b8 = DATACACHE.$R714ca9eb87.DS.$Re1ad31a93f.".php";
								}
								if ( file_exists( $R3d9a15f4b8 ) )
								{
												unlink( $R3d9a15f4b8 );
								}
				}

				public function cluster( $Rd3fe9c10a8, $Ra3d52e52a4 )
				{
								$R09a3346376 = UPATH_BASE.DS."cluster.php";
								if ( file_exists( $R09a3346376 ) )
								{
												include( $R09a3346376 );
												foreach ( $Ra0a4326ae0 as $R0f8134fb60 )
												{
																@file_get_contents( $R0f8134fb60."index.php?m=mod_b2b&c=cluster&a=index&k=".$Rf676d660ab."&w=".$Rd3fe9c10a8."&v=".$Ra3d52e52a4 );
												}
								}
				}

}

?>
