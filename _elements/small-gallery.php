<?php 
include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/common.php';
?>

<div class="col-md-<?php echo $elekey['col']?> element"<?php if($my['admin']):?><?php echo $dataset;?><?php endif?>>
	<div class="element-header">
		<div class="element-title"><?php include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/handle.php';?><a href="<?php echo utf8_urldecode($elekey['link'])?>"><?php echo urldecode($elekey['eletitle'])?></a></div>
		<?php 
		include  $g['path_layout'].$d['layout']['dir'].'/_elements/includes/seticons.php';
		?>
	</div>
	
	<ul class="media-list">
		<?php if($elekey['imgwidth']>=$elekey['imgheight']) {
			$ratio  = $elekey['imgwidth']/$elekey['imgheight'];
			$crop = $ratio.':1';
		} else {
			$ratio  = $elekey['imgheight']/$elekey['imgwidth'];
			$crop = '1:'.$ratio;
		}
		?>
		<?php $_RCD=getDbArray($table['bbsdata'],($elekey['bbsid']?'bbs='.$elekey['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elekey['limit'],1)?>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<?php $exp = explode(']',str_replace('[','',trim($_R['upload'])));?>
		<?php $UP=db_fetch_array(db_query("select * from ".$table['s_upload']." where uid=".$exp[0],$DB_CONNECT)); ?>
		<?php $basicimg = $g['url_root'].'/files/'.$UP['folder'].'/'.$UP['tmpname'];?>
		<li class="collage">
		    <a class="pull-left" href="#">
		      <img class="media-object" src="<?php echo $g['path_layout'].$d['layout']['dir'].'/thumb/image.php?width='.$elekey['imgwidth'].'&height='.$elekey['imgheight'].'&cropratio='.$crop.'&image=';?><?php echo $basicimg; ?>" alt="...">
		    </a>
		</li>
		<?php endwhile?>	
	</ul>
</div>