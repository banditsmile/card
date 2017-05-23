<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function rsa_encrypt( $R157a6826a8, $Rf74656060d, $Rdf9685d478, $R3bf3684aa9 )
{
				$R078370db1a = add_pkcs1_padding( $R157a6826a8, true, $R3bf3684aa9 / 8 );
				$Re4b4ce96bb = binary_to_number( $R078370db1a );
				$R98e08e1600 = pow_mod( $Re4b4ce96bb, $Rf74656060d, $Rdf9685d478 );
				$R679e9b9234 = number_to_binary( $R98e08e1600, $R3bf3684aa9 / 8 );
				return $R679e9b9234;
}

function rsa_decrypt( $R157a6826a8, $Ra72a3efb19, $Rdf9685d478, $R3bf3684aa9 )
{
				$Re4b4ce96bb = binary_to_number( $R157a6826a8 );
				$Rc4bc4243cf = pow_mod( $Re4b4ce96bb, $Ra72a3efb19, $Rdf9685d478 );
				$R679e9b9234 = number_to_binary( $Rc4bc4243cf, $R3bf3684aa9 / 8 );
				return remove_pkcs1_padding( $R679e9b9234, $R3bf3684aa9 / 8 );
}

function rsa_sign( $R157a6826a8, $Ra72a3efb19, $Rdf9685d478, $R3bf3684aa9 )
{
				$R078370db1a = add_pkcs1_padding( $R157a6826a8, false, $R3bf3684aa9 / 8 );
				$Re4b4ce96bb = binary_to_number( $R078370db1a );
				$R1e41990668 = pow_mod( $Re4b4ce96bb, $Ra72a3efb19, $Rdf9685d478 );
				$R679e9b9234 = number_to_binary( $R1e41990668, $R3bf3684aa9 / 8 );
				return $R679e9b9234;
}

function rsa_verify( $R157a6826a8, $Rf74656060d, $Rdf9685d478, $R3bf3684aa9 )
{
				return rsa_decrypt( $R157a6826a8, $Rf74656060d, $Rdf9685d478, $R3bf3684aa9 );
}

function pow_mod( $R2a039ed8fd, $Reb6af5b4e5, $Raa7bb4b05f )
{
				$Rb32e523208 = array( );
				$R1444632b26 = $Reb6af5b4e5;
				$Rebb8da8f87 = 0;
				while ( bccomp( $R1444632b26, "0" ) == BCCOMP_LARGER )
				{
								$R0322fb4190 = bcmod( $R1444632b26, 2 );
								$R1444632b26 = bcdiv( $R1444632b26, 2 );
								if ( $R0322fb4190 )
								{
												array_push( $Rb32e523208, $Rebb8da8f87 );
								}
								$Rebb8da8f87++;
				}
				$R5fd2441eae = array( );
				$R07c3885e2a = $R2a039ed8fd;
				$R5b92e56774 = 0;
				foreach ( $Rb32e523208 as $Rf4126cf882 )
				{
								while ( $R5b92e56774 < $Rf4126cf882 )
								{
												$R07c3885e2a = bcpow( $R07c3885e2a, "2" );
												$R07c3885e2a = bcmod( $R07c3885e2a, $Raa7bb4b05f );
												$R5b92e56774++;
								}
								array_pus( $R5fd2441eae, $R07c3885e2a );
				}
				$R679e9b9234 = "1";
				foreach ( $R5fd2441eae as $R07c3885e2a )
				{
								$R679e9b9234 = bcmul( $R679e9b9234, $R07c3885e2a );
								$R679e9b9234 = bcmod( $R679e9b9234, $Raa7bb4b05f );
				}
				return $R679e9b9234;
}

function add_PKCS1_padding( $data, $R8fc2456f62, $R53d9edbf88 )
{
				$R75b4687d21 = $R53d9edbf88 - 3 - strlen( $data );
				if ( $R8fc2456f62 )
				{
								$R8e23310202 = "\x02";
								$R2958dee177 = "";
								
								for ( $Ra16d228039 = 0;	$Ra16d228039 < $R75b4687d21;	$Ra16d228039++	)
								{
												$Rc87d4bee3e = mt_rand( 1, 255 );
												$R2958dee177 .= chr( $Rc87d4bee3e );
								}
				}
				else
				{
								$R8e23310202 = "\x01";
								$R2958dee177 = str_repeat( "\xFF", $R75b4687d21 );
				}
				return "\x00".$R8e23310202.$R2958dee177."\x00".$data;
}

function remove_PKCS1_padding( $data, $R53d9edbf88 )
{
				assert( strlen( $data ) == $R53d9edbf88 );
				$data = substr( $data, 1 );
				if ( $data[0] == "\\0" )
				{
								exit( "Block type 0 not implemented." );
				}
				assert( $data[0] == "\x01" || $data[0] == "\x02" );
				$R21d2ff6532 = strpos( $data, "\x00", 1 );
				return substr( $data, $R21d2ff6532 + 1 );
}

function binary_to_number( $data )
{
				$Rbe8ebfe026 = "256";
				$R2521c56f0b = "1";
				$R679e9b9234 = "0";
				$Ra16d228039 = strlen( $data ) - 1;
				for ( ;	0 <= $Ra16d228039;	--$Ra16d228039	)
				{
								$R27f1bf6595 = ord( $data[$Ra16d228039] );
								$R07c3885e2a = bcmul( $R27f1bf6595, $R2521c56f0b );
								$R679e9b9234 = bcadd( $R679e9b9234, $R07c3885e2a );
								$R2521c56f0b = bcmul( $R2521c56f0b, $Rbe8ebfe026 );
				}
				return $R679e9b9234;
}

function number_to_binary( $Re4b4ce96bb, $R53d9edbf88 )
{
				$Rbe8ebfe026 = "256";
				$R679e9b9234 = "";
				$R1444632b26 = $Re4b4ce96bb;
				while ( 0 < $R1444632b26 )
				{
								$Rb1e236a47d = bcmod( $R1444632b26, $Rbe8ebfe026 );
								$R1444632b26 = bcdiv( $R1444632b26, $Rbe8ebfe026 );
								$R679e9b9234 = chr( $Rb1e236a47d ).$R679e9b9234;
				}
				return str_pad( $R679e9b9234, $R53d9edbf88, "\x00", STR_PAD_LEFT );
}

define( "BCCOMP_LARGER", 1 );
?>
