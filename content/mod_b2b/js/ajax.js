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
      $("spanrandcode").innerHTML="��֤��У��ʧ��,����ϵ����Ա";
      }
    }
  else{
    $("spanrandcode").innerHTML="���ڽ�����֤��У��1...";
    }
  }
  //alert(regcode);
  xmlhttp.open("post", "index.php?m=mod_b2b&a=checkcode", true);
  xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
  xmlhttp.send("regcode="+escape(regcode));
}

function code_result(data){
  var resultbox=$("spanrandcode");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesok.gif"/> ��֤����ȷ';
    flag[9]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesno.gif"/> ��֤�����';
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
      $("spancname").innerHTML="�û������ʧ��,����ϵ����Ա";
      }
    }
  else{
    $("spancname").innerHTML="���ڽ����û���У��...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_b2b&a=checkuser", true);
  xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
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
      $("spanparentid").innerHTML="�ϼ������̼��ʧ��,����ϵ����Ա";
      }
    }
  else{
    $("spanparentid").innerHTML="���ڽ����ϼ�������У��...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_b2b&a=checkagentbyid", true);
  xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
  xmlhttp.send("ubzaid="+escape(regid));
}

function id_result(data){
  var resultbox=$("spancname");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesok.gif"/> �û�������';
    flag[0]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesno.gif"/> ���û����Ѿ���ע��';
    flag[0]=0;
    check_data();
  }
}

function parentid_result(data){
  var resultbox=$("spanparentid");
  if(data==1){
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesok.gif"/> �ϼ���������Ч';
    flag[18]=1;
    check_data();
    }
  else{
    resultbox.innerHTML='<img style="vertical-align:middle" src="content/mod_b2b/images/reg_yesno.gif"/> �ϼ���������Ч';
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
	var ubzwebsetting= $("websetting").value;
	var ubzeshop     = $("eshop").value;
	var ubzidcard    = $("idcard").value;
	
	if(ubzcname == ubzcpwd)
	{
		alert("�벻Ҫʹ���û��������룡���������ύ����");
		return;
	}
	
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
      $("spanresult").innerHTML="ע��ʧ��,����ϵ����Ա";
      }
    }
  else{
    $("spanresult").innerHTML="���ڽ����û���ע��...";
    }
  }
  xmlhttp.open("post", "index.php?m=mod_b2b&a=save", true);
  xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
  xmlhttp.send("ubzcname="+encodeURIComponent(ubzcname)+"&ubzcpwd="+escape(ubzcpwd)+"&ubzcmail="+escape(ubzcmail)+"&ubzcrealname="+encodeURIComponent(ubzcrealname)+"&ubzcqq="+escape(ubzcqq)+"&ubzcmobile="+escape(ubzcmobile)+"&ubzctel="+escape(ubzctel)+"&ubzcaddr="+encodeURIComponent(ubzcaddr)+"&ubzrandcode="+encodeURIComponent(ubzrandcode)+"&ubzcompany="+encodeURIComponent(ubzcompany)+"&ubzprv="+encodeURIComponent(ubzprv)+"&ubzcity="+encodeURIComponent(ubzcity)+"&ubzwebsetting="+encodeURIComponent(ubzwebsetting)+"&ubzparentid="+encodeURIComponent(ubzparentid)+"&ubzeshop="+encodeURIComponent(ubzeshop)+"&ubzidcard="+encodeURIComponent(ubzidcard));
}
function reg_result(data)
{
  if(data==1){
    $("spanresult").innerHTML='<a href="index.php?m=mod_b2b" target="_blank">'+$("cname").value+",����.���������½</a>";
    alert('ע��ɹ�,���ϵͳ��̨û������ע���Զ���ͨ��Ҫ��ϵ����Ա�ֶ���ͨ������������ע���Զ���ͨ����������ϵ��½����');
    window.location=('index.php?m=mod_b2b');
  }else if(data==11) {
    $("spanresult").innerHTML='���¼�'+$("cname").value+"ע��ɹ�</a>";
    alert('���¼�ע��ɹ���ϵͳ�������¼��б�ҳ��');
    window.location=('index.php?m=mod_agent&c=underling');
  }else if(data==2) {
  	$("spanresult").innerHTML="ϵͳû�����ô������޷�ע�ᣬ����ϵ����Ա";
  }else if(data ==3) {
  	$("spanresult").innerHTML="�ϼ������̲�����";
  }else if(data ==4) {
  	$("spanresult").innerHTML="�ϼ�������û��Ȩ�������¼�";
  }
  else{
    $("spanresult").innerHTML="ע��ʧ��!����ϵ����Ա";
  }
}
