<html xmlns="http://www.w3.org/1999/xhtml"><head>

<title>������������ϵͳ��̨</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">



    <title>

	���ƿ��û���̨��¼

</title>

    <style media="all" type="text/css">

	

        html,body,form{

            height: 100%;/*����html��body��width��heightΪ100%����ʹȫ����Ч*/

            width: 100%;

            margin: 0; 

	        padding:0;/*�����������ҵ����λ��Ϊ0���ɱ��ⳬ����Χ���ֹ�����*/

	        overflow-x:hidden;overflow-y:hidden;

        }

		body {

	        font:14px/1.5 microsoft yahei, sans-serif,\5b8b\4f53;

	        color: #333;

	        background:url(images/login_bg2.gif) #f8ffff repeat-x top;

            white-space: nowrap;/*����white-space:nowrap��ͬʱ����Բ���Ԫ�����߾���ʱ�趨display:inline-block���ɱ������������ʱ����ֱ���е���������*/

        }

        a:link {color:#999; text-decoration: none; }

        a:visited {color:#666;text-decoration: none; } 

        a:hover {text-decoration :underline;}	

		

        .verticalAlign {

            vertical-align: middle;/*����vertical-align: middle����ʹ�˺�ͬһ����Ԫ�����߶���*/

            height: 100%;

            width: 0px;    /*����width:0px����ʹ��Ԫ�ز���ʾ��ֻΪҳ���������崹ֱ����������*/

            border: none;

            padding: 0px;

            margin: 0px 0px 0px -5px;/*����mrgin-right:-5px�������������򳬳�*/

            display: inline-block;/*div���������У�ie8��ie9��ʶ���*����ʽ��ִֻ�е�һ��display��ie6��ie7ʶ���*����ʽ��ִ�еڶ���display��zoom*/

            *display:inline;/*ie6��ie7����display: inline-block���ԡ�*display:inline;*zoom:1;������*/

            *zoom:1;

        }

        .divAll{

            width: 100%;

            height: auto;

            vertical-align: middle;/*����vertical-align: middle�����ͬһ����Ԫ�����߶���*/

            margin: 0px;

            border: none;

            padding: 0px;

            display: inline-block;/*div���������У�ie8��ie9��ʶ���*����ʽ��ִֻ�е�һ��display��ie6��ie7ʶ���*����ʽ��ִ�еڶ���display��zoom*/

            *display:inline;/*ie6��ie7����display: inline-block���ԡ�*display:inline;*zoom:1;������*/

            *zoom:1;

            text-align: center

        }        

        .divTop {

            width: 800px;

            min-width: 800px;

            margin:auto;

            display: block;/*div��������*/

	        text-align:right;

	        height:35px;

	        line-height:35px;

        }        

        .divTop a {padding:5px;color:#333;margin-left:5px;}

        .divBody{

            font-size:14px;

        }

        .divBottom {

            width: 800px;

            min-width: 800px;

	        margin:auto;

            height: 100px;

            display: block;  

			color:#888;

        }

        .divBottom a{

            color:#888;

        }

        .beijing {padding-top:30px;padding-bottom:10px;width:800px;height:343px;margin:auto;}

        .bj1,.bj2,.bj3 {float:left;width:218px;height:343px;}

        .bj1 {background:url(images/login_bg1.png) #f0f3ec no-repeat;}

        .bj2 {width:364px;background:url(images/login_bg2.png) #f0f3ec no-repeat;}

		.bj2 table {width:100%;}

		.bj2 td {padding:2px;}

        .bj3 {background:url(images/login_bg3.png) #f0f3ec no-repeat;}		

		.input1 {

            transition: all 0.30s ease-in-out;

            -webkit-transition: all 0.30s ease-in-out;

            -moz-transition: all 0.30s ease-in-out;

            border: #ccc 1px solid;

            border-radius: 3px;

            outline: none;

            width:160px;

			height:30px;line-height:30px;

			padding:0 5px;

			background:url(images/inputdi.png) no-repeat 0 0;

        }

        .input1:focus {

            border:#35a5e5 1px solid;

            box-shadow: 0 0 5px rgba(81, 203, 238, 1);

            -webkit-box-shadow: 0 0 5px rgba(81, 203, 238, 1);

            -moz-box-shadow: 0 0 5px rgba(81, 203, 238, 1);

        }

        .tdleft {width:35%;text-align:right;line-height:35px;}

        .tdright {width:65%;text-align:left;line-height:35px;}

        .login-b, .login-b2, .login-b3{

	        background-image: url(images/b2.gif);

	        background-position: 0px 0px;

	        float: left;

	        height: 32px;

	        width: 82px;

	        display: block;

	        border:0;

	        background-repeat: no-repeat;

	        cursor:pointer!important;

	        cursor:hand;margin:8px 0;

        }

        .login-b2{

	        background-position: 0px -33px;

        }

        .login-b3{

	        background-position: 0px -66px;

        }

        .login_error_tip{

            color:red;

            padding-right:15px;

            font-weight:bold;

            

        }

    </style>

    <link rel="icon" type="image/x-icon" href="favicon.ico" />



    <script type="text/javascript">

        function OpenLayer(url){

            if(document.readyState == "complete"){

                 AlertLayer(url);

            }else{

                setTimeout(function(){OpenLayer(url);},100);

            }

        }

        

        function AlertLayer(url){

            $.layer({

                     type: 2,

                     title: ['��̬����',true],

                     iframe: {src: url},

                     area: ['460px','280px'],

                     offset: ['220px','50%'],

					 loading : {type : 0}

             });

        }

        

         String.prototype.Trim = function()

                                {

                                    return  this.replace(/(^\s*)|(\s*$)/g,  "");

                                }

        function ShowAlert(code,errorMsg){

            var login_error_tip = document.getElementById('login_error_tip');

            switch(code){

                case -1:

                case -2:

                case -3:

                case -4:

                    login_error_tip.innerHTML = errorMsg;

                break;

            }

        }

        

        function CheckLogin(){

            var flag = true;

            if(document.getElementById('txtUserName')){

                if(document.getElementById('txtUserName').value.Trim() == ''){

                    ShowAlert(-1,"��¼������");

                    flag = false;

                    return flag;

                }

            }

            if(document.getElementById('txtUserPassword')){

                if(document.getElementById('txtUserPassword').value.Trim() == ''){

                    ShowAlert(-1,"�������");

                    flag = false;

                    return flag;

                }

            }

            if(document.getElementById('txtCheckCode')){

                if(document.getElementById('txtCheckCode').value.Trim() == ''){

                    ShowAlert(-2,"��֤�����");

                    flag = false;

                    return flag;

                }

            }

            return flag;

        }

    </script>

</head>

<body>

    <form method="post" action="index.php?m=mod_home&a=save" name="form1">

<div>

<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk1NzIxMzI5MmRkzQ0ly61QkWQ53Bn1jo0X3Y9mzbA=" />

</div>



<div>



	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWBQKsnL+oDwKl1bKzCQK9wKW7DAKY2YWXBgKC3IeGDM0KIw+0nkyZUr5PklGhATOkpW/E" />

</div>

        <div class="verticalAlign">

        </div>

        <div class="divAll">

            <div class="divTop">

                ��<a href="javascript:" onclick="window.external.AddFavorite(location.href,document.title);">

                    �ղر�ҳ</a><a href="http://xybss.com.cn" target="_blank">��������</a><a href="http://52yma.taobao.com"

                        target="_blank">�����Ա�</a></div>

            <div class="divBody">

                <div class="beijing">

                    <div class="bj1">

                    </div>

                    <div class="bj2">

                        <table cellspacing="1" cellpadding="3" border="0">

                            <tr>

                                <td colspan="2" style="height: 90px; text-align: center;">

                                    <img alt="Ekakm" src="images/logo.gif" style="width: 161px; height: 43px; border: 0px none;

                                        margin-top: 20px; margin-left:auto; margin-right:auto; margin-bottom:0" /></td>

                            </tr>

                            <tr>

                                <td class="tdleft">

                                    �û�����</div></td>

  <td width="77%" height="39" align="left"> <input name="adminname" type="text" class="input_1" id="adminname" style="width:160px" onBlur="CheckMobile()"></td>

                            </tr>

                            <tr>

                                <td class="tdleft">

                                    �� �룺</div></td>       

  <td height="37" align="left"><input name="adminpass" type="password" class="input_2" id="password4" style="width:160px;"></td>

                            </tr>

                            <tr>

                                <td class="tdleft">

                                    ��֤�룺</div></td>       

  <td height="40" align="left" valign="top">

  <input name="VerifyCode" type="text" class="input_1" id="VerifyCode" size="10" maxlength="10" style="width:70px;">

  <img src="../index.php?a=RandCode&t=1" alt="�������?����ˢ��" name="src" width="100" height="38" id="src" style="vertical-align:middle;" onClick="this.src=this.src+'&'+Math.random();"> <span style="color:#996600;cursor:pointer" onClick="document.getElementById('src').src=document.getElementById('src').src+'&'+Math.random();"><br>

  

                                </td>

                            </tr>

                            <tr>

                                <td class="tdleft">

                                    

                                </td>

                                <td colspan="2" class="tdright">

                                    <input type="submit" name="btnLogin" value="" onclick="return CheckLogin();" id="btnLogin" class="login-b" onmouseover="this.className='login-b2'" onmousedown="this.className='login-b3'" onmouseout="this.className='login-b'" />

                                </td>

                            </tr>

                            <tr>

                                <td colspan="2" align="right"><span id="login_error_tip" class="login_error_tip"></span></td>

                            </tr>

                        </table>

                    </div>

                    <div class="bj3">

                    </div>

                </div>

            </div>

            <div class="divBottom">Copyright 2008-2014  <a href="http://xybss.com.cn" target="_blank">�������� ��Ȩ����</a>

                ��</div>

        </div>

    



