var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = 'ѡ���ֵ����';
ProvinceValue[0] = '';
ProvinceArray[1] = '��һ����';
ProvinceValue[1] = '��һ����';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '�̺�����';
tCityv[1][0] = '�̺�����';
tCitys[1][1] = '��������';
tCityv[1][1] = '��������';
ProvinceArray[2] = '��������';
ProvinceValue[2] = '��������';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '�˷�����';
tCityv[2][0] = '�˷�����';
tCitys[2][1] = '������ӿ';
tCityv[2][1] = '������ӿ';
ProvinceArray[3] = '�ڰ˴���';
ProvinceValue[3] = '�ڰ˴���';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '��������';
tCityv[3][0] = '��������';
tCitys[3][1] = '���Ǻ���';
tCityv[3][1] = '���Ǻ���';
ProvinceArray[4] = '��ʮ����';
ProvinceValue[4] = '��ʮ����';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '����Ⱥ��';
tCityv[4][0] = '����Ⱥ��';
ProvinceArray[5] = '��ʮ������';
ProvinceValue[5] = '��ʮ������';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '��������';
tCityv[5][0] = '��������';
ProvinceArray[6] = '��ʮ������';
ProvinceValue[6] = '��ʮ������';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '�������';
tCityv[6][0] = '�������';
ProvinceArray[7] = '��ʮ�����';
ProvinceValue[7] = '��ʮ�����';
tCitys[7] = new Array;
tCityv[7] = new Array;
tCitys[7][0] = '��ͼ��չ';
tCityv[7][0] = '��ͼ��չ';
tCitys[7][1] = '������';
tCityv[7][1] = '������';
tCitys[7][2] = '�˷�����';
tCityv[7][2] = '�˷�����';
tCitys[7][3] = '������˫';
tCityv[7][3] = '������˫';


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
