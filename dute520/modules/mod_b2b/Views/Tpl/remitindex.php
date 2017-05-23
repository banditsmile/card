<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"account" => array( "width" => "150", "headHtml" => "<b>汇款帐号</b>", "bodyHtml" => "{\$account}" ),
				"accountname" => array( "width" => "100", "headHtml" => "<b>帐户名</b>", "bodyHtml" => "{\$accountname}" ),
				"bank" => array( "width" => "70", "headHtml" => "<b>汇款银行</b>", "bodyHtml" => "{\$bank}" ),
				"msgfrom" => array( "width" => "120", "headHtml" => "<b>汇款客户</b>", "bodyHtml" => "{\$item['hope']}({#DisplayCode(\$item['msgfrom'])})" ),
				"ordno" => array( "width" => "65", "headHtml" => "<b>汇款金额</b>", "bodyHtml" => "{\$item['ordno']}" ),
				"otherdate" => array( "width" => "140", "headHtml" => "<b>汇款时间</b>", "bodyHtml" => "{\$item['otherdate']}" ),
				"deal" => array( "width" => "45", "headHtml" => "<b>状态</b>", "bodyHtml" => "<!--if(\$item['msgstate']==1){--><font color=\"#ff0000\">未处理</font><!--}else{--><font color=\"#0000ff\">已处理</font><!--}-->" ),
				"msgto" => array( "width" => "65", "headHtml" => "<b>银行所属</b>", "bodyHtml" => "<!--if(\$item['msgto'] == 0){--><font color=\"#ff0000\">系统</font><!--}else{--><font color=\"#0000ff\">{#DisplayCode(\$item['msgto'],4)}</font><!--}-->" )
);
?>
