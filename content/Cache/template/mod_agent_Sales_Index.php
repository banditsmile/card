<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />
	<div class="new_qie">
      <div class="new_qie2">
        <h2> 业务员账户管理</h2>
      </div>
	  <ul>
        <li><a href="" class="on">业务员账户管理</a></li>
	    <li><a href="index.php?m=mod_agent&c=Sales&a=Add">业务员账户添加</a></li>
      </ul>
    </div>
        <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">
          <tr>
            <th width="14%"> 编号 </th>
            <th width="12%"> 用户名 </th>
            <th width="12%"> 业务员姓名 </th>
            <th width="14%"> 绑定下级 </th>
            <th width="21%"> 业绩比例 </th>
            <th width="11%"> 添加时间</th>
            <th width="7%"> 修改</th>
            <th width="9%"> 删除</th>
          <?php foreach($vd['items'] as $item){ ?>
  	      <tr class="trd">
            <td><?php (DisplayCode($item['id'], 3)); ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['realname']; ?></td>
            <td><?php (DisplayCode($item['underlingid'], 4)); ?></td>
            <td><?php echo $item['sellscale'] * 100; ?>
              %</td>
            <td><?php echo $item['createdate']; ?></td>
            <td><a href="index.php?m=mod_agent&c=Sales&a=Detail&id=<?php echo $item['id']; ?>"><img src="<?php echo $vd['content']; ?>images/icon_xg.gif" border="0" /></a></td>
            <td><a href="index.php?m=mod_agent&c=Sales&a=Del&id=<?php echo $item['id']; ?>" onclick="{if(confirm('确认要删除业务员：<?php echo $item['realname']; ?>吗？删除后无法再查询该业务员的业绩!')){return true;}return false;}"><img src="<?php echo $vd['content']; ?>images/icon_del.gif" border="0" /></a></td>
          </tr>
          <?php } ?>
        </table>
		 <div align="right">
         <div align="right">
  <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
<?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>
    <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script> 
    </body>
         </div>
	</html>
         </div>
	