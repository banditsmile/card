<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "<b>编号</b>", "bodyHtml" => "{\$item['id']}" ),
				"tordering" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">排序</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'ordering')\">{\$item['ordering']}</span></nobr>" ),
				"tfee" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">费率</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'fee')\"><!--echo \$item['fee']==''?'---' : \$item['fee'];--></span></nobr>" ),
				"tcode" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">编码</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'code')\"><!--echo \$item['code']==''?'---' : \$item['code'];--></span></nobr>" ),
				"tpics" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">图片</span>", "bodyHtml" => "<img src=\"{\$vd['root']}content/mod_shared/skins/upload/{\$item['pics']}\" height=\"28px\"/>" ),
				"tsys" => array( "width" => "35", "headHtml" => "<b>系统</b>", "bodyHtml" => "<div style=\"padding-left:8px;\"><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['issys'])}\"  onFocus=\"this.blur()\" border=\"0\"/></div>" ),
				"tcolor" => array( "width" => "30", "headHtml" => "<img src=\"{\$vd['sc']}images/16.gif\" align=\"absmiddle\"/>", "bodyHtml" => "<div onclick=\"toColor(this,{\$item['id']},'color')\" style=\"cursor:pointer;width:23px;height:16px;border:0px #fff solid;background:<!--echo \$item['color']==''?'#6c6c6c' : \$item['color']-->\"/></div>" ),
				"tname" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">分类名称</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'name')\">{\$item['name']}</span>" ),
				"tpinyin" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">首字母</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'pinyin')\"><!--echo \$item['pinyin']==''?'---' : \$item['pinyin'];--></span></nobr>" ),
				"tabst" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">简介</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'abst')\"><!--echo \$item['abst']==''?'---' : \$item['abst'];--></span></nobr>" ),
				"thot" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">热</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['hot'])}\" onclick=\"toToggle(this,{\$item['id']},'hot')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tshared" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">享</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['shared'])}\" onclick=\"toToggle(this,{\$item['id']},'shared')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforb2b" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">批</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2b')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforb2c" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">零</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2c'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2c')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tfork2k" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">换</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['fork2k'])}\" onclick=\"toToggle(this,{\$item['id']},'fork2k')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforykt" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">一</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['id']},'forykt')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
