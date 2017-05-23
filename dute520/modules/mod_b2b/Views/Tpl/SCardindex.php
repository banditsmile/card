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
				"pname" => array( "width" => "250", "headHtml" => "<b>商品名称</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['ubzpname']}\">{\$item['ubzpname']}</samp></nobr>" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>卡号</b>", "bodyHtml" => "{\$item['ubzcardnumber']}" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>密码</b>", "bodyHtml" => "已加密" ),
				"cardok" => array( "width" => "60", "headHtml" => "<b>状态</b>", "bodyHtml" => "{#CardState(\$item['ubzcardok'])}" ),
				"addate" => array( "width" => "140", "headHtml" => "<b>添加时间</b>", "bodyHtml" => "{\$item['ubzaddate']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>订单号</b>", "bodyHtml" => "{\$item['ubzordno']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>售出时间</b>", "bodyHtml" => "{\$item['ubzorddate']}" )
);
?>
