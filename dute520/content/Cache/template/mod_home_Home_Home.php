<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>���ƿ�-��̨��¼��ҳ</title>
    <style media="all" type="text/css">
        body, h1, button, input, select, textarea, fieldset, td
        {
            font: 12px/1.5 microsoft yahei, sans-serif,\5b8b\4f53;
        }
        body, FORM
        {
            margin: 0px;
            padding: 0px;
            color: #111;
            font: 12px arial;
        }
        body
        {
            background: #ecf4ff;
        }
        a:link, a:visited
        {
            color: #333;
            text-decoration: none;
        }
        a:hover, a:active
        {
            color: #999;
        }
        .kuang
        {
            border: 1px solid #bbd7ff;
            padding: 1px;
            background: #fff;
        }
        h1, th
        {
            font-size: 14px;
            color: #486693;
            text-align: left;
            height: 25px;
            line-height: 25px;
            background: url(<?php echo $vd['sc']; ?>images/th_di.gif) repeat-x;
            padding: 0 5px;
            margin: 0;
        }
        h1 span
        {
            float: left;
        }
        h1 a
        {
            float: right;
        }
        table div
        {
            line-height: 1.8;
        }
        td
        {
            vertical-align: top;
        }
        ul
        {
            margin: 0;
            padding: 8px;
            list-style-type: none;
        }
        li
        {
            border-bottom: 1px dotted #ccc;
        }
        li span
        {
            padding-left: 5px;
            color: #aaa;
            font-size: 10px;
        }
        li .guan
        {
            color: red;
        }
        li .kai
        {
            color: #090;
        }
        .di
        {
            text-align: center;
            color: #8192a9;
            padding: 8px;
        }
        .di a
        {
            color: #8192a9;
        }
        
        #mytable
        {
            width: 100%;
            padding: 0;
            margin: 0;
        }
        #mytable td
        {
            border-bottom: 1px solid #bbd7ff;
            padding: 5px;
            color: #3f63a0;
        }
        #mytable .input1
        {
            background: url(<?php echo $vd['sc']; ?>images/input_di.gif) no-repeat;
            border: 1px solid #8aa6c5;
            height: 19px;
            line-height: 19px;
            width: 70px;
        }
        #mytable .button
        {
            font-size: 12px;
        }
        
        .left
        {
            text-align: right;
            background: #f2f8fc;
        }
 </style>
</head>
<body><script type="text/javascript">
   if (!window.XMLHttpRequest) {
     document.getElementById("myhome").style.position = "absolute";
   }
</script><table border="1" width="100%" style="border-collapse: collapse;" bordercolor="#cccccc">
<tr>

    <td width="53%" height="30" class="listhead">
      <div align="left">| <a href="/b2b/" target="_blank">����ϵͳ</a> | <a href="/ykt/" target="_blank">һ��ͨϵͳ</a></div    >
    <td width="47%" class="listhead"><div align="left">�ٷ���Ҫ֪ͨ����ӭʹ�����ƿ�ϵͳ��������ϵ����QQ��936992497</div></td>
</script>
<br /><?php $item=$vd['sysinfo']; ?>
    <table width="100%" cellspacing="5" cellpadding="0">
        <tr>
            <td width="50%">
                <div class="kuang">
                    <h1>

                        <span>����������</span></h1>
                    <div>
                        <ul>
                          <li>δ�����˵���<a href="index.php?m=mod_b2b&c=Order&optype=w&by=1&aid=-2" onclick="loadDisp(1)"><?php echo $item['order_todeal']; ?>��</a></li>
                          <li>δ����Ͷ�ߣ�<a href="index.php?m=mod_b2b&c=Complaint&msgto=0&mstate=1&by=1" onclick="loadDisp(1)"><?php echo $item['pm_complaint']; ?>��</a></li>
                          <li>δ�����<a href="index.php?m=mod_b2b&c=Remit&msgto=0&mstate=1&by=1" onclick="loadDisp(1)"><?php echo $item['pm_addfunds']; ?>��</a></li>
                        </ul>
                    </div>
                </div>
                <div class="kuang">
                    <h1>
                        <span>����ҵ����</span></h1>
                    <div>
                        <ul>
                          <li>���ն�������<a href="index.php?m=mod_b2b&c=order&aid=-2&startdate=<?php echo $startdate; ?>"  onclick="loadDisp(1)"><?php echo $item['order_num']; ?>��</a></li>
                          <li>����Ԥ���������<a href="index.php?m=mod_b2b&c=funds&startdate=<?php echo $startdate; ?>"  onclick="loadDisp(1)"><?php echo $item['today_funds']; ?>��</a></li>
                          <li>���������û���<a href="index.php?m=mod_b2b&c=agent&startdate=<?php echo $startdate; ?>"  onclick="loadDisp(1)"><?php echo $item['today_agent']; ?>��</a></li>
                        </ul>
                    </div>
                </div>
<div class="kuang">
                    <h1>
                        <span>����֧�֣�</span></h1>
                    <div>
                        <ul>
                          <li>����������<a href="http://www.xybss.com.cn">������������ϵͳ</a></li>
                          <li>����������<a href="http://www.meiis.com/">���׻�����������</a></li>
                          <li>����QQ��<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=936992497&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:936992497:51" alt="�����ϵ����" title="�����ϵ����"/></a></li>
                        </ul>
                    </div>
                </div>

            </td>
            <td width="50%">
                <div class="kuang">
                    <table id="mytable" cellspacing="0">
                        <tr>
                            <th colspan="2" style="border-top: 1px solid #fff">
                                ƽ̨������Ϣ
                            </th>
                        </tr>
                        <tr>
                            <td width="35%" class="left">
                                ��Ȩ������
                            </td>
                            <td width="65%" align="left">
                                <strong><font color="#ff0000">
                                    www.</font><font color="#FF0000">xybss.com.cn</font></strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="left">
                                ϵͳ�汾��
                            </td>
                            <td align="left">
                                <strong><font color="#FF0000">���ƿ�</font></strong>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" style="border-top: 1px solid #fff">
                                ��ֵ������
                            </th>
                        </tr>
                        <tr>
                            <td class="left">
                                �¼���վ��ȣ�
                            </td>
                            <td align="left">
                                <a href="index.php?m=mod_b2b&c=EShop"><span style="color: #0a0; font-weight: bold; text-decoration: underline;">
                                    0</span></a> ������
                            </td>
                        </tr>
                        <tr>
                            <td class="left">
                                �Ա��ԽӶ�ȣ�
                            </td>
                            <td align="left">
                                <a href="#"><span style="color: #0a0; font-weight: bold;
                                    text-decoration: underline;">
                                    0</span></a> ������
                            </td>
                        </tr>
                        
                                                    </td>
							</tr>
                               <td width="49%" style="border-right:0px #fff solid"><div align="center">�ʱ�䣺</div></td>
          <td width="51%" style="border-right:1px #ccc solid;text-align:right"><div align="left">2013-12-09</div></td>
        </tr>
                <tr>
          <td width="49%" style="border-right:0px #fff solid"><div align="center">����ʱ�䣺</div></td>
          <td width="51%" style="border-right:1px #ccc solid;text-align:right"><div align="left">2114-12-09</div><script language=JavaScript> 
var startDate = new Date("12/09/2013") 
function GetServerTime() 
{ 
var urodz = new Date("12/09/2114"); 
var now  = new Date(); 
days= (urodz - now) / 1000 / 60 / 60 / 24; 
daysRound   = Math.floor(days); 
days_1= (now - startDate) / 1000 / 60 / 60 / 24; 
daysRound_1   = Math.floor(days_1); 
hours= (urodz - now) / 1000 / 60 / 60 - (24 * daysRound); 
hoursRound   = Math.floor(hours); 
minutes   = (urodz - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound); 
minutesRound  = Math.floor(minutes); 
seconds   = (urodz - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound); 
secondsRound  = Math.round(seconds); 
document.getElementById("havedays").innerHTML   = daysRound + " �� "; 
document.getElementById("daycount").innerHTML   = daysRound_1 + " �� "; 
//document.getElementById("time").innerHTML   = hoursRound + " Сʱ " + minutesRound + " �� " + secondsRound + " ��"; 
  
} 
setInterval("GetServerTime()",250); 
</script></td>
        </tr>
        <tr>
          <td style="border-right:0px #fff solid;border-bottom:1px #ccc solid"><div align="center">��Ӫ������</div></td>
          <td style="border-right:1px #ccc solid;border-bottom:1px #ccc solid;text-align:right"><div align="left" class="STYLE6"><span id="daycount"></span></div></td>
        </tr>
        <tr>
          <td style="border-right:0px #fff solid;border-bottom:1px #ccc solid"><div align="center">��ʣ������</div></td>
          <td style="border-right:1px #ccc solid;border-bottom:1px #ccc solid;text-align:right"><div align="left"><span class="STYLE6" style="border-bottom:1px #ccc solid;"><span id="havedays"></span><span id="time"></span></div></td>
        </tr>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <div class="di">��</div>
<div id="load" style="display:none">
  <div id="loadcontent" ><div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>ҳ����������Ե�...</div>
</div>
<script type="text/javascript">
var $ = function(id){
  return document.getElementById(id);
}
if (window.XMLHttpRequest) 
{
  if(!window.ActiveXObject)
  {
     $("frm1").style.height = "87px";
     $("frm2").style.height = "88px";
  }
} 
function iEvent(sType,oInput)
{
  switch (sType){
    case "focus" :
      oInput.isfocus = true;
      oInput.style.backgroundColor='#FFFFD8';
    case "mouseover" :
      oInput.style.borderColor = '#99E300';
      break;
    case "blur" :
      oInput.isfocus = false;
      oInput.style.backgroundColor="";
    case "mouseout" :
      if(!oInput.isfocus){
        oInput.style.borderColor='#A1BCA3';
      }
      break;
  }
}

function disp(id)
{
  document.getElementById(id).style.display = document.getElementById(id).style.display=="" ? "none" : "";
}

function setLoad(txt)
{
  $("loadcontent").innerHTML = '<div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>' + txt;
}

function loadDisp(flag)
{
  $("load").style.display = flag ? "" : "none";
}

function setOnclick()
{
  es = document.getElementsByTagName("a");
  len = es.length;
  for(var i=0; i < len; i++)
  {
    var o = es[i];
    o.onclick = function(){ loadDisp(1);};
  }
  es = null;
}

function setSearchTxt()
{
  setLoad("�������������Ե�...");
  loadDisp(1);
}

<?php if(isset($vd['showver']) && $vd['showver'] == 1){ ?>
function GetBiz()
{
  var xmlhttp;
  var obj = document.getElementById("sysmsg");
  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        if(data != "" ){
           if(data == "1")
           {
           	 $("adddiv").style.display = "";
           }
        }
      }
    }
  }
  xmlhttp.open("post", "index.php?m=mod_home&c=home&a=GetBiz", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send('');
}

GetBiz();
<?php } ?>

//setLoad("ҳ����������Ե�...");
//setOnclick();
</script>
</body>
</html>