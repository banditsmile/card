<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$tabletpl = array(
				"tpids" => array( "width" => "250", "headHtml" => "<span class=\"canedit\">��Ʒ���</span>(���ǰ��Ҫ�а�ǵĶ���)", "bodyHtml" => "<nobr><samp title=\"{\$item['pids']}\"><span onclick=\"toInput(this,{\$item['id']},'pids')\">{\$item['pids']}</span></samp></nobr>" ),
				"tidx" => array( "width" => "60", "headHtml" => "<span class=\"canedit\">����ֵ</span>", "bodyHtml" => "<span onclick=\"toInput(this,{\$item['id']},'idx')\">{\$item['idx']}</span>" ),
				"tparam" => array( "width" => "150", "headHtml" => "<b>��������</b>", "bodyHtml" => "<a href=\"index.php?m=mod_b2b&c=Right&stype=param&keywords={\$item['param']}\">{#TxtByOption(\$vd['params'],\$item['param'])}</a>" ),
				"tisok" => array( "width" => "60", "headHtml" => "<b>Ȩ��</b>", "bodyHtml" => "<!--if(\$item['isok'] == 1){--><a href=\"index.php?m=mod_b2b&c=Right&stype=isok&keywords={\$item['isok']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#008800\">����</font></a><!--}else{--><a href=\"index.php?m=mod_b2b&c=Right&stype=isok&keywords={\$item['isok']}\" title=\"����鿴��Ӧ״̬����\"><font color=\"#ff0000\">������</font></a><!--}-->" )
);
?>
