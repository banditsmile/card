var ProvinceArray = new Array;
var ProvinceValue = new Array;
ProvinceArray[0] = '选择游戏';
ProvinceValue[0] = '';
ProvinceArray[1] = '剑侠情缘网络版（收费区）';
ProvinceValue[1] = 'jx|剑侠情缘网络版（收费区）';
ProvinceArray[2] = '剑侠情缘网络版（免费区）';
ProvinceValue[2] = 'jxib|剑侠情缘网络版（免费区）';
ProvinceArray[3] = '剑侠情缘网络版（联合运营专区）';
ProvinceValue[3] = 'jxiblh|剑侠情缘网络版（联合运营专区）';
ProvinceArray[4] = '剑侠情缘网络版2';
ProvinceValue[4] = 'jx2|剑侠情缘网络版2';
ProvinceArray[5] = '剑侠情缘2免费区服';
ProvinceValue[5] = 'jx2ib|剑侠情缘2免费区服';
ProvinceArray[6] = '封神榜';
ProvinceValue[6] = 'fs|封神榜';
ProvinceArray[7] = '封神榜2';
ProvinceValue[7] = 'fs2|封神榜2';
ProvinceArray[8] = '封神榜国际版';
ProvinceValue[8] = 'fsib|封神榜国际版';
ProvinceArray[9] = '仙侣奇缘2';
ProvinceValue[9] = 'xl2|仙侣奇缘2';
ProvinceArray[10] = '春秋Q传';
ProvinceValue[10] = 'cq|春秋Q传';
ProvinceArray[11] = '剑侠世界';
ProvinceValue[11] = 'jxsj|剑侠世界';
ProvinceArray[12] = '反恐行动';
ProvinceValue[12] = 'cs|反恐行动';
ProvinceArray[13] = '剑侠贰外传';
ProvinceValue[13] = 'jx2wz|剑侠贰外传';
ProvinceArray[14] = '春秋外传';
ProvinceValue[14] = 'cqwz|春秋外传';
ProvinceArray[15] = '剑侠情缘网络版叁';
ProvinceValue[15] = 'jx3|剑侠情缘网络版叁';
ProvinceArray[16] = '剑侠情缘2010';
ProvinceValue[16] = 'njxib|剑侠情缘2010';
ProvinceArray[17] = '热血战队';
ProvinceValue[17] = 'rxzd|热血战队';
ProvinceArray[18] = '金山币';
ProvinceValue[18] = 'kcoin|金山币';
tCitys = new Array;
tCityv = new Array;
tChanges = new Array;
tChangev = new Array;

tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '无';
tCityv[1][0] = '|';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '无';
tCityv[2][0] = '|';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = 'zcom';
tCityv[3][0] = 'zcom|zcom';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '1区(华东电信)';
tCityv[4][0] = '01|1区(华东电信)';
tCitys[4][1] = '3区(华北网通)';
tCityv[4][1] = '03|3区(华北网通)';
tCitys[4][2] = '4区(华南电信)';
tCityv[4][2] = '04|4区(华南电信)';
tCitys[4][3] = '7区(西北电信)';
tCityv[4][3] = '07|7区(西北电信)';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '剑侠情缘网络版2（免费区服）';
tCityv[5][0] = 'njx2ib|剑侠情缘网络版2（免费区服）';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '无';
tCityv[6][0] = '|';
tCitys[7] = new Array;
tCityv[7] = new Array;
tCitys[7][0] = '封神榜2';
tCityv[7][0] = '1|封神榜2';
tCitys[8] = new Array;
tCityv[8] = new Array;
tCitys[8][0] = '无';
tCityv[8][0] = '|';
tCitys[9] = new Array;
tCityv[9] = new Array;
tCitys[9][0] = '无';
tCityv[9][0] = '|';
tCitys[10] = new Array;
tCityv[10] = new Array;
tCitys[10][0] = '1/2/4/6/7/9/10区电信';
tCityv[10][0] = '1|1/2/4/6/7/9/10区电信';
tCitys[10][1] = '3/5/8/11/16/19区网通';
tCityv[10][1] = '3|3/5/8/11/16/19区网通';
tCitys[10][2] = '12/15/17/18区电信';
tCityv[10][2] = '12|12/15/17/18区电信';
tCitys[10][3] = '20/21区电信';
tCityv[10][3] = '21|20/21区电信';
tCitys[10][4] = '23/25/27/29区电信';
tCityv[10][4] = '23|23/25/27/29区电信';
tCitys[10][5] = '22/24/26/28区网通';
tCityv[10][5] = '24|22/24/26/28区网通';
tCitys[11] = new Array;
tCityv[11] = new Array;
tCitys[11][0] = '青龙区/吉祥区（电信）';
tCityv[11][0] = 'z01|青龙区/吉祥区（电信）';
tCitys[11][1] = '网通区';
tCityv[11][1] = 'z02|网通区';
tCitys[11][2] = '朱雀区（电信）';
tCityv[11][2] = 'z03|朱雀区（电信）';
tCitys[11][3] = '玄武区（电信）';
tCityv[11][3] = 'z04|玄武区（电信）';
tCitys[11][4] = '北斗区（电信）';
tCityv[11][4] = 'z06|北斗区（电信）';
tCitys[11][5] = '金麟区（电信）';
tCityv[11][5] = 'z07|金麟区（电信）';
tCitys[12] = new Array;
tCityv[12] = new Array;
tCitys[12][0] = '联通区';
tCityv[12][0] = 'z01|联通区';
tCitys[12][1] = '电信区';
tCityv[12][1] = 'z02|电信区';
tCitys[13] = new Array;
tCityv[13] = new Array;
tCitys[13][0] = '剑侠贰外传';
tCityv[13][0] = 'z01';
tCitys[14] = new Array;
tCityv[14] = new Array;
tCitys[14][0] = '电信区';
tCityv[14][0] = 'z01|电信区';
tCitys[14][1] = '网通区';
tCityv[14][1] = 'z02|网通区';
tCitys[15] = new Array;
tCityv[15] = new Array;
tCitys[15][0] = '电信一区';
tCityv[15][0] = 'z01|电信一区';
tCitys[15][1] = '电信二区';
tCityv[15][1] = 'z02|电信二区';
tCitys[15][2] = '电信三区';
tCityv[15][2] = 'z03|电信三区';
tCitys[15][3] = '电信四区';
tCityv[15][3] = 'z04|电信四区';
tCitys[15][4] = '网通(一/二)区';
tCityv[15][4] = 'z11|网通(一/二)区';
tCitys[15][5] = '网通三区';
tCityv[15][5] = 'z13|网通三区';
tCitys[15][6] = '电信五区';
tCityv[15][6] = 'z05|电信五区';
tCitys[15][7] = '电信六区';
tCityv[15][7] = 'z06|电信六区';
tCitys[16] = new Array;
tCityv[16] = new Array;
tCitys[16][0] = '剑侠情缘2010';
tCityv[16][0] = 'jx2010|剑侠情缘2010';
tCitys[17] = new Array;
tCityv[17] = new Array;
tCitys[17][0] = '南方电信';
tCityv[17][0] = 'z01';
tCitys[17][1] = '北方网通';
tCityv[17][1] = 'z02';
tCitys[17][2] = '移动专区';
tCityv[17][2] = 'z03';
tCitys[17][3] = '上海电信';
tCityv[17][3] = 'z04';
tCitys[18] = new Array;
tCityv[18] = new Array;
tCitys[18][0] = '无';
tCityv[18][0] = '|';

tChanges[1] = new Array;
tChangev[1] = new Array;
tChanges[1][0] = '计点';
tChangev[1][0] = 'onpoint|计点';
tChanges[1][1] = '包时';
tChangev[1][1] = 'ontime|包时';
tChanges[1][2] = '银票';
tChangev[1][2] = 'ongem|银票';

tChanges[2] = new Array;
tChangev[2] = new Array;
tChanges[2][0] = '剑侠金币';
tChangev[2][0] = 'onpoint|剑侠金币';

tChanges[3] = new Array;
tChangev[3] = new Array;
tChanges[3][0] = '剑侠金币';
tChangev[3][0] = 'onpoint|剑侠金币';

tChanges[4] = new Array;
tChangev[4] = new Array;
tChanges[4][0] = '计点';
tChangev[4][0] = 'onpoint|计点';
tChanges[4][1] = '包周';
tChangev[4][1] = 'ontime|包周';
tChanges[4][2] = '银票';
tChangev[4][2] = 'ongem|银票';

tChanges[5] = new Array;
tChangev[5] = new Array;
tChanges[5][0] = '剑侠II金币';
tChangev[5][0] = 'onib|剑侠II金币';

tChanges[6] = new Array;
tChangev[6] = new Array;
tChanges[6][0] = '计点';
tChangev[6][0] = 'onpoint|计点';
tChanges[6][1] = '包周';
tChangev[6][1] = 'ontime|包周';
tChanges[6][2] = '元宝';
tChangev[6][2] = 'ongem|元宝';

tChanges[7] = new Array;
tChangev[7] = new Array;
tChanges[7][0] = '封神通宝';
tChangev[7][0] = 'onib|封神通宝';

tChanges[8] = new Array;
tChangev[8] = new Array;
tChanges[8][0] = '封神通宝';
tChangev[8][0] = 'onib|封神通宝';

tChanges[9] = new Array;
tChangev[9] = new Array;
tChanges[9][0] = '仙侣元宝';
tChangev[9][0] = 'onpoint|仙侣元宝';

tChanges[10] = new Array;
tChangev[10] = new Array;
tChanges[10][0] = '春秋金币';
tChangev[10][0] = 'onib|春秋金币';

tChanges[11] = new Array;
tChangev[11] = new Array;
tChanges[11][0] = '剑侠金币';
tChangev[11][0] = 'onib|剑侠金币';

tChanges[12] = new Array;
tChangev[12] = new Array;
tChanges[12][0] = '反恐金币';
tChangev[12][0] = 'onib|反恐金币';

tChanges[13] = new Array;
tChangev[13] = new Array;
tChanges[13][0] = '金币';
tChangev[13][0] = '5|金币';

tChanges[14] = new Array;
tChangev[14] = new Array;
tChanges[14][0] = '金币';
tChangev[14][0] = 'onib|金币';

tChanges[15] = new Array;
tChangev[15] = new Array;
tChanges[15][0] = '月卡';
tChangev[15][0] = '1|月卡';
tChanges[15][1] = '通宝';
tChangev[15][1] = '6|通宝';
tChanges[15][2] = '点卡(只支持电信五区/网通三区)';
tChangev[15][2] = '2|点卡';

tChanges[16] = new Array;
tChangev[16] = new Array;
tChanges[16][0] = '剑侠金币';
tChangev[16][0] = '5|剑侠金币';

tChanges[17] = new Array;
tChangev[17] = new Array;
tChanges[17][0] = '金币';
tChangev[17][0] = '5|金币';

tChanges[18] = new Array;
tChangev[18] = new Array;
tChanges[18][0] = '金山币';
tChangev[18][0] = '0|金山币';




function ProvinceOptionMenu()
{
var i;
provincebox = $("ubzczarea2");
for(i = 0; i < ProvinceArray.length; i++)
{
provincebox.options[i] = new Option(ProvinceArray[i],ProvinceValue[i]);
}
provincebox.length = i;
}

function selectgamearea()
{
provincebox = $("ubzczarea2");
selcity = parseInt(provincebox.selectedIndex);
tCity = tCitys[selcity];
tCitv = tCityv[selcity];
citybox = $("ubzczarea1");
if(tCity != null)
{
citybox = $("ubzczarea1");
if (tCity.length>1){
citybox.options[0] = new Option('请选择充值区域','');
for(i = 0; i < tCity.length; i++)
{
str = tCity[i];
citybox.options[i+1] = new Option(str, tCitv[i]);
}
citybox.length = i+1;
}
else
{
str = tCity[0];
citybox.options[0] = new Option(str,tCitv[0]);
citybox.length=1;
citybox.options[0].selected;
}
}
else{
if (citybox != null){
citybox.options[0] = new Option('请先选择充值区域','');
citybox.length = 1;}
}
}

function tochange()
{
//选择计费方式
provincebox = $("ubzczarea2");
selcity = parseInt(provincebox.selectedIndex);
tCity = tChanges[selcity];
tCitv = tChangev[selcity];
citybox = $("ubzcztype");
if(tCity != null)
{
citybox = $("ubzcztype");
if (tCity.length>1){
citybox.options[0] = new Option('请选择计费方式','');
for(i = 0; i < tCity.length; i++)
{
str = tCity[i];
citybox.options[i+1] = new Option(str, tCitv[i]);
}
citybox.length = i+1;
}
else
{
str = tCity[0];
citybox.options[0] = new Option(str,tCitv[0]);
citybox.length=1;
citybox.options[0].selected;
}
}
else{
if (citybox != null){
citybox.options[0] = new Option('请先选择计费方式','');
citybox.length = 1;}
}
}
     
function TplShow()
{
	ProvinceOptionMenu();
}

TplShow();
