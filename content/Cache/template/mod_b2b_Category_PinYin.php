<?php widget("fhead");include($path_cache.DS."mod_b2b_Shared_fhead.php"); ?>
<script language="JavaScript" src="<?php echo $vd['content']; ?>js/loadgameindex.js"></script>
</title><link href="../index/css/common.css" type="text/css" rel="stylesheet"><link href="../index/css/page.css" type="text/css" rel="stylesheet">
<body class="mainbg">
<div class="new_qie">
  <div class="new_qie2">
    <h2> 商品按字母分类</h2>
    <span class="setup_index" style="margin-right: 15px;">
      <label for="lbtnLogin"></label>
    </span></div>
  <ul>
    <li><a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Category">商品按目录分类</a></li>
	<li><a href="" class="on">商品按字母分类</a></li>
  </ul>
</div>

			<table class="ss_table" cellspacing="0" cellpadding="0">
              <tr>
                <td class="td1"></td>
                <td class="td2"><div align="left">
                    <form name="form1" method="get" action="<?php echo $vd['root']; ?>index.php">
                      <input name="keywords" id="gametype" type="text" class="input" size="33" value="" onKeyUp="vkeyup()">
                      <input type="hidden" name="stype" value="pname"/>
                      <input type="hidden" name="m" value="mod_b2b"/>
                      <input type="hidden" name="c" value="product"/>
                      <input type="hidden" name="nrows" value="4000"/>
                      <label></label>
                      <select name="typesearch" id="typesearch" class="zs">
                        <option value="product" selected>搜索商品</option>
                        <option value="category">搜索分类</option>
                      </select>
                      <?php $k=array('征途','热血传奇','魔兽世界','网易','永恒之塔' ); ?>
                      <input type="submit" name="btnQuery" value="搜索" onClick="return CheckQuery();" id="btnQuery" class="input_ss" onMouseOver="this.className=&#39;input_ss_on&#39;;" onMouseOut="this.className=&#39;input_ss&#39;;">
                      　　 
                      <strong>热门搜索：</strong>
                      <?php foreach($k as $item) { ?>
                      <a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=product&stype=pname&typesearch=product&keywords=<?php echo urlencode($item); ?>"><?php echo $item; ?></a>、
                      <?php } ?>
                  </form></td>
                <td class="td3"></td>
              </tr>
            </table>
		</div>
		<div id="zm">
		  <div align="left"><a href="#">全部</a>&nbsp;&nbsp;<a href="#A">A  B  C</a>&nbsp;&nbsp;<a href="#D">D  E  F</a>&nbsp;&nbsp;<a href="#G">G  H  I</a>&nbsp;&nbsp;<a href="#J">J  K  L</a>&nbsp;&nbsp;<a href="#M">M  N  O</a>&nbsp;&nbsp;<a href="#P">P  Q  R</a>&nbsp;&nbsp;<a href="#S">S  T  U</a>&nbsp;&nbsp;<a href="#V">V  W  X</a>&nbsp;&nbsp;<a href="#Y">Y  Z</a>&nbsp;&nbsp;<a href="#Z">0-9</a></div>
		</div>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td class="tableleft">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table1">
				<?php $pinyin = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0-9"); ?>
				<?php $ls=array();foreach($pinyin as $item){ ?>
				<?php $ls[$item] = array(); ?>
				<?php } ?>
				<?php foreach($vd['subcat'] as $subcat){ ?>
				<?php if($subcat['pinyin'] >= '0' && $subcat['pinyin'] <= '9'){ ?>
				<?php $ls['0-9'][] = $subcat; ?>
				<?php } ?>
				<?php if(isset($ls[$subcat['pinyin']])){ ?>
				<?php $ls[$subcat['pinyin']][] = $subcat;} ?>
				<?php } ?>
				
				<?php foreach($ls as $k => $v){ ?>
				<tr>
				  <td class="table4 margin10" style="width: 10%; background: #f9fdff; font-weight: bold; font-size: 14px"><span id="Repeater1_ctl00_lblFirstChar"><?php echo $k; ?><a name="<?php echo $k; ?>"></a></span> </td>
				<td width="88%" class="tableright2">
				<?php foreach($v as $subcat){ ?>
				<a class='tip' href='<?php (ListLink($subcat['id'])); ?>'><?php if($vd['showtype']==0){ ?><font color=<?php echo $subcat['color']; ?>><?php echo $subcat['name']; ?></font><?php if($subcat['abst'] != '' && $subcat['abst'] != 'NULL'){ ?><SPAN class=tip_info><?php echo $subcat['abst']; ?></SPAN><?php } ?><?php }else{ ?><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php if(isset($subcat['pics']) && $subcat['pics'] !='' && $subcat['pics']!='NULL' ){ ?><?php echo $subcat['pics']; ?><?php }else{ ?>catnopic.gif<?php } ?>" border="0" style="margin:8px 0 8px 0" alt="<?php echo $subcat['abst']; ?>"/><?php } ?></a>
				<?php } ?>
&nbsp;				</td>
				</tr>
				<?php } ?>
			</table>
		</td>
      </tr>
	</table>
	
	</div>
</div>
</body>
</html>
