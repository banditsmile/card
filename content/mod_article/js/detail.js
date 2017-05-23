	var $ = function(id) {
     return document.getElementById(id);
  }
  
  var webdir = $("webdir").value;
  
	function SetFace(face)
	{
		document.nouse.content.value=document.nouse.content.value + face;
	}
	
	function UpdateCount(obj){
  var xmlhttp;
  var temp;
  var tid = obj.id;
  tmp = tid.split("_");
  var a  = tmp[0];
  var id = tmp[1];

  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        if(data != "" ){
        	if(data == "-1")
        	{
        	  alert("您已经投票了！请不要重复投票");
          }
          else
        	{
        		if(a == "zc")
        	  {
        	    $(tid).innerHTML = "支持(" + data + ")";
            }
            if(a == "fd")
        	  {
        	    $(tid).innerHTML = "反对(" + data + ")";
            }
            if(a == "d")
        	  {
        	    $(tid).innerHTML = "顶(" + data + ")";
            }
        	}
        }
      }
    }
  }
  //alert(regcode);
  xmlhttp.open("post", webdir + "wgsoft/update.asp", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("a="+escape(a)+"&id="+escape(id));
  }
  
  SetRank(100);
  
  function SetRank(rank){
  var xmlhttp;
  var temp;
  var a  = rank;
  var id = $("id").value;

  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        
        if(data != "" ){
        	if(data == "-1")
        	{
        		if(a == 20)
        		{
        			alert("您已经顶过了！请不要重复顶！");
        		}
        	  else
        		{
        	    alert("您已经评价了！请不要重复投票");
        	  }
          }
          else
        	{
        		tmp = data.split("|");
        	  if(a == 20)
        		{
        			$("rank20").innerHTML = data;
        		}
        	  else
        		{
        			$("rank0").innerHTML = tmp[0];
        		  $("rank1").innerHTML = tmp[1];
        		  $("rank2").innerHTML = tmp[2];
        		  $("rank3").innerHTML = tmp[3];
        		  $("rank4").innerHTML = tmp[4];
        		  $("rank5").innerHTML = tmp[5];
        		  $("rank6").innerHTML = tmp[6];
        		  $("rpic0").style.height = tmp[7] + "px";
        		  $("rpic1").style.height = tmp[8] + "px";
        		  $("rpic2").style.height = tmp[9] + "px";
        		  $("rpic3").style.height = tmp[10] + "px";
        		  $("rpic4").style.height = tmp[11] + "px";
        		  $("rpic5").style.height = tmp[12] + "px";
        		  $("rpic6").style.height = tmp[13] + "px";
        		  $("rank20").innerHTML = tmp[14];
        		  $("rank1000").innerHTML = tmp[15];
        		  $("tick").innerHTML = tmp[16];
        		}
        	}
        }
      }
    }
  }
  //alert(regcode);
  xmlhttp.open("post", webdir + "index.php?m=mod_article&c=ajax&a=rank", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("action="+escape(a)+"&id="+escape(id));
  }
  
  //UpdateDownCount();
  
  function UpdateDownCount(){
  var xmlhttp;
  var temp;
  var a  = rank;
  var id = $("wid").value;

  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        if(data != "" ){
        	$("downcount").innerHTML = data;
        }
      }
    }
  }

  xmlhttp.open("post", webdir + "", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("id="+escape(id));
  }
  
  //GetSoftRight();
  function GetSoftRight(){
  var xmlhttp;
  var temp;
  var id = $("wid").value;
  
  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        if(data != "" ){
        	$("softrt").innerHTML = data;
        }
      }
    }
  }
  xmlhttp.open("post", webdir + "", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("id="+escape(id));
  }
  
  //GetComment();
  function GetComment(){
  var xmlhttp;
  var temp;
  var wg = $("wg").value;

  try{
    xmlhttp=new XMLHttpRequest();
  }
  catch(e){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        var data=xmlhttp.responseText;
        if(data != "" ){
        	$("comment").innerHTML = data;
        }
      }
    }
  }

  xmlhttp.open("post", webdir + "", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("wg="+escape(wg));
  }
  
  
