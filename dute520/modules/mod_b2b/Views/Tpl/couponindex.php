<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tpid" => array( "width" => "35", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['pid']}" ),
				"tpname" => array( "width" => "200", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['pid']},'pname')\">{\$item['pname']}</span></nobr>" ),
				"tlistprice" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">��ֵ</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['pid']},'listprice')\">{\$item['listprice']}</span></nobr>" ),
				"tsell" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">ʹ��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['sell'])}\" onclick=\"toToggle(this,{\$item['pid']},'sell')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
