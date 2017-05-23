<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"vip" => array( "width" => "130", "headHtml" => "<b>操作ＩＰ</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=vinfo&stype=vip&keywords={\$item['vip']}\">{\$item['vip']}</a>" ),
				"vcount" => array( "width" => "70", "headHtml" => "<b>ＩＰ访数</b>", "bodyHtml" => "{\$item['vcount']}" ),
				"vsn" => array( "width" => "70", "headHtml" => "<b>机器序号</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=vinfo&stype=vsn&keywords={\$item['vsn']}\">{\$item['vsn']}</a>" ),
				"vsncount" => array( "width" => "70", "headHtml" => "<b>机器访数</b>", "bodyHtml" => "{\$item['vsncount']}" ),
				"vref" => array( "width" => "150", "headHtml" => "<b>来源网址</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vref']}\" size=\"20\"/>" ),
				"vname" => array( "width" => "70", "headHtml" => "<b>操作用户</b>", "bodyHtml" => "{\$item['vname']}" ),
				"vgo" => array( "width" => "150", "headHtml" => "<b>操作页面</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vgo']}\" size=\"20\"/>" ),
				"vreq" => array( "width" => "150", "headHtml" => "<b>页面内容</b>", "bodyHtml" => "<input type=\"text\" value=\"{\$item['vreq']}\" size=\"10\"/><a href=\"<!--echo \$item['vreq']=='空'?\$item['vgo'] : \$item['vgo'].'?'.\$item['vreq'];-->\" target=\"_blank\">go</a>" ),
				"vdate" => array( "width" => "150", "headHtml" => "<b>访问时间</b>", "bodyHtml" => "{\$item['vdate']}" )
);
?>
