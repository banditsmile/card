<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function CheckQty( $R8e8b5578f7, $R66b0d9d6f1 )
{
				$Rb3f07f8c36 = $this->hander->IProduct_Get( $R8e8b5578f7, $Re2a6348a52, "*", $R2a51483b14, $Rac9b8532b8 );
				$Rdc3f776eb3 = $Rb3f07f8c36['stocks'];
				if ( $Rb3f07f8c36['ptype'] == 100 || $Rb3f07f8c36['ptype'] == 101 )
				{
								$Rdc3f776eb3 = $Rb3f07f8c36['yktstocks'];
								if ( $Rdc3f776eb3 < $R66b0d9d6f1 )
								{
												$this->Alert( "库存不足！请您重新选择购买数量！" );
												$this->HistoryGo( );
								}
				}
				if ( $Rb3f07f8c36['mystocks'] < $R66b0d9d6f1 && ( $Rb3f07f8c36['ptype'] == 2 || $Rb3f07f8c36['ptype'] == 4 || $Rb3f07f8c36['ptype'] == 5 || $Rb3f07f8c36['ptype'] == 6 ) )
				{
								$this->Alert( "库存不足！请您重新选择购买数量！" );
								$this->HistoryGo( );
				}
				if ( ( $Rb3f07f8c36['ptype'] < 1 || $Rb3f07f8c36['ptype'] == 3 ) && $Rdc3f776eb3 < $R66b0d9d6f1 )
				{
								if ( UB_SUP == 1 && $Rb3f07f8c36['hassup'] == 1 )
								{
												$Rcdcb991232 = $this->GetStocks( $R8e8b5578f7 );
												if ( $Rcdcb991232 < $R66b0d9d6f1 )
												{
																$this->Alert( "库存不足！请您重新选择购买数量！" );
																$this->HistoryGo( );
												}
								}
								else
								{
												$this->Alert( "库存不足！请您重新选择购买数量！" );
												$this->HistoryGo( );
								}
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
