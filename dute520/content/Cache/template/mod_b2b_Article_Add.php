<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
<style type="text/css">
td{white-space:normal;overflow:auto;text-overflow:none;}
</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=Article&a=Save" name="cform" id="cform">
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Article" title="文章列表"><font color="#000">文章列表</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">添加文章</span></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_article_index" onFocus="this.blur()" title="查看文章相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>


<div class="cwarpper1">
<div class="ctitle">文章基本信息</div>
<div>
  <table border="0" id="ctable2" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">
        文章主题：
      </td>
      <td class="tablert">
        <input name="title" type="text" class="input" size="40" value="">
        <input type="checkbox" class="checkbox" onclick="setdisplay(this)" onFocus="this.blur()" id="istitlelink"/> 标题转向其它地址
        <input type="checkbox" class="checkbox" name="stick" value="1" onFocus="this.blur()"/> 置顶
        <input type="checkbox" class="checkbox" name="hidden" value="1" onFocus="this.blur()"/> 隐藏
      </td>
    </tr>
    <tr> 
      <td class="tablelt">
        主题颜色：
      </td>
      <td class="tablert">
        <input type="text" id="titlecolor" name="titlecolor" value="" size="10" onkeyup="setcolor(this)"/> 
        <input id="colorexample" type="text" size="1" readonly style="background:#ccc">
        <img src="<?php echo $vd['sc']; ?>images/16.gif" onclick="pickcolor()" align="absmiddle" style="cursor:pointer;"/>
      </td>
    </tr>
    <tr id="titlelink" style="display:none"> 
      <td class="tablelt">
        <strong onmouseover="showhide(this);" onmouseout="showhide(this);">[?]</strong><p>点击商品后，会直接转入这个地址，如果不想转向，务必留空</p>
        转向地址：
      </td>
      <td class="tablert">
        <input name="titlelink" type="text" class="input" size="50" value=""> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="tablelt">
        选择类型：
      </td>
      <td class="tablert">
        <select name="boardid">
          <?php (Option($vd['boards'], $item['boardid'], 'name', 'id')); ?>
        </select>
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1" id="seo">
<div class="ctitle">搜索优化</div>
<div>
  <table border="0" id="ctable2" class="ctable" bordercolor="#ededed">
    <tr> 
      <td class="tablelt">
        文章页面标题：
      </td> 
      <td class="tablert"><input type="text" name="webtitle" value="" size="34"/> <span class="spantip">(留空则默认显示文章主题)</span></td>
    </tr>
    <tr> 
      <td class="tablelt">
        META_KEYWORDS(页面关键词)
      </td>
      <td class="tablert">
        <textarea rows="3" name="meta_keywords" cols="28" style="width:195px;"></textarea>
        <span class="spantip">(留空则默认继承基本设置中的KEYWORDS内容)</span></td>
    </tr>
    <tr> 
      <td class="tablelt">META_DESCRIPTION(页面描述)
      </td>
      <td class="tablert">
        <textarea rows="3" name="meta_description" cols="28" style="width:195px;"></textarea>
        <span class="spantip">(留空则默认继承基本设置中的DESCRIPTION内容)</span>
      </td>
    </tr>
  </table>
</div>
</div>


<div class="cwarpper1" id="mycontent">
<div class="ctitle">
  文章内容
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">如果您要本地上传图片，请保证光标放置于插入位置，再点击上传按钮</p>
</div>
<div>
  <table border="0" id="ctable2" class="ctable" bordercolor="#ededed" style="border:0px">
    <tr> 
      <td style="padding:0px;overflow-y:hidden">
        <textarea name="nr" cols="67" rows="2" style="display:none"></textarea>
        <iframe ID="Editor" name="Editor" src="<?php echo $vd['sc']; ?>ubb/edit.htm?id=nr" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="no" style="height:418px;width:100%; background-color:#D9EEF9"></iframe>
      </td>
    </tr>
  </table>
</div>
</div>
    
<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  <div class="optxt">
    <input type="hidden" id="webdir" value="<?php echo $vd['webdir']; ?>"/>
    <input type="hidden" id="website" value="<?php echo $vd['website']; ?>"/>
    <input type="hidden" id="connecter" value="<?php echo $vd['connecter']; ?>"/>
    <input type="submit" value="添加文章" class="btn"/>
    <input type="reset" value="重置" class="btn"/>
  </div>
</div>
</form>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/javascript">
function pickcolor() 
{
  var color = showModalDialog("<?php echo $vd['sc']; ?>tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
  if (color != null) 
  {
    $("colorexample").style.backgroundColor = color;
    $("titlecolor").value = color;
  }
}
function setcolor(obj)
{
  if(obj.value.length == 7)
  {
    $("colorexample").style.backgroundColor = obj.value;
  }
}

function setdisplay(obj)
{
  $("titlelink").style.display = obj.checked ? "" : "none";
  $("mycontent").style.display = obj.checked ? "none" : "";
  $("seo").style.display = obj.checked ? "none" : "";
}

function CheckForm()
{
  if (document.addNEWS.bt.value.length == 0) {
    alert("留言主题没有填写.");
    document.addNEWS.title.focus();
    return false;
  }

  return true;
}

var titlehaslink = 0;
$("titlelink").style.display = titlehaslink ? "" : "none";
$("content").style.display = titlehaslink ? "none" : "";
$("istitlelink").checked = titlehaslink ? true : false;
</script>
</body>
</html>
