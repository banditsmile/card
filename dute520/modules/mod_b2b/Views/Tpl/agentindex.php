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
				"aid" => array( "width" => "50", "headHtml" => "���", "bodyHtml" => "{\$item['aid']}" ),
				"aname" => array( "width" => "80", "headHtml" => "�û���", "bodyHtml" => "<nobr><samp title=\"{\$item['aname']}\">{\$item['aname']}</samp></nobr>" ),
				"company" => array( "width" => "100", "headHtml" => "��˾����", "bodyHtml" => "<nobr><samp title=\"{\$item['company']}\">{\$item['company']}</samp></nobr>", "str" => "UB_B2B" ),
				"bind" => array( "width" => "22", "headHtml" => "��", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Security&a=Bind&aid={\$item['aid']}&staffid=0\" title=\"������\"><img src=\"{\$vd['sc']}images/bind.gif\"/></a>", "str" => "UB_B2B" ),
				"eshop" => array( "width" => "250", "headHtml" => "�����ַ", "bodyHtml" => "<nobr><samp title=\"{\$item['eshop']}\">{\$item['eshop']}</samp></nobr>", "str" => "UB_B2B" ),
				"rank" => array( "width" => "80", "headHtml" => "�û�����", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=agent&stype=alv&keywords={\$item['alv']}\" title=\"�鿴����{\$item['rank']}�б�\">{\$item['rank']}</a></nobr>" ),
				"zone" => array( "width" => "90", "headHtml" => "��������", "bodyHtml" => "<nobr><samp title=\"{\$item['prv']}{\$item['city']}\">{\$item['prv']}{\$item['city']}</samp></nobr>" ),
				"parent" => array( "width" => "40", "headHtml" => "�ϼ�", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&parentid={\$item['parentid']}\"><font color=\"#ff0000\">{#DisplayCode(\$item['parentid'])}</font></a>", "str" => "UB_B2B" ),
				"child" => array( "width" => "55", "headHtml" => "�¼�", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&parentid={\$item['aid']}\"><font color=\"#0000ff\">{\$item['underlingcount']}��</font></a>", "str" => "UB_B2B" ),
				"remain" => array( "width" => "120", "headHtml" => "���", "bodyHtml" => "{\$item['aremain']}" ),
				"csmp" => array( "width" => "120", "headHtml" => "����", "bodyHtml" => "{\$item['acsmp']}" ),
				"frozen" => array( "width" => "35", "headHtml" => "��ͨ", "bodyHtml" => "<!--if(\$item['frozen'] == 1){--> <font color=\"#ff0000\">����</font> <!--}else{--> <font color=\"#008800\">����</font> <!--}-->\t" ),
				"addfunds" => array( "width" => "22", "headHtml" => "��", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&a=AddFunds&aid={\$item['aid']}\"><img src=\"{\$vd['sc']}images/money.gif\" border=\"0\"/></a>" ),
				"addloan" => array( "width" => "22", "headHtml" => "Ƿ", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Loan&a=Add&aid={\$item['aid']}\">Ƿ</a>" ),
				"trade" => array( "width" => "22", "headHtml" => "��", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=aid&keywords={\$item['aid']}&by=1\" title=\"�鿴{\$item['aid']}�����¼\"><img src=\"{\$vd['sc']}images/check.gif\"/></a>" ),
				"prifunds" => array( "width" => "35", "headHtml" => "�ܼ�", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=product&a=simple\">�ܼ�</a>" ),
				"buyright" => array( "width" => "70", "headHtml" => "����Ȩ��", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Right&a=Right&param=aid&idx={\$item['aid']}&isok=-1\">����</a>" ),
				"funds" => array( "width" => "35", "headHtml" => "�ʽ�", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&a=lock&aid={\$item['aid']}\"><font color=\"#ff0000\">����</font></a>", "str" => "UB_B2B" ),
				"regdate" => array( "width" => "140", "headHtml" => "ע��ʱ��", "bodyHtml" => "{\$item['regdate']}" ),
				"regip" => array( "width" => "120", "headHtml" => "ע��IP", "bodyHtml" => "{\$item['regip']}" ),
				"lastdate" => array( "width" => "140", "headHtml" => "�ϴε�½ʱ��", "bodyHtml" => "{\$item['lastdate']}" ),
				"lastip" => array( "width" => "120", "headHtml" => "�ϴε�¼IP", "bodyHtml" => "{\$item['lastip']}" ),
				"remarks" => array( "width" => "200", "headHtml" => "��ע��Ϣ", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\">{\$item['remarks']}</samp></nobr>" ),
				"ask" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/ask.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzaname={\$item['aname']}&aid=-1\" title=\"�鿴�ͻ�����\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/ask.gif\"/></a>" ),
				"msg" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/msg.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&a=add&aid={\$item['aid']}\" title=\"��{\$item['aname']}����վ�ڶ���Ϣ\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/msg.gif\"/></a>" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzaname={\$item['aname']}&aid=-1\" title=\"�鿴{\$item['aname']}���Ѽ�¼\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"�༭�û�\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"ɾ���û�,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" ),
				"aqq" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">QQ</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['aqq']}\"><span onclick=\"toInput(this,{\$item['aid']},'aqq')\">{\$item['aqq']}</span></samp></nobr>" ),
				"amail" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['amail']}\"><span onclick=\"toInput(this,{\$item['aid']},'amail')\">{\$item['amail']}</span></samp></nobr>" ),
				"atel" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">�绰</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['atel']}\"><span onclick=\"toInput(this,{\$item['aid']},'atel')\">{\$item['atel']}</span></samp></nobr>" ),
				"mobile" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">�ֻ�</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['mobile']}\"><span onclick=\"toInput(this,{\$item['aid']},'mobile')\">{\$item['mobile']}</span></samp></nobr>" ),
				"aaddr" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">סַ</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['aaddr']}\"><span onclick=\"toInput(this,{\$item['aid']},'aaddr')\">{\$item['aaddr']}</span></samp></nobr>" ),
				"realname" => array( "width" => "70", "headHtml" => "<span class=\"canedit\">��ʵ����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['arealname']}\"><span onclick=\"toInput(this,{\$item['aid']},'arealname')\">{\$item['arealname']}</span></samp></nobr>" ),
				"zip" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">�ʱ�</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['zip']}\"><span onclick=\"toInput(this,{\$item['aid']},'zip')\">{\$item['zip']}</span></samp></nobr>" ),
				"income" => array( "width" => "120", "headHtml" => "��������", "bodyHtml" => "<!--echo round(\$item['income'],3);-->", "str" => "UB_B2B" )
);
?>
