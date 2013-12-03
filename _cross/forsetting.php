<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">Modal title</h4>
	    </div>
	    <div class="modal-body">
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
	      <button type="button" class="btn btn-primary">요소 추가</button>
	    </div>
	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
<!-- Pop Over -->
<div class="hide">
	<div class="popover-content_theme">
		<?php
		$_tmpdfile = $g['path_layout'].$d['layout']['dir'].'/_var/_var.php';
		$d['layout'] = array();
		include $_tmpdfile;
		
		$fp = fopen($_tmpdfile,'r');
		fclose($fp);
		?>
		<?php
		$_themes = array('amelia','cerulean','cosmo','cyborg','default','flatly','journal','readable','simplex','slate','spacelab','United','yeti');
		?>
		<div class="list-group theme-group">
			<?php $i=0;foreach($_themes as $T):?>
		  <a href="javascript:;" class="list-group-item theme-item<?php if($d['layout']['theme']==$T):?> active<?php endif?>" data-loadtheme="<?php echo $T?>">
		  	<?php echo $T?>
		  </a>
		  <?php $i++;endforeach?>
		</div>
	</div>
	<div class="popover-content_navbar">
		<?php
		$_navbar = array('default','inverse');
		?>
		<div class="list-group navbar-group">
			<?php $i=0;foreach($_navbar as $T):?>
		  <a href="javascript:;" class="list-group-item navbar-item<?php if($d['layout']['navbar']==$T):?> active<?php endif?>" data-navbar="<?php echo $T?>">
		  	<?php echo $T?>
		  </a>
		  <?php $i++;endforeach?>
		</div>
	</div>
	<div class="popover-content_logo">
		<div class="logo-group">
			<?php 
			$elelogo = getDbData($table['laymeta'],'position="logo" and page="'.$pageindex.'"','*');
			if(!$elelogo['uid']) $elelogo = getDbData($table['laymeta'],'position="logo" and page="'.$_HS['uid'].'_all"','*');
			?>
			<input type="hidden" name="d_regis" value="<?php echo $elelogo['d_regis']?>" data-position="logo"/>
			<input type="file" name="logo" id="logo" />
			<div class="uploaded">
			<?php
			      	$logo = $g['path_file'].'wizes_sets/'.$elelogo['d_regis'].'_logo.png';
			      	if (file_exists($logo)) {
			      		$IM = getimagesize($logo);
			$width = $IM[0];
			$height= $IM[1];
			echo '<img src="'.$logo.'" alt="logo" style="width:256px" /><br /><span class="fileinfo">넓이:'.$width.'px&nbsp;높이:'.$height.'px</span>';
			}
			      	?>
			</div>
			<?php
			if(strpos('_all', $elelogo['page'])==='true') {
				$all_logo = 1;
			} else {
				$all_logo = 0;
			}
			?>
			<input type="checkbox" name="all" id="all-logo" value="1"<?php echo $all_logo?'checked="checked"':'';?>/><label for="all-logo">전체 로고로 바꾸기</label>
			<div class="clear"></div>
			<div class="nav nav-bar pull-right">
				<a href="javascript:;" class="btn btn-xs btn-danger initTop">이 로고 삭제</a>
				<a href="javascript:;" class="btn btn-xs btn-success saveTop">저장</a>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					setLogo();
				});
			</script>
		</div>
	</div>
	
	<div class="popover-content_top">
		<div class="top-group">
			<select name="bbsid" class="selected-top">
				<option value="">메인 슬라이더용 게시판 선택</option>
				<option value="">----------------------</option>
				<?php 
				$eletop = getDbData($table['laymeta'],'position="top" and page="'.$pageindex.'"','*');
				$elett = unserialize($eletop['value']);
				?>
				<?php $BBSLIST = getDbArray($table['bbslist'],'','*','gid','asc',0,1)?>
				<?php while($R=db_fetch_array($BBSLIST)):?>
				<option value="<?php echo $R['uid']?>"<?php if($elett['bbsid']==$R['uid']):?> selected="selected"<?php endif?>>ㆍ<?php echo $R['name']?>(<?php echo $R['id']?>)</option>
				<?php endwhile?>
			</select>
			<input type="hidden" name="d_regis" value="<?php echo $eletop['d_regis']?>" data-position="top" data-uid="<?php echo $eletop['uid']?>"/>
			<input type="number" name="number" placeholder="입력하지 않으면 3개" value="<?php echo $elett['number']?>" class="form-control only_num"/>
				    <div class="list-group top-group">
			  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='bootstrapcarousel'):?> active<?php endif?>" data-loadtop="bootstrapcarousel">
			  	Bootstrap Carousel
			  </a>
			  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='flexslider'):?> active<?php endif?>" data-loadtop="flexslider">
			  	FlexSlider
			  </a>
			  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='nivoslider'):?> active<?php endif?>" data-loadtop="nivoslider">
			  	NivoSlider
			  </a>
			  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='breadcrumb'):?> active<?php endif?>" data-loadtop="breadcrumb">
			  	BreadCrumb으로 이용.
			  </a>
			</div>
			<div class="nav nav-bar pull-right">
				<a href="javascript:;" class="btn btn-xs btn-danger initTop">초기화</a>
				<a href="javascript:;" class="btn btn-xs btn-success saveTop">저장</a>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					setTop();
				});
			</script>
		</div>
	</div>
	
	<div class="popover-content_breadcrumb">
		<div class="breadcrumb-group">
			<?php 
			$elebc = getDbData($table['laymeta'],'position="breadcrumb" and page="'.$_HS['uid'].'_all"','*');
			if(!$elebc['uid']) $elebc = getDbData($table['laymeta'],'position="breadcrumb" and page="'.$pageindex.'"','*');
			?>
			<input type="hidden" name="d_regis" value="<?php echo $elebc['d_regis']?>" data-position="breadcrumb"/>
			<input type="file" name="breadcrumb" id="breadcrumb" />
			<div class="uploaded">
			<?php
			      	$bcbg = $g['path_file'].'wizes_sets/'.$elebc['d_regis'].'_breadcrumb.png';
			      	if (file_exists($bcbg)) {
			      		$IM = getimagesize($bcbg);
			$width = $IM[0];
			$height= $IM[1];
			echo '<img src="'.$bcbg.'" alt="Breadcrumb 배경" style="width:256px" /><br /><span class="fileinfo">넓이:'.$width.'px&nbsp;높이:'.$height.'px</span>';
			}
			      	?>
			</div>
			<input type="number" name="number" placeholder="Bread Crumb 높이" value="<?php echo $elebc['number']?>" class="form-control only_num"/>
			<input type="checkbox" name="all" id="breadcrumb-all" value="1"/><label for="breadcrumb-all">전체배경으로 바꾸기</label>
			<div class="clear"></div>
			<div class="nav nav-bar pull-right">
				<a href="javascript:;" class="btn btn-xs btn-danger initTop">이 로고 삭제</a>
				<a href="javascript:;" class="btn btn-xs btn-success saveTop">저장</a>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					setBreadcrumb();
				});
			</script>
		</div>
	</div>
	
	<div class="popover-title_navbar">
		메뉴바 설정
	</div>
	<div class="popover-title_theme">
		테마 설정
	</div>
	<div class="popover-title_logo">
		로고 설정
	</div>
	<div class="popover-title_top">
		탑 부분 설정
	</div>
	<div class="popover-title_breadcrumb">
		Breadcrumb 배경 설정
	</div>
</div>
<!-- Pop Over -->

<script type="text/javascript">
var setTop = function() {	
	$('.popover-content .top-group').delegate('.initTop','click',function(){
		if(confirm('정말 초기화 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			var uid = $popcon.find('input[name="d_regis"]').data('uid');
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';
			} else {
				var page = $('#wizes').data('page');
			}			
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/initop',
		  			position: position,
		  			uid:uid,
		  			d_regis:d_regis,
		  			page:page
		  		},
		  		success:function(data) {
		  			if(data) {
			  			$('header#top').html(data);
		  			} else {
			  			$popcon.find('.uploaded').empty();
		  			}
		  			$popcon.find('input[name="d_regis"]').data('uid','');			  		
		  		}
		  	});
	  	}	  
	});
	  
	  
	$('.popover-content .top-group').delegate('.saveTop','click',function(){
		if(confirm('이대로 저장 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			var uid = $popcon.find('input[name="d_regis"]').data('uid');
			var number = $popcon.find('input[name="number"]').val();
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';
			} else {
				var page = $('#wizes').data('page');
			}
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/savetop',
		  			page:page,
		  			bbsid:$('select.selected-top option:selected').val(),
		  			type:$('.top-group a.active').data('loadtop'),
		  			number: number,
		  			uid:uid,
		  			d_regis: d_regis,
		  			position:position
		  		},
		  		success:function(data) {
		  			alert('저장 되었습니다.');
		  			$('a.set-top').popover('hide');
		  			if(!uid) {
			  			$popcon.find('input[name="d_regis"]').data('uid',data);
		  			}		  			
		  		}
		  	});
	  	}	  
	  });
};

var setLogo = function() {
	$('.logo-group :file').change(function() {
		var fime = $(this).attr('name');
		var d_regis = $(this).prev('input[name="d_regis"]').val();
		if(!d_regis) {var d_regis = '<?php echo $date['totime']?>';}
		$(this).upload(rooturl+'/?r='+raccount+'&_themePage=ajax/upload&fime=' + fime+'&d_regis='+d_regis, function(res) {
	  		var $reshtml = '<img src="' + res[0] + '" alt="logo" style="width:256px" /><br /><span class="fileinfo">파일이름:' + res[1] + '&nbsp;넓이:' + res[3] + 'px&nbsp;높이:' + res[3] + 'px</span>';
	  		$(this).next('.uploaded').html($reshtml);
	  		$('a.navbar-brand img').attr({'src':res[0]}).css({'width':'82px','alt':'메인으로'});
	  		$('.popover-content_'+fime).find('.uploaded').replaceWith($reshtml);
	  	}, 'json');
	});
	
	$('.popover-content .logo-group').delegate('.initTop','click',function(){
		if(confirm('정말 초기화 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			var ologo = rooturl + '/layouts/wizes/image/logo.png';
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';				
			} else {
				var page = $('#wizes').data('page');
			}			
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/initop',
		  			position: position,
		  			d_regis:d_regis,
		  			page:page
		  		},
		  		success:function(data) {
		  			$('a.navbar-brand img').attr({'src':ologo});
		  			$('.logo-group .uploaded').slideUp('fast',function(){
			  			$(this).empty();
		  			});	
		  			$('.logo-group :file').val('');		  		
		  		}
		  	});
	  	}	  
	});
	  
	  
	$('.popover-content .logo-group').delegate('.saveTop','click',function(){
		if(confirm('이대로 저장 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			var number = $popcon.find('input[name="number"]').val();
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';
			} else {
				var page = $('#wizes').data('page');
			}
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/savelogo',
		  			page:page,
		  			d_regis: d_regis,
		  			position:position
		  		},
		  		success:function(data) {
		  			alert('저장 되었습니다.');
		  			$('a.set-top').popover('hide');
		  		}
		  	});
	  	}	  
	  });
};

var setBreadcrumb = function() {
	$('.breadcrumb-group :file').change(function() {
		var fime = $(this).attr('name');
		var d_regis = $(this).prev('input[name="d_regis"]').val();
		if(!d_regis) {var d_regis = '<?php echo $date['totime']?>';}
		$(this).upload(rooturl+'/?r='+raccount+'&_themePage=ajax/upload&fime=' + fime+'&d_regis='+d_regis, function(res) {
	  		var $reshtml = '<img src="' + res[0] + '" alt="logo" style="width:256px" /><br /><span class="fileinfo">파일이름:' + res[1] + '&nbsp;넓이:' + res[3] + 'px&nbsp;높이:' + res[3] + 'px</span>';
	  		$(this).next('.uploaded').html($reshtml);
	  		$('.popover-content_'+fime).find('.uploaded').replaceWith($reshtml);
	  	}, 'json');
	});
	
	$('.popover-content .breadcrumb-group').delegate('.initTop','click',function(){
		if(confirm('정말 초기화 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';
			} else {
				var page = $('#wizes').data('page');
			}			
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/initop',
		  			position: position,
		  			d_regis:d_regis,
		  			page:page
		  		},
		  		success:function(data) {
		  			if(data) {
			  			$('header#top').html(data);
		  			} else {
			  			$popcon.find('.uploaded').empty();
		  			}			  		
		  		}
		  	});
	  	}	  
	});
	  
	  
	$('.popover-content .breadcrumb-group').delegate('.saveTop','click',function(){
		if(confirm('이대로 저장 하시겠습니까?')) {
			var $popcon = $(this).closest('.popover-content');
			var d_regis = $popcon.find('input[name="d_regis"]').val();
			var position = $popcon.find('input[name="d_regis"]').data('position');
			var number = $popcon.find('input[name="number"]').val();
			if($popcon.find('input[name="all"]').is(':checked')) {
				var page = '<?php echo $_HS['uid']?>_all';
			} else {
				var page = $('#wizes').data('page');
			}
			$.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:raccount,
		  			_themePage:'ajax/savetop',
		  			page:page,
		  			bbsid:$('select.selected-top option:selected').val(),
		  			type:$('.top-group a.active').data('loadtop'),
		  			number: number,
		  			d_regis: d_regis,
		  			position:position
		  		},
		  		success:function(data) {
		  			alert('저장 되었습니다.');
		  			$('a.set-top').popover('hide');
		  		}
		  	});
	  	}	  
	  });
};

</script>