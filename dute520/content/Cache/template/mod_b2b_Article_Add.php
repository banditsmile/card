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
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Article" title="�����б�"><font color="#000">�����б�</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">�������</span></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_article_index" onFocus="this.blur()" title="�鿴������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>


<div class="cwarpper1">
<div class="ctitle">���»�����Ϣ</div>
<div>
  <table border="0" id="ctable2" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">
        �������⣺
      </td>
      <td class="tablert">
        <input name="title" type="text" class="input" size="40" value="">
        <input type="checkbox" class="checkbox" onclick="setdisplay(this)" onFocus="this.blur()" id="istitlelink"/> ����ת��������ַ
        <input type="checkbox" class="checkbox" name="stick" value="1" onFocus="this.blur()"/> �ö�
        <input type="checkbox" class="checkbox" name="hidden" value="1" onFocus="this.blur()"/> ����
      </td>
    </tr>
    <tr> 
      <td class="tablelt">
        ������ɫ��
      </td>
      <td class="tablert">
        <input type="text" id="titlecolor" name="titlecolor" value="" size="10" onkeyup="setcolor(this)"/> 
        <input id="colorexample" type="text" size="1" readonly style="background:#ccc">
        <img src="<?php echo $vd['sc']; ?>images/16.gif" onclick="pickcolor()" align="absmiddle" style="cursor:pointer;"/>
      </td>
    </tr>
    <tr id="titlelink" style="display:none"> 
      <td class="tablelt">
        <strong onmouseover="showhide(this);" onmouseout="showhide(this);">[?]</strong><p>�����Ʒ�󣬻�ֱ��ת�������ַ���������ת���������</p>
        ת���ַ��
      </td>
      <td class="tablert">
        <input name="titlelink" type="text" class="input" size="50" value=""> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="tablelt">
        ѡ�����ͣ�
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
<div class="ctitle">�����Ż�</div>
<div>
  <table border="0" id="ctable2" class="ctable" bordercolor="#ededed">
    <tr> 
      <td class="tablelt">
        ����ҳ����⣺
      </td> 
      <td class="tablert"><input type="text" name="webtitle" value="" size="34"/> <span class="spantip">(������Ĭ����ʾ��������)</span></td>
    </tr>
    <tr> 
      <td class="tablelt">
        META_KEYWORDS(ҳ��ؼ���)
      </td>
      <td class="tablert">
        <textarea rows="3" name="meta_keywords" cols="28" style="width:195px;"></textarea>
        <span class="spantip">(������Ĭ�ϼ̳л��������е�KEYWORDS����)</span></td>
    </tr>
    <tr> 
      <td class="tablelt">META_DESCRIPTION(ҳ������)
      </td>
      <td class="tablert">
        <textarea rows="3" name="meta_description" cols="28" style="width:195px;"></textarea>
        <span class="spantip">(������Ĭ�ϼ̳л��������е�DESCRIPTION����)</span>
      </td>
    </tr>
  </table>
</div>
</div>


<div class="cwarpper1" id="mycontent">
<div class="ctitle">
  ��������
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">�����Ҫ�����ϴ�ͼƬ���뱣֤�������ڲ���λ�ã��ٵ���ϴ���ť</p>
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
    <input type="submit" value="�������" class="btn"/>
    <input type="reset" value="����" class="btn"/>
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
    alert("��������û����д.");
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
