<!--
<ul class="demo-sidebar hide-on-tablets">
	<li><a href="#fui-alert">Alert</a></li>
	<li><a href="#fui-bottom-menu">Bottom Menu</a></li>
	<li><a href="#fui-breadcrumb">Breadcrumb</a></li>
	<li><a href="#fui-button">Button</a></li>
	<li><a href="#fui-carousel">Carousel</a></li>
	<li><a href="#fui-checkbox">Checkbox</a></li>
	<li><a href="#fui-radio">Radio</a></li>
	<li><a href="#fui-dialog">Dialog</a></li>
	<li><a href="#fui-dropdown">Dropdown</a></li>
	<li><a href="#fui-iconbar">Iconbar</a></li>
	<li><a href="#fui-input">Input</a></li>
	<li><a href="#fui-datepicker">Datepicker</a></li>
	<li><a href="#fui-label">Labels</a></li>
	<li><a href="#fui-modal">Modal</a></li>
	<li><a href="#fui-nav">Nav</a></li>
	<li><a href="#fui-navbar">Navbar</a></li>
	<li><a href="#fui-pager">Pager</a></li>
	<li><a href="#fui-pagination">Pagination</a></li>
	<li><a href="#fui-popover">Popover</a></li>
	<li><a href="#fui-progress">Progress</a></li>
	<li><a href="#fui-select">Select</a></li>
	<li><a href="#fui-switch">Switch</a></li>
	<li><a href="#fui-tables">Tables</a></li>
	<li><a href="#fui-tagsinput">Tags Input</a></li>
	<li><a href="#fui-tooltip">Tooltip</a></li>
	<li><a href="#fui-slider">Slider</a></li>
	<li><a href="#fui-spinner">Spinner</a></li>
</ul> <!-- /nav -->
<div class="clearfix" style="height:30px;"></div>
<div class="container">
	<div class="row">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
			  <div class="container">
			    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-03"></button>
			    <a href="<?php echo $g['s']?>/?r=<?php echo $r?>" class="navbar-brand"><img src="<?php echo $g['img_layout']?>/logo.png" alt="" /></a>
			    <div class="nav-collapse collapse in" id="nav-collapse-03">
			      <ul class="nav">
			        <?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
					<?php $_i=1;while($_M1=db_fetch_array($_MENUS1)):?>
					<li<?php if(in_array($_M1['id'],$_CA)):$g['nowFMemnu']=$_M1['uid']?> class="active"<?php endif?>><a href="<?php echo RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"><?php echo $_M1['name']?></a>
						<?php if($_M1['isson']):?>
						<ul>
							<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
							<?php $_k=1;while($_M2=db_fetch_array($_MENUS2)):?>
							<li<?php if(in_array($_M2['id'],$_CA)):?> class="active"<?php endif?>><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>"><img src="<?php echo $g['img_layout']?>/_gnb/gnb_<?php echo $_M2['id']?><?php if(in_array($_M2['id'],$_CA)):?>_on<?php endif?>.png"/></a></li>
							<?php $_k++;endwhile?>
						</ul>
						<?php endif?>
					</li>
					<?php $_i++;endwhile?>
			      </ul> <!-- /nav -->
			
			      <form class="navbar-search pull-right" action="" align="center">
			        <div class="input-group input-group-sm">
						<input class="form-control" id="navbarInput-02" type="search" placeholder="Search">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<i class="fui-search"></i>
							</button>
						</span>            
					</div>
			      </form>
			    </div><!--/.nav-collapse -->
			  </div>
			</div>
		</div> <!-- /navbar-inverse -->
	</div>
</div>

<!-- Icon Bar - Adding Element-->
<div class="container">
	<div class="row">
		<div class="iconbar iconbar-horizontal iconbar-info element-section" style="width:100%;">
            <ul>
              <li><a href="javascript:;" href="#myModal" class="fui-list-bulleted pull-element" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" data-element="list" data-title="최근게시물 - 리스트"></a></li>
              <li><a href="javascript:;" class="fui-list-thumbnailed pull-element" data-element="list-thumb" data-title="최근게시물 - 리스트+썸네일"></a></li>
              <li><a href="javascript:;" class="fui-list-small-thumbnails pull-element" data-element="small-gallery" data-title="최근게시물 - 썸네일갤러리"></a></li>
              <li><a href="javascript:;" class="fui-calendar pull-element" data-element="calendar" data-title="캘린더" data-ready="Y"></a></li>
            </ul>
		</div>
	</div>
</div>
<!-- Icon Bar - Adding Element-->

<div class="container">
	<div class="row" id="wizes">
		<?php include __KIMS_CONTENT__?>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="iconbar iconbar-horizontal pull-right" style="margin-right:0px !important;">
		  <ul>
		    <li><a href="javascript:;" class="fui-cross"></a></li>
		    <li><a href="javascript:;" class="fui-check-inverted"></a></li>
		  </ul>
		</div>
	</div>
</div>

<div class="mtl pbl">
  <div class="bottom-menu bottom-menu-inverse">
    <div class="container">
      <div class="row">
        <div class="col-md-2 navbar-brand">
          <a href="#fakelink" class="navbar-brand"><img src="<?php echo $g['img_layout']?>/logo.png" alt="" style="opacity:70%;"/></a>
        </div>

        <div class="col-md-8">
          <ul class="bottom-links">
            <li><a href="#fakelink">About Us</a></li>
          </ul>
        </div>

        <div class="col-md-2">
          <ul class="bottom-icons">
          	<!--
            <li><a href="#fakelink" class="fui-pinterest"></a></li>
            <li><a href="#fakelink" class="fui-facebook"></a></li>
            <li><a href="#fakelink" class="fui-twitter"></a></li>
            -->
          </ul>
        </div>
      </div>
    </div>
  </div> <!-- /bottom-menu-inverse -->
</div>

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
  
  <script type="text/javascript">
	  $(function($){
		  $('.container .row .element-section').delegate('a.pull-element','click',function(){
		  	if($(this).data('ready')) {
			  	alert('준비중인 요소입니다.');
			  	return false;
		  	} else {
			  	$('#myModal h4.modal-title').text($(this).data('title')+' 설정');
			  	$('#myModal').data('element',$(this).data('element')).modal('show');
			  	$.ajax({
			  		type:'POST',
			  		url:rooturl,
			  		data:{
			  			r:'home',
			  			_element:$(this).data('element')+'_set'
			  		},
			  		success:function(html){
			  			$('#myModal .modal-body').html(html);
			  		}
			  	});
		  	}
		  });
		  
		  $('#myModal .modal-footer').delegate('button.btn-primary','click',function(){
			  $.ajax({
		  		type:'POST',
		  		url:rooturl,
		  		data:{
		  			r:'home',
		  			_element:$('#myModal').data('element')
		  		},
		  		success:function(html){
		  			$('.container #wizes').append(html);
		  			$('#myModal').modal('hide');
		  			$('.element-header .element-switchs').delegate('a.remove-element','click',function(){
			  			$(this).closest('.element').remove();
					})
		  		}
		  	});
		  });
	  })
  </script>