<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $vd['web']['title']; ?></title>
<meta name="Keywords" content="<?php echo $vd['web']['keywords']; ?>" />
<meta name="Description" content="<?php echo $vd['web']['description']; ?> ӱ�ȿ����㿨����ϵͳ www.umebiz.com" />
<link rel="stylesheet" type="text/css" href="<?php echo $vd['content']; ?>css/ub-list-20080119.css" />
</head>
<body>
<div id="ubtop">
<input type="hidden" id="webdir" name="webdir" value="<?php echo $vd['root']; ?>">
<div style="height:30px;width:100%;margin-top:5px;"><span style="padding-left:10px;"><a href="#">����վ</a> | <a href="#">��ͨվ</a></span></div>
<div style="margin-bottom:5px;"><a href="<?php echo $vd['banner'][0]['url']; ?>" target="_blank"><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $vd['banner'][0]['pic']; ?>" width="100%"/></a></div>
<div class="headTab">
  <ul>
    <li class="headTabActive" id="li0"><a href="<?php echo $vd['root']; ?>index.php?m=mod_article" onmouseover="setnav(0)">��ҳ</a></li>
    <li  id="li1"><a href="#" onmouseover="setnav(1)">ϵͳ����</a></li>
    <li  id="li2"><a href="#" onmouseover="setnav(2)">���»</a></li>
    <li  id="li3"><a href="#" onmouseover="setnav(3)">���ְ���</a></li>
    <li  id="li4"><a href="#" onmouseover="setnav(4)">��������</a></li>
    <li  id="li5"><a href="#" onmouseover="setnav(5)">��ҵ��Ϣ</a></li>
    <li  id="li6"><a href="#" onmouseover="setnav(6)">��Ϸ����</a></li>
    <li class="headTabEnd"><a href="#">����</a></li>
  </ul>
  <div class="subhead" id="nav0">
    <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='b2c'){ ?><?php }else{ ?>b2c<?php } ?>">����ϵͳ</a> - <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='b2b'){ ?><?php }else{ ?>b2b<?php } ?>">����ϵͳ - <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='ykt'){ ?><?php }else{ ?>ykt<?php } ?>">һ��ͨϵͳ</a>
  </div>
  <script type="text/javascript">
    var navv = new Array();
    navv[0]  = new Array();
    navv[1]  = new Array("<?php echo urlencode('һ��ͨϵͳ���Ź���') ?>","<?php echo urlencode('����ϵͳ����') ?>");
    navv[2]  = new Array("<?php echo urlencode('һ��ͨϵͳ���»') ?>","<?php echo urlencode('����ϵͳ���»') ?>");
    navv[3]  = new Array("<?php echo urlencode('һ��ͨϵͳ���ְ���') ?>","<?php echo urlencode('����ϵͳ���ְ���') ?>");
    navv[4]  = new Array("<?php echo urlencode('һ��ͨϵͳ��������') ?>","<?php echo urlencode('����ϵͳ��������') ?>");
    navv[5]  = new Array("<?php echo urlencode('��ҵ��Ϣ') ?>");
    navv[6]  = new Array("<?php echo urlencode('��Ϸ����վ') ?>");
  </script>
  <script src="<?php echo $vd['content']; ?>js/nav.js"></script>
</div>
<p></p>
<div id="ubmain">
