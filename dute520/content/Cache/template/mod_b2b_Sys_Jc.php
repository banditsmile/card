<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
</title><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><link rel="stylesheet" href="http://new.ka365.com.cn/SMCS83KHUA_CO9SJ3JSDG/css/style.css" type="text/css" /><link rel="stylesheet" href="http://new.ka365.com.cn/SMCS83KHUA_CO9SJ3JSDG/css/style2.css" type="text/css" /><link rel="stylesheet" href="http://new.ka365.com.cn/SMCS83KHUA_CO9SJ3JSDG/css/qie.css" type="text/css" /></head>

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

#jctip{font-size:12px;padding:5px;margin:5px}

</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=Sys&a=JcSave" name="cform" id="cform"> 
<div id="content" class="cwarpper" style="position:relative">
<div class="cbodyHead"></div>
<div id="tab">
<input type="button" value="填写基本信息"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys'" class="tab_normal" onFocus="this.blur()"/>
<?php if(UB_B2C){ ?><input type="button" value="邮箱发送设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=EMail'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
<input type="button" value="关闭信息设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Close'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="前台相关设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Config'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="后台交易设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Pwd'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="IP屏蔽设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=IpLock'" class="tab_normal" onFocus="this.blur()"/>
<?php if($vd['adminrank']==1){ ?><input type="button" value="相关脚本设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Jc'" class="tab_active" onFocus="this.blur()"/><?php } ?>
</div>
<div class="cwarpper1" >
<div class="ctitle">
  批发外页页脚脚本(支持HTML)
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">可以添加企业客服等等信息，需静态页面方可见到效果，如果只是想首页有效，可以在脚本的开头加上<br/><?php echo $vd['addtipstart']; ?><br/>结尾加上<br/><?php echo $vd['addtipend']; ?> <br/>比如您的脚本是<?php echo $vd['example']; ?><br/>那么您可以在下框中输入<br/><?php echo $vd['addtipstart']; ?><br/><?php echo $vd['example']; ?><br/><?php echo $vd['addtipend']; ?></p>
</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed" style="border:0px">
    <tr>
      <td style="padding:10px">
      	[<span style="cursor:pointer;color:#0000ff" onclick="disp('jctip')"><u>查看说明</u></span>]<br/>
      	<div id="jctip" style="display:none">可以添加企业客服等等信息，需静态页面方可见到效果，如果只是想首页有效，可以在脚本的开头加上<br/><font color="#ff0000"><?php echo $vd['addtipstart']; ?></font><br/>结尾加上<br/><font color="#ff0000"><?php echo $vd['addtipend']; ?></font> <br/>比如您的脚本是<?php echo $vd['example']; ?><br/>那么您可以在下框中输入<br/><font color="#ff0000"><?php echo $vd['addtipstart']; ?></font><br/><?php echo $vd['example']; ?></font><br/><font color="#ff0000"><?php echo $vd['addtipend']; ?></font></div>
        <textarea rows="10" name="b2bjc" style="width:99%;"><?php echo $vd['b2bjc']; ?></textarea>
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  <div class="optxt">
    <input type="submit" value="修改" class="chaxun_input"/>
    <input type="reset" value="重置" class="fanhui_input"/>
  </div>
</div>
</form>
<input type="hidden" id="webdir" value="<?php echo $vd['webdir']; ?>"/>
<input type="hidden" id="website" value="<?php echo $vd['website']; ?>"/>
<input type="hidden" id="connecter" value="<?php echo $vd['connecter']; ?>"/>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=sys&a=index" title="系统基本设置"><font color="#000">系统基本设置</font></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_sys_close" onFocus="this.blur()" title="查看关闭信息设置相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
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
