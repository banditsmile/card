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
				"tcolor" => array( "width" => "30", "headHtml" => "<img src=\"{\$vd['sc']}images/16.gif\" align=\"absmiddle\"/>", "bodyHtml" => "<div onclick=\"toColor(this,{\$item['id']},'color')\" style=\"cursor:pointer;width:23px;height:16px;border:0px #fff solid;background:<!--echo \$item['color']==''?'#6c6c6c' : \$item['color']-->\"/></div>" ),
				"tname" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">��������</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'name')\">{\$item['name']}</span>" ),
				"tp" => array( "width" => "35", "headHtml" => "<b>��Ʒ</b>", "bodyHtml" => "<!--if(\$item['parentid']==0){-->--<!--}else{--><a href=\"index.php?m=mod_b2b&c=product&catid={\$item['id']}&aid=-1&ptype=-1\">�б�</a><!--}-->" ),
				"tpinyin" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">����ĸ</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'pinyin')\"><!--echo \$item['pinyin']==''?'---' : \$item['pinyin'];--></span></nobr>" ),
				"tpids" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">������Ʒ</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'pids')\"><!--echo \$item['pids']==''?'---' : \$item['pids'];--></span></nobr>" ),
				"thot" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['hot'])}\" onclick=\"toToggle(this,{\$item['id']},'hot')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
