
var indexArray = new Array();
var gameArray = new Array();
var listid=0;

var indexArray1 = new Array();
var gameArray1 = new Array();
var tubzqty_list= new Array();
var ubzqty_list= new Array();
var tubzqtyname;
var hlxml =null;


var xml=null;
var orderlist = new Array();
var typelist = new Array();

var voldtime = 1;

//ubzloadxml();

function ubzloadxml(xmlname)
{
	if(xmlname == "")
	{
	  xmlname = $("ubztpl").value;
	}
  else
	{
		rowNum=$("cztable").rows.length;
    for (i=0;i<rowNum;i++)
    {
      $("cztable").deleteRow(0);
    }
	}
	
	//检查xmlname是否最新
	checkver(xmlname);

	xmlname = $("tpldir").value + "systpl/" + xmlname + ".xml";
	
  xml = loadXML(xmlname);

  if(xml!=null)
  {
    var iever,biever,ciever;
    iever=navigator.appVersion;
    biever=iever.split(";");
    ciever=biever[1].replace(/[ ]/g,"");
    
    var order=isnull(xml.getElementsByTagName('order')[0]); 

    if (order=="")
    {
    	rowNum=$("cztable").rows.length;
      for (i=0;i<rowNum;i++)
      {
        $("cztable").deleteRow(0);
      }
  	  return;
    }
    
    orderlist.length =0;
    typelist.length =0;
    var type=isnull(xml.getElementsByTagName('type')[0]); 
    dotype=isnull(xml.getElementsByTagName('ism')[0]) ;
    var chtb=$("cztable");
    var sporder =order.split(",");
    var sptype =type.split(",");
    var i,tr,td,ss;

    for (i=chtb.rows.length-1;i>0 ;i--)
    {
      chtb.deleteRow(i);
    }
    
    for (i = 0; i < sporder.length; i++)
    {
    	if(sporder[i] == "savenote") continue; 
    	ss=gethtml(sporder[i],sporder[i],sptype[i],xml,gettitle(sporder[i],i));
    	orderlist[i]=sporder[i];
      typelist[i]=sptype[i];

    	if(sporder[i] == "ubzqty")
    	{
    		//continue;
    	}
    	
      tr=chtb.insertRow (-1);
      td=tr.insertCell(-1);
      td.innerHTML="<span >"+gettitle(sporder[i],i)+"：</span>";
      
      if(ciever=='MSIE6.0'||ciever=='MSIE7.0')
      {
      	td.setAttribute("className","ltjs");
      }
      else
      {
      	td.setAttribute("className","ltjs");
      	td.setAttribute("class","ltjs");
      }
      
      td=tr.insertCell(-1);

      tr.setAttribute("id",sporder[i]+"_tr");
      td.innerHTML=ss;
      td.setAttribute("id",sporder[i]+"_td");
      
      
      if(ciever=='MSIE6.0'||ciever=='MSIE7.0')
      {
      	td.setAttribute("className","rtjs");
      	td.style.cssText = "padding-left:4px";
      }
      else
      {
      	td.setAttribute("className","rtjs");
      	td.setAttribute("class","rtjs");
      	try{
      		//td.setAttribute("style","padding-left:4px");
      		//td.style.cssText = "padding-left:4px";
      	}catch(err){}
      	
      }
      
      td.setAttribute("align","left");
      //td.style.paddingLeft = "5px"
    }
  }

}

function checkver(xmlname)
{
	var cxht;
  var webdir = document.getElementById("webdir").value;
  var thisplatform = document.getElementById("platform").value;
  try
  {
    cxht=new XMLHttpRequest();
  }
  catch(e){
    cxht=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  cxht.onreadystatechange=function(){
  	if (cxht.readyState==4)
    {
      if (cxht.status==200)
      {
        var ackdata=cxht.responseText;

        if(ackdata == "1" )
        {
        	alert("充值模板有更新！请重新填写订单信息");
        	window.location.reload();
        }
      }
    }
  }
  
  var weburl = webdir + "index.php?m=mod_" + thisplatform + "&c=Product&a=CheckTpl";
  
  cxht.open("post", weburl, true);
  cxht.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  cxht.send("cztpl="+escape(xmlname))
}


function loadXML(dname) 
{
    try
    {
        xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
    }
    catch(e)
    {
        try
        {
            xmlDoc=document.implementation.createDocument("","",null);
        }
        catch(e) 
        {
            alert(e.message)
        }
    }
    
    try 
    {
        xmlDoc.async=false;
        xmlDoc.load(dname);
        return(xmlDoc);
    }
    catch(e) 
    {
        alert(e.message)
    }
    
    return(null);
}

function isnull(data)
{
    if (data==null)
        return "";
    else
    {
        if (data.firstChild !=null)
            return trim(data.firstChild.data);
        else
           return ""; 
     }
}

function trim(content)
{
	content = content.replace(/(^\s*)|(\s*$)/g, "");
	return content;
}

function isEmpty(s)
{
	return (s==null)||(s.length==0);
}

function hideselect()
{
    var i;
    for(i=0;i<orderlist.length ;i++)
    {
        if (typelist[i]=='select')
        {
            var tmp=   $(orderlist[i]+'1');
            if (tmp==null)
                tmp=$(orderlist[i]);
            if (tmp!=null)
                tmp.style.display="none";
        }
        if (i==4)
            break;
    }
        
}

function showselect()
{
    var i;
    for(i=0;i<orderlist.length ;i++)
    {
        if (typelist[i]=='select')
        {
            var tmp=   $(orderlist[i]+'1');
            if (tmp==null)
                tmp=$(orderlist[i]);
            if (tmp!=null)
                tmp.style.display="block";
        }
        if (i==4)
            break;
    }
        
}

function gettitle(inputname,i)
{    
    var caplist=isnull(xml.getElementsByTagName("caption")[0]);
    if(caplist!="")
    {
        var cap=caplist.split(",");
        return cap[i];      
    }
    else
    if (inputname =="ubzcztype")
        return "计费方式";
    else 
    if (inputname =="ubzqty")
        return "充值数量";
    else 
    if (inputname =="ubzczarea1")
        return "充值区域";
    else 
    if (inputname =="ubzczarea2")
        return "充值服务器";
    else 
    if (inputname =="ubzczother")
        return "帐户类型";
    else 
    if (inputname =="baowu")
        return "选择宝物";
    else 
    if (inputname =="mima")
        return "用户密码";
    else 
    if (inputname =="tubzqty")
        return "转换量"; 
    else        
        return "未设置...";
}

function gettypebyinputname(inputname)
{
  for (var i = 0; i < orderlist.length; i++)
  {
    if (orderlist[i] == inputname)
    {
      return typelist[i];
    }
  }
  return "";
}

// inputname  : input的name值
// val :

function myChange(inputname,val,type,flag,title)
{
	if (tlv="1")
  {
      var tl=$(inputname+"_txt");
  }
    
  if (xml==null)
  {
  	return;
  }

	//获取inputname的所有节点
	var x = xml.getElementsByTagName(inputname);
	xlen = x.length;
  for(var i = 0; i < xlen; i++)
  {
  	//检查他是不是需要进入自己的子类
    if (isnull(x[i].getElementsByTagName('id')[0]) == val)
    {
    	
      x1=x[i].childNodes;
      
      x1len = x1.length;

      for(var j = 0; j < x1len; j++)
      {
        var ss=x1[j].nodeName;
        
        if ( ss=="name" )
        {
        	//对应的名称
           tl.value=isnull(x[i].getElementsByTagName('name')[0]);
        }
        else if (ss.indexOf("_list")>0)
        {
        	
        	//ss为数量列表
        	ss = ss.substr(0, ss.length - 5);
        	td = $(ss+"_td");
        	
          if(td == null)
          {
          	return;
          }

          type = gettypebyinputname(ss);

			    td.innerHTML = gethtml(ss, ss, type, x[i], '');
			    if(inputname=="cztype")
          {
          	
          	var is_x=isnull(x[i].getElementsByTagName("is_x")[0]);
            if(is_x != "")
            {
            	v = isnull(x[i].getElementsByTagName("id")[0]);
            	
              if(v!="")
              {
		      			if(!isNaN(v))
                {
		              len = ubzqty_list.length + 1;
		              
		              obj = $("ubzqty");
                  for(var oi=1 ;oi < len;oi++)
                  {
                  	obj.options[oi].value = v * ubzqty_list[oi-1];
                  }
                  
                  ChangeNum();
                }
              }
            }
          }
        }
        else if (ss.substr(ss.length-2)=="_s")
        {
        	//为服务器
          ss = ss.substr(0,ss.length-2);
          td = $(ss+"_td");
          if(td == null)
          {
            return;
          }
          
          type = gettypebyinputname(ss);
          
          td.innerHTML = gethtml(ss,ss,type,x[i],'');
        }
        
      }
    }
  }
  
  if (inputname=="ubzqty")
  {
  	if (typeof(qtyreset) == "undefined")
	  {
	  	
	  	ChangeNum();
	  }
    else
	  {
	  	if($(qtyby+"1"))
	  	{
	  		
	  	  ChangeNum1(0);
	  	}
	    else
	  	{
	  		
	  		ChangeNum();
	  	}
	  }
    
    var ii;
    
    var v = $("ubzqty").options[$("ubzqty").selectedIndex].value;

    if ($("tubzqty") != null)
    {

      for (ii = 0; ii<ubzqty_list.length; ii++)
      {
        if (v == ubzqty_list[ii])
        {
          $("tubzqty").innerText=tubzqty_list[ii]+tubzqtyname;
          $("tubzqty1").innerText=tubzqty_list[ii]+tubzqtyname;
        }
      }
    }
  }
  
  setvalByType(inputname, val, type);              
}

function resetQty()
{
	var ii;
    
  if($("ubzqty"))
  {
    var v = $("ubzqty").options[$("ubzqty").selectedIndex].value;
    
    if ($("tubzqty") != null)
    {
      for (ii = 0; ii<ubzqty_list.length; ii++)
      {
        if (v == ubzqty_list[ii])
        {
          $("tubzqty").innerText=tubzqty_list[ii]+tubzqtyname;
          $("tubzqty1").innerText=tubzqty_list[ii]+tubzqtyname;
        }
      }
    }
  }
}

function salChange()
{
  var num=$("ubzqty").value;
  var sp=$("saleprice").value;
  var tt =num*sp;
  tt =Math.round(tt)
  $("total").innerText =tt/100;
}

function setval(id, v)
{
	$(id).value = v;
}

function setvalByType(inputname, val, type)
{
	if(inputname == "ubzqty")
	{
		return;
	}
	//val = $(inputname + "1").value;
  txt = $(inputname+"_txt").value;
  $("ubz" + inputname).value = val + "||" + txt;
  
  if(inputname == "czarea1")
  {
    if (typeof(spc) == "undefined")
	  {
	  	return;
	  }
	  else
		{
			$("ubz" + inputname).value =  val + "||" + txt + "|" + $("ubzspc").value;
		}
  }
  
  if (typeof(qtyreset) == "undefined")
	{
		return;
	}
  else
	{
		if(inputname == qtyby && $(qtyby+"1"))
    {
		  ChangeNum1(1);
	  }
	}
}



function ChangeNum1(f)
{
	if (typeof(qtyreset) == "undefined")
	{
		return;
	}
	
	obj = $("ubzqty");
	len = obj.options.length;
	if($(qtyby+"1"))
	{
	  obj1  = $(qtyby+"1");
	  if(obj1.options)
	  {
	    v1  = obj1.options[obj1.selectedIndex].value;

	    if( v1 != "" && v1 > 0 )
	    {
	    	if(v1 != voldtime)
	    	{
	        for(i = 0; i < len; i++)
	        {
	        	obj.options[i].value = v1 * obj.options[i].value;
	        	
	        }
	        
	        voldtime = v1 ;
	      }
	          
	      ChangeNum();
	    }
	  }
  }
}

//inputname 对应的input的name
//type = 对应的input的type
//inputname 对应的input的name

function gethtml(inputname, namepost, type, xmldata, title)
{
	realname = "ubz" + namepost;
	//alert(inputname+":"+namepost+":"+type+":"+xmldata+":"+title);
  if (type == "label" )
  {
  	//设置转化量
    var ss;
    
    var xx=xmldata.getElementsByTagName(inputname+"_list");
    
    if (xx.length > 0 )
    {
      var list;
      list = isnull(xx[0]);
      tubzqty_list =list.split(",");
    }
    
    if (inputname == "tubzqty")
    {
      xx=xmldata.getElementsByTagName("tubzqtyname");
      tubzqtyname="";
      if (xx.length>0)
      {
         tubzqtyname =isnull(xx[0]);
      }
    }
    
    resetQty();

    return "<label id =\""+namepost+"1\" >&nbsp;</label> <input type=hidden  name =\""+namepost+"\" id =\""+namepost+"\" />";
  }
  else if (type=="text")
  {
    return "<input type ="+type+"  class=\"input\" name =\""+namepost+"\" id =\""+namepost+"\" onblur='setval(\""+realname+"\", this.value)'>";
  }
  else if (type=="txt")
  {
		var bb=xmldata.getElementsByTagName("noteinfo");
		var bbvalue=bb[0].firstChild.data;
    return "<font color=#ff0000>" + bbvalue + "</font>";
  }
  else if (type=="password")
  {
    return "<input type ="+type+"  name =\""+namepost+"\" id =\""+namepost+"\" onblur='setval(\""+realname+"\", this.value)'>";
  }
  else if (type =="select")
  {
    var ss;
    var xx=xmldata.getElementsByTagName(inputname+"_list");
    
    if (xx.length > 0)
    {
    	ss="<select name=\"ubzqty\" id=\"ubzqty\" onchange=\"myChange('ubzqty',this.options[this.options.selectedIndex].value,'select','0','" +title+"')\">\n";
      ss=ss+'<option value="">请选择</option>\n' ;
      var list;
      list=isnull(xx[0]);
			
      var sp =list.split(",");
			//取单位
			var unit=isnull(xml.getElementsByTagName("gameunit")[0]);
			if(unit=="")
			{
				unit="个";
			}
			//结束
                for(var i=0 ;i<sp.length;i++)
                {
                  ss=ss+'<option value="'+sp[i]+'">'+sp[i]+unit+'</option>\n' ;
                }
                ubzqty_list=sp;
    }
    else
    {
      ss="<input type=hidden name=\""+namepost+"\" id=\""+namepost+"_txt\" />";
      ss=ss+"<select name=\""+namepost+"1\" id=\""+namepost+"1\" onchange=\"myChange( '" +namepost+"',this.options[this.options.selectedIndex].value,'select','1','" +title+"')\">\n";
      ss=ss+'<option value="" >请选择</option>\n' ;
      var x=xmldata.getElementsByTagName(inputname+"_s");
      if ( x.length >0)
      {
        x1=x[0].getElementsByTagName(inputname);
        for (i=0;i<x1.length;i++)
        {
        	val = isnull(x1[i].getElementsByTagName('id')[0]);
        	txt = isnull(x1[i].getElementsByTagName('name')[0]);
          ss=ss+'<option value="'+val+'" >'+txt+'</option>\n' ;
        }
      }
      
      
      
    }
    ss=ss+'</select>\n'; 

  }
  else if (type =="radio")
  {
    var ss="";
    var xx=xmldata.getElementsByTagName(inputname+"_list");
    if (xx.length>0)
    {
      var list;
      list=isnull(xx[0]);
      var sp =list.split(",");
      for(var i=0 ;i<sp.length;i++)
      {   
	  	  if (i==0)
	  	  {
	  	  	ss=ss+'<input id="'+inputname+'_'+i+'" type="radio" name ="'+namepost+'" value = "'+sp[i]+"\"  OnClick=\"myChange('"+namepost+"','"+sp[i]+"' ,'radio','0','"+title+"')\"/><LABEL for="+inputname+'_'+i+'>'+sp[i]+'</LABEL> \n';
	  	  }
        else
	  	  {
	  	  	ss=ss+'<input id="'+inputname+'_'+i+'" type="radio" name ="'+namepost+'" value = "'+sp[i]+"\"  onclick=\"myChange('"+namepost+"','"+sp[i]+"' ,'radio','0','"+title+"')     \"/><LABEL for="+inputname+'_'+i+'>'+sp[i]+'</LABEL> \n';
	  	  }
      }
    }
    else
    {
    	ss="<input type =hidden  name =\""+namepost+"\" id =\""+namepost+"_txt\" />\n";
      var x=xmldata.getElementsByTagName(inputname+"_s");
      if ( x.length >0)
      {
        var x1=x[0].getElementsByTagName(inputname);
        for (i=0;i<x1.length;i++)
        {
          if (i==0)
          {
	  		    ss=ss+'<input id="'+inputname+'_'+i+'" type="radio" name="'+namepost+'1" value = "'+isnull(x1[i].getElementsByTagName('id')[0])+"\" onclick=\"myChange('"+namepost+"','"+isnull(x1[i].getElementsByTagName('id')[0])+"' ,'radio','1','"+title+"') \"/><LABEL for="+inputname+'_'+i+'>'+isnull(x1[i].getElementsByTagName('name')[0])+'</LABEL> \n';
          }
          else
	  	    {
	  		    ss=ss+'<input id="'+inputname+'_'+i+'" type="radio" name="'+namepost+'1" value = "'+isnull(x1[i].getElementsByTagName('id')[0])+"\" onclick=\"myChange('"+namepost+"','"+isnull(x1[i].getElementsByTagName('id')[0])+"' ,'radio','1','"+title+"') \"/><LABEL for="+inputname+'_'+i+'>'+isnull(x1[i].getElementsByTagName('name')[0])+'</LABEL> \n';
	  	    }
        }
      }
    }      
  }
  return ss;
}
