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
class scategory extends sqlservice
{

				public function __construct( )
				{
								parent::__construct( );
				}

				public function &ICategory_Page( $data = array( ) )
				{
								$this->IUmebiz_Event( 12, $data );
								if ( $data['optype'] == 1 )
								{
												$this->buffer = preg_replace( "/\\<dept1\\>/s", "<item>", $this->buffer );
												$this->buffer = preg_replace( "/\\<\\/dept1\\>/s", "</item>\n\r", $this->buffer );
								}
								else
								{
												$this->buffer = preg_replace( "/\\<dept2\\>/s", "<item>", $this->buffer );
												$this->buffer = preg_replace( "/\\<\\/dept2\\>/s", "</item>\n\r", $this->buffer );
								}
								$R3db8f5c8bc = $this->IUmebiz_Page( );
								return $R3db8f5c8bc;
				}

				public function ICategory_Save( $data = array( ) )
				{
								$this->IUmebiz_Event( 12, $data );
								$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "globe", 0 );
								return $R3db8f5c8bc[0]['ubzgdid2'];
				}

				public function &ICategory_Get( $Rac9b8532b8 = -1 )
				{
								$this->reset( );
								$this->add( "action", "catall" );
								$this->url = "admin/ubz_cat";
								if ( -1 < $Rac9b8532b8 )
								{
												$this->buf( );
												$this->IUmebiz_Read( );
												$this->buffer = preg_replace( "/\\<ubzdname\\>/s", "<catname>", $this->buffer );
												$this->buffer = preg_replace( "/\\<\\/ubzdname\\>/s", "</catname>\n\r", $this->buffer );
												$this->buffer = preg_replace( "/\\<ubzdid1\\>/s", "<parentid>", $this->buffer );
												$this->buffer = preg_replace( "/\\<\\/ubzdid1\\>/s", "</parentid>\n\r", $this->buffer );
												$this->buffer = preg_replace( "/\\<ubzdid\\>/s", "<catid>", $this->buffer );
												$this->buffer = preg_replace( "/\\<\\/ubzdid\\>/s", "</catid>\n\r", $this->buffer );
								}
								if ( -1 < $Rac9b8532b8 )
								{
												$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "dept1", 0 );
								}
								else
								{
												$R3db8f5c8bc = $this->IUmebiz_GetData( $this->buffer, "dept2", 0 );
								}
								$R808b89ba0e = array( );
								foreach ( $R3db8f5c8bc as $R0f8134fb60 )
								{
												if ( $Rac9b8532b8 == -1 )
												{
																$Rc907011f93 = $R0f8134fb60['catname'];
																$Rc907011f93 = str_replace( "(", "/", $Rc907011f93 );
																$Rc907011f93 = str_replace( ")", "", $Rc907011f93 );
																$R8eeb1221ae = explode( "/", $Rc907011f93 );
																$Ra16d228039 = 0;
																for ( ;	$Ra16d228039 < count( $R8eeb1221ae );	++$Ra16d228039	)
																{
																				$R0f8134fb60['catname'] = $R8eeb1221ae[$Ra16d228039];
																				$R808b89ba0e[] = $R0f8134fb60;
																}
												}
												else
												{
																$R808b89ba0e[] = $R0f8134fb60;
												}
								}
								return $R808b89ba0e;
				}

}

?>
