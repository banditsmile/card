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
				"pname" => array( "width" => "250", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['cardnumber']}" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>����</b>", "bodyHtml" => "�Ѽ���" ),
				"hassold" => array( "width" => "80", "headHtml" => "<b>�Ƿ��۳�</b>", "bodyHtml" => "<!--if(\$item['ordno'] == ''){--><a href=\"index.php?m=mod_b2b&c=Card&by=1&optype=s&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#008800\">δ�۳�</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Card&by=1&optype=f&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#ff0000\">���۳�</font></a><!--}-->" ),
				"cardok" => array( "width" => "60", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Card&by=1&cardok={\$item['cardok']}&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\">{#YktCardState(\$item['cardok'])}</a>" ),
				"addeddate" => array( "width" => "140", "headHtml" => "<b>���ʱ��</b>", "bodyHtml" => "{\$item['addeddate']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>�۳�ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" )
);
?>
