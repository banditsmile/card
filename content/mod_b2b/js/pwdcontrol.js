var USC = USC || {};
USC.dom = USC.dom || {};
USC.dom.$ = USC.dom.$ || function(s){return typeof(s) == "string" ? document.getElementById(s) : s};
USC.PC = function()
{
	this.ctrl = null;
	this.obj =
	{
		ctrlType : "pay",//log || pay : "登录" || "支付"
		parentNode : null,//显示控件标签容器
		tipNode : null,//信息提示标签容器
		ctrlID : "passwd",//控件ID
		submitName : "p",//赋予加密串控件name
		w : 151,//控件宽度
		h : 22,//控件高度
		tabIndex : "2",
		showLost : true,
		ctrlEvn : null,//密码回车事件
		emptyFun : null,//密码为空事件
		formatFun : null,//自定义判断格式正确与否函数
		errFun : null//自定义密码错误函数
	};
};
USC.PC.ctrlItems = []; //控件集合
USC.PC.useCtrl = true; // true -- 使用，非false -- 不使用
USC.PC.isSetup = false;	//false 未安装密码控件
USC.PC.version = "1,1,0,1";	// 控件的版本号
USC.PC.classid = "clsid:5AFEB389-1755-4651-A6AC-5C8ACDE5AB07"; // 控件的classid
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

		if(window["PC_" + _this.ctrlID] != this) window["PC_" + _this.ctrlID] = this; //回车事件转换成全局

		var _text = "";
		if(USC.PC.useCtrl)
		{
			var _evn = _this.ctrlEvn ? "if(window.event.keyCode == 13){window['PC_" + _this.ctrlID +"'].obj.ctrlEvn.call(null)}" : "return;"; //回车事件

			if(USC.PC.browser == "ie")
			{
				_text = "<object class=\"pwdControl\" id=\""+ _this.ctrlID +"\" classid=\"" + USC.PC.classid + "\" codebase=\""+$("webdir").value+"content/mod_shared/skins/tools/umebizcert.ocx\" viewastext width=\""+ _this.w +"\" tabindex=\""+ _this.tabIndex +"\" style=\"vertical-align:middle\" onkeydown=\""+ _evn +"\"><\/object>";
			}
			else if(USC.PC.browser == "ff")
			{
				 alert("您好，安全登陆目前赞不支持firefox浏览器，请使用其它方式登录");
				 return;
			}
			_text += "<a id=\"unSetup_"+ _this.ctrlID +"\" class=\"unSetupControl\" href=\"javascript:void(0);\" onclick=\"USC.PC.setup();\">请点此输入密码</a>";
		}
		else
		{
			_text = "<input type=\"password\" id=\""+ _this.ctrlID +"\" size=\"20\" maxlength=\"32\" />";
		}
		
		if(!_this.errStyle)
		{
			_text += "<style type=\"text/css\">";
			_text += ".unSetupControl{display:none !important;color:red !important; font-size:12px !important; border:1px solid red !important;width:"+ (_this.w - 3) +"px !important;line-height:"+ (_this.h - 2) +"px !important;text-align:center !important;height:23px}";//未安装控件提示样式
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
	if(this.ctrlItems.length == 0) return false; //没有指定密码控件
	var _ctrl = USC.dom.$(USC.PC.ctrlItems[0]);
	if(_ctrl.Version > 0 || _ctrl.Mode == 1)//如果本地已经成功安装,ie6自动显示控件,其他需要重启浏览器
	{
		for(var i = 0; i < this.ctrlItems.length; i++)
		{
			USC.dom.$(this.ctrlItems[i]).style.display = "";
			USC.dom.$("unSetup_" + this.ctrlItems[i]).style.display = "none";
		}
	}
	else
	{
		if(confirm("您未安装密码安全控件，安装后即可输入密码。\n\n安全控件可对您输入的密码进行加密保护，提升平台账户的安全性。"))
		{
			window.open($("webdir").value+"content/mod_shared/skins/tools/umebizcert.exe");
		}
	}
	
};
