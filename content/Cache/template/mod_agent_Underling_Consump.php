<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>�¼��ͻ����Ѽ�¼������</title><meta http-equiv="Content-Type" content="text/html; charset=gb2312" />    
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />


</head>
		<form name="query" method="get" action="index.php">
<body>
    <div class="new_qie">
        <div class="new_qie2">
            <h2>
                �¼��ͻ����Ѽ�¼������</h2>
        </div>
    </div>
<div></div>

<div></div>
        <div class="xuan2">
            <table cellspacing="1" cellpadding="2" class="table5">
                <tr>
                    <td width="15%" class="td_left">
                        �ؼ��֣�</td>
                    <td class="tdleft">
                        <input type="text" size="30" name="keywords" class='input0' value=""></td>
                </tr>
                <tr>
                    <td class="td_left">
                        ��ѯ������</td>
                    <td class="tdleft"><span class="tableright1">
                      <select name="stype">
                        <option value="aid" >�ͻ����</option>
                        <option value="aname" >�û���</option>
                        <option value="company" >�̻�����</option>
                        <option value="arealname" >��ϵ��</option>
                      </select>
                    </span></td>
                </tr>
                <tr>
                    <td class="td_left">
                        ����ѡ��</td>
                    <td class="tdleft">
                        ����
                        <select name="ddlSearchValue2" id="ddlSearchValue2">
	<option selected="selected" value="0">0��</option>
	<option value="1">1��</option>
	<option value="3">3��</option>
	<option value="5">5��</option>
	<option value="7">7��</option>
	<option value="15">15��</option>
	<option value="30">30��</option>
	<option value="60">60��</option>
	<option value="90">90��</option>

</select>
                        <select name="ddlSearchType2" id="ddlSearchType2">
	<option selected="selected" value="Login">δ��¼</option>
	<option value="Consume">δ����</option>

</select>
                        �Ŀͻ�
                    </td>
                </tr>
                <tr>
                    <td class="td_left">
                    </td>
                  <td class="tdleft">
                        <input type="hidden" name="m" value="mod_agent">
			<input type="hidden" name="c" value="Underling">
			<input type="hidden" name="a" value="Consump">
			<input type="submit" name="Submit" value=" " class="input_s"></td>
                </tr>
            </table>
        </div>
        <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">
            <tr>
                <th width="6%">
                    �ͻ����                </th>
                <th width="12%">
                    �û���                </th>
                <th width="16%">
                    ��˾����                </th>
                <th width="13%">
                    �û�����</th>
                <th width="13%">
                    ��ϵ��</th>
                <th width="10%">
                    �˻�״̬</th>
                <th width="10%">
                    ���</th>
                <th width="6%">
                    ����</th>
                <th width="6%">
                    ��¼                </th>
                <th width="8%">
                    ����                </th>
            </tr>
            
                <?php foreach($vd['items'] as $item) { ?>
	  	  	    <tr class="trd">
		<td><?php echo $item['aid']; ?></td>
		<td><?php echo $item['aname']; ?></td>
		<td align=left><?php echo $item['company']; ?></td>
		<td><?php echo $item['rank']; ?></td>
		<td><?php echo $item['arealname']; ?></td>
		<td><?php if($item['frozen'] == 1){ ?> <font color="#ff0000">����</font> <?php }else{ ?> <font color="#008800">����</font> <?php } ?></td>
		<td><?php echo $item['aremain']; ?></td>
		<td><?php echo $item['acsmp']; ?></td>
		<td><a href="index.php?m=mod_agent&c=Order&a=Underling&aid=<?php echo $item['aid']; ?>"><u>��¼</u></a></td>
		<td><font color="#cccccc">-</font></td>
		</tr>
		<?php } ?>
		</table>
		 <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script>
	    <div align="right"><?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>
        </div>
</body>
</html>
