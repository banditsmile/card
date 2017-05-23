function dkfzone(){
  var xmlhttp;
  var obj    = document.getElementById("dkfdiv");
  var webdir = document.getElementById("webdir").value;
  
  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4)
    {
      if (xmlhttp.status==200)
      {
        var data=xmlhttp.responseText;
        if(data != "" )
        {        
          obj.innerHTML = data;
          //$("dkfdivtemp").innerHTML = data;
          //obj.onmouseout = function(){setkf(0)}
        }
      }
    }
  }
  
  var weburl = webdir + "index.php?m=mod_b2b&a=Dkf"; 
  xmlhttp.open("post", weburl, true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send('')
}

function setkf(flag, e, handler)
{
	if(isMouseLeaveOrEnter(e, handler))
	{
	  obj = $("dkfdiv");
	  if(flag==1)
	  {
	    obj.className = "dkf2";
	    thtml = obj.innerHTML;
	    if(thtml == "")
	    {
	      dkfzone();
	    }
	    
	  }
    else
	  {
	    obj.className = "dkf1";
	  }
  }
}

function isMouseLeaveOrEnter(e, handler) 
{   
 if (e.type != 'mouseout' && e.type != 'mouseover') return false;   
 var reltg = e.relatedTarget ? e.relatedTarget : e.type == 'mouseout' ? e.toElement : e.fromElement;   
 while (reltg && reltg != handler)   
   reltg = reltg.parentNode;   
 return (reltg != handler);   
}   
