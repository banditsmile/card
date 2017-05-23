<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>所有商品列表</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
</head>
<form name="query" method="get" action="index.php">
		<div class="new_qie">
      <div class="new_qie2">
        <h2> 所有商品列表</h2>
        <span class="setup_index">
        <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked" onClick="javascript:setTimeout(&#39;__doPostBack(\&#39;lbtnLogin\&#39;,\&#39;\&#39;)&#39;, 0)">
          <label for="lbtnLogin">登录后到这页</label>
        </span> </div>
	  <ul>
        <li><a href="../index.php?m=mod_agent&c=Product&a=Create" class="qie_icon qie_icon1" style="padding-left: 38px;"> 发布供货商品</a></li>
	    <li> <a id="lbtn21" class="on" href="#">所有商品列表</a></li>
	    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Product&a=Stock">商品库存管理</a></li>
      </ul>
</div>
	  <form name="query" method="get" ACTION="index.php">

      <table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">

		<tr>

		  <td class="table1_left"> <div align="right">关键字输入：</div></td>

		<td width="78%" align="left" class="tableright1"><div align="left">

		  <input type="text" size="30" name="keywords" class='input0' value="">

		  </div></td>

		</tr>

		<tr>

		  <td class="table1_left"> <div align="right">查询条件：</div></td>

		<td align="left" class="tableright1">

		  <div align="left">

		    <select name="stype">

		        <option value="pname">商品名称</option>

		        <option value="listprice">商品面值</option>

		        </select>

		      <select name="ptype">

		          <option value="-1" selected>全部类型</option>

		          <option value="0">虚拟卡密</option>

		          <option value="2">手工充值</option>

		          <option value="1">自动充值</option>

		          <option value="3">选号商品</option>

	            </select>

          </div></td>

		</tr>

		<tr>

		  <td class="table1_left"><div align="right"></div></td>

		<td align="left" class="tableright1">

			<div align="left">

			  <input type="hidden" name="m" value="mod_agent"/>

			  <input type="hidden" name="c" value="Product"/>

			  <span class="tdleft">

			  <input type="submit" name="btnQuery" value="" id="btnQuery" class="input_s">

			  </span></div></td>

		</tr>

		</table>

	  </form>

	</td>

	</tr>

	</table>

	<br>

	

	<tr>

    <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">

      <tr>

        <th width="3%"><span class="heardertop1">ID</span></th>

        <th width="3%"><span class="heardertop1">排序</span></th>

        <th width="50%"><span class="heardertop1">商品名称</span></th>

        <th width="5%"><span class="heardertop1">类型</span></th>

        <th width="3%"><span class="heardertop1">进价</span></th>

        <th width="3%"><span class="heardertop1">状态</span></th>

        <th width="4%"><span class="heardertop1">手续费</span></th>

        <th width="3%"><span class="heardertop1">权限</span></th>

        <th width="3%"><span class="heardertop1">审核</span></th>

        <th width="3%"><span class="heardertop1">库存</span></th>

        <th width="3%"><span class="heardertop1">定价</span></th>

        <th width="3%"><span class="heardertop1">编辑</th>

        <th width="3%"><div align="center"><span class="heardertop1">删除</span></div></th>


      <?php foreach($vd['items'] as $item) { ?>

      <tr class="trd">

        <td><?php echo $item['pid']; ?></td>

        <td><?php echo $item['ordering']; ?></td>

        <td><?php echo $item['pname']; ?></td>

        <td><?php (ProductType($item['ptype'])); ?></td>

        <td><?php echo $item['listprice']; ?></td>

        <td><?php if($item['sell']==0){ ?>

            <font color=#ff0000>禁售</font>

            <?php }else{ ?>

            <font color=#0000ff>销售</font>

            <?php } ?></td>

        <td><?php echo $item['pfee']*100; ?>

          %</td>

        <td><?php if($item['tosys']==1){ ?>

            <font color=#ff0000>全局</font>

            <?php }else{ ?>

            <font color=#0000ff>下级</font>

            <?php } ?></td>

        <td><?php if($item['checked']==0){ ?>

            <font color=#ff0000>未审</font>

            <?php }else{ ?>

            <font color=#0000ff>已审</font>

            <?php } ?></td>

        <td><a href="index.php?m=mod_agent&c=Card&a=add&id=<?php echo $item['pid']; ?>"> 添加 </a> </td>

        <td><a href="index.php?m=mod_agent&c=product&a=Price&pid=<?php echo $item['pid']; ?>"><u>定价</u></a></td>

        <td><a href="index.php?m=mod_agent&c=Product&a=Detail&pid=<?php echo $item['pid']; ?>">修改</a></td>

        <td><?php if($item['ptype']<100){ ?>

            <a href="index.php?m=mod_agent&c=Product&a=DestroyItems&id=<?php echo $item['pid']; ?>" onClick="{if(confirm('确认要删除<?php echo $item['pname']; ?>吗？')){return true;}return false;}">删除</a>

            <?php }else{ ?>

          &nbsp;

          <?php } ?></td>

      </tr>

      <?php } ?>

    </table></td>

		 		   <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
                   <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script>

	<div id="page" align="right">

		<?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>

	</div>

	

	<div style="display:none">

	<input type="submit" name="Submit" value="更新序号" class="button2"> <input type="reset" name="reset" value="重新填写" class="button2"> <input type="button" name="autotomanual" class="button2" value="充值切换" onClick="javascript:openScript('#','autosavesetup',600,400);"> <input type="button" name="nosaletime" class="button2" value="手工禁售" onClick="javascript:openScript('#','setuptime',600,220);">

  </div>

	

	<br>

	<br>

</body>

</html>

