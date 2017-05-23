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
				"tname" => array( "width" => "400", "headHtml" => "<span class=\"canedit\">名称</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'name')\">{\$item['name']}</span></nobr>" ),
				"ttovip" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">共享</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['tovip'])}\" onclick=\"toToggle(this,{\$item['id']},'tovip')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"child" => array( "width" => "120", "headHtml" => "<b>查看分类文章</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=article&boardid={\$item['id']}\">查看分类文章</a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"编辑用户\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" )
);
?>
