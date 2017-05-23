<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tpid" => array( "width" => "35", "headHtml" => "<b>编号</b>", "bodyHtml" => "{\$item['pid']}" ),
				"tpname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">名称</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></nobr>" ),
				"tlistprice" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">面值</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['pid']},'listprice')\">{\$item['listprice']}</span></nobr>" ),
				"tsell" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">使用</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
