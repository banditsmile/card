<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "序号", "bodyHtml" => "{\$item['id']}" ),
				"tsubject" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">主题</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['subject']}\"><span onclick=\"toInput(this,{\$item['id']},'subject')\">{\$item['subject']}</span></samp></nobr>" ),
				"tagree" => array( "width" => "50", "headHtml" => "<b>同意数</b>", "bodyHtml" => "{\$item['agree']}" ),
				"tdisagree" => array( "width" => "60", "headHtml" => "<b>不同意数</b>", "bodyHtml" => "{\$item['disagree']}" ),
				"tmarks" => array( "width" => "30", "headHtml" => "<b>评分</b>", "bodyHtml" => "{\$item['marks']}" ),
				"tpid" => array( "width" => "50", "headHtml" => "<b>商品</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Review&stype=pid&keywords={\$item['pid']}\">{\$item['pid']}</a>" ),
				"treviewer" => array( "width" => "80", "headHtml" => "<b>评论者</b>", "bodyHtml" => "{\$item['reviewer']}" ),
				"tcreatedate" => array( "width" => "150", "headHtml" => "<b>时间</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"tchecked" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">审</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checked'])}\" onclick=\"toToggle(this,{\$item['id']},'checked')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
