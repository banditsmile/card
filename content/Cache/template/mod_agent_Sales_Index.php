<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />
	<div class="new_qie">
      <div class="new_qie2">
        <h2> ҵ��Ա�˻�����</h2>
      </div>
	  <ul>
        <li><a href="" class="on">ҵ��Ա�˻�����</a></li>
	    <li><a href="index.php?m=mod_agent&c=Sales&a=Add">ҵ��Ա�˻����</a></li>
      </ul>
    </div>
        <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">
          <tr>
            <th width="14%"> ��� </th>
            <th width="12%"> �û��� </th>
            <th width="12%"> ҵ��Ա���� </th>
            <th width="14%"> ���¼� </th>
            <th width="21%"> ҵ������ </th>
            <th width="11%"> ���ʱ��</th>
            <th width="7%"> �޸�</th>
            <th width="9%"> ɾ��</th>
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
            <td><a href="index.php?m=mod_agent&c=Sales&a=Del&id=<?php echo $item['id']; ?>" onclick="{if(confirm('ȷ��Ҫɾ��ҵ��Ա��<?php echo $item['realname']; ?>��ɾ�����޷��ٲ�ѯ��ҵ��Ա��ҵ��!')){return true;}return false;}"><img src="<?php echo $vd['content']; ?>images/icon_del.gif" border="0" /></a></td>
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
	