<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function PCardsPtype( $R1b69c92460, $R8e8b5578f7 )
{
				if ( $R1b69c92460 == 0 || $R1b69c92460 == 100 || $R1b69c92460 == 101 || $R1b69c92460 == 3 )
				{
								if ( $R1b69c92460 == 100 || $R1b69c92460 == 101 )
								{
												echo "<a href='index.php?m=mod_b2b&c=ykt&a=add&ubzpid=".$R8e8b5578f7."'><span class='ltxt'>����</span></a>".""."<a href='index.php?m=mod_b2b&c=ykt&ubzpid=".$R8e8b5578f7."&by=1'><span class='rtxt'>�༭</span></a>";
								}
								else
								{
												echo "<a href='index.php?m=mod_b2b&c=card&a=add&ubzpid=".$R8e8b5578f7."'><span class='ltxt'>����</span></a>".""."<a href='index.php?m=mod_b2b&c=card&ubzpid=".$R8e8b5578f7."&by=1'><span class='rtxt'>�༭</span></a>";
								}
				}
				else if ( $R1b69c92460 == 1 )
				{
								echo "<a href=\"index.php?m=mod_b2b&c=esales&a=add&ubzpid=".$R8e8b5578f7."\" title=\"��ֱ���ʺ�\"><font color=\"#ff00ff\">ֱ���ʺ�</font></a>";
				}
				else
				{
								echo "<font color=\"#6c6c6c\">������</font>";
				}
}

function ProductType( $R1b69c92460 )
{
				switch ( $R1b69c92460 )
				{
				case 0 :
								echo "<font color='#0000ff'>������Ʒ</font>";
								break;
				case 1 :
								echo "<font color='#ff00ff'>�Զ���ֵ</font>";
								break;
				case 2 :
								echo "<font color='#7200C3'>������Ʒ</font>";
								break;
				case 3 :
								echo "������";
								break;
				case 4 :
								echo "�����";
								break;
				case 5 :
								echo "װ����";
								break;
				case 6 :
								echo "������";
								break;
				case 100 :
				case 101 :
								echo "<font color='#ff6c00'>һ��ͨ</font>";
								break;
				default :
								echo "������Ʒ";
								break;
				}
}

function ProductType2( $R1b69c92460 )
{
				switch ( $R1b69c92460 )
				{
				case 0 :
								echo "<font color='#0000ff'>����</font>";
								break;
				case 1 :
								echo "<font color='#ff00ff'>�Զ�</font>";
								break;
				case 2 :
								echo "<font color='#7200C3'>����</font>";
								break;
				case 3 :
								echo "����";
								break;
				case 4 :
								echo "���";
								break;
				case 5 :
								echo "װ��";
								break;
				case 6 :
								echo "����";
								break;
				case 100 :
				case 101 :
								echo "<font color='#ff6c00'>ƽ̨</font>";
								break;
				default :
								echo "����";
								break;
				}
}

function ProductTypeByText( $Rc6ae9fc711 )
{
				switch ( $Rc6ae9fc711 )
				{
				case "������Ʒ" :
								echo "<font color='#0000ff'>������Ʒ</font>";
								break;
				case "�Զ���ֵ" :
								echo "<font color='#ff00ff'>�Զ���ֵ</font>";
								break;
				case "������Ʒ" :
								echo "<font color='#7200C3'>������Ʒ</font>";
								break;
				case "������" :
								echo "������";
								break;
				case "�����" :
								echo "�����";
								break;
				case "װ����" :
								echo "װ����";
								break;
				case "������" :
								echo "������";
								break;
				case "һ��ͨ" :
								echo "<font color='#ff6c00'>һ��ͨ</font>";
								break;
				default :
								echo "������Ʒ";
								break;
				}
}

function ProductTypeByStr( $R027a9ba355 )
{
				switch ( $R027a9ba355 )
				{
				case "������Ʒ" :
								echo "<font color='#0000ff'>������Ʒ</font>";
								break;
				case "�Զ���ֵ" :
								echo "<font color='#ff00ff'>�Զ���ֵ</font>";
								break;
				case "������Ʒ" :
								echo "<font color='#7200C3'>������Ʒ</font>";
								break;
				case "������" :
								echo "������";
								break;
				case "�����" :
								echo "�����";
								break;
				case "װ����" :
								echo "װ����";
								break;
				case "������" :
								echo "������";
								break;
				case "һ��ͨ" :
								echo "<font color='#ff6c00'>һ��ͨ</font>";
								break;
				default :
								echo "<font color='#0000ff'>������Ʒ</font>";
								break;
				}
}

function &ProductTypeList( )
{
				$data = array( "0" => "������Ʒ", "1" => "�Զ���ֵ", "2" => "������Ʒ", "3" => "������", "101" => "һ��ͨ��ֵר�ÿ�" );
				if ( UB_YKT )
				{
								$data['100'] = "һ��ͨ�һ�ר�ÿ�";
				}
				return $data;
}

function SupCheck( $R37c014dae5 )
{
				if ( $R37c014dae5 == 1 )
				{
								echo "<font color=\"#ff0000\">��Ҫ���</font>";
				}
				else
				{
								echo "<font color=\"#0000ff\">�������</font>";
				}
}

function StockState( $Rffcf9b81af, $R1b69c92460, $Rc79ae5b26d = 0, $R6e985b7f49 = 0, $R034ae2ab94 = 0 )
{
				$R63bede6b19 = "";
				if ( 0 < $Rffcf9b81af && ( $R1b69c92460 == 0 || $R1b69c92460 == 3 ) || 99 < $R1b69c92460 && 0 < $Rc79ae5b26d )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">������</font>";
				}
				else if ( 0 < $Rffcf9b81af && $R1b69c92460 == 1 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">������</font>";
				}
				else if ( $R1b69c92460 == 2 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">������</font>";
				}
				else if ( 0 < $R6e985b7f49 && $R1b69c92460 == 6 )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">���Դ���</font>";
				}
				else if ( 0 < $R6e985b7f49 && ( $R1b69c92460 == 4 || $R1b69c92460 == 5 ) )
				{
								$R63bede6b19 = "<font color=\"#0000FF\">���Թ���</font>";
				}
				else
				{
								$R63bede6b19 = "<font color=\"#ff0000\">��治��</font>";
				}
				if ( $R034ae2ab94 )
				{
								return $R63bede6b19;
				}
				else
				{
								echo $R63bede6b19;
				}
}

function GetMyPrice( $R899b1291e4, $R4f39743f74, $R70d903936c, $Red2b3403a5 = 10000 )
{
				if ( $R899b1291e4 == "" && $R4f39743f74 == "" && $R70d903936c == "" )
				{
								echo $Red2b3403a5;
				}
				else if ( $R70d903936c == "" && $R4f39743f74 == "" )
				{
								echo $R899b1291e4;
				}
				else if ( $R70d903936c == "" && $R4f39743f74 != "" )
				{
								echo $R4f39743f74;
				}
				else if ( $R70d903936c != "" )
				{
								echo $R70d903936c;
				}
}

function ProductStock( $R244f38266c )
{
				$R6ef86fd07c = intval( $R244f38266c );
				if ( $R6ef86fd07c == 0 )
				{
								return "<font color=\"#ff0000\">ȱ��</font>";
				}
				if ( 0 < $R6ef86fd07c && $R6ef86fd07c < 20 )
				{
								return "������";
				}
				if ( 20 <= $R6ef86fd07c && $R6ef86fd07c < 50 )
				{
								return "��";
				}
				if ( 50 <= $R6ef86fd07c && $R6ef86fd07c < 100 )
				{
								return "�Ƚ϶�";
				}
				if ( 100 <= $R6ef86fd07c && $R6ef86fd07c < 500 )
				{
								return "�ܶ�";
				}
				if ( 500 <= $R6ef86fd07c )
				{
								return "������";
				}
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
