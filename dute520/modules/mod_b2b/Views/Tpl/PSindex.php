<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['pid']}\" onFocus=\"this.blur()\">" ),
				"pname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">��Ʒ����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\"><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></samp></nobr>" ),
				"totlestocks" => array( "width" => "50", "headHtml" => "<b>�ܿ��</b>", "bodyHtml" => "{\$item['totlestocks']}" ),
				"supstocks" => array( "width" => "65", "headHtml" => "<b>�������</b>", "bodyHtml" => "{\$item['supstocks']}" ),
				"stocks" => array( "width" => "40", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['stocks']}" ),
				"pinyin" => array( "width" => "35", "headHtml" => "<b>ƴ��</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'pinyin')\"><!--echo \$item['pinyin']==''?'--':\$item['pinyin'];--></span>" ),
				"addstocks" => array( "width" => "65", "headHtml" => "<b>��ӿ��</b>", "bodyHtml" => "{#PCardsPtype(\$item['ptype'], \$item['pid'])}" ),
				"sellyd" => array( "width" => "65", "headHtml" => "<b>�����۳�</b>", "bodyHtml" => "{\$item['sellyd']}" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"aid" => array( "width" => "65", "headHtml" => "<b>����</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&stype=aid&keywords={\$item['aid']}\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>", "str" => "UB_B2B" ),
				"pid" => array( "width" => "40", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['pid']}" ),
				"forb2b" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forb2b&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['pid']},'forb2b')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B" ),
				"forshop" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forshop&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forshop'])}\" onclick=\"toToggle(this,{\$item['pid']},'forshop')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"forykt" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forykt&keywords=1\"><span class=\"canedit\"><u>һ</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['pid']},'forykt')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_YKT" ),
				"sell" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=sell&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"new" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=new&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['new'])}\" onclick=\"toToggle(this,{\$item['pid']},'new')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"hot" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=hot&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['hot'])}\" onclick=\"toToggle(this,{\$item['pid']},'hot')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"remd" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=remd&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['remd'])}\" onclick=\"toToggle(this,{\$item['pid']},'remd')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"sup" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=sup&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sup'])}\" onFocus=\"this.blur()\"/>" ),
				"checked" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=checked&keywords=1\"><span class=\"canedit\"><u>��</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checked'])}\" onclick=\"toToggle(this,{\$item['pid']},'checked')\" alt=\"�����ͼƬ�����޸�״̬������ر�֤���Ѿ����ù����۸�\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"�鿴����\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&a=detail&ubzpid={\$item['pid']}\" title=\"�༭��Ʒ\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['pid']})\" alt=\"ɾ����Ʒ,�����ϢҲ�ᱻɾ��\" style=\"cursor:pointer\"/>" )
);
?>
