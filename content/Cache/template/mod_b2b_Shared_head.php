<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title id="AgentSiteName"><?php echo $vd['web']['title']; ?></title>
    <meta id="AgentDescription" name="description" content="<?php echo $vd['web']['description']; ?>"></meta>
    <meta id="AgentKeyWords" name="keywords" content="<?php echo $vd['web']['keywords']; ?>"></meta>
    
    <link href="http://www.liyunkm.com/webblack/css/global.css" rel="stylesheet" type="text/css" />
    <link href="http://www.liyunkm.com/webblack/css/css.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript">
        var AgentQian = "webblack";
    </script>
</head>
<body id="nav_btn01">
    <form name="loginForm" action="<?php echo $vd['root']; ?>index.php?m=mod_b2b&a=login" autocomplete="off" method="post"  onSubmit="return formCheck()">

<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTA4OTkwNTQ1MA9kFgoCAQ8WAh4JaW5uZXJodG1sBWDliKnkupHljaHnm5985Y2h55uf5o6S6KGM5qacfOesrOS4gOWNoeebn3zljaHnm5/ku6PnkIZ85Y2h55uf5bmz5Y+wfOWNoeebn+S5i+eItnzljaHkuZDotK3lubPlj7BkAgMPFgIeB2NvbnRlbnQFtALliKnkupHljaHnm5/lubPlj7DmmK/ljaHnm5/mjpLooYzmppznrKzkuIAs5piv5YWo5Zu95pyA5aSn5pyA5by65pyA5LiT5Lia55qE5Y2h55uf572R56uZLOS4gOS4quS4uueUqOaIt+aPkOS+m+acgOS+v+aNtyzov4XpgJ/lvIDljZXnp5LljZUs5pyA5LiT5Lia5pyN5Yqh55qE5Y2h55uf5bmz5Y+wLOS4muWKoTLmipjotbcs546w5q2j54Gr54iG5oub5pS25Y2h55uf5Luj55CG5ZWGLOivmumAgeS7o+eQhizkuJPms6jljaHnm5/mlbDlrZflubPlj7As5pyN5Yqh5bm/5aSn5Y2h55uf6KGM5Lia5Yib5Lia6ICFLOWFqOWbveefpeWQjeWTgeeJjGQCBQ8WAh8BBVjljaHnm5985Yip5LqR5Y2h55uffOWNoeebn+aOkuihjOamnHznrKzkuIDljaHnm5985Y2h55uf5Luj55CGfOWNoeebn+W5s+WPsHzljaHnm5/kuYvniLZ8ZAIJD2QWEGYPFgIeBXN0eWxlBWNiYWNrZ3JvdW5kOnVybCguLi9pbWFnZXMyL3d3d19saXl1bmttX2NvbS8zYzQzMzYwOWIxNWY0M2ViODIxNjJkZGYwNjJmZGU2ZS5wbmcpIG5vLXJlcGVhdCAyMHB4IDUwJTtkAgIPZBYCZg8WAh4EaHJlZgUXaHR0cDovL2xpeXVua20uMThrbS5jbi9kAgMPFgIeBFRleHQFowI8ZGQ+PGEgaHJlZj0iaHR0cDovL2xpeXVua20udGFvYmFvLmNvbS8iIHJlbD0ibm9mb2xsb3ciPjxzcGFuPuaLjeaLjeWKoOasvuWumOe9kTwvc3Bhbj48L2E+PC9kZD48ZGQ+PGEgaHJlZj0iaHR0cDovL2xpeXVua20udGFvYmFvLmNvbSAiIHJlbD0ibm9mb2xsb3ciPjxzcGFuPua3mOWuneWKoOasvuWumOe9kTwvc3Bhbj48L2E+PC9kZD48ZGQ+PGEgaHJlZj0iaHR0cDovL2xpeXVua20uMThrbS5jbi9qaWZlbi8iIHJlbD0ibm9mb2xsb3ciPjxzcGFuPuenr+WIhuWFkeaNouWVhuW6lzwvc3Bhbj48L2E+PC9kZD5kAgQPFgIfAAWVGDxzY3JpcHQ+d2luZG93Ll9iZF9zaGFyZV9jb25maWc9eyJjb21tb24iOnsiYmRTbnNLZXkiOnt9LCJiZFRleHQiOiIiLCJiZE1pbmkiOiIyIiwiYmRNaW5pTGlzdCI6ZmFsc2UsImJkUGljIjoiIiwiYmRTdHlsZSI6IjAiLCJiZFNpemUiOiIxNiJ9LCJzbGlkZSI6eyJ0eXBlIjoic2xpZGUiLCJiZEltZyI6IjEiLCJiZFBvcyI6InJpZ2h0IiwiYmRUb3AiOiIxMDAifSwiaW1hZ2UiOnsidmlld0xpc3QiOlsicXpvbmUiLCJ0cXEiLCJ3ZWl4aW4iLCJ0cWYiLCJxcSIsInNxcSJdLCJ2aWV3VGV4dCI6IuWIhuS6q+WIsO+8miIsInZpZXdTaXplIjoiMTYifSwic2VsZWN0U2hhcmUiOnsiYmRDb250YWluZXJDbGFzcyI6bnVsbCwiYmRTZWxlY3RNaW5pTGlzdCI6WyJxem9uZSIsInRxcSIsIndlaXhpbiIsInRxZiIsInFxIiwic3FxIl19fTt3aXRoKGRvY3VtZW50KTBbKGdldEVsZW1lbnRzQnlUYWdOYW1lKCdoZWFkJylbMF18fGJvZHkpLmFwcGVuZENoaWxkKGNyZWF0ZUVsZW1lbnQoJ3NjcmlwdCcpKS5zcmM9J2h0dHA6Ly9iZGltZy5zaGFyZS5iYWlkdS5jb20vc3RhdGljL2FwaS9qcy9zaGFyZS5qcz92PTg5ODYwNTkzLmpzP2NkbnZlcnNpb249Jyt+KC1uZXcgRGF0ZSgpLzM2ZTUpXTs8L3NjcmlwdD4NCjxhIA0KPGEgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9Imh0dHA6Ly9tYWlsLnFxLmNvbS9jZ2ktYmluL3FtX3NoYXJlP3Q9cW1fbWFpbG1lJmVtYWlsPXFjUEF5TWZPMnR6RndORGN4X25md05tSDJOaUh5c2JFIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOm5vbmU7Ij48aW1nIHNyYz0iaHR0cDovL3Jlc2Nkbi5xcW1haWwuY29tL3poX0NOL2h0bWxlZGl0aW9uL2ltYWdlcy9mdW5jdGlvbi9xbV9vcGVuL2ljb19tYWlsbWVfMTIucG5nIi8+PC9hPg0KPGlmcmFtZSBpZD0icHJldmlld21jIiBzcmM9Imh0dHA6Ly9mb2xsb3cudi50LnFxLmNvbS9pbmRleC5waHA/Yz1mb2xsb3cmYT1xdWljayZuYW1lPXd3dzIyNTI1MTU3NTgmc3R5bGU9MSZ0PTEzNTM3ODQxMzY1MTUmZj0xIiB3aWR0aD0iMjI3IiBoZWlnaHQ9Ijc1IiBmcmFtZWJvcmRlcj0iMCIgc2Nyb2xsaW5nPSJubyIgYWxsb3d0cmFuc3BhcmVuY3k9InRydWUiIHN0eWxlPSJtYXJnaW46MCBhdXRvOyI+PC9pZnJhbWU+DQo8ZGl2IGlkPSJGbG93U3RhdGlzdGljczEiIHN0eWxlPSJ3aWR0aDogMHB4OyBoZWlnaHQ6IDBweDsgbWFyZ2luOiAwcHggYXV0bzsiPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQo8IS0tDQphOmxpbmsgew0KY29sb3I6ICM2Njk5MzM7DQp0ZXh0LWRlY29yYXRpb246IG5vbmU7DQp9DQphOnZpc2l0ZWQgew0KdGV4dC1kZWNvcmF0aW9uOiBub25lOw0KY29sb3I6ICMwMDAwRkY7DQp9DQphOmhvdmVyIHsNCnRleHQtZGVjb3JhdGlvbjogbm9uZTsNCmNvbG9yOiAjRkYwMDAwOw0KfQ0KYTphY3RpdmUgew0KdGV4dC1kZWNvcmF0aW9uOiBub25lOw0KY29sb3I6ICNGRjAwRkY7DQp9DQpib2R5LHRkLHRoIHsNCmNvbG9yOiAjMDAwMEZGOw0KfQ0KLS0+DQo8L3N0eWxlPjxzcGFuIHN0eWxlPSJjb2xvcjogI0REMzAyMyI+DQo8c3BhbiBzdHlsZT0iZm9udC1zaXplOiAyNHB4Ij4NCjxzcGFuIHN0eWxlPSJmb250LXNpemU6IDE0cHgiPg0KPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZTogMTZweCI+DQo8TUFSUVVFRSBzdHlsZT0iTEVGVDogMjcwcHg7IFBPU0lUSU9OOiBhYnNvbHV0ZTsgVE9QOiA1NXB4OyBXSURUSDogMTAwMHB4OyBIRUlHSFQ6IDI1cHgiIHNjcm9sbEFtb3VudD0zIHNjcm9sbERlbGF5PTEwIGRpcmVjdGlvbj1sZWZ0ID4NCjxzdHJvbmc+PGEgDQpocmVmPSJodHRwOi8vd3d3LmxpeXVua20uY29tL3dlYmJsYWNrL0hlbHAuYXNweCIgdGFyZ2V0PSJfYmxhbmsiPuaCqOWlvSzmrKLov47mnaXliLDliKnkupHljaHnm58sMjAxNOW5tOacgOe7meWKm+WNoeebn+W5s+WPsCzllYblk4HkuI3mlq3mm7TmlrAs6YCf5bqm5LiN5pat6LaF6LaKLOWUruWQjuS4jeaWreWKoOW8uizku7fmoLzkuI3mlq3liJvpgKDlhajnvZHmnIDkvY7ku7cs5oiR5Lus5pa96KGM5YWN6LS55Yi25bqmLOmAgeS7o+eQhizpgIHpkrss6YCB56uZ6ZW/LOWFqOe9keWUr+S4gOS4gOWutuWunuaWveWuouaIt+iHs+S4iueahOWNoeebn+W5s+WPsCzotoXotoroh6rlt7Es6LaF6LaK5qKm5oOz77yB5pCt5bu65YiG56uZLOWBmuiHquW3seeahOWNoeebn+W5s+WPsOWPqumcgDM1MOWFg+WNs+WPr+W+l+WIsO+8iOW5s+WPsOWItuW6pu+8muaJi+acuuWinuWAvOS4muWKoTPlsI/ml7blhoXmnKrlvIDljZXljrvlubPlj7Dnu7TmnYPlhajpop3pgIDmrL4tN+Wwj+aXtuWGheayoeacieihpeWNlSznlLPor7flubPlj7Dnu7TmnYPlhajpop3pgIDmrL4s5q2j5bi45oOF5Ya15oiR5Lus5bmz5Y+w5Y2V5Y2V56eS5ZOm77yB57uZ5Yqb77yB44CC44CCPC9hPjw+DQo8L01BUlFVRUU+PC9zcGFuPiA8L3NwYW4+IDwvc3Bhbj4gPC9zcGFuPjwvZGl2Pg0KDQo8c2NyaXB0PndpbmRvdy5fYmRfc2hhcmVfY29uZmlnPXsiY29tbW9uIjp7ImJkU25zS2V5Ijp7fSwiYmRUZXh0IjoiIiwiYmRNaW5pIjoiMiIsImJkTWluaUxpc3QiOmZhbHNlLCJiZFBpYyI6IiIsImJkU3R5bGUiOiIwIiwiYmRTaXplIjoiMTYifSwic2xpZGUiOnsidHlwZSI6InNsaWRlIiwiYmRJbWciOiIxIiwiYmRQb3MiOiJyaWdodCIsImJkVG9wIjoiMTAwLjUifSwiaW1hZ2UiOnsidmlld0xpc3QiOlsicXpvbmUiLCJzcXEiLCJ0cXEiLCJyZW5yZW4iLCJ3ZWl4aW4iLCJiZHhjIiwidHNpbmEiLCJoaSJdLCJ2aWV3VGV4dCI6IuWIhuS6q+WIsO+8mnFxIiwidmlld1NpemUiOiIxNiJ9LCJzZWxlY3RTaGFyZSI6eyJiZENvbnRhaW5lckNsYXNzIjpudWxsLCJiZFNlbGVjdE1pbmlMaXN0IjpbInF6b25lIiwic3FxIiwidHFxIiwicmVucmVuIiwid2VpeGluIiwiYmR4YyIsInRzaW5hIiwiaGkiXX19O3dpdGgoZG9jdW1lbnQpMFsoZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ2hlYWQnKVswXXx8Ym9keSkuYXBwZW5kQ2hpbGQoY3JlYXRlRWxlbWVudCgnc2NyaXB0JykpLnNyYz0naHR0cDovL2JkaW1nLnNoYXJlLmJhaWR1LmNvbS9zdGF0aWMvYXBpL2pzL3NoYXJlLmpzP3Y9ODk4NjA1OTMuanM/Y2RudmVyc2lvbj0nK34oLW5ldyBEYXRlKCkvMzZlNSldOzwvc2NyaXB0PmQCBQ8WAh8ABZgJPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIF9iZGhtUHJvdG9jb2wgPSAoKCJodHRwczoiID09IGRvY3VtZW50LmxvY2F0aW9uLnByb3RvY29sKSA/ICIgaHR0cHM6Ly8iIDogIiBodHRwOi8vIik7DQpkb2N1bWVudC53cml0ZSh1bmVzY2FwZSgiJTNDc2NyaXB0IHNyYz0nIiArIF9iZGhtUHJvdG9jb2wgKyAiaG0uYmFpZHUuY29tL2guanMlM0ZkNDE4MDY2MjcwOTRhZGIyNDNjZjJhZDQ3ODZiNzI3NScgdHlwZT0ndGV4dC9qYXZhc2NyaXB0JyUzRSUzQy9zY3JpcHQlM0UiKSk7DQo8L3NjcmlwdD4NCjxhIA0KaHJlZj0iaHR0cDovL3dlYnNjYW4uMzYwLmNuL2luZGV4L2NoZWNrd2Vic2l0ZS91cmwvd3d3LmxpeXVua20uY29tIj48aW1nIGJvcmRlcj0iMCIgc3JjPSJodHRwOi8vaW1nLndlYnNjYW4uMzYwLmNuL3N0YXR1cy9wYWkvaGFzaC83MjhjZTEzYTQ0NTAxMjcyY2IxMDhlMmI0NGQ1YjliNiIvPjwvYT4NCjxtZXRhIG5hbWU9ImNoaW5hei1zaXRlLXZlcmlmaWNhdGlvbiIgY29udGVudD0iZmFiNmUzYWUtMTU0NS00MWVhLWIwYTAtMjIxNDkxOTA0M2NkIiAvPg0KPGEgaHJlZj0iaHR0cDovL3poYW56aGFuZy5hbnF1YW4ub3JnL3BoeXNpY2FsL3JlcG9ydC8/ZG9tYWluPXd3dy5saXl1bmttLmNvbSIgbmFtZT0ieEtDNUdNSjFjWGJKSUtCUkJkVFVqZkdQbjVrYjZTRm55cTA5eFREdU83V2U0dXNzQXAiPjxpbWcgaGVpZ2h0PSI0NyIgc3JjPSJodHRwOi8vemhhbnpoYW5nLmFucXVhbi5vcmcvc3RhdGljL2NvbW1vbi9pbWFnZXMvemhhbnpoYW5nLnBuZyJhbHQ9IuWuieWFqOiBlOebn+ermemVv+W5s+WPsCIgLz48L2E+DQo8c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+dmFyIGNuenpfcHJvdG9jb2wgPSAoKCJodHRwczoiID09IGRvY3VtZW50LmxvY2F0aW9uLnByb3RvY29sKSA/ICIgaHR0cHM6Ly8iIDogIiBodHRwOi8vIik7ZG9jdW1lbnQud3JpdGUodW5lc2NhcGUoIiUzQ3NwYW4gaWQ9J2Nuenpfc3RhdF9pY29uXzEwMDAwNDU3MjQnJTNFJTNDL3NwYW4lM0UlM0NzY3JpcHQgc3JjPSciICsgY256el9wcm90b2NvbCArICJzMjIuY256ei5jb20vel9zdGF0LnBocCUzRmlkJTNEMTAwMDA0NTcyNCUyNm9ubGluZSUzRDElMjZzaG93JTNEbGluZScgdHlwZT0ndGV4dC9qYXZhc2NyaXB0JyUzRSUzQy9zY3JpcHQlM0UiKSk7PC9zY3JpcHQ+ZAIGDxYCHwAFYOWIqeS6keWNoeebn3zljaHnm5/mjpLooYzmppx856ys5LiA5Y2h55uffOWNoeebn+S7o+eQhnzljaHnm5/lubPlj7B85Y2h55uf5LmL54i2fOWNoeS5kOi0reW5s+WPsGQCBw8WAh8ABR7liKnkupHnvZHnu5zmioDmnK/mnInpmZDlhazlj7hkAggPFgIfAAUW6IuPSUNQ5aSHMTMwNjMwMDjlj7ctMWQCCw8WAh8ABaUGPGEgaHJlZj0iaHR0cDovL3d3dy5jaWt1NS5jb20iIHRpdGxlPSLor43lupPnvZEiIHRhcmdldD0iX2JsYW5rIj7or43lupPnvZE8L2E+DQo8YSBocmVmPWh0dHA6Ly93d3cuenpsei5uZXQ+6L+e6YCa5LiW55WM5b+X6L6+5aSp5LiLPC9hPg0KPGEgaHJlZj1odHRwOi8vd3d3Ljk5OXRuYi5jb20+5aSn56CB5aWz6KOF5ZOB54mMPC9hPg0KPGEgaHJlZj1odHRwOi8vd3d3LnpneGN3Lm9yZz7mnLXku6Xlrpjmlrnml5foiLDlupc8L2E+DQo8YSBocmVmPWh0dHA6Ly93d3cuZ29vZG5ld3N0YXJ0LmNvbT7og5bkurrmnI3ppbDnvZE8L2E+DQo8YSBocmVmPWh0dHA6Ly93d3cuamlueXcuY29tPuWuieW5s+WQpzwvYT4NCjxhIGhyZWY9aHR0cDovL3d3dy53ZWl5aW5na2UubmV0PuWFjei0uTEwR+epuumXtDwvYT4NCjxhIGhyZWY9aHR0cDovL3d3dy5iYWliYW81OC5jb20+4pml55m+5a6d4pml5ZWG5Z+O4pmlPC9hPg0KPGEgaHJlZj1odHRwOi8vd3d3LnNvcGhwLm1sPue6pOiIkue+jjwvYT4NCjxhIGhyZWY9aHR0cDovL3d3dy50aWFubWFvbmV0Lm5ldD7lpKnnjKvnvZE8L2E+DQo8YSBocmVmPSJodHRwOi8vd3d3LjE4a213LmNvbS9zZF83OTkuaHRtIiB0YXJnZXQ9Il9ibGFuayI+PGltZyBzcmM9Imh0dHA6Ly93d3cuMThrbXcuY29tL2xvZ28ucG5nIiBhbHQ9IuW3suiiqzE45Y2h55uf5a+86Iiq5pS25b2VIiAvPjwvYT48YSBjbGFzcz0nanViYW8nIGhyZWY9J2h0dHA6Ly93d3cua2FsZWdvdS5jb20vanViYW8uaHRtJyB0YXJnZXQ9J19ibGFuayc+PGltZyBzcmM9Jy4uL2ltYWdlcy9pY29uX2p1YmFvLnBuZyc+PC9hPmRktwgLJMQ6DABP6WhTGqquzDF7ZBI=" />
</div>

    <div class="header">
        <dl class="header">
            <dt style="display: none;">��ӭ����admin<a href="###">�ҵ��ʻ�</a><a href="###" class="red_a">��ֵ</a><em>|</em><a
                href="###">����0��</a><a href="###" class="phone_a">�ֻ���</a><a href="###">���ֶһ� </a>
            </dt>
            <dd>
                <a href="javascript:" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage(location.href);">
                    ��Ϊ��ҳ</a><a onclick="window.external.addFavorite('http://'+document.domain, 

document.title);" href="javascript:">�����ղ�</a><a <?php if($g_action=='Homecj'){ ?>class="on"<?php } ?> href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=Homecj&name=<?php echo urlencode('����ϵͳ��������'); ?>">��������</a></dd>
        </dl>
    </div>
    <?php endͷ�ļ� ?>
    <div class="header_c">
        <div class="header_c_t">
            <a href="index.php">
                <div id="AgentLogo" class="logo" style="background:url(<?php echo $vd['content']; ?>images/mylogo.gif) no-repeat 20px 50%;">
                </div>
            </a>
            <?php end��־ ?>
            <div class="header_r">
                <ul class="h_tool_nav th red_link">
                    <li id="liAgent" class="n_1"><a id="A1">����ƽ̨ </a></li>
                    <li id="liYKT" class="n_2"><a href="http://www.xybss.com.cn/" id="YKTCncUrl" target="_blank">
                        һ��ͨ</a></li>
                </ul>
            </div>
            <?php endͷ�ļ��� ?>
        </div>
        <?php endͷ�ļ������� ?>
    </div>
    <?php endͷ�ļ��� ?>
    <div class="nav">
        <dl class="nav th">
            <dd id="nav_hover01">
                <a href="<?php if(isset($vd['agent'][7])){ ?><?php echo $vd['root']; ?>index.php?m=mod_b2b&a=home<?php }else{ ?><?php echo $vd['root']; ?><?php if(UB_DEFAULT!='b2b'){ ?><?php if($vd['vip'] > 0){ ?>index.php?m=mod_<?php } ?>b2b<?php } ?><?php } ?>">�� ҳ</a></dd>
            <dd id="nav_hover02">
                <a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&a=reg">�û�ע��</a></dd>
            <dd id="nav_hover03">
                <a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=article&a=home&name=<?php echo urlencode('����ϵͳ����'); ?>">������Ϣ</a></dd>
            <dd id="nav_hover04">
                <a href="<?php echo $vd['root']; ?>index.php?m=mod_b2b&c=Article&a=Homecj&name=<?php echo urlencode('����ϵͳ��������'); ?>">��������</a></dd>
            <dd><a href="http://52yma.taobao.com/" rel="nofollow"><span>���ļӿ����</span></a></dd><dd><a href="http://52yma.taobao.com " rel="nofollow"><span>�Ա��ӿ����</span></a></dd><dd><a href="http://www.xybss.com.cn/" rel="nofollow"><span>���ֶһ��̵�</span></a></dd>
        </dl>
    </div>