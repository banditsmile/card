<?php widget("head");include($path_cache.DS."mod_b2b_Shared_head.php"); ?>

<div class="clear_div2 center_bj">

        <div class="clear_div2 h_one">

            <script type="text/javascript" src="../js/jquery.js"></script>

                <script type="text/javascript" src="../js/h_flash.js"></script>

                <div class="tab h_flash">

                    <script type="text/javascript">

var slideradv_jsdatas = [<?php $i=0;foreach($vd['ad'] as $aditem) { ?><?php if($aditem['ispic']==1 && $aditem['pos']==101){ ?>



<?php if($i>0){ ?>



			 ,



			 <?php } ?>

			 {IsOtherUrl: 1, AdLinkUrl: "<?php echo $aditem['url']; ?>", AdLinkPicture: "<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $aditem['pic']; ?>", AdLinkName: ""}



<?php $i++;}} ?>

];</script>

                    <script type="text/javascript" src="../js/webjs/slideradv.js"></script>

            </div>

            <?php end_jqueryͼƬ���� ?>

            <div class="h_login">

                <div class="tab_c_box h_login_box">

                    <div>

                        <dl class="clear_div h_login">

                            <dt class="login_box1">

                            <form name="loginForm" action="<?php echo $vd['root']; ?>index.php?m=mod_b2b&a=login" autocomplete="off" method="post"  onSubmit="return formCheck()">

                                <label>

                                    <input type=text size=40 maxlength=50 name="aname" id="aname" class="login_text1" tabindex="1"  value="��¼"></label></dt>

                            <dt class="login_box2">

                              <label>

                                    <input id="pwd" name="pwd" class="login_text1" value="����" onfocus="this.value='';" onblur="if(this.value==''){this.value='����'}" />

                                    

                                </label>

                                   

                            </dt> <dt class="login_box2">

                              <label> <input type=text size="5" maxlength="6" name="verifycode" id="verifycode" class="input" tabindex="4">

<img src="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Cust&a=RandCode&t=0" id="src" align="absmiddle" height="20" width="60" alt="�������?����ˢ��" onClick="this.src=this.src+'&'+Math.random();"/></label> </dt>

                        </dl>

                        <dl class="clear_div h_login_safe">

                            <table>

                                <tr>

                                    <td width="20">

                                        <input type="checkbox" id="chkSafe" name="chkSafe" value="" onClick="chkChange()" />

                                    </td>

                                    <td width="105">

                                        ��ȫ�ؼ���¼

                                    </td>

                                    <td>

                                        <a href="/">�һ����룿</a>

                                    </td>

                                    <td>

                                        <a href="/">�����</a>

                                    </td>

                                </tr>

                            </table>

                        </dl>

                        <dl class="h_login_kj">

                            <dd>

                                <a href="/">

                                    ��½��</a></dd>

                            <dd>

                                <a href="/">��ȫ�ؼ�</a></dd>

                        </dl>

                        <dl class="clear_div h_login_btn">

                            <span class="l">

                                <div id="logImg" class="loading" style="display: none">

                                    <img style="margin-left: 10px;" src="../images/loading1.gif" /><span>���ڵ�¼��...</span>

                                </div>

                                <div id="myLog">

                                    

<input type="submit" class="login_btn1" name="Submit" value="��½" /></div>

                            </span><span class="r">

                                 <input type="button" value="���û�ע��" class="reg_btn1" onclick="javascript:location.href='/index.php?m=mod_b2b&a=reg';" /></span>

                        </dl>

                        <dl class="login_other">

                           

                            <dd>

                                <a class="login_qq" href="/" target="_blank">

                                    QQ</a></dd>

                            <dd>

                                <a class="login_sina" href="#" title="���ڿ�����">����</a></dd>

                            <dd>

                                <a class="login_taobao" href="#" title="���ڿ�����">�Ա�</a></dd>

                        </dl>

                    </div>

                </div>

                <?php end��ǩ���� ?>

            </div>

            <?php end��¼ ?>







                    <?php endһ�� ?>

        <div class="clear_div h_one">

            <?php  ��  ?>

            <div class="h_left">

                <div class="h_left h_ann">

                    <dl class="h_th">

                        <dd class="th">

                            ϵͳ����</dd><dt><a href="/">����+</a></dt></dl>

                    <div class="gray_border">

                        <ul id="newsList" class="clear_div h_ann">

<?php foreach($vd['ann'] as $a) { ?>     

    

      <li><span style="float:right"><?php echo $this->DateFormat($a['ndate'],'m/d'); ?></span><a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?><?php } ?><?php echo $a['id']; ?>.html" target="_blank" <?php } ?> title="<?php echo $a['title']; ?>"><font color="<?php echo $a['titlecolor']; ?>"><?php (SubText($a['title'], 19)); ?></font></a></li> 

<?php } ?> 

                           

                        </ul>

                    </div>

                    <?php end�߿� ?>

                </div>

                <?php endһ�е��� ?>

                <?php endһ�� ?>

                <div class="h_left">

                    <div class="clear_div h_brank">

                        <dl class="h_th">

                            <dd class="th">

                                ������Ϣ</dd><dt><a href="/">����+</a></dt></dl>

                        <div class="gray_border">

                            <ul class="clear_div h_brank">

                            

<?php foreach($vd['banks'] as $item){ ?>

					<?php if($item['AccountNO'] != ''){ ?>

          <li><dl>

  		    	<dt><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $item['bankicon']; ?>" width="30" height="36"/></dt>

  		    	<a href="<?php echo $item['banksite'] == '' ? $vd['root'].'index.php?m=mod_b2b&c=Article&a=more' : $item['banksite']; ?>" target="_blank"><b><u><?php echo $item['AccountBranch']; ?></u></b></a>��<?php echo $item['Address']; ?>��<br/>

            <?php echo $item['AccountNO']; ?><br/>

            �˻�����<?php echo $item['AccountName']; ?><br/>

  		    </li>

  		    <?php } ?>

          <?php } ?>

                              

                            </ul>

                      </div>

                        <?php end�߿� ?>

                    </div>

                    <?php end������Ϣ ?>

                    <div class="clear_div h_contact">

                        <dl class="h_th">

                            <dd class="th">

                                ��ϵ����</dd><dt><a href="/">����+</a></dt></dl>

                        <div class="gray_border">

                            <ul class="clear_div th h_contact">

                            

          <li><dl><dt><img src='images/time.png' alt='������ѯʱ��' width='31' height='31'/></dt><dd>������ѯʱ��:<span class='tel'>9:00-23:00</span></dd></dl>   <em><span class="r"><input type="button" class="yan_qq" value="" onclick="javascript:window.location.href='/index.php?m=mod_b2b&c=qqyz'"></span><span class="l"><input type="button" class="qq_contact" value="" onclick="javascript:window.location.href='/index.php?m=mod_b2b&a=Dkf'"></em></li>  

          
  <li><dl><dt><img src='images/tel.png' alt='�绰' width='31' height='31' /></dt>

        <?php for($j=0;$j<count($vd['teltype']);$j++){ ?>  

        <?php if(isset($vd['tel'][$j])&&count($vd['tel'][$j]) > 0){ ?><dd><?php echo $vd['qqtype'][$j]; ?>�绰: <span class='tel'><?php for($i=0;$i<count($vd['tel'][$j]);$i++){ ?>

          <?php echo $vd['tel'][$j][$i]; ?></span><p></dd><?php } ?> <?php } ?> <?php } ?> 

          </dl></li>             

                            

                   </ul>

                        </div>

                        <?php end�߿� ?>

                    </div>

                    <?php end������Ϣ ?>

                </div>

            </div>

            <?php endһ�е��� ?>

            <?php  ��  ?>

            <div class="h_right">

                <div class="h_right">



                           

<?php foreach($vd['ad'] as $aditem) { ?>

    <?php if($aditem['ispic']==1 && $aditem['pos']==103){ ?>

   



<a href="<?php echo $aditem['url']; ?>" target="_blank"><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $aditem['pic']; ?>" alt='��������' width='269' height='64'/></a>







    

    <?php } ?><?php } ?>

                   

                </div>

                <?php endһ�е��� ?>















                    <dl class="r_th">

                        <dd class="th">

                            ������Ϣ</dd></dl>

                    <div class="gray_bj">

                        <ul id="helpList" class="clear_div h_help">

 <?php foreach($vd['faq'] as $a) { ?>

      <li>

        <a href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?><?php echo $a['id']; ?>.html" target="_blank"<?php } ?> title="<?php echo $a['title']; ?>"> <font color="<?php echo $a['titlecolor']; ?>"><?php (SubText($a['title'],14)); ?></font></a></li>

      <?php } ?>

                       

                        </ul>

                    </div>

                    <?php end�߿� ?>

                </div>

                <?php end������Ϣ ?>

            </div>

            <?php endһ�� ?>

        </div>

    </div>

    <?php end�м䱳�� ?>

        <div class="clear_div2 h_link">

        <div class="clear_div2 h_link_bj">

            <dl class="h_link_th">

                <dd class="th">

                    ��������</dd></dl>

            <ul class="clear_div h_link">

            

            

            

            <?php foreach($vd['ad'] as $a) { ?>

    <?php if($a['ispic']==1 && $a['pos']==109){ ?>

    <li><a href="<?php echo $a['url']; ?>" target="_blank"><img src="<?php echo $vd['root']; ?><?php echo $vd['sc']; ?>upload/<?php echo $a['pic']; ?>" width="80" height="31"/></a></li>

    <?php } ?>

    <?php } ?>

    <?php foreach($vd['ad'] as $a) { ?>

    <?php if($a['ispic']==0 && $a['pos']==109){ ?>

    <li><a href="<?php echo $a['url']; ?>" target="_blank"> <font color="<?php echo $a['textcolor']; ?>"><?php (SubText($a['text'], 8)); ?></font></a></li>

    <?php } ?>

    <?php } ?>
 <script language="javascript" type="text/javascript" src="../images2/www_xybss_com_cn/js/friendlink.js"></script>

                <script type="text/javascript" src="../js/webjs/friendlink.js"></script>

            </ul>

        </div>

        <?php end���ӱ��� ?>

    </div>

    <?php end�������� ?>
<?php widget("foot");include($path_cache.DS."mod_b2b_Shared_foot.php"); ?>