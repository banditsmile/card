<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
</head>
<body>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">ҳ�������</span></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_ad_index" onFocus="this.blur()" title="�鿴ҳ���������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>
<div class="cwarpper1">
<div class="ctitle">
  <div style="padding-left:5px;padding-bottom:8px;" >
    ��ѡ�������ͣ�
    <select name="cat" onchange="javascript:location.href='index.php?m=mod_b2b&c=Ad&pos=' + this.options[selectedIndex].value;" class="ubselect">
    <?php (option($vd['adtype'], $vd['pos'])); ?>
    </select>
    <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">
      ��ϵͳ�����������ӣ�������ͼƬ���ǻ��ڹ��ϵͳ����ѡ���Ӧ�������
    </p>
  </div>
</div>
<?php if($vd['pos'] > 0){ ?>
<form method="post" action="index.php?m=mod_b2b&c=Ad&a=Save" name="cform" id="cform">
<table border="1" id="ctable1" class="ctable" bordercolor="#86B9D6">
  <tr>
    <td align="center" height="35" colspan="2" class="listhead" style="text-align:left;font-weight:bold;padding-left:10px;color:#ff0000">
      <img src="<?php echo $vd['sc']; ?>images/add.gif" style="vertical-align:middle" border="0"/> ���
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">ͼƬ<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <br/><input type="text" id="ubzpic200" name="ubzpic" value="" size="34"/> 
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">��������</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="text" name="ubztext" value="" size="34"/> 
    ������ɫ��
    <input type="text" id="textcolor200" name="ubztextcolor" value="" size="15" onkeyup="setcolor(this,200)"/> 
    <input id="colorexample200" type="text" size="1" readonly style="background:#6c6c6c">
    <img src="<?php echo $vd['sc']; ?>images/16.gif" onclick="pickcolor(200)" align="absmiddle" style="cursor:pointer;"/>
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">��ʾ����</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="radio" name="ispic" value="0" class="checkbox" onFocus="this.blur()"/> ��ʾ����
    <input type="radio" name="ispic" value="1" class="checkbox" onFocus="this.blur()" checked/> ��ʾͼƬ
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">������ַ</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="text" name="ubzurl" value="" size="34"/> 
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">�ϴ�ͼƬ<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <iframe name="uploader" src="index.php?m=com_fs&c=Fs&imgid=ad200&fun=imginfo200&inputid=ubzpic200&d=2" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:30px;width:100%; background-color:#ffffff"></iframe>
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">����</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="hidden" name="pos" value="<?php echo $vd['pos']; ?>"/>
    <input type="submit" value=" �� �� &gt;&gt;" name="B1" class="button"/>
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">ͼƬԤ��<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <div id="ad200"></div><div id="logoinfo200"></div></td>
  </tr>
  
</table>
</form>
<script type="text/javascript">

function imginfo200(imgsrc)
{
  document.getElementById("logoinfo200").innerHTML = "�� x ��" + imgsrc.height + " x " + imgsrc.width + "<br/>ͼƬ��С��" + imgsrc.fileSize + " �ֽ�"; 
}

</script>
<br/>
<?php } ?>
<?php $i=0;foreach($vd['items'] as $item) { ?>
<form method="post" action="index.php?m=mod_b2b&c=Ad&a=Save" name="myform">
<table border="1" id="ctable1" class="ctable" bordercolor="#86B9D6">
  <tr>
    <td align="center" height="35" colspan="2" class="listhead" style="text-align:left;font-weight:bold;padding-left:10px;color:#ff0000">
      <span style="float:right;"><a href="index.php?m=mod_b2b&c=Ad&a=Del&id=<?php echo $item['id']; ?>&pos=<?php echo $vd['pos']; ?>" onclick="return confirm('��ȷ������ɾ��������')">
        <img src="<?php echo $vd['sc']; ?>images/icon_trash.gif" border="0"/>
      </a>
      </span>
      <?php echo $i+1; ?>
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">ͼƬ<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <?php $endpath=strtolower(end( explode( ".", $item['pic'] ) ));if( $endpath == 'swf' ){ ?>
    <object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="480" height="180"><param name="movie" value="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['pic']; ?>"><param name="quality" value="high"><embed src="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['pic']; ?>" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash" type="application/x-shockwave-flash" width="480" height="180"></embed></object>
    <?php }else{ ?>
    <img src="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['pic']; ?>" border="0" onload="resizeImg(this,600,216)"/>
    <?php } ?>
    <br/><input type="text" id="ubzpic<?php echo $i; ?>" name="ubzpic" value="<?php echo $item['pic']; ?>" size="34"/> 
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">��������</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="text" name="ubztext" value="<?php echo $item['text']; ?>" size="34"/> 
    ������ɫ��
    <input type="text" id="textcolor<?php echo $i; ?>" name="ubztextcolor" value="<?php echo $item['textcolor']; ?>" size="15" onkeyup="setcolor(this,<?php echo $i; ?>)"/> 
    <input id="colorexample<?php echo $i; ?>" type="text" size="1" readonly style="background:<?php echo $item['textcolor']==''?'#6c6c6c' : $item['textcolor'] ?>">
    <img src="<?php echo $vd['sc']; ?>images/16.gif" onclick="pickcolor(<?php echo $i; ?>)" align="absmiddle" style="cursor:pointer;"/>
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">��ʾ����</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="radio" name="ispic" value="0" class="checkbox" onFocus="this.blur()" <?php if($item['ispic']==0){ ?>checked<?php } ?>/> ��ʾ����
    <input type="radio" name="ispic" value="1" class="checkbox" onFocus="this.blur()" <?php if($item['ispic']==1){ ?>checked<?php } ?>/> ��ʾͼƬ
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">������ַ</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="text" name="ubzurl" value="<?php echo $item['url']; ?>" size="34"/> 
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">�ϴ�ͼƬ<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <iframe name="uploader" src="index.php?m=com_fs&c=fs&imgid=ad<?php echo $i; ?>&fun=imginfo<?php echo $i; ?>&inputid=ubzpic<?php echo $i; ?>&d=2" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:30px;width:100%; background-color:#EEF7FD"></iframe>
    </td>
  </tr>
  <tr>
    <td width="15%" align="right" height="46">����</td>
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
    <input type="hidden" name="pos" value="<?php echo $vd['pos']; ?>"/>
    <input type="submit" value=" �� �� &gt;&gt;" name="B1" class="button"/>
    </td>
  </tr>
  <tr> 
    <td width="15%" align="right" height="46">ͼƬԤ��<b></b></td>
    <td width="85%" style="padding-left: 10px" height="47">
    <div id="ad<?php echo $i; ?>"></div><div id="logoinfo<?php echo $i; ?>"></div></td>
  </tr>
</table>
</form>
<br/>
<script type="text/javascript">  
function imginfo<?php echo $i; ?>(imgsrc)
{
  document.getElementById("logoinfo" + <?php echo $i; ?>).innerHTML = "�� x ��" + imgsrc.height + " x " + imgsrc.width + "<br/>ͼƬ��С��" + imgsrc.fileSize + " �ֽ�"; 
}
</script>
<?php $i++;} ?>
</div>
<div class="cbodyFoot"></div>
</div>
<div id="opcontent" style="display:none">
  <div class="optxt">
  </div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/JavaScript">
function pickcolor(id) 
{
  var color = showModalDialog("<?php echo $vd['sc']; ?>tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
  if (color != null) 
  {
    $("colorexample"+id).style.backgroundColor = color;
    $("textcolor"+id).value = color;
  }
}
function setcolor(obj,id)
{
  if(obj.value.length == 7)
  {
    $("colorexample"+id).style.backgroundColor = obj.value;
  }
}

function resizeImg(obj,w,h)
{
  var imgHeight = obj.height;
  var imgWidth  = obj.width;
  
  if(imgHeight < imgWidth)
  {
    if(imgWidth > w)
    {
      obj.style.width = w + "px";
    }
  }
  else
  {
    if(imgHeight > h)
    {
      obj.style.height = h + "px";
    }
  }
}
</script>
</body>
</html>
