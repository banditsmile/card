<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "90", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\">{#ComeFrom(\$item['comefrom'])}</a>(<a href=\"index.php?m=mod_b2b&c=order&aid={\$item['aid']}&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>)" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\">{\$item['ordno']}</a>" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}&ishistory=<!--echo intval(request('ishistory'));-->\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" ),
				"pname" => array( "width" => "160", "headHtml" => "<b>������Ʒ</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"remarks" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">��ע</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['ordno']}','remarks')\"><!--if(\$item['remarks']==''){-->--<!--}else{-->{\$item['remarks']}<!--}--></span>" ),
				"ptype" => array( "width" => "65", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"cname" => array( "width" => "120", "headHtml" => "<b>������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&comefrom={\$item['comefrom']}&keywords={\$item['cname']}&stype=cname&by=1\" onclick=\"loadDisp(1)\" title=\"����鿴����û���������еĵ���\">{\$item['cname']}</a>" ),
				"aname" => array( "width" => "120", "headHtml" => "<b>�û���</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&comefrom={\$item['comefrom']}&keywords={\$item['aname']}&stype=aname&by=1\" onclick=\"loadDisp(1)\" title=\"����鿴����û���������еĵ���\">{\$item['cname']}</a>" ),
				"cqq" => array( "width" => "120", "headHtml" => "<b>QQ��</b>", "bodyHtml" => "{\$item['cqq']}" ),
				"tadmin" => array( "width" => "120", "headHtml" => "<b>�������Ա</b>", "bodyHtml" => "{\$item['admname']}" ),
				"cmail" => array( "width" => "120", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['cmail']}" ),
				"ctel" => array( "width" => "120", "headHtml" => "<b>�绰</b>", "bodyHtml" => "{\$item['ctel']}" ),
				"caccount" => array( "width" => "120", "headHtml" => "<b>��ֵ�ʺ�</b>", "bodyHtml" => "{\$item['caccount']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>�µ�ʱ��</b>", "bodyHtml" => "{\$item['orddate']}" ),
				"cip" => array( "width" => "120", "headHtml" => "<b>�µ���IP</b>", "bodyHtml" => "{\$item['cip']}" ),
				"qty" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['qty']}" ),
				"dollars" => array( "width" => "80", "headHtml" => "<span class=\"canedit\">�ܽ��</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['ordno']}','dollars')\">{\$item['dollars']}</span>" ),
				"price" => array( "width" => "80", "headHtml" => "<span class=\"canedit\">������</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['ordno']}','price')\">{\$item['price']}</span>" ),
				"cprice" => array( "width" => "80", "headHtml" => "<span class=\"canedit\">�ۼ�</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['ordno']}','cprice')\">{\$item['cprice']}</span>" ),
				"profit" => array( "width" => "80", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['ordno']}','profit')\">{\$item['profit']}</span>" ),
				"payment" => array( "width" => "75", "headHtml" => "<b>֧����ʽ</b>", "bodyHtml" => "{#GetPayment(\$item['payment'],\$item['ordno'])}" ),
				"state" => array( "width" => "95", "headHtml" => "<b>����״̬</b>", "bodyHtml" => "{#OrderState(\$item['ordstate'], \$item['ptype'])}" ),
				"czaccount" => array( "width" => "120", "headHtml" => "<b>��ֵ�û�</b>", "bodyHtml" => "<span onclick=\"copyToClipboard('{\$item['czaccount']}')\" style=\"cursor:pointer\" title=\"���ֱ�Ӹ���\">{\$item['czaccount']}</span>" ),
				"czarea1" => array( "width" => "120", "headHtml" => "<b>��ֵ����</b>", "bodyHtml" => "{#CzText(\$item['czarea1'])}" ),
				"czarea2" => array( "width" => "120", "headHtml" => "<b>��ֵ������</b>", "bodyHtml" => "{#CzText(\$item['czarea2'])}" ),
				"cztype" => array( "width" => "120", "headHtml" => "<b>�Ʒѷ�ʽ</b>", "bodyHtml" => "{#CzText(\$item['cztype'])}" ),
				"czother" => array( "width" => "120", "headHtml" => "<b>�ʺ�����</b>", "bodyHtml" => "{#CzText(\$item['czother'])}" ),
				"quickcheck" => array( "width" => "35", "headHtml" => "<b>�ύ</b>", "bodyHtml" => "<!--if(\$item['sup'] != 1) {--><!--if(\$item['ordstate']!=1){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" onclick=\"toToggle(this,'{\$item['ordno']}','ordstate')\" alt=\"��������޸Ķ���״̬Ϊ�������״̬��\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}--><!--}else{-->--<!--}-->" ),
				"suc" => array( "width" => "35", "headHtml" => "<b>�ɹ�</b>", "bodyHtml" => "<!--if(\$item['sup'] != 1) {--><!--if(\$item['ordstate']==2){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" onclick=\"toToggle(this,'{\$item['ordno']}','ordstate3')\" alt=\"��������޸Ķ���״̬Ϊ�������״̬��\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}--><!--}else{-->--<!--}-->" ),
				"cz" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "<!--if(\$item['sup'] != 1) {--><input type=\"button\" value=\"����\" class=\"button\" style=\"width:35px;\" onclick=\"window.location='?m=mod_b2b&c=order&a=cetail&ubzordno={\$item['ordno']}'\"/><!--}else{-->--<!--}-->" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"ɾ���û�,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" )
);
?>
