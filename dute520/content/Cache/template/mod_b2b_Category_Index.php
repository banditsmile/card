<?php if($vd['table']==0){ ?>
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
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <font color="#000"><?php if(intval(request('custom')) ==1){ ?>����<?php } ?>�����б�</font> (�� <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> ��)<?php if(isset($vd['parent']['name']) && $vd['parent']['name'] != ''){ ?> <span style="font-size:7px;">>></span> <font color="#000000"><b><?php echo $vd['parent']['name']; ?></b></font><?php } ?>
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">
    <?php if(intval(request('custom')) ==1){ ?>
    ӵ��������Ʒ���Ȩ�޵��û�����ӵķ���
    <?php }else{ ?>
    ������;:<br/>
    ������ص���Ƕ�С��һ����ֱ��д����Ϸ��Ӧ�����ƣ���Ҫ���ڹ����������֣��㿨��ķ���Ƚ����⣬�ܶ���඼�Ƕ����Ϸ����ϣ���ӵ�ʱ�򣬿��Կ���ʹ����Ϸ����д������ȫ�ƣ��������һ�۾Ϳ���ʲô���ͼ���<br/>
    <br/>�Զ�����:<br/>
    ���򣺰���Ŀ¼���ַ����Ƚ��������ַ��ٵ�����ǰ��<br/>
    �����һ��Ŀ¼�µ��Զ�����������ж������ϵ�Ŀ¼�������������ĳ��Ŀ¼�£��������Ŀ¼��������
    <?php } ?>
  </p>
</div>
<div id="contentTip" style="display:none;"></div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_Category_index" onFocus="this.blur()" title="�鿴������ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="��ѡ����Ҫ���ٵ���,�ٵ�˰�ť">
    <div style="padding-top:10px;padding-left:9px;">��������</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="�����޸���ѡ��ļ�¼">
    <div style="padding-top:10px;padding-left:10px;">ʵʱ�޸�</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="loadDisp(1);window.location='?m=mod_b2b&c=Category&a=Ordering&parentid=<?php echo $vd['parentid']; ?>'"><samp title="���ַ����Ƚ�������(һ��Ŀ¼����)">
    <div style="padding-top:10px;padding-left:10px;">�Զ�����</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:3px"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div style="padding-top:10px;padding-left:10px;">ˢ��</div></samp>
  </div>
  <?php if(intval(request('custom')) == 0){ ?>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="disp('adddiv')"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">���</div></samp>
  </div>
  <?php } ?>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Category&custom=<?php echo intval(request('custom')); ?>" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    �ϼ������б�
    <select name="cat" onchange="javascript:location.href='index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $vd['grandfatherid']; ?>&custom=<?php echo intval(request('custom')); ?>&parentid=' + this.options[this.selectedIndex].value;" style="vertical-align:middle;font-size:14px;width:200px;">
    <option value="">ѡ����Ҫ�����ϼ�����</option>
    <?php (option($vd['cat'], $vd['parentid'], 'name', 'id')); ?>
    </select>
    <input type="text" name="keywords" size="15" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <input type="hidden" name="stype" value="name"/>
    <input type="submit" value="���� &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:50px;left:230px;;width:380px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">���<?php if(isset($vd['parent']['name']) && $vd['parent']['name'] == '֧����'){ ?>�һ�����<?php }else{ ?>����<?php } ?></div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Category&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <?php if(!isset($vd['parent']['name']) || $vd['parent']['name'] != '֧����'){ ?>
    <tr>
      <td width="35%">��������</td>
      <td width="65%"><input type="text" name="name" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">������ɫ</td>
      <td width="65%">
        <div style="float:left"><input type="text" name="color" id="textcolor0" size="25" value="#000000"/></div>
        <div onclick="pickcolor(0)" id="colorexample0" style="float:left;cursor:pointer;height:22px;margin-left:5px;margin-top:1px;width:16px;border:0px #fff solid;background:#000000"/></div>
      </td>
    </tr>
    <tr>
      <td width="35%">�������</td>
      <td width="65%"><input type="text" name="ordering" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">����ĸ</td>
      <td width="65%"><input type="text" name="pinyin" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">�Ƿ�����</td>
      <td width="65%"><input type="checkbox" name="hot" size="25" value="1" class="checkbox"/></td>
    </tr>
    <tr<?php if(UB_B2B+UB_B2C+UB_YKT==1){ ?> style="display:none"<?php } ?>>
      <td width="35%">����ɼ�</td>
      <td width="65%">
        <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2b" value="1" class="checkbox"<?php if(UB_B2B){ ?> checked<?php } ?>/>����</span>
        <span<?php if(!UB_B2C){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2c" value="1" class="checkbox"<?php if(UB_B2C){ ?> checked<?php } ?>/>����</span>
        <span<?php if(!UB_YKT){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forykt" value="1" class="checkbox"<?php if(UB_YKT){ ?> checked<?php } ?>/>һ��ͨ</span>
      </td>
    </tr>
    <tr<?php if(!UB_B2B||intval(request('custom')) == 1){ ?> style="display:none"<?php } ?>>
      <td width="35%">�����������Ʒ</td>
      <td width="65%">
      <input type="checkbox" name="shared" value="1" class="checkbox"/>����
      </td>
    </tr>
    <tr>
      <td width="35%">������</td>
      <td width="65%">
      <input type="text" name="abst" size="25" value=""/></td>
    </tr>
    <?php }else{ ?>
    <tr>
      <td width="35%">��������</td>
      <td width="65%"><input type="hidden" name="coupon" value="1"/><input type="text" name="name" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">����</td>
      <td width="65%"><input type="text" name="fee" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">����</td>
      <td width="65%"><input type="text" name="fee" size="25"/></td>
    </tr>
    <tr> 
      <td width="35%">��Ӧͼ��</td>
      <td width="65%">
         <div class="search_s">
           <span class="search_s1">
             <select name="pics" class="search_select">
                <option value="icon_wm.gif">����һ��ͨ</option>
               <option value="icon_jnet.gif">����һ��ͨ</option>
               <option value="icon_no.gif">��Ӻ����б༭</option>
             </select>
           </span>
         </div>
      </td>
    </tr>
    <tr>
      <td width="35%">�Ƿ����</td>
      <td width="65%">
      <input type="hidden" name="forb2b" value="0"/>
      <input type="hidden" name="forb2c" value="0"/>
      <input type="hidden" name="forykt" value="0"/>
      <input type="checkbox" name="fork2k" value="1" class="checkbox" checked />����վ
      </td>
    </tr>
    <tr>
      <td width="35%">���˵����</td>
      <td width="65%">
      <textarea type="text" name="abst" style="width:149px;height:60px" value=""></textarea>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td width="35%"></td>
      <td width="65%">
        <input type="hidden" name="grandfatherid" value="<?php echo $vd['grandfatherid']; ?>" />
        <input type="hidden" name="parentid" size="16" value="<?php echo $vd['parentid']; ?>"/>
        <input type="submit" value="�� ��" class="button"/>
        <input type="button" value="ȡ ��" onclick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=category" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tid" id="tid" onFocus='this.blur()'/> ���<br/>
  <input type="checkbox" name="id[]" value="tordering" id="tordering" onFocus='this.blur()'/> ����<br/>
  <input type="checkbox" name="id[]" value="tcolor" id="tcolor" onFocus='this.blur()'/> ��ɫ<br/>
  <input type="checkbox" name="id[]" value="tname" id="tname" onFocus='this.blur()'/> ��������<br/>
  <span<?php if(intval(request('custom'))==0){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="taid" id="taid" onFocus='this.blur()'/> ����<br/></span>
  <input type="checkbox" name="id[]" value="tcatid" id="tcatid" onFocus='this.blur()'/> ��Ʒ<br/>
  <input type="checkbox" name="id[]" value="tpinyin" id="tpinyin" onFocus='this.blur()'/> ����ĸ<br/>
  <input type="checkbox" name="id[]" value="tabst" id="tabst" onFocus='this.blur()'/> ������<br/>
  <input type="checkbox" name="id[]" value="thot" id="thot" onFocus='this.blur()'/> �Ƿ�����<br/>
  <span<?php if(intval(request('custom'))==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tshared" id="tshared" onFocus='this.blur()'/> �Ƿ���<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforb2b" id="tforb2b" onFocus='this.blur()'/> �����ɼ�<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforb2c" id="tforb2c" onFocus='this.blur()'/> ���ۿɼ�<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforykt" id="tforykt" onFocus='this.blur()'/> һ��ͨ�ɼ�<br/></span>
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
<td width="35px"><b>���</b></td>
<td width="35px"><span class="canedit">����</span></td>
<td width="30px"><img src="<?php echo $vd['sc']; ?>images/16.gif" align="absmiddle"/></td>
<td width="150px"><span class="canedit">��������</span></td>
<?php if(intval(request('custom'))==1){ ?><td width="50px"><b>����</b></td><?php } ?>
<td width="35px"><b>��Ʒ</b></td>
<td width="50px"><span class="canedit">����ĸ</span></td>
<td width="22px"><span class="canedit">��</span></td>
<?php if(intval(request('custom'))==0){ ?><td width="22px"><span class="canedit">��</span></td><?php } ?>
<?php if(UB_B2B&&UB_B2C+UB_YKT+UB_B2B>1){ ?><td width="22px"><span class="canedit">��</span></td><?php } ?>
<?php //endthead ?>
    <td width="30px">
      <b>����</b>
    </td>
    <td width="30px">
      <b>����</b>
    </td>
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
  <form id="cform" name="form" method="post" action="index.php?m=mod_b2b&c=Category&a=ItemDeal" onsubmit="return Check();">
  <table id="tbody"  border="0" cellspacing="0" cellpadding="0">
  
  <?php foreach($vd['items'] as $item) { ?>
  <tr onmouseover="setoverbg(this)" onmouseout="setoutbg(this)">
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onclick="CheckThis(this)" onFocus='this.blur()'></input>
    </td>
<?php //tbody ?>
<td width="35px"><?php echo $item['id']; ?></td>
<td width="35px"><nobr><span onclick="toInput(this,<?php echo $item['id']; ?>,'ordering')"><?php echo $item['ordering']; ?></span></nobr></td>
<td width="30px"><div onclick="toColor(this,<?php echo $item['id']; ?>,'color')" style="cursor:pointer;width:23px;height:16px;border:0px #fff solid;background:<?php echo $item['color']==''?'#6c6c6c' : $item['color'] ?>"/></div></td>
<td width="150px"><span onclick="toInput(this,<?php echo $item['id']; ?>,'name')"><?php echo $item['name']; ?></span></td>
<?php if(intval(request('custom'))==1){ ?><td width="50px"><?php (DisplayCode($item['aid'])); ?></td><?php } ?>
<td width="35px"><?php if($item['parentid']==0){ ?>--<?php }else{ ?><a href="index.php?m=mod_b2b&c=product&catid=<?php echo $item['id']; ?>&aid=-1&ptype=-1">�б�</a><?php } ?></td>
<td width="50px"><nobr><span onclick="toInput(this,<?php echo $item['id']; ?>,'pinyin')"><?php echo $item['pinyin']==''?'---' : $item['pinyin']; ?></span></nobr></td>
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['hot'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'hot')" alt="�����ͼƬ�����޸�״̬" onFocus="this.blur()" class="mousehand"/></td>
<?php if(intval(request('custom'))==0){ ?><td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['shared'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'shared')" alt="�����ͼƬ�����޸�״̬" onFocus="this.blur()" class="mousehand"/></td><?php } ?>
<?php if(UB_B2B&&UB_B2C+UB_YKT+UB_B2B>1){ ?><td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['forb2b'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'forb2b')" alt="�����ͼƬ�����޸�״̬" onFocus="this.blur()" class="mousehand"/></td><?php } ?>
<?php //endtbody ?>
    <td width="30px">
    	<?php if($item['parentid']==0){ ?>--<?php }else{ ?>
      <a href="index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $item['parentid']; ?>&aid=<?php echo $item['aid']; ?>&parentid=<?php echo $vd['grandfatherid']; ?>&custom=<?php echo intval(request('custom')); ?>">
      ����
      </a>
      <?php } ?>
    </td>
    <td width="30px">
      <a href="index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $item['parentid']; ?>&aid=<?php echo $item['aid']; ?>&parentid=<?php echo $item['id']; ?>&custom=<?php echo intval(request('custom')); ?>">
      ����
      </a>
    </td>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=Category&a=Detail&id=<?php echo $item['id']; ?>" title="�༭����" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="���ٷ����¼��,���޷��ָ���,ֻ���������" style="cursor:pointer"/>
    </td>
    <td class="endtd"></td>
  </tr>
  <?php } ?>
  
</table>
</form>
<input type="hidden" value="<?php echo $vd['totlepage']; ?>" id="totlePage"/>
<input type="hidden" value="<?php echo $vd['thispage']; ?>" id="thisPage"/>
<?php if($vd['table']==0){ ?>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=Category&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=Category&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> �ܼ� <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> ��</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=Category&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
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
//�ڶ������������һ��������ı����������ܿ��
tRows   = <?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?>;
tInfoA  = Array(4,132);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "���ٷ����,���޷��ָ���,ֻ���������,��ȷ���������ٲ�����";
thisaction = "����";
thisdel = 0;
statistics = 0;
var resizeidx = 4;
</script>
<script type="text/javascript">
//��ǰ�������
<?php //tinfo ?>
 tInfo = Array('tid','tordering','tcolor','tname','taid','tcatid','tpinyin','thot','tshared','tforb2b');
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
</html>
<?php } ?>
