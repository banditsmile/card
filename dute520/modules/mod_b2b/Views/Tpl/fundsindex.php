<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "35", "headHtml" => "<b>ƽ̨</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Funds&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\">{#ComeFrom(\$item['comefrom'])}</a>", "str" => "UB_B2B+UB_B2C>1" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<nobr>{\$item['ordno']}</nobr>" ),
				"dollars" => array( "width" => "70", "headHtml" => "<b>֧�����</b>", "bodyHtml" => "{\$item['dollars']}" ),
				"cname" => array( "width" => "80", "headHtml" => "<b>�û���</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=Funds&comefrom={\$item['comefrom']}&cname={\$item['cname']}&by=1\" onclick=\"loadDisp(1)\" title=\"����鿴����û���������еĵ���\">{\$item['cname']}</a></nobr>" ),
				"payment" => array( "width" => "90", "headHtml" => "<b>֧����ʽ</b>", "bodyHtml" => "{#GetPayment(\$item['payment'],\$item['ordno'])}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>�µ�ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" ),
				"cip" => array( "width" => "120", "headHtml" => "<b>�µ���IP</b>", "bodyHtml" => "{\$item['cip']}" ),
				"state" => array( "width" => "70", "headHtml" => "<b>����״̬</b>", "bodyHtml" => "{#OrderState(\$item['ordstate'], 1)}" ),
				"remarks" => array( "width" => "250", "headHtml" => "<b>��ע</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Funds&by=1&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['remarks']}</samp></nobr>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"ɾ���û�,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" )
);
?>
