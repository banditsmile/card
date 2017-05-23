<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>�˻���ת��</title>
     <link href="/index/css/common.css" type="text/css" rel="stylesheet" />
     <link href="/index/css/page.css" type="text/css" rel="stylesheet" />
     <style type="text/css">
 .STYLE222 {color: #FF0000}
     </style>
 <body class="mainbg">
 <div class="new_qie">
   <div class="new_qie2">
     <h2> �˻���ת��</h2>
   </div>
   <ul>
     <li><a href="" class="on">�˻���ת��</a></li>
     <li><a href="index.php?m=mod_agent&c=trade&tpl=history&tradetype=31,32">�˻��ʽ���ϸ</a></li>
   </ul>
 </div>
  	<script type="text/javascript">
 	var $ = function(id){
 		return document.getElementById(id);
 	}
 	function setval(obj){
 		if(obj.value == 1)
 		{
 			$("underling").style.display = "";
 		}
 	  else
 		{
 			$("underling").style.display = "none";
 		}
 	}
 </script>
 <form name="finance" method="post" action="index.php?m=mod_agent&c=funds&a=TranSave">
 <table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
   <tr>
     <td class="table1_left"> �� </td>
     <td class="tdleft"><span id="lblBalance" class="red">0 Ԫ</span></td>
 
   </tr>
 
   <tr>
 
     <td class="table1_left"> �û���ţ� </td>
 
     <td class="tdleft"> 
 <a title="ע�⣺���������Լ��ı�ţ������������ȷ�Ĵ����ţ����������󣬾����ƽ̨�в���������û��ʽ�Ҳ�ᱻת�ߣ�����������"><input name="underlingid" type="text" class="input0" id="underlingid" style="font-weight:normal" size="24"/>
 
 <span style="display:none"><input name="fundsto" type="radio" onclick="setval(this)" value="1" checked="checked"/></td>
               <span id="RequiredFieldValidator1" style="color:Red;display:none;">����</span><span id="RegularExpressionValidator1" style="color:Red;display:none;">�ͻ���Ų��Ϸ�</span> </tr>
   <tr>
     <td class="table1_left"> ת��� </td>
     <td class="tdleft"><input name="dollars" type="text" id="dollars" class="input0" onfocus="this.className='input01'" onblur="this.className='input0'" />
       &nbsp;Ԫ <span id="RequiredFieldValidator9" style="color:Red;display:none;">����</span><span id="RegularExpressionValidator5" style="color:Red;display:none;">���Ϸ�</span> </td>
   </tr>
   <tr>
     <td class="table1_left">�������룺</td>
 
     <td class="tdleft"><span class="tableright1">
 
       <input type="password" class="input0" style="font-weight:normal" name="superpwd" size="24"/>
 
     </span></td>
 
   </tr>
 
   <tr>
 
     <td class="table1_left"> ת�ע�� </td>
 
     <td class="tdleft"><textarea name="reason" rows="2" cols="20" id="reason" class="input0" onfocus="this.className='input01'" onblur="this.className='input0'" style="width: 240px;
 
                         height: 50px"></textarea>
 
         <span id="txtConclusionValidator1" style="color:Red;display:none;">����255��</span> </td>
 
   </tr>
 
   <tr>
 
     <td class="table1_left">&nbsp;</td>
 
     <td class="tdleft"><input type="submit" name="btnSubmit" value="ȷ���ύ" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnSubmit&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="btnSubmit" class="tijiao_input" />
 
         <input name="button" type="button" class="fanhui_input" id="Button1" onclick="history.go(-1);" value="����" />    </td>
 
   </tr>
 
 </table>
 
 </body>
 
 </html>


