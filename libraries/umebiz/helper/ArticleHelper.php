<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function ubb2html( $R63bede6b19 )
{
				$R63bede6b19 = strip_tags( $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[b]([^\\[]*)\\[/b\\]", "<b>\\1</b>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[i]([^\\[]*)\\[/i\\]", "<i>\\1</i>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[u]([^\\[]*)\\[/u\\]", "<u>\\1</u>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[center]([^\\[]*)\\[/center\\]", "<center>\\1</center>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[code]([^\\[]*)\\[/code\\]", "<pre>\\1</pre>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[url]http://([^\\[]*)\\[/url\\]", "<a href='http://\\1' target='_blank'>\\1</a>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[url]([^\\[]*)\\[/url\\]", "<a href='http://\\1' target='_blank'>\\1</a>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[color=([^\\[]*)\\]([^\\[]*)\\[/color\\]", "<font color='\\1'>\\2</font>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[url=http://([^\\[]*)\\]([^\\[]*)\\[/url\\]", "<a href='http://\\1' target='_blank'>\\2</a>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[url=([^\\[]*)\\]([^\\[]*)\\[/url\\]", "<a href='http://\\1' target='_blank'>\\2</a>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[email=([^\\[]*)\\]([^\\[]*)\\[/email\\]", "<a href='mailto:\\1'>\\2</a>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[img]([^\\[]*)\\[/img\\]", "<img src='\\1' border=0>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "quote\\]", "quote]", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[quote\\]\\r\\n", "<blockquote><smallfont>Quote:</smallfont><hr>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[quote\\]", "<blockquote><smallfont>Quote:</smallfont><hr>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[/quote\\]\\r\\n", "<hr></blockquote>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[/quote\\]", "<hr></blockquote>", $R63bede6b19 );
				echo nl2br( $R63bede6b19 );
}

function ubbcode( $R63bede6b19, $vd = array( ) )
{
				echo decodeubb( $R63bede6b19, $vd );
}

function decodeubb( $R63bede6b19, $vd = array( ) )
{
				$R63bede6b19 = eregi_replace( "\\%", "%", $R63bede6b19 );
				$R6be6994799 = "网站临时会话";
				if ( isset( $vd['web']['webname'] ) )
				{
								$R1a1fdd68d3 = "\\[webname\\]";
								$R63bede6b19 = eregi_replace( $R1a1fdd68d3, $vd['web']['webname'], $R63bede6b19 );
								$R1a1fdd68d3 = "\\[website\\]";
								$R63bede6b19 = eregi_replace( $R1a1fdd68d3, $vd['web']['website'], $R63bede6b19 );
								$R6be6994799 = $vd['web']['webname'];
				}
				$R1a1fdd68d3 = "\\[img\\](http|https|ftp):\\/\\/(.[^\\[]*)\\[\\/img\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a onfocus=\"this.blur()\" href=\"\\1://\\2\" target=new><img src=\"\\1://\\2\" border=\"0\" alt=\"按此在新窗口浏览图片\" onload=\"javascript:if(this.width>screen.width-333)this.width=screen.width-333\"></a>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[img=*([0-9]*),*([0-9]*)\\](http|https|ftp):\\/\\/(.[^\\[]*)\\[\\/img\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a onfocus=\"this.blur()\" href=\"\\3://\\4\" target=new><img src=\"\\3://\\4\" border=\"0\"  width=\"\\1\" heigh=\"\\2\" alt=\"按此在新窗口浏览图片\" onload=\"javascript:if(this.width>screen.width-333)this.width=screen.width-333\"></a>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[url,0=(.[^\\[]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a href=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "(\\[url\\])(.[^\\[]*)(\\[url\\])";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a href=\"\\2\" target=\"_blank\">\\2</a>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[url=(.[^\\[]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a href=\"\\1\" target=\"_blank\">", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[email=([^\\[]*)\\]([^\\[]*)\\[/email\\]", "<a href='mailto:\\1'>\\2</a>", $R63bede6b19 );
				$R1a1fdd68d3 = "(\\[email\\])(.*?)(\\[\\/email\\])";
				$R1a1fdd68d3 = "\\[email=(.[^\\[]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a href=\"mailto:\\1\" target=\"new\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[qq=([0-9]*)\\]([0-9]*)\\[\\/qq\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a target=\"new\" href=\"tencent://message/?uin=\\2&Site=".$R6be6994799."&Menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=1:\\2:\\1\" alt=\"点击这里给我发消息\"></a>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[qq\\]([0-9]*)\\[\\/qq\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<a target=\"new\" href=\"tencent://message/?uin=\\1&Site=".$R6be6994799."&Menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=1:\\1:8\" alt=\"点击这里给我发消息\"></a>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[color=(.[^\\[]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<font color=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[font=(.[^\\[]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<font face=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[size=([0-9]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<font size=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[size=([0-9]*)pt\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<font size=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[size=([0-9]*)px\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<font size=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[align=(center|left|right)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<div align=\"\\1\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[table=(.[^\\[]*)[\\%]*\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<table width=\"\\1%\" border=\"1\" class=\"cTable\" bordercolor=\"#cccccc\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[td=([0-9]*),([0-9]*),([0-9]*)([\\%]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<td colspan=\"\\1\" rowspan=\"\\2\" width=\"\\3%\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[td=([0-9]*),([0-9]*)\\]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<td colspan=\"\\1\" rowspan=\"\\2\" width=\"\\3%\">", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[i\\]((.|\\n)*?)\\[\\/i\\]";
				$R63bede6b19 = eregi_replace( "\\[i]([^\\[]*)\\[/i\\]", "<i>\\1</i>", $R63bede6b19 );
				$R1a1fdd68d3 = "(\\[flash\\])(http://.[^\\[]*(.swf))(\\[\\/flash\\])";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<center><object codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" width=\"480\" height=\"400\"><param name=\"movie\" value=\"\\2\"><param name=\"quality\" value=\"high\"><embed src=\"\\2\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash\" type=\"application/x-shockwave-flash\" width=\"480\" height=\"400\">\\2</embed></object><p><a href=\"\\2\" target=\"new\">[全屏欣赏]</a></p></center>", $R63bede6b19 );
				$R1a1fdd68d3 = "(\\[flash=*([0-9]*),*([0-9]*)\\])(http://.[^\\[]*(.swf))(\\[\\/flash\\])";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<center><object codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" width=\"\\2\" height=\"\\3\"><param name=\"movie\" value=\"\\4\"><param name=quality value=high><embed src=\"\\4\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash\" type=\"application/x-shockwave-flash\" width=\"\\2\" height=\"\\3\">\\4</embed></object><p><a href=\"\\4\" target=\"new\">[全屏欣赏]</a></p></center>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[wmv\\](.[^\\[]*)\\[\\/wmv]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<object align=\"middle\" classid=\"clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95\" class=\"object\" id=\"mediaplayer\" width=\"300\" height=\"200\" ><param name=\"showstatusbar\" value=\"-1\"><param name=\"filename\" value=\"\\1\"><embed type=\"application/x-oleobject\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#version=5,1,52,701\" flename=\"mp\" src=\"\\1\"  width=\"300\" height=\"200\"></embed></object>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[wmv=*([0-9]*),*([0-9]*)\\](.[^\\[]*)\\[\\/wmv]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<object align=\"middle\" classid=\"clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95\" class=\"object\" id=\"mediaplayer\" width=\"\\1\" height=\"\\2\" ><param name=\"showstatusbar\" value=\"-1\"><param name=\"filename\" value=\"\\3\"><embed type=\"application/x-oleobject\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#version=5,1,52,701\" flename=\"mp\" src=\"\\3\"  width=\"\\1\" height=\"\\2\"></embed></object>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[rm\\](.[^\\[]*)\\[\\/rm]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<object classid=\"clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa\" class=\"object\" id=\"raocx\" width=\"300\" height=\"200\"><param name=\"src\" value=\"\\1\"><param name=\"console\" value=\"clip1\"><param name=\"controls\" value=\"imagewindow\"><param name=\"autostart\" value=\"true\"></object><br><object classid=\"clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa\" height=\"32\" id=\"video2\" width=\"300\"><param name=\"src\" value=\"\\1\"><param name=\"autostart\" value=\"-1\"><param name=\"controls\" value=\"controlpanel\"><param name=\"console\" value=\"clip1\"></object>", $R63bede6b19 );
				$R1a1fdd68d3 = "\\[rm=*([0-9]*),*([0-9]*)\\](.[^\\[]*)\\[\\/rm]";
				$R63bede6b19 = eregi_replace( $R1a1fdd68d3, "<object classid=\"clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa\" class=\"object\" id=\"raocx\" width=\"\\1\" height=\"\\2\"><param name=\"src\" value=\"\\3\"><param name=\"console\" value=\"clip1\"><param name=\"controls\" value=\"imagewindow\"><param name=\"autostart\" value=\"true\"></object><br><object classid=\"clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa\" height=\"32\" id=\"video2\" width=\"\\1\"><param name=\"src\" value=\"\\3\"><param name=\"autostart\" value=\"-1\"><param name=\"controls\" value=\"controlpanel\"><param name=\"console\" value=\"clip1\"></object>", $R63bede6b19 );
				$R63bede6b19 = eregi_replace( "\\[code]([^\\[]*)\\[/code\\]", "<pre>\\1</pre>", $R63bede6b19 );
				$R1ae132dbd8 = array( "[/url]", "[/email]", "[/color]", "[/size]", "[/font]", "[/align]", "[b]", "[/b]", "[u]", "[/u]", "[list]", "[list=1]", "[list=a]", "[list=A]", "[*]", "[/list]", "[indent]", "[/indent]", "[code]", "[/code]", "[quote]", "[/quote]", "[tr]", "[td]", "[/td]", "[/tr]", "[/table]" );
				$R390ce5783f = array( "</a>", "</a>", "</font>", "</font>", "</font>", "</div>", "<b>", "</b>", "<u>", "</u>", "<ul>", "<ol type=1>", "<ol type=a>", "<ol type=A>", "<li>", "</ul></ol>", "<blockquote>", "</blockquote>", "<div><textarea name=\"codes\" id=\"codes\" rows=\"12\" cols=\"65\">", "</textarea><br/><input type=\"button\" value=\"运行代码\" onclick=\"RunCode()\"> <input type=\"button\" value=\"复制代码\" onclick=\"CopyCode()\"> <input type=\"button\" value=\"另存代码\" onclick=\"SaveCode()\"> <input type=\"button\" value=\"跳&nbsp;&nbsp;转\" onclick=\"Goto(prompt(\"请输入要跳转到第几行？\",\"1\"))\"  accesskey=\"g\"> &nbsp;提示：您可以先修改部分代码再运行</div>", "<div style=\"background:#E2F2FF;margin:0 auto;width:90%;height:auto;border:1px solid #3CAAEC;padding:5px;\">", "</div>", "<tr>", "<td>", "</td>", "</tr>", "</table>" );
				
				for ( $Ra16d228039 = 0;	$Ra16d228039 < count( $R1ae132dbd8 );	$Ra16d228039++	)
				{
								$R63bede6b19 = str_replace( $R1ae132dbd8[$Ra16d228039], $R390ce5783f[$Ra16d228039], $R63bede6b19 );
				}
				$R63bede6b19 = str_replace( "\r\n", "<br/>", $R63bede6b19 );
				return $R63bede6b19;
}

if ( !defined( "UPATH_ROOT" ) )
{
				exit( "hacking deny" );
}
?>
