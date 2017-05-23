if (typeof(AgentQian) != "undefined" && typeof(helpnew_jsdatas) != "undefined")
{
    switch(AgentQian)
    {
        case "Theme1":
            document.writeln("<ul class='biao_help'>");
            for(var i = 0; i < helpnew_jsdatas.length; i++)
            {
                document.writeln("<li><a target='_blank' style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl + "'><nobr>" + helpnew_jsdatas[i].NewsTitle + "</nobr></a></li>");
            }
            document.writeln("</ul>");
            break;
        case "Theme2":     
        case "Theme3": 
        case "Theme4":
            for(var i = 0; i < helpnew_jsdatas.length; i++)
            {  
                document.writeln("<li><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl + "' target='_blank'><nobr>" + helpnew_jsdatas[i].NewsTitle + "</nobr></a></li>");
            }
            break;    
    }
}