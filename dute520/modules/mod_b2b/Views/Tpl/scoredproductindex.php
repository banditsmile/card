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
				"stocks" => array( "width" => "50", "headHtml" => "<span class=\"canedit\">�ɻ�����</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'stocks')\"><!--echo \$item['stocks']==''?'0':\$item['stocks'];--></span>" ),
				"stocks" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">�ɻ�����</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'stocks')\"><!--echo \$item['stocks']==''?'0':\$item['stocks'];--></span>" ),
				"scored" => array( "width" => "90", "headHtml" => "<span class=\"canedit\">�����������</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'scored')\"><!--echo \$item['scored']==''?'0':\$item['scored'];--></span>" ),
				"scoredb2c" => array( "width" => "90", "headHtml" => "<span class=\"canedit\">�����������</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'scoredb2c')\"><!--echo \$item['scoredb2c']==''?'0':\$item['scoredb2c'];--></span>" ),
				"method" => array( "width" => "80", "headHtml" => "<b>�һ�����</b>", "bodyHtml" => "{\$vd['method'][\$item['method']]}" ),
				"param" => array( "width" => "80", "headHtml" => "<span class=\"canedit\">�һ�����</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['pid']},'param')\"><!--echo \$item['param']==''?'0':\$item['param'];--></span>" ),
				"pid" => array( "width" => "40", "headHtml" => "<b>���</b>", "bodyHtml" => "{\$item['pid']}" ),
				"forb2b" => array( "width" => "22", "headHtml" => "<span class=\"canedit\"><u>��</u></span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2b'])}\" onclick=\"toToggle(this,{\$item['pid']},'forb2b')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2B" ),
				"forb2c" => array( "width" => "22", "headHtml" => "<span class=\"canedit\"><u>��</u></span>", "bodyHtml" => "<img src=\"{\$vd['sc']}{#ToggleImgSrc(\$item['forb2c'])}\" onclick=\"toToggle(this,{\$item['pid']},'forb2c')\" alt=\"�����ͼƬ�����޸�״̬\" onFocus=\"this.blur()\" class=\"mousehand\"/>", "str" => "UB_B2C" )
);
?>
