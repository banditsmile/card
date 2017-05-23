<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"aid" => array( "width" => "90", "headHtml" => "<b>所属</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\">{#ComeFrom(\$item['comefrom'])}</a>(<a href=\"index.php?m=mod_b2b&c=order&aid={\$item['aid']}&comefrom={\$item['comefrom']}&by=1&inrecycle={\$vd['inrecycle']}\" onclick=\"loadDisp(1)\"><font color=\"#ff0000\">{#DisplayCode(\$item['aid'])}</font></a>)" ),
				"cztype" => array( "width" => "160", "headHtml" => "<b>业务类型</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['cztype']}\">{\$item['cztype']}</samp></nobr>" ),
				"remark" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">备注</span>", "bodyHtml" => "{\$item['remark']}" ),
				"view" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_view.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Bd&a=detail&id={\$item['id']}\" title=\"查看订单\" onFocus=\"this.blur()\" onclick=\"loadDisp(1)\"><img src=\"{\$vd['sc']}images/icon_view.gif\"/></a>" ),
				"admremark" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">管理员回复</span>", "bodyHtml" => "<span onclick=\"toInput(this,'{\$item['id']}','admremark')\"><!--if(\$item['admremark']==''){-->--<!--}else{-->{\$item['admremark']}<!--}--></span>" ),
				"createdate" => array( "width" => "140", "headHtml" => "<b>提交时间</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"cip" => array( "width" => "120", "headHtml" => "<b>提交者IP</b>", "bodyHtml" => "{\$item['cip']}" ),
				"islight" => array( "width" => "50", "headHtml" => "<b>图标亮</b>", "bodyHtml" => "<!--if(\$item['islight']==0){--><font color=\"#6a6a6a\">不亮</font><!--}else{--><font color=\"#0000ff\">亮</font><!--}-->" ),
				"state" => array( "width" => "95", "headHtml" => "<b>订单状态</b>", "bodyHtml" => "{#OrderStateBd(\$item['ordstate'])}" ),
				"czaccount" => array( "width" => "90", "headHtml" => "<b>充值账号</b>", "bodyHtml" => "<span onclick=\"copyToClipboard('{\$item['czaccount']}')\" style=\"cursor:pointer\" title=\"点击直接复制\">{\$item['czaccount']}</span>" ),
				"accpwd" => array( "width" => "120", "headHtml" => "<b>账号密码</b>", "bodyHtml" => "<span onclick=\"copyToClipboard('{\$item['accpwd']}')\" style=\"cursor:pointer\" title=\"点击直接复制\">{\$item['accpwd']}</span>" ),
				"quickcheck" => array( "width" => "35", "headHtml" => "<b>提交</b>", "bodyHtml" => "<!--if(\$item['ordstate']!=1 ){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==1 ? 0 : 1)}\" onclick=\"toToggle(this,'{\$item['id']}','ordstate')\" alt=\"点此马上修改订单状态为交易完成状态！\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}-->" ),
				"suc" => array( "width" => "35", "headHtml" => "<b>成功</b>", "bodyHtml" => "<!--if(\$item['ordstate']==2){--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" /><!--}else{--><img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['ordstate']==2 ? 1 : 0)}\" onclick=\"toToggle(this,'{\$item['id']}','ordstate3')\" alt=\"点此马上修改订单状态为交易完成状态！\" onFocus=\"this.blur()\" class=\"mousehand\"/><!--}-->" ),
				"cz" => array( "width" => "40", "headHtml" => "<b>补单</b>", "bodyHtml" => "<input type=\"button\" value=\"处理\" class=\"button\" style=\"width:35px;\" onclick=\"window.location='?m=mod_b2b&c=bd&a=cetail&id={\$item['id']}'\"/>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" ),
				"tadmin" => array( "width" => "120", "headHtml" => "<b>补单管理员</b>", "bodyHtml" => "{\$item['admname']}" )
);
?>
