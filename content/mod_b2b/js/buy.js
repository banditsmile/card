function ChangeNum()
{    
  var ubzqty,ubzcprice,ubzdollars;
  ubzqty     = $("ubzqty").value;
  ubzcprice  = $("ubzcprice").value;
  priceforplayer = $("priceforplayer").value;
  dollarsforplayer  = $("dollarsforplayer").value;
  ubzdollars = ubzqty * ubzcprice;
  dollarsforplayer = ubzqty * priceforplayer;
  try
  {
    $("ubzdollars").value=ubzdollars.toFixed(3);
    $("dollarsforplayer").value=dollarsforplayer.toFixed(3);
    if($("needscored"))
    {
    	$("needscored").value = (ubzqty * $("scored").value).toFixed(0);
    }
    if($("cscored"))
    {
    	$("scored").value = (ubzqty * $("cscored").value).toFixed(0);
    }
  }
  catch(err)
  {
    $("ubzdollars").value=ubzdollars;
    $("dollarsforplayer").value=dollarsforplayer;
    if($("needscored"))
    {
    	$("needscored").value = ubzqty * $("scored").value;
    }
    if($("cscored"))
    {
    	$("scored").value = ubzqty * $("cscored").value;
    }
  }
}
