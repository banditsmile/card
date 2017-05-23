<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $vd['web']['title']; ?>-һ��ͨƽ̨</title>
<meta name="keywords" content="<?php echo $vd['web']['keywords']; ?>" />
<meta http-equiv="description" content="<?php echo $vd['web']['description']; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $vd['content']; ?>css/ub-list-20080119.css" />
<link rel="shortcut icon" href="<?php echo $vd['content']; ?>images/favicon.ico" type="image/x-icon"/>
</head>
<body>
<div id="append_parent"></div>
<div id="topheader">
  <div id="headertab" style="position:relative;">
    <span style="float:right">
      <script src="<?php echo $vd['content']; ?>js/cust.js"></script>
      <img src="<?php echo $vd['content']; ?>images/icon_cx.gif" width="16" height="16" align="absmiddle"> <a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=ykt&a=check">��״̬��ѯ</a> &nbsp;
      <img src="<?php echo $vd['content']; ?>images/icon_dz.gif" align="absmiddle"> <a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=ykt&a=Tran">����ת</a> &nbsp;
      <img src="<?php echo $vd['content']; ?>images/icon_kt.gif" align="absmiddle"> <a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=Show" target="_blank">��ͼչʾ</a> &nbsp;
      <img src="<?php echo $vd['content']; ?>images/icon_bz.gif" align="absmiddle"> <a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&a=hourkf">�ͻ�����</a> &nbsp;
      <img src="<?php echo $vd['content']; ?>images/icon_jxs.gif" align="absmiddle"> <a href="<?php echo $vd['root']; ?><?php if($vd['vip'] > 0){ ?>index.php?m=mod_<?php } ?><?php if(UB_DEFAULT != 'b2b'){ ?>b2b<?php } ?>" target="_blank">������</a>
    </span>
    <span id="userzone"></span>
    <div id="logindiv" style="position:absolute;top:25px;left:125px;;width:260px;display:none;z-index:999;">
  <div style="padding:0px;background:#f4f4f4;border:1px #ccc solid">
  <div style="font-size:14px;font-weight:bold;padding:0px;float:left"></div>
  <form name="form1" method="post" action="<?php echo $vd['root']; ?>index.php?m=mod_user&c=login&a=login"  style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="30%" style="font-size:14px;height:30px;padding-right:8px" align="right">�ˡ���</td>
      <td width="70%"><input type="text" name="aname" class="logininput" /></td>
    </tr>
    <tr>
      <td width="30%" style="font-size:14px;height:30px;padding-right:8px" align="right">�ܡ���</td>
      <td width="70%"><input type="password" name="pwd" class="logininput" style="width:149px;"/></td>
    </tr>
    <?php if($vd['checkrand'] == 1){ ?>
    <tr>
      <td width="30%" valign="top" style="font-size:14px;height:30px;padding-right:8px" align="right"> 
        <div style="padding-top:8px;">��֤��</div>
      </td>
      <td width="70%"> 
        <input type="text" id="randcode" name="verifycode" class="logininput" value="" style="width:50px"/>
        <img src="<?php echo $vd['root']; ?>index.php?m=mod_<?php echo UB_DEFAULT ?>&a=randcode&t=1" id="src" height="38" alt="�������?����ˢ��" onclick="this.src=this.src+'&'+Math.random();" style="vertical-align:middle;"/>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td width="30%" height="45px"></td>
      <td width="70%">
      	<input type="hidden" id="vfromsite" name="vfromsite" value="3"/>
        <input type="submit" value=" �� ½ " class="button" style="height:25px;width:50px"/>
        <input type="button" value=" �� �� " onclick="disp('logindiv')" class="button" style="height:25px;width:50px"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>
  </div>
</div>

<div id="ubtop">
<div id="topsearch">
  <div style="float:left;width:230px;">
    <img src="<?php echo $vd['imgurl']; ?><?php echo $vd['content']; ?>images/mylogo.gif" alt="" border="0" height="60"/>
  </div>
  <div style="FLOAT:left;width:500px;height:60px">
    <?php if(isset($vd['banner'][0])){ ?><?php (AdImgLink($vd['banner'][0])); ?><?php } ?>
  </div>
  <div style="float:right;width:210px;BACKGROUND:#fff;padding:5px 2px;border:1px #f0f0f0 solid;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;">
        <tr>
            <td height="48" align="center" class="black">
                <a href="<?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?>22.html" target="_blank">��Ʒ����</a> |
                <a href="<?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?>59.html" target="_blank">�������</a>
                | <a href="#" Onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $vd['web']['website']; ?>');" class="top"> ��Ϊ��ҳ</a><br />
                <a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=Article&a=Home&name=<?php echo urlencode('һ��ͨϵͳ��������'); ?>">��������</a>
                | <a href="<?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?>20.html" target="_blank">��ֵ��ʾ</a>
                | <a href=javascript:window.external.AddFavorite('<?php echo $vd['web']['website']; ?>','<?php echo $vd['web']['webname']; ?>') class="top">����ղ�</a>
            </td>
        </tr>
    </table>
  </div>
</div>
</div>

<div id="ubmain">
  <div id="ChannelMenu">
    <div class="Shell">
      <div class="Tab">
        <ul class="clearfix">
        <li><a href="<?php echo $vd['root']; ?><?php if($vd['vip'] > 0){ ?>index.php?m=mod_<?php } ?><?php if(UB_DEFAULT!='ykt'){ ?>ykt<?php } ?>" target="_top"><span>��ҳ</span></a></li>
        <li><a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=Article&a=Home&name=<?php echo urlencode('һ��ͨϵͳ���Ź���'); ?>"><span>ϵͳ����</span></a></li>
        <li><a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=Article&a=Home&name=<?php echo urlencode('һ��ͨϵͳ���ְ���'); ?>"><span>���ְ���</span></a></li>
        
        <li class="Current MyUmebiz" class="Current"><a href="#" target="_top"><span>��ֵ</span></a></li>
        <li style="width:405px;padding-top:7px;float:right">
          <form name="yktform" action="<?php echo $vd['root']; ?>index.php"  method="post">
            <input type="hidden" name="stype" value="pname"/>
            <input type="hidden" name="m" value="mod_ykt"/>
            <input type="hidden" name="c" value="product"/>
            <input type="hidden" name="ptype" value="-1"/>
            <input type="text" name="keywords" size="25" class="topinput"/><input type="image"  src="<?php echo $vd['content']; ?>images/search-top1.gif" style="vertical-align:middle;border-width:0px;padding-left:0px;"/>
          </form>
        </li>
        </ul>
      </div>
    </div>
  </div>
  <div id="ProductMenu">
    <div class="Shell">
      <div class="Tab">
        <ul>
          <li class="Current"><a href="<?php echo $vd['root']; ?>index.php?m=mod_ykt&c=product"><span>ȫ��</span></a></li>
          <?php //mhead ?>
<?php //endmhead ?>
        </ul>
      </div>
    </div>
  </div>
<input type="hidden" id="webdir" name="webdir" value="<?php echo $vd['root']; ?>">
<script src="<?php echo $vd['content']; ?>js/userzone.js"></script>
