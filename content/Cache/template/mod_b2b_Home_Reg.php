<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<title>用户注册 - <?php echo $vd['web']['webname']; ?></title></head>

<body>

    <script language="javascript" type="text/javascript">



        try{document.execCommand("BackgroundImageCache", false, true);}catch(e){}



    </script>







    <script language="javascript" type="text/javascript">



        function getHttpObject() 



        { 



	        var http;



	        var browser = navigator.appName;



	        if(browser == "Microsoft Internet Explorer") 



		        http = new ActiveXObject("MSXML2.XMLHTTP.3.0"); //如果用户使用IE，就返回XMLHTTP的ActiveX对象



	        else







		        http = new XMLHttpRequest(); //否则返回一个XMLHttpRequest对象



		    return http;



	    }



	    //获取全局的HTTP请求对象



	    var http = getHttpObject(); 



	    //处理请求状态变化



	    function getHello() 



	    { 



	    //4表示请求已完成



		    if (http.readyState == 4) 



		    {



			    //获取服务段的响应文本



			    var helloStr = http.responseText; 



			    if(helloStr.charAt(0)=="1")



				    document.getElementById("CheckCustomerName_span").innerHTML="用户名已经存在";



			    else



			        document.getElementById("CheckCustomerName_span").innerHTML="<font color=#009900>用户名可以使用</font>";



		    }



	    }



        function checkname()



        {



            yhm_check=new ActiveXObject("Microsoft.XMLHTTP");



            if(document.getElementById("Theme1_CustomerName").value=="")



            {



                document.getElementById("CheckCustomerName_span").innerHTML="用户名不能为空";



                return;



            }



            var Expression=/^\s*(\w){6,30}\s*$/;



	        var objexp=new RegExp(Expression);



	        if(objexp.test(document.getElementById("Theme1_CustomerName").value)==false)



	        {



		        document.getElementById("CheckCustomerName_span").innerHTML="用户名必须为6-30位之间的数字或字母";



                return;



	        }



            url="RegisterCheckName.aspx?CustomerName="+document.getElementById("Theme1_CustomerName").value;



		    //指定服务端的地址



		    http.open("GET", url, true); 



		    //请求状态变化时的处理函数



		    http.onreadystatechange = getHello; 



		    //发送请求



		    http.send(null);



        }



    </script>







    <link href="http://www.lnka8.com/webblack/css/pub.css" rel="stylesheet" type="text/css" />





<script type="text/javascript">



var AgentQian = "Theme1";



</script>



</head>

<body>

    <div class="container">

        <?php 头部 ?>

        <div class="header">

             <a href="">

                <div id="AgentLogo" class="logo" style="background:url(<?php echo $vd['content']; ?>images/mylogo.gif) no-repeat 20px 50%;">

                </div>

            </a>

            <div class="logo_txt">

            </div>

            <div class="login">

                <a href="index.php">登录</a><span>已注册的用户，请</span>

            </div>

        </div>

        <?php 中部 ?>

        <div class="middle">

          <div class="middle">

            <div class="register_title">

              <div class="register_titletxt"> 用户注册</div>

            </div>

            <div class="middle_content">

              <div class="applysheet">

                <?php 申请表 ?>

                <div class="infoform">

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      登录账户<span>：</span> </div>

                    <div class="newscontent">

                      <input name="text" type="text" class="input1" id="cname" onblur="check_id(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请输入您需要注册的用户名" />

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spancname"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>登录密码：</span> </div>

                    <div class="newscontent">

                      <input name="password2" type="password" class="input1" id="cpwd" onblur="check_password();" onmouseout="showtip(this.tips,0,150)" size="25" msg="请输入登录/交易密码，初始默认登录密码和交易密码相同，您可以注册成功后，登录系统修改"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spancpwd"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>确认密码：</span> </div>

                    <div class="newscontent">

                      <input name="password3" type="password" class="input1" id="recpwd" onblur="check_pw();"  onmouseout="showtip(this.tips,0,150)" size="25" msg="请再次输入密码"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spanrecpwd"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>联系人姓名：</span> </div>

                    <div class="newscontent">

                      <input name="text3" type="text" class="input1" id="crealname" onblur="check_UserName(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请您填写本人真实姓名"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spancrealname"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>身份证号码：</span> </div>

                    <div class="newscontent">

                      <input name="text4" type="text" class="input1" id="idcard" onblur="check_IdentityNO(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请填写您真实的身份证号(18位)"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spanidcard"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>公司名称：</span> </div>

                    <div class="newscontent">

                      <input name="text5" type="text" class="input1" id="company"  onmouseout="showtip(this.tips,0,150)" size="25" msg="请填写您真实的公司名称,没有的话填写您喜欢的名字即可"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spancompany"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>家庭地址：</span> </div>

                    <div class="newscontent">

                      <input name="text6" type="text" class="input1" id="eshop"  onmouseout="showtip(this.tips,0,150)" size="25" msg="请填写您真实的家庭地址,填写即可"/>

                    </div>

                    <table width="200" border="0">

                      <tr>

                        <td height="34"><span id="spaneshop"></td>

                      </tr>

                    </table>

                  </div>

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      <span>销售范围：</span> </div>

                    <div class="newscontent">

                                <div style="float:left; ">



                                <select name="prv" id="prv"  style="border:1px groove #C0C0C0;" OnChange="setcity();">

                                  <option value="未设定" selected="selected">请选择</option>

                                  <option value="全国范围销售">全国范围销售</option>

                                  <option value="省级范围销售">省级范围销售</option>

                                  <option value="市级范围销售">市级范围销售</option>

                                  <option value="网吧范围销售">网吧范围销售</option>                                  

								  <option value="个人购卡使用">个人购卡使用</option>



                                </select>  <span class="Validform_checktip"></span>



                                </div>



                                <div style="float:left; ">



                       <select NAME="city" id="city" style="display:none" style="border:1px groove #C0C0C0; width:80px; font-family:宋体; font-size:9pt">  </select>



								<span id="spancityprv" style="display:none">请选择您公司所在的省份</span>							



                                </div>                              



                                <div style="clear:both;"></div>

                    </div>

                  </div>

                  <div id="Span_ParentID" class="infoline none">

                    <div class="newsname">

                      <label> *</label>

                      <span>上级编号：</span> </div>

                    <div class="newscontent">

                      <input name="text2" type="text" id="parentID" tabindex="9" />

                    </div>

                  </div>

                  <div id="informore" >

                    <div class="infoline">

                      <div class="newsname"> <span>手机号码：</span> </div>

                      <div class="newscontent">

                        <input name="text7" type="text" class="input1" id="cmobile" onblur="check_Phone(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请您填写可以和您本人取得联系的手机号码"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancmobile"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname"> <span>联系ＱＱ：</span> </div>

                      <div class="newscontent">

                        <input name="text8" type="text" class="input1" id="cqq" onblur="check_qq(this.value);"  onmouseout="showtip(this.tips,0,150)" size="25" msg="请您填写可以和您本人取得联系的QQ号码"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancqq"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname"> <span>联系电话：</span> </div>

                      <div class="newscontent">

                        <input name="text9" type="text" class="input1" id="ctel" onblur="check_Telephone(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="格式如：010-88888888"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spanctel"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>电子邮箱：</span> </div>

                      <div class="newscontent">

                        <input name="text10" type="text" class="input1" id="cmail" onblur="check_email(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请填写您真实常用的邮箱,以便以后找回密码"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancmail"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>联系地址：</span> </div>

                      <div class="newscontent">

                        <input name="text11" type="text" class="input1" id="caddr" onblur="check_address(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="请输入负责人的联系地址"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancaddr"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>上级编号：</span> </div>

                      <div class="newscontent">

                        <input type="text" size="25" id="parentid" <?php if(isset($vd['agent'][7])){ ?>value="<?php echo $vd['agent'][7]; ?>" disabled style="background:#f0f0f0"<?php } ?> class="input1" onblur="check_parent(this.value)" onmouseout="showtip(this.tips,0,150)" msg="请输入您的上级代理商，如果没有，留空即可(表示上级属于官方直属代理)"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spanparentid"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>验证码：</span> </div>

                      <div class="newstip">

                        <input name="text12" type="text" class="regyanzheng" id="randcode" onblur="checkcode(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" maxlength="4" msg="请输入下面图像中的验证码"/>

                      <span class="c-form-1-vcode"><img src="index.php?m=mod_b2b&a=randcode" id="src" height="38" alt="看不清楚?请点击刷新" onclick="this.src=this.src+'&'+Math.random();" style="vertical-align:middle;"/></span>                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"> <span id="spanrandcode"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>同意：</span> </div>

                      <div class="newstip">

                        <input name="checkbox3" type="radio" onclick="setable(this)" />

同意</div>

                    </div>

                    <div id="Span_ParentID" class="infoline none">

                            <div class="newsname">

                                <label>

                                    *</label><span>上级编号：</span>

                            </div>

                            <div class="newscontent">

                                <input type="text" id="parentID" tabindex="15" />

                            </div>

                    </div>



                  </div>

                </div>

                <?php 关联账号登录 ?>

                <div class="selectlogin">

                  <div class="havenum"> 已有账号？

                      <input name="button" type="button" class="havenum_login" onclick="window.open('login.php','_self')" value="登录" />

                  </div>

                  <div class="parten"> 您也可以用合作网站账号登录 </div>

                  <div class="partenline"> <a id="btnQQ" class="input qq">QQ</a> <a id="btnSina" class="input sina">新浪微博</a> </div>

                  <div class="partenline"> <a id="taobao" class="input taobao">淘宝</a> </div>

                </div>

              </div>          <div class="register">



								<input id="reg_submit" type="button" value=" 确认注册" class="register_btn" id="reg_submit"  onclick="sendinfo()" value="完成注册" disabled/><span id="spanresult"></span><input name="按钮" type="button" class="rewrite_btn" id="rewrite_btn" onclick="regReset()" value="重新填写" />



          </div>



								



              <div class="newscontent">

                <input type="hidden" id="websetting" name="websetting" value="1|1|0|1|1|1|1|0|0|0|0|0|"/>

                <span style="display:none">

                <input name="checkbox2" type="checkbox" onclick="set(this)" value="0" checked="checked"/>

                购买点卡的时候显示进货价格<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="1" checked="checked"/>

                显示账户余额<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="2"/>

                显示我的上级经销商<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="3" checked="checked"/>

                允许建立员工销售账号<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="4" checked="checked"/>

    允许员工售卡时修改零售价格<br/>

  </span> <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="5" checked="checked"/>

                允许使用网站登录方式<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="6" checked="checked"/>

                允许使用登录器登录<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="7"/>

    收到新的短消息弹出提醒框<br/>

  </span> <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="8"/>

                购卡时候输入交易密码<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="9"/>

                显示当前欠款<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox"onclick="set(this)" value="10"/>

                显示信用额度<br/>

              </div>

            </div>



      </div>



                        



</div>



                    </div>

<script src="<?php echo $vd['content']; ?>js/detect.js" type="text/javascript"></script>



<script src="<?php echo $vd['content']; ?>js/ajax.js" type="text/javascript"></script>



<script type="text/javascript">



  function setable(obj)



  {



    if(obj.checked)



    {



      accept_info();



    }



    else



    {



      refuse_info();



    }



  }



      



  function showtip(tips,flag,thiswidth)



  {



    var mytip=document.getElementById("tip");



    if(flag)



    {



      pos = SelfXY();



      mytip.innerHTML     = tips;



      mytip.style.display = "";



      mytip.style.width   = thiswidth;



      mytip.style.left    = pos[0]+10;



      mytip.style.top     = pos[1]+10;



    }



    else



    {



      mytip.style.display="none";  



    }



  }



  



  //获取鼠标的坐标



  function SelfXY(){



    var yScrolltop;



    var xScrollleft;



    if (self.pageYOffset || self.pageXOffset) {



        yScrolltop = self.pageYOffset;



        xScrollleft = self.pageXOffset;



    } else if (document.documentElement && document.documentElement.scrollTop || document.documentElement.scrollLeft ){      // Explorer 6 Strict



        yScrolltop = document.documentElement.scrollTop;



        xScrollleft = document.documentElement.scrollLeft;



    } else if (document.body) {// all other Explorers



        yScrolltop = document.body.scrollTop;



        xScrollleft = document.body.scrollLeft;



    }



    arrayPageScroll = new Array(xScrollleft + event.clientX ,yScrolltop + event.clientY, xScrollleft, yScrolltop) 



    return arrayPageScroll;



  }



  



  var mywebsetting = new Array(1,1,1,1,1,1,1,1,0,0,0,0);



  function set(obj)



  {



    mywebsetting[obj.value] = obj.checked ? 1 : 0;



    document.getElementById("websetting").value = implode("|", mywebsetting);



  }



  



  function implode(str, myarray)



  {



    var thisstr = "";



    for(i=0;i<myarray.length;i++)



    {



      thisstr = thisstr + myarray[i] + "|";



    }



    return thisstr;



  }



</script>

<div class="clear">

  <div class="registerfoot"> <span class="fl"><a href="/index.php?m=mod_b2b&a=Dkf">关于我们 </a>|<a href="/index.php?m=mod_b2b&a=Dkf"> 联系方式 </a>|<a

                    href="../index.php?m=mod_b2b&c=Article&a=Homecj&name=批发系统常见问题"> 常见问题</a><br />

  版权所有 <a id="Copyright"><?php echo $vd['web']['webname']; ?></a> 运营商：<span id="OperatorName"><?php echo $vd['web']['beian']; ?></span></span> </div>

</div>



