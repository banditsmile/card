<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"pname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">��Ʒ����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['pname']}\"><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></samp></nobr>" ),
				"tptype" => array( "width" => "65", "headHtml" => "<b>��Ʒ����</b>", "bodyHtml" => "{#ProductType(\$item['ptype'])}" ),
				"listprice" => array( "width" => "65", "headHtml" => "<span class=\"canedit\">��Ʒ��ֵ</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'listprice')\">{\$item['listprice']}</span>" ),
				"price" => array( "width" => "65", "headHtml" => "<span class=\"canedit\">������</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'price')\">{\$item['price']}</span>" ),
				"sell" => array( "width" => "22", "headHtml" => "<b>��</b>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"priceset" => array( "width" => "85", "headHtml" => "<b>�Ƿ��ж���</b>", "bodyHtml" => "<!--if(\$item['priceset'] > 0){--> �ж��� <!--}else{--> <font color=\"#cccccc\">�޶���</font> <!--}-->" ),
				"setprice" => array( "width" => "50", "headHtml" => "<b>����</b>", "bodyHtml" => "[<a href=\"?m=mod_b2b&c=product&a=price&pid={\$item['pid']}\"><font color=\"#00875A\">����</font></a>]" ),
				"privatepriceset" => array( "width" => "85", "headHtml" => "<b>�Ƿ����ܼ�</b>", "bodyHtml" => "<!--if(\$item['privatepriceset'] > 0){--> ���ܼ� <a href=\"javascript:PPClear('{\$item['pid']}')\">���</a><!--}else{--> <font color=\"#cccccc\">���ܼ�</font><!--}-->" ),
				"setprivateprice" => array( "width" => "50", "headHtml" => "<b>�ܼ�</b>", "bodyHtml" => "[<a href=\"?m=mod_b2b&c=product&a=PP&pid={\$item['pid']}\"><font color=\"#00875A\">�ܼ�</font></a>]" )
);
?>
