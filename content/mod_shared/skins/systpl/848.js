var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = '选择充值区域';
ProvinceValue[0] = '';
ProvinceArray[1] = '电信';
ProvinceValue[1] = '163';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '无量山[新区]';
tCityv[1][0] = '64';
tCitys[1][1] = '断剑崖[新区]';
tCityv[1][1] = '62';
tCitys[1][2] = '望江楼';
tCityv[1][2] = '42';
tCitys[1][3] = '烟雨楼+洞庭湖';
tCityv[1][3] = '51';
tCitys[1][4] = '莫愁湖+桃花岛';
tCityv[1][4] = '52';
tCitys[1][5] = '武夷山+阳澄湖';
tCityv[1][5] = '54';
tCitys[1][6] = '秦淮河+白云山';
tCityv[1][6] = '55';
tCitys[1][7] = '百花谷+滕王阁';
tCityv[1][7] = '58';
tCitys[1][8] = '状元坊+宝芝林';
tCityv[1][8] = '59';
tCitys[1][9] = '上海滩+丹霞山';
tCityv[1][9] = '60';
tCitys[1][10] = '大理城+九寨沟';
tCityv[1][10] = '61';
ProvinceArray[2] = '网通';
ProvinceValue[2] = '164';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '缥缈峰[新区]';
tCityv[2][0] = '65';
tCitys[2][1] = '绝情谷[新区]';
tCityv[2][1] = '63';
tCitys[2][2] = '紫禁城';
tCityv[2][2] = '19';
tCitys[2][3] = '长白山+松花江';
tCityv[2][3] = '50';
tCitys[2][4] = '白马寺+昆仑山';
tCityv[2][4] = '53';
tCitys[2][5] = '大明湖+北戴河';
tCityv[2][5] = '56';
tCitys[2][6] = '蓬莱阁+八达岭';
tCityv[2][6] = '57';


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
citybox.options[0] = new Option("请选择充值服务器","");
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
citybox.options[0] = new Option("请先选择充值区域","");
citybox.length = 1;}
}

$("ubzczarea2").value = citybox.options[0].value + "||" + citybox.options[0].text;
}


function SetServ(obj)
{
	$("ubzczarea2").value = obj.options[obj.selectedIndex].value + "||" + obj.options[obj.selectedIndex].text;
}

function checkmobile(obj)
{
	obj1 = $("ubzcztype");
	if(obj1.value == "" || obj.value == "")
	{
		alert("请填写接收密宝卡的手机号");
	}
	
	if(obj1.value != obj.value)
	{
		alert("接收密宝卡的手机号两次输入不一致");
	}
}
          
function TplShow()
{
	ProvinceOptionMenu();
}

TplShow();
