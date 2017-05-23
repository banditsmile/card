var $ = function(id) {
	return document.getElementById(id);
}

function CheckMobile()
{
	if (window.XMLHttpRequest)
  {
    xmlhttpmobile=new XMLHttpRequest();
  }
  // 针对 IE 的代码：
  else if (window.ActiveXObject)
  {
    xmlhttpmobile=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
	webroot    = $("webdir").value;
	loginad_val= $("ad_login").checked ? 1 : 0;
  
  if(loginad_val == 1)
  {
	  aname_val  = $("aname").value;
  }
  else
	{
		aname_val  = $("staffname").value;
	}
	myurl      = webroot + "index.php?m=mod_b2b&a=CheckMobile";

  if (xmlhttpmobile!=null)
  {
    xmlhttpmobile.onreadystatechange=function(){
      if (xmlhttpmobile.readyState==4)
      {
        if (xmlhttpmobile.status==200)
        {
          var ackdata=xmlhttpmobile.responseText;

          if(ackdata == "1")
          {
          	$("mobilecode").style.display = "";
          }
        }
      }
    };

    xmlhttpmobile.open("post", myurl, true);
    xmlhttpmobile.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttpmobile.send('loginad='+loginad_val+'&aname='+aname_val);
  }
  else
  {
    alert("您的浏览器不支持XMLHTTP")
  }
}

if($("aname").value != "")
{
	//CheckMobile();
}
