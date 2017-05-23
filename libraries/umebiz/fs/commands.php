<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function GetFolders( $resourceType, $currentFolder )
{
				$sServerDir = servermapfolder( $resourceType, $currentFolder, "GetFolders" );
				$aFolders = array( );
				$oCurrentFolder = opendir( $sServerDir );
				while ( $sFile = readdir( $oCurrentFolder ) )
				{
								if ( $sFile != "." && $sFile != ".." && is_dir( $sServerDir.$sFile ) )
								{
												$aFolders[] = "<Folder name=\"".converttoxmlattribute( $sFile )."\" />";
								}
				}
				closedir( $oCurrentFolder );
				echo "<Folders>";
				natcasesort( $aFolders );
				foreach ( $aFolders as $sFolder )
				{
								echo $sFolder;
				}
				echo "</Folders>";
}

function GetFoldersAndFiles( $resourceType, $currentFolder )
{
				$sServerDir = servermapfolder( $resourceType, $currentFolder, "GetFoldersAndFiles" );
				$aFolders = array( );
				$aFiles = array( );
				$oCurrentFolder = opendir( $sServerDir );
				while ( $sFile = readdir( $oCurrentFolder ) )
				{
								if ( $sFile != "." && $sFile != ".." )
								{
												if ( is_dir( $sServerDir.$sFile ) )
												{
																$aFolders[] = "<Folder name=\"".converttoxmlattribute( $sFile )."\" />";
												}
												else
												{
																$iFileSize = @filesize( $sServerDir.$sFile );
																if ( !$iFileSize )
																{
																				$iFileSize = 0;
																}
																if ( 0 < $iFileSize )
																{
																				$iFileSize = round( $iFileSize / 1024 );
																				if ( $iFileSize < 1 )
																				{
																								$iFileSize = 1;
																				}
																}
																$aFiles[] = "<File name=\"".converttoxmlattribute( $sFile )."\" size=\"".$iFileSize."\" />";
												}
								}
				}
				natcasesort( $aFolders );
				echo "<Folders>";
				foreach ( $aFolders as $sFolder )
				{
								echo $sFolder;
				}
				echo "</Folders>";
				natcasesort( $aFiles );
				echo "<Files>";
				foreach ( $aFiles as $sFiles )
				{
								echo $sFiles;
				}
				echo "</Files>";
}

function CreateFolder( $resourceType, $currentFolder )
{
				if ( !isset( $_GET ) )
				{
								global $_GET;
				}
				$sErrorNumber = "0";
				$sErrorMsg = "";
				if ( isset( $_GET['NewFolderName'] ) )
				{
								$sNewFolderName = $_GET['NewFolderName'];
								$sNewFolderName = sanitizefoldername( $sNewFolderName );
								if ( strpos( $sNewFolderName, ".." ) !== FALSE )
								{
												$sErrorNumber = "102";
								}
								else
								{
												$sServerDir = servermapfolder( $resourceType, $currentFolder, "CreateFolder" );
												if ( is_writable( $sServerDir ) )
												{
																$sServerDir .= $sNewFolderName;
																$sErrorMsg = createserverfolder( $sServerDir );
																switch ( $sErrorMsg )
																{
																case "" :
																				$sErrorNumber = "0";
																				break;
																case "Invalid argument" :
																case "No such file or directory" :
																				$sErrorNumber = "102";
																				break;
																default :
																				$sErrorNumber = "110";
																				break;
																}
												}
												else
												{
																$sErrorNumber = "103";
												}
								}
				}
				else
				{
								$sErrorNumber = "102";
				}
				echo "<Error number=\"".$sErrorNumber."\" originalDescription=\"".converttoxmlattribute( $sErrorMsg )."\" />";
}

function FileUpload( $resourceType, $currentFolder, $sCommand )
{
				if ( !isset( $_FILES ) )
				{
								global $_FILES;
				}
				$sErrorNumber = "0";
				$sFileName = "";
				if ( isset( $_FILES['NewFile'] ) && !is_null( $_FILES['NewFile']['tmp_name'] ) )
				{
								global $Config;
								$oFile = $_FILES['NewFile'];
								$sServerDir = servermapfolder( $resourceType, $currentFolder, $sCommand );
								$sFileName = $oFile['name'];
								$sFileName = sanitizefilename( $sFileName );
								$sOriginalFileName = $sFileName;
								$sExtension = substr( $sFileName, strrpos( $sFileName, "." ) + 1 );
								$sExtension = strtolower( $sExtension );
								if ( isset( $Config['SecureImageUploads'] ) && ( $isImageValid = isimagevalid( $oFile['tmp_name'], $sExtension ) ) === false )
								{
												$sErrorNumber = "202";
								}
								if ( isset( $Config['HtmlExtensions'] ) && !ishtmlextension( $sExtension, $Config['HtmlExtensions'] ) && ( $detectHtml = detecthtml( $oFile['tmp_name'] ) ) === true )
								{
												$sErrorNumber = "202";
								}
								if ( !$sErrorNumber && isallowedext( $sExtension, $resourceType ) )
								{/*
												do
												{
																$iCounter = 0;
																while ( true )
																{*/
																				$sFilePath = $sServerDir.$sFileName;
																				move_uploaded_file( $oFile['tmp_name'], $sFilePath );
																				if ( !is_file( $sFilePath ) )
																				{
																								break;
																				}
																				else
																				{
																								if ( isset( $Config['ChmodOnUpload'] ) && !$Config['ChmodOnUpload'] )
																								{
																								}
																								$permissions = 511;
																								if ( isset( $Config['ChmodOnUpload'] ) && $Config['ChmodOnUpload'] )
																								{
																												$permissions = $Config['ChmodOnUpload'];
																								}
																								$oldumask = umask( 0 );
																								chmod( $sFilePath, $permissions );
																								umask( $oldumask );
																				}
																/*}
												} while ( 0 );*/
								}
								else
								{
												$sErrorNumber = "202";
								}
				}
				else
				{
								$sErrorNumber = "202";
				}
				$sFileUrl = combinepaths( getresourcetypepath( $resourceType, $sCommand ), $currentFolder );
				$sFileUrl = combinepaths( $sFileUrl, $sFileName );
				senduploadresults( $sErrorNumber, $sFileUrl, $sFileName );
				exit( );
}

?>
