<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link href="../index/css/common.css" type="text/css" rel="stylesheet">
<link href="../index/css/page.css" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=Popupsbulletin&a=CloseSave" name="cform" id="cform"> 
<table width="100%" border="0" class="table1">
    <tr> 
        <textarea name="yktcloseinfo" cols="67" rows="2" style="display:none"><?php echo $vd['sys']['yktcloseinfo']; ?></textarea>
        <iframe ID="Editor" name="Editor" src="<?php echo $vd['sc']; ?>ubb/edit.htm?id=yktcloseinfo" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:433px;width:100%; "></iframe>
      </td>
    </tr>
  </table>
</form>
    <input type="submit" value="�޸�" class="btn"/>
    <input type="reset" value="����" class="btn"/>
  </div>
</div>
</form>
<input type="hidden" id="webdir" value="<?php echo $vd['webdir']; ?>"/>
<input type="hidden" id="website" value="<?php echo $vd['website']; ?>"/>
<input type="hidden" id="connecter" value="<?php echo $vd['connecter']; ?>"/>
</body>
</html>
