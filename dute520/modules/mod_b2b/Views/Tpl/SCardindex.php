<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['id']}\" onFocus=\"this.blur()\">" ),
				"pname" => array( "width" => "250", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['ubzpname']}\">{\$item['ubzpname']}</samp></nobr>" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['ubzcardnumber']}" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>����</b>", "bodyHtml" => "�Ѽ���" ),
				"cardok" => array( "width" => "60", "headHtml" => "<b>״̬</b>", "bodyHtml" => "{#CardState(\$item['ubzcardok'])}" ),
				"addate" => array( "width" => "140", "headHtml" => "<b>���ʱ��</b>", "bodyHtml" => "{\$item['ubzaddate']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['ubzordno']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>�۳�ʱ��</b>", "bodyHtml" => "{\$item['ubzorddate']}" )
);
?>
