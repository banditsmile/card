<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"staffid" => array( "width" => "50", "headHtml" => "编号", "bodyHtml" => "{\$item['staffid']}" ),
				"staffname" => array( "width" => "80", "headHtml" => "员工名", "bodyHtml" => "{\$item['staffname']}" ),
				"bossid" => array( "width" => "100", "headHtml" => "老板编号", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=staff&stype=aid&keywords={\$item['bossid']}\" title=\"查看{\$item['bossid']}的所有员工\">{\$item['bossid']}</a>" )
);
?>
