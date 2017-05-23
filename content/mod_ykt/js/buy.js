function ChangeNum()
{    
	obj = $("pname");
	var tmp = (obj.options[obj.selectedIndex].value).split("|");

  var qty = $("ubzqty").options[$("ubzqty").selectedIndex].value;
  var points = $("ubzcprice").value * qty;

  $("pointneed").innerHTML = points;
  
  var ubzqty,ubzcprice,ubzdollars;
  ubzqty     = qty;
  ubzcprice  = document.getElementById("ubzcprice").value;
  ubzdollars = ubzqty * ubzcprice;
  
  try
  {
    document.getElementById("ubzdollars").value=ubzdollars.toFixed(3);
  }
  catch(err)
  {
    document.getElementById("ubzdollars").value=ubzdollars;
  }
}  
