// JavaScript Document
$(function () {
    var opclose = $("#openclose");
    var informore = $("#informore");
    opclose.toggle(function () {
        opclose.val("点击关闭以下更多内容1").css("background", "url(images/open.gif) no-repeat");
        informore.slideDown(1000);
    }, function () { opclose.val("点击展开以下更多内容").css("background", "url(images/close.gif) no-repeat"); informore.slideUp(1000); }
	);
    var rewrite_btn = $("#rewrite_btn");
    var register_btn = $("#register_btn");
    //register_btn.hover(function () { $(this).css("background", "url(images/register_btn.gif) no-repeat 0 -35px") }, function () { $(this).css("background", "url(images/register_btn.gif) no-repeat") });
    //rewrite_btn.hover(function () { $(this).css("background", "url(images/rewrite_btn.gif) no-repeat 0 -35px") }, function () { $(this).css("background", "url(images/rewrite_btn.gif) no-repeat") });

    //绑定按钮点击事件
    $("#btnSina").click(function () {
        window.open("../webnew/OAuthAccountLogin.aspx?OAuthType=sina");
    });
    $("#btnQQ").click(function () {
        window.open("../webnew/OAuthAccountLogin.aspx?OAuthType=qq");
    });
    $("#taobao").click(function () {
        window.open("../webnew/OAuthAccountLogin.aspx?OAuthType=taobao");
    });

    GetUserType();
})

//获取下拉框中的用户类型
function GetUserType() {
    var datas = "Method=GetUserType";
    $.ajax({
        url: "../webnew/Customer/CustomerProcess/CustomerRegisterProcess.aspx",
        type: "post",
        data: datas,
        dataType: "json",
        success: function (result) {
            if (result.Status.Code == "success") {
                for (var i = 0; i < result.UserType.length; i++) {
                    document.getElementById("userType").options.add(new Option(result.UserType[i].TypeName, result.UserType[i].PID));
                }
            }
        },
        error: function (ex) {
            alert(ex);
        },
        cache: false
    });
}
//检验用户名是否存在
var chkNameFlag = 0;
function chkNameIsExist() {
    chkNameFlag = 0;
    var name = $("#customerName").attr("value");
    if ($.trim(name) == "") {
        $("#CheckCustomerName_span").html("<font style='color:red'>用户名不能为空</font>");
        return;
    }
    var result = name.match(/^([a-z]|[A-Z]|[0-9]){6,30}$/);
    if (result == null) {
        $("#CheckCustomerName_span").html("<font style='color:red'>必须是6-30位的数字或字母</font>");
        return;
    }

    if (name = !null && name != "") {
        var datas = "Method=checkCustomerName&customerName=" + $("#customerName").attr("value");
        $.ajax({
            url: "../webnew/Customer/CustomerProcess/CustomerRegisterProcess.aspx",
            type: "post",
            data: datas,
            dataType: "json",
            success: function (result) {
                if (result.Status.Msg == "1") {
                    document.getElementById("CheckCustomerName_span").innerHTML = "<font color=#ff0000>用户名已经存在</font>";
                }
                else {
                    document.getElementById("CheckCustomerName_span").innerHTML = "<img src='images/truePic.png' width='20' height='20' />";
                    chkNameFlag = 1;
                }
            },
            error: function (ex) {
                alert(ex);
            },
            cache: false
        });
    }
}
//点击注册按钮触发
function Register(style) {
    $("#customerName").focus();
    $("#password").focus();
    $("#confirmPassword").focus();
    $("#tradePassword").focus();
    $("#confirmTradePassword").focus();
    checkType();
    $("#mobile").focus();
    $("#parentID").focus();
    $("#contactName").focus();
    $("#identityCard").focus();
    $("#companyName").focus();
    $("#phone").focus();
    $("#qq").focus();
    $("#email").focus();
    $("#address").focus();
    $("#checkCode").focus();
    regCheckCode();
    if (checkAll() == false) {
        return;
    }
    document.getElementById("register_btn").style.display = "none";
    document.getElementById("rewrite_btn").style.display = "none";
    document.getElementById("loading").style.display = "inline";
    var datas = "Method=CheckCustomerRegister&customerName=" + $("#customerName").attr("value") + "&password=" + $("#password").attr("value") + "&confirmPassword=" + $("#confirmPassword").attr("value") + "&tradePassword=" + $("#tradePassword").attr("value") + "&confirmTradePassword=" + $("#confirmTradePassword").attr("value") + "&userTypeID=" + $("#userType option:selected").val() + "&mobile=" + $("#mobile").attr("value") + "&parentID=" + $("#parentID").attr("value") + "&contactName=" + encodeURIComponent($("#contactName").attr("value")) + "&identityCard=" + $("#identityCard").attr("value") + "&companyName=" + encodeURIComponent($("#companyName").attr("value")) + "&phone=" + $("#phone").attr("value") + "&qq=" + $("#qq").attr("value") + "&email=" + $("#email").attr("value") + "&address=" + $("#address").attr("value") + "&checkCode=" + $("#checkCode").attr("value") + "";
    $.ajax({
        url: "../webnew/Customer/CustomerProcess/CustomerRegisterProcess.aspx",
        type: "post",
        data: datas,
        dataType: "json",
        success: function (result) {
            if (result.Status.Code == "success") {
                switch (style) {
                    case "black":
                        location.href = "../../webblack/RegisterOKorError.aspx?msg=success";
                        break;
                    case "blue":
                        location.href = "../../webblue/RegisterOKorError.aspx?msg=success";
                        break;
                    case "green":
                        location.href = "../../webgreen/RegisterOKorError.aspx?msg=success";
                        break;
                    case "orange":
                        location.href = "../../weborange/RegisterOKorError.aspx?msg=success";
                        break;
                    case "pruple":
                        location.href = "../../webpruple/RegisterOKorError.aspx?msg=success";
                        break;
                    case "red":
                        location.href = "../../webred/RegisterOKorError.aspx?msg=success";
                        break;
                }

            }
            else {
                if (result.Status.Msg == "验证码错误！") {
                    alert(result.Status.Msg);
                    document.getElementById("register_btn").style.display = "inline";
                    document.getElementById("rewrite_btn").style.display = "inline";
                    document.getElementById("loading").style.display = "none";
                }
                else {
                    switch (style) {
                        case "black":
                            location.href = "../../webblack/RegisterOKorError.aspx?msg=fail";
                            break;
                        case "blue":
                            location.href = "../../webblue/RegisterOKorError.aspx?msg=fail";
                            break;
                        case "green":
                            location.href = "../../webgreen/RegisterOKorError.aspx?msg=fail";
                            break;
                        case "orange":
                            location.href = "../../weborange/RegisterOKorError.aspx?msg=fail";
                            break;
                        case "pruple":
                            location.href = "../../webpruple/RegisterOKorError.aspx?msg=fail";
                            break;
                        case "red":
                            location.href = "../../webred/RegisterOKorError.aspx?msg=fail";
                            break;
                    }
                }

            }
        },
        error: function (ex) {
            alert(ex);
        },
        cache: false
    });
}

//重新填写触发
function regReset() {
    $("#customerName").val("");
    $("#password").val("");
    $("#confirmPassword").val("");
    $("#tradePassword").val("");
    $("#confirmTradePassword").val("");
    $("#mobile").val("");
    $("#parentID").val("");
    $("#contactName").val("");
    $("#identityCard").val("");
    $("#companyName").val("");
    $("#phone").val("");
    $("#qq").val("");
    $("#email").val("");
    $("#address").val("");
    $("#checkCode").val("");

    $("#CheckCustomerName_span").html("");
    $("#usertypeTip").html("");
    $("#pwdTip").html("密码必须为6-30位之间的数字或字母");
    $("#conFirmPwdTip").html("重复输入登录/交易密码");
    $("#tradePwdTip").html("密码必须为6-30位之间的数字或字母");
    $("#conFirmTradePwdTip").html("重复输入交易密码");
    $("#mobileTip").html("11位数字组成的号码");
    $("#parentIDTip").html("5位或5位以上数字");
    $("#chiNameTip").html("2~4个中文汉字");
    $("#pCardTip").html("15或18位数字");
    $("#compNameTip").html("填写公司名或者网吧名称，尽量简短");
    $("#phoneTip").html("号码格式为：021-88888888");
    $("#qqTip").html("");
    $("#checkCodeTip").html("");
}

//是否有上级 隐藏框
function ParentIDCheck() {
    var a = document.getElementsByName("radios");
    if (a[1].checked) {
        document.getElementById("Span_ParentID").style.display = "none";
    }
    else {
        document.getElementById("Span_ParentID").style.display = "block";
        $("#parentIDTip").html("5位或5位以上数字");
    }
}


//----------------注册前台验证---------------------

var truePic = "<div style='padding-top:10px;'><img src='images/truePic.png' width='20' height='20' /></div>";

//密码格式是否正确
function checkPwd() {
    var pwd = $("#password").val();
    var result = pwd.match(/^([a-z]|[A-Z]|[0-9]){6,30}$/);
    if (result == null) {
        $("#pwdTip").html("<font style='color:red'>必须是6-30位的数字或字母</font>");
        return false;
    } else {
        $("#pwdTip").html(truePic);
        return true;
    }
}

//两次输入密码是否相等
function pwdIsSame() {
    var pwd = $("#password").val();
    var conFirmPwd = $("#confirmPassword").val();
    var result = conFirmPwd.match(/^([a-z]|[A-Z]|[0-9]){6,30}$/);

    if (pwd == conFirmPwd && conFirmPwd != "" && result != null) {
        $("#conFirmPwdTip").html(truePic);
        return true;
    }
    else {
        $("#conFirmPwdTip").html("<font style='color:red'>密码不一致或格式不正确</font>");
        return false;
    }
}

//交易密码格式是否正确
function checkTradePwd() {
    var pwd = $("#tradePassword").val();
    var result = pwd.match(/^([a-z]|[A-Z]|[0-9]){6,30}$/);
    if (result == null) {
        $("#tradePwdTip").html("<font style='color:red'>必须是6-30位的数字或字母</font>");
        return false;
    } else {
        $("#tradePwdTip").html(truePic);
        return true;
    }
}

//两次输入交易密码是否相等
function TradePwdIsSame() {
    var tradePwd = $("#tradePassword").val();
    var tradeConFirmPwd = $("#confirmTradePassword").val();
    var result = tradeConFirmPwd.match(/^([a-z]|[A-Z]|[0-9]){6,30}$/);
    if (tradePwd == tradeConFirmPwd && tradeConFirmPwd != "" && result != null) {
        $("#conFirmTradePwdTip").html(truePic);
        return true;
    }
    else {
        $("#conFirmTradePwdTip").html("<font style='color:red'>交易密码不一致或格式不正确</font>");
        return false;
    }
}

//验证11位电话号码
function checkMobile() {
    var mobile = $("#mobile").val();
    /*中国移动拥有号码段为:139,138,137,136,135,134,159,158,157(3G),151,152,150,188(3G),187(3G),188;15个号段
    中国联通拥有号码段为:130,131,132,155,156(3G),186(3G),185(3G);7个号段
    中国电信拥有号码段为:133,153,189(3G),180(3G);4个号码段*/
    var result = mobile.match(/^1(([3][456789])|([5][012789])|([8][278]))[0-9]{8}$/);
    result = result || mobile.match(/^1(([3][012])|([5][56])|([8][56]))[0-9]{8}$/);
    result = result || mobile.match(/^1(([3][3])|([5][3])|([8][09]))[0-9]{8}$/);
    if (result == null) {
        $("#mobileTip").html("<font style='color:red'>手机号码格式不合法</font>");
        return false;
    }
    else {
        $("#mobileTip").html(truePic);
        return true;
    }
}

//验证用户类型
function checkType() {
    var userType = $("#userType option:selected").val();
    if (userType == 0) {
        $("#usertypeTip").html("<font style='color:red'>请正确选择用户类型</font>");
        return false;
    }
    else {
        $("#usertypeTip").html(truePic);
        return true;
    }
}

//验证上级编号
function checkParentId() {
    var parentID = $("#parentID").val();
    var a = document.getElementsByName("radios");
    if (a[0].checked) {
        if (parentID != "") {
            var result = parentID.match(/^\d{5,}$/);
            if (result == null) {
                $("#parentIDTip").html("<font style='color:red'>格式不正确，必须是5或5位以上数字</font>");
                return false;
            }
            else {
                $("#parentIDTip").html(truePic);
                return true;
            }
        }
        else {
            $("#parentIDTip").html("<font style='color:red'>请填写上一级ID</font>");
            return false;
        }
    }
    else {
        return true;
    }
}

//验证中文名字
function checkChiName() {
    var chiName = $("#contactName").val();
    if (chiName != "") {
        var result = chiName.match(/^([\u4E00-\u9FA5]){2,4}$/);
        if (result == null) {
            $("#chiNameTip").html("<font style='color:red'>姓名格式不合法,必须是2-4个汉字</font>");
            return false;
        }
        else {
            $("#chiNameTip").html(truePic);
            return true;
        }
    }
    else {
        $("#chiNameTip").html("2-4个中文汉字");
        return true;
    }
}

//验证身份证
function checkPCard() {
    var pCard = $("#identityCard").val();
    if (pCard != "") {
        var result = pCard.match(/^(\d{14}|\d{17})(\d|[xX])$/);
        if (result == null) {
            $("#pCardTip").html("<font style='color:red'>身份证格式不合法,必须是15或18位数字</font>");
            return false;
        }
        else {
            $("#pCardTip").html(truePic);
            return true;
        }
    }
    else {
        $("#pCardTip").html("15或18位数字");
        return true;
    }
}

//验证公司名称
//function checkCompName() {
//    var companyName = $("#companyName").val();
//    if (companyName == "") {
//        $("#compNameTip").html("<font style='color:red'>公司名不能为空</font>");
//        return false;
//    }
//    else {
//        $("#compNameTip").html(truePic);
//        return true;
//    }
//}

//验证联系电话
function checkPhone() {
    var phone = $("#phone").val();
    if (phone != "") {
        var result = phone.match(/0\d{2}-\d{8}/);
        if (result == null) {
            $("#phoneTip").html("<font style='color:red'>号码格式必须为：021-88888888 </font>");
            return false;
        }
        else {
            $("#phoneTip").html(truePic);
            return true;
        }
    }
    else {
        $("#phoneTip").html("号码格式为：021-88888888");
        return true;
    }
}

//验证QQ
function checkQQ() {
    var qq = $("#qq").val();
    var result = qq.match(/^\d{5,}$/);
    if (result == null) {
        $("#qqTip").html("<font style='color:red'>不是有效的QQ号码</font>");
        return false;
    }
    else {
        $("#qqTip").html(truePic);
        return true;
    }
}

//验证电子邮件
function checkEmail() {
    var email = $("#email").val();
    if (email != "") {
        var result = email.match(/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/);
        if (result == null) {
            $("#emailTip").html("<font style='color:red'>不是有效的邮箱地址</font>");
            return false;
        }
        else {
            $("#emailTip").html(truePic);
            return true;
        }
    }
    else {
        $("#emailTip").html("以@相隔的电子邮件地址");
        return true;
    }
}

//验证码不能为空
function regCheckCode() {
    var code = $("#checkCode").val();
    if ($.trim(code) == "") {
        $("#checkCodeTip").html("<font style='color:red'>验证码不能为空</font>");
        return false;
    }
    else {
        $("#checkCodeTip").html("");
        return true;
    }
}

//提交总验证
function checkAll() {
    var radios = $('input:radio[name="radios"]:checked').val();
    var chkParentIdFlag;
    //判断是否启用 上级编号验证
    if (radios == 0) {
        chkParentIdFlag = checkParentId();
    }
    else {
        chkParentIdFlag = true;
    }

    if (chkNameFlag == 1 && checkPwd() && pwdIsSame() && checkTradePwd() && TradePwdIsSame() && checkType() && checkMobile() && chkParentIdFlag && checkChiName() && checkPCard() && checkPhone() && checkQQ() && checkEmail() && regCheckCode()) {
        return true;
    }
    else {
        return false;
    }
}
