<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['cid']}\" onFocus=\"this.blur()\">" ),
				"tmsgfrom" => array( "width" => "70", "headHtml" => "<b>发信人</b>", "bodyHtml" => "{\$item['ubzmfrom']}" ),
				"tmsgto" => array( "width" => "70", "headHtml" => "<b>收信人</b>", "bodyHtml" => "<!--if(\$item['ubzmto']==0){-->进货商<!--}else{-->{\$item['ubzmto']}<!--}-->" ),
				"isreaded" => array( "width" => "35", "headHtml" => "<b>状态</b>", "bodyHtml" => "<!--if(\$item['ubzisreaded'] == 0){--><font color=\"#ff00ff\">未读</font><!--}else{--><font color=\"#cccccc\">已读</font><!--}-->" ),
				"title" => array( "width" => "450", "headHtml" => "<b>标题</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=msg&a=detail&ubzid={\$item['ubzid']}&optype={\$vd['optype']}\"><!--if(\$item['ubzisreaded'] == 0){--><font color=\"#00875A\">{\$item['ubzmtitle']}</font><!--}else{--><font color=\"#cccccc\">{\$item['ubzmtitle']}</font><!--}--></a></nobr>" ),
				"mtype" => array( "width" => "70", "headHtml" => "<b>短信类型</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=Msg&mtype={\$item['ubzmtype']}&optype={\$vd['optype']}&ubzisreaded=2\">{\$vd['tarray'][\$item['ubzmtype']]}</a></nobr>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>发信时间</b>", "bodyHtml" => "{\$item['ubzmdate']}" )
);
?>
