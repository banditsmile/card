<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<head>

<title><?php echo $vd['web']['webname']; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<link href="../index/css/common.css" type="text/css" rel="stylesheet">

<link href="../index/css/index.css" type="text/css" rel="stylesheet">

<link href="../index/css/dialog.css" type="text/css" rel="stylesheet">

<script language="javascript" type="text/javascript" src="../index/js/jquery.js"></script>

<script type="text/javascript" src="../index/js/dialog.js"></script>

<script language="JavaScript" type="text/javascript" src="../index/js/cservice2.js"></script>

<script language="JavaScript" type="text/javascript" src="../index/js/getElementPos.js"></script>

</head>

</head>

<table cellpadding="0" cellspacing="0" class="all_table">



    <tr>



      <td colspan="2" class="top_menu">

	  <form id="form1" name="form1" method="post" action="">

                    <div class="top_menu" id="AgentLogo" class="logo" style="background:url(content/mod_b2b/images/mylogo.gif) no-repeat 20px 50%;;">

          <div id="bannerid" class="banner">

            <p class="hang1"> <a href="../../index.php" target="_blank">平台首页</a><em>|</em> <a href="/ykt" target="_blank">一卡通</a> <em>|</em><a href="#">积分频道</a> </p>



            <p class="hang2"> <span id="lblUserName">欢迎您，<span style="margin-top:20"><?php echo $vd['agent'][1]; ?></span></span> <em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Home">我的账户</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=staff&nrows=500">员工账户</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=security&a=check">安全设置</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=trade&tpl=history">资金明细</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=loan&a=Create">借款申请</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Messenger">站内短信(<span class="ye1" style="color:Red;" id="msgn">0</span>)条</b></a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Complaint">投诉反馈</a><em>|</em>[<a id="lbtnExit" href="../../index.php?m=mod_b2b&a=logout">退出</a>] </p>

			</p>

        </div>

                    <div id="public_top_menu_ctn" class="public_top_menu_ctn" onmouseover="ShowKeFu()" onmouseout="HideKeFu()">

                        <div class="public_top_menu_ctn_bg">



                            <ul>

<li>联系电话：<?php echo $vd['web']['wangwang']; ?></li>

<li class="qq">在线客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $vd['web']['email']; ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $vd['web']['email']; ?>:51" alt="在线客服" title="在线客服"></a></li>

</ul>



         

           </div>

          </div><div id="mainmenu1" style="position: absolute; display: none;" onmouseover="ShowMenu()" onmouseout="HideMenu()">

            <ul>

             <li> <a id="lbtnMenu1" href="/index.php?m=mod_b2b&c=Frame&a=top">网吧售卡中心</a></li>

              <li> <a id="lbtnMenu2" href="/index.php?m=mod_b2b&c=Dealer&a=top">经销商系统</a></li>

              <li> <a id="lbtnMenu3" href="/index.php?m=mod_b2b&c=Dealergong&a=top">供货商系统</a></li>

              <li> <a id="lbtnMenu4" href="/index.php?m=mod_b2b&c=Card&a=top">一卡通代理</a></li>

            </ul>

          </div>

          <script language="JavaScript" type="text/javascript">

                        function ShowKeFu()

                        {

                            var obj = document.getElementById("KF");

                            var pos = getElementPos("KF");

                            var detail = document.getElementById("public_top_menu_ctn");

                            detail.style.display = "block";

                            detail.style.left = pos.x + obj.offsetWidth - detail.offsetWidth - 2 + "px";

                            detail.style.top = pos.y + obj.offsetHeight - 8  + "px";

                        }

                        function HideKeFu()

                        {

                            var detail = document.getElementById("public_top_menu_ctn");

                            detail.style.display = "none";

                        }

                        

                        function ShowMenu()

                        {

                            var obj = document.getElementById("mainmenu2");

                            var pos = getElementPos("mainmenu2");

                            var detail = document.getElementById("mainmenu1");

                            detail.style.display = "block";

                            detail.style.left = pos.x + 58 + "px";

                            detail.style.top = pos.y + obj.offsetHeight - 15  + "px";

                        }

                        function HideMenu()

                        {

                            var detail = document.getElementById("mainmenu1");

                            detail.style.display = "none";

                        }

                    </script>

          <div class="clear"> </div>

        <div class="menu">

            <ul>

  

    <li style="width: 130px"><a href="/index.php?m=mod_b2b&c=Dealer&a=home" target="ifrpage" style="width: 130px">经销系统首页</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_agent&c=underling" target="ifrpage">下级客户</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_b2b&c=Price" target="ifrpage">购价管理</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_agent&c=trade&tpl=profit&tradetype=11" target="ifrpage">销售提成</a></li>

    <li class="li2"></li>

	<li><a href="index.php?m=mod_agent&c=Vipno" target="ifrpage">VIP分站管理</a></li>

    <li id="KF" class="kefu" onclick="ShowKeFu()" onmouseover="this.className='kefu1';" onmouseout="this.className='kefu';"></li>

    <li class="qiehuan" id="mainmenu2"><span class="qh_name">当前栏目：</span><a href="javascript:" onclick="ShowMenu()"><span id="lblMenu">经销商系统</span></a></li>

  </ul>

</div>

        <table cellpadding="0" cellspacing="0" class="all_table">

          <tbody>

            <tr>

              <td valign="top" class="td_left"><div class="nr_left">

                <div class="login_top"> </div>

		<Script Language="JavaScript">

function $(id){return document.getElementById(id);}

	function Div(ID,num){ 

		if(num==1){

			$(ID).style.display="";

		}else{

			$(ID).style.display="none";

		}

	}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

</Script>

<script type="text/javascript">

		function MsgAlert(){

      var xmlhttptop;

      var obj = $("msgn");

      var content = "错误！"

      try{

        xmlhttptop=new XMLHttpRequest();

      }

      catch(e){

        xmlhttptop=new ActiveXObject("Microsoft.XMLHTTP");

      }

      xmlhttptop.onreadystatechange=function(){

        if (xmlhttptop.readyState==4){

          if (xmlhttptop.status==200){

            var data=xmlhttptop.responseText;

            obj.innerHTML = data;

            if(data > 0)

            {

            	mainobj  = document.all ? window.parent.frames["main"] : window.parent.document.getElementById("main").contentWindow;

              mainobj.location.href="index.php?m=mod_agent&c=Messenger";

            }

          }

        }

      }

      xmlhttptop.open("post", "<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Frame&a=Msg", true);

      xmlhttptop.send('');

    }

    MsgAlert();

    setInterval(MsgAlert, 60000);

	</script>                <script language="JavaScript" type="text/javascript">



                            function UserPanelStatus(obj)



                            {



                                var panel = document.getElementById("UserPanel");



                                if (obj.className == "menutitle")



                                {



                                    panel.style.display = "none";



                                    obj.className = "menutitle2";



                                }



                                else



                                {



                                    panel.style.display = "";



                                    obj.className = "menutitle";



                                }



                            }



                        </script>



                <div class="login">

                  <h2> <span class="yh">用户信息</span></h2>

                  <h3 class="menutitle" onclick="UserPanelStatus(this)"> <span>用户信息</span></h3>

                  <ul id="UserPanel">

                    <li>编 号：<?php echo $vd['agent'][7]; ?></li>

                    <li>级 别：<?php echo $vd['agent'][2]; ?></li>

                    <li>

                      <div style="float: left"> 余 额：<span class="yue"><?php echo $vd['agent'][6]; ?></span>元</div>

                      <div style="float: left">

                        <input name="button" type="button" class="shuaxin" id="RefreshImg" title="刷新余额" onclick="GetBalance()" />

                      </div>

                    </li>

                    <li id="li2">

                      <div style="float: left"> 上 级：<span class="jifen"><?php echo $vd['agent'][4]; ?></span></div>

                    </li>

                    <li>地 区：<?php echo $vd['agent'][3]; ?></li>

                    <li style="padding: 5px 0 4px 9px"><a href="index.php?m=mod_agent&c=funds&a=AddFunds" class="pay1" target="ifrpage"> 充值</a><a href="index.php?m=mod_agent&c=funds&a=tran" class="pay1" target="ifrpage">转账</a><a href="index.php?m=mod_agent&c=funds&a=detail" class="pay1" target="ifrpage" style="margin-right: 0">提现</a></li>

                  </ul>

                </div>

                <div class="login_bottom"> </div>

                <div class="main_top"> </div>

                <div class="main" id="menua">

                  <h3 class="menutitle"> <span>下级账户管理</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=Add" target="ifrpage" onfocus="this.blur();">代为注册下级账号</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling" target="ifrpage" onfocus="this.blur();"> 下级客户档案管理</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=right" target="ifrpage" onfocus="this.blur();">下级客户购卡权限</a></li>

                    <li class="li1"><a href="/index.php?m=mod_b2b&c=price" target="ifrpage" onfocus="this.blur();">下级客户购价管理</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=Consump" target="ifrpage" onfocus="this.blur();">下级客户消费分析</a></li>

                  </ul>

                  <h3 menuid="4" togglegroup="on" class="menutitle"> <span>账户账务管理</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=funds&a=tran" target="ifrpage" onfocus="this.blur();">划款给下级客户</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Remit" target="ifrpage" onfocus="this.blur();">下级汇款通知书</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Sales" target="ifrpage" onfocus="this.blur();">业务员账户管理</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=funds&a=detail" target="ifrpage" onfocus="this.blur();">提成或收入转余额</a></li>

				  </ul>

                  <h3 menuid="2" togglegroup="on" class="menutitle"> <span>系统功能管理</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Home" target="ifrpage" onfocus="this.blur();">账户资料设置</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=security&a=check" target="ifrpage" onfocus="this.blur();">账户安全设置</a></li>

					<li class="li1"><a href="index.php?m=mod_agent&c=Vipno" target="ifrpage" onfocus="this.blur();">VIP网站信息设置</a></li>

                  </ul>

                </div>

                <div class="main_bottom"> </div>

              </div>

               

                    <script type="text/javascript">

                        function autoResize()

                        {

                            try

                            {

                                document.getElementById("ifrpage").style.height = (parseInt($(window.frames["ifrpage"].document.body).height()) + 50) + "px";

                            }

                            catch(e)

                            {

                                

                            }

                        }

                    </script>

                </p></td>

              <td valign="top" class="td_right"><iframe scrolling="off" id="ifrpage" name="ifrpage" frameborder="0" onload="autoResize()" style="margin: 0px; height: 587px; visibility: inherit; width: 100%; z-index: 1; "></iframe></td>

            </tr>

          </tbody>

        </table>

		

		

        <p>

          <script type="text/javascript">

//<![CDATA[

try{Dialog.w1in({title:'平台公告',iframe:{src:'../index/Announcement.html'},width:500,height:350});}catch(e){}parent.frames['ifrpage'].location.href='/index.php?m=mod_b2b&c=Dealer&a=home';//]]>

        </script>

          <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/jquery.js"></script>

        </p>

        <table height="41%" cellpadding="0" cellspacing="0" class="all_table">

          <tbody>

            <tr>

              <td width="100%" height="100" class="foot"><div class="ft1">

                  <table width="18%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr id="ad_account" style="height:35px;">

                      <td width="40%" height="21" align="right"><?php  将此标记放在您希望显示like按钮的位置  ?>

                          <div class="bdlikebutton"></div>

                        <?php  将此代码放在适当的位置，建议在body结束前  ?>

                          <script id="bdlike_shell"></script>

                          <script>

var bdShare_config = {

	"type":"large",

	"color":"blue",

	"likeText":"<?php echo $vd['web']['hibaidu']; ?>",

	"likedText":"感谢您的支持",

	"share":"yes"

};

document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + Math.ceil(new Date()/3600000);

          </script>

                        </span> </td>

                      <td width="60%" align="left"></td>

                    </tr>

                  </table>

              </div>

                  <div class="ft2"> 　版权所有  <a id="Theme1_Copyright">Copyright 2013-2014 </a>

                      <p> 　运营商：<span id="OperatorName"><?php echo $vd['web']['webname']; ?></span></p>
<p> 　技术支持：<a href="http://52yma.taobao.com">蓝主</a>友情提供！</p>
                  </div>

                  <div class="ft1">

                    <table width="18%" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr id="ad_account" style="height:35px;">

                        <td width="40%" height="21" align="right">

                            <a href="http://www.xybss.com.cn"><img src="http://www.elingka.com/images/icon_jubao.png" width="138" height="58" border="0" /></a></span> </td>

                        <td width="60%" align="left"></td>

                      </tr>

                    </table>

              </div></td>

            </tr>

          </tbody>

        </table>

      