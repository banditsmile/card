if (typeof (AgentQian) != "undefined" && typeof (recommendadv_jsdatas) != "undefined") {
    switch (AgentQian) {
        case "webblue":
            for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                document.writeln("<div class='clear_div adv_t'><a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='265' height='80'/></a></div>");
            }
            break;
        case "webblack":
            for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                document.writeln("<div class='clear_div adv_t'><a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='265' height='79'/></a></div>");
            }
            break;
        case "webgreen":
            for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                document.writeln("<div class='clear_div adv_t'><a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='265' height='79'/></a></div>");
            }
            break;
        case "webred":
            for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                document.writeln("<ul class='adv_box clear_div'>");
                for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                    document.writeln("<li> <a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='236' height='79'/></a></li>");
                }
                document.writeln("</ul>");
            }
            break;
        case "webpruple":
            if (recommendadv_jsdatas.length > 0) {
                document.writeln("<ul class='adv_box clear_div'>");
                for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                    document.writeln("<li> <a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='236' height='79'/></a></li>");
                }
                document.writeln("</ul>");
            }
            break;
        case "weborange":
            if (recommendadv_jsdatas.length > 0) {
                document.writeln("<div class=\"clear_div adv_img\"><ul><li class='s1'><i>我们的服务：</i></li>");
                document.writeln("<li class='s2'></li>");
                for (var i = 0; i < recommendadv_jsdatas.length; i++) {
                    document.writeln("<li><a href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='../" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='" + recommendadv_jsdatas[i].AdLinkName + "' width='269' height='64'/></a></li>");
                }
                document.writeln("</ul></div>");
            }
            break;
    }
}

