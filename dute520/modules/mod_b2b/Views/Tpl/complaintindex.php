<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"other" => array( "width" => "120", "headHtml" => "<b>���ͻ�����</b>", "bodyHtml" => "{\$item['other']}" ),
				"hope" => array( "width" => "120", "headHtml" => "<b>��ʩ</b>", "bodyHtml" => "{\$item['hope']}" ),
				"tmstate" => array( "width" => "120", "headHtml" => "<b>����״̬</b>", "bodyHtml" => "{\$vd['mstate'][\$item['msgstate']]}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Order&a=Detail&ubzordno={\$item['ordno']}\">{\$item['ordno']}</a>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>Ͷ��ʱ��</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"msgto" => array( "width" => "80", "headHtml" => "<b>��Ͷ����</b>", "bodyHtml" => "<!--if(\$item['msgto'] == 0){--><font color=\"#ff0000\">ϵͳ</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgto'],4)}</font><!--}-->" ),
				"msgfrom" => array( "width" => "80", "headHtml" => "<b>Ͷ����</b>", "bodyHtml" => "<!--if(\$item['msgfrom'] == 0){--><font color=\"#ff0000\">ϵͳ</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgfrom'],4)}</font><!--}-->" )
);
?>
