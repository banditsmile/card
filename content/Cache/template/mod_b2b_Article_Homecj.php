<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>
    <div class="clear_div2 center_bj i_center_bj">
        <div class="clear_div d_center">
            <div class="d_left">
                <ul class="clear_div th left_nav">
                    <li class="light"><a <?php if($g_action=='Homecj'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=Homecj&name=<?php echo urlencode('����ϵͳ��������'); ?>">��������</a></li>
                    <li><a href="index.php?m=mod_b2b&c=article&a=home&name">������Ϣ</a></li>
                </ul>
                <div class="clear_div adv_d">
                </div>
                <?php endע�� ?>
            </div>
            <?php end��� ?>
            <div class="d_right">
                <div class="site_th">
                    <dl>
                        <dt><a href="index.php">��ҳ</a><a href="/index.php?m=mod_b2b&c=Article&a=Homecj&name=%C5%FA%B7%A2%CF%B5%CD%B3%B3%A3%BC%FB%CE%CA%CC%E2">��������</a></dt></dl>
                </div>
                <?php endλ�ñ��� ?>

 <ul class="clear_div i_news">


   <?php foreach($vd['faq'] as $a) { ?>

    <li>



<span style="float:right;" style="color:red;"><?php echo $this->DateFormat($a['ndate'],'Y/m/d'); ?></span>

      <a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?><?php } ?><?php echo $a['id']; ?>.html" target="_blank"<?php } ?>> <font color="<?php echo $a['titlecolor']; ?>"  title="<?php echo $a['title']; ?>"><?php echo $a['title']; ?></font></a>  </li>

    <?php } ?>

    <li class="endli">

<span style="float:right;">

    <form method="post" action="index.php?m=mod_article&a=homecj&<?php echo $vd['op']; ?>">

      <strong>���м�¼<font color="#ff0000"><?php echo $vd['totlerow']; ?></font>�� / �� <?php echo $vd['thispage']; ?> ҳ</strong>/ �� <?php echo $vd['totlepage']; ?> ҳ

      <a href="?m=mod_b2b&c=article&a=homecj&<?php echo $vd['op']; ?>&page=<?php echo $vd['prepage']; ?>">��һҳ</a>

      <a href="?m=mod_b2b&c=article&a=homecj&<?php echo $vd['op']; ?>&page=<?php echo $vd['nextpage']; ?>">��һҳ</a>

      ����<input type="text" id="page" name="page" size="2" value="" class="txt"/>ҳ<input value="�Ͻ�����ȥ��" type="submit" class="register_btn""/>

    </form>

</span>

    </li>

  </ul>



                

</div>

                <?php endҳ�� ?>

            </div>

            <?php end�м�߿� ?>

        </div>

        <?php end�м��� ?>

    </div>

    <?php end�м䱳�� ?>

    <?php widget("foot");include($path_cache.DS."mod_b2b_Shared_foot.php"); ?>