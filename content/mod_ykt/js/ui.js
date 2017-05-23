if (typeof Ajax != 'object')
{
  alert('Ajax object doesn\'t exists.');
}

if (typeof Utils != 'object')
{
  alert('Utils object doesn\'t exists.');
}

var uideal = new Object;

uideal.query = "query";
uideal.filter = new Object;
uideal.url = location.href.lastIndexOf("?") == -1 ? location.href.substring((location.href.lastIndexOf("/")) + 1) : location.href.substring((location.href.lastIndexOf("/")) + 1, location.href.lastIndexOf("?"));
uideal.url += "?is_ajax=1";

/**
 * 创建一个可编辑区
 */
uideal.edit = function(obj, act, id)
{
  var tag = obj.firstChild.tagName;

  if (typeof(tag) != "undefined" && tag.toLowerCase() == "input")
  {
    return;
  }

  /* 保存原始的内容 */
  var org = obj.innerHTML;
  var val = Browser.isIE ? obj.innerText : obj.textContent;

  /* 创建一个输入框 */
  var txt = document.createElement("INPUT");
  txt.value = (val == 'N/A') ? '' : val;
  txt.style.width = (obj.offsetWidth + 12) + "px" ;

  /* 隐藏对象中的内容，并将输入框加入到对象中 */
  obj.innerHTML = "";
  obj.appendChild(txt);
  txt.focus();

  /* 编辑区输入事件处理函数 */
  txt.onkeypress = function(e)
  {
    var evt = Utils.fixEvent(e);
    var obj = Utils.srcElement(e);

    if (evt.keyCode == 13)
    {
      obj.blur();

      return false;
    }

    if (evt.keyCode == 27)
    {
      obj.parentNode.innerHTML = org;
    }
  }

  /* 编辑区失去焦点的处理函数 */
  txt.onblur = function(e)
  {
    if (Utils.trim(txt.value).length > 0)
    {     
      var res = Ajax.call(uideal.url, "act=" + act + "&txt=" + escape(Utils.trim(txt.value)) + "&id=" +id, null, "POST", "JSON", false, false);

      if (res.message)
      {
        alert(res.message);
      }

      obj.innerHTML = (res.error == 0) ? res.content : org;
    }
    else
    {
      obj.innerHTML = org;
    }
  }  
}


/**
 * 详细编辑
 */
uideal.cp = function(cpname, cpurl, act, id)
{
  var res = Ajax.call(uideal.url, "act=" + act + "&txt=" + escape(cpname) + "&cpurl=" + cpurl + "&id=" +id, null, "POST", "JSON", false, false);
  if(res.content)
  {
    var cpid    = "cpid_" + id;
    document.getElementById(cpid).innerHTML    = res.content;
    var paramid = "cp_param_" + id
    document.getElementById(paramid).innerHTML = id + "|" + cpname + "|" + cpurl;
  }
}

uideal.cc = function(ccname, ccurl, cccolor, act, id)
{
  var res = Ajax.call(uideal.url, "act=" + act + "&txt=" + escape(ccname) + "&ccurl=" + ccurl + "&cccolor=" + cccolor + "&id=" +id, null, "POST", "JSON", false, false);
  if(res.content)
  {
    var tmpid = "cc_param_" + id;
    var param = document.getElementById(tmpid).innerHTML;
    var tmp   = param.split("|");
    var cpid  = tmp[1];
   
    var ccid    = "ccid_" + id;
    document.getElementById(ccid).innerHTML    = res.content;
    var paramid = "cc_param_" + id
    document.getElementById(paramid).innerHTML = id + "|" + cpid + "|" + ccname + "|" + ccurl + "|" + cccolor;
  }
}

uideal.del = function(act, id)
{
  var res = Ajax.call(uideal.url, "act=" + act + "&id=" +id, null, "POST", "JSON", false, false);
  if(res.content)
  {
    alert("del success!");
    window.location.reload();
  }
}

/**
 * 切换状态
 */
uideal.toggle = function(obj, act, id)
{
  var val = (obj.src.match(/yes.gif/i)) ? 0 : 1;

  var res = Ajax.call(this.url, "act=" + act + "&txt=" + val + "&id=" +id, null, "POST", "JSON", false);

  if (res.message)
  {
    alert(res.message);
  }
  
  if (res.error == 0)
  {
    obj.src = (res.content > 0) ? 'skins/images/yes.gif' : 'skins/images/no.gif';
  }
}
