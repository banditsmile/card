if (typeof(AgentQian) != "undefined" && typeof(slideradv_jsdatas) != "undefined")
{
    switch(AgentQian)
    {
        case "Theme1":
                document.writeln("<div class='banner'>");
                document.writeln("<div id='slider' class='contentslider'>");
                document.writeln("<div class='opacitylayer'> ");
                for(var i = 0; i < slideradv_jsdatas.length; i++)
                { 
                    document.writeln("<div class='slider_ad'><a target='_blank' href='" + slideradv_jsdatas[i].AdLinkUrl + "'" + (slideradv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='" + slideradv_jsdatas[i].AdLinkPicture + "' alt='' /></a></div>");
                }
                
                document.writeln("</div>");
                document.writeln("</div>");
                document.writeln("<div class='pagination' id='paginate_slider'>");
                document.writeln("</div>");
                document.writeln("</div>");
                if (slideradv_jsdatas.length > 0)
                {
                    ContentSlider('slider', 5000);
                }
            break;
        case "Theme2":   
        case "Theme3": 
        case "Theme4": 
            if (slideradv_jsdatas.length > 0)
            {
                document.writeln("<div class='container' id='idContainer'>");
                document.writeln("<table id='idSlider' border='0' cellpadding='0' cellspacing='0'>");
                for(var i = 0; i < slideradv_jsdatas.length; i++)
                { 
                    document.writeln("<tr><td><a href='" + slideradv_jsdatas[i].AdLinkUrl + "'><img src='" + slideradv_jsdatas[i].AdLinkPicture + "' alt='" + slideradv_jsdatas[i].AdLinkName + "' /></a></td></tr>");
                }
                document.writeln("</table>");
                document.writeln("<ul class='num' id='idNum'>");
                document.writeln("</ul>");
                document.writeln("</div>");
                document.writeln("<script language='javascript' type='text/javascript'>");
                document.writeln("var forEach = function(array, callback, thisObject){if(array.forEach){array.forEach(callback, thisObject);}else{for (var i = 0, len = array.length; i < len; i++) { callback.call(thisObject, array[i], i, array); }}}");
                document.writeln("var st = new SlideTrans('idContainer', 'idSlider', " + slideradv_jsdatas.length + ");");
                document.writeln("var nums = [];");
                document.writeln("for(var i = 0, n = st._count - 1; i <= n;){(nums[i] = $('idNum').appendChild(document.createElement('li'))).innerHTML = ++i;}");
                document.writeln("forEach(nums, function(o, i){o.onmouseover = function(){ o.className = 'on'; st.Auto = false; st.Run(i); };o.onmouseout = function(){ o.className = ''; st.Auto = true; st.Run(); }})");
                document.writeln("st.onStart = function(){forEach(nums, function(o, i){ o.className = st.Index == i ? 'on' : ''; })}");
                document.writeln("st.Run();");
                document.writeln("</script>");  
            } 
            break;    
    }
}