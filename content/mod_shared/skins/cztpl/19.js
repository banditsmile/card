 TplHtml="<table width='100%'><tr><td class='ltjs'>�������ͣ�</td><td class='rtjs'><input type='hidden' name='ubzcztypetxt' id='ubzcztypetxt' value='��������'/><select name='ubzcztype' id='ubzcztype \><option value=''>��ѡ��</option><option value='---��ѡ��---'>---��ѡ��---</option><option value='QQ��Ա'>QQ��Ա</option><option value='QQ����'>QQ����</option><option value='QQ����'>QQ����</option><option value='QQ����'>QQ����</option><option value='QQ����'>QQ����</option><option value='QQ����'>QQ����</option><option value='QQ����'>QQ����</option><option value='QQħ��'>QQħ��</option><option value='����QQ'>����QQ</option><option value='ͼ��VIP'>ͼ��VIP</option><option value='Ѹ��VIP'>Ѹ��VIP</option><option value='4��+��Ա'>4��+��Ա</option><option value='4��+��Ա+��Q'>4��+��Ա+��Q</option></select> * </td></tr><tr><td class='ltjs'>������Ʒ������(������)��</td><td class='rtjs'><input type='hidden' name='ubzczothertxt' id='ubzczothertxt' value='������Ʒ������(������)'/><input type='text' class='input' name='ubzczother' id='ubzczother' /> * </td></tr><tr><td class='ltjs'>ע�����</td><td class='rtjs'><input type='hidden' name='accountpwdtxt' id='accountpwdtxt' value='ע������'/><input type='radio' name='accountpwd' value='ƽ̨�������򲹵���Ʒ��48Сʱû�в����ſ��Թ������ƷͶ���˿�' checked style='border:none;width:16px;'/><font color='#ff0000'> ƽ̨�������򲹵���Ʒ��48Сʱû�в����ſ��Թ������ƷͶ���˿�</font> * </td></tr></table><input type='hidden' id='needinput' name='needinput' value='ubzcztype,ubzczother,accountpwd' /><input type='hidden' id='needinputlabel' name='needinputlabel' value='��������,������Ʒ������(������),ע������' /><input type='hidden' id='needinputtype' name='needinputtype' value='select,text,radio' />";function TplShow(){$("cztpl").innerHTML = TplHtml;} TplShow();function setserv(obj){var selectval=obj.options[obj.selectedIndex].value;tmp=selectval.split("||");i=0;$("ubzczarea2").length=0;$("ubzczarea2").options[$("ubzczarea2").length] = new Option("��ѡ�������", "");for(i=0;i<serv.length;i++){if(serv[i][0]==tmp[0]){$("ubzczarea2").options[$("ubzczarea2").length] = new Option(serv[i][1], serv[i][1]);}}}