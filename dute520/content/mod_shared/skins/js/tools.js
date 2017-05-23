function setoverbg(obj)
{
	obj.style.backgroundColor = "#FFFFE1";
}

function setoutbg(obj)
{
	//看看第一个孩子是否已经勾选
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
  
  //看看是否勾选了全部
  
  //$("tip").style.display = flag  ? "" : "none";
  
  //checkboxLen = flag ? formlen : 0;
}

function CheckTotle(nrows,idx)
{
	if(idx == 0)
	{
		tableCheckAll = 1;
		checkboxLen = 0;
	  $("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',1)">取消当前列表所有记录选择>></a>';
	  Check(true);
	  chkExclude = ",";
	  chkInclude = ",";
	  checkboxItems = totleRows;
	  $("tiptable").innerHTML = "此页中所有 <b>" + tRows + "</b> 条记录已选中 ";
	  $("tiptable").innerHTML += "列表中所有 <b>" + checkboxItems + "</b> 条纪录被选中 ";
	}
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">点此选择当前列表中所有 <b>' + totleRows + '</b> 条记录>></a></a>';
		Check(false);
		tableCheckAll = 0;
		checkboxLen = 0;
		chkExclude = ",";
		chkInclude = ",";
		checkboxItems = 0;
		$("chkall").checked = false;
		$("tiptable").innerHTML = "此页中所有 <b>0</b> 条记录已选中 ";
		$("tiptable").innerHTML += "列表中所有 <b>0</b> 条纪录被选中 ";
		HideTip();
	}
}

//var st;

//单击行的选框的时候
function CheckThis(obj)
{	
	thislen = obj.checked ? 1 : -1;
	checkboxLen   += thislen;
	checkboxItems += thislen;
	
	if(thislen == 1)
	{
		//从chkExclude去掉
		RemoveFromChkExclude(obj.value);
		AddToChkInclude(obj.value);
	}
  else
	{
		//添加入chkExclude
		AddToChkExclude(obj.value);
		RemoveFromChkInclude(obj.value);
	}
	
  //--------------------------------------
  //显示提示栏条件
  //1.当前有选择框被选择 checkboxItems > 0
  //-------------------------------------
  if(checkboxItems > 0)
  {
  	ShowTip();
  }
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">点此选择当前列表中所有 <b>' + totleRows + '</b> 条记录>></a></a>';
		tableCheckAll = 0;
		checkboxLen = 0;
		chkExclude = ",";
		chkInclude = ",";
		checkboxItems = 0;
		$("chkall").checked = false;
		$("tiptable").innerHTML = "此页中所有 <b>0</b> 条记录已选中 ";
		$("tiptable").innerHTML += "列表中所有 <b>0</b> 条纪录被选中 ";
		HideTip();
	}
  
  if(tRows == checkboxLen)
  {
  	$("tiptable").innerHTML = "此页中所有 <b>" + tRows + "</b> 条记录已选中 ";
  	
  	$("chkall").checked = true;
  }
  else
	{
		$("tiptable").innerHTML = "此页中 <b>" + checkboxLen + "</b> 条记录已选中 ";
		$("chkall").checked = false;
	}
	
	if(checkboxItems == totleRows)
  {
  	$("tiptable").innerHTML += "列表中所有 <b>" + checkboxItems + "</b> 条纪录被选中 ";
  }
  else
  {
  	$("tiptable").innerHTML += "列表中 <b>" + checkboxItems + "</b> 条纪录被选中 ";
  }

	SetBgByChk(obj);
}

function HideTip()
{
	//clearInterval(st);
	//$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">点此选择当前列表中所有 <b>' + totleRows + '</b> 条记录>></a></a>';
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

//ie在frameset中直接使用onresize事件有bug，尺寸从大到小的时候，如果 > 390，如果激活这个事件
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

//调整的时候需要设置宽度显示状态栏
function scrollCtl() {
	if(isscrollctl == 1){
	  return;
	}

	isscrollctl = 1;
	var docWidthOrg = document.documentElement.clientWidth;
	//各部分宽度
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
		
		//最少保留28象素
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
  
  //计算尾部宽度以及高度
  
  var docHeight = document.documentElement.clientHeight;
  var tdHeight  = 32;
  
	contentHeight = docHeight - 103 - 26;
	
	//尾部宽度
	//后边的10是页面左部padding-left
	var tdEndWidth    = docWidthOrg - tdisplen - tInfoA[1] - 10 - 7;
	if(tdEndWidth < 0)
	{
		tdEndWidth = 22;
	}

  if(resizeidx > 0)
  {
    //标题尾部宽度设定
	  //tdEndWidth分成两部分
	  var tdEndWidth1 = 27;
	  var tdEndWidth2 = tdEndWidth - 28;
	  $("thead").rows[0].cells[len2].style.width = tdEndWidth1 + "px";
	  if(tdEndWidth2 <= 0)
	  {
	  	tdEndWidth2 = 35;
	  }

	  $("thead").rows[0].cells[resizeidx].style.width = tdEndWidth2 + "px";
	  
    //如果有滚动条出现
  }
  else
	{
	  //标题尾部宽度设定
	  $("thead").rows[0].cells[len2].style.width = tdEndWidth + "px";
    //如果有滚动条出现
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
  //内容尾部宽度设定

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
	      //修改各类bug
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
		pageHtml += '<span class="disabled">首页</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(0)" onFocus="this.blur()">首页</a></span>';
  }
	
	if(thisPage == 1)
	{
		pageHtml += '<span class="disabled">上一页</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage-1) + ')" onFocus="this.blur()">上一页</a></span>';
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
		pageHtml += '<span class="disabled">下一页</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage+1) + ')" onFocus="this.blur()">下一页</a></span>';
  }
  
  if(totlePage == 1 || totlePage == thisPage ||  totlePage == 0)
	{
		pageHtml += '<span class="disabled">末页</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + totlePage + ')" onFocus="this.blur()">末页</a></span>';
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
	// 针对 Mozilla等浏览器的代码：
  if (window.XMLHttpRequest)
  {
    xmlhttp=new XMLHttpRequest();
  }
  // 针对 IE 的代码：
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
    alert("您的浏览器不支持XMLHTTP")
  }
}

function state_Change()
{
  // 如果 xmlhttp 显示为 "loaded"
  if (xmlhttp.readyState==4)
  {
    // 如果为 "OK"
    if (xmlhttp.status==200)
    {
    	
    	loadDisp(0);
      // 其他代码..
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
      document.getElementById("result").innerHTML="<div class='col'>处理失败,您可以刷新本页继续等待结果或者直接联系管理员</div>";
    }
  }
}

function setLoad(txt)
{
	$("loadcontent").innerHTML = '<div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>' + txt;
}

function DelItemsResult()
{
	// 如果 xmlhttp 显示为 "loaded"
  if (xmlhttp.readyState==4)
  {
    // 如果为 "OK"
    if (xmlhttp.status==200)
    {
      // 其他代码..
      var ackdata=xmlhttp.responseText;
      
      if(ackdata == "")
      {
      	checkboxItems -= thisdel;
      	totleRows -= thisdel;
      	totleRows -= onedel;
      	loadDisp(0);
      	setLoad("页面加载中请稍等...");
      	//成功
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
      //失败;
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

//给chkExclude添加val
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

//从chkExclude集合中去掉val
function RemoveFromChkExclude(val)
{
	org = "," + val + ",";
	chkExclude = chkExclude.replace(org, ",");
}

//给chkInclude添加val
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

//从chkInclude集合中去掉val
function RemoveFromChkInclude(val)
{
	org = "," + val + ",";
	chkInclude = chkInclude.replace(org, ",");
}

//初始化当页的选框设置
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
  
  //看看是否勾选总框
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
  	$("tiptable").innerHTML = "此页中所有 <b>" + tRows + "</b> 条记录已选中 ";
  	if(checkboxItems == totleRows)
  	{
  		$("tiptable").innerHTML += "列表中所有 <b>" + checkboxItems + "</b> 条纪录被选中 ";
  		
  	}
    else
  	{
  		$("tiptable").innerHTML += "列表中 <b>" + checkboxItems + "</b> 条纪录被选中 ";
  	}
  	$("chkall").checked = tRows ? true : false;
  }
  else
	{
		$("tiptable").innerHTML = "此页中 <b>" + checkboxLen + "</b> 条记录已选中  列表中 <b>" + checkboxItems + "</b> 条纪录被选中 ";
		$("chkall").checked = false;
	}
	
	if(tableCheckAll == 0)
	{
	  $("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',0)">点此选择当前列表中所有 <b>' + totleRows + '</b> 条记录>></a></a>';
	}
  else
	{
		$("tipspan").innerHTML = '<a href="javascript:CheckTotle('+totleRows+',1)">取消当前列表所有记录选择>></a>';
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
		$("recycle").innerHTML = val ? val : "空";
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

	setLoad("记录" + thisaction + "中...");
	loadDisp(1);
	httpurl = $("op").value + "&chkinclude=" + idx + "&tpl=" + tpl;
	loadXMLDoc(DelItemsResult, httpurl);
}

function delAllSubmit(tpl)
{
	if(tableCheckAll == 0 && chkInclude == ",")
	{
		alert("请先选择对应的行");
		return;
	}
	
	if(checkboxItems == 0)
	{
		alert("请先选择对应的行");
		return;
	}
	
	confirmstr = "";
	
	if(tpl == "restore")
	{
		thisaction = "还原";
		confirmstr = '当前有 '+checkboxItems+' 条记录被选中，是否全部还原？';
	}
  else if(tpl == "ClearPP")
  {
  	thisaction = "清除密价";
		confirmstr = '当前有 '+checkboxItems+' 条记录被选中，是否全部清除密价？';
  }
  else
	{
		confirmstr = '当前有 '+checkboxItems+' 条记录被选中，是否全部' + thisaction + '？\n\n' + deltxt;
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
	
	setLoad("记录" + thisaction + "中...");
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
		//alert("请输入您需要搜索的关键词");
		//$("keywords").focus();
		//return false;
	}
	
	loadDisp(1);
}

function batch(ctl)
{
	if(tableCheckAll == 0 && chkInclude == ",")
	{
		alert("请先选择对应的行");
		return;
	}
	
	if(checkboxItems == 0)
	{
		alert("请先选择对应的行");
		return;
	}
	
	if(!confirm('当前有 '+checkboxItems+' 条记录被选中，是否批量修改这些记录？'))
	{
		return;
	}
	
	setLoad("页面加载中请稍等...");
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

  /* 保存原始的内容 */
  var org  = obj.innerHTML;
  var isIE = window.ActiveXObject ? true : false;
  var val  = isIE ? obj.innerText : obj.textContent;

  /* 创建一个输入框 */
  var txt = document.createElement("INPUT");
  txt.value = (val == 'N/A') ? '' : val;
  txt.style.width = (obj.offsetWidth + 12) + "px" ;

  /* 隐藏对象中的内容，并将输入框加入到对象中 */
  obj.innerHTML = "";
  obj.appendChild(txt);
  txt.focus();
  
  /* 编辑区输入事件处理函数 */
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

  /* 编辑区失去焦点的处理函数 */
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
            // 如果为 "OK"
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
        alert("您的浏览器不支持XMLHTTP")
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
		if(!confirm('是否要修改？(先按下实时修改按钮，这个提示框不再弹出!)'))
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
        // 如果为 "OK"
        if (xmlhttp.status==200)
        {
          var ackdata=xmlhttp.responseText;
          
          if(ackdata == "")
          {
          	obj.src = (val == "1") ? 'content/mod_shared/skins/images/yes.gif' : 'content/mod_shared/skins/images/no.gif';
          }
          else
        	{
        		if(ackdata== "已经有人处理此订单！")
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
    alert("您的浏览器不支持XMLHTTP")
  }
}

function toSelect(obj, id, param)
{
	if(!editRealtime)
	{
		if(!confirm('是否要修改？(先按下实时修改按钮，这个提示框不再弹出!)'))
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
        // 如果为 "OK"
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
    alert("您的浏览器不支持XMLHTTP")
  }
}


function toColor(obj, id, param)
{
	if(!editRealtime)
	{
		if(!confirm('是否要修改颜色？(先按下实时修改按钮，这个提示框不再弹出!)'))
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
          // 如果为 "OK"
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
      alert("您的浏览器不支持XMLHTTP")
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
    				alert('亏本了');
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
	setLoad("数据搜索中请稍等...");
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
		//列表选择全部的那个连接不需要
	  o.onclick = function(){};
	}
	es = $("titleList").getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
		//帮助信息也不要这个
		if( o.href.match( /javascript/i ) ){
	    o.onclick = function(){};
	  }
	}
	es = null;
}

//setCookie('idx', '6,5,8', 1);
//deleteCookie('idx');
//alert(getCookie('idx'));

//本页选择的总行数
var checkboxLen = 0;

//本列表选择的总行数
var checkboxItems = 0;

//是否列表所有行都选择
var tableCheckAll = 0;

//是否本页选择
var pageCheckAll  = 0;

//scrollCtl函数临界变量
var isscrollctl = 0;

//不勾选的框的集合
var chkExclude = ",";

//勾选框的集合
var chkInclude = ",";

//是否允许即时修改
var editRealtime = 0;

winResize();

setLoad("页面加载中请稍等...");

//初始化翻页
tPage();

//初始化当前页配置信息
tInfoReset();


setTableInput();
setButton();
setOnclick();




