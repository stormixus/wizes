<?php if($my['admin']):?>
<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/sidepanel.php'?>
<?php endif?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/header.php'?>


<section id="top">
<?php
$eletop = getDbData($table['laymeta'],'position="top" and page="'.$pageindex.'"','*');
if($eletop['d_regis']&&!$_themePage){
	$elett = unserialize($eletop['value']);
	include  $g['path_layout'].$d['layout']['dir'].'/_cross/top/'.$elett['type'].'.php';
} else {
	include  $g['path_layout'].$d['layout']['dir'].'/_cross/top/breadcrumb.php';
}

?>
</section>


<div class="clearfix"></div>


<div id="wizes" data-page="<?php echo $pageindex?>">
	<div class="container">
		<div class="row">
			<aside class="co-sm-3 col-md-3 sidebar">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title"><?php if($my['id']):?><?php echo $my[$_HS['nametype']]?>님 안녕하세요!<?php else:?>로그인 해주세요!<?php endif?></h3>
				  </div>
				  <div class="panel-body">
				  	<?php if($my['id']):?>
				  	<div class="media">
					  <a class="pull-left" href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage&amp;page=simbol">
					  	<img class="media-object" src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;f=y&amp;s=64" alt="사진 변경">
					  </a>
					  <div class="media-body">
					  	<ul class="list-group">
							<li class="list-group-item"><a href="<?php echo RW('mod=mypage')?>">마이페이지</a></li>
							<li class="list-group-item"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage&amp;page=info">정보변경</a></li>
						</ul>
					  </div>
					  <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout" class="btn btn-xs btn-danger pull-right">로그아웃</a>
					</div>
				  	<?php else:?>
				  	<form class="form-signin" action="<?php echo $d['admin']['ssl_type']?$g['ssl_root']:$g['url_root']?>/" method="post"  onsubmit="return showLogCheck(this);" target="_action_frame_<?php echo $m?>">
				  		<input type="hidden" name="r" value="<?php echo $r?>" />
				  		<input type="hidden" name="a" value="login" />
					    <div class="form-group">
						    <input type="text" name="id" class="form-control" id="id" placeholder="이메일 또는 아이디">
						</div>
						<div class="form-group">
						    <input type="password" name="pw" class="form-control" id="pw" placeholder="패스워드">
						</div>
				        <div class="checkbox">
						    <label>
						      <input type="checkbox" name="idpwsave" value=""> ID/PW 기억
						    </label>
						</div>
						
				        <button class="btn btn-xs btn-primary" type="submit">로그인</button>
				        <a href="<?php echo RW('mod=join')?>" class="btn btn-xs btn-success">회원가입</a>
				  	</form>
				  	<?php endif?>
				  </div>
				</div>
				
				<section class="articles">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#mosta" data-toggle="tab">많이본글</a></li>
					  <li><a href="#acomment" data-toggle="tab">댓글많은글</a></li>
					</ul>
					
					<!-- Tab panes -->
					<div class="tab-content">
					  <div class="tab-pane active" id="mosta">
						  <ul class="list-unstyled">
							<?php $_date=date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-30,$date['year']))?>
							<?php $_RCD=getDbArray($table['bbsdata'],'site='.$s.' and display=1 ','*','hit','desc',5,1);?>
							<?php $_i=0;while($_R=db_fetch_array($_RCD)):$_i++?>
							<li><a href="<?php echo getPostLink($_R)?>"><span class="badge<?php if($_i<4):?> emp<?php endif?>"><?php echo $_i?></span>&nbsp;<?php echo $_R['subject']?></a><?php if($_R['comment']+$_R['oneline']):?><span>(<?php echo $_R['comment']+$_R['oneline']?>)</span><?php endif?></li>
							<?php endwhile?>
						  </ul>
					  </div>
					  <div class="tab-pane" id="acomment">
						  <ul class="list-unstyled">
							<?php $_date=date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-30,$date['year']))?>
							<?php $_RCD=getDbArray($table['bbsdata'],'site='.$s.' and display=1 ','*','hit','desc',5,1);?>
							<?php $_i=0;while($_R=db_fetch_array($_RCD)):$_i++?>
							<li><a href="<?php echo getPostLink($_R)?>"><span class="badge<?php if($_i<4):?> emp<?php endif?>"><?php echo $_i?></span>&nbsp;<?php echo $_R['subject']?></a><?php if($_R['comment']+$_R['oneline']):?><span>(<?php echo $_R['comment']+$_R['oneline']?>)</span><?php endif?></li>
							<?php endwhile?>
						  </ul>
					  </div>
					</div>
				</section>
				
				
			</aside>
			<div class="col-sm-9 col-md-9 wrapper">
				<?php if(!$_themePage):?>
				<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/elementpanel.php';?>
				<?php endif?>
				<section class="page-content sortable">
					<?php if(!$_themePage):?>
					<?php
					$eleindex = getDbData($table['laymeta'],'position="index" and page="'.$pageindex.'"','*');
					$eleindex = unserialize($eleindex['value']);
					foreach($eleindex as $E) {
						$ele = getDbData($table['laymeta'],'uid='.$E,'*');
						$eleval = unserialize($ele['value']);
						include  $g['path_layout'].$d['layout']['dir'].'/_elements/'.$eleval['type'].'.php';
					}
					?>
					<?php endif?>
					<?php include __KIMS_CONTENT__?>
				</section>
			</div>
		</div>
	</div>
</div>

<?php if($my['admin']&&!$_themePage):?>
<div class="container">
	<div class="row">
		<div class="iconbar iconbar-horizontal pull-right elepostnav" style="margin-right:0px !important;padding-right:10px;">
		  <ul>
		    <li><a href="javascript:;" class="glyphicon glyphicon-remove-circle initele" data-toggle="tooltip" title="초기화"></a></li>
		    <li><a href="javascript:;" class="glyphicon glyphicon-floppy-disk savele" data-toggle="tooltip" title="저장"></a></li>
		  </ul>
		</div>
	</div>
</div>
<?php endif?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/footer.php'?>

<?php if($my['admin']):?>

<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/forsetting.php'?>
  
<?php endif?>