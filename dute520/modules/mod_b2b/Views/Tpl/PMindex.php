<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"platform" => array( "width" => "50", "headHtml" => "<b>平台</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\">{#ComeFrom(\$item['comefrom'])}</a>", "str" => "UB_B2B+UB_YKT+UB_B2C>1" ),
				"title" => array( "width" => "200", "headHtml" => "<b>标题</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=PM&a=Detail&id={\$item['id']}\" ><!--if(\$item['isreaded'] == 1){--><font color=\"#cccccc\">{\$item['title']}</font><!--}else{-->{\$item['title']}<!--}--></a></nobr>" ),
				"isreaded" => array( "width" => "35", "headHtml" => "<b>状态</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&isreaded={\$item['isreaded']}&by=1\" ><!--if(\$item['isreaded'] == 1){--><font color=\"#cccccc\">已读</font><!--}else{-->未读<!--}--></a>" ),
				"msgto" => array( "width" => "85", "headHtml" => "<b>收信人</b>", "bodyHtml" => "<!--if(\$item['msgto'] == 999999){--><font color=\"#0099cc\"><!--if(\$item['msgcc'] == 'allunderling'){-->所有直属下家<!--}--><!--if(\$item['msgcc'] == 'all'){-->所有经销商<!--}--></font><!--}else{--><!--if(\$item['msgto'] < 0){--><font color=\"#ff00ff\">员工({#DisplayCode((0-\$item['msgto']),2)})</font><!--}else{--><font color=\"#ff0000\">{#DisplayCode(\$item['msgto'],4)}</font><!--}--><!--}-->" ),
				"msgfrom" => array( "width" => "80", "headHtml" => "<b>发信人</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&msgfrom={\$item['msgfrom']}&by=1\"><!--if(\$item['msgfrom'] < 0){--><font color=\"#ff00ff\">员工({#DisplayCode((0-\$item['msgfrom']),2)})</font><!--}else{--><font color=\"#ff0000\">{#DisplayCode(\$item['msgfrom'],4)}</font><!--}--></a>" ),
				"msgtype" => array( "width" => "70", "headHtml" => "<b>短信类型</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&msgtype={\$item['msgtype']}&by=1\">{\$vd['tarray'][\$item['msgtype']]}</a>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>发信时间</b>", "bodyHtml" => "{\$item['createdate']}" )
);
?>
