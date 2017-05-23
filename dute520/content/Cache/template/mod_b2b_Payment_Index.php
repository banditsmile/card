<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xn2010.com/KH9AJL2_4HA26S/css/style2.css"/>
</div>
<div class="title"> 您的位置：常规管理 &gt; 支付管理</div>
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>
<div class="cwarpper1">
  <?php
$yeepay_frd = array(
array('code'=>'','name'=>'所有卡种(包括银行卡)'),
array('code'=>'SZX-NET','name'=>'神州行'),
array('code'=>'UNICOM-NET','name'=>'联通卡'),
array('code'=>'QQCARD-NET','name'=>'Q币支付'),
array('code'=>'SNDACARD-NET','name'=>'盛大卡'),
array('code'=>'JUNNET-NET','name'=>'骏网一卡通'),
array('code'=>'ZHENGTU-NET','name'=>'征途卡'),
array('code'=>'YPCARD-NET','name'=>'易宝一卡通'),
array('code'=>'LIANHUAOKCARD-NET','name'=>'联华OK卡')
);
?>
<div id="alipay" style="display:none">
  <form name="form1" method="post" action="index.php?m=mod_b2b&c=Payment&a=Create">
  <table border="1" class="ctable" bordercolor="#ededed">
    <tr>
      <td align="center" height="35" colspan="2" class="listhead" style="text-align:left;font-weight:bold;font-size:16px;padding-left:10px;color:#ff0000">
      <img src="<?php echo $vd['sc']; ?>images/add.gif" style="vertical-align:middle" border="0"/> 添加网关
      </td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">网关</div></td>
      <td class="buyrt">
        <select size="1" id="alipaytype" name="paytype" onchange="set(this)">
          <option value="chinabank|网银中国">网银中国</option>
          <option value="tenpay|财付通">财付通</option>
          <option value="alipay|支付宝">支付宝</option>
          <option value="paypal|贝宝">贝宝</option>
          <option value="yeepay|易宝">易宝</option>
          <option value="cncard|云网支付">云网支付</option>
          <option value="paydollar|paydollar支付">paydollar</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">支付宝帐户</div></td>
      <td class="buyrt"><input name="paymerchant" type="text" style="width:160px;"></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">安全检验码(key)</div></td>
      <td class="buyrt"><input name="paykey" type="text" style="width:160px;"></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">合作者身份(PID)</div></td>
      <td class="buyrt"><input name="other" type="text" style="width:160px;"></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">手续费</div></td>
      <td class="buyrt"><input name="payfee" type="text" style="width:30px;"> <b>%</b></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">使用</div></td>
      <td class="buyrt"><input name="payopen" type="checkbox" value="1" class="checkbox" onFocus="this.blur()"></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center">默认</div></td>
      <td class="buyrt"><input name="isdefault" type="checkbox" value="1" class="checkbox" onFocus="this.blur()"></td>
    </tr>
    <tr>
      <td class="buylt"><div align="center"></td>
      <td class="buyrt">
        <input type="submit" name="Submit" value="添 加 &gt;&gt;" class="button">
        <input type="reset"   value="重 填 &gt;&gt;" class="button"/>
      </td>
    </tr>
  </table>
  </form>
  </div>   
<?php foreach($vd['payment'] as $pay) { ?>
<?php if($pay['payType'] == '支付宝'){ ?>
<form name="form1" method="post" action="index.php?m=mod_b2b&c=Payment&a=Update&id=<?php echo $pay['id']; ?>">
            <table width="20%" cellpadding="0" cellspacing="1" class="page_table4">
  <tr>
                    <td colspan="2" width="50%" class="table_top" style="text-align: left">
      <input type="hidden" name="paytype" value="<?php echo $pay['paycode']; ?>|<?php echo $pay['payType']; ?>"/>
    支付宝</td>
  </tr>
  <tr> 
    <td width="18%" class="buylt">
      <div align="right">支付宝帐户</div></td>
    <td width="82%" class="buyrt">
      <div align="left">
        <input name="paymerchant" type="text" style="width:160px;" value="<?php echo $pay['payMerchant']; ?>">    
      </div></td>
  </tr>
  <tr>
    <td class="buylt"> 
      <div align="right">安全检验码(key)</div></td>
    <td class="buyrt"> 
      <div align="left">
        <input name="paykey" type="password" style="width:160px;" value="<?php echo $pay['payKey']; ?>">    
      </div></td>
  </tr>
  <tr>
    <td class="buylt"> 
      <div align="right">合作者身份(PID)</div></td>
    <td class="buyrt"> 
      <div align="left">
        <input name="other" type="password" style="width:160px;" value="<?php echo $pay['other']; ?>">    
      </div></td>
  </tr>
  <tr> 
    <td class="buylt"> 
      <div align="right">手续费</div></td>
    <td class="buyrt"> 
      <div align="left">
        <input name="payfee" type="text" size="10" style="width:30px" value="<?php echo $pay['payfee'] * 100; ?>"> 
        <b>%</b> </div></td>
  </tr>
  <tr> 
    <td class="buylt"> 
      <div align="right">使用</div></td>
    <td class="buyrt"> 
          <div align="left"><input name="payopen" type="checkbox" class="checkbox" value="1" onFocus="this.blur()" <?php if($pay['payOpen'] == '1'){ ?> checked <?php } ?>/>    </td>
  </tr>
  <tr>
    <td class="buylt"><div align="right">默认</div></td>
     <td class="buyrt"><div align="left">
<input name="isdefault" type="checkbox" value="1" class="checkbox" onFocus="this.blur()" <?php if($pay['isdefault'] == '1'){ ?> checked <?php } ?>></td>
  </tr>
  <tr>
    <td class="buylt" height="34"><div align="right"></div></td>
    <td class="buyrt"><input type="submit" value="确认修改" class="tijiao_input"/></td>
  </tr>
</table>
</form>
<?php }else{ ?>
<form name="form1" method="post" action="index.php?m=mod_b2b&c=Payment&a=Update&id=<?php echo $pay['id']; ?>">
            <table width="20%" cellpadding="0" cellspacing="1" class="page_table4">
  <tr>
    <td colspan="2" class="table_top" style="text-align: left"><?php  echo $pay['payType']; ?>
      <input type="hidden" name="paytype" value="<?php echo $pay['paycode']; ?>|<?php echo $pay['payType']; ?>"/>    </td>
  </tr>
  <tr> 
    <td width="18%" class="buylt">
      <div align="right">商户</div></td>
    <td width="82%" class="buyrt">
      <input name="paymerchant" type="text" style="width:160px;" value="<?php echo $pay['payMerchant']; ?>">    </td>
  </tr>
  <tr>
    <td class="buylt"> 
      <div align="right">密钥</div></td>
    <td class="buyrt"> 
      <input name="paykey" type="password" style="width:160px;" value="<?php echo $pay['payKey']; ?>">    </td>
  </tr>
  <tr id="othertr" style="<?php if($pay['paycode'] != 'yeepay'){ ?>display:none<?php } ?>">
    <td class="buylt"><div align="right">支付通道</div></td>
    <td class="buyrt">
      <select size="1" name="other">
        <?php (Option($yeepay_frd, $pay['other'], 'name', 'code')); ?>
      </select>    </td>
  </tr>
  <tr> 
    <td class="buylt"> 
      <div align="right">手续费</div></td>
    <td class="buyrt"> 
      <input name="payfee" type="text" size="10" style="width:30px" value="<?php echo $pay['payfee'] * 100; ?>"> <b>%</b>    </td>
  </tr>
  <tr> 
    <td class="buylt"> 
      <div align="right">使用</div></td>
    <td class="buyrt"> 
      <input name="payopen" type="checkbox" class="checkbox" value="1" onFocus="this.blur()" <?php if($pay['payOpen'] == '1'){ ?> checked <?php } ?>>    </td>
  </tr>
  <tr>
    <td class="buylt"><div align="right">默认</div></td>
     <td class="buyrt"><input name="isdefault" type="checkbox" value="1" class="checkbox" onFocus="this.blur()" <?php if($pay['isdefault'] == '1'){ ?> checked <?php } ?>></td>
  </tr>
  <tr>
    <td class="buylt" height="50px"><div align="right"></div></td>
    <td class="buyrt"><input name="submit" type="submit" class="tijiao_input" value="确认修改"/>
      </td>
  </tr>
</table>
</form>
<?php } ?>
<?php } ?>
</div>
<div class="cbodyFoot"></div>
</div>
<div id="opcontent" style="display:none">
  <div class="optxt">
  </div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/JavaScript">
function set(obj){
    var pay = obj.options[obj.selectedIndex].value;
    sel = obj.selectedIndex;
    var flag = 0;
    if(pay == "alipay|支付宝")
    {
      flag = 1;
      var alipaytype = $('alipaytype');
      alipaytype.selectedIndex = sel;
    }
    else
    {
      flag = 0;
      var mypaytype = $('thispaytype');
      mypaytype.selectedIndex = sel;
      
      if(pay == "yeepay|易宝")
      {
        $("othertr").style.display = "";
      }
      else
      {
        $("othertr").style.display = "none";
      }
      
      
    }

    var objshow = flag ? $('alipay') : $('notalipay');
    var objhide = flag ? $('notalipay') : $('alipay');
    objshow.style.display = "";
    objhide.style.display = "none";
  }
</script>
</body>
</html>
