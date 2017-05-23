var ProvinceArray = new Array;
var ProvinceValue = new Array;
ProvinceArray[0] = '选择游戏';
ProvinceValue[0] = '';
ProvinceArray[1] = '热血江湖';
ProvinceValue[1] = '热血江湖';		
ProvinceArray[2] = '星战前夜';
ProvinceValue[2] = '星战前夜';			
ProvinceArray[3] = '指环王';
ProvinceValue[3] = '指环王';			
ProvinceArray[4] = '特种部队';
ProvinceValue[4] = '特种部队';			
ProvinceArray[5] = '神泣';
ProvinceValue[5] = '神泣';			
ProvinceArray[6] = '光之国度';
ProvinceValue[6] = '光之国度';			
ProvinceArray[7] = 'CDC金币';
ProvinceValue[7] = 'CDC金币';			
ProvinceArray[8] = '新侠义道';
ProvinceValue[8] = '新侠义道';			
ProvinceArray[9] = '东游记';
ProvinceValue[9] = '东游记';			
ProvinceArray[10] = '极速轮滑';
ProvinceValue[10] = '极速轮滑';	
tCitys = new Array;
tCityv = new Array;
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '网通一区';
tCityv[1][0] = '网通一区';
tCitys[1][1] = '网通二区';
tCityv[1][1] = '网通二区';
tCitys[1][2] = '网通三区';
tCityv[1][2] = '网通三区';
tCitys[1][3] = '网通四区';
tCityv[1][3] = '网通四区';
tCitys[1][4] = '电信一区';
tCityv[1][4] = '电信一区';
tCitys[1][5] = '电信二区';
tCityv[1][5] = '电信二区';
tCitys[1][6] = '电信三区';
tCityv[1][6] = '电信三区';
tCitys[1][7] = '电信四区';
tCityv[1][7] = '电信四区';
tCitys[1][8] = '电信五区';
tCityv[1][8] = '电信五区';
tCitys[1][9] = '电信六区';
tCityv[1][9] = '电信六区';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '晨曦(EVE)';
tCityv[2][0] = '晨曦(EVE)';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '电信一区';
tCityv[3][0] = '电信一区';
tCitys[3][1] = '电信二区';
tCityv[3][1] = '电信二区';
tCitys[3][2] = '网通一区';
tCityv[3][2] = '网通一区';
tCitys[3][3] = '网通二区';
tCityv[3][3] = '网通二区';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '电信１';
tCityv[4][0] = '电信１';
tCitys[4][1] = '网通１';
tCityv[4][1] = '网通１';
tCitys[4][2] = '电信２（新）';
tCityv[4][2] = '电信２（新）';
tCitys[4][3] = '网通２（新）';
tCityv[4][3] = '网通２（新）';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '愤怒女神(网通合区)';
tCityv[5][0] = '愤怒女神(网通合区)';
tCitys[5][1] = '光明女神(电信合区)';
tCityv[5][1] = '光明女神(电信合区)';
tCitys[5][2] = '网通30区-阿罗克';
tCityv[5][2] = '网通30区-阿罗克';
tCitys[5][3] = '电信29区-多米纳斯遗迹';
tCityv[5][3] = '电信29区-多米纳斯遗迹';
tCitys[5][4] = '电信31区-阿瓦罗纳';
tCityv[5][4] = '电信31区-阿瓦罗纳';
tCitys[5][5] = '网通32区-兰哈尔';
tCityv[5][5] = '网通32区-兰哈尔';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '电信/网通区';
tCityv[6][0] = '电信/网通区';
tCitys[7] = new Array;
tCityv[7] = new Array;
tCitys[7][0] = 'CDC金币';
tCityv[7][0] = 'CDC金币';
tCitys[8] = new Array;
tCityv[8] = new Array;
tCitys[8][0] = '中华网专区';
tCityv[8][0] = '中华网专区';
tCitys[9] = new Array;
tCityv[9] = new Array;
tCitys[9][0] = '电信一区';
tCityv[9][0] = '电信一区';
tCitys[9][1] = '电信二区';
tCityv[9][1] = '电信二区';
tCitys[9][2] = '网通一区';
tCityv[9][2] = '网通一区';
tCitys[10] = new Array;
tCityv[10] = new Array;
tCitys[10][0] = '电信一区';
tCityv[10][0] = '电信一区';
tCitys[10][1] = '网通一区';
tCityv[10][1] = '网通一区';



var init = 0;
	
function ProvinceOptionMenu()
{
	if(init == 0)
	{
		init = 1;
    var i;
    provincebox = $("area");
    for(i = 0; i < ProvinceArray.length; i++)
    {
    provincebox.options[i] = new Option(ProvinceArray[i],ProvinceValue[i]);
    }
    provincebox.length = i;
  }
}

function selectarea(obj)
{
$("ubzczarea1").value = obj.options[obj.selectedIndex].value + "||" + obj.options[obj.selectedIndex].text;
provincebox = $("area");
selcity = parseInt(provincebox.selectedIndex);
tCity = tCitys[selcity];
tCitv = tCityv[selcity];
citybox = $("serv");
if(tCity != null)
{
citybox = $("serv");
if (tCity.length>1){
citybox.options[0] = new Option("请选择充值区域","");
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
citybox.options[0] = new Option("请先选择充值产品","");
citybox.length = 1;}
}

$("ubzczarea2").value = citybox.options[0].value + "||" + citybox.options[0].text;
}


function SetServ(obj)
{
	$("ubzczarea2").value = obj.options[obj.selectedIndex].value + "||" + obj.options[obj.selectedIndex].text;
}

function TplShow()
{
	ProvinceOptionMenu();
}

TplShow();
