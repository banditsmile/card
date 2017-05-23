<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
<style type="text/css">
td{white-space:normal;overflow:auto;text-overflow:none;}
#kftable{background:#fff}
#kftable td{font-size:12px;padding:3px;}
</style>
</head>
<body>
<form method="post" action="index.php?m=mod_b2b&c=sys&a=ConfigSave" name="cform" id="cform"> 
<div id="contentTip" style="display:none;"></div>
<div id="content" class="cwarpper" style="position:relative">
<div class="cbodyHead"></div>
<div id="tab">
<input type="button" value="填写基本信息"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys'" class="tab_normal" onFocus="this.blur()"/>
<?php if(UB_B2C){ ?><input type="button" value="邮箱发送设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=EMail'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
<input type="button" value="关闭信息设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Close'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="前台相关设置" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Config'" class="tab_active" onFocus="this.blur()"/>
<input type="button" value="后台交易设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Pwd'" class="tab_normal" onFocus="this.blur()"/>
<input type="button" value="IP屏蔽设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=IpLock'" class="tab_normal" onFocus="this.blur()"/>
<?php if($vd['adminrank']==1){ ?><input type="button" value="相关脚本设置"  onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Sys&a=Jc'" class="tab_normal" onFocus="this.blur()"/><?php } ?>
</div>

<?php $temp = explode('|', $vd['sys']['config']);$cout=count($temp); ?>
<div class="cwarpper1" style="border-top:1px #ccc solid">
<div class="ctitle">价格相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">价格保留的位数</td>
      <td class="tablert">
        <input type="text" name="dec" value="<?php if($cout > 6){echo $temp[6];} ?>" /> 默认是3位，全局调整价格时则保留这么多的位数
      </td>
    </tr>
    <?php if(UB_B2B){ ?>
    <tr>
      <td class="tablelt">供货商品默认的手续费</td>
      <td class="tablert">
        <input type="text" name="fee" value="<?php echo $vd['sys']['fee']; ?>" /> 请写入小数点，比如0.01 (0.01 = 1%)
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="tablelt">对接商品自动调整</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="autoprice" value="1" <?php if(isset($temp[21]) && $temp[21] == 1){ ?>checked<?php } ?> /> 对接商品自动更新进货，客户购卡时才生效
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">显示相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">货币符号</td>
      <td class="tablert">
        <input type="text" name="moneysymbol" value="<?php echo isset($vd['sys']['moneysymbol']) ? $vd['sys']['moneysymbol'] : $vd['lang']['moneysymbol']; ?>" /> 
      </td>
    </tr>
    <tr>
      <td class="tablelt">货币单位</td>
      <td class="tablert">
        <input type="text" name="moneyunit" value="<?php echo isset($vd['sys']['moneyunit']) ? $vd['sys']['moneyunit'] : $vd['lang']['moneyunit']; ?>" /> 
      </td>
    </tr>
    <tr>
      <td class="tablelt">网银付款页面提醒</td>
      <td class="tablert">
        <textarea rows="10" name="bankalert" cols="60" style="width:308px;"><?php echo isset($vd['sys']['bankalert']) ? $vd['sys']['bankalert'] : '请付款成功后，不要关闭页面，系统会自动跳转回本平台，您看到成功充值后才算完成付款，如果没有跳转，请查看浏览器是否做了限制，可以试行恢复浏览器默认配置看看'; ?></textarea>
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">订单相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">前台允许撤单</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="cancel" value="1" <?php if($cout > 11){ToggleCheck($temp[11]);} ?> /> 目前仅对一卡通版本有效，且订单类型为手动充值
      </td>
    </tr>
    <tr>
      <td class="tablelt">后台有新订单播放提示音</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="orderalert" value="1" <?php if($cout > 13){ToggleCheck($temp[13]);} ?> /> 打勾表示提示
      </td>
    </tr>
    <tr>
      <td class="tablelt">后台新订单检查间隔时间</td>
      <td class="tablert">
        <input type="text" name="orderalerttime" value="<?php if($cout > 14){ echo $temp[14];} ?>"> 单位为秒 <span class="spantip">时间越短，越消耗您的平台性能，建议30秒 - 60秒之间</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt"><strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>如果网站空间的时间和标准时间有误差，您可以通过这个功能校准时间，时间往前提则输入负数，比如-5</p>订单时间校准</td>
      <td class="tablert">
        <input type="text" name="ordertimeadjust" value="<?php if(isset($temp[22])){ ?><?php echo $temp[22]; ?><?php }else{ ?>0<?php } ?>"  /> 单位为秒
      </td>
    </tr>
    <tr>
      <td class="tablelt">禁止手动订单投诉</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="forpitcomplaint2" value="1" <?php if($cout > 37){ToggleCheck($temp[37]);} ?> /> 打勾表示禁止
      </td>
    </tr>
  </table>
</div>
</div>


<?php if(UB_B2C||UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">验证码相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">一卡通登录验证码设置</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="b2crandcode" value="1" <?php if($cout > 10){ToggleCheck($temp[10]);} ?> />打勾表示需要，不打勾表示不需要
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<div class="cwarpper1">
<div class="ctitle">飞信发送设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">有订单是否发送飞信</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="fetion_send" value="1" <?php (ToggleCheck($vd['sys']['fetion_send'])); ?> />打勾表示需要，不打勾表示不需要
      </td>
    </tr>
    <tr>
      <td class="tablelt">手机号码</td>
      <td class="tablert">
        <input type="text" name="fetion_mobile" value="<?php echo $vd['sys']['fetion_mobile']; ?>"> <span class="spantip"> 需要网站空间支持 openssl 方可使用这个功能</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">飞信密码</td>
      <td class="tablert">
        <input type="password" name="fetion_pass" value="<?php echo $vd['sys']['fetion_pass']; ?>">
      </td>
    </tr>
  </table>
</div>
</div>
<?php if(UB_B2B){ ?>
<div class="cwarpper1">
<div class="ctitle">经销商登录系统后相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">弹出公告</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="pop" value="1" <?php if($cout > 0){ToggleCheck($temp[0]);} ?> />登陆系统即刻弹出管理员公告(如果有公告的话)
      </td>
    </tr>
    <tr>
      <td class="tablelt">平台公告内容</td>
      <td class="tablert">
        <textarea rows="10" name="popcontent" cols="60" style="width:308px;"><?php echo $vd['sys']['popcontent']; ?></textarea>
      </td>
    </tr>
    <tr>
      <td class="tablelt">转入短信息页面</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="turntopm" value="1" <?php if($cout > 1){ToggleCheck($temp[1]);} ?> />登陆系统转向系统短信息页面(如果有新的短信的话)
      </td>
    </tr>
    <tr>
      <td class="tablelt">前台提示用户新短信息</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="msgalert" value="1" <?php if($cout > 18){ToggleCheck($temp[18]);} ?> /> 打勾表示提示
      </td>
    </tr>
    <tr>
      <td class="tablelt">前台短信息检查时间</td>
      <td class="tablert">
        <input type="text" name="msgalerttime" value="<?php if($cout > 19){ echo $temp[19];} ?>"> 单位为秒 <span class="spantip">时间越短，越消耗您的平台性能，建议300秒左右</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">是否提醒余额不足</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="remainalert" value="1" <?php if($cout > 2){ToggleCheck($temp[2]);} ?> />登陆系统时提醒用户
      </td>
    </tr>
    <tr>
      <td class="tablelt">设置提醒的的余额上限</td>
      <td class="tablert">
        <input type="text" name="alertremain" value="<?php echo $vd['sys']['alertremain']; ?>" />
      </td>
    </tr>
    <tr>
      <td class="tablelt">是否默认开放一卡通充值</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcharge" value="1" <?php if($cout > 4){ToggleCheck($temp[4]);} ?> />当用户注册的时候，是否默认开放一卡通充值 
      </td>
    </tr>
    <tr>
      <td class="tablelt">允许查看自有商品客服</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="showagentproductkf" value="1" <?php if($cout > 16){ToggleCheck($temp[16]);} ?> /> 隐藏的话，可以保护您的平台客源不流失 
      </td>
    </tr>
    <tr>
      <td class="tablelt">分类页面使用图标显示</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="catshowpic" value="1" <?php if($cout > 33){ToggleCheck($temp[33]);} ?> />如果不打勾则是文字显示方式
      </td>
    </tr>
    <tr>
      <td class="tablelt">经销商提成级数</td>
      <td class="tablert">
        <input type="text" name="rankgetprofit" value="<?php if($cout > 30){echo $temp[30] ;}else{echo -1;} ?>"  /> 不限制的话，填 -1 即可 <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p> -1 ：表示不限制，所有上下级，只要有差价，就可以获得提成<br/>0 ：所有级别都不给提成，不管有没有差价<br/>1:一级提成(上下级)，只有直属上级有提成<br/>2:二级提成(上中下级)，上中下级关系的时候，上中有提成<br/>3:三级提成(abcd级)，abcd级的时候，abc有提成<br/>依此类推，建议填写-1即可，不限制</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">经销商提成比例</td>
      <td class="tablert">
        <input type="text" name="rankprofit" value="<?php if($cout > 31){echo $temp[31] ;}else{echo 100;} ?>"  /> %  <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p> 比如ab为上下级，ab差价为1<?php echo $vd['lang']['moneyunit']; ?>，提成比例为50%，则a获得提成1 x 50% = 0.5<?php echo $vd['lang']['moneyunit']; ?></p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">供货商品收入分配</td>
      <td class="tablert">
      	<a name="guize"></a>
        <input type="radio" class="checkbox" name="ownermoney" value="0" 
        <?php if(!isset($temp[34]) || (isset($temp[34]) && $temp[34] == 0)){ ?>
        checked
        <?php } ?>
/> 成本价+利润<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong>
<p>比如供货商添加自有商品时候设的进价是a，客户(无上级)购买的价格是b，给系统提成是0.02，最终终供货所得为a + (b - a - b x 0.02)</p>
<input type="radio" class="checkbox" name="ownermoney" value="1" <?php if(isset($temp[34]) && $temp[34] == 1){ ?>checked<?php } ?> /> 成本价<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>比如供货商添加自有商品时候设的进价是a,最终终供货所得为a</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">前台超时退出</td>
      <td class="tablert">
      	<input type="text" name="b2btime" value="<?php if($cout > 38){ echo $temp[38];}else{echo 1200;} ?>"> 秒 <span class="spantip">无动作时候自动退出前台</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">注册后多长时间可以购卡</td>
      <td class="tablert">
      	<?php if($cout > 32){ ?>
      	<?php $cba = $temp[32];}else{ ?>
      	<?php $cba = 0;} ?>
      	<select name="canbuyafter">
<option value="0"<?php if($cba == 0){ ?> selected<?php } ?>>马上可以购卡</option>
<option value="1800"<?php if($cba == 1800){ ?> selected<?php } ?>>30分钟</option>
<option value="3600"<?php if($cba == 3600){ ?> selected<?php } ?>>1小时</option>
<option value="10800"<?php if($cba == 10800){ ?> selected<?php } ?>>3小时</option>
<option value="21600"<?php if($cba == 21600){ ?> selected<?php } ?>>6小时</option>
<option value="43200"<?php if($cba == 43200){ ?> selected<?php } ?>>12小时</option>
<option value="86400"<?php if($cba == 86400){ ?> selected<?php } ?>>24小时</option>
<option value="172800"<?php if($cba == 172800){ ?> selected<?php } ?>>48小时</option>
<option value="259200"<?php if($cba == 259200){ ?> selected<?php } ?>>3天</option>
<option value="432000"<?php if($cba == 432000){ ?> selected<?php } ?>>5天</option>
<option value="604800"<?php if($cba == 604800){ ?> selected<?php } ?>>7天</option>
        </select>后可以购卡
      </td>
    </tr>
    <?php if(UB_YKT||UB_B2B||UB_B2C>1){ ?>
    <tr>
      <td class="tablelt">注册后默认开通</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="autocheckfrozen" value="1" <?php if($cout > 39){ToggleCheck($temp[39]);} ?> /> 
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td class="tablelt">批发系统登陆后转</td>
      <td class="tablert">
      	<?php $agentloginurl = isset($vd['sys']['loginurl']) ? $vd['sys']['loginurl'] : ''; ?>
      	<select name="agentloginurl">
<option value=""<?php if($agentloginurl == ''){ ?> selected<?php } ?>>系统默认(有短信转内部短信，无短信转经销商首页)</option>
<option value="m=mod_b2b&c=Home&a=Home"<?php if($agentloginurl == 'm=mod_b2b&c=Home&a=Home'){ ?> selected<?php } ?> >经销商首页</option>
<option value="m=mod_b2b&c=Category"<?php if($agentloginurl == 'm=mod_b2b&c=Category'){ ?> selected<?php } ?> >购卡售用户</option>
<option value="m=mod_b2b&c=Fav"<?php if($agentloginurl == 'm=mod_b2b&c=Fav'){ ?> selected<?php } ?>>商品收藏夹</option>
<option value="m=mod_agent&c=trade&tpl=history"
<?php if($agentloginurl == 'm=mod_agent&c=trade&tpl=history'){ ?>
 selected
<?php } ?>
>加款扣款记录
</option>
<option value="m=mod_agent&c=order"
<?php if($agentloginurl == 'm=mod_agent&c=order'){ ?>
 selected
<?php } ?>
>进货记录查询
</option>
<option value="m=mod_agent&c=trade&tpl=profit&tradetype=11"
<?php if($agentloginurl == 'm=mod_agent&c=trade&tpl=profit&tradetype=11'){ ?>
 selected
<?php } ?>
>销售利润查询
</option>
<option value="m=mod_agent&c=Messenger"
<?php if($agentloginurl == 'm=mod_agent&c=Messenger'){ ?>
 selected
<?php } ?>
>平台内部短信
</option>
<option value="m=mod_b2b&c=Quick"<?php if($agentloginurl == 'm=mod_b2b&c=Quick'){ ?> selected<?php } ?> >便民中心</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="tablelt">用户级别规则</td>
      <td class="tablert">
      	<input type="radio" class="checkbox" name="ranktype" value="0" <?php if(!isset($temp[20]) || (isset($temp[20]) && $temp[20] == 0)){ ?>checked<?php } ?> /> 规范型<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>同一个组别的经销商不能互为上下级，比如一级经销商和二级经销商同属于经销商组别，则他们不能互为上下级</p>
        <input type="radio" class="checkbox" name="ranktype" value="1" <?php if(isset($temp[20]) && $temp[20] == 1){ ?>checked<?php } ?> /> 松散型<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>同一个组别的经销商也可以为上下级，规则是只要这个级别的升级消费金额足够大，他就可以接收比他小的级别，直销商除外(也就是说直销商不能收下级)</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">用户注册起始编号</td>
      <td class="tablert">
        <input type="text" name="agentstartid" value="<?php if($cout > 36){echo $temp[36] ;}else{echo 0;} ?>"  /> <strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>不能小于当前用户的最大编号，否则无效，0表示维持当前状态，当前设置不改变也表示维持当前状态，不能小于0</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">批发前台导航</td>
      <td class="tablert">
        <input type="hidden" name="oldb2bmenu" value="<?php echo $vd['sys']['b2bmenu']; ?>"/>
        <textarea rows="10" name="b2bmenu" cols="28" style="width:458px;"><?php echo $vd['sys']['b2bmenu']; ?></textarea>
        <br/><span class="spantip">回车代表一组，每一组用"|"隔开，"|"前面是菜单，其次表示是否新窗口打开,0表示原窗口，1表示新窗口，最后一个"|"后面是菜单对应的链接</span>
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>
<?php if(UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">一卡通相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">前台显示一卡通面值</td>
      <td class="tablert">
        <input type="hidden" name="oldfyktarray" value="<?php echo $vd['sys']['fyktarray']; ?>"/>
        <input type="text" name="fyktarray" value="<?php echo $vd['sys']['fyktarray']; ?>"/> <span class="spantip">多个面值用半角逗号隔开即可如：1,5,10,15,30,45,50,100</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">所有一卡通列表</td>
      <td class="tablert">
        <input type="text" name="yktarray" value="<?php echo $vd['sys']['yktarray']; ?>"/> <span class="spantip">多个面值用半角逗号隔开即可如：1,5,10,15,30,45,50,100</span>
      </td>
    </tr>
    <tr>
      <td class="tablelt">一卡通商品购卡页面</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="dispkf" value="1" 
        <?php if($cout > 12){ToggleCheck($temp[12]);} ?>
/> 显示客服 <input type="checkbox" class="checkbox" name="dispad" value="1" 
<?php if($cout > 28){ToggleCheck($temp[28]);} ?>
/> 显示广告 <input type="checkbox" class="checkbox" name="dispbuyer" value="1" <?php if($cout > 29){ToggleCheck($temp[29]);} ?> /> 显示客户联系方式输入框
      </td>
    </tr>
    <tr>
      <td class="tablelt">一卡通订单页面直接显示客服</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktorderdispkf" value="1" <?php if($cout > 15){ToggleCheck($temp[15]);} ?> />
      </td>
    </tr>
    <tr style="display:none">
      <td class="tablelt">是否允许使用客户自行生成的一卡通</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcustomcanuse" value="1" <?php if($cout > 35){ToggleCheck($temp[35]);} ?> /> 打勾表示允许<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>开通后, 可以通过编辑用户给他开放权限, 当这个卡密提交购卡后, 自动扣除用户的余额, 谨慎使用</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">是否允许一卡通转卡</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktcantran" value="1" <?php if($cout > 23){ToggleCheck($temp[23]);} ?> /> 打勾表示允许<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>如果您允许转换，您可以通过 后台 -> 一卡通 -> 一卡通转卡权限设置 进行修改转点的权限</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">只允许同类一卡通转卡</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktonlysanmeproduct" value="1" <?php if($cout > 24){ToggleCheck($temp[24]);} ?> /> 打勾表示仅按照这个规则执行<strong onmouseover="showhide(this);" onmouseout="showhide(this);" style="cursor:pointer">[?]</strong><p>“是否允许一卡通转卡”也需要同时打勾才会生效，否则转卡功能是禁止的。"只允许同类一卡通转卡"打勾后，转卡权限设置的规则(后台 -> 一卡通 -> 一卡通转卡权限设置)将全部无效，这个时候，两张卡同时允许兑换的商品必须一模一样才允许转卡。比如A平台卡绑定了 A1,A2商品，B平台卡绑定了A1商品，这个时候A,B平台卡是不允许转卡的，只有B平台卡也绑定了A1,A2商品才可以转卡<br/>目前仅仅检查按照批次绑定商品的平台</p>
      </td>
    </tr>
    <tr>
      <td class="tablelt">显示代理一卡通卡密</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktdailishowkm" value="1" <?php if($cout > 25){ToggleCheck($temp[25]);} ?> /> 打勾表示允许
      </td>
    </tr>
    <a name="autoreward"></a>
    <tr>
      <td class="tablelt">一卡通自动返点</td>
      <td class="tablert">
        <input type="checkbox" disabled class="checkbox" name="yktdailiautoreward" value="1" <?php if($cout > 26){ToggleCheck($temp[26]);} ?> /> 打勾表示允许(目前未开放此功能)
      </td>
    </tr>
    
    <tr>
      <td class="tablelt">一卡通平台屏蔽失败记录</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="yktnoshowfail" value="1" <?php if($cout > 27){ToggleCheck($temp[27]);} ?> /> 一卡通平台查询卡状态的时候屏蔽失败的记录
      </td>
    </tr>
    
    <tr>
      <td class="tablelt">前台顶部导航</td>
      <td class="tablert">
        <input type="hidden" name="oldyktnav" value="<?php echo $vd['sys']['yktnav']; ?>"/>
        <textarea rows="10" name="yktnav" cols="28" style="width:458px;"><?php echo $vd['sys']['yktnav']; ?></textarea>
        <br/><span class="spantip">回车代表一组，每一组用"|"隔开，"|"前面是显示的名称，后面是对应的链接</span>
      </td>
    </tr>
  </table>
</div>
</div>
<?php } ?>
<?php if(UB_B2C){ ?>
<div class="cwarpper1">
<div class="ctitle">零售平台页面相关设置</div>
<div>
  <table border="0" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">评论审核</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="reviewchecked" value="1" <?php if($cout > 3){ToggleCheck($temp[3]);} ?>>用户提交商品评论直接审核通过
      </td>
    </tr>
    <tr>
      <td class="tablelt">零售前台登陆购卡</td>
      <td class="tablert">
        <input type="checkbox" class="checkbox" name="b2cneedlogin" value="1" 
        <?php if($cout > 5){ToggleCheck($temp[5]);} ?>
        > </td>
    </tr>
    <tr>
      <td class="tablelt">前台导航栏</td>
      <td class="tablert">
        <textarea rows="10" name="b2cmenu" cols="28" style="width:458px;" onblur="setchange('b2cmenuchange')"><?php echo $vd['sys']['b2cmenu']; ?></textarea>
        <br/><span class="spantip">回车代表一组，每一组用"|"隔开，"|"前面是菜单，其次表示是否新窗口打开,0表示原窗口，1表示新窗口，最后一个"|"后面是菜单对应的链接</span>
        <input type="hidden" name="b2cmenuchange" value="0" id="b2cmenuchange">
      </td>
    </tr>
    <tr>
      <td class="tablelt">前台热门</td>
      <td class="tablert">
        <textarea rows="10" name="hotkey" cols="28" style="width:458px;" onblur="setchange('hkchange')"><?php echo $vd['sys']['hotkey']; ?></textarea>
        <br/><span class="spantip">回车代表一组，每一组用"|"隔开，"|"前面是热门词，后面是热门词对应的关键词，无分隔号则表示两者相同</span>
        <input type="hidden" name="hkchange" value="0" id="hkchange">
      </td>
    </tr>
  </table>
</div>
</div>

<div class="cwarpper1">
<div class="ctitle">零售平台前台客服样式</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">风格一&nbsp;&nbsp;<input id="radiob2c1" type="radio" class="checkbox"  name="styleb2c" checked value="0" ></td>
      <td width="89" align="right">在线状态：&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif" width="74" height="23"></td>
      <td width="90" align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif" width="74" height="23"></td>
    </tr>
    <tr>
      <td class="tablelt">风格二&nbsp;&nbsp;<input id="radiob2c2" type="radio" class="checkbox"  name="styleb2c" value="1" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格三&nbsp;&nbsp;<input id="radiob2c3" type="radio" class="checkbox"  name="styleb2c" value="2" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格四&nbsp;&nbsp;<input id="radiob2c4" type="radio" class="checkbox"  name="styleb2c" value="3" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif" width="44" height="24"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif" width="44" height="24"></td>
    </tr>
    <tr>
      <td class="tablelt">风格五&nbsp;&nbsp;<input id="radiob2c5" type="radio" class="checkbox"  name="styleb2c" value="4" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif" width="61" height="15"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif" width="61" height="15"></td>
    </tr>
    <tr>
      <td class="tablelt">风格六&nbsp;&nbsp;<input id="radiob2c6" type="radio" class="checkbox"  name="styleb2c" value="5" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/6_online.gif" width="68" height="29"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/6_offline.gif" width="68" height="29"></td>
    </tr>
    <tr>
      <td class="tablelt">风格七&nbsp;&nbsp;<input id="radiob2c7" type="radio" class="checkbox"  name="styleb2c" value="6" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/7_online.gif" width="71" height="24"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/7_offline.gif" width="71" height="24"></td>
    </tr>
    <tr>
      <td class="tablelt">风格八&nbsp;&nbsp;<input id="radiob2c8" type="radio" class="checkbox"  name="styleb2c" value="7" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/8_online.gif" width="60" height="16"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/8_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">风格九&nbsp;&nbsp;<input id="radiob2c9" type="radio" class="checkbox"  name="styleb2c" value="8" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/9_online.gif" width="57" height="16"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/9_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十&nbsp;&nbsp;<input id="radiob2c10" type="radio" class="checkbox"  name="styleb2c" value="9" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif" width="61" height="16"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif" width="51" height="16"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十一&nbsp;&nbsp;<input id="radiob2c11" type="radio" class="checkbox"  name="styleb2c" value="10" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif" width="65" height="66"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif" width="65" height="66"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十二&nbsp;&nbsp;<input id="radiob2c12" type="radio" class="checkbox"  name="styleb2c" value="11" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif" width="82" height="34"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif" width="82" height="34"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十三&nbsp;&nbsp;<input id="radiob2c13" type="radio" class="checkbox"  name="styleb2c" value="12" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif" width="138" height="29"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif" width="138" height="29"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十四&nbsp;&nbsp;<input id="radiob2c15" type="radio" class="checkbox"  name="styleb2c" value="14" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif" width="43" height="16"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif" width="43" height="16"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<?php if(UB_B2B){ ?>
<div class="cwarpper1">
<div class="ctitle">批发平台前台客服样式</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">风格一&nbsp;&nbsp;<input id="radiob2b1" type="radio" class="checkbox"  name="styleb2b" checked value="0" ></td>
      <td width="89" align="right">在线状态：&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif"></td>
      <td width="90" align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格二&nbsp;&nbsp;<input id="radiob2b2" type="radio" class="checkbox"  name="styleb2b" value="1" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格三&nbsp;&nbsp;<input id="radiob2b3" type="radio" class="checkbox"  name="styleb2b" value="2" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格四&nbsp;&nbsp;<input id="radiob2b4" type="radio" class="checkbox"  name="styleb2b" value="3" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格五&nbsp;&nbsp;<input id="radiob2b5" type="radio" class="checkbox"  name="styleb2b" value="4" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格六&nbsp;&nbsp;<input id="radiob2b6" type="radio" class="checkbox"  name="styleb2b" value="5" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格七&nbsp;&nbsp;<input id="radiob2b7" type="radio" class="checkbox"  name="styleb2b" value="6" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格八&nbsp;&nbsp;<input id="radiob2b8" type="radio" class="checkbox"  name="styleb2b" value="7" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格九&nbsp;&nbsp;<input id="radiob2b9" type="radio" class="checkbox"  name="styleb2b" value="8" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十&nbsp;&nbsp;<input id="radiob2b10" type="radio" class="checkbox"  name="styleb2b" value="9" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十一&nbsp;&nbsp;<input id="radiob2b11" type="radio" class="checkbox"  name="styleb2b" value="10" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十二&nbsp;&nbsp;<input id="radiob2b12" type="radio" class="checkbox"  name="styleb2b" value="11" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十三&nbsp;&nbsp;<input id="radiob2b13" type="radio" class="checkbox"  name="styleb2b" value="12" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十四&nbsp;&nbsp;<input id="radiob2b15" type="radio" class="checkbox"  name="styleb2b" value="14" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif" /></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<?php if(UB_YKT){ ?>
<div class="cwarpper1">
<div class="ctitle">一卡通平台前台客服样式</div>
<div>
  <table width="557" id="kftable" class="ctable" bordercolor="#ededed">
    <tr>
      <td class="tablelt">风格一&nbsp;&nbsp;<input id="radioykt1" type="radio" class="checkbox"  name="styleykt" checked value="0" ></td>
      <td width="89" align="right">在线状态：&nbsp;</td>
      <td width="130" align="left"><img src="<?php echo $vd['sc']; ?>images/01_online.gif"></td>
      <td width="90" align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/01_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格二&nbsp;&nbsp;<input id="radioykt2" type="radio" class="checkbox"  name="styleykt" value="1" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/02_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格三&nbsp;&nbsp;<input id="radioykt3" type="radio" class="checkbox"  name="styleykt" value="2" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_online.gif" ></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/03_offline.gif" ></td>
    </tr>
    <tr>
      <td class="tablelt">风格四&nbsp;&nbsp;<input id="radioykt4" type="radio" class="checkbox"  name="styleykt" value="3" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/04_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格五&nbsp;&nbsp;<input id="radioykt5" type="radio" class="checkbox"  name="styleykt" value="4" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/05_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格六&nbsp;&nbsp;<input id="radioykt6" type="radio" class="checkbox"  name="styleykt" value="5" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/06_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格七&nbsp;&nbsp;<input id="radioykt7" type="radio" class="checkbox"  name="styleykt" value="6" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/07_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格八&nbsp;&nbsp;<input id="radioykt8" type="radio" class="checkbox"  name="styleykt" value="7" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/08_offline.gif" /></td>
    </tr>
    <tr>
      <td class="tablelt">风格九&nbsp;&nbsp;<input id="radioykt9" type="radio" class="checkbox"  name="styleykt" value="8" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/09_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十&nbsp;&nbsp;<input id="radioykt10" type="radio" class="checkbox"  name="styleykt" value="9" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/10_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十一&nbsp;&nbsp;<input id="radioykt11" type="radio" class="checkbox"  name="styleykt" value="10" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/11_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十二&nbsp;&nbsp;<input id="radioykt12" type="radio" class="checkbox"  name="styleykt" value="11" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/12_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十三&nbsp;&nbsp;<input id="radioykt13" type="radio" class="checkbox"  name="styleykt" value="12" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/13_offline.gif"></td>
    </tr>
    <tr>
      <td class="tablelt">风格十四&nbsp;&nbsp;<input id="radioykt15" type="radio" class="checkbox"  name="styleykt" value="14" ></td>
      <td align="right">在线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_online.gif"></td>
      <td align="right">离线状态：&nbsp;</td>
      <td align="left"><img src="<?php echo $vd['sc']; ?>images/qq15_offline.gif"></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>

<div class="cbodyFoot"></div>
</div>

<div id="opcontent">
  
  <div class="optxt">
    <input type="submit" value=" 修 改 " class="btn"/>
    <input type="reset" value=" 重 置 " class="btn"/>
  </div>
</div>
</form>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=Home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=Home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=sys&a=index" title="系统基本设置"><font color="#000">系统基本设置</font></a></div>
<div style="float:right;"><a href="index.php?m=mod_home&a=Help&t=admin_b2b_sys_index" onFocus="this.blur()" title="查看平台基本信息相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<div id="load" style="display:none;">
  <div id="loadcontent" >页面加载中请稍等...</div>
</div>
<script type="text/javascript">
  var ctablenum = 2;
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/javascript">
  function setchange(id)
  {
    $(id).value = 1;
  }
  
  qqb2cstyle = "<?php if($cout > 7){echo $temp[7]+1;}else{echo 3;} ?>";
  qqb2bstyle = "<?php if($cout > 8){echo $temp[8]+1;}else{echo 3;} ?>";
  qqyktstyle = "<?php if($cout > 9){echo $temp[9]+1;}else{echo 3;} ?>";
  <?php if(UB_B2C){ ?>
  $("radiob2c"+qqb2cstyle).checked = true;
  <?php } ?>
  <?php if(UB_B2B){ ?>
  $("radiob2b"+qqb2bstyle).checked = true;
  <?php } ?>
  <?php if(UB_YKT){ ?>
  $("radioykt"+qqyktstyle).checked = true;
  <?php } ?>
</script>
</body>
</html>
