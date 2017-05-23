if (typeof (AgentQian) != "undefined" && typeof (friendlink_jsdatas) != "undefined") {
    switch (AgentQian) {
        case "webblue":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<li><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "' rel='nofollow'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></li>");
            }
            break;
        case "webblack":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<li><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></li>");
            }
            break;
        case "webgreen":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<li><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></li>");
            }
            break;
        case "webred":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<li><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></li>");
            }
            break;
        case "weborange":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<li><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></li>");
            }
            break;
        case "webpruple":
            for (var i = 0; i < friendlink_jsdatas.length; i++) {
                document.writeln("<span><a target='_blank' href='" + friendlink_jsdatas[i].FriendUrl + "' rel='nofollow'>" + (friendlink_jsdatas[i].FriendPicture == "" ? friendlink_jsdatas[i].FriendName : "<img src='../" + friendlink_jsdatas[i].FriendPicture + "' alt='' width='88' height='31' />") + "</a></span>");
            }
            break;
    }
}