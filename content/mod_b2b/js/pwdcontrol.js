var USC = USC || {};
USC.dom = USC.dom || {};
USC.dom.$ = USC.dom.$ || function(s){return typeof(s) == "string" ? document.getElementById(s) : s};
USC.PC = function()
{
	this.ctrl = null;
	this.obj =
	{
		ctrlType : "pay",//log || pay : "��¼" || "֧��"
		parentNode : null,//��ʾ�ؼ���ǩ����
		tipNode : null,//��Ϣ��ʾ��ǩ����
		ctrlID : "passwd",//�ؼ�ID
		submitName : "p",//������ܴ��ؼ�name
		w : 151,//�ؼ����
		h : 22,//�ؼ��߶�
		tabIndex : "2",
		showLost : true,
		ctrlEvn : null,//����س��¼�
		emptyFun : null,//����Ϊ���¼�
		formatFun : null,//�Զ����жϸ�ʽ��ȷ�����
		errFun : null//�Զ������������
	};
};
USC.PC.ctrlItems = []; //�ؼ�����
USC.PC.useCtrl = true; // true -- ʹ�ã���false -- ��ʹ��
USC.PC.isSetup = false;	//false δ��װ����ؼ�
USC.PC.version = "1,1,0,1";	// �ؼ��İ汾��
USC.PC.classid = "clsid:5AFEB389-1755-4651-A6AC-5C8ACDE5AB07"; // �ؼ���classid
USC.PC.prototype =
{
	show : function(o)
	{
		var $ = USC.dom.$;

		for(var item in o)
		{
			if(item) this.obj[item] = o[item];
		}

		var _this = this.obj;

		USC.PC.ctrlItems.push(_this.ctrlID);

		if(window["PC_" + _this.ctrlID] != this) window["PC_" + _this.ctrlID] = this; //�س��¼�ת����ȫ��

		var _text = "";
		if(USC.PC.useCtrl)
		{
			var _evn = _this.ctrlEvn ? "if(window.event.keyCode == 13){window['PC_" + _this.ctrlID +"'].obj.ctrlEvn.call(null)}" : "return;"; //�س��¼�

			if(USC.PC.browser == "ie")
			{
				_text = "<object class=\"pwdControl\" id=\""+ _this.ctrlID +"\" classid=\"" + USC.PC.classid + "\" codebase=\""+$("webdir").value+"content/mod_shared/skins/tools/umebizcert.ocx\" viewastext width=\""+ _this.w +"\" tabindex=\""+ _this.tabIndex +"\" style=\"vertical-align:middle\" onkeydown=\""+ _evn +"\"><\/object>";
			}
			else if(USC.PC.browser == "ff")
			{
				 alert("���ã���ȫ��½Ŀǰ�޲�֧��firefox���������ʹ��������ʽ��¼");
				 return;
			}
			_text += "<a id=\"unSetup_"+ _this.ctrlID +"\" class=\"unSetupControl\" href=\"javascript:void(0);\" onclick=\"USC.PC.setup();\">������������</a>";
		}
		else
		{
			_text = "<input type=\"password\" id=\""+ _this.ctrlID +"\" size=\"20\" maxlength=\"32\" />";
		}
		
		if(!_this.errStyle)
		{
			_text += "<style type=\"text/css\">";
			_text += ".unSetupControl{display:none !important;color:red !important; font-size:12px !important; border:1px solid red !important;width:"+ (_this.w - 3) +"px !important;line-height:"+ (_this.h - 2) +"px !important;text-align:center !important;height:23px}";//δ��װ�ؼ���ʾ��ʽ
			_text += ".pwdControl{width:125px;ime-mode:disabled;border:1px #6c6c6c solid !important;;border-top:2px #6c6c6c solid !important; border-left:2px #6c6c6c solid !important;}";
			_text += "</style>"
		}
		$(_this.parentNode).innerHTML = _text;

		var _that = this;

		if(USC.PC.useCtrl)
		{
			this.ctrl = $(_this.ctrlID);
			if(this.ctrl.pwdStatue)
			{
				USC.PC.isSetup = true;
			}
			else
			{
				this.ctrl.style.display = "none";
				$("unSetup_" + _this.ctrlID).style.cssText = "display:inline-block!important";
			}
		}
	}
};
USC.PC.browser = (function(){
	var _b = navigator.appName.toLowerCase();
	if(window.ActiveXObject) return "ie";
	else if(navigator.userAgent.toLowerCase().indexOf("firefox") != -1) return "ff";
})();

USC.PC.setup = function()
{
	if(this.ctrlItems.length == 0) return false; //û��ָ������ؼ�
	var _ctrl = USC.dom.$(USC.PC.ctrlItems[0]);
	if(_ctrl.Version > 0 || _ctrl.Mode == 1)//��������Ѿ��ɹ���װ,ie6�Զ���ʾ�ؼ�,������Ҫ���������
	{
		for(var i = 0; i < this.ctrlItems.length; i++)
		{
			USC.dom.$(this.ctrlItems[i]).style.display = "";
			USC.dom.$("unSetup_" + this.ctrlItems[i]).style.display = "none";
		}
	}
	else
	{
		if(confirm("��δ��װ���밲ȫ�ؼ�����װ�󼴿��������롣\n\n��ȫ�ؼ��ɶ��������������м��ܱ���������ƽ̨�˻��İ�ȫ�ԡ�"))
		{
			window.open($("webdir").value+"content/mod_shared/skins/tools/umebizcert.exe");
		}
	}
	
};
