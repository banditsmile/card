<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>进货记录查询</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />

<body class="mainbg">

<div class="new_qie">

  <div class="new_qie2">

    <h2> 进货记录查询</h2>

  </div>

  <ul>

    <li><a href="index.php?m=mod_agent&c=VOrder&ordstate=2">销售记录查询</a></li>

    <li><a href="" class="on">进货记录查询</a></li>

    <li><a href="index.php?m=mod_agent&c=trade&tpl=history">账户资金明细</a></li>

  </ul>

</div>

<?php $ptype=request('ptype');$ordstate=request('ordstate'); ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft">

		<form name="history" method="get" action="index.php" id="advsearch">

<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<?php $vhistory=$vd['ishistory']==1?0:1;if($vd['hashistory'] == 1){ ?>

  	<tr>

      <td class="table1_left">查询类别：</td>

      <td width="78%" class="tableright1">

      	<div align="left">

      	  <input type="hidden" name="ishistory" value="<?php echo $vd['ishistory']; ?>" />

      	  <a href="index.php?m=mod_agent&c=order&ishistory=<?php echo $vhistory; ?>"><font color="#ff0000"><u>

      	    <?php if($vd['ishistory']==0){ ?>

      	    历史数据查询

      	    <?php }else{ ?>

      	    回到当前数据查询

      	    <?php } ?>

    	    </u></font></a> </div></td>
    </tr>

    <?php } ?>

		<tr>

		 <td class="table1_left">商品类型：</td>
		  <td width="78%" class="tableright1">

			<div align="left">

			  <select name="ptype">

			    <option value="">全部类型</option>

			    <option value="km" 

			    <?php if($ptype=='km'){ ?>

			    selected

			    <?php } ?>

			    >虚拟卡密

			    </option>

			    <option value="cz" 

			    <?php if($ptype=='cz'){ ?>

			    selected

			    <?php } ?>

			    >充值商品

			    </option>
	            </select>
            </div></td>
		</tr>

		<tr>

		  <td class="table1_left">订单状态：</td>
		  <td class="tableright1">

			<div align="left">

			  <select name="ordstate">

			    <option value="">所有</option>

	              <option value="2" 

			    <?php if($ordstate==2){ ?>

			    selected

			    <?php } ?>

			    >成功订单

			    </option>

	              <option value="-1" 

			    <?php if($ordstate==-1){ ?>

			    selected

			    <?php } ?>

			    >失败订单

			    </option>

	              <option value="1" 

			    <?php if($ordstate==1){ ?>

			    selected

			    <?php } ?>

			    >处理中订单

			    </option>
	            </select>
            </div></td>
		</tr>

		<tr>

		  <td class="table1_left">选择员工：</td>
		  <td class="tableright1">

			<div align="left">

			  <select name="staffname">

		          <?php if($vd['canseeother'] == 1){ ?>

			        <option value="">所有员工(包括总账号)</option>

		          <?php } ?>

		          <?php foreach($vd['staff'] as $item){ ?>

		          <?php if($vd['canseeother'] == 1){ ?>

		          <option value="<?php echo $item['staffname']; ?>" 

			    <?php if($vd['staffname']==$item['staffname']){ ?>

			    selected

			    <?php } ?>

			    ><?php echo $item['realname']; ?>(<?php (DisplayCode($item['staffid'],2)); ?>)

			    </option>

		          <?php }else{ ?>

		          <?php if($vd['agent'][9] == $item['staffid']){ ?>

		          <option value="<?php echo $item['staffname']; ?>" 

			    <?php if($vd['staffname']==$item['staffname']){ ?>

			    selected

			    <?php } ?>

			    ><?php echo $item['realname']; ?>(<?php (DisplayCode($item['staffid'],2)); ?>)

			    </option>

		          <?php } ?>

		          <?php } ?>

		          <?php } ?>
	            </select>
            </div></td>
		</tr>

		<tr>

		  <td class="table1_left">查询时间段：</td>
		  <td class="tableright1">

          <div align="left">

            <input type="text" name="startdate" size="18" value="<?php echo $vd['startdate']; ?>" style="vertical-align:middle;" id="startdate"/>

                  <strong>至</strong>

            <input type="text" name="enddate" size="18" value="<?php echo $vd['enddate']; ?>" style="vertical-align:middle;" id="enddate"/>    
          </div></td>
		</tr>

		<tr>

		<td class="table1_left"></td>

		<td class="tableright1">

			<div align="left">

			  <input type="hidden" name="m" value="mod_agent">

			  <input type="hidden" name="c" value="order">

			  <input type="hidden" id="export" name="export" value="0"/>

			  <input name="btnQuery" type="submit" class="input_s" onClick="setAct(0)" value=" "/>

              <input name="btnQuery" type="submit" class="input_d" onClick="setAct(1)" value=" " />
</div></td>
		</tr>
		</table>

		</form>

	</td>

	</tr>

</table>

	<br>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

</table>

    <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">
      <tr>
        <th width="10%" class="heardertop1">购买日期</td>
        <th width="20%" class="heardertop1">商品名称</td>
        <th width="10%" class="heardertop1">商品类型</td>
        <th width="10%" class="heardertop1">充值账号</td>
        <th width="8%" class="heardertop1">数量</td>
        <th width="8%" class="heardertop1">单价</td>
        <th width="10%" class="heardertop1">金额</td>
        <th width="10%" class="heardertop1">员工</td>
        <th width="8%" class="heardertop1">状态</td>
        <th width="6%" class="heardertop1">详细</td>
      <?php $cprice_sum = 0;$dollars_sum = 0;$qty_sum = 0;$profit_sum = 0;foreach($vd['items'] as $item) { ?>
		  	  	    <tr class="trd">
        <td><?php echo $item['orddate']; ?></td>
        <td align="left"><?php echo $item['pname']; ?></td>
        <td><?php (ProductType($item['ptype'])); ?></td>
        <td><?php if($item['czaccount']==''){ ?>
          <?php }else{ ?>
          <?php echo $item['czaccount']; ?>
          <?php } ?></td>
        <td><strong><?php echo $item['qty']; ?></strong>个</td>
        <td><?php if($vd['canseeprice']){ ?>
          <?php echo $item['cprice']; ?>
            <?php }else{ ?>
          --
          <?php } ?></td>
        <td><?php if($vd['canseeprice']){ ?>
          <?php echo $item['dollars']; ?>
            <?php }else{ ?>
          --
          <?php } ?></td>
        <td><?php (Operator($vd['agent'][0], $item['cname'], $vd['agent'][9])); ?></td>
        <td><span class="eff"><?php (OrderState($item['ordstate'],$item['ptype'])); ?></span></td>
        <td><input type="button" name="detail" value="详细" class="buttonnor" onclick="location.href='index.php?m=mod_agent&amp;c=order&amp;in=1&amp;a=detail&amp;ordno=<?php echo $item['ordno']; ?>';" /></td>
      </tr>
      <?php $cprice_sum=$cprice_sum+$item['cprice']*$item['qty'];$dollars_sum=$dollars_sum+$item['dollars'];$qty_sum=$qty_sum+$item['qty'];$profit_sum=$profit_sum+$item['staffprofit'];} ?>
      <tr class="thr">
        <td colspan="4">本页合计：</td>
        <td><?php echo $qty_sum; ?></td>
        <td></td>
        <td><?php if($vd['canseeprice']){echo round($dollars_sum,3);}else{ ?>
          --
            <?php } ?></td>
        <td colspan="3"></td>
      </tr>
      <tr class="thr">
        <td colspan="4">查询合计：</td>
        <td><?php echo $vd['tradedata']['qty_sum']; ?></td>
        <td></td>
        <td><?php if($vd['canseeprice']){echo round($vd['tradedata']['dollars_sum'],3);}else{ ?>
          --
            <?php } ?></td>
        <td colspan="3"></td>
      </tr>
    </table>
			   <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
         <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script> 
    <div id="page" align="right">

		<?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>

	</div>

	

</body>

</html>

<script type="text/javascript">

function setAct(v)

{

	$("export").value = v;

	if(v > 0)

	{

	  $("advsearch").submit();

	}

}

</script>

