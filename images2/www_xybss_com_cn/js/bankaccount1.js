if (typeof (AgentQian) != "undefined" && typeof (bankaccount_jsdatas) != "undefined") {
    switch (AgentQian) {
        case "webblue":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
        case "webblack":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
        case "webgreen":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
        case "webred":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
        case "webpruple":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
        case "weborange":
            for (var i = 0; i < bankaccount_jsdatas.length; i++) {
                document.writeln("<dl class='clear_div r_bank'><dt><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='_blank'><img src='../images/bank_" + bankaccount_jsdatas[i].Comment + "1.png' alt=''/></a></dt><dd><a href='" + bankaccount_jsdatas[i].BankUrl + "' target='blank'><span class='th'>" + bankaccount_jsdatas[i].BankName + "(" + bankaccount_jsdatas[i].BankCity + ")</span></a><p>" + bankaccount_jsdatas[i].BankAccount + "</p><p>账户名:" + bankaccount_jsdatas[i].AccountName + "</p></dd></dl>");
            }
            break;
    }
}