<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>�����¼��ͻ�</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
<script src="/content/mod_b2b/js/city.js" type="text/javascript"></script>
    <div class="new_qie">
        <div class="new_qie2">
            <h2>
                <a href="index.php?m=mod_agent&c=Underling" class="goback">�����¼��ͻ��б�</a> <em>-</em> �����¼��ͻ�</h2>
        </div>
    </div>
	<FORM name="register" method="post" action="index.php?m=mod_agent&c=Underling&a=RegSave">
<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��½�˻���</span> </td>
		<td width="78%" align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='20' name='ubzcname' class='input0' datatype="Username" msg="��¼�û���������Ҫ��">  
		  <font color=#cccccc>
		  <label>
		  <input type="button" name="Submit3" class="input_jc" value="����˺�">
		  </label>
		  6-20λ֮������ֻ�Ӣ����ĸ</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��½/��������</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='password' size='30' maxlength='30' name='ubzcpwd' class='input0' datatype="NewPass" msg="��¼/�������벻����Ҫ��"> 
		  <font color=#cccccc>�������Ϊ6-30λ֮������ֻ���ĸ</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">�ظ�����</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='password' size='30' maxlength='30' name='reubzcpwd' class='input0' datatype="Repeat" to="CustomerLoginPassword" msg="������������벻һ��" /> 
		  <font color=#cccccc>�ظ������¼/��������</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">�̻�����</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='50' name='ubzcompany' class='input0' datatype="LimitB" min="4" max="50" msg="��˾���Ʊ�����д����25����������"> 
		  <font color=#cccccc>50����������</font></div></td>
		</tr>
		
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��������</span> </td>
		<td align="left" class="tableright1">
		  <div align="left">
		    <select name="ubzprv" class='tdleft' id="prv" OnChange="setcity();" style="border:1px groove #C0C0C0; width:80px; font-family:����; font-size:9pt; text-decoration:none; color:#000000; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1">
		      <option value="">����ʡ</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="�㶫">�㶫</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="�ӱ�">�ӱ�</option>
		      <option value="������">������</option>
		      <option value="����">����</option>
		      <option value="���">���</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="���ɹ�">���ɹ�</option>
		      <option value="����">����</option>
		      <option value="�ຣ">�ຣ</option>
		      <option value="ɽ��">ɽ��</option>
		      <option value="�Ϻ�">�Ϻ�</option>
		      <option value="ɽ��">ɽ��</option>
		      <option value="����">����</option>
		      <option value="�Ĵ�">�Ĵ�</option>
		      <option value="̨��">̨��</option>
		      <option value="���">���</option>
		      <option value="�½�">�½�</option>
		      <option value="����">����</option>
		      <option value="����">����</option>
		      <option value="�㽭">�㽭</option>
	        </select>
		  </div></td>
		</tr>
		
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��ϵ������</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='20' name='ubzcrealname' class='input0' datatype="Chinese" msg="��ʵ����ֻ������д����"> 
		  <font color=#cccccc>2-4�����ĺ���</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">����֤����</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='18' name='ubzidcard' class='input0' datatype="IdCard" msg="����֤���벻��ȷ"> 
		  <font color=#cccccc>15��18λ����</font></div></td>
		</tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">�ֻ�����</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='20' name='ubzcmobile' class='input0' datatype="Mobile" msg="�ֻ����벻��ȷ"> 
		  <font color=#cccccc>11λ��13��15��18��ͷ���ֻ�����</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��ϵ�绰</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='20' name='ubzctel' class='input0' datatype="Phone" msg="��ϵ�绰������Ҫ��"> 
		  <font color=#cccccc>�����ʽΪ��021-88888888</font></div></td>
		</tr>
		
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��ϵQQ</span> </td>
		<td width="78%" align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='20' name='ubzcqq' class='input0' datatype="QQ" msg="QQ���벻����Ҫ��"> 
		  <font color=#cccccc>5-12λ���ֺ���</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��������</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='30' maxlength='50' name='ubzcmail' class='input0' require="false" datatype="Email" msg="���������ʽ����"> 
		  <font color=#cccccc>��@����ĵ����ʼ���ַ</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"><span id="lab1">��ϵ��ַ</span> </td>
		<td align="left" class="tableright1"><div align="left">
		  <input type='text' size='50' maxlength='100' name='ubzcaddr' class='input0' require="false" datatype="LimitB" min="1" max="100" msg="��ϵ��ַ������50������֮��"> 
		  <font color=#cccccc>50����������</font></div></td>
		</tr>
		<tr>
		  <td class="table1_left" style="width: 25%"></td>
		  <td align="left" class="tableright1"><div align="left">
		    <input type="submit" name="Submit" value="ȷ��ע��" class="tijiao_input">
		    <input type="reset" name="reset" value="������д" class="fanhui_input">
	           </div></td>
		  </tr>
		</table>
	</tr>