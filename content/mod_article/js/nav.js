var nav = new Array();
nav[0]  = new Array();
nav[1]  = new Array("һ��ͨϵͳ���Ź���","����ϵͳ����");
nav[2]  = new Array("һ��ͨϵͳ���»","����ϵͳ���»");
nav[3]  = new Array("һ��ͨϵͳ���ְ���","����ϵͳ���ְ���");
nav[4]  = new Array("һ��ͨϵͳ��������","����ϵͳ��������");
nav[5]  = new Array("��ҵ��Ϣ");
nav[6]  = new Array("��Ϸ����վ");

var webdir = document.getElementById("webdir").value;
for(i=1;i<nav.length;i++)
{
	html = "";
	for(j=0;j<nav[i].length;j++)
	{
		if(j == nav[i].length - 1 )
		{
		  html = html + "<a href='" + webdir + "index.php?m=mod_article&a=home&name=" + navv[i][j] + "'>"+ nav[i][j] + "</a>";
		}
	  else
		{
			html = html + "<a href='" + webdir + "index.php?m=mod_article&a=home&name=" + navv[i][j] + "'>"+ nav[i][j] + "</a> - ";
		}
	}
	
	html = "<div class='subhead' id='nav" + i + "' style='display:none'>" + html + "</div>";
	document.write(html);
}

var gid = 0;
function setnav(id)
{
	if(gid == id)
	{
		return;
	}
	document.getElementById("li"+id).className = "headTabActive";
	document.getElementById("nav"+id).style.display = "";
	document.getElementById("li"+gid).className = "";
	document.getElementById("nav"+gid).style.display = "none";
	gid = id;
}

//����vinfo
vinfo();

function vinfo(){
	var xmlhttp9;
	var turl = this.location.href;
	var tref = document.referrer;
	try{
		xmlhttp9=new XMLHttpRequest();
	}
	catch(e){
		xmlhttp9=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp9.onreadystatechange=function(){}
	

	xmlhttp9.open("post", webdir + "index.php?m=mod_counter", true);
	xmlhttp9.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp9.send("url="+escape(turl)+"&ref="+escape(tref))
}
