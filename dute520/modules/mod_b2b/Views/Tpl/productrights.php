<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"pname" => array( "width" => "200", "headHtml" => "<b>商品名称</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span>" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>商品类型</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"sell" => array( "width" => "22", "headHtml" => "<b>卖</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"点击此图片即可修改状态\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"listprice" => array( "width" => "65", "headHtml" => "<b>商品面值</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"price" => array( "width" => "65", "headHtml" => "<b>进货价</b>", "bodyHtml" => "{\$item['price']}" ),
				"sup" => array( "width" => "65", "headHtml" => "<b>供货商</b>", "bodyHtml" => "{\$item['aid']}" )
);
?>
