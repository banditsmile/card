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
    $("dollarsforplayer").value=dollarsforplayer.toFixed(0);
  }
  catch(err)
  {
    $("ubzdollars").value=ubzdollars;
    $("dollarsforplayer").value=dollarsforplayer;
  }
}
