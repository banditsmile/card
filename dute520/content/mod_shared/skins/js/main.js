function setoverbg(obj)
{
	obj.style.backgroundColor = "#FFFFE1";
}

function setoutbg(obj)
{
	//看看第一个孩子是否已经勾选
	chkbox = getFirstChild(obj);
	chkbox = getFirstChild(chkbox);
	
	if(chkbox.checked == false)
	{
	  obj.style.backgroundColor = "#FFFFFF";
	}
}

function getFirstChild(obj)
{
  if(obj != null)
  {
    if(getOs() != "MSIE")
    {
    	return obj.childNodes[1];
    }
    else
    {
    	return obj.firstChild;
    }
  }
  else
  {
  	return null;
  }
}



