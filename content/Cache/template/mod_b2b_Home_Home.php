<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	售卡中心 - 首页
</title><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><link href="/index/css/common.css" type="text/css" rel="stylesheet" /><link href="/index/css/page.css" type="text/css" rel="stylesheet" />
    <style media="all" type="text/css">
        .ip {padding:5px;border-bottom: 1px dashed #ddd; }
        .fen {padding:7px;font-size:14px}
        .fen img {vertical-align:middle;margin-right:5px}
        .fen span {margin-right:30px}
        .ip span {color:#5caed9;padding-right:30px;}
        .fen a,.fen a:visited {font-size:12px;text-decoration:underline;color:#0064e0}
        .fen font {padding-right:5px;font-weight:bold}
        .fen1 font {color:red}
        .fen2 font {color:#090}
        .fen3 font {color:#f60}
        .fen4 {margin:0}
     
        .news h2 {font-size:12px;background:url(/index/images/h_skin1/gonggao_h2_di.png) repeat-x;height:27px;line-height:27px;padding-left:10px;border-bottom:1px solid #bdd3e6}
        .news ul {padding:5px}
        .gonggao {border:1px solid #bdd3e6;}
        .gonggao li {height:22px;_height:20px;line-height:22px;_line-height:20px;padding-left:13px;border-bottom:1px dotted #eee;background:url(/index/images/h_skin1/li_di3.gif) no-repeat 3px 50%;}
        .gonggao .left {float:left;width:301px;overflow: hidden;text-overflow:ellipsis}
        .gonggao .right {float:right;width:57px;color:#999;font-size:10px;text-align:right}
.STYLE2 {color: #FF6600}
    </style>
</head>
<body>
<form name="form1" method="post" action="Home.html" id="form1">
  <script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>
<div class="zhanghu">
          <ul>
            <li class="li1"><span class="left"><span class="dl_hy">您好，<span style="margin-top:20"><?php echo $vd['agent'][1]; ?></span>！</span><span class="setup_index" style="height: 27px;
                        line-height: 27px; _height: 10px; _line-height: 10px">
              <input name="checkbox" type="checkbox" value="checkbox" checked="checked" />
              <label for="lbtnLogin">登录后到这页</label>
            </span></span><span
                            class="right"><a href="index.php?m=mod_agent&amp;c=Home">账户管理</a></span></li>
            <li style="color: #888"><span class="left">上次登录IP：<?php echo $vd['logininfo']['lastip']; ?>，
              登录时间：<?php echo $vd['logininfo']['lastdate']; ?>， 登录账号：总账号， 登录方式：页面登录</span><span
                            class="right"><a href="index.php?m=mod_agent&amp;c=trade&amp;tpl=history">资金明细</a></span></li>
            <li><span class="left">未还欠款：<span id="lblTransfer" class="red">0.000</span> 元 <em>|</em> 积分： <span id="lblScore" class="red green">0</span> 个 <em>|</em> 安全等级：<img src="<?php echo $vd['content']; ?>images/aq_<?php echo $vd['lv']; ?>.gif" alt="安全等级" align="absmiddle" /></span></span></span><span
                        class="right"><a href="index.php?m=mod_agent&amp;c=security&amp;a=check">安全设置</a></span></li>
            <li><span class="left">账户总额：<span class="ye STYLE2"><?php echo $vd['lang']['moneysymbol']; ?><?php echo $vd['agent'][6]; ?></span> 元 <em>|</em> 可用余额：<span class="ye STYLE2"><?php echo $vd['lang']['moneysymbol']; ?><?php echo $vd['agent'][6]; ?> </span>元 <em>|</em> 冻结金额： <span id="lblFrozen" class="red">0</span> 元</span><span class="right"><a href="index.php?m=mod_agent&amp;c=trade&amp;tpl=history">财务明细</a></span></li>
          </ul>
  </div>
        <div class="hotdaohang">
            <h2>
                常用功能快速导航</h2>
            <ul>
                <li style="margin-left: 10px;"><a href="index.php?m=mod_b2b&amp;c=category" class="a1">我要购卡</a></li>
                <li><a href="index.php?m=mod_b2b&amp;c=Fav" class="a7">我的收藏</a></li>
                <li><a href="index.php?m=mod_agent&amp;c=funds&amp;a=AddFunds" class="a8">账户充值</a></li>
                <li><a href="index.php?m=mod_agent&amp;c=order" class="a2">进货记录</a></li>
                <li><a href="index.php?m=mod_agent&amp;c=VOrder&amp;ordstate=2" class="a5">销售记录</a></li>
                <li><a href="AddCloseAccount.aspx" class="a9">员工结账</a></li>
                <li><a href="index.php?m=mod_agent&amp;c=trade&amp;tpl=history" class="a10">资金明细</a></li>
                <li><a href="index.php?m=mod_agent&amp;c=security&amp;a=check" class="a6">安全设置</a></li>
            </ul>
        </div>
        <table cellspacing="0" cellpadding="0" width="100%" class="news">
            <tr>
                <td width="50%" valign="top">
                    <div class="gonggao">
                        <h2>
                            平台最新公告</h2>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1">

		<tr>

		<td align="left" class="tjgg">

		<div id="gg">

		<ul>

			<div align="left">
			  <?php foreach($vd['ann'] as $a) { ?>
			  
			        </div>
			<li>
			  <div align="left"><span class="HandLing" style="float:right"><?php echo $this->DateFormat($a['ndate'],'Y-m-d'); ?></span>
			    
			            <a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"><?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?> ? <?php } ?><?php echo $a['id']; ?>.html" target="_blank"<?php } ?> title="<?php echo $a['title']; ?>"><font color="<?php echo $a['titlecolor']; ?>"><?php echo $a['title']; ?></font></a></div>
			</li>

            <div align="left">
              <?php } ?>
              
                </div>
		</ul>

		</div>

		</td>

		</tr>

		</table>

                    </div>
                </td>
                <td width="1%">
                </td>
             <td width="50%" valign="top">
                    <div class="gonggao">
                        <h2>
                            新品及调价公告</h2>

                         





                        <div class="attention">

<ul>

<div align="justify">
<?php foreach($vd['price'] as $a) { ?>

</div>
<li>
<div align="left"><span class="HandLing" style="float:right"><?php echo $this->DateFormat($a['ndate'],'Y-m-d'); ?></span> <div align="justify"><a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"

<div align="right">
<?php }else{ ?>
article/
<?php if($vd['vip'] > 0){ ?>
?
<?php } ?>
<?php echo $a['id']; ?>.html" target="_blank"
<?php } ?>
title="<?php echo $a['title']; ?>"> <font color="<?php echo $a['titlecolor']; ?>"><?php (SubText($a['title'], 30)); ?></font></a>
</div>
</li>

<div align="justify">
<?php } ?>

</div>
</ul>

  </div>

              </td>

            </tr>

        </table>




    

<script type="text/javascript">
//<![CDATA[
parent.GetBalance();//]]>
</script>
<link href="http://www.elingka.com/css/h_skin1/dialog.css" type="text/css" rel="stylesheet" />















<script type="text/javascript" src="http://www.elingka.com/js/dialog.js"></script>















<script language="javascript" type="text/javascript" src="http://www.elingka.com/js/getElementPos.js"></script>
<script type="text/javascript">















                        function autoResize()















                        {















                            try















                            {















                                document.getElementById("main").style.height = (parseInt($(window.frames["main"].document.body).height()) + 50) + "px";















                            }















                            catch(e)















                            {















                                















                            }















                        }















                    </script>















<script type="text/javascript">















//<![CDATA[































</script>














   <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/jquery.js"></script>







<body class="mainbg">

</form>
</body>
</html>
