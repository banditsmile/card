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
				"pname" => array( "width" => "250", "headHtml" => "<b>商品名称</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>卡号</b>", "bodyHtml" => "{\$item['cardnumber']}" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>密码</b>", "bodyHtml" => "已加密" ),
				"hassold" => array( "width" => "80", "headHtml" => "<b>是否售出</b>", "bodyHtml" => "<!--if(\$item['ordno'] == ''){--><a href=\"index.php?m=mod_b2b&c=Card&by=1&optype=s&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\"><font color=\"#008800\">未售出</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Card&by=1&optype=f&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\"><font color=\"#ff0000\">已售出</font></a><!--}-->" ),
				"cardok" => array( "width" => "60", "headHtml" => "<b>状态</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Card&by=1&cardok={\$item['cardok']}&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\">{#YktCardState(\$item['cardok'])}</a>" ),
				"addeddate" => array( "width" => "140", "headHtml" => "<b>添加时间</b>", "bodyHtml" => "{\$item['addeddate']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>售出时间</b>", "bodyHtml" => "{\$item['orddate']}" )
);
?>
