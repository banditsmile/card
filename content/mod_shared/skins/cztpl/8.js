 TplHtml="<table width='100%'><tr><td class='ltjs'>QQ���룺</td><td class='rtjs'><input type='hidden' name='namehide' value='cztype' /><input type='hidden' name='ubzcztypetxt' id='ubzcztypetxt' value='QQ����'/><input type='password' class='input' name='ubzcztype' id='ubzcztype' /> * </td></tr></table><input type='hidden' id='needinput' name='needinput' value='ubzcztype' /><input type='hidden' id='needinputlabel' name='needinputlabel' value='QQ����' /><input type='hidden' id='needinputtype' name='needinputtype' value='password' />";function TplShow(){$("cztpl").innerHTML = TplHtml;} TplShow();function setserv(obj){var selectval=obj.options[obj.selectedIndex].value;tmp=selectval.split("||");i=0;$("ubzczarea2").length=0;$("ubzczarea2").options[$("ubzczarea2").length] = new Option("��ѡ�������", "");for(i=0;i<serv.length;i++){if(serv[i][0]==tmp[0]){$("ubzczarea2").options[$("ubzczarea2").length] = new Option(serv[i][1], serv[i][1]);}}}