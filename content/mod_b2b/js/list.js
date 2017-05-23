
var $ = function(id) {
	return document.getElementById(id);
}

function GetList(cb_fun, url)
{
	var xmlhttp = null;
	
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

	webroot    = $("webdir").value;
	webpids    = $("pids").value;
	
	myurl      = webroot + "index.php?m=mod_b2b&c=product&a=SNP&pids=" + webpids;

  if (xmlhttp!=null)
  {
    xmlhttp.onreadystatechange=function(){
      // ��� xmlhttp ��ʾΪ "loaded"
      if (xmlhttp.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp.status==200)
        {
          // ��������..
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
    alert("�����������֧��XMLHTTP")
  }
}

GetList();
