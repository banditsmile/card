<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>公告</title>
<link href="http://www.5gk.com/Content/Home/Skins/Skin1/Styles/main.css" rel="stylesheet" type="text/css" />
</head>

<body class="note">
<div class="wrapper">
   <div class="title">
   <?php $item=$vd['item'] ?>
<input type="hidden" id="id" name="id" value="<?php echo $item['id']; ?>"/>
       <h1><?php echo $item['title']; ?></h1>
       <p class="date">2013-11-23 11:44:52</p>
   </div>
   <div class="content">
   <?php (ubbcode($item['content'],$vd)); ?>
     
   </div>
</div>
<div class="footer">
   <input type="button" value="关闭" class="button" onclick="window.close()" style=" height:25px;line-height:25px;" />
   
</div>
</body>
</html>