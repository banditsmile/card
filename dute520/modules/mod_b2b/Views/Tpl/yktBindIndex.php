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
				"pid" => array( "width" => "65", "headHtml" => "<b>��Ʒ���</b>", "bodyHtml" => "{\$item['pid']}" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&a=state&keywords={\$item['cardnumber']}\">{\$item['cardnumber']}</a>" ),
				"cprice" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">�ۼ�</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['id']}','cprice')\">{\$item['cprice']}</span>" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>����</b>", "bodyHtml" => "�Ѽ���" ),
				"cardgroup" => array( "width" => "35", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['cardgroup']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\">{\$item['ordno']}</a>" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--if(\$item['ordno'] != ''){--><!--if(\$item['ptype']==101){--><a href=\"index.php?m=mod_b2b&c=trade&a=state&keywords={\$item['cardnumber']}\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}--><!--}else{--><font color=\"#cccccc\">��</font><!--}-->" ),
				"hassold" => array( "width" => "70", "headHtml" => "<b>�Ƿ��۳�</b>", "bodyHtml" => "<!--if(\$item['ordno'] == ''){--><a href=\"index.php?m=mod_b2b&c=Ykt&by=1&optype=s&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#008800\">δ�۳�</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Ykt&by=1&optype=f&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#ff0000\">���۳�</font></a><!--}-->" ),
				"addfunds" => array( "width" => "22", "headHtml" => "��", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Ykt&a=AddFunds&ubzid={\$item['id']}\"><img src=\"{\$vd['sc']}images/money.gif\" border=\"0\"/></a>" ),
				"tcardok" => array( "width" => "50", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Ykt&by=1&cardok={\$item['cardok']}&inrecycle={\$vd['inrecycle']}\" title=\"����鿴��Ӧ״̬����\">{#YktCardState(\$item['cardok'])}</a>" ),
				"money" => array( "width" => "70", "headHtml" => "<b>�����</b>", "bodyHtml" => "<!--if(\$item['money']==0){--><font color=\"#6c6c6c\">{\$item['money']} {\$vd['lang']['moneyunit']}</font><!--}else{--><font color=\"#008800\">{\$item['money']} {\$vd['lang']['moneyunit']}</font><!--}-->" ),
				"bind" => array( "width" => "70", "headHtml" => "<b>����Ʒ</b>", "bodyHtml" => "<!--if(\$item['bindpid'] == ''){--><font color=\"#6c6c6c\">δ��</font><!--}else{--><font color=\"#ff0000\">{\$item['bindpid']}</font><!--}-->" ),
				"addeddate" => array( "width" => "140", "headHtml" => "<b>���ʱ��</b>", "bodyHtml" => "{\$item['addeddate']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>�۳�ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" )
);
?>
