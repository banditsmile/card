<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['cid']}\" onFocus=\"this.blur()\">" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<!--if(\$item['ubzuida']==\$item['ubzuidb']){-->{\$item['ubzordno']}<!--}else{--><a href=\"javascript:openScript('index.php?m=mod_b2b&c=SOrder&a=detail&ordno={\$item['ubzordno']}','',692,500)\" title=\"�鿴����\" onFocus=\"this.blur()\">{\$item['ubzordno']}</a><!--}-->" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--if(\$item['ubzuida']==\$item['ubzuidb']){--><font color=\"#cccccc\">��</font><!--}else{--><a href=\"javascript:openScript('index.php?m=mod_b2b&c=SOrder&a=detail&ordno={\$item['ubzordno']}','',692,500)\" title=\"�鿴����\" onFocus=\"this.blur()\"\\><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}-->" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>����ʱ��</b>", "bodyHtml" => "{\$item['ubztrddate']}" ),
				"expend" => array( "width" => "65", "headHtml" => "<b>֧��</b>", "bodyHtml" => "<!--if(\$item['ubzincome'] != \$item['ubzexpend'] && \$item['ubzexpend'] != 0){-->- {\$item['ubzexpend']}<!--}-->" ),
				"income" => array( "width" => "65", "headHtml" => "<b>����</b>", "bodyHtml" => "<!--if(\$item['ubzincome'] != \$item['ubzexpend'] && \$item['ubzincome'] != 0){-->+ {\$item['ubzincome']}<!--}-->" ),
				"remain" => array( "width" => "70", "headHtml" => "<b>��������</b>", "bodyHtml" => "{\$item['ubzremain']}" ),
				"uida" => array( "width" => "60", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"javascript:openScript('index.php?m=mod_b2b&c=sup&a=GetSupplier&ubzuuid={\$item['ubzuida']}&ubzordno={\$item['ubzordno']}','',692,390);\">{\$item['ubzuida']}</a>" ),
				"uidb" => array( "width" => "60", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"javascript:openScript('index.php?m=mod_b2b&c=sup&a=GetSupplier&ubzuuid={\$item['ubzuidb']}&ubzordno={\$item['ubzordno']}','',692,390);\">{\$item['ubzuidb']}</a>" ),
				"remarks" => array( "width" => "250", "headHtml" => "<b>˵��</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['ubztrddcrp']}\">{\$item['ubztrddcrp']}</samp></nobr>" )
);
?>
