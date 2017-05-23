<?php if($vd['show']==0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css">
<style type="text/css">
td{height:30px;}
#dig td{padding-left:0px}
#dig1 td{padding-left:0px}
.iborder{
background:url(<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>picture/image/nopic.gif) no-repeat center;width:150px;height:150px;margin:2px;border:2px #CFDCF2 solid
}
.cursor{cursor:pointer;text-align:center}
.headcur{background:#f0f0f0;border:1px #cccccc solid;border-bottom:0px #cccccc solid;color:#555;font-weight:bold}
.headnor{color:#000000};
</style>
</head>

<body>
<?php
  $itemarray = array(
    array(
      'val' => UB_B2B ? 1 : 0,
      'idx' => 1,
      'txt' => '������ҳ����'
    ),
    array(
      'val' => UB_B2B ? 1 : 0,
      'idx' => 5,
      'txt' => '������ҳ����'
    ),
    array(
      'val' => UB_B2C ? 1 : 0,
      'idx' => 2,
      'txt' => '��������'
    ),
    array(
      'val' => UB_YKT ? 1 : 0,
      'idx' => 3,
      'txt' => 'һ��ͨ����'
    ),
    array(
      'val' => UB_B2B+UB_B2C+UB_YKT > 1 ? 1 : 0,
      'idx' => 4,
      'txt' => '����ҳ����'
    )
  );
?>

  <tr>
    <td width="100%" colspan="6" style="padding-left:0px;border:1px #cccccc solid;border-top:0px #cccccc solid;font-size:12px;background:#f4f4f4;" valign="top">
      <div style="height:475px;overflow-y:auto;" id="tplcontent">
      <?php foreach($vd['items'] as $item){ ?>
      <div style="width:150px;border:1px #cccccc solid;float:left;margin:5px;">
      	<div style="width:150px;height:150px;background:url(<?php echo $vd['root']; ?>themes/thumb/<?php echo $item['thumb']; ?>) center no-repeat"></div>
        <div style="margin:5px 2px;float:left;"><?php echo $item['name']; ?> [<a href="#" onclick='setup("<?php echo $item['file']; ?>")'>��װ</a>]</div>
      </div>
      <?php } ?>
      </div>
    </td>
  </tr>
</table>
<div id="opcontent" style="height:30px;">
  <div class="optxt">
    ��<span id="tthispage" style="font-weight:bold"><?php echo $vd['thispage']; ?></span>ҳ/��<span id="ttotlepage" style="font-weight:bold"><?php echo $vd['totlepage']; ?></span>ҳ <input type="button" class="button" value="&lt;&lt; ��һҳ" <?php echo $vd['prestate']; ?> onclick="gopre()" id="gopre"  />
      <input type="button" class="button" value="��һҳ &gt;&gt;" <?php echo $vd['nextstate']; ?> onclick="gonext()" id="gonext"  />
    <span id="ccinfo"></span>
  </div>
</div>
<div id="downed" style="display:none">
  <?php foreach($vd['items'] as $item){ ?>
  <div style="width:150px;border:1px #cccccc solid;float:left;margin:5px;">
  	<div class="iborder" style="background:url(<?php echo $vd['root']; ?>themes/thumb/<?php echo $item['thumb']; ?>) no-repeat center"></div>
    <div style="margin:5px 2px;float:left;"><?php echo $item['name']; ?> [<a href="#" onclick='setup("<?php echo $item['file']; ?>")'>��װ</a>]</div>
  </div>
  <?php } ?>
  <input type="hidden" id="totlepage" value="1"/>
</div>
<div id="b2bdown" style="display:none"></div>
<div id="b2bidown" style="display:none"></div>
<div id="b2cdown" style="display:none"></div>
<div id="yktdown" style="display:none"></div>
<div id="indexdown" style="display:none"></div>
<div id="load" style="display:none">
  <div id="loadcontent" ><div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>���ڼ��������Ե�...</div>
</div>
</body>
<script type="text/javascript">  
  var pageact  = 0;
  var $ = function(id){
    return document.getElementById(id);
  }
  
  function cheightResize()
  {
  	var docHeight = document.documentElement.clientHeight;
  	tbodyHeight = docHeight - 70;
  
  	$("tplcontent").style.height = tbodyHeight + "px";
  }
  
  cheightResize();
  
  function loadDisp(flag)
  {
    $("load").style.display = flag ? "" : "none";
  }

  var tabarray  = new Array('downed','b2bdown','b2cdown','yktdown','indexdown','b2bidown');
  var typearray = new Array(0,1,2,3,4,5);
  var pagearray = new Array(1,1,1,1,1,1);
  
  function gopre()
  {
    if(pageact == 0)
    {
      return;
    }
    prepage = pagearray[pageact] - 1;
    
    if(prepage <= 0)
    {
      return;
    }
    
    if(prepage == pagearray[pageact])
    {
      return;
    }
    loadDisp(1);
    pagearray[pageact] = prepage;
    
    $("tthispage").innerHTML = prepage;
    
    loadXMLDoc("index.php?m=mod_b2b&c=Fs&a=ListTpl&type=" + typearray[pageact] + "&show=1&page="+prepage, "tplcontent", "", "", "", tabarray[pageact]);
  }
  
  function gonext()
  {
    if(pageact == 0)
    {
      return;
    }
    nextpage = pagearray[pageact] + 1;
    
    
    if(nextpage > $("totlepage").value)
    {
      return;
    }
    
    if(nextpage == pagearray[pageact])
    {
      return;
    }
    loadDisp(1);
    pagearray[pageact] = nextpage;
    
    $("tthispage").innerHTML = nextpage;
    
    loadXMLDoc("index.php?m=mod_b2b&c=Fs&a=ListTpl&type=" + typearray[pageact] + "&show=1&page="+nextpage, "tplcontent", "", "", "", tabarray[pageact]);
  }
  
  function TabGo(idx)
  {
    $("ccinfo").innerHTML = "";
    pageact = idx;
    for(i = 0; i < 6; i++)
    {
      $("td"+i).className = "listhead headnor";
    }
    
    $("td"+idx).className = "listhead headcur";
    
    
    if(pageact == 0)
    {
      $("tplcontent").innerHTML = $("downed").innerHTML;
      checkbutton();
      return;
    }
    
    $('tthispage').innerHTML = 1;

    if($(tabarray[pageact]).innerHTML == "")
    {
      loadXMLDoc("index.php?m=mod_b2b&c=Fs&a=ListTpl&type=" + typearray[pageact] + "&show=1", "tplcontent", "", "", "", tabarray[pageact]);
    }
    else
    {
      $("tplcontent").innerHTML = $(tabarray[pageact]).innerHTML;
      checkbutton();
    }
  }
  
  function setup(fname)
  {
    $("ccinfo").innerHTML = "��ʼ��װ�����...��";
    loadXMLDoc("index.php?m=mod_b2b&c=fs&a=unzip&path="+fname, "ccinfo", '�������װ���..��', '�������װʧ��..��', '����ĳ��ԭ�����������װʧ��..��', 1);
  }
  
  function checkversion()
  {
    return need=="1" ? true : false;
  }
  
  function getXMLHander()
  {
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
    
    return xmlhttp;
  }
  
  function checkbutton()
  {
    thispage = pagearray[pageact];
    totlepage1 = $("totlepage").value;
    
    if(totlepage1 == 1 || thispage == 1)
    {
      $("gopre").disabled = true;
    }
    else
    {
      $("gopre").disabled = false;
    }
    if(totlepage1 == thispage)
    {
      $("gonext").disabled = true;
    }
    else
    {
      $("gonext").disabled = false;
    }
  }
  
  function loadXMLDoc(url, id, txt_succ, txt_fail, txt_err, step)
  {
    loadDisp(1);
    xmlhttp = getXMLHander();
    
    if (xmlhttp!=null)
    {
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState==4)
        {
          if (xmlhttp.status==200)
          {
            var ackdata=xmlhttp.responseText;
            loadDisp(0);
            if(id == "tplcontent")
            {
              loadDisp(0);
              $(id).innerHTML = ackdata;
              $(step).innerHTML = ackdata;
              checkbutton();
              $('ttotlepage').innerHTML = $("totlepage").value;
            }
            else
            {
              if(ackdata == 0 || ackdata == "0")
              {
                $(id).innerHTML = txt_succ + "��";
                nextstep(step);
              }
              else
              {
                //alert(ackdata);
                $(id).innerHTML = txt_fail + "��";
              }
            }
          }
          else
          {
            loadDisp(0);
            $(id).innerHTML = txt_err + "��";
          }
        }
      }
      xmlhttp.open("post", url, true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send('');
    }
    else
    {
      alert("�����������֧��XMLHTTP���޷���ɱ��β���")
    }
  }
  
  function down(id)
  {
    $("ccinfo").innerHTML = "��ʼ��װ�����...��";
    loadXMLDoc("index.php?m=mod_b2b&c=Fs&a=DownTpl&id="+id, "ccinfo", '�������װ���..��', '�������װʧ��..��', '����ĳ��ԭ�����������װʧ��..��', 5);
  }
  
  function nextstep(step)
  {
    switch(step)
    {
      case 1:
        unzip
        loadXMLDoc(url, id, txt_succ, txt_fail, txt_err, step);
         $("ccinfo").innerHTML = "�������ʼ����...��";
         loadXMLDoc("index.php?m=mod_b2b&c=fs&a=ClearCache", "ccinfo", '������������..��', '���������ʧ��..��', '����ĳ��ԭ�������������ʧ��..��', 5);
        break;
      case 2:
       update
        loadXMLDoc(url, id, txt_succ, txt_fail, txt_err, step);
       // break;
     // default:
      //  break;
    }
  }
  
  function getOs() 
  {
    var OsObject = ""; 
    if(navigator.userAgent.indexOf("MSIE")>0) { 
         return "MSIE"; 
    }
    if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){ 
         return "Firefox"; 
    }
    if(isSafari=navigator.userAgent.indexOf("Safari")>0) { 
         return "Safari"; 
    }
    if(isCamino=navigator.userAgent.indexOf("Camino")>0){ 
         return "Camino"; 
    }
    if(isMozilla=navigator.userAgent.indexOf("Gecko/")>0){ 
         return "Gecko"; 
    }
  } 
  
  //ie��frameset��ֱ��ʹ��onresize�¼���bug���ߴ�Ӵ�С��ʱ����� > 390�������������¼�
  if(getOs() == "MSIE" && window.frameElement != null)
  {
    window.frameElement.attachEvent("onresize",cheightResize);
  }
  else
  {
  	window.onresize = cheightResize;
  
  }

</script>
</html>

<?php }else{ ?>
  <?php if($vd['type'] == 0){ ?>
  
    <?php foreach($vd['localitems'] as $item){ ?>
    <div style="width:150px;border:1px #cccccc solid;float:left;margin:5px;">
      <img src="<?php echo $vd['root']; ?>themes/thumb/<?php echo $item['thumb']; ?>" border="0" width="100%">
      <div style="margin:5px 2px;float:left;"><?php echo $item['name']; ?> [<a href="#" onclick='setup("<?php echo $item['file']; ?>")'>��װ</a>]</div>
    </div>
    <?php } ?>
    <input type="hidden" id="totlepage" value="1"/>
  <?php }else{ ?>
  
    <?php foreach($vd['items'] as $item){ ?>
    <div style="width:150px;border:1px #cccccc solid;float:left;margin:5px;">
    	<div class="iborder" style="background:url(<?php echo $item['thumb']; ?>) no-repeat center"></div>
      <div style="margin:10px 2px 3px;float:left;width:95%">
        <?php echo $item['name']; ?> [<a href="#" onclick='down("<?php echo $item['id']; ?>")'>��װ</a>][<a href="<?php echo $item['demo']; ?>" target="_blank">��ʾ</a>]
      </div>
      <div style="margin:3px 2px;float:left;width:95%">���ã�<?php echo $item['version']; ?></div>
      <div style="margin:3px 2px;float:left;width:95%">���ߣ�<?php echo $item['author']; ?></div>
    </div>
    <?php } ?>
    <input type="hidden" id="totlepage" value="<?php echo $vd['totlepage']; ?>"/>
  <?php } ?>
<?php } ?>