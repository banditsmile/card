var imgidx = 0;
var thisidx = "image66";
function imginfo(obj)
{
  if (window.XMLHttpRequest) 
  {
    //alert('Mozilla, Safari,IE7 ');
    if(!window.ActiveXObject)
    {  // Mozilla, Safari,
       //alert('Mozilla, Safari');
       resizeImg(obj,40,40);
       $("pic").innerHTML = '<img src="' + obj.src + '" onload="resizeImg(this,216,216)" />';
    } 
    else 
    {
      //alert('IE7');
      //getid 
      //thisid
        
      var tmp = obj.id.split("_");
      var thisid  = parseInt(tmp[1]);
      
      tmp = obj.id.split("_");
      var id  = parseInt(tmp[1]);
      if(id > notlocal)
      {
        try{
          $("pic").innerHTML = "";
        }catch(e){}
        $("pic").className = "ctablePic preview_fake";

        $("pic").filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = obj.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src;
      }
      else
      {

        try{
          $("pic").className = "ctablePic";
        }catch(e){} 
    
        $("pic").innerHTML = '<img src="' + obj.src + '" onload="resizeImg(this,216,216)" />';
      }
    }
  } 
  else 
  {
    //alert('IE6');
    resizeImg(obj,40,40);
    
    $("pic").innerHTML = '<img src="' + obj.src + '" onload="resizeImg(this,216,216)" />';
  }
  //resizeImg(obj,40,40);
  //$("pic").innerHTML = '<img src="' + obj.src + '" style="width:216px" onload="resizeImg(this,216,216)" />';
  //$("Pic").filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = obj.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src;
}

function resizeImg(obj,w,h)
{
  var imgHeight = obj.height;
  var imgWidth  = obj.width;
  if(imgHeight < imgWidth)
  {
    if(imgWidth > w)
    {
      obj.style.width = w + "px";
    }
  }
  else
  {
    if(imgHeight > h)
    {
      obj.style.height = h + "px";
    }
  }
}

function creatDiv()
{
  var obj = $("ctableThumb");
  var div = document.createElement("div");
  div.className = "thumb";
  imgidx = imgidx + 1;
  div.innerHTML = '<div class="thumbContent preview_fake" onmouseover="divMouse(this)" onmouseout="divMouse(this)" onclick="setMypic(this)" id="image_'+imgidx+'"></div><div class="thumbAction" onmouseover="div2Mouse(this)" onmouseout="div2Mouse(this)" onclick="removeDiv(this)" id="re_'+imgidx+'">删除</div>'
  obj.appendChild(div);
  
  return 'image_'+imgidx;
}

function div2Mouse(obj)
{
  bc = obj.style.backgroundColor;
  if(bc == "#f8fafc" || bc == "" || bc == "rgb(248, 250, 252)")
  {
    bc = "#ff5328";
    co = "#fff";
  }
  else
  {
    bc = "#f8fafc";
    co = "#000";
  }
  obj.style.backgroundColor = bc;
  obj.style.color = co;
}

function divMouse(obj)
{
  if(thisidx == obj.id)
  {
    return;
  }
  parentObj = obj.parentNode;
  bc = parentObj.style.borderBottomColor;
  //rgb() fix firefox
  parentObj.style.borderColor = (bc == "#ff6c00" || bc == "rgb(255, 108, 0)")  ? "#ccc" : "#ff6c00";
}

function setDiv(obj)
{
  if($(thisidx)) 
  {
    parentObj = $(thisidx).parentNode;
    parentObj.style.borderColor = "#ccc";
  }
  obj.parentNode.style.borderColor = "#ff6c00";
  thisidx = obj.id;
}

function removeDiv(obj)
{
  parentObj = obj.parentNode.parentNode;
  parentObj.removeChild(obj.parentNode);
  
  imgObj = obj.previousSibling.firstChild;
  /*
  if (window.XMLHttpRequest) 
  {
    if(!window.ActiveXObject)
    {
       temp = imgObj.src.split('/');
    } 
    else 
    {
      var tmp = obj.id.split("_");
      var id  = parseInt(tmp[1]);
      if(id > notlocal)
      {
        imgObj = obj.previousSibling;
        temp = imgObj.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src.split('/');
      }
      else
      {
        temp = imgObj.src.split('/');
      }
    }
  } 
  else 
  {
    temp = imgObj.src.split('/');
  }
  */
  var temp = imgObj.src.split('/');
  
  dst = temp[temp.length-1];
  org = dst + ",";

  $("ubzimage").value = $("ubzimage").value.replace(org, "");
  
  org = "," + dst;
  $("ubzimage").value = $("ubzimage").value.replace(org, "");

  $("ubzimage").value = $("ubzimage").value.replace(dst, "");
  
  if($("ubzimage").value == "")
  {
    $("pic").innerHTML = "";
  }
  
}

function setMypic(obj)
{
  setDiv(obj);
  var childObj = obj.firstChild;
  if (window.XMLHttpRequest) 
  {
    if(!window.ActiveXObject)
    {
       imginfo(childObj);
    } 
    else 
    {
      //getid 
      var tmp = obj.id.split("_");
      var id  = parseInt(tmp[1]);
      if(id > notlocal)
      {
        imginfo(obj);
      }
      else
      {
        imginfo(childObj);
      }
    }
  } 
  else 
  {
    imginfo(childObj);
  }
}

function changelocation(locationid)
{
  var i;
  var locationid;
  
  locationid=locationid;
  document.cform.catid.length = 0;
  
  for (i=0;i < oneCount; i++)
  {
    if (subCat[i][2] == locationid)
    {
      document.cform.catid.options[document.cform.catid.length] = new Option(subCat[i][0], subCat[i][1]);
    }        
  }
  
  if(document.cform.catid.length == 0)
  {
    document.cform.catid.options[document.cform.catid.length] = new Option("请选择二级分类", "0");
  }
}

function showsupinfo(checkedIn)
{
  document.getElementById("ubzsupprice").style.display=checkedIn?"":"none";
  document.getElementById("ubzsupcheck").style.display=checkedIn?"":"none";
}
 
function showctrlinfo(checkedIn)
{
  document.getElementById("ubzctrlprice").style.display=checkedIn?"":"none";
}

function pickcolor() 
{
  var color = showModalDialog( sc + "tools/colorselect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
  if (color != null) 
  {
    $("colorexample").style.backgroundColor = color;
    $("namecolor").value = color;
  }
}
function setcolor(obj)
{
  if(obj.value.length == 7)
  {
    $("colorexample").style.backgroundColor = obj.value;
  }
}

function setykt(obj)
{
  $("ykt").style.display = obj.checked ? "" : "none";
}

//setTableInput();
