 TplHtml="<table width='100%'><tr><td class='ltjs'>QQ补单教程：</td><td class='rtjs'><input type='hidden' name='ubzcztypetxt' id='ubzcztypetxt' value='QQ补单教程'/><input type='radio' name='ubzcztype' value='复制网址打开：http://www.xmkm.net/article/118.html' checked style='border:none;width:16px;'/><font color='#ff0000'> 复制网址打开：http://www.xmkm.net/article/118.html</font> * </td></tr><tr><td class='ltjs'>注意事项1：</td><td class='rtjs'><input type='hidden' name='ubzczothertxt' id='ubzczothertxt' value='注意事项1'/><input type='radio' name='ubzczother' value='下单后供货商未开通业务之前不要在别的供货商重复购买此业务。' checked style='border:none;width:16px;'/><font color='#ff0000'> 下单后供货商未开通业务之前不要在别的供货商重复购买此业务。</font> * </td></tr><tr><td class='ltjs'>注意事项2：</td><td class='rtjs'><input type='hidden' name='accountpwdtxt' id='accountpwdtxt' value='注意事项2'/><input type='radio' name='accountpwd' value='业务必须已经到期或者图标是熄灭的才能开通，已有业务不要购买此业务。' checked style='border:none;width:16px;'/><font color='#ff0000'> 业务必须已经到期或者图标是熄灭的才能开通，已有业务不要购买此业务。</font> * </td></tr></table><input type='hidden' id='needinput' name='needinput' value='ubzcztype,ubzczother,accountpwd' /><input type='hidden' id='needinputlabel' name='needinputlabel' value='QQ补单教程,注意事项1,注意事项2' /><input type='hidden' id='needinputtype' name='needinputtype' value='radio,radio,radio' />";function TplShow(){$("cztpl").innerHTML = TplHtml;} TplShow();function setserv(obj){var selectval=obj.options[obj.selectedIndex].value;tmp=selectval.split("||");i=0;$("ubzczarea2").length=0;$("ubzczarea2").options[$("ubzczarea2").length] = new Option("请选择服务器", "");for(i=0;i<serv.length;i++){if(serv[i][0]==tmp[0]){$("ubzczarea2").options[$("ubzczarea2").length] = new Option(serv[i][1], serv[i][1]);}}}
