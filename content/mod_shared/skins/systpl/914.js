var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = 'ѡ���ֵ����';
ProvinceValue[0] = '';
ProvinceArray[1] = '��������1��';
ProvinceValue[1] = '��������1��';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '����1��1��';
tCityv[1][0] = '����1��1��';
ProvinceArray[2] = '�㶫����1��';
ProvinceValue[2] = '�㶫����1��';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '�㶫1��1��';
tCityv[2][0] = '�㶫1��1��';
tCitys[2][1] = '�㶫1��2��';
tCityv[2][1] = '�㶫1��2��';
tCitys[2][2] = '�㶫1��3��';
tCityv[2][2] = '�㶫1��3��';
ProvinceArray[3] = '�㽭����1��';
ProvinceValue[3] = '�㽭����1��';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '�㽭1��1��';
tCityv[3][0] = '�㽭1��1��';
ProvinceArray[4] = '������ͨ1��';
ProvinceValue[4] = '������ͨ1��';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '����1��1��';
tCityv[4][0] = '����1��1��';
tCitys[4][1] = '����1��6��';
tCityv[4][1] = '����1��6��';
tCitys[4][2] = '����1��8��';
tCityv[4][2] = '����1��8��';
ProvinceArray[5] = '�Ϻ�����1��';
ProvinceValue[5] = '�Ϻ�����1��';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '�Ϻ�1��1��';
tCityv[5][0] = '�Ϻ�1��1��';
tCitys[5][1] = '�Ϻ�1��8��';
tCityv[5][1] = '�Ϻ�1��8��';
ProvinceArray[6] = '���յ���1��';
ProvinceValue[6] = '���յ���1��';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '����1��1��';
tCityv[6][0] = '����1��1��';


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
citybox.options[0] = new Option("��ѡ���ֵ������","");
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
citybox.options[0] = new Option("����ѡ���ֵ����","");
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
		alert("����д�����ܱ������ֻ���");
		return;
	}
	
	if(obj1.value != obj.value)
	{
		alert("�����ܱ������ֻ����������벻һ��");
	}
}
          
function TplShow()
{
	ProvinceOptionMenu();
}

TplShow();
