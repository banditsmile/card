<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>���֪ͨ��</title>
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
                    �������»��</h2>
            </div>
            <ul>
               <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=funds&a=AddFunds">���߳�ֵ</a></li>

	<li> <a id="lbtn21" class="on" href="">���л���ֵ</a></li>

    <li> <a id="lbtn23" href="../index.php?m=mod_agent&c=Funds&a=YktFunds">��ֵ����ֵ</a></li>
            </ul>
</div>
        <div class="fb_liucheng">
            <ul>
                <h2>
                    ���»�����̣�</h2>
                <li>���»��ɹ�</li>
                <li class="li2"></li>
                <li>�ύ���֪ͨ</li>
                <li class="li2"></li>
                <li>�ȴ�����</li>
                <li class="li2"></li>
                <li>�ӿ�ɹ�</li>
            </ul>
        </div>
        <div style="margin-bottom: 5px;">
            ѡ���ϼ�������<select name="ReceiverID" onchange="javascript:setTimeout('__doPostBack(\'ReceiverID\',\'\')', 0)" id="ReceiverID">
	<option selected="selected" value="0">ƽ̨����Ա</option>

</select></div>
        
                <table width="100%" cellpadding="0" cellspacing="1" class="table1" style="margin: 0">
      <tr>
        <th width="20%" height="41">������</th>
        <th width="20%">�˻���</th>
        <th width="20%"><span class="heardertop1">�����˺�</span></th>
        <th width="20%"><span class="heardertop1">������</span></th>
        <th width="20%"><span class="heardertop1">�ύ���֪ͨ��</span></th>
  <?php foreach($vd['bank'] as $item) { ?>
  <?php if($item['AccountNO'] != ''){ ?>
	    <tr class="trd">
        <td><?php echo $item['AccountBranch']; ?></td>
        <td><?php echo $item['AccountName']; ?></td>
        <td align=left><?php echo $item['AccountNO']; ?></td>
        <td><?php echo $item['Address']; ?></td>
        <td><a href="index.php?m=mod_agent&amp;c=Remit&amp;a=Add&amp;id=<?php echo $item['id']; ?>">
                            �ύ���֪ͨ</a></td>
      </tr>
      <?php } ?>
	  <?php } ?>
    </table>           
	        <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/jquery.js"></script>

    </form>

    <script language="javascript" type="text/javascript" src="http://www.elingka.com/js/select.js"></script> 
</body>
</html>