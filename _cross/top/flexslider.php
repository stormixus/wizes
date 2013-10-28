<link rel="stylesheet" href="<?php echo $g['path_layout'].$d['layout']['dir']?>/elecss/flexslider.css" type="text/css" media="screen" />
<?php
$elett['bbsid'] = $elett['bbsid']?$elett['bbsid']:$bbsid;
$elett['limit'] = $elett['limit']?$elett['limit']:$number;
$elett['limit'] = $elett['limit']?$elett['limit']:3; 
$_RCD=getDbArray($table['bbsdata'],($elett['bbsid']?'bbs='.$elett['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elett['limit'],1);
?>
<div id="sectionTop">
	<div class="flexslider">
      <ul class="slides">
      	<?php $k=0; while($_R=db_fetch_array($_RCD)):?>
		<?php $exp = explode(']',str_replace('[','',trim($_R['upload'])));?>
		<?php $UP=db_fetch_array(db_query("select * from ".$table['s_upload']." where uid=".$exp[0],$DB_CONNECT)); ?>
		<?php $basicimg = $g['url_root'].'/files/'.$UP['folder'].'/'.$UP['tmpname'];?>
        <li>
	    	<a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $basicimg?>" /></a>
		</li>
		<?php $k++; endwhile?>
      </ul>
    </div>
    <!-- FlexSlider -->
	<script defer src="<?php echo $g['path_layout'].$d['layout']['dir']?>/elejs/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "slide",
	        start: function(slider){
	          $('body').removeClass('loading');
	        }
	      });
	    });
    </script>
</div>