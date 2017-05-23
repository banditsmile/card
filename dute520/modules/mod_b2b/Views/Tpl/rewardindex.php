<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"selecectbox" => array( "width" => "30", "headHtml" => "<input name=\"chkall\" type=\"checkbox\" class=\"checkbox\" onclick=\"CheckAll(this)\" onFocus=\"this.blur()\"/>", "bodyHtml" => "<input type=\"checkbox\" name=\"id[]\" class=\"checkbox\" value=\"{\$item['id']}\" onFocus=\"this.blur()\">" ),
				"tpname" => array( "width" => "250", "headHtml" => "<b>商品名称</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"tpid" => array( "width" => "60", "headHtml" => "<b>商品编号</b>", "bodyHtml" => "{\$item['pid']}" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>商品类型</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"tstate" => array( "width" => "60", "headHtml" => "<b>状态</b>", "bodyHtml" => "<!--if(\$item['sell']&&\$item['sell']){ echo '<font color=\"#0000ff\">销售</font>';}else{ echo '<font color=\"#0000ff\">停售</font>';}-->" ),
				"tlistprice" => array( "width" => "70", "headHtml" => "<b>面值</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"tprice" => array( "width" => "70", "headHtml" => "<b>进价</b>", "bodyHtml" => "{\$item['price']}" ),
				"tcprice" => array( "width" => "70", "headHtml" => "<b>售价</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"treward" => array( "width" => "70", "headHtml" => "<b>返点比例</b>", "bodyHtml" => "{\$item['reward']}" )
);
?>
