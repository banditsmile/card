var ProvinceArray = new Array;
var ProvinceValue = new Array;
ProvinceArray[0] = 'ѡ����Ϸ';
ProvinceValue[0] = '';
ProvinceArray[1] = '��Ѫ����';
ProvinceValue[1] = '��Ѫ����';		
ProvinceArray[2] = '��սǰҹ';
ProvinceValue[2] = '��սǰҹ';			
ProvinceArray[3] = 'ָ����';
ProvinceValue[3] = 'ָ����';			
ProvinceArray[4] = '���ֲ���';
ProvinceValue[4] = '���ֲ���';			
ProvinceArray[5] = '����';
ProvinceValue[5] = '����';			
ProvinceArray[6] = '��֮����';
ProvinceValue[6] = '��֮����';			
ProvinceArray[7] = 'CDC���';
ProvinceValue[7] = 'CDC���';			
ProvinceArray[8] = '�������';
ProvinceValue[8] = '�������';			
ProvinceArray[9] = '���μ�';
ProvinceValue[9] = '���μ�';			
ProvinceArray[10] = '�����ֻ�';
ProvinceValue[10] = '�����ֻ�';	
tCitys = new Array;
tCityv = new Array;
tCitys[1] = new Array;
tCityv[1] = new Array;
tCitys[1][0] = '��ͨһ��';
tCityv[1][0] = '��ͨһ��';
tCitys[1][1] = '��ͨ����';
tCityv[1][1] = '��ͨ����';
tCitys[1][2] = '��ͨ����';
tCityv[1][2] = '��ͨ����';
tCitys[1][3] = '��ͨ����';
tCityv[1][3] = '��ͨ����';
tCitys[1][4] = '����һ��';
tCityv[1][4] = '����һ��';
tCitys[1][5] = '���Ŷ���';
tCityv[1][5] = '���Ŷ���';
tCitys[1][6] = '��������';
tCityv[1][6] = '��������';
tCitys[1][7] = '��������';
tCityv[1][7] = '��������';
tCitys[1][8] = '��������';
tCityv[1][8] = '��������';
tCitys[1][9] = '��������';
tCityv[1][9] = '��������';
tCitys[2] = new Array;
tCityv[2] = new Array;
tCitys[2][0] = '����(EVE)';
tCityv[2][0] = '����(EVE)';
tCitys[3] = new Array;
tCityv[3] = new Array;
tCitys[3][0] = '����һ��';
tCityv[3][0] = '����һ��';
tCitys[3][1] = '���Ŷ���';
tCityv[3][1] = '���Ŷ���';
tCitys[3][2] = '��ͨһ��';
tCityv[3][2] = '��ͨһ��';
tCitys[3][3] = '��ͨ����';
tCityv[3][3] = '��ͨ����';
tCitys[4] = new Array;
tCityv[4] = new Array;
tCitys[4][0] = '���ţ�';
tCityv[4][0] = '���ţ�';
tCitys[4][1] = '��ͨ��';
tCityv[4][1] = '��ͨ��';
tCitys[4][2] = '���ţ����£�';
tCityv[4][2] = '���ţ����£�';
tCitys[4][3] = '��ͨ�����£�';
tCityv[4][3] = '��ͨ�����£�';
tCitys[5] = new Array;
tCityv[5] = new Array;
tCitys[5][0] = '��ŭŮ��(��ͨ����)';
tCityv[5][0] = '��ŭŮ��(��ͨ����)';
tCitys[5][1] = '����Ů��(���ź���)';
tCityv[5][1] = '����Ů��(���ź���)';
tCitys[5][2] = '��ͨ30��-���޿�';
tCityv[5][2] = '��ͨ30��-���޿�';
tCitys[5][3] = '����29��-������˹�ż�';
tCityv[5][3] = '����29��-������˹�ż�';
tCitys[5][4] = '����31��-��������';
tCityv[5][4] = '����31��-��������';
tCitys[5][5] = '��ͨ32��-������';
tCityv[5][5] = '��ͨ32��-������';
tCitys[6] = new Array;
tCityv[6] = new Array;
tCitys[6][0] = '����/��ͨ��';
tCityv[6][0] = '����/��ͨ��';
tCitys[7] = new Array;
tCityv[7] = new Array;
tCitys[7][0] = 'CDC���';
tCityv[7][0] = 'CDC���';
tCitys[8] = new Array;
tCityv[8] = new Array;
tCitys[8][0] = '�л���ר��';
tCityv[8][0] = '�л���ר��';
tCitys[9] = new Array;
tCityv[9] = new Array;
tCitys[9][0] = '����һ��';
tCityv[9][0] = '����һ��';
tCitys[9][1] = '���Ŷ���';
tCityv[9][1] = '���Ŷ���';
tCitys[9][2] = '��ͨһ��';
tCityv[9][2] = '��ͨһ��';
tCitys[10] = new Array;
tCityv[10] = new Array;
tCitys[10][0] = '����һ��';
tCityv[10][0] = '����һ��';
tCitys[10][1] = '��ͨһ��';
tCityv[10][1] = '��ͨһ��';



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
citybox.options[0] = new Option("��ѡ���ֵ����","");
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
citybox.options[0] = new Option("����ѡ���ֵ��Ʒ","");
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
