if (typeof(AgentQian) != "undefined" && typeof(cservice_jsdatas) != "undefined")
{
    switch(AgentQian)
    {
        case "Theme1":
            document.writeln("<li class='noborder' style='height: 25px; line-height: 22px;'><span class='time'>工作时间：" + cservice_jsdatas.WorkDateTime + "</span></li>");
            document.writeln("<li class='noborder'><span class='icon kefu'></span><span class='text' style='line-height: 1.8'>");
            document.writeln("<span class='tel'>客服：" + cservice_jsdatas.ServicePhone + "</span><br />");
            document.writeln("<span class='tel'>业务：" + cservice_jsdatas.SalerPhone + "</span><br />");
            document.writeln("<span class='tel'>加款：" + cservice_jsdatas.FinancePhone + "</span></span>");
            document.writeln("</li><div class=clear></div>");
            document.writeln("<li class='noborder line'></li>");
            document.writeln("<li class='noborder'><span class='icon qq'></span><span class='text qqtext'>");
            for(var i = 0; i < cservice_jsdatas.QQs.length; i++)
            {
                if (cservice_jsdatas.QQs[i].QQ.indexOf("q") == 0)
                {
                    if (cservice_jsdatas.QQStyle == "")
                    {
                        document.writeln("<span class='qqname'>" + cservice_jsdatas.QQs[i].Title + " ：<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[i].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[i].QQ.replace("q", "") + "</a></span><br />"); 
                    }
                    else
                    {
                        document.writeln("<span class='qqname'>" + cservice_jsdatas.QQs[i].Title + " ：<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[i].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[i].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a></span><br />");  
                    }
                }
                else
                {
                    if (cservice_jsdatas.QQStyle == "")
                    {
                        document.writeln("<span class='qqname'>" + cservice_jsdatas.QQs[i].Title + " ：<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[i].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[i].QQ + "</a></span><br />"); 
                    }
                    else
                    {
                        document.writeln("<span class='qqname'>" + cservice_jsdatas.QQs[i].Title + " ：<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[i].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[i].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a></span><br />"); 
                    }
                }
            }      
            document.writeln("</span></li>");
            break;
        case "Theme2": 
            document.writeln("<p class='telphone'>客服：" + cservice_jsdatas.ServicePhone + "<br />");
            document.writeln("业务：" + cservice_jsdatas.SalerPhone + "<br />");
            document.writeln("加款：" + cservice_jsdatas.FinancePhone + "</p>");
            var QQ1s = new Array(), QQ2s = new Array(), QQ3s = new Array(), QQ4s = new Array();
            for(var i = 0; i < cservice_jsdatas.QQs.length; i++)
            {
                if (cservice_jsdatas.QQs[i].Title.indexOf("客服") != -1)
                {
                    QQ1s[QQ1s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("业务") != -1)
                {
                    QQ2s[QQ2s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("加款") != -1)
                {
                    QQ3s[QQ3s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("投诉") != -1)
                {
                    QQ4s[QQ4s.length] = i;
                }
            }
            if (QQ1s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc'>客服：</span>");
                document.writeln("<span class='pic-yc'>");
                for(var i = 0; i < QQ1s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ1s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "</a>");  
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "</a>");  
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ2s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc'>业务：</span>");
                document.writeln("<span class='pic-yc'>");
                for(var i = 0; i < QQ2s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ2s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "</a>");       
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "</a>");
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ3s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc'>加款：</span>");
                document.writeln("<span class='pic-yc'>");
                for(var i = 0; i < QQ3s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ3s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ4s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc'>投诉：</span>");
                document.writeln("<span class='pic-yc'>");
                for(var i = 0; i < QQ4s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ4s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "</a>");
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "</a>");
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            break;   
        case "Theme3":   
            document.writeln("<p class='time'>工作时间：" + cservice_jsdatas.WorkDateTime + "</p>");
            document.writeln("<p class='tel'>客服：" + cservice_jsdatas.ServicePhone + "<br />");
            document.writeln("业务：" + cservice_jsdatas.SalerPhone + "<br />");
            document.writeln("加款：" + cservice_jsdatas.FinancePhone + "</p>");
            document.writeln("<div class='qq'>");
            var QQ1s = new Array(), QQ2s = new Array(), QQ3s = new Array(), QQ4s = new Array();
            for(var i = 0; i < cservice_jsdatas.QQs.length; i++)
            {
                if (cservice_jsdatas.QQs[i].Title.indexOf("客服") != -1)
                {
                    QQ1s[QQ1s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("业务") != -1)
                {
                    QQ2s[QQ2s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("加款") != -1)
                {
                    QQ3s[QQ3s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("投诉") != -1)
                {
                    QQ4s[QQ4s.length] = i;
                }
            }
            if (QQ1s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc'>客服：</span>");
                document.writeln("<span class='pic-yc'>");
                for(var i = 0; i < QQ1s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ1s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ2s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc2'>业务：</span>");
                document.writeln("<span class='pic-yc2'>");
                for(var i = 0; i < QQ2s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ2s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {   
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "</a>");
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ3s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc2'>加款：</span>");
                document.writeln("<span class='pic-yc2'>");
                for(var i = 0; i < QQ3s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ3s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            if (QQ4s.length > 0)
            {
                document.writeln("<p>");
                document.writeln("<span class='wz-zc2'>投诉：</span>");
                document.writeln("<span class='pic-yc2'>");
                for(var i = 0; i < QQ4s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ4s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span>");
                document.writeln("</p>");
            }
            document.writeln("</div>");
            break; 
        case "Theme4":
            document.writeln("<div class='tel'>");
            document.writeln("<p><span class='kf'>工作时间：</span><span class='kf-pic'>");
            document.writeln(cservice_jsdatas.WorkDateTime);
            document.writeln("</span></p>");
            document.writeln("<p><span class='kf'>客服：</span><span class='kf-pic'>");
            document.writeln(cservice_jsdatas.ServicePhone);
            document.writeln("</span></p>");
            document.writeln("<p><span class='kf'>业务：</span><span class='kf-pic'>");
            document.writeln(cservice_jsdatas.SalerPhone);
            document.writeln("</span></p>");
            document.writeln("<p><span class='kf'>加款：</span><span class='kf-pic'>");
            document.writeln(cservice_jsdatas.FinancePhone);
            document.writeln("</span></p>");
            document.writeln("</div>"); 
            
            document.writeln("<div class='kefu'>");
            var QQ1s = new Array(), QQ2s = new Array(), QQ3s = new Array(), QQ4s = new Array();
            for(var i = 0; i < cservice_jsdatas.QQs.length; i++)
            {
                if (cservice_jsdatas.QQs[i].Title.indexOf("客服") != -1)
                {
                    QQ1s[QQ1s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("业务") != -1)
                {
                    QQ2s[QQ2s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("加款") != -1)
                {
                    QQ3s[QQ3s.length] = i;
                }
                else if (cservice_jsdatas.QQs[i].Title.indexOf("投诉") != -1)
                {
                    QQ4s[QQ4s.length] = i;
                }
            }
            if (QQ1s.length > 0)
            {
                document.writeln("<p><span class='kf'>客服：</span><span class='kf-pic'>");
                for(var i = 0; i < QQ1s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ1s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ1s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ1s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>"); 
                        }
                    }
                }
                document.writeln("</span></p>");
            }
            if (QQ2s.length > 0)
            {
                document.writeln("<p><span class='kf'>业务：</span><span class='kf-pic'>");
                for(var i = 0; i < QQ2s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ2s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {   
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "</a>");
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ2s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ2s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span></p>");
            }
            if (QQ3s.length > 0)
            {
                document.writeln("<p><span class='kf'>加款：</span><span class='kf-pic'>");
                for(var i = 0; i < QQ3s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ3s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ3s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ3s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");   
                        }
                    }
                }
                document.writeln("</span></p>");
            }
            if (QQ4s.length > 0)
            {
                document.writeln("<p><span class='kf'>投诉：</span><span class='kf-pic'>");
                for(var i = 0; i < QQ4s.length; i++)
                {
                    if (cservice_jsdatas.QQs[QQ4s[i]].QQ.indexOf("q") == 0)
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='tencent://message/?uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + "&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ.replace("q", "") + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                    else
                    {
                        if (cservice_jsdatas.QQStyle == "")
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes' title='" + cservice_jsdatas.QQWord + "'>" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "</a>"); 
                        }
                        else
                        {
                            document.writeln("<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + cservice_jsdatas.QQs[QQ4s[i]].QQ + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + cservice_jsdatas.QQs[QQ4s[i]].QQ + ":" + cservice_jsdatas.QQStyle + "' alt='" + cservice_jsdatas.QQWord + "' title='" + cservice_jsdatas.QQWord + "'></a>");       
                        }
                    }
                }
                document.writeln("</span></p>");
            } 
            document.writeln("</div>");    
            break;         
    }
}