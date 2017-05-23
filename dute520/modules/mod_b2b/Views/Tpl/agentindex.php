<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['cid']}\" onFocus=\"this.blur()\">" ),
				"aid" => array( "width" => "50", "headHtml" => "编号", "bodyHtml" => "{\$item['aid']}" ),
				"aname" => array( "width" => "80", "headHtml" => "用户名", "bodyHtml" => "<nobr><samp title=\"{\$item['aname']}\">{\$item['aname']}</samp></nobr>" ),
				"company" => array( "width" => "100", "headHtml" => "公司名称", "bodyHtml" => "<nobr><samp title=\"{\$item['company']}\">{\$item['company']}</samp></nobr>", "str" => "UB_B2B" ),
				"bind" => array( "width" => "22", "headHtml" => "绑", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Security&a=Bind&aid={\$item['aid']}&staffid=0\" title=\"绑定设置\"><img src=\"{\$vd['sc']}images/bind.gif\"/></a>", "str" => "UB_B2B" ),
				"eshop" => array( "width" => "250", "headHtml" => "网店地址", "bodyHtml" => "<nobr><samp title=\"{\$item['eshop']}\">{\$item['eshop']}</samp></nobr>", "str" => "UB_B2B" ),
				"rank" => array( "width" => "80", "headHtml" => "用户级别", "bodyHtml" => "<nobr><a href=\"index.php?m=mod_b2b&c=agent&stype=alv&keywords={\$item['alv']}\" title=\"查看所有{\$item['rank']}列表\">{\$item['rank']}</a></nobr>" ),
				"zone" => array( "width" => "90", "headHtml" => "所属区域", "bodyHtml" => "<nobr><samp title=\"{\$item['prv']}{\$item['city']}\">{\$item['prv']}{\$item['city']}</samp></nobr>" ),
				"parent" => array( "width" => "40", "headHtml" => "上级", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&parentid={\$item['parentid']}\"><font color=\"#ff0000\">{#DisplayCode(\$item['parentid'])}</font></a>", "str" => "UB_B2B" ),
				"child" => array( "width" => "55", "headHtml" => "下级", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&parentid={\$item['aid']}\"><font color=\"#0000ff\">{\$item['underlingcount']}个</font></a>", "str" => "UB_B2B" ),
				"remain" => array( "width" => "120", "headHtml" => "余额", "bodyHtml" => "{\$item['aremain']}" ),
				"csmp" => array( "width" => "120", "headHtml" => "消费", "bodyHtml" => "{\$item['acsmp']}" ),
				"frozen" => array( "width" => "35", "headHtml" => "开通", "bodyHtml" => "<!--if(\$item['frozen'] == 1){--> <font color=\"#ff0000\">冻结</font> <!--}else{--> <font color=\"#008800\">启动</font> <!--}-->\t" ),
				"addfunds" => array( "width" => "22", "headHtml" => "款", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&a=AddFunds&aid={\$item['aid']}\"><img src=\"{\$vd['sc']}images/money.gif\" border=\"0\"/></a>" ),
				"addloan" => array( "width" => "22", "headHtml" => "欠", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Loan&a=Add&aid={\$item['aid']}\">欠</a>" ),
				"trade" => array( "width" => "22", "headHtml" => "账", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Trade&tpl=agent&stype=aid&keywords={\$item['aid']}&by=1\" title=\"查看{\$item['aid']}账务记录\"><img src=\"{\$vd['sc']}images/check.gif\"/></a>" ),
				"prifunds" => array( "width" => "35", "headHtml" => "密价", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=product&a=simple\">密价</a>" ),
				"buyright" => array( "width" => "70", "headHtml" => "不允权限", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Right&a=Right&param=aid&idx={\$item['aid']}&isok=-1\">设置</a>" ),
				"funds" => array( "width" => "35", "headHtml" => "资金", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=agent&a=lock&aid={\$item['aid']}\"><font color=\"#ff0000\">管理</font></a>", "str" => "UB_B2B" ),
				"regdate" => array( "width" => "140", "headHtml" => "注册时间", "bodyHtml" => "{\$item['regdate']}" ),
				"regip" => array( "width" => "120", "headHtml" => "注册IP", "bodyHtml" => "{\$item['regip']}" ),
				"lastdate" => array( "width" => "140", "headHtml" => "上次登陆时间", "bodyHtml" => "{\$item['lastdate']}" ),
				"lastip" => array( "width" => "120", "headHtml" => "上次登录IP", "bodyHtml" => "{\$item['lastip']}" ),
				"remarks" => array( "width" => "200", "headHtml" => "备注信息", "bodyHtml" => "<nobr><samp title=\"{\$item['remarks']}\">{\$item['remarks']}</samp></nobr>" ),
				"ask" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/ask.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzaname={\$item['aname']}&aid=-1\" title=\"查看客户留言\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/ask.gif\"/></a>" ),
				"msg" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/msg.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=PM&a=add&aid={\$item['aid']}\" title=\"给{\$item['aname']}发送站内短信息\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/msg.gif\"/></a>" ),
				"consump" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/rmb.png\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=order&ubzaname={\$item['aname']}&aid=-1\" title=\"查看{\$item['aname']}消费记录\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/rmb.png\"/></a>" ),
				"edit" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_edit.gif\"/>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=customer&a=detail&ubzcid={\$item['cid']}\" title=\"编辑用户\" onFocus=\"this.blur()\"><img src=\"{\$vd['sc']}images/icon_edit.gif\"/></a>" ),
				"del" => array( "width" => "22", "headHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\"/>", "bodyHtml" => "<img src=\"{\$vd['sc']}images/icon_trash.gif\" onclick=\"delSubmit({\$item['cid']})\" alt=\"删除用户,相关信息也会被删除\" style=\"cursor:pointer\"/>" ),
				"aqq" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">QQ</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['aqq']}\"><span onclick=\"toInput(this,{\$item['aid']},'aqq')\">{\$item['aqq']}</span></samp></nobr>" ),
				"amail" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">邮箱</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['amail']}\"><span onclick=\"toInput(this,{\$item['aid']},'amail')\">{\$item['amail']}</span></samp></nobr>" ),
				"atel" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">电话</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['atel']}\"><span onclick=\"toInput(this,{\$item['aid']},'atel')\">{\$item['atel']}</span></samp></nobr>" ),
				"mobile" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">手机</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['mobile']}\"><span onclick=\"toInput(this,{\$item['aid']},'mobile')\">{\$item['mobile']}</span></samp></nobr>" ),
				"aaddr" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">住址</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['aaddr']}\"><span onclick=\"toInput(this,{\$item['aid']},'aaddr')\">{\$item['aaddr']}</span></samp></nobr>" ),
				"realname" => array( "width" => "70", "headHtml" => "<span class=\"canedit\">真实姓名</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['arealname']}\"><span onclick=\"toInput(this,{\$item['aid']},'arealname')\">{\$item['arealname']}</span></samp></nobr>" ),
				"zip" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">邮编</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['zip']}\"><span onclick=\"toInput(this,{\$item['aid']},'zip')\">{\$item['zip']}</span></samp></nobr>" ),
				"income" => array( "width" => "120", "headHtml" => "代理利润", "bodyHtml" => "<!--echo round(\$item['income'],3);-->", "str" => "UB_B2B" )
);
?>
