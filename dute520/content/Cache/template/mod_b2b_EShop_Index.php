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
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <font color="#000">��վ�б�</font> (�� <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> ��)</div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_bank_index" onFocus="this.blur()" title="�鿴��վ��ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onMouseOver="this.className='iconbg4'" onMouseOut="this.className='titleOp4'" onClick="delAllSubmit('destroyitems')"><samp title="��ѡ����Ҫ���ٵ���,�ٵ�˰�ť">
    <div style="padding-top:10px;padding-left:9px;">��������</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onMouseOut="if(editRealtime) return;this.className='titleOp4'" onClick="batchEdit(this)"><samp title="�����޸���ѡ��ļ�¼">
    <div style="padding-top:10px;padding-left:10px;">ʵʱ�޸�</div></samp>
  </div>
  <div class="titleOp2" onMouseOver="this.className='iconbg2'" onMouseOut="this.className='titleOp2'" onClick="tableRefresh()" style="margin-right:3px"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div style="padding-top:10px;padding-left:10px;">ˢ��</div></samp>
  </div>
  <div class="titleOp4" onMouseOver="this.className='iconbg4'" onMouseOut="this.className='titleOp4'" onClick="disp('adddiv')"><samp title="���ˢ�±�ҳˢ������,������ԭ����ѡ״̬">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">���</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=EShop" method="post" style="margin:0px 0px 0px 0px;" onSubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="��վ���� &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:100px;left:230px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">��ӷ�վ</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=EShop&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="30%">��վ����</td>
      <td width="70%"><input type="text" name="webname" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">������</td>
      <td width="70%"><input type="text" name="aid" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">��վ��ַ</td>
      <td width="70%"><input type="text" name="website" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">ϵͳ��Ŀ¼</td>
      <td width="70%"><input type="text" name="admdir" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">��ʼ����</td>
      <td width="70%">
        <input type="text" name="startdate" size="18" value="<?php echo date("Y-m-d H-i-s"); ?>" style="vertical-align:middle;" id="startdate" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
        <img src="<?php echo $vd['sc']; ?>images/calender.gif" onClick="dateDialog('startdate')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
      </td>
    </tr>
    <tr>
      <td width="30%">��������</td>
      <td width="70%">
        <input type="text" name="enddate" size="18" value="<?php echo date("Y-m-d H:i:s" , strtotime("+1 years")); ?>" style="vertical-align:middle;"  id="enddate" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
        <img src="<?php echo $vd['sc']; ?>images/calender.gif" onClick="dateDialog('enddate')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
      </td>
    </tr>
    <tr>
      <td width="30%"></td>
      <td width="70%">
        <input type="submit" value="�� ��" class="button"/>
        <input type="button" value="ȡ ��" onClick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=EShop" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tb2blogo" id="tb2blogo" class="checkbox" onFocus='this.blur()'/> �������<br/>
  <input type="checkbox" name="id[]" value="twebname" id="twebname" class="checkbox" onFocus='this.blur()'/> ��վ����<br/>
  <input type="checkbox" name="id[]" value="tid" id="tid" class="checkbox" onFocus='this.blur()'/> ���<br/>
  <input type="checkbox" name="id[]" value="taid" id="taid" class="checkbox" onFocus='this.blur()'/> �û�<br/>
  <input type="checkbox" name="id[]" value="twebsite" id="twebsite" class="checkbox" onFocus='this.blur()'/> ��ַ<br/>
  <input type="checkbox" name="id[]" value="tsetup" id="tsetup" class="checkbox" onFocus='this.blur()'/> ����<br/>
  <input type="checkbox" name="id[]" value="tupgrade" id="tupgrade" class="checkbox" onFocus='this.blur()'/> ����<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="����" class="button"/>
  <input type="button" value="����" class="button" onClick="tInfoReset()"/>
  <input type="button" value="ȡ��" class="button" onClick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onClick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="230px">�������</td>
<td width="100px">����</td>
<td width="35px">���</td>
<td width="60px">����</td>
<td width="250px"><span class="canedit">��ַ</span></td>
<td width="35px"><span class="canedit">����</span></td>
<td width="35px"><span class="canedit">����</span></td>
<?php //endthead ?>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif"/>
    </td>
    <td class="endtd">
      <div class="infoicon" onClick="setMenuMask()"><b><u>>></u></b></div>
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
  <form id="cform" name="form" method="post" action="index.php?m=mod_b2b&c=EShop&a=ItemDeal" onSubmit="return Check();">
  <table id="tbody"  border="0" cellspacing="0" cellpadding="0">
  
  <?php foreach($vd['items'] as $item) { ?>
  <tr onMouseOver="setoverbg(this)" onMouseOut="setoutbg(this)">
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onClick="CheckThis(this)" onFocus='this.blur()'></input>
    </td>
<?php //tbody ?>
<td width="230px"><img src="<?php echo $vd['root']; ?><?php echo $item['admdir']; ?>/content/mod_b2b/images/mylogo.gif" border="0"/></td>
<td width="100px"><?php echo $item['webname']; ?></td>
<td width="35px"><?php echo $item['id']; ?></td>
<td width="60px"><?php echo $item['aid']; ?></td>
<td width="250px"><nobr><samp title="<?php echo $item['website']; ?>"><span onClick="toInput(this,<?php echo $item['id']; ?>,'website')"><?php echo $item['website']; ?></span></samp></nobr></td>
<td width="35px"><span onClick="setupvip(<?php echo $item['aid']; ?>)" style="cursor:pointer">����</span></td>
<td width="35px"><span onClick="upgradevip(<?php echo $item['aid']; ?>)" style="cursor:pointer">����</span></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=EShop&a=Detail&id=<?php echo $item['id']; ?>" title="�༭��վ" onClick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="���ٷ�վ��¼��,���޷��ָ���,ֻ���������" style="cursor:pointer"/>
    </td>
    <td class="endtd"></td>
  </tr>
  <?php } ?>
  
</table>
</form>
  <p>
  <input type="hidden" value="<?php echo $vd['totlepage']; ?>" id="totlePage"/>
  <input type="hidden" value="<?php echo $vd['thispage']; ?>" id="thisPage"/>
  <?php if($vd['table'] == 0){ ?>
</p>
  <p align="center">�����վ��վ��ע�⣺ �����������ã����վ����ϵ�ٷ��ͷ���361825255</p>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=EShop&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=EShop&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> �ܼ� <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> ��</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=EShop&<?php echo $vd['op']; ?>" style="margin:0px;" onSubmit="loadDisp(1)">
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
tInfoA  = Array(2,58);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "�����������¼��,���޷��ָ���,ֻ���������,��ȷ���������ٲ�����";
thisaction = "����";
thisdel = 0;
statistics = 0;
var resizeidx = 2;
sc = "<?php echo $vd['sc']; ?>";
</script>
<script type="text/javascript">
//��ǰ�������
<?php //tinfo ?>
 tInfo = Array('tb2blogo','twebname','tid','taid','twebsite','tsetup','tupgrade');
<?php //endtinfo ?>

</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>

<script type="text/javascript">
  var taid;
  var issetup = 1;
  function setupvip(aid)
  {
    issetup = 1;
    taid = aid;
    nextstep(1);
  }
  
  function upgradevip(aid)
  {
    issetup = 0;
    taid = aid;
    nextstep(2);
  }
  
  function loadXMLDoc2(url, txt_succ, txt_fail, step)
  {
    xmlhttp = getXMLHander();
    
    if (xmlhttp!=null)
    {
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState==4)
        {
          if (xmlhttp.status==200)
          {
            var ackdata=xmlhttp.responseText;
            
            if(ackdata == 0 || ackdata == "0")
            {
              loadDisp(1);
              setLoad(txt_succ);
              nextstep(step);
            }
            else
            {
              if(txt_fail != "")
              {
                alert(txt_fail);
                setLoad(txt_fail);
              }
              else
              {
                alert(ackdata);
                setLoad(ackdata);
              }
              loadDisp(0);
            }
          }
          else
          {
            setLoad('δ֪���󣬱��β���ʧ�ܣ�');
            alert(ackdata);
            loadDisp(0);
          }
        }
      }
      xmlhttp.open("post", url, true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send('');
    }
    else
    {
      alert("�����������֧��XMLHTTP���޷���ɱ��β���")
    }
  }
  
  function nextstep(step)
  {
    switch(step)
    {
      case 1:
        //unzip
        setLoad('��ʼ��ʼ��...��');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=VipSetup&aid="+taid, '��ɳ�ʼ��', '', 3);
        break;
      case 2:
        //unzip
        setLoad('��鵱ǰ�汾��...��');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=CheckVipVer&aid="+taid, '��ɰ汾���', '', 3);
        break;
      case 3:
        //�������ݿ�
        setLoad('��ʼ���س����...��');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=DownVip&aid="+taid, '��ɳ��������', '���س����ʧ��', 4);
        break;
      case 4:
        //�������ݿ�
        setLoad('��ʼ��װ�����...��');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=UnZipVip&aid="+taid, '��ɳ������װ', '', 5);
        break;
      case 5:
        //deletefile
        setLoad('��ʼɾ�������...��');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=DelUpdateFile", '��װ��ɾ�����..��', '��װ��ɾ��ʧ��..��', 6);
        break;
      default:
        myst = issetup == 1 ? "�û� "+taid+" ��VIPƽ̨��װ��ɣ�" : "�û� "+taid+" ��VIPƽ̨������ɣ�";
        alert(myst);
        tableRefresh();
        loadDisp(0);
        setLoad('ҳ����������Ե�..');
        break;
    }
  }
</script>
</html>
<?php } ?>
