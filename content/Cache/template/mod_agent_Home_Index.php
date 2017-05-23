<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<head>

<title>账户基本资料设置</title>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<link href="../Themes/css/style_home.css" rel="stylesheet" type="text/css">

<table cellspacing="1" cellpadding="2" class="table1">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                基本资料修改           </th>

            </div>

  	<form name="modify1" method="post" action="index.php?m=mod_agent&c=home&a=save">

</div>

	<div class="main5" id="main5">

	  <table width="100%" cellpadding="0" cellspacing="1" class="table1">

        <tr>

          <td width="11%" class="table1_left" style="width: 25%"> 客户编号：</td>

          <td width="89%" align="left" class="tableright1"><div align="left">10000</div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 登陆账号：</td>

          <td width="89%" align="left" class="tableright1"><div align="left">admin</div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 真实姓名：</td>

          <td align="left" class="tableright1"><div align="left">

            <input name='ubzcrealname' type='text' class='biankuan' id="ubzcrealname" tabindex="2" value="站长" size='30' maxlength='50' datatype="Mobile" msg="手机号码不正确" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 公 司 名： </td>

          <td align="left" class="tableright1"><div align="left">

            <input name='ubzcompany' type='text' class='biankuan' id="ubzcompany" tabindex="2" value="站长" size='30' maxlength='50' datatype="Mobile" msg="手机号码不正确" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 销售范围：</td>

          <td align="left" class="tableright1"><div align="left">

              <input type="hidden" name="prv" size="10" value="四川"/>

              <input type="hidden" name="city" size="10" value="成都"/>

              <input type='text' size='30' maxlength='50' name='ttdata' class='biankuan' value="四川" readonly="readonly" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 手机号码：</td>

          <td width="89%" align="left" class="tableright1"><div align="left">

            <input type='text' size='30' maxlength='50' name='ubzcmobile' value="" class='biankuan' datatype="Mobile" msg="手机号码不正确" tabindex="2" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 电子邮箱：</td>

          <td width="89%" align="left" class="tableright1"><div align="left">

            <input type='text' size='30' maxlength='50' name='ubzcmail' value="" class='biankuan' datatype="Email" msg="电子邮箱格式不符" tabindex="5" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 联系电话：</td>

          <td align="left" class="tableright1"><div align="left">

            <input type='text' size='30' maxlength='50' name='ubzctel' value="" class='biankuan' datatype="Phone" msg="联系电话不符合要求" tabindex="1" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 联系QQ：</td>

          <td align="left" class="tableright1"><div align="left">

            <input type='text' size='30' maxlength='50' name='ubzcqq' value="11111" class='biankuan' datatype="QQ" msg="QQ号码不符合要求" tabindex="4" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 联系地址：</td>

          <td align="left" class="tableright1"><div align="left">

            <input type='text' size='30' maxlength='50' name='ubzcaddr' value="" class='biankuan' datatype="LimitB" min="1" max="100" msg="联系地址必须在100个汉字之内" tabindex="3" />

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 超级密码：</td>

          <td align="left" class="tableright1"><div align="left">

              <input type="password" name="superpwd" size="30" class='biankuan'/>

          </div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 其它操作：</td>

          <td align="left" class="tableright1"><div align="left">

            <input name="submit" type="submit" class="tijiao_input" tabindex="7" value="确认" />

            <em>|</em><a href="javascript:" onclick="parent.Dialog.win({title:'修改登录密码',iframe:{src:'index.php?m=mod_agent&amp;a=ModifyPass'},width:600,height:300});"> <span id="modifypwd">修改登录密码</span></a><em>|</em><a href="javascript:" onclick="parent.Dialog.win({title:'修改交易密码',iframe:{src:'index.php?m=mod_agent&amp;a=TradePass'},width:600,height:300});"> <span id="modifytradepwd">修改交易密码</span></a></div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 关联QQ账号：</td>

          <td align="left" class="tableright1"><div align="left">11111</div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 关联淘宝账号：</td>

          <td align="left" class="tableright1"><div align="left">未关联</div></td>

        </tr>

        <tr>

          <td class="table1_left" style="width: 25%"> 关联新浪微博账号：</td>

          <td align="left" class="tableright1"><div align="left">未关联</div></td>

        </tr>

      </table>
    </fieldset>
    <fieldset id="fieldset2">
        <legend><span style=" color:Black;">财务信息</span></legend>
        <table cellspacing="0" cellpadding="0" class="table88">
            <tr>
                <td class="td1">
                    账户总额：
                </td>
                <td>
                    <span id="lblTotalAmount"><span id="lblQQ0"><span id="lblPhone2">
                    <span id="lblContactName6"><span id="lblCompanyName7">
                    <span id="lblCustomerName8"><span id="lblCustomerID9">
                    <span id="lblmoney">0.000</span>
                    </span></span></span></span></span></span></span>
                    &nbsp;元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    可用金额：
                </td>
                <td>
                    <span id="lblBalance"><span id="lblTotalAmount0"><span id="lblQQ1">
                    <span id="lblPhone3"><span id="lblContactName7"><span id="lblCompanyName8">
                    <span id="lblCustomerName9"><span id="lblCustomerID10">
                    <span id="lblcanPay">0.000</span>
                    </span></span></span></span></span></span></span></span>&nbsp;元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    冻结金额：
                </td>
                <td>
                    <span id="lblFrozen"><span id="lblBalance0"><span id="lblTotalAmount1">
                    <span id="lblQQ2"><span id="lblPhone4"><span id="lblContactName8">
                    <span id="lblCompanyName9"><span id="lblCustomerName10">
                    <span id="lblCustomerID11">
                    <span id="lblDongJie">0.000</span>
                    </span></span></span></span></span></span></span></span></span>&nbsp;元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    未还欠款：
                </td>
                <td>
                    <span id="lblTransfer">0.000</span>
                    元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    一卡通未返款：
                </td>
                <td>
                    <span id="lblReturnMoney">0.000</span>
                    元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    供货商品提成：
                </td>
                <td>
                    <span id="lblIncome"><span id="lblBalance1"><span id="lblTotalAmount2">
                    <span id="lblQQ3"><span id="lblPhone5"><span id="lblContactName9">
                    <span id="lblCompanyName10"><span id="lblCustomerName11">
                    <span id="lblCustomerID12">
                    <span id="lblTiChen">0.000</span>
                    </span></span></span></span></span></span></span></span></span>
                    元
                </td>
            </tr>
            <tr>
                <td class="td1">
                    信用欠款上限：
                </td>
                <td>
                    <span id="lblCreditAmount">信用欠款关闭</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    积分：
                </td>
                <td>
                    <span id="lblScore">0</span>
                    个
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset id="fieldset3">
        <legend><span style=" color:Black;">系统权限</span></legend>
        <table cellspacing="0" cellpadding="0" class="table88">
            <tr>
                <td class="td1">
                    Api进货接口：
                </td>
                <td>
                    <span id="lblApi">未开通</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    淘宝C店对接：
                </td>
                <td>
                    <span id="lblTBC">未开通</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    拍拍C店对接：
                </td>
                <td>
                    未开通
                </td>
            </tr>
            <tr>
                <td class="td1">
                    充值卡充值权限：
                </td>
                <td>
                    <span id="lblIsForOneCard">有</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    淘宝加款卡充值权限：
                </td>
                <td>
                    <span id="lblTBCCardPay">有</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    一卡通代理权限：
                </td>
                <td>
                    <span id="lblIsForOneCardCash">有</span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    供货商品发布权限：
                </td>
                <td>
                    <span id="lblIsForSelfProduct"><span id="lblBalance2">
                    <span id="lblTotalAmount3"><span id="lblQQ4"><span id="lblPhone6">
                    <span id="lblContactName10"><span id="lblCompanyName11">
                    <span id="lblCustomerName12"><span id="lblCustomerID13">
                    <span id="lblGongHuoShang">有</span>
                    </span></span></span></span></span></span></span></span></span>
                &nbsp;</td>
            </tr>
            <tr>
                <td class="td1">
                    账户间转款权限：
                </td>
                <td>
                    <span id="lblTransferBalance">有</span>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset id="fieldset4">
        <legend><span style=" color:Black;">自定义设置</span></legend>
        <table cellspacing="0" cellpadding="0" class="table88">
            <tr>
                <td class="td1">
                    页面超时退出时间：
                </td>
                <td>
                    <span id="lblTimeOut">120</span>分钟
                </td>
            </tr>
            <tr>
                <td class="td1">
                    自定义设置：
                </td>
                <td>
                    <span disabled="disabled"><input id="CheckBox1" type="checkbox" name="CheckBox1" checked="checked" /><label for="CheckBox1">购买时显示进货价格</label></span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                </td>
                <td>
                    <span disabled="disabled"><input id="CheckBox2" type="checkbox" name="CheckBox2" checked="checked" disabled="disabled" /><label for="CheckBox2">报表显示进价相关价格</label></span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                </td>
                <td>
                    <span disabled="disabled"><input id="CheckBox3" type="checkbox" name="CheckBox3" checked="checked" disabled="disabled" /><label for="CheckBox3">菜单中是否显示帐户余额</label></span>
                </td>
            </tr>
            <tr>
                <td class="td1">
                </td>
                <td>
                                    </td>
            </tr>
        </table>
    </fieldset>
    

<script type="text/javascript">
//<![CDATA[
    parent.GetBalance();//]]>
</script>
</form>
</body>
</html>

<script type="text/javascript" id="tailjs-10125109_31685" sogou-script="true" src="https://BCC0E825-2420-4190-AF25-ABD45D41EA3A/sb/exttailcontentscript/?sbid=tailjs-10125109_31685&isTopFrame=false&url=http%3a%2f%2fwww.v5ka.com%2fIndex.aspx%23index" charset="UTF-8"></script>

