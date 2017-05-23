if (typeof (AgentQian) != "undefined" && typeof (bankaccount_jsdatas) != "undefined") {
    var bankNum=bankaccount_jsdatas.length > 6 ? 6 : bankaccount_jsdatas.length;
    switch (AgentQian) {
        case "webblue":
            for (var i = 0; i < bankNum; i++) {

                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;
        case "webblack":
            for (var i = 0; i < bankNum; i++) {

                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;
        case "webgreen":
            for (var i = 0; i < bankNum; i++) {
                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;
        case "webred":
            for (var i = 0; i < bankNum; i++) {
                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;
        case "webpruple":
            for (var i = 0; i < bankNum; i++) {
                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;
        case "weborange":
            for (var i = 0; i < bankNum; i++) {
                document.writeln("<li><dl><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + ".gif' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'>" + bankaccount_jsdatas[i].BankName + "</a>(" + bankaccount_jsdatas[i].BankCity + ")<p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl></li>");
            }
            break;



    }
}

    

