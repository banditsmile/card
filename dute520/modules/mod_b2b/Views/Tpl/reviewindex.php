<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tid" => array( "width" => "35", "headHtml" => "���", "bodyHtml" => "{\$item['id']}" ),
				"tsubject" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['subject']}\"><span onclick=\"toInput(this,{\$item['id']},'subject')\">{\$item['subject']}</span></samp></nobr>" ),
				"tagree" => array( "width" => "50", "headHtml" => "<b>ͬ����</b>", "bodyHtml" => "{\$item['agree']}" ),
				"tdisagree" => array( "width" => "60", "headHtml" => "<b>��ͬ����</b>", "bodyHtml" => "{\$item['disagree']}" ),
				"tmarks" => array( "width" => "30", "headHtml" => "<b>����</b>", "bodyHtml" => "{\$item['marks']}" ),
				"tpid" => array( "width" => "50", "headHtml" => "<b>��Ʒ</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Review&stype=pid&keywords={\$item['pid']}\">{\$item['pid']}</a>" ),
				"treviewer" => array( "width" => "80", "headHtml" => "<b>������</b>", "bodyHtml" => "{\$item['reviewer']}" ),
				"tcreatedate" => array( "width" => "150", "headHtml" => "<b>ʱ��</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"tchecked" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['checked'])}\" onclick=\"toToggle(this,{\$item['id']},'checked')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" )
);
?>
