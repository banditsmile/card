<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function ProductLink( $R8e8b5578f7, $Rb1e236a47d = "b2b" )
{
				if ( $Rb1e236a47d == "b2b" )
				{
								echo UPATH_WEBROOT."index.php?m=mod_".$Rb1e236a47d."&c=Product&a=Detail&pid=".$R8e8b5578f7;
								return;
				}
				if ( !UB_HTML )
				{
								echo UPATH_WEBROOT.$Rb1e236a47d."/i.php?".$R8e8b5578f7.".html";
								return;
				}
				else
				{
								echo UPATH_WEBROOT.$Rb1e236a47d."/p".$R8e8b5578f7.".html";
								return;
				}
}

function ListLink( $Rcd0c741934, $Rb1e236a47d = "b2b" )
{
				if ( !UB_HTML || $Rb1e236a47d == "b2b" )
				{
								echo UPATH_WEBROOT."index.php?m=mod_".$Rb1e236a47d."&c=product&catid=".$Rcd0c741934;
				}
				else
				{
								echo UPATH_WEBROOT.$Rb1e236a47d."/list-".$Rcd0c741934.".html";
				}
}

function YktProductLink( $R4939d208ed, $R1b69c92460, $R8e8b5578f7 = 0 )
{
				if ( !UB_HTML )
				{
								echo UPATH_WEBROOT."ykt/i.php?".$R8e8b5578f7.".html";
				}
				else
				{
								global $masterid;
								if ( $masterid == 0 )
								{
												echo UPATH_WEBROOT."ykt/p".$R8e8b5578f7.".html";
								}
								else
								{
												echo UPATH_WEBROOT."ykt/i.php?".$R8e8b5578f7.".html";
								}
				}
}

function AdImgLink( $R602baa0728 )
{
				if ( $R602baa0728['url'] != "" && strpos( $R602baa0728['url'], "ttp://" ) === false )
				{
								$Rcd3b63dde5 = UPATH_WEBROOT;
				}
				else
				{
								$Rcd3b63dde5 = "";
				}
				$R29bd648e22 = "skins";
				echo "<a href=\"".$Rcd3b63dde5.$R602baa0728['url']."\"><img src=\"".UB_IMGURL.UPATH_WEBROOT.UPATH_SHARECONTENT.$R29bd648e22."/upload/".$R602baa0728['pic']."\" border=\"0\" width=\"100%\"/></a>";
}

function AdTextLink( $R602baa0728 )
{
				if ( $R602baa0728['url'] != "" && strpos( $R602baa0728['url'], "ttp://" ) === false )
				{
								$Rcd3b63dde5 = UPATH_WEBROOT;
				}
				else
				{
								$Rcd3b63dde5 = "";
				}
				echo "<a href=\"".$Rcd3b63dde5.$R602baa0728['url']."\"><font color=\"".$R602baa0728['textcolor']."\">".$R602baa0728['text']."</font></a>";
}

function UbDate( $Reb66c46d32 )
{
				echo date( $Reb66c46d32 );
}

function DisplayCode( $Re2a6348a52, $num = 4, $R5cc00cfbe4 = 1 )
{
				global $masterid;
				$R808b89ba0e = $Re2a6348a52;
				$R54fa3b99a0 = strlen( $Re2a6348a52 );
				if ( $R54fa3b99a0 < 4 )
				{
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $num - $R54fa3b99a0;	$Ra16d228039++	)
								{
												$R808b89ba0e = "0".$R808b89ba0e;
								}
				}
				if ( $Re2a6348a52 == 0 || $Re2a6348a52 == -1 || intval( $Re2a6348a52 ) == $masterid && $R5cc00cfbe4 == 1 )
				{
								echo "<font color=\"#ff0000\">ϵͳ</font>";
				}
				else
				{
								echo "<font color=\"#0000ff\">".$R808b89ba0e."</font>";
				}
}

function ComeFrom( $Re4b9c26a33 )
{
				switch ( $Re4b9c26a33 )
				{
				case 1 :
								echo "����";
								break;
				case 2 :
								echo "����";
								break;
				case 3 :
								echo "һ��ͨ";
								break;
				case 4 :
								echo "�Ա�";
								break;
				case 98 :
								echo "ϵͳ";
								break;
				default :
								echo "����";
								break;
				}
}

function GetCode( $Re2a6348a52, $num )
{
				$R808b89ba0e = $Re2a6348a52;
				$R54fa3b99a0 = strlen( $Re2a6348a52 );
				
				for ( $Ra16d228039 = 0;	$Ra16d228039 < $num - $R54fa3b99a0;	$Ra16d228039++	)
				{
								$R808b89ba0e = "0".$R808b89ba0e;
				}
				return $R808b89ba0e;
}

function SubName( $R8409eaa6ec )
{
				$R8eeb1221ae = $R8409eaa6ec;
				$R8eeb1221ae = preg_replace( "/(.{2})(.{1,})(.{2})/s", "\\1***\\3", $R8eeb1221ae );
				echo $R8eeb1221ae;
}

function SubText( $R8409eaa6ec, $Rcf222ccba2 = 11, $Rbe4c4d037e = 0, $Re2a6348a52 = "utf-8" )
{
				if ( $Re2a6348a52 == "UTF-8" )
				{
								$R14a748f38c = "/[\x01-]|[?�][�-�]|�[?�][�-�]|[?�][�-�][�-�]|�[?�][�-�][�-�]|[?�][�-�][�-�][�-�]/";
								preg_match_all( $R14a748f38c, $R8409eaa6ec, $R9c04209226 );
								if ( $Rcf222ccba2 < count( $R9c04209226[0] ) - $Rbe4c4d037e )
								{
												echo join( "", array_slice( $R9c04209226[0], $Rbe4c4d037e, $Rcf222ccba2 ) )."..";
								}
								else
								{
												echo join( "", array_slice( $R9c04209226[0], $Rbe4c4d037e, $Rcf222ccba2 ) );
								}
				}
				else
				{
								$Rbe4c4d037e *= 2;
								$Rcf222ccba2 *= 2;
								$R54fa3b99a0 = strlen( $R8409eaa6ec );
								$Rd235580370 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R54fa3b99a0;	$Ra16d228039++	)
								{
												if ( $Rbe4c4d037e <= $Ra16d228039 && $Ra16d228039 < $Rbe4c4d037e + $Rcf222ccba2 )
												{
																if ( 129 < ord( substr( $R8409eaa6ec, $Ra16d228039, 1 ) ) )
																{
																				$Rd235580370 .= substr( $R8409eaa6ec, $Ra16d228039, 2 );
																}
																else
																{
																				$Rd235580370 .= substr( $R8409eaa6ec, $Ra16d228039, 1 );
																}
												}
												if ( 129 < ord( substr( $R8409eaa6ec, $Ra16d228039, 1 ) ) )
												{
																$Ra16d228039++;
												}
								}
								if ( strlen( $Rd235580370 ) < $R54fa3b99a0 )
								{
												$Rd235580370 .= "..";
								}
								echo $Rd235580370;
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
