<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>�ֹ���Ʒ�����¼</title>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<link href="../index/css/common.css" type="text/css" rel="stylesheet" />

<link href="../index/css/page.css" type="text/css" rel="stylesheet" />

<body class="mainbg">

<div class="new_qie">

  <div class="new_qie2">

    <h2> ����������Ʒ</h2>

    <span class="setup_index">

    <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked" onClick="javascript:setTimeout(&#39;__doPostBack(\&#39;lbtnLogin\&#39;,\&#39;\&#39;)&#39;, 0)">

    <label for="lbtnLogin">��¼����ҳ</label>

    </span> </div>

  <ul>

    <li> <a href="../index.php?m=mod_agent&c=Product&a=Create" class="on">����������Ʒ</a></li>

    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Product">������Ʒ�б�</a></li>

    <li> <a id="lbtn23" href="../index.php?m=mod_agent&c=Product&a=Stock">��Ʒ����б�</a></li>

  </ul>

  <p>&nbsp;</p>

</div>

<form id="cform" method="post" action="index.php?m=mod_agent&c=Product&a=Save"  onsubmit="return checkaddproduct()">

  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1"  class="table1" id="ubTable" tyle="margin: 0">

    <tr>

      <td width="16%" class="table1_left">��Ʒ���ࣺ</td>

      <td width="84%" align="left" class="tableright1"><div align="left">

          <select name="cat1" size="1" style="width:150px"  onchange="loadCat(this.value,1)">

            <option select="selected" value="0">��ѡ��һ������</option>

            

      	    

          <?php (Option($vd['cat'], 0, 'name', 'id')); ?>

        

    	    

          </select>

          <font color="#FF0000">*</font> </div></td>

    </tr>

    <tr>

      <td class="table1_left">��Ʒ���ƣ�</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzpname" size="60" value="" />

          <font color="#FF0000"> *</font>

          <input type="checkbox" value="1" name="isbold"  class="checkbox" onFocus="this.blur()"/>

          ���� </div></td>

    </tr>

    <tr>

      <td class="table1_left">������ɫ��</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="namecolor" name="namecolor" value="#222222" style="width:100px" onKeyUp="setcolor(this)"/>

          <input id="colorexample" type="text" size="1" readonly  style="background:#222222;cursor:pointer;width:20px;border:1px #cccccc solid;height:18px" onClick="pickcolor()">

        </div></td>

    </tr>

    <tr>

      <td class="table1_left"><span class="name">������Ǯ��</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzlistprice" size="10" class="priceinput" value="10"/>

          <font color="#FF0000"> * </font>�г���(��Ʒ����ֵ)<br/>

          <input type="text" name="ubzprice" size="10" class="priceinput" value="0"/>

          <font color="#FF0000"> * </font>����(��Ʒ�Ľ�����) </div></td>

    </tr>

    <tr>

      <td class="table1_left">��Ʒ���ͣ�</td>

      <td align="left" class="tableright1"><div align="left">

          <select size="1" id="ubzptype" name="ubzptype" onChange="showtpl(this)">

            <option value="2">�ֹ���ֵ</option>

            <option value="0">���⿨��</option>

            <option value="3">ѡ����Ʒ</option>

          </select>

          <font color="#FF0000"> *</font> </div></td>

    </tr>

    <tr id="tpl" style="display:none">

      <td class="table1_left">�Զ���ֵģ�壺</td>

      <td align="left" class="tableright1"><div align="left"><span id="tpllist"></span><font color="#FF0000">�벻Ҫѡ���뱣��Ĭ��,�����޷�������</font> </div></td>

    </tr>

    <tr>

      <td class="table1_left"> ��ֵģ�壺

      <td align="left" class="tableright1"><div align="left">

          <select size="1" id="ubzsyscztpl" name="ubzsyscztpl" style="width:130px;">

            <option value="0" selected>��ѡ���ֵģ��</option>

            

            

        <?php (Option($vd['customtpl'], 0, 'name', 'id')); ?>

      

          

          </select>

        </div></td>

    </tr>

    <tr id="czidname" style="display:none">

      <td class="table1_left"><span class="tip" id="tipidlable" style="display:none">(����ˢ��ʱ����дQQ����,��ֵ��Ϸʱ����д��Ϸ�ʺţ������Լ���д)</span> <span class="name" id="spanidlable">��ֵ���ƣ�</span> </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="ubzidlable" name="ubzidlable" size="10" value="QQ����"/>

          ((����ˢ��ʱ����дQQ����,��ֵ��Ϸʱ����д��Ϸ�ʺţ������Լ���д)) </div></td>

    </tr>

    <tr id="areaserv" style="display:none">

      <td class="table1_left"><span class="name" id="spanareaserv" >������ʾ��</span></td>

      <td align="left" class="tableright1"><div align="left"><span id="spanareaserv1">

          <input type="checkbox" value="1" name="ubzdisparea" class="checkbox"/>

          ��ʾ����

          <input type="checkbox" value="1" name="ubzdispserv" class="checkbox"/>

          ��ʾ������</span> <span id="spanareaserv2" style="display:none">

          <input type='radio' value='1' name='ubzdisparea' class='checkbox' checked onFocus="this.blur()"/>

          ����ѡ�Ź���(����ʱ��ʾ���룬����ѡ����) <br/>

          <input type='radio' value='0' name='ubzdisparea' class='checkbox' onFocus="this.blur()"/>

          �������(����ʱ����ʾ���룬�����ȡ������) </span> </div></td>

    </tr>

    <tr id="tradeterm" style="display:none">

      <td class="table1_left"><span id="spanareaserv" >���׷�ʽ��</span> </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="ubztradeterm" cols="28" style="width:208px;" rows="3"></textarea>

        </div></td>

    </tr>

    <tr id="disponshow" style="display:none">

      <td class="table1_left"><span class="name" id="spanareaserv" >���׷�ʽ��ʾʱ�䣺</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="radio" value="0" name="ubzdisponshow" class="checkbox"/>

          �ɹ��������ʾ

          <input type="radio" value="1" name="ubzdisponshow" class="checkbox"/>

          ����ǰ��ʾ </div></td>

    </tr>

    <tr id="stocks" style="display:none">

      <td class="table1_left"><span class="name">��棺</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" value="1" name="ubzstocks" size="10" />

          (��δ���Ź��ܣ�������д) </div></td>

    </tr>

    <tr id="unit" style="display:none">

      <td class="table1_left"><span class="name">��浥λ��</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" size="10" name="ubzunit" />

          (��δ���Ź��ܣ�������д) </div></td>

    </tr>

    <tr>

      <td class="table1_left"> ������������(��ʽһ)�� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzqtymin" size="5" value="1"/>

          ����(��)ע�⣺����ǲ����Բ鲻������ҵ��,�����ͽ�ֹ��������1-1<br/>

          <input type="text" name="ubzqtymax" size="5" value="1"/>

          ��ֹ��(��) </div></td>

    </tr>

    <tr>

      <td class="table1_left"> ������������(��ʽ��)�� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzqtylist" size="22" value=""/>

          <span class="spantip">������<br/>

          �Զ��巽ʽ,��ʹ��ʹ�ð�Ƕ��Ÿ�����Ӧ��������ʽһ/����ѡ����������һ<br/>

          ���ַ�ʽ��ѡһ�֣������Ҫʹ�õڶ��֣������õڶ��ּ��ɣ���һ���Զ�ʧЧ</span> </div></td>

    </tr>

    <td class="table1_left"> ��ֵ���ƣ� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="ubzidlable" name="ubzidlable" size="10" value="QQ����"/>

          <span class="spantip">�磺���ֻ���ʱ��QQ��,����Ϸʱ���ʺ�,����ǽ�������װ��,�������<br/>

          </span> </div></td>

    </tr>

    <td class="table1_left"> ������λ�� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzunit" size="10" value="��"/ >

          <span class="spantip">�磺����Ԫ���ţ����ѣ�Q�ҵȣ������<br/>

          </span> </div></td>

    </tr>

    <td class="table1_left"> ����˳�� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ordering" size="4" value="1"/>

          ע��:����ԽС��Խ��ǰ�������û������Ҫ����1���ɣ�Ĭ�ϰ�����ʱ�䵹�����У������<br/>

          </span> </div></td>

    </tr>

    <tr>

      <td class="table1_left">��Ʒ�ϼܣ�</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" value="1" name="ubzsell"  class="checkbox" onFocus="this.blur()"/>

          �����ϼ� </div></td>

    </tr>

    <tr>

      <td class="table1_left">�������</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="radio" value="1" name="tosys"  class="checkbox" onFocus="this.blur()" onClick="javascript:alert('����ȫվ������Ҫ��ϵ�ͷ���˺󣬲ſ�����ʾ')"/>

          ����ȫվ����

          <input type="radio" value="-1" name="tosys"  class="checkbox" onFocus="this.blur()"/>

          �����¼����� </div></td>

    </tr>

    <tr id="quickusetr">

      <td class="table1_left">�Ƿ��ἴ�ã�</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" name="quickuse" value="1" class="checkbox" onFocus="this.blur()"/>

        </div></td>

    </tr>

    <tr id="quickusetimetr">

      <td class="table1_left"> �����ʱ�������ʹ�ã� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="quickusetime" value="0.5" size="10" />

          Сʱ  (��ʾ�ͻ���������Ǹ�ʱ����ڱ���ʹ��) </div></td>

    </tr>

    <tr id="buylit">

      <td class="table1_left">���ÿɹ���ʱ��Σ�</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" name="buylit" value="1" class="checkbox" onFocus="this.blur()"/>

        </div></td>

    </tr>

    <tr id="buylitstardate">

      <td class="table1_left"> �ɹ�����ʼʱ�䣺 </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buylitstardate" value="8:30" size="10" />

          ��ʽ:08:15 </div></td>

    </tr>

    <tr id="buylitenddate">

      <td class="table1_left"> �ɹ������ʱ�䣺 </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buylitenddate" value="23:30" size="10" />

          ��ʽ:23:30 </div></td>

    </tr>

    <tr id="buyadaytr">

      <td class="table1_left"> ÿ�����ƹ��������� </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buyaday" value="0" size="10" />

          0���߿ձ�ʾ������ </div></td>

    </tr>

    <tr>

      <td class="table1_left"> ��Ʒ��飺 </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="ubzpdesc" cols="67" rows="6"></textarea>

        </div></td>

    </tr>

    <tr>

      <td class="table1_left"> ע����� </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="palert" cols="67" rows="6"></textarea>

          ������ձ�ʾ������ע�����������д </div></td>

    </tr>

    <tr>

      <td class="table1_left">��ֵ��ַ��</td>

      <td class="buyrt"><div align="left">

          <input type="text" name="ubzczweb" size="30" value=""/>

          ���û�г�ֵ��ַ�������գ� </div></td>

    </tr>

    <tr>

      <td class="table1_left">&nbsp;</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="hidden" id="catid" name="catid"  value=""/>

          <input type="submit" name="Submit" value="ȷ�ϱ���" class="tijiao_input">

          <input type="reset" name="reset" value="������д" class="fanhui_input">

        </div></td>

    </tr>

  </table>

</form>

</td>

</tr>

</table>

<script type="text/javascript">

  	var $=function(id){

  		return document.getElementById(id);

  	}

  	

  	function disp(idx)

  	{

  		$(idx).style.display = ($(idx).style.display == "") ? "none" : "";

  	}

  	

  	function AddElement(val, row) {

  		  if(val == 0)

  		  {

  		  	return;

  		  }

  		  if($("ubTable").rows[row].id == row)

  		  {

  		  	//��ʾ�Ѿ����ڣ���ô���ؼ���

  		  	return;

  		  }

  		  

        var newRow = $("ubTable").insertRow(row); 

        newRow.id = row;

        c2 = newRow.insertCell(); 

        c2.className = "tableright1";

        c2.innerHTML = '<div align="left"> <select id="cat_' + (row+1) + '" size="1" style="width:150px"  onchange="loadCat(this.value,' + (row + 1) + ')"><option select="selected" value="0">��ѡ��'+(row+1)+'������</option></select>';

				        c1 = newRow.insertCell();

c1.className = "table1_left"; 

c1.innerHTML = '<div align="right"> �������ࣺ'

    }

    

    function loadCat(id, row)

    {

      xmlhttp=null;

    

      // ��� Mozilla��������Ĵ��룺

      if (window.XMLHttpRequest)

      {

        xmlhttp=new XMLHttpRequest();

      }

      // ��� IE �Ĵ��룺

      else if (window.ActiveXObject)

      {

        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

      }

      

      if (xmlhttp!=null)

      {

        xmlhttp.onreadystatechange=function(){

        	if (xmlhttp.readyState==4)

          {

            if (xmlhttp.status==200)

            {

              var ackdata=xmlhttp.responseText;

              if(ackdata == '')

              {

              	$("catid").value = id;

              	return;

              }

              

              AddElement(id, row)

              

              tmp = ackdata.split("@#$");

              

              len = tmp.length;

              idx = "cat_" + (row+1);

  

              obj = $(idx);

              obj.length = 1;

              

              for(i = 0; i < len; i++)

              {

              	tmp2 = tmp[i].split(",");

              	obj.options[obj.length] = new Option(tmp2[1], tmp2[0]);

              }

            }

          }

        };

        xmlhttp.open("post", "index.php?m=mod_agent&c=Category&a=Child", true);

        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        xmlhttp.send('id=' + id);

      }

      else

      {

        alert("�����������֧��XMLHTTP")

      }

    }

    

    function checkaddproduct()

    {

    	var vsyscztpl = $("ubzsyscztpl").options[$("ubzsyscztpl").selectedIndex].value;

    	var vcztpl = $("cat").options[$("cat").selectedIndex].value;

    	

    	if(vsyscztpl > 0 && vcztpl > 0)

    	{

    		alert("ϵͳ�Դ���ֵģ����Զ����ֵģ��ֻ��ѡ������һ����������ѡ��");

    		return false;

    	}

    }

    

    function pickcolor() 

    {

      var color = showModalDialog("<?php echo $vd['sc']; ?>tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");

      if (color != null) 

      {

        $("colorexample").style.backgroundColor = color;

        $("namecolor").value = color;

      }

    }



  </script>

</body>

</html>
