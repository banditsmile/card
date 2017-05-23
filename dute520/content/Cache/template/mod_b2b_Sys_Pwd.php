<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
<style type="text/css">
td{white-space:normal;overflow:auto;text-overflow:none;}
</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=sys&a=PwdSave" name="cform" id="cform"> 
<div id="content" class="cwarpper" style="position:relative">
<div class="cbodyHead"></div>
<div id="tab">
<input type="button" value="填写基本信息"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys'" class="tab_normal" onFocus="this.blur()"/>
<?php if(UB_B2C){ ?><input type="button" value="邮箱发送设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=EMail'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
<input type="button" value="关闭信息设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Close'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="前台相关设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Config'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="后台交易设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Pwd'" class="tab_active" onFocus="this.blur()"/>
<input type="button" value="IP屏蔽设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=IpLock'" class="tab_normal" onFocus="this.blur()"/>
<?php if($vd['adminrank']==1){ ?><input type="button" value="相关脚本设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Jc'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
</div>
<?php $temp = explode('|', $vd['sys']['pwdconfig']);$cout=count($temp); ?>
<div class="cwarpper1" style="border-top:1px #ccc solid">
<div class="ctitle">后台一些密码设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">旧密码</td>
      <td class="tablert">
        <input type="password" name="oldtradepwd" value=""> <span class="spantip">以下信息要修改的话，请输入旧密码</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">管理员充值需要密码</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="tradepwdconfig" value="1" <?php if($cout > 0){ToggleCheck($temp[0]);} ?>>管理员给用户充值的时候需要输入设置的密码才可以
      </td>
    </tr>
    <tr>
      <td class="tablelt">新密码</td>
      <td class="tablert">
        <input type="password" name="tradepwd" value=""> <span class="spantip">如果不需要修改密码，留空即可</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">确认密码</td>
      <td class="tablert">
        <input type="password" name="retradepwd" value="">
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  
  <div class="optxt">
    <input type="submit" value="修改" class="btn"/>
    <input type="reset" value="重置" class="btn"/>
  </div>
</div>
</form>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=sys&a=index" title="系统基本设置"><font color="#000">系统基本设置</font></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_sys_index" onFocus="this.blur()" title="查看平台基本信息相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<div id="load" style="display:none;">
  <div id="loadcontent" >页面加载中请稍等...</div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
</body>
</html>
