<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tordno" => array( "width" => "135", "headHtml" => "借据", "bodyHtml" => "{\$item['ordno']}" ),
				"tthisaction" => array( "width" => "80", "headHtml" => "类型", "bodyHtml" => "{#TradeType(\$item['thisaction'])}" ),
				"tdollars" => array( "width" => "80", "headHtml" => "金额({\$vd['lang']['moneyunit']})", "bodyHtml" => "{\$item['dollars']}" ),
				"tpayback" => array( "width" => "80", "headHtml" => "已还", "bodyHtml" => "{\$item['payback']}" ),
				"tnopayback" => array( "width" => "80", "headHtml" => "未还", "bodyHtml" => "<!--echo \$item['dollars'] - \$item['payback'];-->" ),
				"treason" => array( "width" => "150", "headHtml" => "原因", "bodyHtml" => "{\$item['reason']}" ),
				"totherside" => array( "width" => "60", "headHtml" => "对方", "bodyHtml" => "{\$item['otherside']}" ),
				"tcreatedate" => array( "width" => "140", "headHtml" => "借款时间", "bodyHtml" => "{\$item['createdate']}" ),
				"tdeadline" => array( "width" => "140", "headHtml" => "约定还款", "bodyHtml" => "{\$item['deadline']}" ),
				"tpaybackdate" => array( "width" => "140", "headHtml" => "还款时间", "bodyHtml" => "{\$item['paybackdate']}" )
);
?>
