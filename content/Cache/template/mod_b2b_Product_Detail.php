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
      <td colspan="4" class="tabletitle" style="height:20px"><span class="gouka">�����</span></td>
    </tr>
  </table>
  <form name="submitform" id="submitform" method="post" action="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=<?php if($vd['scoredpid']==0){ ?>pay<?php }else{ ?>ScoredPay<?php } ?>" onsubmit="return checksubmit()">
  <table class="contentTable1" border="1" style="margin:0 auto">
    <tr>
      <td class="buylt">��Ʒ���ƣ�</td>
      <td class="buyrt"><a href="javascript:toggle('0','0','cp');"><b><?php echo $item['pname']; ?></b><img src="<?php echo $vd['content']; ?>images/icon_pkf.gif" border=0></a></td>
    </tr>
    <tr style="display:none">
      <td class="buylt">��Ʒ��ֵ��</td>
      <td class="buyrt">
        <?php echo $vd['lang']['moneysymbol']; ?><?php echo $item['listprice']; ?><?php echo $vd['lang']['moneyunit']; ?>
      </td>
    </tr>
    <tr>
      <td class="buylt">�����ۣ�</td>
      <td class="buyrt"><font color="#ff0000" onmouseover="showcprice(1)" onmouseout="showcprice(0)">����ƴ�</font> <span id="cprice" class="cprice" style="display:none">��ȡ��..</span>
      <div id="cp0" style="display:none;" class="cpxx">
      <div id="cpinfo"><div class="cp"><span><a href="javascript:toggle('0','0','cp');"><img src="<?php echo $vd['content']; ?>images/destroy.gif" border="0" align="absmiddle"/></a></span><img src="<?php echo $vd['content']; ?>images/icon_p.gif" align="absmiddle"> ��Ʒ��Ϣ</div>
      <p><b>��Ʒ��飺</b><?php (ubbcode($item['pdesc'], $vd)); ?><br/>
      <b>�ٷ���ַ��</b><a href="<?php echo $item['czweb']; ?>" target="_blank"><?php echo $item['web']; ?></a><br/>
      <b>��ֵ��ַ��</b><a href="<?php echo $item['czweb']; ?>" target="_blank"><?php echo $item['czweb']; ?></a><br/></p>
      </div></div>
      </td>
    </tr>
    <tr>
      <td class="buylt">��Ʒ���ͣ�</td>
      <td class="buyrt"><?php (ProductType($item['ptype'])); ?></td>
    </tr>
    <tr style="display:none">
      <td class="buylt">���״̬��</td>
      <td class="buyrt"><span id="thisstock">��ȡ��..</span></td>
    </tr>
    <?php if( $item['ptype'] == 1 || $item['ptype'] == 2){ ?>
    <tr>
      <td class="buylt">��ֵ<?php echo $item['idlable']; ?>��</td>
      <td class="buyrt"><input id="ubzczacount" name="ubzczacount" type="text"  class="input"/> *</td>
    </tr>
    <tr>
      <td class="buylt">�ظ�<?php echo $item['idlable']; ?>��</td>
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
      <td class="buylt">ѡ��<?php echo $item['idlable']; ?>��</td>
      <td class="buyrt">
      <div id="cardsdiv">
      	<?php if(count($vd['cardrs']) == 0){ ?>
      	����Ѿ�û�к����ѡ
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
      <td class="buylt">����������</td>
      <td class="buyrt">
      	<select name="ubzqty" id="ubzqty" onchange="ChangeNum()">
      		<option value="0">��ѡ��</option>
      		<?php if( isset($vd['qtylist']) ){ ?>
          <?php echo $vd['qtylist']; ?>
          <?php } ?>
      	</select>&nbsp;<?php if(isset($item['buyaday']) && $item['buyaday'] > 0){ ?><font color="#ff0000"><b>ÿ����๺�� <?php echo $item['buyaday']; ?> ��</b></font><?php } ?>&nbsp;
      </td>
    </tr>
    <?php } ?>
    <?php } ?>
    <?php if(isset($vd['info']['qtyctrl']) && $vd['info']['qtyctrl'] == 1){ ?>
    <tr>
      <td class="buylt">ע�⣺</td>
      <td class="buyrt" style="color:#ff0000">
      <?php if( $vd['info']['qtylist'] != ''){ ?>
              ֧�ֹ���������<b><?php echo $vd['info']['qtylist']; ?></b>
            <?php }else{ ?>
              ������С������<b><?php echo $vd['info']['qtymin']; ?></b>&nbsp;�������������<b><?php echo $vd['info']['qtymax']; ?></b>
            <?php } ?>
      </td>
    </tr>
    <?php } ?>
    <?php if( $item['ptype'] == 0 ){ ?>
    <tr>
      <td class="buylt">��������</td>
      <td class="buyrt">
        <input type="radio" name="getatonce" value="0" checked> ����ȡ��
        &nbsp;<?php if($item['quickuse']==1 && $item['quickusetime'] > 0){ ?><font color="#ff0000"><b>�빺���<?php echo $item['quickusetime']; ?>Сʱ��ʹ��</b></font><?php } ?>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="buylt">������ע��</td>
      <td class="buyrt"><textarea name="others" wrap="VIRTUAL" rows="3" scrolling="yes" style="padding:5px;width:213px"></textarea></td>
    </tr>
    <tr id="tradepwdtr" style="display:none">
      <td class="buylt">�������룺</td>
      <td class="buyrt"><input type="password" id="tradepwd" name="tradepwd" size="16" class="input"/></td>
    </tr>
    <tr>
      <td class="buylt">����ҵ��ۣ�</td>
      <td class="buyrt"><input type="text" id="priceforplayer" name="priceforplayer" value="<?php echo $item['listprice']; ?>" style="width:100px;background:#f0f0f0" onkeyup="ChangeNum()" class="input" readOnly /> <?php echo $vd['lang']['moneyunit']; ?></td>
    </tr>
    <tr>
      <td class="buylt">Ӧ����ҽ�</td>
      <td class="buyrt"><input type="text" id="dollarsforplayer"  name="dollarsforplayer" value="<?php echo $item['listprice']; ?>" style="width:100px;background:#f0f0f0" class="input" readOnly /> <?php echo $vd['lang']['moneyunit']; ?></td>
    </tr>
    <?php if($vd['scoredpid'] == 0 && $item['scored'] > 0){ ?>
    <tr>
      <td class="buylt">���ͻ��֣�</td>
      <td class="buyrt"><input type="hidden" id="cscored"  name="cscored" value="<?php echo $item['scored']; ?>" style="width:100px" /> <input type="text" readonly id="scored"  name="scored" value="<?php echo $item['scored']; ?>" style="width:100px" class="input"/> ��</td>
    </tr>
    <?php } ?>
    <?php if($vd['scoredpid'] > 0){ ?>
    <tr>
      <td class="buylt">������֣�</td>
      <td class="buyrt">
        <input type="hidden" id="scored" readonly name="scored" value="<?php echo $vd['cp']['scored']; ?>" style="width:100px"/>
        <input type="text" id="needscored" readonly name="needscored" value="<?php echo $vd['cp']['scored']; ?>" style="width:100px"/> ��
      </td>
    </tr>
    <tr>
      <td class="buylt">�û���ǰ���֣�</td>
      <td class="buyrt"><b><?php echo $vd['ainfo']['scored']; ?></b> ��</td>
    </tr>
    <?php } ?>
    <?php if( $item['buylit'] == 1 ){ ?>
    <?php $proptmp=array();if(isset($item['prop']) && $item['prop'] != ''){;$proptmp = unserialize($item['prop']);} ?>
    <tr>
      <td class="buylt"><?php if(isset($proptmp['buylitobject']) && $proptmp['buylitobject']==0){ ?>��ֹ����<?php }else{ ?>���Ź���<?php } ?>��</td>
      <td class="buyrt">
      <font color="#ff0000"><b>ÿ��<?php echo $item['buylitstardate']; ?>ʱ��<?php echo $item['buylitenddate']; ?></b></font> <font color="#0000ff"><b><?php if(isset($proptmp['buylitobject']) && $proptmp['buylitobject']==0){ ?>��ֹ����<?php }else{ ?>���Ź���<?php } ?></b></font>
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
<input name="Submit" type="Submit" class="button" value="<?php if($vd['scoredpid']==0){ ?>��Ҫ����<?php }else{ ?>���ֶһ�<?php } ?>" id="btnsubmit">��<input name="goback" type="button" class="button" value="<?php if($vd['scoredpid']==0){ ?>��������<?php }else{ ?>�һ�����<?php } ?>" onclick="javascript:self.close();">
<br><br>
</form>
<?php if($item['palert'] != ''){ ?>
<style type="text/css">html,body{height:100%;}</style>
<div id="tofade" class="alertfade" > 
<div class="alertdiv">
  <div class="alerthearder" align="left"><span>����ע�����</span></div>
  <div class="alertcontent">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td  style="height:80px" valign="top"><p><font color=#ff0000><?php (ubbcode($item['palert'])); ?></font></p></td>
    </tr>
    <tr>
    <td align="center"><br/><input type="checkbox" name="nextnoalert" value="1" id="noalert" onclick="setpalert();"><label for="noalert" onclick="setpalert();">�Ժ���Ʒ��ע�ⲻ������</label></td>
    </tr>
    <tr>
    <td height="40" valign="middle" align="center"><input type="button" value="��֪����" onclick="resetproduct();" class="button"> <input type="button" value="��������" onclick="javascript:self.close();"  class="button"></td>
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
  		alert("����ѡ���ֵ��Ϸ��");
      return false;
  	}
    qty = $("ubzqty").options[$("ubzqty").selectedIndex].value;
    if(qty <= 0)
    {
    	alert("����ѡ��������");
      return false;
    }
    
    <?php if( $item['ptype'] == 1 || $item['ptype'] == 2 ){ ?>
    tt1 = $("ubzczacount").value;
    tt2 = $("ubzreczacount").value;
    if(tt1 == "")
    {
      $("ubzczacount").focus();
      alert("��ֵ�ʺŲ���Ϊ�գ�");
      return false;
    }
    
    if(tt1 !== tt2)
    {
      $("ubzreczacount").focus();
      alert("�����ʺ����벻һ�£�����������");
      return false;
    }
    <?php } ?>
    <?php if( isset($vd['info']['v']) ){ ?>
      if(<?php echo $vd['info']['maxqty']; ?> < qty)
      {
        alert("ƽ̨����Ա�����㣬���޷�������ô�����Ʒ��������ѡ��\n\n������ϵ����Ա");
        return false;
      }
      
      <?php if(isset($vd['info']['qtyctrl']) && $vd['info']['qtyctrl'] == 1){ ?>
        <?php if( $vd['info']['qtylist'] != ''){ ?>
          spqtylist = ",<?php echo $vd['info']['qtylist']; ?>,";
          if(spqtylist.indexOf("," + qty + ",") == -1)
          {
            alert("���ã���ѡ�������� <?php echo $vd['info']['qtylist']; ?> �еĶ�Ӧ������");
            return false;
          }
        <?php }else{ ?>
          sqtymax = <?php echo $vd['info']['qtymax']; ?>;
          sqtymin = <?php echo $vd['info']['qtymin']; ?>;
          if(sqtymax < qty)
          {
            alert("���ã����ι���������Ϊ <?php echo $vd['info']['qtymax']; ?> ��������ѡ��������");
            return false;
          }
          if(sqtymin > qty)
          {
            alert("���ã����ι������С��Ϊ <?php echo $vd['info']['qtymin']; ?> ��������ѡ��������");
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
            alert("����ѡ��<?php echo $vd['info']['txt'][$i]; ?>��");
            return false;
          }
        }
        else
        {
          alert("����ѡ��<?php echo $vd['info']['txt'][$i]; ?>��\n���û�п���<?php echo $vd['info']['txt'][$i]; ?>�����Ե�Ƭ�̻�������ˢ�±�ҳ��");
          return false;
        }
      <?php } ?>
      <?php } ?>
    <?php } ?>
    
    <?php if($item['ptype'] == 1 || $item['ptype'] == 2 || $item['ptype'] == 4 || $item['ptype'] == 5 || $item['ptype'] == 6) { ?>
    //�����ǲ�������Ҫ�Զ����Ķ���
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
    				altstr = ntypearr[i] == "radio" || ntypearr[i] == "select" ? "ѡ��"  : "����";
    				altstr = "����" + altstr + nlabelarr[i];
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
      alert("Ϊ�˱����ظ��µ����뵽������¼�в鿴�Ƿ��Ѿ��ۿ�\n\n����Ѿ��ۿ�����Ե������������ϵ����Ա�˿�������µ�");
      return false;
    }
    
    if (qty>0)
    {
      var str = "ȷ�Ϲ��� <?php echo $item["pname"]; ?> "+ qty +" ���𣿲���ע�����¹���ע�����\n\n\n1������Ʒһ�������޷��˻�������ע�ⲻҪѡ�����\n2��������뾡���ֵ����Ҫ�����ܷ�������У��Է�ֹ���ڣ�\n3�����ٷ���ֵʱ��ע�����ֿ��ż�����Ĵ�Сд��";
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
      alert("����ѡ��������");
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
