<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "30", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['aid']}" ),
				"aname" => array( "width" => "80", "headHtml" => "<b>�û���</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['aname']}\">{\$item['aname']}</samp></nobr>" ),
				"company" => array( "width" => "120", "headHtml" => "<b>��˾��</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['company']}\">{\$item['company']}</samp></nobr>" ),
				"rank" => array( "width" => "80", "headHtml" => "<b>�û�����</b>", "bodyHtml" => "{#TxtByOption(\$vd['rank'], \$item['alv'], 'name', 'id')}" ),
				"aremain" => array( "width" => "70", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['aremain']}" ),
				"prvcity" => array( "width" => "100", "headHtml" => "<b>��������</b>", "bodyHtml" => "{\$item['prv']}{\$item['city']}" ),
				"acsmp" => array( "width" => "70", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['acsmp']}" ),
				"lvprice" => array( "width" => "70", "headHtml" => "<b>�û�����</b>", "bodyHtml" => "{\$item['cprice']}" ),
				"setpp" => array( "width" => "70", "headHtml" => "<b>�ܼ�</b>", "bodyHtml" => "<input type=\"hidden\" name=\"oldpricetpl_{\$item['aid']}\" value=\"{\$item['pricetpl']}\"/><input type=\"hidden\" name=\"aid[]\" value=\"{\$item['aid']}\"/><input type=\"text\" size=\"5\" name=\"price_{\$item['aid']}\" value=\"<!--if(isset(\$vd['parray'][\$item['aid']])){echo \$vd['parray'][\$item['aid']];}-->\"/>" ),
				"subpp" => array( "width" => "70", "headHtml" => "<b>���</b>", "bodyHtml" => "<!--if(isset(\$vd['parray'][\$item['aid']])){echo round((\$vd['parray'][\$item['aid']]-\$vd['myprice']), 3);}else{echo '--';}-->" ),
				"opmy" => array( "width" => "70", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=price&a=PrivatePriceAgentDel&pid={\$vd['pid']}&aid={\$item['aid']}\">���</a>" )
);
?>
