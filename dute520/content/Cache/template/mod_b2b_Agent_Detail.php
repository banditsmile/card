<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" type="text/css" href="<?php echo $vd['sc']; ?>css/main.css"/>
</head>
<body>
<?php $item = $vd['item']; ?>
<div id="titleDiv">
<div style="float:left"><a href="index.php?a=home"><img src="<?php echo $vd['sc']; ?>images/home.png" style="vertical-align:middle" border="0"/></a></div><div style="float:left;padding-top:8px;padding-left:3px;"><a href="index.php?a=home" title="回到后台首页"><font color="#000">桌面</font></a> <span style="font-size:7px;">>></span> <a href="index.php?m=mod_b2b&c=Agent&a=index" title="用户列表"><font color="#000">用户列表</font></a> <span style="font-size:7px;">>></span> <span style="font-size:12px;">用户信息修改</span>(<a href="index.php?m=mod_b2b&c=Agent&a=detail&aid=<?php echo $item['aid']; ?>">刷新</a>)</div>
<div style="float:right;"><a href="index.php" onFocus="this.blur()" title="查看用户相关帮助"><img src="<?php echo $vd['sc']; ?>images/help.gif" style="vertical-align:middle" border="0"/></a></div>
</div>
<form id="cform" method="post" action="index.php?m=mod_b2b&c=agent&a=update">
<div id="content" class="cwarpper">
<div class="cbodyHead"></div>
<div class="cwarpper1">
<div class="ctitle">用户信息修改</div>
<table border="1" id="ctable1" class="ctable" bordercolor="#ededed">
  <tr>
    <td class="tablelt">商家名：</td>
    <td class="tablert"><?php echo $item['aname']; ?></td>
  </tr>
  <tr>
    <td class="tablelt">当前帐上余额：</td>
    <td class="tablert"><?php echo $item['aremain']; ?><?php echo $vd['lang']['moneyunit']; ?></td>
  </tr>
  <tr>
    <td class="tablelt">用户积分：</td>
    <td class="tablert"><?php echo $item['scored']; ?> 点</td>
  </tr>
  <tr>
    <td class="tablelt">状态：</td>
    <td class="tablert">
    <select name="frozen"  size="1">
      <?php (option($vd['frozen'], $item['frozen'])); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td class="tablelt">修改登录密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px;" id="staffpwd" name="staffpwd" readonly /> <input type="checkbox" onclick="enable(this)" style="vertical-align:middle;" class="checkbox" onFocus="this.blur()"/> 修改密码(谨慎使用)</td>
  </tr>
  <tr>
    <td class="tablelt">确认登录密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px" id="restaffpwd" name="restaffpwd" readonly /><span id="spanrestaffpwd"></span></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">修改超级密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px;" id="superpwd" name="superpwd" readonly /> <input type="checkbox" onclick="enable1(this)" style="vertical-align:middle;" class="checkbox" onFocus="this.blur()"/> 修改密码(谨慎使用)</td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">确认超级密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px" id="resuperpwd" name="resuperpwd" readonly /><span id="spanrestaffpwd"></span></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">修改交易密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px;" id="tradepwd" name="tradepwd" readonly /> <input type="checkbox" onclick="enable2(this)" style="vertical-align:middle;" class="checkbox" onFocus="this.blur()"/> 修改密码(谨慎使用)</td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">确认交易密码：</td>
    <td class="tablert">
    <input type="password" style="font-weight:normal;background:#EAEAEA;width:147px" id="retradepwd" name="retradepwd" readonly /><span id="spanrestaffpwd"></span></td>
  </tr>
  <tr>
    <td class="tablelt">真实姓名：</td>
    <td class="tablert">
    <input type="hidden" name="ubzaname" size="24" value="<?php echo $item['aname']; ?>"/>
    <input type="text" name="ubzarealname" size="24" value="<?php echo $item['arealname']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">省市：</td>
    <td class="tablert">
    <input type="text" name="prv" size="10" value="<?php echo $item['prv']; ?>"/> 省/市
    <input type="text" name="city" size="10" value="<?php echo $item['city']; ?>"/> 市
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">公司：</td>
    <td class="tablert">
    <input type="text" name="company" size="24" value="<?php echo $item['company']; ?>"/></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">网店地址 ：</td>
    <td class="tablert">
    <input type="text" name="eshop" size="24" value="<?php echo $item['eshop']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">身份证号：</td>
    <td class="tablert">
    <input type="text" name="idcard" size="24" value="<?php echo $item['idcard']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">地址：</td>
    <td class="tablert">
    <input type="text" name="ubzaaddr" size="24" value="<?php echo $item['aaddr']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">邮编：</td>
    <td class="tablert">
    <input type="text" name="ubzzip" size="24" value="<?php echo $item['zip']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">邮箱：</td>
    <td class="tablert">
    <input type="text" name="ubzamail" size="24" value="<?php echo $item['amail']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">电话：</td>
    <td class="tablert">
    <input type="text" name="ubzatel" size="24" value="<?php echo $item['atel']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">手机：</td>
    <td class="tablert">
    <input type="text" name="mobile" size="24" value="<?php echo $item['mobile']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">QQ：</td>
    <td class="tablert">
    <input type="text" name="ubzaqq" size="24" value="<?php echo $item['aqq']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">备注：</td>
    <td class="tablert">
    <input type="text" name="remarks" size="24" value="<?php echo $item['remarks']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">用户级别：</td>
    <td class="tablert">
    <select name="ubzalv"  size="1">
      <?php (option($vd['rank'], $item['alv'], 'name', 'id')); ?>
    </select>
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">商品发布上限：</td>
    <td class="tablert">
    <input type="text" name="canadd" size="24" value="<?php echo $item['canadd']; ?>"/> 不限制的话，填 -1 即可</td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">开通供货商功能：</td>
    <td class="tablert">
    <input type="radio" name="custom" value="-1" class="checkbox" onFocus="this.blur()" <?php if($item['custom']==-1){ ?>checked<?php } ?> > 不开通
    <input type="radio" name="custom" value="1" class="checkbox" onFocus="this.blur()" <?php if($item['custom']==1){ ?>checked<?php } ?> > 开通</td>
  </tr>
  <?php $rights = explode(',',$item['rights'].',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'); ?>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">用户上级编号：</td>
    <td class="tablert">
    <input type="text" name="parentid" size="24" value="<?php echo $item['parentid']; ?>"/> 如果写0则表示上级为系统</td>
  </tr>
  <tr>
    <td class="tablelt">最低充值数额：</td>
    <td class="tablert">
    <input type="text" name="lowczfunds" size="24" value="<?php echo $rights[3]; ?>"/> 0表示不限制</td>
  </tr>
  <tr<?php if(UB_B2B==0 || $vd['tbcz']==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">开通淘宝自动充值：</td>
    <td class="tablert">
    <input type="radio" name="tbcz" value="-1" class="checkbox" onFocus="this.blur()" <?php if($rights[4]==0){ ?>checked<?php } ?> > 不开通
    <input type="radio" name="tbcz" value="1" class="checkbox" onFocus="this.blur()"  <?php if($rights[4]==1){ ?>checked<?php } ?> > 开通</td>
  </tr>
  <tr>
    <td class="tablelt">权限设置：</td>
    <td class="tablert">
      <input type="checkbox" value="1" name="yktcz" onFocus="this.blur()" <?php (ToggleCheck($rights[0])); ?> class="checkbox"/> 允许一卡通充值 
      <span <?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>><input type="checkbox" value="1" name="selfcz" onFocus="this.blur()" <?php (ToggleCheck($rights[1])); ?> class="checkbox"/> 允许自行把利润转入余额</span>
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">初始化个性设置：</td>
    <td class="tablert">
      <input type="checkbox" value="1" name="initpersonfile" onFocus="this.blur()" class="checkbox"/> 当用户的设置导致无法登录或者操作的时候，才需要您初始化，否则慎用 
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">解除绑定：</td>
    <td class="tablert">
      <input type="checkbox" value="1" name="gotobindaid" onFocus="this.blur()" class="checkbox" onclick="loadDisp(1);window.location.href='?m=mod_b2b&c=Security&a=Bind&aid=<?php echo $item['aid']; ?>&staffid=0'"/> 解除用户设置的相关绑定（如硬件绑定，密保邦定，随机密码绑定等） 
    </td>
  </tr>
  <tr<?php if($vd['vipshop']==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">VIP分站权限：</td>
    <td class="tablert">
    <input type="checkbox" value="1" name="vipshop" onFocus="this.blur()"    <?php if($item['vipshop']==1){ ?>checked<?php } ?> class="checkbox"/> 
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">是否测试号：</td>
    <td class="tablert">
    <input type="checkbox" value="1" name="istest" onFocus="this.blur()"    <?php if($item['istest']==1){ ?>checked<?php } ?> class="checkbox"/> 批发平台有效,如果测试号的话,不允许购卡,其它功能正常
    </td>
  </tr>
  <tr>
    <td class="tablelt">经销商名录：</td>
    <td class="tablert">
      <span<?php if(UB_YKT==0){ ?> style="display:none"<?php } ?>><input type="checkbox" value="1" name="forykt" onFocus="this.blur()" <?php (ToggleCheck($item['forykt'])); ?> class="checkbox"/> 加入一卡通类经销商名录 </span>
      <span<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>><input type="checkbox" value="1" name="forb2b" onFocus="this.blur()" <?php (ToggleCheck($item['forb2b'])); ?> class="checkbox"/> 加入批发类经销商名录 </span>
      <span<?php if(UB_B2C==0){ ?> style="display:none"<?php } ?>><input type="checkbox" value="1" name="forb2c" onFocus="this.blur()" <?php (ToggleCheck($item['forb2c'])); ?> class="checkbox"/> 加入零售类经销商名录 </span>
    </td>
  </tr>
  <tr style="display:none">
    <td class="tablelt">一卡通卡密生成：</td>
    <td class="tablert">
      <input type="checkbox" value="1" name="yktcreate" onFocus="this.blur()" <?php (ToggleCheck($rights[2])); ?> class="checkbox" onclick="javascript:alert('打勾后，请务必同时勾选经销商名录处的加入一卡通类经销商名录，同时经销商功能处的一卡通功能也要打勾方可使用')"/> 允许前台自行生成一卡通，一卡通被使用后自动扣除客户的钱
    </td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">开户行：</td>
    <td class="tablert">
    <input type="text" name="AccountBranch" size="24" value="<?php echo $item['AccountBranch']; ?>"/></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">银行帐号：</td>
    <td class="tablert">
    <input type="text" name="AccountNo" size="24" value="<?php echo $item['AccountNo']; ?>"/></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">户名：</td>
    <td class="tablert">
    <input type="text" name="AccountName" size="24" value="<?php echo $item['AccountName']; ?>"/></td>
  </tr>
  <tr<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
    <td class="tablelt">开户所在地：</td>
    <td class="tablert">
    <input type="text" name="BankAddress" size="24" value="<?php echo $item['BankAddress']; ?>"/></td>
  </tr>
  <tr>
    <td class="tablelt">最后登陆IP：</td>
    <td class="tablert"><?php echo $item['lastip']; ?></td>
  </tr>
  <tr>
    <td class="tablelt">最后登陆时间：</td>
    <td class="tablert"><?php echo $item['lastdate']; ?></td>
  </tr>
  <tr>
    <td class="tablelt">注册IP：</td>
    <td class="tablert"><?php echo $item['regip']; ?></td>
  </tr>
  <tr>
    <td class="tablelt">注册时间：</td>
    <td class="tablert"><?php echo $item['regdate']; ?></td>
  </tr>
</table>
<input type="hidden" value="<?php echo $item['leftrights']; ?>" id="thisright"/>
<input type="hidden" value="0" name="bindchange" id="bindchange"/>
<input type="hidden" value="<?php echo $item['aid']; ?>" name="aid" id="aid"/>
</div>
<div class="cwarpper1">
<div class="ctitle">按时间段冻结用户</div>
<table border="1" id="ctable1" class="ctable" bordercolor="#ededed">
	<tr>
    <td class="tablelt">冻结时间段：</td>
    <td class="tablert">
      <select name="frozenline" onchange="setfrozendate(this)">
      	<option value="0">不操作</option>
      	<option value="1">1小时</option>
      	<option value="3">3小时</option>
      	<option value="12">12小时</option>
      	<option value="24">24小时</option>
      	<option value="48">48小时</option>
      	<option value="72">3天</option>
      	<option value="360">15天</option>
      	<option value="720">1个月</option>
      	<option value="1440">2个月</option>
      	<option value="4320">6个月</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="tablelt">起始时间：</td>
    <td class="tablert">
      <input type="text" class="myinput" style="font-weight:normal" name="fromdate" id="t1" size="20" value="<?php echo $item['fromdate']; ?>"/><img src="<?php echo $vd['sc']; ?>images/calender.gif" onclick="dateDialog('t1')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
    </td>
  </tr>
  <tr>
    <td class="tablelt">结束时间：</td>
    <td class="tablert">
      <input type="text" class="myinput" style="font-weight:normal" name="todate" id="t2" size="20" value="<?php echo $item['todate']; ?>"/><img src="<?php echo $vd['sc']; ?>images/calender.gif" onclick="dateDialog('t2')" style="vertical-align:middle;cursor:pointer;margin-left:0px;"/>
    </td>
  </tr>
  <tr>
    <td class="tablelt">原因：</td>
    <td class="tablert">
      <input type="text" class="myinput" style="font-weight:normal" name="frozereason" size="20" value="<?php echo $item['frozereason']; ?>"/>小于125个字
    </td>
  </tr>
</table>
</div>
<?php
  $auright1 = array(
  array(0,'购卡售用户',1),
  array(1,'进货记录查询',1),
  array(34,'销售记录查询',0),
  array(3,'给账户充值',0),
  array(5,'查看账户资金变动',0),
  array(6,'资金锁定',0),
  array(26,'借款管理',0),
  array(12,'操作日志',0),
  array(16,'在线投诉系统',1),
  array(18,'平台内部短信',1),
  array(19,'汇款通知书',0),
  array(23,'员工帐户管理',0),
  array(11,'员工零售利润报表',0),
  array(35,'员工零售价设定',0),
  array(38,'员工结帐管理',1),
  array(20,'帐户密码设定',1),
  array(15,'账户安全检查',1),
  array(39,'IP及所在地安全绑定',1),
  array(40,'硬件信息安全绑定',1),
  array(41,'手机令牌安全绑定',1),
  array(42,'密保产品安全绑定',1),
  array(52,'积分管理',1),
  );
  
  if($vd['tbcz'] == 1)
  {
  	$auright1[] = array(64,'淘宝小店列表/挂机',0);
  	$auright1[] = array(65,'淘宝小店添加',0);
  	$auright1[] = array(66,'淘宝订单记录',0);
  }
 
  $auright2 = array(
  array(51,'管理经销商系统',0),
  array(4,'账户余额详细',0),
  array(2,'修改下家进价',0),
  array(9,'划款给下级客户',0),
  array(13,'代注册下级帐号',0),
  array(14,'下级客户档案管理',0),
  array(28,'自有商品发布与管理',0),
  array(29,'自有商品添加',0),
  array(45,'自有商品定价',0),
  array(31,'自有商品库存',0),
  array(56,'自有商品充值管理',0),
  array(44,'商品销售报表查询',0),
  array(32,'销售收入入帐记录',0),
  array(30,'下级客户价格管理',0),
  array(46,'下级客户购卡权限',0),
  array(47,'下级客户消费记录',0),
  array(48,'下级汇款通知书',0),
  array(49,'业务员帐户管理',0),
  array(50,'业务员业绩查询',0),
  array(57,'代理一卡通列表',0),
  array(58,'代理一卡通换购记录',0),
  array(59,'换购商品返点费率',0),
  array(60,'一卡通返点明细',0)
  );
  
  if($vd['vipshop'] == 1)
  {
  	$auright2[] = array(53,'VIP平台设置',0);
    $auright2[] = array(62,'VIP风格选择',0);
    $auright2[] = array(63,'VIP风格自定义',0);
    $auright2[] = array(54,'VIP平台广告',0);
    $auright2[] = array(55,'VIP平台公告',0);
  }
  
?>
<div class="cwarpper1"<?php if(UB_B2B==0){ ?> style="display:none"<?php } ?>>
<div class="ctitle">用户权限设置</div>
<div>
<table border="1" id="ctable1" class="ctable" bordercolor="#ededed">
  <tr><td colspan="4" style="background:#f8f8f8"><b>直销商功能：</b></td></tr>
  <?php $i=0;foreach($auright1 as $item){ ?>
  <?php if($i == 0){ ?>
  <tr>
  <?php }$i++; ?>
    <td width="25%"><input type="checkbox" class="checkbox" value="1" id="rights_<?php echo $item[0]; ?>" name="rights_<?php echo $item[0]; ?>" /><label for="rights_<?php echo $item[0]; ?>"><?php echo $item[1]; ?></label></td>
  <?php if($i == 4){ ?>
  </tr>
  <?php $i=0;} ?>
  <?php } ?>
  
  <?php if($i > 0){ ?>
  <?php for($j=0; $j < 4 - $i; $j++){ ?>
  <td width="25%" class=stline>&nbsp;</td>
  <?php } ?>
  </tr>
  <?php } ?>
</table>
<table border="1" id="ctable1" class="ctable" bordercolor="#ededed">
  <tr><td colspan="4" style="background:#f8f8f8"><b>经销商功能：</b></td></tr>
  <?php $i=0;foreach($auright2 as $item){ ?>
  <?php if($i == 0){ ?>
  <tr>
  <?php }$i++; ?>
    <td width="25%"><input type="checkbox" class="checkbox" value="1" id="rights_<?php echo $item[0]; ?>" name="rights_<?php echo $item[0]; ?>" /><label for="rights_<?php echo $item[0]; ?>"><?php echo $item[1]; ?></label></td>
  <?php if($i == 4){ ?>
  </tr>
  <?php $i=0;} ?>
  <?php } ?>
  
  <?php if($i > 0){ ?>
  <?php for($j=0; $j < 4 - $i; $j++){ ?>
  <td width="25%" class=stline>&nbsp;</td>
  <?php } ?>
  </tr>
  <?php } ?>
</table>
</div>
</div>
<div id="cdiv" style="position:absolute;bottom:45px;left:30px;;width:480px;display:none">
  <div style="padding:20px;background:#F1F5FA;border:5px #75BCD7 solid">
  <div style="font-size:14px;font-weight:bold;padding:5px;float:left">请输入后台充值密码</div>
  <div style="float:right;"><img src="<?php echo $vd['sc']; ?>images/destroy.gif" onclick="disp('cdiv')" style="cursor:pointer"/></div>
    <table id="checktable" width="100%" style="border-collapse: collapse;">
      <tr>
        <td width="25%"">后台充值密码</td>
        <td width="75%"><input type="password" id="mytradepwd" name="mytradepwd" value=""/></td>
      </tr>
      <tr>
        <td width="25%"">提示</td>
        <td width="75%" style="font-size:12px">输入充值密码后，才可以修改用户的相关信息</td>
      </tr>
      <tr>
        <td width="25%" style="height:50px;"></td>
        <td width="75%">
          <input type="submit" value="我知道，确认提交" class="button"/> <input type="button" value="取消" class="button" onclick="disp('cdiv')"/>
        </td>
      </tr>
    </table>
  </div>
</div>
<div class="cbodyFoot"></div>
</div>
<div id="opcontent">
  <div class="optxt">
    <input type="button" value="修 改 &gt;&gt;" name="b1" class="btn" onclick="disp('cdiv')" />
    <input type="reset" value="重 置 &gt;&gt;" name="b1" class="btn"/>
  </div>
</div>
</form>
<script type="text/javascript">
  var ctablenum = 1;
  sc = "<?php echo $vd['sc']; ?>";
</script>
<script src="<?php echo $vd['sc']; ?>js/content.js" type="text/javascript"></script>
<script type="text/javascript">
  var thisright = $("thisright").value;
  var tmp = thisright.split(",");
  for(var i = 0; i < tmp.length; i++)
  {
    if($("rights_" + i) != null)
    {
      $("rights_" + i).checked = tmp[i]==1 ? true : false;
    }
  }
  
  function enable(obj)
  {
    state   = obj.checked ? false : true;
    bck     = obj.checked ? "#ffffff" : "#EAEAEA";
    
    $("staffpwd").readOnly   = state;
    $("restaffpwd").readOnly = state;
    
    $("staffpwd").style.background = bck;
    $("restaffpwd").style.background = bck;
    
    $("staffpwd").value = "";
    $("restaffpwd").value = "";
  }
  
  function enable1(obj)
  {
    state   = obj.checked ? false : true;
    bck     = obj.checked ? "#ffffff" : "#EAEAEA";
    
    $("superpwd").readOnly   = state;
    $("resuperpwd").readOnly = state;
    
    $("superpwd").style.background = bck;
    $("resuperpwd").style.background = bck;
    
    $("superpwd").value = "";
    $("resuperpwd").value = "";
  }
  
  function enable2(obj)
  {
    state   = obj.checked ? false : true;
    bck     = obj.checked ? "#ffffff" : "#EAEAEA";
    
    $("tradepwd").readOnly   = state;
    $("retradepwd").readOnly = state;
    
    $("tradepwd").style.background = bck;
    $("retradepwd").style.background = bck;
    
    $("tradepwd").value = "";
    $("retradepwd").value = "";
  }
  
  function setbind(val)
  {
    $("bindchange").value = val;
  }
  
  function reasondisp(obj)
  {
    $("reason").style.display = obj.value==0 ? "none" : "";
  }
  setTableInput();
  
  function setCustom(val)
  {
    $("remarks_custom").style.display = val == 1 ? "" : "none";
  }
  
  function setArea(obj)
  {
    if(obj.innerHTML == "请输入原因")
    {
      obj.innerHTML = "";
    }
  }
  
  function setBlur(obj)
  {
    if(obj.innerHTML == "")
    {
      obj.innerHTML = "请输入原因";
    }
  }
  
  function setfrozendate(obj)
  {
  	v = obj.options[obj.selectedIndex].value;
  	d = new Date();
  	d1 = date2str(d);
  	
  	if(v == 0)
  	{
  		$("t1").value = "1970-01-01 00:00:00";
  	  $("t2").value = "1970-01-01 00:00:00";
  	  return;
  	}
  	else if(v < 24)
  	{
  		v = v / 1;
  		v = d.getHours() + v;
  		
  		d.setHours(v);

  	}
  	else if(v < 361)
  	{
  		v1 = v / 24;
  		d.setDate(d.getDate() + v1);
  	}
    else
    {
    	v1 = v / 720;
    	d.setMonth(d.getMonth() + v1);
    }
  	
  	d2 = date2str(d);
  	
  	$("t1").value = d1;
  	$("t2").value = d2;
  }
  
  function date2str(d)
  {   
    var ret=d.getFullYear()+"-"   
    ret+=("00"+(d.getMonth()+1)).slice(-2)+"-"   
    ret+=("00"+d.getDate()).slice(-2)+" "   
    ret+=("00"+d.getHours()).slice(-2)+":"   
    ret+=("00"+d.getMinutes()).slice(-2)+":"   
    ret+=("00"+d.getSeconds()).slice(-2)   
    return ret;  
  }   

</script>
</body>
</html>
