<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "50", "headHtml" => "<b>用户</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&by=1&stype=aid&keywords={\$item['aid']}&tpl=<!--echo getVar('tpl');-->&tradetype=<!--echo getVar('tradetype');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>" ),
				"otherside" => array( "width" => "50", "headHtml" => "<b>交易方</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=otherside&keywords={\$item['otherside']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['otherside'])}</font></a>" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>订单号</b>", "bodyHtml" => "<!--if(\$item['tradetype'] == 1 || \$item['tradetype'] == 11 || \$item['tradetype'] == 12){--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}else if(\$item['tradetype'] == 2 || \$item['tradetype'] == 99){--><a href=\"index.php?m=mod_b2b&c=Funds&by=1&keywords={\$item['ordno']}&stype=ordno\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}else{--><font color=\"#2e2e2e\">{\$item['ordno']}</font><!--}-->" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--if(\$item['tradetype'] == 1 || \$item['tradetype'] == 11 || \$item['tradetype'] == 12){--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else if(\$item['tradetype'] == 2 || \$item['tradetype'] == 99){--><a href=\"index.php?m=mod_b2b&c=Funds&by=1&keywords={\$item['ordno']}&stype=ordno\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else{--><font color=\"#cccccc\">无</font><!--}-->" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>交易时间</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"ttradetype" => array( "width" => "180", "headHtml" => "<b>交易类型</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=trade&tradetype={\$item['tradetype']}&by=1&tpl=<!--echo \$item['tradetype']==11 ? 'agentorderprofit' : (request('tpl')=='ykt'||\$item['tradetype']==101|\$item['tradetype']==100 ? 'ykt' : 'agent');-->\">{#TxtByOption(\$vd['tradetypes'],\$item['tradetype'])}</a></nobr>" ),
				"price" => array( "width" => "80", "headHtml" => "<b>用户进价</b>", "bodyHtml" => "{\$item['price']}" ),
				"operator" => array( "width" => "100", "headHtml" => "<b>操作员</b>", "bodyHtml" => "<!--if(\$item['operator']==0||\$item['operator']==''){--><font color=\"#ff0000\">系统</font><!--}else if(is_numeric(\$item['operator'])){-->商号(<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=operator&keywords={\$item['operator']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['operator'])}</font></a>)<!--}else{-->员工({\$item['operator']})<!--}-->" ),
				"listprice" => array( "width" => "60", "headHtml" => "<b>下家购价</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"qty" => array( "width" => "50", "headHtml" => "<b>购买量</b>", "bodyHtml" => "{\$item['qty']}" ),
				"fbt" => array( "width" => "100", "headHtml" => "<b>交易前</b>", "bodyHtml" => "{\$item['fbt']}" ),
				"fat" => array( "width" => "100", "headHtml" => "<b>交易后</b>", "bodyHtml" => "{\$item['fat']}" ),
				"state" => array( "width" => "35", "headHtml" => "<b>状态</b>", "bodyHtml" => "<!--if(\$item['state'] > 0){--><font color=\"#0000ff\">有效</font><!--}else{--><font color=\"#cccccc\">无效</font><!--}-->" ),
				"expend" => array( "width" => "100", "headHtml" => "<b>支出</b>", "bodyHtml" => "{\$item['outcome']}" ),
				"income" => array( "width" => "100", "headHtml" => "<b>收入</b>", "bodyHtml" => "{\$item['income']}" ),
				"remarks" => array( "width" => "280", "headHtml" => "<b>说明</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['content']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['content']}</samp></nobr>" )
);
?>
