<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
$_RCD=getDbArray($table['bbsdata'],($elekey['bbsid']?'bbs='.$elekey['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elekey['limit'],1);
?>

<div class="col-md-<?php echo $elekey['col']?> col-sm-<?php echo $elekey['col']?> element"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<?php if($my['admin']):?>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
	<?php endif?>
	
	<div id="Carousel_<?php echo $elekey['d_regis']?>" class="carousel slide">
	  <ol class="carousel-indicators">
	  	<?php for($k=0; $k<$elekey['limit']; $k++):?>
	    <li data-target="#Carousel_<?php echo $elekey['d_regis']?>" data-slide-to="<?php echo $k?>"<?php if($k==0):?> class="active"<?php endif?>></li>
	    <?php endfor?>
	  </ol>
	  <!-- Carousel items -->
	  <div class="carousel-inner">
	  	<?php $k=0; while($_R=db_fetch_array($_RCD)):?>
		<?php $exp = explode(']',str_replace('[','',trim($_R['upload'])));?>
		<?php $UP=db_fetch_array(db_query("select * from ".$table['s_upload']." where uid=".$exp[0],$DB_CONNECT)); ?>
		<?php $basicimg = $g['url_root'].'/files/'.$UP['folder'].'/'.$UP['tmpname'];?>
	    <div class="<?php if($k==0):?>active <?php endif?>item">
		    <img src="<?php echo $basicimg?>" alt="">
		    <div class="container">
		        <div class="carousel-caption">
		          <h5><?php echo $_R['subject']?></h5>
		          <p class="lead"> <?php echo getStrCut(strip_tags($_R['content']),30);?></p>
		          <a class="btn btn-xs btn-primary" href="<?php echo getPostLink($_R)?>">더 읽어보기</a>
		        </div>
		    </div>
	    </div>
	    <?php $k++; endwhile?>
	  </div>
	  <!-- Carousel nav -->
	  <a class="carousel-control left icon-prev" href="#Carousel_<?php echo $elekey['d_regis']?>" data-slide="prev"><i class="fa fa-angle-left"></i></a>
	  <a class="carousel-control right icon-next" href="#Carousel_<?php echo $elekey['d_regis']?>" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div>
</div>