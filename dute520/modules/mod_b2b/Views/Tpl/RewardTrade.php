<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"otherside" => array( "width" => "50", "headHtml" => "<b>���׷�</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=otherside&keywords={\$item['otherside']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['otherside'])}</font></a>" ),
				"ordno" => array( "width" => "150", "headHtml" => "<!--\$ordno=1;--><b>������</b>", "bodyHtml" => "<!--\$ordno=1;--><!--if(\$item['tradetype'] == 99){--><font color=\"#2e2e2e\">{\$item['ordno']}</font><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\"><font color=\"#0000ff\">{\$item['ordno']}</font></a><!--}-->" ),
				"view" => array( "width" => "22", "headHtml" => "<!--\$view=1;--><img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--\$view=1;--><!--if(\$item['tradetype'] == 99 || \$item['tradetype'] == 101){--><font color=\"#2e2e2e\">��</font><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}-->" ),
				"orddate" => array( "width" => "140", "headHtml" => "<!--\$orddate=1;--><b>����ʱ��</b>", "bodyHtml" => "<!--\$orddate=1;-->{\$item['createdate']}" ),
				"ttradetype" => array( "width" => "180", "headHtml" => "<b>��������</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=trade&tradetype={\$item['tradetype']}&by=1&tpl=<!--echo \$item['tradetype']==11 ? 'agentorderprofit' : (request('tpl')=='ykt'||\$item['tradetype']==101|\$item['tradetype']==100 ? 'ykt' : 'agent');-->\">{#TxtByOption(\$vd['tradetypes'],\$item['tradetype'])}</a></nobr>" ),
				"price" => array( "width" => "80", "headHtml" => "<b>�û�����</b>", "bodyHtml" => "{\$item['price']}" ),
				"operator" => array( "width" => "100", "headHtml" => "<b>����Ա</b>", "bodyHtml" => "<!--if(\$item['operator']==0||\$item['operator']==''){--><font color=\"#ff0000\">ϵͳ</font><!--}else if(is_numeric(\$item['operator'])){-->�̺�(<a href=\"index.php?m=mod_b2b&c=trade&tpl=agent&stype=operator&keywords={\$item['operator']}&tpl=<!--echo getVar('tpl');-->\"><font color=\"#ff0000\">{#DisplayCode(\$item['operator'])}</font></a>)<!--}else{-->Ա��({\$item['operator']})<!--}-->" ),
				"listprice" => array( "width" => "60", "headHtml" => "<b>�¼ҹ���</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"qty" => array( "width" => "50", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['qty']}" ),
				"fbt" => array( "width" => "100", "headHtml" => "<b>����ǰ</b>", "bodyHtml" => "{\$item['fbt']}" ),
				"fat" => array( "width" => "100", "headHtml" => "<b>���׺�</b>", "bodyHtml" => "{\$item['fat']}" ),
				"state" => array( "width" => "35", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<!--if(\$item['state'] > 0){--><font color=\"#0000ff\">��Ч</font><!--}else{--><font color=\"#cccccc\">��Ч</font><!--}-->" ),
				"expend" => array( "width" => "100", "headHtml" => "<b>֧��</b>", "bodyHtml" => "{\$item['outcome']}" ),
				"remarks" => array( "width" => "280", "headHtml" => "<b>˵��</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['content']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['content']}</samp></nobr>" ),
				"tyktnumber" => array( "width" => "150", "headHtml" => "<b>һ��ͨ����</b>", "bodyHtml" => "{\$item['yktnumber']}" ),
				"tbindaid" => array( "width" => "70", "headHtml" => "<!--\$tbindaid=1;--><b>������ID</b>", "bodyHtml" => "<!--\$tbindaid=1;-->{\$item['bindaid']}" ),
				"treward" => array( "width" => "100", "headHtml" => "<!--\$treward=1;--><b>Ӧ����</b>", "bodyHtml" => "<!--\$treward=1;-->{\$item['reward']}" ),
				"trealreward" => array( "width" => "100", "headHtml" => "<!--\$trealreward=1;--><b>ʵ����</b>", "bodyHtml" => "<!--\$trealreward=1;-->{\$item['realreward']}" ),
				"tcheckout" => array( "width" => "70", "headHtml" => "<!--\$tcheckout=1;--><b>�ѽ���</b>", "bodyHtml" => "<!--\$tcheckout=1;--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checkout'])}\"  onFocus=\"this.blur()\" />" ),
				"tcheckoutdate" => array( "width" => "140", "headHtml" => "<!--\$tcheckoutdate=1;--><b>��������</b>", "bodyHtml" => "<!--\$tcheckoutdate=1;-->{\$item['checkoutdate']}" ),
				"income" => array( "width" => "100", "headHtml" => "<!--\$income=1;--><!--\$income=1;--><b>���Ľ��</b>", "bodyHtml" => "<!--\$income=1;-->{\$item['outcome']}" )
);
?>
