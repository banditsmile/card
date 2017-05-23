
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
	
	// ��� Mozilla��������Ĵ��룺
  if (window.XMLHttpRequest)
  {
    xmlhttppinfo=new XMLHttpRequest();
  }
  // ��� IE �Ĵ��룺
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
      // ��� xmlhttp ��ʾΪ "loaded"
      if (xmlhttppinfo.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttppinfo.status==200)
        {
          // ��������..
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
    alert("�����������֧��XMLHTTP")
  }
}

function disp(id)
{
	$(id).style.display = $(id).style.display == "" ? "none" : "";
}
