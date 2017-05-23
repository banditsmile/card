function setoverbg(obj)
{
	obj.style.backgroundColor = "#FFFFE1";
}

function setoutbg(obj)
{
	//������һ�������Ƿ��Ѿ���ѡ
	obj.style.backgroundColor = "#FFFFFF";
}

var $ = function(id) {
	return document.getElementById(id);
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

function winResize() {
	heightResize();
	scrollCtl();
}

function heightResize()
{
	var docHeight = document.documentElement.clientHeight;
	tbodyHeight = docHeight - 100 - 26;

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

if(getOs() == "MSIE" && window.frameElement != null)
{
  window.frameElement.attachEvent("onresize",winResize);
}
else
{
	window.onresize = winResize;
}

function openScript(url,name,width,height)
{
  var Win = window.open(url,name,'width=' + width + ',height=' + height + ',resizable=0,scrollbars=no,menubar=no,status=no');
}

//������ʱ����Ҫ���ÿ����ʾ״̬��
function scrollCtl() {
	if(isscrollctl == 1){
	  return;
	}

	isscrollctl = 1;
	var docWidthOrg = document.documentElement.clientWidth;
	docWidth = docWidthOrg - 10;
	//�����ֿ��
	$("mytitle").style.width = docWidth + "px";
	$("titleList").style.width = docWidth + "px";
	$("tbBottom").style.width = docWidth + "px";
	
	len2 = $("thead").rows[0].cells.length - 1;
	len  = len2;
	tbodyrows = $("tbody").rows.length;
	tdisplen  = 0;

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
			  for(j = 0; j < tbodyrows; j++)
			  {
			    $("tbody").rows[j].cells[i].style.display = "";
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
	var tdEndWidth    = docWidthOrg - tdisplen - 10 - 7;
	if(tdEndWidth < 0)
	{
		tdEndWidth = 22;
	}

	//����β������趨
	$("thead").rows[0].cells[len2].style.width = tdEndWidth + "px";
	//tdEndWidth�ֳ�������
	var tdEndWidth1 = 27;
	var tdEndWidth2 = tdEndWidth - 28;
	$("thead").rows[0].cells[len2].style.width = tdEndWidth1 + "px";
	$("thead").rows[0].cells[resizeidx].style.width = tdEndWidth2 + "px";
  //����й���������
  
  //var tipWidth = docWidthOrg -= 10;
  
	if(((contentHeight + tdHeight - 1)/tdHeight) < len1)
  {
    tdEndWidth -= 15;
    //tipWidth   -= 15;
    tdEndWidth1 = 7;
	  tdEndWidth2 = tdEndWidth - tdEndWidth1-6;
  }
  else
	{
		tdEndWidth1 = 22;
	  tdEndWidth2 = tdEndWidth - tdEndWidth1-6;
	}
  
  //����β������趨
  if(tbodyrows > 0)
	{
    for(j = 0; j < tbodyrows; j++)
	  {
	    $("tbody").rows[j].cells[len2].style.width = tdEndWidth1 + "px";
	    $("tbody").rows[j].cells[resizeidx].style.width = tdEndWidth2 + "px";
	  }
  }
  
  
  //$("tip").style.width = tipWidth + "px";
	
	isscrollctl = 0;
	
	return;
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
		pageHtml += '<span class="disabled">��һҳ &gt;&gt;</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage-1) + ')" onFocus="this.blur()">��һҳ &gt;&gt;</a></span>';
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

	if(thisPage == totlePage)
	{
		pageHtml += '<span class="disabled">��һҳ &gt;&gt;</span>';
	}
  else
	{
	  pageHtml += '<span><a href="javascript:toPage(' + (thisPage+1) + ')" onFocus="this.blur()">��һҳ &gt;&gt;</a></span>';
  }
  
  if(totlePage == 1 || totlePage == thisPage)
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
	var url =  $("url").value;
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

function loadDisp(flag)
{
	$("load").style.display = flag ? "" : "none";
}

function setLoad(txt)
{
	$("loadcontent").innerHTML = '<div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>' + txt;
}

function toPage(page)
{
	loadDisp(1);
	var url = $("url").value;
	url = url + '&page=' + page;
	window.location = url;
}

function tableRefresh()
{
	loadDisp(1);
	var thisPage  = parseInt($("thisPage").value);
	httpurl = $("url").value + "&page=" + thisPage;
	window.location.href = httpurl;
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
    	e.onfocus = function(){ iEvent('focus',this)};
    	e.onblur =function(){iEvent('blur',this)};
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

	for(var i=0; i < btn.length; i++)
	{
		var o = btn[i];
		if(o.type=='button' || o.type=='reset' || o.type=='submit' || o.type=='radio' || o.type=='checkbox')
		{
			o.onfocus = function(){ this.blur();};
		}
	}
}

function setOnclick()
{
	es = document.getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
		if(o.target!="_blank" && !o.href.match( /javascript/i ))
		{
	    o.onclick = function(){ loadDisp(1);};
	  }
	  //o.onclick = function(){ loadDisp(1);};
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

//scrollCtl�����ٽ����
var isscrollctl = 0;
setLoad("ҳ����������Ե�...");
//��ʼ����ҳ
tPage();

winResize();

setTableInput();
setButton();
setOnclick();

