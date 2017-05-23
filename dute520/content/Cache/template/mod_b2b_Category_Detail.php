<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
</head>
<body>
<?php $item = $vd['item']; ?>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Category" title="�����б�"><font color="#000">�����б�</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;"><?php echo $item['name']; ?></span></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_poll_index" onFocus="this.blur()" title="�鿴������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="contentTip" style="display:none;"></div>
<form id="cform" method="post" action="index.php?m=mod_b2b&c=Category&a=Save">
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>
<div class="cwarpper1">
<div class="ctitle">������Ϣ�޸�</div>
<table border="0" id="ctable1" class="ctable">
  <?php  if(1){ ?>
  <tr>
    <td class="tablelt">��������</td>
    <td class="tablert"><input type="text" name="name" size="25" value="<?php echo $item['name']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">�ϼ�������</td>
    <td class="tablert">
      <input type="text" name="parentid" size="25" value="<?php echo $item['parentid']; ?>"/>
      <span class="spantip">0��ʾû���ϼ�</span>
    </td>
  </tr>
  <tr>
    <td class="tablelt">������ɫ</td>
    <td class="tablert">
      <div style="float:left"><input type="text" name="color" id="textcolor0" size="25" value="<?php echo $item['color']; ?>"/></div>
      <div onclick="pickcolor(0)" id="colorexample0" style="float:left;cursor:pointer;height:22px;margin-left:5px;margin-top:1px;width:16px;border:0px #fff solid;background:<?php echo $item['color']==''?'#000000':$item['color']; ?>"/></div>
    </td>
  </tr>
  <tr>
    <td class="tablelt">�������</td>
    <td class="tablert">
      <input type="text" name="ordering" size="25" value="<?php echo $item['ordering']; ?>"/>
    </td>
  </tr>
  <tr>
    <td class="tablelt">����ĸ</td>
    <td class="tablert"><input type="text" name="pinyin" size="25" value="<?php echo $item['pinyin']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">�Ƿ�����</td>
    <td class="tablert"><input type="checkbox" name="hot" size="25" value="1" class="checkbox" <?php (ToggleCheck($item['hot'])); ?>/></td>
  </tr>
  <tr>
    <td class="tablelt">����ɼ�</td>
    <td class="tablert">
    <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2b" value="1" class="checkbox"  <?php (ToggleCheck($item['forb2b'])); ?>/>����ϵͳ�ɼ�</span>
    <span<?php if(!UB_B2C){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2c" value="1" class="checkbox"  <?php (ToggleCheck($item['forb2c'])); ?>/>����ϵͳ�ɼ�</span>
    <span<?php if(!UB_YKT){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forykt" value="1" class="checkbox"  <?php (ToggleCheck($item['forykt'])); ?>/>һ��ͨϵͳ�ɼ�</span>
    </td>
  </tr>
  <tr <?php if(!UB_B2B){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">�Ƿ����������Ʒ</td>
    <td class="tablert">
    <input type="checkbox" name="shared" value="1" class="checkbox" <?php (ToggleCheck($item['shared'])); ?>/>����
    </td>
  </tr>
  <tr>
    <td class="tablelt">�����飺</td>
    <td class="tablert">
    <input type="text" name="abst" size="25" value="<?php echo $item['abst']; ?>"/> <span class="spantip">�������Ŀ¼����ʾ������</span></td>
  </tr>
  <tr>
    <td class="tablelt">��Ӧͼ��</td>
    <td class="tablert">
       <img src="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['pics']; ?>" id="picsimg" border="0"/>
       <br/><input type="text" id="pics" name="pics" value="<?php echo $item['pics']; ?>" size="25"/> 
    </td>
  </tr>
  <tr> 
    <td width="10%" align="right" height="46">�ϴ�ͼ�꣺</td>
    <td width="90%" height="47">
    <iframe name="uploader" src="index.php?m=com_fs&c=Fs&imgid=imgid&fun=imginfo&inputid=pics&d=2" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:30px;width:100%; background-color:#EEF7FD"></iframe>
    <div id="imgid"></div><div id="imgsize"></div>
    </td>
  </tr>
  <?php }else{ ?>
  <tr>
    <td class="tablelt">��������</td>
    <td class="tablert">
      <input type="hidden" name="coupon" value="1"/>
      <input type="hidden" name="parentid" value="<?php echo $item['parentid']; ?>"/>
      <input type="text" name="name" value="<?php echo $item['name']; ?>" size="25"/>
    </td>
  </tr>
  <tr>
    <td class="tablelt">�������</td>
    <td class="tablert">
      <input type="text" name="ordering" size="25" value="<?php echo $item['ordering']; ?>"/>
    </td>
  </tr>
  <tr>
    <td class="tablelt">����</td>
    <td class="tablert"><input type="text" name="fee" value="<?php echo $item['fee']; ?>" size="25"/></td>
  </tr>
  <tr>
    <td class="tablelt">����</td>
    <td class="tablert"><input type="text" name="code" value="<?php echo $item['code']; ?>" size="25"/></td>
  </tr>
  <tr>
    <td class="tablelt">�Ƿ����</td>
    <td class="tablert">
    <input type="checkbox" name="fork2k" value="1" class="checkbox"  <?php (ToggleCheck($item['fork2k'])); ?>/>����վ�ɼ�
    </td>
  </tr>
  <tr>
    <td class="tablelt">ʹ�÷�ʽ</td>
    <td class="tablert">
    <input type="radio" name="gateway" value="1" class="checkbox" onclick="setct(1)" <?php if($item['gateway']==1){ ?>checked<?php } ?>/>����
    <input type="radio" name="gateway" value="2" class="checkbox" onclick="setct(2)" <?php if($item['gateway']==2){ ?>checked<?php } ?>/>�ֶ�
    <input type="radio" name="gateway" value="3" class="checkbox" onclick="setct(3)" <?php if($item['gateway']==3){ ?>checked<?php } ?>/>�Զ���
    </td>
  </tr>
  <tr <?php if($item['gateway']!=3){ ?>style="display:none;"<?php } ?> id="cttr">
    <td class="tablelt">��ֵ�˺�</td>
    <td class="tablert"><input type="text" name="czaccount" value="<?php echo $item['czaccount']; ?>" size="25"/>
      <strong onmouseover="showhide(this);" onmouseout="showhide(this);">[?]</strong><p>��Ҫӱ�ȿ���ϵͳ���ͨ���ſ��ԣ�����ϵͳ�ǲ����Զ��ѵ���������Ԥ�����õ��˺ŵģ��������ڶ�Ӧ����ֵ���쿴���״̬<br/> �һ����б� -> ��ֵ���� -> ����༭��ť</p>
    </td>
  </tr>
  <tr>
    <td class="tablelt">��Ӧͼ��</td>
    <td class="tablert">
       <img src="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['pics']; ?>" id="picsimg" border="0"/>
       <br/><input type="text" id="pics" name="pics" value="<?php echo $item['pics']; ?>" size="25"/> 
    </td>
  </tr>
  <tr> 
    <td class="tablelt">ѡ��ͼ��</td>
    <td class="tablert">
       <div class="search_s">
         <span class="search_s1">
           <select class="search_select" onchange="setbankicon(this)">
             <option value="pay_yd.gif" <?php if($item['pics']=='pay_yd.gif'){ ?>selected<?php } ?>>�����г�ֵ��</option>
             <option value="pay_sd.gif" <?php if($item['pics']=='pay_sd.gif'){ ?>selected<?php } ?>>ʢ����Ϸ��</option>
             <option value="pay_5173.gif" <?php if($item['pics']=='pay_5173.gif'){ ?>selected<?php } ?>>5173��ֵ��</option>
             <option value="pay_rx.gif" <?php if($item['pics']=='pay_rx.gif'){ ?>selected<?php } ?>>��Ѫ���濨</option>
             <option value="pay_lt.gif" <?php if($item['pics']=='pay_lt.gif'){ ?>selected<?php } ?>>��ͨ��ֵ��</option>
             <option value="pay_sh.gif" <?php if($item['pics']=='pay_sh.gif'){ ?>selected<?php } ?>>�Ѻ�һ��ͨ</option>
             <option value="pay_ms.gif" <?php if($item['pics']=='pay_ms.gif'){ ?>selected<?php } ?>>ħ�����翨</option>
             <option value="pay_qq.gif" <?php if($item['pics']=='pay_qq.gif'){ ?>selected<?php } ?>>QQ�ҿ�</option>
             <option value="pay_jw.gif" <?php if($item['pics']=='pay_jw.gif'){ ?>selected<?php } ?>>����һ��ͨ</option>
             <option value="pay_9y.gif" <?php if($item['pics']=='pay_9y.gif'){ ?>selected<?php } ?>>����һ��ͨ</option>
             <option value="pay_wm.gif" <?php if($item['pics']=='pay_wm.gif'){ ?>selected<?php } ?>>����һ��ͨ</option>
             <option value="pay_sx.gif" <?php if($item['pics']=='pay_sx.gif'){ ?>selected<?php } ?>>��Ѷ֧��</option>
             <option value="pay_zt.gif" <?php if($item['pics']=='pay_zt.gif'){ ?>selected<?php } ?>>��;��Ϸ��</option>
             <option value="pay_wy.gif" <?php if($item['pics']=='pay_wy.gif'){ ?>selected<?php } ?>>����һ��ͨ</option>
             <option value="pay_mb.gif" <?php if($item['pics']=='pay_mb.gif'){ ?>selected<?php } ?>>Ŀ��һ��ͨ</option>
             <option value="pay_js.gif" <?php if($item['pics']=='pay_mb.gif'){ ?>selected<?php } ?>>��ɽһ��ͨ</option>
             <option value="bank_no.gif" <?php if($item['pics']=='bank_no.gif'){ ?>selected<?php } ?>>�Զ���..</option>
           </select>
         </span>
       </div>
    </td>
  </tr>
  <tr> 
    <td width="10%" align="right" height="46">�ϴ�ͼ�꣺</td>
    <td width="90%" height="47">
    <iframe name="uploader" src="index.php?m=com_fs&c=Fs&imgid=imgid&fun=imginfo&inputid=pics&d=2" frameBorder="0" marginHeight="1" marginWidth="1" scrolling="no" style="height:30px;width:100%; background-color:#EEF7FD"></iframe>
    <div id="imgid"></div><div id="imgsize"></div>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td class="tablelt" style="height:80px"></td>
    <td class="tablert">
      <input type="submit" value="�� �� &gt;&gt" class="btn"/>
      <input type="reset" value="�� ��" class="btn"/>
    </td>
  </tr>
</table>
<input type="hidden" value="<?php echo $item['id']; ?>" name="id" id="id"/>
</div>
<div class="cbodyFoot"></div>
</div>
<div id="opcontent" style="display:none">
  <div class="optxt">
    
  </div>
</div>
</form>
<script type="text/javascript">
  sc = "<?php echo $vd['sc']; ?>";
  var ctablenum = 2;
  function imginfo(imgsrc)
  {
  document.getElementById("imgsize").innerHTML = "�� x ��" + imgsrc.height + " x " + imgsrc.width + "<br/>ͼƬ��С��" + imgsrc.fileSize + " �ֽ�"; 
  }
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/javascript">
  function pickcolor(id) 
  {
    var color = showModalDialog("<?php echo $vd['sc']; ?>tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
    if (color != null) 
    {
      $("colorexample"+id).style.backgroundColor = color;
      $("textcolor"+id).value = color;
    }
  }
  function setbankicon(obj)
  {
    val = obj.value;
    $("picsimg").src = "<?php echo $vd['root']; ?>content/mod_shared/skins/upload/" + val;
    $("pics").value = val;
  }
  
  function setct(val)
  {
    $("cttr").style.display = val == 3 ? "" : "none";
  }
</script>
</body>
</html>
