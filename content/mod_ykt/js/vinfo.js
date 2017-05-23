vinfo();

function vinfo(){
	var xmlhttp;
	var turl = this.location.href;
	var tref = document.referrer;
	var webdir = document.getElementById("webdir").value;
	var aobj = document.getElementById("aid");
	
	var aid = "";
	
	if(aobj != null)
	{
	  var aid = document.getElementById("aid").value;
  }
	try{
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
        var data=xmlhttp.responseText;
        if((data != "")&&(aid != ""))
        {        
          document.getElementById("atick").innerHTML = data;
        }
      }
    }
	}
	var weburl = webdir + "vinfo.asp"; 
	xmlhttp.open("post", weburl, true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send("url="+escape(turl)+"&ref="+escape(tref) + "&aid="+escape(aid))
}
