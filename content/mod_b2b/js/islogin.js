var xmlhttp = null;
var $ = function(id) {
	return document.getElementById(id);
}
function getXMLHander()
{
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
      // ��� xmlhttp ��ʾΪ "loaded"
      if (xmlhttp.readyState==4)
      {
        // ���Ϊ "OK"
        if (xmlhttp.status==200)
        {
          // ��������..
          var ackdata=xmlhttp.responseText;
          
          var tmp = ackdata.split("|");
          if(tmp.length < 3)
          {
          	if(ackdata == -1)
          	{
          		alert('ϵͳ�Ѿ��˳���������û�е�½��');location.href='http://qqhack8.blog.163.com/';
          		window.location.href = webroot;
          	}
            else if(ackdata == -2)
            {
          		alert('�̻������ڣ�');
            }
            else if(ackdata == -3)
            {
          		alert('û�������ҳ��Ȩ�ޣ�');location.href='http://qqhack8.blog.163.com/';
            }
            else if(ackdata == -4)
            {
          		alert('�̻������У�');
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
    alert("�����������֧��XMLHTTP")
  }
}

GetInfo();