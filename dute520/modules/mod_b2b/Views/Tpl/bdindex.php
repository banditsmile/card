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
				"cztype" => array( "width" => "160", "headHtml" => "<b>ҵ������</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['cztype']}\">{\$item['cztype']}</samp></nobr>" ),
				"remark" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">��ע</span>", "bodyHtml" => "{\$item['remark']}" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Bd&a=detail&id={\$item['id']}\" title=\"�鿴����\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" ),
				"admremark" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">����Ա�ظ�</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['id']}','admremark')\"><!--if(\$item['admremark']==''){-->--<!--}else{-->{\$item['admremark']}<!--}--></span>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>�ύʱ��</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"cip" => array( "width" => "120", "headHtml" => "<b>�ύ��IP</b>", "bodyHtml" => "{\$item['cip']}" ),
				"islight" => array( "width" => "50", "headHtml" => "<b>ͼ����</b>", "bodyHtml" => "<!--if(\$item['islight']==0){--><font color=\"#6a6a6a\">����</font><!--}else{--><font color=\"#0000ff\">��</font><!--}-->" ),
				"state" => array( "width" => "95", "headHtml" => "<b>����״̬</b>", "bodyHtml" => "{#OrderStateBd(\$item['ordstate'])}" ),
				"czaccount" => array( "width" => "90", "headHtml" => "<b>��ֵ�˺�</b>", "bodyHtml" => "<span onclick=\"copyToClipboard('{\$item['czaccount']}')\" style=\"cursor:pointer\" title=\"���ֱ�Ӹ���\">{\$item['czaccount']}</span>" ),
				"accpwd" => array( "width" => "120", "headHtml" => "<b>�˺�����</b>", "bodyHtml" => "<span onclick=\"copyToClipboard('{\$item['accpwd']}')\" style=\"cursor:pointer\" title=\"���ֱ�Ӹ���\">{\$item['accpwd']}</span>" ),
				"quickcheck" => array( "width" => "35", "headHtml" => "<b>�ύ</b>", "bodyHtml" => "<!--if(\$item['ordstate']!=1 ){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" onclick=\"toToggle(this,'{\$item['id']}','ordstate')\" alt=\"��������޸Ķ���״̬Ϊ�������״̬��\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}-->" ),
				"suc" => array( "width" => "35", "headHtml" => "<b>�ɹ�</b>", "bodyHtml" => "<!--if(\$item['ordstate']==2){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" onclick=\"toToggle(this,'{\$item['id']}','ordstate3')\" alt=\"��������޸Ķ���״̬Ϊ�������״̬��\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}-->" ),
				"cz" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "<input type=\"button\" value=\"����\" class=\"button\" style=\"width:35px;\" onclick=\"window.location='?m=mod_b2b&c=bd&a=cetail&id={\$item['id']}'\"/>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"ɾ���û�,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" ),
				"tadmin" => array( "width" => "120", "headHtml" => "<b>��������Ա</b>", "bodyHtml" => "{\$item['admname']}" )
);
?>
