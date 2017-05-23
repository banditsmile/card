<?php if($vd['quick']==0){ ?>
<table>
<tr>
  <td width="67px" align="right" style="padding-top:6px">订单号：</td>
  <td width="283px"><span class="dollars"><?php echo $vd['ordno']; ?></span></td>
</tr>
<tr>
  <td width="67px" align="right" style="padding-top:3px">支付方式：</td>
  <td width="283px">
  <span>应付总价：</span><span class="dollars" id="finaldollars"><?php echo $vd['dollars']; ?></span><span class="dollars"><?php echo $vd['lang']['moneyunit']; ?></span> 手续费：<span id="fee" class="dollars">0%</span>
  </td>
</tr>
<tr>
  <td width="67px" align="right">提示：</td>
  <td width="283px">
    <?php if($vd['islogin'] == 1) { ?>
    <input type="radio" name="ebank" value="accountform" onclick="EBankCheck(this)"/>账户余额支付 <span class="textgray">(<span class="dollars" id="accountformfee">0%</span>手续费)</span>
    <form id="accountform" action="<?php echo $vd['root']; ?>index.php?m=mod_b2c&c=order&paycode=acount" method="post" target='_blank'>
      <input type="hidden" name="billno" value="<?php echo $vd['ordno']; ?>" />
      <input type="hidden" name="ebankcode" value="0" />
      <input type="hidden" id="accountformamount" name="amount" value="<?php echo $vd['dollars']; ?>" />
      <span id="accountformtip" style="display:none">请确保您在本站的账户有足够的余额，否则无法支付成功</span>
    </form><p></p>
    <?php } ?>
    <?php echo $vd['retv']; ?>
    <div style="border:1px dashed #BDE3F6;background:#FFFFD8;width:235px;padding:10px"><span id="tip">请确保您已经在银行网站上开通了网上支付功能，否则将无法支付成功。<a href="">如何开通?</a> </span></div>
    <br />
    <input type="image" src="<?php echo $vd['content']; ?>images/pay3.gif" onclick="EBankPay()"/>
    <div id="HintConfirm"><input type="checkbox" id="HintButton"/>重下订单/取消</div>
  </td>
</tr>
<table>
<?php }else{ ?>

<table<?php if($vd['isautopay'] == 1) { ?> style="display:none"<?php } ?>>
<tr>
  <td width="67px" align="right" style="padding-top:6px;height:25px;">订单号：</td>
  <td width="283px"><span class="dollars"><?php echo $vd['ordno']; ?></span></td>
</tr>
<tr>
  <td width="67px" align="right" style="padding-top:3px;height:25px;">应付总价：</td>
  <td width="283px">
  <span></span><span class="dollars" id="finaldollars"><?php echo $vd['dollars']; ?></span><span class="dollars"><?php echo $vd['lang']['moneyunit']; ?></span>(含手续费) 手续费：<span id="fee" class="dollars">0%</span>
  </td>
</tr>
<tr style="display:none">
  <td width="67px" align="right">提示信息：</td>
  <td width="283px">
    <?php if($vd['islogin'] == 1) { ?>
    <input type="radio" name="ebank" value="accountform" onclick="EBankCheck(this)"/>账户余额支付 <span class="textgray">(<span class="dollars" id="accountformfee">0%</span>手续费)</span>
    <form id="accountform" action="<?php echo $vd['root']; ?>index.php?m=mod_b2c&c=order&paycode=acount" method="post" target='_blank'>
      <input type="hidden" name="billno" value="<?php echo $vd['ordno']; ?>" />
      <input type="hidden" name="ebankcode" value="0" />
      <input type="hidden" id="accountformamount" name="amount" value="<?php echo $vd['dollars']; ?>" />
      <span id="accountformtip" style="display:none">请确保您在本站的账户有足够的余额，否则无法支付成功</span>
    </form><p></p>
    <?php } ?>
    <?php echo $vd['retv']; ?>
    <div style="border:1px dashed #BDE3F6;background:#FFFFD8;width:235px;padding:10px"><span id="tip">请确保您已经在银行网站上开通了网上支付功能，否则将无法支付成功。<a href="">如何开通?</a> </span></div>
  </td>
</tr>
<tr>
  <td width="67px" align="right" height="90px"></td>
  <td width="283px">
    <input type="image" src="<?php echo $vd['content']; ?>images/pay3.gif" onclick="EBankPay()"/>
    <div id="HintConfirm"><input type="checkbox" id="HintButton"/>重下订单/取消</div>
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
