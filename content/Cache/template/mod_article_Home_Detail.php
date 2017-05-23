<?php widget("head");include($path_cache.DS."mod_article_Shared_head.php"); ?>
<div class="ubLeftSide">
<?php $item=$vd['item'] ?>
<input type="hidden" id="id" name="id" value="<?php echo $item['id']; ?>"/>
<table width="100%" border="1" cellpadding="10" cellspacing="0" height="95" style="border-collapse: collapse;" bordercolor="#cccccc">  
  <tr>
    <td align="left" style="padding:10px" bgcolor="#ffffff" ><?php echo $vd['web']['webname']; ?> > <a href="<?php echo $vd['root']; ?>index.php?m=mod_article"><font color="#000">文章中心</font></a> > <a href="<?php echo $vd['root']; ?>index.php?m=mod_article&a=home&boardid=<?php echo $vd['board']['id']; ?>"><font color="#000"><?php echo $vd['board']['name']; ?></font></a> > 正文 </td>
  </tr>    
  <tr>
    <td bgcolor="#F7FCFF" style="padding:15px;" >
    <div class="heading"><?php echo $item['title']; ?></div>
    <div style="border-bottom:1px #cccccc solid;text-align:center;padding-bottom:5px;">发表于：<?php echo $item['ndate']; ?> 【点击：<span id="tick"><?php echo $item['tick']; ?></span>次】 【找点卡】 【纠错】 【返回首页】 【发表/查看评论】</div>
    <div id="news"><?php (ubbcode($item['content'],$vd)); ?></div>
    <div style="margin:30px 0px; padding-bottom:20px;height:180px;border-top:1px #cccccc dashed;border-bottom:1px #cccccc dashed;"> 
      <table border="0" width="100%">
        <tr>
          <td colspan="12" style="padding:10px;text-align:left;color:#6c6c6c">看完这篇新闻有何感觉？ 已有<span id="rank1000">50</span>人表态</td>
        </tr>
        <tr>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank0">0</span><br/><div id="rpic0" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/145.gif" /><br/>囧<br/><input type="radio" name="rank" onclick="SetRank(0)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank1">0</span><br/><div id="rpic1" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/117.gif" /><br/>恶心<br/><input type="radio" name="rank" onclick="SetRank(1)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank2">0</span><br/><div id="rpic2" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/113.gif" /><br/>期待<br/><input type="radio" name="rank" onclick="SetRank(2)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank3">0</span><br/><div id="rpic3" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/133.gif" /><br/>难过<br/><input type="radio" name="rank" onclick="SetRank(3)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank4">0</span><br/><div id="rpic4" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/115.gif" /><br/>不错<br/><input type="radio" name="rank" onclick="SetRank(4)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank5">0</span><br/><div id="rpic5" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/138.gif" /><br/>关注<br/><input type="radio" name="rank" onclick="SetRank(5)" style="cursor:pointer"/></td>
          <td width="10%" height="180" align="center" valign="bottom"><span id="rank6">0</span><br/><div id="rpic6" class="commentcol"></div><img src="<?php echo $vd['content']; ?>images/123.gif" /><br/>有帮助<br/><input type="radio" name="rank" onclick="SetRank(6)" style="cursor:pointer"/></td>
          <td width="30%" height="180" align="center" valign="bottom"><div style="height:100px;BACKGROUND:url(<?php echo $vd['content']; ?>images/up_bg.gif) no-repeat 50% 0px;"><div id="rank20" style="font-size:2.2em;font-weight:bold;padding:8px 0 12px 0">0</div><img src="<?php echo $vd['content']; ?>images/up.gif" style="cursor:pointer" onclick="SetRank(20)"/></div><div style="padding-bottom:20px">【<a href="#">查看别人的评论</a>】</div></td>
        </tr>
      </table>
    </div>
    <div class="coltitle"><span class="flright"><a href="qlist.html"></a></span>看看别人都买了什么</div>
    <div class="col box twolist minheight">
        <ul>
        <?php foreach($vd['goods'] as $a) { ?>
        <li>
          <a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php echo $a['id']; ?>.html"<?php } ?> title="<?php echo $a['title']; ?>"> <font color="<?php echo $a['titlecolor']; ?>"><?php (SubText($a['title'], 20)); ?></font></a></li>
        <?php } ?>
        </ul>
    </div>
    </td>
  </tr>
</table>
</div>
<div class='ubtwoRight'>
  <div>
    <?php foreach($vd['ad'] as $aditem) { ?>
    <?php if($aditem['ispic']==1 && $aditem['pos']==552){ ?>
    <div style="margin-bottom:8px;"><a href="<?php echo $aditem['url']; ?>" target="_blank">
    <img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $aditem['pic']; ?>" border='0'  width="100%" alt='<?php echo $aditem['text']; ?>'></a><?php if($aditem['text'] != ''){ ?><br/><a href="<?php echo $aditem['url']; ?>" target="_blank"><b><font color="<?php echo $aditem['textcolor']; ?>"><?php echo $aditem['text']; ?></font></b></a><?php } ?>
    </div>
    <?php } ?><?php } ?>
  </div>
  <div class="coltitle"><span class="flright"><a href="qlist.html">more..</a></span>相关文章</div>
  <div class="col box minheight">
      <ul>
      <?php foreach($vd['boardarticle'] as $a) { ?>
      <li><a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php echo $a['id']; ?>.html"<?php } ?> title="<?php echo $a['title']; ?>"> <font color="<?php echo $a['titlecolor']; ?>"><?php (SubText($a['title'], 20)); ?></font></a></li>
      <?php } ?>
      </ul>
  </div>
</div>
<script src="<?php echo $vd['content']; ?>js/detail.js"></script>
<?php widget("foot");include($path_cache.DS."mod_article_Shared_foot.php"); ?>
