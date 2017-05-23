<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css">
<style type="text/css">
td{height:30px}
</style>
</head>
<body>
<table border="1" width="100%" style="border-collapse: collapse;" bordercolor="#cccccc">
  <tr>
    <td class="listhead" colspan="2" style="border-right:1px #ccc solid">��̬ҳ�����ɳ���</td>
  </tr>
  <tr>
    <td width="25%" align="center">����ϵͳ���ҳ��</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid"><input type="button" onclick="setdata(1, 'article', 'article')" value="���<?php echo $vd['id']; ?>�����¶�Ӧ��̬ҳ������" class="button" style="padding-left:0px;"/></td>
  </tr>
  <?php if(UB_B2C){ ?>
  <tr>
    <td width="25%" align="center"<?php if(!UB_YKT&&!UB_B2B){ ?> style="border-bottom:1px #ccc solid"<?php } ?>>����ƽ̨���ҳ��</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;<?php if(!UB_YKT&&!UB_B2B){ ?>border-bottom:1px #ccc solid<?php } ?>">
      <input type="button" onclick="setdata(1, 'index', 'b2c')" value="��ҳ��̬ҳ������" class="button"/>
      <input type="button" onclick="setdata(1, 'cat', 'b2c')" value="��Ʒ���ྲ̬ҳ������" class="button"/>
    </td>
  </tr>
  <?php } ?>
  <?php if(UB_B2B){ ?>
  <tr>
    <td width="25%" align="center"<?php if(!UB_YKT){ ?> style="border-bottom:1px #ccc solid"<?php } ?>>����ƽ̨���ҳ��</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;<?php if(!UB_YKT){ ?>border-bottom:1px #ccc solid<?php } ?>">
      <input type="button" onclick="setdata(1, 'index', 'b2b')" value="��ҳ��̬ҳ������" class="button"/>
    </td>
  </tr>
  <?php } ?>
  <?php if(UB_YKT){ ?>
  <tr>
    <td width="25%" align="center" style="border-bottom:1px #ccc solid">һ��ͨƽ̨���ҳ��</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;border-bottom:1px #ccc solid">
      <input type="button" onclick="setdata(1, 'index', 'ykt')" value="��ҳ��̬ҳ������" class="button"/>
    </td>
  </tr>
  <?php } ?>
</table>
<br/>
<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#cccccc">
  <tr>
    <td style="border:1px #ccc solid"><div id="result" style="font-size:15px;color:#ff0000;font-weight:bold"></div><div id="tmp"></div></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
  var cat = new Array();
  var pid = new Array();
  var art = new Array();
  art[0] = <?php echo $vd['id']; ?>;
  artcount = 1;
  
  var thismod = 'b2b';
  var m  = "mod_b2b";
  var c  = "html";
  var a  = 'index';
  var modname = "����ϵͳ";
  var id = 0;
  
  var thisid = 0;
  
  var single = 1; // ���������Ϊ1
  var thiscount = 0;
  
  // ˳�� ��ҳ->��Ŀ->��Ʒ->�б�->����
  
  function loadXMLDoc()
  {
    xmlhttp=null;
    var url=null;
    
    url = "m=" + m + "&c=" + c + "&a=" + a + "&id=" + thisid + "&thismod=" + thismod;
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
      xmlhttp.onreadystatechange=state_Change;
      xmlhttp.open("post", "index.php", true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send(url);
    }
    else
    {
      alert("�����������֧��XMLHTTP")
    }
  }
  
  function state_Change()
  {
    var result = document.getElementById("result");
    // ��� xmlhttp ��ʾΪ "loaded"
    if (xmlhttp.readyState==4)
    {
      // ���Ϊ "OK"
      if (xmlhttp.status==200)
      {
        if(a == "index")
        {
          result.innerHTML = modname + "��ҳ�������  => index.html";
          if(single == 1)
          {
            return;
          }
          
          a = "cat";
          loadXMLDoc();
          return;
        }
        
        if(a == "cat")
        {
          result.innerHTML = modname + "��Ŀ�������  => cat.html";
          if(single == 1)
          {
            return;
          }
          
          a = "product";
          thisid = pid[0];
          thiscount = 1;
          loadXMLDoc();
          return;
        }
        
        if(a == "product")
        {
          result.innerHTML = modname + "���Ϊ" + thisid + "��Ʒ�������  => product/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == pidcount))
          {
            result.innerHTML = "������Ʒ��̬ҳ���������";
            return;
          }

          if(thiscount == pidcount)
          {
            a = "plist";
            thisid = cat[0];
            thiscount = 1;
            result.innerHTML = "������Ʒ��̬ҳ���������";
            if(single == 1)
            {
              return;
            }
          }
          thisid = pid[thiscount];
          thiscount++;
          loadXMLDoc();
          return;
        }
        
        if(a == "plist")
        {
          result.innerHTML = "���Ϊ" + thisid + "����Ʒ�����������  => list/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == catcount))
          {
            result.innerHTML = "������Ʒ���ྲ̬ҳ���������";
            return;
          }

          if(thiscount == catcount)
          {
            a = "article";
            thisid = art[0];
            thiscount = 1;
            result.innerHTML = "������Ʒ���ྲ̬ҳ���������";
            if(single == 1)
            {
              return;
            }
          }
          thisid = cat[thiscount];
          thiscount++;
          loadXMLDoc();
          return;
        }
        
        if(a == "article")
        {
          result.innerHTML = "���Ϊ" + thisid + "�������������  => article/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == artcount))
          {
            result.innerHTML = "�������¾�̬ҳ���������";
            return;
          }
          
          if(thiscount == artcount)
          {
            result.innerHTML = "�������¾�̬ҳ���������";
            if(single == 1)
            {
              return;
            }
          }
          thisid = art[thiscount];
          thiscount++;
          loadXMLDoc();
          return;
        }
      }
      else
      {
        result.innerHTML = "��ҳ����ʧ��";
      }
    }
  }
  
  function setdata(sgl, act, mod)
  {
    if(act == "product")
    {
      thisid = pid[0];
      
    }
    if(act == "cat")
    {
      thisid = cat[0];
      
    }
    if(act == "article")
    {
      thisid = art[0];
      
    }
    thismod = mod;
    
    switch(mod)
    {
      case "b2b":
        modname = "����";
        break;
      case "ykt":
        modname = "һ��ͨ";
        break;
      case "b2c":
        modname = "����";
        break;
      case "article":
        modname = "����";
        break;
    }
    
    thiscount = 1;
    a = act;
    single = sgl;
    loadXMLDoc();
  }
</script>
