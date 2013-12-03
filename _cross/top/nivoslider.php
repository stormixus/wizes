<link rel="stylesheet" href="<?php echo $g['path_layout'].$d['layout']['dir']?>/elecss/nivo_themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $g['path_layout'].$d['layout']['dir']?>/elecss/nivo-slider.css" type="text/css" media="screen" />
<?php
$elett['bbsid'] = $elett['bbsid']?$elett['bbsid']:$bbsid;
$elett['limit'] = $elett['limit']?$elett['limit']:$number;
$elett['limit'] = $elett['limit']?$elett['limit']:3; 
$_RCD=getDbArray($table['bbsdata'],($elett['bbsid']?'bbs='.$elett['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elett['limit'],1);
?>
<div id="sectionTop">
	<!-- Carousel items -->
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
			<?php $k=0; while($_R=db_fetch_array($_RCD)):?>
			<?php $exp = explode(']',str_replace('[','',trim($_R['upload'])));?>
			<?php $UP=db_fetch_array(db_query("select * from ".$table['s_upload']." where uid=".$exp[0],$DB_CONNECT)); ?>
			<?php $basicimg = $g['url_root'].'/files/'.$UP['folder'].'/'.$UP['tmpname'];?>
		    <a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $basicimg?>" data-thumb="<?php echo $basicimg?>" alt="" title="<?php echo $_R['subject']?>" /></a>
		     <?php $k++; endwhile?>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo $g['path_layout'].$d['layout']['dir']?>/elejs/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</div>