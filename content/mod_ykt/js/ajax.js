function checkcode(regcode){  
  var xmlhttp;
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
      code_result(data);
      }
    else{
      $("spanrandcode").innerHTML="验证码校验失败,请联系管理员";
      }
    }
  else{
    $("spanrandcode").innerHTML="正在进行验证码校验1...";
    }
  }
  //alert(regcode);
  xmlhttp.open("post", "index.php?m=mod_ykt&a=checkcode", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("regcode="+escape(regcode));
}

function code_result(data){
  var resultbox=$("spanrandcode");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesok.gif"/> 验证码正确';
    flag[9]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesno.gif"/> 验证码错误';
    flag[9]=0;
    check_data();
    }
}
  
//--------------------------------------------------------------------
function checkid(regid){  
  var xmlhttp;
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
      id_result(data);
      }
    else{
      $("spancname").innerHTML="用户名检测失败,请联系管理员";
      }
    }
  else{
    $("spancname").innerHTML="正在进行用户名校验...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_ykt&a=checkuser", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("ubzaname="+escape(regid));
}

//--------------------------------------------------------------------
function checkparent(regid){  
  var xmlhttp;
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
      parentid_result(data);
      }
    else{
      $("spanparentid").innerHTML="上级代理商检测失败,请联系管理员";
      }
    }
  else{
    $("spanparentid").innerHTML="正在进行上级代理商校验...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_ykt&a=checkagentbyid", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("ubzaid="+escape(regid));
}

function id_result(data){
  var resultbox=$("spancname");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesok.gif"/> 用户名可用';
    flag[0]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesno.gif"/> 该用户名已经被注册';
    flag[0]=0;
    check_data();
  }
}

function parentid_result(data){
  var resultbox=$("spanparentid");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesok.gif"/> 上级代理商有效';
    flag[18]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_ykt/images/reg_yesno.gif"/> 上级代理商无效';
    flag[18]=0;
    check_data();
  }
}

//--------------------------------------------------------------------
function sendinfo(){
	var ubzcname     = $("cname").value;
	var ubzcpwd      = $("cpwd").value;
	var ubzcrealname = $("crealname").value;
	var ubzcqq       = $("cqq").value;
	var ubzcmail     = $("cmail").value;
	var ubzcmobile   = $("cmobile").value;
	var ubzctel      = $("ctel").value;
	var ubzcaddr     = $("caddr").value;
	var ubzcompany   = $("company").value;
	var ubzcity      = $("city").value;
	var ubzprv       = $("prv").value;
	var ubzparentid  = $("parentid").value;
	var ubzrandcode  = $("randcode").value;
	var ubzwebsetting= "";//$("websetting").value;
	var ubzeshop     = $("eshop").value;
	var ubzidcard    = $("idcard").value;
  var xmlhttp;
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
      reg_result(data);
      }
    else{
      $("spanresult").innerHTML="注册失败,请联系管理员";
      }
    }
  else{
    $("spanresult").innerHTML="正在进行用户名注册...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_ykt&a=save", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send("ubzcname="+encodeURIComponent(ubzcname)+"&ubzcpwd="+escape(ubzcpwd)+"&ubzcmail="+escape(ubzcmail)+"&ubzcrealname="+encodeURIComponent(ubzcrealname)+"&ubzcqq="+escape(ubzcqq)+"&ubzcmobile="+escape(ubzcmobile)+"&ubzctel="+escape(ubzctel)+"&ubzcaddr="+encodeURIComponent(ubzcaddr)+"&ubzrandcode="+encodeURIComponent(ubzrandcode)+"&ubzcompany="+encodeURIComponent(ubzcompany)+"&ubzprv="+encodeURIComponent(ubzprv)+"&ubzcity="+encodeURIComponent(ubzcity)+"&ubzwebsetting="+encodeURIComponent(ubzwebsetting)+"&ubzparentid="+encodeURIComponent(ubzparentid)+"&ubzeshop="+encodeURIComponent(ubzeshop)+"&ubzidcard="+encodeURIComponent(ubzidcard));
}
function reg_result(data)
{
  if(data==1){
    $("spanresult").innerHTML='<a href="index.php?m=mod_ykt" target="_blank">'+$("cname").value+",您好.请点击这里登陆</a>";
    alert('注册成功,马上返回系统首页！');
    window.location=('index.php?m=mod_ykt');
  }else if(data==2) {
  	$("spanresult").innerHTML="系统没有设置代理级别，无法注册，请联系管理员";
  }else if(data ==3) {
  	$("spanresult").innerHTML="上级代理商不存在";
  }else if(data ==4) {
  	$("spanresult").innerHTML="上级代理商没有权限招收下级";
  }
  else{
    $("spanresult").innerHTML="注册失败!请联系管理员";
  }
}
