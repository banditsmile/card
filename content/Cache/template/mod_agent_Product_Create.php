<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>手工商品代充记录</title>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<link href="../index/css/common.css" type="text/css" rel="stylesheet" />

<link href="../index/css/page.css" type="text/css" rel="stylesheet" />

<body class="mainbg">

<div class="new_qie">

  <div class="new_qie2">

    <h2> 发布供货商品</h2>

    <span class="setup_index">

    <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked" onClick="javascript:setTimeout(&#39;__doPostBack(\&#39;lbtnLogin\&#39;,\&#39;\&#39;)&#39;, 0)">

    <label for="lbtnLogin">登录后到这页</label>

    </span> </div>

  <ul>

    <li> <a href="../index.php?m=mod_agent&c=Product&a=Create" class="on">发布供货商品</a></li>

    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Product">所有商品列表</a></li>

    <li> <a id="lbtn23" href="../index.php?m=mod_agent&c=Product&a=Stock">商品库存列表</a></li>

  </ul>

  <p>&nbsp;</p>

</div>

<form id="cform" method="post" action="index.php?m=mod_agent&c=Product&a=Save"  onsubmit="return checkaddproduct()">

  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1"  class="table1" id="ubTable" tyle="margin: 0">

    <tr>

      <td width="16%" class="table1_left">商品分类：</td>

      <td width="84%" align="left" class="tableright1"><div align="left">

          <select name="cat1" size="1" style="width:150px"  onchange="loadCat(this.value,1)">

            <option select="selected" value="0">请选择一级分类</option>

            

      	    

          <?php (Option($vd['cat'], 0, 'name', 'id')); ?>

        

    	    

          </select>

          <font color="#FF0000">*</font> </div></td>

    </tr>

    <tr>

      <td class="table1_left">商品名称：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzpname" size="60" value="" />

          <font color="#FF0000"> *</font>

          <input type="checkbox" value="1" name="isbold"  class="checkbox" onFocus="this.blur()"/>

          粗体 </div></td>

    </tr>

    <tr>

      <td class="table1_left">标题颜色：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="namecolor" name="namecolor" value="#222222" style="width:100px" onKeyUp="setcolor(this)"/>

          <input id="colorexample" type="text" size="1" readonly  style="background:#222222;cursor:pointer;width:20px;border:1px #cccccc solid;height:18px" onClick="pickcolor()">

        </div></td>

    </tr>

    <tr>

      <td class="table1_left"><span class="name">基本价钱：</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzlistprice" size="10" class="priceinput" value="10"/>

          <font color="#FF0000"> * </font>市场价(商品的面值)<br/>

          <input type="text" name="ubzprice" size="10" class="priceinput" value="0"/>

          <font color="#FF0000"> * </font>进价(商品的进货价) </div></td>

    </tr>

    <tr>

      <td class="table1_left">商品类型：</td>

      <td align="left" class="tableright1"><div align="left">

          <select size="1" id="ubzptype" name="ubzptype" onChange="showtpl(this)">

            <option value="2">手工充值</option>

            <option value="0">虚拟卡密</option>

            <option value="3">选号商品</option>

          </select>

          <font color="#FF0000"> *</font> </div></td>

    </tr>

    <tr id="tpl" style="display:none">

      <td class="table1_left">自动充值模板：</td>

      <td align="left" class="tableright1"><div align="left"><span id="tpllist"></span><font color="#FF0000">请不要选择（请保存默认,否则无法发布）</font> </div></td>

    </tr>

    <tr>

      <td class="table1_left"> 充值模板：

      <td align="left" class="tableright1"><div align="left">

          <select size="1" id="ubzsyscztpl" name="ubzsyscztpl" style="width:130px;">

            <option value="0" selected>请选择充值模块</option>

            

            

        <?php (Option($vd['customtpl'], 0, 'name', 'id')); ?>

      

          

          </select>

        </div></td>

    </tr>

    <tr id="czidname" style="display:none">

      <td class="table1_left"><span class="tip" id="tipidlable" style="display:none">(比如刷钻时就填写QQ号码,充值游戏时就填写游戏帐号，可以自己填写)</span> <span class="name" id="spanidlable">充值名称：</span> </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="ubzidlable" name="ubzidlable" size="10" value="QQ号码"/>

          ((比如刷钻时就填写QQ号码,充值游戏时就填写游戏帐号，可以自己填写)) </div></td>

    </tr>

    <tr id="areaserv" style="display:none">

      <td class="table1_left"><span class="name" id="spanareaserv" >区服显示：</span></td>

      <td align="left" class="tableright1"><div align="left"><span id="spanareaserv1">

          <input type="checkbox" value="1" name="ubzdisparea" class="checkbox"/>

          显示区域

          <input type="checkbox" value="1" name="ubzdispserv" class="checkbox"/>

          显示服务器</span> <span id="spanareaserv2" style="display:none">

          <input type='radio' value='1' name='ubzdisparea' class='checkbox' checked onFocus="this.blur()"/>

          允许选号购买(购买时显示号码，允许选择购买) <br/>

          <input type='radio' value='0' name='ubzdisparea' class='checkbox' onFocus="this.blur()"/>

          随机号码(购买时不显示号码，随机提取库存号码) </span> </div></td>

    </tr>

    <tr id="tradeterm" style="display:none">

      <td class="table1_left"><span id="spanareaserv" >交易方式：</span> </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="ubztradeterm" cols="28" style="width:208px;" rows="3"></textarea>

        </div></td>

    </tr>

    <tr id="disponshow" style="display:none">

      <td class="table1_left"><span class="name" id="spanareaserv" >交易方式显示时间：</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="radio" value="0" name="ubzdisponshow" class="checkbox"/>

          成功购买后显示

          <input type="radio" value="1" name="ubzdisponshow" class="checkbox"/>

          购买前显示 </div></td>

    </tr>

    <tr id="stocks" style="display:none">

      <td class="table1_left"><span class="name">库存：</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" value="1" name="ubzstocks" size="10" />

          (暂未开放功能，无须填写) </div></td>

    </tr>

    <tr id="unit" style="display:none">

      <td class="table1_left"><span class="name">库存单位：</span></td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" size="10" name="ubzunit" />

          (暂未开放功能，无须填写) </div></td>

    </tr>

    <tr>

      <td class="table1_left"> 购买数量控制(方式一)： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzqtymin" size="5" value="1"/>

          起购量(个)注意：如果是不可以查不可续的业务,起购量和截止量必须是1-1<br/>

          <input type="text" name="ubzqtymax" size="5" value="1"/>

          截止量(个) </div></td>

    </tr>

    <tr>

      <td class="table1_left"> 购买数量控制(方式二)： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzqtylist" size="22" value=""/>

          <span class="spantip">可留空<br/>

          自定义方式,请使用使用半角逗号隔开相应数量，方式一/二任选，二优先于一<br/>

          两种方式任选一种，如果需要使用第二种，即设置第二种即可，第一种自动失效</span> </div></td>

    </tr>

    <td class="table1_left"> 充值名称： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" id="ubzidlable" name="ubzidlable" size="10" value="QQ号码"/>

          <span class="spantip">如：充手机钻时叫QQ号,充游戏时叫帐号,如果是金币类或者装备,（可自填）<br/>

          </span> </div></td>

    </tr>

    <td class="table1_left"> 数量单位： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ubzunit" size="10" value="个"/ >

          <span class="spantip">如：个，元，张，话费，Q币等（可自填）<br/>

          </span> </div></td>

    </tr>

    <td class="table1_left"> 排列顺序： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="ordering" size="4" value="1"/>

          注意:数字越小，越靠前排序，如果没有特殊要求，填1即可，默认按添加时间倒序排列（可自填）<br/>

          </span> </div></td>

    </tr>

    <tr>

      <td class="table1_left">商品上架：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" value="1" name="ubzsell"  class="checkbox" onFocus="this.blur()"/>

          立刻上架 </div></td>

    </tr>

    <tr>

      <td class="table1_left">面向对象：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="radio" value="1" name="tosys"  class="checkbox" onFocus="this.blur()" onClick="javascript:alert('面向全站代理需要联系客服审核后，才可以显示')"/>

          面向全站代理

          <input type="radio" value="-1" name="tosys"  class="checkbox" onFocus="this.blur()"/>

          面向下级代理 </div></td>

    </tr>

    <tr id="quickusetr">

      <td class="table1_left">是否即提即用：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" name="quickuse" value="1" class="checkbox" onFocus="this.blur()"/>

        </div></td>

    </tr>

    <tr id="quickusetimetr">

      <td class="table1_left"> 购买后时间段内须使用： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="quickusetime" value="0.5" size="10" />

          小时  (表示客户购买后在那个时间段内必须使用) </div></td>

    </tr>

    <tr id="buylit">

      <td class="table1_left">启用可购买时间段：</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="checkbox" name="buylit" value="1" class="checkbox" onFocus="this.blur()"/>

        </div></td>

    </tr>

    <tr id="buylitstardate">

      <td class="table1_left"> 可购买起始时间： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buylitstardate" value="8:30" size="10" />

          格式:08:15 </div></td>

    </tr>

    <tr id="buylitenddate">

      <td class="table1_left"> 可购买结束时间： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buylitenddate" value="23:30" size="10" />

          格式:23:30 </div></td>

    </tr>

    <tr id="buyadaytr">

      <td class="table1_left"> 每天限制购买数量： </td>

      <td align="left" class="tableright1"><div align="left">

          <input type="text" name="buyaday" value="0" size="10" />

          0或者空表示不限制 </div></td>

    </tr>

    <tr>

      <td class="table1_left"> 商品简介： </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="ubzpdesc" cols="67" rows="6"></textarea>

        </div></td>

    </tr>

    <tr>

      <td class="table1_left"> 注意事项： </td>

      <td align="left" class="tableright1"><div align="left">

          <textarea name="palert" cols="67" rows="6"></textarea>

          如果留空表示不弹出注意事项！建议填写 </div></td>

    </tr>

    <tr>

      <td class="table1_left">充值地址：</td>

      <td class="buyrt"><div align="left">

          <input type="text" name="ubzczweb" size="30" value=""/>

          如果没有充值网址（可留空） </div></td>

    </tr>

    <tr>

      <td class="table1_left">&nbsp;</td>

      <td align="left" class="tableright1"><div align="left">

          <input type="hidden" id="catid" name="catid"  value=""/>

          <input type="submit" name="Submit" value="确认保存" class="tijiao_input">

          <input type="reset" name="reset" value="重新填写" class="fanhui_input">

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

  		  	//表示已经存在，那么返回即可

  		  	return;

  		  }

  		  

        var newRow = $("ubTable").insertRow(row); 

        newRow.id = row;

        c2 = newRow.insertCell(); 

        c2.className = "tableright1";

        c2.innerHTML = '<div align="left"> <select id="cat_' + (row+1) + '" size="1" style="width:150px"  onchange="loadCat(this.value,' + (row + 1) + ')"><option select="selected" value="0">请选择'+(row+1)+'级分类</option></select>';

				        c1 = newRow.insertCell();

c1.className = "table1_left"; 

c1.innerHTML = '<div align="right"> 二级分类：'

    }

    

    function loadCat(id, row)

    {

      xmlhttp=null;

    

      // 针对 Mozilla等浏览器的代码：

      if (window.XMLHttpRequest)

      {

        xmlhttp=new XMLHttpRequest();

      }

      // 针对 IE 的代码：

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

        alert("您的浏览器不支持XMLHTTP")

      }

    }

    

    function checkaddproduct()

    {

    	var vsyscztpl = $("ubzsyscztpl").options[$("ubzsyscztpl").selectedIndex].value;

    	var vcztpl = $("cat").options[$("cat").selectedIndex].value;

    	

    	if(vsyscztpl > 0 && vcztpl > 0)

    	{

    		alert("系统自带充值模板和自定义充值模版只能选择其中一个，请重新选择");

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

