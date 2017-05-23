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
				"tid" => array( "width" => "35", "headHtml" => "编号", "bodyHtml" => "{\$item['id']}" ),
				"tyktlogo" => array( "width" => "230", "headHtml" => "一卡通店标", "bodyHtml" => "<img src=\"{\$item['website']}content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"tb2blogo" => array( "width" => "230", "headHtml" => "批发店标", "bodyHtml" => "<img src=\"{\$vd['root']}{\$item['admdir']}/content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"tb2clogo" => array( "width" => "230", "headHtml" => "零售店标", "bodyHtml" => "<img src=\"{\$item['website']}content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"taid" => array( "width" => "60", "headHtml" => "店主", "bodyHtml" => "{\$item['aid']}" ),
				"twebname" => array( "width" => "100", "headHtml" => "店名", "bodyHtml" => "{\$item['webname']}" ),
				"twebsite" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">网址</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['website']}\"><span onclick=\"toInput(this,{\$item['id']},'website')\">{\$item['website']}</span></samp></nobr>" ),
				"tupgrade" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">升级</span>", "bodyHtml" => "<span onclick=\"upgradevip({\$item['aid']})\" style=\"cursor:pointer\">升级</span>" ),
				"tsetup" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">安装</span>", "bodyHtml" => "<span onclick=\"setupvip({\$item['aid']})\" style=\"cursor:pointer\">安装</span>" )
);
?>
