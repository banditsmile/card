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
				"tpname" => array( "width" => "250", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\">{\$item['pname']}</samp></nobr>" ),
				"tpid" => array( "width" => "60", "headHtml" => "<b>��Ʒ���</b>", "bodyHtml" => "{\$item['pid']}" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"tstate" => array( "width" => "60", "headHtml" => "<b>״̬</b>", "bodyHtml" => "<!--if(\$item['sell']&&\$item['sell']){ echo '<font color=\"#0000ff\">����</font>';}else{ echo '<font color=\"#0000ff\">ͣ��</font>';}-->" ),
				"tlistprice" => array( "width" => "70", "headHtml" => "<b>��ֵ</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"tprice" => array( "width" => "70", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['price']}" ),
				"tcprice" => array( "width" => "70", "headHtml" => "<b>�ۼ�</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"treward" => array( "width" => "70", "headHtml" => "<b>�������</b>", "bodyHtml" => "{\$item['reward']}" )
);
?>
