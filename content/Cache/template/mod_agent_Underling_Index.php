<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>下级客户档案管理</title>
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
                下级客户列表</h2>
        </div>
    </div>
    <div class="input_div">
        <a href="index.php?m=mod_agent&c=Underling&a=Add" class="input_add">新建下级</a></div>
    <table cellspacing="1" cellpadding="2" class="table5">
        <tr>
            <td width="15%" class="td_left">
                关键字：            </td>
            <td class="tdleft">
                <input name="keywords" class="input0" type="text" id="keywords" />            </td>
        </tr>
        <tr>
            <td class="td_left">
                查询类型：            </td>
          <td class="tdleft"><span class="tableright1">
            <select name="stype">
              <option value="aid" >客户编号</option>
              <option value="aname" >用户名</option>
              <option value="company" >商户名称</option>
              <option value="arealname" >联系人</option>
              <option value="aqq" >联系QQ</option>
              <option value="atel" >联系电话</option>
              <option value="mobile" >手机号码</option>
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
        <th width="7%" height="41">编号</th>
        <th width="14%">账户名</th>
        <th width="16%"><span class="heardertop1">商户名称</span></th>
        <th width="10%"><span class="heardertop1">用户级别</span></th>
        <th width="9%"><span class="heardertop1">联系人</span></th>
        <th width="8%"><span class="heardertop1">联系QQ</span></th>
        <th width="7%"><span class="heardertop1">手机号码</span></th>
        <th width="9%"><span class="heardertop1">联系电话</span></th>
        <th width="6%"><span class="heardertop1">状态</span></th>
        <th width="11%"><span class="heardertop1">下级</span></th>
        <th width="3%"><span class="heardertop1">管理</span></th>
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
            <font color="#ff0000">冻结</font>
            <?php }else{ ?>
            <font color="#008800">启动</font>
            <?php } ?></td>
        <td><font color="#0000ff"><?php echo $item['underlingcount']; ?>个</font></td>
        <td><a href="index.php?m=mod_agent&amp;c=underling&amp;a=detail&amp;aid=<?php echo $item['aid']; ?>"><u>管理</u></a></td>
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
