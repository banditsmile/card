<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"ttitle" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">主题</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['title']}\"><span onclick=\"toInput(this,{\$item['id']},'title')\">{\$item['title']}</span></samp></nobr>" ),
				"tforb2b" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">批</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2b')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforb2c" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">零</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2c'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2c')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforykt" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">一</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['id']},'forykt')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tisradio" => array( "width" => "60", "headHtml" => "<b>投票属性</b>", "bodyHtml" => "<!--if(\$item['isradio']){-->单选<!--}else{-->多选<!--}-->" ),
				"tordering" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">排序</b>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'ordering')\">{\$item['ordering']}</span></nobr>" ),
				"thits" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">点击数</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'hits')\">{\$item['hits']}</span></nobr>" ),
				"tcreatedate" => array( "width" => "140", "headHtml" => "<b>创建时间</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"texpiration" => array( "width" => "140", "headHtml" => "<span class=\"canedit\">过期时间</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'expiration')\">{\$item['expiration']}</span></nobr>" )
);
?>
