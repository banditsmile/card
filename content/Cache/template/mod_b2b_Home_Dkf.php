<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<?php end导航 ?>
    <div class="clear_div2 center_bj i_center_bj">
        <div class="clear_div d_center">
            <div class="d_left">
                <ul class="clear_div th left_nav">
                    <li><a href="../#">关于我们</a></li>
                    <li class="light"><a href="../index.php?m=mod_b2b&a=Dkf">联系方式</a></li>
                    <li><a href="../index.php?m=mod_b2b&c=bd">银行信息</a></li>
                    <li><a href="index.php">QQ真实性验证</a></li>
                </ul>
                <div class="clear_div adv_d">
                </div>
                <?php end注册 ?>
            </div>
            <?php end左边 ?>
<div class="d_right">
                <div class="site_th">
                    <dl>
                        <dt><a href="index.php">首页</a><a href="../index.php?m=mod_b2b&a=Dkf">联系方式</a></dt></dl>
                </div>
                <?php end位置标题 ?>
                <dl class="clear_div r_contact">
                    <dd>
                        <script language="javascript" type="text/javascript" src="../images2/www_xybss_com_cn/js/cservice.js"></script>
                        <script type="text/javascript">
                            document.writeln("<p >工作时间：" + cservice_jsdatas.WorkDateTime + "</p>");
                            document.writeln("<p>客服：<b>" + cservice_jsdatas.ServicePhone + "</b><br />");
                            document.writeln("业务：<b>" + cservice_jsdatas.SalerPhone + "</b><br />");
                            document.writeln("加款：<b>" + cservice_jsdatas.FinancePhone + "</b></p>");
                            document.writeln("<div class='qq'>");
                            var QQ1s = new Array(), QQ2s = new Array(), QQ3s = new Array(), QQ4s = new Array();
                            for (var i = 0; i < cservice_jsdatas.QQs.length; i++) {
                                if (cservice_jsdatas.QQs[i].Title.indexOf("客服") != -1) {
                                    QQ1s[QQ1s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("业务") != -1) {
                                    QQ2s[QQ2s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("加款") != -1) {
                                    QQ3s[QQ3s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("投诉") != -1) {
                                    QQ4s[QQ4s.length] = i;
                                }
                            }
                            if (QQ1s.length > 0) {
                                document.writeln("<p>");
                                document.writeln("<span class='wz-zc'>客服：</span>");
                                document.writeln("<span class='pic-yc'>");
                                for (var i = 0; i < QQ1s.length; i++) {
                                    if (cservice_jsdatas.QQs[QQ1s[i]].QQ.indexOf("q") == 0) {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                    else {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                }
                                document.writeln("</span>");
                                document.writeln("</p>");
                            }
                            if (QQ2s.length > 0) {
                                document.writeln("<p>");
                                document.writeln("<span class='wz-zc2'>业务：</span>");
                                document.writeln("<span class='pic-yc2'>");
                                for (var i = 0; i < QQ2s.length; i++) {
                                    if (cservice_jsdatas.QQs[QQ2s[i]].QQ.indexOf("q") == 0) {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                    else {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                }
                                document.writeln("</span>");
                                document.writeln("</p>");
                            }
                            if (QQ3s.length > 0) {
                                document.writeln("<p>");
                                document.writeln("<span class='wz-zc2'>加款：</span>");
                                document.writeln("<span class='pic-yc2'>");
                                for (var i = 0; i < QQ3s.length; i++) {
                                    if (cservice_jsdatas.QQs[QQ3s[i]].QQ.indexOf("q") == 0) {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                    else {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                }
                                document.writeln("</span>");
                                document.writeln("</p>");
                            }
                            if (QQ4s.length > 0) {
                                document.writeln("<p>");
                                document.writeln("<span class='wz-zc2'>投诉：</span>");
                                document.writeln("<span class='pic-yc2'>");
                                for (var i = 0; i < QQ4s.length; i++) {
                                    if (cservice_jsdatas.QQs[QQ4s[i]].QQ.indexOf("q") == 0) {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                    else {
                                        if (cservice_jsdatas.QQStyle == "") {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "</a>");
                                        }
                                        else {
                                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");
                                        }
                                    }
                                }
                                document.writeln("</span>");
                                document.writeln("</p>");
                            }
                            document.writeln("</div>");
                        </script>
                    </dd>
                    <dt>
 <img src="images/contact.jpg" alt="联系我们" width="253" height="442" /></dt>
                </dl>
            </div><?php end右边 ?>
        </div>
        <?php end中间内容 ?>
    </div>
    <?php end中间背景 ?>
    <div class="clear_div2 footer">
        <dl class="clear_div footer">
            <dt><span id="Technical" class="r"><a href="http://www.kmphb.com/" target="_blank"><img src="http://www.kmphb.com/logo.png" alt="卡盟" /></a></span><span id="RedShield" class="l"></span><span class="fl"><a href="../index.php?m=mod_b2b&c=about">关于我们</a>|<a href="../index.php?m=mod_b2b&c=Contact">联系方式</a>|<a
                    href="../index.php?m=mod_b2b&c=Article&a=Homecj&name">帮助中心</a><br />
                    版权所有  <a id="Copyright">? Copyright ?  N-VAR-2011新云数卡 版权所有</a>运营商：<span id="OperatorName">新云数卡</span> <a href="http://www.miibeian.gov.cn/" id="ICPNo" target="_blank">苏ICP备13056242号-1</a></span></dt>
        </dl>
        <div id="FlowStatistics" style="text-align: center;"><a class='jubao' href='http://www.kalegou.com/jubao.htm' target='_blank'><img src='../images/icon_jubao.png'></a></div>
    </div>
    <?php end文件底 ?>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</body>
</html>
