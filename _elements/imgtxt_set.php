<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';?>
<script src="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elejs/'?>external/jquery.hotkeys.js"></script>
<link href="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elecss/'?>wysiwyg.css" rel="stylesheet">
<script src="<?php echo  $g['path_layout'].$d['layout']['dir'].'/elejs/'?>bootstrap-wysiwyg.js"></script>
<table class="table table-striped">
	<input type="hidden" name="type" value="<?php echo $eletype?>"/>
	<input type="hidden" name="title" value="<?php echo urldecode($eletitle)?>"/>
	<input type="hidden" name="uid" value="<?php echo $elekey['uid']?>"/>
	<input type="hidden" name="d_regis" value="<?php echo $elekey['d_regis']?>"/>
	<tbody>
		<tr>
			<td>컬럼넓이</td>
			<td>
				<select name="col">
				<?php for($k = 1; $k < 13; $k++):?>
				<option value="<?php echo $k?>"<?php if($elekey['col']==$k || (!$elekey['col']&&$k==4)):?> selected="selected"<?php endif?>>md-<?php echo $k?></option>
				<?php endfor?>
				</select>
			</td>
		</tr>
		<tr>
			<?php $imgpath = $elekey['imgpath']?$elekey['imgpath']:$g['path_file'].'wizes_sets';?>
			<input type="hidden" name="imgpath" value="<?php echo $imgpath?>"/>
			<input type="hidden" name="imgname" value="<?php echo $elekey['imgname']?>"/>
			<td>이미지 업로드</td>
			<td>
				<?php $imgregis = $elekey['img_regis']?$elekey['img_regis']:$date['totime'];?>
				<input type="hidden" name="img_regis" value="<?php echo $imgregis?>" />
				<input type="file" name="imgfile" id="img" />
				<div class="uploaded">
				<?php
		      	$img = $g['path_file'].'wizes_sets/'.$elekey['img_regis'].'_imgfile.png';
		      	if (file_exists($img)) {
		      		$IM = getimagesize($img);
				$width = $IM[0];
				$height= $IM[1];
				echo '<img src="'.$img.'" alt="logo" style="width:256px" /><br /><span class="fileinfo">넓이:'.$width.'px&nbsp;높이:'.$height.'px</span>';
				}
		      	?>
				</div>
			</td>
		</tr>
		<!--
		<tr>
			<td>이미지 위치</td>
			<td>
				<select name="position" id="position">
					<?php 
					$position = array('상단'=>'top','중간'=>'middle','하단'=>'bottom');
					foreach($position as $title => $p):
					?>
					<option value="<?php echo $p?>"<?php if($elekey['position']=='top'):?> selected="selected"<?php endif?>><?php echo $title?></option>
					<?php endforeach;?>
				</select>				
			</td>
		</tr>
		-->
		<tr>
			<td>링크</td>
			<td><input type="text" class="form-control input-sm" placeholder="이미지 링크주소" value="<?php echo urldecode($elekey['link'])?>" name="link"/></td>
		</tr>
		<tr>
			<td>새창에서?</td>
			<td>
				<select name="target" id="target">
					<option value="_self"<?php if($elekey['target']=='_self'):?> selected="selected"<?php endif?>>아니요</option>
					<option value="_blank"<?php if($elekey['target']=='_blank'):?> selected="selected"<?php endif?>>예</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
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
					  <?php echo urldecode($elekey['content'])?>
					</div>
				</section>
				<textarea name="content" id="content" cols="30" rows="10" class="hide"><?php echo urldecode($elekey['content'])?></textarea>
			</td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	
	$(function(){	
		
		$('input[name="imgfile"]').change(function() {
			var fime = $(this).attr('name');
			var d_regis = $(this).prev('input[name="img_regis"]').val();
			if(!d_regis) {var d_regis = '<?php echo $date['totime']?>';}
			$(this).upload(rooturl+'/?r='+raccount+'&_themePage=ajax/upload&fime=' + fime+'&d_regis='+d_regis, function(res) {
		  		var $reshtml = '<img src="' + res[0] + '" alt="logo" style="width:256px" /><br /><span class="fileinfo">파일이름:' + res[1] + '&nbsp;넓이:' + res[3] + 'px&nbsp;높이:' + res[3] + 'px</span>';
		  		$(this).closest('tr').find('input[name="imgname"]').val(res[1]);
		  		$(this).next('.uploaded').html($reshtml);
		  		$('.popover-content_'+fime).find('.uploaded').replaceWith($reshtml);
		  	}, 'json');
		});
		
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
	})
</script>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common_footer.php';?>