
		<Script Language="JavaScript" type="text/JavaScript" src="<?php echo $vd['content']; ?>js/jsPage.js"></Script>
		<Script Language="JavaScript" type="text/JavaScript">
				var s= new Cls_jsPage(<?php echo $vd['totlerow']; ?>,<?php echo $vd['nrows']; ?>,3,"s");
		s.setPageSE("page=","");
		s.setPageInput("page");
		s.setUrl("");
		s.setPageFrist("��ҳ","��ҳ");
		s.setPagePrev("��һҳ","��һҳ");
		s.setPageNext("��һҳ","��һҳ");
		s.setPageLast("ĩҳ","ĩҳ");
		s.setPageText("{%PageNum}","{%PageNum}");
		s.setPageTextF(" {%PageTextF} "," {%PageTextF} ");
		s.setPageSelect("{%PageNum}","{%PageNum}");
		s.setHtml("�� {%RecCount} ��¼ ҳ��{%Page}/{%PageCount} ÿҳ{%PageSize}�� {%PageFrist} {%PagePrev} {%PageText} {%PageNext} {%PageLast} {%PageInput} {%PageSelect}");
		s.setPageCss("","","");
		s.Write();
		</Script>
