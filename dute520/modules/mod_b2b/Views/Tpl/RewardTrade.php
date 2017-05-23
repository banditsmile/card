<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"otherside" => array( "width" => "50", "headHtml" => "<b>交易方</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=otherside&keywords={\$item['otherside']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['otherside'])}</font></a>" ),
				"ordno" => array( "width" => "150", "headHtml" => "<!--\$ordno=1;--><b>订单号</b>", "bodyHtml" => "<!--\$ordno=1;--><!--if(\$item['tradetype'] == 99){--><font color=\"#2e2e2e\">{\$item['ordno']}</font><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}-->" ),
				"view" => array( "width" => "22", "headHtml" => "<!--\$view=1;--><img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--\$view=1;--><!--if(\$item['tradetype'] == 99 || \$item['tradetype'] == 101){--><font color=\"#2e2e2e\">无</font><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}-->" ),
				"orddate" => array( "width" => "140", "headHtml" => "<!--\$orddate=1;--><b>交易时间</b>", "bodyHtml" => "<!--\$orddate=1;-->{\$item['createdate']}" ),
				"ttradetype" => array( "width" => "180", "headHtml" => "<b>交易类型</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=trade&tradetype={\$item['tradetype']}&by=1&tpl=<!--echo \$item['tradetype']==11 ? 'agentorderprofit' : (request('tpl')=='ykt'||\$item['tradetype']==101|\$item['tradetype']==100 ? 'ykt' : 'agent');-->\">{#TxtByOption(\$vd['tradetypes'],\$item['tradetype'])}</a></nobr>" ),
				"price" => array( "width" => "80", "headHtml" => "<b>用户进价</b>", "bodyHtml" => "{\$item['price']}" ),
				"operator" => array( "width" => "100", "headHtml" => "<b>操作员</b>", "bodyHtml" => "<!--if(\$item['operator']==0||\$item['operator']==''){--><font color=\"#ff0000\">系统</font><!--}else if(is_numeric(\$item['operator'])){-->商号(<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=operator&keywords={\$item['operator']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['operator'])}</font></a>)<!--}else{-->员工({\$item['operator']})<!--}-->" ),
				"listprice" => array( "width" => "60", "headHtml" => "<b>下家购价</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"qty" => array( "width" => "50", "headHtml" => "<b>购买量</b>", "bodyHtml" => "{\$item['qty']}" ),
				"fbt" => array( "width" => "100", "headHtml" => "<b>交易前</b>", "bodyHtml" => "{\$item['fbt']}" ),
				"fat" => array( "width" => "100", "headHtml" => "<b>交易后</b>", "bodyHtml" => "{\$item['fat']}" ),
				"state" => array( "width" => "35", "headHtml" => "<b>状态</b>", "bodyHtml" => "<!--if(\$item['state'] > 0){--><font color=\"#0000ff\">有效</font><!--}else{--><font color=\"#cccccc\">无效</font><!--}-->" ),
				"expend" => array( "width" => "100", "headHtml" => "<b>支出</b>", "bodyHtml" => "{\$item['outcome']}" ),
				"remarks" => array( "width" => "280", "headHtml" => "<b>说明</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['content']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['content']}</samp></nobr>" ),
				"tyktnumber" => array( "width" => "150", "headHtml" => "<b>一卡通卡号</b>", "bodyHtml" => "{\$item['yktnumber']}" ),
				"tbindaid" => array( "width" => "70", "headHtml" => "<!--\$tbindaid=1;--><b>经销商ID</b>", "bodyHtml" => "<!--\$tbindaid=1;-->{\$item['bindaid']}" ),
				"treward" => array( "width" => "100", "headHtml" => "<!--\$treward=1;--><b>应返点</b>", "bodyHtml" => "<!--\$treward=1;-->{\$item['reward']}" ),
				"trealreward" => array( "width" => "100", "headHtml" => "<!--\$trealreward=1;--><b>实返点</b>", "bodyHtml" => "<!--\$trealreward=1;-->{\$item['realreward']}" ),
				"tcheckout" => array( "width" => "70", "headHtml" => "<!--\$tcheckout=1;--><b>已结算</b>", "bodyHtml" => "<!--\$tcheckout=1;--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checkout'])}\"  onFocus=\"this.blur()\" />" ),
				"tcheckoutdate" => array( "width" => "140", "headHtml" => "<!--\$tcheckoutdate=1;--><b>返点日期</b>", "bodyHtml" => "<!--\$tcheckoutdate=1;-->{\$item['checkoutdate']}" ),
				"income" => array( "width" => "100", "headHtml" => "<!--\$income=1;--><!--\$income=1;--><b>消耗金额</b>", "bodyHtml" => "<!--\$income=1;-->{\$item['outcome']}" )
);
?>
