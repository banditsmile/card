<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<title><?php echo $vd['web']['webname']; ?></title>
<link href="content/mod_b2b/css/index.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class = "top" >
<div class = "logo"></div>
<div class = "wrap" >
<div id = "div1"  class = "img1" >
<div onmousemove="HideContentText('content_text')" ><a href="/b2b" target="_parent" class = "btn1" ></a></div>
<div onmousemove="HideContentText('content_text')" ><a href="/b2b" target="_parent" class = "btn2" ></a></div>
</div>
<div class = "img3" >
<a href="#" target="_parent" class = "btn1" ></a>
<a href="#" target="_parent" class = "btn2" ></a>
</div>
<div id = "div2" class = "img2">
<div onmousemove="HideContentText('content_text2')" ><a href="/ykt" target="_parent" class = "btn1" ></a></div>
<div onmousemove="HideContentText('content_text2')" ><a href="/ykt" target="_parent" class = "btn2" ></a></div>
</div>
</div>


<div id = "content_text" ><span class="txt">����ϵͳ</span> <br />
<span class="txt2">��Ҫ�������̡����ɡ��������������һ��B2Bϵͳ���ɴ������ֳ�ֵ��Ʒ��������䡣</span><br />
<span class="txt3">�ʺ��û�Ⱥ�����ɡ��㿨������</span>
</div>
<div id = "content_text2" ><span class="txt">һ��ͨϵͳ</span> <br />
<span class="txt2">�����Ѿ����б�վһ��ͨ���û���ͨ��һ��ͨ������Ҫ�ĸ������ֳ�ֵ��Ʒ��</span><br />
<span class="txt3">�ʺ��û�Ⱥ�����б�վһ��ͨ���û�</span>
</div>
</div>
<div class = "footer" style="color:#FFF"><a>��www.ekakm.com <?php echo $vd['web']['beian']; ?> ��</a></div>
</body>
<script type = "text/javascript">
	window.onload = function(){
		var div1 = document.getElementById("div1");
		var div2 = document.getElementById("div2");
		var content_text = document.getElementById("content_text");
		var content_text2 = document.getElementById("content_text2");
		div1.onmouseover = function(){
			content_text.style.display = "block";
			div1.className="img01";
		}

		div1.onmouseout = function(){
			content_text.style.display = "none";
			div1.className="img1";
		}


		div2.onmouseover = function(){
			content_text2.style.display = "block";
			div2.className="img02";
		}

		div2.onmouseout = function(){
			content_text2.style.display = "none";
			div2.className="img2";
		}
	}
	function HideContentText(contentid)
	{
		document.getElementById(contentid).style.display = "none";
		}
</script>
</html>