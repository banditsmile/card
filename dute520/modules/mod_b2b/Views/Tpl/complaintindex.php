<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"other" => array( "width" => "120", "headHtml" => "<b>类型或问题</b>", "bodyHtml" => "{\$item['other']}" ),
				"hope" => array( "width" => "120", "headHtml" => "<b>措施</b>", "bodyHtml" => "{\$item['hope']}" ),
				"tmstate" => array( "width" => "120", "headHtml" => "<b>处理状态</b>", "bodyHtml" => "{\$vd['mstate'][\$item['msgstate']]}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>订单号</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Order&a=Detail&ubzordno={\$item['ordno']}\">{\$item['ordno']}</a>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>投诉时间</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"msgto" => array( "width" => "80", "headHtml" => "<b>被投诉人</b>", "bodyHtml" => "<!--if(\$item['msgto'] == 0){--><font color=\"#ff0000\">系统</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgto'],4)}</font><!--}-->" ),
				"msgfrom" => array( "width" => "80", "headHtml" => "<b>投诉人</b>", "bodyHtml" => "<!--if(\$item['msgfrom'] == 0){--><font color=\"#ff0000\">系统</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgfrom'],4)}</font><!--}-->" )
);
?>
