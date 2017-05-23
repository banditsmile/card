if (typeof (AgentQian) != "undefined" && typeof (helpnew_jsdatas) != "undefined") {
    var helpLength = helpnew_jsdatas.length;
    if (helpnew_jsdatas.length > 12) {
        helpLength = 12;
    }
    switch (AgentQian) {
        case "webblue":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webblack":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webgreen":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webred":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "weborange":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
        case "webpruple":
            for (var i = 0; i < helpLength; i++) {
                document.writeln("<li title='" + helpnew_jsdatas[i].NewsTitle + "'><a style='color: " + helpnew_jsdatas[i].TitleColor + "' href='" + helpnew_jsdatas[i].NewsUrl.replace("NewDetail.aspx", "HelpDetail.aspx") + "'>" + helpnew_jsdatas[i].NewsTitle + "</a></li>");
            }
            break;
    }
}
