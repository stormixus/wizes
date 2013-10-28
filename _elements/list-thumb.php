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
		<?php $_RCD=getDbArray($table['bbsdata'],($elekey['bbsid']?'bbs='.$elekey['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elekey['limit'],1)?>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<?php $exp = explode(']',str_replace('[','',trim($_R['upload'])));?>
		<?php $UP=db_fetch_array(db_query("select * from ".$table['s_upload']." where uid=".$exp[0],$DB_CONNECT)); ?>
		<?php $basicimg = $g['url_root'].'/files/'.$UP['folder'].'/'.$UP['tmpname'];?>
		<li class="media">
		    <a class="pull-left" href="<?php echo getPostLink($_R)?>">
		      <img class="media-object" src="<?php echo $g['path_layout'].$d['layout']['dir'].'/thumb/image.php?width=50&height=50&cropratio=1:1&image=';?><?php echo $basicimg; ?>" alt="<?php echo getStrCut($_R['subject'],$elekey['sbjcut'],'')?>">
		    </a>
		    <div class="media-body">
		      <h6 class="media-heading"><?php echo getStrCut($_R['subject'],$elekey['sbjcut'],'')?></h6>
		      <?php echo getStrCut(strip_tags($_R['content']),30);?>
		    </div>
		  </li>
		<?php endwhile?>
	</ul>
</div>