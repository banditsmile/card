<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>������Ʒ�б�</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
</head>
<form name="query" method="get" action="index.php">
		<div class="new_qie">
      <div class="new_qie2">
        <h2> ������Ʒ�б�</h2>
        <span class="setup_index">
        <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked" onClick="javascript:setTimeout(&#39;__doPostBack(\&#39;lbtnLogin\&#39;,\&#39;\&#39;)&#39;, 0)">
          <label for="lbtnLogin">��¼����ҳ</label>
        </span> </div>
	  <ul>
        <li><a href="../index.php?m=mod_agent&c=Product&a=Create" class="qie_icon qie_icon1" style="padding-left: 38px;"> ����������Ʒ</a></li>
	    <li> <a id="lbtn21" class="on" href="#">������Ʒ�б�</a></li>
	    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Product&a=Stock">��Ʒ������</a></li>
      </ul>
</div>
	  <form name="query" method="get" ACTION="index.php">

      <table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">

		<tr>

		  <td class="table1_left"> <div align="right">�ؼ������룺</div></td>

		<td width="78%" align="left" class="tableright1"><div align="left">

		  <input type="text" size="30" name="keywords" class='input0' value="">

		  </div></td>

		</tr>

		<tr>

		  <td class="table1_left"> <div align="right">��ѯ������</div></td>

		<td align="left" class="tableright1">

		  <div align="left">

		    <select name="stype">

		        <option value="pname">��Ʒ����</option>

		        <option value="listprice">��Ʒ��ֵ</option>

		        </select>

		      <select name="ptype">

		          <option value="-1" selected>ȫ������</option>

		          <option value="0">���⿨��</option>

		          <option value="2">�ֹ���ֵ</option>

		          <option value="1">�Զ���ֵ</option>

		          <option value="3">ѡ����Ʒ</option>

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

        <th width="3%"><span class="heardertop1">����</span></th>

        <th width="50%"><span class="heardertop1">��Ʒ����</span></th>

        <th width="5%"><span class="heardertop1">����</span></th>

        <th width="3%"><span class="heardertop1">����</span></th>

        <th width="3%"><span class="heardertop1">״̬</span></th>

        <th width="4%"><span class="heardertop1">������</span></th>

        <th width="3%"><span class="heardertop1">Ȩ��</span></th>

        <th width="3%"><span class="heardertop1">���</span></th>

        <th width="3%"><span class="heardertop1">���</span></th>

        <th width="3%"><span class="heardertop1">����</span></th>

        <th width="3%"><span class="heardertop1">�༭</th>

        <th width="3%"><div align="center"><span class="heardertop1">ɾ��</span></div></th>


      <?php foreach($vd['items'] as $item) { ?>

      <tr class="trd">

        <td><?php echo $item['pid']; ?></td>

        <td><?php echo $item['ordering']; ?></td>

        <td><?php echo $item['pname']; ?></td>

        <td><?php (ProductType($item['ptype'])); ?></td>

        <td><?php echo $item['listprice']; ?></td>

        <td><?php if($item['sell']==0){ ?>

            <font color=#ff0000>����</font>

            <?php }else{ ?>

            <font color=#0000ff>����</font>

            <?php } ?></td>

        <td><?php echo $item['pfee']*100; ?>

          %</td>

        <td><?php if($item['tosys']==1){ ?>

            <font color=#ff0000>ȫ��</font>

            <?php }else{ ?>

            <font color=#0000ff>�¼�</font>

            <?php } ?></td>

        <td><?php if($item['checked']==0){ ?>

            <font color=#ff0000>δ��</font>

            <?php }else{ ?>

            <font color=#0000ff>����</font>

            <?php } ?></td>

        <td><a href="index.php?m=mod_agent&c=Card&a=add&id=<?php echo $item['pid']; ?>"> ��� </a> </td>

        <td><a href="index.php?m=mod_agent&c=product&a=Price&pid=<?php echo $item['pid']; ?>"><u>����</u></a></td>

        <td><a href="index.php?m=mod_agent&c=Product&a=Detail&pid=<?php echo $item['pid']; ?>">�޸�</a></td>

        <td><?php if($item['ptype']<100){ ?>

            <a href="index.php?m=mod_agent&c=Product&a=DestroyItems&id=<?php echo $item['pid']; ?>" onClick="{if(confirm('ȷ��Ҫɾ��<?php echo $item['pname']; ?>��')){return true;}return false;}">ɾ��</a>

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

	<input type="submit" name="Submit" value="�������" class="button2"> <input type="reset" name="reset" value="������д" class="button2"> <input type="button" name="autotomanual" class="button2" value="��ֵ�л�" onClick="javascript:openScript('#','autosavesetup',600,400);"> <input type="button" name="nosaletime" class="button2" value="�ֹ�����" onClick="javascript:openScript('#','setuptime',600,220);">

  </div>

	

	<br>

	<br>

</body>

</html>

