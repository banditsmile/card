<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['id']}" ),
				"tname" => array( "width" => "70", "headHtml" => "<b>ģ������</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['name']}\">{\$item['name']}</samp></nobr>" ),
				"tct" => array( "width" => "60", "headHtml" => "<b>�Զ���1</b>", "bodyHtml" => "<!--echo \$item1['customtype1'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">�޶���</font>' : '<font color=\"#0000ff\">�ж���</font>';--> " ),
				"tat" => array( "width" => "60", "headHtml" => "<b>�Զ���2</b>", "bodyHtml" => "<!--echo \$item1['customtype2'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">�޶���</font>' : '<font color=\"#0000ff\">�ж���</font>';--> " ),
				"tpwd" => array( "width" => "60", "headHtml" => "<b>�Զ���3</b>", "bodyHtml" => "<!--echo \$item1['customtype3'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">�޶���</font>' : '<font color=\"#0000ff\">�ж���</font>';--> " ),
				"tarea" => array( "width" => "60", "headHtml" => "<b>����</b>", "bodyHtml" => "{#AreaDisp(\$item['areadisp'])}" ),
				"tdarea" => array( "width" => "70", "headHtml" => "<b>��������</b>", "bodyHtml" => "<!--echo \$item['tpl'] > 0 ? '[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id='.\$item['tpl'].'\">�Զ���..</a></font>]' : '[<font color=\"#cccccc\">�޶���..</font>]';-->" ),
				"tserv" => array( "width" => "60", "headHtml" => "<b>������</b>", "bodyHtml" => "{#ServDisp(\$item['servdisp'])}" ),
				"tdserv" => array( "width" => "80", "headHtml" => "<b>���������</b>", "bodyHtml" => "<!--echo \$item['tpl'] > 0 ? '[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id='.\$item['tpl'].'\">�Զ���..</a></font>]' : '[<font color=\"#cccccc\">�޶���..</font>]';-->" ),
				"tshared" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "{#Shared(\$item['shared'])}" )
);
?>
