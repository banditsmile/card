<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>�¼��ͻ���������</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link href="../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../index/css/page.css" type="text/css" rel="stylesheet" />
<body class="mainbg">
<div class="new_qie">
  <div class="new_qie2">
    <h2> ���߳�ֵ</h2>
    <span class="setup_index">
      <input id="lbtnLogin" type="checkbox" name="lbtnLogin" checked="checked">
      <label for="lbtnLogin">��¼����ҳ</label>
    </span> </div>
  <ul>
    <li> <a id="lbtn21" class="on" href="#">���߳�ֵ</a></li>
    <li> <a id="lbtn22" href="../index.php?m=mod_agent&c=Funds&a=BankFunds">���л���ֵ</a></li>
    <li> <a id="lbtn23" href="../index.php?m=mod_agent&c=Funds&a=YktFunds">��ֵ����ֵ</a></li>
  </ul>
</div>
<script type="text/javascript">
		function setpaycode(obj)
    {
    	$("mypaycode").value = obj.value;
    }
    
    var lowfunds = <?php echo isset($vd['rights'][3]) ? $vd['rights'][3] : 0; ?>
    
    function checksubmit()
    {
    	vdollars   = $("ubzdollars").value;
    	vmypaycode = $("mypaycode").value;
    	
    	if(vdollars == "")
    	{
    		alert("���������ֵ���");
    		$("ubzdollars").focus();
    		return false;
    	}
    	
    	if(vdollars < lowfunds)
    	{
    		alert("���ã�����ͱ����" + lowfunds);
    		$("ubzdollars").value = lowfunds;
    		$("ubzdollars").focus();
    		return false;
    	}
    	
    	if(vmypaycode == "")
    	{
    		alert("����ѡ��֧����ʽ");
    		return false;
    	}
    	
    	return true;
    }
	</script>
	<style type="text/css">
  .c3{border:0px solid #E5E5E5;margin:2px 0;width:100%;}
  .c3 p{float:left;width:25%;padding:5px 0px;height:25px;border-bottom:1px solid #F3F3F3;}
  .c3 p img {margin:0px 5px 0 0px;}
  .c3 input{vertical-align:middle}
  .c3 img{vertical-align:middle}
  .c3 label{vertical-align:middle;margin-top:3px}
  
  .c4{border:0px solid #E5E5E5;margin:0px 0;width:100%;}
  .c4 p{float:left;width:25%;padding:5px 0px;padding-bottom:0px}
  .c4 input{vertical-align:middle}
  .c4 label{vertical-align:middle;}
	</style>
	<div class="main5" id="main5">
		<ul class="block"><li>
			<form name="payment" method="post" action="index.php?m=mod_agent&c=Funds&a=Pay" target="_bank">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td class="tableleft">
				<input id="mypaycode" name="mypaycode" type="hidden" value=""/>
    <table cellspacing="1" cellpadding="2" class="table5">
					<?php $f=0;if(isset($vd['mainpay'])){ ?>
          <?php if($vd['mainpay'] == 'tenpay'){ ?>
          <tr>
            <td width="22%" height="30" class="td_left"><div align="right">�������п�֧����</div></td>
            <td width="78%" class="tableright1">
            	<div class="c3" style="height:110px">
                            <div align="left">
                              <?php $alipayarrays = array('1001','1002','1003','1004','1005','1006','1008','1009','1032','1033','1028'); ?>
                              <?php $i=0;foreach($alipayarrays as $bi){ ?>
                            </div>
                            <p align="left"><input id="tenpay_<?php echo $bi; ?>" type="radio" name="paycode" onClick="setpaycode(this)"  value="tenpay_<?php echo $bi; ?>" />
					        <label for="tenpay_1005"><img src="<?php echo $vd['content']; ?>images/<?php echo $bi; ?>.gif"  align="absmiddle" /></label></p>
					      	<div align="left">
					      	  <?php $i++; ?>
					      	  <?php } ?>
   	                  </div>
            	</div>            </td>
          </tr>
          <?php $f=1;}else if($vd['mainpay'] == 'alipay'){ ?>
          <tr>
            <td width="22%" height="30" class="td_left"><div align="right">�������п�֧����</div></td>
            <td width="78%" class="tableright1">
            	<div class="c3" style="height:112px">
            		        <div align="left">
            		          <?php $alipayarrays = array('ICBCB2C','CMB','CCB','ABC','SPDB','CMBC','COMM','CIB','GDB','SDB','POSTGC','CITIC','ICBCBTB','SPDBB2B'); ?>
            		          <?php $i=0;foreach($alipayarrays as $bi){ ?>
          		          </div>
            		        <p align="left"><input id="bankpay_<?php echo $i; ?>" type="radio" name="paycode" onClick="setpaycode(this)" checked value="alipay_<?php echo $bi; ?>" />
					      	<label for="bankpay_<?php echo $i; ?>"><img src="<?php echo $vd['content']; ?>images/<?php echo strtolower($bi).'.gif'; ?>" width="128" height="20" align="absmiddle"></label></p>
					      	<div align="left">
					      	  <?php $i++; ?>
					      	  <?php } ?>
   	                  </div>
            	</div>            </td>
          </tr>
          <?php $f=1;} ?>
          <?php } ?>
          <?php if(count($vd['cardpay']) > 0){ ?>
          <tr>
            <td width="22%" height="30" class="td_left"><div align="right">�ֻ���/��Ϸ��֧����</div></td>
            <td width="78%" class="tableright1">
            	<div class="<?php if(count($vd['cardpay']) > 4){ ?>c3<?php }else{ ?>c4<?php } ?>" style="height:<?php echo (count($vd['cardpay'])+3)/4 * 30 ?>px">
            		<div align="left">
            		  <?php foreach($vd['cardpay'] as $pay){ ?>
          		      </div>
            		<p align="left"><input type="radio" name="paycode" onClick="setpaycode(this)"  value="<?php echo $pay['paycode']; ?>_<?php echo $pay['other']; ?>"/> <label><?php echo $pay['payType']; ?></label></p>
                    <div align="left">
                      <?php } ?>
                      </div>
            	</div>            </td>
          </tr>
          <?php $f=1;} ?>
          <?php if(count($vd['otherpay']) > 0){ ?>
          <tr>
            <td width="22%" height="131" class="td_left"><div align="right">������֧����</div></td>
            <td width="78%" class="tableright1">
            	<div class="<?php if(count($vd['otherpay']) > 4){ ?>c3<?php }else{ ?>c4<?php } ?>" style="height:<?php echo (count($vd['cardpay'])+3)/4 * 45 ?>px">
            		<div align="left">
            		  <?php foreach($vd['otherpay'] as $pay){ ?>
          		      </div>
            		<p align="left">
            		  <input type="radio" name="paycode" onClick="setpaycode(this)"  value="<?php echo $pay['paycode']; ?>" />
            		  <label for="tenpay"><img src="<?php echo $vd['content']; ?>images/<?php echo $pay['paycode']; ?>.gif" alt="������֧��"  align="absmiddle" /></label>
            		
            		<p align="left">&nbsp;</p>
            		<div align="left">
                      <?php } ?>
                      </div>
            	</div>            </td>
          </tr>
          <?php $f=1;} ?>
          <?php if($f==1){ ?>
					<tr>
					<td height="49" class="td_left"><div align="right">֧����</div></td>
					<td class="tableright1"><div align="left">
				      <input type="text" name="ubzdollars" size='10' value="500.00" class='input_money' style="margin:5px;" /> <?php if(isset($vd['rights'][3]) && $vd['rights'][3] > 0){ ?> ��ͳ� <font color="#ff0000"><b><?php echo $vd['rights'][3]; ?></b></font> <?php } ?></td>
					</tr>
					<tr>
					<td height="30" class="td_left"><div align="right"></div></td>
					<td class="tableright1" style="padding:5px"><div align="left">
					  <input name="submit" type="submit" class="tijiao_input" value="ȷ��֧��">
					</div></td>
					</tr>
					<?php }else{ ?>
          <tr> 
            <td colspan="2">���ã�ϵͳ����Ա��δ�����������߸���</td>
          </tr>
          <?php } ?>
          <?php if(isset($vd['bankalert']) && $vd['bankalert'] != ''){ ?>
          <tr> 
            <td class="td_left">��ֵע�����</td>
            <td class="tishdsdsi3"  style="color:#ff0000"> 
              <div align="left">��<?php echo $vd['bankalert']; ?>            </div></td>
          </tr>
          <?php } ?>
				</table>
				</td>
			</tr>
		</table>
		</form>
		</li></ul>
	
</div>
</body>
</html>
