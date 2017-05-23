function setdollars(obj)
{
	var val = obj.options[obj.selectedIndex].value;
	
	SetQtyList(val);

	if(val == 0)
	{
		$("ubzcztype").value = "";
	}
  else
	{
	  $("ubzcztype").value = obj.options[obj.selectedIndex].value + "||" + obj.options[obj.selectedIndex].text;
	}
}

var thisbi = 0;            
function SetQtyList(bi)
{
	if(bi == thisbi)
	{
		return;
	}
	var obj = $("ubzqty");
	obj.length = 0;
	var i = 1;
	obj.options[obj.length] = new Option("«Î—°‘Ò", 0);
	for(i = 1; i < 21; i++)
	{
		 obj.options[obj.length] = new Option(i+"’≈", i * bi);
	}
	ChangeNum(); 
}           
