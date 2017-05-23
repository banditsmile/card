var $=function(id){
  return document.getElementById(id);
}

var dataorder,datatype,dataselect,page,nextpage,prepage,ckeywords,cati,catii,itemcount,showtype,urltext,ptype,begprice,endprice;

dataorder  = $("dataorder").value;

datatype   = $("datatype").value;
dataselect = $("dataselect").value;
page       = $("page").value;
prepage    = $("prepage").value;
keywords   = $("ckeywords").value;
cati       = $("cati").value;
catii      = $("catii").value;
itemcount  = $("itemcount").value;
showtype   = $("showtype").value;
urltext    = $("urltext").value;
ptype      = $("ptype").value;
begprice   = $("begprice").value;
endprice   = $("endprice").value;

function go(){
  var topage = $("topage").value;
  window.location.href=urltext+".asp?page="+topage+"&cati="+cati+"&catii="+catii+"&showtype="+showtype+"&itemcount="+itemcount+"&keywords="+keywords+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}

function sort(dataselect,datatype)
{
  neworder="ascending";
 
  if(document.getElementById("dataselect").value==dataselect)
  {
    if(document.getElementById("dataorder").value=="ascending")
    {
      neworder="descending";
    }
  }
  window.location.href=urltext+".asp?page="+page+"&cati="+cati+"&catii="+catii+"&showtype="+showtype+"&itemcount="+itemcount+"&keywords="+keywords+"&dataorder="+neworder+"&dataselect="+dataselect+"&datatype="+datatype+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}

function gopage(page)
{
  window.location.href=urltext+".asp?page="+page+"&cati="+cati+"&catii="+catii+"&showtype="+showtype+"&itemcount="+itemcount+"&keywords="+keywords+"&dataorder="+dataorder+"&dataselect="+dataselect+"&datatype="+datatype+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}

function ubshowtype(newshowtype)
{ 
  window.location.href=urltext+".asp?page="+page+"&cati="+cati+"&catii="+catii+"&showtype="+newshowtype+"&itemcount="+itemcount+"&keywords="+keywords+"&dataorder="+dataorder+"&dataselect="+dataselect+"&datatype="+datatype+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}

function listnum(num)
{ 
  window.location.href=urltext+".asp?page="+page+"&cati="+cati+"&catii="+catii+"&keywords="+keywords+"&showtype="+showtype+"&itemcount="+num+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}

function sortonchang()
{
  neworder="ascending";
  switch(document.getElementById("resort").value)
  {
    case "1":
      dataselect="ubzcprice";
      datatype="number";
      break;
    case "2":
      dataselect="ubzclick";
      datatype="number";
      break;
    case "3":
      dataselect="ubzptype";
      datatype="text";
      break;
    case "5":
      dataselect="ubzpname";
      datatype="text";
      break;
    default:
      dataselect="ubzpname";
      datatype="text";
      break;       
  }
  if(document.getElementById("dataselect").value==dataselect)
  {
  if(document.getElementById("dataorder").value=="ascending")
  {
    neworder="descending";
  }
  }
  window.location.href=urltext+".asp?page="+page+"&cati="+cati+"&catii="+catii+"&showtype="+showtype+"&itemcount="+itemcount+"&keywords="+keywords+"&dataorder="+neworder+"&dataselect="+dataselect+"&datatype="+datatype+"&ptype="+ptype+"&begprice="+begprice+"&endprice="+endprice;
}
