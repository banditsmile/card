<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "35", "headHtml" => "<b>平台</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Funds&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\">{#ComeFrom(\$item['comefrom'])}</a>", "str" => "UB_B2B+UB_B2C>1" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>订单号</b>", "bodyHtml" => "<nobr>{\$item['ordno']}</nobr>" ),
				"dollars" => array( "width" => "70", "headHtml" => "<b>支付金额</b>", "bodyHtml" => "{\$item['dollars']}" ),
				"cname" => array( "width" => "80", "headHtml" => "<b>用户名</b>", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=Funds&comefrom={\$item['comefrom']}&cname={\$item['cname']}&by=1\" onclick=\"loadDisp(1)\" title=\"点击查看这个用户购买的所有的单子\">{\$item['cname']}</a></nobr>" ),
				"payment" => array( "width" => "90", "headHtml" => "<b>支付方式</b>", "bodyHtml" => "{#GetPayment(\$item['payment'],\$item['ordno'])}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>下单时间</b>", "bodyHtml" => "{\$item['orddate']}" ),
				"cip" => array( "width" => "120", "headHtml" => "<b>下单者IP</b>", "bodyHtml" => "{\$item['cip']}" ),
				"state" => array( "width" => "70", "headHtml" => "<b>订单状态</b>", "bodyHtml" => "{#OrderState(\$item['ordstate'], 1)}" ),
				"remarks" => array( "width" => "250", "headHtml" => "<b>备注</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\"><!--if(\$item['admname'] != ''){-->(<a href=\"index.php?m=mod_b2b&c=Funds&by=1&stype=admname&keywords={\$item['admname']}\">{\$item['admname']}</a>)<!--}-->{\$item['remarks']}</samp></nobr>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" )
);
?>
