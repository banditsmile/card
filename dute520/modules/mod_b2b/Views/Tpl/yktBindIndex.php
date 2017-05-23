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
				"pid" => array( "width" => "65", "headHtml" => "<b>商品编号</b>", "bodyHtml" => "{\$item['pid']}" ),
				"cardnumber" => array( "width" => "150", "headHtml" => "<b>卡号</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=trade&a=state&keywords={\$item['cardnumber']}\">{\$item['cardnumber']}</a>" ),
				"cprice" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">售价</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['id']}','cprice')\">{\$item['cprice']}</span>" ),
				"cardpwd" => array( "width" => "60", "headHtml" => "<b>密码</b>", "bodyHtml" => "已加密" ),
				"cardgroup" => array( "width" => "35", "headHtml" => "<b>批次</b>", "bodyHtml" => "{\$item['cardgroup']}" ),
				"ordno" => array( "width" => "150", "headHtml" => "<b>订单号</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\">{\$item['ordno']}</a>" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<!--if(\$item['ordno'] != ''){--><!--if(\$item['ptype']==101){--><a href=\"index.php?m=mod_b2b&c=trade&a=state&keywords={\$item['cardnumber']}\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=order&a=detail&ubzordno={\$item['ordno']}\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a><!--}--><!--}else{--><font color=\"#cccccc\">无</font><!--}-->" ),
				"hassold" => array( "width" => "70", "headHtml" => "<b>是否售出</b>", "bodyHtml" => "<!--if(\$item['ordno'] == ''){--><a href=\"index.php?m=mod_b2b&c=Ykt&by=1&optype=s&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\"><font color=\"#008800\">未售出</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Ykt&by=1&optype=f&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\"><font color=\"#ff0000\">已售出</font></a><!--}-->" ),
				"addfunds" => array( "width" => "22", "headHtml" => "款", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Ykt&a=AddFunds&ubzid={\$item['id']}\"><img src=\"{\$vd['sc']}images/money.gif\" border=\"0\"/></a>" ),
				"tcardok" => array( "width" => "50", "headHtml" => "<b>状态</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Ykt&by=1&cardok={\$item['cardok']}&inrecycle={\$vd['inrecycle']}\" title=\"点击查看对应状态卡密\">{#YktCardState(\$item['cardok'])}</a>" ),
				"money" => array( "width" => "70", "headHtml" => "<b>卡余额</b>", "bodyHtml" => "<!--if(\$item['money']==0){--><font color=\"#6c6c6c\">{\$item['money']} {\$vd['lang']['moneyunit']}</font><!--}else{--><font color=\"#008800\">{\$item['money']} {\$vd['lang']['moneyunit']}</font><!--}-->" ),
				"bind" => array( "width" => "70", "headHtml" => "<b>绑定商品</b>", "bodyHtml" => "<!--if(\$item['bindpid'] == ''){--><font color=\"#6c6c6c\">未绑定</font><!--}else{--><font color=\"#ff0000\">{\$item['bindpid']}</font><!--}-->" ),
				"addeddate" => array( "width" => "140", "headHtml" => "<b>添加时间</b>", "bodyHtml" => "{\$item['addeddate']}" ),
				"orddate" => array( "width" => "140", "headHtml" => "<b>售出时间</b>", "bodyHtml" => "{\$item['orddate']}" )
);
?>
