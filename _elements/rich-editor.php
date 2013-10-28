<script src="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elejs/'?>external/jquery.hotkeys.js"></script>
<link href="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elecss/'?>wysiwyg.css" rel="stylesheet">
<script src="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elejs/'?>bootstrap-wysiwyg.js"></script>
<!---
Please read this before copying the toolbar:

* One of the best things about this widget is that it does not impose any styling on you, and that it allows you 
* to create a custom toolbar with the options and functions that are good for your particular use. This toolbar
* is just an example - don't just copy it and force yourself to use the demo styling. Create your own. Read 
* this page to understand how to customise it:
* https://github.com/mindmup/bootstrap-wysiwyg/blob/master/README.md#customising-
--->
<section id="reditor">
	<div id="alerts"></div>
	<div class="btn-toolbar panel col-md-12" data-role="editor-toolbar" data-target="#editor">
	  <div class="btn-group btn-group-xs">
		<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="폰트"><i class="fa fa-font"></i>&nbsp;<b class="fa fa-angle-down"></b></a>
		<ul class="dropdown-menu">
		</ul>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="폰트크기"><i class="fa fa-text-height"></i>&nbsp;<b class="fa fa-angle-down"></b></a>
	      <ul class="dropdown-menu">
	      	<?php for($k=1;$k<8;$k++):?>
	        <li><a data-edit="fontSize <?php echo $k?>"><font size="<?php echo $k?>">크기 <?php echo $k?></font></a></li>
	        <?php endfor;?>
	      </ul>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="제목"><i class="fa fa-text-width"></i>&nbsp;<b class="fa fa-angle-down"></b></a>
	      <ul class="dropdown-menu">
	      	<?php for($k=1;$k<7;$k++):?>
	        <li><a data-edit="formatBlock h<?php echo $k?>"><h<?php echo $k?>>h<?php echo $k?></h<?php echo $k?>></a></li>
	        <?php endfor;?>
	      </ul>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs" data-edit="bold" title="굵게 (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
	    <a class="btn btn-xs" data-edit="italic" title="이탤릭 (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
	    <a class="btn btn-xs" data-edit="strikethrough" title="취소선"><i class="fa fa-strikethrough"></i></a>
	    <a class="btn btn-xs" data-edit="underline" title="밑줄 (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="폰트컬러"><i class="fa fa-font color"></i>&nbsp;<b class="fa fa-angle-down"></b></a>
	    	<?php $fontcolor = array('7bd148','5484ed','a4bdfc','46d6db','7ae7bf','51b749','fbd75b','f92935','dc2127','dbadff','dbadff','e1e1e1');?>
	      <ul class="dropdown-menu">
	      	<?php foreach($fontcolor as $F):?>
	        <li style="background:#<?php echo $F?>"><a data-edit="foreColor #<?php echo $F?>"><span>#<?php echo $F?></span></a></li>
	        <?php endforeach;?>
	      </ul>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs" data-edit="insertunorderedlist" title="글머리 목록"><i class="fa fa-list-ul"></i></a>
	    <a class="btn btn-xs" data-edit="insertorderedlist" title="번호 매기기"><i class="fa fa-list-ol"></i></a>
	    <a class="btn btn-xs" data-edit="outdent" title="내어쓰기 (Shift+Tab)"><i class="fa fa-indent"></i></a>
	    <a class="btn btn-xs" data-edit="indent" title="들어쓰기 (Tab)"><i class="fa fa-outdent"></i></a>
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs" data-edit="justifyleft" title="왼쪽 맞춤 (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
	    <a class="btn btn-xs" data-edit="justifycenter" title="중앙 맞춤 (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
	    <a class="btn btn-xs" data-edit="justifyright" title="오릊쪽 맞춤 (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
	    <a class="btn btn-xs" data-edit="justifyfull" title="양쪽 맞춤 (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
	  </div>
	  <div class="btn-group btn-group-xs">
		<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="하이퍼링크"><i class="fa fa-link"></i></a>
	    <div class="dropdown-menu">
	    	<div class="input-group input-group-sm">
		      <input type="text" class="form-control" placeholder="URL" type="text" data-edit="createLink">
		      <span class="input-group-btn">
		        <button class="btn btn-primary" type="button">추가</button>
		      </span>
		    </div><!-- /input-group -->
	    </div>
	    <a class="btn btn-xs" data-edit="unlink" title="하이퍼링크 지우기"><i class="fa fa-cut"></i></a>
	
	  </div>
	  
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs" title="그림 삽입 (아니면 마우스로 끌어다 놓으세요.)" id="pictureBtn"><i class="glyphicon glyphicon-picture"></i></a>
	    <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
	  </div>
	  <div class="btn-group btn-group-xs">
	    <a class="btn btn-xs" data-edit="undo" title="취소 (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
	    <a class="btn btn-xs" data-edit="redo" title="반복 (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
	  </div>
	  <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
	</div>
	<div class="clearfix"></div>
	<div id="editor" class="col-md-12">
	  Go ahead&hellip;
	</div>
</section>
  
<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=폰트]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
  });
</script>