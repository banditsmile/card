function Request(para) {
    para = para.toLowerCase();
    var scripts = document.getElementsByTagName("script");
    var url = scripts[scripts.length - 1].src;
    var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
    var key, j;
    for (i = 0; i < paraString.length; i++) {
        j = paraString[i];
        key = j.substring(0, j.indexOf("=")).toLowerCase();
        if (key == para)
        {
            return j.substring(j.indexOf("=") + 1, j.length);
        }
    }
    return "";
}

var klg_isposkback = Request("isposkback");//是否回滚操作
if (klg_isposkback == "False")
{
    parent.$("html,body").scrollTop(0);
}