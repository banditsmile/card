<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"staffid" => array( "width" => "50", "headHtml" => "���", "bodyHtml" => "{\$item['staffid']}" ),
				"staffname" => array( "width" => "80", "headHtml" => "Ա����", "bodyHtml" => "{\$item['staffname']}" ),
				"bossid" => array( "width" => "100", "headHtml" => "�ϰ���", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=staff&stype=aid&keywords={\$item['bossid']}\" title=\"�鿴{\$item['bossid']}������Ա��\">{\$item['bossid']}</a>" )
);
?>
