<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class down
{

				public $url = NULL;
				public $file_name = NULL;
				public $save_path = NULL;
				public $localfile = NULL;
				public $warning = NULL;
				public $redown = NULL;

				public function setUrl( $url )
				{
								if ( !empty( $url ) )
								{
												$this->url = $url;
								}
				}

				public function setFileName( $file_name )
				{
								if ( !empty( $file_name ) )
								{
												$this->file_name = $file_name;
								}
				}

				public function setSavePath( $save_path )
				{
								if ( !empty( $save_path ) )
								{
												$this->save_path = $save_path;
								}
				}

				public function setRedown( $redown )
				{
								if ( !empty( $redown ) )
								{
												$this->redown = $redown;
								}
				}

				public function DownLoad( $url, $redown = 0, $save_path = 0, $file_name = 0 )
				{
								$this->file_name = "update.zip";
								$this->save_path = "update";
								$this->redown = 0;
								$this->setUrl( $url );
								$this->setFileName( $file_name );
								$this->setSavePath( $save_path );
								$this->setRedown( $redown );
								if ( !file_exists( $this->save_path ) )
								{
												$dir = explode( "/", $this->save_path );
												foreach ( $dir as $p )
												{
																mkdir( $p );
												}
								}
				}

				public function checkUrl( )
				{
								return preg_match( "/^(http|ftp)(:\\/\\/)([a-zA-Z0-9-_]+[\\.\\/]+[\\w\\-_\\/]+.*)+\$/i", $this->url );
				}

				public function downLoadFile( )
				{
								$this->localfile = $this->save_path."/".$this->file_name;
								if ( $this->url == "" || $this->localfile == "" )
								{
												$this->warning = "Error: 变量设置错误.";
												return $this->warning;
								}
								if ( !$this->checkUrl( ) )
								{
												$this->warning = "Error: URL ".$this->url." 不合法.";
												return $this->warning;
								}
								if ( file_exists( $this->localfile ) )
								{
												if ( $this->redown )
												{
																unlink( $this->localfile );
												}
												else
												{
																$this->warning = "Warning: 升级文件 ".$this->localfile." 已经存在！ <a href='?action=download&redown=1' target='_self'>重新下载</a>";
																return $this->warning;
												}
								}
								$fp = fopen( $this->url, "rb" );
								if ( !$fp )
								{
												$this->warning = "Error: 打开远程文件 ".$this->url." 失败.";
												return $this->warning;
								}
								$sp = fopen( $this->localfile, "wb" );
								if ( !$sp )
								{
												$this->warning = "Error: 打开本地文件 ".$this->localfile." 失败.";
												return $this->warning;
								}
								$tmpfile = "";
								while ( !feof( $fp ) )
								{
												$tmpfile .= fread( $fp, 1024 );
								}
								fwrite( $sp, $tmpfile );
								fclose( $fp );
								fclose( $sp );
								if ( $this->redown )
								{
												$this->warning = "Success: 重新下载文件 ".$this->file_name." 成功";
								}
								else
								{
												$this->warning = "Success: 下载文件 ".$this->file_name." 成功";
								}
								return 0;
				}

}

echo "\r\n";
?>
