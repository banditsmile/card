<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<style type="text/css">
td{height:30px}
.preview_fake{ /* �ö����û���IE����ʾԤ��ͼƬ */
    filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale);
}

</style>
</head>
<body>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_logo_index" onFocus="this.blur()" title="�鿴LOGO��ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
        <div>
            <div class="title">
                ����λ�ã�������� > ������������
            </div>
<?php foreach($vd['logo'] as $item){ ?>
            <table width="100%" cellpadding="0" cellspacing="1" class="page_table4">
  <tr>
                    <td colspan="2" class="table_top" style="text-align: left">
      <?php echo $item['name']; ?>ϵͳLOGO    </td>
  </tr>
  <tr>
    <td class="td_left"> LOGOͼƬ�� </td> 
    <td width="85%" style="padding-left: 10px" height="47">
    <img src="<?php echo $vd['root']; ?>content/<?php echo $item['m']; ?>/images/mylogo.gif" border="0"/>    </td>
  </tr>
  
  <tr>
    <td class="td_left"> �ϴ�ͼƬ�� </td> 
    <td width="85%" style="padding-left: 10px" height="47">
    <input type="hidden" id="ubzimage<?php echo $item['m']; ?>" name="ubzimage<?php echo $item['m']; ?>" size="34"/> 
    <iframe name="uploader" id="bodyiframe<?php echo $item['m']; ?>" src="index.php?m=com_fs&c=fs&imgid=logo<?php echo $item['m']; ?>&fun=imginfo<?php echo $item['m']; ?>&inputid=ubzimage<?php echo $item['m']; ?>&d=1&mod=<?php echo $item['m']; ?>" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:30px;width:100%; background-color:#ffffff"></iframe>    </td>
  </tr>
  <tr>
    <td class="td_left">&nbsp;</td> 
    <td width="85%" style="padding-left: 10px" height="47">
    <span class="spantip">ע�⣺logoͼƬ����������Ϊmylogo.gif���ϴ�</span>    </td>
  </tr>
  <tr>
    <td class="td_left"> ͼƬԤ���� </td> 
    <td width="85%" style="padding-left: 10px" height="47">
    <div id="logo<?php echo $item['m']; ?>" class="preview_fake"></div><div id="logoinfo<?php echo $item['m']; ?>"></div>    </td>
  </tr>
</table>
<script type="text/javascript">
function imginfo<?php echo $item['m']; ?>(imgsrc)
{
	obj  = document.all ? window.frames["bodyiframe<?php echo $item['m']; ?>"] : window.document.getElementById("bodyiframe<?php echo $item['m']; ?>").contentWindow;
  filen = obj.document.getElementById("txtFileUpload").value;

	if( !filen.match( /mylogo.gif/i ) ){
    alert('ͼƬ��ʽ��Ч��ͼƬӦ������Ϊmylogo.gif���ϴ���');
    return false;
  }
  document.getElementById("logoinfo<?php echo $item['m']; ?>").innerHTML = "�� x ����" + imgsrc.height + " x " + imgsrc.width + "<br/>ͼƬ��С��" + imgsrc.fileSize + " �ֽ�"; 
}
</script>
<?php } ?>
</div>
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
</body>
</html>