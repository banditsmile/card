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
				"tid" => array( "width" => "35", "headHtml" => "���", "bodyHtml" => "{\$item['id']}" ),
				"tyktlogo" => array( "width" => "230", "headHtml" => "һ��ͨ���", "bodyHtml" => "<img src=\"{\$item['website']}content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"tb2blogo" => array( "width" => "230", "headHtml" => "�������", "bodyHtml" => "<img src=\"{\$vd['root']}{\$item['admdir']}/content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"tb2clogo" => array( "width" => "230", "headHtml" => "���۵��", "bodyHtml" => "<img src=\"{\$item['website']}content/mod_b2b/images/mylogo.gif\" border=\"0\"/>" ),
				"taid" => array( "width" => "60", "headHtml" => "����", "bodyHtml" => "{\$item['aid']}" ),
				"twebname" => array( "width" => "100", "headHtml" => "����", "bodyHtml" => "{\$item['webname']}" ),
				"twebsite" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">��ַ</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['website']}\"><span onclick=\"toInput(this,{\$item['id']},'website')\">{\$item['website']}</span></samp></nobr>" ),
				"tupgrade" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<span onclick=\"upgradevip({\$item['aid']})\" style=\"cursor:pointer\">����</span>" ),
				"tsetup" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">��װ</span>", "bodyHtml" => "<span onclick=\"setupvip({\$item['aid']})\" style=\"cursor:pointer\">��װ</span>" )
);
?>
