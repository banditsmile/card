<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tordno" => array( "width" => "135", "headHtml" => "���", "bodyHtml" => "{\$item['ordno']}" ),
				"tthisaction" => array( "width" => "80", "headHtml" => "����", "bodyHtml" => "{#TradeType(\$item['thisaction'])}" ),
				"tdollars" => array( "width" => "80", "headHtml" => "���({\$vd['lang']['moneyunit']})", "bodyHtml" => "{\$item['dollars']}" ),
				"tpayback" => array( "width" => "80", "headHtml" => "�ѻ�", "bodyHtml" => "{\$item['payback']}" ),
				"tnopayback" => array( "width" => "80", "headHtml" => "δ��", "bodyHtml" => "<!--echo \$item['dollars'] - \$item['payback'];-->" ),
				"treason" => array( "width" => "150", "headHtml" => "ԭ��", "bodyHtml" => "{\$item['reason']}" ),
				"totherside" => array( "width" => "60", "headHtml" => "�Է�", "bodyHtml" => "{\$item['otherside']}" ),
				"tcreatedate" => array( "width" => "140", "headHtml" => "���ʱ��", "bodyHtml" => "{\$item['createdate']}" ),
				"tdeadline" => array( "width" => "140", "headHtml" => "Լ������", "bodyHtml" => "{\$item['deadline']}" ),
				"tpaybackdate" => array( "width" => "140", "headHtml" => "����ʱ��", "bodyHtml" => "{\$item['paybackdate']}" )
);
?>
