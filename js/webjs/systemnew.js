function Request(para) {
    para = para.toLowerCase();
    var scripts = document.getElementsByTagName("script");
    var url = scripts[scripts.length - 1].src;
    var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
    var key, j;
    for (i = 0; i < paraString.length; i++) {
        j = paraString[i];
        key = j.substring(0, j.indexOf("=")).toLowerCase();
        if (key == para) {
            return j.substring(j.indexOf("=") + 1, j.length);
        }
    }
    return "";
}
if (typeof (AgentQian) != "undefined" && typeof (systemnew_jsdatas) != "undefined") {
    
    switch (AgentQian) {
        case "webblue":
            var maxNum = systemnew_jsdatas.length > 12 ? 12 : systemnew_jsdatas.length;
            for (var i = 0; i < maxNum; i++) {
                document.writeln("<li title='" + systemnew_jsdatas[i].NewsTitle + "'><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webblack":
            var maxNum = systemnew_jsdatas.length > 12 ? 12 : systemnew_jsdatas.length;
            for (var i = 0; i < maxNum; i++) {
                document.writeln("<li><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webgreen":
            var maxNum = systemnew_jsdatas.length > 12 ? 12 : systemnew_jsdatas.length;
            for (var i = 0; i < maxNum; i++) {
                document.writeln("<li><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a class='" + systemnew_jsdatas[i].Decorate + "' target='_blank' style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'><nobr>" + systemnew_jsdatas[i].NewsTitle + "</nobr></a></li>");
            }
            break;
        case "webred":
            if (systemnew_jsdatas.length > 0) {
                var myDate = systemnew_jsdatas[0].PublishTime.split("-");
                document.writeln("<dl class='clear_div h_news'>");
                document.writeln("<dt class='th'>" + myDate[1] + "月<p>" + myDate[2] + "</p></dt>");
                document.writeln("<dd>");
                document.writeln("<a href='" + systemnew_jsdatas[0].NewsUrl + "' class='th'>" + systemnew_jsdatas[0].NewsTitle + "</a>");
                if (systemnew_jsdatas[0].NewsContent == null) {
                    document.writeln("<p>...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }
                else {
                    document.writeln("<p>" + systemnew_jsdatas[0].NewsContent.substring(0, 80) + "...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }              
                document.writeln("</dd>");
                document.writeln("</dl>");
                document.writeln("<ul class='clear_div h_news'>");
                for (var i = 1; i < systemnew_jsdatas.length; i++) {
                    document.writeln("<li title='" + systemnew_jsdatas[i].NewsTitle + "'><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></li>");
                }
                document.writeln("</ul>");
            }
            break;
        case "webpruple":
            if (systemnew_jsdatas.length > 0) {
                var myDate = systemnew_jsdatas[0].PublishTime.split("-");
                document.writeln("<dl class='clear_div h_news'>");
                document.writeln("<dt class='th'>" + myDate[1] + "月<p>" + myDate[2] + "</p></dt>");
                document.writeln("<dd>");
                document.writeln("<a href='" + systemnew_jsdatas[0].NewsUrl + "' class='th'>" + systemnew_jsdatas[0].NewsTitle + "</a>");
                if (systemnew_jsdatas[0].NewsContent == null) {
                    document.writeln("<p>...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }
                else {
                    document.writeln("<p>" + systemnew_jsdatas[0].NewsContent.substring(0, 80) + "...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }
                document.writeln("</dd>");
                document.writeln("</dl>");
                document.writeln("<ul class='clear_div h_news'>");
                for (var i = 1; i < systemnew_jsdatas.length; i++) {
                    document.writeln("<li title='" + systemnew_jsdatas[i].NewsTitle + "'><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></li>");
                }
                document.writeln("</ul>");
            }
            break;
        case "weborange":
            if (systemnew_jsdatas.length > 0) {
                var myDate = systemnew_jsdatas[0].PublishTime.split("-");
                document.writeln("<dl class='clear_div h_news'>");
                document.writeln("<dt class='th'>" + myDate[1] + "月<p>" + myDate[2] + "</p></dt>");
                document.writeln("<dd>");
                document.writeln("<a href='" + systemnew_jsdatas[0].NewsUrl + "' class='th'>" + systemnew_jsdatas[0].NewsTitle + "</a>");
                if (systemnew_jsdatas[0].NewsContent == null) {
                    document.writeln("<p>...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }
                else {
                    document.writeln("<p>" + systemnew_jsdatas[0].NewsContent.substring(0, 80) + "...<span class='orange_link'>[<a href='" + systemnew_jsdatas[0].NewsUrl + "'>详情</a>]</span></p>");
                }
                document.writeln("</dd>");
                document.writeln("</dl>");
                document.writeln("<ul class='clear_div h_news'>");
                for (var i = 1; i < systemnew_jsdatas.length; i++) {
                    document.writeln("<li title='" + systemnew_jsdatas[i].NewsTitle + "'><span class='date'>" + systemnew_jsdatas[i].PublishTime + "</span><a  target='_blank' style='color: " + systemnew_jsdatas[i].TitleColor + "' href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></li>");
                }
                document.writeln("</ul>");
            }
            break;
    }
}
else if (typeof (systemnew_jsdatas) != "undefined") {
    var para = Request("para");
    if (para == "1") {
        var maxNum = systemnew_jsdatas.length > 8 ? 8 : systemnew_jsdatas.length;
        for (var i = 0; i < maxNum; i++) {
            document.writeln("<tr>");
            document.writeln("<td class='r_td1 r_gg_news'><p><a href='" + systemnew_jsdatas[i].NewsUrl + "'>" + systemnew_jsdatas[i].NewsTitle + "</a></p></td><td>2013-05-03</td>");
            document.writeln("</tr>");
        }
       
    }
}



