<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "50", "headHtml" => "<b>�û�</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&by=1&stype=aid&keywords={\$item['aid']}&tpl=<!--echo getVar('tpl');-->&tradetype=<!--echo getVar('tradetype');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>" ),
				"otherside" => array( "width" => "50", "headHtml" => "<b>���׷�</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=otherside&keywords={\$item['otherside']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['otherside'])}</font></a>" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<!--if(\$item['tradetype'] == 1 || \$item['tradetype'] == 11 || \$item['tradetype'] == 12){--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}else if(\$item['tradetype'] == 2 || \$item['tradetype'] == 99){--><a href=\"index.php?m=mod_b2b&c=Funds&by=1&keywords={\$item['ordno']}&stype=ordno\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}else{--><font color=\"#2e2e2e\">{\$item['ordno']}</font><!--}-->" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--if(\$item['tradetype'] == 1 || \$item['tradetype'] == 11 || \$item['tradetype'] == 12){--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else if(\$item['tradetype'] == 2 || \$item['tradetype'] == 99){--><a href=\"index.php?m=mod_b2b&c=Funds&by=1&keywords={\$item['ordno']}&stype=ordno\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else{--><font color=\"#cccccc\">��</font><!--}-->" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>����ʱ��</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"ttradetype" => array( "width" => "180", "headHtml" => "<b>��������</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=trade&tradetype={\$item['tradetype']}&by=1&tpl=<!--echo \$item['tradetype']==11 ? 'agentorderprofit' : (request('tpl')=='ykt'||\$item['tradetype']==101|\$item['tradetype']==100 ? 'ykt' : 'agent');-->\">{#TxtByOption(\$vd['tradetypes'],\$item['tradetype'])}</a></nobr>" ),
				"price" => array( "width" => "80", "headHtml" => "<b>�û�����</b>", "bodyHtml" => "{\$item['price']}" ),
				"operator" => array( "width" => "100", "headHtml" => "<b>����Ա</b>", "bodyHtml" => "<!--if(\$item['operator']==0||\$item['operator']==''){--><font color=\"#ff0000\">ϵͳ</font><!--}else if(is_numeric(\$item['operator'])){-->�̺�(<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=operator&keywords={\$item['operator']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['operator'])}</font></a>)<!--}else{-->Ա��({\$item['operator']})<!--}-->" ),
				"listprice" => array( "width" => "60", "headHtml" => "<b>�¼ҹ���</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"qty" => array( "width" => "50", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['qty']}" ),
				"fbt" => array( "width" => "100", "headHtml" => "<b>����ǰ</b>", "bodyHtml" => "{\$item['fbt']}" ),
				"fat" => array( "width" => "100", "headHtml" => "<b>���׺�</b>", "bodyHtml" => "{\$item['fat']}" ),
				"state" => array( "width" => "35", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<!--if(\$item['state'] > 0){--><font color=\"#0000ff\">��Ч</font><!--}else{--><font color=\"#cccccc\">��Ч</font><!--}-->" ),
				"expend" => array( "width" => "100", "headHtml" => "<b>֧��</b>", "bodyHtml" => "{\$item['outcome']}" ),
				"income" => array( "width" => "100", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['income']}" ),
				"remarks" => array( "width" => "280", "headHtml" => "<b>˵��</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['content']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['content']}</samp></nobr>" )
);
?>
