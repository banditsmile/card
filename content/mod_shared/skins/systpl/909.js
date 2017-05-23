var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = '选择充值区域';
ProvinceValue[0] = '';
ProvinceArray[1] = '华东大区（电信专服）';
ProvinceValue[1] = '华东大区（电信专服）';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '电信专服';
tCityv[1][0] = '电信专服';
ProvinceArray[2] = '华东大区（网通专服）';
ProvinceValue[2] = '华东大区（网通专服）';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '网通专服';
tCityv[2][0] = '网通专服';
ProvinceArray[3] = '华东大区（大清盛世）';
ProvinceValue[3] = '华东大区（大清盛世）';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '大清盛世';
tCityv[3][0] = '大清盛世';
ProvinceArray[4] = '华东大区（乱世群雄）';
ProvinceValue[4] = '华东大区（乱世群雄）';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '乱世群雄';
tCityv[4][0] = '乱世群雄';


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
