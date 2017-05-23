<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<?php echo $vd['web']['keywords']; ?>" />
<meta http-equiv="Description" content="<?php echo $vd['web']['description']; ?>" />
<title><?php echo $vd['web']['title']; ?></title>
<link rel="stylesheet" type="text/css" href="../index/css/ub-buy.css" />
<script type="text/javascript">
  function $(id){
    return document.getElementById(id);
  }
</script>
</head> 
<?php $item = $vd['item']; ?>
<input type="hidden" id="webdir" name="webdir" value="<?php echo $vd['root']; ?>"/>
<input type="hidden" id="platform" value="b2b"/>
<body class="mainbg">
  <table class="contentTable" border="1" style="margin-bottom:5px">
    <tr>
      <td colspan="4" class="tabletitle" style="height:20px"><span class="gouka">购卡填单</span></td>
    </tr>
  </table>
  <form name="submitform" id="submitform" method="post" action="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=<?php if($vd['scoredpid']==0){ ?>pay<?php }else{ ?>ScoredPay<?php } ?>" onsubmit="return checksubmit()">
  <table class="contentTable1" border="1" style="margin:0 auto">
    <tr>
      <td class="buylt">商品名称：</td>
      <td class="buyrt"><a href="javascript:toggle('0','0','cp');"><b><?php echo $item['pname']; ?></b><img src="<?php echo $vd['content']; ?>images/icon_pkf.gif" border=0></a></td>
    </tr>
    <tr style="display:none">
      <td class="buylt">商品面值：</td>
      <td class="buyrt">
        <?php echo $vd['lang']['moneysymbol']; ?><?php echo $item['listprice']; ?><?php echo $vd['lang']['moneyunit']; ?>
      </td>
    </tr>
    <tr>
      <td class="buylt">进货价：</td>
      <td class="buyrt"><font color="#ff0000" onmouseover="showcprice(1)" onmouseout="showcprice(0)">鼠标移此</font> <span id="cprice" class="cprice" style="display:none">读取中..</span>
      <div id="cp0" style="display:none;" class="cpxx">
      <div id="cpinfo"><div class="cp"><span><a href="javascript:toggle('0','0','cp');"><img src="<?php echo $vd['content']; ?>images/destroy.gif" border="0" align="absmiddle"/></a></span><img src="<?php echo $vd['content']; ?>images/icon_p.gif" align="absmiddle"> 商品信息</div>
      <p><b>商品简介：</b><?php (ubbcode($item['pdesc'], $vd)); ?><br/>
      <b>官方网址：</b><a href="<?php echo $item['czweb']; ?>" target="_blank"><?php echo $item['web']; ?></a><br/>
      <b>充值网址：</b><a href="<?php echo $item['czweb']; ?>" target="_blank"><?php echo $item['czweb']; ?></a><br/></p>
      </div></div>
      </td>
    </tr>
    <tr>
      <td class="buylt">商品类型：</td>
      <td class="buyrt"><?php (ProductType($item['ptype'])); ?></td>
    </tr>
    <tr style="display:none">
      <td class="buylt">库存状态：</td>
      <td class="buyrt"><span id="thisstock">读取中..</span></td>
    </tr>
    <?php if( $item['ptype'] == 1 || $item['ptype'] == 2){ ?>
    <tr>
      <td class="buylt">充值<?php echo $item['idlable']; ?>：</td>
      <td class="buyrt"><input id="ubzczacount" name="ubzczacount" type="text"  class="input"/> *</td>
    </tr>
    <tr>
      <td class="buylt">重复<?php echo $item['idlable']; ?>：</td>
      <td class="buyrt"><input id="ubzreczacount" name="ubzreczacount" type="text"  class="input" /> *</td>
    </tr>
    <?php } ?>
    
    <input type="hidden" id="ubztpl" value="<?php echo $vd['item']['cztpl']; ?>" />
    
    <?php if( isset($vd['xml']) && $vd['xml'] == 1){ ?>
    
    <?php if($vd['vip'] > 0){ ?>
    <?php $sc=str_replace(VROOT.'/','',$vd['sc']); ?>
    <?php }else{ ?>
    <?php $sc=$vd['sc']; ?>
    <?php } ?>
    <input type="hidden" id="ubzsystpl" value="<?php echo $vd['item']['syscztpl']; ?>" />
    <input type="hidden" id="tpldir" value="<?php echo $vd['root']; ?><?php echo $sc; ?>" />
    <script type="text/javascript" src="<?php echo $vd['root']; ?><?php echo $sc; ?>systpl/czui.js"></script>
    <?php } ?>
    
    <?php if( isset($vd['extcontent']) ){ ?>
    <?php echo $vd['extcontent']; ?>
    <?php } ?>
    <?php if( isset($vd['tplcontent']) ){ ?>
    <?php echo $vd['tplcontent']; ?>
    <?php } ?>
    
    <?php if( $item['ptype'] == 3 && $item['disparea'] == 1 ){ ?>
    <tr>
      <td class="buylt">选择<?php echo $item['idlable']; ?>：</td>
      <td class="buyrt">
      <div id="cardsdiv">
      	<?php if(count($vd['cardrs']) == 0){ ?>
      	库存已经没有号码可选
      	<?php }else{ ?>
      	<?php foreach($vd['cardrs'] as $carditem){ ?>
      	<div><input id="ubzczacount" name="ubzczacount" type="radio" value="<?php echo $carditem; ?>"/><?php echo $carditem; ?></div>
      	<?php } ?>
      	<?php } ?>
      </div>
      <select style="display:none" id="ubzqty" name="ubzqty"><option value="1">1</option></select>
      </td>
    </tr>
    <?php }else{ ?>
    <?php if(!isset($vd['xml']) || (isset($vd['xml'])&&$vd['xml']==0)){ ?>
    <tr>
      <td class="buylt">购买数量：</td>
      <td class="buyrt">
      	<select name="ubzqty" id="ubzqty" onchange="ChangeNum()">
      		<option value="0">请选择</option>
      		<?php if( isset($vd['qtylist']) ){ ?>
          <?php echo $vd['qtylist']; ?>
          <?php } ?>
      	</select>&nbsp;<?php if(isset($item['buyaday']) && $item['buyaday'] > 0){ ?><font color="#ff0000"><b>每天最多购买 <?php echo $item['buyaday']; ?> 个</b></font><?php } ?>&nbsp;
      </td>
    </tr>
    <?php } ?>
    <?php } ?>
    <?php if(isset($vd['info']['qtyctrl']) && $vd['info']['qtyctrl'] == 1){ ?>
    <tr>
      <td class="buylt">注意：</td>
      <td class="buyrt" style="color:#ff0000">
      <?php if( $vd['info']['qtylist'] != ''){ ?>
              支持购买数量：<b><?php echo $vd['info']['qtylist']; ?></b>
            <?php }else{ ?>
              单次最小数量：<b><?php echo $vd['info']['qtymin']; ?></b>&nbsp;单次最大数量：<b><?php echo $vd['info']['qtymax']; ?></b>
            <?php } ?>
      </td>
    </tr>
    <?php } ?>
    <?php if( $item['ptype'] == 0 ){ ?>
    <tr>
      <td class="buylt">购后动作：</td>
      <td class="buyrt">
        <input type="radio" name="getatonce" value="0" checked> 购后取卡
        &nbsp;<?php if($item['quickuse']==1 && $item['quickusetime'] > 0){ ?><font color="#ff0000"><b>请购买后<?php echo $item['quickusetime']; ?>小时内使用</b></font><?php } ?>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="buylt">购卡备注：</td>
      <td class="buyrt"><textarea name="others" wrap="VIRTUAL" rows="3" scrolling="yes" style="padding:5px;width:213px"></textarea></td>
    </tr>
    <tr id="tradepwdtr" style="display:none">
      <td class="buylt">交易密码：</td>
      <td class="buyrt"><input type="password" id="tradepwd" name="tradepwd" size="16" class="input"/></td>
    </tr>
    <tr>
      <td class="buylt">售玩家单价：</td>
      <td class="buyrt"><input type="text" id="priceforplayer" name="priceforplayer" value="<?php echo $item['listprice']; ?>" style="width:100px;background:#f0f0f0" onkeyup="ChangeNum()" class="input" readOnly /> <?php echo $vd['lang']['moneyunit']; ?></td>
    </tr>
    <tr>
      <td class="buylt">应收玩家金额：</td>
      <td class="buyrt"><input type="text" id="dollarsforplayer"  name="dollarsforplayer" value="<?php echo $item['listprice']; ?>" style="width:100px;background:#f0f0f0" class="input" readOnly /> <?php echo $vd['lang']['moneyunit']; ?></td>
    </tr>
    <?php if($vd['scoredpid'] == 0 && $item['scored'] > 0){ ?>
    <tr>
      <td class="buylt">赠送积分：</td>
      <td class="buyrt"><input type="hidden" id="cscored"  name="cscored" value="<?php echo $item['scored']; ?>" style="width:100px" /> <input type="text" readonly id="scored"  name="scored" value="<?php echo $item['scored']; ?>" style="width:100px" class="input"/> 点</td>
    </tr>
    <?php } ?>
    <?php if($vd['scoredpid'] > 0){ ?>
    <tr>
      <td class="buylt">所需积分：</td>
      <td class="buyrt">
        <input type="hidden" id="scored" readonly name="scored" value="<?php echo $vd['cp']['scored']; ?>" style="width:100px"/>
        <input type="text" id="needscored" readonly name="needscored" value="<?php echo $vd['cp']['scored']; ?>" style="width:100px"/> 点
      </td>
    </tr>
    <tr>
      <td class="buylt">用户当前积分：</td>
      <td class="buyrt"><b><?php echo $vd['ainfo']['scored']; ?></b> 点</td>
    </tr>
    <?php } ?>
    <?php if( $item['buylit'] == 1 ){ ?>
    <?php $proptmp=array();if(isset($item['prop']) && $item['prop'] != ''){;$proptmp = unserialize($item['prop']);} ?>
    <tr>
      <td class="buylt"><?php if(isset($proptmp['buylitobject']) && $proptmp['buylitobject']==0){ ?>禁止购买<?php }else{ ?>开放购买<?php } ?>：</td>
      <td class="buyrt">
      <font color="#ff0000"><b>每天<?php echo $item['buylitstardate']; ?>时到<?php echo $item['buylitenddate']; ?></b></font> <font color="#0000ff"><b><?php if(isset($proptmp['buylitobject']) && $proptmp['buylitobject']==0){ ?>禁止购买<?php }else{ ?>开放购买<?php } ?></b></font>
      </td>
    </tr>
    <?php } ?>
  </table>
  <input id="ubzcprice" name="oneprice" type="hidden" />
  <input id="ubzdollars" name="ubzdollars" type="hidden" />
  <input id="tprice" name="tprice" type="hidden" />
  <input id="ubzptype" name="ubzptype" type="hidden" value="<?php echo $item['ptype']; ?>"/>
  <input id="ubzpid" name="ubzpid" type="hidden" value="<?php echo $item['pid']; ?>"/>
  <input id="ubzqtylist" name="ubzqtylist" type="hidden" value="<?php echo $item['qtylist']; ?>"/>
  <input id="ubzqtymin" name="ubzqtymin" type="hidden" value="<?php echo $item['qtymin']; ?>"/>
  <input id="ubzqtymax" name="ubzqtymax" type="hidden" value="<?php echo $item['qtymax']; ?>"/>
  <input id="ubzidlable" name="ubzidlable" type="hidden" value="<?php echo $item['idlable']; ?>"/>
  <input id="ubzdisparea" name="ubzdisparea" type="hidden" value="<?php echo $item['disparea']; ?>"/>
  <input id="ubzdispserv" name="ubzdispserv" type="hidden" value="<?php echo $item['dispserv']; ?>"/>
  <input id="scoredpid" name="scoredpid" type="hidden" value="<?php echo $vd['scoredpid']; ?>"/>
  <input id="ubzcname" name="ubzcname" type="hidden" value=""/>
  <input id="ubzunit" name="ubzunit" type="hidden" value="<?php echo $item['unit']; ?>"/>
  <input id="ubzmaxqty" name="ubzmaxqty" type="hidden" value="<?php echo isset($vd['info']['maxqty']) ? 1 : 0; ?>"/>
  <input id="moneyunit" name="moneyunit" type="hidden" value="<?php echo $vd['lang']['moneyunit']; ?>"/>
  <input id="moneysymbol" name="moneysymbol" type="hidden" value="<?php echo $vd['lang']['moneysymbol']; ?>"/>
<br>
<input name="Submit" type="Submit" class="button" value="<?php if($vd['scoredpid']==0){ ?>我要购买<?php }else{ ?>积分兑换<?php } ?>" id="btnsubmit">　<input name="goback" type="button" class="button" value="<?php if($vd['scoredpid']==0){ ?>购买其他<?php }else{ ?>兑换其他<?php } ?>" onclick="javascript:self.close();">
<br><br>
</form>
<?php if($item['palert'] != ''){ ?>
<style type="text/css">html,body{height:100%;}</style>
<div id="tofade" class="alertfade" > 
<div class="alertdiv">
  <div class="alerthearder" align="left"><span>购买注意事项：</span></div>
  <div class="alertcontent">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td  style="height:80px" valign="top"><p><font color=#ff0000><?php (ubbcode($item['palert'])); ?></font></p></td>
    </tr>
    <tr>
    <td align="center"><br/><input type="checkbox" name="nextnoalert" value="1" id="noalert" onclick="setpalert();"><label for="noalert" onclick="setpalert();">以后本商品的注意不再提醒</label></td>
    </tr>
    <tr>
    <td height="40" valign="middle" align="center"><input type="button" value="我知道了" onclick="resetproduct();" class="button"> <input type="button" value="放弃购买" onclick="javascript:self.close();"  class="button"></td>
    </tr>
    </table>
  </div>
</div>
</div>
<div id="fade" class="fadow"></div>
<?php } ?>
</body>
</html>
<script type="text/javascript">
  function showcprice(flag){
    $("cprice").style.display = (flag == 1)? "" : "none";
  }
  
  firstclick = 0;
  
  function checksubmit()
  {
  	if($("ubzqty"))
  	{}
    else
  	{
  		alert("请先选择充值游戏！");
      return false;
  	}
    qty = $("ubzqty").options[$("ubzqty").selectedIndex].value;
    if(qty <= 0)
    {
    	alert("请先选择数量！");
      return false;
    }
    
    <?php if( $item['ptype'] == 1 || $item['ptype'] == 2 ){ ?>
    tt1 = $("ubzczacount").value;
    tt2 = $("ubzreczacount").value;
    if(tt1 == "")
    {
      $("ubzczacount").focus();
      alert("充值帐号不能为空！");
      return false;
    }
    
    if(tt1 !== tt2)
    {
      $("ubzreczacount").focus();
      alert("两次帐号输入不一致，请重新输入");
      return false;
    }
    <?php } ?>
    <?php if( isset($vd['info']['v']) ){ ?>
      if(<?php echo $vd['info']['maxqty']; ?> < qty)
      {
        alert("平台管理员的余额不足，您无法购买这么多的商品，请重新选择\n\n或者联系管理员");
        return false;
      }
      
      <?php if(isset($vd['info']['qtyctrl']) && $vd['info']['qtyctrl'] == 1){ ?>
        <?php if( $vd['info']['qtylist'] != ''){ ?>
          spqtylist = ",<?php echo $vd['info']['qtylist']; ?>,";
          if(spqtylist.indexOf("," + qty + ",") == -1)
          {
            alert("您好，请选择含在序列 <?php echo $vd['info']['qtylist']; ?> 中的对应数量！");
            return false;
          }
        <?php }else{ ?>
          sqtymax = <?php echo $vd['info']['qtymax']; ?>;
          sqtymin = <?php echo $vd['info']['qtymin']; ?>;
          if(sqtymax < qty)
          {
            alert("您好，单次购买的最大量为 <?php echo $vd['info']['qtymax']; ?> ，请重新选择数量！");
            return false;
          }
          if(sqtymin > qty)
          {
            alert("您好，单次购买的最小量为 <?php echo $vd['info']['qtymin']; ?> ，请重新选择数量！");
            return false;
          }
        <?php } ?>
      <?php } ?>
      
      cktype = new Array("ubzcztype","ubzczarea1","ubzczarea2","ubzczother");
      <?php for($i=0;$i<4;$i++){ ?>
      <?php if( isset($vd['info']['v'][$i]) && $vd['info']['v'][$i] == 1 ){ ?>
        if($(cktype[<?php echo $i; ?>]))
        {
          if($(cktype[<?php echo $i; ?>]).value == "")
          {
            alert("请先选择<?php echo $vd['info']['txt'][$i]; ?>！");
            return false;
          }
        }
        else
        {
          alert("请先选择<?php echo $vd['info']['txt'][$i]; ?>！\n如果没有看到<?php echo $vd['info']['txt'][$i]; ?>，请稍等片刻或者重新刷新本页！");
          return false;
        }
      <?php } ?>
      <?php } ?>
    <?php } ?>
    
    <?php if($item['ptype'] == 1 || $item['ptype'] == 2 || $item['ptype'] == 4 || $item['ptype'] == 5 || $item['ptype'] == 6) { ?>
    //看看是不是有需要自动检查的东西
    if( $("needinput") )
    {
    	nv = $("needinput").value;
    	nlabel = $("needinputlabel").value;
    	ntype = $("needinputtype").value;
    	if(nv != "" && nlabel != "" && ntype != "")
    	{
    		nvarr = nv.split(",");
    		nlabelarr = nlabel.split(",");
    		ntypearr = ntype.split(",");
    		nvlen = nvarr.length;
    		for(i = 0; i < nvlen; i++)
    		{
    			if($(nvarr[i]) && $(nvarr[i]).value == "")
    			{
    				altstr = ntypearr[i] == "radio" || ntypearr[i] == "select" ? "选择"  : "输入";
    				altstr = "请您" + altstr + nlabelarr[i];
    				alert(altstr);
    				return false;
    			}
    		}
    	}
    }
    <?php } ?>
    
    if(firstclick > 0)
    {
      $("btnsubmit").disabled = true;
      alert("为了避免重复下单，请到购卡记录中查看是否已经扣款\n\n如果已经扣款，您可以点击补单或者联系管理员退款后重新下单");
      return false;
    }
    
    if (qty>0)
    {
      var str = "确认购买 <?php echo $item["pname"]; ?> "+ qty +" 个吗？并请注意以下购买注意事项：\n\n\n1、本商品一经购买无法退换货，请注意不要选择错误；\n2、购买后请尽快充值，不要将卡密放至库存中，以防止过期；\n3、到官方充值时请注意区分卡号及密码的大小写；";
      $("btnsubmit").disabled = true;
      if(confirm(str))
      {
        firstclick = firstclick + 1;
        return true;
      }
      else
      {
        $("btnsubmit").disabled = false;
        return false;
      }
    }
    else
    {
      alert("请先选择数量！");
      return false;
    }
  }
  
  function getCookie(c_name)
  {
    if (document.cookie.length>0)
    {
      c_start=document.cookie.indexOf(c_name + "=");
      if (c_start!=-1)
      {
        c_start=c_start + c_name.length+1;
        c_end=document.cookie.indexOf(";",c_start);
        if (c_end==-1) c_end=document.cookie.length;
        return unescape(document.cookie.substring(c_start,c_end));
      }
    }
    return "";
  }

  if(getCookie('umebiz_com_8') == "1")
  {
    obj = $("tradepwdtr");
    obj.style.display = "";
  }

  function toggle(id,allid,name)
  {
    if (document.getElementById)
    {
      target=document.getElementById(name + id);
      if (target.style.display=="block")
      {
        target.style.display="none";
      }
      else
      {
        target.style.display="block";
        for(var i = 1;i<=allid;i++)
        {
          if (id!=i)
          {
            target=document.getElementById(name + i);
            if (target.style.display=="block")
            {
              target.style.display="none";
            }
          }
        }
      }
    }
  }
  
  <?php if($item['palert'] != ''){ ?>
  $("fade").style.display = "";
  $("tofade").style.display = "";
  $("btnsubmit").disabled = true;
  if(getCookie('umebiz_alert_<?php echo $item['pid']; ?>') == "0")
  {
    resetproduct();
  }
  
  function resetproduct()
  {
    $("btnsubmit").disabled = false;
    $("fade").style.display = "none";
    $("tofade").style.display = "none";
  }
  
  function setCookie(c_name,value,expiredays)
  {
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
  }
  
  function setpalert()
  {
    val = $("noalert").checked ? 0 : 1;
    setCookie('umebiz_alert_<?php echo $item['pid']; ?>', val, 365);
  }
  <?php } ?>
</script>
<script src="<?php echo $vd['content']; ?>js/prdzone.js"></script>
<script src="<?php echo $vd['content']; ?>js/buy.js"></script>

