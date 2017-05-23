function SelectAll()
{
    var objs = document.getElementsByTagName("input");
    for(var i = 0; i < objs.length; i++)
    {
        if(objs[i].type.toLowerCase() == "checkbox" && objs[i].parentNode.getAttribute("group") == "1" && (objs[i].parentNode.getAttribute("disabled") == false || objs[i].parentNode.getAttribute("disabled") == null))
        {
            objs[i].checked = true;
        }
    }
}

function SelectOthers()
{
    var objs = document.getElementsByTagName("input");
    for(var i = 0; i < objs.length; i++)
    {
        if(objs[i].type.toLowerCase() == "checkbox" && objs[i].parentNode.getAttribute("group") == "1" && (objs[i].parentNode.getAttribute("disabled") == false || objs[i].parentNode.getAttribute("disabled") == null))
        {
            objs[i].checked = objs[i].checked ? false : true;
        }
    }
}

function CheckSelect(t)
{
    var selected = false;
    var objs = document.getElementsByTagName("input");
    for(var i = 0; i < objs.length; i++)
    {
        if(objs[i].type.toLowerCase() == "checkbox" && objs[i].parentNode.getAttribute("group") == "1" && objs[i].checked == true)
        {
          selected = true;
          break;
        }
    }
    if (!selected)
    {
        alert("选择后，再操作！");
        return selected;
    }

    if (typeof (Page_IsValid) != "undefined" && Page_IsValid == false)
    {
        alert("提交数据验证失败！");
        return Page_IsValid;
    }
    
    if (t == undefined)
    {
        return selected;
    }
    return confirm(t);
}

if (typeof($) != "undefined") 
{ 
    $(".table1 .trd").each(function (i) {
        if (i % 2 == 0)
        {
            $(this).addClass("tr1");
        }
        else
        {
            $(this).addClass("tr2");
        }

        $(this).bind("mouseover", function () {
            this.style.backgroundColor = "#def0fb";
        });
        $(this).bind("mouseout", function () {
            this.style.backgroundColor = "";
        });
    });
    
    $(".neirong .table1 tr").each(function (i) {
        if (i > 0)
        {
            $(this).bind("mouseover", function () {
                this.style.backgroundColor = "#fffdd7";
            });
            $(this).bind("mouseout", function () {
                this.style.backgroundColor = "";
            });
        }
    });
    
    if ($("#btnQuery").length == 1)
    {
        $("body").keydown(function(event){
          if (event.keyCode == 13)
          {
             $("#btnQuery").focus();
          }
        });
    }
}

