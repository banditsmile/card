<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class zip
{

				public $file_count = NULL;
				public $datastr_len = NULL;
				public $dirstr_len = NULL;
				public $filedata = NULL;
				public $gzfilename = NULL;
				public $fp = NULL;
				public $dirstr = NULL;

				public function __construct( )
				{
								$this->file_count = 0;
								$this->datastr_len = 0;
								$this->dirstr_len = 0;
								$this->filedata = "";
								$this->dirstr = "";
				}

				public function unix2DosTime( $unixtime = 0 )
				{
								$timearray = $unixtime == 0 ? getdate( ) : getdate( $unixtime );
								if ( $timearray['year'] < 1980 )
								{
												$timearray['year'] = 1980;
												$timearray['mon'] = 1;
												$timearray['mday'] = 1;
												$timearray['hours'] = 0;
												$timearray['minutes'] = 0;
												$timearray['seconds'] = 0;
								}
								return $timearray['year'] - 1980 << 25 | $timearray['mon'] << 21 | $timearray['mday'] << 16 | $timearray['hours'] << 11 | $timearray['minutes'] << 5 | $timearray['seconds'] >> 1;
				}

				public function startfile( $path = "faisun.zip" )
				{
								$this->gzfilename = $path;
								$mypathdir = array( );
								do
								{
												$mypathdir[] = $path = dirname( $path );
								} while ( $path != "." );
								@end( $mypathdir );
								do
								{
												$path = @current( $mypathdir );
												@mkdir( $path );
								} while ( @prev( $mypathdir ) );
								if ( $this->fp = fopen( $this->gzfilename, "w" ) )
								{
												return true;
								}
								return false;
				}

				public function addfile( $data, $name )
				{
								$name = str_replace( "\\", "/", $name );
								if ( strrchr( $name, "/" ) == "/" )
								{
												return $this->adddir( $name );
								}
								$dtime = dechex( $this->unix2DosTime( ) );
								$hexdtime = "\\x".$dtime[6].$dtime[7]."\\x".$dtime[4].$dtime[5]."\\x".$dtime[2].$dtime[3]."\\x".$dtime[0].$dtime[1];
								eval( "\$hexdtime = \"".$hexdtime."\";" );
								$unc_len = strlen( $data );
								$crc = crc32( $data );
								$zdata = gzcompress( $data );
								$c_len = strlen( $zdata );
								$zdata = substr( substr( $zdata, 0, strlen( $zdata ) - 4 ), 2 );
								$datastr = "PK\x03\x04";
								$datastr .= "\x14\x00";
								$datastr .= "\x00\x00";
								$datastr .= "\x08\x00";
								$datastr .= $hexdtime;
								$datastr .= pack( "V", $crc );
								$datastr .= pack( "V", $c_len );
								$datastr .= pack( "V", $unc_len );
								$datastr .= pack( "v", strlen( $name ) );
								$datastr .= pack( "v", 0 );
								$datastr .= $name;
								$datastr .= $zdata;
								$datastr .= pack( "V", $crc );
								$datastr .= pack( "V", $c_len );
								$datastr .= pack( "V", $unc_len );
								fwrite( $this->fp, $datastr );
								$my_datastr_len = strlen( $datastr );
								unset( $datastr );
								$dirstr = "PK\x01\x02";
								$dirstr .= "\x00\x00";
								$dirstr .= "\x14\x00";
								$dirstr .= "\x00\x00";
								$dirstr .= "\x08\x00";
								$dirstr .= $hexdtime;
								$dirstr .= pack( "V", $crc );
								$dirstr .= pack( "V", $c_len );
								$dirstr .= pack( "V", $unc_len );
								$dirstr .= pack( "v", strlen( $name ) );
								$dirstr .= pack( "v", 0 );
								$dirstr .= pack( "v", 0 );
								$dirstr .= pack( "v", 0 );
								$dirstr .= pack( "v", 0 );
								$dirstr .= pack( "V", 32 );
								$dirstr .= pack( "V", $this->datastr_len );
								$dirstr .= $name;
								$this->dirstr .= $dirstr;
								$this->file_count++;
								$this->dirstr_len += strlen( $dirstr );
								$this->datastr_len += $my_datastr_len;
				}

				public function adddir( $name )
				{
								$name = str_replace( "\\", "/", $name );
								$datastr = "PK\x03\x04\n\x00\x00\x00\x00\x00\x00\x00\x00\x00";
								$datastr .= pack( "V", 0 ).pack( "V", 0 ).pack( "V", 0 ).pack( "v", strlen( $name ) );
								$datastr .= pack( "v", 0 ).$name.pack( "V", 0 ).pack( "V", 0 ).pack( "V", 0 );
								fwrite( $this->fp, $datastr );
								$my_datastr_len = strlen( $datastr );
								unset( $datastr );
								$dirstr = "PK\x01\x02\x00\x00\n\x00\x00\x00\x00\x00\x00\x00\x00\x00";
								$dirstr .= pack( "V", 0 ).pack( "V", 0 ).pack( "V", 0 ).pack( "v", strlen( $name ) );
								$dirstr .= pack( "v", 0 ).pack( "v", 0 ).pack( "v", 0 ).pack( "v", 0 );
								$dirstr .= pack( "V", 16 ).pack( "V", $this->datastr_len ).$name;
								$this->dirstr .= $dirstr;
								$this->file_count++;
								$this->dirstr_len += strlen( $dirstr );
								$this->datastr_len += $my_datastr_len;
				}

				public function createfile( )
				{
								$endstr = "PK\x05\x06\x00\x00\x00\x00".pack( "v", $this->file_count ).pack( "v", $this->file_count ).pack( "V", $this->dirstr_len ).pack( "V", $this->datastr_len )."\x00\x00";
								fwrite( $this->fp, $this->dirstr.$endstr );
								fclose( $this->fp );
				}

				public function listfiles( $dir = "." )
				{
								$sub_file_num = 0;
								if ( is_file( "{$dir}" ) )
								{
												if ( realpath( $this->gzfilename ) != realpath( "{$dir}" ) )
												{
																$this->addfile( implode( "", file( "{$dir}" ) ), "{$dir}" );
																return 1;
												}
												else
												{
																return 0;
												}
								}
								$handle = opendir( "{$dir}" );
								while ( $file = readdir( $handle ) )
								{
												if ( $file == "." || $file == ".." )
												{
																continue;
												}
												if ( is_dir( "{$dir}/{$file}" ) )
												{
																$sub_file_num += $this->listfiles( "{$dir}/{$file}" );
												}
												else if ( realpath( $this->gzfilename ) != realpath( "{$dir}/{$file}" ) )
												{
																$dir = str_replace( "\\", "/", $dir );
																$tmp = explode( "/", $dir );
																$tmp = array_reverse( $tmp );
																array_pop( $tmp );
																$tmp = array_reverse( $tmp );
																$dir1 = implode( "/", $tmp );
																$dst = "";
																if ( $dir1 == "" )
																{
																				$dst = $file;
																}
																else
																{
																				$dst = $dir1."/".$file;
																}
																$this->addfile( implode( "", file( "{$dir}/{$file}" ) ), $dst );
																$sub_file_num++;
												}
								}
								closedir( $handle );
								if ( !$sub_file_num )
								{
												$this->addfile( "", "{$dir}/" );
								}
								return $sub_file_num;
				}

				public function create_archive( $zipname, $dfile = array( ) )
				{
								if ( is_array( $dfile ) )
								{
												if ( $this->startfile( $zipname ) )
												{
																$filenum = 0;
																foreach ( $dfile as $file )
																{
																				if ( is_file( $file ) )
																				{
																								echo "нд╪Ч: {$file}<br/>";
																				}
																				else
																				{
																								echo "д©б╪: {$file}<br/>";
																				}
																				$filenum += $this->listfiles( $file );
																}
																$this->createfile( );
																return $filenum;
												}
												else
												{
																return -1;
												}
								}
								else
								{
												return -2;
								}
				}

}

?>
