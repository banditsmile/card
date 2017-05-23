<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "120", "headHtml" => "<b>兑换者</b>", "bodyHtml" => "<!--if(\$item['staffid'] > 0){-->{#DisplayCode(\$item['aid'])}员工({#DisplayCode(\$item['staffid'])})<!--}else{-->经销商({#DisplayCode(\$item['aid'])})<!--}-->" ),
				"pname" => array( "width" => "160", "headHtml" => "<b>内容</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"admname" => array( "width" => "70", "headHtml" => "<b>操作者</b>", "bodyHtml" => "<!--if(\$item['admname'] !=  ''){--><font color=\"#0000ff\">{\$item['admname']}</font><!--}else{-->系统<!--}-->" ),
				"qty" => array( "width" => "40", "headHtml" => "<b>数量</b>", "bodyHtml" => "{\$item['qty']}" ),
				"scored" => array( "width" => "80", "headHtml" => "支付积分", "bodyHtml" => "<!--if(\$item['fbt'] < \$item['fat']){--> + <!--}else{--> - <!--}-->{\$item['scored']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "订单号", "bodyHtml" => "{\$item['ordno']}" ),
				"ordstate" => array( "width" => "80", "headHtml" => "兑换状态", "bodyHtml" => "<!--if(\$item['ordstate']==1){--><font color=\"#0000ff\">处理中</font><!--}else if(\$item['ordstate']==-1){--><font color=\"#cccccc\">无效</font><!--}else{--><font color=\"#008800\">已处理</font><!--}-->" ),
				"cdate" => array( "width" => "150", "headHtml" => "兑换时间", "bodyHtml" => "{\$item['createdate']}" ),
				"fbt" => array( "width" => "80", "headHtml" => "兑换前", "bodyHtml" => "{\$item['fbt']}" ),
				"fat" => array( "width" => "80", "headHtml" => "兑换后", "bodyHtml" => "{\$item['fat']}" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Scored&a=detail&ubzordno={\$item['ordno']}\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" )
);
?>
