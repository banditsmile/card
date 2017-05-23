<?php
/****************************************/
/*                                      */
/*  诺尔网络 http://www.919dns.com      */
/*  本程序由诺尔核心技术破解            */
/*  技术QQ：36403114                    */
/*                                      */
/****************************************/
$leftinfo = array(
				array(
								"name" => "平台常规",
								"cls" => "jh",
								"id" => array( 0, 0, 0 ),
								"val" => array(
												array( "id" => 99999, "txt" => "平台常规", "url" => "?c=Home&a=Home", "nobr" => 1 ),
												array( "id" => 0, "txt" => "平台基本设置", "url" => "?m=mod_b2b&c=Sys" ),
												array( "id" => 1, "txt" => "平台LOGO管理", "url" => "?m=mod_b2b&c=Logo" ),
												array( "id" => 38, "txt" => "管理员设置", "url" => "?m=mod_b2b&c=Master" ),
												array( "id" => 2, "txt" => "密保卡管理", "url" => "?m=mod_b2b&c=MiBaoKa" ),
												//array( "id" => 3, "txt" => "系统网关管理(重要)", "url" => "?m=mod_b2b&c=SysNet" ),
												array( "id" => 4, "txt" => "支付网关管理", "url" => "?m=mod_b2b&c=Payment" ),
												array( "id" => 5, "txt" => "用户级别体系管理", "url" => "?m=mod_b2b&c=Rank" ),
												array( "id" => 64, "txt" => "系统登陆日志", "url" => "?m=mod_b2b&c=Login" ),
												array( "id" => 6, "txt" => "图片及广告管理", "url" => "?m=mod_b2b&c=Ad" ),
												array( "id" => 6, "txt" => "友情链接管理", "url" => "?m=mod_b2b&c=Ad" ),
												array( "id" => 8, "txt" => "银行汇款账号管理", "url" => "?m=mod_b2b&c=Bank" ),
												array( "id" => 9, "txt" => "标签管理", "url" => "?m=mod_b2b&c=Catalog", "b2c" => 1 ),
												array( "id" => 10, "txt" => "平台投票管理", "url" => "?m=mod_b2b&c=Poll" ),
												array( "id" => 11, "txt" => "外汇汇率设置(单种)", "url" => "?m=mod_b2b&c=FX" ),
												array( "id" => 99999, "txt" => "退出后台", "url" => "?c=Home&a=Logout" )
								)
				),
				/*
				array(
								"name" => "<font color=\"#ff6000\"><b>联售系统</b></font>",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 21, "txt" => "<font color=\"#ff6000\"><b>联售系统</b></font>", "url" => "?m=mod_b2b&c=Sup&a=Search", "nobr" => 1 ),
												array( "id" => 21, "txt" => "<b>进货系统</b>", "url" => "?m=mod_b2b&c=Psi&a=P" ),
												array( "id" => 21, "txt" => "正在进货的商品", "url" => "?m=mod_b2b&c=Psi&a=p&optype=i" ),
												array( "id" => 21, "txt" => "等待供货商审核的商品", "url" => "?m=mod_b2b&c=Psi&a=P&optype=i|w" ),
												array( "id" => 21, "txt" => "供货商审核通过的商品", "url" => "?m=mod_b2b&c=Psi&a=P&optype=i|s" ),
												array( "id" => 21, "txt" => "供货商拒绝审核的商品", "url" => "?m=mod_b2b&c=Psi&a=P&optype=i|d" ),
												array( "id" => 21, "txt" => "<b>供货系统</b>", "url" => "?m=mod_b2b&c=Psi&a=S&optype=o" ),
												array( "id" => 21, "txt" => "所有进货商的请求", "url" => "?m=mod_b2b&c=Psi&a=S&optype=o" ),
												array( "id" => 21, "txt" => "等待我审核的请求", "url" => "?m=mod_b2b&c=Psi&a=S&optype=o|w" ),
												array( "id" => 21, "txt" => "我审核通过的请求", "url" => "?m=mod_b2b&c=Psi&a=S&optype=o|s" ),
												array( "id" => 21, "txt" => "我拒绝通过的请求", "url" => "?m=mod_b2b&c=Psi&a=S&optype=o|d" )
								)
				),*/
				array(
								"name" => "新闻公告",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 30, "txt" => "新闻公告", "url" => "?m=mod_b2b&c=Article", "nobr" => 1 ),
												array( "id" => 30, "txt" => "添加新闻公告", "url" => "?m=mod_b2b&c=Article&a=Add" ),
												array( "id" => 30, "txt" => "编缉新闻公告", "url" => "?m=mod_b2b&c=Article" ),
												array( "id" => 30, "txt" => "新闻分类管理", "url" => "?m=mod_b2b&c=Board" ),
												array( "id" => 44, "txt" => "客户投诉管理", "url" => "?m=mod_b2b&c=Complaint&by=1" ),
												array( "id" => 44, "txt" => "发送站内信", "url" => "?m=mod_b2b&c=PM&a=add" ),
												array( "id" => 44, "txt" => "站内信列表", "url" => "?m=mod_b2b&c=PM&by=1" ),
												//array( "id" => 33, "txt" => "发送有米埠短信息", "url" => "?m=mod_b2b&c=Msg&a=Create" ),
												//array( "id" => 33, "txt" => "有米埠短信息列表", "url" => "?m=mod_b2b&c=Msg&optype=r&ubzisreaded=2" ),
												//array( "id" => 33, "txt" => "有米埠短信息跟踪", "url" => "?m=mod_b2b&c=Msg&optype=s&ubzisreaded=2" ),
												//array( "id" => 33, "txt" => "有米埠未读短信息", "url" => "?m=mod_b2b&c=Msg&optype=r&ubzisreaded=0" ),
												//array( "id" => 33, "txt" => "渠道订单投诉跟踪", "url" => "?m=mod_b2b&c=Msg&mtype=3&optype=s&ubzisreaded=2" )
								)
				),
				array(
								"name" => "平台订单",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 34, "txt" => "平台订单", "url" => "?m=mod_b2b&c=Order&aid=-2", "nobr" => 1 ),
												array( "id" => 34, "txt" => "历史订单", "url" => "?m=mod_b2b&c=Order&aid=-2&ishistory=1", "ishistory" => 1 ),
												array( "id" => 34, "txt" => "待处理订单", "url" => "?m=mod_b2b&c=Order&optype=w&by=1&aid=-2" ),
												array( "id" => 34, "txt" => "已处理订单", "url" => "?m=mod_b2b&c=Order&optype=s&aid=-2" ),
												array( "id" => 34, "txt" => "未付款订单", "url" => "?m=mod_b2b&c=Order&optype=f&aid=-2" ),
												array( "id" => 34, "txt" => "失败订单", "url" => "?m=mod_b2b&c=Order&optype=u&aid=-2" ),
												array( "id" => 41, "txt" => "手工订单未代充", "url" => "?m=mod_b2b&c=Order&a=CzList&optype=sd|w&by=1&aid=-2" ),
												array( "id" => 41, "txt" => "手工订单未充值", "url" => "?m=mod_b2b&c=Order&a=Deal&optype=sd|d&by=1&aid=-2" ),
												array( "id" => 41, "txt" => "手工订单记录", "url" => "?m=mod_b2b&c=Order&a=CzList&optype=sd&aid=-2" ),
												array( "id" => 62, "txt" => "补单处理", "url" => "?m=mod_b2b&c=Bd&aid=-2&ordstate=1&by=1" ),
												array( "id" => 63, "txt" => "补单系统配置", "url" => "?m=mod_b2b&c=Bd&a=Set" ),
												array( "id" => 52, "txt" => "客户常购商品统计", "url" => "?m=mod_b2b&c=Order&a=Often&aid=-2" ),
												array( "id" => 34, "txt" => "七日内订单图表", "url" => "?m=mod_b2b&c=Order&a=Chart&aid=-2" ),
												array( "id" => 35, "txt" => "平台利润报表", "url" => "?m=mod_b2b&c=Profit&aid=-1&s=1" ),
												array( "id" => 35, "txt" => "平台利润报表(历史)", "url" => "?m=mod_b2b&c=Profit&aid=-1&s=1&ishistory=1" )
								)
				),
				array(
								"name" => "系统商品",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 16, "txt" => "系统商品", "url" => "?m=mod_b2b&c=Product&ptype=-1&aid=-1", "nobr" => 1 ),
												array( "id" => 17, "txt" => "商品分类管理", "url" => "?m=mod_b2b&c=Category" ),
												array( "id" => 20, "txt" => "便民中心", "url" => "?m=mod_b2b&c=Quick" ),
												array( "id" => 16, "txt" => "添加商品", "url" => "?m=mod_b2b&c=PS&a=create" ),
												//array( "id" => 19, "txt" => "商品价格管理", "url" => "?m=mod_b2b&c=Price&a=Home" ),
												array( "id" => 19, "txt" => "商品价格模板", "url" => "?m=mod_b2b&c=Price&a=PriceTpl" ),
												array( "id" => 18, "txt" => "商品购买权限", "url" => "?m=mod_b2b&c=Right" ),
												//array( "id" => 16, "txt" => "对外供货商品", "url" => "?m=mod_b2b&c=PS&sup=1&stype=sell&keywords=1&ptype=-1&aid=-1" ),
												//array( "id" => 16, "txt" => "正在进货商品", "url" => "?m=mod_b2b&c=PS&sup=-1&stype=hassup&keywords=1&ptype=-1&aid=-1" ),
												array( "id" => 16, "txt" => "商品库存信息", "url" => "?m=mod_b2b&c=PS&ptype=-1&aid=-1" ),
												array( "id" => 22, "txt" => "区服管理", "url" => "?m=mod_b2b&c=Game" ),
												array( "id" => 22, "txt" => "商品充值模板添加", "url" => "?m=mod_b2b&c=GA&a=Create" ),
												array( "id" => 22, "txt" => "商品充值模板管理", "url" => "?m=mod_b2b&c=GA" ),
												array( "id" => 23, "txt" => "商品评论管理", "url" => "?m=mod_b2b&c=Review", "b2c" => 1 )
								)
				),
				array(
								"name" => "商品卡密",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 24, "txt" => "商品卡密", "url" => "?m=mod_b2b&c=Card&by=1", "nobr" => 1 ),
												array( "id" => 24, "txt" => "卡号管理", "url" => "?m=mod_b2b&c=Card&by=1" ),
												//array( "id" => 24, "txt" => "卡号管理[联售]", "url" => "?m=mod_b2b&c=SCard" ),
												array( "id" => 24, "txt" => "文件导卡", "url" => "?m=mod_b2b&c=Card&a=Add" ),
												array( "id" => 24, "txt" => "批量加卡", "url" => "?m=mod_b2b&c=Card&a=Add" ),
												array( "id" => 24, "txt" => "批量删卡", "url" => "?m=mod_b2b&c=Card&a=Dels" ),
												array( "id" => 24, "txt" => "已售出卡号", "url" => "?m=mod_b2b&c=Card&optype=f&by=1" ),
												array( "id" => 24, "txt" => "未售出卡号", "url" => "?m=mod_b2b&c=Card&optype=s&by=1" ),
												array( "id" => 24, "txt" => "编辑卡号", "url" => "?m=mod_b2b&c=Card&by=1" )
								)
				),
				array(
								"name" => "平台财务",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												/*
												array(
																"id" => 50,
																"txt" => "当日账务信息(联售)",
																"url" => "?m=mod_b2b&c=STrade&startdate=".urlencode( date( "Y-m-d" )." 00:00:00" )
												),
												array( "id" => 50, "txt" => "历史账务信息(联售)", "url" => "?m=mod_b2b&c=STrade" ),
												array(
																"id" => 50,
																"txt" => "渠道供货报表(联售)",
																"url" => "?m=mod_b2b&c=STrade&a=SIndex&startdate=".urlencode( date( "Y-m-d" )." 00:00:00" )
												),*/
												array( "id" => 8, "txt" => "汇款账号管理", "url" => "?m=mod_b2b&c=Bank" ),
												array( "id" => 44, "txt" => "汇款通知书管理", "url" => "?m=mod_b2b&c=Remit&by=1" ),
												array( "id" => 35, "txt" => "平台利润报表", "url" => "?m=mod_b2b&c=Profit&aid=-1&s=1" ),
												array( "id" => 35, "txt" => "订单各项利润报表", "url" => "?m=mod_b2b&c=Profit&aid=-1", "b2b" => 1 ),
												array( "id" => 28, "txt" => "用户代理利润报表", "url" => "?m=mod_b2b&c=Trade&tradetype=11&tpl=agentorderprofit", "b2b" => 1 ),
												array( "id" => 28, "txt" => "用户账号财务信息", "url" => "?m=mod_b2b&c=Trade&tpl=agent" ),
												array( "id" => 26, "txt" => "用户余额转化", "url" => "?m=mod_b2b&c=Agent", "b2b" => 1 )
								)
				),
				array(
								"name" => "一卡通",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 25, "txt" => "一卡通", "url" => "?m=mod_b2b&c=trade&a=state", "nobr" => 1 ),
												array( "id" => 25, "txt" => "一卡通卡密列表", "url" => "?m=mod_b2b&c=Ykt&by=1" ),
												array( "id" => 25, "txt" => "一卡通卡密生成", "url" => "?m=mod_b2b&c=Ykt&a=Create" ),
												array( "id" => 25, "txt" => "一卡通卡密导入", "url" => "?m=mod_b2b&c=ykt&a=add" ),
												array( "id" => 25, "txt" => "一卡通有效状态管理", "url" => "?m=mod_b2b&c=Ykt&a=Group" ),
												array( "id" => 25, "txt" => "一卡通库存管理", "url" => "?m=mod_b2b&c=Ykt&a=Card&ptype=100,101" ),
												array( "id" => 18, "txt" => "一卡通和商品兑换关系", "url" => "?m=mod_b2b&c=Right&stype=param&keywords=ykt", "ykt" => 1 ),
												array( "id" => 25, "txt" => "一卡通使用情况分析", "url" => "?m=mod_b2b&c=Ykt&a=Data", "ykt" => 1 ),
												array( "id" => 34, "txt" => "一卡通换购商品分析", "url" => "?m=mod_b2b&c=Order&payment=100&aid=-1", "ykt" => 1 ),
												array( "id" => 27, "txt" => "一卡通换购充值明细", "url" => "?m=mod_b2b&c=Funds&payment=101&aid=-1", "ykt" => 1 ),
												array( "id" => 54, "txt" => "一卡通卡状态查询", "url" => "?m=mod_b2b&c=trade&a=state", "ykt" => 1 ),
												array( "id" => 25, "txt" => "一卡通与代理商绑定", "url" => "?m=mod_b2b&c=Ykt&a=BindIndex&by=1", "ykt" => 1 ),
												array( "id" => 49, "txt" => "一卡通返点管理", "url" => "?m=mod_b2b&c=Reward&a=Home", "ykt" => 1 ),
												array( "id" => 55, "txt" => "一卡通转卡权限设置", "url" => "?m=mod_b2b&c=YT&permit=-1", "ykt" => 1 ),
												array( "id" => 56, "txt" => "一卡通经销商名录", "url" => "?m=mod_b2b&c=Addr&forykt=1", "ykt" => 1 )
								)
				),
				array(
								"name" => "平台用户",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 26, "txt" => "平台用户", "url" => "?m=mod_b2b&c=Agent", "nobr" => 1 ),
												//array( "id" => 16, "txt" => "供货商品管理", "url" => "?m=mod_b2b&c=Product&allaid=1&aid=-1&ptype=-1", "b2b" => 1 ),
												//array( "id" => 34, "txt" => "供货商品订单", "url" => "?m=mod_b2b&c=Order&aid=-3", "b2b" => 1 ),
												//array( "id" => 34, "txt" => "供货商品订单(历史)", "url" => "?m=mod_b2b&c=Order&aid=-3&ishistory=1", "b2b" => 1, "ishistory" => 1 ),
												//array( "id" => 35, "txt" => "供货商品销售报表", "url" => "?m=mod_b2b&c=Profit&allaid=1", "b2b" => 1 ),
												array( "id" => 57, "txt" => "用户分站管理", "url" => "?m=mod_b2b&c=EShop", "isvip" => 1 ),
												array( "id" => 65, "txt" => "淘宝自动充值", "url" => "?m=mod_b2b&c=Tb", "istb" => 1 ),
												array( "id" => 26, "txt" => "所有用户列表", "url" => "?m=mod_b2b&c=Agent" ),
												array( "id" => 26, "txt" => "用户关系转化", "url" => "?m=mod_b2b&c=Agent&a=Relation", "b2b" => 1 ),
												array( "id" => 27, "txt" => "用户充值记录", "url" => "?m=mod_b2b&c=Funds" ),
												array( "id" => 58, "txt" => "用户资金/余额管理", "url" => "?m=mod_b2b&c=Money", "b2b" => 1 ),
												array( "id" => 28, "txt" => "用户帐务报表", "url" => "?m=mod_b2b&c=Trade&tpl=agent" ),
												array( "id" => 28, "txt" => "用户帐务历史报表", "url" => "?m=mod_b2b&c=Trade&tpl=agent&ishistory=1", "ishistory" => 1 ),
												array( "id" => 28, "txt" => "用户代理利润报表", "url" => "?m=mod_b2b&c=Trade&tradetype=11&tpl=agentorderprofit", "b2b" => 1 ),
												array( "id" => 28, "txt" => "用户代理利润历史报表", "url" => "?m=mod_b2b&c=Trade&tradetype=11&tpl=agentorderprofit&ishistory=1", "ishistory" => 1 ),
												array( "id" => 28, "txt" => "用户供货所得报表", "url" => "?m=mod_b2b&c=Trade&tradetype=12&tpl=agentproductprofit", "b2b" => 1 ),
												array( "id" => 28, "txt" => "用户供货所得历史报表", "url" => "?m=mod_b2b&c=Trade&tradetype=12&tpl=agentproductprofit", "b2b" => 1 ),
												array( "id" => 29, "txt" => "用户的员工列表", "url" => "?m=mod_b2b&c=Staff", "b2b" => 1 )
								)
				),

	array(
								"name" => "用户商品",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 16, "txt" => "用户商品", "url" => "?m=mod_b2b&c=Product&allaid=1&aid=-1&ptype=-1", "b2b" => 1 ),
												array( "id" => 34, "txt" => "用户商品订单", "url" => "?m=mod_b2b&c=Order&aid=-3", "b2b" => 1 ),
												array( "id" => 34, "txt" => "用户商品订单(历史)", "url" => "?m=mod_b2b&c=Order&aid=-3&ishistory=1", "b2b" => 1, "ishistory" => 1 ),
												array( "id" => 35, "txt" => "用户商品销售报表", "url" => "?m=mod_b2b&c=Profit&allaid=1", "b2b" => 1 ),
												//array( "id" => 60, "txt" => "清理平台缓存", "url" => "?m=mod_b2b&c=Cache&a=Clear" )
								)
				),
array(
								"name" => "平台数据",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 12, "txt" => "平台数据", "url" => "?m=mod_b2b&c=Html&a=Home", "nobr" => 1 ),
												array( "id" => 12, "txt" => "生成静态页面", "url" => "?m=mod_b2b&c=Html&a=Home" ),
												array( "id" => 7, "txt" => "平台网站升级", "url" => "?m=mod_b2b&c=Fs" ),
												//array( "id" => 13, "txt" => "备份当前模板", "url" => "?m=mod_b2b&c=Fs&a=BakTplHome" ),
												array( "id" => 14, "txt" => "选择网站风格", "url" => "?m=mod_b2b&c=Fs&a=ListTpl" ),
												array( "id" => 59, "txt" => "自定义网站风格", "url" => "?m=mod_b2b&c=Theme" ),
												array( "id" => 60, "txt" => "清理平台缓存", "url" => "?m=mod_b2b&c=Cache&a=Clear" )
								)
				),
				array(
								"name" => "应用中心",
								"cls" => "xsjl",
								"id" => array( 5, 1, 34, 11, 38 ),
								"val" => array(
												array( "id" => 15, "txt" => "应用中心", "url" => "?m=mod_b2b&c=App", "nobr" => 1 )
								)
				)
);
?>
