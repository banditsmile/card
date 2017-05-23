var objse;
var BrowserIsChrome = 0;
function f() {
    objse = document.getElementById("SafeEdit1");
    objse.s1(document);
}
function change(a) {
    if (!a) {
        SetCookie("login", 1);
        var str1 = new Array();
        var isF = 0;
        if (SCBrowserCompatible.isChrome()) {
            str1.push("<EMBED id=\"embed1\" TYPE=\"application/x-klgedit\" Worder=\"0\" width=\"245\" height=\"29\" ETYPE=1 tabindex=\"2\" />");
            BrowserIsChrome = 1;
        }
        else {
            str1.push("<object id=\"SafeEdit1\" name=\"SafeEdit1\" border=\"0\" width=\"245\" height=\"29\" classid=\"clsid:3FB29EA5-CFE5-46B9-8469-366B2B1DB7BD\" tabindex=\"2\" codebase=\"KLGISIE.ocx#version=1,0,0,1\"><param name=\"etype\" VALUE=\"1\"></object>");
        }
        str1 = str1.join("");
        document.getElementById("tdSafeCont").innerHTML = str1;
        try {
            if (BrowserIsChrome == 1) {
                if (!pluginHasInstalled()) {
                    document.getElementById("tdSafeCont").innerHTML = "<a href=\"http://update.kalegou.com/KLG_Setup20130823.exe\" style=\"color:red\">点此安装控件后刷新！</a>";
                }
                else {
                    isF == 1;
                }
            }
            else {
                var axObj = new ActiveXObject("KLGISIE.KLGSL");
                isF = 1;
            }
        }
        catch (e) {
            document.getElementById("tdSafeCont").innerHTML = "<a href=\"http://update.kalegou.com/KLG_Setup20130823.exe\" style=\"color:red\">点此安装控件后刷新！</a>";
        }
        if (isF == 1 && BrowserIsChrome == 0) {
            f();
        }
        document.getElementById("chkSafe").checked = true;
    }
    else {
        document.getElementById("tdSafeCont").innerHTML = '<input type="password" name="Password2" id="Password2" tabindex="2" class="login_text1" />';
        SetCookie("login", 0);
        document.getElementById("chkSafe").checked = false;
    }
}

function getcookie(Name) {
    var search = Name + "="
    var returnvalue = "";
    if (document.cookie.length > 0) {
        offset = document.cookie.indexOf(search)
        if (offset != -1) {
            offset += search.length
            end = document.cookie.indexOf(";", offset);
            if (end == -1)
                end = document.cookie.length;
            returnvalue = unescape(document.cookie.substring(offset, end))
        }
    }
    return returnvalue;
}

function SetCookie(name, value) {
    var Days = 365;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

function _setvalue(v) {
    document.getElementById("rki").value = v;
}
function _getvalue() {
    return document.getElementById("rki").value;
}
function _getvalue2() {
    return document.getElementById("rk").value;
}
function Setrk(v) {
    document.getElementById("rk").value = v;
}

function chkChange() {
    var c = document.getElementById("chkSafe");
    if (c.checked) {
        change(false);
    } else {
        change(true);
    }
}

if (getcookie("login") == "1") {
    change(false);
}
else {
    change(true);
}

var UserName
var IsSafe = 0;
var pwd;
var rki;
var rk;
var isChkCode = false;
//动态码标识
var dynFlag = 0;

function initLogin() {
    //获取用户名文本框
    var userNameCrl = document.getElementById("UserName");
    //验证不为空
    if (userNameCrl.value == "") {
        alert("用户名不能为空！");
        return false;
    }
    //获取安全登录复选框
    var chkCrl = document.getElementById("chkSafe");

    if (chkCrl.checked) {
        //插件登录               
        IsSafe = 1;
        if (SCBrowserCompatible.isChrome()) {
            pwd = document.getElementById("embed1").value;
        }
        else {
            pwd = objse.value;
        }
        rki = document.getElementById("rki").value;
        rk = document.getElementById("rk").value;
    }
    else {
        //普通登录
        IsSafe = 0;
        pwd = document.getElementById("Password2").value;
        var monyer = new Array(); var i;
        for (i = 0; i < pwd.length; i++) monyer += pwd.charCodeAt(i) + ",";
        pwd = monyer;
    }
    if (pwd == "") {
        alert("密码不能为空！");
        return false;
    }
    UserName = userNameCrl.value;
}

//第一次登陆
var myLog = document.getElementById("myLog");
var logImg = document.getElementById("logImg");
function firstLogin(isFirst, seChkCode) {
    if (initLogin() == false) {
        return false;
    }
    if (isFirst) {
        if (isChkCode || seChkCode) {
            $.webox({
                height: 340,
                width: 600,
                bgvisibel: true,
                title: ' ',
                html: $("#box").html(),
                iframe:"javascript:false",
                Dynamic: false
            });
            var src = document.getElementById("chkCodeImg");
            src.src = "../webnew/CheckCode.ashx?r=" + Math.random();
            return;
        }
        else {
            myLog.style.display = "none";
            logImg.style.display = "block";
        }
    }
    else {
        myLog.style.display = "none";
        logImg.style.display = "block";
    }
    if (isFirst) {
        //无动态码验证
        var DynamicCode = "";
        var checkCode = "";
    } else {
        //有动态码验证
        var DynamicCode = document.getElementById("DynamicCode").value;
        var dynMyLog = document.getElementById("dynMyLog");
        var dynLogImg = document.getElementById("dynLogImg");
        if ($.trim(DynamicCode) == "") {
            alert("动态码不能为空");
            return;
        }
        dynMyLog.style.display = "none";
        dynLogImg.style.display = "block";
        var checkCode = $.trim($("#chkCode").val());
    }

    $.ajax({
        type: "get",
        url: "../webnew/Customer/CustomerProcess/CheckCustomerLogin.aspx?UserName=" + UserName + "&pwd=" + pwd + "&CheckCode=" + checkCode + "&DynamicCode=" + DynamicCode + "&IsSafe=" + IsSafe + "&rki=" + rki + "&rk=" + rk,
        cache: false,
        async: true,
        success: function (msg) {
            var jsonArr = eval("(" + msg + ")");
            if (jsonArr.Status.Msg == "动态码为空！") {
                //基本页按钮恢复初始状态
                myLog.style.display = "block";
                logImg.style.display = "none";
                dynFlag = 1;
                $.webox({
                    height: 340,
                    width: 600,
                    bgvisibel: true,
                    title: ' ',
                    html: $("#box").html(),
                    iframe: "javascript:false",
                    Dynamic: true
                });
                return;
            }

            if (jsonArr.Status.Code == "success") {
                isChkCode = false;
                if (jsonArr.Data.LocationUrl == "Index.aspx") {
                    window.location.href = "../" + jsonArr.Data.LocationUrl;
                }
                else {
                    window.location.href = jsonArr.Data.LocationUrl;
                }
            } else {
                //按钮恢复初始状态
                myLog.style.display = "block";
                logImg.style.display = "none";

                if (dynFlag == 1) {
                    dynMyLog.style.display = "block";
                    dynLogImg.style.display = "none";
                }
                alert(jsonArr.Status.Msg);
                if (jsonArr.Status.Msg.indexOf("密码错误") > -1) {
                    isChkCode = true;
                }
                else {
                    isChkCode = false;
                }
            }
        },
        error: function (msg) {
            //按钮恢复初始状态
            myLog.style.display = "block";
            logImg.style.display = "none";
            alert("登录异常，请稍后重试！");
        }
    });
}

function chkCodeLogin() {
    var chkMyLog = document.getElementById("chkMyLog");
    var chkLogImg = document.getElementById("chkLogImg");

    if (initLogin() == false) {
        return;
    }
    var chkCode = $.trim($("#chkCode").val());
    //判断是否是验证码验证
    var DynamicCode = "";
    if (chkCode == "") {
        alert("验证码不能为空");
        return;
    }
    chkMyLog.style.display = "none";
    chkLogImg.style.display = "block";
    $.ajax({
        type: "get",
        url: "../webnew/Customer/CustomerProcess/CheckCustomerLogin.aspx?UserName=" + UserName + "&pwd=" + pwd + "&CheckCode=" + chkCode + "&DynamicCode=" + DynamicCode + "&IsSafe=" + IsSafe + "&rki=" + rki + "&rk=" + rk,
        cache: false,
        success: function (msg) {
            var jsonArr = eval("(" + msg + ")");
            if (jsonArr.Status.Msg == "动态码为空！") {
                $.webox({
                    height: 340,
                    width: 600,
                    bgvisibel: true,
                    title: ' ',
                    html: $("#box").html(),
                    iframe: "javascript:false",
                    Dynamic: true
                });
                return;
            }

            if (jsonArr.Status.Code == "success") {
                isChkCode = false;
                if (jsonArr.Data.LocationUrl == "Index.aspx") {
                    window.location.href = "../" + jsonArr.Data.LocationUrl;
                }
                else {
                    window.location.href = jsonArr.Data.LocationUrl;
                }
            } else {

                if (jsonArr.Status.Msg != "验证码错误") {
                    $('.webox').css({ display: 'none' });
                    $('.background').css({ display: 'none' });
                }
                //按钮回复默认
                chkMyLog.style.display = "block";
                chkLogImg.style.display = "none";

                alert(jsonArr.Status.Msg);
                if (jsonArr.Status.Msg.indexOf("密码错误") > -1) {
                    isChkCode = true;
                }
                else {
                    isChkCode = false;
                }
            }
        },
        error: function (msg) {
            alert("登录异常，请稍后重试！");
        }
    });
}

function acToReg() {
    window.open("Register.aspx", "_self");
}
