<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"orddate" => array( "width" => "140", "headHtml" => "<b>ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory={\$ishistory}\" title=\"�鿴����\"><font color=\"#00875A\">{\$item['ordno']}</font>" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory={\$ishistory}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" ),
				"cprice" => array( "width" => "45", "headHtml" => "<b>�ۼ�</b>", "bodyHtml" => "{\$item['cprice']}" ),
				"price" => array( "width" => "50", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['price']}" ),
				"qty" => array( "width" => "35", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['qty']}" ),
				"profit" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['profit']}" ),
				"sysprofit" => array( "width" => "150", "headHtml" => "<b>ϵͳ����</b>", "bodyHtml" => "<!--echo round((\$item['profit'] - \$item['agentprofit']), 3)-->" ),
				"agentprofit" => array( "width" => "150", "headHtml" => "<b>����������</b>", "bodyHtml" => "{\$item['agentprofit']}" ),
				"pname" => array( "width" => "140", "headHtml" => "<b>�µ�ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" ),
				"aname" => array( "width" => "120", "headHtml" => "<b>�µ���</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=profit&comefrom={\$item['comefrom']}&keywords={\$item['aname']}&stype=aname&by=1\" onclick=\"loadDisp(1)\" title=\"����鿴����û���������еĵ���\">{\$item['cname']}</a>" ),
				"aid" => array( "width" => "65", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Profit&stype=aid&keywords={\$item['aid']}&by=1&allaid=1\" onclick=\"loadDisp(1)\" title=\"����鿴����û��Ķ���\">{#DisplayCode(\$item['aid'])}</a>" )
);
?>
