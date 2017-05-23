
var $ = function(id) {
	return document.getElementById(id);
}

function GetList(cb_fun, url)
{
	var xmlhttp = null;
	
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

	webroot    = $("webdir").value;
	webpids    = $("pids").value;
	
	myurl      = webroot + "index.php?m=mod_b2b&c=product&a=SNP&pids=" + webpids;

  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange=function(){
      // 如果 xmlhttp 显示为 "loaded"
      if (xmlhttp.readyState==4)
      {
        // 如果为 "OK"
        if (xmlhttp.status==200)
        {
          // 其他代码..
          var ackdata=xmlhttp.responseText;

          if(ackdata == 0)
          {
          	return;
          }
          
          var tmp = ackdata.split("|");
          
          len1 = tmp.length - 1;
          
          if(len1 <= 0)
          {
          	return;
          }
          
          for(i = 0; i< len1; i++)
          {
          	var tmp2 = tmp[i].split(",");
          	pid = tmp2[0];
          	$("price_" + pid).innerHTML = tmp2[2];
          	$("stock_" + pid).innerHTML = tmp2[1];
          }
        }
        else
        {
          
        }
      }
    };
    xmlhttp.open("post", myurl, true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send('');
  }
  else
  {
    alert("您的浏览器不支持XMLHTTP")
  }
}

GetList();
