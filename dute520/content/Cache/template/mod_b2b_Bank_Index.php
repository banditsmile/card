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
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <font color="#000">银行汇款账号列表</font> (共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)</div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_bank_index" onFocus="this.blur()" title="查看汇款银行相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="先选择您要删除的行,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量销毁</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">实时修改</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:7px"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:9px;">刷新</div></samp>
  </div>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="disp('adddiv')"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">添加</div></samp>
  </div>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Bank" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    <input type="text" name="keywords" size="25" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <select name="stype" style="vertical-align:middle;font-size:14px;">
      <?php (Option($vd['sarray'], $vd['stype'])); ?>
    </select>
    <input type="submit" value="银行搜索 &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:100px;left:230px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">添加汇款银行</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Bank&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="25%">开户行</td>
      <td width="75%"><input type="text" name="AccountBranch" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">银行卡号</td>
      <td width="75%"><input type="text" name="AccountNO" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">户名</td>
      <td width="75%"><input type="text" name="AccountName" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">开户地</td>
      <td width="75%"><input type="text" name="Address" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">其他说明</td>
      <td width="75%"><input type="text" name="other" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">银行网址</td>
      <td width="75%"><input type="text" name="banksite" size="25"/></td>
    </tr>
    <tr>
      <td width="25%">相关属性</td>
      <td width="75%">
        <input type="checkbox" name="settle" value="1" class="checkbox"/>用于结算 
        <input type="checkbox" name="remit" value="1" class="checkbox"/>用于汇款 
      </td>
    </tr>
    <tr> 
      <td width="25%">银行图标</td>
      <td width="75%">
         <div class="search_s">
           <span class="search_s1">
             <select name="bankicon" class="search_select">
                <option value="bank_gh.gif">工商银行</option>
               <option value="bank_js.gif">建设银行</option>
               <option value="bank_nh.gif">农业银行</option>
               <option value="bank_yz.gif">邮政绿卡</option>
               <option value="bank_zh.gif">招商银行</option>
               <option value="bank_jh.gif">交通银行</option>
               <option value="bank_zg.gif">中国银行</option>
               <option value="bank_gf.gif">广东发展银行</option>
               <option value="bank_pf.gif">上海浦东发展银行</option>
               <option value="bank_sf.gif">深圳发展银行</option>
               <option value="bank_ms.gif">中国民生银行</option>
               <option value="bank_zx.gif">中信银行</option>
               <option value="bank_xy.gif">兴业银行</option>
               <option value="bank_gd.gif">光大银行</option>
               <option value="bank_hx.gif">华夏银行</option>
               <option value="bank_alipay.gif">支付宝</option>
               <option value="bank_tenpay.gif">财付通</option>
               <option value="bank_no.gif">添加后自行编辑</option>
             </select>
           </span>
         </div>
      </td>
    </tr>
    <tr>
      <td width="25%"></td>
      <td width="75%">
        <input type="submit" value="添 加" class="button"/>
        <input type="button" value="取 消" onclick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>
<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=bank" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tbankicon" id="tbankicon" onFocus='this.blur()'/>标志<br/>
  <input type="checkbox" name="id[]" value="branch" id="branch" onFocus='this.blur()'/>开户行<br/>
  <input type="checkbox" name="id[]" value="no" id="no" onFocus='this.blur()'/>银行卡号<br/>
  <input type="checkbox" name="id[]" value="name" id="name" onFocus='this.blur()'/>户名<br/>
  <input type="checkbox" name="id[]" value="addr" id="addr" onFocus='this.blur()'/>开户地<br/>
  <input type="checkbox" name="id[]" value="remarks" id="remarks" onFocus='this.blur()'/>其他说明<br/>
  <input type="checkbox" name="id[]" value="tbanksite" id="tbanksite" onFocus='this.blur()'/>银行网址<br/>
  <input type="checkbox" name="id[]" value="tsettle" id="tsettle" onFocus='this.blur()'/>用于结算<br/>
  <input type="checkbox" name="id[]" value="tremit" id="tremit" onFocus='this.blur()'/>用于汇款<br/>
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
<td width="50px">标志</td>
<td width="100px"><span class="canedit">开户行</span></td>
<td width="180px"><span class="canedit">银行卡号</span></td>
<td width="60px"><span class="canedit">户名</span></td>
<td width="100px"><span class="canedit">开户地</span></td>
<td width="250px"><span class="canedit">其他说明</span></td>
<td width="250px"><span class="canedit">银行网址</span></td>
<td width="22px"><b>结</b></td>
<td width="22px"><b>汇</b></td>
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
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['settle'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'settle')" alt="点击此图片即可修改状态" onFocus="this.blur()" class="mousehand"/></td>
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['remit'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'remit')" alt="点击此图片即可修改状态" onFocus="this.blur()" class="mousehand"/></td>
<?php //endtbody ?>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=Bank&a=Detail&id=<?php echo $item['id']; ?>" title="编辑银行" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="销毁汇款银行记录后,是无法恢复的,只能重新添加" style="cursor:pointer"/>
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
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=Bank&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
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
deltxt  = "销毁汇款银行记录后,是无法恢复的,只能重新添加,您确定进行销毁操作吗？";
thisaction = "销毁";
thisdel = 0;
statistics = 0;
var resizeidx = 6;
</script>
<script type="text/javascript">
//当前表格配置
<?php //tinfo ?>
 tInfo = Array('tbankicon','branch','no','name','addr','remarks','tbanksite','tsettle','tremit');
<?php //endtinfo ?>

</script>
<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>
</html>
<?php } ?>
