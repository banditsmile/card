<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"pname" => array( "width" => "200", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span>" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"sell" => array( "width" => "22", "headHtml" => "<b>��</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"listprice" => array( "width" => "65", "headHtml" => "<b>��Ʒ��ֵ</b>", "bodyHtml" => "{\$item['listprice']}" ),
				"price" => array( "width" => "65", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['price']}" ),
				"sup" => array( "width" => "65", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['aid']}" )
);
?>
