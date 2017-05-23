<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"pname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">商品名称</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\"><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></samp></nobr>" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>商品类型</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"listprice" => array( "width" => "65", "headHtml" => "<span class=\"canedit\">商品面值</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'listprice')\">{\$item['listprice']}</span>" ),
				"price" => array( "width" => "65", "headHtml" => "<span class=\"canedit\">进货价</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'price')\">{\$item['price']}</span>" ),
				"sell" => array( "width" => "22", "headHtml" => "<b>卖</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"priceset" => array( "width" => "85", "headHtml" => "<b>是否有定价</b>", "bodyHtml" => "<!--if(\$item['priceset'] > 0){--> 有定价 <!--}else{--> <font color=\"#cccccc\">无定价</font> <!--}-->" ),
				"setprice" => array( "width" => "50", "headHtml" => "<b>定价</b>", "bodyHtml" => "[<a href=\"?m=mod_b2b&c=product&a=price&pid={\$item['pid']}\"><font color=\"#00875A\">定价</font></a>]" ),
				"privatepriceset" => array( "width" => "85", "headHtml" => "<b>是否有密价</b>", "bodyHtml" => "<!--if(\$item['privatepriceset'] > 0){--> 有密价 <a href=\"javascript:PPClear('{\$item['pid']}')\">清除</a><!--}else{--> <font color=\"#cccccc\">无密价</font><!--}-->" ),
				"setprivateprice" => array( "width" => "50", "headHtml" => "<b>密价</b>", "bodyHtml" => "[<a href=\"?m=mod_b2b&c=product&a=PP&pid={\$item['pid']}\"><font color=\"#00875A\">密价</font></a>]" )
);
?>
