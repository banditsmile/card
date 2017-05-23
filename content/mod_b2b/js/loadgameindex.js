var indexArray = new Array();
var gameArray = new Array();
var listid=0;
var indexxml=loadXML(wedir + "gameindex.xml");
if (indexxml!=null)
{
     var x=indexxml.getElementsByTagName('record');   
      
    for (var i=0;i<x.length;i++)
    {
        indexArray[i]=isnull(x[i].getElementsByTagName('index')[0]);
        gameArray[i]=isnull(x[i].getElementsByTagName('game')[0]);
        
    }
    
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

function trim(t)
{
return t.replace(/^\s+|\s+$/g, "");
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



function  vkeyup()
{

    var kc=window.event.keyCode;
    var str = document.getElementById("gametype").value;
    if (kc==13)
    {
        window.event.keyCode   =   0   ;    
        return ;
       }

	if (str != "") 
	{
		var listtb=document.getElementById("listtb");
		var i,j,k;
		
		for (i=listtb.rows.length-1;i>=0 ;i--)
		{
	        listtb.deleteRow(i);    
	    }
	    
	    searchlist.style.display="block";
	    j=0;
		for ( i=0; i<indexArray.length; i++) 
		{
			var index = indexArray[i];
	        var gna = gameArray[i];
	        var spindex =index.split(",");
	         
	        var ii;
	        var vflag=0;
	        
	        if (gna.toLowerCase().indexOf(str.toLowerCase())==0)
	            vflag =1
	        else
	        {    
	            for (ii=0 ;ii<spindex.length;ii++)
	            {
	                if (spindex[ii].toLowerCase().indexOf(str.toLowerCase()) == 0)
	                {
	                    vflag =1
	                    break ;
	                }
    	            
	            } 
	        }
	        
			if ( vflag==1) 
			{
			    var tr = listtb.insertRow(-1); 
			    td = tr.insertCell(-1);			    
			    td.innerHTML=" <a myflag='list' href=\"#\"  onclick =\"onsubMenuclick('"+gameArray[i]+"')\">"+gameArray[i]+"</a>";	
			}
		
		}
		
	}
}    


function onsubMenuclick(ss)
{
    document.getElementById("gametype").value =ss;
    searchlist.style.display="none";
}

function whichElement(e)
{

var targ
if (!e) 
var e = window.event
if (e.target) 
targ = e.target
else 
if (e.srcElement) 
targ = e.srcElement

if (targ.nodeType == 3)
	targ = targ.parentNode
	
var tname
tname=targ.innerText

if (targ.myflag!="list")
{
    searchlist.style.display="none";
}
  
    
}
