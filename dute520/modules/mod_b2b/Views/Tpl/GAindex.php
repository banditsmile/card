<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "<b>编号</b>", "bodyHtml" => "{\$item['id']}" ),
				"tname" => array( "width" => "70", "headHtml" => "<b>模板名称</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['name']}\">{\$item['name']}</samp></nobr>" ),
				"tct" => array( "width" => "60", "headHtml" => "<b>自定义1</b>", "bodyHtml" => "<!--echo \$item1['customtype1'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">无定义</font>' : '<font color=\"#0000ff\">有定义</font>';--> " ),
				"tat" => array( "width" => "60", "headHtml" => "<b>自定义2</b>", "bodyHtml" => "<!--echo \$item1['customtype2'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">无定义</font>' : '<font color=\"#0000ff\">有定义</font>';--> " ),
				"tpwd" => array( "width" => "60", "headHtml" => "<b>自定义3</b>", "bodyHtml" => "<!--echo \$item1['customtype3'] == 'none' || \$item1['customtype1'] == '' ? '<font color=\"#cccccc\">无定义</font>' : '<font color=\"#0000ff\">有定义</font>';--> " ),
				"tarea" => array( "width" => "60", "headHtml" => "<b>区域</b>", "bodyHtml" => "{#AreaDisp(\$item['areadisp'])}" ),
				"tdarea" => array( "width" => "70", "headHtml" => "<b>定义区域</b>", "bodyHtml" => "<!--echo \$item['tpl'] > 0 ? '[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id='.\$item['tpl'].'\">自定义..</a></font>]' : '[<font color=\"#cccccc\">无定义..</font>]';-->" ),
				"tserv" => array( "width" => "60", "headHtml" => "<b>服务器</b>", "bodyHtml" => "{#ServDisp(\$item['servdisp'])}" ),
				"tdserv" => array( "width" => "80", "headHtml" => "<b>定义服务器</b>", "bodyHtml" => "<!--echo \$item['tpl'] > 0 ? '[<font color=\"#3399cc\"><a href=\"index.php?m=mod_b2b&c=area&id='.\$item['tpl'].'\">自定义..</a></font>]' : '[<font color=\"#cccccc\">无定义..</font>]';-->" ),
				"tshared" => array( "width" => "40", "headHtml" => "<b>共享</b>", "bodyHtml" => "{#Shared(\$item['shared'])}" )
);
?>
