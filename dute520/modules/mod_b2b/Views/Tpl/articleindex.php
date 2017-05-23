<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['cid']}\" onFocus=\"this.blur()\">" ),
				"title" => array( "width" => "300", "headHtml" => "<span class=\"canedit\">主题</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['title']}\"><span onclick=\"toInput(this,{\$item['id']},'title')\">{\$item['title']}</span></samp></nobr>" ),
				"tick" => array( "width" => "100", "headHtml" => "<b>点击</b>", "bodyHtml" => "{\$item['tick']}" ),
				"ndate" => array( "width" => "150", "headHtml" => "<b>发表时间</b>", "bodyHtml" => "{\$item['ndate']}" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"编辑用户\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" )
);
?>
