<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<?php end���� ?>
    <div class="clear_div2 center_bj i_center_bj">
        <div class="clear_div d_center">
            <div class="d_left">
                <ul class="clear_div th left_nav">
                    <li><a href="../#">��������</a></li>
                    <li class="light"><a href="../index.php?m=mod_b2b&a=Dkf">��ϵ��ʽ</a></li>
                    <li><a href="../index.php?m=mod_b2b&c=bd">������Ϣ</a></li>
                    <li><a href="index.php">QQ��ʵ����֤</a></li>
                </ul>
                <div class="clear_div adv_d">
                </div>
                <?php endע�� ?>
            </div>
            <?php end��� ?>
<div class="d_right">
                <div class="site_th">
                    <dl>
                        <dt><a href="index.php">��ҳ</a><a href="../index.php?m=mod_b2b&a=Dkf">��ϵ��ʽ</a></dt></dl>
                </div>
                <?php endλ�ñ��� ?>
                <dl class="clear_div r_contact">
                    <dd>
                        <script language="javascript" type="text/javascript" src="../images2/www_xybss_com_cn/js/cservice.js"></script>
                        <script type="text/javascript">
                            document.writeln("<p >����ʱ�䣺" + cservice_jsdatas.WorkDateTime + "</p>");
                            document.writeln("<p>�ͷ���<b>" + cservice_jsdatas.ServicePhone + "</b><br />");
                            document.writeln("ҵ��<b>" + cservice_jsdatas.SalerPhone + "</b><br />");
                            document.writeln("�ӿ<b>" + cservice_jsdatas.FinancePhone + "</b></p>");
                            document.writeln("<div class='qq'>");
                            var QQ1s = new Array(), QQ2s = new Array(), QQ3s = new Array(), QQ4s = new Array();
                            for (var i = 0; i < cservice_jsdatas.QQs.length; i++) {
                                if (cservice_jsdatas.QQs[i].Title.indexOf("�ͷ�") != -1) {
                                    QQ1s[QQ1s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("ҵ��") != -1) {
                                    QQ2s[QQ2s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("�ӿ�") != -1) {
                                    QQ3s[QQ3s.length] = i;
                                }
                                else if (cservice_jsdatas.QQs[i].Title.indexOf("Ͷ��") != -1) {
                                    QQ4s[QQ4s.length] = i;
                                }
                            }
                            if (QQ1s.length > 0) {
                                document.writeln("<p>");
                                document.writeln("<span class='wz-zc'>�ͷ���</span>");
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
                                document.writeln("<span class='wz-zc2'>ҵ��</span>");
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
                                document.writeln("<span class='wz-zc2'>�ӿ</span>");
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
                                document.writeln("<span class='wz-zc2'>Ͷ�ߣ�</span>");
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
 <img src="images/contact.jpg" alt="��ϵ����" width="253" height="442" /></dt>
                </dl>
            </div><?php end�ұ� ?>
        </div>
        <?php end�м����� ?>
    </div>
    <?php end�м䱳�� ?>
    <div class="clear_div2 footer">
        <dl class="clear_div footer">
            <dt><span id="Technical" class="r"><a href="http://www.kmphb.com/" target="_blank"><img src="http://www.kmphb.com/logo.png" alt="����" /></a></span><span id="RedShield" class="l"></span><span class="fl"><a href="../index.php?m=mod_b2b&c=about">��������</a>|<a href="../index.php?m=mod_b2b&c=Contact">��ϵ��ʽ</a>|<a
                    href="../index.php?m=mod_b2b&c=Article&a=Homecj&name">��������</a><br />
                    ��Ȩ����  <a id="Copyright">? Copyright ?  N-VAR-2011�������� ��Ȩ����</a>��Ӫ�̣�<span id="OperatorName">��������</span> <a href="http://www.miibeian.gov.cn/" id="ICPNo" target="_blank">��ICP��13056242��-1</a></span></dt>
        </dl>
        <div id="FlowStatistics" style="text-align: center;"><a class='jubao' href='http://www.kalegou.com/jubao.htm' target='_blank'><img src='../images/icon_jubao.png'></a></div>
    </div>
    <?php end�ļ��� ?>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</body>
</html>