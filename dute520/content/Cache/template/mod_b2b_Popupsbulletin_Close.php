<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<body>
<div class="title"> ��ǰλ�ã�������� &gt;����ҳ�湫������</div>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=Popupsbulletin&a=CloseSave" name="cform" id="cform"> 
<div id="content" class="cwarpper" style="position:relative">
  <div class="cwarpper1" style="<?php echo UB_YKT?(UB_B2C||UB_B2B?'':'border-top:1px #ccc solid'):'display:none' ?>">
    <div>
	<div id="opcontent">
  <div class="optxt">
          <div class="gn">
    <input type="submit" value="�� ��" class="tijiao_input"/>
  </div>
</div>
  <table border="0" class="ctable" bordercolor="#ededed" style="border:0px">
    <tr> 
      <td style="padding:0px;overflow-y:hidden">
        <textarea name="yktcloseinfo" cols="67" rows="2" style="display:none"><?php echo $vd['sys']['yktcloseinfo']; ?></textarea>
        <iframe ID="Editor" name="Editor" src="<?php echo $vd['sc']; ?>ubb/edit.htm?id=yktcloseinfo" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:433px;width:100%; background-color:#D9EEF9"></iframe>
      </td>
    </tr>
  </table>
</div>
</div>
<div id="titleDiv">
</div>
<div id="contentTip" style="display:none;"></div>
<div id="load" style="display:none;">
  <div id="loadcontent" >ҳ����������Ե�...</div>
</div>
<script type="text/javascript">
  var ctablenum = 0;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
</body>
</html>