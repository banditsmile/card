<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>��Ʒ������</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="../index/css/common.css" type="text/css" rel="stylesheet">
<link href="../index/css/page.css" type="text/css" rel="stylesheet">
</head>
	<tr>
	<td class="tableleft"><div class="new_qie">
      <div class="new_qie2">
        <h2>��Ʒ������</h2>
        <span class="setup_index">
        <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked" onClick="javascript:setTimeout(&#39;__doPostBack(\&#39;lbtnLogin\&#39;,\&#39;\&#39;)&#39;, 0)">
          <label for="lbtnLogin">��¼����ҳ</label>
        </span> </div>
	  <ul>
        <li><a href="../index.php?m=mod_agent&c=Product&a=Create" class="qie_icon qie_icon1" style="padding-left: 38px;"> ����������Ʒ</a></li>
	    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Product">������Ʒ�б�</a></li>
		<li> <a id="lbtn21" class="on" href="#">��Ʒ������</a></li>
      </ul>
</div>
	<tr>
	<td class="tableleft">
		<form name="query" method="get" action="index.php">
	    <table cellspacing="1" cellpadding="2" class="table5">
          <tr>
            <td width="15%" class="td_left"> �ؼ��֣� </td>
            <td width="78%" align="left" class="tableright1"><div align="left">
              <input type="text" size="30" name="keywords" class='input0' value="" />
            </div></td>
          </tr>
          <tr>
            <td class="td_left"> ��ѯ���ͣ� </td>
            <td align="left" class="tableright1"><div align="left">
              <select name="stype">
                <option value="pname">��Ʒ����</option>
                <option value="listprice">��Ʒ��ֵ</option>
              </select>
              <select name="ptype">
                <option value="-1" selected="selected">ȫ������</option>
                <option value="0">���⿨��</option>
                <option value="2">�ֹ���ֵ</option>
                <option value="1">�Զ���ֵ</option>
                <option value="3">ѡ����Ʒ</option>
              </select>
            </div></td>
          </tr>
          <tr>
            <td class="td_left"></td>
            <td align="left" class="tableright1"><div align="left">
              <input type="hidden" name="m" value="mod_agent"/>
              <input type="hidden" name="c" value="Product"/>
              <input type="hidden" name="a" value="Stock"/>
              <input type="submit" name="Submit" value=" " class="input_s" />
            </div></td>
          </tr>
        </table>
    <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">
 		<tr>
            <th width="6%"><span class="heardertop1">��ƷID</span></th>
		<th width="33%"><span class="heardertop1">��Ʒ����</span></th>
		<th width="14%"><span class="heardertop1">��Ʒ����</span></th>
		<th width="8%"><span class="heardertop1">��ֵ</span></th>
		<th width="7%"><span class="heardertop1">����</span></th>
		<th width="5%"><span class="heardertop1">״̬</span></th>
		<th width="8%"><span class="heardertop1">����</span></th>
		<th width="3%"><span class="heardertop1">��ֵ</span></th>
		<th width="4%"><span class="heardertop1">���</span></th>
        <th width="3%"><span class="heardertop1">���</span></th>
        <th width="3%"><span class="heardertop1">����</span></th>
        <th width="3%">�༭</th>
        <th width="3%"><div align="center"><span class="heardertop1">ɾ��</span></div></th>
      <?php foreach($vd['items'] as $item) { ?>
      <tr class="trd">
        <td height="32"><?php echo $item['pid']; ?></td>
        <td><?php echo $item['pname']; ?></td>
        <td><?php (ProductType($item['ptype'])); ?></td>
        <td><?php echo $item['listprice']; ?></td>
        <td><?php echo $item['price']; ?></td>
        <td><?php if($item['sell']==0){ ?>
            <font color=#ff0000>����</font>
          <?php }else{ ?>
          <font color=#0000ff>����</font>
          <?php } ?></td>
        <td><?php echo $item['pfee']*100; ?>
        <?php echo $item['mystock']; ?></td>
        <td><?php if($item['ptype']==1||$item['ptype']==2){ ?>
      ----
        <?php }else{ echo $item['mystock']*$item['price'];$dollars_sum+=$item['mystock']*$item['price'];} ?></td>
        <td><?php if($item['checked']==0){ ?>
            <font color=#ff0000>δ��</font>
          <?php }else{ ?>
          <font color=#0000ff>����</font>
          <?php } ?></td>
        <td><a href="index.php?m=mod_agent&c=Card&a=add&id=<?php echo $item['pid']; ?>"> ��� </a> </td>
        <td><a href="index.php?m=mod_agent&c=product&a=Price&pid=<?php echo $item['pid']; ?>"><u>����</u></a></td>
        <td><a href="index.php?m=mod_agent&c=Product&a=Detail&pid=<?php echo $item['pid']; ?>">�޸�</a></td>
        <td><?php if($item['ptype']<100){ ?>
            <div align="center"><a href="index.php?m=mod_agent&c=Product&a=DestroyItems&id=<?php echo $item['pid']; ?>" onClick="{if(confirm('ȷ��Ҫɾ��<?php echo $item['pname']; ?>��')){return true;}return false;}">ɾ��</a>
              <?php }else{ ?>
          &nbsp;
            </div>
          <?php } ?></td>
      </tr>
      <?php } ?>
</table>	
    <div align="right">
      <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
      <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script>
      <script type="text/javascript">
  function openScript(url,name,width, height)
  {
  var Win = window.open(url,name,'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
  }
    </script>
      </body>
      <?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?></div>
	</html>
