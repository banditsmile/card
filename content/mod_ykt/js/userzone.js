UserZone();

function UserZone(){
  var xmlhttp;
  var obj    = document.getElementById("userzone");
  var webdir = document.getElementById("webdir").value;
  
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
        if(data != "" )
        {        
          obj.innerHTML = data;
        }
      }
    }
  }
  
  var weburl = webdir + "index.php?m=mod_ykt&a=userZone"; 
  xmlhttp.open("post", weburl, true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send('')
}


function disp(id)
{
	ste = document.getElementById(id).style.display;
	document.getElementById(id).style.display = ste == "" ? "none" : ""; 
}
