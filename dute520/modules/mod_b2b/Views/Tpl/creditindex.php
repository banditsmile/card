<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"taid" => array( "width" => "100", "headHtml" => "用户编号", "bodyHtml" => "{\$item['aid']}" ),
				"tcredit" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">信用度</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'credit')\">{\$item['credit']}</span></nobr>" ),
				"tisvalid" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">自动赊帐</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['isvalid'])}\" onclick=\"toToggle(this,{\$item['id']},'isvalid')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
