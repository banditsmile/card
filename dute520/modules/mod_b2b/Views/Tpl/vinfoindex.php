<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"vip" => array( "width" => "130", "headHtml" => "<b>�����ɣ�</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=vinfo&stype=vip&keywords={\$item['vip']}\">{\$item['vip']}</a>" ),
				"vcount" => array( "width" => "70", "headHtml" => "<b>�ɣз���</b>", "bodyHtml" => "{\$item['vcount']}" ),
				"vsn" => array( "width" => "70", "headHtml" => "<b>�������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=vinfo&stype=vsn&keywords={\$item['vsn']}\">{\$item['vsn']}</a>" ),
				"vsncount" => array( "width" => "70", "headHtml" => "<b>��������</b>", "bodyHtml" => "{\$item['vsncount']}" ),
				"vref" => array( "width" => "150", "headHtml" => "<b>��Դ��ַ</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vref']}\" size=\"20\"/>" ),
				"vname" => array( "width" => "70", "headHtml" => "<b>�����û�</b>", "bodyHtml" => "{\$item['vname']}" ),
				"vgo" => array( "width" => "150", "headHtml" => "<b>����ҳ��</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vgo']}\" size=\"20\"/>" ),
				"vreq" => array( "width" => "150", "headHtml" => "<b>ҳ������</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vreq']}\" size=\"10\"/><a href=\"<!--echo \$item['vreq']=='��'?\$item['vgo'] : \$item['vgo'].'?'.\$item['vreq'];-->\" target=\"_blank\">go</a>" ),
				"vdate" => array( "width" => "150", "headHtml" => "<b>����ʱ��</b>", "bodyHtml" => "{\$item['vdate']}" )
);
?>
