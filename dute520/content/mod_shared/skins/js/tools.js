function setoverbg(obj)
{
	obj.style.backgroundColor = "#FFFFE1";
}

function setoutbg(obj)
{
	//������һ�������Ƿ��Ѿ���ѡ
	chkbox = getFirstChild(obj);
	chkbox = getFirstChild(chkbox);
	
	if(chkbox && chkbox.checked == false)
	{
	  obj.style.backgroundColor = "#FFFFFF";
	}
}

function getFirstChild(obj)
{
  if(obj != null)
  {
    if(getOs() != "MSIE")
    {
    	return obj.childNodes[1];
    }
    else
    {
    	return obj.firstChild;
    }
  }
  else
  {
  	return null;
  }
}

function CheckAll(obj) {
	checkboxLen = obj.checked ? 0 : tRows;
	Check(obj.checked);
}

function Check(flag)
{
	myform  = $("cform");
	formlen = myform.elements.length;

	if(formlen == 0)
	{
		return;
	}

  for (var i=0;i<formlen;i++) {
    var e = myform.elements[i];
    if (e.name != 'chkall' && e.type == 'checkbox') 
    {
    	if(e.checked && flag)
    	{
    		checkboxItems -= 1;
    	}
    	
    	e.checked = flag; 
      //SetBgByChk(e);
      
      CheckThis(e);
    }
  }
  
  //�����Ƿ�ѡ��ȫ��
  
  //$("tip").style.display = flag  ? "" : "none";
  
  //checkboxLen = flag ? formlen : 0;
}

function CheckTotle(nrows,idx)
{
	if(idx == 0)
	{
		tableCheckAll = 1;
		checkboxLen = 0;
	  $("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',1)">ȡ����ǰ�б����м�¼ѡ��>></a>';
	  Check(true);
	  chkExclude = ",";
	  chkInclude = ",";
	  checkboxItems = totleRows;
	  $("tiptable").innerHTML = "��ҳ������ <b>" + tRows + "</b> ����¼��ѡ�� ";
	  $("tiptable").innerHTML += "�б������� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
	}
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">���ѡ��ǰ�б������� <b>' + totleRows + '</b> ����¼>></a></a>';
		Check(false);
		tableCheckAll = 0;
		checkboxLen = 0;
		chkExclude = ",";
		chkInclude = ",";
		checkboxItems = 0;
		$("chkall").checked = false;
		$("tiptable").innerHTML = "��ҳ������ <b>0</b> ����¼��ѡ�� ";
		$("tiptable").innerHTML += "�б������� <b>0</b> ����¼��ѡ�� ";
		HideTip();
	}
}

//var st;

//�����е�ѡ���ʱ��
function CheckThis(obj)
{	
	thislen = obj.checked ? 1 : -1;
	checkboxLen   += thislen;
	checkboxItems += thislen;
	
	if(thislen == 1)
	{
		//��chkExcludeȥ��
		RemoveFromChkExclude(obj.value);
		AddToChkInclude(obj.value);
	}
  else
	{
		//�����chkExclude
		AddToChkExclude(obj.value);
		RemoveFromChkInclude(obj.value);
	}
	
  //--------------------------------------
  //��ʾ��ʾ������
  //1.��ǰ��ѡ���ѡ�� checkboxItems > 0
  //-------------------------------------
  if(checkboxItems > 0)
  {
  	ShowTip();
  }
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">���ѡ��ǰ�б������� <b>' + totleRows + '</b> ����¼>></a></a>';
		tableCheckAll = 0;
		checkboxLen = 0;
		chkExclude = ",";
		chkInclude = ",";
		checkboxItems = 0;
		$("chkall").checked = false;
		$("tiptable").innerHTML = "��ҳ������ <b>0</b> ����¼��ѡ�� ";
		$("tiptable").innerHTML += "�б������� <b>0</b> ����¼��ѡ�� ";
		HideTip();
	}
  
  if(tRows == checkboxLen)
  {
  	$("tiptable").innerHTML = "��ҳ������ <b>" + tRows + "</b> ����¼��ѡ�� ";
  	
  	$("chkall").checked = true;
  }
  else
	{
		$("tiptable").innerHTML = "��ҳ�� <b>" + checkboxLen + "</b> ����¼��ѡ�� ";
		$("chkall").checked = false;
	}
	
	if(checkboxItems == totleRows)
  {
  	$("tiptable").innerHTML += "�б������� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
  }
  else
  {
  	$("tiptable").innerHTML += "�б��� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
  }

	SetBgByChk(obj);
}

function HideTip()
{
	//clearInterval(st);
	//$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">���ѡ��ǰ�б������� <b>' + totleRows + '</b> ����¼>></a></a>';
	if($("tip").style.display != "none")
	{
	  $("tip").style.display = "none";
	  heightResize();
  }
}

function ShowTip()
{
	if($("tip").style.display == "none")
	{
	  $("tip").style.display = "";
	  heightResize();
  }
}

function SetBgByChk(obj)
{
	trobj = obj.parentNode.parentNode;
	trobj.style.backgroundColor = obj.checked ? "#FFFFE1" : "#FFFFFF";
}

var $ = function(id) {
	return document.getElementById(id);
}


//window.onload = function() {
  
//}

function winResize() {
	heightResize();
	scrollCtl();
}

function heightResize()
{
	var docHeight = document.documentElement.clientHeight;
	tbodyHeight = docHeight - 100 - 26;

	if($("tip").style.display != "none")
	{
		tbodyHeight = tbodyHeight - 23;
	}
	
	$("content").style.height = tbodyHeight + "px";
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
  window.frameElement.attachEvent("onresize",winResize);
  //window.frameElement.document.getElementById("frmright").onresize = winResize;
}
else
{
	window.onresize = winResize;
  //window.attachEvent("onresize",winResize);
}

//������ʱ����Ҫ���ÿ����ʾ״̬��
function scrollCtl() {
	if(isscrollctl == 1){
	  return;
	}

	isscrollctl = 1;
	var docWidthOrg = document.documentElement.clientWidth;
	//�����ֿ��
	mytitle_wid = docWidthOrg - 10;
	$("mytitle").style.width = mytitle_wid + "px";
	$("titleList").style.width = mytitle_wid + "px";
	$("tbBottom").style.width = mytitle_wid + "px";
	
	docWidth = docWidthOrg - tInfoA[1] - $("thead").rows[0].cells[0].width - 10;
	len2 = $("thead").rows[0].cells.length - 1;
	len  = len2 - tInfoA[0];
	tbodyrows = $("tbody").rows.length-statistics;
	tdisplen  = 0;

  if(resizeidx > len2)
  {
  	resizeidx = len2-1;
  }
  
  nonearray = Array();

	for(i = 0; i < len; i++)
	{
		if(i == resizeidx)
		{
			continue;
		}
		
		//���ٱ���28����
		if(docWidth < 29)
		{
			$("thead").rows[0].cells[i].style.display = "none";
			if(tbodyrows > 0)
			{
			  for(j = 0; j < tbodyrows; j++)
			  {
			    $("tbody").rows[j].cells[i].style.display = "none";
			  }
		  }
			//break;
		}
	  else
		{
			
			docWidth = docWidth - $("thead").rows[0].cells[i+1].width - 7;
			
			$("thead").rows[0].cells[i].style.display = "";

			if(tbodyrows > 0)
			{
			  tdWidth    = $("thead").rows[0].cells[i].width - 6;
			  for(j = 0; j < tbodyrows; j++)
			  {
			  	firstChild = $("tbody").rows[j].cells[i].firstChild;
			    $("tbody").rows[j].cells[i].style.display = "";
			    if(firstChild && firstChild.tagName == 'NOBR')
			    {
			    	str = $("tbody").rows[j].cells[i].innerHTML;
			    	
	          $("tbody").rows[j].cells[i].innerHTML = '<div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;width:'+tdWidth+'px">' + str + '</div>';
			    }
			    else if(firstChild && firstChild.tagName == 'DIV')
			    {
			    	
			    	if(firstChild.style.overflow == "hidden")
			    	{
			    	  firstChild.style.width = tdWidth + "px";
			      }
			    }
			  }
		  }
		  
			w = parseInt($("thead").rows[0].cells[i].width);
			tdisplen = tdisplen + w + 7;
		}
		
	}

  len1 = tbodyrows;
  
  //����β������Լ��߶�
  
  var docHeight = document.documentElement.clientHeight;
  var tdHeight  = 32;
  
	contentHeight = docHeight - 103 - 26;
	
	//β�����
	//��ߵ�10��ҳ����padding-left
	var tdEndWidth    = docWidthOrg - tdisplen - tInfoA[1] - 10 - 7;
	if(tdEndWidth < 0)
	{
		tdEndWidth = 22;
	}

  if(resizeidx > 0)
  {
    //����β������趨
	  //tdEndWidth�ֳ�������
	  var tdEndWidth1 = 27;
	  var tdEndWidth2 = tdEndWidth - 28;
	  $("thead").rows[0].cells[len2].style.width = tdEndWidth1 + "px";
	  if(tdEndWidth2 <= 0)
	  {
	  	tdEndWidth2 = 35;
	  }

	  $("thead").rows[0].cells[resizeidx].style.width = tdEndWidth2 + "px";
	  
    //����й���������
  }
  else
	{
	  //����β������趨
	  $("thead").rows[0].cells[len2].style.width = tdEndWidth + "px";
    //����й���������
  }
  //var tipWidth = docWidthOrg -= 10;
  if(resizeidx > 0)
  {
  	if(((contentHeight + tdHeight - 1)/tdHeight) < len1)
    {
      tdEndWidth -= 15;
      //tipWidth   -= 15;
      tdEndWidth1 = 7;
	    tdEndWidth2 = tdEndWidth - tdEndWidth1-6;
	    if(navigator.appVersion.indexOf("MSIE 6.0") < 0)
	    {
	    	tdEndWidth1 = 0;
	    }
    }
    else
	  {
	  	tdEndWidth1 = 22;
	    tdEndWidth2 = tdEndWidth - tdEndWidth1-6;
	    tdEndWidth1 = 0;
	  }
  }
  else
  {
	  if(((contentHeight + tdHeight - 1)/tdHeight) < len1)
    {
      tdEndWidth -= 15;
      //tipWidth   -= 15;
    }
  }

  if(getOs() == "MSIE" && window.frameElement != null)
  {
    tdEndWidth2 = tdEndWidth2;
  }
  else
  {
  	tdEndWidth2 = tdEndWidth2 - 1;
  }

  tdEndWidth3 = tdEndWidth2 - 6;
  //����β������趨

  if(tbodyrows > 0)
	{
    for(j = 0; j < tbodyrows; j++)
	  {
	  	if(resizeidx > 0)
      {
      	$("tbody").rows[j].cells[len2].style.width = tdEndWidth1 + "px";
      	if(tdEndWidth2 <= 0)
      	{
      		tdEndWidth2 = 35;
      	}
	      $("tbody").rows[j].cells[resizeidx].style.width = tdEndWidth2 + "px";
	      
	      firstChild = $("tbody").rows[j].cells[resizeidx].firstChild;
	      //�޸ĸ���bug
	      if(firstChild && firstChild.tagName == 'DIV')
			  {
			    if(firstChild.style.overflow == "hidden")
			    {
			      firstChild.style.width = tdEndWidth3 + "px";
			    }
			  }
			  else
				{
					 str = $("tbody").rows[j].cells[resizeidx].innerHTML;
	         $("tbody").rows[j].cells[resizeidx].innerHTML = '<div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;width:'+tdEndWidth3+'px">' + str + '</div>';
				}
			  
	     }
      else
	    {
	      $("tbody").rows[j].cells[len2].style.width = tdEndWidth + "px";
	    }
	  }
  }
  //$("tip").style.width = tipWidth + "px";
	
	isscrollctl = 0;

	return;
}

function iEvent(sType,oInput)
{
	switch (sType){
		case "focus" :
			oInput.isfocus = true;
			oInput.style.backgroundColor='#FFFFD8';
		case "mouseover" :
			oInput.style.borderColor = '#99E300';
			break;
		case "blur" :
			oInput.isfocus = false;
			oInput.style.backgroundColor="";
		case "mouseout" :
			if(!oInput.isfocus){
				oInput.style.borderColor='#A1BCA3';
			}
			break;
	}
}

function setMenuMask()
{
	$("menuMask").style.display = $("menuMask").style.display == "none" ? "" : "none";
}

function tPage()
{
	var thisPage  = parseInt($("thisPage").value);
	var totlePage = parseInt($("totlePage").value);
	var url       = $("url").value;
  
	pageHtml = '';
	
	if(totlePage == 1 || thisPage == 1)
	{
		pageHtml += '<span class="disabled">��ҳ</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(0)" onFocus="this.blur()">��ҳ</a></span>';
  }
	
	if(thisPage == 1)
	{
		pageHtml += '<span class="disabled">��һҳ</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage-1) + ')" onFocus="this.blur()">��һҳ</a></span>';
  }
	
  if(totlePage <= 10 && totlePage > 1)
  {
  	end   = totlePage+1;
  	for(i = 1; i < end; i++)
  	{
  		pageHtml += CUrl(thisPage, i, url);
  	}
  	
  }
  
  if(totlePage > 10)
  {
  	for(i = 1; i < 4; i++)
  	{
  	  pageHtml += CUrl(thisPage, i, url);
  	}
  	
  	if(thisPage > 5 || thisPage < 3)
  	{
  	  pageHtml += '...';
  	}
  	
  	if(thisPage > 2 && thisPage < totlePage-1)
  	{
  		start = thisPage-1;
  		
  		if(start <= 3)
  		{
  			start = 4;
  		}
  		
  		end   = thisPage+2;
  		
  		if(thisPage == totlePage-2)
  		{
  			end = thisPage;
  		}
  		
  		if(thisPage+1 == totlePage-2)
  		{
  			end = thisPage+1;
  		}
  		
  		
  		for(i = start; i < end; i++)
  	  {
  	    pageHtml += CUrl(thisPage, i, url);
  	  }
  	  
  	  if(totlePage - thisPage > 4)
  		{
  	    pageHtml += '...';
  	  }
  	}
  	
  	start = totlePage-2;
  	end   = totlePage+1;
  	for(i = start; i < end; i++)
  	{
  	  pageHtml += CUrl(thisPage, i, url);
  	}
  }

	if(thisPage == totlePage || totlePage == 0)
	{
		pageHtml += '<span class="disabled">��һҳ</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage+1) + ')" onFocus="this.blur()">��һҳ</a></span>';
  }
  
  if(totlePage == 1 || totlePage == thisPage ||  totlePage == 0)
	{
		pageHtml += '<span class="disabled">ĩҳ</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + totlePage + ')" onFocus="this.blur()">ĩҳ</a></span>';
  }
  
  $("page").innerHTML = pageHtml;
}

function CUrl(thisPage, i, url)
{
	var pageHtml = '';
	
	if(thisPage == i)
  {
  	pageHtml += '<span class="current">' + i + '</span>';
  }
  else
  {
  	pageHtml += '<span><a href="javascript:toPage(' + i + ')" onFocus="this.blur()">' + i + '</a></span>';
  }
  
  return pageHtml;
}



function tInfoReset()
{
	tinfolen = tInfo.length;
  for(i = 0; i < tinfolen; i++)
  {
  	$(tInfo[i]).checked = true;
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

function setCookie(c_name,value,expiredays)
{
  var exdate=new Date();
  exdate.setDate(exdate.getDate()+expiredays);
  document.cookie=c_name+ "=" +escape(value)+
  ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}


function deleteCookie(c_name)
{
	document.cookie=c_name+ "=;expires=Thu, 01-Jan-70 00:00:01 GMT";
}

var xmlhttp = null;

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

function loadXMLDoc(cb_fun, url)
{
	xmlhttp = getXMLHander();
	
  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange=cb_fun;
    xmlhttp.open("post", url, true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send('');
  }
  else
  {
    alert("�����������֧��XMLHTTP")
  }
}

function state_Change()
{
  // ��� xmlhttp ��ʾΪ "loaded"
  if (xmlhttp.readyState==4)
  {
    // ���Ϊ "OK"
    if (xmlhttp.status==200)
    {
    	
    	loadDisp(0);
      // ��������..
      var ackdata=xmlhttp.responseText;
      $("content").innerHTML = ackdata;
      winResize();
      tPage();
      tRows   = $("tbody").rows.length;//$("cform").elements.length;
      ResetChkState();
      resetGVal();
      setTableInput();
      setButton();
      setOnclick();
	    //tRows   = $("cform").elements.length;
    }
    else
    {
      document.getElementById("result").innerHTML="<div class='col'>����ʧ��,������ˢ�±�ҳ�����ȴ��������ֱ����ϵ����Ա</div>";
    }
  }
}

function setLoad(txt)
{
	$("loadcontent").innerHTML = '<div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>' + txt;
}

function DelItemsResult()
{
	// ��� xmlhttp ��ʾΪ "loaded"
  if (xmlhttp.readyState==4)
  {
    // ���Ϊ "OK"
    if (xmlhttp.status==200)
    {
      // ��������..
      var ackdata=xmlhttp.responseText;
      
      if(ackdata == "")
      {
      	checkboxItems -= thisdel;
      	totleRows -= thisdel;
      	totleRows -= onedel;
      	loadDisp(0);
      	setLoad("ҳ����������Ե�...");
      	//�ɹ�
      	var thisPage  = parseInt($("thisPage").value);
      	toPage(thisPage);
      	resetGVal();
      }
      else
    	{
    		loadDisp(0);
    		alert(ackdata);
    	}
    }
    else
    {
      //ʧ��;
    }
  }
}

function loadDisp(flag)
{
	$("load").style.display = flag ? "" : "none";
}

function toPage(page)
{
	loadDisp(1);
	var url = $("url").value;
	url = url + '&page=' + page;
	loadXMLDoc(state_Change, url);
}

//��chkExclude���val
function AddToChkExclude(val)
{
	if(tableCheckAll == 0)
	{
		return;
	}
	
	org = "," + val + ",";
	if(chkExclude.indexOf(org) > -1)
	{
		return;
	}
  else
	{
		chkExclude += val + ",";
	}
}

//��chkExclude������ȥ��val
function RemoveFromChkExclude(val)
{
	org = "," + val + ",";
	chkExclude = chkExclude.replace(org, ",");
}

//��chkInclude���val
function AddToChkInclude(val)
{
	if(tableCheckAll == 1)
	{
		return;
	}
	
	org = "," + val + ",";
	if(chkInclude.indexOf(org) > -1)
	{
		return;
	}
  else
	{
		chkInclude += val + ",";
	}
}

//��chkInclude������ȥ��val
function RemoveFromChkInclude(val)
{
	org = "," + val + ",";
	chkInclude = chkInclude.replace(org, ",");
}

//��ʼ����ҳ��ѡ������
function ResetChkState()
{
	myform = $("cform");
	formlen = myform.elements.length;
	if(formlen == 0)
	{
		//return;
	}
	
	chkall_checked = formlen ? true : false;
	checkboxLen = 0;
	
  for (var i=0;i<myform.elements.length;i++) 
  {
    var e = myform.elements[i];
    if (e.name != 'chkall' && e.type == 'checkbox') 
    {
    	dst = "," + e.value + ",";
    	
    	if(tableCheckAll == 1)
    	{
    		if(chkExclude.indexOf(dst) > -1)
	      {
	    	  chkall_checked = false;
    	    e.checked = false; 
    	  }
    	  else
    		{
    	    e.checked = true; 
    	    checkboxLen += 1;
    		}
    	}
      else
    	{
    		if(chkInclude.indexOf(dst) > -1)
	      {
    	    e.checked = true; 
    	    checkboxLen += 1;
    	  }
    	  else
    		{
    			chkall_checked = false;
    	    e.checked = false; 
    		}
    	}
    	
      SetBgByChk(e);
    }
  }
  
  //�����Ƿ�ѡ�ܿ�
  $("chkall").checked = chkall_checked;
  
  if(checkboxItems > 0)
  {
  	ShowTip();
  }
  else
	{
		HideTip();
	}
	
  
  if(tRows == checkboxLen)
  {
  	$("tiptable").innerHTML = "��ҳ������ <b>" + tRows + "</b> ����¼��ѡ�� ";
  	if(checkboxItems == totleRows)
  	{
  		$("tiptable").innerHTML += "�б������� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
  		
  	}
    else
  	{
  		$("tiptable").innerHTML += "�б��� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
  	}
  	$("chkall").checked = tRows ? true : false;
  }
  else
	{
		$("tiptable").innerHTML = "��ҳ�� <b>" + checkboxLen + "</b> ����¼��ѡ��  �б��� <b>" + checkboxItems + "</b> ����¼��ѡ�� ";
		$("chkall").checked = false;
	}
	
	if(tableCheckAll == 0)
	{
	  $("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">���ѡ��ǰ�б������� <b>' + totleRows + '</b> ����¼>></a></a>';
	}
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',1)">ȡ����ǰ�б����м�¼ѡ��>></a>';
	}
}

function resetGVal()
{
	if($("tol1"))
	{
		$("tol1").innerHTML = totleRows;
	}
	if($("tol2"))
	{
		$("tol2").innerHTML = totleRows;
	}
	if($("recycle")) 
	{
		val = parseInt($('recycle_num').value);
		$("recycle").innerHTML = val ? val : "��";
	}
}

function delSubmit(idx,tpl)
{
	if(!confirm(deltxt))
	{
		return;
	}
	
	chked = $("idchk_" + idx).checked;
	thisdel = chked ? 1 : 0;
	onedel  = 1;

	setLoad("��¼" + thisaction + "��...");
	loadDisp(1);
	httpurl = $("op").value + "&chkinclude=" + idx + "&tpl=" + tpl;
	loadXMLDoc(DelItemsResult, httpurl);
}

function delAllSubmit(tpl)
{
	if(tableCheckAll == 0 && chkInclude == ",")
	{
		alert("����ѡ���Ӧ����");
		return;
	}
	
	if(checkboxItems == 0)
	{
		alert("����ѡ���Ӧ����");
		return;
	}
	
	confirmstr = "";
	
	if(tpl == "restore")
	{
		thisaction = "��ԭ";
		confirmstr = '��ǰ�� '+checkboxItems+' ����¼��ѡ�У��Ƿ�ȫ����ԭ��';
	}
  else if(tpl == "ClearPP")
  {
  	thisaction = "����ܼ�";
		confirmstr = '��ǰ�� '+checkboxItems+' ����¼��ѡ�У��Ƿ�ȫ������ܼۣ�';
  }
  else
	{
		confirmstr = '��ǰ�� '+checkboxItems+' ����¼��ѡ�У��Ƿ�ȫ��' + thisaction + '��\n\n' + deltxt;
	}
	
	if(!confirm(confirmstr))
	{
		return;
	}
	
	thisdel = checkboxItems;
	if(tpl == "ClearPP")
	{
		thisdel = 0;
	}
	
	onedel  = 0;
	
	setLoad("��¼" + thisaction + "��...");
	loadDisp(1);
	
	//alert($("actionform").action);
	//alert("chkInclude(" + chkInclude + ") chkExclude(" + chkExclude + ")");
	httpurl = $("op").value + "&tablecheckall=" + tableCheckAll + "&chkinclude=" + chkInclude + "&chkexclude=" + chkExclude + "&tpl=" + tpl;
	//alert(httpurl);
	loadXMLDoc(DelItemsResult, httpurl);
}

function tableRefresh()
{
	loadDisp(1);
	var thisPage  = parseInt($("thisPage").value);
	httpurl = $("url").value + "&page=" + thisPage;
	loadXMLDoc(state_Change, httpurl);
}

function trim(val) 
{ 
	return val.replace(/(^\s*)|(\s*$)/g, "");
}  

function searchSubmit()
{
	if(trim($("keywords").value) == '')
	{
		//alert("����������Ҫ�����Ĺؼ���");
		//$("keywords").focus();
		//return false;
	}
	
	loadDisp(1);
}

function batch(ctl)
{
	if(tableCheckAll == 0 && chkInclude == ",")
	{
		alert("����ѡ���Ӧ����");
		return;
	}
	
	if(checkboxItems == 0)
	{
		alert("����ѡ���Ӧ����");
		return;
	}
	
	if(!confirm('��ǰ�� '+checkboxItems+' ����¼��ѡ�У��Ƿ������޸���Щ��¼��'))
	{
		return;
	}
	
	setLoad("ҳ����������Ե�...");
	loadDisp(1);
	
	httpurl = "index.php?m=mod_b2b&c=" + ctl + "&a=batch&tablecheckall=" + tableCheckAll + "&chkinclude=" + chkInclude + "&chkexclude=" + chkExclude + "&" + $("params").value;
	
	window.location = httpurl;
}

var Utils = new Object();
Utils.fixEvent = function(e)
{
  var evt = (typeof e == "undefined") ? window.event : e;
  return evt;
}

Utils.srcElement = function(e)
{
  if (typeof e == "undefined") e = window.event;
  var src = document.all ? e.srcElement : e.target;

  return src;
}

Utils.trim = function( text )
{
  if (typeof(text) == "string")
  {
    return text.replace(/^\s*|\s*$/g, "");
  }
  else
  {
    return text;
  }
}

function toInput(obj, id, param)
{
	if(!editRealtime)
	{
		return;
	}
	
	var tag = obj.firstChild.tagName;

  if (typeof(tag) != "undefined" && tag.toLowerCase() == "input")
  {
    return;
  }

  /* ����ԭʼ������ */
  var org  = obj.innerHTML;
  var isIE = window.ActiveXObject ? true : false;
  var val  = isIE ? obj.innerText : obj.textContent;

  /* ����һ������� */
  var txt = document.createElement("INPUT");
  txt.value = (val == 'N/A') ? '' : val;
  txt.style.width = (obj.offsetWidth + 12) + "px" ;

  /* ���ض����е����ݣ������������뵽������ */
  obj.innerHTML = "";
  obj.appendChild(txt);
  txt.focus();
  
  /* �༭�������¼������� */
  txt.onkeypress = function(e)
  {
    var evt = Utils.fixEvent(e);
    var obj = Utils.srcElement(e);

    if (evt.keyCode == 13)
    {
      obj.blur();

      return false;
    }

    if (evt.keyCode == 27)
    {
      obj.parentNode.innerHTML = org;
    }
  }

  /* �༭��ʧȥ����Ĵ����� */
  txt.onblur = function(e)
  {
  	newtxt = Utils.trim(txt.value);
  	
  	if (newtxt.length > 0)
  	{
  	  xmlhttp = getXMLHander();
	    httpurl = $("op").value + "&tpl=itemdeal&param=" + param + "&id=" + id + "&val=" + encodeURIComponent(newtxt);

      if (xmlhttp!=null)
      {
        xmlhttp.onreadystatechange = function(e){
        	if (xmlhttp.readyState==4)
          {
            // ���Ϊ "OK"
            if (xmlhttp.status==200)
            {
              var ackdata=xmlhttp.responseText;
              
              if(ackdata == "")
              {
              	obj.innerHTML = newtxt;
              }
              else
            	{
            		obj.innerHTML = org;
            	}
            }
            else
            {
              obj.innerHTML = org;
            }
          }
        };
        xmlhttp.open("post", httpurl, true);
        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xmlhttp.send('');
      }
      else
      {
        alert("�����������֧��XMLHTTP")
      }
    }
    else
    {
      obj.innerHTML = org;
    }
  }  
}

function toToggle(obj, id, param)
{
	if(!editRealtime)
	{
		if(!confirm('�Ƿ�Ҫ�޸ģ�(�Ȱ���ʵʱ�޸İ�ť�������ʾ���ٵ���!)'))
	  {
	  	return;
	  }
	}
	
	var val = (obj.src.match(/yes.gif/i)) ? "0" : "1";
	
	xmlhttp = getXMLHander();
	httpurl = $("op").value + "&tpl=itemdeal&param=" + param + "&id=" + id + "&val=" + val;

  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange = function(e){
    	if (xmlhttp.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp.status==200)
        {
          var ackdata=xmlhttp.responseText;
          
          if(ackdata == "")
          {
          	obj.src = (val == "1") ? 'content/mod_shared/skins/images/yes.gif' : 'content/mod_shared/skins/images/no.gif';
          }
          else
        	{
        		if(ackdata== "�Ѿ����˴���˶�����")
        		{
        			tableRefresh();
        		}
        		alert(ackdata);
        	}
        }
      }
    };
    xmlhttp.open("post", httpurl, true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send('');
  }
  else
  {
    alert("�����������֧��XMLHTTP")
  }
}

function toSelect(obj, id, param)
{
	if(!editRealtime)
	{
		if(!confirm('�Ƿ�Ҫ�޸ģ�(�Ȱ���ʵʱ�޸İ�ť�������ʾ���ٵ���!)'))
	  {
	  	tableRefresh();
	  	return;
	  }
	}
	
	var val = obj.options[obj.selectedIndex].value;
	
	xmlhttp = getXMLHander();
	httpurl = $("op").value + "&tpl=itemdeal&param=" + param + "&id=" + id + "&val=" + val;

  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange = function(e){
    	if (xmlhttp.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp.status==200)
        {
          tableRefresh();
        }
      }
    };
    xmlhttp.open("post", httpurl, true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send('');
  }
  else
  {
    alert("�����������֧��XMLHTTP")
  }
}


function toColor(obj, id, param)
{
	if(!editRealtime)
	{
		if(!confirm('�Ƿ�Ҫ�޸���ɫ��(�Ȱ���ʵʱ�޸İ�ť�������ʾ���ٵ���!)'))
	  {
	  	return;
	  }
	}
	
	var color = showModalDialog("content/mod_shared/skins/tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
  if (color != null)
  {  	
  	xmlhttp = getXMLHander();
	  httpurl = $("op").value + "&tpl=itemdeal&param=" + param + "&id=" + id + "&val=" + encodeURIComponent(color);

    if (xmlhttp!=null)
    {
      xmlhttp.onreadystatechange = function(e){
      	if (xmlhttp.readyState==4)
        {
          // ���Ϊ "OK"
          if (xmlhttp.status==200)
          {
            var ackdata=xmlhttp.responseText;
            
            if(ackdata == "")
            {
            	obj.style.backgroundColor = color;
            }
          }
        }
      };
      xmlhttp.open("post", httpurl, true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send('');
    }
    else
    {
      alert("�����������֧��XMLHTTP")
    }
    try{  
    $("textcolor"+id).value = color;
    }catch(e){}
  }
}

function batchEdit(obj)
{
	obj.className= editRealtime ? "titleOp4" : "titleactive4";
	editRealtime = !editRealtime;
}

function dateDialog(idx)
{
	obj = $(idx);
	dv=window.showModalDialog(sc+"tools/datedialog.html?date="+obj.value,"44","center:1;help:no;status:no;dialogHeight:240px;dialogWidth:185px;scroll:no")
  if (dv) {if (dv=="null") obj.value='';else obj.value=dv;}
}

function getPos(ev){
	ev = ev || window.event;  
  if(ev.pageX || ev.pageY){
    return {x:ev.pageX, y:ev.pageY};       
  }
  return {
    x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,
    y:ev.clientY + document.body.scrollTop   - document.body.clientTop       
  };  
}

function showhide(obj) {
	var tip = $("contentTip");
	
  var hidetext = obj.nextSibling;
  if(tip.style.display =='none')
  {
  	if (window.XMLHttpRequest) 
	  {
  	  if(!window.ActiveXObject)
      {
         window.document.onmousemove = function(ev){
         	 ev = ev||windows.event;
         	 if(ev.pageX || ev.pageY){
             pos = {x:ev.pageX, y:ev.pageY};  
             tip.style.top = pos.y + "px";
  	         tip.style.left = pos.x + "px";
  	         tip.style.display = "";
  	         tip.innerHTML = hidetext.innerHTML;    
           }
         	 window.document.onmousemove = null;
         }
      }
      else
    	{
    		pos = getPos();
  	    tip.style.top = pos.y + "px";
  	    tip.style.left = pos.x + "px";
  	    tip.style.display = "";
  	    tip.innerHTML = hidetext.innerHTML;
    	}
    }
    else
  	{
  	  pos = getPos();
  	  tip.style.top = pos.y + "px";
  	  tip.style.left = pos.x + "px";
  	  tip.style.display = "";
  	  tip.innerHTML = hidetext.innerHTML;
    }
  }
  else
	{
		tip.style.display = "none";
	}
}

function setTableInput()
{
	ipt = document.getElementsByTagName("input");
	
  for (var i=0; i < ipt.length;i++) {
    var e = ipt[i];
    if(e.readOnly)
    {
    	continue;
    }
    if (e.type == 'text' || e.type == 'password') 
    {
    	
    	e.onmouseover=function(){ iEvent('mouseover',this)};
    	e.onfocus = function(){ 
    		iEvent('focus',this);
    		if(this.value == this.msg)
    		{
    		  this.value='';this.style.color="#000000";
    		}
    	};
    	
    	e.onblur =function(){
    		iEvent('blur',this);
    		if(this.tocompare)
    		{
    			if(this.tocompare > this.value)
    			{
    				this.style.backgroundColor="#ff6c00";
    				alert('������');
    			}
    		}
    	};
      
    	e.onmouseout=function(){ iEvent('mouseout',this)};
    }
  }
}

function disp(idx)
{
	$(idx).style.display = $(idx).style.display == "" ? "none" : "";
}

function setButton()
{
	btn = document.getElementsByTagName("input");
  len = btn.length;
	for(var i=0; i < len; i++)
	{
		var o = btn[i];
		if(o.type=='button' || o.type=='reset' || o.type=='submit' || o.type=='radio' || o.type=='checkbox')
		{
			o.onfocus = function(){ this.blur();};
		}
	}
}

function toSubmit(idx)
{
	$(idx).submit();
}

function openScript(url,name,width,height)
{
  var Win = window.open(url,name,'width=' + width + ',height=' + height + ',resizable=0,scrollbars=no,menubar=no,status=no');
}

function toHelper()
{
	window.open('index.php?m=mod_home&a=Help&t=' + helperVal);
}

function setSearchTxt()
{
	setLoad("�������������Ե�...");
	loadDisp(1);
}

function setOnclick()
{
	es = document.getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
		if(o.target!="_blank" && !o.href.match( /javascript/i ) && o.href !="#")
		{
	    o.onclick = function(){ loadDisp(1);};
	  }
	}
	es = $("tipspan").getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
		//�б�ѡ��ȫ�����Ǹ����Ӳ���Ҫ
	  o.onclick = function(){};
	}
	es = $("titleList").getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
		//������ϢҲ��Ҫ���
		if( o.href.match( /javascript/i ) ){
	    o.onclick = function(){};
	  }
	}
	es = null;
}

//setCookie('idx', '6,5,8', 1);
//deleteCookie('idx');
//alert(getCookie('idx'));

//��ҳѡ���������
var checkboxLen = 0;

//���б�ѡ���������
var checkboxItems = 0;

//�Ƿ��б������ж�ѡ��
var tableCheckAll = 0;

//�Ƿ�ҳѡ��
var pageCheckAll  = 0;

//scrollCtl�����ٽ����
var isscrollctl = 0;

//����ѡ�Ŀ�ļ���
var chkExclude = ",";

//��ѡ��ļ���
var chkInclude = ",";

//�Ƿ�����ʱ�޸�
var editRealtime = 0;

winResize();

setLoad("ҳ����������Ե�...");

//��ʼ����ҳ
tPage();

//��ʼ����ǰҳ������Ϣ
tInfoReset();


setTableInput();
setButton();
setOnclick();




