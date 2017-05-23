<?php $in=0;if($g_controller=='Article'||$g_controller=='Bd'||($g_controller=='Home'&&$g_action=='Index'&& !isset($vd['agent']) )||(!isset($vd['agent'])&&$g_action=='Reg')||($g_action=='Aggrement')){ ?>



<?php $in=1; ?>



<?php } ?>

<script type="text/javascript">

function SetHome(obj,url){

    try{

        obj.style.behavior='url(#default#homepage)';

       obj.setHomePage(url);

   }catch(e){

       if(window.netscape){

          try{

              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");

         }catch(e){

              alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");

          }

       }else{

        alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");

       }

  }

}

 

function AddFavorite(title, url) {

  try {

      window.external.addFavorite(url, title);

  }

catch (e) {

     try {

       window.sidebar.addPanel(title, url, "");

    }

     catch (e) {

         alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");

     }

  }

}

</script>

<script>

thisURL = document.URL; 

</script>



<body onkeydown="if(event.keyCode == 13 && document.activeElement.id == 'SafeEdit1') {document.getElementById('Theme1_btnLogin').click();}">



    <div class="ttop">



        <div class="t2top">



            <div class="fangwen">



                <a id="Theme1_AgentCncUrl3" href="/" class="dx">电信站</a><a id="Theme1_AgentComUrl3"  href="/" class="lt">联通站</a>



            </div>



            <div class="youshang">



                <ul>



                    <li><a href="javascript:void(0);" onClick="SetHome(this,'http://www.xybss.cm.cn');">设为首页</a></li>



                    <li><a href="javascript:void(0);" onClick="AddFavorite('<?php echo $vd['web']['webname']; ?>',location.href)">收藏本站</a></li>



                    <div class="clear">



                    </div>



                </ul>



            </div>



        </div>



    </div>



    <div class="ding">



        <div id="Theme1_AgentLogo" class="logo" style="background:url(<?php echo $vd['content']; ?>images/mylogo.gif) no-repeat 20px 50%;">



        </div>



        <div class="banner">



            <div class="daohang">



                <ul>



                    <li id="Theme1_liAgent" class="wb"><a href="/" id="Theme1_AgentCncUrl">网吧平台<br />



                        <span>售卡好轻松</span></a></li>



                    



                    <li id="Theme1_liYKT" class="ykt"><a href="/" id="Theme1_YKTCncUrl" target="_blank" rel="nofollow">一 卡 通<br />



                        <span>一卡充天下</span></a></li>



                    <div class="clear">



                    </div>



                </ul>



            </div>



        </div>



        <div class="clear">



        </div>



    </div>



    <div class="menu">



        <ul>



		



		<li><a <?php if($g_controller=='Home'&&($g_action=='Home'||$g_action=='Index')){ ?>class="on"<?php } ?> href="<?php if(isset($vd['agent'][7])){ ?><?php echo $vd['root']; ?>index.php?m=mod_b2b&a=home<?php }else{ ?><?php echo $vd['root']; ?><?php if(UB_DEFAULT!='b2b'){ ?><?php if($vd['vip'] > 0){ ?>index.php?m=mod_<?php } ?>b2b<?php } ?><?php } ?>">首页</a></li>



    <?php if($in == 1){ ?>



	<LI class=bian></LI>



    <li ><a <?php if($g_controller=='Home'&&$g_action=='Reg'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&a=reg">用户注册</a></li>



	<LI class=bian></LI>



    <li ><a <?php if($g_action=='More'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=more">网址导航</a></li>



	<LI class=bian></LI>



    <li ><a <?php if($g_action=='Homext'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=Homext&name=%C5%FA%B7%A2%CF%B5%CD%B3%B9%AB%B8%E6">系统公告</a></li>



	<LI class=bian></LI>



    <li ><a <?php if($g_action=='Homecj'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=Homecj&name=<?php echo urlencode('批发系统常见问题'); ?>">常见问题</a></li>

	

	<?php echo $vd['web']['b2ctitle']; ?>



    <li ><a <?php if($g_action=='qq'){ ?>class="on"<?php } ?> href="<?php echo $vd['web']['yktsite']; ?>"><?php echo $vd['web']['yktname']; ?></a></li>

	

	<?php echo $vd['web']['b2ckeywords']; ?>



    <li ><a <?php if($g_action=='ekakm'){ ?>class="on"<?php } ?> href="<?php echo $vd['web']['b2csite']; ?>"><?php echo $vd['web']['b2cname']; ?></a></li>

		

	<?php echo $vd['web']['b2cbeian']; ?>



    <li ><a <?php if($g_action=='ekakm'){ ?>class="on"<?php } ?> href="<?php echo $vd['web']['website']; ?>"><?php echo $vd['web']['yktbeian']; ?></a></li>







    <?php }else{ ?>







    <?php } ?>



    <?php //mhead ?>

        </ul>



		



</div>