<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"name" => array( "width" => "120", "headHtml" => "<b>�û���</b>", "bodyHtml" => "{\$item['cname']}" ),
				"tcid" => array( "width" => "35", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['cid']}" ),
				"realname" => array( "width" => "120", "headHtml" => "<b>��ʵ����</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'crealname')\">{\$item['crealname']}</span>" ),
				"email" => array( "width" => "120", "headHtml" => "<b>����</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cmail')\">{\$item['cmail']}</span>" ),
				"tel" => array( "width" => "120", "headHtml" => "<b>�绰</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'ctel')\">{\$item['ctel']}</span>" ),
				"qq" => array( "width" => "120", "headHtml" => "<b>QQ</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cqq')\">{\$item['cqq']}</span>" ),
				"remain" => array( "width" => "80", "headHtml" => "<b>�˻����</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cremain')\"><!--if(\$item['cremain']){-->{\$item['cremain']}<!--}else{-->0<!--}--></span>" ),
				"clv" => array( "width" => "100", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Customer&optype={\$item['clv']}\">{#TxtByOption(\$vd['rank'],\$item['clv'], 'name', 'id')}</a>" ),
				"addr" => array( "width" => "140", "headHtml" => "<b>סַ</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['caddr']}\"><span onclick=\"toInput(this,{\$item['cid']},'caddr')\">{\$item['caddr']}</span></samp></nobr>" ),
				"csmp" => array( "width" => "80", "headHtml" => "<b>�����Ѷ�</b>", "bodyHtml" => "{\$item['ccsmp']}" ),
				"regdate" => array( "width" => "140", "headHtml" => "<b>ע��ʱ��</b>", "bodyHtml" => "{\$item['regdate']}" ),
				"regip" => array( "width" => "120", "headHtml" => "<b>ע��IP</b>", "bodyHtml" => "{\$item['regip']}" ),
				"lastdate" => array( "width" => "140", "headHtml" => "<b>�ϴε�½ʱ��</b>", "bodyHtml" => "{\$item['lastdate']}" ),
				"lastip" => array( "width" => "120", "headHtml" => "<b>�ϴε�¼IP</b>", "bodyHtml" => "{\$item['lastip']}" ),
				"remarks" => array( "width" => "200", "headHtml" => "<b>��ע��Ϣ</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\">{\$item['remarks']}</samp></nobr>" ),
				"ask" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/ask.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"�鿴�ͻ�����\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/ask.gif\"/></a>" ),
				"msg" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/msg.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"�鿴վ����Ϣ\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/msg.gif\"/></a>" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"�鿴����\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"�༭�û�\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"ɾ���û�,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" )
);
?>
