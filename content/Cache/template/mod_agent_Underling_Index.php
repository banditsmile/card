<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>�¼��ͻ���������</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/content/mod_b2b/js/utils.js"></script>
</head>
		<form name="query" method="get" action="index.php">
<body>
      <script type="text/javascript">
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
</script> 
<script type="text/javascript" language="javascript">
    function Refresh(id) {
        var theForm = document.forms["form1"];
        if (!theForm) {
            theForm = document.form1;
        }
        if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
            theForm.Refresh1$HiddenField1.value = "1";
            if (id != undefined)
            {
                theForm.Refresh1$HiddenField2.value = id;
            }
            theForm.submit();
        }
    }
</script>
    <div class="new_qie">
      <div class="new_qie2">
            <h2>
                �¼��ͻ��б�</h2>
        </div>
    </div>
    <div class="input_div">
        <a href="index.php?m=mod_agent&c=Underling&a=Add" class="input_add">�½��¼�</a></div>
    <table cellspacing="1" cellpadding="2" class="table5">
        <tr>
            <td width="15%" class="td_left">
                �ؼ��֣�            </td>
            <td class="tdleft">
                <input name="keywords" class="input0" type="text" id="keywords" />            </td>
        </tr>
        <tr>
            <td class="td_left">
                ��ѯ���ͣ�            </td>
          <td class="tdleft"><span class="tableright1">
            <select name="stype">
              <option value="aid" >�ͻ����</option>
              <option value="aname" >�û���</option>
              <option value="company" >�̻�����</option>
              <option value="arealname" >��ϵ��</option>
              <option value="aqq" >��ϵQQ</option>
              <option value="atel" >��ϵ�绰</option>
              <option value="mobile" >�ֻ�����</option>
            </select>
          </span></td>
        </tr>
        <tr>
            <td class="td_left">            </td>
            <td class="tdleft">
                			<input type="hidden" name="m" value="mod_agent">
			<input type="hidden" name="c" value="Underling">
			<input name="Submit" type="submit" class="input_s" value=" "></td>
        </tr>
    </table>
    <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">
      <tr>
        <th width="7%" height="41">���</th>
        <th width="14%">�˻���</th>
        <th width="16%"><span class="heardertop1">�̻�����</span></th>
        <th width="10%"><span class="heardertop1">�û�����</span></th>
        <th width="9%"><span class="heardertop1">��ϵ��</span></th>
        <th width="8%"><span class="heardertop1">��ϵQQ</span></th>
        <th width="7%"><span class="heardertop1">�ֻ�����</span></th>
        <th width="9%"><span class="heardertop1">��ϵ�绰</span></th>
        <th width="6%"><span class="heardertop1">״̬</span></th>
        <th width="11%"><span class="heardertop1">�¼�</span></th>
        <th width="3%"><span class="heardertop1">����</span></th>
      <?php foreach($vd['items'] as $item) { ?>
		  	  	    <tr class="trd">
        <td><?php echo $item['aid']; ?></td>
        <td><?php echo $item['aname']; ?></td>
        <td align=left><?php echo $item['company']; ?></td>
        <td><?php echo $item['rank']; ?></td>
        <td><?php echo $item['arealname']; ?></td>
        <td><?php echo $item['aqq']; ?></td>
        <td><?php echo $item['mobile']; ?></td>
        <td><?php echo $item['atel']; ?></td>
        <td><?php if($item['frozen'] == 1){ ?>
            <font color="#ff0000">����</font>
            <?php }else{ ?>
            <font color="#008800">����</font>
            <?php } ?></td>
        <td><font color="#0000ff"><?php echo $item['underlingcount']; ?>��</font></td>
        <td><a href="index.php?m=mod_agent&amp;c=underling&amp;a=detail&amp;aid=<?php echo $item['aid']; ?>"><u>����</u></a></td>
        <td width="0%"></td>
      </tr>
      <?php } ?>
    </table>
		 <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script>
    <div align="right"><?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>
    </div>
</body>
</html>