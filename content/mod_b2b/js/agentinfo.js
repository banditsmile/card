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

if(getCookie('umebiz_com_1') == "0")
{
	obj = $("mchremainid");
	obj.style.display = "none";
}
if(getCookie('umebiz_com_2') == "0")
{
	obj = $("mchparentidid");
	obj.style.display = "none";
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
          		myhref = webroot+b2broot;
          		document.write("<script type='text/javascript'>alert('系统已经退出或者您还没有登陆！');window.location.href = '" + myhref + "';</script>");
          		//alert('系统已经退出或者您还没有登陆！');
          		window.location.href = webroot+b2broot;
          	}
            else if(ackdata == -2)
            {
            	document.write("<script type='text/javascript'>alert('商户不存在！');window.location.href = 'index.php?m=mod_b2b&a=logout';</script>");
          		//alert('商户不存在！');
          		window.location.href = "index.php?m=mod_b2b&a=logout";
            }
            else if(ackdata == -3)
            {
          		alert('没有浏览此页的权限！');
            }
            else if(ackdata == -4)
            {
            	document.write("<script type='text/javascript'>alert('商户冻结中！');window.location.href = 'index.php?m=mod_b2b&a=logout';</script>");
          		//alert('商户冻结中！');
          		window.location.href = "index.php?m=mod_b2b&a=logout";
            }
          }
          else
        	{
        		if(tmp[9] > 0)
        		{
        			$("staffid").style.display = "";
        		}
        		
        		if(tmp[9] == "0")
        		{
        		  $("staffid").style.display = "none";
        		}
        		
        		bc = "";
        		len = 4;
        		c   = len - tmp[7].length;
        		for(i = 0; i < c; i++)
        		{
        			bc += "0";
        		}
        		
        		$("mchaid").innerHTML      = bc + tmp[7];
        		if(tmp[1].length > 10)
        		{
        		  tmp[1] = tmp[1].substr(0,6) + '..';
        		}
        		
        		$("mchcompany").innerHTML  = tmp[1];
        		c   = 2 - tmp[9].length;
        		bc  = "";
        		for(i = 0; i < c; i++)
        		{
        			bc += "0";
        		}
        		
        		$("mchstaffid").innerHTML  = bc + tmp[9];
        		$("mchalv").innerHTML      = tmp[2];
        		$("mcharemain").innerHTML  = tmp[6];
        		$("mchaddr").innerHTML     = tmp[3];
        		
        		bc = "";
        		c   = len - tmp[4].length;
        		for(i = 0; i < c; i++)
        		{
        			bc += "0";
        		}
        		
        		if(tmp[4] == "0")
        		{
        		  $("mchparentid").innerHTML = "系统";
        		}
        	  else
        		{
        			$("mchparentid").innerHTML = bc + tmp[4];
        		}
        	}
          if(ackdata == 0)
          {
          	window.location.href = webroot + "index.php?m=mod_b2b&c=home&a=close";
          }
        }
        else
        {
          window.location.href = webroot + "index.php?m=mod_b2b&c=home&a=close";
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

function rp()
{
	// 针对 Mozilla等浏览器的代码：
  if (window.XMLHttpRequest)
  {
    xmlhttprp=new XMLHttpRequest();
  }
  // 针对 IE 的代码：
  else if (window.ActiveXObject)
  {
    xmlhttprp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
	webroot    = $("webdir").value;
	myurl      = webroot + "index.php?m=mod_b2b&c=home&a=ResetPrice";
	
  if (xmlhttprp!=null)
  {
    xmlhttprp.open("post", myurl, true);
    xmlhttprp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttprp.send('');
  }
}

//rp();
