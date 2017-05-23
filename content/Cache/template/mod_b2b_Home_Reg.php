<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>�û�ע�� - <?php echo $vd['web']['webname']; ?></title></head>

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



		        http = new ActiveXObject("MSXML2.XMLHTTP.3.0"); //����û�ʹ��IE���ͷ���XMLHTTP��ActiveX����



	        else







		        http = new XMLHttpRequest(); //���򷵻�һ��XMLHttpRequest����



		    return http;



	    }



	    //��ȡȫ�ֵ�HTTP�������



	    var http = getHttpObject(); 



	    //��������״̬�仯



	    function getHello() 



	    { 



	    //4��ʾ���������



		    if (http.readyState == 4) 



		    {



			    //��ȡ����ε���Ӧ�ı�



			    var helloStr = http.responseText; 



			    if(helloStr.charAt(0)=="1")



				    document.getElementById("CheckCustomerName_span").innerHTML="�û����Ѿ�����";



			    else



			        document.getElementById("CheckCustomerName_span").innerHTML="<font color=#009900>�û�������ʹ��</font>";



		    }



	    }



        function checkname()



        {



            yhm_check=new ActiveXObject("Microsoft.XMLHTTP");



            if(document.getElementById("Theme1_CustomerName").value=="")



            {



                document.getElementById("CheckCustomerName_span").innerHTML="�û�������Ϊ��";



                return;



            }



            var Expression=/^\s*(\w){6,30}\s*$/;



	        var objexp=new RegExp(Expression);



	        if(objexp.test(document.getElementById("Theme1_CustomerName").value)==false)



	        {



		        document.getElementById("CheckCustomerName_span").innerHTML="�û�������Ϊ6-30λ֮������ֻ���ĸ";



                return;



	        }



            url="RegisterCheckName.aspx?CustomerName="+document.getElementById("Theme1_CustomerName").value;



		    //ָ������˵ĵ�ַ



		    http.open("GET", url, true); 



		    //����״̬�仯ʱ�Ĵ�����



		    http.onreadystatechange = getHello; 



		    //��������



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

        <?php ͷ�� ?>

        <div class="header">

             <a href="">

                <div id="AgentLogo" class="logo" style="background:url(<?php echo $vd['content']; ?>images/mylogo.gif) no-repeat 20px 50%;">

                </div>

            </a>

            <div class="logo_txt">

            </div>

            <div class="login">

                <a href="index.php">��¼</a><span>��ע����û�����</span>

            </div>

        </div>

        <?php �в� ?>

        <div class="middle">

          <div class="middle">

            <div class="register_title">

              <div class="register_titletxt"> �û�ע��</div>

            </div>

            <div class="middle_content">

              <div class="applysheet">

                <?php ����� ?>

                <div class="infoform">

                  <div class="infoline">

                    <div class="newsname">

                      <label> *</label>

                      ��¼�˻�<span>��</span> </div>

                    <div class="newscontent">

                      <input name="text" type="text" class="input1" id="cname" onblur="check_id(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="����������Ҫע����û���" />

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

                      <span>��¼���룺</span> </div>

                    <div class="newscontent">

                      <input name="password2" type="password" class="input1" id="cpwd" onblur="check_password();" onmouseout="showtip(this.tips,0,150)" size="25" msg="�������¼/�������룬��ʼĬ�ϵ�¼����ͽ���������ͬ��������ע��ɹ��󣬵�¼ϵͳ�޸�"/>

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

                      <span>ȷ�����룺</span> </div>

                    <div class="newscontent">

                      <input name="password3" type="password" class="input1" id="recpwd" onblur="check_pw();"  onmouseout="showtip(this.tips,0,150)" size="25" msg="���ٴ���������"/>

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

                      <span>��ϵ��������</span> </div>

                    <div class="newscontent">

                      <input name="text3" type="text" class="input1" id="crealname" onblur="check_UserName(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="������д������ʵ����"/>

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

                      <span>���֤���룺</span> </div>

                    <div class="newscontent">

                      <input name="text4" type="text" class="input1" id="idcard" onblur="check_IdentityNO(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="����д����ʵ�����֤��(18λ)"/>

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

                      <span>��˾���ƣ�</span> </div>

                    <div class="newscontent">

                      <input name="text5" type="text" class="input1" id="company"  onmouseout="showtip(this.tips,0,150)" size="25" msg="����д����ʵ�Ĺ�˾����,û�еĻ���д��ϲ�������ּ���"/>

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

                      <span>��ͥ��ַ��</span> </div>

                    <div class="newscontent">

                      <input name="text6" type="text" class="input1" id="eshop"  onmouseout="showtip(this.tips,0,150)" size="25" msg="����д����ʵ�ļ�ͥ��ַ,��д����"/>

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

                      <span>���۷�Χ��</span> </div>

                    <div class="newscontent">

                                <div style="float:left; ">



                                <select name="prv" id="prv"  style="border:1px groove #C0C0C0;" OnChange="setcity();">

                                  <option value="δ�趨" selected="selected">��ѡ��</option>

                                  <option value="ȫ����Χ����">ȫ����Χ����</option>

                                  <option value="ʡ����Χ����">ʡ����Χ����</option>

                                  <option value="�м���Χ����">�м���Χ����</option>

                                  <option value="���ɷ�Χ����">���ɷ�Χ����</option>                                  

								  <option value="���˹���ʹ��">���˹���ʹ��</option>



                                </select>  <span class="Validform_checktip"></span>



                                </div>



                                <div style="float:left; ">



                       <select NAME="city" id="city" style="display:none" style="border:1px groove #C0C0C0; width:80px; font-family:����; font-size:9pt">  </select>



								<span id="spancityprv" style="display:none">��ѡ������˾���ڵ�ʡ��</span>							



                                </div>                              



                                <div style="clear:both;"></div>

                    </div>

                  </div>

                  <div id="Span_ParentID" class="infoline none">

                    <div class="newsname">

                      <label> *</label>

                      <span>�ϼ���ţ�</span> </div>

                    <div class="newscontent">

                      <input name="text2" type="text" id="parentID" tabindex="9" />

                    </div>

                  </div>

                  <div id="informore" >

                    <div class="infoline">

                      <div class="newsname"> <span>�ֻ����룺</span> </div>

                      <div class="newscontent">

                        <input name="text7" type="text" class="input1" id="cmobile" onblur="check_Phone(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="������д���Ժ�������ȡ����ϵ���ֻ�����"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancmobile"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname"> <span>��ϵ�ѣѣ�</span> </div>

                      <div class="newscontent">

                        <input name="text8" type="text" class="input1" id="cqq" onblur="check_qq(this.value);"  onmouseout="showtip(this.tips,0,150)" size="25" msg="������д���Ժ�������ȡ����ϵ��QQ����"/>

                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"><span id="spancqq"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname"> <span>��ϵ�绰��</span> </div>

                      <div class="newscontent">

                        <input name="text9" type="text" class="input1" id="ctel" onblur="check_Telephone(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="��ʽ�磺010-88888888"/>

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

                        <span>�������䣺</span> </div>

                      <div class="newscontent">

                        <input name="text10" type="text" class="input1" id="cmail" onblur="check_email(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="����д����ʵ���õ�����,�Ա��Ժ��һ�����"/>

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

                        <span>��ϵ��ַ��</span> </div>

                      <div class="newscontent">

                        <input name="text11" type="text" class="input1" id="caddr" onblur="check_address(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" msg="�����븺���˵���ϵ��ַ"/>

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

                        <span>�ϼ���ţ�</span> </div>

                      <div class="newscontent">

                        <input type="text" size="25" id="parentid" <?php if(isset($vd['agent'][7])){ ?>value="<?php echo $vd['agent'][7]; ?>" disabled style="background:#f0f0f0"<?php } ?> class="input1" onblur="check_parent(this.value)" onmouseout="showtip(this.tips,0,150)" msg="�����������ϼ������̣����û�У����ռ���(��ʾ�ϼ����ڹٷ�ֱ������)"/>

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

                        <span>��֤�룺</span> </div>

                      <div class="newstip">

                        <input name="text12" type="text" class="regyanzheng" id="randcode" onblur="checkcode(this.value);" onmouseout="showtip(this.tips,0,150)" size="25" maxlength="4" msg="����������ͼ���е���֤��"/>

                      <span class="c-form-1-vcode"><img src="index.php?m=mod_b2b&a=randcode" id="src" height="38" alt="�������?����ˢ��" onclick="this.src=this.src+'&'+Math.random();" style="vertical-align:middle;"/></span>                      </div>

                      <table width="200" border="0">

                        <tr>

                          <td height="34"> <span id="spanrandcode"></td>

                        </tr>

                      </table>

                    </div>

                    <div class="infoline">

                      <div class="newsname">

                        <label> </label>

                        <span>ͬ�⣺</span> </div>

                      <div class="newstip">

                        <input name="checkbox3" type="radio" onclick="setable(this)" />

ͬ��</div>

                    </div>

                    <div id="Span_ParentID" class="infoline none">

                            <div class="newsname">

                                <label>

                                    *</label><span>�ϼ���ţ�</span>

                            </div>

                            <div class="newscontent">

                                <input type="text" id="parentID" tabindex="15" />

                            </div>

                    </div>



                  </div>

                </div>

                <?php �����˺ŵ�¼ ?>

                <div class="selectlogin">

                  <div class="havenum"> �����˺ţ�

                      <input name="button" type="button" class="havenum_login" onclick="window.open('login.php','_self')" value="��¼" />

                  </div>

                  <div class="parten"> ��Ҳ�����ú�����վ�˺ŵ�¼ </div>

                  <div class="partenline"> <a id="btnQQ" class="input qq">QQ</a> <a id="btnSina" class="input sina">����΢��</a> </div>

                  <div class="partenline"> <a id="taobao" class="input taobao">�Ա�</a> </div>

                </div>

              </div>          <div class="register">



								<input id="reg_submit" type="button" value=" ȷ��ע��" class="register_btn" id="reg_submit"  onclick="sendinfo()" value="���ע��" disabled/><span id="spanresult"></span><input name="��ť" type="button" class="rewrite_btn" id="rewrite_btn" onclick="regReset()" value="������д" />



          </div>



								



              <div class="newscontent">

                <input type="hidden" id="websetting" name="websetting" value="1|1|0|1|1|1|1|0|0|0|0|0|"/>

                <span style="display:none">

                <input name="checkbox2" type="checkbox" onclick="set(this)" value="0" checked="checked"/>

                ����㿨��ʱ����ʾ�����۸�<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="1" checked="checked"/>

                ��ʾ�˻����<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="2"/>

                ��ʾ�ҵ��ϼ�������<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="3" checked="checked"/>

                ������Ա�������˺�<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="4" checked="checked"/>

    ����Ա���ۿ�ʱ�޸����ۼ۸�<br/>

  </span> <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="5" checked="checked"/>

                ����ʹ����վ��¼��ʽ<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="6" checked="checked"/>

                ����ʹ�õ�¼����¼<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="7"/>

    �յ��µĶ���Ϣ�������ѿ�<br/>

  </span> <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="8"/>

                ����ʱ�����뽻������<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox" onclick="set(this)" value="9"/>

                ��ʾ��ǰǷ��<br/>

  <span style="display:none">

  <input name="checkbox2" type="checkbox"onclick="set(this)" value="10"/>

                ��ʾ���ö��<br/>

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



  



  //��ȡ��������



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

  <div class="registerfoot"> <span class="fl"><a href="/index.php?m=mod_b2b&a=Dkf">�������� </a>|<a href="/index.php?m=mod_b2b&a=Dkf"> ��ϵ��ʽ </a>|<a

                    href="../index.php?m=mod_b2b&c=Article&a=Homecj&name=����ϵͳ��������"> ��������</a><br />

  ��Ȩ���� <a id="Copyright"><?php echo $vd['web']['webname']; ?></a> ��Ӫ�̣�<span id="OperatorName"><?php echo $vd['web']['beian']; ?></span></span> </div>

</div>



