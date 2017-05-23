<?php if($vd['table']==0){ ?>
<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
<body>
<?php if($vd['inrecycle']==0){ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;"><a href="index.php?m=mod_b2b&c=Agent" title="点击重新获取用户列表" onclick="loadDisp(1)"><font color="#000">用户列表</font></a></span> (共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right"><a href="javascript:toHelper()" onFocus="this.blur()" title="查看用户相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('delitems')"><samp title="先选择您要删除的行,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量删除</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="batch('agent')"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">批量修改</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">实时修改</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:7px"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:9px;">刷新</div></samp>
  </div>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="loadDisp(1);window.location='?m=mod_b2b&c=agent&inrecycle=1'"><samp title="进入用户回收箱">
    <div style="padding-top:10px;padding-left:3px;">回收箱<span class="fixie8">(</span><?php if($vd['recycle_num']){ ?><span id="recycle"><?php echo $vd['recycle_num']; ?></span><?php }else{ ?><span id="recycle">空</span><?php } ?><span class="fixie8">)</span></div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=agent" method="post" style="margin:0px 0px 0px 0px;" onsubmit="setSearchTxt();return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="用户搜索" class="button" style="vertical-align:middle;" />
    </form>
  </div>
</div>
<?php }else{ ?>
<div class="titleDiv" id="titleList">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Agent" title="点击回到用户列表" onclick="loadDisp(1)"><font color="#000">用户列表</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">回收箱</span>(共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right;"><a href="javascript:toHelper()" onFocus="this.blur()" title="查看用户相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
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
    <form action="index.php?m=mod_b2b&c=agent&inrecycle=1" method="post" style="margin:0px 0px 0px 0px;" onsubmit="setSearchTxt();return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="用户搜索" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<?php } ?>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=tpl&tpl=agent" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="aid" id="aid" onFocus='this.blur()'/>编号<br/>
  <input type="checkbox" name="id[]" value="aname" id="aname" onFocus='this.blur()'/>用户名<br/>
  <input type="checkbox" name="id[]" value="realname" id="realname" onFocus='this.blur()'/>真实姓名<br/>
  <input type="checkbox" name="id[]" value="zone" id="zone" onFocus='this.blur()'/>所属区域<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="bind" id="bind" onFocus='this.blur()'/>绑定设置<br/></span>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="company" id="company" onFocus='this.blur()'/>公司名称<br/></span>
  <input type="checkbox" name="id[]" value="rank" id="rank" onFocus='this.blur()'/>用户级别<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="parent" id="parent" onFocus='this.blur()'/>上级<br/></span>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="child" id="child" onFocus='this.blur()'/>下级<br/></span>
  <input type="checkbox" name="id[]" value="remain" id="remain" onFocus='this.blur()'/>余额<br/>
  <input type="checkbox" name="id[]" value="csmp" id="csmp" onFocus='this.blur()'/>总消费<br/>
  <input type="checkbox" name="id[]" value="trade" id="trade" onFocus='this.blur()'/>账务记录<br/>
  <input type="checkbox" name="id[]" value="frozen" id="frozen" onFocus='this.blur()'/>状态<br/>
  <input type="checkbox" name="id[]" value="addfunds" id="addfunds" onFocus='this.blur()'/>加款<br/>
  <input type="checkbox" name="id[]" value="addloan" id="addloan" onFocus='this.blur()'/>增加欠款<br/>
  <input type="checkbox" name="id[]" value="buyright" id="buyright" onFocus='this.blur()'/>购买权限<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="funds" id="funds" onFocus='this.blur()'/>资金<br/></span>
  <input type="checkbox" name="id[]" value="regdate" id="regdate" onFocus='this.blur()'/>注册时间<br/>
  <input type="checkbox" name="id[]" value="regip" id="regip" onFocus='this.blur()'/>注册IP<br/>
  <input type="checkbox" name="id[]" value="lastdate" id="lastdate" onFocus='this.blur()'/>上次登陆时间<br/>
  <input type="checkbox" name="id[]" value="lastip" id="lastip" onFocus='this.blur()'/>上次登录IP<br/>
  <input type="checkbox" name="id[]" value="remarks" id="remarks" onFocus='this.blur()'/>备注信息<br/>
  <input type="checkbox" name="id[]" value="msg" id="msg" onFocus='this.blur()'/>发送站内信息<br/>
  <input type="checkbox" name="id[]" value="ask" id="ask" onFocus='this.blur()'/>查看用户留言<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="eshop" id="eshop" onFocus='this.blur()'/>网店地址<br/></span>
  <input type="checkbox" name="id[]" value="aqq" id="aqq" onFocus='this.blur()'/>QQ<br/>
  <input type="checkbox" name="id[]" value="amail" id="amail" onFocus='this.blur()'/>邮箱<br/>
  <input type="checkbox" name="id[]" value="atel" id="atel" onFocus='this.blur()'/>电话<br/>
  <input type="checkbox" name="id[]" value="mobile" id="mobile" onFocus='this.blur()'/>手机<br/>
  <input type="checkbox" name="id[]" value="aaddr" id="aaddr" onFocus='this.blur()'/>住址<br/>
  <input type="checkbox" name="id[]" value="zip" id="zip" onFocus='this.blur()'/>邮编<br/>
  <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="income" id="income" onFocus='this.blur()'/>当前代理利润<br/></span>
  </div>
  <div class="menuOp">
  <input type="submit" value="保存" class="button"/>
  <input type="reset" value="重置" class="button" onclick="tInfoReset()"/>
  <input type="button" value="取消" class="button" onclick="setMenuMask()"/>
  </div>
  </form>
</div>

<table id="thead" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">
      <input name="chkall" id="chkall" type="checkbox" class="checkbox" onclick="CheckAll(this)" onFocus='this.blur()'/></td>
<?php //thead ?>
<td width="50px">编号</td>
<td width="80px">用户名</td>
<?php if(UB_B2B){ ?><td width="22px">绑</td><?php } ?>
<td width="80px">用户级别</td>
<?php if(UB_B2B){ ?><td width="40px">上级</td><?php } ?>
<?php if(UB_B2B){ ?><td width="55px">下级</td><?php } ?>
<td width="120px">余额</td>
<td width="22px">账</td>
<td width="35px">开通</td>
<td width="22px">款</td>
<td width="22px">欠</td>
<?php if(UB_B2B){ ?><td width="35px">资金</td><?php } ?>
<td width="140px">注册时间</td>
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
<?php if(UB_B2B){ ?><td width="22px"><a href="index.php?m=mod_b2b&c=Security&a=Bind&aid=<?php echo $item['aid']; ?>&staffid=0" title="绑定设置"><img src="<?php echo $vd['sc']; ?>images/bind.gif"/></a></td><?php } ?>
<td width="80px"><nobr><a href="index.php?m=mod_b2b&c=agent&stype=alv&keywords=<?php echo $item['alv']; ?>" title="查看所有<?php echo $item['rank']; ?>列表"><?php echo $item['rank']; ?></a></nobr></td>
<?php if(UB_B2B){ ?><td width="40px"><a href="index.php?m=mod_b2b&c=agent&parentid=<?php echo $item['parentid']; ?>"><font color="#ff0000"><?php (DisplayCode($item['parentid'])); ?></font></a></td><?php } ?>
<?php if(UB_B2B){ ?><td width="55px"><a href="index.php?m=mod_b2b&c=agent&parentid=<?php echo $item['aid']; ?>"><font color="#0000ff"><?php echo $item['underlingcount']; ?>个</font></a></td><?php } ?>
<td width="120px"><?php echo $item['aremain']; ?></td>
<td width="22px"><a href="index.php?m=mod_b2b&c=Trade&tpl=agent&stype=aid&keywords=<?php echo $item['aid']; ?>&by=1" title="查看<?php echo $item['aid']; ?>账务记录"><img src="<?php echo $vd['sc']; ?>images/check.gif"/></a></td>
<td width="35px"><?php if($item['frozen'] == 1){ ?> <font color="#ff0000">冻结</font> <?php }else{ ?> <font color="#008800">启动</font> <?php } ?>	</td>
<td width="22px"><a href="index.php?m=mod_b2b&c=agent&a=AddFunds&aid=<?php echo $item['aid']; ?>"><img src="<?php echo $vd['sc']; ?>images/money.gif" border="0"/></a></td>
<td width="22px"><a href="index.php?m=mod_b2b&c=Loan&a=Add&aid=<?php echo $item['aid']; ?>">欠</a></td>
<?php if(UB_B2B){ ?><td width="35px"><a href="index.php?m=mod_b2b&c=agent&a=lock&aid=<?php echo $item['aid']; ?>"><font color="#ff0000">管理</font></a></td><?php } ?>
<td width="140px"><?php echo $item['regdate']; ?></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=order&stype=aname&keywords=<?php echo $item['aname']; ?>&aid=-1&by=1" title="查看<?php echo $item['aname']; ?>消费记录" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/rmb.png"/></a>
    </td>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=agent&a=detail&aid=<?php echo $item['aid']; ?>" title="编辑用户" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <?php if($vd['inrecycle']==0){ ?>
      <img src="<?php echo $vd['sc']; ?>images/icon_trash.gif" onclick="delSubmit(<?php echo $item['aid']; ?>,'delitems')" alt="删除用户,可以从回收恢复" style="cursor:pointer"/>
      <?php }else{ ?>
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['aid']; ?>,'destroyitems')" alt="销毁用户,相关信息也会被销毁,无法恢复" style="cursor:pointer"/>
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
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=agent&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
    <div id="page"></div>
    <div style="float:left;margin-top:3px">
      每页显示<input type="text" name="nrows" size="2" value="<?php echo $vd['nrows']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" /> 个 
      到第<input type="text" name="page" size="2" value="<?php echo $vd['thispage']; ?>" class="pagetxt" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />页<input type="submit" value=" 确 定 " class="pagesub" />
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
tInfoA  = Array(3,87);
totleRows = <?php echo $vd['totlerow']; ?>;
<?php if($vd['inrecycle']){ ?>
deltxt  = "如果销毁用户记录么,用户相关信息也会被销毁(包括订单信息，充值信息，留言信息等),且无法恢复,您确定进行销毁操作吗？";
thisaction = "销毁";
<?php }else{ ?>
deltxt  = "您确定进行删除操作吗？删除后您还可以从回收箱进行恢复";//"如果删除用户,用户相关信息也会被删除(包括订单信息，充值信息，留言信息等),您确定进行删除操作吗？";
thisaction = "删除";
<?php } ?>
thisdel = 0;
statistics = 0;
var resizeidx = 2;
var helperVal = 0;
</script>
<script type="text/javascript">
//当前表格配置
<?php //tinfo ?>
 tInfo = Array('aid','aname','bind','rank','parent','child','remain','trade','frozen','addfunds','addloan','funds','regdate');
<?php //endtinfo ?>
</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
</html>
<?php } ?>
