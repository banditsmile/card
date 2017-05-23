<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"id" => array( "width" => "50", "headHtml" => "编号", "bodyHtml" => "{\$item['id']}" ),
				"tsn" => array( "width" => "250", "headHtml" => "序列号", "bodyHtml" => "{\$item['sn']}" ),
				"createdate" => array( "width" => "150", "headHtml" => "创建时间", "bodyHtml" => "{\$item['createdate']}" ),
				"bindinfo" => array( "width" => "150", "headHtml" => "绑定信息", "bodyHtml" => "<!--if(\$item['staffid'] > 0 && \$item['aid'] > 0){-->用户{\$item['aid']}的员工{\$item['staffid']}<!--echo \$item['mibaokacheck']==0 ? '(<font color=\"#cccccc\">未生效</font>)' : '(<font color=\"#0000ff\">已生效</font>)' ;--><!--}else if(\$item['aid']>0){-->用户{\$item['aid']}<!--echo \$item['mibaokacheck']==0 ? '(<font color=\"#cccccc\">未生效</font>)' : '(<font color=\"#0000ff\">已生效</font>)' ;--><!--}else if(\$item['aid']==0 && \$item['staffid']>0){-->管理员{\$item['staffid']}<!--echo \$item['adminmibaokacheck']==0 ? '(<font color=\"#cccccc\">未生效</font>)' : '(<font color=\"#0000ff\">已生效</font>)' ;--><!--}else{-->[<span class=\"bind\" onclick=\"setbind({\$item['sn']})\"><img src=\"{\$vd['sc']}images/bind.gif\" alt=\"绑定密保卡\"></span>]<font color=\"#cccccc\">未绑定</font><!--}-->" )
);
?>
