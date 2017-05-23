var $ = function(id) {
  return document.getElementById(id);
}

function Order()
{	
	var ubzdollars = $("ubzdollars").value;
	
	if (ubzdollars == ""){
    $("ubzdollars").focus();
    alert ("请输入您需要充值的金额！");
    return false;
  }	
  
	query = "ubzdollars=" + $("ubzdollars").value;
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
        if(data != "" ){
        	if(data.length < 50)
        	{
        		alert(data);
        	}
          else
        	{
        		$("AutoPostPrompt").innerHTML = data;
        		ShadeBegin();
        	}
          //$("ubzcrealname").readOnly = true;
        }
      }
    }
  }
  xmlhttp.open("post", $("webdir").value + "index.php?m=mod_user&c=funds&a=pay", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send(query);
}

var formname = "";

function TextEdit(obj) {
    $(obj.id).readOnly = false;
    obj.style.backgroundColor = "#fff";
    obj.style.color = "#3CA4FF";
}

function SendData(obj) {
    $(obj.id).readOnly = true;
    obj.style.backgroundColor = "#FFFFD8";
    obj.style.color = "#F60";
}

function EBankCheck(obj) {
    formname = obj.value;
    $("tip").innerHTML = $(formname + "tip").innerHTML;
    $("fee").innerHTML = $(formname + "fee").innerHTML;
    $("finaldollars").innerHTML = $(formname + "amount").value;
}

function EBankPay() {
    if (formname == "") {
        alert("请先选择支付方式");
    } else {
        $(formname).submit();
    }
}

function getPosXY(a, offset) {
	var p = offset ? offset.slice(0) : [0,0],tn;
	while (a) {
		tn = a.tagName.toUpperCase();
		p[0] += a.offsetLeft - (tn == "DIV" && a.scrollLeft ? a.scrollLeft : 0);
		p[1] += a.offsetTop - (tn == "DIV" && a.scrollTop ? a.scrollTop : 0);
		if (tn == "BODY") break;
		a = a.offsetParent;
	}
	return p;
}

function ShadeBegin() {	
  setTimeout(function() {
	var shade = document.createElement('div');
	shade.id = 'Shade';
	document.body.insertBefore(shade, document.getElementById('Head'));

	var app = document.getElementById('AutoPostPrompt');
  
	var position = function() {
		if (app.style.display == 'none') return;
		var ch = document.body.clientHeight, sh = document.body.scrollHeight, st=document.body.scrollTop;
		shade.style.height = (sh > ch ? sh : ch) + 'px';
		shade.style.width = document.body.clientWidth + 'px';
		var pos = [], pw;
		//页面中如果存在id=PromptWord的元素，显示在其对应的位置，否则不显示
		pw = 360;
		//pos[0] = (document.body.clientWidth-pw)/2;
		//pos[1] = (ch-(app.offsetHeight || 300))/2 + st;
		pos[0] = (document.body.clientWidth-pw)/2 - 80;
		pos[1] = 200 + st;
		
		app.style.left = pos[0] + 'px';
		app.style.top = pos[1] + 'px';
		app.style.width = pw + 'px';
		setTimeout(check_kk, 200);
	}

	var confirmed = function() {
		app.style.display = 'none';
		shade.style.display = 'none';
		document.body.removeChild(shade);
	}
	var check_kk = function() {
		if (!document.getElementById('HintConfirm') || (app.currentStyle && app.currentStyle.visibility=='hidden')){
			try{confirmed();}catch(e){};
		}
	}
	
	document.getElementById('HintButton').onclick = confirmed;
	
	//register ESC 
	document.body.onkeydown = function(e) {
		var ev = !e ? window.event : e;
		if (ev.keyCode == 27 && _countdown < 0) {
			confirmed();
		}
	};
	window.onresize = position;
	
	shade.onclick = function() {
		if (!document.getElementById('HintConfirm')) {
			confirmed();
		}
	}
	shade.style.display = 'block';
	app.style.display = 'block';
	position();
}, 5);
}

//SetUserInfo();

function SetUserInfo()
{
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
        if(data != "" ){
        	temp = data.split("|");
        	$("ubzcrealname").value = temp[0];
        	$("ubzcmail").value = temp[1];
        	$("ubzctel").value = temp[2];
        	$("ubzcqq").value = temp[3];
        }
      }
    }
  }
  
  xmlhttp.open("post", $("webdir").value + "buyer.asp", true);
  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  xmlhttp.send('');
}
