<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"ttitle" => array( "width" => "150", "headHtml" => "<span class=\"canedit\">����</span>", "bodyHtml" => "<nobr><samp title=\"{\$item['title']}\"><span onclick=\"toInput(this,{\$item['id']},'title')\">{\$item['title']}</span></samp></nobr>" ),
				"tforb2b" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2b')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforb2c" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">��</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2c'])}\" onclick=\"toToggle(this,{\$item['id']},'forb2c')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tforykt" => array( "width" => "22", "headHtml" => "<span class=\"canedit\">һ</span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forykt'])}\" onclick=\"toToggle(this,{\$item['id']},'forykt')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>" ),
				"tisradio" => array( "width" => "60", "headHtml" => "<b>ͶƱ����</b>", "bodyHtml" => "<!--if(\$item['isradio']){-->��ѡ<!--}else{-->��ѡ<!--}-->" ),
				"tordering" => array( "width" => "35", "headHtml" => "<span class=\"canedit\">����</b>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'ordering')\">{\$item['ordering']}</span></nobr>" ),
				"thits" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">�����</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'hits')\">{\$item['hits']}</span></nobr>" ),
				"tcreatedate" => array( "width" => "140", "headHtml" => "<b>����ʱ��</b>", "bodyHtml" => "{\$item['createdate']}" ),
				"texpiration" => array( "width" => "140", "headHtml" => "<span class=\"canedit\">����ʱ��</span>", "bodyHtml" => "<nobr><span onclick=\"toInput(this,{\$item['id']},'expiration')\">{\$item['expiration']}</span></nobr>" )
);
?>
