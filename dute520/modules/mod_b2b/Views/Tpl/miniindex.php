<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tordering" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'ordering')\">{\$item['ordering']}</span></nobr>" ),
				"twords" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">�ı�</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'name')\">{\$item['name']}</span>" ),
				"tisdefault" => array( "width" => "45", "headHtml" => "<span class=\"canedit\">Ĭ��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['isdefault'])}\" onclick=\"toToggle(this,{\$item['id']},'isdefault')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
