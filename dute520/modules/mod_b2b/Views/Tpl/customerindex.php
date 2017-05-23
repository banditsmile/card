<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"name" => array( "width" => "120", "headHtml" => "<b>用户名</b>", "bodyHtml" => "{\$item['cname']}" ),
				"tcid" => array( "width" => "35", "headHtml" => "<b>编号</b>", "bodyHtml" => "{\$item['cid']}" ),
				"realname" => array( "width" => "120", "headHtml" => "<b>真实姓名</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'crealname')\">{\$item['crealname']}</span>" ),
				"email" => array( "width" => "120", "headHtml" => "<b>邮箱</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cmail')\">{\$item['cmail']}</span>" ),
				"tel" => array( "width" => "120", "headHtml" => "<b>电话</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'ctel')\">{\$item['ctel']}</span>" ),
				"qq" => array( "width" => "120", "headHtml" => "<b>QQ</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cqq')\">{\$item['cqq']}</span>" ),
				"remain" => array( "width" => "80", "headHtml" => "<b>账户余额</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['cid']},'cremain')\"><!--if(\$item['cremain']){-->{\$item['cremain']}<!--}else{-->0<!--}--></span>" ),
				"clv" => array( "width" => "100", "headHtml" => "<b>级别</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Customer&optype={\$item['clv']}\">{#TxtByOption(\$vd['rank'],\$item['clv'], 'name', 'id')}</a>" ),
				"addr" => array( "width" => "140", "headHtml" => "<b>住址</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['caddr']}\"><span onclick=\"toInput(this,{\$item['cid']},'caddr')\">{\$item['caddr']}</span></samp></nobr>" ),
				"csmp" => array( "width" => "80", "headHtml" => "<b>总消费额</b>", "bodyHtml" => "{\$item['ccsmp']}" ),
				"regdate" => array( "width" => "140", "headHtml" => "<b>注册时间</b>", "bodyHtml" => "{\$item['regdate']}" ),
				"regip" => array( "width" => "120", "headHtml" => "<b>注册IP</b>", "bodyHtml" => "{\$item['regip']}" ),
				"lastdate" => array( "width" => "140", "headHtml" => "<b>上次登陆时间</b>", "bodyHtml" => "{\$item['lastdate']}" ),
				"lastip" => array( "width" => "120", "headHtml" => "<b>上次登录IP</b>", "bodyHtml" => "{\$item['lastip']}" ),
				"remarks" => array( "width" => "200", "headHtml" => "<b>备注信息</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\">{\$item['remarks']}</samp></nobr>" ),
				"ask" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/ask.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"查看客户留言\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/ask.gif\"/></a>" ),
				"msg" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/msg.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"查看站内信息\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/msg.gif\"/></a>" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzcname={\$item['cname']}&aid=-1\" title=\"查看消费\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"编辑用户\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" )
);
?>
