<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">

    

    <title>新云数卡销售系统</title>

    <script language="javascript" type="text/javascript">

        function G(id) {

            return document.getElementById(id);

        }

        var status = 1;

        function switchSysBar() {

            if (1 == status) {

                status = 0;

                G("switchPoint").innerHTML = '<img src="images/left.gif" style="margin:0 2px">';

                G("frmTitle").style.display = "none";

            }

            else {

                status = 1;

                G("switchPoint").innerHTML = '<img src="images/right.gif" style="margin:0 2px">';

                G("frmTitle").style.display = "";

            }

        }

    </script>

    <link rel="stylesheet" type="text/css" href="css/houtai.css">

</head>

<body>

    <form name="form1" method="post" action="./index_files/index.html" id="form1">

<div>

<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQ5NDcwMzkzMw9kFgICAQ9kFgICAQ8WAh4EaHJlZgUuaHR0cDovL3d3dy5rYTguY24vemhpZnUuYXNweD9NZXJjaGFudElEPTEwMDAwMmRkWxertXZUUWdntHKd2VoPn5aYo5A=">

</div>



    <table cellpadding="0" cellspacing="0" class="table">

        <tbody><tr>

            <td colspan="3" class="top_menu">

                <div class="system_logo">

                    <a href="http://www.xybss.com.cn/" target="_blank" class="logo" title="新云数卡销售系统"></a>

                </div>

				 <?php $item=$vd['sysinfo']; ?> 

              <div class="shuju1" style="margin-right: 10px;">



                    <div class="sj1">



                    </div>



                    <div class="sj2">



                        <a href="index.php?m=mod_b2b&c=Sys" target="frmright">
						资料设置</a><a



                            href="index.php?m=mod_b2b&c=Logo" target="frmright">LOGO管理</a><a href="index.php?m=mod_b2b&c=Ad" target="frmright">广告管理</a><a



                            href="index.php?m=mod_b2b&c=Article&a=Add" target="frmright">添加公告</a><a



                                        href="index.php?m=mod_b2b&c=Product&ptype=-1&aid=-1" target="frmright">商品管理</a><a



                                            href="index.php?m=mod_b2b&c=GA" target="frmright"><a



                            href="index.php?m=mod_b2b&c=GA&a=Create" target="frmright">充值模板</a><a



                                        href="index.php?m=mod_b2b&c=Ykt&a=Create" target="frmright">充值卡密</a></a><a



                                                href="index.php?m=mod_b2b&c=Profit&aid=-1&s=1" target="frmright"><a href="index.php?m=mod_b2b&c=Bank" target="frmright">汇款账号</a><a



                            href="index.php?m=mod_b2b&c=Profit&aid=-1&s=1" target="frmright">利润报表</a><a href="index.php?m=mod_b2b&c=Agent" target="frmright">用户管理</a></a><a



                                                    href="index.php?m=mod_b2b&c=EShop" target="frmright">分站管理</a><a



                                                        href="index.php?m=mod_b2b&c=Html&a=Home" target="frmright">数据生成</a><a



                                                    href="index.php?m=mod_b2b&c=Fs&a=ListTpl" target="frmright">更换风格</a></div>



                    <div class="sj3">



                    </div>



                </div>



                <div class="shuju1 shuju2" style="margin-right: 10px;">



                    <div class="sj1">



                    </div>



                    <div class="sj2">



                        <a href="index.php?m=mod_b2b&c=Product&allaid=1&aid=-1&ptype=-1" target="frmright">
						商品审批</a><a href="index.php?m=mod_b2b&c=Order&aid=-3"



                            target="frmright">订单列表</a><a href="http://sup.ekakm.com" id="SupUrl" target="_blank">余额<span id="Balance">0.000</span></a><a



                                href="index.php?m=mod_b2b&c=Profit&allaid=1" target="frmright">销售报表<span id="Message2"></span></a><a



                                        href="Sup/DSaleOrderList.aspx" target="frmright"></a></div>



                    <div class="sj3">



                    </div>



                </div>



                 <div class="shuju1" style="margin-right: 10px;">



                    <div class="sj1">



                    </div>



                    <div class="sj2">



                        <a href="../index.php" target="_blank">批发平台</a>



                        <a href="/ykt" target="_blank">一卡通<span id="Saving1"></span></a>                    </div>



                    <div class="sj3">



                    </div>



                </div>

                <div style="display: none;">

                    

                    <object id="Manual_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music1.mp3">

                        <embed src="../../../../../../../../klg/dealer/music1.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Manual1_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music7.mp3">

                        <embed src="../../../../../../../../klg/dealer/music7.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Auto_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music6.mp3">

                        <embed src="../../../../../../../../klg/dealer/music6.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Message1_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music2.mp3">

                        <embed src="../../../../../../../../klg/dealer/music2.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="RemitNotice_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music3.mp3">

                        <embed src="../../../../../../../../klg/dealer/music3.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Complaint_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music4.mp3">

                        <embed src="../../../../../../../../klg/dealer/music4.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Doubt_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/dealer/music5.mp3">

                        <embed src="../../../../../../../../klg/dealer/music5.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="Message2_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/sup/music1.mp3">

                        <embed src="../../../../../../../../klg/sup/music1.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                    

                    <object id="ProductOut2_Obj" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="0" height="0">

                        <param name="autostart" value="0">

                        <param name="url" value="d:/klg/sup/music2.mp3">

                        <embed src="../../../../../../../../klg/sup/music2.mp3" autostart="0" type="video/x-ms-wmv" width="0" height="0"></object>

                </div>

                <div class="clear">

                </div>

            </td>

        </tr>

        <tr>

            <td id="frmTitle" style="width: 182px; ">

                <table height="100%" style="width: 182px;" cellpadding="0" cellspacing="0">

                    <tbody><tr>

                        <td style="background-color: #c9defa; padding: 3px; padding-bottom: 0">

                            <div class="lie lie2">

                                <a href="index.php?a=home&showver=1" class="shouye" target="frmright">
								首页</a> <a href="index.php?c=Home&a=Logout" class="tuichu">
								退出</a>

                                <div style="clear: both">

                                </div>

                          </div>

                        </td>

                    </tr>

                    <tr>

                        <td valign="top" style="background: #c9defa" height="100%" name="fmtitle">

                            <iframe frameborder="0" id="frmleft" name="frmleft" scrolling="yes" src="index.php?a=left" style="height: 100%; visibility: inherit; width: 182px;" allowtransparency="true">

                            </iframe>

                        </td>

                    </tr>

                </tbody></table>

            </td>

            <td valign="middle" style="width: 12px; cursor: pointer; " bgcolor="#c3daf9" onMouseOver="this.style.backgroundColor='#ddeafc';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''" onClick="switchSysBar()">

                <span class="navpoint" id="switchPoint" title="关闭/打开左栏"><img src="images/right.gif" style="margin:2px"></span>

            </td>

            <td style="width: 100%">

                <table width="100%" height="100%" cellpadding="0" cellspacing="0">

                    <tbody><tr>

                        <td>

 <?php $item=$vd['sysinfo']; ?> 

                            <div class="menu">

                                <div class="wenzi">

                                　</div>

                                

                                <div class="wenzi3"><a href="#">
									当前登录管理员：<?php echo $vd['admin']; ?></a></div>

                            </div>

                    </tr>

                    <tr>

                        <td height="100%">

                            <iframe frameborder="0" name="frmright" scrolling="yes" src="index.php?a=home&showver=1" style="margin: 0;

                                height: 100%; visibility: inherit; width: 100%; z-index: 1"></iframe>                        </td>

                    </tr>

                </tbody></table>

            </td>

        </tr>

    </tbody></table>



</body></html>