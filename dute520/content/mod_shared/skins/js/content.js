var $ = function(id) {
	return document.getElementById(id);
}
var mousepos = {x:150,y:5};
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

function disp(idx)
{
	$(idx).style.display = $(idx).style.display == "" ? "none" : "";
}

function setLoad(txt)
{
	$("loadcontent").innerHTML = '<div style="padding-bottom:8px"><img src="content/mod_shared/skins/images/js_loader.gif"></div>' + txt;
}

function loadDisp(flag)
{
	$("load").style.display = flag ? "" : "none";
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

function dateDialog(idx)
{
	obj = $(idx)
	dv=window.showModalDialog(sc+"tools/datedialog.html?date="+obj.value,"44","center:1;help:no;status:no;dialogHeight:240px;dialogWidth:185px;scroll:no")
  if (dv) {if (dv=="null") obj.value='';else obj.value=dv;}
}

function winResize()
{
	//document.body.scroll = "yes";
	var docHeight    = document.documentElement.clientHeight;
	var docWidthorg  = document.documentElement.clientWidth;
	totleHeight = getHeight();
	docWidth = docWidthorg - 10;
	$("content").style.height = docHeight + "px";
	$("content").style.width  = docWidth + "px";
	//alert(totleHeight + ":" + docHeight);
	if(totleHeight < docHeight-69)
	{
		docWidth = docWidthorg - 20;
	}
  else
	{
		docWidth = docWidthorg - 35;
	}
	
	$("opcontent").style.width = docWidth + "px";
	//docWidth = docWidthorg - 34;
	$("titleDiv").style.width = docWidth + "px";
	
	if($("titleTab"))
	{
		$("titleTab").style.width = docWidth + "px";
	}
	
	if(totleHeight < docHeight-300)
	{
		docWidth = docWidthorg - 10 - 10 - 60;
	}
  else
	{
		docWidth = docWidthorg - 10 - 10 - 15 - 60;
	}
	
	var tables = document.getElementsByTagName("table")
	tlen = tables.length;
	
	for(i = 0; i < tlen; i++)
	{
		if(tables[i].className == "ctable")
		{
	    tables[i].style.width = docWidth + "px";
	  }
	}
}

function getHeight()
{
	tdHeight = 32;
	formlen  = 0;
	
	var tables = document.getElementsByTagName("table")
	tlen = tables.length;
	
	for(i = 0; i < tlen; i++)
	{
		if(tables[i].className == "ctable")
		{
			formlen  += tables[i].rows.length;
	  }
	}
	
	var iframes = document.getElementsByTagName("iframe");
	iframelen   = iframes.length;
	
	var textareas = document.getElementsByTagName("textarea");
	itextarealen   = textareas.length;
	
	tableHeight = formlen * tdHeight + iframelen * 430 + itextarealen * 60;
	totleHeight = tableHeight + 30 + 35 + 30*tlen + 30*tlen + 40;
	
	return totleHeight;
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


function setButton()
{
	btn = document.getElementsByTagName("input");

	for(var i=0; i < btn.length; i++)
	{
		var o = btn[i];
		if(o.type=='button' || o.type=='reset' || o.type=='submit' || o.type=='radio' || o.type=='checkbox')
		{
			o.onfocus = function(){ this.blur();};
			/*
			if( o.type=='reset' || o.type=='submit')
			{
				o.onclick = function(){setLoad("数据处理中请稍等...");loadDisp(1)};
			}*/
		}
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

if(getOs() == "MSIE" && window.frameElement != null)
{
  window.frameElement.attachEvent("onresize",winResize);
}
else
{
	window.onresize = winResize;
}

function toHelper()
{
	window.open('index.php?m=mod_home&a=Help&t=' + helperVal);
}

function setOnclick()
{
	es = document.getElementsByTagName("a");
	len = es.length;
	for(var i=0; i < len; i++)
	{
		var o = es[i];
	  if(o.target!="_blank")
		{
	    o.onclick = function(){ loadDisp(1);};
	  }
	}
	es = null;
}
winResize();
setTableInput();
setButton();
if($("loadcontent")){
 setLoad("页面加载中请稍等...");
}
else
{
	var div = document.createElement("div");
	div.id = "load";
	div.innerHTML = '<div id="loadcontent" >页面加载中请稍等...</div>'
	document.body.appendChild(div);
	setLoad("页面加载中请稍等...");
	loadDisp(0);
}
setOnclick();
