<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>

    <div class="clear_div2 center_bj i_center_bj">

        <div class="clear_div i_center">

            <dl class="h_th">

                <dd class="th">

                    公告信息</dd></dl>

            <?php end位置标题 ?>

            

            <ul class="clear_div i_news">

                

                        

                       

                        

                       

   <?php foreach($vd['items'] as $a) { ?>

    <li>



<span style="float:right;" style="color:red;"><?php echo $this->DateFormat($a['ndate'],'Y/m/d'); ?></span>

      <a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?><?php echo $a['id']; ?>.html" target="_blank"<?php } ?>> <font color="<?php echo $a['titlecolor']; ?>"  title="<?php echo $a['title']; ?>"><?php echo $a['title']; ?></font></a>  </li>

    <?php } ?>

    <li class="endli">

<span style="float:right;">

    <form method="post" action="index.php?m=mod_article&a=home&<?php echo $vd['op']; ?>">

      <strong>共有记录<font color="#ff0000"><?php echo $vd['totlerow']; ?></font>条 / 第 <?php echo $vd['thispage']; ?> 页</strong>/ 共 <?php echo $vd['totlepage']; ?> 页

      <a href="?m=mod_b2b&c=article&a=home&<?php echo $vd['op']; ?>&page=<?php echo $vd['prepage']; ?>">上一页</a>

      <a href="?m=mod_b2b&c=article&a=home&<?php echo $vd['op']; ?>&page=<?php echo $vd['nextpage']; ?>">下一页</a>

      到第<input type="text" id="page" name="page" size="2" value="" class="txt"/>页<input value="赶紧跳过去吧" type="submit" class="register_btn""/>

    </form>

</span>

    </li>

  </ul>



                

</div>

                <?php end页码 ?>

            </div>

            <?php end中间边框 ?>

        </div>

        <?php end中间宽度 ?>

    </div>

    <?php end中间背景 ?>

    <?php widget("foot");include($path_cache.DS."mod_b2b_Shared_foot.php"); ?>