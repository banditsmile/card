var xmlhttp2 = null;
var $ = function(id) {
	return document.getElementById(id);
}
function getXMLHander()
{
	// ��� Mozilla��������Ĵ��룺
  if (window.XMLHttpRequest)
  {
    xmlhttp2=new XMLHttpRequest();
  }
  // ��� IE �Ĵ��룺
  else if (window.ActiveXObject)
  {
    xmlhttp2=new ActiveXObject("Microsoft.xmlhttp");
  }
  
  return xmlhttp2;
}

function OpenState(cb_fun, url)
{
	xmlhttp2    = getXMLHander();
	webroot    = $("webdir").value;
	myplatform = $("platform").value;
	if(myplatform == "index")
	{
		return;
	}
	myurl      = webroot + "index.php?m=mod_" + myplatform + "&c=home&a=web";
	
  if (xmlhttp2!=null)
  {
    xmlhttp2.onreadystatechange=function(){
      // ��� xmlhttp2 ��ʾΪ "loaded"
      if (xmlhttp2.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp2.status==200)
        {
          // ��������..
          var ackdata=xmlhttp2.responseText;

          if(ackdata == 0)
          {
          	window.location.href = webroot + "index.php?m=mod_" + myplatform + "&c=home&a=close";
          }
        }
      }
    };
    xmlhttp2.open("post", myurl, true);
    xmlhttp2.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp2.send('');
  }
  else
  {
    alert("�����������֧��xmlhttp")
  }
}

OpenState();


//����vinfo
vinfo();

function vinfo(){
	var xmlhttp9;
	var turl = this.location.href;
	var tref = document.referrer;
	try{
		xmlhttp9=new XMLHttpRequest();
	}
	catch(e){
		xmlhttp9=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp9.onreadystatechange=function(){}
	webroot    = $("webdir").value;
	xmlhttp9.open("post", webroot + "index.php?m=mod_counter", true);
	xmlhttp9.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp9.send("url="+escape(turl)+"&ref="+escape(tref))
}