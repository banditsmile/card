<?php if($vd['table']==0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
<body>
<?php $isb2c=intval(request('b2c')) ?>
<div class="titleDiv" id="titleList">

<div id="contentTip" style="display:none;"></div>
<div id="adddiv" style="position:absolute;top:60px;left:50px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">给<font color="#ff0000"><?php if($isb2c==0){ ?>批发平台<?php }else{ ?><?php echo $vd['tagname']; ?>平台<?php } ?></font>添加用户级别</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddiv')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="35%">级别名称</td>
      <td width="65%"><input type="text" name="name" size="16"/></td>
    </tr>
    <tr>
      <td width="35%">升级消费额</td>
      <td width="65%"><input type="text" name="money" size="16"/></td>
    </tr>
    <tr<?php if(!UB_B2B){ ?> style="display:none"<?php } ?>>
      <td width="35%">组别</td>
      <td width="65%">
        <select name="gid">
        <?php (Option($vd['group'], 0, 'gname', 'gid')); ?>
        </select>
      </td>
    </tr>
    <tr>
      <td width="35%">默认注册级别</td>
      <td width="65%"><input type="checkbox"  name="isdefault" value="1" class="checkbox" onFocus="this.blur()"/></td>
    </tr>
    <tr>
      <td width="35%"></td>
      <td width="65%">
        <input type="hidden" name="discount" size="10" value="0.05"/>
        <input type="submit" name="Submit" value="添 加" class="button">
        <input type="button" name="Submit" value="取 消" onClick="disp('adddiv')" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="adddivguize" style="position:absolute;top:60px;left:50px;;width:320px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">级别规则[<a href="?m=mod_b2b&c=Sys&a=Config#guize">点击设置规则</a>]</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onClick="disp('adddivguize')" style="cursor:pointer"/></div>
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="font-size:12px">
      	规范型：<br/>
      	同一个组别的经销商不能互为上下级，比如一级经销商和二级经销商同属于经销商组别，则他们不能互为上下级<br/><br/>
      	松散型：<br/>
      	同一个组别的经销商也可以为上下级，规则是只要这个级别的升级消费金额足够大，他就可以接收比他小的级别，直销商除外(也就是说直销商不能收下级)<br/>
      	
      </td>
    </tr>
  </table>
  </form>
  </div>
</div>

<div id="menuMask" class="menuMask" style="display:none">
  <form action="?m=mod_b2b&c=Tpl&tpl=Sup&v=Sup" method="post" style="margin:0px">
  <div class="menuContent">
  <input type="checkbox" name="id[]" value="tordering" id="tordering"/> 商品名称<br/>
  <input type="checkbox" name="id[]" value="tpics" id="tpics"/> 供货商<br/>
  <input type="checkbox" name="id[]" value="tname" id="tname"/> 进货审核<br/>
  <input type="checkbox" name="id[]" value="tabst" id="tabst"/> 进货优先级<br/>
  <input type="checkbox" name="id[]" value="tfee" id="tfee"/> 进货价<br/>
  <input type="checkbox" name="id[]" value="tcode" id="tcode"/> 最低售价<br/>
  </div>
  <div class="menuOp">
  <input type="submit" value="保存" class="button" disabled />
  <input type="button" value="重置" class="button" disabled onClick="tInfoReset()"/>
  <input type="button" value="取消" class="button" onClick="setMenuMask()"/>
  </div>
  </form>
</div>

    <div id="tip" style="display:none">
  <span id="tiptable">此页中所有 <b><span id="ncheck"><?php echo $vd['nrows'] < $vd['totlerow'] ? $vd['nrows'] : $vd['totlerow'] ?></span></b> 条记录已选中 </span> 
  <span id="tipspan">
    <a href="javascript:CheckTotle(<?php echo $vd['totlerow']; ?>,0)">点此选择当前列表中所有 <b><?php echo $vd['totlerow']; ?></b> 条记录>></a>
  </span>
</div>
    <div class="title"> 当前位置：客户管理 &gt; 客户级别设置</div>
<div class="gn">
  <input name="button" type="button" class="tijiao_input" id="add" onclick="disp('adddiv')" value="添 加"/>
  <input name="button2" type="button" class="tijiao_input" id="button" onclick="tableRefresh()" value="刷 新"/>
  <input name="button3" type="button" class="tijiao_input" id="button2" onclick="disp('adddivguize')" value="规 则"/>
  <a href="#" class="tishi1" onClick="batchEdit(this)">实时修改请单击这里,当字体背景消失后即可修改</a></div>
    <div class="tishi1"> 1、平台启用前请先定义好级别，日后最好不要再添加新的级别，如果需要增加新级别只能是比原有级别更低的级别；<br />
      2、每个体系的级别建立请按高级--&gt;低级的顺序添加，将最低级设置为注册后默认级别，比如经销体系中从一般经销商-&gt;高级经销商-&gt;区域总经销商；直销体系从一般直销商-&gt;高级直销商-&gt;优秀直销商；<br />
      3、系统级别越多，定价工作越复杂，会增加你的日后工作量，所以级别适当适量即可；<br />
      4、如果在商品已有定价后再添加的级别，必须为每个商品重新定价，输入新添加级别的销售价格；<br />
      5、强烈建议大家将每个体系的级别控制在2-4个，如果相应体系中需要多级别管理，尤其是经销商这块，可以使用模板定价或密价的方式来拉开价格差；<br />
      6、经销体系创建后不可删除。 </div>
<div id="content">
<?php } ?>
  <?php if($vd['totlerow'] == 0) { ?>
  <?php } ?>
    <form name="form1" method="post" action="index.php?m=mod_b2b&c=Rank&a=Save" id="cform">
  <table cellspacing="1" cellpadding="0" class="page_table">
    <tr>
      <td  width="6%" class="table_top"> 级别排序 </td>
      <td  width="54%" class="table_top"> 级别名称</td>
      <td  width="19%" class="table_top"> 消费额</td>
	  <td  width="7%" class="table_top"> 级别类型</td>
      <td  width="7%" class="table_top"> 默认级别 </td>
      <td  width="7%" class="table_top"> 删除 </td>
    </tr>
      <?php $isb2c=intval(request('b2c')) ?>
      <?php foreach($vd['items'] as $item) { ?>
      <?php if(($isb2c==1 && $item['gid']==0) || ($isb2c==0 && $item['gid'] > 0)){ ?>
      <?php //tbody ?>
      <?php if($vd['isselect'] == 1){ ?>
      <?php } ?>
	      <tr onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='';">
    <?php //tbody ?>
    <?php if($vd['isselect'] == 1){ ?>
	    <?php } ?>
      <td type="checkbox" name="id[]2" id="idchk_<?php echo $item['id']; ?>" class="checkbox" value="<?php echo $item['id']; ?>" onclick="CheckThis(this)" onfocus='this.blur()'  disabled="disabled"><?php echo $item['id']; ?></td>
      <td><span onclick="toInput(this,<?php echo $item['id']; ?>,'name')"><?php echo $item['name']; ?></span></td>
      <td><span onclick="toInput(this,<?php echo $item['id']; ?>,'money')"><?php echo $item['money']; ?></span></td>
      <?php if(UB_B2B){ ?>
        <td width="67px"><select name="select2" onchange="toSelect(this, <?php echo $item['id']; ?>, 'gid')">
          

        <?php (Option($vd['group'], $item['gid'], 'gname', 'gid')); ?>

      
        </select>
      </td>
      <?php } ?>
      <td><img src="<?php echo $vd['sc']; ?><?php (ToggleImgSrc($item['isdefault'])); ?>" onclick="toToggle(this,<?php echo $item['id']; ?>,'isdefault')" alt="点击此图片即可修改状态" onfocus="this.blur()" class="mousehand"/></td>
      <td><a href="#"  class="a delete" onclick="delSubmit(<?php echo $item['id']; ?>,'delitems')"></a>     </td>

    <?php //endtbody ?>
  </tr>

  <?php }} ?>

  

</table>

  <div id="content">
    <input name="hidden" type="hidden" id="totlePage" value="<?php echo $vd['totlepage']; ?>"/>
    <input name="hidden" type="hidden" id="thisPage" value="<?php echo $vd['thispage']; ?>"/>
    <?php if($vd['table']==0){ ?>
  </div>
  <input name="hidden" type="hidden" id="op" value="index.php?m=mod_b2b&amp;c=rank&amp;a=Deals&amp;b2c=<?php echo $isb2c; ?>&amp;<?php echo $vd['op']; ?>"/>
  <input name="hidden" type="hidden" id="url" value="index.php?m=mod_b2b&amp;c=rank&amp;a=index&amp;b2c=<?php echo $isb2c; ?>&amp;istable=1&amp;<?php echo $vd['op']; ?>"/>
  <input name="hidden" type="hidden" id="params" value="<?php echo $vd['op']; ?>"/>
  <div style="position:absolute;bottom:0px">
    <div class="tbBottom" id="tbBottom">
    <div style="float:right;text-align:right;">
<form id="actionform" method="post" action="index.php?m=mod_b2b&amp;c=rank&amp;a=index&amp;b2c=<?php echo $isb2c; ?>&amp;<?php echo $vd['op']; ?>" style="margin:0px;" onsubmit="loadDisp(1)">
          <div id="page"></div>
  </form>
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

deltxt  = "如果删除了这个级别，级别对应的价格也会删除，对应级别的用户会下降一级，您确定进行删除操作吗？";

thisaction = "删除";

thisdel = 0;

statistics = 0;

var resizeidx = 2;

var helperVal = 1;

</script>

<script type="text/javascript">

//当前表格配置

<?php //tinfo ?>
 tInfo = Array();
<?php //endtinfo ?>

</script>

<script src="<?php echo $vd['sc']; ?>js/tools.js" type="text/javascript"></script>

<script type="text/javascript">

function setct(val)

{

  $("cttr").style.display = val == 3 ? "" : "none";

}



function loadst()

{

  if(!confirm('获取供货商的调价商品并按照下边模板调价？'))

  {

    return;

  }

  

  setLoad("正在调价中,请稍后...");

  loadDisp(1);

  

  window.location.href = "index.php?m=mod_b2b&c=Price&a=PriceSaveBySup";

  

}

</script>

</html>

<?php } ?>