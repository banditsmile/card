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
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <font color="#000">分站列表</font> (共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_bank_index" onFocus="this.blur()" title="查看分站相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onMouseOver="this.className='iconbg4'" onMouseOut="this.className='titleOp4'" onClick="delAllSubmit('destroyitems')"><samp title="先选择您要销毁的行,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量销毁</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onMouseOut="if(editRealtime) return;this.className='titleOp4'" onClick="batchEdit(this)"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">实时修改</div></samp>
  </div>
  <div class="titleOp2" onMouseOver="this.className='iconbg2'" onMouseOut="this.className='titleOp2'" onClick="tableRefresh()" style="margin-right:3px"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:10px;">刷新</div></samp>
  </div>
  <div class="titleOp4" onMouseOver="this.className='iconbg4'" onMouseOut="this.className='titleOp4'" onClick="disp('adddiv')"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">添加</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=EShop" method="post" style="margin:0px 0px 0px 0px;" onSubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="分站搜索 &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:100px;left:230px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">添加分站</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=EShop&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="30%">分站名称</td>
      <td width="70%"><input type="text" name="webname" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">代理编号</td>
      <td width="70%"><input type="text" name="aid" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">分站网址</td>
      <td width="70%"><input type="text" name="website" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">系统子目录</td>
      <td width="70%"><input type="text" name="admdir" size="25" value=""/></td>
    </tr>
    <tr>
      <td width="30%">起始日期</td>
      <td width="70%">
        <input type="text" name="startdate" size="18" value="<?php echo date("Y-m-d H-i-s"); ?>" style="vertical-align:middle;" id="startdate" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
        <img src="<?php echo $vd['sc']; ?>images/calender.gif" onClick="dateDialog('startdate')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
      </td>
    </tr>
    <tr>
      <td width="30%">结束日期</td>
      <td width="70%">
        <input type="text" name="enddate" size="18" value="<?php echo date("Y-m-d H:i:s" , strtotime("+1 years")); ?>" style="vertical-align:middle;"  id="enddate" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
        <img src="<?php echo $vd['sc']; ?>images/calender.gif" onClick="dateDialog('enddate')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
      </td>
    </tr>
    <tr>
      <td width="30%"></td>
      <td width="70%">
        <input type="submit" value="添 加" class="button"/>
        <input type="button" value="取 消" onClick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=EShop" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tb2blogo" id="tb2blogo" class="checkbox" onFocus='this.blur()'/> 批发店标<br/>
  <input type="checkbox" name="id[]" value="twebname" id="twebname" class="checkbox" onFocus='this.blur()'/> 分站名称<br/>
  <input type="checkbox" name="id[]" value="tid" id="tid" class="checkbox" onFocus='this.blur()'/> 编号<br/>
  <input type="checkbox" name="id[]" value="taid" id="taid" class="checkbox" onFocus='this.blur()'/> 用户<br/>
  <input type="checkbox" name="id[]" value="twebsite" id="twebsite" class="checkbox" onFocus='this.blur()'/> 网址<br/>
  <input type="checkbox" name="id[]" value="tsetup" id="tsetup" class="checkbox" onFocus='this.blur()'/> 生成<br/>
  <input type="checkbox" name="id[]" value="tupgrade" id="tupgrade" class="checkbox" onFocus='this.blur()'/> 升级<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="保存" class="button"/>
  <input type="button" value="重置" class="button" onClick="tInfoReset()"/>
  <input type="button" value="取消" class="button" onClick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onClick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="230px">批发店标</td>
<td width="100px">店名</td>
<td width="35px">编号</td>
<td width="60px">店主</td>
<td width="250px"><span class="canedit">网址</span></td>
<td width="35px"><span class="canedit">生成</span></td>
<td width="35px"><span class="canedit">升级</span></td>
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
  <span id="tiptable">此页中所有 <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> 条记录已选中 </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">点此选择当前列表中所有 <b><?php echo $vd['totlerow']; ?></b> 条记录>></a>
  </span>
</div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <table  width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" colspan="20">无任何记录</td>
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
<td width="35px"><span onClick="setupvip(<?php echo $item['aid']; ?>)" style="cursor:pointer">生成</span></td>
<td width="35px"><span onClick="upgradevip(<?php echo $item['aid']; ?>)" style="cursor:pointer">升级</span></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=EShop&a=Detail&id=<?php echo $item['id']; ?>" title="编辑分站" onClick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="销毁分站记录后,是无法恢复的,只能重新添加" style="cursor:pointer"/>
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
  <p align="center">架设分站的站长注意： 请勿自行设置，搭建分站请联系官方客服：361825255</p>
</div>

<input type="hidden" value="index.php?m=mod_b2b&c=EShop&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=EShop&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=EShop&<?php echo $vd['op']; ?>" style="margin:0px;" onSubmit="loadDisp(1)">
    <div id="page"></div>
    <div style="float:left;margin-top:3px">
      每页显示<input type="text" name="nrows" size="2" value="<?php echo $vd['nrows']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" /> 个 
      到第<input type="text" name="page" size="2" value="<?php echo $vd['thispage']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />页<input type="submit" value=" 确 定 &gt;&gt;" class="pagesub" />
    </div>
    </form>
    </div>
  </div>
</div>
<div id="load" style="display:none;">
  <div id="loadcontent" >页面加载中请稍等...</div>
</div>
</body>
<script type="text/javascript">
//第一参数，后边保留显示的列数
//第二参数，除最后一个参数外的保留参数的总宽度
tRows   = <?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?>;
tInfoA  = Array(2,58);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "销毁连锁店记录后,是无法恢复的,只能重新添加,您确定进行销毁操作吗？";
thisaction = "销毁";
thisdel = 0;
statistics = 0;
var resizeidx = 2;
sc = "<?php echo $vd['sc']; ?>";
</script>
<script type="text/javascript">
//当前表格配置
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
            setLoad('未知错误，本次操作失败！');
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
      alert("您的浏览器不支持XMLHTTP，无法完成本次操作")
    }
  }
  
  function nextstep(step)
  {
    switch(step)
    {
      case 1:
        //unzip
        setLoad('开始初始化...！');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=VipSetup&aid="+taid, '完成初始化', '', 3);
        break;
      case 2:
        //unzip
        setLoad('检查当前版本号...！');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=CheckVipVer&aid="+taid, '完成版本检查', '', 3);
        break;
      case 3:
        //更新数据库
        setLoad('开始下载程序包...！');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=DownVip&aid="+taid, '完成程序包下载', '下载程序包失败', 4);
        break;
      case 4:
        //更新数据库
        setLoad('开始安装程序包...！');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=UnZipVip&aid="+taid, '完成程序包安装', '', 5);
        break;
      case 5:
        //deletefile
        setLoad('开始删除程序包...！');
        loadDisp(1);
        loadXMLDoc2("index.php?m=mod_b2b&c=fs&a=DelUpdateFile", '安装包删除完成..！', '安装包删除失败..！', 6);
        break;
      default:
        myst = issetup == 1 ? "用户 "+taid+" 的VIP平台安装完成！" : "用户 "+taid+" 的VIP平台升级完成！";
        alert(myst);
        tableRefresh();
        loadDisp(0);
        setLoad('页面加载中请稍等..');
        break;
    }
  }
</script>
</html>
<?php } ?>
