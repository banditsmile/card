<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function getmicrotime( )
{
				list( $usec, $sec ) = explode( " ", microtime( ) );
				return ( double )$usec + ( double )$sec;
}

require( "../../../config.php" );
if ( !isset( $_SESSION ) )
{
				global $db_session;
				if ( isset( $db_session ) && $db_session == 1 )
				{
								define( "UPATH_ROOT", "isfs" );
								include( "../database/mysql.php" );
								include( "../database/session.php" );
								$sessiondb = new session( );
				}
				else
				{
								session_start( );
				}
}
if ( !isset( $_SESSION['adminname'] ) && ( !isset( $_SESSION['vipshop'] ) || $_SESSION['vipshop'] == 0 || $_SESSION['istest'] == 1 ) )
{
				exit( );
}
global $Config;
if ( isset( $_SESSION['viproot'] ) )
{
				$viproot = $_SESSION['viproot'];
				if ( $viproot != "" && $viproot != "VROOT" )
				{
								$baseurl = $baseurl."/".$viproot;
				}
}
$Config['Enabled'] = true;
$Config['UserFilesPath'] = $baseurl."/content/";
$Config['UserFilesAbsolutePath'] = "";
$Config['ForceSingleExtension'] = true;
$Config['SecureImageUploads'] = true;
$Config['ConfigAllowedCommands'] = array( "QuickUpload", "FileUpload", "GetFolders", "GetFoldersAndFiles", "CreateFolder" );
$Config['ConfigAllowedTypes'] = array( "File", "Image", "Flash", "Media" );
$Config['HtmlExtensions'] = array( "html", "htm", "xml", "xsd", "txt", "js" );
$Config['ChmodOnUpload'] = 511;
$Config['ChmodOnFolderCreate'] = 511;
$m = $_GET['m'];
$Config['AllowedExtensions']['File'] = array( "7z", "aiff", "asf", "avi", "bmp", "csv", "doc", "fla", "flv", "gif", "gz", "gzip", "jpeg", "jpg", "mid", "mov", "mp3", "mp4", "mpc", "mpeg", "mpg", "ods", "odt", "pdf", "png", "ppt", "pxd", "qt", "ram", "rar", "rm", "rmi", "rmvb", "rtf", "sdc", "sitd", "swf", "sxc", "sxw", "tar", "tgz", "tif", "tiff", "txt", "vsd", "wav", "wma", "wmv", "xls", "xml", "zip" );
$Config['DeniedExtensions']['File'] = array( );
$Config['FileTypesPath']['File'] = $Config['UserFilesPath'].$m;
$Config['FileTypesAbsolutePath']['File'] = $Config['UserFilesAbsolutePath'] == "" ? "" : $Config['UserFilesAbsolutePath']."file/";
$Config['QuickUploadPath']['File'] = $Config['UserFilesPath'];
$Config['QuickUploadAbsolutePath']['File'] = $Config['UserFilesAbsolutePath'];
$Config['AllowedExtensions']['Image'] = array( "bmp", "gif", "jpeg", "jpg", "png" );
$Config['DeniedExtensions']['Image'] = array( );
$Config['FileTypesPath']['Image'] = $Config['UserFilesPath'].$m;
$Config['FileTypesAbsolutePath']['Image'] = $Config['UserFilesAbsolutePath'] == "" ? "" : $Config['UserFilesAbsolutePath']."image/";
$Config['QuickUploadPath']['Image'] = $Config['UserFilesPath'];
$Config['QuickUploadAbsolutePath']['Image'] = $Config['UserFilesAbsolutePath'];
$Config['AllowedExtensions']['Flash'] = array( "swf", "flv" );
$Config['DeniedExtensions']['Flash'] = array( );
$Config['FileTypesPath']['Flash'] = $Config['UserFilesPath'].$m;
$Config['FileTypesAbsolutePath']['Flash'] = $Config['UserFilesAbsolutePath'] == "" ? "" : $Config['UserFilesAbsolutePath']."flash/";
$Config['QuickUploadPath']['Flash'] = $Config['UserFilesPath'];
$Config['QuickUploadAbsolutePath']['Flash'] = $Config['UserFilesAbsolutePath'];
$Config['AllowedExtensions']['Media'] = array( "aiff", "asf", "avi", "bmp", "fla", "flv", "gif", "jpeg", "jpg", "mid", "mov", "mp3", "mp4", "mpc", "mpeg", "mpg", "png", "qt", "ram", "rm", "rmi", "rmvb", "swf", "tif", "tiff", "wav", "wma", "wmv" );
$Config['DeniedExtensions']['Media'] = array( );
$Config['FileTypesPath']['Media'] = $Config['UserFilesPath']."media/";
$Config['FileTypesAbsolutePath']['Media'] = $Config['UserFilesAbsolutePath'] == "" ? "" : $Config['UserFilesAbsolutePath']."media/";
$Config['QuickUploadPath']['Media'] = $Config['UserFilesPath'];
$Config['QuickUploadAbsolutePath']['Media'] = $Config['UserFilesAbsolutePath'];
?>
