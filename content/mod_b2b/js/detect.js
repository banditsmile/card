    var flag=[0,0,0,0,0,0,0,0,0,0,0];
    var $=function(id){
      return document.getElementById(id);
    }
  //----------����Э��
    function accept_info(){
      flag[10]=1;
      check_data();
    }
  //----------�ܾ�Э��
    function refuse_info(){
      flag[10]=0;
      check_data();
    }
    
  //----------������
    function check_email(email){
      var reEmail=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
      var b_email=reEmail.test(email);
      if(b_email){
        $("spancmail").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> �������";
        flag[5]=1;
        check_data();
      }
      else{
        $("spancmail").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �������";
        flag[5]=0;
        check_data();
      }
    }
  //----------�����ж�
    function getStrActualLen(sChars){  
        return sChars.replace(/[^\x00-\xff]/g,"xx").length;  
      } 

  //***************************************
  //�����������
    function isChinese(str){ 
        var badChar ="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        badChar += "abcdefghijklmnopqrstuvwxyz"; 
        badChar += "0123456789"; 
        badChar += " "+"��";//�����ȫ�ǿո� 
        badChar += "`~!@#$%^&()-_=+]\\\\|:;\\\\\<,>?/";//������*��.��Ӣ�ķ���
        if(""==str){ 
          return false; 
          } 
        for(var i=0;i<str.length;i++){ 
          var c = str.charAt(i);//�ַ���str�е��ַ� 
          if(badChar.indexOf(c) > -1){ 
            return false; 
            } 
        } 
        return true; 
      } 
      
    //----------���֤���
		function check_IdentityNO(IdentityNO){
			if(IdentityNO!="" && isIdCardNo(IdentityNO)){
				$("spanidcard").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> �������֤����!";
				//flag[1]=1;
				check_data();
			}
			else{
				$("spanidcard").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �������֤����!��������Ч�������(18λ)";
				//flag[9]=0;
				check_data();
			}
		}
		
		function isIdCardNo(StrNo)
		{
      StrNo = StrNo.toString()
      if (StrNo.length==18)
      {
        var a,b,c
        if (!isInteger(StrNo.substr(0,17))) {document.form.idcard.focus();return false}
        a=parseInt(StrNo.substr(0,1))*7+parseInt(StrNo.substr(1,1))*9+parseInt(StrNo.substr(2,1))*10;
        a=a+parseInt(StrNo.substr(3,1))*5+parseInt(StrNo.substr(4,1))*8+parseInt(StrNo.substr(5,1))*4;
        a=a+parseInt(StrNo.substr(6,1))*2+parseInt(StrNo.substr(7,1))*1+parseInt(StrNo.substr(8,1))*6; 
        a=a+parseInt(StrNo.substr(9,1))*3+parseInt(StrNo.substr(10,1))*7+parseInt(StrNo.substr(11,1))*9; 
        a=a+parseInt(StrNo.substr(12,1))*10+parseInt(StrNo.substr(13,1))*5+parseInt(StrNo.substr(14,1))*8; 
        a=a+parseInt(StrNo.substr(15,1))*4+parseInt(StrNo.substr(16,1))*2;
        b=a%11;
        
        if (b==2) //���һλΪУ��λ
        {
          c=StrNo.substr(17,1).toUpperCase(); //תΪ��дX
        }
        else
        {
          c=parseInt(StrNo.substr(17,1));
        }

        switch(b)
        {
          case 0: if ( c!=1 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:1
          case 1: if ( c!=0 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:0
          case 2: if ( c!="X"){return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:X
          case 3: if ( c!=9 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:9
          case 4: if ( c!=8 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:8
          case 5: if ( c!=7 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:7
          case 6: if ( c!=6 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:6
          case 7: if ( c!=5 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:5
          case 8: if ( c!=4 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:4
          case 9: if ( c!=3 ) {return false;}break;//���֤�ú���У��λ��:���һλӦ��Ϊ:3
          case 10: if ( c!=2 ){return false}//���֤�ú���У��λ��:���һλӦ��Ϊ:2
        }
        
        if (isValidDate(StrNo.substr(6,4),StrNo.substr(10,2),StrNo.substr(12,2)))
        {
        	return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
      	return false;	
      }
      
      return false
   }

   function isValidDate(iY, iM, iD) { 
       var a=new Date(iY,iM,iD);
       //var y=a.getFullYear();
       //var m=a.getMonth();
       //var d=a.getDate();
       if (iY<1900 || iM>12 || iD>31)
       {
           window.alert ('���֤���������ڴ���');
      document.form.idcard.focus();
           return false;
       }
   return true
   }
   
   function isInteger(str) {
   if (/[^\d]+$/.test(str)){
   document.form.idcard.focus();
   return false;
   }
   return true;
   }
   
   
   function IDUpdate(StrNo){
   
   if (!isChinaIDCard(StrNo)) {return false}
   if (StrNo.length==15)
   {
        var a,b,c
        StrNo=StrNo.substr(0,6)+"19"+StrNo.substr(6,9)
        a=parseInt(StrNo.substr(0,1))*7+parseInt(StrNo.substr(1,1))*9+parseInt(StrNo.substr(2,1))*10;
        a=a+parseInt(StrNo.substr(3,1))*5+parseInt(StrNo.substr(4,1))*8+parseInt(StrNo.substr(5,1))*4;
        a=a+parseInt(StrNo.substr(6,1))*2+parseInt(StrNo.substr(7,1))*1+parseInt(StrNo.substr(8,1))*6; 
        a=a+parseInt(StrNo.substr(9,1))*3+parseInt(StrNo.substr(10,1))*7+parseInt(StrNo.substr(11,1))*9; 
        a=a+parseInt(StrNo.substr(12,1))*10+parseInt(StrNo.substr(13,1))*5+parseInt(StrNo.substr(14,1))*8; 
        a=a+parseInt(StrNo.substr(15,1))*4+parseInt(StrNo.substr(16,1))*2;
        b=a%11;
   
        switch(b)
        {
        case 0: {StrNo=StrNo+"1";}break;
        case 1: {StrNo=StrNo+"0";}break;
        case 2: {StrNo=StrNo+"X";}break;
        case 3: {StrNo=StrNo+"9";}break;
        case 4: {StrNo=StrNo+"8";}break;
        case 5: {StrNo=StrNo+"7";}break;
        case 6: {StrNo=StrNo+"6";}break;
        case 7: {StrNo=StrNo+"5";}break;
        case 8: {StrNo=StrNo+"4";}break;
        case 9: {StrNo=StrNo+"3";}break;
        case 10: {StrNo=StrNo+"3";}
        }
        }
        return StrNo;
   }

		/*
  //���֤�ж�����
    function   isIdCardNo(num){
        var len = num.length, re;   
        if (len == 15) {
          return false;
          re = new RegExp(/^(\d{6})()?(\d{2})(\d{2})(\d{2})(\d{3})$/); 
        }
        else if (len == 18) 
          re = new RegExp(/^(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\d)$/); 
        else {
          return false;} 
        var a = num.match(re); 
        
        var badChar  = " "+"��";//�����ȫ�ǿո� 
				badChar += "`~!@#$%^&()-_=+]\\\\|:;\\\\\<,>?/";//������*��.��Ӣ�ķ���
				
				for(var i=0;i<num.length;i++){ 
					var c = num.charAt(i);//�ַ���str�е��ַ� 
					if(badChar.indexOf(c) > -1){ 
						return false; 
						} 
				} 
        
        var Tidccard=/^[0-9]{17}(\d{1})$/
        var b_qq=Tidccard.test(num);
        
        if(b_qq){
          return true;
        }
        else{
          return false;
        }
        
        if (a != null) 
        { 
          if (len==15) 
          { 
          	return false;
            var D = new Date("19"+a[3]+"/"+a[4]+"/"+a[5]); 
            var B = D.getYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5]; 
          } 
          else 
          { 
            var D = new Date(a[3]+"/"+a[4]+"/"+a[5]); 
            var B = D.getFullYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5]; 
          } 
          if (!B) { return false;} 
        }
        return true; 
      } 
*/
  //----------�������
    function check_UserName(UserName){
      if(UserName!="" && isChinese(UserName) && getStrActualLen(UserName)<9 && getStrActualLen(UserName)>2){
        $("spancrealname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> ������������!";
        flag[3]=1;
        check_data();
      }
      else{
        $("spancrealname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ������������!";
        flag[3]=0;
        check_data();
      }
    }
  //----------�绰���
    function check_Telephone(Telephone){
      var Tel=/(^[\d]{3,4}-[\d]{7,8}$)|(^[\d]{7,8}$)|(^[\d]{10,12}$)|(^0{0,1}1[3|5|8][0-9]{9}$)/ 
      var b_Tel=Tel.test(Telephone)
      if(b_Tel){
        $("spanctel").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> �绰����!";
        flag[7]=1;
        check_data();
      }
      else{
        $("spanctel").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �绰��ʽ����(010-88888888)!";
        flag[7]=0;
        check_data();
      }
    }
  //----------QQ���
    function check_qq(qq){
      var Tqq=/^[0-9]{1,20}$/
      var b_qq=Tqq.test(qq)
      if(b_qq){
        $("spancqq").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> QQ��Ч!";
        flag[4]=1;
        check_data();
      }
      else{
        $("spancqq").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> QQ�������(����ȫ����)!";
        flag[4]=0;
        check_data();
      }
    }
  //----------�ֻ����
    function check_Phone(Phone){
      var Pho=/(^0{0,1}1[3|5|8][0-9]{9}$)/
      var b_Phone=Pho.test(Phone)
      if(b_Phone){
        $("spancmobile").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> �ֻ�����!";
        flag[6]=1;
        check_data();
      }
      else{
        $("spancmobile").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �ֻ��������!";
        flag[6]=0;
        check_data();
      }
    }
  //----------��ͥסַ���
    function check_address(address){
      if(getStrActualLen(address)>16){
        $("spancaddr").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> ��ͥסַ����!";
        flag[8]=1;
        check_data();
      }
      else{
        $("spancaddr").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ��ͥסַ����(����С��16�ֽ�)!";
        flag[8]=0;
        check_data();
      }
    }
  //----------������
    function check_password(obj){
      var pwd=$("cpwd").value;
      if(CheckSimple(pwd, 7) == false)
      {
      	$("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ����Ӧ����6���ַ����Ҳ�Ҫ���ڼ�";
        flag[1]=0;
        check_data();
        return;
      }
      
      if(pwd.length > 17)
      {
      	$("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ���벻�ܳ���50���ַ�";
        flag[1]=0;
        check_data();
        return;
      }
      var reChinese=/[\u0391-\uFFE5]+/;
      var b_chinese=reChinese.test(pwd);
      var reSpace=/\s+/;
      var b_space=reSpace.test(pwd);
      //-------���Ȳ���
      if(pwd.length<6){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ���볤�Ȳ���С��6";
        flag[1]=0;
        check_data();
      }
      //-------�Ϸ��Լ��:���ܰ�������
      else if(b_chinese){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ���벻�ܰ�������";
        flag[1]=0;
        check_data();
      }
      //-------�Ϸ��Լ��:���ܰ����ո�
      else if(b_space){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ���벻�ܰ����ո�";
        flag[1]=0;
        check_data();
      }
      //-------�Ϸ�ʱ��ʾ����ǿ��
      else{
        //�����Ӧ����Ϣ��ʾ
        var num=getResult(pwd);
        var msg=new Array("<img style='vertical-align:middle' src='content/mod_b2b/images/reg_bad.gif'/> ����ǿ�Ȳ�","<img style='vertical-align:middle' src='content/mod_b2b/images/reg_comm.gif'/> ����ǿ��һ��","<img style='vertical-align:middle' src='content/mod_b2b/images/reg_good.gif'/> ����ǿ��ǿ׳");
        $("spancpwd").innerHTML=msg[num];
        if($("recpwd").value!=""){
          check_pw();
          }
        flag[1]=1;
        return flag[2]=1;
        check_data();
        }
      }
      //�����⺯��,����0/1/2�ֱ�����/һ��/ǿ
      function getResult(s){
        var ls =-1;
        if (s.match(/[a-z]/ig)){
          ls++;
        }
        if (s.match(/[0-9]/ig)){
          ls++;
        }
         if (s.match(/(.[^a-z0-9])/ig)){
          ls++;
        }
        return ls;
      }
    //---------����һ���Լ��  
      function check_pw(){
        var pwd=$("cpwd").value.toString();
        var check_pwd=$("recpwd").value.toString();
        //if(flag[2]==1)
        if(pwd != "")
        {
          if(pwd==check_pwd){
            $("spanrecpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> �������ʹ��";
            flag[2]=1;
            check_data();
          }
          else{
            $("spanrecpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �������벻��ͬ";
            flag[2]=0;
            check_data();
          }
        }
      }
      
      function CheckSimple(str, num)
      {
      	var len = str.length;
      	if(str == "" || len < num)
      	{
      		return false;
      	}
      	
      	var c0 = str.charAt(0);
      	var t = 1;
      	
      	for(var i=1; i<len; i++)
      	{ 
					var c = str.charAt(i);//�ַ���str�е��ַ�
					if(c0 == c)
					{
						t++;
					}
				}
				
				if(t == len)
				{
					return false;
				}
				
				return true;
      }
      
    //---------�û����Ϸ��Լ��
      function check_id(id_name){//ֻ����ĸ������,�Ƿ���ͬ��AJAX�ж�
      	if(CheckSimple(id_name, 5) == false)
      	{
      		$("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �û���Ӧ����4���ַ����Ҳ�Ҫ���ڼ�";
          flag[0]=0;
          check_data();
          return;
      	}
      	
      	if(id_name.length > 17)
      	{
      		$("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> �û������ܳ���20���ַ�";
          flag[0]=0;
          check_data();
          return;
      	}
      	
      	//����û�
        var reId=/^[\w\u0391-\uFFE5]+$/;
        var b_id=reId.test(id_name);
        if(!b_id){
          $("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ID�����Ƿ�";
          flag[0]=0;
          check_data();
        }
        else{//�Ϸ��û�����ajax��checkid()����Ƿ�ע���
          checkid(id_name);
        }
      }
      
      //---------�û����Ϸ��Լ��
      function check_parent(id_name){//ֻ����ĸ������,�Ƿ���ͬ��AJAX�ж�
      	if(id_name == "")
      	{
      		$("spanparentid").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> ����ֱ��ϵͳ";
      		return;
      	}
      	
        var reId=/^[\w\u0391-\uFFE5]+$/;
        var b_id=reId.test(id_name);
        if(!b_id){
          $("spanparentid").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ID�����Ƿ�";
          flag[18]=0;
          check_data();
        }
        else{//�Ϸ��û�����ajax��checkid()����Ƿ�ע���
          checkparent(id_name);
        }
      }
      
    //---------�������,ʹ�ύ��ť�Ƿ���Ч
      function check_data(){
        if(flag[10]==1 && flag[0]==1 && flag[1]==1 && flag[2]==1 &&flag[9]==1){
          $("reg_submit").disabled=false;
        }
        else{
          $("reg_submit").disabled=true;
        }
      }
      
  //--------------------------------------------------------------------
  
  function setcity() { 
    switch (document.getElementById('prv').value) { 
        case "" : 
            var cityOptions = new Array("", ""); 
            break; 
        case "����" : 
            var cityOptions = new Array( 
            "�Ϸ�(*)", "�Ϸ�", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��ɽ", "��ɽ", 
            "�Ż�ɽ", "�Ż�ɽ", 
           "����", "����", 
            "��ɽ", "��ɽ", 
            "����", "����", 
            "ͭ��", "ͭ��", 
            "��Ϫ", "��Ϫ", 
            "�ߺ�", "�ߺ�", 
            "����", "����"); 
             break; 
        case "����" : 
            var cityOptions = new Array(  
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "����", "����", 
            "��ƽ", "��ƽ", 
            "����", "����", 
            "����", "����", 
            "Ȫ��", "Ȫ��", 
            "����", "����", 
            "����", "����", 
            "ʯʨ", "ʯʨ", 
            "����", "����", 
            "����ɽ", "����ɽ", 
            "����", "����", 
            "����", "����"); 
             break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "����", "����", 
            "�ػ�", "�ػ�", 
            "����", "����", 
            "���", "���", 
            "��Ȫ", "��Ȫ", 
            "����", "����", 
            "ƽ��", "ƽ��", 
            "��ˮ", "��ˮ", 
            "�䶼", "�䶼",  
            "����", "����",  
            "��Ҵ", "��Ҵ"); 
            break; 
        case "�㶫" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "����", "����", 
            "�κ�", "�κ�", 
            "��ݸ", "��ݸ", 
            "��ɽ", "��ɽ", 
            "��Դ", "��Դ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��ƽ", "��ƽ", 
            "ï��", "ï��", 
            "÷��", "÷��", 
            "��Զ", "��Զ", 
            "��ͷ", "��ͷ", 
            "��β", "��β", 
            "�ع�", "�ع�", 
            "����", "����", 
            "˳��", "˳��", 
            "����", "����", 
            "����", "����", 
            "Ӣ��", "Ӣ��", 
            "�Ƹ�", "�Ƹ�", 
            "����", "����", 
            "տ��", "տ��", 
            "����", "����",  
            "��ɽ", "��ɽ",  
            "�麣", "�麣"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "��ɫ", "��ɫ", 
            "����", "����", 
            "����", "����", 
            "���Ǹ�", "���Ǹ�", 
            "�ӳ�", "�ӳ�", 
            "����", "����", 
            "����", "����",  
            "����", "����",  
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "��˳", "��˳", 
            "�Ͻ�", "�Ͻ�", 
            "����", "����", 
            "����", "����", 
            "����ˮ", "����ˮ", 
            "ͭ��", "ͭ��", 
            "����", "����",  
            "����", "����",  
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "��ˮ", "��ˮ", 
            "��", "��", 
            "����", "����",  
            "ͨʲ", "ͨʲ",  
            "����", "����"); 
            break; 
        case "�ӱ�" : 
            var cityOptions = new Array(  
            "ʯ��ׯ(*)", "ʯ��ׯ", 
            "����", "����", 
            "������", "������", 
            "����", "����", 
            "�е�", "�е�", 
            "����", "����", 
            "����", "����", 
            "��ˮ", "��ˮ", 
            "�ȷ�", "�ȷ�", 
            "�ϴ���", "�ϴ���", 
            "�ػʵ�", "�ػʵ�", 
            "��ɽ", "��ɽ", 
            "�³�", "�³�", 
            "��̨", "��̨",  
            "�żҿ�", "�żҿ�"); 
            break; 
        case "������" : 
            var cityOptions = new Array(  
            "������(*)", "������", 
            "����", "����", 
            "����", "����", 
            "���˰���", "���˰���", 
            "�׸�", "�׸�", 
            "�ں�", "�ں�", 
            "��ľ˹", "��ľ˹", 
            "����", "����", 
            "ĵ����", "ĵ����", 
            "�������", "�������", 
            "��̨��", "��̨��", 
            "˫Ѽɽ", "˫Ѽɽ", 
            "�绯", "�绯", 
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "֣��(*)", "֣��", 
            "����", "����", 
            "�ױ�", "�ױ�", 
            "�괨", "�괨", 
            "����", "����", 
            "����", "����", 
            "���", "���", 
            "����", "����", 
            "����", "����", 
            "ƽ��ɽ", "ƽ��ɽ", 
            "���", "���", 
            "����Ͽ", "����Ͽ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "���", "���", 
            "�ܿ�", "�ܿ�",  
            "פ���", "פ���"); 
            break; 
        case "���" : 
            var cityOptions = new Array(  
            "���", "���",  
            "����", "����"); 
            break; 
        case "����" :  
            var cityOptions = new Array(  
            "�人(*)", "�人", 
            "��ʩ", "��ʩ", 
            "����", "����", 
            "�Ƹ�", "�Ƹ�", 
            "��ʯ", "��ʯ", 
            "����", "����", 
            "����", "����", 
            "Ǳ��", "Ǳ��", 
            "ʮ��", "ʮ��", 
            "����", "����", 
            "��Ѩ", "��Ѩ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "�差", "�差", 
            "Т��", "Т��", 
            "�˲�", "�˲�"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "��ɳ(*)", "��ɳ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "¦��", "¦��", 
            "����", "����", 
            "��̶", "��̶", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "�żҽ�", "�żҽ�", 
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "�Ͼ�(*)", "�Ͼ�", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��ɽ", "��ɽ", 
            "���Ƹ�", "���Ƹ�", 
            "��ͨ", "��ͨ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "̫��", "̫��", 
            "̩��", "̩��", 
            "ͬ��", "ͬ��", 
            "����", "����", 
            "����", "����", 
            "�γ�", "�γ�", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "�żҸ�", "�żҸ�",  
            "��", "��",  
            "��ׯ", "��ׯ"); 
            break; 
        case "����" : 
            var cityOptions = new Array( 
            "�ϲ�(*)", "�ϲ�", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "������", "������", 
            "����ɽ", "����ɽ", 
            "�Ž�", "�Ž�", 
            "®ɽ", "®ɽ", 
            "Ƽ��", "Ƽ��", 
            "����", "����", 
            "����", "����",  
            "�˴�", "�˴�",  
            "ӥ̶", "ӥ̶"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "�׳�", "�׳�", 
            "��ɽ", "��ɽ", 
            "����", "����", 
            "��Դ", "��Դ", 
            "÷��", "÷��", 
            "����", "����", 
            "��ƽ", "��ƽ", 
            "��ԭ", "��ԭ", 
            "ͨ��", "ͨ��", 
            "�Ӽ�", "�Ӽ�"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "��ɽ", "��ɽ", 
            "��Ϫ", "��Ϫ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��˳", "��˳", 
            "����", "����", 
            "��«��", "��«��", 
            "����", "����", 
            "����", "����", 
            "�̽�", "�̽�", 
            "����", "����", 
            "Ӫ��", "Ӫ��"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����", "����"); 
            break; 
        case "���ɹ�" : 
            var cityOptions = new Array(  
            "���ͺ���(*)", "���ͺ���", 
            "��������", "��������", 
            "��ͷ", "��ͷ", 
            "���", "���", 
            "��ʤ", "��ʤ", 
            "������", "������", 
            "����", "����", 
            "�ٺ�", "�ٺ�", 
            "ͨ��", "ͨ��", 
            "�ں�", "�ں�", 
            "��������", "��������",  
            "���ֺ���", "���ֺ���"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "��Դ", "��Դ",  
           "ʯ��ɽ", "ʯ��ɽ",  
            "����", "����"); 
            break; 
        case "�ຣ" : 
            var cityOptions = new Array( 
            "����(*)", "����", 
            "�����", "�����", 
            "���ľ", "���ľ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "ͬ��", "ͬ��",  
            "����", "����"); 
            break; 
        case "ɽ��" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��Ӫ", "��Ӫ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "�ĳ�", "�ĳ�", 
            "����", "����", 
            "����", "����", 
            "�ൺ", "�ൺ", 
            "����", "����", 
            "����", "����", 
            "̩��", "̩��", 
            "Ϋ��", "Ϋ��", 
            "����", "����", 
            "��̨", "��̨", 
            "��ׯ", "��ׯ", 
            "�Ͳ�", "�Ͳ�"); 
            break; 
        case "�Ϻ�" : 
            var cityOptions = new Array(  
            "�Ϻ�", "�Ϻ�",  
            "����", "����",  
            "��ҽ�", "��ҽ�"); 
            break; 
        case "ɽ��" : 
            var cityOptions = new Array(  
            "̫ԭ(*)", "̫ԭ", 
            "����", "����", 
            "��ͬ", "��ͬ", 
            "����", "����", 
            "����", "����", 
            "��ʯ", "��ʯ", 
            "�ٷ�", "�ٷ�", 
            "����", "����", 
            "˷��", "˷��", 
            "����", "����", 
            "��Ȫ", "��Ȫ",  
            "�ܴ�", "�ܴ�",  
            "�˳�", "�˳�"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "μ��", "μ��", 
            "����", "����", 
            "���", "���", 
            "ͭ��", "ͭ��", 
            "����", "����", 
            "�Ӱ�", "�Ӱ�", 
            "����", "����"); 
            break; 
        case "�Ĵ�" : 
            var cityOptions = new Array(  
            "�ɶ�(*)", "�ɶ�", 
            "����", "����", 
           "�ﰲ", "�ﰲ", 
            "����", "����", 
            "������", "������", 
            "��üɽ", "��üɽ", 
            "����", "����", 
            "�㰲", "�㰲", 
            "��Ԫ", "��Ԫ", 
            "��կ��", "��կ��", 
            "����", "����", 
            "��ɽ", "��ɽ", 
            "����", "����", 
            "�����", "�����", 
            "����", "����", 
            "�ϳ�", "�ϳ�", 
            "�ڽ�", "�ڽ�", 
            "��֦��", "��֦��", 
            "����", "����", 
            "�봨", "�봨", 
            "����", "����", 
            "�Ű�", "�Ű�", 
            "�˱�", "�˱�",  
            "�Թ�", "�Թ�"); 
            break; 
        case "̨��" : 
            var cityOptions = new Array(  
            "̨��(*)", "̨��", 
            "��¡", "��¡",  
            "̨��", "̨��",  
            "̨��", "̨��"); 
            break; 
        case "���" : 
            var cityOptions = new Array(  
            "���", "���"); 
            break; 
        case "�½�" : 
            var cityOptions = new Array(  
            "��³ľ��(*)", "��³ľ��", 
            "������", "������", 
            "����̩", "����̩", 
            "��ͼʲ", "��ͼʲ", 
            "����", "����", 
            "����", "����", 
            "��ɽ", "��ɽ", 
            "����", "����", 
            "����", "����", 
            "��ʲ", "��ʲ", 
            "��������", "��������", 
            "�⳵", "�⳵", 
            "�����", "�����", 
            "����", "����", 
            "ʯ����", "ʯ����", 
            "����", "����", 
            "��³��", "��³��",  
            "����", "����"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "����", "����", 
            "��֥", "��֥", 
            "����", "����",  
            "�տ���", "�տ���",  
            "ɽ��", "ɽ��"); 
            break; 
        case "����" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "��ɽ", "��ɽ", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��Զ", "��Զ", 
            "�ٲ�", "�ٲ�", 
            "����", "����", 
            "����", "����", 
            "º��", "º��", 
            "����", "����", 
            "˼é", "˼é", 
            "��ɽ", "��ɽ", 
            "��˫����", "��˫����", 
            "��Ϫ", "��Ϫ",  
            "�е�", "�е�",  
            "��ͨ", "��ͨ"); 
            break; 
        case "�㽭" : 
            var cityOptions = new Array(  
            "����(*)", "����", 
            "����", "����", 
            "��Ϫ", "��Ϫ", 
            "����", "����", 
            "�", "�", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "����", "����", 
            "��", "��", 
            "�ٰ�", "�ٰ�", 
            "�ٺ�", "�ٺ�", 
            "��ˮ", "��ˮ", 
            "����", "����", 
            "걺�", "걺�", 
            "ƽ��", "ƽ��", 
            "ǧ����", "ǧ����", 
            "����", "����", 
            "��", "��", 
            "����", "����", 
            "����", "����", 
            "̨��", "̨��", 
            "����", "����", 
            "����", "����"); 
            break;      
    } 
    document.getElementById('city').options.length = 0; 
    for(var i = 0; i < cityOptions.length/2; i++) { 
        document.getElementById('city').options[i]=new Option(cityOptions[i*2],cityOptions[i*2+1]); 
        if (document.getElementById('city').options[i].value=="") document.getElementById('city').selectedIndex = i; 
    } 
    
    if(getStrActualLen(document.getElementById('city').options[0].value)>2){
				$("spancityprv").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> ��ַ����!";
				flag[12]=1;
				check_data();
			}
			else{
				$("spancityprv").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ��ַ����(��ѡ�������ڵ�ʡ�ݺ�����)!";
				flag[12]=0;
				check_data();
			}
} 
function initprovcity() { 
    for(var i = 0; i < document.getElementById('prv').options.length; i++) { 
        if (document.getElementById('prv').options[i].value=="") document.getElementById('prv').selectedIndex = i; 
    } 
    setcity(); 
} 
onload=initprovcity; 
