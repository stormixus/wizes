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
	
	<ul class="list-group">
		<?php $_RCD=getDbArray($table['bbsdata'],($elekey['bbsid']?'bbs='.$elekey['bbsid'].' and ':'').'display=1 and site='.$_HS['uid'],'*','gid','asc',$elekey['limit'],1)?>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<li class="list-group-item hand" onclick="goHref('<?php echo getPostLink($_R)?>')" title="<?php echo $_R[$_HS['nametype']]?>님">	    	
    		<span class="badge"><?php echo getDateFormat($_R['d_regis'],'Y.m.d')?></span>
    		<?php echo getStrCut($_R['subject'],$elekey['sbjcut'],'')?>
		</li>
		<?php endwhile?>
	</ul>
</div>