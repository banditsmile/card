
var $ = function(id) {
	return document.getElementById(id);
}

function GetPinfo(pid, flag)
{
	realid = flag ? "pinfo" + pid : "psupinfo" + pid
	
	if($(realid).innerHTML != "")
	{
		disp(realid);
		return;
	}
	
	var xmlhttppinfo = null;
	
	// 针对 Mozilla等浏览器的代码：
  if (window.XMLHttpRequest)
  {
    xmlhttppinfo=new XMLHttpRequest();
  }
  // 针对 IE 的代码：
  else if (window.ActiveXObject)
  {
    xmlhttppinfo=new ActiveXObject("Microsoft.XMLHTTP");
  }

	webroot    = $("webdir").value;
	webpids    = $("pids").value;
	
	if(flag)
	{
	  myurl = webroot + "index.php?m=mod_b2b&c=product&a=PInfo&pid=" + pid;
	}
  else
	{
		myurl = webroot + "index.php?m=mod_b2b&c=product&a=PSupInfo&pid=" + pid;
	}

  if (xmlhttppinfo!=null)
  {
    xmlhttppinfo.onreadystatechange=function(){
      // 如果 xmlhttp 显示为 "loaded"
      if (xmlhttppinfo.readyState==4)
      {
        // 如果为 "OK"
        if (xmlhttppinfo.status==200)
        {
          // 其他代码..
          var ackdata=xmlhttppinfo.responseText;
          
          $(realid).innerHTML = ackdata;
          disp(realid);
        }
      }
    };
    xmlhttppinfo.open("post", myurl, true);
    xmlhttppinfo.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttppinfo.send('');
  }
  else
  {
    alert("您的浏览器不支持XMLHTTP")
  }
}

function disp(id)
{
	$(id).style.display = $(id).style.display == "" ? "none" : "";
}
