<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>Ա�����˵Ǽ�</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
<body class="mainbg">
<div class="new_qie">
  <div class="new_qie2">
    <h2> Ա�����ʵǼ�</h2>
  </div>
  <ul>
    <li><a href="" class="on">Ա�����ʵǼ�</a></li>
    <li><a href="index.php?m=mod_agent&amp;c=Check">Ա�����ʼ�¼</a></li>
  </ul>
</div>
<form name="checkout" method="post" action="index.php?m=mod_agent&c=check&a=Save">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td class="tableleft">
<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<tr>
		  <td class="table1_left"> ���ʶ��� </td>
		<td width="78%" class="tableright1">
		  <div align="left">
		    <select name="staff" class="shiduan" id="staff" onChange="getSum()">
		      <option value="0||���˺�" 
		      <?php if($vd['agent'][7]==0){ ?>
		       selected 
		      <?php } ?>
		      >���˺�
		      </option>
		      <?php foreach($vd['staff'] as $item){ ?>
		      <option value="<?php echo $item['staffid']; ?>||<?php echo $item['realname']; ?>" 
		      <?php if($vd['agent'][9]==$item['staffid']){ ?>
		       selected 
		      <?php } ?>
		      ><?php echo $item['realname']; ?>
		      </option>
		      <?php } ?>
		          </select>
          </div></td>
		</tr>
		<tr>
		  <td class="table1_left"> �Ӱ���� </td>
		<td width="78%" class="tableright1">
          <div align="left">
            <select name="otherstaff" class="shiduan">
              <option value="0||���˺�">���˺�</option>
              <?php foreach($vd['staff'] as $item){ ?>
              <option value="<?php echo $item['staffid']; ?>||<?php echo $item['realname']; ?>"><?php echo $item['realname']; ?></option>
              <?php } ?>
              </select>
          </div></td>
    </tr>
		<tr>
		  <td class="table1_left"> ����ʱ��Σ� </td>
		<td class="tableright1">
          <div align="left">
            <input type="text" name="startdate" size="18" value="<?php echo date('Y-m-d').' 00:00:00'; ?>" style="vertical-align:middle;" class="input0" id="startdate" onBlur="getSum()"/>
            
                  <strong>��</strong>&nbsp;
            <input type="text" name="enddate" size="18" value="<?php echo date('Y-m-d H:i:s'); ?>" style="vertical-align:middle;" class="input0" id="enddate" onBlur="getSum()"/>    
          </div></td>
		</tr>
		<tr>
		  <td class="table1_left"> ����� </td>
		<td class="tableright1">
			<div align="left">
			  <span style="float: left">
			  <input name="ar" type="text" readonly="readonly" id="ar" class="input0" onFocus="this.className=&#39;input01&#39;" onBlur="this.className=&#39;input0&#39;">
			  </span>
			  <input type="button" name="getcheckoutmoney" value="��ȡ" class="input_jc" onClick="getSum();" tabindex="12"> 
		    <span style="color:#555555">(��ʾ��ʱ���Ӧ���ʵĽ��)</span> </div></td>
		</tr>
		<tr>
		  <td class="table1_left"> ʵ�ʽ���� </td>
		<td width="80%" class="tableright1"><div align="left">
		  <input type='text' size='20' class="input0" name="ap" id="ap" dataType="Double" msg="ʵ�ʽ�������д����" tabindex="13">
		  </div></td>
		</tr>
		<tr>
		  <td class="table1_left"> ���˱�ע�� </td>
		<td class="tableright1"><div align="left">
		  <textarea name="remarks" rows="5" cols="40" id="Comment" class="input0" onFocus="this.className=&#39;input01&#39;" onBlur="this.className=&#39;input0&#39;" style="height: 50px; width: 280px;"></textarea>
		</span></div></td>
		</tr>
		<tr>
		  <td class="table1_left"> �Ӱ��˽������룺 </td>
		<td width="80%" class="tableright1">
			<div align="left">
			  <input name="otherpwd" size="20" type="password" class="input0"/> 
		    <span style="color:#cccccc">(��������˺ţ����������ĳ�������)</span> </div></td>
		</tr>
		
		<tr>
		  <td class="table1_left">&nbsp;</td>
		<td class="tableright1"><div align="left">
		  <input type="hidden" name="Login_my" value="37126884">
		  <input type="submit" name="submit" value="ȷ�ϵǼ�" class="tijiao_input" tabindex="16"> 
		  <input type="reset" name="reset" value="����" class="fanhui_input" onClick="history.go(-1);" tabindex="17">
		  </div></td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
</form>
	<script type="text/javascript">
function dateDialog(idx)
{
	obj = document.getElementById(idx)
	dv=window.showModalDialog("<?php echo $vd['sc']; ?>tools/datedialog.html?date="+obj.value,"44","center:1;help:no;status:no;dialogHeight:240px;dialogWidth:185px;scroll:no")
  if (dv) 
  {
  	if (dv=="null")
  	{
  	   obj.value='';
  	}
  	else
  	{
  	  obj.value=dv;
  	  getSum();
  	}
  }
}
function openScript(url,name,width,height)
{
    var Win = window.open(url,name,'width=' + width + ',height=' + height + ',resizable=0,scrollbars=yes,menubar=no,status=no');
}

var $ = function(id) {
	return document.getElementById(id);
}

getSum();

function getSum()
{
	var xmlhttp = null;
	
	// ��� Mozilla��������Ĵ��룺
  if (window.XMLHttpRequest)
  {
    xmlhttp=new XMLHttpRequest();
  }
  // ��� IE �Ĵ��룺
  else if (window.ActiveXObject)
  {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  tstartdate  = escape($("startdate").value);
  tenddate    = escape($("enddate").value);
  tstaff      = $("staff").options[$("staff").selectedIndex].value;

  tmp         = tstaff.split("||");

  tstaffid     = tmp[0];
  
	myurl       = "index.php?m=mod_agent&c=Check&a=Compute&startdate="+tstartdate+"&enddate="+tenddate+"&staffid="+tstaffid;

  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange=function(){
      // ��� xmlhttp ��ʾΪ "loaded"
      if (xmlhttp.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp.status==200)
        {
          // ��������..
          var ackdata=xmlhttp.responseText;

          $("ar").value = ackdata;
        }
        else
        {
          alert("�����������֧��XMLHTTP")
        }
      }
    };
    xmlhttp.open("post", myurl, true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send('');
  }
  else
  {
    alert("�����������֧��XMLHTTP")
  }
}

</script>
</body>
</html>
