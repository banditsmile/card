    var flag=[0,0,0,0,0,0,0,0,0,0,0];
    var $=function(id){
      return document.getElementById(id);
    }
  //----------接受协议
    function accept_info(){
      flag[10]=1;
      check_data();
    }
  //----------拒绝协议
    function refuse_info(){
      flag[10]=0;
      check_data();
    }
    
  //----------邮箱检测
    function check_email(email){
      var reEmail=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
      var b_email=reEmail.test(email);
      if(b_email){
        $("spancmail").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 邮箱可用";
        flag[5]=1;
        check_data();
      }
      else{
        $("spancmail").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 邮箱错误";
        flag[5]=0;
        check_data();
      }
    }
  //----------长度判断
    function getStrActualLen(sChars){  
        return sChars.replace(/[^\x00-\xff]/g,"xx").length;  
      } 

  //***************************************
  //检查中文输入
    function isChinese(str){ 
        var badChar ="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        badChar += "abcdefghijklmnopqrstuvwxyz"; 
        badChar += "0123456789"; 
        badChar += " "+"　";//半角与全角空格 
        badChar += "`~!@#$%^&()-_=+]\\\\|:;\\\\\<,>?/";//不包含*或.的英文符号
        if(""==str){ 
          return false; 
          } 
        for(var i=0;i<str.length;i++){ 
          var c = str.charAt(i);//字符串str中的字符 
          if(badChar.indexOf(c) > -1){ 
            return false; 
            } 
        } 
        return true; 
      } 
      
    //----------身份证检测
		function check_IdentityNO(IdentityNO){
			if(IdentityNO!="" && isIdCardNo(IdentityNO)){
				$("spanidcard").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 您的身份证正常!";
				//flag[1]=1;
				check_data();
			}
			else{
				$("spanidcard").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 您的身份证错误!请填入有效的身份征(18位)";
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
        
        if (b==2) //最后一位为校验位
        {
          c=StrNo.substr(17,1).toUpperCase(); //转为大写X
        }
        else
        {
          c=parseInt(StrNo.substr(17,1));
        }

        switch(b)
        {
          case 0: if ( c!=1 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:1
          case 1: if ( c!=0 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:0
          case 2: if ( c!="X"){return false;}break;//身份证好号码校验位错:最后一位应该为:X
          case 3: if ( c!=9 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:9
          case 4: if ( c!=8 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:8
          case 5: if ( c!=7 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:7
          case 6: if ( c!=6 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:6
          case 7: if ( c!=5 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:5
          case 8: if ( c!=4 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:4
          case 9: if ( c!=3 ) {return false;}break;//身份证好号码校验位错:最后一位应该为:3
          case 10: if ( c!=2 ){return false}//身份证好号码校验位错:最后一位应该为:2
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
           window.alert ('身份证号码内日期错误！');
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
  //身份证判断输入
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
        
        var badChar  = " "+"　";//半角与全角空格 
				badChar += "`~!@#$%^&()-_=+]\\\\|:;\\\\\<,>?/";//不包含*或.的英文符号
				
				for(var i=0;i<num.length;i++){ 
					var c = num.charAt(i);//字符串str中的字符 
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
  //----------姓名检测
    function check_UserName(UserName){
      if(UserName!="" && isChinese(UserName) && getStrActualLen(UserName)<9 && getStrActualLen(UserName)>2){
        $("spancrealname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 您的姓名正常!";
        flag[3]=1;
        check_data();
      }
      else{
        $("spancrealname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 您的姓名错误!";
        flag[3]=0;
        check_data();
      }
    }
  //----------电话检测
    function check_Telephone(Telephone){
      var Tel=/(^[\d]{3,4}-[\d]{7,8}$)|(^[\d]{7,8}$)|(^[\d]{10,12}$)|(^0{0,1}1[3|5|8][0-9]{9}$)/ 
      var b_Tel=Tel.test(Telephone)
      if(b_Tel){
        $("spanctel").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 电话正常!";
        flag[7]=1;
        check_data();
      }
      else{
        $("spanctel").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 电话格式错误(010-88888888)!";
        flag[7]=0;
        check_data();
      }
    }
  //----------QQ检测
    function check_qq(qq){
      var Tqq=/^[0-9]{1,20}$/
      var b_qq=Tqq.test(qq)
      if(b_qq){
        $("spancqq").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> QQ有效!";
        flag[4]=1;
        check_data();
      }
      else{
        $("spancqq").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> QQ输入错误(必须全数字)!";
        flag[4]=0;
        check_data();
      }
    }
  //----------手机检测
    function check_Phone(Phone){
      var Pho=/(^0{0,1}1[3|5|8][0-9]{9}$)/
      var b_Phone=Pho.test(Phone)
      if(b_Phone){
        $("spancmobile").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 手机正常!";
        flag[6]=1;
        check_data();
      }
      else{
        $("spancmobile").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 手机号码错误!";
        flag[6]=0;
        check_data();
      }
    }
  //----------家庭住址检测
    function check_address(address){
      if(getStrActualLen(address)>16){
        $("spancaddr").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 家庭住址正常!";
        flag[8]=1;
        check_data();
      }
      else{
        $("spancaddr").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 家庭住址错误(不可小于16字节)!";
        flag[8]=0;
        check_data();
      }
    }
  //----------密码检测
    function check_password(obj){
      var pwd=$("cpwd").value;
      if(CheckSimple(pwd, 7) == false)
      {
      	$("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 密码应大于6个字符而且不要过于简单";
        flag[1]=0;
        check_data();
        return;
      }
      
      if(pwd.length > 17)
      {
      	$("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 密码不能长于50个字符";
        flag[1]=0;
        check_data();
        return;
      }
      var reChinese=/[\u0391-\uFFE5]+/;
      var b_chinese=reChinese.test(pwd);
      var reSpace=/\s+/;
      var b_space=reSpace.test(pwd);
      //-------长度测试
      if(pwd.length<6){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 密码长度不能小于6";
        flag[1]=0;
        check_data();
      }
      //-------合法性检测:不能包含汉字
      else if(b_chinese){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 密码不能包含中文";
        flag[1]=0;
        check_data();
      }
      //-------合法性检测:不能包含空格
      else if(b_space){
        $("spancpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 密码不能包含空格";
        flag[1]=0;
        check_data();
      }
      //-------合法时显示密码强度
      else{
        //定义对应的消息提示
        var num=getResult(pwd);
        var msg=new Array("<img style='vertical-align:middle' src='content/mod_b2b/images/reg_bad.gif'/> 密码强度差","<img style='vertical-align:middle' src='content/mod_b2b/images/reg_comm.gif'/> 密码强度一般","<img style='vertical-align:middle' src='content/mod_b2b/images/reg_good.gif'/> 密码强度强壮");
        $("spancpwd").innerHTML=msg[num];
        if($("recpwd").value!=""){
          check_pw();
          }
        flag[1]=1;
        return flag[2]=1;
        check_data();
        }
      }
      //定义检测函数,返回0/1/2分别代表差/一般/强
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
    //---------密码一致性检测  
      function check_pw(){
        var pwd=$("cpwd").value.toString();
        var check_pwd=$("recpwd").value.toString();
        //if(flag[2]==1)
        if(pwd != "")
        {
          if(pwd==check_pwd){
            $("spanrecpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 密码可以使用";
            flag[2]=1;
            check_data();
          }
          else{
            $("spanrecpwd").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 两次密码不相同";
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
					var c = str.charAt(i);//字符串str中的字符
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
      
    //---------用户名合法性检测
      function check_id(id_name){//只能字母和数字,是否相同用AJAX判断
      	if(CheckSimple(id_name, 5) == false)
      	{
      		$("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 用户名应大于4个字符而且不要过于简单";
          flag[0]=0;
          check_data();
          return;
      	}
      	
      	if(id_name.length > 17)
      	{
      		$("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 用户名不能长于20个字符";
          flag[0]=0;
          check_data();
          return;
      	}
      	
      	//检查用户
        var reId=/^[\w\u0391-\uFFE5]+$/;
        var b_id=reId.test(id_name);
        if(!b_id){
          $("spancname").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ID命名非法";
          flag[0]=0;
          check_data();
        }
        else{//合法用户名用ajax的checkid()检测是否被注册过
          checkid(id_name);
        }
      }
      
      //---------用户名合法性检测
      function check_parent(id_name){//只能字母和数字,是否相同用AJAX判断
      	if(id_name == "")
      	{
      		$("spanparentid").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 您将直属系统";
      		return;
      	}
      	
        var reId=/^[\w\u0391-\uFFE5]+$/;
        var b_id=reId.test(id_name);
        if(!b_id){
          $("spanparentid").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> ID命名非法";
          flag[18]=0;
          check_data();
        }
        else{//合法用户名用ajax的checkid()检测是否被注册过
          checkparent(id_name);
        }
      }
      
    //---------检查数据,使提交按钮是否生效
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
        case "安徽" : 
            var cityOptions = new Array( 
            "合肥(*)", "合肥", 
            "安庆", "安庆", 
            "蚌埠", "蚌埠", 
            "亳州", "亳州", 
            "巢湖", "巢湖", 
            "滁州", "滁州", 
            "阜阳", "阜阳", 
            "池州", "池州", 
            "淮北", "淮北", 
            "淮化", "淮化", 
            "淮南", "淮南", 
            "黄山", "黄山", 
            "九华山", "九华山", 
           "六安", "六安", 
            "马鞍山", "马鞍山", 
            "宿州", "宿州", 
            "铜陵", "铜陵", 
            "屯溪", "屯溪", 
            "芜湖", "芜湖", 
            "宣城", "宣城"); 
             break; 
        case "北京" : 
            var cityOptions = new Array(  
            "北京", "北京"); 
            break; 
        case "重庆" : 
            var cityOptions = new Array(  
            "重庆", "重庆"); 
            break; 
        case "福建" : 
            var cityOptions = new Array(  
            "福州(*)", "福州", 
            "福安", "福安", 
            "龙岩", "龙岩", 
            "南平", "南平", 
            "宁德", "宁德", 
            "莆田", "莆田", 
            "泉州", "泉州", 
            "三明", "三明", 
            "邵武", "邵武", 
            "石狮", "石狮", 
            "永安", "永安", 
            "武夷山", "武夷山", 
            "厦门", "厦门", 
            "漳州", "漳州"); 
             break; 
        case "甘肃" : 
            var cityOptions = new Array(  
            "兰州(*)", "兰州", 
            "白银", "白银", 
            "定西", "定西", 
            "敦煌", "敦煌", 
            "甘南", "甘南", 
            "金昌", "金昌", 
            "酒泉", "酒泉", 
            "临夏", "临夏", 
            "平凉", "平凉", 
            "天水", "天水", 
            "武都", "武都",  
            "西峰", "西峰",  
            "张掖", "张掖"); 
            break; 
        case "广东" : 
            var cityOptions = new Array(  
            "广州(*)", "广州", 
            "潮阳", "潮阳", 
            "潮州", "潮州", 
            "澄海", "澄海", 
            "东莞", "东莞", 
            "佛山", "佛山", 
            "河源", "河源", 
            "惠州", "惠州", 
            "江门", "江门", 
            "揭阳", "揭阳", 
            "开平", "开平", 
            "茂名", "茂名", 
            "梅州", "梅州", 
            "清远", "清远", 
            "汕头", "汕头", 
            "汕尾", "汕尾", 
            "韶关", "韶关", 
            "深圳", "深圳", 
            "顺德", "顺德", 
            "阳江", "阳江", 
            "阳江", "阳江", 
            "英德", "英德", 
            "云浮", "云浮", 
            "增城", "增城", 
            "湛江", "湛江", 
            "肇庆", "肇庆",  
            "中山", "中山",  
            "珠海", "珠海"); 
            break; 
        case "广西" : 
            var cityOptions = new Array(  
            "南宁(*)", "南宁", 
            "百色", "百色", 
            "北海", "北海", 
            "桂林", "桂林", 
            "防城港", "防城港", 
            "河池", "河池", 
            "柳州", "柳州", 
            "钦州", "钦州",  
            "梧州", "梧州",  
            "玉林", "玉林"); 
            break; 
        case "贵州" : 
            var cityOptions = new Array(  
            "贵阳(*)", "贵阳", 
            "安顺", "安顺", 
            "毕节", "毕节", 
            "都匀", "都匀", 
            "凯里", "凯里", 
            "六盘水", "六盘水", 
            "铜仁", "铜仁", 
            "兴义", "兴义",  
            "玉屏", "玉屏",  
            "遵义", "遵义"); 
            break; 
        case "海南" : 
            var cityOptions = new Array(  
            "海口(*)", "海口", 
            "儋县", "儋县", 
            "陵水", "陵水", 
            "琼海", "琼海", 
            "三亚", "三亚",  
            "通什", "通什",  
            "万宁", "万宁"); 
            break; 
        case "河北" : 
            var cityOptions = new Array(  
            "石家庄(*)", "石家庄", 
            "保定", "保定", 
            "北戴河", "北戴河", 
            "沧州", "沧州", 
            "承德", "承德", 
            "丰润", "丰润", 
            "邯郸", "邯郸", 
            "衡水", "衡水", 
            "廊坊", "廊坊", 
            "南戴河", "南戴河", 
            "秦皇岛", "秦皇岛", 
            "唐山", "唐山", 
            "新城", "新城", 
            "邢台", "邢台",  
            "张家口", "张家口"); 
            break; 
        case "黑龙江" : 
            var cityOptions = new Array(  
            "哈尔滨(*)", "哈尔滨", 
            "北安", "北安", 
            "大庆", "大庆", 
            "大兴安岭", "大兴安岭", 
            "鹤岗", "鹤岗", 
            "黑河", "黑河", 
            "佳木斯", "佳木斯", 
            "鸡西", "鸡西", 
            "牡丹江", "牡丹江", 
            "齐齐哈尔", "齐齐哈尔", 
            "七台河", "七台河", 
            "双鸭山", "双鸭山", 
            "绥化", "绥化", 
            "伊春", "伊春"); 
            break; 
        case "河南" : 
            var cityOptions = new Array(  
            "郑州(*)", "郑州", 
            "安阳", "安阳", 
            "鹤壁", "鹤壁", 
            "潢川", "潢川", 
            "焦作", "焦作", 
            "开封", "开封", 
            "漯河", "漯河", 
            "洛阳", "洛阳", 
            "南阳", "南阳", 
            "平顶山", "平顶山", 
            "濮阳", "濮阳", 
            "三门峡", "三门峡", 
            "商丘", "商丘", 
            "新乡", "新乡", 
            "信阳", "信阳", 
            "许昌", "许昌", 
            "周口", "周口",  
            "驻马店", "驻马店"); 
            break; 
        case "香港" : 
            var cityOptions = new Array(  
            "香港", "香港",  
            "九龙", "九龙"); 
            break; 
        case "湖北" :  
            var cityOptions = new Array(  
            "武汉(*)", "武汉", 
            "恩施", "恩施", 
            "鄂州", "鄂州", 
            "黄岗", "黄岗", 
            "黄石", "黄石", 
            "荆门", "荆门", 
            "荆州", "荆州", 
            "潜江", "潜江", 
            "十堰", "十堰", 
            "随州", "随州", 
            "武穴", "武穴", 
            "仙桃", "仙桃", 
            "咸宁", "咸宁", 
            "襄阳", "襄阳", 
            "襄樊", "襄樊", 
            "孝感", "孝感", 
            "宜昌", "宜昌"); 
            break; 
        case "湖南" : 
            var cityOptions = new Array(  
            "长沙(*)", "长沙", 
            "常德", "常德", 
            "郴州", "郴州", 
            "衡阳", "衡阳", 
            "怀化", "怀化", 
            "吉首", "吉首", 
            "娄底", "娄底", 
            "邵阳", "邵阳", 
            "湘潭", "湘潭", 
            "益阳", "益阳", 
            "岳阳", "岳阳", 
            "永州", "永州", 
            "张家界", "张家界", 
            "株洲", "株洲"); 
            break; 
        case "江苏" : 
            var cityOptions = new Array(  
            "南京(*)", "南京", 
            "常熟", "常熟", 
            "常州", "常州", 
            "海门", "海门", 
            "淮安", "淮安", 
            "江都", "江都", 
            "江阴", "江阴", 
            "昆山", "昆山", 
            "连云港", "连云港", 
            "南通", "南通", 
            "启东", "启东", 
            "沭阳", "沭阳", 
            "苏州", "苏州", 
            "太仓", "太仓", 
            "泰州", "泰州", 
            "同里", "同里", 
            "无锡", "无锡", 
            "徐州", "徐州", 
            "盐城", "盐城", 
            "扬州", "扬州", 
            "宜兴", "宜兴", 
            "仪征", "仪征", 
            "张家港", "张家港",  
            "镇江", "镇江",  
            "周庄", "周庄"); 
            break; 
        case "江西" : 
            var cityOptions = new Array( 
            "南昌(*)", "南昌", 
            "抚州", "抚州", 
            "赣州", "赣州", 
            "吉安", "吉安", 
            "景德镇", "景德镇", 
            "井冈山", "井冈山", 
            "九江", "九江", 
            "庐山", "庐山", 
            "萍乡", "萍乡", 
            "上饶", "上饶", 
            "新余", "新余",  
            "宜春", "宜春",  
            "鹰潭", "鹰潭"); 
            break; 
        case "吉林" : 
            var cityOptions = new Array(  
            "长春(*)", "长春", 
            "白城", "白城", 
            "白山", "白山", 
            "珲春", "珲春", 
            "辽源", "辽源", 
            "梅河", "梅河", 
            "吉林", "吉林", 
            "四平", "四平", 
            "松原", "松原", 
            "通化", "通化", 
            "延吉", "延吉"); 
            break; 
        case "辽宁" : 
            var cityOptions = new Array(  
            "沈阳(*)", "沈阳", 
            "鞍山", "鞍山", 
            "本溪", "本溪", 
            "朝阳", "朝阳", 
            "大连", "大连", 
            "丹东", "丹东", 
            "抚顺", "抚顺", 
            "阜新", "阜新", 
            "葫芦岛", "葫芦岛", 
            "锦州", "锦州", 
            "辽阳", "辽阳", 
            "盘锦", "盘锦", 
            "铁岭", "铁岭", 
            "营口", "营口"); 
            break; 
        case "澳门" : 
            var cityOptions = new Array(  
            "澳门", "澳门"); 
            break; 
        case "内蒙古" : 
            var cityOptions = new Array(  
            "呼和浩特(*)", "呼和浩特", 
            "阿拉善盟", "阿拉善盟", 
            "包头", "包头", 
            "赤峰", "赤峰", 
            "东胜", "东胜", 
            "海拉尔", "海拉尔", 
            "集宁", "集宁", 
            "临河", "临河", 
            "通辽", "通辽", 
            "乌海", "乌海", 
            "乌兰浩特", "乌兰浩特",  
            "锡林浩特", "锡林浩特"); 
            break; 
        case "宁夏" : 
            var cityOptions = new Array(  
            "银川(*)", "银川", 
            "固源", "固源",  
           "石嘴山", "石嘴山",  
            "吴忠", "吴忠"); 
            break; 
        case "青海" : 
            var cityOptions = new Array( 
            "西宁(*)", "西宁", 
            "德令哈", "德令哈", 
            "格尔木", "格尔木", 
            "共和", "共和", 
            "海东", "海东", 
            "海晏", "海晏", 
            "玛沁", "玛沁", 
            "同仁", "同仁",  
            "玉树", "玉树"); 
            break; 
        case "山东" : 
            var cityOptions = new Array(  
            "济南(*)", "济南", 
            "滨州", "滨州", 
            "兖州", "兖州", 
            "德州", "德州", 
            "东营", "东营", 
            "荷泽", "荷泽", 
            "济宁", "济宁", 
            "莱芜", "莱芜", 
            "聊城", "聊城", 
            "临沂", "临沂", 
            "蓬莱", "蓬莱", 
            "青岛", "青岛", 
            "曲阜", "曲阜", 
            "日照", "日照", 
            "泰安", "泰安", 
            "潍坊", "潍坊", 
            "威海", "威海", 
            "烟台", "烟台", 
            "枣庄", "枣庄", 
            "淄博", "淄博"); 
            break; 
        case "上海" : 
            var cityOptions = new Array(  
            "上海", "上海",  
            "崇明", "崇明",  
            "朱家角", "朱家角"); 
            break; 
        case "山西" : 
            var cityOptions = new Array(  
            "太原(*)", "太原", 
            "长治", "长治", 
            "大同", "大同", 
            "候马", "候马", 
            "晋城", "晋城", 
            "离石", "离石", 
            "临汾", "临汾", 
            "宁武", "宁武", 
            "朔州", "朔州", 
            "忻州", "忻州", 
            "阳泉", "阳泉",  
            "榆次", "榆次",  
            "运城", "运城"); 
            break; 
        case "陕西" : 
            var cityOptions = new Array(  
            "西安(*)", "西安", 
 
            "安康", "安康", 
            "宝鸡", "宝鸡", 
            "汉中", "汉中", 
            "渭南", "渭南", 
            "商州", "商州", 
            "绥德", "绥德", 
            "铜川", "铜川", 
            "咸阳", "咸阳", 
            "延安", "延安", 
            "榆林", "榆林"); 
            break; 
        case "四川" : 
            var cityOptions = new Array(  
            "成都(*)", "成都", 
            "巴中", "巴中", 
           "达安", "达安", 
            "德阳", "德阳", 
            "都江堰", "都江堰", 
            "峨眉山", "峨眉山", 
            "涪陵", "涪陵", 
            "广安", "广安", 
            "广元", "广元", 
            "九寨沟", "九寨沟", 
            "康定", "康定", 
            "乐山", "乐山", 
            "泸州", "泸州", 
            "马尔康", "马尔康", 
            "绵阳", "绵阳", 
            "南充", "南充", 
            "内江", "内江", 
            "攀枝花", "攀枝花", 
            "遂宁", "遂宁", 
            "汶川", "汶川", 
            "西昌", "西昌", 
            "雅安", "雅安", 
            "宜宾", "宜宾",  
            "自贡", "自贡"); 
            break; 
        case "台湾" : 
            var cityOptions = new Array(  
            "台北(*)", "台北", 
            "基隆", "基隆",  
            "台南", "台南",  
            "台中", "台中"); 
            break; 
        case "天津" : 
            var cityOptions = new Array(  
            "天津", "天津"); 
            break; 
        case "新疆" : 
            var cityOptions = new Array(  
            "乌鲁木齐(*)", "乌鲁木齐", 
            "阿克苏", "阿克苏", 
            "阿勒泰", "阿勒泰", 
            "阿图什", "阿图什", 
            "博乐", "博乐", 
            "昌吉", "昌吉", 
            "东山", "东山", 
            "哈密", "哈密", 
            "和田", "和田", 
            "喀什", "喀什", 
            "克拉玛依", "克拉玛依", 
            "库车", "库车", 
            "库尔勒", "库尔勒", 
            "奎屯", "奎屯", 
            "石河子", "石河子", 
            "塔城", "塔城", 
            "吐鲁番", "吐鲁番",  
            "伊宁", "伊宁"); 
            break; 
        case "西藏" : 
            var cityOptions = new Array(  
            "拉萨(*)", "拉萨", 
            "阿里", "阿里", 
            "昌都", "昌都", 
            "林芝", "林芝", 
            "那曲", "那曲",  
            "日喀则", "日喀则",  
            "山南", "山南"); 
            break; 
        case "云南" : 
            var cityOptions = new Array(  
            "昆明(*)", "昆明", 
            "大理", "大理", 
            "保山", "保山", 
            "楚雄", "楚雄", 
            "大理", "大理", 
            "东川", "东川", 
            "个旧", "个旧", 
            "景洪", "景洪", 
            "开远", "开远", 
            "临沧", "临沧", 
            "丽江", "丽江", 
            "六库", "六库", 
            "潞西", "潞西", 
            "曲靖", "曲靖", 
            "思茅", "思茅", 
            "文山", "文山", 
            "西双版纳", "西双版纳", 
            "玉溪", "玉溪",  
            "中甸", "中甸",  
            "昭通", "昭通"); 
            break; 
        case "浙江" : 
            var cityOptions = new Array(  
            "杭州(*)", "杭州", 
            "安吉", "安吉", 
            "慈溪", "慈溪", 
            "定海", "定海", 
            "奉化", "奉化", 
            "海盐", "海盐", 
            "黄岩", "黄岩", 
            "湖州", "湖州", 
            "嘉兴", "嘉兴", 
            "金华", "金华", 
            "临安", "临安", 
            "临海", "临海", 
            "丽水", "丽水", 
            "宁波", "宁波", 
            "瓯海", "瓯海", 
            "平湖", "平湖", 
            "千岛湖", "千岛湖", 
            "衢州", "衢州", 
            "瑞安", "瑞安", 
            "绍兴", "绍兴", 
            "嵊州", "嵊州", 
            "台州", "台州", 
            "温岭", "温岭", 
            "温州", "温州"); 
            break;      
    } 
    document.getElementById('city').options.length = 0; 
    for(var i = 0; i < cityOptions.length/2; i++) { 
        document.getElementById('city').options[i]=new Option(cityOptions[i*2],cityOptions[i*2+1]); 
        if (document.getElementById('city').options[i].value=="") document.getElementById('city').selectedIndex = i; 
    } 
    
    if(getStrActualLen(document.getElementById('city').options[0].value)>2){
				$("spancityprv").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesok.gif'/> 地址正常!";
				flag[12]=1;
				check_data();
			}
			else{
				$("spancityprv").innerHTML="<img style='vertical-align:middle' src='content/mod_b2b/images/reg_yesno.gif'/> 地址错误(请选择您所在的省份和市县)!";
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
