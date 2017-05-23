var $ = function(id) {
  return document.getElementById(id);
}

//获取商品类型
var ptype    = $("ubzptype").value;
var qtymin   = $("ubzqtymin").value;
var qtymax   = $("ubzqtymax").value;
var qtylist  = $("ubzqtylist").value;
var unit     = $("ubzunit").value;
var i = 0;
var qi = 0;

if(ptype == 3 && $("ubzdisparea").value == 1)
{
	qtymax = 1;
}

if((ptype != 1 && ptype != 2) || (ptype == 2 && $("ubzsystpl").value > 0) )
{ 
  if(ptype == 6)
  {
  	qtymax = 1;
  }
  
  if(qtylist == "")
  {
  	if(qtymin == "")
  	{
  		qtymin = 1;
  	}
  	
  	if(qtymax == "")
  	{
  		qtymax = 10;
  	}
  	
  	qi = 0;
  	
  	if(qtymax - qtymin > 0)
  	{
  		$("ubzqty").options[0] = new Option("请选择",0); 
  		qi = 1;
  	}
  
  	for(i = parseInt(qtymin); i < (parseInt(qtymax) + 1); i++)
  	{
  		$("ubzqty").options[qi] = new Option(i + unit,i); 
  		qi++;
  	}
  }
  else
  {
  	qi = 0;
  	tmp = qtylist.split(",");
  	if(tmp.length > 1)
  	{
  		$("ubzqty").options[0] = new Option("请选择",0); 
  		qi = 1;
  	}
  	
  	for(i = 0; i < tmp.length; i++)
  	{
  		$("ubzqty").options[i+qi] = new Option(tmp[i] + unit,tmp[i]); 
  	}
  }
}
switch(ptype)
{
	case "1":
	  //自动充值
	  var idlable = $("ubzidlable").value;
	  $("trac1").style.display = "";
	  $("trac2").style.display = "";
	  break;
	case "2":
	  var idlable = $("ubzidlable").value;
	  $("trac1").style.display = "";
	  $("trac2").style.display = "";
	  break;
	default:
	  break;
}
