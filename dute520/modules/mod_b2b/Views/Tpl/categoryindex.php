<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['id']}" ),
				"tordering" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'ordering')\">{\$item['ordering']}</span></nobr>" ),
				"tfee" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'fee')\"><!--echo \$item['fee']==''?'---' : \$item['fee'];--></span></nobr>" ),
				"tcode" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'code')\"><!--echo \$item['code']==''?'---' : \$item['code'];--></span></nobr>" ),
				"tpics" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">ͼƬ</span>", "bodyHtml" => "<img src=\"{\$vd['root']}content/mod_shared/skins/picture/{\$item['pics']}\" height=\"28px\"/>" ),
				"tsys" => array( "width" => "35", "headHtml" => "<b>ϵͳ</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['issys'])}\"  onFocus=\"this.blur()\" border=\"0\"/>" ),
				"tcolor" => array( "width" => "30", "headHtml" => "<img src=\"{\$vd['sc']}images/16.gif\" align=\"absmiddle\"/>", "bodyHtml" => "<div onclick=\"toColor(this,{\$item['id']},'color')\" style=\"cursor:pointer;width:23px;height:16px;border:0px #fff solid;background:<!--echo \$item['color']==''?'#6c6c6c' : \$item['color']-->\"/></div>" ),
				"tname" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">��������</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'name')\">{\$item['name']}</span>" ),
				"taid" => array( "width" => "50", "headHtml" => "<b>����</b>", "bodyHtml" => "{#DisplayCode(\$item['aid'])}", "str" => "intval(request('custom'))==1" ),
				"tcatid" => array( "width" => "35", "headHtml" => "<b>��Ʒ</b>", "bodyHtml" => "<!--if(\$item['parentid']==0){-->--<!--}else{--><a href=\"index.php?m=mod_b2b&c=product&catid={\$item['id']}&aid=-1&ptype=-1\">�б�</a><!--}-->" ),
				"tpinyin" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">����ĸ</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'pinyin')\"><!--echo \$item['pinyin']==''?'---' : \$item['pinyin'];--></span></nobr>" ),
				"tabst" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">���</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'abst')\"><!--echo \$item['abst']==''?'---' : \$item['abst'];--></span></nobr>" ),
				"thot" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['hot'])}\" onclick=\"toToggle(this,{\$item['id']},'hot')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tshared" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['shared'])}\" onclick=\"toToggle(this,{\$item['id']},'shared')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "intval(request('custom'))==0" ),
				"tforb2b" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2b')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B&&UB_B2C+UB_YKT+UB_B2B>1" ),
				"tforb2c" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2c'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2c')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C&&UB_B2C+UB_YKT+UB_B2B>1" ),
				"tfork2k" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['fork2k'])}\" onclick=\"toToggle(this,{\$item['id']},'fork2k')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforykt" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">һ</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['id']},'forykt')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_YKT&&UB_B2C+UB_YKT+UB_B2B>1" )
);
?>
