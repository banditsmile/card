<?php if($vd['table']==0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<body>
<?php $isb2c=intval(request('b2c')) ?>
<div class="titleDiv" id="titleList">

<div id="contentTip" style="display:none;"></div>
<div id="adddiv" style="position:absolute;top:60px;left:50px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">��<font color="#ff0000"><?php if($isb2c==0){ ?>����ƽ̨<?php }else{ ?><?php echo $vd['tagname']; ?>ƽ̨<?php } ?></font>����û�����</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="35%">��������</td>
      <td width="65%"><input type="text" name="name" size="16"/></td>
    </tr>
    <tr>
      <td width="35%">�������Ѷ�</td>
      <td width="65%"><input type="text" name="money" size="16"/></td>
    </tr>
    <tr<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>>
      <td width="35%">���</td>
      <td width="65%">
        <select name="gid">
        <?php (Option($vd['group'], 0, 'gname', 'gid')); ?>
        </select>
      </td>
    </tr>
    <tr>
      <td width="35%">Ĭ��ע�ἶ��</td>
      <td width="65%"><input type="checkbox"  name="isdefault" value="1" class="checkbox" onFocus="this.blur()"/></td>
    </tr>
    <tr>
      <td width="35%"></td>
      <td width="65%">
        <input type="hidden" name="discount" size="10" value="0.05"/>
        <input type="submit" name="Submit" value="�� ��" class="button">
        <input type="button" name="Submit" value="ȡ ��" onClick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="adddivguize" style="position:absolute;top:60px;left:50px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">�������[<a href="?m=mod_b2b&c=Sys&a=Config#guize">������ù���</a>]</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddivguize')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="font-size:12px">
      	�淶�ͣ�<br/>
      	ͬһ�����ľ����̲��ܻ�Ϊ���¼�������һ�������̺Ͷ���������ͬ���ھ�������������ǲ��ܻ�Ϊ���¼�<br/><br/>
      	��ɢ�ͣ�<br/>
      	ͬһ�����ľ�����Ҳ����Ϊ���¼���������ֻҪ���������������ѽ���㹻�����Ϳ��Խ��ձ���С�ļ���ֱ���̳���(Ҳ����˵ֱ���̲������¼�)<br/>
      	
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=Sup&v=Sup" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tordering" id="tordering"/> ��Ʒ����<br/>
  <input type="checkbox" name="id[]" value="tpics" id="tpics"/> ������<br/>
  <input type="checkbox" name="id[]" value="tname" id="tname"/> �������<br/>
  <input type="checkbox" name="id[]" value="tabst" id="tabst"/> �������ȼ�<br/>
  <input type="checkbox" name="id[]" value="tfee" id="tfee"/> ������<br/>
  <input type="checkbox" name="id[]" value="tcode" id="tcode"/> ����ۼ�<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="����" class="button" disabled />
  <input type="button" value="����" class="button" disabled onClick="tInfoReset()"/>
  <input type="button" value="ȡ��" class="button" onClick="setMenuMask()"/>
  </div>
  </form>
</div>

    <div id="tip" style="display:none">
  <span id="tiptable">��ҳ������ <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> ����¼��ѡ�� </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">���ѡ��ǰ�б������� <b><?php echo $vd['totlerow']; ?></b> ����¼>></a>
  </span>
</div>
    <div class="title"> ��ǰλ�ã��ͻ����� &gt; �ͻ���������</div>
<div class="gn">
  <input name="button" type="button" class="tijiao_input" id="add" onclick="disp('adddiv')" value="�� ��"/>
  <input name="button2" type="button" class="tijiao_input" id="button" onclick="tableRefresh()" value="ˢ ��"/>
  <input name="button3" type="button" class="tijiao_input" id="button2" onclick="disp('adddivguize')" value="�� ��"/>
  <a href="#" class="tishi1" onClick="batchEdit(this)">ʵʱ�޸��뵥������,�����屳����ʧ�󼴿��޸�</a></div>
    <div class="tishi1"> 1��ƽ̨����ǰ���ȶ���ü����պ���ò�Ҫ������µļ��������Ҫ�����¼���ֻ���Ǳ�ԭ�м�����͵ļ���<br />
      2��ÿ����ϵ�ļ������밴�߼�--&gt;�ͼ���˳����ӣ�����ͼ�����Ϊע���Ĭ�ϼ��𣬱��羭����ϵ�д�һ�㾭����-&gt;�߼�������-&gt;�����ܾ����̣�ֱ����ϵ��һ��ֱ����-&gt;�߼�ֱ����-&gt;����ֱ���̣�<br />
      3��ϵͳ����Խ�࣬���۹���Խ���ӣ�����������պ����������Լ����ʵ��������ɣ�<br />
      4���������Ʒ���ж��ۺ�����ӵļ��𣬱���Ϊÿ����Ʒ���¶��ۣ���������Ӽ�������ۼ۸�<br />
      5��ǿ�ҽ����ҽ�ÿ����ϵ�ļ��������2-4���������Ӧ��ϵ����Ҫ�༶����������Ǿ�������飬����ʹ��ģ�嶨�ۻ��ܼ۵ķ�ʽ�������۸�<br />
      6��������ϵ�����󲻿�ɾ���� </div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <?php } ?>
    <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table cellspacing="1" cellpadding="0" class="page_table">
    <tr>
      <td  width="6%" class="table_top"> �������� </td>
      <td  width="54%" class="table_top"> ��������</td>
      <td  width="19%" class="table_top"> ���Ѷ�</td>
	  <td  width="7%" class="table_top"> ��������</td>
      <td  width="7%" class="table_top"> Ĭ�ϼ��� </td>
      <td  width="7%" class="table_top"> ɾ�� </td>
    </tr>
      <?php $isb2c=intval(request('b2c')) ?>
      <?php foreach($vd['items'] as $item) { ?>
      <?php if(($isb2c==1 && $item['gid']==0) || ($isb2c==0 && $item['gid'] > 0)){ ?>
      <?php //tbody ?>
      <?php if($vd['isselect'] == 1){ ?>
      <?php } ?>
	      <tr onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='';">
    <?php //tbody ?>
    <?php if($vd['isselect'] == 1){ ?>
	    <?php } ?>
      <td type="checkbox" name="id[]2" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onclick="CheckThis(this)" onfocus='this.blur()'  disabled="disabled"><?php echo $item['id']; ?></td>
      <td><span onclick="toInput(this,<?php echo $item['id']; ?>,'name')"><?php echo $item['name']; ?></span></td>
      <td><span onclick="toInput(this,<?php echo $item['id']; ?>,'money')"><?php echo $item['money']; ?></span></td>
      <?php if(UB_B2B){ ?>
        <td width="67px"><select name="select2" onchange="toSelect(this, <?php echo $item['id']; ?>, 'gid')">
          

        <?php (Option($vd['group'], $item['gid'], 'gname', 'gid')); ?>

      
        </select>
      </td>
      <?php } ?>
      <td><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['isdefault'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'isdefault')" alt="�����ͼƬ�����޸�״̬" onfocus="this.blur()" class="mousehand"/></td>
      <td><a href="#"  class="a delete" onclick="delSubmit(<?php echo $item['id']; ?>,'delitems')"></a>     </td>

    <?php //endtbody ?>
  </tr>

  <?php }} ?>

  

</table>

  <div id="content">
    <input name="hidden" type="hidden" id="totlePage" value="<?php echo $vd['totlepage']; ?>"/>
    <input name="hidden" type="hidden" id="thisPage" value="<?php echo $vd['thispage']; ?>"/>
    <?php if($vd['table']==0){ ?>
  </div>
  <input name="hidden" type="hidden" id="op" value="index.php?m=mod_b2b&amp;c=rank&amp;a=Deals&amp;b2c=<?php echo $isb2c; ?>&amp;<?php echo $vd['op']; ?>"/>
  <input name="hidden" type="hidden" id="url" value="index.php?m=mod_b2b&amp;c=rank&amp;a=index&amp;b2c=<?php echo $isb2c; ?>&amp;istable=1&amp;<?php echo $vd['op']; ?>"/>
  <input name="hidden" type="hidden" id="params" value="<?php echo $vd['op']; ?>"/>
  <div style="position:absolute;bottom:0px">
    <div class="tbBottom" id="tbBottom">
    <div style="float:right;text-align:right;">
<form id="actionform" method="post" action="index.php?m=mod_b2b&amp;c=rank&amp;a=index&amp;b2c=<?php echo $isb2c; ?>&amp;<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
          <div id="page"></div>
  </form>
</div>
  <div id="load" style="display:none;">
    <div id="loadcontent" >ҳ����������Ե�...</div>
  </div>
</body>

<script type="text/javascript">

//��һ��������߱�����ʾ������

//�ڶ������������һ��������ı����������ܿ��

tRows   = <?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?>;

tInfoA  = Array(0,0);

totleRows = <?php echo $vd['totlerow']; ?>;

deltxt  = "���ɾ����������𣬼����Ӧ�ļ۸�Ҳ��ɾ������Ӧ������û����½�һ������ȷ������ɾ��������";

thisaction = "ɾ��";

thisdel = 0;

statistics = 0;

var resizeidx = 2;

var helperVal = 1;

</script>

<script type="text/javascript">

//��ǰ�������

<?php //tinfo ?>
 tInfo = Array();
<?php //endtinfo ?>

</script>

<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>

<script type="text/javascript">

function setct(val)

{

  $("cttr").style.display = val == 3 ? "" : "none";

}



function loadst()

{

  if(!confirm('��ȡ�����̵ĵ�����Ʒ�������±�ģ����ۣ�'))

  {

    return;

  }

  

  setLoad("���ڵ�����,���Ժ�...");

  loadDisp(1);

  

  window.location.href = "index.php?m=mod_b2b&c=Price&a=PriceSaveBySup";

  

}

</script>

</html>

<?php } ?>