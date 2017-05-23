PrdZone();

function PrdZone(){
  var xmlhttp;
  var obj2        = document.getElementById("cprice");
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
        	tmp = ackdata.split("|");
          obj2.innerHTML = document.getElementById("moneysymbol").value+tmp[1]+document.getElementById("moneyunit").value;
          document.getElementById("ubzcprice").value = tmp[1];
          document.getElementById("ubzdollars").value = tmp[1];

          //查看是否是卡密商品
          if(tmp.length >= 3 && tmp[2] != -1)
          {
          	/*
          	if(tmp[2] == 0)
          	{
          		str = '<font color="#ff0000">库存已经没有号码可选</font>';
          	}
            else
          	{
          		str = "";
          		tmp2 = tmp[2].split(",")
          	  len  = tmp2.length;
          	  for(i = 0; i < len; i++)
          	  {
          	    str += '<div><input id="ubzczacount" name="ubzczacount" type="radio" value="' + tmp2[i] + '"/> <font color="#ff0000"><b>' + tmp2[i] + '</b></font></div>';
          	  }
          	}
          	
          	document.getElementById("cardsdiv").innerHTML = str;
          	*/
          }
          
          if(tmp.length >= 5)
          {
          	listprice = document.getElementById("priceforplayer").value;
          	if(listprice != tmp[4])
          	{
          	  document.getElementById("priceforplayer").value = tmp[4];
          	  ChangeNum();
          	}
          }
          
          if(tmp.length >= 6)
          {
          	/*
          	if(tmp[5] == "0")
          	{
          		document.getElementById("priceforplayer").readOnly = true;
          		document.getElementById("priceforplayer").style.background = "#f0f0f0";
          		document.getElementById("dollarsforplayer").readOnly = true;
          		document.getElementById("dollarsforplayer").style.background = "#f0f0f0";
          	}
          	*/
          	//if(getCookie('umebiz_com_ini_0') == "0")
            //{
            if(tmp[5] == "1")
            {
            	document.getElementById("priceforplayer").readOnly = false;
          		document.getElementById("priceforplayer").style.background = "#f8f8f8";
          		document.getElementById("dollarsforplayer").readOnly = false;
          		document.getElementById("dollarsforplayer").style.background = "#f8f8f8";
          	}
            //}
          }
        }
        
      }
    }
  }
  
  var weburl = webdir + "index.php?m=mod_b2b&c=Product&a=Zone";
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
  
  var vscoredpid = document.getElementById("scoredpid").value;
  
  if(mycztpl > 0 && (myptype == 2 || vscoredpid > 0))
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
    
    var weburl = webdir + "index.php?m=mod_b2b&c=Product&a=CheckTpl";
    
    xht.open("post", weburl, true);
    xht.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xht.send("cztpl="+escape(mycztpl))
  }
}
