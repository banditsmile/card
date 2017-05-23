<?php if($vd['table']==0){ ?>
<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<body>
<?php if($vd['inrecycle']==0){ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;"><a href="index.php?m=mod_b2b&c=Article&<?php echo $vd['op']; ?>" title="点击重新获取文章列表资料" onclick="loadDisp(1)"><font color="#000">文章列表</font></a></span> (共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_article_index" onFocus="this.blur()" title="查看文章相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('delitems')"><samp title="先选择您要删除的行,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量删除</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">实时修改</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:7px"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:9px;">刷新</div></samp>
  </div>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="loadDisp(1);window.location='?m=mod_b2b&c=Article&inrecycle=1'" style="width:100px"><samp title="进入文章回收箱">
    <div style="padding-top:10px;padding-left:3px;">回收箱<span class="fixie8">(</span><?php if($vd['recycle_num']){ ?><span id="recycle"><?php echo $vd['recycle_num']; ?></span><?php }else{ ?><span id="recycle">空</span><?php } ?><span class="fixie8">)</span></div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Article" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="文章搜索 &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<?php }else{ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Article&a=index" title="文章列表" onclick="loadDisp(1)"><font color="#000">文章列表</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">回收箱</span>(共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_article_index" onFocus="this.blur()" title="查看文章相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="先选择您要销毁的会员记录,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量销毁</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:9px;">刷新</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="delAllSubmit('restore')"><samp title="还原回收箱状态">
    <div style="padding-top:10px;padding-left:9px;font-weight:bold">还原</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Article&inrecycle=1" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="文章搜索 &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<?php } ?>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=tpl&tpl=article" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="title" id="title" class="checkbox" onFocus='this.blur()'/> 主题<br/>
  <input type="checkbox" name="id[]" value="tick" id="tick" class="checkbox" onFocus='this.blur()'/> 点击<br/>
  <input type="checkbox" name="id[]" value="ndate" id="ndate" class="checkbox" onFocus='this.blur()'/> 发表时间<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="保存" class="button"/>
  <input type="button" value="重置" class="button" onclick="tInfoReset()"/>
  <input type="button" value="取消" class="button" onclick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onclick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="300px"><span class="canedit">主题</span></td>
<td width="100px"><b>点击</b></td>
<td width="150px"><b>发表时间</b></td>
<?php //endthead ?>
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
  <form id="cform" name="form" method="post" action="index.php?m=mod_b2b&c=Article&a=ItemDeal" onsubmit="return Check();">
  <table id="tbody"  border="0" cellspacing="0" cellpadding="0">
  
  <?php foreach($vd['items'] as $item) { ?>
  <tr onmouseover="setoverbg(this)" onmouseout="setoutbg(this)">
    <td width="30px">
      <input type="checkbox" name="id[]" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onclick="CheckThis(this)" onFocus='this.blur()' <?php if($item['id'] < 162){ ?>disabled<?php } ?>/>
    </td>
<?php //tbody ?>
<td width="300px"><nobr><samp title="<?php echo $item['title']; ?>"><span onclick="toInput(this,<?php echo $item['id']; ?>,'title')"><?php echo $item['title']; ?></span></samp></nobr></td>
<td width="100px"><?php echo $item['tick']; ?></td>
<td width="150px"><?php echo $item['ndate']; ?></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=Article&a=Detail&id=<?php echo $item['id']; ?>" title="编辑文章" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
    	<?php if($item['id'] > 161){ ?>
      <?php if($vd['inrecycle']==0){ ?>
      <img src="<?php echo $vd['sc']; ?>images/icon_trash.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'delitems')" alt="删除文章,可以从回收恢复" style="cursor:pointer"/>
      <?php }else{ ?>
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="销毁文章,相关信息也会被销毁,无法恢复" style="cursor:pointer"/>
      <?php } ?>
      <?php }else{ ?>
      --
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

<input type="hidden" value="index.php?m=mod_b2b&c=Article&a=Deals&<?php echo $vd['op']; ?>" id="op"/>
<input type="hidden" value="index.php?m=mod_b2b&c=Article&istable=1&<?php echo $vd['op']; ?>" id="url"/>
<input type="hidden" value="<?php echo $vd['op']; ?>" id="params"/>
<div style="position:absolute;bottom:0px">
  <div class="tbBottom" id="tbBottom">
    <div style="float:left;padding-top:8px;">
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=Article&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
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
<?php if($vd['inrecycle']){ ?>
deltxt  = "如果销毁文章记录么,将无法恢复,您确定进行销毁操作吗？";
thisaction = "销毁";
<?php }else{ ?>
deltxt  = "您确定进行删除操作吗？删除后您还可以从回收箱进行恢复";//"如果删除文章,文章相关信息也会被删除(包括订单信息，充值信息，留言信息等),您确定进行删除操作吗？";
thisaction = "删除";
<?php } ?>
sc = "<?php echo $vd['sc']; ?>";
thisdel = 0;
statistics = 0;
var resizeidx = 1;
</script>
<script type="text/javascript">
//当前表格配置
<?php //tinfo ?>
 tInfo = Array('title','tick','ndate');
<?php //endtinfo ?>
</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
</html>
<?php } ?>
