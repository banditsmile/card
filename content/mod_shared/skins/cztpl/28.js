 TplHtml="<table width='100%'><tr><td class='ltjs'>��Ʒ�����ţ��������</td><td class='rtjs'><input type='hidden' name='ubzczothertxt' id='ubzczothertxt' value='��Ʒ�����ţ������'/><input type='text' class='input' name='ubzczother' id='ubzczother' /> * </td></tr><tr><td class='ltjs'>��ƷͶ�����ͣ�</td><td class='rtjs'><input type='hidden' name='accountpwdtxt' id='accountpwdtxt' value='��ƷͶ������'/><select name='accountpwd' id='accountpwd \><option value=''>��ѡ��</option><option value='------��ѡ��------'>------��ѡ��------</option><option value='��Ʒ24Сʱ��δ��ֵ'>��Ʒ24Сʱ��δ��ֵ</option><option value='��Ʒ��ֵ��ҵ��δ����'>��Ʒ��ֵ��ҵ��δ����</option><option value='Ͷ�߹������ۺ����'>Ͷ�߹������ۺ����</option><option value='�Թ����̵�����ͽ���'>�Թ����̵�����ͽ���</option><option value='Ͷ�߶��δ�������'>Ͷ�߶��δ�������</option></select> * </td></tr></table><input type='hidden' id='needinput' name='needinput' value='ubzczother,accountpwd' /><input type='hidden' id='needinputlabel' name='needinputlabel' value='��Ʒ�����ţ������,��ƷͶ������' /><input type='hidden' id='needinputtype' name='needinputtype' value='text,select' />";function TplShow(){$("cztpl").innerHTML = TplHtml;} TplShow();function setserv(obj){var selectval=obj.options[obj.selectedIndex].value;tmp=selectval.split("||");i=0;$("ubzczarea2").length=0;$("ubzczarea2").options[$("ubzczarea2").length] = new Option("��ѡ�������", "");for(i=0;i<serv.length;i++){if(serv[i][0]==tmp[0]){$("ubzczarea2").options[$("ubzczarea2").length] = new Option(serv[i][1], serv[i][1]);}}}