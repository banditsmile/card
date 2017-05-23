<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>模板价格管理</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
<body class="mainbg">
<div class="new_qie">
  <div class="new_qie2">
    <h2>模板价格管理</h2>
  </div>
  <ul>
    <li><a href="" class="on">模板价格管理</a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=price&amp;a=AddRankTpl"><span>单级别价格模板</span></a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=product&amp;a=AgentPrice"><span >商品价格设置</span></a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=product&amp;a=PrivatePriceProduct"><span>商品价格密价</span></a></li>
  </ul>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td class="tableleft">
		<form name="bulletin" method="post" action="index.php?m=mod_b2b&c=Price&a=Save">
<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<?php foreach($vd['items'] as $item) { ?>
    <tr>
      <td class="table1_left"><?php echo $item['name']; ?>：</span></td>
      <td width="78%" class="tableright1">
      	<div align="left">
      	  <input name="id[]" type="hidden" value="<?php echo $item['id']; ?>"/>
		  <select name="priceplan_<?php echo $item['id']; ?>"onChange="set(this, <?php echo $item['id']; ?>)">
      	    <option value="1"
      	    <?php if($item['priceplan']==1){ ?>
      	     selected
      	    <?php } ?>
      	    >方案一(利润折扣)
      	    </option>
      	    <option value="2"
      	    <?php if($item['priceplan']==2){ ?>
      	     selected
      	    <?php } ?>
      	    >方案二(直接累加)
      	    </option>
      	    <option value="3"
      	    <?php if($item['priceplan']==3){ ?>
      	     selected
      	    <?php } ?>
      	    >方案三(面值折扣)
      	    </option>
    	    </select>
      	  价格 = 
      	  <input name="discout_<?php echo $item['id']; ?>" type="text" size="5" value="<?php echo $item['discout']; ?>" />
      	  <span id="std_<?php echo $item['id']; ?>"><?php echo $item['char']; ?> 
      	    <?php if($item['priceplan']==1){ ?>
      	    x (面值 - 我的进货价) + 我的进货价
      	    <?php } ?>
      	    <?php if($item['priceplan']==2){ ?>
      	    + 我的进货价
      	    <?php } ?>
      	     <?php if($item['priceplan']==3){ ?>
      	    x 面值 + 我的进货价
      	    <?php } ?>
    	    </span> </div></td>
    </tr>
    <?php } ?>
    <tr>
     <td class="table1_left"> 相关说明： </td>
      <td width="78%" class="tableright1">
      	<div align="left"><br/>
    	  </div>
      	<p align="left"> 方案一(利润折扣)：对应级别价格 = 我的进货价 + (面值 - 我的进货价) x 比例</p>
        <p align="left">&nbsp;</p>
        <p align="left"> 方案二(直接累加)：对应级别价格 = 我的进货价 + 比例</p>
        <p align="left">&nbsp;</p>
        <p align="left"> 方案三(面值折扣)：对应级别价格 = 我的进货价 + 面值 x 比例</p>
        <div align="left"><br/>      
        </div></td>
    </tr>
		<tr>
		  <td class="table1_left">&nbsp;</td>
		<td height="30" class="tableright1"><div align="left">
		  <input type="submit" value="确认设置" class="tijiao_input" name="submit">
		  <input type="reset" value="重新填写" class="fanhui_input" name="reset">
		  </div></td>
		</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<script type="text/JavaScript">
var $ = function(id){
	return document.getElementById(id);
}

function set(obj, idx)
{
	val = obj.options[obj.selectedIndex].value;
	str = "";
	if(val == "1")
	{
		str = "% x (面值 - 我的进货价) + 我的进货价";
	}
  else if(val == "2")
  {
  	str = "<?php echo $vd['lang']['moneyunit']; ?> + 我的进货价";
  }
  else
	{
		str = "% x 面值 + 我的进货价";
	}
	
	$("std_"+idx).innerHTML = str;
}
</script>
</body>
</html>
