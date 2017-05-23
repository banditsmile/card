// JScript 文件
function MsgAlert(){
      var xmlhttptop;
      var obj = $("msgn");
      var content = "错误！"
      try{
        xmlhttptop=new XMLHttpRequest();
      }
      catch(e){
        xmlhttptop=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttptop.onreadystatechange=function(){
        if (xmlhttptop.readyState==4){
          if (xmlhttptop.status==200){
            var data=xmlhttptop.responseText;
            obj.innerHTML = data;
            if(data > 0)
            {
            	mainobj  = document.all ? window.parent.frames["main"] : window.parent.document.getElementById("main").contentWindow;
              mainobj.location.href="index.php?m=mod_agent&c=Messenger";
            }
          }
        }
      }
      xmlhttptop.open("post", "{$vd['root']}index.php?m=mod_b2b&c=Frame&a=Msg", true);
      xmlhttptop.send('');
    }
    MsgAlert();
    setInterval(MsgAlert, 60000);