 TplHtml="<table width='100%'><tr><td class='ltjs'>补单类型：</td><td class='rtjs'><input type='hidden' name='ubzcztypetxt' id='ubzcztypetxt' value='补单类型'/><select name='ubzcztype' id='ubzcztype \><option value=''>请选择</option><option value='---请选择---'>---请选择---</option><option value='QQ会员'>QQ会员</option><option value='QQ红钻'>QQ红钻</option><option value='QQ黄钻'>QQ黄钻</option><option value='QQ蓝钻'>QQ蓝钻</option><option value='QQ绿钻'>QQ绿钻</option><option value='QQ粉钻'>QQ粉钻</option><option value='QQ紫钻'>QQ紫钻</option><option value='QQ魔钻'>QQ魔钻</option><option value='超级QQ'>超级QQ</option><option value='图书VIP'>图书VIP</option><option value='迅雷VIP'>迅雷VIP</option><option value='4钻+会员'>4钻+会员</option><option value='4钻+会员+超Q'>4钻+会员+超Q</option></select> * </td></tr><tr><td class='ltjs'>补单商品订单号(必填项)：</td><td class='rtjs'><input type='hidden' name='ubzczothertxt' id='ubzczothertxt' value='补单商品订单号(必填项)'/><input type='text' class='input' name='ubzczother' id='ubzczother' /> * </td></tr><tr><td class='ltjs'>注意事项：</td><td class='rtjs'><input type='hidden' name='accountpwdtxt' id='accountpwdtxt' value='注意事项'/><input type='radio' name='accountpwd' value='平台代理购买补单商品后48小时没有补单才可以购买此商品投诉退款' checked style='border:none;width:16px;'/><font color='#ff0000'> 平台代理购买补单商品后48小时没有补单才可以购买此商品投诉退款</font> * </td></tr></table><input type='hidden' id='needinput' name='needinput' value='ubzcztype,ubzczother,accountpwd' /><input type='hidden' id='needinputlabel' name='needinputlabel' value='补单类型,补单商品订单号(必填项),注意事项' /><input type='hidden' id='needinputtype' name='needinputtype' value='select,text,radio' />";function TplShow(){$("cztpl").innerHTML = TplHtml;} TplShow();function setserv(obj){var selectval=obj.options[obj.selectedIndex].value;tmp=selectval.split("||");i=0;$("ubzczarea2").length=0;$("ubzczarea2").options[$("ubzczarea2").length] = new Option("请选择服务器", "");for(i=0;i<serv.length;i++){if(serv[i][0]==tmp[0]){$("ubzczarea2").options[$("ubzczarea2").length] = new Option(serv[i][1], serv[i][1]);}}}
