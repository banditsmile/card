<?php if($vd['table'] == 0){ ?>
<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<style>
.search_select {
  width: 154px;
  color: #555;
  height:24px;
  margin: -1px;
  border: 0px solid #B5B8C8;
  font-size: 14px;
  background: #FFF;
}
.search_s {
   width: 152px;
   height:20px;
   float:left;
   padding: 2px;
   margin: 6px 0 0 0px;
   overflow: hidden;
   border: 1px solid #80CCFF;
   background: #fff;
}
.search_s1 {
   width: 152px;
   height:20px;
   float:left;
   margin: 0;
   overflow: hidden;
   background: #fff;
}
</style>
<body>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <font color="#000">���л���˺��б�</font> (�� <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> ��)</div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_bank_index" onFocus="this.blur()" title="�鿴���������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="��ѡ����Ҫɾ������,�ٵ�˰�ť">
    <div style="padding-top:10px;padding-left:9px;">��������</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="�����޸���ѡ��ļ�¼">
    <div style="padding-top:10px;padding-left:10px;">ʵʱ�޸�</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:7px"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div style="padding-top:10px;padding-left:9px;">ˢ��</div></samp>
  </div>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="disp('adddiv')"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">����</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Bank" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="�������� &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:100px;left:230px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">���ӻ������</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Bank&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="25%">������</td>
      <td width="75%"><input type="text" name="AccountBranch" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">���п���</td>
      <td width="75%"><input type="text" name="AccountNO" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">����</td>
      <td width="75%"><input type="text" name="AccountName" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">������</td>
      <td width="75%"><input type="text" name="Address" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">����˵��</td>
      <td width="75%"><input type="text" name="other" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">������ַ</td>
      <td width="75%"><input type="text" name="banksite" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">�������</td>
      <td width="75%">
        <input type="checkbox" name="settle" value="1" class="checkbox"/>���ڽ��� 
        <input type="checkbox" name="remit" value="1" class="checkbox"/>���ڻ�� 
      </td>
    </tr>
    <tr> 
      <td width="25%">����ͼ��</td>
      <td width="75%">
         <div class="search_s">
           <span class="search_s1">
             <select name="bankicon" class="search_select">
                <option value="bank_gh.gif">��������</option>
               <option value="bank_js.gif">��������</option>
               <option value="bank_nh.gif">ũҵ����</option>
               <option value="bank_yz.gif">�����̿�</option>
               <option value="bank_zh.gif">��������</option>
               <option value="bank_jh.gif">��ͨ����</option>
               <option value="bank_zg.gif">�й�����</option>
               <option value="bank_gf.gif">�㶫��չ����</option>
               <option value="bank_pf.gif">�Ϻ��ֶ���չ����</option>
               <option value="bank_sf.gif">���ڷ�չ����</option>
               <option value="bank_ms.gif">�й���������</option>
               <option value="bank_zx.gif">��������</option>
               <option value="bank_xy.gif">��ҵ����</option>
               <option value="bank_gd.gif">�������</option>
               <option value="bank_hx.gif">��������</option>
               <option value="bank_alipay.gif">֧����</option>
               <option value="bank_tenpay.gif">�Ƹ�ͨ</option>
               <option value="bank_no.gif">���Ӻ����б༭</option>
             </select>
           </span>
         </div>
      </td>
    </tr>
    <tr>
      <td width="25%"></td>
      <td width="75%">
        <input type="submit" value="�� ��" class="button"/>
        <input type="button" value="ȡ ��" onclick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=bank" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tbankicon" id="tbankicon" onFocus='this.blur()'/>��־<br/>
  <input type="checkbox" name="id[]" value="branch" id="branch" onFocus='this.blur()'/>������<br/>
  <input type="checkbox" name="id[]" value="no" id="no" onFocus='this.blur()'/>���п���<br/>
  <input type="checkbox" name="id[]" value="name" id="name" onFocus='this.blur()'/>����<br/>
  <input type="checkbox" name="id[]" value="addr" id="addr" onFocus='this.blur()'/>������<br/>
  <input type="checkbox" name="id[]" value="remarks" id="remarks" onFocus='this.blur()'/>����˵��<br/>
  <input type="checkbox" name="id[]" value="tbanksite" id="tbanksite" onFocus='this.blur()'/>������ַ<br/>
  <input type="checkbox" name="id[]" value="tsettle" id="tsettle" onFocus='this.blur()'/>���ڽ���<br/>
  <input type="checkbox" name="id[]" value="tremit" id="tremit" onFocus='this.blur()'/>���ڻ��<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="����" class="button"/>
  <input type="button" value="����" class="button" onclick="tInfoReset()"/>
  <input type="button" value="ȡ��" class="button" onclick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onclick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="50px">��־</td>
<td width="100px"><span class="canedit">������</span></td>
<td width="180px"><span class="canedit">���п���</span></td>
<td width="60px"><span class="canedit">����</span></td>
<td width="100px"><span class="canedit">������</span></td>
<td width="250px"><span class="canedit">����˵��</span></td>
<td width="250px"><span class="canedit">������ַ</span></td>
<td width="22px"><b>��</b></td>
<td width="22px"><b>��</b></td>
<?php //endthead ?>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif"/>
    </td>
    <td class="endtd">
      <div class="infoicon" onclick="setMenuMask()"><b><u>>></u></b></div>
    </td>
  </tr>
</table>
<div id="tip" style="display:none">
  <span id="tiptable">��ҳ������ <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> ����¼��ѡ�� </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">���ѡ��ǰ�б������� <b><?php echo $vd['totlerow']; ?></b> ����¼>></a>
  </span>
</div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <table  width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" colspan="20">���κμ�¼</td>
  </tr>
  </table>
  <?php } ?>
  <form id="cform" name="form" method="post" action="index.php?m=mod_b2b&c=Bank&a=ItemDeal" onsubmit="return Check();">
  <table id="tbody"  border="0" cellspacing="0" cellpadding="0">
  
  <?php foreach($vd['items'] as $item) { ?>
  <tr onmouseover="setoverbg(this)" onmouseout="setoutbg(this)">
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onclick="CheckThis(this)" onFocus='this.blur()'></input>
    </td>
<?php //tbody ?>
<td width="50px"><img src="<?php echo $vd['root']; ?>content/mod_shared/skins/upload/<?php echo $item['bankicon']; ?>" border="0"/></td>
<td width="100px"><nobr><samp title="<?php echo $item['AccountBranch']; ?>"><span onclick="toInput(this,<?php echo $item['id']; ?>,'AccountBranch')"><?php echo $item['AccountBranch']; ?></span></samp></nobr></td>
<td width="180px"><span onclick="toInput(this,<?php echo $item['id']; ?>,'AccountNO')"><?php echo $item['AccountNO']; ?></span></td>
<td width="60px"><span onclick="toInput(this,<?php echo $item['id']; ?>,'AccountName')"><?php echo $item['AccountName']; ?></span></td>
<td width="100px"><span onclick="toInput(this,<?php echo $item['id']; ?>,'Address')"><?php echo $item['Address']; ?></span></td>
<td width="250px"><nobr><samp title="<?php echo $item['other']; ?>"><span onclick="toInput(this,<?php echo $item['id']; ?>,'other')"><?php echo $item['other']; ?></span></samp></nobr></td>
<td width="250px"><nobr><samp title="<?php echo $item['banksite']; ?>"><span onclick="toInput(this,<?php echo $item['id']; ?>,'banksite')"><?php echo $item['banksite']; ?></span></samp></nobr></td>
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['settle'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'settle')" alt="�����ͼƬ�����޸�״̬" onFocus="this.blur()" class="mousehand"/></td>
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['remit'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'remit')" alt="�����ͼƬ�����޸�״̬" onFocus="this.blur()" class="mousehand"/></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=Bank&a=Detail&id=<?php echo $item['id']; ?>" title="�༭����" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="���ٻ�����м�¼��,���޷��ָ���,ֻ����������" style="cursor:pointer"/>
    </td>
    <td class="endtd"></td>
  </tr>
  <?php } ?>
  
</table>
</form>
<input type="hidden" value="<?php echo $vd['totlepage']; ?>" id="totlePage"/>
<input type="hidden" value="<?php echo $vd['thispage']; ?>" id="thisPage"/>
<?php if($vd['table'] == 0){ ?>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=Bank&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=Bank&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> �ܼ� <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> ��</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=Bank&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
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
tInfoA  = Array(2,58);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "���ٻ�����м�¼��,���޷��ָ���,ֻ����������,��ȷ���������ٲ�����";
thisaction = "����";
thisdel = 0;
statistics = 0;
var resizeidx = 6;
</script>
<script type="text/javascript">
//��ǰ��������
<?php //tinfo ?>
 tInfo = Array('tbankicon','branch','no','name','addr','remarks','tbanksite','tsettle','tremit');
<?php //endtinfo ?>

</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
</html>
<?php } ?>