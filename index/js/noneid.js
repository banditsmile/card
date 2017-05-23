// JScript 文件
function $(id){return document.getElementById(id);}
	function Div(ID,num){ 
		if(num==1){
			$(ID).style.display="";
		}else{
			$(ID).style.display="none";
		}
	}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}