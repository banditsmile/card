<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<style type="text/css">
body {
BACKGROUND:#fff;
MARGIN:0;
FONT:normal 12px 宋体;
}

input {
border:1px solid #ccc;
height:22px;
font-size:12px;
color:#252728;
padding:3px 0px 0px 6px;
BACKGROUND:#fff;
}
#preview_size_fake{
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
visibility:hidden;
}
</style>
</head>
<body>
<script type="text/javascript">
  function BuildBaseUrl( command )
  {
  	IsFlash();
    var sUrl =
      document.getElementById('cmbConnector').value +
      '?Command=' + command +
      '&Type=' + document.getElementById('cmbType').value +
      '&CurrentFolder=' + encodeURIComponent(document.getElementById('txtFolder').value) ;
    
    return sUrl ;
  }
  
  function IsFlash()
  {
  	obj = document.getElementById("txtFileUpload");
  	if( obj.value.match( /.swf/i ) ){
        document.getElementById("cmbType").value = "Flash";
        return true;
    }
    else
  	{
  		return false;
  	}
  } 
  
  function SetFrameUrl( url )
  {
    document.getElementById('eRunningFrame').src = url ;
  
    document.getElementById('eUrl').innerHTML = url ;
  }
  
  function GetFolders()
  {
    SetFrameUrl( BuildBaseUrl( 'GetFolders' ) ) ;
    return false ;
  }
  
  function GetFoldersAndFiles()
  {
    SetFrameUrl( BuildBaseUrl( 'GetFoldersAndFiles' ) ) ;
    return false ;
  }
  
  function CreateFolder()
  {
    var sFolder = prompt( 'Type the folder name:', 'Test Folder' ) ;
  
    if ( ! sFolder )
      return false ;
  
    var sUrl = BuildBaseUrl( 'CreateFolder' ) ;
    sUrl += '&NewFolderName=' + encodeURIComponent( sFolder ) ;
  
    SetFrameUrl( sUrl ) ;
    return false ;
  }
  
  function OnUploadCompleted( errorNumber, fileName )
  {
    switch ( errorNumber )
    {
      case 0 :
        SetFile(fileName);
        //alert( 'File uploaded with no errors' ) ;
        break ;
      case 201 :
        GetFoldersAndFiles() ;
        SetFile(fileName);
        //alert( 'A file with the same name is already available. The uploaded file has been renamed to "' + fileName + '"' ) ;
        break ;
      case 202 :
        alert( 'Invalid file' ) ;
        break ;
      default :
        alert( 'Error on file upload. Error number: ' + errorNumber ) ;
        break ;
    }
  }
  
  this.frames.frmUpload = this ;
  
  function SetAction()
  {
    var sUrl = BuildBaseUrl( 'FileUpload' ) ;
    document.getElementById('eUrl').innerHTML = sUrl ;
    document.getElementById('frmUpload').action = sUrl ;
  }
  
  function ShowImg(obj, imgid)
  {
    if( !obj.value.match( /.jpg|.gif|.png|.bmp|.swf/i ) ){
        alert('图片格式无效！');
        return false;
    }
    
    if( obj.files &&  obj.files[0] )
    {
      imgpath = obj.files[0].getAsDataURL();
      window.parent.document.getElementById(imgid).innerHTML = "<img src='" + imgpath + "' onload='<?php echo $vd['fun']; ?>(this)'/>";
    } 
    else if(!window.XMLHttpRequest) 
    {
      imgpath = obj.value;
      window.parent.document.getElementById(imgid).innerHTML = "<img src='" + imgpath + "' onload='<?php echo $vd['fun']; ?>(this)'/>";
    } 
    else 
    {
      imgpath = getValueIE8(obj);
      objPreviewSizeFake = document.getElementById('preview_size_fake' );
      window.parent.document.getElementById(imgid).filters.item(
            'DXImageTransform.Microsoft.AlphaImageLoader').src  = imgpath;
      objPreviewSizeFake.filters.item(
            'DXImageTransform.Microsoft.AlphaImageLoader').src = imgpath;

      autoSizePreview( window.parent.document.getElementById(imgid),
            objPreviewSizeFake.offsetWidth, objPreviewSizeFake.offsetHeight );
    }
  }
  
  function getValueIE8(obj)
  {
    obj.select();
    return document.selection.createRange().text;
  }
  
  function autoSizePreview( objPre, originalWidth, originalHeight )
  {
    objPre.style.width = originalWidth + 'px';
    objPre.style.height = originalHeight + 'px';
    objPre.style.marginTop = 0 + 'px';
    objPre.style.marginLeft = 0 + 'px';
  }

  function clacImgZoomParam( maxWidth, maxHeight, width, height )
  {
    var param = { width:width, height:height, top:0, left:0 };

    if( width>maxWidth || height>maxHeight )
    {
      rateWidth = width / maxWidth;
      rateHeight = height / maxHeight;

      if( rateWidth > rateHeight )
      {
        param.width =  maxWidth;
        param.height = height / rateWidth;
      }else{
        param.width = width / rateHeight;
        param.height = maxHeight;
      }
    }

    param.left = (maxWidth - param.width) / 2;
    param.top = (maxHeight - param.height) / 2;

    return param;
  }

  
  function SetFile(fname)
  {
    //get the name
    document.getElementById("uploadresult").innerHTML = "上传成功!路径：" + fname;
    var temp = fname.split('/');
    window.parent.document.getElementById("<?php echo $vd['inputid']; ?>").value = temp[temp.length-1];
  }
</script>
<form id="frmUpload" action="" target="eRunningFrame" method="post" enctype="multipart/form-data">
  <input id="txtFolder" type="hidden" value="<?php echo $vd['dirname']; ?>" name="txtFolder" />
  <input id="cmbType"   type="hidden" value="Image" name="cmbType" />
  <input id="txtFileUpload" type="file" name="NewFile" onchange="ShowImg(this, <?php echo $vd['imgid']; ?>)"/>
  <input type="submit" value="上传" onclick="SetAction();"/>
  <font color="#FF0000"><span id="uploadresult">* (请选择要上传的图片,然后点击上传按钮)</span></font>
</form>
<img id="preview_size_fake"/>
<span id="eUrl" style="display:none"></span>
<iframe id="eRunningFrame" src="javascript:void(0)" name="eRunningFrame" width="100%" style="display:none"></iframe>
<span id="eUrl" style="display:none"></span>
<input type="hidden" id="cmbConnector" name="cmbConnector" value="<?php echo $vd['connecter']; ?>" />
</body>
</html>
