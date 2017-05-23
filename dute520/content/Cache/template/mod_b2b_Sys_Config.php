<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
<style type="text/css">
td{white-space:normal;overflow:auto;text-overflow:none;}
#kftable{background:#fff}
#kftable td{font-size:12px;padding:3px;}
</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=sys&a=ConfigSave" name="cform" id="cform"> 
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper" style="position:relative">
<div class="cbodyHead"></div>
<div id="tab">
<input type="button" value="��д������Ϣ"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys'" class="tab_normal" onFocus="this.blur()"/>
<?php if(UB_B2C){ ?><input type="button" value="���䷢������" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=EMail'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
<input type="button" value="�ر���Ϣ����"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Close'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="ǰ̨�������" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Config'" class="tab_active" onFocus="this.blur()"/>
<input type="button" value="��̨��������"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Pwd'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="IP��������"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=IpLock'" class="tab_normal" onFocus="this.blur()"/>
<?php if($vd['adminrank']==1){ ?><input type="button" value="��ؽű�����"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Jc'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
</div>

<?php $temp = explode('|', $vd['sys']['config']);$cout=count($temp); ?>
<div class="cwarpper1" style="border-top:1px #ccc solid">
<div class="ctitle">�۸��������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">�۸�����λ��</td>
      <td class="tablert">
        <input type="text" name="dec" value="<?php if($cout > 6){echo $temp[6];} ?>" /> Ĭ����3λ��ȫ�ֵ����۸�ʱ������ô���λ��
      </td>
    </tr>
    <?php if(UB_B2B){ ?>
    <tr>
      <td class="tablelt">������ƷĬ�ϵ�������</td>
      <td class="tablert">
        <input type="text" name="fee" value="<?php echo $vd['sys']['fee']; ?>" /> ��д��С���㣬����0.01 (0.01 = 1%)
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="tablelt">�Խ���Ʒ�Զ�����</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="autoprice" value="1" <?php if(isset($temp[21]) && $temp[21] == 1){ ?>checked<?php } ?> /> �Խ���Ʒ�Զ����½������ͻ�����ʱ����Ч
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">��ʾ�������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">���ҷ���</td>
      <td class="tablert">
        <input type="text" name="moneysymbol" value="<?php echo isset($vd['sys']['moneysymbol']) ? $vd['sys']['moneysymbol'] : $vd['lang']['moneysymbol']; ?>" /> 
      </td>
    </tr>
    <tr>
      <td class="tablelt">���ҵ�λ</td>
      <td class="tablert">
        <input type="text" name="moneyunit" value="<?php echo isset($vd['sys']['moneyunit']) ? $vd['sys']['moneyunit'] : $vd['lang']['moneyunit']; ?>" /> 
      </td>
    </tr>
    <tr>
      <td class="tablelt">��������ҳ������</td>
      <td class="tablert">
        <textarea rows="10" name="bankalert" cols="60" style="width:308px;"><?php echo isset($vd['sys']['bankalert']) ? $vd['sys']['bankalert'] : '�븶��ɹ��󣬲�Ҫ�ر�ҳ�棬ϵͳ���Զ���ת�ر�ƽ̨���������ɹ���ֵ�������ɸ�����û����ת����鿴������Ƿ��������ƣ��������лָ������Ĭ�����ÿ���'; ?></textarea>
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">�����������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">ǰ̨������</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="cancel" value="1" <?php if($cout > 11){ToggleCheck($temp[11]);} ?> /> Ŀǰ����һ��ͨ�汾��Ч���Ҷ�������Ϊ�ֶ���ֵ
      </td>
    </tr>
    <tr>
      <td class="tablelt">��̨���¶���������ʾ��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="orderalert" value="1" <?php if($cout > 13){ToggleCheck($temp[13]);} ?> /> �򹴱�ʾ��ʾ
      </td>
    </tr>
    <tr>
      <td class="tablelt">��̨�¶��������ʱ��</td>
      <td class="tablert">
        <input type="text" name="orderalerttime" value="<?php if($cout > 14){ echo $temp[14];} ?>"> ��λΪ�� <span class="spantip">ʱ��Խ�̣�Խ��������ƽ̨���ܣ�����30�� - 60��֮��</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt"><strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>�����վ�ռ��ʱ��ͱ�׼ʱ������������ͨ���������У׼ʱ�䣬ʱ����ǰ�������븺��������-5</p>����ʱ��У׼</td>
      <td class="tablert">
        <input type="text" name="ordertimeadjust" value="<?php if(isset($temp[22])){ ?><?php echo $temp[22]; ?><?php }else{ ?>0<?php } ?>"  /> ��λΪ��
      </td>
    </tr>
    <tr>
      <td class="tablelt">��ֹ�ֶ�����Ͷ��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="forpitcomplaint2" value="1" <?php if($cout > 37){ToggleCheck($temp[37]);} ?> /> �򹴱�ʾ��ֹ
      </td>
    </tr>
  </table>
</div>
</div>


<?php if(UB_B2C||UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">��֤���������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">һ��ͨ��¼��֤������</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="b2crandcode" value="1" <?php if($cout > 10){ToggleCheck($temp[10]);} ?> />�򹴱�ʾ��Ҫ�����򹴱�ʾ����Ҫ
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<div class="cwarpper1">
<div class="ctitle">���ŷ�������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">�ж����Ƿ��ͷ���</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="fetion_send" value="1" <?php (ToggleCheck($vd['sys']['fetion_send'])); ?> />�򹴱�ʾ��Ҫ�����򹴱�ʾ����Ҫ
      </td>
    </tr>
    <tr>
      <td class="tablelt">�ֻ�����</td>
      <td class="tablert">
        <input type="text" name="fetion_mobile" value="<?php echo $vd['sys']['fetion_mobile']; ?>"> <span class="spantip"> ��Ҫ��վ�ռ�֧�� openssl ����ʹ���������</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">��������</td>
      <td class="tablert">
        <input type="password" name="fetion_pass" value="<?php echo $vd['sys']['fetion_pass']; ?>">
      </td>
    </tr>
  </table>
</div>
</div>
<?php if(UB_B2B){ ?>
<div class="cwarpper1">
<div class="ctitle">�����̵�¼ϵͳ���������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">��������</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="pop" value="1" <?php if($cout > 0){ToggleCheck($temp[0]);} ?> />��½ϵͳ���̵�������Ա����(����й���Ļ�)
      </td>
    </tr>
    <tr>
      <td class="tablelt">ƽ̨��������</td>
      <td class="tablert">
        <textarea rows="10" name="popcontent" cols="60" style="width:308px;"><?php echo $vd['sys']['popcontent']; ?></textarea>
      </td>
    </tr>
    <tr>
      <td class="tablelt">ת�����Ϣҳ��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="turntopm" value="1" <?php if($cout > 1){ToggleCheck($temp[1]);} ?> />��½ϵͳת��ϵͳ����Ϣҳ��(������µĶ��ŵĻ�)
      </td>
    </tr>
    <tr>
      <td class="tablelt">ǰ̨��ʾ�û��¶���Ϣ</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="msgalert" value="1" <?php if($cout > 18){ToggleCheck($temp[18]);} ?> /> �򹴱�ʾ��ʾ
      </td>
    </tr>
    <tr>
      <td class="tablelt">ǰ̨����Ϣ���ʱ��</td>
      <td class="tablert">
        <input type="text" name="msgalerttime" value="<?php if($cout > 19){ echo $temp[19];} ?>"> ��λΪ�� <span class="spantip">ʱ��Խ�̣�Խ��������ƽ̨���ܣ�����300������</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">�Ƿ���������</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="remainalert" value="1" <?php if($cout > 2){ToggleCheck($temp[2]);} ?> />��½ϵͳʱ�����û�
      </td>
    </tr>
    <tr>
      <td class="tablelt">�������ѵĵ��������</td>
      <td class="tablert">
        <input type="text" name="alertremain" value="<?php echo $vd['sys']['alertremain']; ?>" />
      </td>
    </tr>
    <tr>
      <td class="tablelt">�Ƿ�Ĭ�Ͽ���һ��ͨ��ֵ</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcharge" value="1" <?php if($cout > 4){ToggleCheck($temp[4]);} ?> />���û�ע���ʱ���Ƿ�Ĭ�Ͽ���һ��ͨ��ֵ 
      </td>
    </tr>
    <tr>
      <td class="tablelt">����鿴������Ʒ�ͷ�</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="showagentproductkf" value="1" <?php if($cout > 16){ToggleCheck($temp[16]);} ?> /> ���صĻ������Ա�������ƽ̨��Դ����ʧ 
      </td>
    </tr>
    <tr>
      <td class="tablelt">����ҳ��ʹ��ͼ����ʾ</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="catshowpic" value="1" <?php if($cout > 33){ToggleCheck($temp[33]);} ?> />�����������������ʾ��ʽ
      </td>
    </tr>
    <tr>
      <td class="tablelt">��������ɼ���</td>
      <td class="tablert">
        <input type="text" name="rankgetprofit" value="<?php if($cout > 30){echo $temp[30] ;}else{echo -1;} ?>"  /> �����ƵĻ����� -1 ���� <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p> -1 ����ʾ�����ƣ��������¼���ֻҪ�в�ۣ��Ϳ��Ի�����<br/>0 �����м��𶼲�����ɣ�������û�в��<br/>1:һ�����(���¼�)��ֻ��ֱ���ϼ������<br/>2:�������(�����¼�)�������¼���ϵ��ʱ�����������<br/>3:�������(abcd��)��abcd����ʱ��abc�����<br/>�������ƣ�������д-1���ɣ�������</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">��������ɱ���</td>
      <td class="tablert">
        <input type="text" name="rankprofit" value="<?php if($cout > 31){echo $temp[31] ;}else{echo 100;} ?>"  /> %  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p> ����abΪ���¼���ab���Ϊ1<?php echo $vd['lang']['moneyunit']; ?>����ɱ���Ϊ50%����a������1 x 50% = 0.5<?php echo $vd['lang']['moneyunit']; ?></p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">������Ʒ�������</td>
      <td class="tablert">
      	<a name="guize"></a>
        <input type="radio" class="checkbox" name="ownermoney" value="0" 
        <?php if(!isset($temp[34]) || (isset($temp[34]) && $temp[34] == 0)){ ?>
        checked
        <?php } ?>
/> �ɱ���+����<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong>
<p>���繩�������������Ʒʱ����Ľ�����a���ͻ�(���ϼ�)����ļ۸���b����ϵͳ�����0.02�������չ�������Ϊa + (b - a - b x 0.02)</p>
<input type="radio" class="checkbox" name="ownermoney" value="1" <?php if(isset($temp[34]) && $temp[34] == 1){ ?>checked<?php } ?> /> �ɱ���<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>���繩�������������Ʒʱ����Ľ�����a,�����չ�������Ϊa</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">ǰ̨��ʱ�˳�</td>
      <td class="tablert">
      	<input type="text" name="b2btime" value="<?php if($cout > 38){ echo $temp[38];}else{echo 1200;} ?>"> �� <span class="spantip">�޶���ʱ���Զ��˳�ǰ̨</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">ע���೤ʱ����Թ���</td>
      <td class="tablert">
      	<?php if($cout > 32){ ?>
      	<?php $cba = $temp[32];}else{ ?>
      	<?php $cba = 0;} ?>
      	<select name="canbuyafter">
<option value="0"<?php if($cba == 0){ ?> selected<?php } ?>>���Ͽ��Թ���</option>
<option value="1800"<?php if($cba == 1800){ ?> selected<?php } ?>>30����</option>
<option value="3600"<?php if($cba == 3600){ ?> selected<?php } ?>>1Сʱ</option>
<option value="10800"<?php if($cba == 10800){ ?> selected<?php } ?>>3Сʱ</option>
<option value="21600"<?php if($cba == 21600){ ?> selected<?php } ?>>6Сʱ</option>
<option value="43200"<?php if($cba == 43200){ ?> selected<?php } ?>>12Сʱ</option>
<option value="86400"<?php if($cba == 86400){ ?> selected<?php } ?>>24Сʱ</option>
<option value="172800"<?php if($cba == 172800){ ?> selected<?php } ?>>48Сʱ</option>
<option value="259200"<?php if($cba == 259200){ ?> selected<?php } ?>>3��</option>
<option value="432000"<?php if($cba == 432000){ ?> selected<?php } ?>>5��</option>
<option value="604800"<?php if($cba == 604800){ ?> selected<?php } ?>>7��</option>
        </select>����Թ���
      </td>
    </tr>
    <?php if(UB_YKT||UB_B2B||UB_B2C>1){ ?>
    <tr>
      <td class="tablelt">ע���Ĭ�Ͽ�ͨ</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="autocheckfrozen" value="1" <?php if($cout > 39){ToggleCheck($temp[39]);} ?> /> 
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="tablelt">����ϵͳ��½��ת</td>
      <td class="tablert">
      	<?php $agentloginurl = isset($vd['sys']['loginurl']) ? $vd['sys']['loginurl'] : ''; ?>
      	<select name="agentloginurl">
<option value=""<?php if($agentloginurl == ''){ ?> selected<?php } ?>>ϵͳĬ��(�ж���ת�ڲ����ţ��޶���ת��������ҳ)</option>
<option value="m=mod_b2b&c=Home&a=Home"<?php if($agentloginurl == 'm=mod_b2b&c=Home&a=Home'){ ?> selected<?php } ?> >��������ҳ</option>
<option value="m=mod_b2b&c=Category"<?php if($agentloginurl == 'm=mod_b2b&c=Category'){ ?> selected<?php } ?> >�������û�</option>
<option value="m=mod_b2b&c=Fav"<?php if($agentloginurl == 'm=mod_b2b&c=Fav'){ ?> selected<?php } ?>>��Ʒ�ղؼ�</option>
<option value="m=mod_agent&c=trade&tpl=history"
<?php if($agentloginurl == 'm=mod_agent&c=trade&tpl=history'){ ?>
 selected
<?php } ?>
>�ӿ�ۿ��¼
</option>
<option value="m=mod_agent&c=order"
<?php if($agentloginurl == 'm=mod_agent&c=order'){ ?>
 selected
<?php } ?>
>������¼��ѯ
</option>
<option value="m=mod_agent&c=trade&tpl=profit&tradetype=11"
<?php if($agentloginurl == 'm=mod_agent&c=trade&tpl=profit&tradetype=11'){ ?>
 selected
<?php } ?>
>���������ѯ
</option>
<option value="m=mod_agent&c=Messenger"
<?php if($agentloginurl == 'm=mod_agent&c=Messenger'){ ?>
 selected
<?php } ?>
>ƽ̨�ڲ�����
</option>
<option value="m=mod_b2b&c=Quick"<?php if($agentloginurl == 'm=mod_b2b&c=Quick'){ ?> selected<?php } ?> >��������</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="tablelt">�û��������</td>
      <td class="tablert">
      	<input type="radio" class="checkbox" name="ranktype" value="0" <?php if(!isset($temp[20]) || (isset($temp[20]) && $temp[20] == 0)){ ?>checked<?php } ?> /> �淶��<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>ͬһ�����ľ����̲��ܻ�Ϊ���¼�������һ�������̺Ͷ���������ͬ���ھ�������������ǲ��ܻ�Ϊ���¼�</p>
        <input type="radio" class="checkbox" name="ranktype" value="1" <?php if(isset($temp[20]) && $temp[20] == 1){ ?>checked<?php } ?> /> ��ɢ��<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>ͬһ�����ľ�����Ҳ����Ϊ���¼���������ֻҪ���������������ѽ���㹻�����Ϳ��Խ��ձ���С�ļ���ֱ���̳���(Ҳ����˵ֱ���̲������¼�)</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">�û�ע����ʼ���</td>
      <td class="tablert">
        <input type="text" name="agentstartid" value="<?php if($cout > 36){echo $temp[36] ;}else{echo 0;} ?>"  /> <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>����С�ڵ�ǰ�û�������ţ�������Ч��0��ʾά�ֵ�ǰ״̬����ǰ���ò��ı�Ҳ��ʾά�ֵ�ǰ״̬������С��0</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">����ǰ̨����</td>
      <td class="tablert">
        <input type="hidden" name="oldb2bmenu" value="<?php echo $vd['sys']['b2bmenu']; ?>"/>
        <textarea rows="10" name="b2bmenu" cols="28" style="width:458px;"><?php echo $vd['sys']['b2bmenu']; ?></textarea>
        <br/><span class="spantip">�س�����һ�飬ÿһ����"|"������"|"ǰ���ǲ˵�����α�ʾ�Ƿ��´��ڴ�,0��ʾԭ���ڣ�1��ʾ�´��ڣ����һ��"|"�����ǲ˵���Ӧ������</span>
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>
<?php if(UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">һ��ͨ�������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">ǰ̨��ʾһ��ͨ��ֵ</td>
      <td class="tablert">
        <input type="hidden" name="oldfyktarray" value="<?php echo $vd['sys']['fyktarray']; ?>"/>
        <input type="text" name="fyktarray" value="<?php echo $vd['sys']['fyktarray']; ?>"/> <span class="spantip">�����ֵ�ð�Ƕ��Ÿ��������磺1,5,10,15,30,45,50,100</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">����һ��ͨ�б�</td>
      <td class="tablert">
        <input type="text" name="yktarray" value="<?php echo $vd['sys']['yktarray']; ?>"/> <span class="spantip">�����ֵ�ð�Ƕ��Ÿ��������磺1,5,10,15,30,45,50,100</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">һ��ͨ��Ʒ����ҳ��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="dispkf" value="1" 
        <?php if($cout > 12){ToggleCheck($temp[12]);} ?>
/> ��ʾ�ͷ� <input type="checkbox" class="checkbox" name="dispad" value="1" 
<?php if($cout > 28){ToggleCheck($temp[28]);} ?>
/> ��ʾ��� <input type="checkbox" class="checkbox" name="dispbuyer" value="1" <?php if($cout > 29){ToggleCheck($temp[29]);} ?> /> ��ʾ�ͻ���ϵ��ʽ�����
      </td>
    </tr>
    <tr>
      <td class="tablelt">һ��ͨ����ҳ��ֱ����ʾ�ͷ�</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktorderdispkf" value="1" <?php if($cout > 15){ToggleCheck($temp[15]);} ?> />
      </td>
    </tr>
    <tr style="display:none">
      <td class="tablelt">�Ƿ�����ʹ�ÿͻ��������ɵ�һ��ͨ</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcustomcanuse" value="1" <?php if($cout > 35){ToggleCheck($temp[35]);} ?> /> �򹴱�ʾ����<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>��ͨ��, ����ͨ���༭�û���������Ȩ��, ����������ύ������, �Զ��۳��û������, ����ʹ��</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">�Ƿ�����һ��ͨת��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcantran" value="1" <?php if($cout > 23){ToggleCheck($temp[23]);} ?> /> �򹴱�ʾ����<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>���������ת����������ͨ�� ��̨ -> һ��ͨ -> һ��ͨת��Ȩ������ �����޸�ת���Ȩ��</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">ֻ����ͬ��һ��ͨת��</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktonlysanmeproduct" value="1" <?php if($cout > 24){ToggleCheck($temp[24]);} ?> /> �򹴱�ʾ�������������ִ��<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>���Ƿ�����һ��ͨת����Ҳ��Ҫͬʱ�򹴲Ż���Ч������ת�������ǽ�ֹ�ġ�"ֻ����ͬ��һ��ͨת��"�򹴺�ת��Ȩ�����õĹ���(��̨ -> һ��ͨ -> һ��ͨת��Ȩ������)��ȫ����Ч�����ʱ�����ſ�ͬʱ����һ�����Ʒ����һģһ��������ת��������Aƽ̨������ A1,A2��Ʒ��Bƽ̨������A1��Ʒ�����ʱ��A,Bƽ̨���ǲ�����ת���ģ�ֻ��Bƽ̨��Ҳ����A1,A2��Ʒ�ſ���ת��<br/>Ŀǰ������鰴�����ΰ���Ʒ��ƽ̨</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">��ʾ����һ��ͨ����</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktdailishowkm" value="1" <?php if($cout > 25){ToggleCheck($temp[25]);} ?> /> �򹴱�ʾ����
      </td>
    </tr>
    <a name="autoreward"></a>
    <tr>
      <td class="tablelt">һ��ͨ�Զ�����</td>
      <td class="tablert">
        <input type="checkbox" disabled class="checkbox" name="yktdailiautoreward" value="1" <?php if($cout > 26){ToggleCheck($temp[26]);} ?> /> �򹴱�ʾ����(Ŀǰδ���Ŵ˹���)
      </td>
    </tr>
    
    <tr>
      <td class="tablelt">һ��ͨƽ̨����ʧ�ܼ�¼</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktnoshowfail" value="1" <?php if($cout > 27){ToggleCheck($temp[27]);} ?> /> һ��ͨƽ̨��ѯ��״̬��ʱ������ʧ�ܵļ�¼
      </td>
    </tr>
    
    <tr>
      <td class="tablelt">ǰ̨��������</td>
      <td class="tablert">
        <input type="hidden" name="oldyktnav" value="<?php echo $vd['sys']['yktnav']; ?>"/>
        <textarea rows="10" name="yktnav" cols="28" style="width:458px;"><?php echo $vd['sys']['yktnav']; ?></textarea>
        <br/><span class="spantip">�س�����һ�飬ÿһ����"|"������"|"ǰ������ʾ�����ƣ������Ƕ�Ӧ������</span>
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>
<?php if(UB_B2C){ ?>
<div class="cwarpper1">
<div class="ctitle">����ƽ̨ҳ���������</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">�������</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="reviewchecked" value="1" <?php if($cout > 3){ToggleCheck($temp[3]);} ?>>�û��ύ��Ʒ����ֱ�����ͨ��
      </td>
    </tr>
    <tr>
      <td class="tablelt">����ǰ̨��½����</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="b2cneedlogin" value="1" 
        <?php if($cout > 5){ToggleCheck($temp[5]);} ?>
        > </td>
    </tr>
    <tr>
      <td class="tablelt">ǰ̨������</td>
      <td class="tablert">
        <textarea rows="10" name="b2cmenu" cols="28" style="width:458px;" onblur="setchange('b2cmenuchange')"><?php echo $vd['sys']['b2cmenu']; ?></textarea>
        <br/><span class="spantip">�س�����һ�飬ÿһ����"|"������"|"ǰ���ǲ˵�����α�ʾ�Ƿ��´��ڴ�,0��ʾԭ���ڣ�1��ʾ�´��ڣ����һ��"|"�����ǲ˵���Ӧ������</span>
        <input type="hidden" name="b2cmenuchange" value="0" id="b2cmenuchange">
      </td>
    </tr>
    <tr>
      <td class="tablelt">ǰ̨����</td>
      <td class="tablert">
        <textarea rows="10" name="hotkey" cols="28" style="width:458px;" onblur="setchange('hkchange')"><?php echo $vd['sys']['hotkey']; ?></textarea>
        <br/><span class="spantip">�س�����һ�飬ÿһ����"|"������"|"ǰ�������Ŵʣ����������Ŵʶ�Ӧ�Ĺؼ��ʣ��޷ָ������ʾ������ͬ</span>
        <input type="hidden" name="hkchange" value="0" id="hkchange">
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">����ƽ̨ǰ̨�ͷ���ʽ</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">���һ&nbsp;&nbsp;<input id="radiob2c1" type="radio" class="checkbox"  name="styleb2c" checked value="0" ></td>
      <td width="89" align="right">����״̬��&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif" width="74" height="23"></td>
      <td width="90" align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif" width="74" height="23"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2c2" type="radio" class="checkbox"  name="styleb2c" value="1" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2c3" type="radio" class="checkbox"  name="styleb2c" value="2" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2c4" type="radio" class="checkbox"  name="styleb2c" value="3" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif" width="44" height="24"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif" width="44" height="24"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2c5" type="radio" class="checkbox"  name="styleb2c" value="4" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif" width="61" height="15"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif" width="61" height="15"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2c6" type="radio" class="checkbox"  name="styleb2c" value="5" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/6_online.gif" width="68" height="29"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/6_offline.gif" width="68" height="29"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2c7" type="radio" class="checkbox"  name="styleb2c" value="6" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/7_online.gif" width="71" height="24"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/7_offline.gif" width="71" height="24"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2c8" type="radio" class="checkbox"  name="styleb2c" value="7" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/8_online.gif" width="60" height="16"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/8_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2c9" type="radio" class="checkbox"  name="styleb2c" value="8" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/9_online.gif" width="57" height="16"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/9_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ&nbsp;&nbsp;<input id="radiob2c10" type="radio" class="checkbox"  name="styleb2c" value="9" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif" width="61" height="16"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮһ&nbsp;&nbsp;<input id="radiob2c11" type="radio" class="checkbox"  name="styleb2c" value="10" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif" width="65" height="66"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif" width="65" height="66"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2c12" type="radio" class="checkbox"  name="styleb2c" value="11" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif" width="82" height="34"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif" width="82" height="34"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2c13" type="radio" class="checkbox"  name="styleb2c" value="12" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif" width="138" height="29"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif" width="138" height="29"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2c15" type="radio" class="checkbox"  name="styleb2c" value="14" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif" width="43" height="16"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif" width="43" height="16"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<?php if(UB_B2B){ ?>
<div class="cwarpper1">
<div class="ctitle">����ƽ̨ǰ̨�ͷ���ʽ</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">���һ&nbsp;&nbsp;<input id="radiob2b1" type="radio" class="checkbox"  name="styleb2b" checked value="0" ></td>
      <td width="89" align="right">����״̬��&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif"></td>
      <td width="90" align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2b2" type="radio" class="checkbox"  name="styleb2b" value="1" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2b3" type="radio" class="checkbox"  name="styleb2b" value="2" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2b4" type="radio" class="checkbox"  name="styleb2b" value="3" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2b5" type="radio" class="checkbox"  name="styleb2b" value="4" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2b6" type="radio" class="checkbox"  name="styleb2b" value="5" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radiob2b7" type="radio" class="checkbox"  name="styleb2b" value="6" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2b8" type="radio" class="checkbox"  name="styleb2b" value="7" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radiob2b9" type="radio" class="checkbox"  name="styleb2b" value="8" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ&nbsp;&nbsp;<input id="radiob2b10" type="radio" class="checkbox"  name="styleb2b" value="9" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮһ&nbsp;&nbsp;<input id="radiob2b11" type="radio" class="checkbox"  name="styleb2b" value="10" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2b12" type="radio" class="checkbox"  name="styleb2b" value="11" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2b13" type="radio" class="checkbox"  name="styleb2b" value="12" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radiob2b15" type="radio" class="checkbox"  name="styleb2b" value="14" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif" /></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<?php if(UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">һ��ͨƽ̨ǰ̨�ͷ���ʽ</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">���һ&nbsp;&nbsp;<input id="radioykt1" type="radio" class="checkbox"  name="styleykt" checked value="0" ></td>
      <td width="89" align="right">����״̬��&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif"></td>
      <td width="90" align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radioykt2" type="radio" class="checkbox"  name="styleykt" value="1" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radioykt3" type="radio" class="checkbox"  name="styleykt" value="2" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radioykt4" type="radio" class="checkbox"  name="styleykt" value="3" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radioykt5" type="radio" class="checkbox"  name="styleykt" value="4" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radioykt6" type="radio" class="checkbox"  name="styleykt" value="5" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">�����&nbsp;&nbsp;<input id="radioykt7" type="radio" class="checkbox"  name="styleykt" value="6" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radioykt8" type="radio" class="checkbox"  name="styleykt" value="7" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_offline.gif" /></td>
    </tr>
    <tr>
      <td class="tablelt">����&nbsp;&nbsp;<input id="radioykt9" type="radio" class="checkbox"  name="styleykt" value="8" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ&nbsp;&nbsp;<input id="radioykt10" type="radio" class="checkbox"  name="styleykt" value="9" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮһ&nbsp;&nbsp;<input id="radioykt11" type="radio" class="checkbox"  name="styleykt" value="10" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radioykt12" type="radio" class="checkbox"  name="styleykt" value="11" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radioykt13" type="radio" class="checkbox"  name="styleykt" value="12" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">���ʮ��&nbsp;&nbsp;<input id="radioykt15" type="radio" class="checkbox"  name="styleykt" value="14" ></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif"></td>
      <td align="right">����״̬��&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  
  <div class="optxt">
    <input type="submit" value=" �� �� " class="btn"/>
    <input type="reset" value=" �� �� " class="btn"/>
  </div>
</div>
</form>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="�ص���̨��ҳ"><font color="#000">����</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=sys&a=index" title="ϵͳ��������"><font color="#000">ϵͳ��������</font></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_sys_index" onFocus="this.blur()" title="�鿴ƽ̨������Ϣ��ذ���"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="load" style="display:none;">
  <div id="loadcontent" >ҳ����������Ե�...</div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/javascript">
  function setchange(id)
  {
    $(id).value = 1;
  }
  
  qqb2cstyle = "<?php if($cout > 7){echo $temp[7]+1;}else{echo 3;} ?>";
  qqb2bstyle = "<?php if($cout > 8){echo $temp[8]+1;}else{echo 3;} ?>";
  qqyktstyle = "<?php if($cout > 9){echo $temp[9]+1;}else{echo 3;} ?>";
  <?php if(UB_B2C){ ?>
  $("radiob2c"+qqb2cstyle).checked = true;
  <?php } ?>
  <?php if(UB_B2B){ ?>
  $("radiob2b"+qqb2bstyle).checked = true;
  <?php } ?>
  <?php if(UB_YKT){ ?>
  $("radioykt"+qqyktstyle).checked = true;
  <?php } ?>
</script>
</body>
</html>
