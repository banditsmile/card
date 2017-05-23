<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>帐户安全设置</title>
</title><link href="../index/css/common.css" type="text/css" rel="stylesheet"><link href="../index/css/page.css" type="text/css" rel="stylesheet">
    <style media="all" type="text/css">
        h5 span {color:red;font-size:12px;padding-left:5px}
        .content_center{
            margin:0 auto;
            border-bottom: 1px dashed #ccc; 
            padding:9px 0px;overflow: hidden
        }

        .clearfix {
            *display:inline-block;
            *zoom:100%;
        }
        .left_icon{background:url(../index/images/h_skin1/icon_safe.png) no-repeat;
            width:560px;
            float:left;text-align:left;
            padding-left:90px;
        }

        .icon_safe1 {background-position: 15px 5px;}
        .icon_safe2 {background-position: 15px -102px;}
        .icon_safe3 {background-position: 15px -206px;}
        .icon_safe4 {background-position: 15px -306px;}
        .icon_safe5 {background-position: 15px -406px;}
        .icon_safe6 {background-position: 15px -506px;}
        .icon_safe8 {background-position: 15px -606px;}




        .left_icon img{
            float:left;
            padding:10px;
        }
        .left_icon h5{
            color:#1e3869;
            font-size:14px;
            font-weight:bold;padding-top:5px;
            line-height:20px;
        }
        .left_icon p{
            color:#82868f;
            line-height:22px;
        }
        .right_btn{
            float:right;
            width:120px;
            padding-top:12px;
            vertical-align:middle;

        }

        .right_btn .ok {color:green;}
        .right_btn .no {color:red;}
        .btn_blue12_deep,.btn_blue12_deep2{margin-top:5px;
            background:url(../index/images/h_skin1/btn_blue12_deep.png) no-repeat;
            height:30px;
            width:84px;
            font-size:12px;
            color:#fff;
            border:0px;
            cursor:pointer;
        }
        .btn_blue12_deep2 {background:url(../index/images/h_skin1/btn_blue12_deep2.gif) no-repeat;}
        .ip {padding:5px;border-bottom: 1px dashed #ddd; }
        .ip span {color:#5caed9;padding-right:20px;font-weight:bold}
.STYLE2 {color: #009933}
    </style>

    <script type="text/javascript" src="http://www.renrenlekm.com/js/ifrauto.js"></script>

	<?php $s = $vd['security']; ?>    

</head>
<body>
    <div class="new_qie">
        <div class="new_qie2">
            <h2>
                帐户安全设置</h2>
        </div>
    </div>
    <form name="form1" method="post" action="http://www.renrenlekm.com/safeLevel.aspx" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTk0NDU3NzU2NQ9kFgICAQ9kFgwCAQ8PFgYeBFRleHQFCeW3suWQr+eUqB4IQ3NzQ2xhc3MFAm9rHgRfIVNCAgJkZAIDDw8WBh8ABQnmnKrnu5HlrpofAQUCbm8fAgICZGQCBw8PFgYfAAUJ5pyq57uR5a6aHwEFAm5vHwICAmRkAgsPDxYGHwAFCeacque7keWumh8BBQJubx8CAgJkZAINDw8WBh8ABQnmnKrnu5HlrpofAQUCbm8fAgICZGQCEQ8PFgYfAAUJ5pyq57uR5a6aHwEFAm5vHwICAmRkZClJOA9a1M1BzaFaup6ER0crx+4H">
</div>

<div>

	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWBQKmpriMCALjieHZDALn7+rwDALshZKLAQKYjNn1C4wKtk6kmpiobQnhNxuTM+GAppcc">
</div>
        <table width="100%" cellpadding="0" cellspacing="1" class="table4">
            <tbody><tr>
                <td>
                    <div class="content_center clearfix">
                        <div class="left_icon icon_safe1">
                            <h5>
                                交易密码验证</h5>
                            <p>
                                请设置6位以上的密码，并且强烈建议您启用交易密码，启用交易密码后在进行购买、划款等重要地方需要输入验证，有效的确保了您的帐户资金安全。</p>
                        </div>
                        <div class="right_btn">
                           <?php if($s['tradecheck']==1){ ?>
                           <span class="STYLE2">已绑定</span>
                           <?php }else{ ?><font color="#ff0000">未绑定</font><?php } ?></strong><br>
                            <input type="button" value="我要设置" id="btnIsTradePassword" class="btn_blue12_deep" onclick="javascript:location.href=&#39;index.php?m=mod_agent&c=Home&a=Self&#39;">
                      </div>
                    </div>
                    <div class="content_center clearfix">
                        <div class="left_icon icon_safe2">
                            <h5>
                                硬件信息绑定</h5>
                            <p>
                                绑定硬件信息可以大大提高帐户安全性，网站控件程序可以取得您电脑上的网卡、硬盘及CPU编码并进行加密绑定，在您登录的时候进行比对，以此来判断用户是否合法，达到提高帐户安全性的目的。
                            </p>
                        </div>
                        <div class="right_btn">
                            <?php if($s['mibaokacheck']==1){ ?>
                            <span class="STYLE2">已绑定</span>
                            <?php }else{ ?><font color=#ff0000>未绑定</font><?php } ?>
                            <input name="HMC" type="button" id="HMC" value="我要设置" class="btn_blue12_deep" onclick="javascript:location.href=&#39;&#39;">
                        </div>
                    </div>
                    <div class="content_center clearfix">
                        <div class="left_icon icon_safe3">
                            <h5>
                                IP绑定及验证</h5>
                            <p>
                                如果您是网吧或者有固定IP上网方式的用户，非常建议您使用此设置。在您登录平台时系统会判断是否为合法用户，并且在登录后的所有高安全需求的页面，也会对用户IP进行验证！</p>
                        </div>
                        <div class="right_btn">
                            <?php if($s['ipcheck']==1){ ?>
                            <span class="STYLE2">已绑定</span>
                            <?php }else{ ?><font color=#ff0000>未绑定</font><?php } ?>
                            <input name="IP" type="button" id="IP" value="我要设置" class="btn_blue12_deep" onclick="javascript:location.href=&#39;index.php?m=mod_agent&c=IPCheck&a=IP&#39;">
                      </div>
                    </div>
                    <div class="content_center clearfix">
                        <div class="left_icon icon_safe6">
                            <h5>
                                虚拟证书绑定</h5>
                            <p>
                                虚拟证书的好处是方便随时随地都可以使用，只要您将证书保存到安全的媒介上（如U盘等），不论您在家还是其他上网场所，都能使用证书安全的登录本平台。</p>
                        </div>
                        <div class="right_btn">
                             <?php if($s['mibaokacheck']==1){ ?>
                            <span class="STYLE2">已绑定</span>
                            <?php }else{ ?><font color=#ff0000>未绑定</font><?php } ?>
                            <input type="button" value="我要设置" class="btn_blue12_deep" onclick="javascript:location.href=&#39;&#39;">
                        </div>
                    </div>
                    <div class="content_center clearfix">
                        <div class="left_icon icon_safe5">
                            <h5>
                                易卡宝<span>强烈推荐！</span></h5>
                            <p>
                                移动硬件密保，适用于有高安全需求的用户。在登录、消费、转款时需要输入易卡宝上的动态密码（每15-60秒变动一次）。强烈建议网吧用户使用，请联系平台购买！</p>
                        </div>
                        <div class="right_btn">
                             <?php if($s['mibaokacheck']==1){ ?>
                            <span class="STYLE2">已绑定</span>
                            <?php }else{ ?><font color=#ff0000>未绑定</font><?php } ?>
                            <input name="btnIsUsbKey" type="button" id="btnIsUsbKey" value="我要设置" class="btn_blue12_deep" onclick="javascript:SafeLevel(this,&#39;&#39;)">
                        </div>
                    </div>
                    <div class="content_center clearfix" style="border-bottom: none">
                        <div class="left_icon icon_safe8">
                            <h5>
                                密保卡绑定</h5>
                            <p>
                                图型密保产品，适用于有高安全需求的用户。建议将密保图片保存在安全的媒介上（如U盘等），切记不可将图片直接保存在电脑上。</p>
                        </div>
                        <div class="right_btn">
                            <?php if($s['mibaokacheck']==1){ ?>
                            <span class="STYLE2">已绑定</span>
                            <?php }else{ ?><font color=#ff0000>未绑定</font><?php } ?>
                            <input name="btnIsPassCard" type="button" id="btnIsPassCard" value="我要设置" class="btn_blue12_deep" onclick="javascript:SafeLevel(this,&#39;index.php?m=mod_agent&c=MiBaoKa&a=Apply&#39;)">
                      </div>
                    </div>
                </td>
            </tr>
      </tbody></table>

        <script language="javascript" type="text/javascript">
            function SafeLevel(obj, url)
            {
                if (obj.setting == "no1")
                {
                    //绑定卡乐宝
                    alert("您已绑定易卡宝，请先取消后才能进行此项设置。");
                }
                else if (obj.setting == "no2")
                {
                    //绑定密保卡
                    alert("您已绑定了密保卡，请先取消后才能进行此项设置。");
                }
                else 
                {
                    location.href = url;
                }
            }
        </script>

    </form>


</body></html>