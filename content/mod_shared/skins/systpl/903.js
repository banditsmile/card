var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = '选择充值区域';
ProvinceValue[0] = '';
ProvinceArray[1] = '第一大区';
ProvinceValue[1] = '第一大区';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '碧海情天';
tCityv[1][0] = '碧海情天';
tCitys[1][1] = '傲视天下';
tCityv[1][1] = '傲视天下';
ProvinceArray[2] = '第六大区';
ProvinceValue[2] = '第六大区';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '乘风破浪';
tCityv[2][0] = '乘风破浪';
tCitys[2][1] = '风起云涌';
tCityv[2][1] = '风起云涌';
ProvinceArray[3] = '第八大区';
ProvinceValue[3] = '第八大区';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '剑胆琴心';
tCityv[3][0] = '剑胆琴心';
tCitys[3][1] = '铁骨豪情';
tCityv[3][1] = '铁骨豪情';
ProvinceArray[4] = '第十大区';
ProvinceValue[4] = '第十大区';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '剑傲群雄';
tCityv[4][0] = '剑傲群雄';
ProvinceArray[5] = '第十二大区';
ProvinceValue[5] = '第十二大区';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '龙城岁月';
tCityv[5][0] = '龙城岁月';
ProvinceArray[6] = '第十三大区';
ProvinceValue[6] = '第十三大区';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '神兵传奇';
tCityv[6][0] = '神兵传奇';
ProvinceArray[7] = '第十五大区';
ProvinceValue[7] = '第十五大区';
tCitys[7] = new Array;
tCityv[7] = new Array;
tCitys[7][0] = '宏图大展';
tCityv[7][0] = '宏图大展';
tCitys[7][1] = '烽火九洲';
tCityv[7][1] = '烽火九洲';
tCitys[7][2] = '八方争雄';
tCityv[7][2] = '八方争雄';
tCitys[7][3] = '霸者无双';
tCityv[7][3] = '霸者无双';


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
