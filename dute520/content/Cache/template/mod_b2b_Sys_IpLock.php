<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
<style type="text/css">
td{white-space:normal;overflow:auto;text-overflow:none;}
td p{display:none}
td P.show {
  DISPLAY: block
}
td STRONG {
CURSOR:pointer;
COLOR:#0197c9;
PADDING:0 3px;
}


</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=Sys&a=IpLockSave" name="cform" id="cform"> 
<div id="content" class="cwarpper" style="position:relative">
<div class="cbodyHead"></div>
<div id="tab">
<input type="button" value="��д������Ϣ"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys'" class="tab_normal" onFocus="this.blur()"/>
<?php if(UB_B2C){ ?><input type="button" value="���䷢������" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=EMail'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
<input type="button" value="�ر���Ϣ����"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Close'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="ǰ̨�������" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Config'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="��̨��������"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Pwd'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="IP��������"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=IpLock'" class="tab_active" onFocus="this.blur()"/>
<?php if($vd['adminrank']==1){ ?><input type="button" value="��ؽű�����"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Jc'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
</div>
<div class="cwarpper1" >
<div class="ctitle">
  IP��������
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">���ip���ð�Ƕ��Ÿ���</p>
</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed" style="border:0px">
    <tr>
      <td class="tablelt">IP�����б�</td>
      <td class="tablert" style="padding:10px">
        <textarea rows="10" name="iplock" cols="60" style="width:308px;"><?php echo isset($vd['sys']['iplock']) ? $vd['sys']['iplock'] : ''; ?></textarea><br/>
        <br/>IP�����б�(���ip���ð�Ƕ��Ÿ���)
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  <div class="optxt">
    <input type="submit" value="�޸�" class="btn"/>
    <input type="reset" value="����" class="btn"/>
  </div>
</div>
</form>
<input type="hidden" id="webdir" value="<?php echo $vd['webdir']; ?>"/>
<input type="hidden" id="website" value="<?php echo $vd['website']; ?>"/>
<input type="hidden" id="connecter" value="<?php echo $vd['connecter']; ?>"/>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=sys&a=index" title="ϵͳ��������"><font color="#000">ϵͳ��������</font></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_sys_close" onFocus="this.blur()" title="�鿴�ر���Ϣ������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<div id="load" style="display:none;">
  <div id="loadcontent" >ҳ����������Ե�...</div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
</body>
</html>
