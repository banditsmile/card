var ProvinceArray = new Array;
var ProvinceValue = new Array;
tCitys = new Array;
tCityv = new Array;
ProvinceArray[0] = 'ѡ���ֵ����';
ProvinceValue[0] = '';
ProvinceArray[1] = '��������������ר����';
ProvinceValue[1] = '��������������ר����';
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '����ר��';
tCityv[1][0] = '����ר��';
ProvinceArray[2] = '������������ͨר����';
ProvinceValue[2] = '������������ͨר����';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '��ͨר��';
tCityv[2][0] = '��ͨר��';
ProvinceArray[3] = '��������������ʢ����';
ProvinceValue[3] = '��������������ʢ����';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '����ʢ��';
tCityv[3][0] = '����ʢ��';
ProvinceArray[4] = '��������������Ⱥ�ۣ�';
ProvinceValue[4] = '��������������Ⱥ�ۣ�';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '����Ⱥ��';
tCityv[4][0] = '����Ⱥ��';


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
