<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>ģ��۸����</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
<body class="mainbg">
<div class="new_qie">
  <div class="new_qie2">
    <h2>ģ��۸����</h2>
  </div>
  <ul>
    <li><a href="" class="on">ģ��۸����</a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=price&amp;a=AddRankTpl"><span>������۸�ģ��</span></a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=product&amp;a=AgentPrice"><span >��Ʒ�۸�����</span></a></li>
    <li><a href="index.php?m=mod_b2b&amp;c=product&amp;a=PrivatePriceProduct"><span>��Ʒ�۸��ܼ�</span></a></li>
  </ul>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td class="tableleft">
		<form name="bulletin" method="post" action="index.php?m=mod_b2b&c=Price&a=Save">
<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<?php foreach($vd['items'] as $item) { ?>
    <tr>
      <td class="table1_left"><?php echo $item['name']; ?>��</span></td>
      <td width="78%" class="tableright1">
      	<div align="left">
      	  <input name="id[]" type="hidden" value="<?php echo $item['id']; ?>"/>
		  <select name="priceplan_<?php echo $item['id']; ?>"onChange="set(this, <?php echo $item['id']; ?>)">
      	    <option value="1"
      	    <?php if($item['priceplan']==1){ ?>
      	     selected
      	    <?php } ?>
      	    >����һ(�����ۿ�)
      	    </option>
      	    <option value="2"
      	    <?php if($item['priceplan']==2){ ?>
      	     selected
      	    <?php } ?>
      	    >������(ֱ���ۼ�)
      	    </option>
      	    <option value="3"
      	    <?php if($item['priceplan']==3){ ?>
      	     selected
      	    <?php } ?>
      	    >������(��ֵ�ۿ�)
      	    </option>
    	    </select>
      	  �۸� = 
      	  <input name="discout_<?php echo $item['id']; ?>" type="text" size="5" value="<?php echo $item['discout']; ?>" />
      	  <span id="std_<?php echo $item['id']; ?>"><?php echo $item['char']; ?> 
      	    <?php if($item['priceplan']==1){ ?>
      	    x (��ֵ - �ҵĽ�����) + �ҵĽ�����
      	    <?php } ?>
      	    <?php if($item['priceplan']==2){ ?>
      	    + �ҵĽ�����
      	    <?php } ?>
      	     <?php if($item['priceplan']==3){ ?>
      	    x ��ֵ + �ҵĽ�����
      	    <?php } ?>
    	    </span> </div></td>
    </tr>
    <?php } ?>
    <tr>
     <td class="table1_left"> ���˵���� </td>
      <td width="78%" class="tableright1">
      	<div align="left"><br/>
    	  </div>
      	<p align="left"> ����һ(�����ۿ�)����Ӧ����۸� = �ҵĽ����� + (��ֵ - �ҵĽ�����) x ����</p>
        <p align="left">&nbsp;</p>
        <p align="left"> ������(ֱ���ۼ�)����Ӧ����۸� = �ҵĽ����� + ����</p>
        <p align="left">&nbsp;</p>
        <p align="left"> ������(��ֵ�ۿ�)����Ӧ����۸� = �ҵĽ����� + ��ֵ x ����</p>
        <div align="left"><br/>      
        </div></td>
    </tr>
		<tr>
		  <td class="table1_left">&nbsp;</td>
		<td height="30" class="tableright1"><div align="left">
		  <input type="submit" value="ȷ������" class="tijiao_input" name="submit">
		  <input type="reset" value="������д" class="fanhui_input" name="reset">
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
		str = "% x (��ֵ - �ҵĽ�����) + �ҵĽ�����";
	}
  else if(val == "2")
  {
  	str = "<?php echo $vd['lang']['moneyunit']; ?> + �ҵĽ�����";
  }
  else
	{
		str = "% x ��ֵ + �ҵĽ�����";
	}
	
	$("std_"+idx).innerHTML = str;
}
</script>
</body>
</html>