<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css">
<style type="text/css">
td{height:30px}
</style>
</head>
<body>
<table border="1" width="100%" style="border-collapse: collapse;" bordercolor="#cccccc">
  <tr>
    <td class="listhead" colspan="2" style="border-right:1px #ccc solid">静态页面生成程序</td>
  </tr>
  <tr>
    <td width="25%" align="center">文章系统相关页面</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid"><input type="button" onclick="setdata(1, 'article', 'article')" value="编号<?php echo $vd['id']; ?>的文章对应静态页面生成" class="button" style="padding-left:0px;"/></td>
  </tr>
  <?php if(UB_B2C){ ?>
  <tr>
    <td width="25%" align="center"<?php if(!UB_YKT&&!UB_B2B){ ?> style="border-bottom:1px #ccc solid"<?php } ?>>零售平台相关页面</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;<?php if(!UB_YKT&&!UB_B2B){ ?>border-bottom:1px #ccc solid<?php } ?>">
      <input type="button" onclick="setdata(1, 'index', 'b2c')" value="首页静态页面生成" class="button"/>
      <input type="button" onclick="setdata(1, 'cat', 'b2c')" value="商品总类静态页面生成" class="button"/>
    </td>
  </tr>
  <?php } ?>
  <?php if(UB_B2B){ ?>
  <tr>
    <td width="25%" align="center"<?php if(!UB_YKT){ ?> style="border-bottom:1px #ccc solid"<?php } ?>>批发平台相关页面</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;<?php if(!UB_YKT){ ?>border-bottom:1px #ccc solid<?php } ?>">
      <input type="button" onclick="setdata(1, 'index', 'b2b')" value="首页静态页面生成" class="button"/>
    </td>
  </tr>
  <?php } ?>
  <?php if(UB_YKT){ ?>
  <tr>
    <td width="25%" align="center" style="border-bottom:1px #ccc solid">一卡通平台相关页面</td>
    <td width="75%" align="left" style="border-right:1px #ccc solid;border-bottom:1px #ccc solid">
      <input type="button" onclick="setdata(1, 'index', 'ykt')" value="首页静态页面生成" class="button"/>
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
  var modname = "零售系统";
  var id = 0;
  
  var thisid = 0;
  
  var single = 1; // 如果单项则为1
  var thiscount = 0;
  
  // 顺序 首页->类目->商品->列表->文章
  
  function loadXMLDoc()
  {
    xmlhttp=null;
    var url=null;
    
    url = "m=" + m + "&c=" + c + "&a=" + a + "&id=" + thisid + "&thismod=" + thismod;
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
      xmlhttp.onreadystatechange=state_Change;
      xmlhttp.open("post", "index.php", true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send(url);
    }
    else
    {
      alert("您的浏览器不支持XMLHTTP")
    }
  }
  
  function state_Change()
  {
    var result = document.getElementById("result");
    // 如果 xmlhttp 显示为 "loaded"
    if (xmlhttp.readyState==4)
    {
      // 如果为 "OK"
      if (xmlhttp.status==200)
      {
        if(a == "index")
        {
          result.innerHTML = modname + "首页生成完毕  => index.html";
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
          result.innerHTML = modname + "类目生成完毕  => cat.html";
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
          result.innerHTML = modname + "编号为" + thisid + "商品生成完毕  => product/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == pidcount))
          {
            result.innerHTML = "所有商品静态页面生成完毕";
            return;
          }

          if(thiscount == pidcount)
          {
            a = "plist";
            thisid = cat[0];
            thiscount = 1;
            result.innerHTML = "所有商品静态页面生成完毕";
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
          result.innerHTML = "编号为" + thisid + "的商品分类生成完毕  => list/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == catcount))
          {
            result.innerHTML = "所有商品分类静态页面生成完毕";
            return;
          }

          if(thiscount == catcount)
          {
            a = "article";
            thisid = art[0];
            thiscount = 1;
            result.innerHTML = "所有商品分类静态页面生成完毕";
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
          result.innerHTML = "编号为" + thisid + "的文章生成完毕  => article/" + thisid + ".html";
          
          if((single == 1) &&(thiscount == artcount))
          {
            result.innerHTML = "所有文章静态页面生成完毕";
            return;
          }
          
          if(thiscount == artcount)
          {
            result.innerHTML = "所有文章静态页面生成完毕";
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
        result.innerHTML = "首页生成失败";
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
        modname = "批发";
        break;
      case "ykt":
        modname = "一卡通";
        break;
      case "b2c":
        modname = "零售";
        break;
      case "article":
        modname = "文章";
        break;
    }
    
    thiscount = 1;
    a = act;
    single = sgl;
    loadXMLDoc();
  }
</script>
