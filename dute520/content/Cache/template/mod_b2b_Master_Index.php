<?php if($vd['table']==0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<body>
<div class="title"> 当前位置：常规管理 &gt; 系统管理员设置</div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Master&a=Create" id="cform">
        <table width="111%" cellpadding="0" cellspacing="1" class="page_table2">
    <tr>
            <td class="td_left"><div align="right">管理员</div></td>
      <td width="75%"><div align="left">
        <input name="adminname" type="text" size="25">
      </div></td>
    </tr>
    <tr>
                  <td class="td_left"><div align="right">密码</div></td>
      <td width="75%"><div align="left">
        <input name="adminpass" type="password" size="25">
      </div></td>
    </tr>
    <tr>
                  <td class="td_left"><div align="right">角色</div></td>
      <td width="75%">
        <div align="left">
          <select size="1" name="adminrank">
            <?php if($vd['issuper']==1){ ?>
            <option value=2>系统管理员</option>
            <?php } ?>
            <option value=3>会员管理员</option>
            <option value=4>订单管理员</option>
            <option value=5>商品管理员</option>
            <option value=6>新闻管理员</option>
          </select>
        </div></td>
    </tr>
    <tr>
      <td class="td_left"><div align="right"></div></td>
      <td width="75%"><input type="submit" name="Submit2" value="添 加" class="tijiao_input" />
      </span></td>
    </tr>
  </table>
<div id="menuMask" class="menuMask" style="display:none"><form action="?m=mod_b2b&c=Tpl&tpl=Sup&v=Sup" method="post" style="margin:0px"><div class="menuContent"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>商品编号<br/>
        <input type="checkbox" name="id[]" value="tordering" id="tordering" class="checkbox" onFocus='this.blur()'/> 
      商品名称<br/>
        <input type="checkbox" name="id[]" value="tpics" id="tpics" class="checkbox" onFocus='this.blur()'/> 
      供货商<br/>
        <input type="checkbox" name="id[]" value="tname" id="tname" class="checkbox" onFocus='this.blur()'/> 
      进货审核<br/>
        <input type="checkbox" name="id[]" value="tabst" id="tabst" class="checkbox" onFocus='this.blur()'/> 
      进货优先级<br/>
        <input type="checkbox" name="id[]" value="tfee" id="tfee" class="checkbox" onFocus='this.blur()'/> 
      进货价<br/>
        <input type="checkbox" name="id[]" value="tcode" id="tcode" class="checkbox" onFocus='this.blur()'/> 
      最低售价<br/>
    </p>
  </div>
  <div class="menuOp">
  <input type="submit" value="保存" class="button" disabled />
  <input type="button" value="重置" class="button" disabled onClick="tInfoReset()"/>
  <input type="button" value="取消" class="button" onClick="setMenuMask()"/>
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
  <span id="tiptable">此页中所有 <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> 条记录已选中 </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">点此选择当前列表中所有 <b><?php echo $vd['totlerow']; ?></b> 条记录>></a></span></div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <tr>
    <td align="right" colspan="20">无任何记录</td>
  </tr>
  </table>
  <?php } ?>
        <table cellspacing="1" cellpadding="0" class="page_table">
  <tr>
        <td width="10%" class="table_top"><input name="chkall" id="chkall" type="checkbox" class="checkbox" onClick="CheckAll(this)" onFocus='this.blur()' disabled /></td>
<?php //thead ?>
        <td width="10%" class="table_top">编号</td>
        <td width="10%" class="table_top">管理员</td>
        <td width="10%" class="table_top">密码</td>
        <td width="10%" class="table_top">角色</td>
        <td width="10%" class="table_top">修改</td>
        <td width="10%" class="table_top">权限</td>
        <td width="10%" class="table_top">绑定</td>
        <td width="10%" class="table_top">删除</td>
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
        <option value="1">超级管理员</option>
      </select>
      <?php }else if($item['adminRank']==2){ ?>
      <select size="1" name="adminrank" id="adminrank_<?php echo $item['id']; ?>">
        <option value="2">系统管理员</option>
        <?php if($vd['issuper']==1){ ?>
        <option value=3 <?php if($item['adminRank'] == '3'){ ?> selected <?php } ?>>会员管理员</option>
        <option value=4 <?php if($item['adminRank'] == '4'){ ?> selected <?php } ?>>订单管理员</option>
        <option value=5 <?php if($item['adminRank'] == '5'){ ?> selected <?php } ?>>商品管理员</option>
        <option value=6 <?php if($item['adminRank'] == '6'){ ?> selected <?php } ?>>新闻管理员</option>
        <?php } ?>
      </select>
      <?php }else{ ?>
      <select size="1" name="adminrank" id="adminrank_<?php echo $item['id']; ?>">
        <?php if($vd['issuper']==1){ ?>
        <option value=2>系统管理员</option>
        <?php } ?>
        <option value=3 <?php if($item['adminRank'] == '3'){ ?> selected <?php } ?>>会员管理员</option>
        <option value=4 <?php if($item['adminRank'] == '4'){ ?> selected <?php } ?>>订单管理员</option>
        <option value=5 <?php if($item['adminRank'] == '5'){ ?> selected <?php } ?>>商品管理员</option>
        <option value=6 <?php if($item['adminRank'] == '6'){ ?> selected <?php } ?>>新闻管理员</option>
      </select>
      <?php } ?>
    </td>
    <td width="80px">  <a href="#art1" class="a edit" onClick="tofake('<?php echo $item['id']; ?>')">

    <td width="60px">
      <?php if($item['adminRank'] > 1){ ?>
      <a href="index.php?m=mod_b2b&c=Master&a=Rights&adminname=<?php echo $item['adminName']; ?>"> 设置</a> 
      <?php }else{ ?>
      --
      <?php } ?>    </td>
    <td width="60px">
      <a href="index.php?m=mod_b2b&c=Master&a=Bind&adminname=<?php echo $item['adminName']; ?>"> 绑定</a>    </td>
    <td width="60px">
      <?php if($item['adminRank'] > 1){ ?>
      <a class="a delete" href="index.php?m=mod_b2b&c=Master&a=Del&id=<?php echo $item['id']; ?>" onClick="return confirm('您确定要删除此管理员吗？')"><font color=red></font></a> 
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
      <strong> 总计 <font color="#ff0000"><span id="tol2"><?php echo $vd['totlerow']; ?></span></font> 条</strong>
    </div>
    <div style="float:right;text-align:right;">
    <form id="actionform" method="post" action="index.php?m=mod_b2b&c=master&a=index&<?php echo $vd['op']; ?>" style="margin:0px;" onSubmit="loadDisp(1)">
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
tInfoA  = Array(0,0);
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
