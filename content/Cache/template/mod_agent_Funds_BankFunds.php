<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>汇款通知书</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="http://www.elingka.com/js/ifrauto1.js?isposkback=False"></script>
<script type="text/javascript">
//<![CDATA[
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
//]]>
</script>

</head>
<body>
<div class="new_qie">
            <div class="new_qie2">
                <h2>
                    银行线下汇款</h2>
            </div>
            <ul>
               <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=funds&a=AddFunds">在线充值</a></li>

	<li> <a id="lbtn21" class="on" href="">银行汇款充值</a></li>

    <li> <a id="lbtn23" href="../index.php?m=mod_agent&c=Funds&a=YktFunds">充值卡充值</a></li>
            </ul>
</div>
        <div class="fb_liucheng">
            <ul>
                <h2>
                    线下汇款流程：</h2>
                <li>线下汇款成功</li>
                <li class="li2"></li>
                <li>提交汇款通知</li>
                <li class="li2"></li>
                <li>等待处理</li>
                <li class="li2"></li>
                <li>加款成功</li>
            </ul>
        </div>
        <div style="margin-bottom: 5px;">
            选择上级汇款对像：<select name="ReceiverID" onchange="javascript:setTimeout('__doPostBack(\'ReceiverID\',\'\')', 0)" id="ReceiverID">
	<option selected="selected" value="0">平台管理员</option>

</select></div>
        
                <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">
      <tr>
        <th width="20%" height="41">开户行</th>
        <th width="20%">账户名</th>
        <th width="20%"><span class="heardertop1">银行账号</span></th>
        <th width="20%"><span class="heardertop1">开户地</span></th>
        <th width="20%"><span class="heardertop1">提交汇款通知书</span></th>
  <?php foreach($vd['bank'] as $item) { ?>
  <?php if($item['AccountNO'] != ''){ ?>
	    <tr class="trd">
        <td><?php echo $item['AccountBranch']; ?></td>
        <td><?php echo $item['AccountName']; ?></td>
        <td align=left><?php echo $item['AccountNO']; ?></td>
        <td><?php echo $item['Address']; ?></td>
        <td><a href="index.php?m=mod_agent&amp;c=Remit&amp;a=Add&amp;id=<?php echo $item['id']; ?>">
                            提交汇款通知</a></td>
      </tr>
      <?php } ?>
	  <?php } ?>
    </table>           
	        <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/jquery.js"></script>

    </form>

    <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/select.js"></script> 
</body>
</html>