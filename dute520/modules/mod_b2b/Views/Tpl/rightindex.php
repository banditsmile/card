<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tpids" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">商品编号</span>(编号前后要有半角的逗号)", "bodyHtml" => "<nobr><samp title=\"{\$item['pids']}\"><span onclick=\"toInput(this,{\$item['id']},'pids')\">{\$item['pids']}</span></samp></nobr>" ),
				"tidx" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">参数值</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'idx')\">{\$item['idx']}</span>" ),
				"tparam" => array( "width" => "150", "headHtml" => "<b>参数类型</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Right&stype=param&keywords={\$item['param']}\">{#TxtByOption(\$vd['params'],\$item['param'])}</a>" ),
				"tisok" => array( "width" => "60", "headHtml" => "<b>权限</b>", "bodyHtml" => "<!--if(\$item['isok'] == 1){--><a href=\"index.php?m=mod_b2b&c=Right&stype=isok&keywords={\$item['isok']}\" title=\"点击查看对应状态卡密\"><font color=\"#008800\">允许</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Right&stype=isok&keywords={\$item['isok']}\" title=\"点击查看对应状态卡密\"><font color=\"#ff0000\">不允许</font></a><!--}-->" )
);
?>
