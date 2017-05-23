var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = '选择充值区域';
ProvinceValue[0] = '';
ProvinceArray[1] = '福建电信1区';
ProvinceValue[1] = '福建电信1区';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '福建1区1服';
tCityv[1][0] = '福建1区1服';
ProvinceArray[2] = '广东电信1区';
ProvinceValue[2] = '广东电信1区';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '广东1区1服';
tCityv[2][0] = '广东1区1服';
tCitys[2][1] = '广东1区2服';
tCityv[2][1] = '广东1区2服';
tCitys[2][2] = '广东1区3服';
tCityv[2][2] = '广东1区3服';
ProvinceArray[3] = '浙江电信1区';
ProvinceValue[3] = '浙江电信1区';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '浙江1区1服';
tCityv[3][0] = '浙江1区1服';
ProvinceArray[4] = '北京网通1区';
ProvinceValue[4] = '北京网通1区';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '北京1区1服';
tCityv[4][0] = '北京1区1服';
tCitys[4][1] = '北京1区6服';
tCityv[4][1] = '北京1区6服';
tCitys[4][2] = '北京1区8服';
tCityv[4][2] = '北京1区8服';
ProvinceArray[5] = '上海电信1区';
ProvinceValue[5] = '上海电信1区';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '上海1区1服';
tCityv[5][0] = '上海1区1服';
tCitys[5][1] = '上海1区8服';
tCityv[5][1] = '上海1区8服';
ProvinceArray[6] = '江苏电信1区';
ProvinceValue[6] = '江苏电信1区';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '江苏1区1服';
tCityv[6][0] = '江苏1区1服';


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
		return;
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
