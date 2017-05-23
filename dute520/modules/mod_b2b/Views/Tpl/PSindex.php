<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['pid']}\" onFocus=\"this.blur()\">" ),
				"pname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">商品名称</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\"><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></samp></nobr>" ),
				"totlestocks" => array( "width" => "50", "headHtml" => "<b>总库存</b>", "bodyHtml" => "{\$item['totlestocks']}" ),
				"supstocks" => array( "width" => "65", "headHtml" => "<b>供货库存</b>", "bodyHtml" => "{\$item['supstocks']}" ),
				"stocks" => array( "width" => "40", "headHtml" => "<b>本地</b>", "bodyHtml" => "{\$item['stocks']}" ),
				"pinyin" => array( "width" => "35", "headHtml" => "<b>拼音</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'pinyin')\"><!--echo \$item['pinyin']==''?'--':\$item['pinyin'];--></span>" ),
				"addstocks" => array( "width" => "65", "headHtml" => "<b>添加库存</b>", "bodyHtml" => "{#PCardsPtype(\$item['ptype'], \$item['pid'])}" ),
				"sellyd" => array( "width" => "65", "headHtml" => "<b>昨日售出</b>", "bodyHtml" => "{\$item['sellyd']}" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>商品类型</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"aid" => array( "width" => "65", "headHtml" => "<b>所属</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&stype=aid&keywords={\$item['aid']}\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>", "str" => "UB_B2B" ),
				"pid" => array( "width" => "40", "headHtml" => "<b>编号</b>", "bodyHtml" => "{\$item['pid']}" ),
				"forb2b" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forb2b&keywords=1\"><span class=\"canedit\"><u>批</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['pid']},'forb2b')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B" ),
				"forshop" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forshop&keywords=1\"><span class=\"canedit\"><u>零</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forshop'])}\" onclick=\"toToggle(this,{\$item['pid']},'forshop')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"forykt" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=forykt&keywords=1\"><span class=\"canedit\"><u>一</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['pid']},'forykt')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_YKT" ),
				"sell" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=sell&keywords=1\"><span class=\"canedit\"><u>卖</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"new" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=new&keywords=1\"><span class=\"canedit\"><u>新</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['new'])}\" onclick=\"toToggle(this,{\$item['pid']},'new')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"hot" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=hot&keywords=1\"><span class=\"canedit\"><u>热</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['hot'])}\" onclick=\"toToggle(this,{\$item['pid']},'hot')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"remd" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=remd&keywords=1\"><span class=\"canedit\"><u>荐</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['remd'])}\" onclick=\"toToggle(this,{\$item['pid']},'remd')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" ),
				"sup" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=sup&keywords=1\"><span class=\"canedit\"><u>供</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sup'])}\" onFocus=\"this.blur()\"/>" ),
				"checked" => array( "width" => "22", "headHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&ptype=-1&aid=-1&stype=checked&keywords=1\"><span class=\"canedit\"><u>审</u></span></a>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checked'])}\" onclick=\"toToggle(this,{\$item['pid']},'checked')\" alt=\"点击此图片即可修改状态！请务必保证您已经设置供货价格！\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"查看消费\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PS&a=detail&ubzpid={\$item['pid']}\" title=\"编辑商品\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['pid']})\" alt=\"删除商品,相关信息也会被删除\" style=\"cursor:pointer\"/>" )
);
?>
