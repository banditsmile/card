<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><title>

	下级客户消费记录及1分析

</title>

    <link href="/index/css/common.css" type="text/css" rel="stylesheet" />

    <link href="/index/css/page.css" type="text/css" rel="stylesheet" /><body class="mainbg">

<table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                基本资料            </th>

    <tr>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft">

		<?php $item=$vd['item']; ?>

    <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">

        <tr>        <th width="8%"><span class="heardertop1">编号</span></th>

		<th width="10%"><span class="heardertop1">用户名</span></th>

		<th width="30%"><span class="heardertop1">商户名称</span></th>

		<th width="10%"><span class="heardertop1">用户级别</span></th>

		<th width="10%"><span class="heardertop1">联系人</span></th>

		<th width="6%"><span class="heardertop1">状态</span></th>

		<th width="10%"><span class="heardertop1">余额</span></th> 

      </tr>

      <tr class="stline" onMouseOver="this.className='nd'" onMouseOut="this.className='stline'">

        <td>

          <?php if($item['aremain'] != ''){ echo round($item['aremain'], 3);} ?></td>

        <td>

          <?php if($item['selffrozenfunds'] != ''){ echo round($item['selffrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['tradefrozenfunds'] != ''){ echo round($item['tradefrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['sysfrozenfunds'] != ''){ echo round($item['sysfrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['bossfrozenfunds'] != ''){ echo round($item['bossfrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['income'] != ''){ echo round($item['income'], 3);} ?></td> 

        <td>

          <?php if($item['funds'] != ''){ echo round($item['funds'], 3);} ?></td> 

      </tr>

      <tr>

      	<td colspan="7" style="text-align:left;padding:5px">

      		帐户总金额 = 帐户可用余额 + 自己冻结资金 + 交易冻结资金 + 系统冻结资金 + 上级冻结资金 + 代理所得金额 + 供货所得收入

      	</td>

      </tr>

    </table>

	</td>

	</tr>

	</table>

	<br>

	<table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                资金转化            </th>

    <tr>



	<?php if($vd['rights'][1]==1){ ?>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft">

  <form method="post" action="index.php?m=mod_agent&c=Funds&a=SelfCz" name="cform" id="cform" onSubmit="return checklock()">

    <table width="100%" cellpadding="2" cellspacing="1" class="table5">

      <tr>

        <td width="15%" class="td_left"> 账号：</td>

        <td width="78%" align="left" class="tableright1"><div align="left"><?php echo $item['company']; ?></div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> 操作对象：</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <select name="fromobject" id="fromobject">

            

        

      	    

      		<?php (Option($vd['funds'])); ?>

      	

    	    

      

          </select>

          </div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> 转化为：</td>

        <td align="left" class="tableright1"><p>

          <label>

          <div align="left">

            <select name="select">

              <option>账户可用余额</option>

            </select>

          </div>

          </label>

        </p>

          </td>

      </tr>

      <tr>

        <td width="15%" class="td_left"><p>操作金额：</p></td>

        <td align="left" class="tableright1"><div align="left">

          <input type="text" class="input0" style="font-weight:normal" name="dollars" id="dollars" size="24"/>

        <?php echo $vd['lang']['moneyunit']; ?></div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> 输入交易密码：</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <input type="password" class="input0" style="font-weight:normal" name="tradepwd" id="tradepwd" size="24"/>

        </div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> 操作原因：</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <textarea name="reason" cols="50" rows="5" scrolling="yes" style="padding:5px"></textarea>

        </div></td>

      </tr>



      <tr>

        <td width="15%" class="td_left"></td>

        <td align="left" class="tableright1"><div align="left">

            <input type="submit" name="Submit" value="确认添加" class="tijiao_input" />

            <input type="reset" name="reset" value="重新填写" class="fanhui_input" />

        </div></td>

      </tr>

    </table>

  </form>

  </td>

	</tr>

	</table>

  <?php }else{ ?>

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft"><table width="100%" cellpadding="2" cellspacing="1" class="table5">

      <tr>

        <td width="15%" class="td_left"> <div align="center">未开通权限</div></td>

      </tr>

    </table></td>

  </tr>

  </table>

  <?php } ?>

  <br/>

  <table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                相关说明           </th>

    <tr>



	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft"><table cellpadding="2" cellspacing="1" class="table1" style="margin-bottom: 10px;">

      <tbody>

        <tr>

          <td width="8%" class="table1_left"> 提示：</td>

          <td width="92%" align="left" class="tableright1"><div align="left"><span style="text-align:left;padding:5px">此处您可以查看到您的帐户余额，其中记录了您的帐号的详细资金情况，如果您发现您的帐号有被冻结资金，请根据以下提示进行操作。点击“查看本帐户资金被冻结记录”可以查到您的资金为什么被冻结。</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> A： </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">上级冻结——请用电话或者QQ向您的上级咨询冻结原因并申请解冻</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> B： </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">自己冻结——请您自行解冻</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> C： </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">交易冻结——由于您购买了某种直充产品或者人工代充产品，由于交易没有顺利完成，该笔购</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> 其它： </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">卡款被临时冻结了，请马上查看是否有购卡单据仍然处于“处理中”状态，然后向供货商进行投诉，要求解除交易并退款。</span></div></td>

        </tr>

      </tbody>

	  <input name="hidden" type="hidden" id="thisright" value="<?php echo $vd['data']['rights']; ?>"/>

      <input type="hidden" value="<?php echo $vd['data']['aid']; ?>" name="aid" id="ubzaid"/>

    </table></td>

	</tr>

	</table>

<script type="text/javascript">

	var ctablenum = 1;

	var helperVal = 2;

	function checklock()

	{

		if($("dollars").value=="")

		{

			alert("金额不能为空");

			$("dollars").focus();

			return false;

		}

	}

</script>

    </body>

</html>

