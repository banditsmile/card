<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>商品目录</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />
	<script language="JavaScript" src="<?php echo $vd['content']; ?>js/loadgameindex.js"></script>
</head>
<body>
<form name="form1" method="get" action="<?php echo $vd['root']; ?>index.php">
<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>
<div class="new_qie">
            <div class="new_qie2">
                <h2>
                    商品按目录分类</h2>
                <span class="setup_index" style="margin-right: 15px;">
                    <input id="lbtnLogin" type="checkbox" name="lbtnLogin" onclick="javascript:setTimeout('__doPostBack(\'lbtnLogin\',\'\')', 0)" /><label for="lbtnLogin">登录后到这页</label></span>
                <span class="setup_index">
                    <input id="btnDisplayCategoryImg" type="checkbox" name="btnDisplayCategoryImg" onclick="javascript:setTimeout('__doPostBack(\'btnDisplayCategoryImg\',\'\')', 0)" /><label for="btnDisplayCategoryImg">图片形式显示目录</label></span>
            </div>
            <ul>
                <li><a href="Buycard.aspx" class="on">商品按目录分类</a></li>
                <li><a href="index.php?m=mod_b2b&amp;c=Category&amp;a=PinYin">商品按字母分类</a></li>
            </ul>
</div>
    <script language="javascript" type="text/javascript">
        function ShowSearchType(obj)
        {
            var pos = getElementPos(obj);
            var div = document.getElementById("SearchType");
            div.style.display = "";
            div.style.left = pos.x;
            div.style.top = pos.y + obj.offsetHeight;
        }
        function SelcetSearchType(obj)
        {
            document.getElementById("spanSearchType").innerHTML = obj.innerHTML;
            document.getElementById("hfldSearchType").value = obj.key;
            document.getElementById("SearchType").style.display = "none";
        }
        function CheckQuery()
        {
            if (document.getElementById("hfldSearchType").value == "")
            {
                alert("请选择搜索类型！");
                return false;
            }
            if (document.getElementById("keywords").value == "" || document.getElementById("keywords").value == "输入游戏名或游戏公司名")
            {
                alert("请输入查询关键字！");
                return false;
            } 
            return true;
        }
    </script>

        <table class="ss_table" cellspacing="0" cellpadding="0">
            <tr>
                <td class="td1">
                </td>
                <td class="td2">
                    <div class="input1">
                        <input name="keywords" type="text" value="输入游戏名或游戏公司名" maxlength="30" id="keywords" class="ss1" onblur="if(value=='') {value='输入游戏名或游戏公司名'}" onfocus="if(value=='输入游戏名或游戏公司名') {value=''}" onkeyup="gamekeyup()" autocomplete="off" size="14" />
                        <div style="display: none" id="searchlist">
                            <ul>
                            </ul>
                        </div>
                    </div>
                    <div class="input11">
                        <a id="spanSearchType" onclick="ShowSearchType(this)" class="ss2">搜索商品</a>
<form name="form1" method="get" action="<?php echo $vd['root']; ?>index.php">
                        <input type="hidden" name="hfldSearchType" id="hfldSearchType" value="Product" />
			<input type="hidden" name="stype" value="pname"/>
			<input type="hidden" name="m" value="mod_b2b"/>
			<input type="hidden" name="c" value="product"/>
			<input type="hidden" name="nrows" value="4000"/>
                        <div id="typesearch" style="position: absolute; display: none;">
                            <ul>
                                <li onclick="SelcetSearchType(this)" key="product" onmouseover="this.className='ParvalueOn';"
                                    onmouseout="this.className='';">搜索商品</li>
                                <li onclick="SelcetSearchType(this)" key="category" onmouseover="this.className='ParvalueOn';"
                                    onmouseout="this.className='';">搜索目录</li>
                            </ul>
                        </div>
                    </div>
                    <div class="input2">
                        <input type="submit" name="btnQuery" value="搜索" onclick="return CheckQuery();" id="btnQuery" class="input_ss" onmouseover="this.className='input_ss_on';" onmouseout="this.className='input_ss';" />
						    	<?php $k=array('QQ','征途','天龙八部','盛大','网易','魔兽世界' ); ?>
                    </div>
                    <div class="input22">
                        <b>热门搜索：</b><?php foreach($k as $item) { ?><a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=product&stype=pname&typesearch=product&keywords=<?php echo urlencode($item); ?>"><?php echo $item; ?></a><?php } ?>
                    </div>
					        		<?php $icat=array();foreach($vd['cat'] as $cat) { ?>

    <?php $ls=array();foreach($vd['subcat'] as $subcat) { ?>

    <?php if($subcat['parentid'] == $cat['id'] && $subcat['forb2b'] == 1) { ?>

    <?php $ls[]=$subcat; ?>

    <?php } ?>

    <?php $icat[$cat['id']]=$ls; ?>

    <?php }} ?>

    

    <?php $k=0;foreach($vd['cat'] as $cat) { ?>

    <?php if($cat['forb2b'] == 1) { ?>

                </td>
                <td class="td3">
                </td>
            </tr>

<table class="table4 margin10" cellspacing="1" cellpadding="0">

<tr>

<th height="23" colspan="5" align="left" bgcolor="#D7F1FF" class="heardertopno">　<font color="<?php echo $cat['color']; ?>" style=" font-weight:bolder"><?php echo $cat['name']; ?></font></td></tr>

<?php $n=0;$i=0;$ls=$icat[$cat['id']];foreach($ls as $subcat) { ?>

<?php if($i == 0){ ?>

<tr<?php if($n%2==1){ ?> class="hs"<?php } ?>>

<?php $n++;}$i++; ?>

<td width=20% height="30" class=stline><a onmouseover='ShowComment(this)' onmouseout='HideComment(this)' class='tip'  href='<?php (ListLink($subcat['id'])); ?>'>

<?php if($vd['showtype']==0){ ?>

<font color=<?php echo $subcat['color']; ?>><?php echo $subcat['name']; ?></font>

<?php if($subcat['abst'] != '' && $subcat['abst'] != 'NULL'){ ?>

<SPAN class=tip_info></SPAN>

<?php } ?>

<?php }else{ ?><?php } ?>

</a></td>

<?php if($i == 5){ ?>

</tr>

<?php $i=0;} ?>

<?php } ?>



<?php if($i > 0){ ?>

<?php for($j=0; $j < 5 - $i; $j++){ ?>

<td width="20%" height="13" class=stline></td>

<?php } ?>

</tr>

<?php } ?>

</table>

<?php }$k++;} ?>

</html>            
</form>

    <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>

    <script type="text/javascript" src="../../index/js/loadgame.js?r=0.34534535"></script>
    <script language="javascript" type="text/javascript">
        $(function () {
            if ($("#btnQuery").length == 1) {
                $("body").keydown(function (event) {
                    if (event.keyCode == 13) {
                        $("#btnQuery").focus();
                    }
                });
            }
        }); 
    </script>
	    <script language="javascript" type="text/javascript" src="../../index/js/getElementPos.js"></script>
</body>
</html>
