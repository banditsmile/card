<?php if($vd['quick']==0){ ?>
<table>
<tr>
  <td width="67px" align="right" style="padding-top:6px">�����ţ�</td>
  <td width="283px"><span class="dollars"><?php echo $vd['ordno']; ?></span></td>
</tr>
<tr>
  <td width="67px" align="right" style="padding-top:3px">֧����ʽ��</td>
  <td width="283px">
  <span>Ӧ���ܼۣ�</span><span class="dollars" id="finaldollars"><?php echo $vd['dollars']; ?></span><span class="dollars"><?php echo $vd['lang']['moneyunit']; ?></span> �����ѣ�<span id="fee" class="dollars">0%</span>
  </td>
</tr>
<tr>
  <td width="67px" align="right">��ʾ��</td>
  <td width="283px">
    <?php if($vd['islogin'] == 1) { ?>
    <input type="radio" name="ebank" value="accountform" onclick="EBankCheck(this)"/>�˻����֧�� <span class="textgray">(<span class="dollars" id="accountformfee">0%</span>������)</span>
    <form id="accountform" action="<?php echo $vd['root']; ?>index.php?m=mod_b2c&c=order&paycode=acount" method="post" target='_blank'>
      <input type="hidden" name="billno" value="<?php echo $vd['ordno']; ?>" />
      <input type="hidden" name="ebankcode" value="0" />
      <input type="hidden" id="accountformamount" name="amount" value="<?php echo $vd['dollars']; ?>" />
      <span id="accountformtip" style="display:none">��ȷ�����ڱ�վ���˻����㹻���������޷�֧���ɹ�</span>
    </form><p></p>
    <?php } ?>
    <?php echo $vd['retv']; ?>
    <div style="border:1px dashed #BDE3F6;background:#FFFFD8;width:235px;padding:10px"><span id="tip">��ȷ�����Ѿ���������վ�Ͽ�ͨ������֧�����ܣ������޷�֧���ɹ���<a href="">��ο�ͨ?</a> </span></div>
    <br />
    <input type="image" src="<?php echo $vd['content']; ?>images/pay3.gif" onclick="EBankPay()"/>
    <div id="HintConfirm"><input type="checkbox" id="HintButton"/>���¶���/ȡ��</div>
  </td>
</tr>
<table>
<?php }else{ ?>

<table<?php if($vd['isautopay'] == 1) { ?> style="display:none"<?php } ?>>
<tr>
  <td width="67px" align="right" style="padding-top:6px;height:25px;">�����ţ�</td>
  <td width="283px"><span class="dollars"><?php echo $vd['ordno']; ?></span></td>
</tr>
<tr>
  <td width="67px" align="right" style="padding-top:3px;height:25px;">Ӧ���ܼۣ�</td>
  <td width="283px">
  <span></span><span class="dollars" id="finaldollars"><?php echo $vd['dollars']; ?></span><span class="dollars"><?php echo $vd['lang']['moneyunit']; ?></span>(��������) �����ѣ�<span id="fee" class="dollars">0%</span>
  </td>
</tr>
<tr style="display:none">
  <td width="67px" align="right">��ʾ��Ϣ��</td>
  <td width="283px">
    <?php if($vd['islogin'] == 1) { ?>
    <input type="radio" name="ebank" value="accountform" onclick="EBankCheck(this)"/>�˻����֧�� <span class="textgray">(<span class="dollars" id="accountformfee">0%</span>������)</span>
    <form id="accountform" action="<?php echo $vd['root']; ?>index.php?m=mod_b2c&c=order&paycode=acount" method="post" target='_blank'>
      <input type="hidden" name="billno" value="<?php echo $vd['ordno']; ?>" />
      <input type="hidden" name="ebankcode" value="0" />
      <input type="hidden" id="accountformamount" name="amount" value="<?php echo $vd['dollars']; ?>" />
      <span id="accountformtip" style="display:none">��ȷ�����ڱ�վ���˻����㹻���������޷�֧���ɹ�</span>
    </form><p></p>
    <?php } ?>
    <?php echo $vd['retv']; ?>
    <div style="border:1px dashed #BDE3F6;background:#FFFFD8;width:235px;padding:10px"><span id="tip">��ȷ�����Ѿ���������վ�Ͽ�ͨ������֧�����ܣ������޷�֧���ɹ���<a href="">��ο�ͨ?</a> </span></div>
  </td>
</tr>
<tr>
  <td width="67px" align="right" height="90px"></td>
  <td width="283px">
    <input type="image" src="<?php echo $vd['content']; ?>images/pay3.gif" onclick="EBankPay()"/>
    <div id="HintConfirm"><input type="checkbox" id="HintButton"/>���¶���/ȡ��</div>
  </td>
</tr>
<table>
<?php if($vd['isautopay'] == 1) { ?>
<script type="text/javascript">
  mpaycode = "<?php echo $vd['thispaycode']; ?>";
  if(mpaycode == "acount")
  {
    document.getElementById("accountform").target = "_top";
    document.getElementById("accountform").submit();
  }
  else
  {
    document.getElementById(mpaycode+"form").target = "_top";
    document.getElementById(mpaycode+"form").submit();
  }
  
  

</script>
<?php } ?>
<?php } ?>
