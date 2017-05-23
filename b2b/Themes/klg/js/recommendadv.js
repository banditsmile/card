if (typeof(AgentQian) != "undefined" && typeof(recommendadv_jsdatas) != "undefined")
{
    switch(AgentQian)
    {
        case "Theme1":
                document.writeln("<ul class='biao_img'>");
                for(var i = 0; i < recommendadv_jsdatas.length; i++)
                {             
                    document.writeln("<li><a target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'" + (recommendadv_jsdatas[i].IsOtherUrl == 0 ? "" : "rel='nofollow'") + "><img src='" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='' /></a><p class='item'><strong><a title='" + recommendadv_jsdatas[i].AdLinkName + "' target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'>" + recommendadv_jsdatas[i].AdLinkName + "</a></strong></p></li>");
                }
                document.writeln("</ul>");

            break;
        case "Theme2":
                document.writeln("<ul>");
                for(var i = 0; i < recommendadv_jsdatas.length; i++)
                {             
                    document.writeln("<li class='pic'><a target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'><img src='" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='' /></a></li><li class='pic-title'><a title='" + recommendadv_jsdatas[i].AdLinkName + "' target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'>" + recommendadv_jsdatas[i].AdLinkName + "</a></li>");
                }
                document.writeln("</ul>");
            break;   
        case "Theme3": 
                for(var i = 0; i < recommendadv_jsdatas.length; i++)
                {             
                    document.writeln("<li class='pic'><a target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'><img src='" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='' /></a></li><li class='text'><a title='" + recommendadv_jsdatas[i].AdLinkName + "' target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'>" + recommendadv_jsdatas[i].AdLinkName + "</a></li>");
                }
            break; 
         case "Theme4": 
                for(var i = 0; i < recommendadv_jsdatas.length; i++)
                {             
                    document.writeln("<li><p class='pic-tu'><a target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'><img src='" + recommendadv_jsdatas[i].AdLinkPicture + "' alt='' /></a></p><p class='tit'><a title='" + recommendadv_jsdatas[i].AdLinkName + "' target='_blank' href='" + recommendadv_jsdatas[i].AdLinkUrl + "'>" + recommendadv_jsdatas[i].AdLinkName + "</a></p></li>");
                }
            break;          
    }
}