var xmlhttpmain = null;
var $ = function(id) {
	return document.getElementById(id);
}
function getXMLHander()
{
	// ��� Mozilla��������Ĵ��룺
  if (window.XMLHttpRequest)
  {
    xmlhttpmain=new XMLHttpRequest();
  }
  // ��� IE �Ĵ��룺
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
      // ��� xmlhttpmain ��ʾΪ "loaded"
      if (xmlhttpmain.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttpmain.status==200)
        {
          // ��������..
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
    alert("�����������֧��xmlhttp")
  }
}

GetMain();
