<?php if($vd['table']==0){ ?>
<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<body>
<?php if($vd['inrecycle']==0){ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;"><a href="index.php?m=mod_b2b&c=Agent" title="������»�ȡ�û��б�" onclick="loadDisp(1)"><font color="#000">�û��б�</font></a></span> (�� <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> ��)</div>
<div style="float:right"><a href="javascript:toHelper()" onFocus="this.blur()" title="�鿴�û���ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('delitems')"><samp title="��ѡ����Ҫɾ������,�ٵ�˰�ť">
    <div style="padding-top:10px;padding-left:9px;">����ɾ��</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="batch('agent')"><samp title="�����޸���ѡ��ļ�¼">
    <div style="padding-top:10px;padding-left:10px;">�����޸�</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="�����޸���ѡ��ļ�¼">
    <div style="padding-top:10px;padding-left:10px;">ʵʱ�޸�</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:7px"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div style="padding-top:10px;padding-left:9px;">ˢ��</div></samp>
  </div>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="loadDisp(1);window.location='?m=mod_b2b&c=agent&inrecycle=1'"><samp title="�����û�������">
    <div style="padding-top:10px;padding-left:3px;">������<span class="fixie8">(</span><?php if($vd['recycle_num']){ ?><span id="recycle"><?php echo $vd['recycle_num']; ?></span><?php }else{ ?><span id="recycle">��</span><?php } ?><span class="fixie8">)</span></div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=agent" method="post" style="margin:0px 0px 0px 0px;" onsubmit="setSearchTxt();return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="�û�����" class="button" style="vertical-align:middle;" />
    </form>
  </div>
</div>
<?php }else{ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Agent" title="����ص��û��б�" onclick="loadDisp(1)"><font color="#000">�û��б�</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">������</span>(�� <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> ��)</div>
<div style="float:right;"><a href="javascript:toHelper()" onFocus="this.blur()" title="�鿴�û���ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="��ѡ����Ҫ���ٵĻ�Ա��¼,�ٵ�˰�ť">
    <div style="padding-top:10px;padding-left:9px;">��������</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div style="padding-top:10px;padding-left:9px;">ˢ��</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="delAllSubmit('restore')"><samp title="��ԭ������״̬">
    <div style="padding-top:10px;padding-left:9px;font-weight:bold">��ԭ</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=agent&inrecycle=1" method="post" style="margin:0px 0px 0px 0px;" onsubmit="setSearchTxt();return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="�û�����" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<?php } ?>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=tpl&tpl=agent" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="aid" id="aid" onFocus='this.blur()'/>���<br/>
  <input type="checkbox" name="id[]" value="aname" id="aname" onFocus='this.blur()'/>�û���<br/>
  <input type="checkbox" name="id[]" value="realname" id="realname" onFocus='this.blur()'/>��ʵ����<br/>
  <input type="checkbox" name="id[]" value="zone" id="zone" onFocus='this.blur()'/>��������<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="bind" id="bind" onFocus='this.blur()'/>������<br/></span>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="company" id="company" onFocus='this.blur()'/>��˾����<br/></span>
  <input type="checkbox" name="id[]" value="rank" id="rank" onFocus='this.blur()'/>�û�����<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="parent" id="parent" onFocus='this.blur()'/>�ϼ�<br/></span>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="child" id="child" onFocus='this.blur()'/>�¼�<br/></span>
  <input type="checkbox" name="id[]" value="remain" id="remain" onFocus='this.blur()'/>���<br/>
  <input type="checkbox" name="id[]" value="csmp" id="csmp" onFocus='this.blur()'/>������<br/>
  <input type="checkbox" name="id[]" value="trade" id="trade" onFocus='this.blur()'/>�����¼<br/>
  <input type="checkbox" name="id[]" value="frozen" id="frozen" onFocus='this.blur()'/>״̬<br/>
  <input type="checkbox" name="id[]" value="addfunds" id="addfunds" onFocus='this.blur()'/>�ӿ�<br/>
  <input type="checkbox" name="id[]" value="addloan" id="addloan" onFocus='this.blur()'/>����Ƿ��<br/>
  <input type="checkbox" name="id[]" value="buyright" id="buyright" onFocus='this.blur()'/>����Ȩ��<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="funds" id="funds" onFocus='this.blur()'/>�ʽ�<br/></span>
  <input type="checkbox" name="id[]" value="regdate" id="regdate" onFocus='this.blur()'/>ע��ʱ��<br/>
  <input type="checkbox" name="id[]" value="regip" id="regip" onFocus='this.blur()'/>ע��IP<br/>
  <input type="checkbox" name="id[]" value="lastdate" id="lastdate" onFocus='this.blur()'/>�ϴε�½ʱ��<br/>
  <input type="checkbox" name="id[]" value="lastip" id="lastip" onFocus='this.blur()'/>�ϴε�¼IP<br/>
  <input type="checkbox" name="id[]" value="remarks" id="remarks" onFocus='this.blur()'/>��ע��Ϣ<br/>
  <input type="checkbox" name="id[]" value="msg" id="msg" onFocus='this.blur()'/>����վ����Ϣ<br/>
  <input type="checkbox" name="id[]" value="ask" id="ask" onFocus='this.blur()'/>�鿴�û�����<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="eshop" id="eshop" onFocus='this.blur()'/>�����ַ<br/></span>
  <input type="checkbox" name="id[]" value="aqq" id="aqq" onFocus='this.blur()'/>QQ<br/>
  <input type="checkbox" name="id[]" value="amail" id="amail" onFocus='this.blur()'/>����<br/>
  <input type="checkbox" name="id[]" value="atel" id="atel" onFocus='this.blur()'/>�绰<br/>
  <input type="checkbox" name="id[]" value="mobile" id="mobile" onFocus='this.blur()'/>�ֻ�<br/>
  <input type="checkbox" name="id[]" value="aaddr" id="aaddr" onFocus='this.blur()'/>סַ<br/>
  <input type="checkbox" name="id[]" value="zip" id="zip" onFocus='this.blur()'/>�ʱ�<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="income" id="income" onFocus='this.blur()'/>��ǰ��������<br/></span>
  </div>
  <div class="menuOp">
  <input type="submit" value="����" class="button"/>
  <input type="reset" value="����" class="button" onclick="tInfoReset()"/>
  <input type="button" value="ȡ��" class="button" onclick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onclick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="50px">���</td>
<td width="80px">�û���</td>
<?php if(UB_B2B){ ?><td width="22px">��</td><?php } ?>
<td width="80px">�û�����</td>
<?php if(UB_B2B){ ?><td width="40px">�ϼ�</td><?php } ?>
<?php if(UB_B2B){ ?><td width="55px">�¼�</td><?php } ?>
<td width="120px">���</td>
<td width="22px">��</td>
<td width="35px">��ͨ</td>
<td width="22px">��</td>
<td width="22px">Ƿ</td>
<?php if(UB_B2B){ ?><td width="35px">�ʽ�</td><?php } ?>
<td width="140px">ע��ʱ��</td>
<?php //endthead ?>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/rmb.png"/>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/>
    </td>
    <td width="22px">
      <?php if($vd['inrecycle']==0){ ?>
      <img src="<?php echo $vd['sc']; ?>images/icon_trash.gif"/>
      <?php }else{ ?>
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif"/>
      <?php } ?>
      
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
  <form id="cform" name="form" method="post" action="index.php?m=mod_b2b&c=agent&a=ItemDeal" onsubmit="return Check();">
  <table id="tbody"  border="0" cellspacing="0" cellpadding="0">
  
  <?php foreach($vd['items'] as $item) { ?>
  <tr onmouseover="setoverbg(this)" onmouseout="setoutbg(this)">
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['aid']; ?>" class="checkbox" value="<?php echo $item['aid']; ?>" onclick="CheckThis(this)" onFocus='this.blur()'></input>
    </td>
<?php //tbody ?>
<td width="50px"><?php echo $item['aid']; ?></td>
<td width="80px"><nobr><samp title="<?php echo $item['aname']; ?>"><?php echo $item['aname']; ?></samp></nobr></td>
<?php if(UB_B2B){ ?><td width="22px"><a href="index.php?m=mod_b2b&c=Security&a=Bind&aid=<?php echo $item['aid']; ?>&staffid=0" title="������"><img src="<?php echo $vd['sc']; ?>images/bind.gif"/></a></td><?php } ?>
<td width="80px"><nobr><a href="index.php?m=mod_b2b&c=agent&stype=alv&keywords=<?php echo $item['alv']; ?>" title="�鿴����<?php echo $item['rank']; ?>�б�"><?php echo $item['rank']; ?></a></nobr></td>
<?php if(UB_B2B){ ?><td width="40px"><a href="index.php?m=mod_b2b&c=agent&parentid=<?php echo $item['parentid']; ?>"><font color="#ff0000"><?php (DisplayCode($item['parentid'])); ?></font></a></td><?php } ?>
<?php if(UB_B2B){ ?><td width="55px"><a href="index.php?m=mod_b2b&c=agent&parentid=<?php echo $item['aid']; ?>"><font color="#0000ff"><?php echo $item['underlingcount']; ?>��</font></a></td><?php } ?>
<td width="120px"><?php echo $item['aremain']; ?></td>
<td width="22px"><a href="index.php?m=mod_b2b&c=Trade&tpl=agent&stype=aid&keywords=<?php echo $item['aid']; ?>&by=1" title="�鿴<?php echo $item['aid']; ?>�����¼"><img src="<?php echo $vd['sc']; ?>images/check.gif"/></a></td>
<td width="35px"><?php if($item['frozen'] == 1){ ?> <font color="#ff0000">����</font> <?php }else{ ?> <font color="#008800">����</font> <?php } ?>	</td>
<td width="22px"><a href="index.php?m=mod_b2b&c=agent&a=AddFunds&aid=<?php echo $item['aid']; ?>"><img src="<?php echo $vd['sc']; ?>images/money.gif" border="0"/></a></td>
<td width="22px"><a href="index.php?m=mod_b2b&c=Loan&a=Add&aid=<?php echo $item['aid']; ?>">Ƿ</a></td>
<?php if(UB_B2B){ ?><td width="35px"><a href="index.php?m=mod_b2b&c=agent&a=lock&aid=<?php echo $item['aid']; ?>"><font color="#ff0000">����</font></a></td><?php } ?>
<td width="140px"><?php echo $item['regdate']; ?></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=order&stype=aname&keywords=<?php echo $item['aname']; ?>&aid=-1&by=1" title="�鿴<?php echo $item['aname']; ?>���Ѽ�¼" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/rmb.png"/></a>
    </td>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=agent&a=detail&aid=<?php echo $item['aid']; ?>" title="�༭�û�" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <?php if($vd['inrecycle']==0){ ?>
      <img src="<?php echo $vd['sc']; ?>images/icon_trash.gif" onclick="delSubmit(<?php echo $item['aid']; ?>,'delitems')" alt="ɾ���û�,���Դӻ��ջָ�" style="cursor:pointer"/>
      <?php }else{ ?>
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['aid']; ?>,'destroyitems')" alt="�����û�,�����ϢҲ�ᱻ����,�޷��ָ�" style="cursor:pointer"/>
      <?php } ?>
    </td>
    <td class="endtd"></td>
  </tr>
  <?php } ?>
  
</table>
</form>
<input type="hidden" value="<?php echo $vd['totlepage']; ?>" id="totlePage"/>
<input type="hidden" value="<?php echo $vd['thispage']; ?>" id="thisPage"/>
<?php if($vd['inrecycle']==0){ ?>
<input type="hidden" value="<?php echo $vd['recycle_num']; ?>" id="recycle_num"/>
<?php } ?>
<?php if($vd['table']==0){ ?>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=agent&a=deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=agent&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> �ܼ� <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> ��</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=agent&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
    <div id="page"></div>
    <div style="float:left;margin-top:3px">
      ÿҳ��ʾ<input type="text" name="nrows" size="2" value="<?php echo $vd['nrows']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" /> �� 
      ����<input type="text" name="page" size="2" value="<?php echo $vd['thispage']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />ҳ<input type="submit" value=" ȷ �� " class="pagesub" />
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
tInfoA  = Array(3,87);
totleRows = <?php echo $vd['totlerow']; ?>;
<?php if($vd['inrecycle']){ ?>
deltxt  = "��������û���¼ô,�û������ϢҲ�ᱻ����(����������Ϣ����ֵ��Ϣ��������Ϣ��),���޷��ָ�,��ȷ���������ٲ�����";
thisaction = "����";
<?php }else{ ?>
deltxt  = "��ȷ������ɾ��������ɾ�����������Դӻ�������лָ�";//"���ɾ���û�,�û������ϢҲ�ᱻɾ��(����������Ϣ����ֵ��Ϣ��������Ϣ��),��ȷ������ɾ��������";
thisaction = "ɾ��";
<?php } ?>
thisdel = 0;
statistics = 0;
var resizeidx = 2;
var helperVal = 0;
</script>
<script type="text/javascript">
//��ǰ�������
<?php //tinfo ?>
 tInfo = Array('aid','aname','bind','rank','parent','child','remain','trade','frozen','addfunds','addloan','funds','regdate');
<?php //endtinfo ?>
</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
</html>
<?php } ?>
