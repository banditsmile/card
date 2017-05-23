<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $vd['web']['title']; ?></title>
<meta name="Keywords" content="<?php echo $vd['web']['keywords']; ?>" />
<meta name="Description" content="<?php echo $vd['web']['description']; ?> 颖先卡购点卡联售系统 www.umebiz.com" />
<link rel="stylesheet" type="text/css" href="<?php echo $vd['content']; ?>css/ub-list-20080119.css" />
</head>
<body>
<div id="ubtop">
<input type="hidden" id="webdir" name="webdir" value="<?php echo $vd['root']; ?>">
<div style="height:30px;width:100%;margin-top:5px;"><span style="padding-left:10px;"><a href="#">电信站</a> | <a href="#">网通站</a></span></div>
<div style="margin-bottom:5px;"><a href="<?php echo $vd['banner'][0]['url']; ?>" target="_blank"><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $vd['banner'][0]['pic']; ?>" width="100%"/></a></div>
<div class="headTab">
  <ul>
    <li class="headTabActive" id="li0"><a href="<?php echo $vd['root']; ?>index.php?m=mod_article" onmouseover="setnav(0)">首页</a></li>
    <li  id="li1"><a href="#" onmouseover="setnav(1)">系统公告</a></li>
    <li  id="li2"><a href="#" onmouseover="setnav(2)">最新活动</a></li>
    <li  id="li3"><a href="#" onmouseover="setnav(3)">新手帮助</a></li>
    <li  id="li4"><a href="#" onmouseover="setnav(4)">常见问题</a></li>
    <li  id="li5"><a href="#" onmouseover="setnav(5)">行业信息</a></li>
    <li  id="li6"><a href="#" onmouseover="setnav(6)">游戏资料</a></li>
    <li class="headTabEnd"><a href="#">其他</a></li>
  </ul>
  <div class="subhead" id="nav0">
    <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='b2c'){ ?><?php }else{ ?>b2c<?php } ?>">零售系统</a> - <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='b2b'){ ?><?php }else{ ?>b2b<?php } ?>">批发系统 - <a href="<?php echo $vd['root']; ?><?php if(UB_DEFAULT=='ykt'){ ?><?php }else{ ?>ykt<?php } ?>">一卡通系统</a>
  </div>
  <script type="text/javascript">
    var navv = new Array();
    navv[0]  = new Array();
    navv[1]  = new Array("<?php echo urlencode('一卡通系统新闻公告') ?>","<?php echo urlencode('批发系统公告') ?>");
    navv[2]  = new Array("<?php echo urlencode('一卡通系统最新活动') ?>","<?php echo urlencode('批发系统最新活动') ?>");
    navv[3]  = new Array("<?php echo urlencode('一卡通系统新手帮助') ?>","<?php echo urlencode('批发系统新手帮助') ?>");
    navv[4]  = new Array("<?php echo urlencode('一卡通系统常见问题') ?>","<?php echo urlencode('批发系统常见问题') ?>");
    navv[5]  = new Array("<?php echo urlencode('行业信息') ?>");
    navv[6]  = new Array("<?php echo urlencode('游戏资料站') ?>");
  </script>
  <script src="<?php echo $vd['content']; ?>js/nav.js"></script>
</div>
<p></p>
<div id="ubmain">
