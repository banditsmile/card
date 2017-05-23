<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['id']}\" onFocus=\"this.blur()\">" ),
				"tbankicon" => array( "width" => "50", "headHtml" => "标志", "bodyHtml" => "<img src=\"{\$vd['root']}content/mod_shared/skins/upload/{\$item['bankicon']}\" border=\"0\"/>" ),
				"branch" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">开户行</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['AccountBranch']}\"><span onclick=\"toInput(this,{\$item['id']},'AccountBranch')\">{\$item['AccountBranch']}</span></samp></nobr>" ),
				"no" => array( "width" => "180", "headHtml" => "<span class=\"canedit\">银行卡号</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'AccountNO')\">{\$item['AccountNO']}</span>" ),
				"name" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">户名</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'AccountName')\">{\$item['AccountName']}</span>" ),
				"addr" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">开户地</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'Address')\">{\$item['Address']}</span>" ),
				"remarks" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">其他说明</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['other']}\"><span onclick=\"toInput(this,{\$item['id']},'other')\">{\$item['other']}</span></samp></nobr>" ),
				"tbanksite" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">银行网址</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['banksite']}\"><span onclick=\"toInput(this,{\$item['id']},'banksite')\">{\$item['banksite']}</span></samp></nobr>" ),
				"tsettle" => array( "width" => "22", "headHtml" => "<b>结</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['settle'])}\" onclick=\"toToggle(this,{\$item['id']},'settle')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tremit" => array( "width" => "22", "headHtml" => "<b>汇</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['remit'])}\" onclick=\"toToggle(this,{\$item['id']},'remit')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
