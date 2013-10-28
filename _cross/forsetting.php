<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">Modal title</h4>
	    </div>
	    <div class="modal-body">
	      ...
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
	<div class="popover-title_slider">
		<span class="pull-left">
			메인 슬라이더
		</span>
	    <div class="pull-right">
	    	<a href="" class="btn btn-primary btn-xs">저장</a>
	    	<a href="" class="btn btn-danger btn-xs">보여주기</a>
	    	<a href="" class="btn btn-danger btn-xs">지움</a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div class="popover-content_top">
		<select name="bbsid" class="selected-top">
			<option value="">메인 슬라이더용 게시판 선택</option>
			<option value="">----------------------------------</option>
			<?php 
			$eletop = getDbData($table['laymeta'],'position="top" and page='.$_HP['uid'],'*');
			$elett = unserialize($eletop['value']);
			?>
			<?php $BBSLIST = getDbArray($table['bbslist'],'','*','gid','asc',0,1)?>
			<?php while($R=db_fetch_array($BBSLIST)):?>
			<option value="<?php echo $R['uid']?>"<?php if($elett['bbsid']==$R['uid']):?> selected="selected"<?php endif?>>ㆍ<?php echo $R['name']?>(<?php echo $R['id']?>)</option>
			<?php endwhile?>
		</select>
		<input type="hidden" name="top-d_regis" value="<?php echo $eletop['d_regis']?>" />
		<input type="num" name="top-number" placeholder="입력하지 않으면 3개" value="<?php echo $elett['number']?>" class="form-control only_num"/>
	    <div class="list-group top-group">
		  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='bootstrap_carousel'):?> active<?php endif?>" data-loadtop="bootstrapcarousel">
		  	Bootstrap Carousel
		  </a>
		  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='flexslider'):?> active<?php endif?>" data-loadtop="flexslider">
		  	FlexSlider
		  </a>
		  <a href="javascript:;" class="list-group-item<?php if($elett['type']=='nivoslider'):?> active<?php endif?>" data-loadtop="nivoslider">
		  	NivoSlider
		  </a>
		  <a href="javascript:;" class="list-group-item<?php if(!$elett['type']||!$elett['type']=='breadcrumb'):?> active<?php endif?>" data-loadtop="breadcrumb">
		  	BreadCrumb으로 이용.
		  </a>
		</div>
		<div class="nav nav-bar pull-right">
			<a href="javascript:;" class="btn btn-xs btn-danger initTop">초기화</a>
			<a href="javascript:;" class="btn btn-xs btn-success saveTop">저장</a>
		</div>
	</div>
	
	<div class="popover-title_top">
		저장된 템플릿
	</div>
	<div class="popover-content_template">
	    <div class="list-group" style="width:250px;">
		  <a href="#" class="list-group-item">
		  	체리핑크 ㅋㅋ
		  </a>
		  <a href="#" class="list-group-item">
		  	체리핑크 ㅋㅋ
		  </a>
		  <a href="#" class="list-group-item">
		  	체리핑크 ㅋㅋ
		  </a>
		</div>
	</div>
</div>
<!-- Pop Over -->