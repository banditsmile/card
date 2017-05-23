
		<Script Language="JavaScript" type="text/JavaScript" src="<?php echo $vd['content']; ?>js/jsPage.js"></Script>
		<Script Language="JavaScript" type="text/JavaScript">
				var s= new Cls_jsPage(<?php echo $vd['totlerow']; ?>,<?php echo $vd['nrows']; ?>,3,"s");
		s.setPageSE("page=","");
		s.setPageInput("page");
		s.setUrl("");
		s.setPageFrist("首页","首页");
		s.setPagePrev("上一页","上一页");
		s.setPageNext("下一页","下一页");
		s.setPageLast("末页","末页");
		s.setPageText("{%PageNum}","{%PageNum}");
		s.setPageTextF(" {%PageTextF} "," {%PageTextF} ");
		s.setPageSelect("{%PageNum}","{%PageNum}");
		s.setHtml("共 {%RecCount} 记录 页次{%Page}/{%PageCount} 每页{%PageSize}条 {%PageFrist} {%PagePrev} {%PageText} {%PageNext} {%PageLast} {%PageInput} {%PageSelect}");
		s.setPageCss("","","");
		s.Write();
		</Script>
