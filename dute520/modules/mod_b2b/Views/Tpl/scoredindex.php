<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "120", "headHtml" => "<b>�һ���</b>", "bodyHtml" => "<!--if(\$item['staffid'] > 0){-->{#DisplayCode(\$item['aid'])}Ա��({#DisplayCode(\$item['staffid'])})<!--}else{-->������({#DisplayCode(\$item['aid'])})<!--}-->" ),
				"pname" => array( "width" => "160", "headHtml" => "<b>������Ʒ</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"qty" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['qty']}" ),
				"scored" => array( "width" => "80", "headHtml" => "���Ļ���", "bodyHtml" => "{\$item['scored']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "������", "bodyHtml" => "{\$item['ordno']}" ),
				"ordstate" => array( "width" => "80", "headHtml" => "�һ�״̬", "bodyHtml" => "<!--if(\$item['ordstate']==1){--><font color=\"#0000ff\">������</font><!--}else if(\$item['ordstate']==-1){--><font color=\"#cccccc\">��Ч</font><!--}else{--><font color=\"#008800\">�Ѵ���</font><!--}-->" ),
				"cdate" => array( "width" => "150", "headHtml" => "�һ�ʱ��", "bodyHtml" => "{\$item['createdate']}" ),
				"cip" => array( "width" => "80", "headHtml" => "�һ���IP", "bodyHtml" => "{\$item['cip']}" ),
				"comefrom" => array( "width" => "80", "headHtml" => "����ƽ̨", "bodyHtml" => "{\$item['comefrom']}" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Scored&a=detail&ubzordno={\$item['ordno']}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" )
);
?>
