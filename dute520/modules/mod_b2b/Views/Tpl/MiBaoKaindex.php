<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"id" => array( "width" => "50", "headHtml" => "���", "bodyHtml" => "{\$item['id']}" ),
				"tsn" => array( "width" => "250", "headHtml" => "���к�", "bodyHtml" => "{\$item['sn']}" ),
				"createdate" => array( "width" => "150", "headHtml" => "����ʱ��", "bodyHtml" => "{\$item['createdate']}" ),
				"bindinfo" => array( "width" => "150", "headHtml" => "����Ϣ", "bodyHtml" => "<!--if(\$item['staffid'] > 0 && \$item['aid'] > 0){-->�û�{\$item['aid']}��Ա��{\$item['staffid']}<!--echo \$item['mibaokacheck']==0 ? '(<font color=\"#cccccc\">δ��Ч</font>)' : '(<font color=\"#0000ff\">����Ч</font>)' ;--><!--}else if(\$item['aid']>0){-->�û�{\$item['aid']}<!--echo \$item['mibaokacheck']==0 ? '(<font color=\"#cccccc\">δ��Ч</font>)' : '(<font color=\"#0000ff\">����Ч</font>)' ;--><!--}else if(\$item['aid']==0 && \$item['staffid']>0){-->����Ա{\$item['staffid']}<!--echo \$item['adminmibaokacheck']==0 ? '(<font color=\"#cccccc\">δ��Ч</font>)' : '(<font color=\"#0000ff\">����Ч</font>)' ;--><!--}else{-->[<span class=\"bind\" onclick=\"setbind({\$item['sn']})\"><img src=\"{\$vd['sc']}images/bind.gif\" alt=\"���ܱ���\"></span>]<font color=\"#cccccc\">δ��</font><!--}-->" )
);
?>
