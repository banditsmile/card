<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"taid" => array( "width" => "100", "headHtml" => "�û����", "bodyHtml" => "{\$item['aid']}" ),
				"tcredit" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">���ö�</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'credit')\">{\$item['credit']}</span></nobr>" ),
				"tisvalid" => array( "width" => "100", "headHtml" => "<span class=\"canedit\">�Զ�����</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['isvalid'])}\" onclick=\"toToggle(this,{\$item['id']},'isvalid')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
