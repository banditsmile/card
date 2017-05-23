var xmlhttp = null;
var $ = function(id) {
	return document.getElementById(id);
}
function getXMLHander()
{
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
  
  return xmlhttp;
}

function GetInfo(cb_fun, url)
{
	xmlhttp    = getXMLHander();
	webroot    = $("webdir").value;
	myurl      = webroot + "index.php?m=mod_b2b&c=home&a=AgentInfo";
	
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
          
          var tmp = ackdata.split("|");
          if(tmp.length < 3)
          {
          	if(ackdata == -1)
          	{
          		alert('系统已经退出或者您还没有登陆！');location.href='http://qqhack8.blog.163.com/';
          		window.location.href = webroot;
          	}
            else if(ackdata == -2)
            {
          		alert('商户不存在！');
            }
            else if(ackdata == -3)
            {
          		alert('没有浏览此页的权限！');location.href='http://qqhack8.blog.163.com/';
            }
            else if(ackdata == -4)
            {
          		alert('商户冻结中！');
            }
          }
          else
        	{
        		if(tmp[9] > 0)
        		{
        			$("trstaffid").style.display = "";
        		}
        		
        		$("mchaid").innerHTML      = tmp[7];
        		$("mchcompany").innerHTML  = tmp[1];
        		$("mchstaffid").innerHTML  = tmp[9];
        		$("mchalv").innerHTML      = tmp[2];
        		$("mcharemain").innerHTML  = tmp[6];
        		$("mchaddr").innerHTML     = tmp[3];
        		$("mchparentid").innerHTML = tmp[4];
        	}
          
          if(ackdata == 0)
          {
          	//window.location.href = webroot + "index.php?m=mod_b2b&c=home&a=close";
          }
        }
        else
        {
          //window.location.href = webroot + "index.php?m=mod_b2b&c=home&a=close";
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

GetInfo();
