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
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <font color="#000"><?php if(intval(request('custom')) ==1){ ?>自有<?php } ?>分类列表</font> (共 <b><span id="tol1"><?php echo $vd['totlerow']; ?></span></b> 个)<?php if(isset($vd['parent']['name']) && $vd['parent']['name'] != ''){ ?> <span style="font-size:7px;">>></span> <font color="#000000"><b><?php echo $vd['parent']['name']; ?></b></font><?php } ?>
  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p style="display:none">
    <?php if(intval(request('custom')) ==1){ ?>
    拥有自有商品添加权限的用户所添加的分类
    <?php }else{ ?>
    分类用途:<br/>
    分类的特点就是短小，一般是直接写成游戏对应的名称，主要用于购卡导航部分，点卡类的分类比较特殊，很多分类都是多个游戏的组合，添加的时候，可以考虑使用游戏的缩写而不是全称，能让买家一眼就看出什么类型即可<br/>
    <br/>自动排序:<br/>
    规则：按照目录的字符长度进行排序，字符少的排在前面<br/>
    如果在一级目录下点自动排序，则对所有二级以上的目录进行排序，如果在某个目录下，则对其子目录进行排序
    <?php } ?>
  </p>
</div>
<div id="contentTip" style="display:none;"></div>
<div style="float:right"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_Category_index" onFocus="this.blur()" title="查看分类相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div class="mytitle" id="mytitle">
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="delAllSubmit('destroyitems')"><samp title="先选择您要销毁的行,再点此按钮">
    <div style="padding-top:10px;padding-left:9px;">批量销毁</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="batchEdit(this)"><samp title="批量修改所选项的记录">
    <div style="padding-top:10px;padding-left:10px;">实时修改</div></samp>
  </div>
  <div class="titleOp4"  onmouseover="if(editRealtime) return;this.className='iconbg4'" onmouseout="if(editRealtime) return;this.className='titleOp4'" onclick="loadDisp(1);window.location='?m=mod_b2b&c=Category&a=Ordering&parentid=<?php echo $vd['parentid']; ?>'"><samp title="按字符长度进行排序(一级目录除外)">
    <div style="padding-top:10px;padding-left:10px;">自动排序</div></samp>
  </div>
  <div class="titleOp2" onmouseover="this.className='iconbg2'" onmouseout="this.className='titleOp2'" onclick="tableRefresh()" style="margin-right:3px"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div style="padding-top:10px;padding-left:10px;">刷新</div></samp>
  </div>
  <?php if(intval(request('custom')) == 0){ ?>
  <div class="titleOp4" onmouseover="this.className='iconbg4'" onmouseout="this.className='titleOp4'" onclick="disp('adddiv')"><samp title="点击刷新本页刷新数据,并保持原来勾选状态">
    <div class="addicon" style="padding-top:10px;padding-left:26px;">添加</div></samp>
  </div>
  <?php } ?>
  <div style="float:right;padding-top:4px;">
    <form action="index.php?m=mod_b2b&c=Category&custom=<?php echo intval(request('custom')); ?>" method="post" style="margin:0px 0px 0px 0px;" onsubmit="return searchSubmit()">
    上级分类列表：
    <select name="cat" onchange="javascript:location.href='index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $vd['grandfatherid']; ?>&custom=<?php echo intval(request('custom')); ?>&parentid=' + this.options[this.selectedIndex].value;" style="vertical-align:middle;font-size:14px;width:200px;">
    <option value="">选择您要进入上级分类</option>
    <?php (option($vd['cat'], $vd['parentid'], 'name', 'id')); ?>
    </select>
    <input type="text" name="keywords" size="15" value="<?php echo $vd['keywords']; ?>" style="vertical-align:middle;" class="custsearch" onMouseOver="iEvent('mouseover',this)" onFocus="iEvent('focus',this)" onBlur="iEvent('blur',this)" onMouseOut="iEvent('mouseout',this)" />
    <input type="hidden" name="stype" value="name"/>
    <input type="submit" value="搜索 &gt;&gt;" style="vertical-align:middle;" class="button"/>
    </form>
  </div>
</div>
<div id="adddiv" style="position:absolute;top:50px;left:230px;;width:380px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">添加<?php if(isset($vd['parent']['name']) && $vd['parent']['name'] == '支付类'){ ?>兑换卡类<?php }else{ ?>分类<?php } ?></div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Category&a=Save" id="tform" style="clear:both">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <?php if(!isset($vd['parent']['name']) || $vd['parent']['name'] != '支付类'){ ?>
    <tr>
      <td width="35%">分类名称</td>
      <td width="65%"><input type="text" name="name" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">分类颜色</td>
      <td width="65%">
        <div style="float:left"><input type="text" name="color" id="textcolor0" size="25" value="#000000"/></div>
        <div onclick="pickcolor(0)" id="colorexample0" style="float:left;cursor:pointer;height:22px;margin-left:5px;margin-top:1px;width:16px;border:0px #fff solid;background:#000000"/></div>
      </td>
    </tr>
    <tr>
      <td width="35%">排列序号</td>
      <td width="65%"><input type="text" name="ordering" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">首字母</td>
      <td width="65%"><input type="text" name="pinyin" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">是否热门</td>
      <td width="65%"><input type="checkbox" name="hot" size="25" value="1" class="checkbox"/></td>
    </tr>
    <tr<?php if(UB_B2B+UB_B2C+UB_YKT==1){ ?> style="display:none"<?php } ?>>
      <td width="35%">分类可见</td>
      <td width="65%">
        <span<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2b" value="1" class="checkbox"<?php if(UB_B2B){ ?> checked<?php } ?>/>批发</span>
        <span<?php if(!UB_B2C){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forb2c" value="1" class="checkbox"<?php if(UB_B2C){ ?> checked<?php } ?>/>零售</span>
        <span<?php if(!UB_YKT){ ?> style="display:none"<?php } ?>><input type="checkbox" name="forykt" value="1" class="checkbox"<?php if(UB_YKT){ ?> checked<?php } ?>/>一卡通</span>
      </td>
    </tr>
    <tr<?php if(!UB_B2B||intval(request('custom')) == 1){ ?> style="display:none"<?php } ?>>
      <td width="35%">共享给自有商品</td>
      <td width="65%">
      <input type="checkbox" name="shared" value="1" class="checkbox"/>共享
      </td>
    </tr>
    <tr>
      <td width="35%">分类简介</td>
      <td width="65%">
      <input type="text" name="abst" size="25" value=""/></td>
    </tr>
    <?php }else{ ?>
    <tr>
      <td width="35%">卡类名称</td>
      <td width="65%"><input type="hidden" name="coupon" value="1"/><input type="text" name="name" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">费率</td>
      <td width="65%"><input type="text" name="fee" size="25"/></td>
    </tr>
    <tr>
      <td width="35%">编码</td>
      <td width="65%"><input type="text" name="fee" size="25"/></td>
    </tr>
    <tr> 
      <td width="35%">对应图标</td>
      <td width="65%">
         <div class="search_s">
           <span class="search_s1">
             <select name="pics" class="search_select">
                <option value="icon_wm.gif">完美一卡通</option>
               <option value="icon_jnet.gif">骏网一卡通</option>
               <option value="icon_no.gif">添加后自行编辑</option>
             </select>
           </span>
         </div>
      </td>
    </tr>
    <tr>
      <td width="35%">是否可用</td>
      <td width="65%">
      <input type="hidden" name="forb2b" value="0"/>
      <input type="hidden" name="forb2c" value="0"/>
      <input type="hidden" name="forykt" value="0"/>
      <input type="checkbox" name="fork2k" value="1" class="checkbox" checked />换卡站
      </td>
    </tr>
    <tr>
      <td width="35%">相关说明：</td>
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
        <input type="submit" value="添 加" class="button"/>
        <input type="button" value="取 消" onclick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=category" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tid" id="tid" onFocus='this.blur()'/> 编号<br/>
  <input type="checkbox" name="id[]" value="tordering" id="tordering" onFocus='this.blur()'/> 排序<br/>
  <input type="checkbox" name="id[]" value="tcolor" id="tcolor" onFocus='this.blur()'/> 颜色<br/>
  <input type="checkbox" name="id[]" value="tname" id="tname" onFocus='this.blur()'/> 分类名称<br/>
  <span<?php if(intval(request('custom'))==0){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="taid" id="taid" onFocus='this.blur()'/> 所属<br/></span>
  <input type="checkbox" name="id[]" value="tcatid" id="tcatid" onFocus='this.blur()'/> 商品<br/>
  <input type="checkbox" name="id[]" value="tpinyin" id="tpinyin" onFocus='this.blur()'/> 首字母<br/>
  <input type="checkbox" name="id[]" value="tabst" id="tabst" onFocus='this.blur()'/> 分类简介<br/>
  <input type="checkbox" name="id[]" value="thot" id="thot" onFocus='this.blur()'/> 是否热门<br/>
  <span<?php if(intval(request('custom'))==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tshared" id="tshared" onFocus='this.blur()'/> 是否共享<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforb2b" id="tforb2b" onFocus='this.blur()'/> 批发可见<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforb2c" id="tforb2c" onFocus='this.blur()'/> 零售可见<br/></span>
  <span<?php if(!UB_B2B||UB_B2B+UB_YKT+UB_B2C==1){ ?> style="display:none"<?php } ?>><input type="checkbox" name="id[]" value="tforykt" id="tforykt" onFocus='this.blur()'/> 一卡通可见<br/></span>
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
<td width="35px"><b>编号</b></td>
<td width="35px"><span class="canedit">排序</span></td>
<td width="30px"><img src="<?php echo $vd['sc']; ?>images/16.gif" align="absmiddle"/></td>
<td width="150px"><span class="canedit">分类名称</span></td>
<?php if(intval(request('custom'))==1){ ?><td width="50px"><b>所属</b></td><?php } ?>
<td width="35px"><b>商品</b></td>
<td width="50px"><span class="canedit">首字母</span></td>
<td width="22px"><span class="canedit">热</span></td>
<?php if(intval(request('custom'))==0){ ?><td width="22px"><span class="canedit">享</span></td><?php } ?>
<?php if(UB_B2B&&UB_B2C+UB_YKT+UB_B2B>1){ ?><td width="22px"><span class="canedit">批</span></td><?php } ?>
<?php //endthead ?>
    <td width="30px">
      <b>父类</b>
    </td>
    <td width="30px">
      <b>子类</b>
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
<td width="35px"><?php if($item['parentid']==0){ ?>--<?php }else{ ?><a href="index.php?m=mod_b2b&c=product&catid=<?php echo $item['id']; ?>&aid=-1&ptype=-1">列表</a><?php } ?></td>
<td width="50px"><nobr><span onclick="toInput(this,<?php echo $item['id']; ?>,'pinyin')"><?php echo $item['pinyin']==''?'---' : $item['pinyin']; ?></span></nobr></td>
<td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['hot'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'hot')" alt="点击此图片即可修改状态" onFocus="this.blur()" class="mousehand"/></td>
<?php if(intval(request('custom'))==0){ ?><td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['shared'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'shared')" alt="点击此图片即可修改状态" onFocus="this.blur()" class="mousehand"/></td><?php } ?>
<?php if(UB_B2B&&UB_B2C+UB_YKT+UB_B2B>1){ ?><td width="22px"><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['forb2b'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'forb2b')" alt="点击此图片即可修改状态" onFocus="this.blur()" class="mousehand"/></td><?php } ?>
<?php //endtbody ?>
    <td width="30px">
    	<?php if($item['parentid']==0){ ?>--<?php }else{ ?>
      <a href="index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $item['parentid']; ?>&aid=<?php echo $item['aid']; ?>&parentid=<?php echo $vd['grandfatherid']; ?>&custom=<?php echo intval(request('custom')); ?>">
      父类
      </a>
      <?php } ?>
    </td>
    <td width="30px">
      <a href="index.php?m=mod_b2b&c=category&grandfatherid=<?php echo $item['parentid']; ?>&aid=<?php echo $item['aid']; ?>&parentid=<?php echo $item['id']; ?>&custom=<?php echo intval(request('custom')); ?>">
      子类
      </a>
    </td>
    <td width="22px">
      <a href="index.php?m=mod_b2b&c=Category&a=Detail&id=<?php echo $item['id']; ?>" title="编辑分类" onclick="loadDisp(1)"><img src="<?php echo $vd['sc']; ?>images/icon_edit.gif"/></a>
    </td>
    <td width="22px">
      <img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="delSubmit(<?php echo $item['id']; ?>,'destroyitems')" alt="销毁分类记录后,是无法恢复的,只能重新添加" style="cursor:pointer"/>
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
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=Category&<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
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
tInfoA  = Array(4,132);
totleRows = <?php echo $vd['totlerow']; ?>;
deltxt  = "销毁分类后,是无法恢复的,只能重新添加,您确定进行销毁操作吗？";
thisaction = "销毁";
thisdel = 0;
statistics = 0;
var resizeidx = 4;
</script>
<script type="text/javascript">
//当前表格配置
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
