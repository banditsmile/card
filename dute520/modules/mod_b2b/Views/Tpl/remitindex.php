<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"account" => array( "width" => "150", "headHtml" => "<b>����ʺ�</b>", "bodyHtml" => "{\$account}" ),
				"accountname" => array( "width" => "100", "headHtml" => "<b>�ʻ���</b>", "bodyHtml" => "{\$accountname}" ),
				"bank" => array( "width" => "70", "headHtml" => "<b>�������</b>", "bodyHtml" => "{\$bank}" ),
				"msgfrom" => array( "width" => "120", "headHtml" => "<b>���ͻ�</b>", "bodyHtml" => "{\$item['hope']}({#DisplayCode(\$item['msgfrom'])})" ),
				"ordno" => array( "width" => "65", "headHtml" => "<b>�����</b>", "bodyHtml" => "{\$item['ordno']}" ),
				"otherdate" => array( "width" => "140", "headHtml" => "<b>���ʱ��</b>", "bodyHtml" => "{\$item['otherdate']}" ),
				"deal" => array( "width" => "45", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<!--if(\$item['msgstate']==1){--><font color=\"#ff0000\">δ����</font><!--}else{--><font color=\"#0000ff\">�Ѵ���</font><!--}-->" ),
				"msgto" => array( "width" => "65", "headHtml" => "<b>��������</b>", "bodyHtml" => "<!--if(\$item['msgto'] == 0){--><font color=\"#ff0000\">ϵͳ</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgto'],4)}</font><!--}-->" )
);
?>
