<?php if($vd['table']==0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<body>
<div class="title"> ��ǰλ�ã�������� &gt; ϵͳ����Ա����</div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Master&a=Create" id="cform">
        <table width="111%" cellpadding="0" cellspacing="1" class="page_table2">
    <tr>
            <td class="td_left"><div align="right">����Ա</div></td>
      <td width="75%"><div align="left">
        <input name="adminname" type="text" size="25">
      </div></td>
    </tr>
    <tr>
                  <td class="td_left"><div align="right">����</div></td>
      <td width="75%"><div align="left">
        <input name="adminpass" type="password" size="25">
      </div></td>
    </tr>
    <tr>
                  <td class="td_left"><div align="right">��ɫ</div></td>
      <td width="75%">
        <div align="left">
          <select size="1" name="adminrank">
            <?php if($vd['issuper']==1){ ?>
            <option value=2>ϵͳ����Ա</option>
            <?php } ?>
            <option value=3>��Ա����Ա</option>
            <option value=4>��������Ա</option>
            <option value=5>��Ʒ����Ա</option>
            <option value=6>���Ź���Ա</option>
          </select>
        </div></td>
    </tr>
    <tr>
      <td class="td_left"><div align="right"></div></td>
      <td width="75%"><input type="submit" name="Submit2" value="�� ��" class="tijiao_input" />
      </span></td>
    </tr>
  </table>
<div id="menuMask" class="menuMask" style="display:none"><form action="?m=mod_b2b&c=Tpl&tpl=Sup&v=Sup" method="post" style="margin:0px"><div class="menuContent"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>��Ʒ���<br/>
        <input type="checkbox" name="id[]" value="tordering" id="tordering" class="checkbox" onFocus='this.blur()'/> 
      ��Ʒ����<br/>
        <input type="checkbox" name="id[]" value="tpics" id="tpics" class="checkbox" onFocus='this.blur()'/> 
      ������<br/>
        <input type="checkbox" name="id[]" value="tname" id="tname" class="checkbox" onFocus='this.blur()'/> 
      �������<br/>
        <input type="checkbox" name="id[]" value="tabst" id="tabst" class="checkbox" onFocus='this.blur()'/> 
      �������ȼ�<br/>
        <input type="checkbox" name="id[]" value="tfee" id="tfee" class="checkbox" onFocus='this.blur()'/> 
      ������<br/>
        <input type="checkbox" name="id[]" value="tcode" id="tcode" class="checkbox" onFocus='this.blur()'/> 
      ����ۼ�<br/>
    </p>
  </div>
  <div class="menuOp">
  <input type="submit" value="����" class="button" disabled />
  <input type="button" value="����" class="button" disabled onClick="tInfoReset()"/>
  <input type="button" value="ȡ��" class="button" onClick="setMenuMask()"/>
  </div>
  </form>
</div>
<div style="display:none">
  <form method="post" id="fakeform" action="index.php?m=mod_b2b&c=master&a=Update">
    <input type="hidden" id="tadminname" name="adminname"/>
    <input type="hidden" id="toldname"  name="oldname"/>
    <input type="hidden" id="sid" name="id"/>
    <input type="hidden" id="tadminpass" name="adminpass">
    <input type="hidden" id="tadminrank" name="adminrank">
  </form>
</div>
<div id="tip" style="display:none">
  <span id="tiptable">��ҳ������ <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> ����¼��ѡ�� </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">���ѡ��ǰ�б������� <b><?php echo $vd['totlerow']; ?></b> ����¼>></a></span></div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <tr>
    <td align="right" colspan="20">���κμ�¼</td>
  </tr>
  </table>
  <?php } ?>
        <table cellspacing="1" cellpadding="0" class="page_table">
  <tr>
        <td width="10%" class="table_top"><input name="chkall" id="chkall" type="checkbox" class="checkbox" onClick="CheckAll(this)" onFocus='this.blur()' disabled /></td>
<?php //thead ?>
        <td width="10%" class="table_top">���</td>
        <td width="10%" class="table_top">����Ա</td>
        <td width="10%" class="table_top">����</td>
        <td width="10%" class="table_top">��ɫ</td>
        <td width="10%" class="table_top">�޸�</td>
        <td width="10%" class="table_top">Ȩ��</td>
        <td width="10%" class="table_top">��</td>
        <td width="10%" class="table_top">ɾ��</td>
<?php //endthead ?>
        <td width="10%" class="table_top"><div class="infoicon" style="color:#ccc"><b><u>>></u></b></div>
    </td>
  </tr>
  <?php foreach($vd['items'] as $item) { ?>
  <tr>
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onClick="CheckThis(this)" onFocus='this.blur()'  disabled ></input>
    </td>
    <?php //tbody ?>
    <td width="35px"><?php echo $item['id']; ?></td>
    <td width="165px">
      <input name="adminname" id="adminname_<?php echo $item['id']; ?>" type="text" size="25" value="<?php echo $item['adminName']; ?>"/>
      <input type="hidden" name="oldname" id="oldname_<?php echo $item['id']; ?>" value="<?php echo $item['adminName']; ?>" />
      <input type="hidden" name="id" id="id_<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>" />
    </td>
    <td width="165px"><input name="adminpass" id="adminpass_<?php echo $item['id']; ?>" type="password" size="25"></td>
    <td width="100px">
      <?php if($item['adminRank']==1){ ?>
      <select size="1" name="adminrank" id="adminrank_<?php echo $item['id']; ?>">
        <option value="1">��������Ա</option>
      </select>
      <?php }else if($item['adminRank']==2){ ?>
      <select size="1" name="adminrank" id="adminrank_<?php echo $item['id']; ?>">
        <option value="2">ϵͳ����Ա</option>
        <?php if($vd['issuper']==1){ ?>
        <option value=3 <?php if($item['adminRank'] == '3'){ ?> selected <?php } ?>>��Ա����Ա</option>
        <option value=4 <?php if($item['adminRank'] == '4'){ ?> selected <?php } ?>>��������Ա</option>
        <option value=5 <?php if($item['adminRank'] == '5'){ ?> selected <?php } ?>>��Ʒ����Ա</option>
        <option value=6 <?php if($item['adminRank'] == '6'){ ?> selected <?php } ?>>���Ź���Ա</option>
        <?php } ?>
      </select>
      <?php }else{ ?>
      <select size="1" name="adminrank" id="adminrank_<?php echo $item['id']; ?>">
        <?php if($vd['issuper']==1){ ?>
        <option value=2>ϵͳ����Ա</option>
        <?php } ?>
        <option value=3 <?php if($item['adminRank'] == '3'){ ?> selected <?php } ?>>��Ա����Ա</option>
        <option value=4 <?php if($item['adminRank'] == '4'){ ?> selected <?php } ?>>��������Ա</option>
        <option value=5 <?php if($item['adminRank'] == '5'){ ?> selected <?php } ?>>��Ʒ����Ա</option>
        <option value=6 <?php if($item['adminRank'] == '6'){ ?> selected <?php } ?>>���Ź���Ա</option>
      </select>
      <?php } ?>
    </td>
    <td width="80px">  <a href="#art1" class="a edit" onClick="tofake('<?php echo $item['id']; ?>')">

    <td width="60px">
      <?php if($item['adminRank'] > 1){ ?>
      <a href="index.php?m=mod_b2b&c=Master&a=Rights&adminname=<?php echo $item['adminName']; ?>"> ����</a> 
      <?php }else{ ?>
      --
      <?php } ?>    </td>
    <td width="60px">
      <a href="index.php?m=mod_b2b&c=Master&a=Bind&adminname=<?php echo $item['adminName']; ?>"> ��</a>    </td>
    <td width="60px">
      <?php if($item['adminRank'] > 1){ ?>
      <a class="a delete" href="index.php?m=mod_b2b&c=Master&a=Del&id=<?php echo $item['id']; ?>" onClick="return confirm('��ȷ��Ҫɾ���˹���Ա��')"><font color=red></font></a> 
      <?php }else{ ?>
      --
      <?php } ?>    </td>
    <?php //endtbody ?>
    <td class="endtd"></td>
  </tr>
  <?php } ?>
  
</table>
<input type="hidden" value="<?php echo $vd['totlepage']; ?>" id="totlePage"/>
<input type="hidden" value="<?php echo $vd['thispage']; ?>" id="thisPage"/>
<?php if($vd['table']==0){ ?>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=master&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=master&a=index&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> �ܼ� <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> ��</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=master&a=index&<?php echo $vd['op']; ?>" style="margin:0px;" onSubmit="loadDisp(1)">
    <div id="page"></div>
    <div style="float:left;margin-top:3px">
      ÿҳ��ʾ<input type="text" name="nrows" size="2" value="<?php echo $vd['nrows']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" /> �� 
      ����<input type="text" name="page" size="2" value="<?php echo $vd['thispage']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />ҳ<input type="submit" value=" ȷ �� &gt;&gt;" class="pagesub" />
    </div>
    </form>
    </div>
  </div>
</div>
<div id="load" style="display:none;">
  <div id="loadcontent" >ҳ����������Ե�...</div>
</div>
</body>
<script type="text/javascript">
//��һ��������߱�����ʾ������
//�ڶ������������һ��������ı����������ܿ���
tRows   = <?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?>;
tInfoA  = Array(0,0);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "���ٷ����,���޷��ָ���,ֻ����������,��ȷ���������ٲ�����";
thisaction = "����";
thisdel = 0;
statistics = 0;
var resizeidx = 4;
</script>
<script type="text/javascript">
//��ǰ��������
<?php //tinfo ?>
 tInfo = Array('tid','tordering','tpics','tname','tabst','tfee','tcode');
<?php //endtinfo ?>
function pickcolor(id) 
{
  var color = showModalDialog("<?php echo $vd['sc']; ?>tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
  if (color != null) 
  {
    $("colorexample"+id).style.backgroundColor = color;
    $("textcolor"+id).value = color;
  }
}

</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
<script type="text/javascript">
function setct(val)
{
  $("cttr").style.display = val == 3 ? "" : "none";
}

function tofake(id)
{
  vararray = Array("adminname","oldname","adminpass");
  len = vararray.length;
  for(i=0; i<len; i++)
  {
    $("t"+vararray[i]).value = $(vararray[i]+"_"+id).value;
  }
  $("sid").value = id;
  $("tadminrank").value = $("adminrank_"+id).options[$("adminrank_"+id).selectedIndex].value;
  $("fakeform").submit();
}
</script>
</html>
<?php } ?>