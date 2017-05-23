PrdZone();

function PrdZone(){
  var xmlhttp;
  var obj         = document.getElementById("thisstock");
  var webdir      = document.getElementById("webdir").value;
  
  try
  {
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4)
    {
      if (xmlhttp.status==200)
      {
        var ackdata=xmlhttp.responseText;
        if(ackdata != "" )
        {
        	if(ackdata == -1)
        	{
        		alert('您好,商品已经下架或者已经不存在!');
        		window.location.href = "notsell.html";
        	}
          else
        	{
        		tmp = ackdata.split("|");
            obj.innerHTML = tmp[0];

            if(tmp[1] != "")
            {
            	if(tmp.length < 3)
            	{
            		return;
            	}
            	tmp1 = tmp[2];
            	if(tmp1 != "")
            	{
            	  tmp2 = tmp1.split(",");
            	  len = tmp2.length;
            	  opstr = ""
            	  check = "";
            	  for(i =0 ; i < len; i++)
                {
            	  	check = i == 0 ? "checked" : "";
            	  	opstr += '<div><input name="ubzczacount" style="background:none;border:none;width:15px;" type="radio" value="' + tmp2[i] + '" ' + check + '/> <font color="#ff0000"><b>' + tmp2[i] + '</b></font></div>';
            	  }
              }
              else
            	{
            		opstr = "<font color='#ff0000'>已经没有号码可选</font>";
            		$("ubzqty").value = 0;
            	}

            	$("cardsdiv").innerHTML = opstr;
            }
          }
        }
      }
    }
  }
  
  var weburl = webdir + "index.php?m=mod_ykt&c=Product&a=Zone";
  var ubzpid = document.getElementById("ubzpid").value;
  xmlhttp.open("post", weburl, true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("pid="+escape(ubzpid))
}

UpdateTpl();
function UpdateTpl(){

  var myptype = document.getElementById("ubzptype").value;
	
  var mycztpl = 0;
	
	if(document.getElementById("ubztpl"))
	{
    mycztpl = document.getElementById("ubztpl").value;
  }
  
  if(myptype != 1 && myptype != 2)
  {
  	mycztpl == 0
  }

  if(mycztpl > 0)
  {
    var xht;
    var webdir      = document.getElementById("webdir").value;
    try
    {
      xht=new XMLHttpRequest();
    }
    catch(e){
      xht=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xht.onreadystatechange=function(){
    	if (xht.readyState==4)
      {
        if (xht.status==200)
        {
          var ackdata=xht.responseText;

          if(ackdata == "1" )
          {
          	alert("充值模板有更新！请重新填写订单信息");
          	window.location.reload();
          }
        }
      }
    }
    
    var weburl = webdir + "index.php?m=mod_b2c&c=Product&a=CheckTpl";
    
    xht.open("post", weburl, true);
    xht.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xht.send("cztpl="+escape(mycztpl))
  }
}
