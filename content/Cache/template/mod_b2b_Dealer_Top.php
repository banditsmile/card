<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<head>

<title><?php echo $vd['web']['webname']; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

            <p class="hang1"> <a href="../../index.php" target="_blank">ƽ̨��ҳ</a><em>|</em> <a href="/ykt" target="_blank">һ��ͨ</a> <em>|</em><a href="#">����Ƶ��</a> </p>



            <p class="hang2"> <span id="lblUserName">��ӭ����<span style="margin-top:20"><?php echo $vd['agent'][1]; ?></span></span> <em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Home">�ҵ��˻�</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=staff&nrows=500">Ա���˻�</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=security&a=check">��ȫ����</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=trade&tpl=history">�ʽ���ϸ</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=loan&a=Create">�������</a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Messenger">վ�ڶ���(<span class="ye1" style="color:Red;" id="msgn">0</span>)��</b></a><em>|</em><a target="ifrpage" href="../../index.php?m=mod_agent&c=Complaint">Ͷ�߷���</a><em>|</em>[<a id="lbtnExit" href="../../index.php?m=mod_b2b&a=logout">�˳�</a>] </p>

			</p>

        </div>

                    <div id="public_top_menu_ctn" class="public_top_menu_ctn" onmouseover="ShowKeFu()" onmouseout="HideKeFu()">

                        <div class="public_top_menu_ctn_bg">



                            <ul>

<li>��ϵ�绰��<?php echo $vd['web']['wangwang']; ?></li>

<li class="qq">���߿ͷ���<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $vd['web']['email']; ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $vd['web']['email']; ?>:51" alt="���߿ͷ�" title="���߿ͷ�"></a></li>

</ul>



         

           </div>

          </div><div id="mainmenu1" style="position: absolute; display: none;" onmouseover="ShowMenu()" onmouseout="HideMenu()">

            <ul>

             <li> <a id="lbtnMenu1" href="/index.php?m=mod_b2b&c=Frame&a=top">�����ۿ�����</a></li>

              <li> <a id="lbtnMenu2" href="/index.php?m=mod_b2b&c=Dealer&a=top">������ϵͳ</a></li>

              <li> <a id="lbtnMenu3" href="/index.php?m=mod_b2b&c=Dealergong&a=top">������ϵͳ</a></li>

              <li> <a id="lbtnMenu4" href="/index.php?m=mod_b2b&c=Card&a=top">һ��ͨ����</a></li>

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

  

    <li style="width: 130px"><a href="/index.php?m=mod_b2b&c=Dealer&a=home" target="ifrpage" style="width: 130px">����ϵͳ��ҳ</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_agent&c=underling" target="ifrpage">�¼��ͻ�</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_b2b&c=Price" target="ifrpage">���۹���</a></li>

    <li class="li2"></li>

    <li><a href="/index.php?m=mod_agent&c=trade&tpl=profit&tradetype=11" target="ifrpage">�������</a></li>

    <li class="li2"></li>

	<li><a href="index.php?m=mod_agent&c=Vipno" target="ifrpage">VIP��վ����</a></li>

    <li id="KF" class="kefu" onclick="ShowKeFu()" onmouseover="this.className='kefu1';" onmouseout="this.className='kefu';"></li>

    <li class="qiehuan" id="mainmenu2"><span class="qh_name">��ǰ��Ŀ��</span><a href="javascript:" onclick="ShowMenu()"><span id="lblMenu">������ϵͳ</span></a></li>

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

      var content = "����"

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

                  <h2> <span class="yh">�û���Ϣ</span></h2>

                  <h3 class="menutitle" onclick="UserPanelStatus(this)"> <span>�û���Ϣ</span></h3>

                  <ul id="UserPanel">

                    <li>�� �ţ�<?php echo $vd['agent'][7]; ?></li>

                    <li>�� ��<?php echo $vd['agent'][2]; ?></li>

                    <li>

                      <div style="float: left"> �� �<span class="yue"><?php echo $vd['agent'][6]; ?></span>Ԫ</div>

                      <div style="float: left">

                        <input name="button" type="button" class="shuaxin" id="RefreshImg" title="ˢ�����" onclick="GetBalance()" />

                      </div>

                    </li>

                    <li id="li2">

                      <div style="float: left"> �� ����<span class="jifen"><?php echo $vd['agent'][4]; ?></span></div>

                    </li>

                    <li>�� ����<?php echo $vd['agent'][3]; ?></li>

                    <li style="padding: 5px 0 4px 9px"><a href="index.php?m=mod_agent&c=funds&a=AddFunds" class="pay1" target="ifrpage"> ��ֵ</a><a href="index.php?m=mod_agent&c=funds&a=tran" class="pay1" target="ifrpage">ת��</a><a href="index.php?m=mod_agent&c=funds&a=detail" class="pay1" target="ifrpage" style="margin-right: 0">����</a></li>

                  </ul>

                </div>

                <div class="login_bottom"> </div>

                <div class="main_top"> </div>

                <div class="main" id="menua">

                  <h3 class="menutitle"> <span>�¼��˻�����</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=Add" target="ifrpage" onfocus="this.blur();">��Ϊע���¼��˺�</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling" target="ifrpage" onfocus="this.blur();"> �¼��ͻ���������</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=right" target="ifrpage" onfocus="this.blur();">�¼��ͻ�����Ȩ��</a></li>

                    <li class="li1"><a href="/index.php?m=mod_b2b&c=price" target="ifrpage" onfocus="this.blur();">�¼��ͻ����۹���</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Underling&a=Consump" target="ifrpage" onfocus="this.blur();">�¼��ͻ����ѷ���</a></li>

                  </ul>

                  <h3 menuid="4" togglegroup="on" class="menutitle"> <span>�˻��������</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=funds&a=tran" target="ifrpage" onfocus="this.blur();">������¼��ͻ�</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Remit" target="ifrpage" onfocus="this.blur();">�¼����֪ͨ��</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=Sales" target="ifrpage" onfocus="this.blur();">ҵ��Ա�˻�����</a></li>

					<li class="li1"><a href="/index.php?m=mod_agent&c=funds&a=detail" target="ifrpage" onfocus="this.blur();">��ɻ�����ת���</a></li>

				  </ul>

                  <h3 menuid="2" togglegroup="on" class="menutitle"> <span>ϵͳ���ܹ���</span></h3>

                  <ul>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=Home" target="ifrpage" onfocus="this.blur();">�˻���������</a></li>

                    <li class="li1"><a href="/index.php?m=mod_agent&c=security&a=check" target="ifrpage" onfocus="this.blur();">�˻���ȫ����</a></li>

					<li class="li1"><a href="index.php?m=mod_agent&c=Vipno" target="ifrpage" onfocus="this.blur();">VIP��վ��Ϣ����</a></li>

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

try{Dialog.w1in({title:'ƽ̨����',iframe:{src:'../index/Announcement.html'},width:500,height:350});}catch(e){}parent.frames['ifrpage'].location.href='/index.php?m=mod_b2b&c=Dealer&a=home';//]]>

        </script>

          <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/jquery.js"></script>

        </p>

        <table height="41%" cellpadding="0" cellspacing="0" class="all_table">

          <tbody>

            <tr>

              <td width="100%" height="100" class="foot"><div class="ft1">

                  <table width="18%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr id="ad_account" style="height:35px;">

                      <td width="40%" height="21" align="right"><?php  ���˱�Ƿ�����ϣ����ʾlike��ť��λ��  ?>

                          <div class="bdlikebutton"></div>

                        <?php  ���˴�������ʵ���λ�ã�������body����ǰ  ?>

                          <script id="bdlike_shell"></script>

                          <script>

var bdShare_config = {

	"type":"large",

	"color":"blue",

	"likeText":"<?php echo $vd['web']['hibaidu']; ?>",

	"likedText":"��л����֧��",

	"share":"yes"

};

document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + Math.ceil(new Date()/3600000);

          </script>

                        </span> </td>

                      <td width="60%" align="left"></td>

                    </tr>

                  </table>

              </div>

                  <div class="ft2"> ����Ȩ����  <a id="Theme1_Copyright">Copyright 2013-2014 </a>

                      <p> ����Ӫ�̣�<span id="OperatorName"><?php echo $vd['web']['webname']; ?></span></p>
<p> ������֧�֣�<a href="http://52yma.taobao.com">����</a>�����ṩ��</p>
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

      