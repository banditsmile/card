<?php widget("thead");include($path_cache.DS."mod_b2b_Shared_thead.php"); ?>
    <link rel="stylesheet" type="text/css" href="Themes/q_skin1/css/common.css" />
    <link rel="stylesheet" type="text/css" href="Themes/q_skin1/css/page.css" />

    <script language="javascript" type="text/javascript">
        try{document.execCommand("BackgroundImageCache", false, true);}catch(e){}
    </script>

</head>
<?php widget("zhead");include($path_cache.DS."mod_b2b_Shared_zhead.php"); ?>
        <div class="neirong_b" style="margin-bottom: 10px;">
            <div class="neirong">
                <div class="nr_left">
                    <div class="more_t">
                        <span>��ǰλ�ã�<a href="/" id="Theme1_seo12">��ҳ</a> -
                            <?php echo $vd['board']['name']; ?>�б�</span>
                    </div>
                    <div class="more_z">
					<div id="Theme1_NewTitle" class="page_di1">
                        </div>
                        <ul class="ul1">
                            							    <?php foreach($vd['items'] as $a) { ?>
 <li><span class='left'><a style='color: ' href="<?php if($a['titlelink'] != ''){ ?><?php echo $a['titlelink']; ?>" target="_blank"<?php }else{ ?><?php echo $vd['root']; ?>article/<?php if($vd['vip'] > 0){ ?>?<?php } ?><?php echo $a['id']; ?>.html" target="_blank"<?php } ?>"><?php echo $a['title']; ?></a></span><span class='right'><?php echo $this->DateFormat($a['ndate'],'Y/m/d'); ?></span></li>
    <?php } ?>
                        </ul>
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td>&nbsp;
                                    
                                </td>
                                <td>
                                    <div style="line-height: 30px; float: right;">
                                        

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="more_d">
                    </div>
                </div>
                        <div class="nr_right">
                    <div class="lianxi">
                        <div class="lianxi_t">
                            <h2>
                                ��ϵ��ʽ</h2>
                        </div>
                        <div id="Theme1_js2" class="lianxi_z">
                            <ul>

<LI style="LINE-HEIGHT: 22px; HEIGHT: 25px" class=noborder><SPAN class=time>����ʱ�䣺<?php echo $vd['web']['worktime']; ?></SPAN> </LI>
<LI class=noborder><SPAN class="icon kefu"></SPAN><SPAN style="LINE-HEIGHT: 1.8" class=text>
  <?php for($j=0;$j<count($vd['teltype']);$j++){ ?>
					  <?php if(isset($vd['tel'][$j])&&count($vd['tel'][$j]) > 0){ ?>
					  <SPAN class=tel>
					  <?php echo $vd['qqtype'][$j]; ?>�绰��<?php for($i=0;$i<count($vd['tel'][$j]);$i++){ ?><?php echo $vd['tel'][$j][$i]; ?><?php } ?>  
						  </SPAN><BR><?php } ?>
					<?php } ?>
</SPAN> 
<DIV class=clear></DIV></LI>
<LI class="noborder line"></LI>
<LI class=noborder><SPAN class="icon qq"></SPAN><SPAN class="text qqtext">
	<?php for($j=0;$j<count($vd['qqtype']);$j++){ ?>
						<?php if(isset($vd['qq'][$j])&&count($vd['qq'][$j]) > 0){ ?>
						<?php for($i=0;$i<count($vd['qq'][$j]);$i++){ ?><dd>
						<SPAN class=qqname><?php echo $vd['qqtype'][$j]; ?>QQ��<a target='_blank' href='tencent://message/?uin=<?php echo $vd['qq'][$j][$i]; ?>&Site=<?php echo $vd['web']['webname']; ?>&Menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=1:<?php echo $vd['qq'][$j][$i]; ?>:<?php if(isset($vd['config'][8])){echo $vd['config'][8]+1;}else{echo 15;} ?>' alt='�ͷ�' title='�ͷ�'></A></SPAN><BR><?php } ?> <?php } ?>
					<?php } ?>
	  </SPAN>
<DIV class=clear></DIV></LI>

                                <div class="clear">
                                </div>
                            </ul>
                        </div>
                        <div class="lianxi_d">
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
 <?php widget("foot");include($path_cache.DS."mod_b2b_Shared_foot.php"); ?>