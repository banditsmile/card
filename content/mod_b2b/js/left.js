var xmlhttpmain = null;
var $ = function(id) {
	return document.getElementById(id);
}
function getXMLHander()
{
	// 针对 Mozilla等浏览器的代码：
  if (window.XMLHttpRequest)
  {
    xmlhttpmain=new XMLHttpRequest();
  }
  // 针对 IE 的代码：
  else if (window.ActiveXObject)
  {
    xmlhttpmain=new ActiveXObject("Microsoft.xmlhttp");
  }
  
  return xmlhttpmain;
}

function GetMain()
{
	xmlhttpmain    = getXMLHander();
	webroot    = $("webdir").value;
	myurl      = webroot + "index.php?m=mod_b2b&c=home&a=main";
	
  if (xmlhttpmain!=null)
  {
    xmlhttpmain.onreadystatechange=function(){
      // 如果 xmlhttpmain 显示为 "loaded"
      if (xmlhttpmain.readyState==4)
      {
        // 如果为 "OK"
        if (xmlhttpmain.status==200)
        {
          // 其他代码..
          var ackdata=xmlhttpmain.responseText;
          if($("main"))
          {
            $("main").innerHTML = ackdata;
          }
        }
      }
    };
    xmlhttpmain.open("post", myurl, true);
    xmlhttpmain.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttpmain.send('');
  }
  else
  {
    alert("您的浏览器不支持xmlhttp")
  }
}

GetMain();
