<?php
$elett['bbsid'] = $elett['bbsid']?$elett['bbsid']:$bbsid;
$elett['limit'] = $elett['limit']?$elett['limit']:$number;
$elett['limit'] = $elett['limit']?$elett['limit']:3; 
$_RCD=getDbArray($table['bbsdata'],($elett['bbsid']?'bbs='.$elett['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elett['limit'],1);
?>
<div id="sectionTop" class="carousel slide main-slider">
  <ol class="carousel-indicators">
  	<?php for($k=0; $k<$elett['limit']; $k++):?>
    <li data-target="#sectionTop" data-slide-to="<?php echo $k?>"<?php if($k==0):?> class="active"<?php endif?>></li>
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
	          <h2><?php echo $_R['subject']?></h2>
	          <p class="lead"> <?php echo getStrCut(strip_tags($_R['content']),60);?></p>
	          <a class="btn btn-sm btn-primary" href="<?php echo getPostLink($_R)?>">더 읽어보기</a>
	        </div>
	    </div>
    </div>
    <?php $k++; endwhile?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left icon-prev" href="#sectionTop" data-slide="prev"><i class="fa fa-angle-left"></i></a>
  <a class="carousel-control right icon-next" href="#sectionTop" data-slide="next"><i class="fa fa-angle-right"></i></a>
</div>